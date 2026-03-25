<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

test('user can login and receive sanctum token', function (): void {
    $user = User::factory()->create([
        'email' => 'jane@example.com',
        'password' => 'password',
    ]);

    $response = $this->postJson('/api/login', [
        'email' => $user->email,
        'password' => 'password',
        'device_name' => 'test-suite',
    ]);

    $response
        ->assertOk()
        ->assertJsonStructure([
            'token_type',
            'access_token',
            'user' => ['id', 'name', 'email'],
        ]);

    expect($user->tokens()->count())->toBe(1);
});

test('login fails with invalid credentials', function (): void {
    User::factory()->create([
        'email' => 'jane@example.com',
        'password' => 'password',
    ]);

    $response = $this->postJson('/api/login', [
        'email' => 'jane@example.com',
        'password' => 'wrong-password',
    ]);

    $response->assertUnprocessable();
});

test('authenticated user can logout', function (): void {
    $user = User::factory()->create();
    $token = $user->createToken('test-suite')->plainTextToken;

    $response = $this->withToken($token)->postJson('/api/logout');

    $response->assertNoContent();
    expect($user->fresh()->tokens()->count())->toBe(0);
});

test('authenticated user can update own attributes including password', function (): void {
    $user = User::factory()->create([
        'password' => 'old-password',
    ]);

    $response = $this->actingAs($user, 'sanctum')->patchJson('/api/user', [
        'name' => 'Updated Name',
        'email' => 'updated@example.com',
        'current_password' => 'old-password',
        'password' => 'new-password-123',
        'password_confirmation' => 'new-password-123',
    ]);

    $response
        ->assertOk()
        ->assertJson([
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ]);

    expect(Hash::check('new-password-123', $user->fresh()->password))->toBeTrue();
});

test('password change requires current password', function (): void {
    $user = User::factory()->create([
        'password' => 'old-password',
    ]);

    $response = $this->actingAs($user, 'sanctum')->patchJson('/api/user', [
        'password' => 'new-password-123',
        'password_confirmation' => 'new-password-123',
    ]);

    $response->assertUnprocessable();
});
