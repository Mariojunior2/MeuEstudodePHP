<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verficar Idade</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
            background-color: #f0f0f0;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #6c5ce7;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            width: 100%;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #5b4bc4;
        }

        .resultado {
            margin-top: 30px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .resultado p {
            font-size: 18px;
            line-height: 1.6;
            color: #333;
        }

        .mensagem-especial {
            text-align: center;
            padding: 20px;
            margin-top: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <h1>Verificar se você é maior ou menor de idade</h1>

    <form action="" method="POST">
        <label for="name">Nome:</label>
        <input type="text" name="nome" id="name" required>

        <label for="data_nascimento">Data de nascimento:</label>
        <input type="date" name="data_nascimento" id="data_nascimento" required>

        <button type="submit">Enviar</button>
    </form>

    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = trim($_POST['nome']);
        $data_nascimento = $_POST['data_nascimento'];

        $data_nasc_dt = new DateTime($data_nascimento);
        $hoje = new DateTime();
        $idade = $hoje->diff($data_nasc_dt)->y;

        echo '<div class="resultado">';
        if ($idade >= 18) {
            echo "<p>Olá, <strong>$nome</strong>. Você tem <strong>$idade anos</strong> e é maior de idade.</p>";
        } else {
            echo "<p>Olá, <strong>$nome</strong>. Você tem <strong>$idade anos</strong> e é menor de idade.</p>";
        }

        if (strcasecmp($nome, "Cláudia Werlich") == 0) {
            echo  "<div class='mensagem-especial'>
                    <h2 style='color: purple;'>🌟 Olá, Cláudia Werlich! 🌟</h2>
                    <p style='font-size: 18px;'>Você é uma pessoa incrível! 💜<br>
                    Que seu dia seja repleto de luz, felicidade e sucesso! ✨</p>
                   </div>";
        } elseif (strcasecmp($nome, "Macaco da Silva") == 0) {
            echo  "<div class='mensagem-especial'>
                    <h2 style='color: purple;'>🌟 Olá, $nome! 🌟</h2>
                    <p style='font-size: 18px;'>Você é uma pessoa incrível! 💜<br>
                    Que seu dia seja repleto de luz, felicidade e sucesso! ✨</p>
                   </div>";
        } else {
            echo "<p class='alerta'>Nome não atendido</p>";
        }
        echo '</div>';
    }
    ?>
</body>
</html>