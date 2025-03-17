<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Médias</title>
    <style>
        body { font-family: Arial; max-width: 500px; margin: 20px auto; padding: 20px; }
        form { background: #f0f0f0; padding: 20px; border-radius: 8px; }
        input, button { padding: 8px; margin: 5px 0; width: 100%; }
        .resultado { margin-top: 20px; padding: 15px; background: #e0ffe0; }
        .erro { background: #ffe0e0; }
    </style>
</head>
<body>
    <form method="post">
        <h3>Digite as notas (separadas por espaço ou vírgula):</h3>
        <input type="text" name="notas" placeholder="Ex: 7 8 9" required>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $input = str_replace(',', ' ', $_POST['notas']);
        $notas = explode(' ', $input);
        $valido = true;
        

        foreach ($notas as &$nota) {
            $nota = trim($nota);
            if (!is_numeric($nota) || $nota < 0 || $nota > 10) {
                $valido = false;
                break;
            }
            $nota = (float)$nota;
        }

        if ($valido && !empty($notas)) {

            function calcularSoma($notas, $tipo) {
                $soma = 0;
                $total = count($notas);

                if ($tipo == 1) {
                    for ($i = 0; $i < $total; $i++) {
                        $soma += $notas[$i];
                    }
                }

                elseif ($tipo == 2) {
                    $i = 0;
                    while ($i < $total) {
                        $soma += $notas[$i];
                        $i++;
                    }
                }

                else {
                    $i = 0;
                    if ($total > 0) {
                        do {
                            $soma += $notas[$i];
                            $i++;
                        } while ($i < $total);
                    }
                }
                return $soma;
            }

            // Calcular e exibir
            echo '<div class="resultado">';
            echo 'Média com FOR: ' . number_format(calcularSoma($notas, 1)/count($notas), 2, ',', '.') . '<br>';
            echo 'Média com WHILE: ' . number_format(calcularSoma($notas, 2)/count($notas), 2, ',', '.') . '<br>';
            echo 'Média com DO-WHILE: ' . number_format(calcularSoma($notas, 3)/count($notas), 2, ',', '.'); 
            echo '</div>';
            
        } else {
            echo '<div class="resultado erro">Digite apenas números entre 0 e 10!</div>';
        }
    }
    ?>
</body>
</html>