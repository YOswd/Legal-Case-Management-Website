<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('legal_documents', function (Blueprint $table) {
            $table->foreignId('legal_case_id')
                ->nullable()
                ->change();
        });
    }

    public function down(): void
    {
        Schema::table('legal_documents', function (Blueprint $table) {
            $table->foreignId('legal_case_id')
                ->nullable(false)
                ->change();
        });
    }
};
