<div class="container mt-2">
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">Регистрация</h2>

                    <?php if (!empty($message)): ?>
                        <div class="alert alert-info">
                            <?= $message ?>
                        </div>
                    <?php endif; ?>

                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label" for="fam">Фамилия:</label>
                            <input id="fam" type="text" class="form-control" placeholder="Иванов" name="surname" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="name">Имя:</label>
                            <input id="name" type="text" class="form-control" placeholder="Иван" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="otch">Отчество:</label>
                            <input id="otch" type="text" class="form-control" placeholder="Иванович" name="patronymic">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="pol">Пол:</label>
                            <select id="pol" name="gender_id" class="form-select">
                                <?php foreach ($genders as $gender): ?>
                                    <option value="<?= $gender->gender_id ?>">
                                        <?= $gender->gender_name ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="adres">Адрес регистрации:</label>
                            <input id="adres" type="text" class="form-control" placeholder="Ул.Пушкина, дом 4" name="registration_address">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="email">Адрес регистрации:</label>
                            <input id="email" type="email" class="form-control" placeholder="qwe@qwe.qwe" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="log">Логин:</label>
                            <input id="log" type="text" class="form-control" placeholder="Login" name="login" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="pass">Пароль:</label>
                            <input id="pass" type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="brd">Дата рождения:</label>
                            <input  id="brd" type="date" class="form-control" name="date_birth">
                        </div>

                        <button class="btn btn-primary w-100 ">Зарегистрироваться</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>