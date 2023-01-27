<?php
require 'classes/produto.class.php';
require_once 'config.php';
$a = new Produto();
try
{
  $a->excluirProduto($_GET['codigo']);
  
}
catch (PDOException $e)
{
  die("Erro ao excluir");
}

header("Location: addProduto.php");
?>