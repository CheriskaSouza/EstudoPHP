<?php 

class Usuario{

	private $id;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function setIdusuario($value)
	{
		$this->id = $value;
	}

	public function getIdusario()
	{		
		return $this->id;
	}

	public function getDeslogin()
	{
		return $this->deslogin;
	}

	public function setDeslogin($value)
	{
		$this->deslogin = $value;
	}

	public function getDessenha()
	{
		return $this->dessenha;
	}

	public function setDessenha($value)
	{
		$this->dessenha = $value;
	}

	public function getDtcadastro()
	{
		return $this->dtcadastro;
	}

	public function setDtcadastro($value)
	{
		$this->dtcadastro = $value;
	}

	public function loadById($idd){
		$sql = new Sql();

		$result = $sql->select("SELECT * FROM  tb_usuarios WHERE id = :ID", array(":ID"=>$idd));

		if (isset($result[0])) {

			$row = $result[0];
			$this->setIdusuario($row['id']);
			$this->setDessenha($row['dessenha']);
			$this->setDeslogin($row['deslogin']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		}
	}

	public function __toString()
	{
		return json_encode(array(
			"id" =>$this->getIdusario(),
			"deslogin" =>$this->getDeslogin(),
			"dessenha" =>$this->getDessenha(),
			"dtcadastro" =>$this->getDtcadastro()->format("d/h/Y H:i:s")


		));
	}

}

 ?>