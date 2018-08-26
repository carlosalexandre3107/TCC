<?php
require_once("../DAO/Base.class.php");

class Justificativa extends Base{
	
	public function __construct($campo=array())
	{
		parent :: __construct();
		$this->tabela = "Justificativa";
		if(sizeof($campo)<=0)
		{
			$this->campos_valores=array("texto"=>NULL, "anexo"=>NULL, "Cartao_id"=>NULL, "ano"=>NULL, "mes"=>NULL, "dia"=>NULL);
		}
		else
		{
			$this->campos_valores = $campo;
		}
		$this->campopk = "id";
	}
	
	// ATRIBUTOS DA TABELA JUSTIFICATIVA
	public $texto;
	public $anexo;
	public $Cartao_id;
    public $ano;
    public $mes;
    public $dia;
	
	public function ListarJornada(){

		$sql = "SELECT * FROM ".$this->tabela;

		echo $sql;
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$obj = new Justificativa();
				
				$obj->texto = $row['texto'];
				$obj->anexo = $row['anexo'];
				$obj->Cartao_id = $row['Cartao_id'];
				$obj->ano = $row['ano'];
				$obj->mes = $row['mes'];
				$obj->dia = $row['dia'];
				
				$retorno[] = $obj;
			}
		}
		return $retorno;
	}
	
}//FIM DA CLASS SETOR
?>