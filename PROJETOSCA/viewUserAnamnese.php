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
<h2>&nbsp;&nbsp; Visualize sua Anamnese: Identificação <img src="img/anamnese.png" alt="Academia" width="80"></h2>

<form method="post">
  <hr/>
  <div class="row">
    <div class="form-group col-md-5">
      <label for="nome">Nome do Cliente</label>
      <input type="text" class="form-control" name="nome" disabled>
    </div>

    <div class="form-group col-md-1">

    <div class="form-group">
      	<label for="sel1">Idade:</label>
      	<select class="form-control" id="sel1" disabled>
        	<option>1</option>
        	<option>2</option>
        	<option>3</option>
        	<option>4</option>
      		</select>
    	</div>
   
    </div>

    <div class="form-group col-md-1">
      <label for="data_nas">Peso</label>
      <input type="text" class="form-control" name="data_nas" disabled>
    </div>
	
	<div class="form-group col-md-1">
      <label for="data_nas">Altura</label>
      <input type="text" class="form-control" name="data_nas" disabled>
    </div>
  </div>
  <br/><br/> 
<h2>&nbsp;&nbsp;Atividades da vida diária</h2>
<hr/> 
<div class="row">
<div class="form-group col-md-2">
  <label for="nome">É fumante?</label>
  <br/><br/>
  	 
   <label class="radio-inline">
		<input type="radio" name="optradio" disabled> Sim</label>
   <label class="radio-inline">
        <input type="radio" name="optradio" disabled> Não</label>
  	
</div>

<div class="form-group col-md-3">
  <label for="nome">Bebe?</label>
  <br/><br/>
  	 
   <label class="radio-inline">
		<input type="radio" name="optradio" disabled> Sim</label>
   <label class="radio-inline">
        <input type="radio" name="optradio" disabled> Não</label>
  	
</div> 

<div class="form-group col-md-4">
 
    <div class="form-group">
      	<label for="sel1">Horário de Saída do trabalho:</label>
      	<select class="form-control" id="sel1" disabled>
          <option>5hrs</option>
          <option>7hrs</option>
          <option>10hrs</option>
          <option>12hrs</option>
		  <option>15hrs</option>       					
      	</select>     
   </div>

</div> 
</div>

<div class="row">
<div class="form-group col-md-3">
  <label for="nome">Faz exercícios?</label>
  <br/><br/>
  	 
   <label class="radio-inline">
		<input type="radio" name="optradio" disabled> Sim</label>
   <label class="radio-inline">
        <input type="radio" name="optradio" disabled> Não</label>
  	
</div>

<div class="form-group col-md-3">
  <label for="nome">Quais?</label>
  <input type="text" class="form-control" name="data_nas" disabled>
</div>

<div class="form-group col-md-3">
  
    <div class="form-group">
      	<label for="sel1">Quantas horas dorme por dia?</label>
      	<select class="form-control" id="sel1" disabled>
          <option>4hrs</option>
          <option>5hrs</option>
          <option>6hrs</option>
          <option>7hrs</option>
		  <option>+8hrs</option>       					
      	</select>     
   </div>
 
</div>
</div>
<br/><br/> 

<h2>&nbsp;&nbsp;Histórico médico</h2>
<hr/>  
<div class="row">
<div class="form-group col-md-3">
  <label for="nome">Possui alguém com problemas cardíacos na família?</label>
  <br/><br/>
  	 
   <label class="radio-inline">
		<input type="radio" name="optradio" disabled> Sim</label>
   <label class="radio-inline">
        <input type="radio" name="optradio" disabled> Não</label>
  	
</div>

<div class="form-group col-md-5">
  <label for="nome">Quem?</label>
  <input type="text" class="form-control" name="data_nas" disabled>
</div>
</div>

<div class="row">
<div class="form-group col-md-3">
  <label for="nome">Possui alguma doença?</label>
  <br/><br/>
  	 
   <label class="radio-inline">
		<input type="radio" name="optradio" disabled> Sim</label>
   <label class="radio-inline">
        <input type="radio" name="optradio" disabled> Não</label>
  	
</div>

<div class="form-group col-md-5">
  <label for="nome">Qual?</label>
  <input type="text" class="form-control" name="data_nas" disabled>
</div>
</div>
 
<div class="row">
<div class="form-group col-md-3">
  <label for="nome">Já fez alguma cirurgia?</label>
  <br/><br/>
  	 
   <label class="radio-inline">
		<input type="radio" name="optradio" disabled> Sim</label>
   <label class="radio-inline">
        <input type="radio" name="optradio" disabled> Não</label>
  	
