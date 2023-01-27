<?php require 'pages/header.php'; ?>
<?php
require_once 'classes/ordem.class.php';
$o = new Ordem();
$ord = $o->getOrdem($_GET['idordem']);

if(isset($_GET['idordem']) && !empty($_GET['idordem'])) {
  $ord = $o->getOrdem($_GET['idordem']);

} else {
  header("Location: editOrdem.php");
}
?>

<div class="container">
  <h2>Editar Ordem de Serviço</h2>

  <form action="./addOrdem.php" method="POST">
      
  <fieldset>
    <div class="form-group">
      <legend>Ordem</legend>

      <label for="idordem">Codigo da ordem:</label>
      <input type="text" name="idordem" id="idordem" class="form-control" value="<?php echo $ord['idordem']; ?>"/>

      <label for="idcliente">Cliente:</label>
      <input type="text" name="idcliente" id="idcliente" class="form-control" value="<?php echo $ord['idcliente']; ?>" />

      <label for="produto">Produto:</label>
      <input type="text" name="produto" id="produto" class="form-control" value="<?php echo $ord['produto']; ?>" />

      <label for="dataAbertura">Data de abertura:</label>
      <input type="text" name="dataAbertura" id="dataAbertura" class="form-control" value="<?php print_r($ord['dataabertura']);?>"/>


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
            <td><?=$ordem['produto'];?></td>
            <td><?=$ordem['dataabertura'];?></td>
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