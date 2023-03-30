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
	
		<!---------------------------- CAIXA DE BUSCA E BOTÕES ---------------------------->
	<div class="serives-agile py-5" id="services">
		<div class="container py-xl-5 py-lg-3">
			<div class="row support-bottom text-center">
				<div class="form-group col-md-6">
				  <form class="example" style="margin:auto;max-width420px" method="post">
					<input name="buscar" type="text" placeholder="Digite o CPF...">
					<button type="submit" name="botao"><img src="img/search_icon.png" alt="Academia" width="25"></button>
				  </form> 
				</div>	
				<!--BOTÕES-->
				<div class="form-group col-md-6">
				  <div class="container" align="right">				
					<a href="inadimplentes.php"><button type="button" class="btn btn-secondary">Ver alunos inadimplentes</button></a>
		          </div>
				</div>						
			</div>								
        </div>
</div>		

		<div style="overflow-x:auto;">
		<div class="container">         		  
            <table class="table table table-dark table-hover">
                <thead>
                  <tr>                   
                    <th>NOME</th>	
					<th>DATA</th>	
                    <th>VALOR</th>
					<th>CPF</th>					
                  </tr>
                </thead>
                <tbody>   

<?php 
//include ("conexao.php");
$con = $_SESSION['con'];
if(isset($_POST['botao'])){
	
	$cpf = $_POST['buscar'];
	$id = "";
	$nome="";
	$telefone = "";
	$sql="SELECT * FROM `cliente` WHERE `cpf` ='$cpf'";
	
	$consulta = mysqli_query($con, $sql);
		if (mysqli_num_rows($consulta) >= 1){
		 
		 while( $dados = mysqli_fetch_assoc($consulta) ){
			 //echo "<td>" .$dados['id']. "</td>";
			// echo "<td>" .$dados['nome']. "</td>";
			 //echo "<td>" .$dados['cpf']. "</td>";
			 //echo "<td>" .$dados['telefone']. "</td>";
			 
			 $id = $dados['id'];
			 //$nome = $dados['nome'];
			 //$cpf = $dados['cpf'];
			 //$telefone = $dados['telefone'];
			 
		 }
		 
	 }
	 else{
		 //se não existir o cliente
		 echo "<div class='alert alert-success alert-dismissible fade show'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Aluno não existe!</strong> Tente novamente.
					</div>"; 
	 }
	// $sql1="SELECT * FROM `mensalidade` WHERE `id_cliente` = '$id'";
	$sql1 = "SELECT * FROM `mensalidade` INNER JOIN cliente ON mensalidade.id_cliente = cliente.id AND `id` = $id";
	$consulta = mysqli_query($con, $sql1);
	if (mysqli_num_rows($consulta) >= 1){
		 while( $dados1 = mysqli_fetch_assoc($consulta) ){
			  echo "<tr>";
			  echo "<td>" .$dados1['nome']. "</td>";
			  echo "<td>" .$dados1['data']. "</td>";
			  echo "<td>" .$dados1['valor']. "</td>";
			  echo "<td>" .$dados1['cpf']. "</td>";
			  //echo"$nome <br/>";
			  //echo $dados1['data']."<br/>";
			  //echo $dados1['valor']."<br/>";
			//$cpf = $dados1['cpf'];
			// $telefone = $dados['telefone'];
			echo "<tr>";
			 
		 }
	}
	else{
		//nao foi possivel encontrar o dado
		echo "<div class='alert alert-success alert-dismissible fade show'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Dados não encontrados!</strong> Tente novamente.
					</div>"; 
	}
	
	//echo "$nome";
	
	
}

?>

</tbody>
              </table>            
        </div>
	</div>

</body>
	
</html>