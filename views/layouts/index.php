<?php
/** @var string $Title */
/** @var string $Title2 */

/** @var string $Content */

use models\Users;

if (empty($Title))
    $Title = '';
if (empty($Title2))
    $Title2 = '';
if (empty($Content))
    $Content = '';
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="apple-touch-icon" sizes="180x180" href="/files/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/files/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/files/favicon-16x16.png">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $Title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<div class="container">
    <div class="header-wrapper">
        <header class="p-3 mb-3 border-bottom">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                            <use xlink:href="#bootstrap"></use>
                        </svg>
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="/" class="nav-link px-2 link-secondary">Головна</a></li>
                        <li><a href="/vacancies" class="nav-link px-2 link-body-emphasis">Оголошення</a></li>
                        <li><a href="/resumes" class="nav-link px-2 link-body-emphasis">Резюме</a></li>
                        <?php if (!Users::IsUserLogged()) : ?>
                            <li><a href="/users/login" class="nav-link px-2 link-body-emphasis">Увійти</a></li>
                            <li><a href="/users/register" class="nav-link px-2 link-body-emphasis">Зареєструватися</a></li>
                        <?php endif ?>
                    </ul>

                    <?php if (Users::IsUserLogged()) : ?>
                        <div class="dropdown text-end">
                            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                               data-bs-toggle="dropdown" aria-expanded="false">
                            </a>
                            <ul class="dropdown-menu text-small" style="">
                                <li><a class="dropdown-item" href="/vacancies/add">Нова Вакансія...</a></li>
                                <li><a class="dropdown-item" href="/vacancies/myvacancies">Мої Вакансії</a></li>
                                <li><a class="dropdown-item" href="/resumes/myresume">Моє Резюме</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/users/logout">Вийти</a></li>
                            </ul>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </header>
        <div>
            <div class="container content-wrapper">
                <h1 class="text-center"><?= $Title2 ?></h1>
                <?= $Content ?>
            </div>
            <footer class="py-3 my-4">
                <p class="text-center text-body-secondary">© 2024 WED , Always Worked , Inc</p>
            </footer>
        </div>
    </div>
</div>
</body>
</html>
<script>
    setTimeout(function() {
        var errorMessage = document.getElementById('errorMessage');
        if (errorMessage) {
            errorMessage.style.transition = 'opacity 1s';
            errorMessage.style.opacity = '0';
            setTimeout(function() {
                errorMessage.remove();
            }, 1000);
        }

        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.transition = 'opacity 1s';
            successMessage.style.opacity = '0';
            setTimeout(function() {
                successMessage.remove();
            }, 1000);
        }
    }, 10000);
</script>