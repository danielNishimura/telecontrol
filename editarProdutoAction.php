<?php
require_once 'config.php';

$codigo = filter_input(INPUT_POST, 'codigo');
$descricao = filter_input(INPUT_POST, 'decricao');
$ativo = filter_input(INPUT_POST, 'ativo');

if ($codigo) {
    $sql = $pdo->prepare("UPDATE produto SET codigo = :codigo, descricao = :descricao, ativo = :ativo WHERE codigo = :codigo");
    $sql->bindValue(':codigo', $codigo);
    $sql->bindValue(':descricao', $descricao);
    $sql->bindValue(':ativo', $ativo);
    $sql->execute();

    echo('Produto Alterado com sucesso!');
    header("Location: produto.php");
    exit;
} else {
    echo('Erro na alteracao');
    header("Location: editarProduto.php");
    exit;
}

?>
