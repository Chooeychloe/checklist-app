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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subject_code');
            $table->string('subject_name');
            $table->integer('credit_unit_lec');
            $table->integer('credit_unit_lab');
            $table->integer('contact_hrs_lec');
            $table->integer('contact_hrs_lab');
            $table->string('pre_requisite');
            $table->string('semester_yr_taken');
            $table->string('grade');
            $table->string('instructor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
