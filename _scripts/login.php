<?php
    include('conexao.php');
    if(isset($_POST['email']) || isset($_POST['senha'])){
        // Verifica se o campo email e o campo senha foram preenchidos
        if(strlen($_POST['email']) == 0){
            echo "Preencha seu e-mail";
        } else if(strlen($_POST['senha']) == 0){
            echo "Preencha sua senha";
        } else{
            // Previne determinadas falhas de segurança
            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);
            // Procura no banco de dados o usuário com e-mail e senha iguais aos recebidos
            $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução da busca SQL: ".$mysqli->error);
            $quantidade = $sql_query->num_rows;
            // Caso encontre, a quantidade encontrada será 1
            if($quantidade == 1){
                $usuario = $sql_query->fetch_assoc();
                if(!isset($_SESSION)){
                    session_start();
                }
                // Guarda a id, o nome e o cargo do usário em SESSIONs
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];
                $_SESSION['cargo'] = $usuario['cargo'];
                // Redireciona para a sua tela de início
                header("location: ./inicio.php");

            }else{
                // Caso não encontre, a mensaem é exibida
                echo "Falha ao logar! E-mail ou senha incorreto.";
            }
        }
    }
?>