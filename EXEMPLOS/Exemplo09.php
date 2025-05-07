<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de Função em PHP</title>
</head>
<body>
    <h1>Calculador Simples: Soma</h1>
</body>
</html>

<?php 
// função para somar dois números

function soma($a, $b) {
    return $a + $b;
}

$n1 = 5;
$n2 = 10;
$resultado = soma($n1, $n2);


echo "<h2>Resultado da soma: " . $resultado . "</h2>";


?>