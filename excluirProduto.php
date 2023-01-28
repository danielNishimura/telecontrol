<?php
require 'config.php';
require 'classes/produto.class.php';
$a = new AddProduto();
 
if(isset($_GET['codigo']) && !empty($_GET['codigo'])) {
  $codigo = addslashes($_GET['codigo']);
  $a->excluirProduto($codigo);
}

header("Location: produto.php")
?>
