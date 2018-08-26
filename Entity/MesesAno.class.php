<?php
require_once("../DAO/Base.class.php");

class MesesAno extends Base{
	
	public function __construct($campo=array())
	{
		parent :: __construct();
		$this->tabela = "MesesAno";
		if(sizeof($campo)<=0)
		{
			$this->campos_valores=array("numeroMes"=>NULL, "nomeMes"=>NULL);
		}
		else
		{
			$this->campos_valores = $campo;
		}
		$this->campopk = "id";
	}
	
	// ATRIBUTOS DA TABELA SETOR
	public $numeroMes;
	public $nomeMes;
	
	public function ListarMeses()
	{
		
		$sql = "SELECT * FROM ".$this->tabela;
		
		//echo $sql;
		
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$mesesAno = new MesesAno();
				
				$mesesAno->id = $row['id'];
				$mesesAno->numeroMes = $row['numeroMes'];
				$mesesAno->nomeMes = $row['nomeMes'];
				
				$retorno[] = $mesesAno;
			}
		}
		return $retorno;
	}
	
	
	
}//FIM DA CLASS SETOR
?>