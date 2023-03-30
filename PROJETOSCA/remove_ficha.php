<?php
include("conexao.php");
$con = $_SESSION['con'];



if(isset($_POST['id'])){
$id = $_POST['id'];

$sql = "DELETE FROM `ficha` WHERE `ficha`.`id_ficha` = '$id'";

 $remove = mysqli_query($con, $sql);
    //Se falhou, redireciona pra exibe.php com remove igual a false 
    if( !$remove ){
        header("Location:ficha.php?remove=false");
        exit;
    }
    //se tudo deu certo, redireciona pra exibe.php com remove igual a true
    header("Location:ficha.php?remove=true");
}
if(isset($_POST['bloco'])){
	$id_usu = $_SESSION['id'];
	$bloco = $_POST['bloco'];
	
	$sql1 = "DELETE FROM `ficha` WHERE `ficha`.`bloco` = '$bloco' AND `ficha`.`usuario` = '$id_usu'";
	$removee = mysqli_query($con, $sql1);
    //Se falhou, redireciona pra exibe.php com remove igual a false 
    if( !$removee ){
        header("Location:ficha.php?remove=false");
        exit;
    }
    //se tudo deu certo, redireciona pra exibe.php com remove igual a true
    header("Location:ficha.php?remove=true");
	
	
}

//if(isset($_POST[''])){
	
	
//}

?>