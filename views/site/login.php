<div class="container mt-2">
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">

                    <h2 class="text-center mb-4">Авторизация</h2>

                    <h3><?= $message ?? ''; ?></h3>

                    <h3><?= app()->auth->user()->name ?? ''; ?></h3>
                    <?php
                    if (!app()->auth::check()):
                    ?>

                    <form method="post">

                        <div class="mb-3">
                            <label for="log">Логин:</label>
                            <input id="log" type="text" class="form-control" placeholder="Login" name="login" required>
                        </div>


                        <div class="mb-3">
                            <label for="pass">Пароль:</label>
                            <input id="pass" type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>

                        <button class="btn btn-primary w-100 ">Войти</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif;