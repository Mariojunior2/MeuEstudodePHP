<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada</title>
    <style>


    body {
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        padding: 2rem;
        margin: 0;
    }

    form {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        padding: 2rem;
        border-radius: 20px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        margin: 2rem auto;
        transition: transform 0.3s ease;
    }

    form:hover {
        transform: translateY(-5px);
    }

    label {
        display: block;
        margin-bottom: 1rem;
        color: #2c3e50;
        font-weight: 600;
        font-size: 1.1rem;
    }

    input[type="number"] {
        width: 100%;
        padding: 12px 20px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: #f8f9fa;
    }

    input[type="number"]:focus {
        border-color: #6c5ce7;
        background: white;
        box-shadow: 0 4px 6px rgba(108, 92, 231, 0.1);
        outline: none;
    }

    button {
        background: linear-gradient(45deg, #6c5ce7, #a8a4e6);
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: block;
        width: 100%;
        margin-top: 1rem;
    }

    button:hover {
        opacity: 0.9;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(108, 92, 231, 0.3);
    }

    .resultado {
        background: white;
        padding: 1.5rem;
        border-radius: 15px;
        margin: 1.5rem auto;
        max-width: 500px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        border-left: 4px solid #6c5ce7;
        animation: fadeIn 0.5s ease-in;
    }

    .resultado h3 {
        color: #2c3e50;
        margin-top: 0;
        margin-bottom: 1rem;
        font-size: 1.3rem;
        position: relative;
        padding-left: 30px;
    }

    .resultado h3::before {
        content: '➔';
        position: absolute;
        left: 0;
        color: #6c5ce7;
    }

    .resultado p {
        margin: 0.8rem 0;
        padding: 0.8rem;
        background: #f8f9fa;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        transition: transform 0.2s ease;
    }

    .resultado p:hover {
        transform: translateX(10px);
        background: linear-gradient(90deg, #f3f3f3 0%, white 100%);
    }

    .resultado p span:first-child {
        color: #6c5ce7;
        font-weight: 500;
    }

    .resultado p span:last-child {
        color: #2c3e50;
        font-weight: 600;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 600px) {
        body {
            padding: 1rem;
        }
        
        form {
            padding: 1.5rem;
            margin: 1rem auto;
        }
        
        .resultado {
            margin: 1rem auto;
        }
    }
</style>
</head>
<body>
    <form action="" method="post">
        <label for="tabuada">Diga a tabuada</label>
        <input type="number" name="tabuada" id="tabuada">
        <button type="submit">Enviar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST["tabuada"];

        function gerarResultado($titulo, $conteudo) {
            return "<div class='resultado'>
                        <h3>$titulo</h3>
                        $conteudo
                    </div>";
        }


        $conteudoWhile = '';
        $n = 1;
        while($n <= 10) {
            $conteudoWhile .= "<p>$numero x $n = " . ($numero * $n) . "</p>";
            $n++;
        }
        echo gerarResultado('Usando While Loop', $conteudoWhile);


        $conteudoFor = '';
        for($n = 1; $n <= 10; $n++) {
            $conteudoFor .= "<p>$numero x $n = " . ($numero * $n) . "</p>";
        }
        echo gerarResultado('Usando For Loop', $conteudoFor);



        $conteudoDoWhile = '';
        $n = 1;
        do {
            $conteudoDoWhile .= "<p>$numero x $n = " . ($numero * $n) . "</p>";
            $n++;
        } while($n <= 10);
        echo gerarResultado('Usando Do-While Loop', $conteudoDoWhile);
    }
    ?>
</body>
</html>