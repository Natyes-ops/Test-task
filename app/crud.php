<?php
include_once './servises.php';

class CRUD {
    public function create($data) {
        $db = getJsonData();
        $db[] = $data;
        setJsonData($db);
    }

    public function read($login) {
        $db = getJsonData();
        foreach ($db as $user) {
            if ($user['login'] === $login) {
                return $user;
            }
        }
        return false;
    }

    public function update($login, $data) {
        $db = getJsonData();
        foreach ($db as $key => $user) {
            if ($user['login'] === $login) {
                $db[$key] = $data;
                setJsonData($db);
                return true;
            }
        }
        return false;
    }

    public function delete($login) {
        $db = getJsonData();
        foreach ($db as $key => $user) {
            if ($user['login'] === $login) {
                unset($db[$key]);
                setJsonData($db);
                return true;
            }
        }
        return false;
    }
}