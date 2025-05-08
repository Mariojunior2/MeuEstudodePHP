<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <title>Exemplo</title>
    <meta charset="UTF-8">
    <style>
        .div {
            display: flex;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        .form {
            padding: 100px;
        }
    </style>
</head>

<body class="div">
    <h1>Calculadora</h1>
    <form action="" method="post" class="form">
        Primeiro Numero: <input name="num1" type="text" required><br>
        Segundo numero: <input name="num2" type="text" required><br>
        <select name="operacao">
            <option name="operacao" value="+">+</option>
            <option name="operacao" value="-">-</option>
            <option name="operacao" value="*">*</option>
            <option name="operacao" value="/">/</option>
        </select>
        <input type="submit">
    </form>
    <?php

    require_once "Exercio20_B.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!isset($_POST['num1']) || !isset($_POST['num2'])) {
            exit;
        }

        $a = $_POST['num1'];
        $b = $_POST['num2'];
        $op = $_POST['operacao'];


        if ($op == "+") {
            $c = soma($a, $b);
            echo "Resultado: $a + $b = $c";
        } elseif ($op == "-") {
            $c = subtrair($a, $b);
            echo "Resultado: $a - $b = $c";
        } elseif ($op == "*") {
            $c = mutiplicar($a, $b);
            echo "Resultado: $a * $b = $c";
        } elseif ($op == "/") {
            if ($b != 0) {
                $c = dividir($a, $b);
                if ($c == 0) {
                    echo "Resultado: $a / $b = 0";
                } else {
                    echo "Resultado: $a / $b = $c";
                }
            } else {
                echo "Divisão por zero não é permitida.";
            }
        } else {
            echo "Operação inválida.";
        }
    }

    ?>
</body>

</html>