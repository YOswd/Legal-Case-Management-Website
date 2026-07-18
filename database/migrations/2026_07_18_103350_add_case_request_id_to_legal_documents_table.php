<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('legal_documents', function (Blueprint $table) {

            $table->foreignId('case_request_id')
                ->nullable()
                ->after('legal_case_id')
                ->constrained()
                ->cascadeOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('legal_documents', function (Blueprint $table) {

            $table->dropForeign(['case_request_id']);
            $table->dropColumn('case_request_id');

        });
    }
};