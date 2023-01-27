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
      $sql = "INSERT INTO ordem
                (idcliente, produto, dataabertura)
              VALUES
              (:idcliente, :produto, :dataabertura)";
      //prepara sql

      $stmt = $pdo->prepare($sql);

      //pega os dados nas variaveis :cpf, :nome, :endereco, :numero
      $dados = array(

        ':idcliente' => $_POST['idcliente'],
        ':produto' => $_POST['produto'],
        ':dataabertura' => $_POST['dataabertura']
      );
      //insert
      if ($stmt->execute($dados)) {
        header("Location: ordem.php?msgSucesso=Cadastro realizado com sucesso!");
      }
    } catch (PDOException $e) {
      header("Location: ordem.php?msgErro=Falha ao cadastrar a ordem de serviço!");
    }
}
else {
  header("Location: ordem.php?msgErro=Erro de acesso.");
}
die();
?>