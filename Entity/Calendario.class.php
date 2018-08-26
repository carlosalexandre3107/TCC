<?php
require_once("../DAO/Base.class.php");

class Calendario extends Base{
	
	public function __construct($campo=array())
	{
		parent :: __construct();
		$this->tabela = "Calendario";
		if(sizeof($campo)<=0)
		{
			$this->campos_valores=array("ano"=>NULL, "mes"=>NULL, "dia"=>NULL, "diaSemana"=>NULL, "Ocorrencia_id"=>NULL);
		}
		else
		{
			$this->campos_valores = $campo;
		}
		$this->campopk = "id";
	}
	
	// ATRIBUTOS DA TABELA USUARIO
	public $ano;
	public $mes;
	public $dia;
	public $diaSemana;
	public $Ocorrencia_id;
	
	public function ListarCalendario(){

		$sql = "SELECT * FROM calendario INNER JOIN ocorrencia on calendario.Ocorrencia_id = ocorrencia.id";

		//echo $sql;
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$obj = new Calendario();
				
				$obj->id = $row['id'];
				$obj->ano = $row['ano'];
				$obj->mes = $row['mes'];
				$obj->dia = $row['dia'];
				$obj->diaSemana = $row['diaSemana'];
				$obj->Ocorrencia_id = $row['Ocorrencia_id'];
				$obj->descricao = $row['descricao'];
				
				$retorno[] = $obj;
			}
		}
		return $retorno;
	}
	
	public function ListarOcorrenciaView($mes, $ano, $dia){

		$sql = "SELECT sigla, descricao
					FROM calendario 
						INNER JOIN ocorrencia 
							ON calendario.Ocorrencia_id = ocorrencia.id
					WHERE mes = '".$mes."' AND ano = '".$ano."' AND dia = '".$dia."'";

		//echo $sql;
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$obj = new Calendario();
				
				$obj->sigla = $row['sigla'];
				$obj->descricao = $row['descricao'];
				
				$retorno[] = $obj;
			}
		}
		return $retorno;
	}
	
	public function ListarOcorrencia(){

		$sql = "SELECT * FROM ocorrencia WHERE tipoOcorrencia <> 1 AND desativado = 0";

		//echo $sql;
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$obj = new Calendario();
				
				$obj->id = $row['id'];
				$obj->sigla = $row['sigla'];
				$obj->descricao = $row['descricao'];
				$obj->tipoOcorrencia = $row['tipoOcorrencia'];
				
				$retorno[] = $obj;
			}
		}
		return $retorno;
	}
	
	public function ListarOcorrenciaCalendario($mes, $ano, $dia){

		$sql = "SELECT Ocorrencia_id, id FROM calendario WHERE mes = ".$mes." AND ano = '".$ano."' AND dia = '".$dia."'";

		//echo $sql;
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{	
				$obj = new Calendario();
				
				$obj->idOcorrendia = $row['Ocorrencia_id'];
				$obj->id = $row['id'];
				
				$retorno[] = $obj;
			}
		}
		return $retorno;
	}
	
}//FIM DA CLASS SETOR
?>