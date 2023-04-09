<?php
    include "_scripts/session.php";
    include "_scripts/protect.php";
    include "modelo/header.php";

    /* novas-vendas.php envia o id do produto escolhido pelo <select> através do método GET (utilizando AJAX)
    e o card é exibido com as informações do mesmo */
    $produto = lerProduto($_GET['id']);

?>
<div>
        <div class="mt-5 card">
                    <div class="card-body">
                        
                        <p class="card-text" style="font-size:25px;">Produto:</p>
                        <h5 class="card-title"><?=$produto['nomeProd']?></h5>
                        <p class="card-text" style="font-size:12px;">Fornecedor: <?=$produto['fornecedor']?></p>
                    </div>
                </div>


        <div class="mt-5 card">
                    <div class="card-body">
                        <p class="card-text" style="font-size:25px;">Quantidade disponível:</p>
                        <h3 class="card-title"><?=$produto['quantidade'];?></h3>
                    </div>
                </div>
            </div>


            <div class="mt-5 card">
                    <div class="card-body">
                        <p class="card-text" style="font-size:25px;">Valor por unidade:</p>
                        <h5 class="card-title">R$<?=$produto['valorVenda'];?></h5>
                        

                    </div>
                </div>
            </div>
</div>

