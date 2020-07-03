<?php

$codigo = filter_input(INPUT_POST, "cod");
$titulo = filter_input(INPUT_POST, "tit");
$subtitulo = filter_input(INPUT_POST, "subtit");
$noticia = filter_input(INPUT_POST, "not");
$calculo = filter_input(INPUT_POST, "envio");

echo "$codigo - $titulo - $noticia - $calculo";

$con = mysqli_connect("localhost", "root", "vertrigo", "curic");

if($calculo == "Atualizar"){
	$q = "update expe set cargo = '$titulo', experi = '$noticia' where id = '$codigo';";
}else if ($calculo == "Apagar"){
	$q = "delete from expe where id = '$codigo'";
}


$exec = mysqli_query($con, $q);

if($exec){
 		echo "Executado com sucesso!";
 		?>
 		
 		<script type="text/javascript">
	window.alert("foi");
	window.location.href='index.php'
	</script>

	<?php
 		}else{
 			echo "erro na execução";
 		}
?>