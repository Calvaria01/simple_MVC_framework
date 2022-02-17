<main class="container mt-5 pt-5 col-md-3">
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="row justify-content-md-center">
            <div class="alert alert-primary alert-dismissible" role="alert" id="liveAlert">
                <strong><?= $_SESSION['message'] ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php } ?>
    <form action="login" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="user[email]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" name="user[password]" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" name="login" class="btn btn-primary">Войти</button>
    </form>
</main>