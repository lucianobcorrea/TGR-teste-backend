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
    <title>Cadastrar Produto</title>
</head>

<body class="custom-background">

    <nav class="navbar navbar-expand-lg navbar-custom-color">
        <div class="container-fluid container">
            <a class="navbar-brand" href="{{ route('site.principal') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" width="120" height="30"
                    class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse header-space-between-items" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('site.principal') }}">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('site.cadastrar-produto') }}">Cadastrar Produto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <form id="produto-form" class="form-container" action="{{ route('site.principal') }}" method="POST">
        @csrf
        <div class="form-items">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" placeholder="Ex.: Teclado Mecânico">
            <label for="descricao">Descrição</label>
            <input type="text" id="descricao" name="descricao"
                placeholder="Ex.: Um teclado mecânico tem interruptores individuais...">
            <label for="quantidade">Quantidade</label>
            <input type="number" id="quantidade" name="quantidade" placeholder="Ex.: 100">
            <label for="preco">Preço</label>
            <input type="text" id="preco" name="preco" placeholder="Ex.: 199.99">
            <button type="submit" class="btn btn-custom-color">Cadastrar</button>
            <div id="errors" class="error-container"></div>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#produto-form").submit(function(e) {
                e.preventDefault();

                var form = $(this);
                var formData = form.serialize();

                $.ajax({
                    type: "POST",
                    url: 'cadastrar',
                    data: formData,
                    success: function(response) {
                        window.location.href = '{{ route('site.principal') }}';
                    },
                    error: function(error) {
                        $('#errors').empty();

                        var errors = error.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $('#errors').append('<p>' + value + '</p>');
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
