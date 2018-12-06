<?php
    session_start();
    if (!isset($_SESSION['usuarioNome'])){
        header("Location: ../_login/login.php");
    }
    // echo "Usuario: ". $_SESSION['usuarioNome'];    
?>
<html>
    <head>
        <link rel="stylesheet" href="../_dashboard/dashboard.css">
        <link rel="stylesheet" href="../_crud/crud.css">
        <script>
            class peca{
                constructor(_id, _nome, _cor, _quantidade) {
                    this.id = _id;
                    this.nome = _nome;
                    this.quantidade = _quantidade;
                    this.cor = _cor;
                }
                get getNome() {
                    return this.nome;
                }
                set setNome(_nome) {
                    this.nome = _nome;
                }
                get getQuantidade() {
                    return this.quantidade;
                }
                set setQuantidade(_quantidade) {
                    this.quantidade = _quantidade;
                }
                get getValor() {
                    return this.valor;
                }
                set setValor(_valor) {
                    this.valor = _valor;
                }
            }
        </script>
    </head>
<body>
    <?php
        require_once "controllerCrud.php";
        $result;
        
    ?>


    <!-- Content-Header -->
    <div id="content-header">
        <h1>CRUD em PHP</h1>
        <p>Bem vindo(a): <?php echo $_SESSION['usuarioNome'] ?></p>
    </div>
    <!-- /Content-Header -->

   
    <!-- Table -->
    <table class="table table-light" id="tabela">
        <thead>
            <tr>
                <th scope="col">
                    #
                </th>
                <th scope="col">
                    Nome da peça
                </th>
                <th scope="col">
                    Cor da Peça
                </th>
                <th scope="col">
                    Quantidade
                </th>
                <th scope="col">
                    Ações
                </th>
            </tr>
        </thead>
        
        <?php 
            $conn = new mysqli(HOST, USER, PWD, DB) or die("Falha na conexao: " . mysqli_connect_error());
            $query = "SELECT * FROM tbpecas ORDER BY pec_ID asc";
            $result = $conn->query($query) or die("DEURUIM");
            
            while ($row = $result->fetch_array()) { 
        ?>
        <tbody>
            <tr>
                <td class="data" scope="row"><?php echo $row['pec_ID']; ?></td>
                <td class="data"><?php echo $row['pec_Nome']; ?></td>
                <td class="data"><?php echo $row['pec_Cor']; ?></td>
                <td class="data"><?php echo $row['pec_Quantidade']; ?></td>
                <td>
                    <button class="btn btn-warning btnEditar" type="button" id="">Editar</button>
                    <button class="btn btn-danger btnApagar" type="button" id="">Apagar</button>
                </td>
            </tr>
        </tbody>
        <?php } ?>
    </table>
    <!-- /Table -->


    
    <div class="container-fluid">
            <div class="row justify-content-center size">
                <div class="col-8">
                    <form action="" method="">
                        <div class="form-group">
                            <input type="hidden" id="txtID" name="id" class="form-control" value="<?php echo $id; ?>">
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
                            <button id="btnSalvar" class="btn btn-primary btn-block" type="button" name="enviar" value="salvar">Salvar</button>
                        </div>
                        <div class="form-group">
                            <button id="btnLimpar" class="btn btn-secondary btn-block" type="button" value="limpar">Limpar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        

    <!-- Sweet Alert -->
    <script src="../../node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        
        var linhaSelecionada;
        $(document).on('click', 'tr', function(){
            $('tr').removeClass('selecionado');
            $(this).addClass('selecionado');
            linhaSelecionada = $(this).closest('tr');
            
        })
        $(document).ready(function(){
            $('#btnSalvar').click(function(){
                var text = $('#btnSalvar').select().text();
                var id = $('#txtID').val();
                var nome = $('#txtNome').val();
                var cor = $('#txtCor').val();
                var quantidade = $('#txtQuantidade').val();
                // alert(text);
                $.ajax({
                        url:   '../_crud/controllerCrud.php',
                        type:  'GET',
                        data:  {
                            funcao: text,
                            id: id,
                            nome: nome,
                            cor: cor,
                            quantidade: quantidade
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
                        success: function( dados ) { 
                            Limpar();
                            
                        },
                        beforeSend: function() {
                        }
                });
            });
            $('.btnEditar').click(function(){
                $('#btnSalvar').text('Atualizar');
                linhaSelecionada = $(this).closest('tr');
                var colunas = linhaSelecionada.children();
                $('#txtID').val($(colunas[0]).text());
                $('#txtNome').val($(colunas[1]).text());
                $('#txtCor').val($(colunas[2]).text());
                $('#txtQuantidade').val($(colunas[3]).text());
            })
            $('#btnLimpar').click(function(){
                Limpar();
            });

            $('.btnApagar').click(function(){
                    linhaSelecionada = $(this).closest('tr');
                    var colunas = linhaSelecionada.children();
                    let id = ($(colunas[0]).text());
                    let nome = ($(colunas[1]).text());
                    let cor = ($(colunas[2]).text());
                    let quantidade = ($(colunas[3]).text());
                    // alert(text);
                    var v = [id, nome, cor, quantidade];
                    deleteTrue(v);
                });

        });

        function Limpar(){
            $('#txtID').val('');
            $('#txtNome').val('');
            $('#txtCor').val('');
            $('#txtQuantidade').val('');
            $('#btnSalvar').text('Salvar');
            $('tr').removeClass('selecionado');
            linhaSelecionada = '';
        }

        function deleteTrue(vetor) {
            swal({
                title: "Tem certeza?",
                text: "O registro não poderá ser recuperado!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                            url:   '../_crud/controllerCrud.php',
                            type:  'GET',
                            data:  {
                                funcao: 'delete',
                                id: vetor[0],
                                nome: vetor[1],
                                cor: vetor[2],
                                quantidade: vetor[3]
                            },
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
                            success: function( dados ) { 
                                // alert(dados);
                            },
                            beforeSend: function() {
                            }
                        });
                        linhaSelecionada.fadeOut(400, function(){
                        linhaSelecionada.remove();
                    });
                } else {
                    swal("Registro não deletado!");
                }
            });
        }
    </script>
</body>
</html>
