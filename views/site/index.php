<?php
$this->Title = 'WORK-ED';
$this->Title2 = 'Головна сторінка';
?>
<!--<div class="hero text-center">
    <div class="container">
        <h1>Знайдіть роботу своєї мрії</h1>
        <p>Шукайте серед тисяч вакансій по всій Україні</p>
        <form class="row g-3 justify-content-center" method="post">
            <div class="col-auto">
                <input name="Search" type="text" class="form-control" placeholder="Пошук">
            </div>
            <div class="col-auto">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="searchType" id="radioVacancy" value="vacancy" checked>
                    <label class="form-check-label" for="radioVacancy">Оголошення</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="searchType" id="radioResume" value="resume">
                    <label class="form-check-label" for="radioResume">Резюме</label>
                </div>
            </div>
            <div class="col-auto">

                <select name="Select" class="form-select" aria-label="Виберіть категорію">
                    <option selected value="title">ЗА Назвою</option>
                    <option value="text">ЗА Описом</option>
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Шукати</button>
            </div>
        </form>
    </div>
</div>-->
<div class="container mt-5">
    <h2 class="mb-4">Останні вакансії</h2>
    <?php if (!empty($this->paramsArray)): ?>
        <div class="row">
            <?php
            $randomIndexes = array_rand($this->paramsArray, min(3, count($this->paramsArray)));
            if (!is_array($randomIndexes)) {
                $randomIndexes = [$randomIndexes]; // Wrap the single index in an array
            }
            foreach ($randomIndexes as $index):
                $ad = $this->paramsArray[$index];
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card job-card">
                        <div class="card-body">
                            <h5 class="card-title">Посада:<?= htmlspecialchars($ad['title']) ?></h5>
                            <p class="card-text">Адресса:<?= htmlspecialchars($ad['address']) ?></p>
                            <p class="card-text text-muted">Зарплата: <?= htmlspecialchars($ad['salary']) ?> грн</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Немає доступних вакансій на даний момент.</p>
    <?php endif; ?>
</div>


<!-- Розмістіть резюме -->
<div class="resume-section text-center">
    <div class="container">
        <h2>Розмістіть резюме</h2>
        <p>Створення резюме займає в середньому 3–5 хвилин. Роботодавці зможуть знайти ваше резюме та запропонувати вам роботу.</p>
        <a href="/resumes/myresume" class="btn btn-primary">Створити резюме</a>
    </div>
</div>