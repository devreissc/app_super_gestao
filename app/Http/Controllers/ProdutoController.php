<?php

namespace App\Http\Controllers;

use App\Produto;
use App\ProdutoDetalhe;
use App\Unidade;
use App\Item;
use App\ItemDetalhe;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $produtos = Item::paginate(10); // Paginação, entre parenteses pode-se passar a quantidade de itens por página

        $request = $request->all();

        // foreach($produtos as $key => $produto){
        //     $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();

        //     if(!is_null($produtoDetalhe)){
        //         $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
        //         $produtos[$key]['largura'] = $produtoDetalhe->largura;
        //         $produtos[$key]['altura'] = $produtoDetalhe->altura;
        //     }
        // }

        return view('app.produto.index', compact('produtos','request'));
    }

    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto.create', compact('unidades'));
    }

    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40|unique:produtos', // Verifica se o campo é obrigatório, se tem no mínimo 3 e no máximo 40 caracteres e se é único na tabela produtos
            'descricao' => 'required|min:3|max:2000', // Verifica se o campo é obrigatório e se tem no mínimo 3 e no máximo 2000 caracteres
            'peso' => 'required|integer', // Verifica se é um número inteiro
            'unidade_id' => 'exists:unidades,id' // Verifica se o id existe na tabela unidades
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres',
            'unique' => 'O campo :attribute já está cadastrado',
            'integer' => 'O campo :attribute deve ser um número inteiro',
            'exists' => 'O campo :attribute não existe'
        ];

        $request->validate($regras, $feedback);

        Produto::create($request->all());

        return redirect()->route('produto.index');
    }

    public function show(Produto $produto)
    {
        return view('app.produto.show', compact('produto'));
    }

    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        return view('app.produto.edit', compact(['produto','unidades']));
        // return view('app.produto.create', compact(['produto','unidades']));
    }

    public function update(Request $request, Produto $produto)
    {
        // put indica que a requisição deve atualizar todos os campos
        // patch indica que a requisição deve atualizar apenas os campos que foram enviados
        // $request->all() pega todos os campos enviados; representa o método post, o payload
        // $request->only('nome','descricao') pega apenas os campos nome e descrição
        // $request->except('nome','descricao') pega todos os campos exceto nome e descrição
        // $request->input('nome') pega o campo nome
        // $request->has('nome') verifica se o campo nome foi enviado
        // $request->filled('nome') verifica se o campo nome foi preenchido
        // $request->missing('nome') verifica se o campo nome não foi enviado
        // $produto = Produto::find($id); pega o produto pelo id
        // $produto se refere ao registro no estado anterior 

        // print_r($request->all());
        // echo '<br><br><br><br>';
        // print_r($produto); 
        // echo '<br><br><br><br>';
        // print_r($produto->getAttributes()); 

        $regras = [
            'nome' => 'required|min:3|max:40|unique:produtos,nome,'.$produto->id, // Verifica se o campo é obrigatório, se tem no mínimo 3 e no máximo 40 caracteres e se é único na tabela produtos
            'descricao' => 'required|min:3|max:2000', // Verifica se o campo é obrigatório e se tem no mínimo 3 e no máximo 2000 caracteres
            'peso' => 'required|integer', // Verifica se é um número inteiro
            'unidade_id' => 'exists:unidades,id' // Verifica se o id existe na tabela unidades
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres',
            'unique' => 'O campo :attribute já está cadastrado',
            'integer' => 'O campo :attribute deve ser um número inteiro',
            'exists' => 'O campo :attribute não existe'
        ];

        $request->validate($regras, $feedback);

        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]); 
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}