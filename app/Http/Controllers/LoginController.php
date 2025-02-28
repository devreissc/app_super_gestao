<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';
        if($request->get('erro') == 1){
            $erro = 'Usuário ou senha não existe';
        }

        if($request->get('erro') == 2){
            $erro = 'Necessário realizar login para acessar a página';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request){
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        $usuario = $request->get('usuario');
        $senha = $request->get('senha');

        $user = new User();

        $usuario = $user->where('email', $usuario)
            ->where('password', $senha)
            ->get()
            ->first();
        
        if(isset($usuario->name)){
            // Iniciar a sessão
            session_start();
            // Criar variáveis de sessão
            // $_SESSION faz com que a variável seja global e fique disponível em qualquer lugar do sistema enquanto a sessão estiver ativa
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}