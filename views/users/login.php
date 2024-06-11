<?php
/** @var string $errorMessage повідомлення про помилку*/
$this->Title = 'WORK-LiN';
$this->Title2 = 'Сторінка авторизації';
?>

<form method="post" action="">
    <?php
    if (!empty($errorMessage)) : ?>
        <div class="alert alert-danger" role="alert">
            <?=$errorMessage; ?>
        </div>
    <?php endif; ?>
    <div class="mb-3">
        <label for="inputEmail" class="form-label">Логін/Email</label>
        <input name="login" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="inputPassword" class="form-label">Пароль</label>
        <input name="password" type="password" class="form-control" id="inputPassword">
    </div>
    <button type="submit" class="btn btn-primary">Увійти</button>
</form>