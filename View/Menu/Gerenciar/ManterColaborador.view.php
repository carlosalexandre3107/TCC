<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
	require_once("Style.php");
	require_once("../Entity/Colaborador.class.php");
	require_once("../Business/EnumGenerico.class.php");
	require_once("../Entity/Cargo.class.php");
	require_once("../Entity/TipoJornada.class.php");
	require_once("../Entity/Setor.class.php");
					
		$colaboradorObj = new Colaborador();		
		
		$enumGenericoObj = new EnumGenerico();
		$meses = $enumGenericoObj->ListaMeses();
		
		$tipoJornadaObj = new TipoJornada();
		
		$setorObj = new Setor();
?>
<body>
<br />
<div class="boxcadastro">
    	<div class="boxtitulo">
       	  	<p style="	width:130px;">COLABORADOR</p>
   		</div><!--FIM DA DIV BOX TITULO-->
        
        <table width="500" class="formcadastro">
          <tr>
            <td>Nº DO CARTÃO</td>
            <td><input type="number"  name="nDoCartaoFiltro" /></td>
          </tr>
          <tr>
            <td>MATRÍCULA</td>
            <td><input type="number" name="matriculaFiltro"/></td>
          </tr>
          <tr>
            <td>NOME</td>
            <td><input type="text" name="nomeFiltro" /></td>
          </tr>
          <tr>
			<td>SETOR</td>
            <td><select name="setorFiltro">
					<option>Todos</option>
					<?php
						$setor = new setor();
						$listaSetores = $setor->ListarSetores();
						foreach ($listaSetores as $itemSetor){
					?>
						<option value="<?php echo ($itemSetor->id)?>"><?php echo $itemSetor->descricao ?></option>
					<?php
						}
					?>
            	</select>
			</td>
          </tr>
          <tr>  
			<td>DESLIGADO</td>
            <td><select name="desligadoFiltro">
            		<option value="Todos">Todos</option>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
            	</select>
            </td>
			<td>
            	<input type="submit" name="buscar" value="BUSCAR" />
            </td>
            <td>
                <input type="submit" name="incluir" value="NOVO"/>
            </td>
          </tr>
  </table>
        </br>
