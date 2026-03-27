<div class="container mt-2">
    <div class="card shadow col-md-4">
        <div class="card-body">
            <h2><?= $message ?? ''; ?> <?= app()->auth::user()->name ?> 👋🏻</h2>
            <a href="<?= app()->route->getUrl('/users') ?>" class="btn btn-primary">
                Пользователи
            </a>
            <a href="<?= app()->route->getUrl('/departments') ?>" class="btn btn-primary">
                Кафедры
            </a>
            <a href="<?= app()->route->getUrl('/disciplines') ?>" class="btn btn-primary">
                Дисциплины
            </a>
        </div>
    </div>
</div>

<?php //if (app()->auth::user()->role_id == 1): ?>
<?php //endif; ?>
