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
	<!------- estilo NAVBAR --------->
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<!------- estilo CARROCEL ------->
	<link rel="stylesheet" href="css/bootstrap.css"> 
	
	<style type="text/css">
		A#social:link {text-decoration:none;color:#333;}
		A#social:visited {text-decoration:none;color:#000;}
		A#social:active {text-decoration:none;color:#5d0a0a;}
		A#social:hover {text-decoration:none;color:#999999;}
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
		
		<!---------------------------- CAROUSEL ---------------------------->
<div id="demo" class="carousel slide" data-ride="carousel" >

  		<ul class="carousel-indicators">
    		<li data-target="#demo" data-slide-to="0" class="active"></li>
    		<li data-target="#demo" data-slide-to="1"></li>
    		<li data-target="#demo" data-slide-to="2"></li>
  		</ul>
  
  		<div class="carousel-inner" >
    		<div class="carousel-item active">
      			<img src="img/gymmAluno.png" alt="Academia" width="1100" height="500" >
    		</div>
    		<div class="carousel-item">
      			<img src="img/gym2.jpg" alt="Academia" width="1100" height="500" >
    		</div>
    		<div class="carousel-item">
      			<img src="img/gym3.jpg" alt="Academia" width="1100" height="500" >
    		</div>
  		</div>
  
  		<a class="carousel-control-prev" href="#demo" data-slide="prev">
    		<span class="carousel-control-prev-icon"></span>
  		</a>
  		<a class="carousel-control-next" href="#demo" data-slide="next">
    		<span class="carousel-control-next-icon"></span>
  		</a>
	</div>	

		<!---------------------------- ANAMESE CADASTRO ---------------------------->
		<?php
		//Se existe a variável cadastro, então
        if( isset($_GET['cadastro'])){
            //Se cadastro tem true, os dados foram cadastrados
            if( $_GET['cadastro'] == "true" ){
                echo "<div class='alert alert-success alert-dismissible fade show'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Anamnese cadastrada com sucesso!</strong> A anamnese foi cadastrada com exito!
					</div>";            
            }else{
                echo "<div class='alert alert-danger alert-dismissible fade show'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Erro no cadastro!</strong> Os dados não foram cadastrados.
					</div>";
            }
		}
			?>
		<!---------------------------- BLOCOS DE TEXTO/IMAGEM ---------------------------->
	<div class="serives-agile py-5 border-top" id="services">
		<div class="container py-xl-5 py-lg-3">
			<div class="row support-bottom text-center">
				<div class="col-md-4 support-grid">
					<a>
						<img src="img/promo.png" alt="logo" style="width:70px">
					</a>
					<h5 class="text-dark text-uppercase mt-4 mb-3">Conheça</h5>
					<p>Conheça mais sobre nosso trabalho e instalações.</p>
					<a href="#section1"><button id="botao" class="button button1">Clique aqui</button></a>
				</div>
				<div class="col-md-4 support-grid my-md-0 my-4">
					<a>
						<img src="img/conheca.png" alt="logo" style="width:70px">
					</a>
					<h5 class="text-dark text-uppercase mt-4 mb-3">Promoções</h5>
					<p>Confira nossos preços.</p>
					<a href="#section2"><button id="botao" class="button button1">Clique aqui</button></a>
				</div>
				<div class="col-md-4 support-grid">
					<a>
						<img src="img/treinamento.png" alt="logo" style="width:70px">
					</a>
					<h5 class="text-dark text-uppercase mt-4 mb-3">Localização</h5>
					<p>Entre em contato e veja nossa localidade.</p>
					<a href="#section3"><button id="botao" class="button button1">Clique aqui</button></a>
				</div>
			</div>
			<br/><br/><br/>
			
			<div id="section1" class="container-fluid bg-link" style="padding-top:70px;padding-bottom:0.5px">
		  <h1>Conheça</h1>
		  <br/><br/>
		  <img src="img/gym5.jpg" class="img-fluid" style="width:355px">
		  <img src="img/gym6.jpg" class="img-fluid" style="width:355px">
		  <img src="img/gym7.jpg" class="img-fluid" style="width:355px">
		  <br/><br/>
		  <h5>Visamos pelo bom atendimento ao cliente e qualidade de nossas aulas e equipamentos.  
		  Aqui você pode manter-se completamente em forma, trabalhando tanto seu corpo quanto sua mente. </h5>
		  <br/>
		  <div class="container">
	  		<br/>
	  		<div class="card">
		    	<div class="card-body">
			      	<h4 class="card-title">Aeróbica</h4>
			      	<p class="card-text">Duração variada • Preço variado • Aulas de ginástica aeróbica.</p>	
					<h4 class="card-title">Zumba</h4>
			      	<p class="card-text">Duração variada • Preço variado • Aulas de Zumba, 2 ou 3 vezes por semana.</p>
					<h4 class="card-title">Musculação</h4>
			      	<p class="card-text">Duração variada • Preço variado • Aulas de musculação com os melhores equipamentos.</p>
					<br/><br/>
					<h5 class="card-title">Venha nos conhecer e faça uma aula experimental!</h5>					
		    	</div>
	  		</div>
		</div>		  
	</div>
		  
		<div id="section2" class="container-fluid bg-link" style="padding-top:70px;padding-bottom:0.5px">
		  <h1>Promoções</h1>
		  <br/><br/>
