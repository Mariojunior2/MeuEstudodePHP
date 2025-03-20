<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calcular Média de Notas</title>
</head>
<body>
    <h2>Insira as notas separadas por vírgula:</h2>
    <form method="post">
        <input type="text" name="notas" placeholder="Ex: 7.5, 8, 6.5" required>
        <button type="submit">Calcular Média</button>
    </form>
</body>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $notasInput = $_POST["notas"];
        $notas = array_map('floatval', explode(',', $notasInput));
        $totalNotas = count($notas);
        
        if ($totalNotas == 0) {
            echo "<p>Nenhuma nota foi inserida.</p>";
            exit;
        }


        function validarNota($nota) {
            return ($nota >= 0 && $nota <= 10);
        }


        foreach ($notas as $nota) {
            if (!validarNota($nota)) {
                echo "<p>Nota inválida: $nota (deve ser entre 0 e 10).</p>";
                exit;
            }
        }


        $somaFor = 0;
        for ($i = 0; $i < $totalNotas; $i++) {
            $somaFor += $notas[$i];
        }
        $mediaFor = $somaFor / $totalNotas;


        $somaWhile = 0;
        $contadorWhile = 0;
        while ($contadorWhile < $totalNotas) {
            $somaWhile += $notas[$contadorWhile];
            $contadorWhile++;
        }
        $mediaWhile = $somaWhile / $totalNotas;


        $somaDoWhile = 0;
        $contadorDoWhile = 0;
        if ($totalNotas > 0) {
            do {
                $somaDoWhile += $notas[$contadorDoWhile];
                $contadorDoWhile++;
            } while ($contadorDoWhile < $totalNotas);
        }
        $mediaDoWhile = $somaDoWhile / $totalNotas;


        echo "<h3>Resultados:</h3>";
        echo "<p>Notas inseridas: " . implode(', ', $notas) . "</p>";
        echo "<p>Média usando FOR: " . number_format($mediaFor, 2) . "</p>";
        echo "<p>Média usando WHILE: " . number_format($mediaWhile, 2) . "</p>";
        echo "<p>Média usando DO-WHILE: " . number_format($mediaDoWhile, 2) . "</p>";
    } else {
        echo "<p>Acesso inválido. Volte ao formulário.</p>";
    }
    ?>

</html>
