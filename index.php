<!DOCTYPE html>
<html lang="pt-br">
<meta charset="utf-8">
<meta http-equiv="refresh" content="120">
<head>
	<link rel="icon" type="image" href="sds.jpg" />
	<title>Currículo de Pedro Campos Novais</title>
	<link rel="stylesheet" type="text/css" href="base.css">
	<style type="text/css">
    a:link 
{ 
 text-decoration:none; 
 color: black;
} 
</style>
</head>

<body>

<?Php 
session_start();
        if(!isset($_SESSION['usuario'])==TRUE 
                and (!isset($_SESSION['senha'])==TRUE)){
                
                unset($_SESSION['usuario']);
                unset($_SESSION['senha']);
                
                echo "Acesso negado";
        }else{
        
        $logado= $_SESSION['usuario'];

    $con = mysqli_connect("localhost", "root", "vertrigo", "curic");
?>

<div id="corpoapp7">
	<center><h2>Painel de currículo de  <?php echo "$logado";?> </h2></center>
</div>

<div id="corpoapp1">

	<div id="corpoapp7">
	<center><h4>Informações e contato:</h4></center>
</div>	

<?php 
				 	$busc = "select usuario,telefone,email from contato ";

					$exec = mysqli_query($con, $busc);

					$lin = mysqli_num_rows($exec);

					for ($i=0; $i <$lin ; $i++) { 
						
					$col = mysqli_fetch_array($exec);

					$tel = $col['telefone'];

 					$email = $col['email'];

 					$usu = $col['usuario'];	
				?>

<form method="POST">

<p>Nome:</p>
	<p>
    <input type = "text" value="<?php echo $usu; ?>" name="nome">
    </p>
<p>Telefone:</p>
    <p>
    <input type = "text" value="<?php echo $tel; ?>" name="telefone">
    </p>
<p>E-mail:</p>
    <p>
    <input type = "text" value="<?php echo $email; ?>" name="email">
    </p>
</form>				
</div>
	<?php
}
	?>

<!---->
<div id="corpoapp2">

    <form action="deslogar.php" method="POST">
    	<p><input type="submit" value="Sair do sistema" name="botao"></p>
    </form>

<div id="corpoapp7">
	<center><h4>Certificações:</h4></center>	
</div>

<a href="2.pdf">Fundação Bradesco</a>
	<br>
	<a href="3.pdf">Fundação Bradesco</a>
	<br>
	<a href="4.pdf">Fundação Bradesco</a>
	<br>
	<a href="6.jpg">Fundação VIVO Telefônica</a>
	<br>
	<a href="1.pdf">OBMEP</a>
	<br>
	<a href="5.jpg">WISE UP</a>
	<br>

</div>

<div id="corpoapp6">

	<div id="txt">

	<form action="bd.php" method="POST" id="p2">
		
		<p><input type="text" name="titulo" placeholder="Cargos anteriores" cols="98"></p>

		<textarea type="text" name="noticia" cols="40" rows="5" placeholder="Descrição"></textarea>

		<p><input type="submit" value="Enviar"></p>
	</form>
	</div>
</div>

<div id="corpoapp3">

	<form action="cadastro.php" method="POST">
				<p><input type="submit" value="Histórico completo" name="botao"></p>
			</form>

				<?php 
				 	$busc = "select * from expe order by id desc limit 4";

					$exec = mysqli_query($con, $busc);

					$lin = mysqli_num_rows($exec);

					for ($i=0; $i <$lin ; $i++) { 
						
					$col = mysqli_fetch_array($exec);

					$cod = $col['id'];

 					$tit = $col['cargo'];

 					$not = $col['experi'];	
				?>

	<div id="for4">

              <form action="newatunot.php" method="POST">
        <p>
     	<input type = "hidden" value="<?php echo $cod; ?>" name="cod">
     	</p>
   		<p>
   		<input type = "text" value="<?php echo $tit; ?>" name="tit">
   		</p>
   		<p>
   		<textarea type="text" name="not" cols="49" rows="3" placeholder="Descrição"> <?php echo $not;?> </textarea>
   		</p>
   		<p>
   		<input type = "submit" value="Atualizar" name="envio">
   		</p>
   		<p>
   		<input type = "submit" value="Apagar" name="envio">
     	</p>
     		   </form>
    </div> 
	<?php
        }}
	?>
</div>
</body>
</html>