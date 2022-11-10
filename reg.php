<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: /user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main>
        <noscript>
            Без javascript не работает, включите его
            <style>
                .form {
                    display: none;
                }
            </style>
        </noscript>
        <form class="form" id="registration" action="./app/registration.php" method="POST">
            <label for="name" class="form-item">
                Имя:
                <input type="text" name="name" placeholder="Введите имя" class="form-item__input" title="Введите имя на латинице, минимум 2 символа" pattern="\w[a-zA-Z]{1,}" required>
            </label>
            <label for="login" class="form-item">
                Логин:
                <input type="text" name="login" placeholder="Введите логин" class="form-item__input" minlength="6" required pattern="^\S+[a-zA-Z]{2,}\S+$">
            </label>
            <label for="password" class="form-item">
                Пароль:
                <input type="password" name="password" placeholder="Введите пароль" class="form-item__input" title="минимум 6 символов, обязательно должны быть цифры, буквы и спец. символы !@#$&*" pattern="^\S(?=.*\d)(?=.*[!@#$&*])(?=.*[a-z]).{6,}\S+$" required>
            </label>
            <label for="password-check" class="form-item">
                Повторите пароль:
                <input type="password" name="password-check" placeholder="Введите пароль" class="form-item__input" title="минимум 6 символов, обязательно должны быть цифры и буквы" pattern="(?=.*\d)(?=.*[a-z]).{6,}" required>
            </label>
            <label for="email" class="form-item">
                Почта:
                <input type="email" name="email"  placeholder="Введите почту" class="form-item__input" title="Введите в формате test@test.ru" pattern="^\S[a-z0-9]+@[a-z0-9]+\.[a-z]{1,}\S+$" required>
            </label>
            <button class="btn" type="submit">Зарегистрироваться</button>
            <a href="/">Авторизация</a>
        </form>
    </main>
    <script src="./js/script.js"></script>
    <script src="./js/reg.js"></script>
</body>
</html>