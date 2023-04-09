
<div class="row">
<div class="col-md-5 container grafico">
        <div class="grafico">
            <div id="grafD">
                <?php
                include "graf-adm-dia.php";
                ?>

            </div>
        </div>
    </div>

    <div class="col-md-5 container grafico">
        <div class="grafico">
            <div id="grafdm">
                <?php
                include "graf-adm-mes.php";
                ?>

            </div>
        </div>
    </div>
</div>


<div class="m-auto col-md-6">
<table class="mt-5 table text-center" style="background-color:white;">
  <thead>
    <tr>
      <th scope="col">Produto vendidos por:</th>
      <th scope="col">Total:</th>

    </tr>
  </thead>

  <tbody>
    <tr>
      <th scope="row">Dia:</th>
      <?php
        echo "<td>". totalAdmDia() ."</td>";
    ?>
    </tr>

    <tr>
      <th scope="row">Mês:</th>
      <?php
      echo "<td>". totalAdmMes() ."</td>";
    ?>
    </tr>
  </tbody>
</table>
</div>

    <div class="mt-5 container-fluid text-center">
          <div class="row">
            <div class="col-md-12">
              <h1 class="main-title" style="color: white; font-size:3rem;">Vendas Cadastradas:</h1>
            </div>            
          </div>

<div class="container-fluid">        
        <div class="row cards-intro">
        <?php
       $lista = listarVendasAdm();
       // Um card é criado para cada venda realizada
        while ($dados = $lista->fetch_array()){
        ?>
         <div class="mt-5 col-sm-3">
          
                <div class="card">
                    <div class="card-body">
                        <p class="card-text" style="font-size:25px;">Quantidade de Vendas:</p>
                        <h5 class="card-title"><?=$dados['quantidade']?></h5>
                        <p class="card-text" style="font-size:12px;">Produto: <?=$dados['nomeProd']?></p>
                        <p class="card-text" style="font-size:12px;">Data: <?=$dados['dataVenda']?></p>
                        
                    </div>
                </div>
            </div>

             <?php }  ?>

        
        </div>        
</div>
    