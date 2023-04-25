<?php

session_start();
if(isset($_SESSION['prof'])|| isset($_SESSION['adm'])){
	//echo"bem vindo $_SESSION[adm]";
}else{header("location:login.php");}
?>

<input type="hidden" name="id" value="<?php echo $id; ?>">

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
	 
<style>
form#formulario {
    margin: auto;
    width: 98%;
    padding: 10px;
}

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
		
        <?php 
            //Recebe os dados a serem editados
            $id = filter_input(INPUT_POST, 'id');
            $nome = filter_input(INPUT_POST, 'nome');
            $email = filter_input(INPUT_POST, 'email');
            $telefone = filter_input(INPUT_POST, 'telefone');
            $cpf = filter_input(INPUT_POST, 'cpf');
            $rg  = filter_input(INPUT_POST, 'rg');
            //$sexo = filter_input(INPUT_POST, 'sexo');
            $endereco = filter_input(INPUT_POST, 'endereco');


        ?>
		<br/><br/>
		<h2>&nbsp;&nbsp;Editar cliente <img src="img/user_edit.png" alt="Academia" width="45"></h2>
		<hr>
        <form id="formulario" action="salva.php" method="post">
            <!-- Jogamos os valores a serem editados dentro dos inputs no campo value -->
			
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			
			<div class="row">          		
            <div class="form-group col-md-6">
			<label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $nome; ?>" class="form-control">
            </div>
			<div class="form-group col-md-4">
			<label> Email: </label>
            <input type="email" name="email" value="<?php echo $email; ?>" class="form-control">
            </div>
			<div class="form-group col-md-2">
			<label> CPF: </label>
            <input type="text" name="cpf" value="<?php echo $cpf; ?>" class="form-control">
			<input type="hidden" name="oldCpf" value= "<?php echo $cpf; ?>" >
            </div>
			</div>
			<br/>
			<div class="row">
			<div class="form-group col-md-3">
			<label> RG: </label>
            <input type="text" name="rg" value="<?php echo $rg; ?>" class="form-control">
            </div>
			<div class="form-group col-md-3">
			<label> Telefone: </label>
            <input type="text" name="telefone" value="<?php echo $telefone; ?>" class="form-control">
            </div>
			<div class="form-group col-md-6">
			<label> Endereço: </label>
            <input type="text" name="endereco" value="<?php echo $endereco; ?>" class="form-control">

			</div>
			</div>
			
			<br/><br/><br/>
			
			<div id="actions" class="row" align="right">
			<div class="col-md-12">
			<a href="buscar.php"><button type="button" class="btn btn-secondary"><img src="img/voltar_icon.png" alt="Academia" width="25"> Voltar </button></a>
			<button type="submit" class="btn btn-success btn-xs"> Salvar <img src="img/ok_icon.png" alt="Academia" width="23"></button>			
			</div>
			</div>
			
			</div>
        </form>
    </body>
</html>