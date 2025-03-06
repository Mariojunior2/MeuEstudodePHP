<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        max-width: 800px;
        margin: 20px auto;
        padding: 0 20px;
        background-color: #f0f0f0;
    }

    form {
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        margin-bottom: 30px;
    }

    label {
        display: block;
        margin-bottom: 15px;
        font-weight: bold;
        color: #333;
    }

    input[type="number"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 2px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
    }

    input[type="number"]:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 5px rgba(0,123,255,0.3);
    }

    button {
        background-color: #007bff;
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #0056b3;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }

    .resultado {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .resultado p {
        margin: 10px 0;
        padding: 8px 0;
        border-bottom: 1px solid #eee;
    }

    .resultado p:last-child {
        border-bottom: none;
    }
</style>
</head>
<body>
    <form action="" method="post">
        <label for="tabuada">Diga a tabuada</label>
        <input type="number" name="tabuada" id="tabuada">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>


<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["tabuada"];       
    $limite = 10;  
    $n = 1;                            

    while ($n <= 10) {           
        $resultado = $numero * $n;   
        echo "$numero x $n = $resultado<br>";
        $n++;                         
    }
}


?>