<?php
 //$DadosFormulario = $_POST;
	
 //var_dump($DadosFormulario);

 $cpf = $_POST['user_login'];
 $senha = $_POST['user_senha'];
  
 $conexao = mysqli_connect("localhost", "root", "", "academia");
 
 if($conexao){
	 $sql = "Select * from login where cpf like '$cpf' and senha like '$senha'";
	 
	 $resultado = mysqli_query ($conexao, $sql);
	 
	 if($totalRegistros=mysqli_num_rows($resultado)>0){	
     //echo "numero de registros encontrados = ".$totalRegistros."<br/>";	

	while($exibir=mysqli_fetch_assoc($resultado)){
		echo $exibir['id']."<br/>";
		echo $exibir['cpf']."<br/>";
		echo md5($exibir['senha'])."<br/>";
		echo $exibir['privilegio']."<br/>";
		
		session_start(); 
		if($exibir['privilegio']=="1"){
			$_SESSION['usr']=$exibir['cpf'];
			header("location:indexAluno.php");
			//echo"BEM VINDO USUARIO";
		} else {
			if($exibir['privilegio']=="2"){
			$_SESSION['prof']=$exibir['cpf'];
			//echo"BEM VINDO PROFESSOR";
			header("location:indexProf.php");
		}else{
			if($exibir['privilegio']=="3"){
			$_SESSION['adm']=$exibir['cpf'];
			//echo"BEM VINDO ADM";
			header("location:indexAdm.php");
		}
		}
	}
	
}


	 
	 } else {

		header("location:login.php?status=0");
		echo"<script>";
		echo'alert("Hello! I am an alert box!!");';
		echo"</script>";
	 }
	 
 }
 
?>