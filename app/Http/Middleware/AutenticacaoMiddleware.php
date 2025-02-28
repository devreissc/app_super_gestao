<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next/*, $metodo_autenticacao, $perfil*/)
    {
        // echo $metodo_autenticacao.' - '.$perfil.'<br>';

        // if($metodo_autenticacao == 'padrao'){
        //     echo 'Verificando autenticação no BD...'.' - '.$perfil.'<br>';
        // }

        // if($metodo_autenticacao == 'ldap'){
        //     echo 'Verificando autenticação no AD...'.' - '.$perfil.'<br>';
        // }

        // if($perfil == 'admin'){
        //     echo 'Verificando se é admin...'.' - '.$perfil.'<br>';
        // }

        // if($perfil == 'visitante'){
        //     echo 'Verificando se é admin...'.' - '.$perfil.'<br>';
        // }

        // if(false){
        //     return $next($request);
        // }else{
        //     return Response('Acesso negado', 403);
        // }

        session_start();

        if(isset($_SESSION['email']) && $_SESSION['email'] != ''){
            return $next($request);
        }else{
            return redirect()->route('site.login', ['erro' => 2]);
        }
    }
}
