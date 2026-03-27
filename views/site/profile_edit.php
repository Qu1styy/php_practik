<div class="container mt-2">
    <div class="card shadow col-md-4" >
        <div class="card-body " >
            <h2 class="mb-4">Редактирование профиля</h2>

            <form method="post">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

                <label class="form-label" for="sname">Фамилия:</label>
                <input id="sname" type="text" name="surname" class="form-control mb-2"
                       value="<?= $user->surname ?>" placeholder="Фамилия">

                <label class="form-label" for="name">Имя:</label>
                <input id="name" type="text" name="name" class="form-control mb-2"
                       value="<?= $user->name ?>" placeholder="Имя">

                <label class="form-label" for="pat">Отчество:</label>
                <input id="pat" type="text" name="patronymic" class="form-control mb-2"
                       value="<?= $user->patronymic ?>" placeholder="Отчество">

                <label class="form-label" for="email">Почта:</label>
                <input id="email" type="email" name="email" class="form-control mb-2"
                       value="<?= $user->email ?>" placeholder="Email">

                <label class="form-label" for="brd">День рождения:</label>
                <input id="brd" type="date" name="date_birth" class="form-control mb-2"
                       value="<?= $user->date_birth ?>">

                <label class="form-label" for="adres">Адрес регистрации:</label>
                <input id="adres" type="text" name="registration_address" class="form-control mb-2"
                       value="<?= $user->registration_address ?>" placeholder="Адрес">

                <label class="form-label" for="pol">Пол:</label>
                <select id="pol" name="gender_id" class="form-select mb-2">
                    <?php foreach ($genders as $gender): ?>
                        <option value="<?= $gender->gender_id ?>">
                            <?= $gender->gender_name ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <button class="btn btn-success">Сохранить</button>
                <a href="<?= app()->route->getUrl('/profile') ?>" class="btn btn-secondary">Назад</a>

            </form>
        </div>
    </div>
</div>