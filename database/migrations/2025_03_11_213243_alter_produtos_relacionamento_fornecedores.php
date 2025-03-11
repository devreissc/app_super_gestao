<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProdutosRelacionamentoFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::table('produtos', function(Blueprint $table){
            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome' => 'Fornecedor Padrão SG',
                'site' => 'fornecedorpadraosg.com.br',
                'uf' => 'SP',
                'email' => 'contato@fornecedorpadraosg.com.br'
            ]);

            $table->unsignedBigInteger('fornecedor_id')->after('id')->nullable()->default($fornecedor_id); // Criando a coluna fornecedor_id, que é do tipo unsignedBigInteger, que é opcional e tem valor padrão o id do fornecedor padrão 
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores'); // Criando a chave estrangeira, que faz referência a tabela fornecedores, na tabela produtos, na coluna fornecedor_id, que é do tipo unsignedBigInteger
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function(Blueprint $table){
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        });
    }
}