</div><!--FIM DA DIV BOX Gerenciar-->
<!--	****BOX DE MANTER COLABORADOR****	-->
<?php
if (isset($_POST['buscar']))
	{

	$numCartao = $_POST['nDoCartaoFiltro'];
	$matr = $_POST['matriculaFiltro'];
	$nome = $_POST['nomeFiltro'];
	$setor = $_POST['setorFiltro'];
	$desligado = $_POST['desligadoFiltro'];
	
/*	switch ($desligado){
		case "Sim" : $desligado = 1; break;
		case "Não" : $desligado = '0'; break;
	}*/
	
?> 
 <div class="boxManter">
        <table width="900" border="1" bordercolor="#000000" class="tbManter">
              <tr style="background:#999; margin:0 auto; font-weight:bold; font-family:calibri;">
                    <td width="80"><center>MANTER</center></td>
					<td width="60"><center>CARTÃO</center></td>
                    <td width="90"><center>MATRICULA</center></td>
                    <td width="420"><center>NOME</center></td>
                    <td width="270"><center>SETOR</center></td>
                    <td width="80"><center>DESLIGADO</center></td>
              </tr>
			  <?php
					if ($numCartao == NULL && $matr == NULL && $nome == NULL && $setor == "Todos" && $desligado == "Todos")
					{
						$opcao = 1;
						$entidade = NULL;
						$campo = NULL;
						$value = NULL;
						
					}else if ($numCartao != NULL)
					{
						$opcao = 0;
						$entidade = "Colaborador";
						$campo = "numCartao";
						$value = $numCartao;
							
					}else if ($matr != NULL)
					{
						$opcao = 0;
						$entidade = "Colaborador";
						$campo = "matr";
						$value = $matr;
							
					}else if ($nome != NULL)
					{
						$opcao = 0;
						$entidade = "Colaborador";
						$campo = "nome";
						$value = $nome;
							
					}else if ($setor != "Todos")
					{
						$opcao = 0;
						$entidade = "Setor";
						$campo = "descricao";
						$value = $setor;
							
					}else if ($desligado != "Todos")
					{
						$opcao = 0;
						$entidade = "Colaborador";
						$campo = "desligado";
						$value = $desligado;
							
					}
					
					//echo $opcao." - ".$entidade." - ".$campo." - ".$value." <br>";
					
					$colaboradores = $colaboradorObj->ListarColaboradores($opcao, $entidade, $campo ,$value);
					if(count($colaboradores) > 0)
						{
							foreach ($colaboradores as $itemColaborador)
								{
			  ?>
									<form method="post">			
										 <tr>
												<td>
													<center>
														<input type="submit" name="alterar" value="ALTERAR"/>
													</center>
											 	</td>
												<td>
													<center>
														<?php echo $itemColaborador->numCartao; ?>
														<input type="hidden" name="numCartaoColaborador" 
															   value="<?php echo $itemColaborador->numCartao;?>" />
													</center>
											 	</td>
												<td><center><?php echo $itemColaborador->matr; ?><input type="hidden" name="matrColaborador" value="<?php echo $itemColaborador->matr;?>" /></center></td>
												<td><?php echo $itemColaborador->nome; ?><input type="hidden" name="nomeColaborador" value="<?php echo $itemColaborador->nome;?>" /></td>
												<td><center><?php echo $itemColaborador->descricao; ?><input type="hidden" name="descricaoColaborador" value="<?php echo $itemColaborador->descricao;?>" /></center></td>
												<?php
													if ($itemColaborador->desligado == 1){
												?>
														<td><center><input style="border: 3px solid #900;" type="submit" name="desligadoColaborador" value="<?php echo $enumGenericoObj->Status($itemColaborador->desligado); ?>" /></center></td>
												<?php
													}else{
												?>	
														<td><center><input style="border: 3px solid #060;" type="submit" name="desligadoColaborador" value="<?php echo $enumGenericoObj->Status($itemColaborador->desligado); ?>" /></center></td>
												<?php
													}
												?>
												<input type="hidden" name="idColaborador" value="<?php echo $itemColaborador->id;?>" />
												<input type="hidden" name="MesesAnoIdColaborador" value="<?php echo $itemColaborador->mesesAno_id;?>" />
												<input type="hidden" name="telColaborador" value="<?php echo $itemColaborador->tel;?>" />
												<input type="hidden" name="celColaborador" value="<?php echo $itemColaborador->cel;?>" />
												<input type="hidden" name="cargoIdColaborador" value="<?php echo $itemColaborador->cargo_id;?>" />
												<input type="hidden" name="setorIdColaborador" value="<?php echo $itemColaborador->setor_id;?>" />
												<input type="hidden" name="tipoJornadaIdColaborador" value="<?php echo $itemColaborador->tipoJornada_id;?>" />
												<input type="hidden" name="emailColaborador" value="<?php echo $itemColaborador->email;?>" />
												<input type="hidden" name="pisColaborador" value="<?php echo $itemColaborador->pis;?>" />
												<input type="hidden" name="ctpsColaborador" value="<?php echo $itemColaborador->ctps;?>" />
										  </tr>
									</form>	  
			  <?php
								}
						}else{
							echo ("<strong><center>Não existe resultado para esse filtro</center></strong>");
						}
			  ?>
    </table>

    </div><!--FIM DA DIV TBMANTER-->
<br />	
<br />	
<br />	
<?php
}
?>	
<!--	****FIM DA BOX DE MANTER COLABORADOR****	-->

<!-- DESLIGA COLAGORADOR -->
<?php
if (isset($_POST['desligadoColaborador']))
	{

	$id            = $_POST['idColaborador'];
	$matr          = $_POST['matrColaborador'];
	$desligado     = $_POST['desligadoColaborador'];
	$email         = $_POST['emailColaborador'];
	$mesesAnoId    = $_POST['MesesAnoIdColaborador'];
	$tel           = $_POST['telColaborador'];
	$cel           = $_POST['celColaborador'];
	$numCartao     = $_POST['numCartaoColaborador'];
	$nome          = $_POST['nomeColaborador'];
	$idCargo       = $_POST['cargoIdColaborador'];
	$idSetor 	   = $_POST['setorIdColaborador'];
	$idTipoJornada = $_POST['tipoJornadaIdColaborador'];
	$pis 		   = $_POST['pisColaborador'];
	$ctps 		   = $_POST['ctpsColaborador'];
	
	
	if ($desligado == "Sim"){
		$numDesligado = '0';
	}else if ($desligado == "Não"){
		$numDesligado = 1;
	}
	
	//echo $id." - ".$matr." - ".$numDesligado." - ".$email." - ".$mesesAnoId." - ".$tel." - ".$cel." - ".$numCartao." - ".$nome." - ".$idCargo." - ".$idSetor." - ".$idTipoJornada."</br>";

	$Colaborador = new Colaborador();

	$Colaborador->setValue('matr',$matr);
	$Colaborador->setValue('desligado',$numDesligado);
	$Colaborador->setValue('email',$email);
	$Colaborador->setValue('MesesAno_id',$mesesAnoId);
	$Colaborador->setValue('tel',$tel);
	$Colaborador->setValue('cel',$cel);
	$Colaborador->setValue('numCartao',$numCartao);
	$Colaborador->setValue('nome',$nome);
	$Colaborador->setValue('pis',$pis);
	$Colaborador->setValue('ctps',$ctps);
	$Colaborador->setValue('Cargo_id',$idCargo);
	$Colaborador->setValue('Setor_id',$idSetor);
	$Colaborador->setValue('TipoJornada_id',$idTipoJornada);
	
	//echo ("<br>");
	//print_r($Colaborador);
	$Colaborador->Atualizar($Colaborador,$id);
?>
	<script>
		alert ("Colaborador modificada com sucesso!");
	</script>
<?php
}
?>
<!-- FIM DO DESLIGA COLABORADOR -->

