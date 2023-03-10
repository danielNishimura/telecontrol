<?php require 'pages/header.php'; ?>

<div class="container">
	<link rel="stylesheet" href="" />
  <h2>Cadastrar Novo Produto</h2>

  <form action="adicionarProdutoAction.php" method="POST">
      
  <fieldset>
    <div class="form-group">
      <legend>Produto</legend>

      <div class="form-group">
        <input type="hidden" name="codigo" id="codigo" class="form-control" />
      </div>

      <div class="form-group">
        <label for="descricao">Descricao:</label>
        <input type="text" name="descricao" id="descricao" class="form-control" />
      </div>

      <div class="form-group">
        <div class="form-check">
          <label class="form-check-label" for="ativo">Ativo:</label>
          <input class="form-check-input" type="checkbox" name="ativo" id="ativo" onchange="btn_checkBox()" />
        </div>
      </div>  
    </div>
  </fieldset>

    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <a href="./produto.php"  class="btn btn-danger">Cancelar</a>

    <?php
  ?>


  </form>
</div>


<body window.onload="checkAtivo()">
  
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
$prods = array();

$sql = "SELECT * FROM produto ORDER BY codigo ASC";
try {
  $stmt = $pdo->prepare($sql);
  if ($stmt->execute()) {
    $prods = $stmt->fetchAll();
  }
  else {
    die("Falha ao executar SQL");
  }

} catch (PDOException $e) {
  die($e->getMessage());

}
?>

<?php if (!empty($prods)) { ?> 

  <table border="1" class="table">
    <thead>
      <tr>
        <th scope="col">Codigo</th>
        <th scope="col">Descricao</th>
        <th scope="col">Ativo</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($prods as $prod) { ?>
        <tr>
            <td><?=$prod['codigo'];?></td>
            <td><?=$prod['descricao'];?></td>
            <td> <input type="checkbox" name="ativo" id="ativo" value="1" <?php echo ($prod['ativo'] == '1') ? "checked" : '';?>></td>
            <td>
              <a href="./editarProduto.php?codigo=<?=$prod['codigo'];?>" class="btn btn-default">Editar</a>
              <a href="./delProduto.php?codigo=<?=$prod['codigo'];?>" onclick="return confirm('Tem certeza que deseja excluir?')" class="btn btn-danger">Excluir</a>
              <input type="hidden" id="dcheck" value=<?=$prod['ativo'];?>>
            </td>
          </tr>
      <?php }?>
    </tbody>
  </table>
<?php }?>
</div>

<script>
  addEventLis function checkAtivo() {
    if (dcheck.value == "1") {
      document.getElementById("tcheck").checked = true
    } else {
      document.getElementById("tcheck").checked = false
    }

    console.log(checkAtivo())
  }
</script>
</body>

<?php require 'pages/footer.php'; ?>