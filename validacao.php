<?php

$con = mysqli_connect("localhost", "root", "vertrigo", "curic");

$usuario = filter_input(INPUT_POST, 'usuario');
$senha = filter_input(INPUT_POST, 'senha');

$sel = "select * from login where usuario='$usuario' and senha='$senha'";

$query = mysqli_query($con, $sel);

$linhas = mysqli_num_rows($query);

if($linhas != 0){
    header("location: index.php");
}else{ 
    echo "dados incorretos";
}
