<div class="container mt-2">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="mb-4">
                Пользователи
                <a style="text-decoration: none" href="<?= app()->route->getUrl('/users/add') ?>">+</a>
            </h2>

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
                    <th>Пол</th>
                    <th>Роль</th>

                </tr>

                <?php foreach ($users as $user): ?>
                    <tr>
                        <td>
                            <a href="<?= app()->route->getUrl('/user?id=' . $user->user_id) ?>">
                                <?= $user->user_id ?>
                            </a>
                        </td>
                        <td><?= $user->surname ?></td>
                        <td><?= $user->name ?></td>
                        <td><?= $user->patronymic ?></td>
                        <td><?= $user->date_birth ?></td>
                        <td><?= $user->registration_address ?></td>
                        <td><?= $user->login ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->gender->gender_name ?></td>
                        <td><?= $user->role->role_name ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</div>