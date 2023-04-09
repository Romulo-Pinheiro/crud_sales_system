<?php
    include "_scripts/session.php";
    include "_scripts/protect.php";
    include "modelo/header.php";
?>

<body>
    <?php include "modelo/menu.php";?>
    <?php include "modelo/js.php";?>

  <div class="container-fluid form-produto">
    <form class="row g-3" method="post" action="">
      <legend class="text-center mb-5"><h1>Cadastro de Produto</h1></legend>
      <div class="col-md-6">
        <label  class="form-label">Fornecedor:</label>
        <input type="text" class="form-control" name="fornecedor" placeholder="Digite o nome do fornecedor:" Required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Nome do Produto:</label>
        <input type="text" class="form-control" name="produto" placeholder="Digite o nome do produto:" required>
      </div>
      <div class="col-12">
        <label class="form-label">Custo do Produto:</label>
        <input type="number" step="0.01" class="form-control" name="custo" placeholder="Digite o custo do produto:" required>
      </div>
      <div class="col-12">
        <label for="inputAddress2" class="form-label">Valor de Venda:</label>
        <input type="number" step="0.01" class="form-control" name="venda" placeholder="Digite o valor de venda" required>
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
// Verifica se a informação foi preenchida e enviada
if(!empty($_POST['produto'])){
  // Verifica se conseguiu cadastrar o produto
  if(cadastrarProduto($_POST)){ ?>        
    <!-- Mensagem de Sucesso em caso positivo-->
    <script language='javascript'>
      swal.fire({ 
        icon:"success",
        text: "Produto Cadastrado com Sucesso!",
        type: "success"}).then(okay => {
          if (okay) {
            
          }
        });
      </script>
      <?php }else{ ?>
          <!-- Mensagem de Erro em caso negativo-->
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