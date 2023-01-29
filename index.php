<?php require 'pages/header.php'; ?>
<?php require_once 'classes/cliente.class.php';?>
<div class="container">
  <h2>Novo Cliente</h2>

  <form action="adicionarClienteAction.php" method="POST">
      
  <fieldset>
    <div class="form-group">
      <legend>Clientes</legend>
      <label for="cpf">CPF:</label>
      <input type="text" name="cpf" id="cpf" class="form-control" onkeypress="$(this).mask('000.000.000-00');"/>

      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome" class="form-control" />

      <label for="endereco">Endereço:</label>
      <input type="text" name="endereco" class="form-control" />

      <label for="numero">Numero:</label>
      <input type="text" name="numero" class="form-control" />

    </div>
  </fieldset>

    <button type="submit" name="adicionar" class="btn btn-primary">Cadastrar</button>
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
              <a href="./editarCliente.php?cpf=<?=$cliente['cpf'];?>" class="btn btn-default">Editar</a>
              <a href="./delCliente.php?cpf=<?=$cliente['cpf'];?>" onclick="return confirm('Tem certeza que deseja excluir?')" class="btn btn-danger">Excluir</a>
            </td>
          </tr>
      <?php }?>
    </tbody>
  </table>
<?php }?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

</div>
<?php require 'pages/footer.php'; ?>