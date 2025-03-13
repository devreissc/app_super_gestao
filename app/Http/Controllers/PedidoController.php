<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Cliente;

class PedidoController extends Controller
{

    public function index(Request $request)
    {
        $pedidos = Pedido::paginate(10);
        $request = $request->all();

        return view('app.pedido.index', compact('pedidos', 'request'));
    }


    public function create()
    {
        $clientes = Cliente::all();
        return view('app.pedido.create', compact('clientes')); 
    }


    public function store(Request $request)
    {

        $regras = [
            'data_pedido' => 'required',
            'observacoes' => 'required',
            'status' => 'required',
            'cliente_id' => 'required'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido'
        ];

        $request->validate($regras, $feedback);
        
        // dd($request->all());

        Pedido::create($request->all());

        return redirect()->route('pedido.index');
    }


    public function show(Pedido $pedido)
    {
        return view('app.pedido.show', compact('pedido'));
    }


    public function edit(Pedido $pedido)
    {
        $clientes = Cliente::all();
        return view('app.pedido.edit', compact('pedido', 'clientes'));
    }


    public function update(Request $request, Pedido $pedido)
    {
        $regras = [
            'data_pedido' => 'required',
            'observacoes' => 'required',
            'status' => 'required',
            'cliente_id' => 'required'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido'
        ];

        $request->validate($regras, $feedback);
        $pedido->update($request->all());
        return redirect()->route('pedido.show', ['pedido' => $pedido->id]);
    }


    public function destroy($id)
    {
        $pedido = Pedido::find($id);
        $pedido->delete();
        return redirect()->route('pedido.index')->with('mensagem', 'Pedido excluído com sucesso');
    }
}
