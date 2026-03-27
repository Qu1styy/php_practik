<div class="container mt-2">
    <div class="card shadow col-md-4">
        <div class="card-body">
            <h2 class="mb-4">Добавить кафедру</h2>

            <form method="post">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

                <div class="mb-3">
                    <label class="form-label" for="department_name">Название кафедры</label>
                    <input id="department_name" type="text" class="form-control" placeholder="Название кафедры" name="department_name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="department_description">Описание</label>
                    <input id="department_description" type="text" class="form-control" placeholder="Описание" name="department_description" required>
                </div>

                <button class="btn btn-success">Добавить</button>
                <a href="<?= app()->route->getUrl('/departments') ?>" class="btn btn-secondary">Назад</a>

            </form>
        </div>
    </div>
</div>