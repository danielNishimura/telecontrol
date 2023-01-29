<?php
require_once 'config.php';
$idcliente = filter_input(INPUT_POST, 'idordem');
$idcliente = filter_input(INPUT_POST, 'idcliente');
$idproduto = filter_input(INPUT_POST, 'idproduto');
$nomecliente = filter_input(INPUT_POST, 'nomeCliente');
$dtAbertura = filter_input(INPUT_POST, 'dtAbertura');

if (!empty($_POST)) {
    $sql = $pdo->prepare("UPDATE produto SET idordem = :idordem, idcliente = :idcliente, idcliente = :idcliente, nomecliente = :nomecliente, dtAbertura =:dtAbertura WHERE idordem = :idordem");
    $sql->bindValue(':idordem', $idordem);
    $sql->bindValue(':idcliente', $idcliente);
    $sql->bindValue(':idcliente', $idproduto);
    $sql->bindParam(':nomecliente', $nomecliente);
    $sql->bindValue(':dtAbertura', $dtAbertura);
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
