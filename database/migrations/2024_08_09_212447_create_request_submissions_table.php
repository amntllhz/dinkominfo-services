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
        Schema::create('request_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('applicant')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('instansi')->nullable();
            $table->text('message')->nullable();
            $table->string('receipt')->nullable();
            $table->enum('status', ['Pending', 'In Progress', 'Rejected', 'Completed'])->default('Pending');
            $table->foreignId('service_id')->constrained('services')->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_submissions');
    }
};
