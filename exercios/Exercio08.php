<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contagem Regressiva Estilizada</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
            min-height: 100vh;
            margin: 0;
            padding: 2rem;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form {
            background: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            margin-bottom: 2rem;
            width: 100%;
            max-width: 500px;
        }

        label {
            display: block;
            margin-bottom: 1rem;
            font-size: 1.1rem;
            color: #fff;
        }

        input[type="number"] {
            width: 100%;
            padding: 0.8rem;
            border: none;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        button {
            background: linear-gradient(45deg, #00ff88, #00ccff);
            color: #1a1a1a;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s ease;
            width: 100%;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 255, 136, 0.3);
        }

        .resultado {
            background: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 15px;
            margin-top: 2rem;
            width: 100%;
            max-width: 800px;
        }

        .contagem {
            margin: 1.5rem 0;
            padding: 1.5rem;
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.2);
        }

        .contagem h2 {
            color: #00ff88;
            margin-top: 0;
            border-bottom: 2px solid #00ff88;
            padding-bottom: 0.5rem;
        }

        .numeros {
            font-size: 1.2rem;
            margin: 1rem 0;
            line-height: 1.6;
            color: #fff;
        }

        .ano-novo {
            color: #00ccff;
            font-weight: bold;
            font-size: 1.3rem;
            margin-top: 1rem;
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }
            
            form, .resultado {
                width: 90%;
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <label for="number">Digite um número inteiro positivo:</label>
        <input type="number" name="number" id="number" required>
        <button type="submit">Começar a contagem! 🎉</button>
    </form>

    <?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        $n = $_POST['number'];
        $ni = 0;
        echo '<div class="resultado">';
        
        echo '<div class="contagem">';
        echo '<h2>Usando o FOR!</h2>';
        echo '<div class="numeros">';
        for($i = $ni; $i <= $n; $i++) {
            echo " $i ";

            if ($i == $n) {
                echo '<span class="ano-novo">Feliz ano novo! 🎆</span>';
            }
        }
        echo '</div></div>';

        echo '<div class="contagem">';
        echo '<h2>Usando o WHILE!</h2>';
        echo '<div class="numeros">';
        $i = $ni;
        while($i <= $n) {
            echo " $i ";
            $i++;

            if ($i == $n) {
                echo '<span class="ano-novo">Feliz ano novo! 🎆</span>';
            }
        }
        echo '</div></div>';

        echo '<div class="contagem">';
        echo '<h2>Usando o DO-WHILE!</h2>';
        echo '<div class="numeros">';
        $i = $ni;
        do {
            echo " $i ";
            $i++;

            if ($i == $n) {
                echo '<span class="ano-novo">Feliz ano novo! 🎆</span>';
            }
        } while($i <= $n);
        echo '</div></div>';
        
        echo '</div>';
    }
    ?>
</body>
</html>