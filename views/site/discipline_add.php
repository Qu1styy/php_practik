<div class="container mt-2">
    <div class="card shadow col-md-4">
        <div class="card-body">
            <h2 class="mb-4">Добавить дисциплину</h2>
            <?= $message ?? ''; ?>

            <form method="post">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

                <div class="mb-3">
                    <label class="form-label" for="discipline_name">Название дисциплины</label>
                    <input id="discipline_name" type="text" class="form-control" placeholder="Название дисциплины" name="discipline_name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="discipline_description">Описание</label>
                    <input id="discipline_description" type="text" class="form-control" placeholder="Описание" name="discipline_description" required>
                </div>

                <button class="btn btn-success">Добавить</button>
                <a href="<?= app()->route->getUrl('/disciplines') ?>" class="btn btn-secondary">Назад</a>

            </form>
        </div>
    </div>
</div>
