<?php
require_once 'config.php';

$lista = [];
$sql = $pdo->query("SELECT * FROM produto");
print_r($lista);
?>


