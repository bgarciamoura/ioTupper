<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IOSystem - Login - Controle Tupperware</title>

    <!-- Bootstrap CSS -->      
    <link rel="stylesheet" href="..\..\node_modules\bootstrap\dist\css\bootstrap.css">
    <!-- Meu CSS -->
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <div class="container centralize">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <p class="text-center text-danger h5">
                    <?php if(isset($_SESSION['loginErro'])){
                        echo $_SESSION['loginErro'];
                        //echo  "<script>alert('{$_SESSION['loginErro']}');</script>";
                        unset($_SESSION['loginErro']);
                    }?>
                   
                </p>
                <p class="text-center">
                    <?php 
                    if(isset($_SESSION['logindeslogado'])){
                        //echo $_SESSION['logindeslogado'];
                        unset($_SESSION['logindeslogado']);
                    }
                    ?>
                </p>
                <div class="card text-center">
                    <div class="card-body">
                        <form action="controllerLogin.php" method="POST">
                            <div class="form-group">
                                <label for="login" class="h4">Usuário</label>
                                <input type="text" class="form-control" id="txtLogin" name="login" aria-describedby="loginHelp" placeholder="Informe seu login..." required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="h4">Senha</label>
                                <input type="password" class="form-control" id="txtPassword" name="password" placeholder="Digite sua senha..." required>
                                <small id="loginHelp" class="form-text text-muted">Os dados não são compartilhados com ninguém.</small>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                        </form>
                        <a href="#" class="btn btn-info btn-block mt-3">Esqueci minha senha</a>
                    </div>
                    <div class="card-footer text-muted">
                        IOSystem - Todos os direitos reservados
                    </div>
                </div>
            </div>
        </div>
    </div>
    


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Meu Script -->
    <script src="login.js"></script>
</body>
</html>