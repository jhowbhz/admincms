<?php
session_start();
$_SESSION = array(); 
header("location: /clientes/bruno/login/");
session_destroy(); 
?>