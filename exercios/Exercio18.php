<!DOCTYPE HTML>
<html lang = "pt-br">
<head>
   <title>Exemplo</title>
   <meta charset = "UTF-8">
</head>
<body>
   <form action="" method="post" >
      Primeiro Numero: <input name="num1" type="text"><br>
      Segundo numero: <input name="num2" type="text"><br>
      <input type="submit" name="operacao" value="+">     
      <input type="submit" name="operacao" value="-">     
      <input type="submit" name="operacao" value="*">     
      <input type="submit" name="operacao" value="/">     
   </form> 
<?php
    if (!isset($_POST['num1']) || !isset($_POST['num2'])) {
        exit;
    }
   
   $a = $_POST['num1'];
   $b = $_POST['num2'];
   $op= $_POST['operacao'];

    function soma($n1, $n2) {
        return $n1 + $n2;
    }

    function subtrair($n1, $n2) {
        return $n1 - $n2;
    }
    
    function mutiplicar($n1, $n2) {
        return $n1 * $n2;
    }

    function dividir($n1, $n2) {
        return $n1 / $n2;
    }


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

?>       
</body>
</html>