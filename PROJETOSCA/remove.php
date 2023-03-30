<?php 
    //recebe o id dos dados que serão apagados
    $id = filter_input(INPUT_POST, 'id');

    //estabelece a conexão
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "academia";
    $conexao = mysqli_connect($hostname,$user,$password,$database);
    if( !$conexao ){
        echo "Ops.. Erro na conexão.";
        exit;
    }
    //Executa a query
    $sql = "DELETE FROM cliente WHERE id=".$id;
    $remove = mysqli_query($conexao, $sql);
    //Se falhou, redireciona pra exibe.php com remove igual a false 
    if( !$remove ){
        header("Location:buscar.php?remove=false");
        exit;
    }
    //se tudo deu certo, redireciona pra exibe.php com remove igual a true
    header("Location:buscar.php?remocao=true");
?>
