<?php

function getJsonData() {
    $data = file_get_contents('../db.json');
    return json_decode($data, true);
}

function setJsonData(array $data) {
    $data = json_encode($data);
    file_put_contents('../db.json', $data);
    return true;
}