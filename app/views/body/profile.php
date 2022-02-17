<main class="container mt-5 pt-5">
    <section style="background-color: #eee;">
        <div class="container py-5">
            <?php if (isset($_SESSION['message'])) { ?>
            <div class="row justify-content-md-center">
            <div class="alert alert-primary alert-dismissible col-md-4" role="alert" id="liveAlert">
                <strong><?= $_SESSION['message'] ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <img src="public/img/<?= $content['User_image']['image'] ?>" alt="avatar" class="img-fluid">
                    </div>
                    <form action="photo" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Загрузить новую аватарку</label>
                            <input class="form-control" type="file" name="avatar" id="formFile">
                        </div>
                        <button type="submit" name="photo" class="btn btn-success">Загрузить</button>
                    </form>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Полное имя</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $content['User']['first_name'] . " " . $content['User']['last_name'] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $content['User']['email'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <form action="edit" method="post">
                                <p><h5>Редактировать профиль</h5></p>
                                <div class="row mb-3">
                                    <label for="inputName" class="col-sm-2 col-form-label">Имя</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="user[first_name]" value="<?= $content['User']['first_name'] ?>" class="form-control" id="inputName">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputLastName" class="col-sm-2 col-form-label">Фамилия</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="user[last_name]" value="<?= $content['User']['last_name'] ?>" class="form-control" id="inputLastName">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-6">
                                        <input type="email" name="user[email]" value="<?= $content['User']['email'] ?>" class="form-control" id="inputEmail3">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Пароль</label>
                                    <div class="col-sm-4">
                                        <input type="password" name="user[password]" value="<?= $content['User']['password'] ?>" class="form-control" id="inputPassword3">
                                    </div>
                                </div>
                                <button type="submit" name="edit" class="btn btn-success">Изменить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>