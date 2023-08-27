<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/principal.style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{ asset('js/deleteProduto.js') }}"></script>
    <title>Listar Produtos</title>
</head>

<body class="custom-background">

    @include('site.layouts.components.header')

    <div class="container">
        <div class="cards-container">
            @foreach ($produtos as $produto)
                <div class="card" id="produto_{{ $produto->id }}" style="width: 18rem;">
                    <div class="card-body">
                        <div class="delete-button-container">
                            <h5 class="card-title">{{ $produto->nome }}</h5>
                            <button type="button" class="btn-close" aria-label="Close" data-bs-toggle="modal"
                                data-bs-target="#exampleModal_{{ $produto->id }}"></button>
                        </div>
                        <p class="card-text">{{ $produto->descricao }}
                        </p>
                        <div class="card-price-quantity">
                            <p>{{ $produto->preco }}R$</p>
                            <p><b>Quantidade:</b> {{ $produto->quantidade }}Un.</p>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal_{{ $produto->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Produto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Deseja excluir o produto?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" onclick='deleteProduto({{ $produto->id }})'
                                    class="btn btn-danger">Excluir</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
