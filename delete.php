<?php
    include "_scripts/session.php";
    include "_scripts/protect.php";
    include "modelo/header.php";
    
    if(isset($_GET['id'])){
        deletarProduto($_GET['id']); 
        header("location: estoque.php?m=1");       
    }
?>