<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <style>
        :root {
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --neon-shadow: 0 0 15px rgba(118, 75, 162, 0.5);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        body {
            min-height: 100vh;
            display: grid;
            place-items: center;
            background: var(--gradient-primary);
            padding: 20px;
        }

        .calculadora-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: var(--neon-shadow);
            width: 100%;
            max-width: 500px;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        h1 {
            text-align: center;
            color: #2d3748;
            margin-bottom: 2rem;
            font-size: 2.5em;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #4a5568;
            font-weight: 600;
        }

        .input-field {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1.1em;
            transition: all 0.3s ease;
        }

        .input-field:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
            outline: none;
        }

        button {
            width: 100%;
            padding: 1rem;
            background: var(--gradient-primary);
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 1.1em;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: var(--neon-shadow);
        }

        .resultado {
            margin-top: 2rem;
            padding: 1.5rem;
            border-radius: 10px;
            background: #f7fafc;
            text-align: center;
            font-size: 1.2em;
            animation: fadeIn 0.5s ease;
        }

        .resultado.sucesso {
            background: #48bb78;
            color: white;
        }

        .resultado.erro {
            background: #f56565;
            color: white;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 480px) {
            .calculadora-container {
                padding: 1.5rem;
            }
            
            h1 {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>
    <div class="calculadora-container">
        <h1>Calculadora</h1>
        
        <form method="post">
            <div class="form-group">
                <label for="One">Primeiro valor:</label>
                <input type="number" name="NumberOne" id="One" class="input-field" required>
            </div>

            <div class="form-group">
                <label for="Two">Segundo valor:</label>
                <input type="number" name="NumberTwo" id="Two" class="input-field" required>
            </div>

            <div class="form-group">
                <label>Operação matemática:</label>
                <label>+
                <input type="radio" name="operacao" value="+">
                </label>
                <label>- 
                <input type="radio" name="operacao" value="-">
                </label>
                <label>x
                <input type="radio" name="operacao" value=".">
                </label>
                <label>÷
                <input type="radio" name="operacao" value="/">
                </label>
            </div>

            <button type="submit">Calcular →</button>
        </form>

        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $one = floatval($_POST['NumberOne']);
            $two = floatval($_POST['NumberTwo']);
            $operador = trim($_POST['operacao']);

            $classe_resultado = '';
            $mensagem = '';

            if ($operador == '+') {
                $resultado = $one + $two;
                $mensagem = "Adição: $one + $two = <strong>".number_format($resultado, 2)."</strong>";
                $classe_resultado = 'sucesso';

            } elseif ($operador == '-') {
                $resultado = $one - $two;
                $mensagem = "Subtração: $one - $two = <strong>".number_format($resultado, 2)."</strong>";
                $classe_resultado = 'sucesso';
            } elseif ($operador == '.') {
                $resultado = $one * $two;
                $mensagem = "Multiplicação: $one × $two = <strong>".number_format($resultado, 2)."</strong>";
                $classe_resultado = 'sucesso';
            } elseif ($operador == '/') {
                if($two != 0) {
                    $resultado = $one / $two;
                    $mensagem = "Divisão: $one ÷ $two = <strong>".number_format($resultado, 2)."</strong>";
                    $classe_resultado = 'sucesso';
                } else {
                    $mensagem = "Erro: Divisão por zero não é permitida!";
                    $classe_resultado = 'erro';
                }
            } else {
                $mensagem = "Operação inválida! Use somente: + (adição), - (subtração), . (multiplicação) ou / (divisão)";
                $classe_resultado = 'erro';
            }

            echo "<div class='resultado $classe_resultado'>$mensagem</div>";
        }
        ?>
    </div>
</body>
</html>