<!DOCTYPE HTML>
<html lang="pt-br">
<head>
   <title>Calculadora</title>
   <meta charset="UTF-8">
   <script>
       function appendToResult(value) {
           document.getElementById('resultado').value += value;
       }
       function setOperation(op) {
           document.getElementById('operacao').value = op;
           document.getElementById('num1').value = document.getElementById('resultado').value;
              document.getElementById('resultado').value = '';
       }
       function calcular() {
           document.getElementById('calcForm').submit();
       }
   </script>
</head>
<body>
   <form action="" method="post" id="calcForm">
      <input type="hidden" name="num1" id="num1">
      <input type="hidden" name="operacao" id="operacao">
      
      <input type="text" name="resultado" id="resultado" readonly><br>
      
      <input type="button" value="1" onclick="appendToResult('1')">
      <input type="button" value="2" onclick="appendToResult('2')">
      <input type="button" value="3" onclick="appendToResult('3')"><br>
      
      <input type="button" value="4" onclick="appendToResult('4')">
      <input type="button" value="5" onclick="appendToResult('5')">
      <input type="button" value="6" onclick="appendToResult('6')"><br>
      
      <input type="button" value="7" onclick="appendToResult('7')">
      <input type="button" value="8" onclick="appendToResult('8')">
      <input type="button" value="9" onclick="appendToResult('9')"><br>
      
      <input type="button" value="0" onclick="appendToResult('0')"><br>
      
      <input type="button" value="+" onclick="setOperation('+')">
      <input type="button" value="-" onclick="setOperation('-')">
      <input type="button" value="*" onclick="setOperation('*')">
      <input type="button" value="/" onclick="setOperation('/')">
      <input type="button" value="=" onclick="calcular()">
   </form> 

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num1 = isset($_POST['num1']) ? floatval($_POST['num1']) : null;
    $num2 = isset($_POST['resultado']) ? floatval($_POST['resultado']) : null;
    $op = isset($_POST['operacao']) ? $_POST['operacao'] : null;

    if ($num1 !== null && $num2 !== null && $op) {
        switch ($op) {
            case '+':
                $resultado = $num1 + $num2;
                break;
            case '-':
                $resultado = $num1 - $num2;
                break;
            case '*':
                $resultado = $num1 * $num2;
                break;
            case '/':
                $resultado = $num2 != 0 ? $num1 / $num2 : 'Erro: Divisão por zero';
                break;
            default:
                $resultado = 'Operação inválida';
        }
        echo "<script>document.getElementById('resultado').value = '" . $resultado . "';</script>";
    }
}
?>
</body>
</html>