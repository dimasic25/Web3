<?php
require 'database/DB.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Blackshot</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+2&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="views/css/style.css">
</head>
<body>

<div class="modal sign-in">
    <div class="modal__content sign-in__modal">
        <span class="modal__close sign-in__close">&times;</span>
        <div class="sign-in__content">
            <div class="title">Вход</div>
            <form action="#" class="sign-in__form">
                <input type="text" name="login" placeholder="Логин" class="input" required
                       minlength="5" maxlength="20" pattern="^[А-Яа-яЁё][А-Яа-яЁё\s-]{3,18}[А-Яа-яЁё]$">
                <input type="password" name="password" placeholder="Пароль" class="input" required
                       minlength="6" maxlength="18" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,18}$">
                <button type="submit" class="btn sign-in__btn">Войти</button>
                <button type="button" class="btn form__sign-up__btn">Регистрация</button>
            </form>
        </div>
    </div>
</div>

<div class="modal sign-up">
    <div class="modal__content sign-up__modal">
        <span class="modal__close sign-up__close">&times;</span>
        <div class="sign-up__content">
            <div class="title">Регистрация</div>
            <form action="#" class="sign-up__form">
                <input type="text" name="login" placeholder="Логин" class="input" required
                       minlength="5" maxlength="20" pattern="^[А-Яа-яЁё][А-Яа-яЁё\s-]{3,18}[А-Яа-яЁё]$">
                <input type="password" name="password" placeholder="Пароль" class="input password" required
                       minlength="6" maxlength="18" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,18}$">
                <input type="password" placeholder="Повторите пароль" class="input repeat-password" required
                       minlength="6" maxlength="18" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,18}$">
                <input type="email" placeholder="Email" class="input email" required
                       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                <input type="tel" placeholder="Телефон" class="input phone" required
                       minlength="11" maxlength="11" pattern="[0-9]{11}">

                <div class="checkbox__wrapper">
                    <input type="checkbox" class="input" required>
                    <span>Согласие на обработку</span>
                </div>
                <button type="submit" class="btn sign-up__btn">Зарегистрироваться</button>
                <button type="button" class="btn form__sign-in__btn">Вход</button>
            </form>
        </div>
    </div>
</div>


<div class="container">
    <?php require_once 'views/layouts/header.php'; ?>

    <main class="content">
            <?php
            $db = new DB();
            $screenshots = $db->getScreenshots(0);
            ?>

            <?php foreach ($screenshots as $screenshot): ?>

                <div class="card id=<?= $screenshot['id'] ?>">
                    <img src="data:image/jpeg;base64, <?= base64_encode($screenshot['img']) ?>" class="card__photo"
                         alt="Нет фото"/>
                    <div class="card__info">
                        <span class="card__name"> <?= $screenshot['name'] ?></span>
                        <span class="card__data-added"><?= $screenshot['date_added'] ?></span>
                    </div>
                </div>
            <?php endforeach; ?>

        <button class="btn more_cards">Показать еще</button>

    </main>

    <?php require_once 'views/layouts/footer.php'; ?>
</div>

<script src="views/js/script.js"></script>
</body>
</html>