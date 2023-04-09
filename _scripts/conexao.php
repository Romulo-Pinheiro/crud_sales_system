<?php
    // Realiza a conexão entre o programa e o banco de dados
    $usuario = 'root';
    $senha = '';
    $database = 'login';
    $host = 'localhost';

    $mysqli = new mysqli($host, $usuario, $senha, $database);

    // Caso ocorra um erro, o programa mostra a descrição do erro
    if($mysqli->error){
        die("Falha ao conectar ao banco de dados: ".$mysqli->error);
    }
?>