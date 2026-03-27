<div class="container mt-2">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="mb-4">
                Диспциплины
                <a style="text-decoration: none" href="<?= app()->route->getUrl('/discipline/add') ?>">+</a>
            </h2>

            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Название кафедры</th>
                    <th>Описание</th>
                    <th>ФИО</th>
                </tr>

                <?php foreach ($disciplines as $discipline): ?>
                    <tr>
                        <td>
                            <a href="<?= app()->route->getUrl('/discipline?id=' . $discipline->discipline_id) ?>">
                                <?= $discipline->discipline_id ?>
                            </a>
                        </td>
                        <td><?= $discipline->discipline_name ?></td>
                        <td><?= $discipline->discipline_description ?></td>
                        <td>
                            <?php foreach ($discipline->user as $user): ?>
                                <?= $user->surname ?> <?= $user->name ?> <?= $user->patronymic ?><br><br>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</div>
