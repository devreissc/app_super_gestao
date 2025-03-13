<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente::paginate(10);
        $request = $request->all();
        
        return view('app.cliente.index', compact(['clientes', 'request']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            // 'endereco.min' => 'O campo endereço deve ter no mínimo 3 caracteres',
            // 'endereco.max' => 'O campo endereço deve ter no máximo 100 caracteres',
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
