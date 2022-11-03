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
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main>
        <noscript>
            Без javascript не работает, включите его
            <style>
            .form { display:none; }
            </style>
        </noscript>
        <form class="form" id="loginin" action="./app/loginin.php">
        <label class="form-item" for="login">
                Логин
                <input class="form-item__input" type="text" name="login" placeholder="Введите логин" id="login" required>
            </label>
            <label class="form-item" for="password">
                Пароль
                <input class="form-item__input" type="password" name="password" placeholder="Введите пароль" id="password" required >
            </label>
            <input type="submit" class="btn" value="Войти">
            <a href="/reg.php">Регистрация</a>
        </form>
    </main>
    <script src="./js/script.js"></script>
    <script src="./js/login.js"></script>
</body>
</html>
<?php
