<?php
session_start();
if(isset($_SESSION['adm'])){
	//echo"bem vindo $_SESSION[adm]";
}else{header("location:login.php");}
?>

<!DOCTYPE html>
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
   
<style>
div#view {
    margin: auto;    
    padding: 15px;
	align: left;
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
	<br/>
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
	
        <h2>&nbsp;&nbsp;Visualizar Informações <img src="img/user_view.png" alt="Academia" width="45"></h2>
		<hr>
		
                <?php
//conexão
                $hostname = "localhost";
                $user = "root";
                $password = "";
                $database = "academia";
                $conexao = mysqli_connect($hostname, $user, $password, $database);
                if (!$conexao) {
                    echo "Ops.. Erro na conexão.";
                    exit;
                }
//id do cliente            
                $id = filter_input(INPUT_POST, 'id');


                $sql = "SELECT * FROM professor WHERE id=" . $id;
                $vis = mysqli_query($conexao, $sql);
                if (!$vis) {
                    echo "Erro ao realizar consulta. Tente outra vez.";
                    exit;
                }
                while ($dados = mysqli_fetch_assoc($vis)) {
                    echo "<div class='row' id='view'>          		
					<div class='form-group col-md-8'>
					<label>Nome:</label>
                    <input type='text' name='nome' value='" . $dados['nome'] . "' class='form-control' disabled>
					</div>
					<div class='form-group col-md-2'>
					<label> CPF: </label>
					<input type='text' name='cpf' value='" . $dados['cpf'] . "' class='form-control' disabled>
					</div>
					<div class='form-group col-md-2'>
					<label> RG: </label>
					<input type='text' name='rg' value='" . $dados['rg'] . "' class='form-control' disabled>
					</div>
					</div>
					
					<div class='row' id='view'>          		
					<div class='form-group col-md-2'>
					<label>Data Nascimento:</label>
                    <input type='date' name='data_nasc' value='" . $dados['data_nasc'] . "' class='form-control' disabled>
					</div>
					<div class='form-group col-md-2'>
					<label> Sexo: </label>
					<input type='text' name='sexo' value='" . $dados['sexo'] . "' class='form-control' disabled>
					</div>
					<div class='form-group col-md-8'>
					<label> Endereço: </label>
					<input type='text' name='endereco' value='" . $dados['endereco'] . "' class='form-control' disabled>
					</div>
					</div>
					
					<div class='row' id='view'>          		
					<div class='form-group col-md-6'>
					<label>Email:</label>
                    <input type='email' name='email' value='" . $dados['email'] . "' class='form-control' disabled>
					</div>
					<div class='form-group col-md-3'>
					<label> Telefone: </label>
					<input type='text' name='telefone' value='" . $dados['telefone'] . "' class='form-control' disabled>
					</div>
					<div class='form-group col-md-3'>
					<label> Cargo: </label>
					<input type='text' name='cargo' value='" . $dados['cargo'] . "' class='form-control' disabled>
					</div>		
					</div>"; 
                  
					}                         
                ?>
			
			<br/><br/>
				
			<div id="actions" class="row" align="right">
			<div class="col-md-11">
			<a href="busca_prof.php"><button type="button" class="btn btn-secondary"><img src="img/voltar_icon.png" alt="Academia" width="25"> Voltar</button></a>			
			</div>
			</div>
                   

    </body>
</html>