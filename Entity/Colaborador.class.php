<?php
require_once("../DAO/Base.class.php");

class Colaborador extends Base{
	
	public function __construct($campo=array())
	{
		parent :: __construct();
		$this->tabela = "Colaborador";
		if(sizeof($campo)<=0)
		{
			$this->campos_valores=array("matr"=>NULL, "nome"=>NULL, "email"=>NULL,
										"Pis"=>NULL ,"Ctps"=>NULL,"MesesAno_id"=>NULL, "tel"=>NULL, "cel"=>NULL, 
										"numCartao"=>NULL, "desligado"=>NULL, "Cargo_id"=>NULL, 
										"Setor_id"=>NULL,  "TipoJornada_id"=>NULL);
		}
		else
		{
			$this->campos_valores = $campo;
		}
		$this->campopk = "id";
	}
	
	// ATRIBUTOS DA TABELA COLABORADOR
	public $id;
	public $matr;
	public $desligado;
	public $email;
	public $tel;
	public $cel;
	public $numCartao;
	public $nome;
	public $pis;
	public $ctps;

	// ATRIBUTOS DA TABELA SETOR
	public $setor_id;

	// ATRIBUTOS DA TABELA TIPO JORNADA
	public $tipoJornada_id;
	
	// ATRIBUTOS DA TABELA CARGO
	public $cargo_id;
	
