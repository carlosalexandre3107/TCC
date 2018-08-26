<?php
require_once("../DAO/Base.class.php");

class Cartao extends Base{
	
	public function __construct($campo=array()){
		parent :: __construct();
		$this->tabela = "Cartao";
		if(sizeof($campo)<=0)
		{
			$this->campos_valores=array("dia"=>NULL, "mes"=>NULL, "ano"=>NULL, "ent1"=>NULL,"ent2"=>NULL, "ent3"=>NULL, "sai1"=>NULL,"sai2"=>NULL,
			"sai3"=>NULL, "diaSemana"=>NULL,  "Ocorrencia_id"=>NULL, "TipoCartao_id"=>NULL, "Colaborador_id"=>NULL, "Justificativa_id"=>NULL);
		}
		else
		{
			$this->campos_valores = $campo;
		}
		$this->campopk = "id";
	}
	
	// ATRIBUTOS DA TABELA CARTAO
	public $ano;
	public $mes;
	public $dia;
	public $ent1;
	public $ent2;
	public $ent3;
	public $sai1;
	public $sai2;
	public $sai3;
	public $diaSemana;
	public $Ocorrencia_id;
	public $TipoCartao_id;
	public $Colaborador_id;
	public $Justificativa_id;
	
	public function ListarCartao()
	{
		$sql = "SELECT * FROM ".$this->tabela;

		//echo $sql;
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$obj = new Cartao();
				
				$obj->ano 				= $row['ano'];
				$obj->mes 				= $row['mes'];
				$obj->dia 				= $row['dia'];
				$obj->ent1 				= $row['ent1'];
				$obj->ent2 				= $row['ent2'];
				$obj->ent3 				= $row['ent3'];
				$obj->sai1 				= $row['sai1'];
				$obj->sai2 				= $row['sai2'];
				$obj->sai3 				= $row['sai3'];
				$obj->diaSemana 		= $row['diaSemana'];
				$obj->Ocorrencia_id 	= $row['Ocorrencia_id'];
				$obj->TipoCartao_id 	= $row['TipoCartao_id'];
				$obj->Colaborador_id 	= $row['Colaborador_id'];
				$obj->Justificativa_id  = $row['Justificativa_id'];
				
				$retorno[] = $obj;
			}
		}
		return $retorno;
	}
	
	//MÉTODO PARA RETORNAR O ARRAY DOS DIAS NO MÊS
	public function diasMes($mes){
		switch ($mes){
			case $mes == 1:
				//Dez a Jan
				$dias = array("21/12","22/12","23/12","24/12","25/12","26/12","27/12","28/12","29/12","30/12","31/12","1/1","2/1","3/1","4/1","5/1","6/1","7/1","8/1","9/1","10/1","11/1","12/1","13/1","14/1","15/1","16/1","17/1","18/1","19/1","20/1");
				return $dias;
			break;
			case $mes == 2:
				//Jan a Fev
				$dias = array("21/1","22/1","23/1","24/1","25/1","26/1","27/1","28/1","29/1","30/1","31/1","1/2","2/2","3/2","4/2","5/2","6/2","7/2","8/2","9/2","10/2","11/2","12/2","13/2","14/2","15/2","16/2","17/2","18/2","19/2","20/2");
				return $dias;
			break;
			case $mes == 3:
				//Fev a Mar
				$dias = array("21/2","22/2","23/2","24/2","25/2","26/2","27/2","28/2","1/3","2/3","3/3","4/3","5/3","6/3","7/3","8/3","9/3","10/3","11/3","12/3","13/3","14/3","15/3","16/3","17/3","18/3","19/3","20/3");
				return $dias;
			break;
			case $mes == 4:
				//Mar a Abr
				$dias = array("21/3","22/3","23/3","24/3","25/3","26/3","27/3","28/3","29/3","30/3","31/3","1/4","2/4","3/4","4/4","5/4","6/4","7/4","8/4","9/4","10/4","11/4","12/4","13/4","14/4","15/4","16/4","17/4","18/4","19/4","20/4");
				return $dias;
			break;	
			case $mes == 5:
				//Abr a Mai
				$dias = array("21/4","22/4","23/4","24/4","25/4","26/4","27/4","28/4","29/4","30/4","1/5","2/5","3/5","4/5","5/5","6/5","7/5","8/5","9/5","10/5","11/5","12/5","13/5","14/5","15/5","16/5","17/5","18/5","19/5","20/5");
				return $dias;
			break;
			case $mes == 6:
				//Mai a Jun
				$dias = array("21/5","22/5","23/5","24/5","25/5","26/5","27/5","28/5","29/5","30/5","31/5","1/6","2/6","3/6","4/6","5/6","6/6","7/6","8/6","9/6","10/6","11/6","12/6","13/6","14/6","15/6","16/6","17/6","18/6","19/6","20/6");
				return $dias;
			break;
			case $mes == 7:
				//Jun a Jul
				$dias = array("21/6","22/6","23/6","24/6","25/6","26/6","27/6","28/6","29/6","30/6","1/7","2/7","3/7","4/7","5/7","6/7","7/7","8/7","9/7","10/7","11/7","12/7","13/7","14/7","15/7","16/7","17/7","18/7","19/7","20/7");
				return $dias;
			break;
			case $mes == 8:
				//Jul a Ago
				$dias = array("21/7","22/7","23/7","24/7","25/7","26/7","27/7","28/7","29/7","30/7","31/7","1/8","2/8","3/8","4/8","5/8","6/8","7/8","8/8","9/8","10/8","11/8","12/8","13/8","14/8","15/8","16/8","17/8","18/8","19/8","20/8");
				return $dias;
			break;
			case $mes == 9:
				//Ago a Set
				$dias = array("21/8","22/8","23/8","24/8","25/8","26/8","27/8","28/8","29/8","30/8","31/8","1/9","2/9","3/9","4/9","5/9","6/9","7/9","8/9","9/9","10/9","11/9","12/9","13/9","14/9","15/9","16/9","17/9","18/9","19/9","20/9");
				return $dias;
			break;
			case $mes == 10:
				//Set a Aut
				$dias = array("21/9","22/9","23/9","24/9","25/9","26/9","27/9","28/9","29/9","30/9","1/10","2/10","3/10","4/10","5/10","6/10","7/10","8/10","9/10","10/10","11/10","12/10","13/10","14/10","15/10","16/10","17/10","18/10","19/10","20/10");
				return $dias;
			break;
			case $mes == 11:
				//Aut a Nov
				$dias = array("21/10","22/10","23/10","24/10","25/10","26/10","27/10","28/10","29/10","30/10","31/10","1/11","2/11","3/11","4/11","5/11","6/11","7/11","8/11","9/11","10/11","11/11","12/11","13/11","14/11","15/11","16/11","17/11","18/11","19/11","20/11");
				return $dias;
			break;
			case $mes == 12:
				//Nov a Dez
				$dias = array("21/1","22/1","23/1","24/1","25/1","26/1","27/1","28/1","29/1","30/1","1/12","2/12","3/12","4/12","5/12","6/12","7/12","8/12","9/12","10/12","11/12","12/12","13/12","14/12","15/12","16/12","17/12","18/12","19/12","20/12");
				return $dias;
			break;		
		}
		
	}//FIM DO MÉTODO PARA RETORNAR O ARRAY DOS DIAS NO MÊS

	//MÉDOTO RECEBE DATA E RETORNA DIA DA SEMANA
	// diaDaSemana(01,8,2014);
	public function diaSemana ($dia, $mes, $ano){
		$diaSemana = date("D", mktime(0, 0, 0, $mes, $dia, $ano));

		switch ($diaSemana){			
			case $diaSemana == "Mon":
				$diaSemana = "SEG";
				return $diaSemana;
			break;
			
			case $diaSemana == "Tue":
				$diaSemana = "TER";
				return $diaSemana;
			break;
			
			case $diaSemana == "Wed":
				$diaSemana = "QUA";
				return $diaSemana;
			break;
		
			case $diaSemana == "Thu":
				$diaSemana = "QUI";
				return $diaSemana;
			break;
		
			case $diaSemana == "Fri":
				$diaSemana = "SEX";
				return $diaSemana;
			break;
			
			case $diaSemana == "Sat":
				$diaSemana = "SAB";
				return $diaSemana;
			break;
			
			case $diaSemana == "Sun":
				$diaSemana = "DOM";
				return $diaSemana;
			break;	
			
		}
	}//fim do método diaDaSemana

	public function ListarJornada($tipoJ, $dia){

		$sql = "SELECT * FROM jornada WHERE TipoJornada_id = '".$tipoJ."' AND diasemana = '".$dia."'";

		//echo $sql;
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$obj = new Cartao();
				
				$obj->id = $row['id'];
				$obj->ent1 = $row['ent1'];
				$obj->sai1 = $row['sai1'];
				$obj->ent2 = $row['ent2'];
				$obj->sai2 = $row['sai2'];
				$obj->ent3 = $row['ent3'];
				$obj->sai3 = $row['sai3'];
				$obj->Ocorrencia_id = $row['Ocorrencia_id'];
				
				$retorno[] = $obj;
			}
		}
		return $retorno;
	}
	
	public function ListarOcorrenciaPorSetor($setorId, $mesId, $ocorrenciaId){

		$sql = "SELECT setor.descricao AS descricaoSetor, colaborador.nome, cartao.mes, cartao.dia, ocorrencia.descricao AS descricaoOcorrencia
				FROM cartao
					INNER JOIN tipocartao
						ON tipocartao.id = TipoCartao_id
        			INNER JOIN colaborador
						ON tipocartao.Colaborador_id = colaborador.id
					INNER JOIN setor
						ON colaborador.Setor_id = setor.id
					INNER JOIN ocorrencia
						ON cartao.Ocorrencia_id = ocorrencia.id
            	WHERE tipocartao.cancelado = 0";
		
		if($setorId > 0)
		{
			$sql .= " AND colaborador.Setor_id = '".$setorId."'";
		}
		if($mesId > 0)
		{
			$sql .= " AND tipocartao.mes = '".$mesId."'";
		}
		if($ocorrenciaId > 0)
		{
			$sql .= " AND ocorrencia.id = '".$ocorrenciaId."'";
		}

		//echo $sql;
		
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$cartao = new Cartao();

				$cartao->descricaoSetor = $row['descricaoSetor'];
				$cartao->nomeColaborador = $row['nome'];
				$cartao->mesCartao = $row['mes'];
				$cartao->diaCartao = $row['dia'];
				$cartao->descricaoOcorrencia = $row['descricaoOcorrencia'];

				$retorno[] = $cartao;
			}
		}
		return $retorno;
	}
	
	public function ListarJornadaCartao($tipoCartaoId, $dia, $mes, $ano){

		$sql = "SELECT * FROM cartao 
				WHERE TipoCartao_id = '".$tipoCartaoId."' 
					AND dia = '".$dia."' 
					AND mes = '".$mes."' 
					AND ano = '".$ano."'";

		//echo $sql."</br>";
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$obj = new Cartao();
				
				$obj->id = $row['id'];
				$obj->ent1 = $row['ent1'];
				$obj->sai1 = $row['sai1'];
				$obj->ent2 = $row['ent2'];
				$obj->sai2 = $row['sai2'];
				$obj->ent3 = $row['ent3'];
				$obj->sai3 = $row['sai3'];
				$obj->Ocorrencia_id = $row['Ocorrencia_id'];
				
				$retorno[] = $obj;
			}
		}
		return $retorno;
	}
	
	public function ListarCartoesSemAssinatura($idMes, $ano){
		
		//echo ("IdMes: ".$idMes." Ano: ".$ano."<br>");

		$sql = "SELECT 
    				colaborador.nome, setor.descricao, mesesano.nomeMes, tipocartao.ano
				FROM
					colaborador
				INNER JOIN
					setor ON colaborador.Setor_id = setor.id
				INNER JOIN
					tipocartao ON colaborador.id = tipocartao.colaborador_id
				INNER JOIN
					mesesano ON tipocartao.mes = mesesano.numeroMes
				WHERE
					tipocartao.assinado = 0
					AND	tipocartao.cancelado = 0";
		
		if($ano != 0)
		{
			$sql .= " AND tipocartao.ano = ".$ano;
		}
		
		if($idMes != 0)
		{
			$sql .= " AND tipocartao.mes = ".$idMes;
		}
		
		$sql .= " ORDER BY colaborador.nome";
		
		//echo $sql."</br>";
		
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$cartao = new Cartao();
				
				$cartao->nome = $row['nome'];
				$cartao->descricao = $row['descricao'];
				$cartao->nomeMes = $row['nomeMes'];
				$cartao->ano = $row['ano'];
				
				$retorno[] = $cartao;
			}
		}
		return $retorno;
	}
	
	public function RelatorioEtiquetasCartao(){

		$sql = "SELECT 
					colaborador.nome,
					SABADOPORIDJORNADA(colaborador.tipojornada_id) AS sabado,
					DOMINGOPORIDJORNADA(colaborador.tipojornada_id) AS domingo,
					HORARIOPORIDJORNADA(colaborador.tipojornada_id) AS horario,
					INTERVALOPORIDJORNADA(colaborador.tipojornada_id) AS intervalo
				FROM
					colaborador colaborador
						INNER JOIN
					cargo cargo ON colaborador.cargo_id = cargo.id
						INNER JOIN
					tipojornada tipojornada ON colaborador.TipoJornada_id = tipojornada.id
				ORDER BY colaborador.numCartao ASC";

		//echo $sql."</br>";
		
		$result = $this->ExecutaSQL($sql);
		
		$retorno = NULL;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
			
			$cartao = new Cartao();
			
			$cartao->nome = $row['nome'];
			$cartao->horario = $row['horario'];
			$cartao->intervalo = $row['intervalo'];
			$cartao->sabado = $row['sabado'];
			$cartao->domingo = $row['domingo'];
			
			$retorno[] = $cartao;
			}
		}
		return $retorno;
	}
	
	
}//FIM DA CLASS CARTÃO
?>