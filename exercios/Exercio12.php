<!DOCTYPE html>
<html>
<head>
    <title>Sequência de Fibonacci</title>
</head>
<body>
    <h2>Gerador de Sequência de Fibonacci</h2>
    <form method="post">
        <label for="number">Informe um número inteiro:</label>
        <input type="number" name="number" id="number" required>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['number'])) {
        $n = (int)$_POST['number'];
        

        function fibonacciFor($n) {
            $seq = [];
            if ($n >= 0) {
                $a = 0;
                $b = 1;
                $seq[] = $a;
                if ($b <= $n) {
                    $seq[] = $b;
                    for ($next = $a + $b; $next <= $n; $next = $a + $b) {
                        $seq[] = $next;
                        $a = $b;
                        $b = $next;
                    }
                }
            }
            return $seq;
        }

        function fibonacciWhile($n) {
            $seq = [];
            if ($n >= 0) {
                $a = 0;
                $b = 1;
                $seq[] = $a;
                if ($b <= $n) {
                    $seq[] = $b;
                    $next = $a + $b;
                    while ($next <= $n) {
                        $seq[] = $next;
                        $a = $b;
                        $b = $next;
                        $next = $a + $b;
                    }
                }
            }
            return $seq;
        }

        function fibonacciDoWhile($n) {
            $seq = [];
            if ($n >= 0) {
                $a = 0;
                $b = 1;
                $seq[] = $a;
                if ($b <= $n) {
                    $seq[] = $b;
                    $next = $a + $b;
                    do {
                        if ($next > $n) break;
                        $seq[] = $next;
                        $a = $b;
                        $b = $next;
                        $next = $a + $b;
                    } while (true);
                }
            }
            return $seq;
        }

        $resultadoFor = fibonacciFor($n);
        $resultadoWhile = fibonacciWhile($n);
        $resultadoDoWhile = fibonacciDoWhile($n);

        echo "<h3>Resultado usando for:</h3>";
        echo empty($resultadoFor) ? "Nenhum número na sequência." : implode(', ', $resultadoFor);
        
        echo "<h3>Resultado usando while:</h3>";
        echo empty($resultadoWhile) ? "Nenhum número na sequência." : implode(', ', $resultadoWhile);
        
        echo "<h3>Resultado usando do-while:</h3>";
        echo empty($resultadoDoWhile) ? "Nenhum número na sequência." : implode(', ', $resultadoDoWhile);
    }
    ?>
</body>
</html>