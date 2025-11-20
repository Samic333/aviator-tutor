<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tutors', function (Blueprint $table) {
            if (! Schema::hasColumn('tutors', 'user_id')) {
                $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            }
            if (! Schema::hasColumn('tutors', 'headline')) {
                $table->string('headline')->nullable();
            }
            if (! Schema::hasColumn('tutors', 'bio')) {
                $table->text('bio')->nullable();
            }
            if (! Schema::hasColumn('tutors', 'hourly_rate')) {
                $table->decimal('hourly_rate', 8, 2)->default(0);
            }
            if (! Schema::hasColumn('tutors', 'currency')) {
                $table->string('currency', 3)->default('USD');
            }
            if (! Schema::hasColumn('tutors', 'country')) {
                $table->string('country', 100)->nullable();
            }
            if (! Schema::hasColumn('tutors', 'timezone')) {
                $table->string('timezone', 80)->nullable();
            }
            if (! Schema::hasColumn('tutors', 'years_experience')) {
                $table->unsignedTinyInteger('years_experience')->nullable();
            }
            if (! Schema::hasColumn('tutors', 'aircraft_types')) {
                $table->json('aircraft_types')->nullable();
            }
            if (! Schema::hasColumn('tutors', 'subjects')) {
                $table->json('subjects')->nullable();
            }
            if (! Schema::hasColumn('tutors', 'rating')) {
                $table->decimal('rating', 3, 2)->nullable();
            }
            if (! Schema::hasColumn('tutors', 'total_reviews')) {
                $table->unsignedInteger('total_reviews')->default(0);
            }
            if (! Schema::hasColumn('tutors', 'is_verified')) {
                $table->boolean('is_verified')->default(false);
            }
        });
    }

    public function down(): void
    {
        Schema::table('tutors', function (Blueprint $table) {
            $columns = [
                'user_id',
                'headline',
                'bio',
                'hourly_rate',
                'currency',
                'country',
                'timezone',
                'years_experience',
                'aircraft_types',
                'subjects',
                'rating',
                'total_reviews',
                'is_verified',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('tutors', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
