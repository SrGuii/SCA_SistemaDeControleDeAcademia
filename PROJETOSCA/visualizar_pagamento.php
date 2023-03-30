<?php
//session_start();
include ("conexao.php");
if(isset($_SESSION['prof'])|| isset($_SESSION['adm'])){
	//echo"bem vindo $_SESSION[adm]";
}else{header("location:login.php");}
?>

<!DOCTYPE html><
html lang="pt-br">

<html>
    <head>
	 <title> SCA </title>
	 <meta charset="utf-8">
	 <link rel="icon" type="imagem/png" href="img/logo.png" />
	 
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <!------- estilo NAVBAR --------->
	 <link rel="stylesheet" type="text/css" href="css/style.css"/>
	 <!------- estilo LISTA CLIENTES --------->	
     <link rel="stylesheet" href="css/bootstrap.css">
     <link rel="stylesheet" href="css/estilo.css">
<!------- mascara FORMULARIO ------->
<script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
</script>

<style type="text/css">
body{
	 background: url(img/cadastro.jpg) no-repeat 0px 0px;
	 background-attachment: fixed;
 }
 
label, h2 {
	color:white;
}

div.alert {
    width: 70%;
}
</style>
    </head>
   
   <body>

	<!---------------------------- NAVBAR ---------------------------->
		<div class="topnav" id="myTopnav">
				<a>
				  <img src="img/logoNav.png" alt="logo" style="width:20px">
				</a>
			<?php
			if(isset($_SESSION['adm'])){
				echo"<a href='indexAdm.php' class='active'>Home</a>			
			<a href='buscar.php'>Gerenciar alunos</a>
			<a href='busca_prof.php'>Gerenciar professores</a>			
			<a href='inadimplentes.php'>Alunos inadimplentes</a>
			<a href='pagamento.php'>Pagamentos</a>
			<a href='cadAluno.php'>Cadastrar aluno</a>
			<a href='cadProf.php'>Cadastrar professor</a>
			<a href='sair.php'><img src='img/sair_icon.png' alt='Academia' width='25'> Sair</a>
			<a href='javascript:void(0);' class='icon' onclick='myFunction()'>
			<img src='img/bars_icon.png' alt='Academia' width='25'>			
			</a>";
			}
			if(isset($_SESSION['prof'])){
				echo"<a href='indexProf.php' class='active'>Home</a>			
			<a href='buscar.php'>Gerenciar alunos</a>									
			<a href='inadimplentes.php'>Alunos inadimplentes</a>
			<a href='pagamento.php'>Pagamentos</a>
			<a href='cadAluno.php'>Cadastrar aluno</a>
			<a href='javascript:void(0);' class='icon' onclick='myFunction()'>
			<img src='img/bars_icon.png' alt='Academia' width='25'>
			<div class='topnav' id='iconNav'>			
				<a href='sair.php'><img src='img/sair_icon.png' alt='Academia' width='25'> Sair</a>
			</div>
			</a>";
				
			}				
			?>
	    </div>
		
		<!---------------------------- SCRIPT NAVBAR ---------------------------->
	<script>
		function myFunction() {
		var x = document.getElementById("myTopnav");
		if (x.className === "topnav") {
        x.className += " responsive";
			} else {
        x.className = "topnav";
		   }
		}
	</script>	

	<br/><br/>   
        
<?php
        include("conexao.php");
        $con = $_SESSION['con'];
 
  $sql = "SELECT MAX(id_mensalidade) FROM mensalidade where id_cliente = 1" ;
  
  $res = mysqli_query($con, $sql);
 
  while ($dados = mysqli_fetch_assoc($res)) {
                    
                   $id = $dados['MAX(id_mensalidade)'];
}
  echo"$id";
   
  $sql1 = "SELECT * FROM `mensalidade` WHERE `id_mensalidade` = $id";
  $mensa = mysqli_query($con,$sql1);
  if (!$mensa) {
                    echo "<div class='alert alert-danger alert-dismissible fade show'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Erro ao realizar consulta!</strong> Tente novamente.
					</div>";
                    
                }
 else{ while ($da = mysqli_fetch_assoc($mensa)){
                    
                   echo $da['id_mensalidade']."<br/>";
                 $data = $da['data'];
                   echo $da['valor']."<br/><br/>";
    
 }
 echo "$data"."<br/>";
 //$data = explode("-",$data);
 //echo $data[0];
 
 $data1 = date("Y/m/d");
     str_replace('/','-',$data);
     
     $d1 = strtotime($data1); 
$d2 = strtotime($data);

$dataFinal = ($d2 - $d1) /86400;
if($dataFinal < 0){
$dataFinal = $dataFinal * -1;}

echo "Entre as duas datas informadas, existem $dataFinal dias.";
}
?>

    </body>
</html>