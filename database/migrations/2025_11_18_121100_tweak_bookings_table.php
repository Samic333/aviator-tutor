<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            if (! Schema::hasColumn('bookings', 'student_id')) {
                $table->foreignId('student_id')->constrained('users')->cascadeOnDelete();
            }
            if (! Schema::hasColumn('bookings', 'tutor_id')) {
                $table->foreignId('tutor_id')->constrained('tutors')->cascadeOnDelete();
            }
            if (! Schema::hasColumn('bookings', 'status')) {
                $table->string('status', 20)->default('pending');
            }
            if (! Schema::hasColumn('bookings', 'scheduled_at')) {
                $table->dateTime('scheduled_at')->nullable();
            }
            if (! Schema::hasColumn('bookings', 'duration_minutes')) {
                $table->unsignedSmallInteger('duration_minutes')->default(60);
            }
            if (! Schema::hasColumn('bookings', 'price_usd')) {
                $table->decimal('price_usd', 8, 2)->default(0);
            }
            if (! Schema::hasColumn('bookings', 'notes')) {
                $table->text('notes')->nullable();
            }
            if (! Schema::hasColumn('bookings', 'meeting_link')) {
                $table->string('meeting_link')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $columns = [
                'student_id',
                'tutor_id',
                'status',
                'scheduled_at',
                'duration_minutes',
                'price_usd',
                'notes',
                'meeting_link',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('bookings', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
