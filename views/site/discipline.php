<div class="container mt-2">
    <div class="card shadow col-md-4">
        <div class="card-body">
            <h2 class="mb-4">Редактирование дисциплины</h2>

            <form method="post">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

                <label class="form-label" for="discipline_name">Название дисциплины:</label>
                <input id="discipline_name" type="text" name="discipline_name" class="form-control mb-2"
                       value="<?= $discipline->discipline_name ?>" placeholder="Название дисциплины">

                <label class="form-label" for="discipline_description">Описание:</label>
                <textarea id="discipline_description" name="discipline_description" class="form-control mb-2"
                          rows="4" placeholder="Описание"><?= $discipline->discipline_description ?></textarea>

                <button class="btn btn-success">Сохранить</button>
                <a href="<?= app()->route->getUrl('/disciplines') ?>" class="btn btn-secondary">Назад</a>
            </form>
        </div>
    </div>
</div>
