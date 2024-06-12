<?php
$this->Title = 'WORK_InD';
$this->Title2 = 'Резюме';
?>
<?php if (!empty($errorMessage)) : ?>
    <div class="alert alert-danger" role="alert">
        <?=$errorMessage; ?>
    </div>
<?php endif; ?>

<style>


</style>
<body >
<div class="container my-5">
    <div class="row">
        <!-- Оголошення -->
        <div class="col-md-9">
            <div class="row">
                <?php foreach ($this->paramsArray as $ad): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card custom-card">
                            <div class="card-body d-flex flex-column">
                                <div class="flex-grow-1">
                                    <h5 class="card-title"><?= $ad['title'] ?></h5>
                                    <p class="card-text"><?= $ad['short_text'] ?></p>
                                    <p class="card-text text-muted">Номер телефону: <?= $ad['Telephone'] ?></p>
                                </div>
                                <a href="resumes/view/<?= $ad['user_id'] ?>" class="btn btn-primary mt-auto">Перейти</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
    </div>
</div>
</body>
