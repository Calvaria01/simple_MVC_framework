<main class="container mt-5 pt-5">
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="row justify-content-md-center">
            <div class="alert alert-primary alert-dismissible col-md-4" role="alert" id="liveAlert">
                <strong><?= $_SESSION['message'] ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php } ?>
<?php foreach($content['Posts'] as $post) { ?>
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 fst-italic"><?= $post['title'] ?></h1>
            <p class="lead my-3"><?= $post['text'] ?></p>
        </div>
    </div>
<?php } ?>
</main>