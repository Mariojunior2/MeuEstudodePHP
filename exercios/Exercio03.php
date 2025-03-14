<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade do Mario 13/03 mútiplos de 3 entre 1 e N</title>
</head>
<body>
    <h1>Exibir de mútiplos de 3</h1>
    <form action="" method="post">
        <label for="n">Informe o número N:</label>
        <input type="number" name="n" id="n" required>
        <input type="submit" value="Exibir mútiplos de 3">
    </form>
    <?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $n = $_POST['n'];

        if (is_numeric($n) && $n > 0) {
            echo "<h2>Mútiplos de 3 até $n</h2>";

            echo "<h3>Usando o for</h3>";
            for ($i = 3; $i <= $n; $i += 3) {
                echo "<li>$i</li>";
            }
            echo "</ul>";

            echo "<h3>Usando o 'while':</h3>";
            $i = 3;
            while ($i <= $n) {
                echo "<li>$i</li>";
                $i += 3;
            }
            echo "</ul>";
        
        echo "<h3>Usando o 'do-while':</h3>";
        $i = 3;
        do {
            echo "<li>$i</li>";
            $i += 3;
        } while ($i <= $n);
        echo "</ul>";
    }  else {
        echo "Por favor, insira um número inteiro positivo.";
    }
    } 
    ?>
</body>
</html>

