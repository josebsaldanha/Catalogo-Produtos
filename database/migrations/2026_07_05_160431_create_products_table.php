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
    Schema::create('products', function (Blueprint $table) {
        $table->id();

        $table->foreignId('category_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->string('nome');
        $table->text('descricao');
        $table->decimal('preco', 10, 2);
        $table->decimal('preco_antigo', 10, 2)->nullable();
        $table->string('imagem');
        $table->enum('estado', [
            'disponivel',
            'esgotado',
            'promocao'
        ]);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
