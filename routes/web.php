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

/*Route::get('/', function () {
    return "seja bem-vindo";
});

Route::get('/sobre-nos', function () {
    return "sobre nós";
});

Route::get('/contato', function () {
    return "Contato";
});
*/
Route::get('/login', function () {
    return 'login';
})->name('site.login');

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'sobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@contato')->name('site.contato');


Route::prefix('/app')->group(function () {
    Route::get('/clientes', function () {
        return 'Clientes';
    })->name('app.clientes');

    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');

    Route::get('/produtos', function () {
        return 'produtos';
    })->name('app.produtos');
});

//Redirecionamento de rotas
Route::get('/rota1', function () {
    echo "rota 1";
})->name('site.rota1');

/*Route::get('/rota2', function () {
    echo "Rota 2";
})->name('site.rota2');*/
Route::redirect('rota2', 'rota1');

//Implementando uma rota de Fallback
Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="' . route('site.index') . '">clique aqui</a>';
});

//Teste de rotas com parametros
// nome, categoria, asunnto, mensagem
//Para passar parametro opcional adicionamos ? ao final do parametro
//Para adicionar um valor padrão, adicionamos um igual e inserimos o valor padrão como o exemplo da variável mensagem
/*Route::get(
    '/contato/{nome}/{categoria}/{assunto}/{mensagem?}',
    function (string $nome, string $categoria, $assunto, $mensagem = 'Mensagem não foi enviada') {
        echo $nome . '-' . $categoria . "-" . $assunto . "-" . $mensagem;
    }
);*/

//Estabelecendo expressões regulares para validar a rota
/*Route::get(
    '/contato/{nome}/{categoria_id}',
    function (string $nome, string $categoria_id) {
        echo $nome . '-' . $categoria_id;
    }
)->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');*/
