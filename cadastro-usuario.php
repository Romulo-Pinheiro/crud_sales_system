<?php
include "_scripts/conexao.php";
include "_scripts/functions.php";
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="_images/distribuicao.png" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Sistema de Almoxarifado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="_css/signup.css" type="text/css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body class="text-center" method="POST">
    <form action="" class="form-signin" method="POST">
        <img src="_images/usuario.png" alt="Tela de Login" width="100px" height="100px" class="mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Cadastro de Usuário</h1>

        <label for="inputName">Nome</label>
        <input type="text" id="inputName" name="nome" class="form-control" placeholder="Digite seu nome" required autofocus><br>

        <label for="inputEmail" class="sr-only">Endereço de E-mail</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Digite seu E-mail" required ><br>

        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required><br>

        <label for="inputConfirmPassword" class="sr-only">Confirmar Senha</label>
        <input type="password" name="confirmarSenha" id="inputConfirmPassword" class="form-control" placeholder="Confirme sua Senha" required><br>

        <label for="cargo" class="sr-only">Cargo</label>
        <select name="cargo" id="cargo" class="form-select" required>
            <option selected disabled>Selecione...</option>
            <option value="Vendedor">Vendedor</option>
            <option value="Administrador">Administrador</option>
        </select><br><br>

        <button class="btn btn-lg btn-primary" type="submit">Registrar-se</button>
        <br><br><a class="h6" href="index.php">Voltar para Login</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2023</p>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  </body>

</html>

<?php

if(isset($_POST['email']) || isset($_POST['senha']) || isset($_POST['confirmarSenha'])){
    $cadastro_usuario = cadastroUsuario($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['confirmarSenha'], $_POST['cargo']);
    switch($cadastro_usuario){
        case 0:
            ?>

         <script language='javascript'>
          swal.fire({ 
          icon:"error",
          text: "Todos os campos são obrigatórios",
          type: "success"}).then(okay => {
          if (okay) {
          }
        });
        </script>

        <?php
        break;
        case 1: ?>

        <script language='javascript'>
          swal.fire({ 
          icon:"error",
          text: "Confirmação de senha diferente da senha inserida",
          type: "success"}).then(okay => {
          if (okay) {
          }
        });
        </script>

        <?php
        break;
        case 2: ?>
        <script language='javascript'>
            swal.fire({ 
            icon:"success",
            text: "Usuário cadastrado com sucesso",
            type: "success"}).then(okay => {
            if (okay) {
                window.location= "index.php"
            }
            });
        </script>
        <?php
        break;
        case 3: ?>

        <script language='javascript'>
          swal.fire({ 
          icon:"error",
          text: "E-mail já cadastrado",
          type: "success"}).then(okay => {
          if (okay) {
          }
        });
        </script>
    
        <?php
        break;
    }
}

?>