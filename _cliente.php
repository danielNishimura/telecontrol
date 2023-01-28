<?php require 'pages/header.php'; ?>

<div class="container">
  <h2>Editar Cliente</h2>

  <form method="POST" action="editCliente.php" >
      
  <fieldset>
    <div class="form-group">
      <legend>Clientes</legend>
      <label for="cpf">CPF:</label>
      <input type="text" name="cpf" id="cpf" class="form-control" value="<?php echo $edit['cpf']; ?>" disabled />

      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $edit['nome'];?>" />

      <label for="endereco">Endereço:</label>
      <input type="text" name="endereco" class="form-control" value="<?php echo $edit['endereco'];?>" />

      <label for="numero">Numero:</label>
      <input type="text" name="numero" class="form-control" value="<?php echo $edit['numero'];?>" />

    </div>
  </fieldset>

    <button type="submit" name="adicionar" class="btn btn-primary">Salvar Alteração</button>
    <a href="./index.php"  class="btn btn-danger">Cancelar</a>

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
$clientes = array();

$sql = "SELECT * FROM cliente ORDER BY cpf ASC";
try {
  $stmt = $pdo->prepare($sql);
  if ($stmt->execute()) {
    $clientes = $stmt->fetchAll();
  }
  else {
    die("Falha ao executar SQL");
  }

} catch (PDOException $e) {
  die($e->getMessage());

}
?>

<?php if (!empty($clientes)) { ?> 

  <table border="1" class="table">
    <thead>
      <tr>
        <th scope="col">CPF</th>
        <th scope="col">Nome</th>
        <th scope="col">Endereço</th>
        <th scope="col">Numero</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($clientes as $cliente) { ?>
        <tr>
            <td><?=$cliente['cpf'];?></td>
            <td><?=$cliente['nome'];?></td>
            <td><?=$cliente['endereco'];?></td>
            <td><?=$cliente['numero'];?></td>
            <td>
              <a href="./delCliente.php?cpf=<?=$cliente['cpf'];?>" onclick="return confirm('Tem certeza que deseja excluir?')" class="btn btn-danger">Excluir</a>
            </td>
          </tr>
      <?php }?>
    </tbody>
  </table>


<?php }?>


</div>


<?php require 'pages/footer.php'; ?>
