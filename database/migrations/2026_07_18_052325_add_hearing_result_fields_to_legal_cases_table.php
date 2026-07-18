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
        Schema::table('legal_cases', function (Blueprint $table) {

            $table->string('courtroom')->nullable();

            $table->enum('hearing_status', [
                'Scheduled',
                'Completed',
                'Adjourned'
            ])->default('Scheduled');

            $table->text('hearing_result')->nullable();
            $table->date('next_hearing_date')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('legal_cases', function (Blueprint $table) {

            $table->dropColumn([
                'courtroom',
                'hearing_status',
                'hearing_result',
                'next_hearing_date'
            ]);

        });
    }
};
