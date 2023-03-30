<?php
include("conexao.php");
$con = $_SESSION['con'];

echo"ruim";


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
echo $bloco;

?>