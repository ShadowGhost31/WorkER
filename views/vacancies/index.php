<?php
$this->Title = 'WORK_InD';
$this->Title2 = 'Оголошення';
?>

<body style="background-color: lightblue;">
<div class="container my-5">
    <div class="row">
        <?php foreach ($this->paramsArray as $ad): ?>
            <div class="col-md-4 mb-4">
                <div class="card custom-card">
                    <img src="<?php /*= $ad['image_url']*/ ?>" class="card-img-top w-100">
                    <div class="card-body d-flex flex-column">
                        <div class="flex-grow-1">
                            <h5 class="card-title"><?= $ad['title'] ?></h5>
                            <p class="card-text"><?= $ad['short_text'] ?></p>
                            <p class="card-text text-muted">Зарплата: <?= $ad['salary'] ?> грн</p>
                        </div>
                        <a href="vacancies/view/<?= $ad['id'] ?>" class="btn btn-primary mt-auto">Перейти</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