</div>

<div class="form-group col-md-5">
  <label for="nome">Qual?</label>
  <input type="text" class="form-control" name="data_nas" disabled>
</div>
</div>

<div class="row">
<div class="form-group col-md-2">
  <label for="nome">Faz uso de medicamentos?</label>
  <br/><br/>
  	 
   <label class="radio-inline">
		<input type="radio" name="optradio" disabled> Sim</label>
   <label class="radio-inline">
        <input type="radio" name="optradio" disabled> Não</label>
  	
</div>

<div class="form-group col-md-2">
  <label for="nome">Quais?</label>
  <input type="text" class="form-control" name="data_nas" disabled>
</div>

<div class="form-group col-md-2">
    
    <div class="form-group">
      	<label for="sel1">Quantidade?</label>
      	<select class="form-control" id="sel1" disabled>
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
		  <option>+ de 4</option>       					
      	</select>     
   </div>

</div>
</div> 
</div>

<div class="row">
<div class="form-group col-md-10">
  <label for="nome">Qual o seu nível de estresse durante o dia?</label>
  <input type="text" class="form-control" name="data_nas" disabled>
</div>
</div>

<div class="row">
<div class="form-group col-md-2">
  <label for="nome">Sente alguma dor que impeça sua tarefas diárias?</label>
  <br/><br/>
 
   <label class="radio-inline">
		<input type="radio" name="optradio" disabled> Sim</label>
   <label class="radio-inline">
        <input type="radio" name="optradio" disabled> Não</label>
  	
</div>


<div class="form-group col-md-2">
  <label for="nome">Qual?</label>
  <input type="text" class="form-control" name="data_nas" disabled>
</div>

<div class="form-group col-md-2">
  <label for="nome">Em que local?</label>
  <input type="text" class="form-control" name="data_nas" disabled>
</div>
</div> 

<div class="row">
<div class="form-group col-md-3">
  <label for="nome">Possui alguma alergia?</label>
  <br/><br/>
  	 
   <label class="radio-inline">
		<input type="radio" name="optradio" disabled> Sim</label>
   <label class="radio-inline">
        <input type="radio" name="optradio" disabled> Não</label>
  	
</div>

<div class="form-group col-md-5">
  <label for="nome">Qual?</label>
  <input type="text" class="form-control" name="data_nas" disabled>
</div>
</div>
</div>

<div class="row">
<div class="form-group col-md-3">
  <label for="nome">Possui restrição a prática de exercícios?</label>
  <br/><br/>
  	 
   <label class="radio-inline">
		<input type="radio" name="optradio" disabled> Sim</label>
   <label class="radio-inline">
        <input type="radio" name="optradio" disabled> Não</label>
  	
</div>


<div class="form-group col-md-5">
  <label for="nome">Qual?</label>
  <input type="text" class="form-control" name="data_nas" disabled>
</div>
</div>
</div>  

<br/>
<h2>&nbsp;&nbsp;Objetivos com relação a atividade física</h2>
<hr/>  
<div class="row">
<div class="form-group col-md-10">

    			<div class="form-check form-check-inline">
      				<label class="form-check-label">
        				<input type="checkbox" class="form-check-input" value="" disabled>Estética</label>
    			</div>
    			<div class="form-check form-check-inline">
      				<label class="form-check-label">
        				<input type="checkbox" class="form-check-input" value="" disabled>Lazer</label>
    			</div>
    			<div class="form-check form-check-inline">
      				<label class="form-check-label">
        				<input type="checkbox" class="form-check-input" value="" disabled>Terapêutico</label>
    			</div>
				<div class="form-check form-check-inline">
      				<label class="form-check-label">
        				<input type="checkbox" class="form-check-input" value="" disabled>Cond. Físico</label>
    			</div>
				<div class="form-check form-check-inline">
      				<label class="form-check-label">
        				<input type="checkbox" class="form-check-input" value="" disabled>Convivio Social</label>
    			</div>
				<div class="form-check form-check-inline">
      				<label class="form-check-label">
        				<input type="checkbox" class="form-check-input" value="" disabled>Emagrecimento</label>
    			</div>
				<div class="form-check form-check-inline">
      				<label class="form-check-label">
        				<input type="checkbox" class="form-check-input" value="" disabled>Hipertrofia</label>
    			</div>
</form>
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