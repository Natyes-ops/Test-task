<?php
include_once './user.php';
include_once './crud.php';
include_once './servises.php';
$crud = new CRUD();
$_POST = json_decode(file_get_contents('php://input'), true);
$user = new User('',$_POST['login'], $_POST['password'],'');
$arr = getJsonData();
foreach ($arr as $value) {
    if ($value['login'] == $user->login && $value['password'] == $user->password) {
        session_start();
        $_SESSION['user'] = $user->getData('login');
        setcookie('user', $user->login, time() + 3600, '/');
        echo json_encode(['success' => 'Авторизация прошла успешно','status' => '200']);
    }
}
if (!isset($_SESSION['user'])) {
    echo json_encode(['error' => 'Неверный логин или пароль', 'type' => 'error']);
}