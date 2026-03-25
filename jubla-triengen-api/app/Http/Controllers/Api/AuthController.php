<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\UpdateOwnUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $deviceName = $request->input('device_name', 'api-token');

        $user = User::query()->where('email', $email)->first();

        if (! $user || ! Hash::check($password, $user->password)) {
            return response()->json([
                'message' => 'The provided credentials are incorrect.',
            ], 422);
        }

        $token = $user->createToken($deviceName)->plainTextToken;

        return response()->json([
            'token_type' => 'Bearer',
            'access_token' => $token,
            'user' => $user,
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()?->delete();

        return response()->json([], 204);
    }

    public function me(Request $request): JsonResponse
    {
        return response()->json($request->user());
    }

    public function update(UpdateOwnUserRequest $request): JsonResponse
    {
        $user = $request->user();
        $validated = $request->validated();

        unset($validated['current_password']);

        $user->fill($validated);
        $user->save();

        return response()->json($user->fresh());
    }
}
