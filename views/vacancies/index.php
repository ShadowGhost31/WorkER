<?php
$this->Title = 'WORK_InD';
$this->Title2 = 'Оголошення';

?>


<body>
<div class="container my-5">
    <h1 class="mb-4 text-center"></h1>
    <div class="row">
        <!-- Оголошення -->
        <div class="col-md-9">
            <div class="row">
                <?php foreach ($this->paramsArray as $ad): ?>
                    <div class="col-md-12 mb-4">
                        <div class="card custom-card">
                            <div class="card-body d-flex flex-column">
                                <div class="flex-grow-1">
                                    <h5 class="card-title"><?= htmlspecialchars($ad['title']) ?></h5>
                                    <p class="card-text"><?= htmlspecialchars($ad['short_text']) ?></p>
                                    <p class="card-text text-muted">Зарплата: <?= htmlspecialchars($ad['salary']) ?> грн</p>
                                    <p class="card-text text-muted">Дата публікації: <?= htmlspecialchars($ad['data']) ?></p> <!-- Додаємо дату -->
                                </div>
                                <a href="vacancies/view/<?= htmlspecialchars($ad['id']) ?>" class="btn btn-primary mt-auto">Перейти</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
        <!-- Фільтри та сортування -->
        <div class="col-md-3">
            <h4>Фільтри</h4>
            <form method="post" action="">
                <div class="form-group">
                    <label for="sort">Сортувати за</label>
                        <select class="form-control" id="sort" name="sort">
                            <option value="data" <?php if($this->controller->post->sort == 'data') echo 'selected'; ?>>Датою</option>
                            <option value="salary" <?php if($this->controller->post->sort == 'salary') echo 'selected'; ?>>Зарплатою</option>
                        </select>
                </div>
                <div class="form-group">
                    <input type="hidden" id="order" name="order" value="<?= $this->controller->post->order ? htmlspecialchars($this->controller->post->order) : 'asc' ?>">
                    <button type="button" class="btn btn-secondary mt-2" id="toggleOrderBtn">
                        <?= $this->controller->post->order && $this->controller->post->order == 'desc' ? 'Сортувати за зростанням' : 'Сортувати за спаданням' ?>
                    </button>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Застосувати</button>
            </form>
        </div>

        <!-- Додати строчку -->
        <div class="col-md-9">
            <hr> <!-- Розділова лінія -->
        </div>


    </div>
</div>
</body>
<script>
    document.getElementById('toggleOrderBtn').addEventListener('click', function() {
        var orderInput = document.getElementById('order');
        var currentOrder = orderInput.value;
        if (currentOrder === 'asc') {
            orderInput.value = 'desc';
            this.textContent = 'Сортувати за зростанням';
        } else {
            orderInput.value = 'asc';
            this.textContent = 'Сортувати за спаданням';
        }
    });
</script>