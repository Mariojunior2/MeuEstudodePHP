<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PARES - 03</title>
</head>
<body>
    <form action="" method="post">
        <label for="np">Informe o valor inicial dos pares!</label>
        <label for="ns">Informe o valor final dos pares!</label>
        <input type="number" name="np" id="np" required>
        <input type="number" name="ns" id="ns" required>
        <input type="submit" value="Exibir valores pares eba!!">
    </form>

    <?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $n1 = $_POST['np'];
        $n2 = $_POST['ns'];

        if (is_numeric($n1) && is_numeric($n2) && $n1 > 0 && $n2 > 0) {
            echo "entre $n1 até $n2 vamos ver quantos pares temos!";
            if ($n1 % 2 == 0) {
                $n1;
            } else {
                $n1 = $n1 + 1;
            }


            echo "usando o FOR!";
            for($i = $n1; $i <= $n2; $i += 2 ) {
                echo "<li>$i</li>";
            } 

            echo "Usando o WHILE!";
            $i = $n1;
            while($i <= $n2) {
                echo "<li>$i</li>";
                $i += 2;
            }

            echo "Usando o DO-WHILE";
            $i = $n1;
            do {
                echo "<li>$i</li>";
                $i += 2;
            } while($i <= $n2);
        }  else {
            echo "Coloque um valor inteiro positivo!";
        }
    } 
    ?>
</body>
</html>