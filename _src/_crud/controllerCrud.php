<?php
    
    include_once("../_conn/conexao.php");
    

    if(isset($_GET['funcao'])){
        $op = $_GET['funcao'];
        switch ($op) {
            case 'Salvar':
                create();
                break;
            case 'read':
                read();
                break;
            case 'Atualizar':
                update();
                break;
            case 'delete':
                delete();
                break;
            case 'readall':
                readAll();
                break;
            default:
                echo "<script>console.log( 'DEURUIM' );</script>";
                break;
        }
    }
    
    
    function create(){
        echo "<script>console.log(". $_GET['nome'] . $_GET['cor'] . $_GET['quantidade']   .");</script>";
        $nome = $_GET['nome'];
        $cor = $_GET['cor'];
        $quantidade = $_GET['quantidade'];
        $conn = new mysqli(HOST, USER, PWD, DB) or die("Falha na conexao: " . mysqli_connect_error());
        $query = "INSERT INTO tbpecas (pec_Nome, pec_Cor, pec_Quantidade) VALUES ('$nome', '$cor', '$quantidade')";
        $result = $conn->query($query) or die("Falha ao salvar o registro");
    }

    function read(){
        echo "<script>console.log( 'PHP: " . $_GET['nome'] . "' );</script>";
    }

    function update(){
        $id = $_GET['id'];
        $nome = $_GET['nome'];
        $cor = $_GET['cor'];
        $quantidade = $_GET['quantidade'];
        $conn = new mysqli(HOST, USER, PWD, DB) or die("Falha na conexao: " . mysqli_connect_error());
        $query = "UPDATE tbpecas SET pec_Nome='$nome', pec_Cor='$cor', pec_Quantidade='$quantidade' WHERE pec_ID = '$id'";
        $result = $conn->query($query) or die("Falha ao atualizar o registro");
    }

    function delete(){
        $id = $_GET['id'];
        $nome = $_GET['nome'];
        $cor = $_GET['cor'];
        $quantidade = $_GET['quantidade'];
        $conn = new mysqli(HOST, USER, PWD, DB) or die("Falha na conexao: " . mysqli_connect_error());
        $query = "DELETE FROM tbpecas WHERE pec_ID = '$id'";
        $result = $conn->query($query) or die("Falha ao deletar o registro");
    }

    // function readAll(){
    //     $conn = new mysqli(HOST, USER, PWD, DB) or die("Falha na conexao: " . mysqli_connect_error());
    //     $query = "SELECT * FROM tbpecas";
    //     $result = $conn->query($query) or die("DEURUIM");
    //     while ($dado = $result->fetch_array()) {
    //         // echo "<script>console.log( 'PHP: " . $dado['pec_Nome'] . "' );</script>";
    //     }
    //     return $result;
        
    // }
?>