<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tutor_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('status')->default('pending');
            $table->string('license_type')->nullable();
            $table->string('primary_aircraft')->nullable();
            $table->unsignedInteger('total_hours')->nullable();
            $table->unsignedInteger('instruction_hours')->nullable();
            $table->string('country')->nullable();
            $table->string('timezone')->nullable();
            $table->text('about')->nullable();
            $table->text('admin_notes')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tutor_applications');
    }
};
