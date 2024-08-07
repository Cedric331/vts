<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('media_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('objective');
            $table->enum('periodicity', ['Récurrent', 'Ponctuel']);
            $table->integer('periodicity_one')->nullable();
            $table->integer('budget');
            $table->integer('start_date_wish');
            $table->date('start_date')->nullable();
            $table->string('start_date_flexibility')->nullable();
            $table->integer('end_date_wish');
            $table->date('end_date')->nullable();
            $table->integer('end_date_flexibility')->nullable();
            $table->foreignId('campaign_id')->constrained()->onDelete('cascade');
            $table->foreignId('announcer_id')->constrained()->onDelete('cascade');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_plans');
    }
};
