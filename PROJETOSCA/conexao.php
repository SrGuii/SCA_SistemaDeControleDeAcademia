<meta charset="utf-8">
<?php
// header("content-type: text/html;charset=utf-8");
session_start();

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "academia";

$con = mysqli_connect($servidor, $usuario, $senha, $banco) or die ("O servidor não responde");
mysqli_set_charset($con,'utf8');
//$con -> set_charset("utf8");
// mysql_query ("SET NAMES 'UTF8'");
// mysql_query("SET charater_set_connection=utf8");
// mysql_query("SET charater_set_client=utf8");
// mysql_query("SET charater_set_results=utf8");

$_SESSION['con'] = $con;

if ($con) {
    //echo "Conexão ok";
} else {
    echo "Conexão falhou";
}
?>