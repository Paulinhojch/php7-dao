<?php

require_once("config.php");

$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios WHERE id = '1'");

echo json_encode($usuarios);

?>