<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
    <label for="n">Informe o number que falarei se é primo ou não!</label>
    <input type="number" name="n" id="n" required>
    <button type="submit">Enviar!</button>    
</form>
</body>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = $_POST['n'];
    echo "<p>Números primos até $n usando for!:</p>";
    echo "<ul>";
    

    for ($numero = 2; $numero <= $n; $numero++) {
        $ehPrimo = true;

        for ($divisor = 2; $divisor < $numero; $divisor++) {
            if ($numero % $divisor == 0) {
                $ehPrimo = false;
                break; 
            }
        }
        
        if ($ehPrimo) {
            echo "<li>$numero</li>";
        }
    }
    
    echo "</ul>";
    echo "<p>Primos até $n (usando WHILE):</p><ul>";
    
    $num = 2;
    while ($num <= $n) {
        $primo = true;
        $div = 2;
        
        while ($div < $num) {
            if ($num % $div == 0) {
                $primo = false;
                break;
            }
            $div++;
        }
        
        if ($primo) echo "<li>$num</li>";
        $num++;
    }
    
    echo "</ul>";
    echo "<p>Primos até $n (usando DO-WHILE):</p><ul>";
    
    $num = 2;
    do {
        $primo = true;
        $div = 2;
        
      
        if ($num == 2) {
            echo "<li>2</li>";
            $num++;
            continue;
        }
        
        do {
            if ($num % $div == 0) {
                $primo = false;
                break;
            }
            $div++;
        } while ($div < $num);
        
        if ($primo) echo "<li>$num</li>";
        $num++;
    } while ($num <= $n);
    
}
?>
</html>