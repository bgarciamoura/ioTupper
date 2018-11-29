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
    </head>
<body>
    <!-- Content-Header -->
    <div id="content-header">
        <h1>Dashboard</h1>
        <p>Bem vindo(a): <?php echo $_SESSION['usuarioNome'] ?></p>
    </div>
    <!-- /Content-Header -->

    <!-- Cards -->
    <div class="card-group">
        <div class="my-col-md-4">
            <div class="card">
                <div class="user-img">
                </div>
                <span class="user-name"><?php echo $_SESSION['usuarioNome'] ?></span>
                <span class="user-title">Lider Tupper</span>
                <hr>
                <div class="my-col-md-12">
                    <div class="my-col-md-6 f-left">
                        <span class="info-grupo">Nome do Grupo</span>
                    </div>
                    <div class="my-col-md-4 f-left">
                        <span class="dados-grupo">Diamante</span>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="my-col-md-4">
            <div class="card">
                <h6>Dados do vitrine</h6>
                <span class="vendas">Vendas da semana:<br>R$ 1.500,00</span>
                <div class="my-col-md-12">
                    <div class="my-col-md-2 f-left">
                        <span class="icon-vendas">R$</span>
                    </div>
                    <div class="my-col-md-10 f-left">
                        <span class="info-vendas">Vendas esperadas</span>
                        <span class="dados-vendas">R$ 2.500,00</span>
                        <span class="falta-vendas">Faltam R$ 1.000,00</span>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- /Cards -->

    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Teste</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
            </tr>
        </tfoot>
    </table>
    <!-- Table -->
    <table class="d-none">
        <thead>
            <tr>
                <th>
                    Cliente
                </th>
                <th>
                    Consórcio
                </th>
                <th>
                    Data Vencimento
                </th>
                <th>
                    Está em Atraso
                </th>
                </th>
                <th>
                    Total de Parcelas
                </th>
                </th>
                <th>
                    Parcelas Restantes
                </th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Jaqueline</td>
                <td>Sim</td>
                <td>Dia 23 de cada mês</td>
                <td>NÃO</td>
                <td>10</td>
                <td>5</td>
            </tr>
            <tr>
                <td>Caio</td>
                <td>Sim</td>
                <td>Dia 15 de cada mês</td>
                <td>NÃO</td>
                <td>10</td>
                <td>5</td>
            </tr>
        </tbody>
    </table>
    <!-- /Table -->
</body>
</html>
