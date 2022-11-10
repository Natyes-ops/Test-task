<?php
function checkUser($user) {
    $db = getJsonData();
    foreach ($db as $item) {
        if ($item['login'] === $user->login) {
            return 'login';
        } else if ($item['email'] === $user->email) {
            return 'email';
        }
    }
    return false;
}