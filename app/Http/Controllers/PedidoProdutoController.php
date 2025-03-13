<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PedidoProduto;
use App\Pedido;
use App\Produto;

class PedidoProdutoController extends Controller
{

    public function index()
    {
    }

    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        // $pedido->produtos;
        return view('app.pedido_produto.create', compact('pedido', 'produtos'));
    }

    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required'
        ];

        $feedback = [
            'produto_id.exists' => 'O produto informado não existe',
            'required' => 'O campo :attribute deve ser preenchido'
        ];

        $request->validate($regras, $feedback);

        $pedidoId = $pedido->id;
        $produtoId = $request->get('produto_id');

        // $pedidoProduto = new PedidoProduto();
        // $pedidoProduto->pedido_id = $pedidoId;
        // $pedidoProduto->produto_id = $produtoId;
        // $pedidoProduto->save();

        $pedido->produtos()->attach($produtoId, ['quantidade' => $request->get('quantidade')]); // attach() é usado para inserir dados na tabela de relacionamento

        // $pedido->produtos()->attach([
        //     $produtoId => ['quantidade' => $request->get('quantidade')],
        //     $produtoId2 => ['quantidade' => $request->get('quantidade2')],
        //     $produtoId3 => ['quantidade' => $request->get('quantidade3')],
        // ]);

        // // ou 

        // $produtos = $request->get('produtos'); // Supondo que seja um array no request

        // $dados = [];

        // foreach ($produtos as $produtoId => $quantidade) {
        //     $dados[$produtoId] = ['quantidade' => $quantidade];
        // }

        // $pedido->produtos()->attach($dados);

        return redirect()->route('pedido-produto.create', ['pedido' => $pedidoId]);
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy(Pedido $pedido, Produto $produto)
    {
        // print_r($pedido->getAttributes());
        // echo '<hr>';
        // print_r($produto->getAttributes());

        // forma 1
        // PedidoProduto::where([
        //     'pedido_id' => $pedido->id,
        //     'produto_id' => $produto->id
        // ])->delete();

        //forma detach
        $pedido->produtos()->detach($produto->id);

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
    }
}
