<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vacation_id')->constrained();
            $table->foreignId('resume_id')->constrained();
            $table->float('strength')->nullable();
            $table->enum('hr_status', ['new', 'approved', 'rejected'])->default('new');
            $table->enum('hunter_status', ['new', 'approved', 'rejected'])->default('new');
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hits');
    }
};
