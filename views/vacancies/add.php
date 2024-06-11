<?php
/** @var string $errorMessage повідомлення про помилку*/
/** @var Controller $controller */
$this->Title = 'WORK_ADD';
$this->Title2 = 'Створення Оголошення:';
?>
<form class="row g-3" method="post">
    <?php if (!empty($errorMessage)) : ?>
        <div class="alert alert-danger" role="alert">
            <?=$errorMessage; ?>
        </div>
    <?php endif; ?>
    <div class="col-md-6">
        <label for="inputTitle" class="form-label">Заголовок Оголошення</label>
        <input value="<?= $this->controller->post->title  ?>" type="text" class="form-control" id="inputTitle" name="title">
    </div>
    <div class="col-md-6">
        <label for="inputShort_text" class="form-label">Короткий опис</label>
        <input value="<?= $this->controller->post->short_text  ?>" type="text" class="form-control" id="inputShort_text" name="short_text">
    </div>
    <div class="col-12">
        <label for="text" class="form-label">Текст Оголошення</label>
        <textarea class="form-control" id="text" name="text"><?= $this->controller->post->text ?></textarea>
    </div>
    <div class="col-12">
        <label for="address" class="form-label">Адресса</label>
        <input value="<?= $this->controller->post->address  ?>" type="text" class="form-control" id="address" name="address">
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">Емейл</label>
        <input value="<?= $this->controller->post->email  ?>" type="email" class="form-control" id="email" name="email">
    </div>
    <div class="col-md-6">
        <label for="telephone" class="form-label">Телефон</label>
        <input value="<?= $this->controller->post->telephone  ?>" type="text" class="form-control" id="telephone" name="telephone">
    </div>
    <div class="col-md-6">
        <label for="salary" class="form-label">Заробітна плата</label>
        <input value="<?= $this->controller->post->salary  ?>" type="text" class="form-control" id="salary" name="salary">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Опублікувати</button>
    </div>
</form>

