<!DOCTYPE html>
<html>
<head>
    <title>Validação de Senha</title>
    <style>
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
    <h2>Validação de Senha</h2>
    <form method="post">
        Digite sua senha: 
        <input type="password" name="senha" required>
        <input type="submit" value="Validar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $senha = $_POST['senha'];
        $erros = [];

        $tamanho = 0;
        do {
            if (isset($senha[$tamanho])) $tamanho++;
            else break;
        } while (true);
        
        if ($tamanho < 8) {
            $erros[] = "A senha deve ter no mínimo 8 caracteres.";
        }


        $temLetra = false;
        for ($i = 0; $i < $tamanho; $i++) {
            if (ctype_alpha($senha[$i])) {
                $temLetra = true;
                break;
            }
        }
        if (!$temLetra) {
            $erros[] = "A senha deve conter pelo menos uma letra.";
        }

        $temNumero = false;
        $j = 0;
        while ($j < $tamanho) {
            if (ctype_digit($senha[$j])) {
                $temNumero = true;
                break;
            }
            $j++;
        }
        if (!$temNumero) {
            $erros[] = "A senha deve conter pelo menos um número.";
        }


        if (empty($erros)) {
            echo "<p class='success'>Senha válida! ✅</p>";
        } else {
            foreach ($erros as $erro) {
                echo "<p class='error'>$erro</p>";
            }
        }
    }
    ?>
</body>
</html>