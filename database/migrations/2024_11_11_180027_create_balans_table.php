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
        Schema::create('balans', function (Blueprint $table) {
            $table->id();
            $table->string('factory_id');
            $table->integer('messege');
            $table->integer('hisoblandi');
            $table->integer('tolandi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balans');
    }
};
