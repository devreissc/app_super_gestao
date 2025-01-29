<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

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

        $motivo_contato = MotivoContato::all();
        
        return view('site.contato', ['titulo' => 'Contato', 'motivo_contato' => $motivo_contato]);
    }

    public function salvar(Request $request){
        // realiza a validação dos dados
        $request->validate(
            [
                'nome' => ['required', 'min:3', 'max:40', 'unique:site_contatos'], // required = obrigatório, min = mínimo de caracteres, max = máximo de caracteres
                'telefone' => ['required'],
                'email' => ['email'],
                // 'motivo_contato' => ['required', 'numeric'],
                'motivo_contatos_id' => ['required', 'numeric'],
                'mensagem' => ['required', 'min:5'],
            ],
            [
                // 'nome.required' => 'O campo nome precisa ser preenchido',
                'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
                'nome.unique' => 'O nome informado já está em uso',
                // 'telefone.required' => 'O campo telefone precisa ser preenchido',
                'email.email' => 'O email informado não é válido',
                // 'mensagem.required' => 'O campo mensagem precisa ser preenchido',
                'mensagem.min' => 'O campo mensagem precisa ter no mínimo 5 caracteres',
                // 'motivo_contatos_id.required' => 'O campo motivo de contato precisa ser preenchido',
                'motivo_contatos_id.numeric' => 'O campo motivo de contato precisa ser um número',
                'required' => 'O campo :attribute precisa ser preenchido', //   
            ]
        );

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
