<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nome da operação
            $table->string('type'); // Tipo da operação
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('operations');
    }
};
