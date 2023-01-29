<?php

      class Ordem {
            public function cadastrar($idcliente, $produto, $dataabertura) {
      
            global $pdo;
      
            $sql = $pdo->prepare("INSERT INTO ordem SET idcliente = :idcliente, idcliente = :produto, dataabertura = :dataabertura");
                  $sql->bindValue(':idcliente', $idcliente);
                  $sql->bindValue(':idcliente', $produto);
                  $sql->bindValue(':dataabertura', $dataabertura);
                  $sql->execute();
            }

            public function getOrdem($idordem) {
                  $array = array();
                  global $pdo;
            
                  $sql = $pdo->prepare("SELECT * FROM ordem WHERE idordem = :idordem");
                  $sql->bindValue(':idordem', $idordem);
                  $sql->execute();
            
                  if($sql->rowCount() > 0) {
                    $array = $sql->fetch();
                  }
                  return $array;
                }

            public function getOrdemLista() {
                  global $pdo;
            
                  $array = array();
                  $sql = $pdo->query("SELECT * FROM cliente");
                  $sql->execute();
            
                  if($sql->rowCount() > 0) {
                    $array = $sql->fetchAll();
                  }
                  return $array;
            }


      

            


      }

?>