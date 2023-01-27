<?php
//echo '<prep>';
//  print_r($_POST);
//echo '<prep>';

require_once 'config.php';

if (!empty($_POST)) {
  //chegando dados no 
  //pega dados do formulario
  try {
    // prepara dados
      //monta sql
      $sql = "INSERT INTO produto
                (codigo, descricao, ativo)
              VALUES
              (:codigo, :descricao, :ativo)";
      //prepara sql

      $stmt = $pdo->prepare($sql);

      //pega os dados nas variaveis :cpf, :nome, :endereco, :numero
      $dados = array(
        ':codigo' => $_POST['codigo'],
        ':descricao' => $_POST['descricao'],
        ':ativo' => $_POST['ativo']
      );
      //insert
      if ($stmt->execute($dados)) {
        header("Location: addProduto.php?msgSucesso=Cadastro realizado com sucesso!");
      }
  } catch (PDOException $e) {
    header("Location: addProduto.php?msgErro=Falha ao cadastrar o produto!");
  }
}
else {
  header("Location: produto.php?msgErro=Erro de acesso.");
}
die();
?>