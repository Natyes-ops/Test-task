<?php

use function PHPSTORM_META\type;

include_once './user.php';
include_once './crud.php';
include_once './validate.php';

$crud = new CRUD();
$_POST = json_decode(file_get_contents('php://input'), true);
if (isset($_POST['name']) && isset($_POST['login']) && isset($_POST['password']) && isset($_POST['password-check']) && isset($_POST['email'])) {
    if ($_POST['password'] === $_POST['password-check']) {
        $user = new User($_POST['name'], $_POST['login'], $_POST['password'], $_POST['email']);
        $check = checkUser($user);
        if ($check === 'login') {
            echo json_encode(['error' => 'Логин уже существует', 'type' => 'login']);
            return;
        } else if ($check === 'email') {
            echo json_encode(['error' => 'Почта уже зарегистрирована', 'type' => 'email']);
            return;
        } else {
            session_start();
            $_SESSION['user'] = $user->getData('login');
            setcookie('user', $user->login, time() + 3600, '/');
            $crud->create($user);
            echo json_encode(['success' => 'Регистрация прошла успешно','status' => '200']);
        }
    } else {
        echo json_encode(['error' => 'Пароли не совпадают', 'type' => 'password']);
    }
}