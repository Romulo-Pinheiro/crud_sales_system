<div class="row">

<div class="col-md-5 container grafico">
        <div class="grafico">
            <h2 style="color:white;font-weight:bold;">TOP 10 DO DIA:</h2>
            <div id="graf">
                <?php
                include "graf-vend-dia.php";
                ?>

            </div>
        </div>
    </div>

    <div class="col-md-5 container grafico">
        <div class="grafico">
            <h2 style="color:white;font-weight:bold;">TOP 10 DO MÊS:</h2>
            <div id="grafM">
                <?php
                include "graf-vend-mes.php";
                ?>

            </div>
        </div>
    </div>
</div>


<div class="container-fluid">        
        <div class="row cards-intro">
        <?php
       $lista = listarVendasVendedor($_SESSION['id']);
       // Um card é criado para cada venda realizada pelo vendedor logado
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
    
    
    