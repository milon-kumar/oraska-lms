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
        Schema::create('course_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('courses_id')->constrained('courses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('teachers_id')->constrained('teachers')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('image')->nullable()->default('images/default.jpg');
            $table->integer('total_course_students')->nullable()->default(0);
            $table->integer('total_course_videos')->nullable()->default(0);
            $table->integer('total_class_hower')->nullable()->default(0);
            $table->integer('mcq_exams')->nullable()->default(0);
            $table->integer('weekly_exams')->nullable()->default(0);
            $table->integer('peper_final_exams')->nullable()->default(0);
            $table->boolean('class_recorded')->default(true)->nullable();
            $table->boolean('class_facebook_live')->default(true)->nullable();
            $table->text('course_buy_video')->nullable();
            $table->text('course_description')->nullable();
            $table->text('course_introduction_video')->nullable();
            $table->integer('enrollment_validity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_details');
    }
};
