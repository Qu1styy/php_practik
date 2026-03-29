<div class="container mt-2">
    <div class="card shadow col-md-4">
        <div class="card-body">
            <h2 class="mb-4">Редактирование кафедры</h2>
            <?= $message ?? ''; ?>

            <form method="post">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

                <label class="form-label" for="department_name">Название кафедры:</label>
                <input id="department_name" type="text" name="department_name" class="form-control mb-2"
                       value="<?= $department->department_name ?>" placeholder="Название кафедры">

                <label class="form-label" for="department_description">Описание:</label>
                <textarea id="department_description" name="department_description" class="form-control mb-2"
                          rows="4" placeholder="Описание"><?= $department->department_description ?></textarea>

                <button class="btn btn-success">Сохранить</button>
                <a href="<?= app()->route->getUrl('/departments') ?>" class="btn btn-secondary">Назад</a>
            </form>
        </div>
    </div>
</div>
