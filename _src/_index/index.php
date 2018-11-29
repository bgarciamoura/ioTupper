<?php
    session_start();
    if (!isset($_SESSION['usuarioNome'])){
        header("Location: ../_login/login.php");
    }
    // echo "Usuario: ". $_SESSION['usuarioNome'];    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tupper</title>

    <!-- Bootstrap CSS -->      
    <link rel="stylesheet" href="..\..\node_modules\bootstrap\dist\css\bootstrap.css">

    <!-- Normalize CSS -->
    <link rel="stylesheet" href="..\..\_assets\_css\normalize.css">

    <!-- Meu CSS -->
    <link rel="stylesheet" href="index.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
    <div class="wrapper">
        
        <!-- Menu Lateral -->
        <div id="sidemenu" class="active">
            <nav>
                <a href="#" id="dash-home" class="active sidemenu-item"><i class="fas fa-home"></i><span>Home</span></a>
                <a href="#" id="dash-pecas" class="sidemenu-item"><i class="fas fa-coffee"></i><span>Peças</span></a>
                <a href="#" id="dash-cli" class="sidemenu-item"><i class="fas fa-user-circle"></i><span>Clientes</span></a>
                <a href="#" id="dash-conso" class="sidemenu-item"><i class="fas fa-users"></i><span>Consórcios</span></a>
                <a href="#" class="sidemenu-item" onclick="sair()"><i class="fas fa-sign-out-alt"></i><span>Sair</span></a>
            </nav>
        </div>
        <!-- /Menu Lateral -->

        <!-- Header -->
        <div class="header-area">
            <div id="header" class="active">
                <div class="menu-toggle">
                    <button type="button" id="sidebarCollapse" class="btn">
                        <i class="fas fa-align-left"></i>
                    </button>
                </div>

                <div class="search-area d-none d-lg-inline-block">
                    <i class="fas fa-search"></i>
                    <input type="text" class="">
                </div>

                <div class="user-area">
                    <a href="#" class="notification">
                        <i class="fas fa-bell"></i>
                        <span class="circle">3</span>
                    </a>
                    <a href="#">
                        <div class="user-img">

                        </div>
                        <i class="fas fa-caret-down"></i>
                    </a>
                </div>

            </div>
        </div>
        
        <!-- /Header -->
        
        <!-- Main Content -->
            <div id="content-area" class="active">

                

            </div>
        <!-- /Main Content -->
    </div>
        
    

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Sweet Alert -->
    <script src="../../node_modules/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Meu Script -->
    <script src="index.js"></script>
    <script>
       $(document).ready(function() {
            $('#content-area').load('../_dashboard/dashboard.php');

            $('#dash-home').click(function() {
                $('#content-area').load('../_dashboard/dashboard.php')
            });
            $('#dash-pecas').click(function() {
                $('#content-area').load('../_home/home.php')
            });
            $('#dash-cli').click(function() {
                $('#content-area').load('../_clientes/clientes.php')
            });
            $('#dash-conso').click(function() {
                $('#content-area').load('../_teste/teste.php')
            });
            
            $('#sidebarCollapse').on('click', function () {
                $('#sidemenu').toggleClass('active');
                $('#header').toggleClass('active');
                $('#content-area').toggleClass('active');
            });

            $('#sidemenu').on('mouseenter', function() {
                $('#sidemenu').removeClass('active');
                $('#header').removeClass('active');
                $('#content-area').removeClass('active');
            })

            $('#sidemenu').on('mouseleave', function() {
                $('#sidemenu').addClass('active');
                $('#header').addClass('active');
                $('#content-area').addClass('active');
            })

            $('.sidemenu-item').on('click', function () {
                $('.sidemenu-item').removeClass('active');
                $(this).toggleClass('active');
            });
        })
        function sair() {
            swal({
                title: "Tem certeza?",
                text: "Você já vai nos deixar?!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    location.href="../deslogar.php";
                } else {
                    location.href="#";
                }
            });
        }
        
    </script>
</body>
</html>