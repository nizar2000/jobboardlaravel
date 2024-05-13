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
     
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('applicant_id');
            $table->text('resume');
            $table->text('cover_letter');
            $table->timestamp('submitted_at');
            $table->enum('status', ['applied', 'interviewed', 'rejected']);
            $table->timestamps();
           // $table->foreign('job_id')->references('id')->on('jobs');
           // $table->foreign('applicant_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
