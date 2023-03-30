<?php
include("conexao.php");
//session_start();
if(isset($_SESSION['usr'])){
	//echo"bem vindo $_SESSION[adm]";
}else{header("location:login.php");}
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

<style>
body{
	 background: url(img/cadastro.jpg) no-repeat 0px 0px;
	 background-attachment: fixed;
 } 
 
label, h2, div {
	color:white;
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
	
		<!---------------------------- FORMULARIO ---------------------------->

<br/> 
<h2>&nbsp;&nbsp;Ficha da Anamnese: Identificação <img src="img/id_icon.png" alt="Academia" width="35"></h2>
<hr/>

<form method="POST" action="cad_anamnese.php" >
  <hr/>
  <div class="row">
    <div class="form-group col-md-5">
      <label for="peso">Peso:</label>
      <input type="text" class="form-control" name="peso" placeholder="Ex.: 50kg" maxlength="5" OnKeyPress="formatar('##.##', this)" required>
    </div>
	
	<div class="form-group col-md-5">
      <label for="altura">Altura:</label>
      <input type="text" class="form-control" name="altura" placeholder="Ex.: 1.70m" maxlength="4" OnKeyPress="formatar('#.##', this)" required>
    </div>
  </div>
  <br/><br/> 
<h2>&nbsp;&nbsp;Atividades da vida diária <img src="img/temp_icon.png" alt="Academia" width="35"></h2>
<hr/> 
<div class="row">
<div class="form-group col-md-3">
  <label for="fuma">É fumante?</label>
		<br/><br/>
		<input type="radio" name="fuma" value="sim"> Sim </label>  
        <input type="radio" name="fuma" value="não"> Não </label> 	
</div>

<div class="form-group col-md-3">
  <label for="bebe">Bebe?</label>  
		<br/><br/>  
		<input type="radio" name="bebe" value="sim"> Sim</label>  
        <input type="radio" name="bebe" value="não"> Não</label>
</div> 

<div class="form-group col-md-3">
    <div class="form-group">
      	<label for="hstrab">Quantas horas trabalha por dia?</label>
      	<select name="hstrab" class="form-control">
          <option name="hstrab" value="5h">5hrs</option>
          <option name="hstrab" value="7h">7hrs</option>
		  <option name="hstrab" value="8h">8hrs</option>
		  <option name="hstrab" value="9h">9hrs</option>
          <option name="hstrab" value="10h">10hrs</option>
          <option name="hstrab" value="12h">12hrs</option>
		  <option name="hstrab" value="15h">15hrs</option>       					
      	</select>     
   </div>
</div> 
</div>

<script language="javascript">
    function habilitacao(){
      if(document.getElementById('radioSim').checked == true){
        document.getElementById('quais').disabled = false;
        //document.getElementById('dataFinal').disabled = false;
      }
	if(document.getElementById('radioSim').checked == false){
       document.getElementById('quais').disabled = true;
      //  document.getElementById('dataFinal').disabled = true;
      }
    }
</script>

<script language="javascript">
    function habilitacao2(){
      if(document.getElementById('radioSim2').checked == true){
        document.getElementById('quais2').disabled = false;
        //document.getElementById('dataFinal').disabled = false;
      }
	if(document.getElementById('radioSim2').checked == false){
       document.getElementById('quais2').disabled = true;
      //  document.getElementById('dataFinal').disabled = true;
      }
    }
</script>

<script language="javascript">
    function habilitacao3(){
      if(document.getElementById('radioSim3').checked == true){
        document.getElementById('quais3').disabled = false;
        //document.getElementById('dataFinal').disabled = false;
      }
	if(document.getElementById('radioSim3').checked == false){
       document.getElementById('quais3').disabled = true;
      //  document.getElementById('dataFinal').disabled = true;
      }
    }
</script>

<script language="javascript">
    function habilitacao4(){
      if(document.getElementById('radioSim4').checked == true){
        document.getElementById('quais4').disabled = false;
        //document.getElementById('dataFinal').disabled = false;
      }
	if(document.getElementById('radioSim4').checked == false){
       document.getElementById('quais4').disabled = true;
      //  document.getElementById('dataFinal').disabled = true;
      }
    }
</script>

<script language="javascript">
    function habilitacao5(){
      if(document.getElementById('radioSim5').checked == true){
        document.getElementById('quais5').disabled = false;
        //document.getElementById('dataFinal').disabled = false;
        document.getElementById('quais51').disabled = false;
      }
	if(document.getElementById('radioSim5').checked == false){
       document.getElementById('quais5').disabled = true;
      //  document.getElementById('dataFinal').disabled = true;
      document.getElementById('quais51').disabled = true;
      }
    }
</script>

<script language="javascript">
    function habilitacao6(){
      if(document.getElementById('radioSim6').checked == true){
        document.getElementById('quais6').disabled = false;
        //document.getElementById('dataFinal').disabled = false;
        document.getElementById('quais61').disabled = false;
      }
	if(document.getElementById('radioSim6').checked == false){
       document.getElementById('quais6').disabled = true;
      //  document.getElementById('dataFinal').disabled = true;
      document.getElementById('quais61').disabled = true;
      }
    }
</script>



<script language="javascript">
    function habilitacao7(){
      if(document.getElementById('radioSim7').checked == true){
        document.getElementById('quais7').disabled = false;
        //document.getElementById('dataFinal').disabled = false;
      }
	if(document.getElementById('radioSim7').checked == false){
       document.getElementById('quais7').disabled = true;
      //  document.getElementById('dataFinal').disabled = true;
      }
    }
</script>

<script language="javascript">
    function habilitacao8(){
      if(document.getElementById('radioSim8').checked == true){
        document.getElementById('quais8').disabled = false;
        //document.getElementById('dataFinal').disabled = false;
      }
	if(document.getElementById('radioSim8').checked == false){
       document.getElementById('quais8').disabled = true;
      //  document.getElementById('dataFinal').disabled = true;
      }
    }
</script>

<div class="row">
<div class="form-group col-md-3">

<label for="faz_exer">Faz exercícios?</label> 
		<br/><br/>
		<input  type="radio" name="faz_exer" value="sim" id="radioSim" onClick = "habilitacao()"> Sim</label>
        <input type="radio" name="faz_exer" value="não" onClick = "habilitacao()"> Não</label>  	
</div>
 

<div class="form-group col-md-3">
	
 <label for="exer_qual">Quais?</label>
 <input type="text" class="form-control" name="exer_qual" id = "quais" placeholder="corrida, caminhada..." required disabled>

</div>

<div class="form-group col-md-3">
  
    <div class="form-group">
      	<label for="horas_sono">Quantas horas dorme por dia?</label>
      	<select name="horas_sono"  class="form-control">
          <option name="horas_sono"value="4hrs">4hrs</option>
          <option name="horas_sono" value="5hrs">5hrs</option>
          <option name="horas_sono" value="6hrs">6hrs</option>
          <option name="horas_sono" value="7hrs">7hrs</option>
		  <option name="horas_sono" value="8hrs+">8hrs ou mais</option>       					
      	</select>     
   </div>
  
</div>
</div>
<br/><br/> 

<h2>&nbsp;&nbsp;Histórico médico <img src="img/heart_icon.png" alt="Academia" width="40"></h2>
<hr/>  
<div class="row">
<div class="form-group col-md-3">
  <label for="problema_familia">Possui alguém com problemas cardíacos na família?</label>  
		<br/><br/>
		<input type="radio" name="problema_familia" value="sim" id="radioSim2" onClick = "habilitacao2()"> Sim</label>   
        <input type="radio" name="problema_familia" value="não" onClick = "habilitacao2()"> Não</label> 	
</div>

<div class="form-group col-md-5">
  <label for="familia_qual">Quem?</label>
  <input type="text" class="form-control" name="familia_qual" id="quais2" required disabled>
</div>
</div>

<div class="row">
<div class="form-group col-md-3">
  <label for="doenca">Possui alguma doença?</label>
		<br/><br/>
		<input type="radio" name="doenca" value="sim" id="radioSim3" onClick = "habilitacao3()"> Sim</label>
        <input type="radio" name="doenca" value="não" onClick = "habilitacao3()"> Não</label> 
</div>

<div class="form-group col-md-5">
  <label for="doenca_qual">Qual?</label>
  <input type="text" class="form-control" name="doenca_qual" id="quais3" required disabled>
</div>
</div>
 
<div class="row">
<div class="form-group col-md-3">
  <label for="cirurgia">Já fez alguma cirurgia?</label> 
		<br/><br/>
		<input type="radio" name="cirurgia" value="sim" id="radioSim4" onClick = "habilitacao4()"> Sim</label>
        <input type="radio" name="cirurgia" value="não" onClick = "habilitacao4()"> Não</label>
</div>

<div class="form-group col-md-5">
  <label for="cirurgia_qual">Qual?</label>
  <input type="text" class="form-control" name="cirurgia_qual" id="quais4" required disabled>
</div>
</div>

<div class="row">
<div class="form-group col-md-2">
  <label for="medicamento">Faz uso de medicamentos?</label>
		<br/><br/>
		<input type="radio" name="medicamento" value="sim" id="radioSim5" onClick = "habilitacao5()"> Sim</label>
        <input type="radio" name="medicamento" value="não" onClick = "habilitacao5()"> Não</label>
</div>

<div class="form-group col-md-2">
  <label for="medi_qual">Quais?</label>
  <input type="text" class="form-control" name="medi_qual" id="quais5" required disabled>
</div>

<div class="form-group col-md-2">  
      	<label for="medi_quant">Quantidade?</label>
      	<select name="medi_quant" class="form-control" id="quais51" required disabled>
          <option name="medi_quant" value=""></option>
          <option name="medi_quant" value="1">1</option>
          <option name="medi_quant" value="2">2</option>
          <option name="medi_quant" value="3">3</option>
          <option name="medi_quant"value="4">4</option>
		  <option name="medi_quant"value="+4">+ de 4</option>       					
      	</select>     
</div>
</div> 
</div>

<div class="row">
<div class="form-group col-md-10">
  <label for="estresse">Qual o seu nível de estresse durante o dia?</label>
  <input type="text" class="form-control" name="estresse" required>
</div>
</div>

<div class="row">
<div class="form-group col-md-2">
  <label for="dor">Sente alguma dor que impeça suas tarefas diárias?</label>
   <br/><br/>
   <input type="radio" name="dor" value="sim" id="radioSim6" onClick = "habilitacao6()"> Sim</label>
   <input type="radio" name="dor" value="não" onClick = "habilitacao6()"> Não</label>
</div>


<div class="form-group col-md-2">
  <label for="dor_qual">Qual?</label>
  <input type="text" class="form-control" name="dor_qual" id="quais6" required disabled>
</div>

<div class="form-group col-md-2">
  <label for="dor_local">Em que local?</label>
  <input type="text" class="form-control" name="dor_local" id="quais61" required disabled>
</div>
</div> 

<div class="row">
<div class="form-group col-md-3">
  <label for="alergia">Possui alguma alergia?</label> 
		<br/><br/>
		<input type="radio" name="alergia" value="sim" id="radioSim7" onClick = "habilitacao7()"> Sim</label>
        <input type="radio" name="alergia" value="não" onClick = "habilitacao7()"> Não</label>
</div>

<div class="form-group col-md-5">
  <label for="alergia_qual">Qual?</label>
  <input type="text" class="form-control" name="alergia_qual" id="quais7" required disabled>
</div>
</div>
</div>

<div class="row">
<div class="form-group col-md-3">
  <label for="restri_exercicio">Possui restrição a prática de exercícios?</label> 	
		<br/><br/>
		<input type="radio" name="restri_exercicio" value="sim" id="radioSim8" onClick = "habilitacao8()"> Sim</label>
        <input type="radio" name="restri_exercicio" value="não" onClick = "habilitacao8()"> Não</label>
</div>


<div class="form-group col-md-5">
  <label for="restric_qual">Qual?</label>
  <input type="text" class="form-control" name="restric_qual" id="quais8" required disabled>
</div>
</div>
</div>  

<br/>
<h2>&nbsp;&nbsp;Objetivos com relação a atividade física <img src="img/atv_icon.png" alt="Academia" width="30"></h2>
<hr/>  
<div class="row">
<div class="form-group col-md-10">
    			<div class="form-check form-check-inline">
      				<label class="form-check-label" for="objetivo1">
        				<input type="checkbox" class="form-check-input" name="objetivo1" value="Estética">Estética</label>
    			</div>
    			<div class="form-check form-check-inline">
      				<label class="form-check-label" for="objetivo2">
        				<input type="checkbox" class="form-check-input" name="objetivo2" value="Lazer">Lazer</label>
    			</div>
    			<div class="form-check form-check-inline">
      				<label class="form-check-label" for="objetivo3">
        				<input type="checkbox" class="form-check-input" name="objetivo3" value="Terapêutico">Terapêutico</label>
    			</div>
				<div class="form-check form-check-inline">
      				<label class="form-check-label" for="objetivo4">
        				<input type="checkbox" class="form-check-input" name="objetivo4" value="Cond. Físico">Cond. Físico</label>
    			</div>
				<div class="form-check form-check-inline">
      				<label class="form-check-label" for="objetivo5">
        				<input type="checkbox" class="form-check-input" name="objetivo5" value="Convivio Social">Convívio Social</label>
    			</div>
				<div class="form-check form-check-inline">
      				<label class="form-check-label" for="objetivo6">
        				<input type="checkbox" class="form-check-input" name="objetivo6" value="Emagrecimento">Emagrecimento</label>
    			</div>
				<div class="form-check form-check-inline">
      				<label class="form-check-label" for="objetivo7">
        				<input type="checkbox" class="form-check-input" name="objetivo7" value="Hipertrofia">Hipertrofia</label>
    			</div>				

	<br/><br/><br/>
	
  <div id="actions" class="row" align="right">
    <div class="col-md-12">
      <button class="btn btn-success btn-xs" type="submit" name="enviar"> Salvar <img src="img/ok_icon.png" alt="Academia" width="25"></button>
      <a href="indexAluno.php"><button type="button" class="btn btn-danger btn-xs"> Calcelar <img src="img/cancel_icon.png" alt="Academia" width="18"></button><a/>
    </div>
  </div>				
				
</form>
</div>  
</div>

<!------------ MÁSCARA FORM ------------->
 <script type="text/javascript">
    $("#altura").mask("0.00 m");
	$("#peso").mask("00.00 kg");
 </script>

	</body>
	
</html>