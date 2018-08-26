<?php

abstract class Repositorio
{
	private $servidor		= "localhost";
	private $usuario			= "root";
	private $senha			= "";
	private $nomeBanco		= "easyjourney";
	private $conexao			= NULL;
	private $linhasAfetadas	= -1;
		
	public function __destruct()
	{	
		if($this->conexao != NULL)
		{
			$this->FecharConexao();
		}		
	}
	
	public function Conection()
	{
		if($this->conexao == NULL)
		{		
			$this->conexao = new mysqli($this->servidor, $this->usuario, $this->senha, $this->nomeBanco) 
				or die ($this->TrataErro(__FILE__,__FUNCTION__,mysqli_errno(), mysqli_connect_errno(),TRUE));

			mysqli_select_db($this->conexao, $this->nomeBanco) or die ($this-> TrataErro(__FILE__,__FUNCTION__,mysqli_errno(),mysqli_connect_errno(),TRUE));
			$this->conexao->query("SET NAMES 'utf8'");
			$this->conexao->query("SET character_set_connection = utf8");
			$this->conexao->query("SET character_set_client = utf8");
			$this->conexao->query("SET character_set_results = utf8");
		}
	}
	
	public function TrataErro($arquivo=NULL,$rotina=NULL,$numErro=NULL,$msgErro=NULL,$geraException=FALSE)
	{
		if($arquivo == NULL)
		{
			$arquivo = "Não Informado";
		}
		if($rotina == NULL)
		{
			$rotina = "Não Informado";
		}
		if($numErro == NULL)
		{
			$numErro = mysqli_errno($this->conexao);
		}
		if($msgErro == NULL)
		{
			$msgErro = mysqli_error($this->conexao);
		}
		$resultado =  	'<br/><br/>Ocorreu um erro com o seguintes detalhes:<br />
							<strong>Arquivo: </strong>'.$arquivo.'<br />
							<strong>Rotina: </strong>'.$rotina.'<br />
							<strong>Codigo: </strong>'.$numErro.'<br />
							<strong>Mensagem: </strong>'.$msgErro.'<br />';
		
		if($geraException == FALSE)
		{
			echo($resultado);
		}else{
			die($resultado);
		}
	}
	
	public function ExecutaSQL($sql=NULL, $rotina=NULL)
	{
		if($sql != NULL)
		{
			$this->Conection();

			$query					= $this->conexao->query($sql) or $this->TrataErro(__FILE__,__FUNCTION__);
			$this->linhasAfetadas	= mysqli_affected_rows($this->conexao);
			
			if($rotina == NULL)
			{
				return $query;
			}
			
			$var = NULL;
			if($rotina == "Logar")
			{
				while($l = $query->fetch_assoc())
				{
					$var = $l['id'];
				}
			}
			else if($rotina == "Inserir")
			{
				$id = mysqli_insert_id($this->conexao);
				$var = $id;			
			}
			else if($rotina == "Atualizar" || $rotina == "Deletar")
			{
				$var = true;
			}

			return $var;
		}
		else
		{
			$this->TrataErro(__FILE__,__FUNCTION__,NULL,"Comando SQL não Informado na Rotina",FALSE);
		}
	}
	
	public function Logar($objeto)
	{
		$sql = "SELECT * FROM ".$objeto->tabela. " WHERE ";
			for($i = 0; $i < count($objeto->campos_valores)-1; $i++)
			{
				$sql .= key($objeto->campos_valores);
				
				$sql .= is_numeric($objeto->campos_valores) ? 
				$objeto->campos_valores[key($objeto->campos_valores)] :
				" = '".$objeto->campos_valores[key($objeto->campos_valores)]."'";
				
				if($i < (count($objeto->campos_valores)-2))
				{
					$sql .= ' AND ';
				}
				else
				{
					$sql .= "";	
				}
				next($objeto->campos_valores);
			}
		
			//TODO: Escreve na tela a query que será executada.
			// echo $sql;
			return $this->ExecutaSQL($sql,"Logar");
	}

	public function Inserir($objeto)
	{
		$sql = "INSERT INTO ".$objeto->tabela." (";
		for($i = 0; $i < count($objeto->campos_valores); $i++)
		{
			$sql .= key($objeto->campos_valores);
			if($i < (count($objeto->campos_valores)-1))
			{
				$sql .= ", ";
			}
			else
			{
				$sql .= ")";
			}
			next($objeto->campos_valores);
		}
		
		reset($objeto->campos_valores);
		$sql .= "VALUES (";
		
		for($i = 0; $i < count($objeto->campos_valores); $i++)
		{
			$sql .= is_numeric($objeto->campos_valores[key($objeto->campos_valores)]) ?
			$objeto->campos_valores[key($objeto->campos_valores)] :
			"'".$objeto->campos_valores[key($objeto->campos_valores)]."'";
			
			if($i < (count($objeto->campos_valores)-1))
			{
				$sql .= ", ";
			}
			else
			{
				$sql .= ")";	
			}
			next($objeto->campos_valores);
		}
		
		//TODO: Escreve na tela a query que será executada.
		//echo $sql."</br>";
		
		return $this->ExecutaSQL($sql,"Inserir");
	}
	
	public function Atualizar($objeto,$id)
	{
		$sql = "UPDATE ".$objeto->tabela." SET ";
		for($i = 0; $i < count($objeto->campos_valores); $i++)
		{
			$sql .= key($objeto->campos_valores);
			
			$sql .= is_numeric($objeto->campos_valores) ? 
			$objeto->campos_valores[key($objeto->campos_valores)] :
			"='".$objeto->campos_valores[key($objeto->campos_valores)]."'";
			
			if($i < (count($objeto->campos_valores)-1))
			{
				$sql .= ', ';
			}
			else
			{
				$sql .= "";	
			}
			next($objeto->campos_valores);
		}
		
		$sql.=" WHERE id='$id'";
		
		//TODO: Escreve na tela a query que será executada.
		//echo $sql."</br>";
				
		return $this->ExecutaSQL($sql,"Atualizar");
	}

	public function FecharConexao()
	{
		if($this->conexao !== NULL)
		{
			mysqli_close($this->conexao);
		}
	}
	
	public function Deletar($objeto, $value)
	{
		$sql = "DELETE FROM ".$objeto->tabela." WHERE id = '$value'";
	
		//TODO: Escreve na tela a query que será executada.
		//echo $sql;
		return $this->ExecutaSQL($sql,"Deletar");
	}
}
?>