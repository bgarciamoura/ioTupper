<?php
    // começar ou retomar uma sessão
    session_start();
    include_once("../_conn/conexao.php");
   
    $conn = mysqli_connect(HOST, USER, PWD, DB) or die("Falha na conexao: " . mysqli_connect_error());

    if((isset($_POST['login'])) && (isset($_POST['password']))){
        //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
        $login = mysqli_real_escape_string($conn, $_POST['login']);
        $senha = mysqli_real_escape_string($conn, $_POST['password']);
            
        //Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
        $result_usuario = "SELECT * FROM tbusuarios WHERE usu_Login = '$login' && usu_Senha = '$senha' LIMIT 1";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        $resultado = mysqli_fetch_assoc($resultado_usuario);
        
        //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        if(isset($resultado)){
            $_SESSION['usuarioId'] = $resultado['usu_ID'];
            $_SESSION['usuarioNome'] = $resultado['usu_Nome'];
            header("Location: ../_index/index.php");



        //Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        //redireciona o usuario para a página de login
        }else{    
            //Váriavel global recebendo a mensagem de erro
            $_SESSION['loginErro'] = "Usuário ou senha Inválido";
            header("Location: login.php");
        }
    //O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
    }else{
        $_SESSION['loginErro'] = "Usuário ou senha inválido";
        header("Location: login.php");
    }
?>