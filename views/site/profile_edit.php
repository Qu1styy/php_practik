<div class="container mt-2">
    <div class="card shadow col-md-4" >
        <div class="card-body " >
            <h2 class="mb-4">Редактирование профиля</h2>

            <?php if (!empty($message)): ?>
                <div class="alert alert-danger"><?= $message ?></div>
            <?php endif; ?>

            <form method="post" enctype="multipart/form-data">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

                Аватар:
                <?php if (!empty($avatarUrl)): ?>
                    <div class="mb-2">
                        <img src="<?= app()->route->getUrl($avatarUrl) ?>" alt="avatar" width="100" height="100"
                             style="object-fit: cover; border-radius: 25%">
                    </div>
                <?php endif; ?>

                <input type="file" name="avatar" class="form-control mb-2"
                       accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">

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
                        <option value="<?= $gender->gender_id ?>" <?php if ($gender->gender_id == $user->gender_id) echo 'selected'; ?>>
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
