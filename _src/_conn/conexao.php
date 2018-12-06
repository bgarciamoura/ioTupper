<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "dbtupper";
    
    //Criar a conexao
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname) or die("Falha na conexao: " . mysqli_connect_error());;

?>