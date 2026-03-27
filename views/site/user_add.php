<div class="container mt-2">
    <div class="card shadow col-md-4">
        <div class="card-body">
            <h2 class="mb-4">Добавить пользователя</h2>

            <form method="post">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

                <div class="mb-3">
                    <label for="surname" class="form-label">Фамилия</label>
                    <input type="text" id="surname" class="form-control" placeholder="Фамилия" name="surname" required>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" id="name" class="form-control" placeholder="Имя" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="patronymic" class="form-label">Отчество</label>
                    <input type="text" id="patronymic" class="form-control" placeholder="Отчество" name="patronymic">
                </div>

                <div class="mb-3">
                    <label for="registration_address" class="form-label">Адрес регистрации</label>
                    <input type="text" id="registration_address" class="form-control" placeholder="Адрес регистрации" name="registration_address">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-control" placeholder="Email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="login" class="form-label">Логин</label>
                    <input type="text" id="login" class="form-control" placeholder="Логин" name="login" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" id="password" class="form-control" placeholder="Пароль" name="password" required>
                </div>

                <div class="mb-3">
                    <label for="date_birth" class="form-label">Дата рождения</label>
                    <input type="date" id="date_birth" class="form-control" name="date_birth">
                </div>

                <div class="mb-3">
                    <label for="gender_id" class="form-label">Пол</label>
                    <select id="gender_id" name="gender_id" class="form-select">
                        <?php foreach ($genders as $gender): ?>
                            <option value="<?= $gender->gender_id ?>">
                                <?= $gender->gender_name ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <?php if (app()->auth::user()->role_id == 2): ?>
                        <input type="hidden" name="role_id" value="3">
                <?php endif; ?>

                <?php if (app()->auth::user()->role_id == 1): ?>
                    <div class="mb-3">
                        <label for="role_id" class="form-label">Роль</label>
                        <select id="role_id" name="role_id" class="form-select">
                            <?php foreach ($roles as $role): ?>
                                <option value="<?= $role->role_id ?>">
                                    <?= $role->role_name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php endif; ?>

                <button class="btn btn-success">Добавить</button>
                <a href="<?= app()->route->getUrl('/users') ?>" class="btn btn-secondary">Назад</a>

            </form>
        </div>
    </div>
</div>