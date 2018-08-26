<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="Js/jquery-1.5.2.min.js"></script>
<script src="Js/jquery.maskedinput-1.3.min.js"></script>
</head>
<?php
	require_once("Style.php");
	require_once("../Entity/TipoJornada.class.php");
	require_once("../Entity/Ocorrencia.class.php");
	require_once("../Entity/Jornada.class.php");
	require_once("../Business/EnumGenerico.class.php");
	
	$tipoJornada  = new TipoJornada();
	$ocorrencia   = new Ocorrencia();
	$enumGenerico = new EnumGenerico();
		
	$listaDiasSemana = $enumGenerico->ListarDiasSemana();	
	
?>
<body>
	<br />
	<div class="boxcadastro">
    	<div class="boxtitulo">
       	  	<p style="	width:80px;">JORNADA</p>
   		</div><!--FIM DA DIV BOX TITULO-->
		<form method="post">   
			<table width="500" class="formcadastro">
				<tr>
					<td>DESCRIÇÃO</td>
					<td>
						<select name="tipoJornadaId">
							<option select value="0">Todos</option>	
							<?php
								$listaTiposJornada = $tipoJornada->ListaTiposJornada();
							
								foreach ($listaTiposJornada as $itemTipoJornada)
								{
							?>
									<option value="<?php echo ($itemTipoJornada->id)?>">
										<?php echo $itemTipoJornada->descricao ?>									
									</option>
							<?php
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>DESLIGADA</td>
					<td><select name="desligada">
							<option value="2">Todos</option>
							<option value="1">Sim</option>
							<option value="0">Não</option>
						</select>
					</td>
					<td>
						<input type="submit" name="buscar" value="BUSCAR" />
					</td>
					<td>
						<input type="submit" name="novo" value="NOVO"/>

					</td>
				</tr>
			</table>
		</form>	
        </br>
	</div><!--FIM DA DIV BOX Gerenciar-->
<?php
if (isset($_POST['buscar']))
	{
	$tipoJornadaId = $_POST['tipoJornadaId'];
	$desligada = $_POST['desligada'];
	//echo ("tipoJornadaId = ".$tipoJornadaId." -- desligada = ".$desligada);
?>
    <div class="boxManter">
        <table width="900" border="1" bordercolor="#000000" class="tbManter">
              <tr style="background:#999; margin:0 auto; font-weight:bold; font-family:calibri;">
                    <td width="120"><center>MANTER</center></td>
					<td width="120"><center>CÓDIGO</center></td>
                    <td width="700"><center>DESCRIÇÃO</center></td>
                    <td width="120"><center>DESLIGADA</center></td>
              </tr>
			  <?php
					$ListaTiposJornada = $tipoJornada->ListaTipoJornadaFiltro($tipoJornadaId, $desligada);
					if (empty($ListaTiposJornada))
					{
						echo "<center><strong>Não existe jornada com esses filtros!</strong></center>";
					}else{
						foreach ($ListaTiposJornada as $itemTipoJornada)
						{
			  ?>
							<form method="post">	
								<tr>
									<td>
										<center>
											<input  type="submit" name="alterar" value="ALTERAR"/>
										</center>
									</td>
									<input type="hidden" name="idJornada" value="<?php echo $itemTipoJornada->id; ?>" />
									<td>
										<center>
											<?php echo $itemTipoJornada->codigo ?>
											<input type="hidden" name="codigoJornda" 
												   value="<?php echo $itemTipoJornada->codigo ?>"/>
										</center>
									</td>
									<td>
										<center>
											<?php echo $itemTipoJornada->descricao ?>
											<input type="hidden" name="descricaoJornda" 
												   value="<?php echo $itemTipoJornada->descricao ?>"/>										</center>
									</td>
									<?php
										if ($itemTipoJornada->desativado == 1){
									?>
									<td>
										<center>
											<input style="border: 3px solid #900;" type="submit" name="desativadoJornada" 
												   value="<?php echo $enumGenerico->Status($itemTipoJornada->desativado); ?>" />
										</center>
									</td>
									<?php
										}else{
									?>	
									<td>
										<center>
											<input style="border: 3px solid #060;" type="submit" name="desativadoJornada" 
												   value="<?php echo $enumGenerico->Status($itemTipoJornada->desativado); ?>" />
										</center>
									</td>
									<?php
										}
									?>
							  </tr>
							</form>
			  <?php
						}
					}
			  ?>
    </table>
    </div><!--FIM DA DIV TBMANTER-->
<?php
}
?>
<?php
//DESLIGAR TIPO DE JORNADA
if (isset($_POST['desativadoJornada']))
	{

	$idJornada         = $_POST['idJornada'];
	$codigoJornda      = $_POST['codigoJornda'];
	$descricaoJornda   = $_POST['descricaoJornda'];
	$desativadoJornada = $_POST['desativadoJornada'];
	
	if ($desativadoJornada == "Sim"){
		$numDesligado = '0';
	}else if ($desativadoJornada == "Não"){
		$numDesligado = 1;
	}

	$TipoJornada = new TipoJornada();
	
	$TipoJornada->setValue('id',$codigoJornda);
	$TipoJornada->setValue('codigo',$codigoJornda);
	$TipoJornada->setValue('desativado',$numDesligado);
	$TipoJornada->setValue('descricao',$descricaoJornda);
	
	$TipoJornada->Atualizar($TipoJornada, $idJornada);
?>
		<script>
			alert ("Jornada desativada com sucesso!");
		</script>
<?php	
	}	
?>

<?php
//INCLUIR NOVA JORNADA
if (isset($_POST['novo']))
{
?>
		<div class="boxcadastro" style="margin-top:20px;">
			<div class="boxtitulo">
				<p style="	width:150px;">INCLUIR JORNADA</p>
			</div><!--FIM DA DIV BOX TITULO-->
		<form method="post">		
			<table width="500" class="formcadastro">
				<tr>
					<td>CÓDIGO<b style="color:red;">*</b></td>
					<td><input type="number" name="incluirCodigo" required/></td>
				</tr>
				<tr>
					<td>DESCRIÇÃO<b style="color:red;">*</b></td>
					<td><input type="text" name="incluirDescricao" required/></td>
				</tr>
				<tr>
					<td>TOTAL HORAS MÊS<b style="color:red;">*</b></td>
					<td><input type="number" name="incluirTotalHorasMes" required/></td>
					<td>
						<input type="submit" name="incluir" value="GRAVAR" />
					</td>
				</tr>
		  </table>
				</br>
		</div><!--FIM DA DIV BOX Gerenciar-->
			
			<div class="BoxTabelaJornada">
			
				<table width="800" border="0" align="center" cellpadding="0" bordercolorlight="#fff">
					  <tr>
						<td rowspan="2" class="duaslinhas"><center><span>DATA</span></center></td>
						<td class="simples"><center><span>INÍCIO</span></center></td>
						<td colspan="2" class="duascolunas" style="	background:#030;"><center><span>INTERVALO</span></center></td>
						<td class="simples"><center><span>FIM</span></center></td>
						<td colspan="2" class="duascolunas" style="background:#006; color:#FFF;"><center>EXTRA</center></td>
						<td rowspan="2" class="duaslinhas" style="color:#FFF;"><center>OCORRÊNCIA</center></td>
					  </tr>
					  <tr>
						<td class="simples" style="background:#CCC; color:#000;"><center>ENTRADA</center></td>
						<td class="simples" style="background:#093; font-weight:bold;"><center>SAÍDA</center></td>
						<td class="simples" style="background:#093; font-weight:bold;"><center>ENTRADA</center></td>
						<td class="simples" style="background:#CCC;"><center>SAÍDA</center></td>
						<td class="simples" style="background:#06F;"><center>ENTRADA</center></td>
						<td class="simples" style="background:#06F;"><center>SAÍDA</center></td>
					  </tr>
					  <?php
						$ativo = 1;
						$idTabIndex = 1;
						foreach ($listaDiasSemana as $item)
						{
							
					  ?>
					  <tr>
						<td class="simples">
							<center>
								<span><?php echo $item?></span>
							</center>
						</td>							  
						<td style="background:#CCC;">
							<center>
								<input type="text" name="incluirIniEntrada[]" id="incluirIniEntrada<?php echo $item; ?>" 
									   size="5" onchange="horaMinuto(this.id, <?php echo $ativo; ?>)"
									   tabindex=<?php echo ($idTabIndex); ?>/>
							</center>
						</td>
						<td style="background:#0C6;">
							<center>
								<input type="text" name="incluirIntSaida[]" id="incluirIntSaida<?php echo $item; ?>" 
									   size="5" onchange="horaMinuto(this.id, <?php echo $ativo; ?>)"
									   tabindex=<?php echo ($idTabIndex+7); ?>/>
							</center>
						</td>
						<td style="background:#0C6;">
							<center>
								<input type="text" name="incluirIntEntrada[]" id="incluirIntEntrada<?php echo $item; ?>" 
									   size="5" onchange="horaMinuto(this.id, <?php echo $ativo; ?>)"
									   tabindex=<?php echo ($idTabIndex+14); ?>/>
							</center>
						</td>
						<td style="background:#CCC;">
							<center>
								<input type="text" name="incluirFimSaida[]" id="incluirFimSaida<?php echo $item; ?>" 
									   size="5" onchange="horaMinuto(this.id, <?php echo $ativo; ?>)"
									   tabindex=<?php echo ($idTabIndex+21); ?>/>
							</center>
						</td>
						<td style="background:#6CF;">
							<center>
								<input type="text" name="incluirExtEntrada[]" id="incluirExtEntrada<?php echo $item; ?>" 
									   size="5" onchange="horaMinuto(this.id, <?php echo $ativo; ?>)"
									   tabindex=<?php echo ($idTabIndex+28); ?>/>
							</center>
						</td>
						<td style="background:#6CF;">
							<center>
								<input type="text" name="incluirExtSaida[]" id="incluirExtSaida<?php echo $item; ?>" 
									   size="5" onchange="horaMinuto(this.id, <?php echo $ativo; ?>)"
									   tabindex=<?php echo ($idTabIndex+35); ?>/>
							</center>
						</td>
						<td class="simples">
							<center>
								<select onChange="TrataOcorrencia(this.value, '<?php echo $item; ?>')"
										tabindex=<?php echo ($idTabIndex+42); ?> >
									<?php
										$listaOcorrencia = $ocorrencia->ListarSiglaOcorrencia();
										foreach ($listaOcorrencia as $itemOcorrencia){
									?>
											<option value="<?php echo $itemOcorrencia->id."|".$itemOcorrencia->sigla; ?>" >
												<?php echo $itemOcorrencia->descricao?>
											</option>
									<?php
										}
									?>
								</select>
							</center>
						</td>
					  </tr>
					  <input type="hidden" id="idOcorrencia<?php echo $item; ?>"  name="incluirOcorrencia[]" value="1" />
					  <input type="hidden"  name="incluirDiaSemana[]" value="<?php echo $enumGenerico->ConvDiaSemana($item); ?>" />
					  <?php
							$idTabIndex++;	
					  	}
					  ?>
				</table>

		</form>	
			</div><!--FIM DA DIV BOX TABELA JORNADA-->
<?php
}
?>

<?php
//BOX DE INCLUIR NOVA JORNADA
if (isset($_POST['incluir']))
{

	//INCLUIR TIPOJORNADA
		$incluirCodigo    = $_POST['incluirCodigo'];
		$incluirDescricao = $_POST['incluirDescricao'];
		$incluirTotalHorasMes = $_POST['incluirTotalHorasMes'];
		
		if (!empty($incluirCodigo) && !empty($incluirDescricao) && !empty($incluirTotalHorasMes))
		{

			$tipoJornada = new TipoJornada();
			
			$tipoJornada->setValue('codigo',$incluirCodigo);
			$tipoJornada->setValue('descricao',$incluirDescricao);
		    $tipoJornada->setValue('desativado','0');
		    $tipoJornada->setValue('totalHorasMes',$incluirTotalHorasMes);
			
			$resultTipoJornada = $tipoJornada->ConsultarTipoJornadaCodigo($incluirCodigo);
			
			if(empty($resultTipoJornada))
			{
				$tipoJornada->Inserir($tipoJornada);
				
				$tipoJornada = new TipoJornada();
				
				$resultTipoJornada = $tipoJornada->ConsultarTipoJornadaCodigo($incluirCodigo);
				
			}else
			{
				echo ("<center><strong>O código já está cadastrado</strong></center>");
			}
			
			if(!empty($resultTipoJornada))
			{
				foreach ($resultTipoJornada as $itemTipoJornada)
				{
					if ($itemTipoJornada->id <> 0)
					{
						$idTipoJornada = $itemTipoJornada->id; //RECUPERANDO ID DO TIPOJORNADA
					}
				}
			}else
			{
				echo ("<center><strong>Não foi possivel recuperar o ID do TipoJornada</strong></center>");
			}
			
	
		}else
		{
			echo ("<center><strong>Preencha os campos obrigatórios!</center></strong>");
		}		
	//FIM DO INLCUIR TIPOJORNADA
	
	//INCLUIR JORNADA
		$incluirIniEntrada = $_POST['incluirIniEntrada'];
		$incluirIntSaida   = $_POST['incluirIntSaida'];
		$incluirIntEntrada = $_POST['incluirIntEntrada'];
		$incluirFimSaida   = $_POST['incluirFimSaida'];
		$incluirExtEntrada = $_POST['incluirExtEntrada'];
	    $incluirExtSaida   = $_POST['incluirExtSaida'];
		$incluirOcorrencia = $_POST['incluirOcorrencia'];
		$incluirDiaSemana  = $_POST['incluirDiaSemana'];
	
		//echo("=================<br>".$idTipoJornada); 
	
		if(!empty($idTipoJornada))
		{
			for ($i=0; $i<7; $i++)
			{
				/*
				echo "<br> I - ".$i.
					 " - DIASEM ".($incluirDiaSemana[$i]).
					 " - ENT1 ".$incluirIniEntrada[$i].
					 " - ENT2 ".$incluirIntEntrada[$i].
					 " - ENT3 ".$incluirExtEntrada[$i].
					 " - SAI1 ".$incluirIntSaida[$i].
					 " - SAI2 ".$incluirFimSaida[$i].
					 " - SAI3 ".$incluirExtSaida[$i].
					 " - IDOCORR ".$incluirOcorrencia[$i].
					 " - IDJOR ".$idTipoJornada."<br>";
				*/
				
				$jornada = new Jornada();
				
				$jornada->setValue('ent1',	empty($incluirIniEntrada[$i]) ? "00:00" : $incluirIniEntrada[$i]);
				$jornada->setValue('ent2',	empty($incluirIntEntrada[$i]) ? "00:00" : $incluirIntEntrada[$i]);
				$jornada->setValue('ent3',	empty($incluirExtEntrada[$i]) ? "00:00" : $incluirExtEntrada[$i]);
				$jornada->setValue('sai1',	empty($incluirIntSaida[$i])   ? "00:00" : $incluirIntSaida[$i]);
				$jornada->setValue('sai2',	empty($incluirFimSaida[$i])   ? "00:00" : $incluirFimSaida[$i]);
				$jornada->setValue('sai3',	empty($incluirExtSaida[$i])   ? "00:00" : $incluirExtSaida[$i]);
				$jornada->setValue('diaSemana',$incluirDiaSemana[$i]);
				$jornada->setValue('Ocorrencia_id',$incluirOcorrencia[$i]);
				$jornada->setValue('TipoJornada_id',$idTipoJornada);
				
				//print_r("==========================<br>");
				//print_r($jornada);
				
				$jornada->Inserir($jornada);
			}	
			echo ("<center><strong>Jornada incluida com sucesso</strong></center>");	
		}
		else
		{	
			echo ("<center><strong>Preencha os campos obrigatórios!</strong></center>");		
		}

	}	
?>

<?php
//ALTERAR JORNADA
if (isset($_POST['alterar']))
{
		$alterarIdJornada = $_POST['idJornada'];
	
		$tipoJornadaObjeto  = new tipoJornada();
			$altTipoJornada = $tipoJornadaObjeto->AlterarTipoJornada($alterarIdJornada);

		$jornadaObjeto = new Jornada();
			$altJornada = $jornadaObjeto->ListarJornadaPorIdTipoJornada($alterarIdJornada);

		//print_r($altJornada);
	
?>
<div class="boxcadastro" style="margin-top:20px;">
    <div class="boxtitulo">
   		<p style="	width:157px;">ALTERAR JORNADA</p>
   	</div><!--FIM DA DIV BOX TITULO-->      
<?php
	foreach ($altTipoJornada as $item)
	{
		//echo $item->id;
?>	
		
	<form method="post">
		<table width="500" class="formcadastro">
				<tr>
					<td>CÓDIGO<b style="color:red;">*</b></td>
					<td><input required type="number" name="alterarCodigo" value="<?php echo $item->codigo; ?>" required/></td>
					<input type="hidden" name="alterarDesativado" value="<?php echo $item->desativado; ?>" />
					<input type="hidden" name="alteraridTipoJornada" value="<?php echo $item->id; ?>" />
					
				</tr>
				<tr>
					<td>DESCRIÇÃO<b style="color:red;">*</b></td>
					<td><input required type="text" name="alterarDescricao" value="<?php echo $item->descricao; ?>" required/></td>
				</tr>
				<tr>
					<td>TOTAL HORAS MÊS<b style="color:red;">*</b></td>
					<td><input required type="number" name="alterarTotalHorasMes" value="<?php echo $item->totalHorasMes; ?>" required/></td>
					<td><input type="submit" name="atualizar" value="ALTERAR" /></td>
				</tr>  
			</table>
  	<?php
	}
	?>	
        </br>
</div><!--FIM DA DIV BOX Gerenciar-->
    <div class="BoxTabelaJornada">
        <table width="800" border="0" align="center" cellpadding="0" bordercolorlight="#fff">
              <tr>
                <td rowspan="2" class="duaslinhas"><center><span>DATA</span></center></td>
                <td class="simples"><center><span>INÍCIO</span></center></td>
                <td colspan="2" class="duascolunas" style="	background:#030;"><center><span>INTERVALO</span></center></td>
                <td class="simples"><center><span>FIM</span></center></td>
                <td colspan="2" class="duascolunas" style="background:#006; color:#FFF;"><center>EXTRA</center></td>
                <td rowspan="2" class="duaslinhas" style="color:#FFF;"><center>OCORRÊNCIA</center></td>
              </tr>
              <tr>
                <td class="simples" style="background:#CCC; color:#000;"><center>ENTRADA</center></td>
                <td class="simples" style="background:#093; font-weight:bold;"><center>SAÍDA</center></td>
                <td class="simples" style="background:#093; font-weight:bold;"><center>ENTRADA</center></td>
                <td class="simples" style="background:#CCC;"><center>SAÍDA</center></td>
                <td class="simples" style="background:#06F;"><center>ENTRADA</center></td>
                <td class="simples" style="background:#06F;"><center>SAÍDA</center></td>
              </tr>
			  <script>
					function TrataOcorrencia2(value, item)
				  		{						
								//console.log(value+" - "+item);
								var div = value.indexOf("|");
								var total = value.length;
								
								var res = value.slice(0, div);	
								var res2 = value.slice(div+1,total);
								//console.log(res);

								if (res2 != "NR")
								{		
									//console.log("RES: "+res+" item: "+item);
									document.getElementById("alterarOcorrencia"+item).value = res;	
																
									document.getElementById("alterarIniEntrada"+item).value = res2;	
									document.getElementById("alterarIniEntrada"+item).readOnly  = true;
									document.getElementById("alterarIniEntrada"+item).style.backgroundColor = "#CCC";					
									
									document.getElementById("alterarIntSaida"+item).value = res2;							
									document.getElementById("alterarIntSaida"+item).readOnly  = true;
									document.getElementById("alterarIntSaida"+item).style.backgroundColor = "#CCC";
									
									document.getElementById("alterarIntEntrada"+item).value = res2;							
									document.getElementById("alterarIntEntrada"+item).readOnly  = true;	
									document.getElementById("alterarIntEntrada"+item).style.backgroundColor = "#CCC";									
									
									document.getElementById("alterarFimSaida"+item).value = res2;							
									document.getElementById("alterarFimSaida"+item).readOnly  = true;
									document.getElementById("alterarFimSaida"+item).style.backgroundColor = "#CCC";
									
									document.getElementById("alterarExtEntrada"+item).value = res2;							
									document.getElementById("alterarExtEntrada"+item).readOnly  = true;
									document.getElementById("alterarExtEntrada"+item).style.backgroundColor = "#CCC";
									
									document.getElementById("alterarExtSaida"+item).value = res2;							
									document.getElementById("alterarExtSaida"+item).readOnly  = true;
									document.getElementById("alterarExtSaida"+item).style.backgroundColor = "#CCC";
									
								}
								else
								{
									//console.log(item);
									document.getElementById("alterarOcorrencia"+item).value = res;
									
									document.getElementById("alterarIniEntrada"+item).value = "00:00";
									document.getElementById("alterarIniEntrada"+item).style.backgroundColor = "#FFF";
									document.getElementById("alterarIniEntrada"+item).readOnly  = false;
									
									document.getElementById("alterarIntSaida"+item).value = "00:00";
									document.getElementById("alterarIntSaida"+item).style.backgroundColor = "#FFF";
									document.getElementById("alterarIntSaida"+item).readOnly  = false;
									
									document.getElementById("alterarIntEntrada"+item).value = "00:00";
									document.getElementById("alterarIntEntrada"+item).style.backgroundColor = "#FFF";
									document.getElementById("alterarIntEntrada"+item).readOnly  = false;
									
									document.getElementById("alterarFimSaida"+item).value = "00:00";
									document.getElementById("alterarFimSaida"+item).style.backgroundColor = "#FFF";
									document.getElementById("alterarFimSaida"+item).readOnly  = false;
									
									document.getElementById("alterarExtEntrada"+item).value = "00:00";
									document.getElementById("alterarExtEntrada"+item).style.backgroundColor = "#FFF";
									document.getElementById("alterarExtEntrada"+item).readOnly  = false;
									
									document.getElementById("alterarExtSaida"+item).value = "00:00";
									document.getElementById("alterarExtSaida"+item).style.backgroundColor = "#FFF";	
									document.getElementById("alterarExtSaida"+item).readOnly  = false;
									
								}		
						}
			  </script>
		<?php
			$contador = 1;
			$idTabIndex = 1;
			if(count($altJornada) > 0)
			{
				foreach ($altJornada as $value)
				{
					
					$idTabIndex = 1;
					if ($value->Ocorrencia_id != 1){
						$ativo = 1;
					}else{
						$ativo = NULL;
					}
			  ?>

					<tr>
						<td class="simples">
							<center>
								<span>
									<?php echo $enumGenerico->NumDiaSemana($value->diaSemana); ?>
								</span>
							</center>
						</td>
						<?php			
							if ($value->Ocorrencia_id == 1) {//SE ID OCORRENCIA == ID NORMAL 
								$AtivaMask = "horaMinuto(this.id, 1)";
								$desativado = NULL;
								$backOcorrencia = "#FFF";
							}else{
								$AtivaMask = '';
								$desativado = 'readonly="true"';
								$backOcorrencia = "#CCC";
							}
						?>	 
						<td style="background:#CCC;">
							<center>
								<input style="background: <?php echo ($backOcorrencia); ?>" 
									   type="text" name="alterarIniEntrada<?php echo ($contador); ?>" 
									   id="alterarIniEntrada<?php echo $enumGenerico->NumDiaSemana($value->diaSemana); ?>" 										   	   size="5" value="<?php echo $value->ent1; ?>" 
									   onchange="<?php echo $AtivaMask; ?>"  <?php echo $desativado; ?>
									   tabindex=<?php echo ($idTabIndex); ?>/>
							</center>
						</td>
						<td style="background:#0C6;">
							<center>
								<input style="background: <?php echo ($backOcorrencia); ?>" 
									   type="text" name="alterarIntSaida<?php echo ($contador); ?>" 
									   id="alterarIntSaida<?php echo $enumGenerico->NumDiaSemana($value->diaSemana); ?>" 										   	   size="5" value="<?php echo $value->sai1; ?>" 
									   onchange="<?php echo $AtivaMask; ?>"  <?php echo $desativado; ?>
									   tabindex=<?php echo ($idTabIndex+7); ?>/>
							</center>
						</td>
						<td style="background:#0C6;">
							<center>
								<input style="background: <?php echo ($backOcorrencia); ?>"
									   type="text" name="alterarIntEntrada<?php echo ($contador); ?>" 
									   id="alterarIntEntrada<?php echo $enumGenerico->NumDiaSemana($value->diaSemana); ?>" 										   	   size="5" value="<?php echo $value->ent2; ?>" 
									   onchange="<?php echo $AtivaMask; ?>"  <?php echo $desativado; ?>
									   tabindex=<?php echo ($idTabIndex+14); ?>/>
							</center>
						</td>
						<td style="background:#CCC;">
							<center>
								<input style="background: <?php echo ($backOcorrencia); ?>"
									   type="text" name="alterarFimSaida<?php echo ($contador); ?>" 
									   id="alterarFimSaida<?php echo $enumGenerico->NumDiaSemana($value->diaSemana); ?>" 		        								  size="5" value="<?php echo $value->sai2; ?>" 
									   onchange="<?php echo $AtivaMask; ?>"  <?php echo $desativado; ?>
									   tabindex=<?php echo ($idTabIndex+21); ?>/>
							</center>
						</td>
						<td style="background:#6CF;">
							<center>
								<input style="background: <?php echo ($backOcorrencia); ?>"
									   type="text" name="alterarExtEntrada<?php echo ($contador); ?>" 
									   id="alterarExtEntrada<?php echo $enumGenerico->NumDiaSemana($value->diaSemana); ?>" 										       size="5" value="<?php echo $value->ent3; ?>" 
									   onchange="<?php echo $AtivaMask; ?>" <?php echo $desativado; ?>
									   tabindex=<?php echo ($idTabIndex+28); ?>/>
							</center>
						</td>
						<td style="background:#6CF;">
							<center>
								<input style="background: <?php echo ($backOcorrencia); ?>"
									   type="text" name="alterarExtSaida<?php echo ($contador); ?>" 
									   id="alterarExtSaida<?php echo $enumGenerico->NumDiaSemana($value->diaSemana); ?>" 		  								         size="5" value="<?php echo $value->sai3; ?>" 
									   onchange="<?php echo $AtivaMask; ?>"  <?php echo $desativado; ?>
									   tabindex=<?php echo ($idTabIndex+35); ?>/>
							</center>
						</td>
						<td class="simples">
							<center>
								<select onChange="TrataOcorrencia2(this.value, '<?php echo $enumGenerico->NumDiaSemana($value->diaSemana); ?>')" 
										tabindex=<?php echo ($idTabIndex+42); ?> >
							<?php
								$linha = $ocorrencia->ListarSiglaOcorrencia();
								foreach ($linha as $i){
									if ($i->id == $value->Ocorrencia_id){
							?>
										<option selected value="<?php echo $i->id."|".$i->sigla; ?>"><?php echo $i->descricao?></option>
							<?php
									}else{
							?>
										<option value="<?php echo $i->id."|".$i->sigla; ?>" ><?php echo $i->descricao?></option>
							<?php
									}
								}
							?>
								</select>
							</center>
						</td>
					<input type="hidden" name="idAlterarJornada<?php echo ($contador); ?>" value="<?php echo $value->id; ?>" />
					<input type="hidden" name="alterarOcorrencia<?php echo ($contador); ?>" id="alterarOcorrencia<?php echo $enumGenerico->NumDiaSemana($value->diaSemana); ?>" value="<?php echo $value->Ocorrencia_id; ?>" />
					<input type="hidden" name="diaSemana<?php echo ($contador); ?>" id="diaSemana" value="<?php echo $value->diaSemana; ?>" />
				</tr>
			<?php
					$contador++;
					$idTabIndex++;
				} // FIM DO FOREACH
			}else{
				echo ("<center><strong>Jornada não cadastrada</strong></center>");
			}
			?>
        </table>
    </form>
    </div><!--FIM DA DIV BOX TABELA JORNADA-->
<?php
}
?>

<?php
//BOX DE ALTERAR JORNADA
if (isset($_POST['atualizar']))
{

	//ALTERAR TIPOJORNADA
		$AlterarCodigo        = $_POST['alterarCodigo'];
		$AlterarDescricao     = strtoupper($_POST['alterarDescricao']);
		$alterarDesativado    = $_POST['alterarDesativado'];
		$alterarTotalHorasMes = $_POST['alterarTotalHorasMes'];
		$alterarIdTipoJornada = $_POST['alteraridTipoJornada'];
		
		//echo $AlterarCodigo." - ".$AlterarDescricao." - ".$alterarDesativado." - ".$alterarIdTipoJornada."<br>";
		if (!empty($AlterarCodigo) && !empty($AlterarDescricao) && !empty($alterarTotalHorasMes))
		{
			$tipoJornadaAtualizar = new TipoJornada();

			$tipoJornadaAtualizar->setValue('codigo',$AlterarCodigo);
			$tipoJornadaAtualizar->setValue('desativado',$alterarDesativado);
			$tipoJornadaAtualizar->setValue('descricao',$AlterarDescricao);
			$tipoJornadaAtualizar->setValue('totalHorasMes',$alterarTotalHorasMes);

			$tipoJornadaAtualizar->Atualizar($tipoJornadaAtualizar, $alterarIdTipoJornada);

		//FIM DO ALTERAR TIPOJORNADA
	
		//ALTERAR JORNADA
			$contador = 0;

			for ($i=1; $i<=7; $i++)
			{	
				$alterarIniEntrada = $_POST["alterarIniEntrada$i"];
				$alterarIntSaida   = $_POST["alterarIntSaida$i"];
				$alterarIntEntrada = $_POST["alterarIntEntrada$i"];
				$alterarFimSaida   = $_POST["alterarFimSaida$i"];
				$alterarExtEntrada = $_POST["alterarExtEntrada$i"];
				$alterarExtSaida   = $_POST["alterarExtSaida$i"];
				$idAlterarJornada  = $_POST["idAlterarJornada$i"];
				$alterarOcorrencia = $_POST["alterarOcorrencia$i"];
				$alterarDiaSemana  = $_POST["diaSemana$i"];

				$jornadaAlterar = new Jornada();

				$jornadaAlterar->setValue('id',  empty($idAlterarJornada)  ? "00:00" : $idAlterarJornada);
				$jornadaAlterar->setValue('ent1',empty($alterarIniEntrada) ? "00:00" : $alterarIniEntrada);
				$jornadaAlterar->setValue('ent2',empty($alterarIntEntrada) ? "00:00" : $alterarIntEntrada);
				$jornadaAlterar->setValue('ent3',empty($alterarExtEntrada) ? "00:00" : $alterarExtEntrada);
				$jornadaAlterar->setValue('sai1',empty($alterarIntSaida)   ? "00:00" : $alterarIntSaida);
				$jornadaAlterar->setValue('sai2',empty($alterarFimSaida)   ? "00:00" : $alterarFimSaida);
				$jornadaAlterar->setValue('sai3',empty($alterarExtSaida)   ? "00:00" : $alterarExtSaida);
				$jornadaAlterar->setValue('diaSemana',$alterarDiaSemana);
				$jornadaAlterar->setValue('Ocorrencia_id',$alterarOcorrencia);
				$jornadaAlterar->setValue('TipoJornada_id',$alterarIdTipoJornada);

				/*			
				echo ("<br> IniEnt - ".$alterarIniEntrada.
					  " IntEnt - ".$alterarIntEntrada.
					  " ExtEnt - ".$alterarExtEntrada.
					  " IntSai - ".$alterarIntSaida.
					  " FimSai - ".$alterarFimSaida.
					  " ExtSai - ".$alterarExtSaida.
					  " DiaSem - ".$alterarDiaSemana.
					  " Ocor - ".$alterarOcorrencia.
					  " idTipoJ - ".$idAlterarJornada."<br>");
				*/

				//echo ("ID = ".$idAlterarJornada."<br>");
				//print_r($jornadaAlterar);
				//echo("<br><br>");


				$returnJornada = $jornadaAlterar->Atualizar($jornadaAlterar, $idAlterarJornada);
				if($returnJornada > 0)
				{
					$contador = $contador+1;
				}
			}
			
			//echo ("contador: ".$contador);

			if($contador == 7)
			{
				echo ("<center><strong>Jornada modificada com sucesso!</strong></center>");
			}else{
				echo ("<center><strong>Ocorreu um erro ao gravar a Jornada!</strong></center>");
			}
			
		}else{
			echo ("<center><strong>Preencha os campos obrigatórios!</center></strong>");
		}
		
	}	
?>
</body>
</html>