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
        Schema::create('case_requests', function (Blueprint $table) {

    $table->id();

    // Client who sent request
    $table->foreignId('client_id')
          ->constrained('users')
          ->cascadeOnDelete();

    // Lawyer who receives request
    $table->foreignId('lawyer_id')
          ->constrained('users')
          ->cascadeOnDelete();

    // Request information
    $table->string('title');

    $table->text('description');

    $table->integer('budget')->nullable();

    // Workflow
    $table->enum('status', [
        'Pending',
        'Accepted',
        'Rejected',
        'In Progress',
        'Completed'
    ])->default('Pending');

    $table->timestamps();

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_requests');
    }
};
