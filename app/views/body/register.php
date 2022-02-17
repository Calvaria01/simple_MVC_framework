<main class="container mt-5 pt-5 col-md-3">
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="row justify-content-md-center">
            <div class="alert alert-primary alert-dismissible" role="alert" id="liveAlert">
                <strong><?= $_SESSION['message'] ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php } ?>
    <form action="register" method="post">
        <div class="mb-3">
            <label for="FirstName" class="form-label">Имя</label>
            <input type="text" name="user[first_name]"
                   value="<?= $content['first_name'] ?? '' ?>" class="form-control"
                   id="FirstName">
        </div>
        <div class="mb-3">
            <label for="LastName" class="form-label">Фамилия</label>
            <input type="text" name="user[last_name]" value="<?= $content['last_name'] ?? '' ?>" class="form-control"
                   id="LastName">
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" name="user[email]" value="<?= $content['email'] ?? '' ?>" class="form-control"
                   id="Email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="Password1" class="form-label">Пароль</label>
            <input type="password" name="user[password]" class="form-control" id="Password1">
        </div>
        <div class="mb-3">
            <label for="Password2" class="form-label">Повторите пароль</label>
            <input type="password" name="user[password_repeat]" class="form-control" id="Password2">
        </div>
        <button type="submit" name="register" class="btn btn-primary">Отправить</button>
    </form>
</main>