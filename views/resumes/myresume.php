<?php
/** @var string $errorMessage повідомлення про помилку */
/** @var Controller $controller */
$this->Title = 'WORK_EDIT';
$this->Title2 = 'Редагування Резюме:';
?>

<form class="row g-3 position-relative" method="post">
    <?php if (!empty($errorMessage)) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $errorMessage; ?>
        </div>
    <?php endif; ?>
    <div class="col-md-6">
        <label for="title" class="form-label">Заголовок Резюме/ваша орієнтовність</label>
        <input value="<?= $this->paramsArray['title'] ?>" type="text" class="form-control" id="title" name="title">
    </div>
    <div class="col-md-6">
        <label for="inputShort_text" class="form-label">Короткий опис</label>
        <input value="<?= $this->paramsArray['short_text'] ?>" type="text" class="form-control" id="inputShort_text"
               name="short_text">
    </div>
    <div class="col-12">
        <label for="text" class="form-label">Текст Оголошення</label>
        <textarea class="form-control" id="text" name="text"><?= $this->paramsArray['text'] ?></textarea>
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">Емейл</label>
        <input value="<?= $this->paramsArray['Email'] ?>" type="email" class="form-control" id="email" name="email">
    </div>
    <div class="col-md-6">
        <label for="telephone" class="form-label">Телефон</label>
        <input value="<?= $this->paramsArray['Telephone'] ?>" type="text" class="form-control" id="telephone"
               name="telephone">
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Оновити</button>
        <a href="/resumes/delete/<?= $this->paramsArray['id'] ?>" class="btn btn-danger"
           onclick="return confirm('Ви впевнені, що хочете видалити це резюме?');">Видалити</a>
    </div>
</form>
