<?php
include ("conexao.php");
//session_start();
if(isset($_SESSION['prof'])|| isset($_SESSION['adm'])){
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
	<!------- estilo NAVBAR ------->
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" href="css/bootstrap.css">	
	<link rel="stylesheet" href="css/styleCad.css">
	<!------- mascara FORMULARIO ------->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script> -->
	
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
	
		<br/>
	
        <h2>&nbsp;&nbsp;Criar Ficha</h2>
		<hr>	
	
	<form action="cad_ficha.php" method="POST">
	<div class="row">
    <div class="form-group col-md-2">
      <label for="nome">Exercicio:</label>
      <input type="text" class="form-control" name="exercicio" required>
    </div>

    <div class="form-group col-md-2">
      <label for="nome">Série:</label>
      <input type="text" class="form-control" name="serie" required>
    </div>

	<div class="form-group col-md-2">
      <label for="nome">Repetição:</label>
      <input type="text" class="form-control" name="repeticao" required>
    </div>

	<div class="form-group col-md-2">
      <label for="nome">Carga:</label>
      <input type="text" class="form-control" name="carga">
    </div>
	
	<div class="form-group col-md-2">
      <label for="bloco">Bloco:</label>
      <select class="form-control" name="bloco">
        	<option>1</option>
        	<option>2</option>
        	<option>3</option>
        	<option>4</option>
      </select>	
    </div>
	</form>  
	
	<div class='container'>
	<br/><br/><br/>
	
<?php
//include ("conexao.php");
$con = $_SESSION['con'];

$id = $_SESSION['id'];

//bloco1

?>
        <?php
        //$sqlprof = "SELECT * FROM ficha INNER JOIN professor ON ficha.id_professor = professor.id";
        $sqlFicha = "SELECT * FROM ficha WHERE `ficha`.`bloco` = 1 AND `ficha`.`usuario` = '$id'";
                $fic = mysqli_query($con,$sqlFicha);
                
                if (mysqli_num_rows($fic) >= 1){
                    
                    echo"<table class='table'>";
					echo"<thead class='thead-dark'>";
                    echo"<h2>&nbsp;&nbsp;Bloco 1 Informações</h2>";
					echo"<form action='remove_ficha.php' method='post'>";
					echo "<input name='bloco' type='hidden' value='1'>";
					echo "<button class='btn btn-danger'> Deletar todo este bloco<img src='img/del_icon.png' alt='Academia' width='22'></button>";
					echo "<br/><br/>";
					echo"</form>";
                    echo" <tr><th>Exercicio</th><th>Serie</th><th>Repetição</th><th>Carga</th><th>Bloco</th><th>Excluir</th></tr>";
                 
				 while( $dados_ficha = mysqli_fetch_assoc($fic) ){   
                    echo "<tr>";
               
                echo "<td>" .$dados_ficha['exercicio']. "</td>";
                echo "<td>" .$dados_ficha['serie']. "</td>";
                echo "<td>" .$dados_ficha['repeticao']. "</td>";
                echo "<td>" .$dados_ficha['carga']. "</td>";
                echo "<td>" .$dados_ficha['bloco']. "</td>";
				echo "<td>";
				echo "<form action='remove_ficha.php' method='post'>";
				echo "<input name='id' type='hidden' value='" .$dados_ficha['id_ficha']. "'>";
				echo "<button type='submit' class='btn btn-outline-danger'> Deletar <img src='img/cancel_icon.png' alt='Academia' width='22'></button>";
				echo "</form>";
				echo"</td>";
				
                echo "</tr>";
                     
                    
                }
               echo" </table>";
                }
        ?>
        
        <?php
                //bloco 2
                $sqlFicha2 = "SELECT * FROM ficha WHERE `ficha`.`bloco` = '2' AND `ficha`.`usuario` = '$id'";
                $fic2 = mysqli_query($con,$sqlFicha2);
                
                if (mysqli_num_rows($fic2) >= 1){
					echo "<br/><br/>";
                    echo"<table class='table'>";
					echo"<thead class='thead-dark'>";
                    echo"<h2>&nbsp;&nbsp;Bloco 2 Informações</h2>";
                    echo"<form action='remove_ficha.php' method='post'>";
					echo "<input name='bloco' type='hidden' value='2'>";
					echo "<button class='btn btn-danger'> Deletar todo este bloco<img src='img/del_icon.png' alt='Academia' width='22'></button>";
					echo "<br/><br/>";
					echo"</form>";
                    echo" <tr><th>Exercicio</th><th>Serie</th><th>Repetição</th><th>Carga</th><th>Bloco</th><th>Excluir</th></tr>";
                
				while( $dados_ficha2 = mysqli_fetch_assoc($fic2) ){   
                     echo "<tr>";
               
                echo "<td>" .$dados_ficha2['exercicio']. "</td>";
                echo "<td>" .$dados_ficha2['serie']. "</td>";
                echo "<td>" .$dados_ficha2['repeticao']. "</td>";
                echo "<td>" .$dados_ficha2['carga']. "</td>";
                echo "<td>" .$dados_ficha2['bloco']. "</td>";
				echo "<td>";
				echo "<form action='remove_ficha.php' method='post'>";
				echo "<input name='id' type='hidden' value='" .$dados_ficha2['id_ficha']. "'>";
				echo "<button type='submit' class='btn btn-outline-danger'> Deletar <img src='img/cancel_icon.png' alt='Academia' width='22'></button>";
				echo "</form>";
				echo"</td>";
				echo "</tr>";
                     
                    
                }
                echo"</table>";
                }
        ?>
	   
        <?php
                //bloco 3
                $sqlFicha3 = "SELECT * FROM ficha WHERE `ficha`.`bloco` = '3' AND `ficha`.`usuario` = '$id'";
                $fic3 = mysqli_query($con,$sqlFicha3);
                
                if (mysqli_num_rows($fic3) >= 1){
                    echo "<br/><br/>";
                    echo"<table class='table'>";
					echo"<thead class='thead-dark'>";
                    echo"<h2>&nbsp;&nbsp;Bloco 3 Informações</h2>";					
                    echo"<form action='remove_ficha.php' method='post'>";
					echo "<input name='bloco' type='hidden' value='3'>";
					echo "<button class='btn btn-danger'> Deletar todo este bloco<img src='img/del_icon.png' alt='Academia' width='22'></button>";
					echo "<br/><br/>";
					echo"</form>";
                    echo" <tr><th>Exercicio</th><th>Serie</th><th>Repetição</th><th>Carga</th><th>Bloco</th><th>Excluir</th></tr>";
                
				while( $dados_ficha3 = mysqli_fetch_assoc($fic3) ){   
                     echo "<tr>";
               
                echo "<td>" .$dados_ficha3['exercicio']. "</td>";
                echo "<td>" .$dados_ficha3['serie']. "</td>";
                echo "<td>" .$dados_ficha3['repeticao']. "</td>";
                echo "<td>" .$dados_ficha3['carga']. "</td>";
                echo "<td>" .$dados_ficha3['bloco']. "</td>";
				echo "<td>";
				echo "<form action='remove_ficha.php' method='post'>";
				echo "<input name='id' type='hidden' value='" .$dados_ficha3['id_ficha']. "'>";
				echo "<button type='submit' class='btn btn-outline-danger'> Deletar <img src='img/cancel_icon.png' alt='Academia' width='22'></button>";
				echo "</form>";
				echo"</td>";
				echo "</tr>";
                     
                    
                }
                echo"</table>";
                }
        ?>
	              
        <?php
                //bloco 4
                $sqlFicha4 = "SELECT * FROM ficha WHERE `ficha`.`bloco` = '4' AND `ficha`.`usuario` = '$id'";
                $fic4 = mysqli_query($con,$sqlFicha4);
                
                if (mysqli_num_rows($fic4) >= 1){
                    echo "<br/><br/>";
                    echo"<table class='table'>";
					echo"<thead class='thead-dark'>";
                    echo"<h2>&nbsp;&nbsp;Bloco 4 Informações</h2>";
                    echo"<form action='remove_ficha.php' method='post'>";
					echo "<input name='bloco' type='hidden' value='4'>";
					echo "<button class='btn btn-danger'> Deletar todo este bloco<img src='img/del_icon.png' alt='Academia' width='22'></button>";
					echo "<br/><br/>";
					echo"</form>";
                    echo" <tr><th>Exercicio</th><th>Serie</th><th>Repetição</th><th>Carga</th><th>Bloco</th><th>Excluir</th></tr>";   
                
				while( $dados_ficha4 = mysqli_fetch_assoc($fic4) ){   
                     echo "<tr>";
               
                echo "<td>" .$dados_ficha4['exercicio']. "</td>";
                echo "<td>" .$dados_ficha4['serie']. "</td>";
                echo "<td>" .$dados_ficha4['repeticao']. "</td>";
                echo "<td>" .$dados_ficha4['carga']. "</td>";
                echo "<td>" .$dados_ficha4['bloco']. "</td>";
                echo "<td>";
				echo "<form action='remove_ficha.php' method='post'>";
				echo "<input name='id' type='hidden' value='" .$dados_ficha4['id_ficha']. "'>";
				echo "<button type='submit' class='btn btn-outline-danger'> Deletar <img src='img/cancel_icon.png' alt='Academia' width='22'></button>";
				echo "</form>";
				echo"</td>";
				echo "</tr>";
                     
                    
                }
                echo"</table>";
                }
        ?>             
		
  <br/><br/><br/>
		
  <div id="actions" class="row" align="right">
    <div class="col-md-12"> 
      <a href="buscar.php"><button type="button" class="btn btn-dark btn-xs"><img src="img/voltar_icon.png" alt="Academia" width="25"> Voltar </button><a/>
	  <button class="btn btn-success btn-xs" type="submit" name="enviar"> Salvar <img src="img/ok_icon.png" alt="Academia" width="25"></button>	      
    </div>
  </div>					
			
    </body>
</html>
