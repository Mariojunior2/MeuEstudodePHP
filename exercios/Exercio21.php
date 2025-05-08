<?php 
require_once 'Exercio21_B.php'; 


$erro = [];
$sucesso = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $nome = trim($_POST["nome"]);
    $sobrenome = trim($_POST["sobrenome"]);
    $email = trim($_POST["email"]);
    $data_nascimento = $_POST["data_nascimento"];

    if (!validar_nome($nome)) {
        $erros[] = "Nome inválido.";
    }

    if(!validar_sobrenome($sobrenome)) {
        $erros[] = "Sobrenome inválido.";
    }

    if (!validar_email($email)) {
        $erros[] = "E-mail inválido.";
    }

    if (!validar_data_nascimento($data_nascimento)) {
        $erros[] = "Data de nascimento inválida.";
    }

    if (empty($erros)) {
        $sucesso = true;
    }
    
}


?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cliente</title>
</head>
<body>
    <h1>Cadastro de Cliente</h1>

    <?php if ($sucesso): ?>
        <p style="color:green;">Cadastro realizado com sucesso!</p>
    <?php else: ?>
        <?php if (!empty($erros)): ?>
            <ul style="color:red;">
                <?php foreach ($erros as $erro): ?>
                    <li><?php echo $erro; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    <?php endif; ?>

    <form method="post">
        <label>Nome: <input type="text" name="nome" required></label><br><br>
        <label>Sobrenome: <input type="text" name="sobrenome" required></label><br><br>
        <label>Email: <input type="email" name="email" required></label><br><br>
        <label>Data de Nascimento: <input type="date" name="data_nascimento" required></label><br><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>