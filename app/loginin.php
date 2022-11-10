<?php
include_once './user.php';
include_once './crud.php';
include_once './servises.php';
$_POST = json_decode(file_get_contents('php://input'), true);
$user = new User('',$_POST['login'], $_POST['password'],'');
$arr = getJsonData();
foreach ($arr as $value) {
    if ($value['login'] === $user->login && $value['password'] === $user->password) {
        session_start();
        $_SESSION['user'] = $user->login;
        setcookie('user', $user->login, time() + 3600, '/');
        return;
    }
}

