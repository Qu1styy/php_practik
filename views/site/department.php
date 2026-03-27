<div class="container mt-2">
    <div class="card shadow col-md-12">
        <div class="card-body">
            <?php foreach ($departments as $department): ?>
                <h2 class="mb-4"><?= $department->department_name ?> </h2>

                <table class="table">

                    <tr>
                        <th>ID</th>
                        <td><?= $department->department_id ?></td>
                    </tr>
                    <tr>
                        <th>Название</th>
                        <td><?= $department->department_name ?></td>
                    </tr>
                    <tr>
                        <th>Описание</th>
                        <td><?= $department->department_description ?></td>
                    </tr>
                </table>
            <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

