<?php
    if(!isset($_SESSION)){
        session_start();
    }

    // Verifica se o usuário tem uma id guardada em SESSION. Caso não haja, ele não está logado, portanto não pode ter acesso à página
    if(!isset($_SESSION['id'])){
        die("Você não pode acessar esta página porque não está logado. <p><a href=\"index.php\">Entrar</a></p>");
    }
?>