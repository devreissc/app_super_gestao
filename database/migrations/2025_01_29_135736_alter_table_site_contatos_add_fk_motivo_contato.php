<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivoContato extends Migration
{
    public function up()
    {
        // adiciona a coluna motivo_contatos_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id'); // unsigned = apenas números positivos
        });

        // atribuir motivo_contatos_id para a tabela
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato'); // copia os dados da coluna motivo_contato para a coluna motivo_contatos_id

        // criar a fk e remover a coluna motivo_contato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    public function down()
    {
        // remove a fk e adiciona a coluna motivo_contato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

        // atribuir motivo_contato para a tabela
        DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');

        // remove a coluna motivo_contatos_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });
    }
}
