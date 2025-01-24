<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    //O nome do parâmetro não precisa ser igual ao nome do parâmetro da rota, apenas obedecer a ordem
    public function teste(int $p1, int $p2){
        // echo "A soma de $p1 + $p2 é: " . ($p1 + $p2);
        // return view('site.teste', ['x' => $p1, 'y' => $p2]); // Array associativo
        // return view('site.teste', compact('p1','p2')); //Compact
        return view('site.teste')->with('p1view',$p1)->with('p2view',$p2); //with(nome da variavel na view, valor da variavel)
    }
}
