<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('notices', function (Blueprint $table) {
            $table->string('status')->default('active'); // Define 'active' como padrão
        });
    }

  
    public function down(): void
    {
        Schema::table('notices', function (Blueprint $table) {
            $table->string('status')->change();
        });
    }

};
