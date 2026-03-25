<div class="container mt-2">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="mb-4">Пользователи <a style="text-decoration: none" href="<?= app()->route->getUrl('/users/add') ?>">+</a></h2>

            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Отчество</th>
                    <th>Дата рождения</th>
                    <th>Адрес</th>
                    <th>Логин</th>
                    <th>Email</th>
                    <th></th>
                </tr>

                <?php foreach ($users as $user): ?>
                    <form method="post" action="<?= app()->route->getUrl('/users') ?>">
                        <tr>
                            <td>
                                <?= $user->user_id ?>
                                <input type="hidden" name="id" value="<?= $user->user_id ?>">
                            </td>

                            <td><input class="form-control form-control-sm" type="text" name="surname"
                                       value="<?= $user->surname ?>"></td>
                            <td><input class="form-control form-control-sm" type="text" name="name"
                                       value="<?= $user->name ?>"></td>
                            <td><input class="form-control form-control-sm" type="text" name="patronymic"
                                       value="<?= $user->patronymic ?>"></td>
                            <td><input class="form-control form-control-sm" type="date" name="date_birth"
                                       value="<?= $user->date_birth ?>"></td>
                            <td><input class="form-control form-control-sm" type="text" name="registration_address"
                                       value="<?= $user->registration_address ?>"></td>
                            <td><input class="form-control form-control-sm" type="text" name="login"
                                       value="<?= $user->login ?>"></td>
                            <td><input class="form-control form-control-sm" type="email" name="email"
                                       value="<?= $user->email ?>"></td>
                            <td>
                                <button class="btn btn-primary" type="submit">Сохранить</button>
                            </td>
                        </tr>
                    </form>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</div>