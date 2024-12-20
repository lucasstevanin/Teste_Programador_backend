<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('user_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps(); // Campos de created_at e updated_at
        });


    }


    public function down(): void
    {
        Schema::dropIfExists('user_types');
    }
};
