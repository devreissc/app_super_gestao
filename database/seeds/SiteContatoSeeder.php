<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $contato = new SiteContato();
        // $contato->nome = 'Sistema SG';
        // $contato->telefone = '(11) 99999-8888';
        // $contato->email = 'a@a.com';
        // $contato->motivo_contato = 1;
        // $contato->mensagem = 'Seja bem-vindo ao sistema Super Gestão';
        // $contato->save();

        // SiteContato::create([
        //     'nome' => 'Financeiro',
        //     'telefone' => '(11) 99999-7777',
        //     'email' => 'b@b.com',
        //     'motivo_contato' => 2,
        //     'mensagem' => 'Financeiro - Não recebimento de fatura',
        // ]);

        factory(SiteContato::class, 100)->create();
    }
}
