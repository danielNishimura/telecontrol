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
      $sql = "INSERT INTO cliente
                (cpf, nome, endereco, numero)
              VALUES
              (:cpf, :nome, :endereco, :numero)";
      //prepara sql

      $stmt = $pdo->prepare($sql);

      //pega os dados nas variaveis :cpf, :nome, :endereco, :numero
      $dados = array(
        ':cpf' => $_POST['cpf'],
        ':nome' => $_POST['nome'],
        ':endereco' => $_POST['endereco'],
        ':numero' => $_POST['numero']
      );
      //insert
      if ($stmt->execute($dados)) {
        header("Location: index.php?msgSucesso=Cadastro realizado com sucesso!");
      }
  } catch (PDOException $e) {
    header("Location: index.php?msgErro=Falha ao cadastrar o cliente!");
  }
}
else {
  header("Location: index.php?msgErro=Erro de acesso.");
}
die();

?>
