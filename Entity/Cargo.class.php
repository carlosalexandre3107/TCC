<?php
require_once("../DAO/Base.class.php");

class Cargo extends Base{
	
	public function __construct($campo=array())
	{
		parent :: __construct();
		$this->tabela = "Cargo";
		if(sizeof($campo)<=0)
		{
			$this->campos_valores=array("nomCompleto"=>NULL, "nomAbrev"=>NULL, "codigo"=>NULL, "cancelado"=>NULL, "cbo"=>NULL);
		}
		else
		{
			$this->campos_valores = $campo;
		}
		$this->campopk = "id";
	}
	
	public $nomCompleto;
	public $nomAbrev;
	public $quant;
	public $codigo;
	public $cancelado;
	public $cbo;
	public $pis;
	public $ctps;
	
	public function ListarCargo($value){
	
		$sql = "SELECT count(co.Cargo_id) AS quant, ca.id, ca.nomCompleto, ca.codigo, ca.cbo, ca.cancelado, ca.nomAbrev
				FROM (colaborador AS co JOIN cargo AS ca ON ((co.Cargo_id = ca.id)))";
			if ($value != NULL){
				$sql .= " WHERE ca.id = '".$value."'";
			}			
				$sql .= " GROUP BY co.Cargo_id";

		$result = $this->ExecutaSQL($sql);
		
		echo ($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$obj = new Cargo();
				
				$obj->id = $row['id'];
				$obj->nomCompleto = $row['nomCompleto'];
				$obj->nomAbrev = $row['nomAbrev'];			
				$obj->quant = $row['quant'];
				$obj->codigo = $row['codigo'];
				$obj->cancelado = $row['cancelado'];
				$obj->cbo = $row['cbo'];
				
				$retorno[] = $obj;
			}
		}	
		return $retorno;
	}//FIM DO MÉTODO ListarCargo
	
	public function ListarCargos()
	{
		
		$sql = "SELECT * FROM ".$this->tabela." WHERE cancelado = 0";	

		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$cargo = new Cargo();
				
				$cargo->id = $row['id'];
				$cargo->nomCompleto = $row['nomCompleto'];
				$cargo->nomAbrev = $row['nomAbrev'];			
				$cargo->codigo = $row['codigo'];
				$cargo->cancelado = $row['cancelado'];
				$cargo->cbo = $row['cbo'];
				
				$retorno[] = $cargo;
			}
		}	
		return $retorno;
	}
	
	public function ListaCargosFiltro($cargoId, $cancelado)
	{
		
		$sql = "SELECT * FROM ".$this->tabela;

		if ($cargoId != '0' && $cancelado != '2')
		{
			$sql .= " WHERE id = '".$cargoId."' AND desativado = '".$cancelado."'";
		}
		if ($cargoId != '0' && $cancelado == '2')
		{
			$sql .=" WHERE id = '".$cargoId."'";
		}
		if ($cancelado != '2' && $cargoId == '0')
		{	
			$sql .=" WHERE cancelado = '".$cancelado."'";
		}

		//echo $sql;
		
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$cargo = new Cargo();
				
				$cargo->id = $row['id'];
				$cargo->nomCompleto = $row['nomCompleto'];
				$cargo->nomAbrev = $row['nomAbrev'];			
				$cargo->codigo = $row['codigo'];
				$cargo->cancelado = $row['cancelado'];
				$cargo->cbo = $row['cbo'];
				
				$retorno[] = $cargo;
			}
		}	
		return $retorno;
	}
	
	public function CargoEditar($cargoId)
	{
		
		$sql = "SELECT * FROM ".$this->tabela." WHERE id = ".$cargoId;	

		//echo $sql;
		
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$cargo = new Cargo();
				
				$cargo->id = $row['id'];
				$cargo->nomCompleto = $row['nomCompleto'];
				$cargo->nomAbrev = $row['nomAbrev'];			
				$cargo->codigo = $row['codigo'];
				$cargo->cancelado = $row['cancelado'];
				$cargo->cbo = $row['cbo'];
				
				$retorno[] = $cargo;
			}
		}	
		return $retorno;
	}
	
}//FIM DA CLASSE CARGO
?>