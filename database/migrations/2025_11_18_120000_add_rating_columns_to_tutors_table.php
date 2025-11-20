<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tutors', function (Blueprint $table) {
            if (! Schema::hasColumn('tutors', 'rating')) {
                $table->decimal('rating', 3, 2)->default(0);
            }

            if (! Schema::hasColumn('tutors', 'total_reviews')) {
                $table->unsignedInteger('total_reviews')->default(0)->after('rating');
            }
        });
    }

    public function down(): void
    {
        Schema::table('tutors', function (Blueprint $table) {
            $table->dropColumn(['rating', 'total_reviews']);
        });
    }
};
