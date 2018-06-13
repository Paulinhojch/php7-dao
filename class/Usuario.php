<?php


class Usuario {


private $id;
private $usuario;
private $senha;
private $dtCadastro;


public function getId(){

	return $this->id;
}

public function setId($value){

	$this->id = $value;
}



public function getUsuario(){

	return $this->usuario;
}

public function setUsuario($value){

	$this->usuario = $value;
}

public function getSenha(){

	return $this->senha;
}

public function setSenha($value){

	$this->senha = $value;
}

public function getCadastro(){

	return $this->dtCadastro;
}

public function setDtCadastro($value){

	$this->dtCadastro = $value;
}


public function loadById($id){

	$sql = new Sql();

	$result = $sql->select("SELECT * FROM tb_usuarios WHERE id = :ID", array(
		":ID"=>$id

	));

	if (count($result) > 0){

		$this->setData($result[0]);
	}
}


public static function getList(){
	$sql = new Sql();

	return $sql->select("SELECT * FROM tb_usuarios");
}

public static function search($login){

	$sql = new Sql();

	return $sql->select("SELECT * FROM tb_usuarios WHERE usuario LIKE :SEARCH", array(
		":SEARCH"=>"%".$login."%"));

}

public function login($login, $pass){

		$sql = new Sql();

	$result = $sql->select("SELECT * FROM tb_usuarios WHERE usuario = '$login' AND senha = '$pass'");
	if (count($result) > 0){

		$this->setData($result[0]);
	}
	else{
		throw new Exception("Invalido");
		
	}

}




public function setData($data){

	$this->setId($data['id']);
	$this->setUsuario($data['usuario']);
	$this->setSenha($data['senha']);
	$this->setDtCadastro($data['data_cadastro']);

}


public function update($login, $password){

	$this->setUsuario($login);
	$this->setSenha($password);

	$sql = new Sql();

	$sql->query("UPDATE tb_usuarios SET usuario = :LOGIN, senha = :PASSWORD WHERE id = :ID", array(
	":LOGIN"=>$this->getUsuario(),
	":PASSWORD"=>$this->getSenha(),
	":ID"=>$this->getId()
	));
}


public function delete(){

	$sql = new Sql();

	$sql->query("DELETE FROM tb_usuarios WHERE id = :ID", array(
	":ID"=>$this->getId()
	));

}


public function insert(){

	$sql = new Sql();

	$result = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)",array(
		":LOGIN"=>$this->getUsuario(),
		":PASSWORD"=>$this->getSenha()
	));
	if (count($result) > 0){
		$this->setData($result[0]);
	}
}


public function __toString(){

	return json_encode(array(
		"id"=>$this->getId(),
		"usuario"=>$this->getUsuario(),
		"senha"=>$this->getSenha(),
		"data_cadastro"=>$this->getCadastro()
	));
}




}


?>