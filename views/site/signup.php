<div class="container mt-2">
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body ">
                    <h2 class="text-center mb-4">Регистрация</h2>

                    <?php if (!empty($message)): ?>
                        <div class="alert alert-info">
                            <?= $message ?>
                        </div>
                    <?php endif; ?>

                    <form method="post">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Фамилия" name="surname" required>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Имя" name="name" required>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Отчество" name="patronymic">
                        </div>

                        <div class="mb-3">
                            <select class="form-select" name="gender_id">
                                <option value="1">Мужской</option>
                                <option value="2">Женский</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Адрес регистрации" name="registration_address">
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Логин" name="login" required>
                        </div>

                        <div class="mb-3">
                            <input type="password" class="form-control" placeholder="Пароль" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Дата рождения</label>
                            <input type="date" class="form-control" name="date_birth">
                        </div>

                        <button class="btn btn-primary w-100 ">Зарегистрироваться</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>