<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('penggunas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female']);
            $table->float('weight');
            $table->float('height');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('penggunas');
    }
};
