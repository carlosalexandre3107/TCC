<?php
require_once("../DAO/Base.class.php");

class Ocorrencia extends Base{
	
	public function __construct($campo=array())
	{
		parent :: __construct();
		$this->tabela = "Ocorrencia";
		if(sizeof($campo)<=0)
		{
			$this->campos_valores=array("desativado"=>NULL, "sigla"=>NULL, "descricao"=>NULL, "tipoOcorrencia"=>NULL, "texto"=>NULL, "anexo"=>NULL);
		}
		else
		{
			$this->campos_valores = $campo;
		}
		$this->campopk = "id";
	}
	
	// ATRIBUTOS DA TABELA USUARIO
	public $desativado;
	public $sigla;
	public $descricao;
	public $tipoOcorrencia;
	public $texto;
	public $anexo;
	
	public function ListaOcorrencia($ocorrenciaId , $desativado)
	{
		

		$sql = "SELECT * FROM ".$this->tabela;

		if ($ocorrenciaId != '0' && $desativado != '2')
		{
			$sql .= " WHERE id = '".$ocorrenciaId."' AND desativado = '".$desativado."'";
		}
		if ($ocorrenciaId != '0' && $desativado == '2')
		{
			$sql .=" WHERE id = '".$ocorrenciaId."'";
		}
		if ($desativado != '2' && $ocorrenciaId == '0')
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
				$obj = new Ocorrencia();
				
				$obj->id = $row['id'];
				$obj->desativado = $row['desativado'];
				$obj->sigla = $row['sigla'];
				$obj->descricao = $row['descricao'];
				$obj->tipoOcorrencia = $row['tipoOcorrencia'];
				$obj->texto = $row['texto'];
				$obj->anexo = $row['anexo'];
				
				$retorno[] = $obj;
			}
		}
		
		return $retorno;
	}
	
	public function ListarSiglaOcorrencia()
	{
		
		$sql = "SELECT * FROM ".$this->tabela;
		
		$result = $this->ExecutaSQL($sql);
		$retorno = NULL;
		
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$obj2 = new Ocorrencia();
				
				$obj2->id = $row['id'];
				$obj2->sigla = $row['sigla'];
				$obj2->descricao = $row['descricao'];
				$obj2->texto = $row['texto'];
				$obj2->anexo = $row['anexo'];
				
				$retorno[] = $obj2;
			}
		}
		return $retorno;
	}
	
	public function EditarOcorrencia($ocorrenciaId)
	{
		
		$sql = "SELECT * FROM ".$this->tabela." WHERE id = '".$ocorrenciaId."'";
		
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$ocorrencia = new Ocorrencia();
				
				$ocorrencia->id = $row['id'];
				$ocorrencia->sigla = $row['sigla'];
				$ocorrencia->descricao = $row['descricao'];
				$ocorrencia->texto = $row['texto'];
				$ocorrencia->anexo = $row['anexo'];
				$ocorrencia->desativado = $row['desativado'];
				$ocorrencia->tipoOcorrencia = $row['tipoOcorrencia'];
				
				$retorno[] = $ocorrencia;
			}
		}
		return $retorno;
	}
		
}//FIM DA CLASS SETOR
?>