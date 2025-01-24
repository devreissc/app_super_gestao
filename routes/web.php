<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     // return view('welcome');
//     return 'Teste';
// });

//Caso coloque uma função, = callback, se colocar string, entende que está acionando uma função dentro de um controller
Route::get('/','PrincipalController@principal')->name('site.index');

// Route::get('/sobre-nos', function () {
//     // return view('welcome');
//     return 'Sobre nós';
// });

Route::get('/sobre-nos','SobreNosController@sobreNos')->name('site.sobrenos');

// Route::get('/contato', function () {
//     // return view('welcome');
//     return 'Contato';
// });

Route::get('/contato','ContatoController@contato')->name('site.contato');
Route::post('/contato','ContatoController@contato')->name('site.contato');

Route::get('/login',function(){
    return 'Login';
})->name('site.login');


//Agrupamento de rotas
Route::prefix('/app')->group(function(){
    Route::get('/clientes',function(){
        return 'Clientes';
    })->name('app.clientes');

    Route::get('/fornecedores','FornecedorController@index')->name('app.fornecedores');

    Route::get('/produtos',function(){
        return 'Produtos';
    })->name('app.produtos');
});

// O parâmetro na função não precisa ser igual
// Para que um parâmetro seja opcional, é necessário colocar um valor padrão ou ? à frente do nome do parâmetro {nome?} necessariamente no último parâmetro, ou seja, da direita para esquerda, no exemplo abaixo, não é possível colocar o nome como parametro opcional
// Route::get('/contato/{nome}/{categoria}/{assunto}/{mensagem?}', function(string $nome, string $categoria, string $assunto, string $mensagem = 'Valor padrão'){
//     echo 'Teste Parâmetro: ' . $nome . ' - ' . $categoria . ' - ' . $assunto . ' - ' . $mensagem;
// });

// Route::get(
//     '/contato/{nome}/{categoria_id}',
//     function(
//         string $nome = 'Desconhecido', 
//         int $categoriaId = 1
//     ){
//         echo 'Teste Parâmetros: ' . $nome . ' - ' . $categoria;
//     }
// )->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');

// Redirecionamento de rotas
Route::get('/teste/{p1}/{p2}','TesteController@teste')->name('site.teste');


// Route::get('/rota2', function(){
//     return redirect()->route('site.rota1'); //sempre usando o name da rota
// })->name('site.rota2');

// Route::redirect('/rota2','/rota1'); //Rota de origem, rotas de destino

Route::fallback(function(){
    //Pode ser por callback ou direcionando para um controlador/action
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para voltar a página inicial';
});