<?php 
    //Recebe os dados com as alterações feitas
    $id = filter_input(INPUT_POST, 'id');
    $novoNome = filter_input(INPUT_POST, 'nome');
    $novoEmail = filter_input(INPUT_POST, 'email');
    $novoTel = filter_input(INPUT_POST, 'telefone');
    $novoCpf = filter_input(INPUT_POST, 'cpf');
    $novoRg = filter_input(INPUT_POST, 'rg'); 
	$novoEndereco = filter_input(INPUT_POST, 'endereco');
	$novoCargo = filter_input(INPUT_POST, 'cargo');
    //Estabelece a conexão com o mysql
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "academia";
    $conexao = mysqli_connect($hostname,$user,$password,$database);
   
    if( !$conexao ){
        header("Location:exibe.php?alteracao=false");
        exit;
    }
    //Executa a atualização no banco de dados
    $sql = "UPDATE professor SET nome='" . $novoNome . "', cpf='" . $novoCpf ."', rg='" . $novoRg . "',email='" . $novoEmail ."',telefone ='".$novoTel . "',endereco ='".$novoEndereco ."',cargo ='".$novoCargo ."' WHERE id=".$id;
    //$sql = "UPDATE cliente SET nome='" . $novoNome . "', email='" . $novoEmail ."',telefone ='".$novoTel . "' WHERE id=".$id;
    $update = mysqli_query($conexao, $sql);

    //Se não deu certo, redireciona pra exibe.php com alteracao igual a false
    if( !$update ){
        header("Location:busca_prof.php?alteracao=false");
        exit;
    }

    //se tudo deu certo, redireciona pra exibe.php com alteracao igual a true
    header("Location:busca_prof.php?alteracao=true");
?>
