<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/principal.style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cadastrar-produto.style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{ asset('js/cadastrarProduto.js') }}"></script>
    <title>Cadastrar Produto</title>
</head>

<body class="custom-background">

    @include('site.layouts.components.header')

    <form id="produto-form" class="form-container" action="{{ route('site.principal') }}" method="POST">
        @csrf
        <div class="form-items">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" placeholder="Ex.: Teclado Mecânico">
            <label for="descricao">Descrição</label>
            <textarea type="text" id="descricao" name="descricao" rows="3" cols="50"
                placeholder="Ex.: Um teclado mecânico tem interruptores individuais..."></textarea>
            <label for="quantidade">Quantidade</label>
            <input type="number" id="quantidade" name="quantidade" placeholder="Ex.: 100">
            <label for="preco">Preço</label>
            <input type="text" id="preco" name="preco" placeholder="Ex.: 199.99">
            <button type="submit" class="btn btn-custom-color">Cadastrar</button>
            <div id="errors" class="error-container"></div>
        </div>
    </form>
</body>

</html>
