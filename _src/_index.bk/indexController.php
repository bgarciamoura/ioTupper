<?php
    


    if(isset($_GET['funcao'])){
        $op = $_GET['funcao'];
        switch ($op) {
            case 'salvar':
                echo "<script>console.log( 'PHP: " . $_GET['nome'] . "' );</script>";
                break;
            case 'editar':
                # code...
                break;
            case 'deletar':
                # code...
                break;
            case 'DEUMERDA':
                echo "<script>console.log( 'SACODEBOSTA' );</script>";
                break;
            
            default:
                echo "<script>console.log( 'DEURUIM' );</script>";
                break;
        }
    }
?>