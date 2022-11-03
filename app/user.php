<?php
class User {
    public $name;
    public $login;
    public $password;
    public $email;

    public function __construct($name, $login, $password, $email) {
        $this->name = $name;
        $this->login = $login;
        $this->password = sha1( '2f3c49e00ff' . $password);
        $this->email = $email;
    }

    public function getData($data) {
        return $this->$data;
    }

    public function setData($data, $value) {
        $this->$data = $value;
    }
}
