<div class="container mt-2">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="mb-4">
                Кафедры
                <a style="text-decoration: none" href="<?= app()->route->getUrl('/department/add') ?>">+</a>
            </h2>

            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Название кафедры</th>
                    <th>Описание</th>
                    <th>ФИО</th>
                </tr>

                <?php foreach ($departments as $department): ?>
                    <tr>
                        <td>
                            <a href="<?= app()->route->getUrl('/department?id=' . $department->department_id) ?>">
                                <?= $department->department_id ?>
                            </a>
                        </td>
                        <td><?= $department->department_name ?></td>
                        <td><?= $department->department_description ?></td>
                        <td>
                            <?php foreach ($department->user as $user): ?>
                                <?= $user->surname ?> <?= $user->name ?> <?= $user->patronymic ?><br><br>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</div>
