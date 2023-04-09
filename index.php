<?php
  include "_scripts/login.php";
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
    <link rel="stylesheet" href="_css/login.css" type="text/css">
  </head>
  <body class="text-center" method="POST">
    <form action="" class="form-signin" method="POST">
        <img src="_images/usuario.png" alt="Tela de Login" width="100px" height="100px" class="mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Login</h1>

        <label for="inputEmail" class="sr-only">Endereço de E-mail</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Digite seu E-mail" required autofocus><br>

        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required><br>

        <button class="btn btn-lg btn-primary" type="submit">Login</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  </body>

</html>