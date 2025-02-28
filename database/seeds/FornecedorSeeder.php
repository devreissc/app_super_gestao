<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando o objeto
        // $fornecedor = new Fornecedor();
        // $fornecedor->nome = 'Fornecedor 100';
        // $fornecedor->site = 'fornecedor100.com.br';
        // $fornecedor->uf = 'CE';
        // $fornecedor->email = 'contato@fornecedor100.com.br';
        // $fornecedor->save();

        // //o método create (atenção para o atributo fillable da classe)
        // Fornecedor::create([
        //     'nome' => 'Fornecedor 200',
        //     'site' => 'fornecedor200.com.br',
        //     'uf' => 'RS',
        //     'email' => 'contato@fornecedor200.com.br'
        // ]);

        // //insert
        // DB::table('fornecedores')->insert([
        //     'nome' => 'Fornecedor 300',
        //     'site' => 'fornecedor300.com.br',
        //     'uf' => 'SP',
        //     'email' => 'contato@fornecedor300.com.br'
        // ]);

        factory(Fornecedor::class, 750)->create();
    }
}
