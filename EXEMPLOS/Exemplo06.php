<?php
    $numero="";
    $mensagem="";

    if (isset($_GET['numero'])){
        if (!empty($_GET['numero'])){
            $numero = $_GET['numero'];
            if ($numero % 2 == 0){
                $mensagem = "<h4 style='color:red;'>Número Par</h4>";
            } else {
                $mensagem = "<h4 style='color:blue;'>Número Ímpar</4>";
            }
        }
    }    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Par ou Ímpar</title>
    <style>
        span{
            font-size : 18px;
            background-color: yellow;
        }
    </style>
</head>


<body>
    <h1>Descubra se o número é Par ou Ímpar</h1>

    <form action="" method="GET">
        <label for="numero">Número:</label>
        <input type="text" name="numero" value=<?php echo $numero?>>
        <input type="submit" value="Verificar" name="enviar">
        <br>
        <span><?php echo $mensagem ?></span>
    </form>

</body>
</html>