<!--	****BOX DE INSERIR COLABORADOR****	-->
<?php
if (isset($_POST['incluir']))
	{
?>
	<div class="boxcadastro" style="margin-top:40px; ">
			<div class="boxtitulo">
				<p style="	width:200px;">INCLUIR COLABORADOR</p>
			</div><!--FIM DA DIV BOX TITULO-->
			
			<table width="400" class="formcadastro">
			  <tr>
				<td>MATRÍCULA<b style="color:red;">*</b></td>
				<td><input name="matriculaIncluir" type="number" required/></td>
			  </tr>
			  <tr>
				<td>Nº DO CARTÃO<b style="color:red;">*</b></td>
				<td><input name="nDoCartaoIncluir"  type="number" required/></td>
			  </tr>
			  <tr>
				<td>NOME<b style="color:red;">*</b></td>
				<td><input name="nomeIncluir"  type="text" required/></td>
			  </tr>
			  <tr>
				<td>PIS<b style="color:red;">*</b></td>
				<td><input name="pisIncluir"  type="text" id="pisId" onChange="Mascaras(this.id, 'Pis');" required/></td>
			  </tr>
			  <tr>
				<td>CTPS<b style="color:red;">*</b></td>
				<td><input name="ctpsIncluir"  type="text" id="ctpsId" onChange="Mascaras(this.id, 'Ctps');" required/></td>
			  </tr>
			  <tr>
				<td>TELEFONE</td>
				<td><input name="telefoneIncluir"  type="text" id="TelefoneId" onChange="Mascaras(this.id, 'Telefone');" /></td>
			  </tr>
			  <tr>
				<td>CELULAR</td>
				<td><input name="celularIncluir"  type="text" id="CelularId" onChange="Mascaras(this.id, 'Celular');"/></td>
			  </tr>
			  <tr>
				<td>E-MAIL<b style="color:red;">*</b></td>
				<td><input name="emailIncluir"   type="text" required/></td>
			  </tr>
			  <tr>
				<td>FÉRIAS PREVISTA<b style="color:red;">*</b></td>
				<td><select name="mesesIncluir" required>
					<?php
						foreach ($meses as $mes)
							{
					?>
								<option value="<?php echo $enumGenericoObj->ConvMes($mes) ?>"><?php echo $mes?></option>
					<?php
							}
					?>	
					</select>
				</td>
			  </tr>
			  <tr>
				<td>CARGO<b style="color:red;">*</b></td>
				<td><select name="cargoIncluir" required>
						<?php
							$listarTodosCargosObj = new Cargo();
							$listaTodosCargos = $listarTodosCargosObj->ListarCargos();
							
							foreach ($listaTodosCargos as $itemCargo)
								{
						?>
									<option value="<?php echo $itemCargo->id; ?>"><?php echo $itemCargo->nomCompleto; ?></option>
						<?php
								}
						?>
					</select>
				</td>
			  </tr>
			  <tr>
				<td>JORNADA<b style="color:red;">*</b></td>
				<td><select name="jornadaIncluir" required>
						<?php
							$listaTipoJornadas = $tipoJornadaObj->ListaTiposJornada();
							foreach ($listaTipoJornadas as $itemTipoJornada)
								{
						?>
									<option value="<?php echo $itemTipoJornada->id; ?>"><?php echo $itemTipoJornada->descricao ?></option>
						<?php
								}
						?>
					</select>
				</td>
			  </tr>
			  <tr>
				<td>SETOR<b style="color:red;">*</b></td>
				<td><select name="setorIncluir">
						<?php
							$listaSetores = $setorObj->ListarSetores();
								foreach ($listaSetores as $itemSetor)
									{
						?>
										<option value="<?php echo $itemSetor->id; ?>"><?php echo $itemSetor->descricao ?></option>
						<?php	
									}
						?>
					</select> 
				</td>
				<td><input type="submit" name="salvar"  value="SALVAR" /></td>
			  </tr>

	  </table>
			<br />
			<br />
		</div><!--FIM DA DIV BOX Gerenciar-->
		</br>
<?php
}
?>	
<?php
if (isset($_POST['salvar']))
	{
		
		$matriculaIncluir = $_POST['matriculaIncluir'];
		$nDoCartaoIncluir = $_POST['nDoCartaoIncluir'];
		$nomeIncluir      = strtoupper ($_POST['nomeIncluir']);
		$pisIncluir       = $_POST['pisIncluir'];
		$ctpsIncluir      = $_POST['ctpsIncluir'];
		$telefoneIncluir  = $_POST['telefoneIncluir'];
		$celularIncluir   = $_POST['celularIncluir'];
		$emailIncluir     = strtoupper ($_POST['emailIncluir']);
		$mesesIncluir     = $_POST['mesesIncluir'];
		$cargoIncluir     = $_POST['cargoIncluir'];
		$jornadaIncluir   = $_POST['jornadaIncluir'];
		$setorIncluir     = $_POST['setorIncluir'];
	
		if (!empty($matriculaIncluir) && 
			!empty($nDoCartaoIncluir) && 
			!empty($nomeIncluir) && 
			!empty($pisIncluir) && 
			!empty($ctpsIncluir) && 
			!empty($emailIncluir) && 
			!empty($mesesIncluir) && 
			!empty($cargoIncluir) && 
			!empty($jornadaIncluir) &&
			!empty($setorIncluir))
		{
			
			/*echo $matriculaIncluir." - 0 - ".
			$emailIncluir." - ".
			$numMes." - ".
			$telefoneIncluir." - ".
			$celularIncluir." - ".
			$nDoCartaoIncluir." - ".
			$nomeIncluir." - ".
			$cargoIncluir." - ".
			$setorIncluir." - ".
			$jornadaIncluir;*/
			
			$colaborador = new Colaborador();
			
			$colaboradorNumeroCartao = $colaborador->BuscarColaboradorPorNumeroCartao($nDoCartaoIncluir);
			
			if(empty($colaboradorNumeroCartao))
			{
				$colaboradorObjNew = new Colaborador();
			
				$colaboradorObjNew->setValue('matr',$matriculaIncluir);
				$colaboradorObjNew->setValue('desligado','0');
				$colaboradorObjNew->setValue('email',$emailIncluir);
				$colaboradorObjNew->setValue('MesesAno_id',$mesesIncluir);
				$colaboradorObjNew->setValue('tel',$telefoneIncluir);
				$colaboradorObjNew->setValue('cel',$celularIncluir);
				$colaboradorObjNew->setValue('numCartao',$nDoCartaoIncluir);
				$colaboradorObjNew->setValue('nome',$nomeIncluir);
				$colaboradorObjNew->setValue('Pis',$pisIncluir);
				$colaboradorObjNew->setValue('Ctps',$ctpsIncluir);
				$colaboradorObjNew->setValue('Cargo_id',$cargoIncluir);
				$colaboradorObjNew->setValue('Setor_id',$setorIncluir);
				$colaboradorObjNew->setValue('TipoJornada_id',$jornadaIncluir);

				//print_r($colaboradorObjNew);

				$return = $colaboradorObjNew->Inserir($colaboradorObjNew);

				if($return > 0)
				{
					echo ("<strong><center>Colaborador incluido com sucesso!</strong></center>");
				}else{
					echo ("<strong><center>Ocorreu erro ao incluir o colaborador!</strong></center>");
				}
			}else{
					echo ("<strong><center>O numero do cartão já esta cadastrador em outro colaborador!</strong></center>");
			}				
		}
		else
		{
			echo ("<strong><center>Preencha os campos obrigatórios!</center></strong>");
		
		}
		
	}
