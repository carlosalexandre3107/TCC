<?php
require_once("../DAO/Base.class.php");

class TipoJornada extends Base{
	
	public function __construct($campo=array())
	{
		parent :: __construct();
		$this->tabela = "TipoJornada";
		if(sizeof($campo)<=0)
		{
			$this->campos_valores=array("codigo"=>NULL, "desativado"=>NULL, "descricao"=>NULL, "totalHorasMes"=>NULL);
		}
		else
		{
			$this->campos_valores = $campo;
		}
		$this->campopk = "id";
	}
	
	// ATRIBUTOS DA TABELA SETOR
	public $codigo;
	public $desativado;
	public $descricao;
	
	public function ListaTipoJornadaFiltro($tipoJornadaId, $desativado)
	{
		
		$sql = "SELECT * FROM ".$this->tabela;
		
		if ($tipoJornadaId != '0' && $desativado != '2')
		{
			$sql .= " WHERE id = '".$tipoJornadaId."' AND desativado = '".$desativado."'";
		}
		if ($tipoJornadaId != '0' && $desativado == '2')
		{
			$sql .=" WHERE id = '".$tipoJornadaId."'";
		}
		if ($desativado != '2' && $tipoJornadaId == '0')
		{	
			$sql .=" WHERE desativado = '".$desativado."'";
		}
		
		//echo $sql;
		
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$tipoJornada = new TipoJornada();
				
				$tipoJornada->id = $row['id'];
				$tipoJornada->codigo = $row['codigo'];
				$tipoJornada->desativado = $row['desativado'];
				$tipoJornada->descricao = $row['descricao'];
				$tipoJornada->totalHorasMes = $row['totalHorasMes'];

				$retorno[] = $tipoJornada;
			}
		}
		return $retorno;
	}
	
	public function ListaTiposJornada()
	{
		
		$sql = "SELECT * FROM ".$this->tabela." WHERE desativado=0";
		
		//echo $sql;
		
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$tipoJornada = new TipoJornada();
				
				$tipoJornada->id = $row['id'];
				$tipoJornada->codigo = $row['codigo'];
				$tipoJornada->desativado = $row['desativado'];
				$tipoJornada->descricao = $row['descricao'];
				$tipoJornada->totalHorasMes = $row['totalHorasMes'];

				$retorno[] = $tipoJornada;
			}
		}
		return $retorno;
	}
	
	public function ConsultarTipoJornadaCodigo($tipoJornadaCodigo)
	{
		
		$sql = "SELECT * FROM ".$this->tabela." WHERE codigo = ".$tipoJornadaCodigo;
		
		//echo $sql;
		
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$tipoJornada = new TipoJornada();
				
				$tipoJornada->id = $row['id'];
				$tipoJornada->codigo = $row['codigo'];
				$tipoJornada->desativado = $row['desativado'];
				$tipoJornada->descricao = $row['descricao'];
				$tipoJornada->totalHorasMes = $row['totalHorasMes'];

				$retorno[] = $tipoJornada;
			}
		}
		return $retorno;
	}
	
	public function AlterarTipoJornada($idTipoJornada)
	{
		
		$sql = "SELECT * FROM ".$this->tabela." WHERE id = ".$idTipoJornada;
		
		//echo $sql;
		
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$tipoJornada = new TipoJornada();
				
				$tipoJornada->id = $row['id'];
				$tipoJornada->codigo = $row['codigo'];
				$tipoJornada->desativado = $row['desativado'];
				$tipoJornada->descricao = $row['descricao'];
				$tipoJornada->totalHorasMes = $row['totalHorasMes'];

				$retorno[] = $tipoJornada;
			}
		}
		return $retorno;
	}
	
}//FIM DA CLASS SETOR
?>