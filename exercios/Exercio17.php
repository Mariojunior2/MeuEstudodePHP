<!DOCTYPE html>
<html>
<head>
    <title>Tabuada</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Tabuada</h1>
    <form method="POST">
        <label for="multiplicador">Tabuada:</label>
        <input type="number" name="multiplicador" id="multiplicador" required min="1">
        <br>
    
        <button type="submit">Gerar Tabuada</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $multiplicador = filter_input(INPUT_POST, 'multiplicador', FILTER_VALIDATE_INT);
       

            echo "<h3>Com loop for:</h3>";
            echo "<ul>";
            for ($i = 1; $i <= 10; $i++) {
                echo "<li>$multiplicador x $i = " . ($multiplicador * $i) . "</li>";
            }
            echo "</ul>";


            echo "<h3>Com loop while:</h3>";
            echo "<ul>";
            $i = 1;
            while ($i <= 10) {
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
            } while ($i <= 10);
            echo "</ul>";
        }

    ?>
</body>
</html>