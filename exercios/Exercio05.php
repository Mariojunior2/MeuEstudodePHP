<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Soma de Intervalo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f0f0f0;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background: #e8f5e9;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <form method="post">
        <label for="inicio">Valor Inicial:</label>
        <input type="number" name="inicio" id="inicio" required>
        
        <label for="fim">Valor Final:</label>
        <input type="number" name="fim" id="fim" required>
        
        <input type="submit" value="Calcular Soma">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inicio = $_POST["inicio"];
        $fim = $_POST["fim"];
        
        if (!is_numeric($inicio) || !is_numeric($fim)) {
            echo "<div class='result'>Por favor, insira números válidos!</div>";
        } else {
            $menor = min($inicio, $fim);
            $maior = max($inicio, $fim);
            
            
            $soma_for = 0;
            echo "Usamdo For!";
            for ($i = $menor; $i <= $maior; $i++) {
                $soma_for += $i;
            }
            
            echo "<div class='result'><p>Soma usando o for: $soma_for</p> </div>";
            $quantidade_termos = $maior - $menor + 1;
            echo "Tem um tolal de $quantidade_termos termos";

            
            $soma_while = 0;
            $i = $menor;
            while($i <= $maior) {
                $soma_for += $i;
                $i++;
            }
            echo "<div class='result'><p>Soma usando o for: $soma_while</p> </div>";
            echo "Tem um tolal de $quantidade_termos termos";

       
        }
    }
    ?>
</body>
</html>