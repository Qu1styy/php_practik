<div class="container mt-2">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="mb-4">
                Диспциплины
                <?php if (app()->auth::user()->role_id != 3): ?>
                    <a style="text-decoration: none" href="<?= app()->route->getUrl('/discipline/add') ?>">+</a>
                <?php endif; ?>
            </h2>
            <form class="d-flex mb-3" method="get" action="<?= app()->route->getUrl('/disciplines') ?>">
                <input type="text" name="search" class="form-control me-2"
                       value="<?= htmlspecialchars($search ?? '', ENT_QUOTES, 'UTF-8') ?>"
                       placeholder="Название, описание или ФИО">
                <button class="btn btn-primary">Найти</button>
            </form>
            <?php if (count($disciplines) === 0): ?>
                <p class="mt-2 mb-0">Ничего не найдено</p>
            <?php endif; ?>

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
                            <?php if (app()->auth::user()->role_id == 3): ?>
                                <?= $discipline->discipline_id ?>
                            <?php else: ?>
                                <a href="<?= app()->route->getUrl('/discipline?id=' . $discipline->discipline_id) ?>">
                                    <?= $discipline->discipline_id ?>
                                </a>
                            <?php endif; ?>
                        </td>
                        <td><?= $discipline->discipline_name ?></td>
                        <td><?= $discipline->discipline_description ?></td>
                        <td>
                            <?php foreach ($discipline->user as $user): ?>
                                <?php if (app()->auth::user()->role_id == 3): ?>
                                    <?= $user->surname ?> <?= $user->name ?> <?= $user->patronymic ?>
                                <?php else: ?>
                                    <a href="<?= app()->route->getUrl('/user?id=' . $user->user_id) ?>">
                                        <?= $user->surname ?> <?= $user->name ?> <?= $user->patronymic ?>
                                    </a>
                                <?php endif; ?><br><br>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</div>
