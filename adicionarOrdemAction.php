<?php
require_once 'config.php';

$idcliente = filter_input(INPUT_POST, 'idcliente');
$idproduto = filter_input(INPUT_POST, 'idproduto');
$nomecliente = filter_input(INPUT_POST, 'nomeCliente');
$dtAbertura = filter_input(INPUT_POST, 'dtAbertura');

if (!empty($_POST)) {
    $sql = $pdo->prepare("INSERT INTO ordem (idcliente, idproduto,  nomeCliente, dtAbertura) VALUES (:idcliente, :idproduto,  :nomecliente, :dtAbertura)");
    $sql->bindValue(':idcliente', $idcliente);
    $sql->bindValue(':idproduto', $idproduto);
    $sql->bindParam(':nomecliente', $nomecliente);
    $sql->bindValue(':dtAbertura', $dtAbertura);
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
