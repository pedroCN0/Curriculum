<?php
$codigo = filter_input(INPUT_POST, "id");
$tit = filter_input(INPUT_POST, "titulo");
$not = filter_input(INPUT_POST, "noticia");
$telefone = filter_input(INPUT_POST, "telefone");
$email = filter_input(INPUT_POST, "email");
$nome = filter_input(INPUT_POST, "nome");

$con = mysqli_connect("localhost","root","vertrigo","curic");

$cad = "insert into expe (cargo, experi) values ('$tit','$not')";

$exe = mysqli_query($con, $cad);

if ($exe) {
?>
	<script type="text/javascript">
	window.alert("Ação realizada");
	window.location.href='index.php'
	</script>

<?php

}else{

?>

<script type="text/javascript">
	window.alert("Ação não realizada");
	window.location.href='index.php'
	</script>

<?php

}

?>