<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function listar()
    {
        $produtos = Produto::all();

        return $produtos;
    }

    public function buscar($nome)
    {
        $produtos = Produto::whereRaw('LOWER(nome) LIKE ?', ['%' . strtolower($nome) . '%'])->get();

        return response()->json(['produtos' => $produtos]);
    }

    public function detalhar(Produto $produto)
    {
        $produto = Produto::find($produto);

        return view('site.principal', ['produto' => $produto]);
    }

    public function cadastrar(Request $request)
    {
        $request->validate([
            'nome' => 'min:3|max:100',
            'descricao' => 'min:3|max:512',
            'preco' => 'required|gt:0',
            'quantidade' => 'required|gt:0'
        ]);

        Produto::create($request->all());
    }

    public function cadastrarProdutoView() {
        return view('site.cadastrar-produto');
    }

    public function atualizar(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'min:3|max:100',
            'preco' => 'required|gt:0',
            'quantidade' => 'required|gt:0'
        ]);

        $produto = Produto::find($produto);

        $produto->update($request->all());
    }

    public function excluir(Produto $produto)
    {
        $produto->delete();
    }
}