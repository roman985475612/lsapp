<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">{{ config('app.name', 'LSAPP') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/services">Услуги</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/posts">Блог</a>
                </li>
             </ul>
        </div>
    </div>
</nav>