<div class="columns">
  <ul class="price">
    <li class="header">Pacotes</li>
    <li class="grey">A partir de R$35,00 / Mês</li>
    <li>Musculação</li>
    <li>Aeróbica</li>
    <li>Zumba</li>  
  </ul>
  <br/><br/>
</div>

<div class="columns">
  <ul class="price">
    <li class="header" style="background-color:#333">Pacotes</li>
    <li class="grey">A partir de R$45,00 / Mês</li>
    <li>Musculação</li>
    <li>Aeróbica</li>
    <li>Zumba</li>  
  </ul>
  <br/><br/>
</div>

<div class="columns">
  <ul class="price">
    <li class="header">Avulsas</li>
    <li class="grey">A partir de R$10,00</li>
    <li>Musculação</li>
    <li>Aeróbica</li>
    <li>Zumba</li>  
  </ul>
  <br/><br/>
</div>		  
        </div>       
	
		<div id="section3" class="container-fluid bg-link" style="padding-top:70px;padding-bottom:0.5px">		  
		  <br/>
		  <h1>Contatos e Localização</h1>
		  <br/>
		<div class="row support-bottom text-left">
			  <div class="col-md-5 support-grid">
		<div>
			<div class="contact-info">
			 <div class="footer-style-w3ls">
				<h4 class="text-dark mb-2"><img src="img/tel_icon.png" alt="Academia" width="25"> Telefone</h4>
				<p>(35) 3651-3113</p>
			</div>
			<div class="footer-style-w3ls my-4">
			   <h4 class="text-dark mb-2"><img src="img/fb_icon.png" alt="Academia" width="25"> Facebook</h4>
			   <p><a id="social"  href="https://www.facebook.com/academiaparaisofitness/" target="_blank">Academia Fitness Ana Carvalho</a></p>
			</div>
			<div class="footer-style-w3ls">
				<h4 class="text-dark mb-2"><img src="img/map_icon.png" alt="Academia" width="25"> Localização</h4>
				<p>Rua Cel. Francisco Granado, 915 - Centro (0,77 km)</p>
				<p>37660-000 Paraisópolis</p>
			</div>
			</div>
		</div>					
			</div>
				
		<div class="col-md-7 support-grid">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d921.1620812621368!2d-45.780475670779666!3d-22.554842860547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cb88e8a2e66abb%3A0x26ab22496718746f!2sAcademia+Para%C3%ADso+Fitness!5e0!3m2!1spt-BR!2sbr!4v1541792407454" width="100%" height="295px" frameborder="0" style="border:0" allowfullscreen></iframe>				
		</div>
		</div>
		</div></div></div>
	
	
		<!---------------------------- SCRIPT CARROCEL ---------------------------->
		<script src="jquery/dist/jquery.js"></script>
        <script src="popper.js/dist/popper.min.js"></script>
        <script src="js/bootstrap.js"></script>
	
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

		<!---------------------------- FOOTER ---------------------------->	
	<div class="footer">
		<p>Sistema para Controle de Academia - 2018 | Project by: Aline, Guilherme e Laura | IM3A</p>
	</div>
	
	</body>
	
</html>