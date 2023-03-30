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
	 
<style type="text/css">
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}

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
	
	<br/><br/><br/>
	<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Buscar alunos inadimplentes <img src="img/search_icon.png" alt="Academia" width="40"></h2>
	<br/><br/>
	
  <div align="center">
  <div class="form-group col-md-5">	
  <form method="post" align="right">
  <input type="date" class="form-control" name="data1"/>
  <input type="date" class="form-control" name="data2"/>
  <br/><br/>
  <button class="btn btn-success btn-xs" type="submit" name="botao" value="verificar"> Buscar <img src="img/search_icon.png" alt="Academia" width="25"></button>
  </form>
  </div></div>
  
  <br/><br/>
  
  <div style="overflow-x:auto;">
		<div class="container">         		  
            <table class="table table table-dark table-hover">
                <thead>
                  <tr>                   
                    <th>NOME</th>	
					<th>CPF</th>	
                    <th>TELEFONE</th>										
                  </tr>
                </thead>
                <tbody>   

<?php

//include ("conexao.php");
$con = $_SESSION['con'];
if(isset($_POST['botao'])){
	$data1 = $_POST['data1'];
	$data2 = $_POST['data2'];
$sql = "SELECT id, nome, cpf, telefone from cliente where id <> all(SELECT id_cliente from mensalidade where data between '$data1'and '$data2') order by nome asc";
$consulta = mysqli_query($con, $sql);

 while( $exibir = mysqli_fetch_assoc($consulta) ){
			 echo "<tr>";
			 echo "<td>" .$exibir['nome']. "</td>";
			 echo "<td>" .$exibir['cpf']. "</td>";
			 echo "<td>" .$exibir['telefone']. "</td>";
			 echo "<tr>";
			//echo $exibir['id'];
			//echo $exibir['nome'];
			//$cpf = $dados['cpf'];
			//$telefone = $dados['telefone'];
			 
		 }
	
}



//conseguir o ultimo id de todos os clientes
//pegar a data desse ultimo id para comparar
//mostrar apenas os q a data for maior


?>

</tbody>
              </table>            
        </div>
	</div>


</body>

</html>