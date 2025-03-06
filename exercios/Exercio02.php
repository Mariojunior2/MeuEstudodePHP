<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moeda</title>
    <style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
        margin: 0;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    h1 {
        color: #2c3e50;
        margin: 30px 0;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        font-size: 2.5rem;
        letter-spacing: -0.5px;
    }

    .converter-form {
        background: rgba(255, 255, 255, 0.98);
        padding: 2.5rem;
        border-radius: 18px;
        box-shadow: 0 12px 40px rgba(0,0,0,0.08);
        width: 100%;
        max-width: 500px;
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255,255,255,0.3);
    }

    .converter-form label {
        display: block;
        margin: 18px 0 10px;
        color: #3c4a5f;
        font-weight: 600;
        font-size: 1rem;
        letter-spacing: 0.3px;
    }

    .converter-form input[type="number"] {
        width: 100%;
        padding: 14px;
        margin-bottom: 1.5rem;
        border: 2px solid #e0e7ff;
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: #f8faff;
    }

    .converter-form input[type="number"]:focus {
        border-color: #818cf8;
        box-shadow: 0 0 0 4px rgba(129, 140, 248, 0.15);
        background: white;
    }

    /* Estilização dos radio buttons */
    .converter-form input[type="radio"] {
        appearance: none;
        width: 20px;
        height: 20px;
        border: 2px solid #c7d2fe;
        border-radius: 50%;
        margin: 0 12px 0 0;
        position: relative;
        top: 3px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .converter-form input[type="radio"]:checked {
        border-color: #6366f1;
        background: #6366f1;
        box-shadow: inset 0 0 0 3px white;
    }

    .converter-form input[type="radio"]:hover {
        border-color: #818cf8;
        transform: scale(1.05);
    }

    /* Labels dos radios */
    .converter-form label:has(+ input[type="radio"]),
    .converter-form input[type="radio"] + label {
        display: inline-flex;
        align-items: center;
        padding: 12px 18px;
        margin: 8px 0;
        background: #f8f9ff;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        width: auto;
        font-weight: 500;
        color: #4a5568;
    }

    .converter-form label:has(+ input[type="radio"]):hover,
    .converter-form input[type="radio"]:hover + label {
        background: #edf0ff;
        transform: translateY(-1px);
    }

    .converter-form button {
        width: 100%;
        padding: 16px;
        background: linear-gradient(135deg, #6366f1 0%, #818cf8 100%);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        margin-top: 1.5rem;
        letter-spacing: 0.5px;
    }

    .converter-form button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(99, 102, 241, 0.25);
    }

    /* Resultados */
    body > *:not(h1):not(form) {
        max-width: 500px;
        width: 100%;
        background: rgba(255, 255, 255, 0.95);
        padding: 1.5rem;
        border-radius: 12px;
        margin: 20px 0;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        color: #2d3748;
        line-height: 1.6;
        font-size: 1.05rem;
        border: 1px solid rgba(224, 231, 255, 0.5);
    }

    /* Melhoria no espaçamento vertical */
    .converter-form > * {
        margin-bottom: 1rem;
    }
</style>
</head>
<body>
    <h1>Conversor de moedas!</h1>
    <form action="" method="post" class="converter-form">
        <label for="moeda">Quantos reais você quer converter?</label>
        <input type="number" name="moeda" step="0.01" id="moeda" required>

        <label>Escolha que moeda você quer converte!</label>

        <label> Dólar Americano</label>
            <input type="radio" name="moedatipo" value="dolar" required>  
     

        <label>Euro</label>
            <input type="radio" name="moedatipo" value="euro"> 


        <label>Dólar Canadense</label>
            <input type="radio" name="moedatipo" value="dolar canadense"> 


        <button type="submit">CONVERTER</button>
    </form>
    <?php 
    function tirarAcentos($string){
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $moeda = floatval($_POST["moeda"]);
        $moedatipo = tirarAcentos(strtolower($_POST["moedatipo"]));

        if ($moedatipo == 'dolar') {
            $valor = $moeda / 5.88;
            $valorT = $moeda * 5.88;
            echo "R$". number_format($moeda, 2). " = US$". number_format($valor, 2);
            echo "<br> US$". number_format($moeda, 2). " = R$". number_format($valorT, 2);
        } elseif ($moedatipo == 'euro') {
            $valor = $moeda / 6.11;
            $valorT = $moeda * 6.11;
            echo "R$". number_format($moeda, 2). " = €". number_format($valor, 2);
            echo "<br> €". number_format($moeda, 2). " = R$". number_format($valorT, 2);
        } elseif ($moedatipo == 'dolar canadense') {
            $valor = $moeda / 4.07;
            $valorT = $moeda * 4.07;
            echo "R$". number_format($moeda, 2). " = C$ ". number_format($valor, 2);
            echo "<br>  C$". number_format($moeda, 2). " = R$". number_format($valorT, 2);
        } else {
            echo "Escrava uma moeda válida!";
        }
    }
    
    ?>
</body>
</html>