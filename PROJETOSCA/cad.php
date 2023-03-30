<?php

include ("conexao.php");

$con = $_SESSION['con'];


date_default_timezone_set('America/Sao_Paulo');

    $nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST,'cpf',FILTER_SANITIZE_STRING);
    $rg = filter_input(INPUT_POST,'rg',FILTER_SANITIZE_STRING);
    $data_nas = filter_input(INPUT_POST,'data_nas',FILTER_SANITIZE_STRING);
    $sexo = filter_input(INPUT_POST,'sexo',FILTER_SANITIZE_STRING);
    $endereco = filter_input(INPUT_POST,'endereco',FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    $telefone = filter_input(INPUT_POST,'telefone',FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_STRING);
    
     $data = date("Y/m/d");
     str_replace('/','-',$data);
    
    //inserindo cliente no banco
    $query = "INSERT INTO cliente (nome, cpf,rg,data_nas, sexo, endereco, email, telefone,data_cadastro, senha) "
            . "VALUES( '$nome', '$cpf', '$rg',  '$data_nas', '$sexo', '$endereco', '$email', '$telefone','$data', '$senha')";
    
    $query2= "INSERT INTO login (cpf, senha, privilegio) VALUES ('$cpf','$senha',1)";
    
    
    $sql = mysqli_query($con,$query);
    $sql = mysqli_query($con,$query2);
    
    if( !$sql ){
        header("Location:cadAlunoNotOk.php?cadastro=false");
        exit;
    }

    //se tudo deu certo, redireciona pra exibe.php com alteracao igual a true
    header("Location:cadAlunoOk.php?cadastro=true");

?>