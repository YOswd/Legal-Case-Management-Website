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

        $table->foreignId('client_id')->constrained('users')->cascadeOnDelete();

        $table->string('case_number')->unique();

        $table->string('title');

        $table->text('description');

        $table->enum('case_type', [
            'Civil',
            'Criminal',
            'Family',
            'Property',
            'Corporate',
            'Cyber',
            'Others'
        ]);

        $table->enum('priority', [
            'Low',
            'Medium',
            'High'
        ])->default('Medium');

        $table->enum('status', [
            'Pending',
            'Assigned',
            'In Progress',
            'On Hold',
            'Resolved',
            'Closed'
        ])->default('Pending');

        $table->date('filing_date')->nullable();

        $table->string('court_name')->nullable();

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