?>
<!--	****FIM DA BOX DE INSERIR COLABORADOR****	-->

<!--	****BOX DE ALTERAR COLABORADOR****	-->
<?php
if (isset($_POST['alterar']))
	{

	$idAlterar = $_POST['idColaborador'];
	
	$resultColaborador = $colaboradorObj->AtualizarColaborador($idAlterar);
	//print_r($resultColaborador);

?>
	<div class="boxcadastro" style="margin-top:40px; ">
			<div class="boxtitulo">
				<p style="	width:205px;">ALTERAR COLABORADOR</p>
			</div><!--FIM DA DIV BOX TITULO-->
		<?php
		foreach ($resultColaborador as $item){
		?>
		<form method="post">
			<input type="hidden" name="Alterid" value="<?php echo $idAlterar;?>">
			<table width="400" class="formcadastro">
			  <tr>
				<td>MATRÍCULA<b style="color:red;">*</b></td>
				<td><input name="matriculaAlterar" type="number" value="<?php echo $item->matr; ?>" /></td>
			  </tr>
			  <tr>
				<td>Nº DO CARTÃO<b style="color:red;">*</b></td>
				<td><input name="nDoCartaoAlterar"  type="number" value="<?php echo $item->numCartao; ?>" /></td>
			  </tr>
			  <tr>
				<td>NOME<b style="color:red;">*</b></td>
				<td><input name="nomeAlterar"  type="text" value="<?php echo $item->nome; ?>" /></td>
			  </tr>
			  <tr>
				<td>PIS<b style="color:red;">*</b></td>
				<td><input name="pisAlterar"  type="text" id="pisId" 
						   onChange="Mascaras(this.id, 'Pis');" value="<?php echo $item->pis; ?>"/>
				</td>
			  </tr>
			  <tr>
				<td>CTPS<b style="color:red;">*</b></td>
				<td><input name="ctpsAlterar"  type="text" id="ctpsId" 
						   onChange="Mascaras(this.id, 'Ctps');" value="<?php echo $item->ctps; ?>"/></td>
			  </tr>
			  <tr>
				<td>TELEFONE</td>
				<td><input name="telefoneAlterar"  type="text" value="<?php echo $item->tel; ?>" id="TelefoneId" onclick = "Mascaras(this.id, 'Telefone');" /></td> 
			  </tr>
			  <tr>
				<td>CELULAR</td>
				<td><input name="celularAlterar"  type="text" value="<?php echo $item->cel; ?>" id="CelularId" onclick = "Mascaras(this.id, 'Celular');"/></td>
			  </tr>
			  <tr>
				<td>E-MAIL<b style="color:red;">*</b></td>
				<td><input name="emailAlterar"   type="text" value="<?php echo $item->email; ?>"/></td>
			  </tr>
			  <tr>
				<td>FÉRIAS PREVISTA<b style="color:red;">*</b></td>
				<?php $TextMes = $enumGenericoObj->NumMes($item->mesesAno_id);?>
				<td><select name="mesesAlterar" >
					<?php
						foreach ($meses as $i){
							if ($TextMes == $i){
					?>
								<option value="<?php echo $enumGenericoObj->ConvMes($i); ?>" selected><?php echo $i?></option>
					<?php }else{ ?>			
								<option value="<?php echo $enumGenericoObj->ConvMes($i); ?>"><?php echo $i?></option>
					<?php
							}
						}
					?>	
					</select>
				</td>
			  </tr>
			  <tr>
				<td>CARGO<b style="color:red;">*</b></td>
				<td><select name="cargoAlterar" >
						<?php
							$cargo = new Cargo();
							$listaCargos = $cargo->ListarCargos();						
							foreach ($listaCargos as $itemCargo)
							{	
								if ($item->cargo_id == $itemCargo->id){
						?>
									<option value="<?php echo $itemCargo->id; ?>" selected><?php echo $itemCargo->nomCompleto; ?></option>
						<?php
								}else{
						?>
									<option value="<?php echo $itemCargo->id; ?>"><?php echo $itemCargo->nomCompleto; ?></option>
						<?php
								}
							}
						?>
					</select>
				</td>
			  </tr>
			  <tr>
				<td>JORNADA<b style="color:red;">*</b></td>
				<td><select name="jornadaAlterar" >
						<?php
							$listaTipoJornadas = $tipoJornadaObj->ListaTiposJornada();
							foreach ($listaTipoJornadas as $itemTipoJornada){
								if ($item->tipoJornada_id == $itemTipoJornada->id){
						?>
									<option value="<?php echo $itemTipoJornada->id; ?>" selected><?php echo $itemTipoJornada->descricao ?></option>
						<?php
								}else{
						?>
									<option value="<?php echo $itemTipoJornada->id; ?>"><?php echo $itemTipoJornada->descricao ?></option>
						<?php		
								}
							}	
						?>
					</select>
				</td>
			  </tr>
			  <tr>
				<td>SETOR<b style="color:red;">*</b></td>
				<td><select name="setorAlterar">
						<?php
							$listaSetores = $setorObj->ListarSetores();
							foreach ($listaSetores as $itemSetor){
								if ($item->setor_id == $itemSetor->id){
						?>
									<option value="<?php echo $itemSetor->id; ?>" selected><?php echo $itemSetor->descricao ?></option>
						<?php
								}else{
						?>
									<option value="<?php echo $itemSetor->id; ?>"><?php echo $itemSetor->descricao ?></option>
						<?php		
								}
							}
						?>
					</select> 
				</td>
				<td><input type="submit" name="atualizar"  value="ALTERAR" /></td>
			  </tr>

		</table>
	  </form>
	  <?php
	  }
	  ?>
			<br />
			<br />
		</div><!--FIM DA DIV BOX Gerenciar-->
		</br>
<?php
}
?>	
<?php
if (isset($_POST['atualizar']))
	{
		
		$matriculaAlterar = $_POST['matriculaAlterar'];
		$nDoCartaoAlterar = $_POST['nDoCartaoAlterar'];
		$nomeAlterar      = strtoupper ($_POST['nomeAlterar']);
		$pisAlterar  	  = $_POST['pisAlterar'];
		$ctpsAlterar  	  = $_POST['ctpsAlterar'];
		$telefoneAlterar  = $_POST['telefoneAlterar'];
		$celularAlterar   = $_POST['celularAlterar'];
		$emailAlterar     = strtoupper ($_POST['emailAlterar']);
		$mesesAlterar     = $_POST['mesesAlterar'];
		$cargoAlterar     = $_POST['cargoAlterar'];
		$jornadaAlterar   = $_POST['jornadaAlterar'];
		$setorAlterar     = $_POST['setorAlterar'];
		$idAlterar 		  = $_POST['Alterid'];
	
		if (!empty($matriculaAlterar) && 
			!empty($nDoCartaoAlterar) && 
			!empty($nomeAlterar) && 
			!empty($pisAlterar) &&
			!empty($ctpsAlterar) &&
			!empty($emailAlterar) && 
			!empty($mesesAlterar) && 
			!empty($cargoAlterar) && 
			!empty($jornadaAlterar) &&
			!empty($setorAlterar) &&
			!empty($idAlterar))
		{

/*			echo $matriculaAlterar." - 0 - ".
			$emailAlterar." - ".
			$mesesAlterar." - ".
			$telefoneAlterar." - ".
			$celularAlterar." - ".
			$nDoCartaoAlterar." - ".
			$nomeAlterar." - ".
			$cargoAlterar." - ".
			$setorAlterar." - ".
			$pisAlterar." - ".
			$ctpsAlterar." - ".
			$jornadaAlterar;*/
			
			$colaborador = new Colaborador();
			
			$colaborador->setValue('matr',$matriculaAlterar);
			$colaborador->setValue('desligado','0');
			$colaborador->setValue('email',$emailAlterar);
			$colaborador->setValue('MesesAno_id',$mesesAlterar);
			$colaborador->setValue('tel',$telefoneAlterar);
			$colaborador->setValue('cel',$celularAlterar);
			$colaborador->setValue('numCartao',$nDoCartaoAlterar);
			$colaborador->setValue('nome',$nomeAlterar);
			$colaborador->setValue('Pis',$pisAlterar);
			$colaborador->setValue('Ctps',$ctpsAlterar);
			$colaborador->setValue('Cargo_id',$cargoAlterar);
			$colaborador->setValue('Setor_id',$setorAlterar);
			$colaborador->setValue('TipoJornada_id',$jornadaAlterar);
			
			$return = $colaborador->Atualizar($colaborador, $idAlterar);

			if($return > 0)
			{
				echo ("<strong><center>Colaborador modificada com sucesso!</center></strong>");
			}else{
				echo ("<strong><center>Desculpe, ocorreu um erro ao atualizar o colaborador. Por favor tente novamente!</center></strong>");
			}
		}else{
			echo ("<strong><center>Todos os campos com asterisco devem ser preenchidos!</center></strong>");
		}	
	}
?>
<!--	****FIM DA BOX DE INSERIR COLABORADOR****	-->
</body>
</html>