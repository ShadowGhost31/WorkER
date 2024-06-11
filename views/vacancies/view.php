<?php
$this->Title = 'WORK_InD';
$this->Title2 = 'Вакансії';
// Предполагаем, что у вас уже есть подключение к базе данных
?>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="card-title"><?= $this->paramsArray['title'] ?></h2>
                    <p class="card-text">Короткий Опис:<?= $this->paramsArray['salary'] ?></p>
                    <p class="card-text">Опис: <?= $this->paramsArray['text'] ?></p>
                    <p class="card-text">Зарплата: <?= $this->paramsArray['salary'] ?></p>
                    <p class="card-text">Адреса роботодавця: <?= $this->paramsArray['address'] ?></p>
                    <p class="card-text">Телефон роботодавця: <?= $this->paramsArray['telephone'] ?></p>
                    <p class="card-text">Email роботодавця: <?= $this->paramsArray['email'] ?></p>
                    <p class="card-text">Дата створення: <?= $this->paramsArray['data'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>