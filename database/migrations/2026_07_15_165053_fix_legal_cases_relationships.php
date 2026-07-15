<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('legal_cases', function (Blueprint $table) {

            // Add foreign key to existing lawyer_id column
            $table->foreign('lawyer_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            // Add case_request_id column
            $table->foreignId('case_request_id')
                ->nullable()
                ->after('lawyer_id')
                ->constrained()
                ->nullOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('legal_cases', function (Blueprint $table) {

            $table->dropForeign(['lawyer_id']);
            $table->dropForeign(['case_request_id']);

            $table->dropColumn('case_request_id');

        });
    }
};