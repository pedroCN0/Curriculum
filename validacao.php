<?php
session_start();
$con = mysqli_connect("localhost", "root", "vertrigo", "curic");

$usuario = filter_input(INPUT_POST, 'usuario');
$senha = filter_input(INPUT_POST, 'senha');

$sel = "select * from login where usuario='$usuario' and senha='$senha'";

$query = mysqli_query($con, $sel);

$linhas = mysqli_num_rows($query);

    if($linhas != 0){
    $a = mysqli_fetch_array($query);
    $_SESSION['usuario']= $usuario;
    $_SESSION['senha']= $senha;
    

        header("location: index.php");

    }else{	
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header("location: index.php");
?>

		<script type="text/javascript">
			window.alert("dados incorretos");
		</script>
<?php
 		}
?>