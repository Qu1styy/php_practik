<div class="container mt-2">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="mb-4">
                Пользователи
                <?php if (app()->auth::user()->role_id != 3): ?>
                    <a style="text-decoration: none" href="<?= app()->route->getUrl('/users/add') ?>">+</a>
                <?php endif; ?>
            </h2>
            <form class="d-flex" method="get" action="<?= app()->route->getUrl('/users') ?>">
                <input type="text" name="search" class="form-control me-2"
                       value="<?= htmlspecialchars($search ?? '', ENT_QUOTES, 'UTF-8') ?>"
                       placeholder="Фамилия, логин или email">
                <button class="btn btn-primary">Найти</button>
            </form>
            <?php if (count($users) === 0): ?>
                <p class="mt-2 mb-0">Ничего не найдено</p>
            <?php endif; ?>

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
                    <th>Роль</th>
                    <th>Кафедры</th>
                    <th>Дисциплины</th>

                </tr>

                <?php foreach ($users as $user): ?>
                    <tr>
                        <td>
                            <?php if (app()->auth::user()->role_id == 3): ?>
                                <?= $user->user_id ?>
                            <?php else: ?>
                                <a href="<?= app()->route->getUrl('/user?id=' . $user->user_id) ?>">
                                    <?= $user->user_id ?>
                                </a>
                            <?php endif; ?>
                        </td>
                        <td><?= $user->surname ?></td>
                        <td><?= $user->name ?></td>
                        <td><?= $user->patronymic ?></td>
                        <td><?= $user->date_birth ?></td>
                        <td><?= $user->registration_address ?></td>
                        <td><?= $user->login ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->role->role_name ?></td>
                        <td><?php foreach ($user->department as $department): ?>
                                <?= $department->department_name ?><br><br>
                            <?php endforeach; ?></td>
                        <td> <?php foreach ($user->discipline as $discipline): ?>
                                <?= $discipline->discipline_name ?><br><br>
                            <?php endforeach; ?></td>

                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</div>
