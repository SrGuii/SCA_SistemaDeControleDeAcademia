<?php
include ("conexao.php");
$con = $_SESSION['con'];


$nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST,'cpf',FILTER_SANITIZE_STRING);
$rg = filter_input(INPUT_POST,'rg',FILTER_SANITIZE_STRING);
$data_nas = filter_input(INPUT_POST,'data_nas',FILTER_SANITIZE_STRING);
$sexo = filter_input(INPUT_POST,'sexo',FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST,'endereco',FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST,'telefone',FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_STRING);
$cargo = filter_input(INPUT_POST,'cargo',FILTER_SANITIZE_STRING);


$query = "INSERT INTO professor (nome, cpf, rg, data_nasc, sexo, endereco,cargo, email, telefone) VALUES( '$nome', '$cpf', '$rg', '$data_nas', '$sexo', '$endereco','$cargo', '$email', '$telefone')";
$sql = mysqli_query($con,$query);

$query2 = "INSERT INTO login (cpf, senha, privilegio) VALUES( '$cpf', '$senha', 2)";
$sql = mysqli_query($con,$query2);

if( !$sql ){
        header("Location:cadProfNotOk.php?cadastro=false");
        exit;
    }

    //se tudo deu certo, redireciona pra exibe.php com alteracao igual a true
    header("Location:cadProfOk.php?cadastro=true");

?>