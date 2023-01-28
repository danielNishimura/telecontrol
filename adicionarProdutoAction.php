<?php
require_once 'config.php';

//$codigo = filter_input(INPUT_POST, 'codigo');
$descricao = filter_input(INPUT_POST, 'descricao');
$ativo = filter_input(INPUT_POST, 'ativo');

if ($nome) {
    $sql = $pdo->prepare("INSERT INTO produto (descricao, ativo) VALUES (descricao, ativo)");
    //$sql->bindValue(':codigo', $codigo);
    $sql->bindValue(':descricao', $descricao);
    $sql->bindValue(':ativo', $ativo);
    $sql->execute();

    echo('Dados Alterados com sucesso!');
    header("Location: produto.php");
    exit;
} else {
    echo('Erro na alteracao');
    header("Location: produto.php");
    exit;
}

?>
