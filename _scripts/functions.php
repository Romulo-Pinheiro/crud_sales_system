<?php
    function login($input_email, $input_senha){
        include "_scripts/conexao.php";

         // Verifica se o campo email e o campo senha foram preenchidos
         if(strlen($input_email) == 0){

            // Se o email não foi preenchido, retorna 0
            return 0;
        } elseif(strlen($input_senha) == 0){
            // Se a senha não foi preenchida, retorna 1
            return 1;
        } else{
            // Previne falhas de segurança como SQL Injection
            $input_email = $mysqli->real_escape_string($input_email);
            $input_senha = $mysqli->real_escape_string($input_senha);
            
            // Procura no banco de dados o usuário com e-mail e senha iguais aos recebidos
            $sql_code = "SELECT * FROM usuarios WHERE email = '$input_email' AND senha = '$input_senha'";
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
                
                // Se o usuário for encontrado, retorna 2 para que seja direcionado à tela
                return 2;

            }else{
                // Se o usuário não for encontrado, retorna 3
                return 3;
            }
        }
    }

    function cadastroUsuario($input_nome, $input_email, $input_senha, $input_confirm_senha, $input_cargo){
        include "_scripts/conexao.php";

        // Verifica se algum input foi vazio
        if(strlen($input_email) == 0 or strlen($input_email) == 0 or strlen($input_senha) == 0 or strlen($input_confirm_senha) == 0 or empty($input_cargo)){
            return 0;
        }

        // Se nenhum input foi vazio, verifica se a senha inserida foi igual à confirmada
        elseif ($input_senha != $input_confirm_senha){
            return 1;
        }
        else{
            // Seleciona os usuários para verificar se algum possui o email a cadastrar
            $sql_code = "SELECT * FROM usuarios WHERE email = '$input_email'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução da busca SQL: ".$mysqli->error);
            $encontrados = $sql_query->num_rows;
            
            if ($encontrados == 0){
                // Se não encontrou nenhum, cadastra o usuário
                $sql = "INSERT INTO usuarios (nome,email,senha,cargo) VALUES ('$input_nome','$input_email','$input_senha','$input_cargo')";
                $query = $mysqli->query($sql);
                return 2;
            }else{
                // Se encontrou, não cadastra o usuário
                return 3;
            }
        }
    }

    function cadastrarProduto($dados){
        include "_scripts/conexao.php";
        include "_scripts/session.php";

        // Para cadastrar um produto, o programa captura o id do usuário e os dados do método POST do formulário
        $id_vendedor = $_SESSION['id'];
        $produto = $dados['produto'];
        $fornecedor = $dados['fornecedor'];
        $custo = $dados['custo'];
        $venda = $dados['venda'];
        $quantidade = $dados['quantidade'];
        // Se algum dado for negativo, o produto não será cadastrado
        if($custo <=0 || $venda <=0 || $quantidade <=0){
            return false;
        }
        //Verifica se há algum produto com nome e fornecedor iguais
        $sql_code = "SELECT * FROM produtos WHERE nomeProd = '$produto' AND fornecedor = '$fornecedor'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução da busca SQL: ".$mysqli->error);
        $encontrados = $sql_query->num_rows;
        // Caso não haja, o produto é cadastrado no banco de dados
        if($encontrados == 0){
            $sql = "INSERT INTO produtos (vendedor,nomeProd,fornecedor,custo,valorVenda,quantidade) VALUES ('$id_vendedor','$produto','$fornecedor','$custo','$venda','$quantidade')";
            $query = $mysqli->query($sql);
            return $query;
        }
        //Fim da Verificação
        
    }

    function editarProduto($dados, $id_prod){
        include "_scripts/conexao.php";
        include "_scripts/session.php";

        // Para editar o produto, o programa captura o id do vendedor e os dados do método POST do formulário de edição
        $id_vendedor = $_SESSION['id'];
        $custo = $dados['custo'];
        $venda = $dados['venda'];
        $quantidade = $dados['quantidade'];
        // Se algum dado for negativo, o produto não será editado
        if($custo <=0 || $venda <=0 || $quantidade <=0){
            return false;
        }
        $sql = "UPDATE produtos SET vendedor='$id_vendedor', custo='$custo', valorVenda='$venda', quantidade='$quantidade' WHERE codProd='$id_prod'";
        $query = $mysqli->query($sql);
        return $query;

        
    }

    function listarProdutos(){
        include "_scripts/conexao.php";
        // Seleciona todos os produtos no banco de dados
        $sql = "SELECT * FROM produtos";
        $query = $mysqli->query($sql);

        return $query;
    }

    function deletarProduto($id){
        include "_scripts/conexao.php";
        // Recebe o id de um produto e deleta o produto correspondente a este id
        $sql = "DELETE FROM produtos WHERE codProd = '$id'";
        $query = $mysqli->query($sql);
        return $query;
    }

    function lerProduto($id){
        include "_scripts/conexao.php";
        // Recebe o id de um produto e seleciona o produto correspondente a este id
        $sql = "SELECT * FROM produtos WHERE codProd = '$id'";
        $query = $mysqli->query($sql);
        // Retorna os dados do produto em uma array
        return $query->fetch_array();


    }

    function cadastrarVenda($id, $quantidadeVenda, $vendedor,$valorVenda){
        include "_scripts/conexao.php";
        $produto = lerProduto($id);
        // Se a venda tiver quantidade negativa, não será cadastrada
        if($quantidadeVenda <=0){
            return false;
        }
        // Verifica se a quantidade disponível do produto é maior ou igual à quantidade vendida
        if($produto['quantidade']>=$quantidadeVenda){
            $sql = "UPDATE produtos SET quantidade = quantidade - '$quantidadeVenda' WHERE codProd = '$id'";
            $query = $mysqli->query($sql);
            if($query){
                $nomeProd = $produto['nomeProd'];
                $sql = "INSERT INTO vendas (quantidade, codProd, nomeProd, vendedor, valorVenda) VALUES ('$quantidadeVenda', '$id', '$nomeProd', '$vendedor', '$valorVenda')";
                $query = $mysqli->query($sql);
                return $query;
            }    
        }
        // Caso a quantidade vendida do produto seja maior que a quantidade disponível, a venda não é cadastrada 
        return false;
    }

    function listarVendasAdm(){
        include "_scripts/conexao.php";
        // Seleciona todas as vendas (independente de vendedor) para serem exibidas ao ADMINISTRADOR a partir da mais recente
        $sql = "SELECT * FROM vendas ORDER BY dataVenda DESC";
        $query = $mysqli->query($sql);

        return $query;
    }

    function listarVendasVendedor($id){
        include "_scripts/conexao.php";
        // Seleciona as vendas do vendedor logado para serem exibidas ao VENDEDOR a partir da mais recente
        $sql = "SELECT * FROM vendas WHERE vendedor = '$id' ORDER BY dataVenda DESC";
        $query = $mysqli->query($sql);
        return $query;
    }

    function topDezAdmMes(){
        include "_scripts/conexao.php";
        // Seleciona os 10 produtos mais vendidos no mês (independente de vendedor) para serem exibidos ao ADMINISTRADOR em ordem decrescente
        $sql = "SELECT nomeProd, SUM(quantidade) AS qtd_total FROM `vendas` WHERE MONTH(dataVenda) = MONTH(NOW()) AND YEAR(dataVenda) = YEAR(NOW()) GROUP BY codProd ORDER BY SUM(quantidade) DESC LIMIT 10";
        $query = $mysqli->query($sql);

        return $query;
    }

    function topDezAdmDia(){
        include "_scripts/conexao.php";
        // Seleciona os 10 produtos mais vendidos no dia (independente de vendedor) para serem exibidos ao ADMINISTRADOR em ordem decrescente
        $sql = "SELECT nomeProd, SUM(quantidade) AS qtd_total FROM `vendas` WHERE DAY(dataVenda) = DAY(NOW()) AND MONTH(dataVenda) = MONTH(NOW()) AND YEAR(dataVenda) = YEAR(NOW()) GROUP BY codProd ORDER BY SUM(quantidade) DESC LIMIT 10";
        $query = $mysqli->query($sql);

        return $query;
    }

    function topDezVendDia($id){
        include "_scripts/conexao.php";
        // Seleciona os 10 produtos mais vendidos no dia pelo vendedor logado para serem exibidos ao VENDEDOR em ordem decrescente
        $sql = "SELECT nomeProd, SUM(quantidade) AS qtd_total FROM vendas WHERE DAY(dataVenda) = DAY(NOW()) AND MONTH(dataVenda) = MONTH(NOW()) AND YEAR(dataVenda) = YEAR(NOW())  AND vendedor = '$id'  GROUP BY codProd ORDER BY SUM(quantidade) DESC LIMIT 10";
        $query = $mysqli->query($sql);

        return $query;
    }
    function topDezVendMes($id){
        include "_scripts/conexao.php";
        // Seleciona os 10 produtos mais vendidos no MÊS pelo vendedor logado para serem exibidos ao VENDEDOR em ordem decrescente
        $sql = "SELECT nomeProd, SUM(quantidade) AS qtd_total FROM vendas WHERE MONTH(dataVenda) = MONTH(NOW()) AND YEAR(dataVenda) = YEAR(NOW()) AND vendedor = '$id' GROUP BY codProd ORDER BY SUM(quantidade) DESC LIMIT 10";
        $query = $mysqli->query($sql);

        return $query;
    }

    function totalAdmDia(){
        include "_scripts/conexao.php";
        // Retona a quantidade total de produtos vendidos no dia
        $sql = "SELECT SUM(quantidade) AS qtd_total FROM vendas WHERE DAY(dataVenda) = DAY(NOW()) AND MONTH(dataVenda) = MONTH(NOW()) AND YEAR(dataVenda) = YEAR(NOW())";
        $resultado = $mysqli->query($sql);
        $dados = $resultado->fetch_array();
        return $dados['qtd_total'];
    }

    function totalAdmMes(){
        include "_scripts/conexao.php";
        // Retona a quantidade total de produtos vendidos no mês
        $sql = "SELECT SUM(quantidade) AS qtd_total FROM vendas WHERE MONTH(dataVenda) = MONTH(NOW()) AND YEAR(dataVenda) = YEAR(NOW())";
        $resultado = $mysqli->query($sql);
        $dados = $resultado->fetch_array();
        return $dados['qtd_total'];

    }



  


?>