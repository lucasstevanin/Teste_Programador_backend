<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('uploads', function (Blueprint $table) {
            $table->id(); // ID único do upload
            $table->unsignedBigInteger('notice_id'); // Relacionado ao comunicado
            $table->string('file_path'); // Caminho do arquivo
            $table->string('file_type'); // Tipo do arquivo (e.g., imagem, PDF)
            $table->timestamps(); // Campos created_at e updated_at

            // Relacionamento
            $table->foreign('notice_id')->references('id')->on('notices')->onDelete('cascade');
        });

    }


    public function down(): void
    {
        Schema::dropIfExists('uploads');
    }
};
