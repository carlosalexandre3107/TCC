<?php
require_once("../DAO/Repositorio.class.php");
abstract class Base extends Repositorio{
	
	public $tabela			= "";
	public $campos_valores	= array();
	public $campopk			= NULL;
	public $valorpk			= NULL;
	
	public function setValue($campo=NULL, $valor=NULL)
	{
		if($campo != NULL && $valor != NULL)
		{
			$this->campos_valores[$campo] = $valor;
		}
	}
	
}

?>