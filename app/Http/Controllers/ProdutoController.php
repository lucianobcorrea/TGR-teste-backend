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

        return response()->json(['produto' => $produto]);
    }

    public function cadastrar(Request $request)
    {
        $mensagensDeErro = [
            'nome.min' => 'O nome deve ter pelo menos :min caracteres.',
            'nome.max' => 'O nome não pode ter mais que :max caracteres.',
            'descricao.min' => 'A descrição deve ter pelo menos :min caracteres.',
            'descricao.max' => 'A descrição não pode ter mais que :max caracteres.',
            'preco.required' => 'O preço é obrigatório.',
            'preco.gt' => 'O preço deve ser maior que zero.',
            'quantidade.required' => 'A quantidade é obrigatória.',
            'quantidade.gt' => 'A quantidade deve ser maior que zero.',
        ];

        $request->validate([
            'nome' => 'min:3|max:100',
            'descricao' => 'min:3|max:512',
            'preco' => 'required|gt:0',
            'quantidade' => 'required|gt:0'
        ], $mensagensDeErro);

        Produto::create($request->all());
    }

    public function cadastrarProdutoView()
    {
        return view('site.cadastrar-produto');
    }

    public function atualizar(Request $request, Produto $produto)
    {
        $mensagensDeErro = [
            'nome.min' => 'O nome deve ter pelo menos :min caracteres.',
            'nome.max' => 'O nome não pode ter mais que :max caracteres.',
            'descricao.min' => 'A descrição deve ter pelo menos :min caracteres.',
            'descricao.max' => 'A descrição não pode ter mais que :max caracteres.',
            'preco.required' => 'O preço é obrigatório.',
            'preco.gt' => 'O preço deve ser maior que zero.',
            'quantidade.required' => 'A quantidade é obrigatória.',
            'quantidade.gt' => 'A quantidade deve ser maior que zero.',
        ];

        $request->validate([
            'nome' => 'min:3|max:100',
            'descricao' => 'min:3|max:512',
            'preco' => 'required|gt:0',
            'quantidade' => 'required|gt:0'
        ]);

        $produto->update($request->all());
    }

    public function excluir(Produto $produto)
    {
        $produto->delete();
    }
}