<div class="container mt-2">
    <div class="card shadow col-md-4">
        <div class="card-body">
            <h2 class="mb-4">Добавить пользователя</h2>

            <form method="post">
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Фамилия" name="surname" required>
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Имя" name="name" required>
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Отчество" name="patronymic">
                </div>


                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Адрес регистрации" name="registration_address">
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Логин" name="login" required>
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Пароль" name="password" required>
                </div>

                <div class="mb-3">
                    <input type="date" class="form-control" name="date_birth">
                </div>

                <div class="mb-3">
                    <select name="gender_id" class="form-select">
                        <?php foreach ($genders as $gender): ?>
                            <option value="<?= $gender->gender_id ?>">
                                <?= $gender->gender_name ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <select name="role_id" class="form-select">
                        <?php foreach ($roles as $role): ?>
                            <option value="<?= $role->role_id ?>">
                                <?= $role->role_name ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button class="btn btn-success">Добавить</button>
                <a href="<?= app()->route->getUrl('/users') ?>" class="btn btn-secondary">Назад</a>

            </form>
        </div>
    </div>
</div>