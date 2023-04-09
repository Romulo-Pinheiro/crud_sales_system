<?php
    include "_scripts/session.php";
    include "_scripts/protect.php";
    include "modelo/header.php";
?>


<body>
    <?php include "modelo/menu.php";?>
    <?php include "modelo/js.php";?>

  <div class="container-fluid form-aluno">
    <form class="row g-3" method="post" action="">
      <legend class="text-center mb-5"><h1>Edição de Produto</h1></legend>
      <div class="col-md-6">
        <label  class="form-label">Fornecedor:</label>
        <input type="text" class="form-control" name="fornecedor" placeholder="Digite o nome do fornecedor:" Required value="<?= $_GET['fornecedor'];?>" disabled>
      </div>
      <div class="col-md-6">
        <label class="form-label">Nome do Produto:</label>
        <input type="text" class="form-control" name="produto" placeholder="Digite o nome do produto:" required value = "<?= $_GET['produto'];?>" disabled>
      </div>
      <div class="col-12">
        <label class="form-label">Custo do Produto:</label>
        <input type="number" step="0.01" class="form-control" name="custo" placeholder="Digite o custo do produto:" required value="<?=$_GET['custo'];?>">
      </div>
      <div class="col-12">
        <label for="inputAddress2" class="form-label">Valor de Venda:</label>
        <input type="number" step="0.01" class="form-control" name="venda" placeholder="Digite o valor de venda" required value="<?=$_GET['valorVenda'];?>">
    </div>
    <div class="col-12">
        <label class="form-label">Quantidade Adquirida:</label>
        <input type="number" class="form-control" name="quantidade" placeholder="Digite a Quantidade:" required>
    </div>
      <div class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </form>
  </div>

</body>
</html>

<?php

if(!empty($_POST['quantidade'])){

  if(editarProduto($_POST, $_GET['id'])){ ?>        

    <script language='javascript'>
      swal.fire({ 
        icon:"success",
        text: "Produto Editado com Sucesso!",
        type: "success"}).then(okay => {
          if (okay) {
            window.location= "estoque.php"
            
          }
        });
      </script>
      <?php }else{ ?>
          <script language='javascript'>
          swal.fire({ 
          icon:"error",
          text: "Ops! Houve um erro.",
          type: "success"}).then(okay => {
          if (okay) {
          }
        });
      </script>
 <?php } 
}

?>