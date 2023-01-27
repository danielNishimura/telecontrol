<?php
require 'classes/cliente.class.php';
require_once 'config.php';
$a = new Cliente();
try
{
  $a->excluirCliente($_GET['cpf']);
  
}
catch (PDOException $e)
{
  die("Erro ao excluir");
}

header("Location: index.php");
?>