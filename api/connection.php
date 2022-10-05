<?php

$hostName = 'localhost';
$user     = 'root';
$pass     = 'root';
$database = 'cadastro';
$conexao  = mysqli_connect($hostName, $user, $pass, $database);

if(!$conexao) print("Falha ao se conectar com o DataBase");

?>