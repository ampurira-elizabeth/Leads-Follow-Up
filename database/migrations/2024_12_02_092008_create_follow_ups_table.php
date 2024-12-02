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
       
            Schema::create('follow_ups', function (Blueprint $table) {
                $table->id();
                $table->foreignId('lead_id')->constrained()->onDelete('cascade');
                $table->timestamp('scheduled_at');
                $table->enum('status', ['Pending', 'Completed', 'Missed'])->default('Pending');
                $table->timestamps();
            });
     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follow_ups');
    }
};
