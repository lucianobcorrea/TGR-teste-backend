<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PrincipalController@principal')->name('site.principal');

Route::prefix('/produto')->group(function () {
    Route::get('/listar', 'ProdutoController@listar');
    Route::get('/buscar/{nome}', 'ProdutoController@buscar');
    Route::get('/detalhes/{produto}', 'ProdutoController@detalhar');
    Route::post('/cadastrar', 'ProdutoController@cadastrar');
    Route::get('/cadastrar', 'ProdutoController@cadastrarProdutoView')->name('site.cadastrar-produto');
    Route::patch('/atualizar/{produto}', 'ProdutoController@atualizar');
    Route::delete('/excluir/{produto}', 'ProdutoController@excluir');
});

Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="/">Clique aqui</a> para ir para a página inicial';
});