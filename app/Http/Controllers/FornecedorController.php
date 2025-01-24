<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = [
            0 => ['nome' => 'Fornecedor 1', 'status' => 'X', 'cnpj' => '00.000.000/0001-00'],
            1 => ['nome' => 'Fornecedor 2', 'status' => 'A', 'cnpj' => '00.000.000/0001-00'],
            2 => ['nome' => 'Fornecedor 3', 'status' => 'N', 'cnpj' => '00.000.000/0001-00'],
        ];

        // $fornecedores = [];
        return view('app.fornecedor.index', compact('fornecedores'));
        // return view('app.fornecedor.index');
    }
}
