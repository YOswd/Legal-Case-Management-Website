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
    Schema::create('legal_cases', function (Blueprint $table) {

        $table->id();

        $table->foreignId('client_id')
              ->constrained('users')
              ->cascadeOnDelete();

        $table->string('case_number')->unique();

        $table->string('title');

        $table->text('description');

        $table->enum('case_type', [
            'Civil',
            'Criminal',
            'Family',
            'Property'
        ]);

        $table->enum('priority', [
            'Low',
            'Medium',
            'High'
        ]);

        $table->enum('status', [
            'Pending',
            'In Progress',
            'Resolved',
            'Closed'
        ])->default('Pending');

        $table->date('filing_date');

        $table->string('court_name');

        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legal_cases');
    }
};
