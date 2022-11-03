<?php
include_once './user.php';
include_once './crud.php';

$crud = new CRUD();
$_POST = json_decode(file_get_contents('php://input'), true);
if (isset($_POST['name']) && isset($_POST['login']) && isset($_POST['password']) && isset($_POST['password-check']) && isset($_POST['email'])) {
    if ($_POST['password'] === $_POST['password-check']) {
        $user = new User($_POST['name'], $_POST['login'], $_POST['password'], $_POST['email']);
        session_start();
        $_SESSION['user'] = $user->getData('login');
        setcookie('user', $user->login, time() + 3600, '/');
        $crud->create($user);  
    } else {
        echo 'Пароли не совпадают';
    }
}