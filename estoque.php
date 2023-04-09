<?php
    include "_scripts/session.php";
    include "_scripts/protect.php";
    include "modelo/header.php";
?>

<body>
    <?php include "modelo/menu.php";?>
    <?php include "modelo/js.php";?>
    <div class="row cards-intro">
    <?php
        $lista = listarProdutos();
        // Exibe cada produto no banco de dados em um card de 1/4 da tela
        while ($dados = $lista->fetch_array()){
        ?>
        <div class="col-sm-3 mt-4">
            <div class="card">
                <h5 class="card-header text-center" <?php if($dados['quantidade'] <= 10){ ?>style = "background-color:#CD0000;color:white;"<?php } ?>> <?php if($dados['quantidade'] <= 10){ echo "ÚLTIMAS UNIDADES";}?> </h5>
                <div class="card-body text-center" >
                    <h5 class="card-title"><?= $dados['quantidade']; ?></h5>
                    <p class="card-text"><h2 style="font-weight:bold;color:white;"><?= $dados['nomeProd']; ?></h2></p>
                    <p class="card-text"><h5 style="font-weight:bold;">Fornecedor: <?= $dados['fornecedor']; ?></h5></p>
                    <p class="card-text"><h5 style="font-weight:bold;">Valor de Vendas: R$<?= $dados['valorVenda']; ?></h5></p>
                    <a href="edicao.php?id=<?= $dados['codProd'];?>&fornecedor=<?= $dados['fornecedor'];?>&produto=<?= $dados['nomeProd'];?>&custo=<?= $dados['custo'];?>&valorVenda=<?= $dados['valorVenda'];?>" class="card-link"><i class="fa-solid fa-pen-to-square" style="color:black;"></i></a>
                    <?php 
                    // Exibe o ícone e opção de deletar apenas se o usuário for o Administrador
                    if($_SESSION['cargo'] == "Administrador"){ ?>
                        <a href="delete.php?id=<?= $dados['codProd'];?>"class="card-link btn-del"><i class="fa-solid fa-trash-can" style="color:black;"></i></a>
                        <script>
                                $('.btn-del').on('click', function(e){
                                    e.preventDefault();
                                    const href = $(this).attr('href')
                                    swal.fire({
                            title: 'Você tem certeza?',
                            text: "Você não poderá reverter isso!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            cancelButtonText: "Cancelar",
                            confirmButtonText: 'Sim, deletar!'
                            }).then((result) => {
                            if (result.isConfirmed) {
                                // Se o resultado for confirmado, o usuário será levado ao href do elemento (delete.php)
                                document.location.href = href;
                            }
                            });
                                })
                            </script>
                    <?php } ?>
                    
                </div>
                
            </div>
            <?php 
                // Se o produto foi deletado, o arquivo recebe um GET e exibe que foi deletado.
                if(isset($_GET['m'])){?>
                    <script>
                        swal.fire({
                            title: 'Deletado',
                            icon: 'success',
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok'
                            }).then((result) => {
                            if (result.isConfirmed) {
                                document.location.href = "estoque.php";
                            }
                            })
                                
                    </script>
                <?php } ?>
        </div>

        <?php } ?>       
    </div>
   
</body>
</html>

