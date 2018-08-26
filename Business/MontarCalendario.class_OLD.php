<?php
$ano = $_SESSION['anoExer'];
function MostreSemanas(){
	
	//$semanas = "DSTQQSS";
	$a = array("DOM","SEG","TER","QUA","QUI","SEX","SAB");
	for( $i = 0; $i < 7; $i++ )
	 echo "<td class='celDiaSemana'><center>".$a[$i]."</center></td>";
 
}
 
function GetNumeroDias($mes){
	$numero_dias = array( 
			'1' => 31, '2' => 28, '3' => 31, '4' =>30, '5' => 31, '6' => 30,
			'7' => 31, '8' =>31, '9' => 30, '10' => 31, '11' => 30, '12' => 31
	);
 
	if (((date('Y') % 4) == 0 and (date('Y') % 100)!=0) or (date('Y') % 400)==0){
	    $numero_dias['02'] = 29;	// altera o numero de dias de fevereiro se o ano for bissexto
	}
 
	return $numero_dias[$mes];
}
 
function GetNomeMes($mes){
     $meses = array( '1' => "Janeiro", '2' => "Fevereiro", '3' => "Mar&ccedil;o",
                     '4' => "Abril",   '5' => "Maio",      '6' => "Junho",
                     '7' => "Julho",   '8' => "Agosto",    '9' => "Setembro",
                     '10' => "Outubro", '11' => "Novembro",  '12' => "Dezembro"
                     );
 
      if( $mes >= 01 && $mes <= 12){
        return $meses[$mes];
	 }
        return "Mês deconhecido";
 
}
 
function MostreCalendario($mes,$objeto){
	require_once("../Business/EnumGenerico.class.php");
	require_once("../Entity/Calendario.class.php");
	
	$obj = new EnumGenerico();
	$calendario = new Calendario();
	$m = $obj->NumMes($mes);
 
	$numero_dias = GetNumeroDias( $mes );	// retorna o número de dias que tem o mês desejado
	$nome_mes = GetNomeMes( $mes );
	$diacorrente = 0;	
 
	echo "<input type='hidden' name='numMes' value='".$mes."'/>";
	$diasemana = jddayofweek( cal_to_jd(CAL_GREGORIAN, $mes,"01",date('Y')) , 0 );	// função que descobre o dia da semana
 
	//echo "<form method='post'>";
	echo "<table width='900' border='1' align='center'>";
	 echo "<tr>";
        echo "<td colspan='7' style='background:#999;'><center><span>".$m."</span></center></td>";
	 echo "</tr>";
	 echo "<tr style='background:#999; font-weight: bold;'>";
	   MostreSemanas();	// função que mostra as semanas aqui
	 echo "</tr>"; 

	for( $linha = 0; $linha < 5; $linha++ ){
	
	   echo "<tr height='30px;'>";
 
	   for( $coluna = 0; $coluna < 7; $coluna++ ){
		echo "<td>";
		
		  if( ($diacorrente == ( date('d') - 1) && date('m') == $mes) ){	
			   //echo " id = 'dia_atual' ";
		  }else{
			     if(($diacorrente + 1) <= $numero_dias ){
			        if( $coluna < $diasemana && $linha == 0){
						//echo " id = 'dia_branco' ";
					}else{
						//echo " id = 'dia_comum' ";
					}
			     }else{
						echo " ";
			     }
		  }
 
		   /* TRECHO IMPORTANTE: A PARTIR DESTE TRECHO É MOSTRADO UM DIA DO CALENDÁRIO (MUITA ATENÇÃO NA HORA DA MANUTENÇÃO) */
 
		    if( $diacorrente + 1 <= $numero_dias ){
				if( $coluna < $diasemana && $linha == 0){
					echo " ";
				}else{
						echo ++$diacorrente;
						$idCalendario = $calendario->ListarOcorrenciaCalendario($mes, $_SESSION['anoExer'], $diacorrente);
						echo "<input type='hidden' name='diaCorrente[]' value='".$diacorrente."' />";
						
							echo "<center>";
									echo "<select name='ocorrencia[]'>";
										foreach ($idCalendario as $i){
											foreach ($objeto as $item){
												if ($i->idOcorrendia == $item->id){
													echo "<option value='".$item->id."' selected title='".$item->descricao."'>".$item->sigla."</option>";
												}else{
													echo "<option value='".$item->id."' title='".$item->descricao."'>".$item->sigla."</option>";
												}
											}
											echo "<input type='hidden' name='idCalendario[]' value='".$i->id."'/>";
										}	
											
							echo       "</select>
								</center>";	
								
				 }
			 }else{
					break;
		     }
 
		   /* FIM DO TRECHO MUITO IMPORTANTE */
		echo "</td>";
	   }
	   echo "</tr>";
	}
 
	echo "</table>";
	//echo "</form>";
}
 
