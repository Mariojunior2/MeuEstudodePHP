<!DOCTYPE html>
<html>
<head>
    <title>Gerador de Tabuada</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Gerador de Tabuada</h1>
    <form method="POST">
        <label for="multiplicador">Multiplicador:</label>
        <input type="number" name="multiplicador" id="multiplicador" required min="1">
        <br>
        
        <label for="limite">Limite da tabuada:</label>
        <input type="number" name="limite" id="limite" required min="1">
        <br>
        
        <button type="submit">Gerar Tabuada</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $multiplicador = filter_input(INPUT_POST, 'multiplicador', FILTER_VALIDATE_INT);
        $limite = filter_input(INPUT_POST, 'limite', FILTER_VALIDATE_INT);

        if ($multiplicador < 1 || $limite < 1) {
            echo "<p style='color: red;'>Por favor, insira números inteiros positivos válidos!</p>";
        } else {
            echo "<h2>Resultados:</h2>";
            

            echo "<h3>Com loop for:</h3>";
            echo "<ul>";
            for ($i = 1; $i <= $limite; $i++) {
                echo "<li>$multiplicador x $i = " . ($multiplicador * $i) . "</li>";
            }
            echo "</ul>";


            echo "<h3>Com loop while:</h3>";
            echo "<ul>";
            $i = 1;
            while ($i <= $limite) {
                echo "<li>$multiplicador x $i = " . ($multiplicador * $i) . "</li>";
                $i++;
            }
            echo "</ul>";

            echo "<h3>Com loop do-while:</h3>";
            echo "<ul>";
            $i = 1;
            do {
                echo "<li>$multiplicador x $i = " . ($multiplicador * $i) . "</li>";
                $i++;
            } while ($i <= $limite);
            echo "</ul>";
        }
    }
    ?>
</body>
</html>