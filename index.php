<?php
/*
*index principal
*/
require_once("config.php");


/*$usuario = new Usuario();
$usuario->login("sa","101125");

echo $usuario;
*/


/*$aluno = new Usuario();

$aluno->setUsuario("Thiago");
$aluno->setSenha("kenga");


$aluno->insert();

echo $aluno;*/



/*$usuario = new Usuario();

$usuario->loadById(3);

$usuario->update("professor","000000")*/


$usuario = new Usuario();

$usuario->setId(1);

$usuario->delete();


?>