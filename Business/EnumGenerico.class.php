<?php
class EnumGenerico{

	public function Status($objeto){
		$var = NULL;
		
		if($objeto == 0){
			return $var = "Não";
			
		}else if($objeto == 1){
			return $var = "Sim";
		}
	}	
	
	public function Status2($objeto){		
		if($objeto == 'Sim'){
			return $var = 1;
			
		}else if($objeto == 'Não'){
			return $var = '0';
			
		}
	}
	
	public function ListaMeses(){
		$meses = array("Janeiro","Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
		return $meses;
	}
	
	public function ConvMes($mes){
		$numMes = NULL;
		switch ($mes){
			case 'Janeiro':
				$numMes = 1;
			break;
			case 'Fevereiro':
				$numMes = 2;
			break;
			case 'Março':
				$numMes = 3;
			break;
			case 'Abril':
				$numMes = 4;
			break;
			case 'Maio':
				$numMes = 5;
			break;
			case 'Junho':
				$numMes = 6;
			break;
			case 'Julho':
				$numMes = 7;
			break;
			case 'Agosto':
				$numMes = 8;
			break;
			case 'Setembro':
				$numMes = 9;
			break;
			case 'Outubro':
				$numMes = 10;
			break;
			case 'Novembro':
				$numMes = 11;
			break;
			case 'Dezembro':
				$numMes = 12;
			break;			
		}
		return $numMes;
	}
	
	public function ListarDiasSemana(){
		$diasSemana = Array ("DOM","SEG","TER","QUA","QUI","SEX","SAB");
		return $diasSemana;
	}
	
	public function ConvDiaSemana($dia){
		switch ($dia){
			case 'DOM':
				$dia = 1;
			break;
			case 'SEG':
				$dia = 2;
			break;
			case 'TER':
				$dia = 3;
			break;
			case 'QUA':
				$dia = 4;
			break;
			case 'QUI':
				$dia = 5;
			break;
			case 'SEX':
				$dia = 6;
			break;
			case 'SAB':
				$dia = 7;
			break;			
		}
		return $dia;
	}
	
	public function NumDiaSemana($dia){
		switch ($dia){
			case 1:
				$dia = 'DOM';
			break;
			case 2:
				$dia = 'SEG';
			break;
			case 3:
				$dia = 'TER';
			break;
			case 4:
				$dia = 'QUA';
			break;
			case 5:
				$dia = 'QUI';
			break;
			case 6:
				$dia = 'SEX';
			break;
			case 7:
				$dia = 'SAB';
			break;			
		}
		return $dia;
	}

	public function NumMes($mes){
		$numMes = NULL;
		switch ($mes){
			case 1:
				$numMes = "Janeiro";
			break;
			case 2:
				$numMes = "Fevereiro";
			break;
			case 3:
				$numMes = "Março";
			break;
			case 4:
				$numMes = "Abril";
			break;
			case 5:
				$numMes = "Maio";
			break;
			case 6:
				$numMes = "Junho";
			break;
			case 7:
				$numMes = "Julho";
			break;
			case 8:
				$numMes = "Agosto";
			break;
			case 9:
				$numMes = "Setembro";
			break;
			case 10:
				$numMes = "Outubro";
			break;
			case 11:
				$numMes = "Novembro";
			break;
			case 12:
				$numMes = "Dezembro";
			break;			
		}
		return $numMes;
	}
	
	public function Perfil($numPerfil){
		if ($numPerfil == 1){
			$perfil = "Operador";
		}else{
			$perfil = "Administrador";
		}
		return $perfil;
	}
}

?>