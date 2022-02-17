<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile">Профиль</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout">Выход</a>
                </li>
            </ul>
            <div class="d-flex justify-content-center text-white">
                <?= $name ?>
            </div>
        </div>
    </div>
</nav>