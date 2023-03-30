<?php
//session_start();
include("conexao.php");
if(isset($_SESSION['usr'])){
	//echo"bem vindo $_SESSION[adm]";
}else{header("location:login.php");}
mysqli_set_charset($con,'utf8');
?>

<?php
$cpf = $_SESSION['usr'];
$conexao = $_SESSION['con'];
$sql = "Select * from cliente where cpf = '$cpf' ";
	 $info = mysqli_query ($conexao, $sql);
	 while( $dados = mysqli_fetch_assoc($info) ){
		 $_SESSION['nome'] = $dados['nome'];
		$_SESSION['idusu'] = $dados['id'];
		 }
	$idusu = $_SESSION['idusu'];	 
	$sql = "Select * from anamnese where id_cliente = '$idusu' ";
$cond = mysqli_query($con,$sql);
                
                	


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

	<title> SCA </title>
	<meta charset="utf-8">
	<link rel="icon" type="imagem/png" href="img/logo.png" />

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!------- estilo NAVBAR ------->
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" href="css/bootstrap.css">	
	<link rel="stylesheet" href="css/styleCad.css">

<style>

body{
	 background: url(img/cadastro.jpg) no-repeat 0px 0px;
	 background-attachment: fixed;
 }
 
label, h2 {
	color:white;
} 

tr {
	background:white;
	color:black;
}

table.table {
	border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
    width: 80%;
}

table {
	border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}

hr { 
background-color: white; 
height: 1px; 
border: 0; 
}

</style>	
	
</head>

	<body>

		<!---------------------------- NAVBAR ---------------------------->
		<div class="topnav" id="myTopnav">
				<a>
				  <img src="img/logoNav.png" alt="logo" style="width:20px">
				</a>
			<a href="indexAluno.php" class="active">Home</a>			
			<a href="usr_ficha.php">Consultar ficha</a>			
			<?php 
			if (mysqli_num_rows($cond) < 1){
				echo "<a href='cadAnamnese.php'>Criar anamnese</a>";
			}				
			?>		
			<a href="javascript:void(0);" class="icon" onclick="myFunction()">
				<img src="img/bars_icon.png" alt="Academia" width="25">
			<div class="topnav" id="iconNav">				
				<a href="sair.php"><img src="img/sair_icon.png" alt="Academia" width="25"> Sair </a> 
			</div>	
			</a>
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
	<h2>&nbsp;&nbsp;Visualize sua Ficha <img src="img/fichatec.png" alt="Academia" width="100" height="65"></h2>
	<hr>
	<br/>

<?php
//include("conexao.php");
$conexao = $_SESSION['con'];
$cpf = $_SESSION['usr'];
$id="fail";
$sql = "SELECT * FROM `cliente` WHERE `cpf` = '$cpf'";

$vis = mysqli_query($conexao, $sql);
while ($dados = mysqli_fetch_assoc($vis)) {
	$id = $dados['id'];
}

