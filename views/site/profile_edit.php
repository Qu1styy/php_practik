<div class="container mt-2">
    <div class="card shadow col-md-4">
        <div class="card-body ">
            <h2 class="mb-4">Редактирование профиля</h2>

            <form method="post">

                <input type="text" name="surname" class="form-control mb-2"
                       value="<?= $user->surname ?>" placeholder="Фамилия">

                <input type="text" name="name" class="form-control mb-2"
                       value="<?= $user->name ?>" placeholder="Имя">

                <input type="text" name="patronymic" class="form-control mb-2"
                       value="<?= $user->patronymic ?>" placeholder="Отчество">

                <input type="email" name="email" class="form-control mb-2"
                       value="<?= $user->email ?>" placeholder="Email">

                <input type="date" name="date_birth" class="form-control mb-2"
                       value="<?= $user->date_birth ?>">

                <input type="text" name="registration_address" class="form-control mb-2"
                       value="<?= $user->registration_address ?>" placeholder="Адрес">

                <select name="gender_id" class="form-control mb-2">
                    <option value="1">Мужской</option>
                    <option value="2">Женский</option>
                </select>

                <button class="btn btn-success">Сохранить</button>
                <a href="<?= app()->route->getUrl('/profile') ?>" class="btn btn-secondary">Назад</a>

            </form>
        </div>
    </div>
</div>