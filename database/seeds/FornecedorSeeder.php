<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    public function run()
    {
        $fornecedor = new Fornecedor;
        $fornecedor->nome = 'Fornecedor 1';
        $fornecedor->site = 'fornecedor1.com.br';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'a@a.com';
        $fornecedor->save();

        Fornecedor::create([
            'nome' => 'Fornecedor 2',
            'site' => 'fornecedor2.com.br',
            'uf' => 'RJ',
            'email' => 'a@a.com',
        ]);

        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 3',
            'site' => 'fornecedor3.com.br',
            'uf' => 'SP',
            'email' => 'a@a.com',
        ]);
    }
}
