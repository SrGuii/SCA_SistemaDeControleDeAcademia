<?php
//session_start();
include ("conexao.php");
if(isset($_SESSION['prof'])|| isset($_SESSION['adm'])){
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
	
        <script>
            function mascara(o,f){
v_obj=o;
v_fun=f;
setTimeout("execmascara()",1);
}
function execmascara(){
v_obj.value=v_fun(v_obj.value);
}
            function moeda(z){ 
v = z.value; 
v=v.replace(/\D/g,""); // permite digitar apenas numero 
v=v.replace(/(\d{1})(\d{17})$/,"$1.$2"); // coloca ponto antes dos ultimos digitos 
v=v.replace(/(\d{1})(\d{13})$/,"$1.$2"); // coloca ponto antes dos ultimos 13 digitos 
v=v.replace(/(\d{1})(\d{10})$/,"$1.$2"); // coloca ponto antes dos ultimos 10 digitos 
v=v.replace(/(\d{1})(\d{7})$/,"$1.$2"); // coloca ponto antes dos ultimos 7 digitos 
v=v.replace(/(\d{1})(\d{1,4})$/,"$1,$2") ;// coloca virgula antes dos ultimos 4 digitos 
z.value = v; 
}
        </script>
		
	<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adicionar pagamentos <img src="img/pag_icon.png" alt="Academia" width="30"></h2>
	<br/><br/><br/><br/>
		
        <form action="pagar.php" method="POST">
		
  <div align="center">
  
    <div class="form-group col-md-4">
      <label for="cpf">CPF:</label>
      <input type="text" class="form-control" name="cpf" value="" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" required>
    </div>
	
    <div class="form-group col-md-4">
    <div class="form-group">
      	<label for="valor">Valor:</label>
      	<select name="valor" class="form-control" required>
          <option name="valor" value="10.00">R$10,00</option>
          <option name="valor" value="35.00">R$35,00</option>
		  <option name="valor" value="45.00">R$45,00</option>
		  <option name="valor" value="65.90">R$65,90</option>
          <option name="valor" value="75.90">R$75,90</option>
          <option name="valor" value="85.90">R$85,90</option>
		  <option name="valor" value="100.00">R$100,00</option>       					
      	</select>     
   </div>				
   </div>
   
  </div>
 
  <div align="center">
  <div id="actions" class="row">
    <div class="col-md-12">
      <br/><br/><br/>
	  <button class="btn btn-success btn-xs" type="submit" name="enviar"> Efetuar pagamento <img src="img/ok_icon.png" alt="Academia" width="25"></button>
      <a href="visualizar_pag.php"><button type="button" class="btn btn-secondary btn-xs"> Verificar pagamentos <img src="img/pagInfo_icon.png" alt="Academia" width="18"></button></a>
	  <a href="buscar.php"><button type="button" class="btn btn-danger btn-xs"> Cancelar <img src="img/cancel_icon.png" alt="Academia" width="18"></button></a>
    </div>
  </div>
  </div>
	
        </form>
        <?php
        // put your code here
        ?>
		
    </body>
</html>
