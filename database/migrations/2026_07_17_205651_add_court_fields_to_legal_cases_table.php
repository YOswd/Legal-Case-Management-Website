<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('legal_cases', function (Blueprint $table) {
            $table->string('court_level')->nullable()->after('court_name');
            $table->date('hearing_date')->nullable()->after('court_level');
            $table->time('hearing_time')->nullable()->after('hearing_date');
        });
    }

    public function down(): void
    {
        Schema::table('legal_cases', function (Blueprint $table) {

            $table->dropColumn([
                'court_level',
                'hearing_date',
                'hearing_time',
            ]);

        });
    }
};