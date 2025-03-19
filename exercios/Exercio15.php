<!DOCTYPE html>
<html>
<head>
    <title>Múltiplos até 100</title>
    <style>
        .resultado { margin: 20px; padding: 10px; border: 1px solid #ccc; }
        .error { color: red; }
    </style>
</head>
<body>
    <h2>Identificador de Múltiplos</h2>
    <form method="post">
        <label for="number">Informe um número inteiro positivo:</label>
        <input type="number" name="number" id="number" min="1" required>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['number'])) {
        $n = (int)$_POST['number'];
        
        if ($n <= 0) {
            echo "<p class='error'>Por favor, informe um número inteiro positivo.</p>";
        } else {
            // Usando FOR
            $multiplesFor = [];
            for ($i = $n; $i <= 100; $i += $n) {
                $multiplesFor[] = $i;
            }
            
            // Usando WHILE
            $multiplesWhile = [];
            $i = $n;
            while ($i <= 100) {
                $multiplesWhile[] = $i;
                $i += $n;
            }
            
            // Usando DO-WHILE (corrigido)
            $multiplesDoWhile = [];
            $i = $n;
            do {
                if ($i <= 100) {
                    $multiplesDoWhile[] = $i;
                }
                $i += $n;
            } while ($i <= 100);
            
            // Função de formatação
            function formatResult($arr) {
                return empty($arr) ? "Nenhum múltiplo encontrado." : implode(', ', $arr);
            }
            
            // Exibição dos resultados
            echo "<div class='resultado'>";
            echo "<h3>Resultado usando FOR:</h3><p>" . formatResult($multiplesFor) . "</p>";
            echo "<h3>Resultado usando WHILE:</h3><p>" . formatResult($multiplesWhile) . "</p>";
            echo "<h3>Resultado usando DO-WHILE:</h3><p>" . formatResult($multiplesDoWhile) . "</p>";
            echo "</div>";
        }
    }
    ?>
</body>
</html>