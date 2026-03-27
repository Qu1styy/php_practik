<div class="container mt-2">
    <div class="card shadow col-md-12">
        <div class="card-body">
            <?php foreach ($disciplines as $discipline): ?>
                <h2 class="mb-4"><?= $discipline->discipline_name ?> </h2>

                <table class="table">

                    <tr>
                        <th>ID</th>
                        <td><?= $discipline->discipline_id ?></td>
                    </tr>
                    <tr>
                        <th>Название</th>
                        <td><?= $discipline->discipline_name ?></td>
                    </tr>
                    <tr>
                        <th>Описание</th>
                        <td><?= $discipline->discipline_description ?></td>
                    </tr>
                </table>
            <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
