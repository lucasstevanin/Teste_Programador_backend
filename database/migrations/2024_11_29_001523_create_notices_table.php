<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticesTable extends Migration
{
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('operation_id')->nullable();
            $table->unsignedBigInteger('user_type_id');
            $table->unsignedBigInteger('procedure_id');
            $table->string('title');
            $table->text('content');
            $table->text('description')->nullable();
            $table->boolean('popup')->default(false);
            $table->date('deadline')->nullable();
            $table->string('author')->nullable();
            $table->timestamps();

            // Relacionamentos
            $table->foreign('operation_id')->references('id')->on('operations');
            $table->foreign('user_type_id')->references('id')->on('user_types');
            $table->foreign('procedure_id')->references('id')->on('procedures');

            $table->timestamp('inactive_date')->nullable(); // Permitir valores nulos
            $table->string('publish')->default('Sim'); // Define 'Sim' como valor padrão

        });
    }

    public function down()
    {
        Schema::dropIfExists('notices');
    }
}
