<?php
require_once 'config.php';

$cpf = filter_input(INPUT_POST, 'cpf');
$nome = filter_input(INPUT_POST, 'nome');
$endereco = filter_input(INPUT_POST, 'endereco');
$numero = filter_input(INPUT_POST, 'numero');

if ($cpf) {
    $sql = $pdo->prepare("UPDATE cliente SET nome = :nome, endereco = :endereco, numero = :numero WHERE cpf = :cpf");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':endereco', $endereco);
    $sql->bindValue(':numero', $numero);
    $sql->bindValue(':cpf', $cpf);    
    $sql->execute();

    echo('Dados Alterados com sucesso!');
    header("Location: index.php");
    exit;
} else {
    echo('Erro na alteracao');
    header("Location: editarCliente.php");
    exit;
}

?>
