<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $clientes = Cliente::paginate(10);
        $request = $request->all();
        
        return view('app.cliente.index', compact(['clientes', 'request']));
    }

    public function create()
    {
        return view('app.cliente.create');
    }

    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:100',
            'email' => 'required|email',
            'telefone' => 'required'
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres',
            'email' => 'O campo :attribute deve ser um email válido'
        ];

        $request->validate($regras, $feedback);

        $cliente = new Cliente();
        $cliente->nome = $request->get('nome');
        $cliente->email = $request->get('email');
        $cliente->telefone = $request->get('telefone');
        $cliente->save();

        return redirect()->route('cliente.index')->with('success', 'Cliente cadastrado com sucesso!'); // redireciona para a rota cliente.index e exibe a mensagem de sucesso
    }

    public function show(Cliente $cliente)
    {
        return view('app.cliente.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('app.cliente.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $regras = [
            'nome' => 'required|min:3|max:100',
            'email' => 'required|email',
            'telefone' => 'required'
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres',
            'email' => 'O campo :attribute deve ser um email válido'
        ];

        $request->validate($regras, $feedback);

        $cliente->update($request->all());
        return redirect()->route('cliente.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();

        return redirect()->route('cliente.index')->with('success', 'Cliente excluído com sucesso!');
    }
}