	// ATRIBUTOS DA TABELA MESESANO
	public $mesesAno_id;
	
	
	public function ListarInner($opcao, $entidade, $campo, $value)
	{
		$sql = "SELECT * FROM ".$this->tabela.", Setor WHERE Setor_id = Setor.id";
		
		if ($opcao != 0){
				$sql .= " AND ".$entidade.".".$campo." = ".$value."";
		}
		
		$result = $this->ExecutaSQL($sql);
		
		//echo $sql;
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$colaborador = new Colaborador();
				
				//COLABORADOR
				$colaborador->id = $row['id'];
				$colaborador->matr = $row['matr'];
				$colaborador->desligado = $row['desligado'];
				$colaborador->email = $row['email'];
				$colaborador->tel = $row['tel'];
				$colaborador->cel = $row['cel'];
				$colaborador->numCartao = $row['numCartao'];
				$colaborador->nome = $row['nome'];
				
				//SETOR
				$colaborador->Setor_id = $row['Setor_id'];
				$colaborador->descricao = $row['descricao'];
				
				//CARGO
				$colaborador->Cargo_id = $row['Cargo_id'];
				
				//TIPO DE JORNADA
				$colaborador->TipoJornada_id = $row['TipoJornada_id'];
				
				//MES
				$colaborador->MesesAno_id = $row['MesesAno_id'];
				
				$retorno[] = $colaborador;
			}
		}
		return $retorno;
	}
	
	public function ListarColaboradores($opcao, $entidade, $campo ,$value)
	{	
		//echo ("opcao: ".$opcao." entidade: ".$entidade." campo: ".$campo." value:".$value."<br>");
		
		$sql = "SELECT  colaborador.id, colaborador.matr, colaborador.desligado, colaborador.numCartao, colaborador.nome, 
						colaborador.email, colaborador.MesesAno_id, colaborador.tel, colaborador.cel , colaborador.Cargo_id, 							colaborador.Setor_id, colaborador.TipoJornada_id, setor.descricao, colaborador.pis, colaborador.ctps 
				FROM colaborador 
					INNER JOIN setor 
						ON colaborador.Setor_id = setor.id";
		if ($opcao != 1)
		{
			if($entidade == "Colaborador")
			{
				$sql .= " WHERE ".$entidade.".".$campo." LIKE '%".$value."%'";
			}else
			{
				$sql .= " WHERE ".$entidade.".".$campo." = '".$value."'";
			}		
		}
		
		//echo $sql;
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$colaborador = new Colaborador();
				
				//COLABORADOR
				$colaborador->id = $row['id'];
				$colaborador->matr = $row['matr'];
				$colaborador->desligado = $row['desligado'];
				$colaborador->numCartao = $row['numCartao'];
				$colaborador->nome = $row['nome'];
				$colaborador->email = $row['email'];
				$colaborador->tel = $row['tel'];
				$colaborador->cel = $row['cel'];
				$colaborador->pis = $row['pis'];
				$colaborador->ctps = $row['ctps'];
				
				//CARGO
				$colaborador->cargo_id = $row['Cargo_id'];
				
				//TIPOJORNADA
				$colaborador->tipoJornada_id = $row['TipoJornada_id'];
				
				//SETOR
				$colaborador->setor_id = $row['Setor_id'];
				$colaborador->descricao = $row['descricao'];
				
				//MESESANO
				$colaborador->mesesAno_id = $row['MesesAno_id'];
				
				$retorno[] = $colaborador;
			}
		}
		
		return $retorno;
	}
	
	public function PrevGeracao($opcao, $entidade, $campo, $value, $mes, $ano)
	{
			$sql = "SELECT Colaborador.id, Colaborador.numCartao, Colaborador.nome, Setor.sigla 
			FROM colaborador 
				INNER JOIN Setor 
					ON Setor.id = Colaborador.Setor_id 
			WHERE Colaborador.id 
				NOT IN(SELECT TipoCartao.colaborador_id 
							FROM TipoCartao 
								WHERE TipoCartao.mes = '".$mes."'
									AND TipoCartao.ano = '".$ano."' 
									AND TipoCartao.cancelado = '0')";

		
		if ($opcao != 0)
				$sql .= " AND ".$entidade.".".$campo." = '".$value."'";
		
		//echo $sql;
		
		$result = $this->ExecutaSQL($sql);
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$obj = new Colaborador();
				
				$obj->id = $row['id'];
				$obj->numCartao = $row['numCartao'];
				$obj->nome = $row['nome'];
				$obj->sigla = $row['sigla'];
				
				$retorno[] = $obj;
			}
		}
		
		return $retorno;
	}

	public function TopoCartao($numCartao, $idTipocartao)
	{		
		$sql = "SELECT colaborador.nome, tipocartao.assinado, tipojornada.descricao, colaborador.tipoJornada_id
					FROM 
						colaborador 
							INNER JOIN 
						tipojornada ON colaborador.TipoJornada_id = tipojornada.id
								INNER JOIN
    					tipocartao ON colaborador.id = tipocartao.colaborador_id
					WHERE 
						colaborador.numCartao = '".$numCartao."'
					AND tipocartao.id = '".$idTipocartao."'";
		
		$result = $this->ExecutaSQL($sql);
		//echo $sql;
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$colaborador = new Colaborador();
				
				$colaborador->nome = $row['nome'];
				$colaborador->descricao = $row['descricao'];
				$colaborador->tipoJornada_id = $row['tipoJornada_id'];
				$colaborador->assinado = $row['assinado'];
				
				$retorno[] = $colaborador;
			}
		}
		return $retorno;
	}
	
	public function RelatorioPrevisaoFerias($setorId, $mesId)
	{
		$sql = "SELECT * 
					FROM Colaborador, Setor
					WHERE setor.id = Setor_id";
		if($setorId != 0)
		{
			$sql .= " AND Setor_id = ".$setorId;
		}
		if($mesId != 0)
		{
			$sql .= " AND MesesAno_id = ".$mesId;
		}
			
		//echo $sql;
		
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$colaborador = new Colaborador();
				
				$colaborador->id = $row['id'];
				$colaborador->numeroCartao = $row['numCartao'];
				$colaborador->matricula = $row['matr'];
				$colaborador->nome = $row['nome'];
				$colaborador->descricaoSetor = $row['descricao'];
				$colaborador->responsavel = $row['responsavel'];
				
				$retorno[] = $colaborador;
			}
		}
		return $retorno;
	}
	
	public function AtualizarColaborador($idColaborador)
	{	
		$sql = "SELECT *
				FROM colaborador 
				WHERE colaborador.id = ".$idColaborador;

		//echo $sql;
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$colaborador = new Colaborador();
				
				//COLABORADOR
				$colaborador->id = $row['id'];
				$colaborador->matr = $row['matr'];
				$colaborador->desligado = $row['desligado'];
				$colaborador->numCartao = $row['numCartao'];
				$colaborador->nome = $row['nome'];
				$colaborador->email = $row['email'];
				$colaborador->tel = $row['tel'];
				$colaborador->cel = $row['cel'];
				$colaborador->pis = $row['Pis'];
				$colaborador->ctps = $row['Ctps'];
				
				//CARGO
				$colaborador->cargo_id = $row['Cargo_id'];
				
				//TIPOJORNADA
				$colaborador->tipoJornada_id = $row['TipoJornada_id'];
				
				//SETOR
				$colaborador->setor_id = $row['Setor_id'];

				//MESESANO
				$colaborador->mesesAno_id = $row['MesesAno_id'];
				
				$retorno[] = $colaborador;
			}
		}
		
		return $retorno;
	}
	
	public function BuscarColaboradorPorNumeroCartao($numeroCartao)
	{	
		$sql = "SELECT *
				FROM colaborador 
				WHERE numCartao = ".$numeroCartao;

		//echo $sql;
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$colaborador = new Colaborador();
				
				//COLABORADOR
				$colaborador->id = $row['id'];
				$colaborador->matr = $row['matr'];
				$colaborador->desligado = $row['desligado'];
				$colaborador->numCartao = $row['numCartao'];
				$colaborador->nome = $row['nome'];
				$colaborador->email = $row['email'];
				$colaborador->tel = $row['tel'];
				$colaborador->cel = $row['cel'];
				$colaborador->pis = $row['Pis'];
				$colaborador->ctps = $row['Ctps'];
				
				//CARGO
				$colaborador->cargo_id = $row['Cargo_id'];
				
				//TIPOJORNADA
				$colaborador->tipoJornada_id = $row['TipoJornada_id'];
				
				//SETOR
				$colaborador->setor_id = $row['Setor_id'];

				//MESESANO
				$colaborador->mesesAno_id = $row['MesesAno_id'];
				
				$retorno[] = $colaborador;
			}
		}
		
		return $retorno;
	}
}	
?>