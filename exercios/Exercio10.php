<!DOCTYPE html>
<html>
<head>
    <title>Conversor Celsius-Fahrenheit</title>
    <style>
        table { border-collapse: collapse; margin: 20px; }
        td, th { border: 1px solid black; padding: 8px; }
    </style>
</head>
<body>
    <h2>Conversão de Celsius para Fahrenheit</h2>

    <form method="post">
        Digite um número inteiro: 
        <input type="number" name="numero" required>
        <input type="submit" value="Gerar Tabela">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $n = filter_input(INPUT_POST, 'numero', FILTER_VALIDATE_INT);
        
        if ($n !== false && $n !== null) {

            echo "<h3>Usando FOR:</h3>";
            echo "<table>";
            echo "<tr><th>Celsius</th><th>Fahrenheit</th></tr>";
            for ($c = 0; $c <= $n; $c++) {
                $f = ($c * 9/5) + 32;
                echo "<tr><td>$c</td><td>" . number_format($f, 1) . "</td></tr>";
            }
            echo "</table>";


            echo "<h3>Usando WHILE:</h3>";
            echo "<table>";
            echo "<tr><th>Celsius</th><th>Fahrenheit</th></tr>";
            $contador = 0;
            while ($contador <= $n) {
                $f = ($contador * 9/5) + 32;
                echo "<tr><td>$contador</td><td>" . number_format($f, 1) . "</td></tr>";
                $contador++;
            }
            echo "</table>";

            echo "<h3>Usando DO-WHILE:</h3>";
            echo "<table>";
            echo "<tr><th>Celsius</th><th>Fahrenheit</th></tr>";

            $contador = 0;
            do {
                $f = ($contador * 9/5) + 32;
                echo "<tr><td>$contador</td><td>" . number_format($f, 1) . "</td></tr>";
                $contador++;
            } while($contador <= $n);
            echo "</table>";

        } else {
            echo "<p style='color: red'>Por favor, insira um número inteiro válido!</p>";
        }
    }
    ?>
</body>
</html>