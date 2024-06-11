<?php
$this->Title = 'WORK_InD';
$this->Title2 = 'Резюме';
?>
<?php if (!empty($errorMessage)) : ?>
    <div class="alert alert-danger" role="alert">
        <?=$errorMessage; ?>
    </div>
<?php endif; ?>


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
                                <a href="resumes/view/<?= $ad['id'] ?>" class="btn btn-primary mt-auto">Перейти</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Фільтри та сортування -->
        <div class="col-md-3">
            <h4>Фільтри</h4>
            <form method="GET" action="">
                <!-- Додайте тут ваші фільтри -->
                <div class="form-group">
                    <label for="salary">Зарплата</label>
                    <input type="number" class="form-control" id="salary" name="salary" placeholder="Зарплата від">
                    <input type="number" class="form-control" id="salary" name="salary" placeholder="Зарплата до">
                </div>
                <div class="form-group">
                    <label for="location">Місцезнаходження</label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="Місцезнаходження">
                </div>
                <div class="form-group">
                    <label for="sort">Сортувати за</label>
                    <select class="form-control" id="sort" name="sort">
                        <option value="date">Дата</option>
                        <option value="salary">Зарплата</option>
                        <!-- Додайте інші параметри сортування, якщо потрібно -->
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Застосувати</button>
            </form>
        </div>
    </div>
</div>
</body>