$sqlFicha = "SELECT * FROM ficha WHERE `ficha`.`bloco` = 1 AND `ficha`.`usuario` = '$id'";
                $fic = mysqli_query($con,$sqlFicha);
                
                if (mysqli_num_rows($fic) >= 1){
                    
					echo"<div align='center'>";
					echo"<div style='overflow-x:auto;'>";
                    echo"<table class='table'>";
					echo"<thead class='thead-dark'>";
                    echo"<h2>Bloco 1</h2>";					
                    echo"<tr><th>Exercicio</th><th>Serie</th><th>Repetição</th><th>Carga</th><th>Bloco</th></tr>";
                 
				 while( $dados_ficha = mysqli_fetch_assoc($fic) ){   
                    echo "<tr>";
				
                echo "<td>" .$dados_ficha['exercicio']. "</td>";
                echo "<td>" .$dados_ficha['serie']. "</td>";
                echo "<td>" .$dados_ficha['repeticao']. "</td>";
                echo "<td>" .$dados_ficha['carga']. "</td>";
                echo "<td>" .$dados_ficha['bloco']. "</td>";
                echo "</tr>";  
				echo"</div>";
				echo"</div>";
                    
                }
               echo" </table>";
                }				
				
        ?>

        <?php
                //bloco 2
                $sqlFicha2 = "SELECT * FROM ficha WHERE `ficha`.`bloco` = '2' AND `ficha`.`usuario` = '$id'";
                $fic2 = mysqli_query($con,$sqlFicha2);
                
                if (mysqli_num_rows($fic2) >= 1){
					echo "<br/><br/>";
                    echo"<table class='table'>";
					echo"<thead class='thead-dark'>";
                    echo"<h2>Bloco 2</h2>";
                    echo" <tr><th>Exercicio</th><th>Serie</th><th>Repetição</th><th>Carga</th><th>Bloco</th></tr>";
                
				while( $dados_ficha2 = mysqli_fetch_assoc($fic2) ){   
                     echo "<tr>";
               
                echo "<td>" .$dados_ficha2['exercicio']. "</td>";
                echo "<td>" .$dados_ficha2['serie']. "</td>";
                echo "<td>" .$dados_ficha2['repeticao']. "</td>";
                echo "<td>" .$dados_ficha2['carga']. "</td>";
                echo "<td>" .$dados_ficha2['bloco']. "</td>";
                echo "</tr>";                    
                    
                }
                echo"</table>";
                }
				
        ?>
		
		<?php
                //bloco 3
                $sqlFicha3 = "SELECT * FROM ficha WHERE `ficha`.`bloco` = '3' AND `ficha`.`usuario` = '$id'";
                $fic3 = mysqli_query($con,$sqlFicha3);
                
                if (mysqli_num_rows($fic3) >= 1){
                    echo "<br/><br/>";
                    echo"<table class='table'>";
					echo"<thead class='thead-dark'>";
                    echo"<h2>Bloco 3</h2>";					
                    echo" <tr><th>Exercicio</th><th>Serie</th><th>Repetição</th><th>Carga</th><th>Bloco</th></tr>";
                
				while( $dados_ficha3 = mysqli_fetch_assoc($fic3) ){   
                     echo "<tr>";
               
                echo "<td>" .$dados_ficha3['exercicio']. "</td>";
                echo "<td>" .$dados_ficha3['serie']. "</td>";
                echo "<td>" .$dados_ficha3['repeticao']. "</td>";
                echo "<td>" .$dados_ficha3['carga']. "</td>";
                echo "<td>" .$dados_ficha3['bloco']. "</td>";
                echo "</tr>";
                                         
                }
                echo"</table>";
                }
				
        ?>
		
		<?php
                //bloco 4
                $sqlFicha4 = "SELECT * FROM ficha WHERE `ficha`.`bloco` = '4' AND `ficha`.`usuario` = '$id'";
                $fic4 = mysqli_query($con,$sqlFicha4);
                
                if (mysqli_num_rows($fic4) >= 1){
                    echo "<br/><br/>";
                    echo"<table class='table'>";
					echo"<thead class='thead-dark'>";
                    echo"<h2>Bloco 4</h2>";
                    echo" <tr><th>Exercicio</th><th>Serie</th><th>Repetição</th><th>Carga</th><th>Bloco</th></tr>";   
                
				while( $dados_ficha4 = mysqli_fetch_assoc($fic4) ){   
                     echo "<tr>";
               
                echo "<td>" .$dados_ficha4['exercicio']. "</td>";
                echo "<td>" .$dados_ficha4['serie']. "</td>";
                echo "<td>" .$dados_ficha4['repeticao']. "</td>";
                echo "<td>" .$dados_ficha4['carga']. "</td>";
                echo "<td>" .$dados_ficha4['bloco']. "</td>";
                echo "</tr>";
                                        
                }
                echo"</table>";
                }
				
         ?>   	 

		<br/>
		
	<div id="actions" class="row" align="right">
		<div class="col-md-12">
		<a href="indexAluno.php"><button type="button" class="btn btn-secondary">Voltar</button></a>
		</div>
	</div>	
		
	</body>
	
</html>		