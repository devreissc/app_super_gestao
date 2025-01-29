<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        // var_dump($_POST);
        // echo '<pre>';
        // print_r($request->all()); // all() pega todos os dados do formulário
        // echo '</pre>';
        // echo $request->input('nome'); // input() pega um dado específico do formulário
        // echo '<br>';
        // echo $request->input('email');
        // echo '<br>';
        // return view('site.contato', ['titulo' => 'Contato']);

        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        // $contato->save();

        // $contato2 = new SiteContato();
        // $contato2->fill($request->all());
        // $contato2->save();
        
        // $contato3 = new SiteContato();
        // $contato3->create($request->all());

        $motivo_contato = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
        ];
        
        return view('site.contato', ['titulo' => 'Contato', 'motivo_contato' => $motivo_contato]);
    }

    public function salvar(Request $request){
        // realiza a validação dos dados
        $request->validate([
            'nome' => ['required', 'min:3', 'max:40'], // required = obrigatório, min = mínimo de caracteres, max = máximo de caracteres
            'telefone' => ['required'],
            'email' => ['email'],
            'motivo_contato' => ['required', 'numeric'],
            'mensagem' => ['required', 'min:5'],
        ]);

        // SiteContato::create($request->all());
    }
}
