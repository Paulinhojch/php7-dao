<?php
/*
*index principal
*/
require_once("config.php");


$usuario = new Usuario();
$usuario->login("sa","101125");

echo $usuario;


?>