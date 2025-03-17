<!DOCTYPE html>
<html>
<head>
    <title>Padrão de Asteriscos</title>
    <style>
        .pyramid-container {
            display: flex;
            gap: 40px;
            margin-top: 20px;
        }
        .pyramid {
            display: inline-block;
        }
    </style>
</head>
<body>
    <form method="post">
        <label for="number">Digite um número inteiro positivo:</label>
        <input type="number" name="number" id="number" required>
        <button type="submit">Gerar Padrão</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $number = $_POST['number'];
        if (is_numeric($number) && $number == (int)$number && $number > 0) {
            $number = (int)$number; ?>
            
            <div class="pyramid-container">
                

                <div class="pyramid">
                    <h3>Usando FOR:</h3>
                    <?php
                    for ($i = 1; $i <= $number; $i++) {
                        for ($j = 0; $j < $i; $j++) {
                            echo '*';
                        }
                        echo "<br>";
                    } ?>
                </div>


                <div class="pyramid">
                    <h3>Usando WHILE:</h3>
                    <?php
                    $i = 1;
                    while ($i <= $number) {
                        $j = 0;
                        while ($j < $i) {
                            echo '*';
                            $j++;
                        }
                        echo "<br>";
                        $i++;
                    } ?>
                </div>


                <div class="pyramid">
                    <h3>Usando DO-WHILE:</h3>
                    <?php
                    $i = 1;
                    do {
                        $j = 0;
                        do {
                            echo '*';
                            $j++;
                        } while ($j < $i);
                        echo "<br>";
                        $i++;
                    } while ($i <= $number); ?>
                </div>

            </div>

        <?php } else {
            echo "<p>Por favor, insira um número inteiro positivo válido.</p>";
        }
    }
    ?>
</body>
</html>