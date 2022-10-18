<nav class="navbar navbar-expand-lg" style="background-color: #FEC5BB;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('contatos/')}}">Contatos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('livros/')}}">Livros</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{url('emprestimos/')}}">Empréstimos</a>
            </li>
            <li class="nav-item">
                @yield('create')
            </li>
        </ul>
        <form class="d-flex">
            @yield('search')
        </form>
        </div>
        <div class="name-page">
            @yield('page')
        </div>
    </div>
</nav>