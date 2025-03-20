<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Fatorial</title>
    <style>
        .resultado { margin: 20px; padding: 10px; border: 1px solid #ccc; }
        .error { color: red; }
    </style>
</head>
<body>
    <h2>Calculadora de Fatorial</h2>
    
    <form method="post">
        Digite um número inteiro não negativo: 
        <input type="number" name="numero" min="0" required>
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $n = filter_input(INPUT_POST, 'numero', FILTER_VALIDATE_INT);
        
        if ($n !== false && $n >= 0) {
            $resultados = [];


            $fatorial_for = 1;
            for ($i = 1; $i <= $n; $i++) {
                $fatorial_for *= $i;
            }
            $resultados[] = "FOR: $n! = $fatorial_for";

            $fatorial_while = 1;
            $j = 1;
            while ($j <= $n) {
                $fatorial_while *= $j;
                $j++;
            }
            $resultados[] = "WHILE: $n! = $fatorial_while";


            $fatorial_dowhile = 1;
            $k = 1;
            if ($n > 0) {
                do {
                    $fatorial_dowhile *= $k;
                    $k++;
                } while ($k <= $n);
            }
            $resultados[] = "DO-WHILE: $n! = $fatorial_dowhile";


            echo "<div class='resultado'>";
            foreach ($resultados as $resultado) {
                echo "<p>$resultado</p>";
            }
            echo "</div>";

        } else {
            echo "<p class='error'>Por favor, insira um número inteiro não negativo!</p>";
        }
    }
    ?>
</body>
</html>