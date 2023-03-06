<?php

namespace App\Models;

use MF\Model\Model;

class utilizador extends Model {

	private $id;
	private $nome;
	private $email;
	private $senha;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
	}

	//guardar (dei o nome salvar)
	public function salvar() {

		$query = "insert into utilizador(nome, senha, email)values(:nome, :senha, :email)";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':nome', $this->__get('nome'));
		$stmt->bindValue(':senha', $this->__get('senha'));
		$stmt->bindValue(':email', $this->__get('email')); //md5() -> hash 32 caracteres
		$stmt->execute();

		return $this;
	}

	//validar se uma inscrição pode ser feita
	public function validarinscricao() {
		$valido = true;

		if(strlen($this->__get('nome')) < 3) {
			$valido = false;
		}

		if(strlen($this->__get('email')) < 3) {
			$valido = false;
		}

		if(strlen($this->__get('senha')) < 3) {
			$valido = false;
		}


		return $valido;
	}

	//recuperar um utilizador por e-mail
	public function getUtilizadorPorEmail() {
		$query = "select nome, email from utilizador where email = :email";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':email', $this->__get('email'));
		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function validar() {

		$query = "select id, nome, email from utilizador where email = :email and senha = :senha";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':email', $this->__get('email'));
		$stmt->bindValue(':senha', $this->__get('senha'));
		$stmt->execute();

		$utilizador = $stmt->fetch(\PDO::FETCH_ASSOC);

		if($utilizador['id'] != '' && $utilizador['nome'] != '') {
			$this->__set('id', $utilizador['id']);
			$this->__set('nome', $utilizador['nome']);
		}

		return $this;
	}
}

?>