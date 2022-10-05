<?php
    include_once("connection.php");
    $id  = $_GET['delete'];
    $limiteRegistros = 10;    
    $query = "DELETE FROM `usuario` WHERE id=$id;";
    $salvar = mysqli_query($conexao, $query);
    mysqli_close($conexao);
    header("Refresh: 0; http://localhost/newmobile/dados/dados.html");
?>
