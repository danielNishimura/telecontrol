<?php
//session_start();

$endereco = 'localhost';
$banco = 'telecontrol';
$usuario = 'postgres';
$senha = 'root';

global $pdo;
try {
	$pdo = new PDO("pgsql:dbname=$banco;port=5432;host=$endereco", $usuario, $senha);
	$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	echo "Conectado ao banco de dados com sucesso";
	} catch(PDOException $e) {
		echo "A CONEXÃO COM O BANCO DE DADOS FALHOU!!!: ".$e->getMessage();
		exit;
	}
?>