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
            'produto_id' => 'exists:produtos,id'
        ];

        $feedback = [
            'produto_id.exists' => 'O produto informado não existe'
        ];

        $request->validate($regras, $feedback);

        $pedidoId = $pedido->id;
        $produtoId = $request->get('produto_id');

        $pedidoProduto = new PedidoProduto();
        $pedidoProduto->pedido_id = $pedidoId;
        $pedidoProduto->produto_id = $produtoId;
        $pedidoProduto->save();

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

    public function destroy($id)
    {
    }
}
