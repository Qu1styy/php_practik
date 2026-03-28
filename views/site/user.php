<div class="container mt-2">
    <div class="card shadow col-md-4" >
        <div class="card-body " >
            <h2 class="mb-4">Редактирование профиля</h2>

            <form method="post">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

                <label class="form-label" for="sname">Фамилия:</label>
                <input id="sname" type="text" name="surname" class="form-control mb-2"
                       value="<?= $user->surname ?>" placeholder="Фамилия">

                <label class="form-label" for="name">Имя:</label>
                <input id="name" type="text" name="name" class="form-control mb-2"
                       value="<?= $user->name ?>" placeholder="Имя">

                <label class="form-label" for="pat">Отчество:</label>
                <input id="pat" type="text" name="patronymic" class="form-control mb-2"
                       value="<?= $user->patronymic ?>" placeholder="Отчество">

                <label class="form-label" for="email">Почта:</label>
                <input id="email" type="email" name="email" class="form-control mb-2"
                       value="<?= $user->email ?>" placeholder="Email">

                <label class="form-label" for="brd">День рождения:</label>
                <input id="brd" type="date" name="date_birth" class="form-control mb-2"
                       value="<?= $user->date_birth ?>">

                <label class="form-label" for="adres">Адрес регистрации:</label>
                <input id="adres" type="text" name="registration_address" class="form-control mb-2"
                       value="<?= $user->registration_address ?>" placeholder="Адрес">

                <label class="form-label" for="pol">Пол:</label>
                <select id="pol" name="gender_id" class="form-select mb-2">
                    <?php foreach ($genders as $gender): ?>
                        <option value="<?= $gender->gender_id ?>" <?php if ($gender->gender_id == $user->gender_id) echo 'selected'; ?>>
                            <?= $gender->gender_name ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <?php if (app()->auth::user()->role_id == 2): ?>
                    <input type="hidden" name="role_id" value="<?= $user->role_id ?>">
                <?php endif; ?>

                <?php if (app()->auth::user()->role_id == 1): ?>
                    <div class="mb-3">
                        <label for="role_id" class="form-label">Роль</label>
                        <select id="role_id" name="role_id" class="form-select">
                            <?php foreach ($roles as $role): ?>
                                <option value="<?= $role->role_id ?>" <?php if ($role->role_id == $user->role_id) echo 'selected'; ?>>
                                    <?= $role->role_name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php endif; ?>

                <label class="form-label">Кафедры (для выбора зажмите ctrl)</label>
                <select name="departments[]" multiple class="form-select mb-2">
                    <?php foreach ($departments as $department): ?>
                        <option value="<?= $department->department_id ?>"
                                <?php if(in_array($department->department_id, $userDepartments)) echo 'selected'; ?>>
                            <?= $department->department_name ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label class="form-label">Дисциплины (Для выбора зажмите ctrl)</label>
                <select name="disciplines[]" multiple class="form-select mb-2">
                    <?php foreach ($disciplines as $discipline): ?>
                        <option value="<?= $discipline->discipline_id ?>"
                                <?php if(in_array($discipline->discipline_id, $userDisciplines)) echo 'selected'; ?>>
                            <?= $discipline->discipline_name ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <button class="btn btn-success">Сохранить</button>
                <a href="<?= app()->route->getUrl('/users') ?>" class="btn btn-secondary">Назад</a>

            </form>
        </div>
    </div>
</div>
