<?php

include ("conexao.php");

$idusu = $_SESSION['idusu'];
$con = $_SESSION['con'];

$peso = filter_input(INPUT_POST,'peso',FILTER_SANITIZE_NUMBER_FLOAT);
$altura = filter_input(INPUT_POST,'altura',FILTER_SANITIZE_NUMBER_FLOAT);
$fuma = filter_input(INPUT_POST,'fuma',FILTER_SANITIZE_STRING);
$bebe = filter_input(INPUT_POST,'bebe',FILTER_SANITIZE_STRING);
$hstrab = filter_input(INPUT_POST,'hstrab',FILTER_SANITIZE_STRING);
$faz_exer = filter_input(INPUT_POST,'faz_exer',FILTER_SANITIZE_STRING);
$exer_qual = filter_input(INPUT_POST,'exer_qual',FILTER_SANITIZE_STRING);
$horas_sono = filter_input(INPUT_POST,'horas_sono',FILTER_SANITIZE_STRING);
$problema_familia = filter_input(INPUT_POST,'problema_familia',FILTER_SANITIZE_STRING);
$familia_qual = filter_input(INPUT_POST,'familia_qual',FILTER_SANITIZE_STRING);
$doenca = filter_input(INPUT_POST,'doenca',FILTER_SANITIZE_STRING);
$doenca_qual = filter_input(INPUT_POST,'doenca_qual',FILTER_SANITIZE_STRING);
$cirurgia = filter_input(INPUT_POST,'cirurgia',FILTER_SANITIZE_STRING);
$cirurgia_qual = filter_input(INPUT_POST,'cirurgia_qual',FILTER_SANITIZE_STRING);
$medicamento = filter_input(INPUT_POST,'medicamento',FILTER_SANITIZE_STRING);
$medi_qual = filter_input(INPUT_POST,'medi_qual',FILTER_SANITIZE_STRING);
$medi_quant = filter_input(INPUT_POST,'medi_quant',FILTER_SANITIZE_STRING);
$estresse = filter_input(INPUT_POST,'estresse',FILTER_SANITIZE_STRING);
$dor = filter_input(INPUT_POST,'dor',FILTER_SANITIZE_STRING);
$dor_qual = filter_input(INPUT_POST,'dor_qual',FILTER_SANITIZE_STRING);
$dor_local = filter_input(INPUT_POST,'dor_local',FILTER_SANITIZE_STRING);
$alergia = filter_input(INPUT_POST,'alergia',FILTER_SANITIZE_STRING);
$alergia_qual = filter_input(INPUT_POST,'alergia_qual',FILTER_SANITIZE_STRING);
$restri_exercicio = filter_input(INPUT_POST,'restri_exercicio',FILTER_SANITIZE_STRING);
$restric_qual = filter_input(INPUT_POST,'restric_qual',FILTER_SANITIZE_STRING);
if(isset($_POST['objetivo1'])){
    $objetivo1 = $_POST['objetivo1'];
}else{
    $objetivo1 = " ";
}
if(isset($_POST['objetivo2'])){
    $objetivo2 = $_POST['objetivo2'];
}else{
    $objetivo2 = " ";
}
if(isset($_POST['objetivo3'])){
    $objetivo3 = $_POST['objetivo3'];
}else{
    $objetivo3 = " ";
}
if(isset($_POST['objetivo4'])){
    $objetivo4 = $_POST['objetivo4'];
}else{
    $objetivo4 = " ";
}
if(isset($_POST['objetivo5'])){
    $objetivo5 = $_POST['objetivo5'];
}else{
    $objetivo5 = " ";
}
if(isset($_POST['objetivo6'])){
    $objetivo6 = $_POST['objetivo6'];
}else{
    $objetivo6 = " ";
}
if(isset($_POST['objetivo7'])){
    $objetivo7 = $_POST['objetivo7'];
}else{
    $objetivo7 = " ";
}
//$objetivo1 = $_POST['objetivo'];
//$objetivo2 = $_POST['objetivo2'];
//$objetivo3 = $_POST['objetivo3'];
//$objetivo4 = $_POST['objetivo4'];
//$objetivo5 = $_POST['objetivo5'];
//$objetivo6 = $_POST['objetivo6'];
//$objetivo7 = $_POST['objetivo7'];
$objetivo = $objetivo1.", ".$objetivo2.", ".$objetivo3.", ".$objetivo4.", ".$objetivo5.", ".$objetivo6.", ".$objetivo7;

$query = "INSERT INTO `anamnese` ( `peso`, `altura`,  `fuma`, `bebe`, `hstrabalho`, `faz_exercicio`, `exercicio_qual`,"
        . " `horas_sono`, `problema_familia`, `familia_qual`, `doenca`, `doenca_qual`, `cirurgia`, `cirurgia_qual`, `medicamento`, `medi_qual`,"
        . " `medi_quant`, `estresse`, `dor`, `dor_qual`, `dor_local`, `alergia`, `alergia_qual`, `restri_exerc`, `restric_qual`, `objetivo`,"
        . " `id_cliente`) VALUES ( '$peso', '$altura', '$fuma', '$bebe', '$hstrab', '$faz_exer', '$exer_qual', '$horas_sono', '$problema_familia', '$familia_qual', '$doenca', '$doenca_qual', '$cirurgia', "
        . "'$cirurgia_qual', '$medicamento', '$medi_qual', '$medi_quant', '$estresse', '$dor', '$dor_qual', '$dor_local', '$alergia', '$alergia_qual', '$restri_exercicio', '$restric_qual', '$objetivo', '$idusu');";

  $sql = mysqli_query($con,$query);     

if( !$sql ){
        header("Location:indexAluno.php?cadastro=false");
        exit;
    }

    //se tudo deu certo, redireciona pra exibe.php com alteracao igual a true
    header("Location:indexAluno.php?cadastro=true");

?>  