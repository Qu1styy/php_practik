<div class="container">
    <h2><?= $message ?? ''; ?> <?= app()->auth::user()->name ?></h2>
    <?php if (app()->auth::user()->role_id == 1): ?>
        <a href="<?= app()->route->getUrl('/users') ?>" class="btn btn-primary">
            Пользователи
        </a>
    <?php endif; ?>
</div>