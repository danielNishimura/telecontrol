<?php


  class Cliente {
    public function cadastrar($cpf, $nome, $endereco, $numero) {

    global $pdo;

    $sql = $pdo->prepare("INSERT INTO cliente SET cpf = :cpf, nome = :nome, endereco = :endereco, numero = :numero");
          $sql->bindValue(':cpf', $cpf);
          $sql->bindValue(':nome', $nome);
          $sql->bindValue(':endereco', $endereco);
          $sql->bindValue(':numero', $numero);
          $sql->execute();
    }

      public function editCliente($nome, $endereco, $numero) {
  
      global $pdo;
  
      $sql = $pdo->prepare("UPDATE cliente SET nome = :nome, endereco = :endereco, numero = :numero");
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':endereco', $endereco);
            $sql->bindValue(':numero', $numero);
            $sql->execute();
      }

    public function getCliente($cpf) {
      $array = array();
      global $pdo;

      $sql = $pdo->prepare("SELECT * FROM cliente WHERE cpf = :cpf");
      $sql->bindValue(':cpf', $cpf);
      $sql->execute();

      if($sql->rowCount() > 0) {
        $array = $sql->fetch();
      }
      return $array;
    }

    public function getClienteLista() {
      global $pdo;

      $array = array();
      $sql = $pdo->query("SELECT * FROM clientes");
      $sql->execute();

      if($sql->rowCount() > 0) {
        $array = $sql->fetchAll();
      }
      return $array;
    }

    
    public function excluirCliente($id) {
      global $pdo;

      $sql = $pdo->prepare("DELETE FROM cliente WHERE cpf = :cpf");
      $sql->bindValue(":cpf", $id);
      $sql->execute();
}




  }


  class ClienteLista{

      }

  ?>