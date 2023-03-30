<?php
include("conexao.php");
//session_start();
if(isset($_SESSION['prof'])|| isset($_SESSION['adm'])){
	//echo"bem vindo $_SESSION[adm]";
}else{
	header("location:login.php");
	}
if(isset($_SESSION['id'])){
	//tudo certo
}
else{
	header("location:buscar.php");
}
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

hr { 
background-color: white; 
height: 1px; 
border: 0; 
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
	<h2>&nbsp;&nbsp; Visualize a anamnese do aluno <img src="img/fichatec.png" alt="Academia" width="100" height="65"></h2>
	<hr>
	<br/>

<?php 
//include("conexao.php");
$conexao = $_SESSION['con'];
//$cpf = $_SESSION['usr'];
$id = $_SESSION['id'];
//$sql = "SELECT * FROM `cliente` WHERE `cpf` = $cpf";

/*$vis = mysqli_query($conexao, $sql);
while ($dados = mysqli_fetch_assoc($vis)) {
	$id = $dados['id'];
}*/
//echo $id;
$sql = "SELECT * FROM `anamnese` WHERE `id_cliente` = '$id'";
$visu = mysqli_query($conexao, $sql);
 if (mysqli_num_rows($visu) >= 1){
while ($dados = mysqli_fetch_assoc($visu)) {
	
	echo "<h2>&nbsp;&nbsp;Atividades da vida diária <img src='img/temp_icon.png' alt='Academia' width='30'></h2>		    
		  <br/>

	<div class='row'>
<div class='form-group col-md-2'>
  <label for='fuma'>É fumante?</label>
	<input type='text' name='fuma' value='" . $dados['fuma'] . "' class='form-control' disabled>
</div>

<div class='form-group col-md-2'>
  <label for='bebe'>Bebe?</label>
	<input type='text' name='bebe' value='" . $dados['bebe'] . "' class='form-control' disabled>
</div>

<div class='form-group col-md-6'>
    <div class='form-group'>
      	<label for='	hstrabalho'>Horário de Saída do trabalho:</label>
      	<input type='text' name='bebe' value='" . $dados['hstrabalho'] . "' class='form-control' disabled>
   </div>
</div> 
</div>
	
	<div class='row'>
<div class='form-group col-md-2'>

<label for='faz_exer'>Faz exercícios?</label> 
	<input type='text' name='faz_exer' value='" . $dados['faz_exercicio'] . "' class='form-control' disabled>	
</div>
 

<div class='form-group col-md-5'>
	
 <label for='exer_qual'>Quais?</label>
 <input type='text' name='exer_qual' value='" . $dados['exercicio_qual'] . "' class='form-control' disabled>

</div>

<div class='form-group col-md-3'>
  
    <div class='form-group'>
      	<label for='horas_sono'>Quantas horas dorme por dia?</label>
		<input type='text' name='horas_sono' value='" . $dados['horas_sono'] . "' class='form-control' disabled>
   </div>
  
</div>
</div>

<br/><br/>
<h2>&nbsp;&nbsp;Histórico médico <img src='img/heart_icon.png' alt='Academia' width='35'></h2>

<div class='row'>
<div class='form-group col-md-5'>
  <label for='problema_familia'>Possui alguém com problemas cardíacos na família?</label>  
	<input type='text' name='problema_familia' value='" . $dados['exercicio_qual'] . "' class='form-control' disabled>
</div>

<div class='form-group col-md-5'>
  <label for='familia_qual'>Quem?</label>
  <input type='text' name='familia_qual' value='" . $dados['problema_familia'] . "' class='form-control' disabled>
</div>
</div>

<div class='row'>
<div class='form-group col-md-5'>
  <label for='doenca'>Possui alguma doença?</label>
	<input type='text' name='doenca' value='" . $dados['doenca'] . "' class='form-control' disabled>
</div>

<div class='form-group col-md-5'>
  <label for='doenca_qual'>Qual?</label>
  <input type='text' name='doenca_qual' value='" . $dados['doenca_qual'] . "' class='form-control' disabled>
</div>
</div>

<div class='row'>
<div class='form-group col-md-5'>
  <label for='cirurgia'>Já fez alguma cirurgia?</label> 
	<input type='text' name='cirurgia' value='" . $dados['cirurgia'] . "' class='form-control' disabled>
</div>

<div class='form-group col-md-5'>
  <label for='cirurgia_qual'>Qual?</label>
  <input type='text' name='cirurgia_qual' value='" . $dados['cirurgia_qual'] . "' class='form-control' disabled>
</div>
</div>

<div class='row'>
<div class='form-group col-md-2'>
  <label for='medicamento'>Faz uso de medicamentos?</label>
	<input type='text' name='medicamento' value='" . $dados['medicamento'] . "' class='form-control' disabled>
</div>

<div class='form-group col-md-5'>
  <label for='medi_qual'>Quais?</label>
  <input type='text' name='medi_qual' value='" . $dados['medi_qual'] . "' class='form-control' disabled>
</div>

<div class='form-group col-md-2'>  
      	<label for='medi_quant'>Quantidade?</label>
		<input type='text' name='medi_quant' value='" . $dados['medi_quant'] . "' class='form-control' disabled>
</div>
</div> 
</div>

<div class='row'>
<div class='form-group col-md-11'>
  <label for='estresse'>Qual o seu nível de estresse durante o dia?</label>
  <input type='text' name='estresse' value='" . $dados['estresse'] . "' class='form-control' disabled>
</div>
</div>

<div class='row'>
<div class='form-group col-md-2'>
  <label for='dor'>Sente alguma dor que impeça sua tarefas diárias?</label>
	<input type='text' name='dor' value='" . $dados['dor'] . "' class='form-control' disabled>
</div>


<div class='form-group col-md-4'>
  <label for='dor_qual'>Qual?</label>
  <input type='text' name='dor_qual' value='" . $dados['dor_qual'] . "' class='form-control' disabled>
</div>

<div class='form-group col-md-3'>
  <label for='dor_local'>Em que local?</label>
  <input type='text' name'dor_local' value='" . $dados['dor_local'] . "' class='form-control' disabled>
</div>
</div> 

<div class='row'>
<div class='form-group col-md-5'>
  <label for='alergia'>Possui alguma alergia?</label> 
	<input type='text' name='alergia' value='" . $dados['alergia'] . "' class='form-control' disabled>
</div>

<div class='form-group col-md-5'>
  <label for='alergia_qual'>Qual?</label>
  <input type='text' name='alergia_qual' value='" . $dados['alergia_qual'] . "' class='form-control' disabled>
</div>
</div>
</div>

<div class='row'>
<div class='form-group col-md-5'>
  <label for='restri_exercicio'>Possui restrição a prática de exercícios?</label> 	
	<input type='text' name='restri_exercicio' value='" . $dados['restri_exerc'] . "' class='form-control' disabled>
</div>


<div class='form-group col-md-5'>
  <label for='restric_qual'>Qual?</label>
  <input type='text' name='restric_qual' value='" . $dados['restric_qual'] . "' class='form-control' disabled>
</div>
</div>
</div>  

<br/><br/>
<h2>&nbsp;&nbsp;Objetivos com relação a atividade física <img src='img/atv_icon.png' alt='Academia' width='30'></h2>

<div class='row'>
<div class='form-group col-md-11'>
  <input type='text' name='objetivo' value='" . $dados['objetivo'] . "' class='form-control' disabled>  			
</div>";
}
 }
 else{
	 
	 //mostra se n existe ficha cadastrada
	 echo "<br/><br/><br/><br/>
		  <div align='center'>
			 <div class='alert alert-warning'>				
				<strong>Aluno ainda não possui anamnese!</strong> Anamnese não cadastrada pelo aluno.
			</div>
		  </div>";
 }

?>		
		
	<br/><br/>
	
	<div id="actions" class="row" align="right">
		<div class="col-md-12">
		<a href="buscar.php"><button type="button" class="btn btn-secondary">Voltar</button></a>
		</div>
	</div>	

</body>

</html>