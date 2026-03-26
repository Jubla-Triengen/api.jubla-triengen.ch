<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('file_name');
            $table->string('slug')->nullable()->unique();
            $table->string('path', 500);
            $table->boolean('is_public')->default(true);
            $table->string('mime_type', 100);
            $table->string('mime_subtype', 100)->nullable();
            $table->unsignedBigInteger('size');
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->date('event_date')->nullable();
            $table->unsignedBigInteger('cover_image_id')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('password')->nullable();
            $table->timestamps();
        });

        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_id')->constrained('files')->cascadeOnDelete();
            $table->foreignId('gallery_id')->nullable()->constrained('galleries')->nullOnDelete();
            $table->integer('height')->nullable();
            $table->integer('width')->nullable();
            $table->string('alt_text')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::table('galleries', function (Blueprint $table) {
            $table->foreign('cover_image_id')->references('id')->on('images')->nullOnDelete();
        });

        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 100)->unique();
            $table->string('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->foreignId('hero_image_id')->nullable()->constrained('images')->nullOnDelete();
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->timestamps();
        });

        Schema::create('page_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('pages')->cascadeOnDelete();
            $table->string('key', 100);
            $table->text('value');
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->unique(['page_id', 'key']);
        });

        Schema::create('page_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('pages')->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->text('paragraph')->nullable();
            $table->foreignId('image_id')->nullable()->constrained('images')->nullOnDelete();
            $table->string('button_label', 100)->nullable();
            $table->string('button_link')->nullable();
            $table->string('orientation', 20)->nullable();
            $table->string('background_color', 50)->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('contact_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('pages')->cascadeOnDelete();
            $table->string('email')->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('organization')->nullable();
            $table->string('street')->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('leaders', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable()->unique();
            $table->string('name');
            $table->string('nickname')->nullable();
            $table->string('role')->nullable();
            $table->foreignId('image_id')->nullable()->constrained('images')->nullOnDelete();
            $table->text('description')->nullable();
            $table->longText('long_description')->nullable();
            $table->string('email')->nullable();
            $table->string('phone', 50)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('profession')->nullable();
            $table->text('hobbies')->nullable();
            $table->longText('jubla_highlight')->nullable();
            $table->timestamps();
        });

        Schema::create('leader_roles', function (Blueprint $table) {
            $table->id();
            $table->string('key', 100)->unique();
            $table->string('label');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('leader_role_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leader_id')->constrained('leaders')->cascadeOnDelete();
            $table->foreignId('leader_role_id')->constrained('leader_roles')->cascadeOnDelete();
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->unique(['leader_id', 'leader_role_id']);
        });

        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('key', 100)->unique();
            $table->string('label');
            $table->timestamps();
        });

        Schema::create('leader_course_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leader_id')->constrained('leaders')->cascadeOnDelete();
            $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->unique(['leader_id', 'course_id']);
        });

        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable()->unique();
            $table->string('title');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->foreignId('image_id')->nullable()->constrained('images')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable()->unique();
            $table->string('title');
            $table->dateTime('published_at');
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->foreignId('image_id')->nullable()->constrained('images')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('activity_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_id')->constrained('activities')->cascadeOnDelete();
            $table->foreignId('file_id')->constrained('files')->cascadeOnDelete();
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->unique(['activity_id', 'file_id']);
        });

        Schema::create('post_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('posts')->cascadeOnDelete();
            $table->foreignId('file_id')->constrained('files')->cascadeOnDelete();
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->unique(['post_id', 'file_id']);
        });

        Schema::create('legal_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('pages')->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->longText('content');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_files');
        Schema::dropIfExists('post_files');
        Schema::dropIfExists('leader_role_assignments');
        Schema::dropIfExists('leader_course_assignments');
        Schema::dropIfExists('page_settings');
        Schema::dropIfExists('page_sections');
        Schema::dropIfExists('contact_infos');
        Schema::dropIfExists('legal_sections');
        Schema::dropIfExists('activities');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('leader_roles');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('leaders');
        Schema::dropIfExists('pages');
        Schema::dropIfExists('images');
        Schema::dropIfExists('galleries');
        Schema::dropIfExists('files');
    }
};
