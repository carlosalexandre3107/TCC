<?php
require_once("../DAO/Base.class.php");

class Jornada extends Base{
	
	public function __construct($campo=array())
	{
		parent :: __construct();
		$this->tabela = "Jornada";
		if(sizeof($campo)<=0)
		{
			$this->campos_valores=array("id"=>NULL, "ent1"=>NULL,"ent2"=>NULL, "ent3"=>NULL, "sai1"=>NULL,"sai2"=>NULL,
			"sai3"=>NULL, "diaSemana"=>NULL,  "Ocorrencia_id"=>NULL, "TipoJornada_id"=>NULL);
		}
		else
		{
			$this->campos_valores = $campo;
		}
		$this->campopk = "id";
	}
	
	// ATRIBUTOS DA TABELA JORNADA
	public $id;
	public $ent1;
	public $ent2;
	public $ent3;
	public $sai1;
	public $sai2;
	public $sai3;
	public $diaSemana;
	public $Ocorrencia_id;
	public $TipoCartao_id;
	
	public function ListarJornadaPorIdTipoJornada($idTipoJornada)
	{

		$sql = "SELECT * FROM ".$this->tabela;
		
		if ($idTipoJornada != NULL){
			$sql .= " WHERE TipoJornada_id = '".$idTipoJornada."'";
		}

		//echo $sql;
		
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$jornada = new Jornada();
				
				$jornada->id = $row['id'];
				$jornada->ent1 = $row['ent1'];
				$jornada->ent2 = $row['ent2'];
				$jornada->ent3 = $row['ent3'];
				$jornada->sai1 = $row['sai1'];
				$jornada->sai2 = $row['sai2'];
				$jornada->sai3 = $row['sai3'];
				$jornada->diaSemana = $row['diaSemana'];
				$jornada->Ocorrencia_id = $row['Ocorrencia_id'];
				$jornada->TipoJornada_id = $row['TipoJornada_id'];
				
				$retorno[] = $jornada;
			}
		}
		return $retorno;
	}
	
}//FIM DA CLASS SETOR
?>