<?php
    include "_scripts/session.php";
    include "_scripts/protect.php";
    include "modelo/header.php";
?>

<body>
    <?php include "modelo/menu.php";?>
    <?php include "modelo/js.php";?>

    <div class="mt-5 container-fluid text-center">
          <div class="row">
            <div class="col-md-12">
              <h1 class="main-title" style="color: white; font-size:3rem;">Seja bem vindo, <?php echo $_SESSION['nome'];?>!</h1>
            </div>            
          </div>

          <?php
          // As opções irão variar de acordo com o cargo armazenado na SESSION, sem mudar a estrutura da página 
          if($_SESSION['cargo']=='Administrador'){
            include "inicio-adm.php";
          }elseif($_SESSION['cargo']=='Vendedor'){
            include "inicio-vend.php";
          }

          ?>

</body>
</html>