<html>
<head>
<style type="text/css">
    a:link 
{ 
 text-decoration:none; 
  color: black;
} 

body{
    font-family: Arial;
    padding: 10px;
    background-color:#5F9EA0;
    text-decoration: none;
}
</style>
</head>
<body>

<button><a href="index.php">Retornar</a></button>

    <form action="deslogar.php" method="POST">
        <p><input type="submit" value="Sair do sistema" name="botao"></p>
    </form>
    
    <?php


$con = mysqli_connect("localhost", "root", "vertrigo", "curic");

    $botao = filter_input(INPUT_POST, "botao");

    if($botao="Histórico completo"){
        $query = "select * from expe order by id";
   
    $exec = mysqli_query($con, $query);
    $linhas = mysqli_num_rows($exec);

     }


for($i=0; $i<$linhas; $i++){
        $col = mysqli_fetch_array($exec);
        $cod = $col['id'];
        $tit = $col['cargo'];
        $not = $col['experi'];
    ?>
<table border="1"width="100%">
    <tr>
        <td><p><input type="hidden" value="<?php echo $cod; ?>" name="cod"><p></td>        
        <td><p><input type="text" value="<?php echo $tit; ?>" name="tit"></p></td>  
        <td><p><input size="140" type="text" value="<?php echo $not; ?>" name="not"></p></td>
     
    </tr>
</table>
    <?php
        }
    ?>
</body>
</html>