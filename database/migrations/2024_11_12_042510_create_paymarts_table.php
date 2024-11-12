<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('paymarts', function (Blueprint $table) {
            $table->id();
            $table->integer('factory_id');
            $table->integer('summa');
            $table->string('type');
            $table->string('comment');
            $table->string('user');
            $table->timestamps();
        });
    }
    public function down(): void{
        Schema::dropIfExists('paymarts');
    }
};
