<?php
$this->Title = 'WORK_InD';
$this->Title2 = 'Резюме';
?>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="card-title"><?= $this->paramsArray['title'] ?></h2>
                    <p class="card-text">Короткий Опис:<?= $this->paramsArray['short_text'] ?></p>
                    <p class="card-text">Опис навичок: <?= $this->paramsArray['text'] ?></p>
                    <p class="card-text">Телефон: <?= $this->paramsArray['Telephone'] ?></p>
                    <p class="card-text">Email: <?= $this->paramsArray['Email'] ?></p>
                    <p class="card-text">Дата: <?= $this->paramsArray['data'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>