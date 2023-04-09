<?php
    include "_scripts/session.php";
    include "_scripts/protect.php";
    include "modelo/header.php";
?>

<body>
    <?php include "modelo/menu.php";?>
    <?php include "modelo/js.php";?>
    <!-- Conexão com o ajax.js para enviar os dados do <select> -->
    <script type="text/javascript" src="ajax.js"></script>

<div class="m-auto row">
<div class="mt-5 col-md-6">  
  <div class="container-fluid form-produto">
  <div class="row">
    <form class="row g-3" method="post" action="">
      <legend class="text-center mb-5"><h1>Vendas</h1></legend>
      <div>
        <label class="form-label">Produto:</label> <br>
       <select name="produtos" id="produtos" onchange="getDados();" class="col-md-6">
        <option selected disabled>Selecione...</option>
          <?php
          $lista = listarProdutos();
          // Cada produto no banco de dados vira uma opção no select a ser escolhida.
          while ($dados = $lista->fetch_array()){
          ?>
          <option value="<?=$dados['codProd'];?>"><?=$dados['nomeProd'];?></option>
          
          <?php }?>
      </select>
      <script>
          $("#produtos").select2({
          theme: "classic"
          });
      </script>
      </div>


      <div class="col-md-12">
        <label class="form-label">Quantidade Vendida:</label>
        <input type="number" class="form-control" name="quantidade" placeholder="Digite a quantidade vendida:" required>
      </div>

      <div class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </form>
    </div>
  </div>
  </div>    
            <div class="m-auto  col-md-5" id="Resultado">
          </div>


</body>
</html>
<?php
if (!empty($_POST['quantidade'])){
  // Verifica se um produto foi escolhido
  if(!empty($_POST['produtos'])){
   $produto = lerProduto($_POST['produtos']);
   $total = $_POST['quantidade'] * $produto['valorVenda'];
    // Se o produto for cadastrado, um alerta surge mostrando o valor total da venda e confirmando a venda.
    if(cadastrarVenda($_POST['produtos'],$_POST['quantidade'], $_SESSION['id'], $total)){
      echo "
      <script> swal.fire({ 
        icon:'info',
        title: 'Valor Total da Venda: R$ {$total}',
        type: 'success'}).then(okay => {
          if (okay) {
            swal.fire({ 
              icon:'success',
              title: 'Venda Cadastrada com Sucesso! ',
              text: ''        
              });
          }
        });
    </script>
    
    ";
    }else{
      // Se o produto não foi cadastrado, uma mensagem de erro surge ?>
      <script> swal.fire({ 
        icon:"error",
        text: "Ops! Houve um erro.",
        type: "success"}).then(okay => {
        if (okay) {
        }
      });
    </script>
    
     
  <?php
}
}
else{
  // Se um produto não foi escolhido, um alerta surge para escolher um produto.
  echo "
   <script>
      Swal.fire({
      icon: 'error',
      title: 'Oops',
      text: 'Selecione um produto!',
    })
  </script>";
  
}
}
?>



