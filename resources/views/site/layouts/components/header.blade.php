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