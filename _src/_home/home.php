<?php
    session_start();
    if (!isset($_SESSION['usuarioNome'])){
        header("Location: ../_login/login.php");
    }
    // echo "Usuario: ". $_SESSION['usuarioNome'];    
?>

    
    <div id="my-carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li class="active" data-target="#my-carousel" data-slide-to="0"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 h-50" src="..\..\_assets\_imgs\man.jpg">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Title</h5>
                    <p>Text</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 h-50" src="..\..\_assets\_imgs\women.jpg">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Title</h5>
                    <p>Text</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#my-carousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#my-carousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>