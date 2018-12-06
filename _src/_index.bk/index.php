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

    <?php
        require_once "indexController.php";
        $id = 0;
        $nome = "Maravilhosa";
        $cor = "Vermelha";
        $quantidade = 3;
        $update = false;
        $row['id'] = 1;
    ?>
    <div class="wrapper">
        

        <!-- Header -->
        <!-- Content-Header -->
        <div id="content-header">
            <h1>CRUD em PHP</h1>
            <p>Bem vindo(a): <?php echo $_SESSION['usuarioNome'] ?></p>
        </div>
        <!-- /Content-Header -->
        <!-- /Header -->
        
        <!-- Main Content -->
            <!-- Table -->
    <table class="table table-light">
        <thead>
            <tr>
                <th>
                    Nome da peça
                </th>
                <th>
                    Cor da Peça
                </th>
                <th>
                    Quantidade
                </th>
                <th>
                    Ações
                </th>
            </tr>
        </thead>
        
        <tbody>
            <tr>
                <td>Jeitosinho</td>
                <td>Rosa</td>
                <td>23</td>
                <td>
                    <button class="btn btn-warning" type="button" id="btnEditar">Editar</button>
                    <button class="btn btn-danger" type="button" id="btnApagar">Apagar</button>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- /Table -->


    
    <div class="container-fluid">
            <div class="row justify-content-center size">
                <div class="col-8">
                    <form action="crud.php" method="post">
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
                        </div>
                        <div class="form-group">
                            <label for="txtNome">Nome da peça</label>
                            <input type="text" name="nome" id="txtNome" class="form-control" placeholder="Informe o nome da peça..." value="<?php echo $nome; ?>">
                        </div>
                        <div class="form-group">
                            <label for="txtCor">Cor da peça</label>
                            <input type="text" name="cor" id="txtCor" class="form-control" placeholder="Informe a cor da peça..." value="<?php echo $cor; ?>">
                        </div>
                        <div class="form-group">
                            <label for="txtQuantidade">Quantidade de peças</label>
                            <input type="number" name="quantidade" id="txtQuantidade" class="form-control" placeholder="Informe a quantidade de peças..." value="<?php echo $quantidade; ?>" min="0" max="500">
                        </div>
                        <div class="form-group">
                            <?php
                                if ($update) {
                            ?>
                                    <button class="btn btn-info btn-block" type="submit" name="atualizar">Atualizar</button>        
                            <?php 
                                } else {

                            ?>
                                <button class="btn btn-primary btn-block" type="submit" name="enviar">Enviar</button>
                            <?php
                                }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
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
            $('#btnApagar').click(function(e){
                    e.preventDefault(); 
                    console.log("CLICADO");
                    $.ajax({
                        url:   'indexController.php',
                        type:  'GET',
                        data:  {
                            funcao:'salvar',
                            nome:'Bruno'
                        },
                        dataType : 'html',
                        error: function (jqXHR, exception) {
                            var msg = '';
                            if (jqXHR.status === 0) {
                                msg = 'Not connect.\n Verify Network.';
                            } else if (jqXHR.status == 404) {
                                msg = 'Requested page not found. [404]';
                            } else if (jqXHR.status == 500) {
                                msg = 'Internal Server Error [500].';
                            } else if (exception === 'parsererror') {
                                msg = 'Requested JSON parse failed.';
                            } else if (exception === 'timeout') {
                                msg = 'Time out error.';
                            } else if (exception === 'abort') {
                                msg = 'Ajax request aborted.';
                            } else {
                                msg = 'Uncaught Error.\n' + jqXHR.responseText;
                            }
                            alert(msg);
                        },
                        success: function( texto ) { 
                              alert( texto );
                        },
                        beforeSend: function() {
                        }
                    });
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