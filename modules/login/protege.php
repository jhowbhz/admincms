<?php
// Protege a pagina
session_start();
if (!isset($_SESSION['logado'])) {
    // Verifica se existem Cookies para manter conectado
    if (isset($_COOKIE["email"]) && isset($_COOKIE["senha"])) {
        $usuario = new usuario();
        if (!$usuario->validaLogin($_COOKIE))
            header('Location: /client/index.php');
    } else
        header('Location: /login/');
    //
}
//
?>

