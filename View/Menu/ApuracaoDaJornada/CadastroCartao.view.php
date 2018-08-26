<html>
<head>
<title>CARTÃO</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="Js/jquery-1.5.2.min.js"></script>
<script src="Js/jquery.maskedinput-1.3.min.js"></script>

</head>

<?php
	$mesGenerico = $_GET['mes'];
	$numCartao   = $_GET['numCartao'];
	$idCartao    = $_GET['idCartao'];
	$idCol       = $_GET['idCol'];
	$cancelado   = $_GET['Cancelado'];
	$anoGenerico = $_GET['ano'];
	$lancado     = $_GET['lancado'];
    $ano         = 0;
	
	require_once("../Entity/Colaborador.class.php");
	require_once("../Business/EnumGenerico.class.php");
	require_once("../Entity/Cartao.class.php");				
	require_once("../Entity/Ocorrencia.class.php");
				
	$colaboradorObj = new Colaborador();
	$enumGenericoObj = new EnumGenerico();
	$OcorrenciaObj = new Ocorrencia();
	$cartaoObj = new Cartao();
	
	$resultTopoCartao = $colaboradorObj->TopoCartao($numCartao, $idCartao);
	$descMes = $enumGenericoObj->NumMes($mesGenerico);
?>

<body>
	<br />
    <div class="boxcadastro" style="margin-top:-5px;">
        <div class="boxtitulo">
        	<p style="width:68px;">CARTÃO</p>
        </div><!--FIM DA DIV BOX TITULO-->
        <form method="post">    
			<table width="600" class="formcadastro" align="center">
                <tr>
                    <td>Nº DO CARTÃO: </td>
                    <td><?php echo $numCartao; ?></td>
					<?php if ($lancado == 1) {?>
								<td rowspan="4"><input type="submit" name="incluir" value="ATUALIZAR"/></td>
					<?php }else{ ?>
								<td rowspan="4"><input type="submit" name="incluir" value="GRAVAR"/></td>
					<?php }?>
					
					<input type="hidden" name="idCartao"  value="<?php echo $idCartao;    ?>"/>
					<input type="hidden" name="ano" 	  value="<?php echo $anoGenerico; ?>"/>
					<input type="hidden" name="mes"       value="<?php echo $mesGenerico; ?>"/>
					<input type="hidden" name="lancado"   value="<?php echo $lancado;     ?>"/>
					<input type="hidden" name="idCol" 	  value="<?php echo $idCol;       ?>"/>
					<input type="hidden" name="cancelado" value="<?php echo $cancelado;   ?>"/>
                </tr>
                <tr>
                        <td>MÊS: </td>
					<td><?php echo $descMes; ?></td>
                </tr>
                <tr>
                        <td>NOME: </td>
					<?php 
						foreach ($resultTopoCartao as $item){
					?>	
							<td><?php echo $item->nome; ?></td>
					<?php
						}
					?>
                      </tr>
                <tr>
                        <td>JORNADA</td>
					<?php
						foreach ($resultTopoCartao as $item){
					?>
							<td><?php echo $item->descricao; ?></td>
					<?php
						$tipoJ = $item->tipoJornada_id;
						}
					?>
                </tr>
				<tr>
					<td>CARTÃO ASSINADO</td>
					<td>
						<?php 
							foreach ($resultTopoCartao as $item)
							{
								if($item->assinado == 1)
								{
						?>
									<input type="checkbox" checked name="assinado"/>
						<?php
								}else{
						?>
									<input type="checkbox" name="assinado"/>
						<?php
								}
							}
						?>
					</td>
				</tr>
          </table>
        </br>
    </div><!--FIM DA DIV BOX Gerenciar-->	

    <div class="BoxTabelaJornada">
    
      <table width="955" align="center" bordercolorlight="#fff">
            <tr>
                  <td colspan="2" rowspan="2" class="duaslinhas"><center><span>DATA</span></center></td>
                  <td class="simples"><center><span>INÍCIO</span></center></td>
                  <td colspan="2" class="duascolunas" style="	background:#030;"><center><span>INTERVALO</span></center></td>
                  <td class="simples"><center><span>FIM</span></center></td>
                  <td colspan="2" class="duascolunas" style="background:#006; color:#FFF;"><center>EXTRA</center></td>
                  <td colspan="2" class="duascolunas" style="color:#FFF; background:#666;"><center>TOTAL</center></td>
                  <td rowspan="2" class="duaslinhas" style="color:#FFF;"><center>OCORRÊNCIA</center></td>
            </tr>
            
            <tr>
                  <td class="simples" style="background:#CCC; color:#000;"><center>ENTRADA</center></td>
                  <td class="simples" style="background:#093; font-weight:bold;"><center>SAÍDA</center></td>
                  <td class="simples" style="background:#093; font-weight:bold;"><center>ENTRADA</center></td>
                  <td class="simples" style="background:#CCC;"><center>SAÍDA</center></td>
                  <td class="simples" style="background:#06F;"><center>ENTRADA</center></td>
                  <td class="simples" style="background:#06F;"><center>SAÍDA</center></td>
				  <td class="simples" style="background:#CCC;"><center>MINUTO</center></td>
                  <td class="simples" style="background:#CCC;"><center>HORA</center></td>
            </tr>
            <?php
			
				$listaDiasMeses = $cartaoObj->diasMes($mesGenerico);
		  		$idTabIndex = 1;
		  		$quantLinhas = count($listaDiasMeses);
				
				foreach($listaDiasMeses as $itemDiasMeses)
				{
					
					$diaMes = explode("/", $itemDiasMeses);
					
					$dia = $diaMes[0];
					$mes = $diaMes[1];	

					if ($mesGenerico == 1 && $mes == 12)
					{
						$anoTemp = $anoGenerico-1;
						$diaSemana = $cartaoObj->diaSemana($dia,$mes,$anoTemp);
						$numDiaSemana = $enumGenericoObj->ConvDiaSemana($diaSemana);
						
						if ($lancado == 1){
							//echo $idCartao." - ".$dia." - ".$mes." - ".$anoTemp."</br>";
							$listasJornada = $cartaoObj->ListarJornadaCartao($idCartao, $dia, $mes, $anoTemp);
                            
						}else{
							//echo $tipoJ." - ".$numDiaSemana."</br>";
							$listasJornada = $cartaoObj->ListarJornada($tipoJ, $numDiaSemana);
                            
						}
						
						//echo ("Dia: ".$dia." Mes: ".$mes." Ano: ".$anoTemp." DSemana: ".$diaSemana." NSemana: ".$numDiaSemana."<br>");
                        //print_r($listasJornada);
                        $ano = $anoTemp;
						
					}else{
						
						$diaSemana = $cartaoObj->diaSemana($dia,$mes,$anoGenerico);
						$numDiaSemana = $enumGenericoObj->ConvDiaSemana($diaSemana);
						
						if ($lancado == 1){
							//echo $idCartao." - ".$dia." - ".$mesGenerico." - ".$anoTemp."</br>";
							$listasJornada = $cartaoObj->ListarJornadaCartao($idCartao, $dia, $mes, $anoGenerico);
						}else{
							//echo $tipoJ." - ".$numDiaSemana."</br>";
							$listasJornada = $cartaoObj->ListarJornada($tipoJ, $numDiaSemana);
						}
						
						//echo ("Dia: ".$dia." Mes: ".$mes." Ano: ".$anoGenerico." DSemana: ".$diaSemana." NSemana: ".$numDiaSemana."<br>");
                        $ano = $anoGenerico;
                        
					}
						
					foreach ($listasJornada as $itemJornada){
						
			?>
						<input type="hidden" id="BaseEnt1<?php echo ($dia); ?>" value="<?php echo $itemJornada->ent1; ?>"/>
						<input type="hidden" id="BaseSai1<?php echo ($dia); ?>" value="<?php echo $itemJornada->sai1; ?>"/>
						<input type="hidden" id="BaseEnt2<?php echo ($dia); ?>" value="<?php echo $itemJornada->ent2; ?>"/>
						<input type="hidden" id="BaseSai2<?php echo ($dia); ?>" value="<?php echo $itemJornada->sai2; ?>"/>
						<input type="hidden" id="BaseEnt3<?php echo ($dia); ?>" value="<?php echo $itemJornada->ent3; ?>"/>
						<input type="hidden" id="BaseSai3<?php echo ($dia); ?>" value="<?php echo $itemJornada->sai3; ?>"/>
						<input id="idOcorrencia<?php echo $dia; ?>" name="ocorrencia<?php echo $dia; ?>" type="hidden" value="<?php echo ($itemJornada->Ocorrencia_id);?>" />
						<input name="idJornadaCartao<?php echo $dia; ?>" type="hidden" value="<?php echo $itemJornada->id; ?>" />
                        <input name="ano<?php echo $dia; ?>" type="hidden" value="<?php echo $ano; ?>" />
                        <input name="mes<?php echo $dia; ?>" type="hidden" value="<?php echo $mes; ?>" />
          
						<tr>
						  <td class="simples">
                                  <center>
                                      <span>
                                      <div id="dia<?php echo ($dia); ?>">
                                          <?php echo ($dia); ?>
                                          <input type="hidden"  name="dia<?php echo $dia; ?>" value="<?php echo ($dia); ?>" />
                                      </div>
                                      </span>
                                  </center>
                              </td>
							  <td class="simples">
                                  <center>
                                      <span>
                                      <div id="semana<?php echo ($diaSemana.$dia)?>">   
                                          <?php echo $diaSemana?>
                                          <input type="hidden" name="numDiaSemana<?php echo $dia; ?>" value="<?php echo $numDiaSemana; ?>" />
                                      </span>
                                  </center>
                              </td>
							
							<?php if ($itemJornada->Ocorrencia_id != 1) //SE ID OCORRENCIA == ID NORMAL 
								  {
									$desativado = "readonly style='background: #ccc;'";
								  }
								  else
								  {
									$desativado = "";
								  }
							?>
							  <td style="background:#CCC;"><center><input value="<?php echo $itemJornada->ent1; ?>"  type="text" id="iniEntrada<?php echo ($dia); ?>" onchange="horaMinuto(this.id)" name="iniEntrada<?php echo $dia; ?>" size="5" <?php echo ($desativado); ?> tabindex=<?php echo ($idTabIndex); ?>/></center></td>
							  <td style="background:#0C6;"><center><input value="<?php echo $itemJornada->sai1; ?>"  type="text" id="intSaida<?php   echo ($dia); ?>" onchange="horaMinuto(this.id)" name="intSaida<?php echo $dia; ?>"   size="5" <?php echo ($desativado); ?> tabindex=<?php echo ($idTabIndex+$quantLinhas); ?>/></center></td>
							  <td style="background:#0C6;"><center><input value="<?php echo $itemJornada->ent2; ?>"  type="text" id="intEntrada<?php echo ($dia); ?>" onchange="horaMinuto(this.id)" name="intEntrada<?php echo $dia; ?>" size="5" <?php echo ($desativado); ?> tabindex=<?php echo ($idTabIndex+($quantLinhas*2)); ?>/></center></td>
							  <td style="background:#CCC;"><center><input value="<?php echo $itemJornada->sai2; ?>"  type="text" id="fimSaida<?php   echo ($dia); ?>" onchange="horaMinuto(this.id)" name="fimSaida<?php echo $dia; ?>"   size="5" <?php echo ($desativado); ?> tabindex=<?php echo ($idTabIndex+($quantLinhas*3)); ?>/></center></td>
							  <td style="background:#6CF;"><center><input value="<?php echo $itemJornada->ent3; ?>"  type="text" id="extEntrada<?php echo ($dia); ?>" onchange="horaMinuto(this.id)" name="extEntrada<?php echo $dia; ?>" size="5" <?php echo ($desativado); ?> tabindex=<?php echo ($idTabIndex+($quantLinhas*4)); ?>/></center></td>
							  <td style="background:#6CF;"><center><input value="<?php echo $itemJornada->sai3; ?>"  type="text" id="extSaida<?php   echo ($dia); ?>" onchange="horaMinuto(this.id)" name="extSaida<?php echo $dia; ?>"   size="5" <?php echo ($desativado); ?> tabindex=<?php echo ($idTabIndex+($quantLinhas*5)); ?>/></center></td>												
			<?php   } ?>	
							 <td class="simples"><center><input type="text" id="totalMinuto<?php echo ($dia); ?>" name="totalMinuto<?php echo ($dia); ?>" size="5" disabled  /></center></td>						
							 <td class="simples"><center><input type="text" id="totalHora<?php   echo ($dia); ?>"   name="totalHora<?php echo ($dia); ?>" size="5" disabled  /></center></td>
							 
							 <td class="simples">
								<center>
									<select onchange="NovaJanela(this.value, <?php echo $idCartao; ?>, <?php echo $_SESSION['anoExer'];?> ,<?php echo $mesGenerico;?>, <?php echo ($dia); ?>)">
										<?php
											$listaSiglasOcorrencia = $OcorrenciaObj->ListarSiglaOcorrencia();
											foreach ($listaSiglasOcorrencia as $itemOcorrencia){
												
												if ($itemJornada->Ocorrencia_id == $itemOcorrencia->id){
													$selected = "selected";
												}else{
													$selected = "";
												}

												if ($itemOcorrencia->texto == 1 && $itemOcorrencia->anexo == '0'){
										?>
													<option <?php echo ($selected); ?> value="<?php echo $itemOcorrencia->texto.$itemOcorrencia->anexo.'|'.$itemOcorrencia->sigla.':'.$itemOcorrencia->id; ?>"><?php echo $itemOcorrencia->descricao; ?></option>
										<?php
												}else if ($itemOcorrencia->anexo == 1 && $itemOcorrencia->texto == '0'){
										?>
													<option <?php echo ($selected); ?> value="<?php echo $itemOcorrencia->texto.$itemOcorrencia->anexo.'|'.$itemOcorrencia->sigla.':'.$itemOcorrencia->id; ?>" ><?php echo $itemOcorrencia->descricao; ?></option>	
										<?php
												}else if ($itemOcorrencia->texto == 1 && $itemOcorrencia->anexo == 1){
										?>
													<option <?php echo ($selected); ?> value="<?php echo $itemOcorrencia->texto.$itemOcorrencia->anexo.'|'.$itemOcorrencia->sigla.':'.$itemOcorrencia->id; ?>" ><?php echo $itemOcorrencia->descricao; ?></option>		
										<?php	
												}else{
										?>
													<option <?php echo ($selected); ?> value="<?php echo '|'.$itemOcorrencia->sigla.':'.$itemOcorrencia->id; ?>"><?php echo $itemOcorrencia->descricao; ?> </option> 
										<?php	
												}
										}//FIM DO FOREACH
										?>
									</select>
									
								</center>
								<script> <!-- NovaJanela -->
									function NovaJanela(value, id, ano, mes, dia){
											
										//console.log("value: "+value+" id: "+id+" ano: "+ano+" mes: "+mes+" dia: "+dia);
										
										var total = value.length;
										var div = value.indexOf("|");
										var div2 = value.indexOf(":");
	
										var res = value.slice(0,div);	
										var res2 = value.slice(div+1,div2);
										var res3 = value.slice(div2+1,total);
										
										//console.log("res: "+res+" res2: "+res2+" res3: "+res3);

										if (res == 11)
										{
											//var url = "JusComTextoAnexo.view.php?&idCartao="+id+"&ano="+ano+"&mes="+mes+"&dia="+dia;
											//window.open(url, "_black", "width=500, height=400");
											document.getElementById('idOcorrencia'+dia).value = res3;
											
											document.getElementById('iniEntrada'+dia).value = res2;
											document.getElementById('iniEntrada'+dia).readOnly  = true;
											
											document.getElementById('intSaida'+dia).value = res2;
											document.getElementById('intSaida'+dia).readOnly  = true;
											
											document.getElementById('intEntrada'+dia).value = res2;
											document.getElementById('intEntrada'+dia).readOnly  = true;
											
											document.getElementById('fimSaida'+dia).value = res2;
											document.getElementById('fimSaida'+dia).readOnly  = true;
											
											document.getElementById('extEntrada'+dia).value = res2;
											document.getElementById('extEntrada'+dia).readOnly  = true;
											
											document.getElementById('extSaida'+dia).value = res2;
											document.getElementById('extSaida'+dia).readOnly  = true;
											
											document.getElementById('totalMinuto'+dia).value = res2;
											document.getElementById('totalHora'+dia).value = res2;
										}
										if (res == 10)
										{
											var url = "JusComTexto.view.php?&idCartao="+id+"&ano="+ano+"&mes="+mes+"&dia="+dia;
											//window.open(url, "_black", "width=500, height=400");
											document.getElementById('idOcorrencia'+dia).value = res3;
											
											document.getElementById('iniEntrada'+dia).value = res2;
											document.getElementById('iniEntrada'+dia).readOnly  = true;
											
											document.getElementById('intSaida'+dia).value = res2;
											document.getElementById('intSaida'+dia).readOnly  = true;
											
											document.getElementById('intEntrada'+dia).value = res2;
											document.getElementById('intEntrada'+dia).readOnly  = true;
											
											document.getElementById('fimSaida'+dia).value = res2;
											document.getElementById('fimSaida'+dia).readOnly  = true;
											
											document.getElementById('extEntrada'+dia).value = res2;
											document.getElementById('extEntrada'+dia).readOnly  = true;
											
											document.getElementById('extSaida'+dia).value = res2;
											document.getElementById('extSaida'+dia).readOnly  = true;
											
											document.getElementById('totalMinuto'+dia).value = res2;
											document.getElementById('totalHora'+dia).value = res2;
											
										}
										if (res == '01')
										{
											
											var url = "JusComAnexo.view.php?&idCartao="+id+"&ano="+ano+"&mes="+mes+"&dia="+dia;
											//window.open(url, "_black", "width=500, height=400");
											document.getElementById('idOcorrencia'+dia).value = res3;
																						
											document.getElementById('iniEntrada'+dia).value = res2;
											document.getElementById('iniEntrada'+dia).readOnly  = true;
											
											document.getElementById('intSaida'+dia).value = res2;
											document.getElementById('intSaida'+dia).readOnly  = true;
											
											document.getElementById('intEntrada'+dia).value = res2;
											document.getElementById('intEntrada'+dia).readOnly  = true;
											
											document.getElementById('fimSaida'+dia).value = res2;
											document.getElementById('fimSaida'+dia).readOnly  = true;
											
											document.getElementById('extEntrada'+dia).value = res2;
											document.getElementById('extEntrada'+dia).readOnly  = true;
											
											document.getElementById('extSaida'+dia).value = res2;
											document.getElementById('extSaida'+dia).readOnly  = true;
											
											document.getElementById('totalMinuto'+dia).value = res2;
											document.getElementById('totalHora'+dia).value = res2;
											
										}
										if (res2 != "NR")
										{
											console.log("res2: "+res2);
											document.getElementById('idOcorrencia'+dia).value = res3;
										
											document.getElementById('iniEntrada'+dia).value = res2;
											document.getElementById('iniEntrada'+dia).readOnly = true;
											$("#iniEntrada"+dia).css("background","#CCC");
											
											document.getElementById('intSaida'+dia).value = res2;
											document.getElementById('intSaida'+dia).readOnly  = true;
											$("#intSaida"+dia).css("background","#CCC");
											
											document.getElementById('intEntrada'+dia).value = res2;
											document.getElementById('intEntrada'+dia).readOnly  = true;
											$("#intEntrada"+dia).css("background","#CCC");
											
											document.getElementById('fimSaida'+dia).value = res2;
											document.getElementById('fimSaida'+dia).readOnly  = true;
											$("#fimSaida"+dia).css("background","#CCC");
											
											document.getElementById('extEntrada'+dia).value = res2;
											document.getElementById('extEntrada'+dia).readOnly  = true;
											$("#extEntrada"+dia).css("background","#CCC");
											
											document.getElementById('extSaida'+dia).value = res2;
											document.getElementById('extSaida'+dia).readOnly  = true;
											$("#extSaida"+dia).css("background","#CCC");
											
											document.getElementById('totalMinuto'+dia).value = res2;
											document.getElementById('totalHora'+dia).value = res2;
											
										}
										if (res2 == "NR")
										{
											//console.log("dia: "+dia+" res3: "+res3);
											
											//console.log("$('#BaseEnt1'+dia).val(): "+$("#BaseEnt1"+dia).val());
											
											document.getElementById('idOcorrencia'+dia).value = res3;
										
											document.getElementById('iniEntrada'+dia).value = "";
											document.getElementById('iniEntrada'+dia).readOnly  = false;                                                                       $("#iniEntrada"+dia).val($("#BaseEnt1"+dia).val());
                                            $("#iniEntrada"+dia).removeAttr('style');
											                                                      
											document.getElementById('intSaida'+dia).value = "";   
											document.getElementById('intSaida'+dia).readOnly  = false;
                                            $("#intSaida"+dia).val($("#BaseSai1"+dia).val());
                                            $("#intSaida"+dia).removeAttr( 'style' );
											                                                      
											document.getElementById('intEntrada'+dia).value = ""; 
											document.getElementById('intEntrada'+dia).readOnly  = false;
                                            $("#intEntrada"+dia).val($("#BaseEnt2"+dia).val());
                                            $("#intEntrada"+dia).removeAttr( 'style' );
                                            
											 
											document.getElementById('fimSaida'+dia).value = "";   
											document.getElementById('fimSaida'+dia).readOnly  = false;
                                            $("#fimSaida"+dia).val($("#BaseSai2"+dia).val());
                                            $("#fimSaida"+dia).removeAttr( 'style' );
                                            
											
											document.getElementById('extEntrada'+dia).value = ""; 
											document.getElementById('extEntrada'+dia).readOnly  = false;
                                            $("#extEntrada"+dia).val($("#BaseEnt3"+dia).val());
                                            $("#extEntrada"+dia).removeAttr( 'style' );
											
											document.getElementById('extSaida'+dia).value = "";   
											document.getElementById('extSaida'+dia).readOnly  = false;
                                            $("#extSaida"+dia).val($("#BaseSai3"+dia).val());
                                            $("#extSaida"+dia).removeAttr( 'style' );
											
											document.getElementById('totalMinuto'+dia).value = "";
											document.getElementById('totalHora'+dia).value = "";
										}
									}
								</script>
								
							  </td>
							  
						</tr>	
					
			<?php
                 $listaDias[] = $dia;
				 $idTabIndex = $idTabIndex+1; //ID PARA CONTROLAR TABINDEX
				 }//FIM DO FOREACH

				 $quant = count($listaDias);
				 $diasParametro = implode("|", $listaDias);
			?>
				<script> <!-- Calcula Tempo -->
						function CalculaTempo(dias){
													
							var diasResult = new Array();
							diasResult = dias.split("|");
											
							for (i in diasResult){
								diasResult[i] = parseInt(diasResult[i], 10);
							}
							
								document.getElementById('totalGeralMin').value = 0;
								document.getElementById('totalGeralHora').value = 0;
															
//							if (document.getElementById('totalGeralMin').value == "" && document.getElementById('totalGeralHora').value == "")
//							{
//								document.getElementById('totalGeralMin').value = 0;
//								document.getElementById('totalGeralHora').value = 0;
//							}
//							if (document.getElementById('totalGeralMin').value != '0' && document.getElementById('totalGeralHora').value != '0'){
//								document.getElementById('totalGeralMin').value = 0;
//								document.getElementById('totalGeralHora').value = 0;
//							}
							
							for (i = 0; i < diasResult.length; i++){
								
								var BaseEnt1 = document.getElementById('BaseEnt1' + diasResult[i]).value;
								var BaseSai1 = document.getElementById('BaseSai1' + diasResult[i]).value;
								var BaseEnt2 = document.getElementById('BaseEnt2' + diasResult[i]).value;
								var BaseSai2 = document.getElementById('BaseSai2' + diasResult[i]).value;
								var BaseEnt3 = document.getElementById('BaseEnt3' + diasResult[i]).value;
								var BaseSai3 = document.getElementById('BaseSai3' + diasResult[i]).value;
								
								// Inicio Entrada
								if (document.getElementById('iniEntrada' + diasResult[i]).id == 'iniEntrada' + diasResult[i])
								{
									
									var BaseEnt1 = BaseEnt1.split(':');
									var valor = document.getElementById('iniEntrada' + diasResult[i]).value.split(':');
									
									var horasTotalBase = parseInt(BaseEnt1[0], 10);
									var minutosTotalBase = parseInt(BaseEnt1[1], 10);
									var minutosBase = (horasTotalBase * 60) + minutosTotalBase;
									
									var horasTotalAplicacao = parseInt(valor[0], 10);
									var minutosTotalAplicacao = parseInt(valor[1], 10);	
									var minutosAplicacao = (horasTotalAplicacao * 60) + minutosTotalAplicacao;
									
//									console.log("horasTotalBase: "+horasTotalBase);
//									console.log("minutosTotalBase: "+minutosTotalBase);
//									console.log("minutosBase: "+minutosBase);
//									
//									console.log("horasTotalAplicacao: "+horasTotalAplicacao);
//									console.log("minutosTotalAplicacao: "+minutosTotalAplicacao);
//									console.log("minutosAplicacao: "+minutosAplicacao);
									
									if (minutosBase <= minutosAplicacao){
										var tTotalEnt1 = minutosBase - minutosAplicacao;
											document.getElementById('totalMinuto' + diasResult[i]).value = tTotalEnt1;
											document.getElementById('totalHora' + diasResult[i]).value 	 = tTotalEnt1 / 60;																			
									}else{
										var tTotalEnt1 = minutosAplicacao - minutosBase;
											document.getElementById('totalMinuto' + diasResult[i]).value = tTotalEnt1;
											document.getElementById('totalHora' + diasResult[i]).value 	 = tTotalEnt1 / 60;
									}		
								}
								
								if (document.getElementById('intSaida' + diasResult[i]).id == 'intSaida' + diasResult[i]){
									
									var BaseSai1 = BaseSai1.split(':');
									var valor = document.getElementById('intSaida' + diasResult[i]).value.split(':');
									
									var horasTotalBase = parseInt(BaseSai1[0], 10);
									var minutosTotalBase = parseInt(BaseSai1[1], 10);
									var minutosBase = (horasTotalBase * 60) + minutosTotalBase;
									
									var horasTotalAplicacao = parseInt(valor[0], 10);
									var minutosTotalAplicacao = parseInt(valor[1], 10);	
									var minutosAplicacao = (horasTotalAplicacao * 60) + minutosTotalAplicacao;
									
									if (minutosBase <= minutosAplicacao){
										var tTotalSai1 = minutosAplicacao - minutosBase;
											tTotalSai1 = parseInt(document.getElementById('totalMinuto' + diasResult[i]).value) + parseInt(tTotalSai1);
											document.getElementById('totalMinuto' + diasResult[i]).value = tTotalSai1;
											document.getElementById('totalHora' + diasResult[i]).value 	 = tTotalSai1 / 60;

									}else{
										var tTotalSai1 = minutosAplicacao - minutosBase;
											tTotalSai1 = parseInt(document.getElementById('totalMinuto' + diasResult[i]).value) + parseInt(tTotalSai1);
											document.getElementById('totalMinuto' + diasResult[i]).value = tTotalSai1;
											document.getElementById('totalHora' + diasResult[i]).value 	 = tTotalSai1 / 60;
									}		
								}if (document.getElementById('intEntrada' + diasResult[i]).id == 'intEntrada' + diasResult[i]){
									
									var BaseEnt2 = BaseEnt2.split(':');
									var valor = document.getElementById('intEntrada' + diasResult[i]).value.split(':');
									
									var horasTotalBase = parseInt(BaseEnt2[0], 10);
									var minutosTotalBase = parseInt(BaseEnt2[1], 10);
										var minutosBase = (horasTotalBase * 60) + minutosTotalBase;
									
									var horasTotalAplicacao = parseInt(valor[0], 10);
									var minutosTotalAplicacao = parseInt(valor[1], 10);	
										var minutosAplicacao = (horasTotalAplicacao * 60) + minutosTotalAplicacao;
									
									if (minutosBase <= minutosAplicacao){
										var tTotalEnt2 = minutosBase - minutosAplicacao;
											tTotalEnt2 = parseInt(document.getElementById('totalMinuto' + diasResult[i]).value) + parseInt(tTotalEnt2);
											document.getElementById('totalMinuto' + diasResult[i]).value = tTotalEnt2;
											document.getElementById('totalHora' + diasResult[i]).value 	 = tTotalEnt2 / 60;
									}else{
										var tTotalEnt2 = minutosAplicacao - minutosBase;
											tTotalEnt2 = parseInt(document.getElementById('totalMinuto' + diasResult[i]).value) + parseInt(tTotalEnt2);
											document.getElementById('totalMinuto' + diasResult[i]).value = tTotalEnt2;
											document.getElementById('totalHora' + diasResult[i]).value 	 = tTotalEnt2 / 60;
									}		
								}if (document.getElementById('fimSaida' + diasResult[i]).id == 'fimSaida' + diasResult[i]){
									
									var BaseSai2 = BaseSai2.split(':');
									var valor = document.getElementById('fimSaida' + diasResult[i]).value.split(':');
									
									var horasTotalBase = parseInt(BaseSai2[0], 10);
									var minutosTotalBase = parseInt(BaseSai2[1], 10);
										var minutosBase = (horasTotalBase * 60) + minutosTotalBase;
									
									var horasTotalAplicacao = parseInt(valor[0], 10);
									var minutosTotalAplicacao = parseInt(valor[1], 10);	
									var minutosAplicacao = (horasTotalAplicacao * 60) + minutosTotalAplicacao;
									
									if (minutosBase <= minutosAplicacao){
										var tTotalSai2 = minutosAplicacao - minutosBase;
											tTotalSai2 = parseInt(document.getElementById('totalMinuto' + diasResult[i]).value) + parseInt(tTotalSai2);
											document.getElementById('totalMinuto' + diasResult[i]).value = tTotalSai2;
											document.getElementById('totalHora' + diasResult[i]).value 	 = tTotalSai2 / 60;
									}else{
										var tTotalSai2 = minutosAplicacao - minutosBase;
											tTotalSai2 = parseInt(document.getElementById('totalMinuto' + diasResult[i]).value) + parseInt(tTotalSai2);
											document.getElementById('totalMinuto' + diasResult[i]).value = tTotalSai2;
											document.getElementById('totalHora' + diasResult[i]).value 	 = tTotalSai2 / 60;
									}		
								}if (document.getElementById('extEntrada' + diasResult[i]).id == 'extEntrada' + diasResult[i]){
									var valor = document.getElementById('extEntrada' + diasResult[i]).value.split(':');
																	
									var horasTotalAplicacao = parseInt(valor[0], 10);
									var minutosTotalAplicacao = parseInt(valor[1], 10);	
									var minutosAplicacao = (horasTotalAplicacao * 60) + minutosTotalAplicacao;
										tTotalEnt3 = parseInt(minutosAplicacao);
											
								}
								
								if (document.getElementById('extSaida' + diasResult[i]).id == 'extSaida' + diasResult[i])
								{
									var valor = document.getElementById('extSaida' + diasResult[i]).value.split(':');
									
									var horasTotalAplicacao = parseInt(valor[0], 10);
									var minutosTotalAplicacao = parseInt(valor[1], 10);	
									var minutosAplicacao = (horasTotalAplicacao * 60) + minutosTotalAplicacao;
																					
									var tTotalSai3 = parseInt(minutosAplicacao) - parseInt(tTotalEnt3);
									tTotalSai3 = parseInt(document.getElementById('totalMinuto' + diasResult[i]).value) + parseInt(tTotalSai3);
										document.getElementById('totalMinuto' + diasResult[i]).value = tTotalSai3;
										document.getElementById('totalHora' + diasResult[i]).value 	 = tTotalSai3 / 60;
										
								}
								
								if (document.getElementById('iniEntrada' + diasResult[i]).value.indexOf(":") < 1){
										document.getElementById('totalMinuto' + diasResult[i]).value = document.getElementById('iniEntrada' + diasResult[i]).value;
										document.getElementById('totalHora' + diasResult[i]).value = document.getElementById('iniEntrada' + diasResult[i]).value;
								
								}
								
								if (document.getElementById('iniEntrada' + diasResult[i]).value.indexOf(":") < 1)
								{		
									var t1 = parseInt(document.getElementById('totalGeralMin').value)  + 0;
									var t2 = parseInt(document.getElementById('totalGeralHora').value) + 0;
									
								}else{
									var t1 = parseInt(document.getElementById('totalMinuto' + diasResult[i]).value) + parseInt(document.getElementById('totalGeralMin').value);
									var t2 = parseInt(document.getElementById('totalHora' + diasResult[i]).value) + parseInt(document.getElementById('totalGeralHora').value);
								}
								
//								console.log("parseInt(t2): " + parseInt(t2));
//									console.log("document.getElementById('totalGeralMin').value: " + document.getElementById('totalGeralMin').value);
									document.getElementById('totalGeralMin').value  = parseInt(t1);
									document.getElementById('totalGeralHora').value = parseInt(t2);	
								
							}//FIM DO FOR
								
						}//FIM DA FUNCTION
					</script>	
            <tr class="simples">
                <td colspan="8" class="simples" style="color:#fff"><center><input type="button" onclick="CalculaTempo('<?php echo $diasParametro; ?>')" value="CALCULAR TOTAL GERAL" /></center></td>
                <td><center><input type="text" name="totalGeralMin" id="totalGeralMin" size="5" disabled /></center></td>
                <td><center><input type="text" name="totalGeralHora" id="totalGeralHora" size="5" disabled /></center></td>
                <td>&nbsp;</td>
 			</tr>
      </table>
	</form>  
      <p>&nbsp;</p>
    </div><!--FIM DA DIV BOX TABELA JORNADA-->
	