function MostreCalendarioCompleto(){
	    echo "<table align = 'center' border='1'>";
	    $cont = 1;
	    for( $j = 0; $j < 4; $j++ ){
		  echo "<tr>";
		for( $i = 0; $i < 3; $i++ ){
		 
		  echo "<td> ";
			MostreCalendario( ($cont < 10 ) ? "0".$cont : $cont );  
 
		        $cont++;
		  echo "</td>";
 
	 	}
			echo "</tr>";
	    }
			echo "</table>";
}

function MostreCalendarioView($mes){
	require_once("../Business/EnumGenerico.class.php");
	require_once("../Entity/Calendario.class.php");
	
	$calendario = new Calendario();
	$enumGenerico = new EnumGenerico();
	$m = $enumGenerico->NumMes($mes);
 
	$numero_dias = GetNumeroDias( $mes );	// retorna o número de dias que tem o mês desejado
	$nome_mes = GetNomeMes( $mes );
	$diacorrente = 0;	
 
	$diasemana = jddayofweek( cal_to_jd(CAL_GREGORIAN, $mes,"01",date('Y')) , 0 );	// função que descobre o dia da semana
 
	echo "<table width='900' border='1'>";
	 echo "<tr>";
        echo "<td colspan='7' style='background:#999;'><center><span>".$m."</span></center></td>";
	 echo "</tr>";
	 echo "<tr>";
	   MostreSemanas();	// função que mostra as semanas aqui
	 echo "</tr>";
	for( $linha = 0; $linha < 5; $linha++ ){
  
	   echo "<tr height='30px;'>";
 
	   for( $coluna = 0; $coluna < 7; $coluna++ ){
		echo "<td>";
 
		  if( ($diacorrente == ( date('d') - 1) && date('m') == $mes) ){	
			   //echo " id = 'dia_atual' ";
		  }else{
			     if(($diacorrente + 1) <= $numero_dias ){
			        if( $coluna < $diasemana && $linha == 0){
						//echo " id = 'dia_branco' ";
					}else{
						//echo " id = 'dia_comum' ";
					}
			     }else{
						echo " ";
			     }
		  }
 
		   /* TRECHO IMPORTANTE: A PARTIR DESTE TRECHO É MOSTRADO UM DIA DO CALENDÁRIO (MUITA ATENÇÃO NA HORA DA MANUTENÇÃO) */
 
		      if( $diacorrente + 1 <= $numero_dias ){
				 if( $coluna < $diasemana && $linha == 0){
					 echo " ";
				 }else{
						echo ++$diacorrente."</br>";
						$resultado = $calendario->ListarOcorrenciaView($mes, $_SESSION['anoExer'], $diacorrente);
						if (empty($resultado)){
							echo "<center><b>NR</b></center>";
						}else{	
							foreach ($resultado as $i){
								echo "<center><b title='".$i->descricao."'>".$i->sigla."</b></center>";
							}
						}//FIM DO ELSE
				 }
			 }else{
					break;
		     }
 
		   /* FIM DO TRECHO MUITO IMPORTANTE */
		echo "</td>";
	   }
	   echo "</tr>";
	}
 
	echo "</table>";
}

?>