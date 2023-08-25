<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal(ProdutoController $produtoController) {
        $produtos = $produtoController->listar();

        return view('site.principal', ['produtos' => $produtos]);
    }
}
