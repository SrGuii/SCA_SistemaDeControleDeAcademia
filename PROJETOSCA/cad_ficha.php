<?php
include ("conexao.php");

$con = $_SESSION['con'];
$cpf = $_SESSION['prof'];
echo $cpf;
$id="fail";
$sql1 = "SELECT * FROM `professor` WHERE `cpf` = '$cpf'";

$visu = mysqli_query($con, $sql1);
while ($dados = mysqli_fetch_assoc($visu)) {
	$prof = $dados['id'];
}

$usuario = $_SESSION['id'];
//$usuario = filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT);

$exercicio = filter_input(INPUT_POST,'exercicio',FILTER_SANITIZE_STRING);
$serie= filter_input(INPUT_POST,'serie',FILTER_SANITIZE_NUMBER_INT);
$repeticao = filter_input(INPUT_POST,'repeticao',FILTER_SANITIZE_NUMBER_INT);
$carga= filter_input(INPUT_POST,'carga',FILTER_SANITIZE_NUMBER_FLOAT);
$bloco = filter_input(INPUT_POST,'bloco',FILTER_SANITIZE_NUMBER_INT);

$query = "INSERT INTO ficha (usuario, exercicio, serie, repeticao, carga, id_professor, bloco) VALUES ('$usuario','$exercicio','$serie',"
    ."'$repeticao','$carga','$prof','$bloco')";
//INSERT INTO `ficha` (`id_ficha`, `usuario`, `exercicio`, `serie`, `repeticao`, `carga`, `id_professor`, `bloco`) VALUES (NULL, '2', 'batata', '2', '2', '2', '1', '1');
$sql = mysqli_query($con,$query);
echo"$usuario,$exercicio,$serie,$repeticao,$carga, $bloco ";

if( !$sql ){
       // header("Location:ficha.php?cadastro=false");
        //echo "<input name='id' type='hidden' value='" .$usuario."'>";
        //exit;
    echo"deu bosta rapa";
    }

    //se tudo deu certo, redireciona pra exibe.php com alteracao igual a true
    header("Location:ficha.php?cadastro=true");
   // echo "<input name='id' type='hidden' value='" .$usuario."'>";

?>
