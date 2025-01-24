<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedoresNovasColunas extends Migration
{
    public function up()
    {
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->string('uf', 2);
            $table->string('email', 100);
        });
    }

    public function down()
    {
        Schema::table('fornecedores', function (Blueprint $table) {
            //Remover colunas
            // $table->dropColumn('uf');
            // $table->dropColumn('email');

            //Ou
            $table->dropColumn(['uf', 'email']);
        });
    }
}