<?php
if (isset($_POST['incluir']))
{
	
	foreach($listaDias as $dia)
	{		       	
        
        $incluirIdCartao      = $_POST["idJornadaCartao$dia"];
        $incluirDia 		  = $_POST["dia$dia"];
        $incluirMes 		  = $_POST["mes$dia"];
        $incluirAno 		  = $_POST["ano$dia"];
        $incluirIniEntrada    = $_POST["iniEntrada$dia"];
        $incluirIntEntrada    = $_POST["intEntrada$dia"];
        $incluirExtEntrada    = $_POST["extEntrada$dia"];
        $incluirIntSaida      = $_POST["intSaida$dia"];
        $incluirFimSaida      = $_POST["fimSaida$dia"];
        $incluirExtSaida      = $_POST["extSaida$dia"];	
        $incluirNumDiaSemana  = $_POST["numDiaSemana$dia"];
        $incluirOcorrencia    = $_POST["ocorrencia$dia"];
        $incluirTipoCartaoId  = $_POST["idCartao"];
        $incluirColaboradorId = $_POST["idCol"];
        $incluirJustId        = 'NULL'; // AINDA SEM TRATAMENTO     	
        
        $incluirCartaoObj = new Cartao();
		
		$incluirCartaoObj->setValue('ano', $incluirAno); 				
		$incluirCartaoObj->setValue('mes', $incluirMes);				
		$incluirCartaoObj->setValue('dia', $incluirDia); 				
		$incluirCartaoObj->setValue('ent1', $incluirIniEntrada); 				
		$incluirCartaoObj->setValue('ent2', $incluirIntEntrada);				
		$incluirCartaoObj->setValue('ent3', $incluirExtEntrada); 				
		$incluirCartaoObj->setValue('sai1', $incluirIntSaida); 				
		$incluirCartaoObj->setValue('sai2', $incluirFimSaida); 				
		$incluirCartaoObj->setValue('sai3', $incluirExtSaida); 				
		$incluirCartaoObj->setValue('diaSemana', $incluirNumDiaSemana); 		
		$incluirCartaoObj->setValue('Ocorrencia_id', $incluirOcorrencia); 	
		$incluirCartaoObj->setValue('TipoCartao_id', $incluirTipoCartaoId);
		$incluirCartaoObj->setValue('Colaborador_id', $incluirColaboradorId);
		$incluirCartaoObj->setValue('Justificativa_id', $incluirJustId);
        
        /*
		echo ("IdCartao: ".$incluirIdCartao.
              " Ano:     ".$incluirAno.
              " Mes:     ".$incluirMes.
              " Dia      ".$incluirDia.
              " IniEnt   ".$incluirIniEntrada.
              " IntEnt   ".$incluirIntEntrada.
              " ExtEnt   ".$incluirExtEntrada.
              " IntSai   ".$incluirIntSaida.
              " FimSai   ".$incluirFimSaida.
              " ExtSai   ".$incluirExtSaida.
              " NumDia   ".$incluirNumDiaSemana.
              " Ecorre   ".$incluirOcorrencia.
              " TCarId   ".$incluirTipoCartaoId.
              " ColaId   ".$incluirColaboradorId.
              " JustId   ".$incluirJustId."</br>");
		*/
        
		if ($_POST['lancado'] == 1){
			$incluirCartaoObj->Atualizar($incluirCartaoObj, $incluirIdCartao);	
?>
			<script>
				//location.href = "?menu=mantercartao";
			</script>
<?php
		}else{
			$incluirCartaoObj->Inserir($incluirCartaoObj);	
			?>
			<script>
				//location.href = "?menu=mantercartao";
			</script>
<?php
		}
		
		
	}//FIM DO FOR
		
	if ($_POST['lancado'] == 1){
		$atualizarLancado = 1;
	}else{
		$atualizarLancado = 1;
	}
	
	$atualizarCancelado = $_POST['cancelado'];
	$atualizarIdCol     = $_POST['idCol'];
    $atualizarMes       = $_POST['mes'];
    $atualizarAno       = $_POST['ano'];
    $atualizarAssinado  = isset($_POST['assinado']) ? "1" : 0;
	
	echo ("atualizarAssinado: ".$atualizarAssinado);
	
	require_once("../Entity/TipoCartao.class.php");
	
    
    $tipoCartaoObj = new TipoCartao();
	
	$tipoCartaoObj->setValue('mes', $atualizarMes);
	$tipoCartaoObj->setValue('lancado', $atualizarLancado);
	$tipoCartaoObj->setValue('cancelado', $atualizarCancelado);
	$tipoCartaoObj->setValue('ano', $atualizarAno);
	$tipoCartaoObj->setValue('colaborador_id', $atualizarIdCol);
	$tipoCartaoObj->setValue('assinado', $atualizarAssinado);
	
	/*
    echo ("lancado - ".$atualizarLancado.
          " - cancelado ".$atualizarCancelado.
          " - colaborador_id ".$atualizarIdCol.
          " - Mes ".$atualizarMes.
          " - Ano ".$atualizarAno.
          " - idtipoCar ".$incluirTipoCartaoId."</br>");
    */
	
	$tipoCartaoObj->Atualizar($tipoCartaoObj, $incluirTipoCartaoId);

?>
	<script>
		alert ("Cartão lancado com sucesso!");
//		location.href = "?menu=mantercartao";
	</script>
    
<?php
}
?>	
</body>
</html>