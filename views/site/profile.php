<div class="container mt-2">
    <div class="card shadow col-md-4">
        <div class="card-body">
            <h2 class="mb-4"><?= app()->auth::user()->name ?> <?= app()->auth::user()->patronymic ?></h2>

            <?php if (!empty($avatarUrl)): ?>
                <div class="mb-3">
                    <img src="<?= app()->route->getUrl($avatarUrl) ?>" alt="avatar" width="120" height="120"
                         style="object-fit: cover; border-radius: 25%">
                </div>
            <?php endif; ?>

            <table class="table">
                <tr>
                    <th>Фамилия</th>
                    <td><?= app()->auth::user()->surname ?></td>
                </tr>
                <tr>
                    <th>Имя</th>
                    <td><?= app()->auth::user()->name ?></td>
                </tr>
                <tr>
                    <th>Отчество</th>
                    <td><?= app()->auth::user()->patronymic ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= app()->auth::user()->email ?></td>
                </tr>
                <tr>
                    <th>Логин</th>
                    <td><?= app()->auth::user()->login ?></td>
                </tr>
                <tr>
                    <th>Дата рождения</th>
                    <td><?= date('d.m.Y', strtotime(app()->auth::user()->date_birth)) ?></td>
                </tr>
                <tr>
                    <th>Адрес</th>
                    <td><?= app()->auth::user()->registration_address ?></td>
                </tr>
                <tr>
                    <th>Пол</th>
                    <td><?= app()->auth::user()->gender->gender_name ?></td>
                </tr>
                <tr>
                    <th>Роль</th>
                    <td><?= app()->auth::user()->role->role_name ?? 'У вас нет роли' ?></td>
                </tr>
            </table>


            <a href="<?= app()->route->getUrl('/profile/edit') ?>" class="btn btn-primary">Редактировать профиль</a>

        </div>
    </div>
</div>
