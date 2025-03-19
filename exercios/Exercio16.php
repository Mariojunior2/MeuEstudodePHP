<!DOCTYPE html>
<html>
<head>
    <title>Contagem de Palavras</title>
    <style>
        .resultado { margin: 20px; padding: 10px; border: 1px solid #ccc; }
        .error { color: red; }
    </style>
</head>
<body>
    <h2>Contador de Palavras</h2>
    
    <form method="post">
        Digite uma frase: 
        <input type="text" name="frase" required>
        <input type="submit" value="Contar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $frase = trim($_POST['frase']);
        
        if (empty($frase)) {
            echo "<p class='error'>Por favor, insira uma frase válida!</p>";
        } else {
            $count_for = 0;
            $count_while = 0;
            $count_dowhile = 0;
            $length = strlen($frase);

            // Usando FOR
            if ($length > 0) {
                $count_for = 1;
                for ($i = 0; $i < $length - 1; $i++) {
                    if ($frase[$i] === ' ' && $frase[$i + 1] !== ' ') {
                        $count_for++;
                    }
                }
            }

            // Usando WHILE
            if ($length > 0) {
                $count_while = 1;
                $i = 0;
                while ($i < $length - 1) {
                    if ($frase[$i] === ' ' && $frase[$i + 1] !== ' ') {
                        $count_while++;
                    }
                    $i++;
                }
            }

            // Usando DO-WHILE
            if ($length > 0) {
                $count_dowhile = 1;
                $i = 0;
                do {
                    if ($i < $length - 1 && $frase[$i] === ' ' && $frase[$i + 1] !== ' ') {
                        $count_dowhile++;
                    }
                    $i++;
                } while ($i < $length - 1);
            }

            // Exibir resultados
            echo "<div class='resultado'>";
            echo "<h3>Resultados:</h3>";
            echo "<p>Usando FOR: $count_for palavras</p>";
            echo "<p>Usando WHILE: $count_while palavras</p>";
            echo "<p>Usando DO-WHILE: $count_dowhile palavras</p>";
            echo "</div>";
        }
    }
    ?>
</body>
</html>