<?php
require_once("../DAO/Base.class.php");

class TipoCartao extends Base{
	
	public function __construct($campo=array()){
		parent :: __construct();
		$this->tabela = "TipoCartao";
		if(sizeof($campo)<=0)
		{
			$this->campos_valores=array("mes"=>NULL, "lancado"=>NULL, "cancelado"=>NULL, "ano"=>NULL, 
										"colaborador_id"=>NULL, "assinado"=>NULL);
		}
		else
		{
			$this->campos_valores = $campo;
		}
		$this->campopk = "id";
	}
	
	public $id;
	public $mes;
	public $lancado;
	public $cancelado;
	public $ano;
	public $colaborador_id;
	public $assinado;
	
	public function ListarTipoCartao(){
	
		$sql = "SELECT * FROM ".$this->tabela;
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$obj = new TipoCartao();
				
				$obj->id = $row['id'];
				$obj->mes = $row['mes'];
				$obj->lancado = $row['lancado'];
				$obj->cancelado = $row['cancelado'];
				$obj->ano = $row['ano'];
				$obj->colaborador_id = $row['colaborador_id'];
				
				$retorno[] = $obj;
			}
		}
		return $retorno;
	
	}//FIM DO MÉTODO DE LISTAR TIPO CARTÃO
	
	public function ListarCartoes($ano, $mes, $numCartao, $setor ,$cancelado, $lancado){
	
		$sql = "SELECT tipocartao.id, tipocartao.ano ,colaborador.numCartao, colaborador.nome, tipocartao.mes, tipocartao.lancado, tipocartao.cancelado, tipocartao.colaborador_id
					FROM tipocartao 
						INNER JOIN colaborador 
							ON tipocartao.colaborador_id = colaborador.id
						INNER JOIN Setor
							ON Colaborador.Setor_id = Setor.id
						WHERE TipoCartao.ano = '".$ano."'";

		if ($mes != 0){
				$sql .= " AND tipocartao.mes = '".$mes."'";
		}
		if (!empty($numCartao))
		{
				$sql .= " AND Colaborador.numCartao = '".$numCartao."'";
		}
		if ($setor != 0)
		{
				$sql .= " AND Colaborador.Setor_id = '".$setor."'";
		}
		if ($cancelado != 2)
		{
			    $sql .= " AND TipoCartao.cancelado = '".$cancelado."'";
		}
		if ($lancado != 2)
		{
				$sql .= " AND TipoCartao.lancado = '".$lancado."'";
		}
		
		//echo $sql;
		
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$obj = new TipoCartao();
				
				$obj->id = $row['id'];
				$obj->numCartao = $row['numCartao'];
				$obj->mes = $row['mes'];
				$obj->lancado = $row['lancado'];
				$obj->cancelado = $row['cancelado'];
				$obj->nome = $row['nome'];
				$obj->colaborador_id = $row['colaborador_id'];
				$obj->ano = $row['ano'];
				
				$retorno[] = $obj;
			}
		}
		return $retorno;
	
	}//FIM DO MÉTODO DE LISTAR TIPO CARTÃO
	
	public function RelatorioTotalHorasMensaisPorSetor($idSetor, $ano, $mes){
	
		$sql = "SELECT 
					colaborador.nome,
					setor.sigla,
					mesesano.nomeMes,
					tipocartao.ano,
					tipojornada.totalHorasMes AS prevista,
					SUM(((LEFT(cartao.sai2, 2) * 60) + RIGHT(cartao.sai2, 2) - (LEFT(cartao.ent1, 2) * 60) + RIGHT(cartao.ent1, 2)) - ((LEFT(cartao.ent2, 2) * 60) + RIGHT(cartao.ent2, 2) - (LEFT(cartao.sai1, 2) * 60) + RIGHT(cartao.sai1, 2))) / 60 AS realizada,
					(SUM(((LEFT(cartao.sai2, 2) * 60) + RIGHT(cartao.sai2, 2) - (LEFT(cartao.ent1, 2) * 60) + RIGHT(cartao.ent1, 2)) - ((LEFT(cartao.ent2, 2) * 60) + RIGHT(cartao.ent2, 2) - (LEFT(cartao.sai1, 2) * 60) + RIGHT(cartao.sai1, 2))) / 60 - tipojornada.totalHorasMes) AS total
				FROM
					setor
						RIGHT JOIN
					colaborador ON setor.id = colaborador.Setor_id
						RIGHT JOIN
					tipocartao ON colaborador.id = tipocartao.colaborador_id
						RIGHT JOIN
					cartao ON tipocartao.id = cartao.TipoCartao_id
						RIGHT JOIN
					mesesano ON tipocartao.mes = mesesano.numeroMes
						RIGHT JOIN
					tipojornada ON colaborador.TipoJornada_id = tipojornada.id
				WHERE
					setor.id = ".$idSetor." AND tipocartao.mes = ".$mes."
						AND tipocartao.ano = ".$ano."
						AND tipocartao.cancelado = 0
						AND tipocartao.lancado = 1
						AND cartao.Ocorrencia_id = 1
						AND colaborador.desligado = 0
				GROUP BY colaborador.nome";
		
		//echo $sql;
		
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{	
				$tipoCartao = new TipoCartao();
				
				$tipoCartao->nome = $row['nome'];
				$tipoCartao->sigla = $row['sigla'];
				$tipoCartao->mes = $row['nomeMes'];
				$tipoCartao->ano = $row['ano'];
				$tipoCartao->prevista = $row['prevista'];
				$tipoCartao->realizada = $row['realizada'];
				$tipoCartao->total = $row['total'];
				
				$retorno[] = $tipoCartao;
			}
		}
		return $retorno;
	
	}
	
}//FIM DA CLASSE TIPO CARTÃO	
?>