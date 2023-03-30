<?php
include ("conexao.php");
//session_start();
if(isset($_SESSION['prof'])|| isset($_SESSION['adm'])){
	//echo"bem vindo $_SESSION[adm]";
}else{header("location:login.php");}
if(isset($_POST['id'])){
	//echo"taokei";
}else{header("location:buscar.php");
	
}
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
 
label, h2, h4 {
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
	
	<br/><br/>	
	
        <h2>&nbsp;&nbsp;Visualizar Informações <img src="img/user_view.png" alt="Academia" width="45"></h2>		
		<?php 
		$id = filter_input(INPUT_POST, 'id');
                
                $_SESSION['id'] = $id;
		
	
	$conexao = $_SESSION['con'];
	$nome = "";
	$sql = "SELECT * FROM `cliente` WHERE `id` = '$id'";
	$visuNome = mysqli_query($conexao, $sql);
	while($cliente = mysqli_fetch_assoc($visuNome)){
		$nome = $cliente['nome'];
	}
	echo "<h4>&nbsp;&nbsp;&nbsp;&nbsp;Aluno: ".$nome." </h4>";
	?>
		
		
		<hr>
		
                <?php
//conexão
           //include ("conexao.php");
           // $conexao = $_SESSION['con'];
//id do cliente            
                //$id = filter_input(INPUT_POST, 'id');
                
               // $_SESSION['id'] = $id;


                $sql = "SELECT * FROM cliente WHERE id=" . $id;
                $vis = mysqli_query($conexao, $sql);
                if (!$vis) {
                    echo "Erro ao realizar consulta. Tente outra vez.";
                    exit;
                }
                    while ($dados = mysqli_fetch_assoc($vis)) {
                    $data = $dados['data_nas'];
					$datanas=explode("-",$data);
					$data= $datanas[2]."/".$datanas[1]."/".$datanas[0];
					
                    //echo "<td>" .$dados['id']. "</td>";
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
                    <input type='text' name='data_nas' value='" . $data . "' class='form-control' disabled>
					</div>
					<div class='form-group col-md-2'>
					<label> Sexo: </label>
					<input type='text' name='sexo' value='" . $dados['sexo'] . " 'class='form-control' disabled>
					</div>
					<div class='form-group col-md-8'>
					<label> Endereço: </label>
					<input type='text' name='endereco' value='" . $dados['endereco'] . "' class='form-control' disabled>
					</div>
					</div>
					
					<div class='row' id='view'>          		
					<div class='form-group col-md-8'>
					<label>Email:</label>
                    <input type='email' name='email' value='" . $dados['email'] . " 'class='form-control' disabled>
					</div>
					<div class='form-group col-md-4'>
					<label> Telefone: </label>
					<input type='text' name='telefone' value='" . $dados['telefone'] . "' class='form-control' disabled>
					</div>					
					</div>"; 
                  
					}
                
                
                ?>       
        
		<br/><br/><br/>
        <h2>&nbsp;&nbsp;Visualizar Ficha <img src="img/user_view.png" alt="Academia" width="45"></h2>
		<hr>		
		
                <?php
                //bloco 1
                $sqlFicha = "SELECT * FROM ficha WHERE `ficha`.`bloco` = 1 AND `ficha`.`usuario` = '$id'";
                $fic = mysqli_query($conexao,$sqlFicha);
                
                if (mysqli_num_rows($fic) >= 1){
                    echo "<br/>";
					echo "<div class='container'>";
                    echo"<table class='table'>";
					echo"<thead class='thead-dark'>";
					echo "<br/>";
                    echo"<h2>&nbsp;&nbsp;Bloco 1 Informações</h2>";
					echo "<br/>";
                   echo" <tr><th>Exercício</th><th>Série</th><th>Repetição</th><th>Carga</th><th>Bloco</th></tr>";   
                 while( $dados_ficha = mysqli_fetch_assoc($fic) ){   
                     echo "<tr>";
               
                echo "<td class='table-active'>" .$dados_ficha['exercicio']. "</td>";
                echo "<td class='table-active'>" .$dados_ficha['serie']. "</td>";
                echo "<td class='table-active'>" .$dados_ficha['repeticao']. "</td>";
                echo "<td class='table-active'>" .$dados_ficha['carga']. "</td>";
                echo "<td class='table-active'>" .$dados_ficha['bloco']. "</td>";
                echo "</tr>";
                     
                    
                }
				echo"</tbody>
					  </table>            
					   </div>";
                }
                else{
                    //echo "não achou!";
                    
                    echo "<form action='ficha.php' method='POST'>";
                    echo "<input name='id' type='hidden' value='".$id."'/>";     	
					
                }
                ?>
        
        
            
            <?php
                //bloco 2
                $sqlFicha2 = "SELECT * FROM ficha WHERE `ficha`.`bloco` = '2' AND `ficha`.`usuario` = '$id'";
                $fic2 = mysqli_query($conexao,$sqlFicha2);
                
                if (mysqli_num_rows($fic2) >= 1){
                 echo "<br/>";
					echo "<div class='container'>";
                    echo"<table class='table'>";
					echo"<thead class='thead-dark'>";
					echo "<br/>";
                    echo"<h2>&nbsp;&nbsp;Bloco 2 Informações</h2>";
					echo "<br/>";
                   echo" <tr><th>Exercício</th><th>Série</th><th>Repetição</th><th>Carga</th><th>Bloco</th></tr>";   
                while( $dados_ficha2 = mysqli_fetch_assoc($fic2) ){   
                     echo "<tr>";
               
                echo "<td class='table-active'>" .$dados_ficha2['exercicio']. "</td>";
                echo "<td class='table-active'>" .$dados_ficha2['serie']. "</td>";
                echo "<td class='table-active'>" .$dados_ficha2['repeticao']. "</td>";
                echo "<td class='table-active'>" .$dados_ficha2['carga']. "</td>";
                echo "<td class='table-active'>" .$dados_ficha2['bloco']. "</td>";
                echo "</tr>";
                     
                    
                }
				echo"</tbody>
					  </table>            
					   </div>";
                }
                ?>
        <?php
                //bloco 3
                $sqlFicha3 = "SELECT * FROM ficha WHERE `ficha`.`bloco` = '3' AND `ficha`.`usuario` = '$id'";
                $fic3 = mysqli_query($conexao,$sqlFicha3);
                
                if (mysqli_num_rows($fic3) >= 1){
                 echo "<br/>";
				 	echo "<div class='container'>";
                    echo"<table class='table'>";
					echo"<thead class='thead-dark'>";
					echo "<br/>";
                    echo"<h2>&nbsp;&nbsp;Bloco 3 Informações</h2>";
					echo "<br/>";
                   echo" <tr><th>Exercício</th><th>Série</th><th>Repetição</th><th>Carga</th><th>Bloco</th></tr>";   
                while( $dados_ficha3 = mysqli_fetch_assoc($fic3) ){   
                     echo "<tr>";
               
                echo "<td class='table-active'>" .$dados_ficha3['exercicio']. "</td>";
                echo "<td class='table-active'>" .$dados_ficha3['serie']. "</td>";
                echo "<td class='table-active'>" .$dados_ficha3['repeticao']. "</td>";
                echo "<td class='table-active'>" .$dados_ficha3['carga']. "</td>";
                echo "<td class='table-active'>" .$dados_ficha3['bloco']. "</td>";
                echo "</tr>";
                     
                    
                }
				echo"</tbody>
					  </table>            
					   </div>";
                }
                ?>
        <?php
                //bloco 4
                $sqlFicha4 = "SELECT * FROM ficha WHERE `ficha`.`bloco` = '4' AND `ficha`.`usuario` = '$id'";
                $fic4 = mysqli_query($conexao,$sqlFicha4);
                
                if (mysqli_num_rows($fic4) >= 1){
                 echo "<br/>";
					echo "<div class='container'>";
                    echo"<table class='table'>";
					echo"<thead class='thead-dark'>";
					echo "<br/>";
                    echo"<h2>&nbsp;&nbsp;Bloco 4 Informações</h2>";
					echo "<br/>";
                   echo" <tr><th>Exercicio</th><th>Serie</th><th>Repetição</th><th>Carga</th><th>Bloco</th></tr>";   
                while( $dados_ficha4 = mysqli_fetch_assoc($fic4) ){   
                     echo "<tr>";
               
                echo "<td class='table-active'>" .$dados_ficha4['exercicio']. "</td>";
                echo "<td class='table-active'>" .$dados_ficha4['serie']. "</td>";
                echo "<td class='table-active'>" .$dados_ficha4['repeticao']. "</td>";
                echo "<td class='table-active'>" .$dados_ficha4['carga']. "</td>";
                echo "<td class='table-active'>" .$dados_ficha4['bloco']. "</td>";
                echo "</tr>";
                     
                    
                }
				echo"</tbody>
					  </table>            
					   </div>";
                }
          ?>
		  

			
			<br/><br/><br/>
			<div id="actions" class="row" align="right">
			<div class="col-md-11">			
			<a href="buscar.php"><button type="button" class="btn btn-secondary"><img src="img/voltar_icon.png" alt="Academia" width="25"> Voltar </button></a>
			<a href="visualizar_ficha.php"><button type="button" class="btn btn-info"> Visualizar anamnese </button></a>
			<?php
				if(isset($_SESSION['prof'])){
				echo"<a href='ficha.php'><button type='button' class='btn btn-primary'> Criar ficha <img src='img/ficha_icon.png' alt='Academia' width='25'></button></a>";
				}
			?>
			</div>
			</div>
                   
			<br/><br/>
			
    </body>
</html>