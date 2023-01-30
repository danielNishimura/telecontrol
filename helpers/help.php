<?php

function data($data) {
    if (data =="") {
        return "";
    }

    $dados = explode("/". $data);

    $data_pdo = "{$dados[2]}-{$dados[1]}-{$dados[0]}";

    return $data_pdo;
}

?>