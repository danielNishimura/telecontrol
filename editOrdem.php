<?php require 'pages/header.php'; ?>
<?php
  require 'config.php';
  $edit = [];

  $idordem = filter_input(INPUT_GET, 'idordem');
  if ($idordem) {

    $sql = $pdo->prepare("SELECT * FROM ordem WHERE idordem = :idordem");
    $sql->bindValue(':idordem', $idordem);
    $sql->execute();

    if ($sql->rowCount() > 0) {

      $edit = $sql->fetch(PDO::FETCH_ASSOC);
      //print_r($edit);

    } else {
      header("Location: produto.php");
      exit;
    }

  } else {
    header("Location: produto.php");
    exit;
  }
?>

<div class="container">
  <h2>Editar Ordem de Serviço</h2>

  <form action="./adicionarOrdem.php" method="POST">
      
  <fieldset>
    <div class="form-group">
      <legend>Ordem</legend>

      <label for="idordem">Codigo da ordem:</label>
      <input type="text" name="idordem" id="idordem" class="form-control" value="<?php echo $edit['idordem']; ?>"/>

      <label for="idcliente">Cliente:</label>
      <input type="text" name="idcliente" id="idcliente" class="form-control" value="<?php echo $edit['idcliente']; ?>" />

      <label for="idcliente">Cliente:</label>
      <input type="text" name="idcliente" id="idcliente" class="form-control" value="<?php echo $edit['nomeCliente']; ?>" />

      <label for="idproduto">Produto:</label>
      <input type="text" name="idproduto" id="idproduto" class="form-control" value="<?php echo $edit['idproduto']; ?>" />

      <label for="dtAbertura">Data de abertura:</label>
      <input type="text" name="dtAbertura" id="dtAbertura" class="form-control" value="<?php print_r($edit['dtAbertura']);?>"/>


    </div>
  </fieldset>

    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <a href="./ordem.php"  class="btn btn-danger">Cancelar</a>

  </form>
</div>

  <script  src="./assets/js/main.js">
  </script>


<div class="container">
  
  <?php if (!empty($_GET['msgErro'])) {?>
    <div class="alert alert-warning" role="alert">
      <?php echo $_GET['msgErro']; ?>
    </div>
  <?php }?>

  <?php if (!empty($_GET['msgSucesso'])) {?>
    <div class="alert alert-success" role="alert">
      <?php echo $_GET['msgSucesso']; ?>
    </div>
  <?php }?>  

<?php require_once 'config.php'; ?>
<?php
$ordens = array();

$sql = "SELECT * FROM ordem ORDER BY idordem ASC";
try {
  $stmt = $pdo->prepare($sql);
  if ($stmt->execute()) {
    $ordens = $stmt->fetchAll();
  }
  else {
    die("Falha ao executar SQL");
  }

} catch (PDOException $e) {
  die($e->getMessage());

}
?>

<?php if (!empty($ordens)) { ?> 

  <table border="1" class="table">
    <thead>
      <tr>
        <th scope="col">Codigo da Ordem</th>
        <th scope="col">Cliente</th>
        <th scope="col">Produto</th>
        <th scope="col">Data da Abertura</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($ordens as $ordem) { ?>
        <tr>
            <td><?=$ordem['idordem'];?></td>
            <td><?=$ordem['idcliente'];?></td>
            <td><?=$ordem['idproduto'];?></td>
            <td><?=$ordem['dtAbertura'];?></td>
            <td>
              <a href="./delOrdem.php?idordem=<?=$ordem['idordem'];?>" onclick="return confirm('Tem certeza que deseja excluir?')" class="btn btn-danger">Excluir</a>
            </td>
          </tr>
      <?php }?>
    </tbody>
  </table>
<?php }?>
</div>


<?php require 'pages/footer.php'; ?>