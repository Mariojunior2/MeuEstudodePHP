<?php 
function validar_nome($nome) {
    return preg_match("/^[a-zA-ZÀ-ÿ\s]+$/", $nome);
}

function validar_sobrenome($sobrenome) {
    return preg_match("/^[a-zA-ZÀ-ÿ\s]+$/", $sobrenome);
}

function validar_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validar_data_nascimento($data) {
    $hoje = date("Y-m-d");
    return ($data < $hoje && preg_match("/^\d{4}-\d{2}-\d{2}$/", $data));
}


?>