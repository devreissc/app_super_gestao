<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    // public function index() {
    //     $fornecedores = [
    //         0 => [
    //             'nome' => 'Fornecedor 1',
    //             'status' => 'N',
    //             'cnpj' => '0',
    //             'ddd' => '', //São Paulo (SP)
    //             'telefone' => '0000-0000'
    //         ],
    //         1 => [
    //             'nome' => 'Fornecedor 2',
    //             'status' => 'S',
    //             'cnpj' => null,
    //             'ddd' => '85', //Fortaleza (CE)
    //             'telefone' => '0000-0000'
    //         ],
    //         2 => [
    //             'nome' => 'Fornecedor 2',
    //             'status' => 'S',
    //             'cnpj' => null,
    //             'ddd' => '32', //Juiz de fora (MG)
    //             'telefone' => '0000-0000'
    //         ]
    //     ];

    //     return view('app.fornecedor.index', compact('fornecedores'));
    // }

    public function index(){
        return view('app.fornecedor.index');
    }

    public function editar($id, $msg = ''){
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', compact(['fornecedor','msg']));
    }

    public function listar(Request $request){
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')
        ->where('uf', 'like', '%'.$request->input('uf').'%')
        ->where('site', 'like', '%'.$request->input('site').'%')
        ->paginate(20); // Paginação, entre parenteses pode-se passar a quantidade de itens por página

        $request = $request->all();

        return view('app.fornecedor.listar', compact('fornecedores','request'));
    }

    public function adicionar(Request $request){
        $msg = '';

        $regras = [
            'nome' => 'required|min:3|max:40|unique:fornecedores', //Requerido, mínimo 3, máximo 40, único na tabela fornecedores
            'site' => 'required',
            'uf' => 'required|min:2|max:2',
            'email' => 'required|email'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres',
            'email' => 'O campo :attribute não é um e-mail válido',
            'unique' => 'O campo :attribute já está cadastrado'
        ];

        if($request->input('_token') != '' && $request->input('id') == ''){
            //Cadastro
            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro realizado com sucesso';
        }

        if($request->input('_token') != '' && $request->input('id') != ''){
            //Edição
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update){
                $msg = 'Edição realizada com sucesso';
            } else {
                $msg = 'Erro ao tentar editar';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function excluir($id){
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor.listar');
    }
}
