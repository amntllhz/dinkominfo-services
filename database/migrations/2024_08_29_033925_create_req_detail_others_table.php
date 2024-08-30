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
        Schema::create('req_detail_others', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_submission_id')->constrained('request_submissions')->cascadeOnDelete();
            $table->string('purpose')->nullable();
            $table->json('documents')->nullable();
            $table->string('add_inform')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('req_detail_others');
    }
};
