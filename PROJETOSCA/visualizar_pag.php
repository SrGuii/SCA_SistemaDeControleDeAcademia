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

table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
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

	<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Visualizar pagamentos <img src="img/pag_icon.png" alt="Academia" width="30"></h2>
	<br/><br/><br/><br/>
	
<form method="POST">
<div align="center">
  <div class="form-group col-md-4"> 
	<label for="cpf">CPF:</label>
	<input type="text" class="form-control" name="busca" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" required>
	<br/><br/>
	<button class="btn btn-success btn-xs" type="submit" name="Buscar"> Verificar pagamentos <img src="img/ok_icon.png" alt="Academia" width="25"></button>
	<a href="pagamento.php"><button type="button" class="btn btn-danger btn-xs"> Calcelar <img src="img/cancel_icon.png" alt="Academia" width="18"></button></a>
  </div>
</div>
</form>

	<br/><br/><br/>

		<div style="overflow-x:auto;">
		<div class="container">         		  
            <table class="table table table-dark table-hover">
                <thead>
                  <tr>                                      				
                    <th>DATA</th>
					<th>VALOR</th>	
                  </tr>
                </thead>
                <tbody>

<?php
//include("conexao.php");
$con = $_SESSION['con'];
if(isset($_POST['Buscar'])){
$cpf = $_POST['busca'];
$id=0;
$sql= "SELECT * FROM cliente WHERE cpf = '$cpf'";
$pesquisa = mysqli_query($con,$sql);
if (!$pesquisa) {
                    echo "  <div align='center'>
						<div class='alert alert-warning'>				
						<strong>Erro no pagamento!</strong> O que deseja fazer agora?
						</div>
						</div>.";
                    
                }
while ($dados = mysqli_fetch_assoc($pesquisa)) {
                    
                   $id = $dados['id'];
}
$sql = "SELECT * FROM mensalidade WHERE id_cliente = '$id'";
$mensa = mysqli_query($con,$sql);

while ($dados = mysqli_fetch_assoc($mensa)){
    
                echo "<tr>";               
                //echo "<td>" .$dados['id_mensalidade']. "</td>";
                echo "<td>" .$dados['data']. "</td>";
                echo "<td>" .$dados['valor']. "</td>";
				echo "<tr>"; 

	
}
}

?>

    </tbody>
              </table>            
        </div>
	</div>
		 
		<script src="jquery/dist/jquery.js"></script>
        <script src="popper.js/dist/popper.min.js"></script>
        <script src="js/bootstrap.js"></script>

    </body>
</html>