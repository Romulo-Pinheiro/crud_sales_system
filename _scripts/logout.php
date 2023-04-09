<?php
    if(!isset($_SESSION)){
        session_start();
    }
    // Destrói a SESSION e redireciona o usuário para a tela de login
    session_destroy();
    header("Location: ../index.php");
?>