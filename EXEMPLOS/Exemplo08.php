<?php 
function contagemRegressiva($n) {
    if ($n <= 0) {
        echo " Feliz ano novo";
    } else {
        echo $n . " ... ";
        contagemRegressiva($n - 1);
    }
}

contagemRegressiva(10)

?>