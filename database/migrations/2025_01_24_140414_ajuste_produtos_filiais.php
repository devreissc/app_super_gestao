<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutosFiliais extends Migration
{
    public function up()
    {
        Schema::create('filiais', function (Blueprint $table) {
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });

        Schema::create('produto_filiais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('filial_id');
            $table->decimal('preco_venda', 8, 2)->default(0.01);
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo');
            $table->integer('estoque')->default(1);
            $table->timestamps();

            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('filial_id')->references('id')->on('filiais');
        });

        //Remover colunas da tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn(['preco_venda', 'estoque', 'estoque_minimo', 'estoque_maximo']);
        });
    }

    public function down()
    {
        //Removendo alterações da tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->decimal('preco_venda', 8, 2)->default(0.01);
            $table->integer('estoque')->default(1);
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo');
        });

        //Remover tabela produto_filiais
        Schema::dropIfExists('produto_filiais');

        //Remover tabela filiais
        Schema::dropIfExists('filiais');
    }
}
