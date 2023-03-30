<?php
session_start();
if(isset($_SESSION['usr'])){
	//echo"bem vindo $_SESSION[adm]";
}else{header("location:login.php");}
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">	
	<link rel="stylesheet" href="css/styleCad.css">
	
</head>

	<body>

		<!---------------------------- NAVBAR ---------------------------->
		<div class="topnav" id="myTopnav">
				<a>
				  <img src="img/logoNav.png" alt="logo" style="width:20px">
				</a>
			<a href="indexAluno.php" class="active">Home</a>			
			<a href="viewUserFicha.php">Consultar ficha</a>
			<a href="viewUserAnamnese.php">Consultar anamnese</a>
			<a href="javascript:void(0);" class="icon" onclick="myFunction()">
				<i class="fa fa-bars"></i>
			<div class="topnav" id="iconNav">				
				<a href="#"><i class="fa fa-sign-out"></i> Sair </a> 
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
	
		<!---------------------------- FORMULARIO ---------------------------->
	
<br/>	
<h2>Visualize sua Ficha <img src="img/fichatec.png" alt="Academia" width="100" height="65"></h2>

<form method="post">
  <hr/>
  <div class="row">
    <div class="form-group col-md-8">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" name="nome" disabled>
    </div>

     <div class="form-group col-md-1">
      <label for="sexo">Sexo</label>
    	<div class="radio">
      		<label><input type="radio" name="optradio" disabled>Feminino</label>
    	</div>
		<div class="radio">
      		<label><input type="radio" name="optradio" disabled>Masculino</label>
    	</div>					
    </div>

    <div class="form-group col-md-2">
      <label for="data_nas">Data de Nascimento</label>
      <input type="date" class="form-control" name="data_nas" disabled>
    </div>
  </div>
  
  <div class="row">
    <div class="form-group col-md-7">
      <label for="endereco">Endereço</label>
      <input type="text" class="form-control" name="endereco" disabled>
    </div>

    <div class="form-group col-md-2">
      <label for="cpf">CPF</label>
      <input type="text" class="form-control" name="cpf" disabled>
    </div>
    
    <div class="form-group col-md-2">
      <label for="rg">RG</label>
      <input type="text" class="form-control" name="rg" disabled>
    </div>    
  </div>
  
  <div class="row">
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" disabled>
    </div>
    
    <div class="form-group col-md-5">
      <label for="telefone">Telefone</label>
      <input type="text" class="form-control" name="telefone" disabled>
    </div>
    </div>
	
 <br/>
	
<div id="actions" class="row" align="right">
	<div class="col-md-12">
	<a href="indexAluno.php"><button type="button" class="btn btn-secondary">Voltar</button></a>
	</div>
</div>	

</form>	 

	</body>
	
</html>
