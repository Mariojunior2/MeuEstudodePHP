<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms Of the php</title>
</head>
<body>
    <h1>Você é de MAIOR!!</h1>
    <form action="" method="post">
        <label for="idade">Informe sua idade: </label>
        <input type="number" name="idade" id="idade" required>
        <button type="submit">Verificar</button>
    </form>

    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idade = $_POST['idade'];

        if ($idade >= 18) {
            echo "<p>Você é de maior!</p>";
        } else {
            echo "<p>Você é de menor!</p>";
        }
    }
    
    ?>
</body>
</html>