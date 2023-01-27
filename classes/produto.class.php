<?php

      class Produto {
            public function cadastrar($descricao, $ativo) {
      
            global $pdo;
      
            $sql = $pdo->prepare("INSERT INTO produto SET descricao = :descricao, ativo = :ativo");
                  $sql->bindValue(':descricao', $descricao);
                  $sql->bindValue(':ativo', $ativo);
                  $sql->execute();
            }

            public function getProduto($codigo) {
                  $array = array();
                  global $pdo;
            
                  $sql = $pdo->prepare("SELECT * FROM produto WHERE codigo = :codigo");
                  $sql->bindValue(':codigo', $codigo);
                  $sql->execute();
            
                  if($sql->rowCount() > 0) {
                    $array = $sql->fetch();
                  }
                  return $array;
                }
            

            public function getProdutoLista() {
                  $array = array();
                  
                  global $pdo;
                  $sql = $pdo->query("SELECT * FROM produto");
            
                  if($sql->rowCount() > 0) {
                    $array = $sql->fetchAll();
                  }
                  return $array;
                }
      
      
            public function editExame($descricao, $ativo, $codigo) {
      
            global $pdo;
            
            $sql = $pdo->prepare("UPDATE produto SET descricao = :descricao, ativo = :ativo WHERE codigo = :codigo");
                  $sql->bindValue(':decricao', $descricao);
                  $sql->bindValue(':ativo', $ativo);
                  $sql->bindValue(':codigo', $codigo);
                  $sql->execute();
            }

            public function excluirProduto($id) {
                  global $pdo;

                  $sql = $pdo->prepare("DELETE FROM produto WHERE codigo = :codigo");
                  $sql->bindValue(":codigo", $id);
                  $sql->execute();
            }

      }

?>