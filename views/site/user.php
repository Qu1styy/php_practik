<div class="container mt-2">
    <div class="card shadow col-md-4">
        <div class="card-body">
            <?php foreach ($users as $user): ?>
            <h2 class="mb-4"><?= $user->name ?> <?= $user->patronymic ?></h2>

            <table class="table">

                <tr>
                    <th>ID</th>
                    <td><?= $user->user_id ?></td>
                </tr>
                <tr>
                    <th>Фамилия</th>
                    <td><?= $user->surname ?></td>
                </tr>
                <tr>
                    <th>Имя</th>
                    <td><?= $user->name ?></td>
                </tr>
                <tr>
                    <th>Отчество</th>
                    <td><?= $user->patronymic ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= $user->email ?></td>
                </tr>
                <tr>
                    <th>Логин</th>
                    <td><?= $user->login ?></td>
                </tr>
                <tr>
                    <th>Дата рождения</th>
                    <td><?= $user->date_birth ?></td>
                </tr>
                <tr>
                    <th>Адрес</th>
                    <td><?= $user->registration_address ?></td>
                </tr>
                <tr>
                    <th>Пол</th>
                    <td><?= $user->gender->gender_name ?></td>
                </tr>
                <tr>
                    <th>Роль</th>
                    <td><?= $user->role->role_name ?? 'У вас нет роли' ?></td>
                </tr>
            </table>
            <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

