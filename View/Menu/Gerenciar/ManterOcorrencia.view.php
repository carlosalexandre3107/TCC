<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
	require "Style.php";
	
	require_once("../Entity/Ocorrencia.class.php");
	$ocorrencia = new Ocorrencia();
	
	require_once("../Business/EnumGenerico.class.php");
	$enumGenerico = new EnumGenerico();
?>
<body>
<br />
<div class="boxcadastro">
    	<div class="boxtitulo">
       	  	<p style="	width:110px;">OCORRÊNCIA</p>
   		</div><!--FIM DA DIV BOX TITULO-->
        
        <table width="500" class="formcadastro">
          <tr>
            <td>DESCRIÇÃO</td>
            <td><select name="sigla">
					<option value="0">Todos</option>
					<?php
						$listaSiglasOcorrencias = $ocorrencia->ListarSiglaOcorrencia();
						foreach ($listaSiglasOcorrencias as $itemOcorrencia){
					?>
							<option value="<?php echo $itemOcorrencia->id ?>"><?php echo $itemOcorrencia->descricao ?></option>
					<?php
						}
					?>
            	</select>
            </td>
          </tr>
          <tr>
            <td>DESLIGADO</td>
            <td><select name="desligado">
            		<option value="2">Todos</option>
                    <option value="1">Sim</option>
                    <option selected value="0">Não</option>
            	</select>
            </td>
            <td>
            	<input type="submit" name="buscar" value="BUSCAR" />
            </td>
            <td>
                <input type="submit" name="incluir" value="NOVO" />
            </td>
          </tr>
  </table>
        </br>
</div><!--FIM DA DIV BOX Gerenciar-->	

<?php
if (isset($_POST['buscar']))
{

	$siglaId = $_POST['sigla'];
	$desligado = $_POST['desligado'];
	//echo ($siglaId);
	//echo ($desligado."<br />");
				
?>
	<div class="boxManter">
		<table width="900" border="1" bordercolor="#000000" class="tbManter">
			<tr style="background:#999; margin:0 auto; font-weight:bold; font-family:calibri;">
				<td width="120"><center>MANTER</center></td>
				<td width="120"><center>SIGLA</center></td>
				<td width="400"><center>DESCRIÇÃO</center></td>
				<td width="120"><center>TEXTO</center></td>
				<td width="120"><center>ANEXO</center></td>
				<td width="120"><center>DESATIVADO</center></td>
			</tr>
				  <?php					  
						$listaOcorrencias = $ocorrencia->ListaOcorrencia($siglaId, $desligado);
						if ($listaOcorrencias == NULL){
							echo ("<center><strong>Não a resultado para esse filtro!</strong></center>");
						}else{
							foreach ($listaOcorrencias as $itemOcorrencia){	
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
												<input type="hidden" name="siglaOcorrencia" 
													   value="<?php echo $itemOcorrencia->sigla; ?>" />
													   <?php echo $itemOcorrencia->sigla; ?>
											</center>
										</td>
										<td>
											<input type="hidden" name="descricaoOcorrencia" 
												   value="<?php echo $itemOcorrencia->descricao; ?>" />
												   <?php echo $itemOcorrencia->descricao; ?>
										</td>
										<td>
											<center>
												<input type="hidden" name="textoOcorrencia" 
													   value="<?php echo $itemOcorrencia->texto; 	?>" />
													   <?php echo $enumGenerico->Status($itemOcorrencia->texto); ?>
											</center>
										</td>
										<td>
											<center>
												<input type="hidden" name="anexoOcorrencia"	
													   value="<?php echo $itemOcorrencia->anexo; 	?>" />
													   <?php echo $enumGenerico->Status($itemOcorrencia->anexo); ?>
											</center>
										</td>
										<?php
										if ($itemOcorrencia->desativado == 1){
										?>
											<td>
												<center>
													<input style="border: 3px solid #900;" type="submit" 
														   name="desativarOcorrencia" 
														   value="<?php echo $enumGenerico->Status($itemOcorrencia->desativado); ?>" />
												</center>
											</td>
										<?php
										}else{
										?>	
											<td>
												<center>
													<input style="border: 3px solid #060;" type="submit" 
														   name="desativarOcorrencia" 
														   value="<?php echo $enumGenerico->Status($itemOcorrencia->desativado); ?>" />
												</center>
											</td>
										<?php
										}
										?>
										<input type="hidden" name="tipoOcorrencia" 
											   value="<?php echo $itemOcorrencia->tipoOcorrencia;?>" />
										<input type="hidden" name="idOcorrencia" 
											   value="<?php echo $itemOcorrencia->id;?>" />
								  </tr>
							 </form>	  
					  <?php
					   		}
						}
					  ?>

			</table>
	</div><!--FIM DA DIV TBMANTER-->
	<br />
	<br />

<?php
}
?>
	
<?php 
if (isset($_POST['incluir']))
{
?>
		<div class="boxcadastro" style="margin-top:20px;">
			<div class="boxtitulo">
				<p style="	width:180px;">INCLUIR OCORRÊNCIA</p>
			</div><!--FIM DA DIV BOX TITULO-->
			<form method="post">	
				<table class="formcadastro">
				  <tr>
					<td>SIGLA<b style="color:red;">*</b></td>
					<td><input type="text" value="" name="siglaIncluir" required/></td>
				  </tr>
				  <tr>
					<td>DESCRIÇÃO<b style="color:red;">*</b></td>
					<td><input type="text" value="" name="descricaoIncluir" required/></td>
				  </tr>
				  <tr>
					<td>JUSTIFICATIVA</td>
					<td><input  name="textoIncluir" type="checkbox" value="TEXTO" />TEXTO&nbsp;&nbsp;&nbsp;&nbsp;<input name="anexoIncluir" type="checkbox" value="ANEXO" /> ANEXO</td>
				  </tr>
				  <tr>
					<td>DISPONIBILIZA EM</td>
					<td>
						<select name="disponibilizaEmIncluir">
							<option value="0">Todos</option>
							<option value="1">Jornada</option>
							<option value="2">Cartão</option>
							<!--<option value="3">Calendario</option>-->
						</select>
					  </td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td><br/><input type="submit" name="gravar" value="GRAVAR"/></td>
				  </tr>
				</table>
			</form>	
				</br>
		</div><!--FIM DA DIV BOX Gerenciar-->
<?php
}
?>

<!-- BOX DE INCLUSÃO DE OCORRÊNCIA -->
<?php
if (isset($_POST['gravar']))
{
		
		if (!empty($_POST['siglaIncluir']) && !empty($_POST['descricaoIncluir']))
		{
			$sigla 			 = strtoupper ($_POST['siglaIncluir']);
			$descricao       = strtoupper ($_POST['descricaoIncluir']);
			$disponibilizaEm = $_POST['disponibilizaEmIncluir'];
			
			if (!isset ($_POST['textoIncluir'])){
				$texto = '0';
			}if (!isset ($_POST['anexoIncluir'])){
				$anexo = '0';
			}if (isset ($_POST['textoIncluir'])){
				$texto = 1;
			}if (isset ($_POST['anexoIncluir'])){
				$anexo = 1;
			}
			 
			$ocorrenciaIncluir = new Ocorrencia();
			
			$ocorrenciaIncluir->setValue('desativado','0');
			$ocorrenciaIncluir->setValue('sigla',$sigla);
			$ocorrenciaIncluir->setValue('descricao',$descricao);
			$ocorrenciaIncluir->setValue('tipoOcorrencia',$disponibilizaEm);
			$ocorrenciaIncluir->setValue('texto',$texto);
			$ocorrenciaIncluir->setValue('anexo',$anexo);

			/*
				echo ("Sigla: ".$sigla.
				  " Descricao: ".$descricao.
				  " TipoOcorrencia: ".$disponibilizaEm.
				  " Texto: ".$texto.
				  " Anexo: ".$anexo);
			*/
			
				  
			$ocorrenciaIncluir->Inserir($ocorrenciaIncluir);
?>
			<script>
				alert ("Ocorrência cadastrada com sucesso!");
			</script>
<?php	
		}
		else
		{
?>
			<script>
				alert ("Preencha os campos obrigatórios!");
			</script>
<?php			
		}
	}
?>

<!-- BOX DE DESLIGAMENTO DE OCORRÊNCIA -->
<?php
if (isset($_POST['desativarOcorrencia']))
{
	
		$siglaOcorrencia     = strtoupper ($_POST['siglaOcorrencia']);	
	    $descricaoOcorrencia = strtoupper ($_POST['descricaoOcorrencia']);
	    $textoOcorrencia     = $_POST['textoOcorrencia'];
		$anexoOcorrencia     = $_POST['anexoOcorrencia'];
		$desativarOcorrencia = $_POST['desativarOcorrencia'];
		$tipoOcorrencia		 = $_POST['tipoOcorrencia'];
		$idOcorrencia		 = $_POST['idOcorrencia'];		
		
		if ($desativarOcorrencia == "Sim"){
			$numDesligado = '0';
		}else if ($desativarOcorrencia == "Não"){
			$numDesligado = 1;
		}
		
		$desOcorrencia = new Ocorrencia();
		
		$desOcorrencia->setValue('desativado', $numDesligado);
		$desOcorrencia->setValue('sigla', $siglaOcorrencia);
		$desOcorrencia->setValue('descricao', $descricaoOcorrencia);
		$desOcorrencia->setValue('tipoOcorrencia', $tipoOcorrencia);
		$desOcorrencia->setValue('texto', $textoOcorrencia);
		$desOcorrencia->setValue('anexo', $anexoOcorrencia);
		
		/*echo (" Desativado: ".$numDesligado.
		      " Sigla: ".$siglaOcorrencia.
			  " Descricao: ".$descricaoOcorrencia.
			  " TipoOcorrencia: ".$tipoOcorrencia.
			  " Texto: ".$textoOcorrencia.
			  " Anexo: ".$anexoOcorrencia.
			  " Id: ".$idOcorrencia);*/
		
		$desOcorrencia->Atualizar($desOcorrencia, $idOcorrencia);
?>
		<script>
			alert ("Ocorrência modificada com sucesso!");
		</script>
<?php	
	}	
?>

<!-- BOX DE ALTERAÇÃO DE OCORRÊNCIA -->
<?php
if (isset ($_POST['alterar']))
{
		$idAlterar = $_POST['idOcorrencia'];
		//echo ($idAlterar);
		$resultOcorrencia = $ocorrencia->EditarOcorrencia($idAlterar);
?>
		<div class="boxcadastro" style="margin-top:20px;">
				<div class="boxtitulo">
					<p style="	width:188px;">ALTERAR OCORRÊNCIA</p>
				</div><!--FIM DA DIV BOX TITULO-->
			<?php
				foreach ($resultOcorrencia as $itemAlterar){
			?>	
					<form method="post">	
						<input type="hidden" name="idAlterar" value="<?php echo $idAlterar; ?>"/>
						<input type="hidden" name="desativadoAltarar" value="<?php echo $itemAlterar->desativado; ?>"/>
						<table width="400" class="formcadastro">
						  <tr>
							<td>SIGLA<b style="color:red;">*</b></td>
							<td><input type="text" name="siglaAlterar" value="<?php echo $itemAlterar->sigla; ?>" required/></td>
						  </tr>
						  <tr>
							<td>DESCRIÇÃO<b style="color:red;">*</b></td>
							<td><input type="text" name="descricaoAlterar" value="<?php echo $itemAlterar->descricao; ?>" required/></td>
						  </tr>
						  <tr>
							<td>JUSTIFICATIVA</td>
							<td>
								<?php
									if ($itemAlterar->texto == 1){
										$checked = "checked";
									}if ($itemAlterar->anexo == 1){
										$checked = "checked";
									}if ($itemAlterar->texto == '0'){
										$checked = '';
									}if ($itemAlterar->anexo == '0'){
										$checked = '';
									}
								?>
							
								<input name="textoAlterar" type="checkbox" value="TEXTO" <?php echo $checked; ?>/>TEXTO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input name="anexoAlterar" type="checkbox" value="ANEXO" <?php echo $checked; ?>/> ANEXO
							</td>
						  </tr>
						  <tr>
							<td>DISPONIBILIZA EM</td>
							<td><select name="disponibilizaEmAlterar">
								<?php							
									if ($itemAlterar->tipoOcorrencia == '0'){
										$selectedZero = "selected";
										$selectedUm   = NULL;
										$selectedDois = NULL;
										$selectedTres = NULL;
									}if ($itemAlterar->tipoOcorrencia == 1){
										$selectedZero = NULL;
										$selectedUm   = "selected";
										$selectedDois = NULL;
										$selectedTres = NULL;
									}if ($itemAlterar->tipoOcorrencia == 2){
										$selectedZero = NULL;
										$selectedUm   = NULL;
										$selectedDois = "selected";
										$selectedTres = NULL;
									}if ($itemAlterar->tipoOcorrencia == 3){
										$selectedZero = NULL;
										$selectedUm   = NULL;
										$selectedDois = NULL;
										$selectedTres = "selected";
									}			
								?>
								<option <?php echo $selectedZero; ?> >Todos</option>
								<option <?php echo $selectedUm; ?>   >Jornada</option>
								<option <?php echo $selectedDois; ?> >Cartão</option>
								<!--<option <?php //echo $selectedTres; ?> >Calendario</option>-->

							</select></td>
						  </tr>
						  <tr>
							<td><br/><input type="submit" name="atualizar" value="ALTERAR"/></td>
							<td>&nbsp;</td>
						</table>
					</form>	
			<?php
				}
			?>	
				</br>
		</div><!--FIM DA DIV BOX Gerenciar-->
<?php
}
?>

<!-- BOX DE ALTERAÇÃO DE OCORRÊNCIA -->
<?php
if (isset($_POST['atualizar']))
{
		
		if (!empty($_POST['siglaAlterar']) && !empty($_POST['descricaoAlterar']))
		{		
			$sigla 			   = strtoupper ($_POST['siglaAlterar']);
			$descricao         = strtoupper ($_POST['descricaoAlterar']);
			$disponibilizaEm   = $_POST['disponibilizaEmAlterar'];
			$idOcorrenciaAlterar = $_POST['idAlterar'];
			$desativadoAltarar = $_POST['desativadoAltarar'];
			
			switch ($disponibilizaEm){
				case "Todos" 	 : $disponibilizaEm   = '0'; break;
				case "Jornada" 	 : $disponibilizaEm   =  1;  break;
				case "Cartão"    : $disponibilizaEm   =  2;  break;
			}
			
			if (!isset ($_POST['textoAlterar'])){
				$texto = '0';
			}if (!isset ($_POST['anexoAlterar'])){
				$anexo = '0';
			}if (isset ($_POST['textoAlterar'])){
				$texto = 1;
			}if (isset ($_POST['anexoAlterar'])){
				$anexo = 1;
			}	
				
			$OcorrenciaAtualizada = new Ocorrencia();	
			
			$OcorrenciaAtualizada->setValue('desativado',$desativadoAltarar);
			$OcorrenciaAtualizada->setValue('sigla',$sigla);
			$OcorrenciaAtualizada->setValue('descricao',$descricao);
			$OcorrenciaAtualizada->setValue('tipoOcorrencia',$disponibilizaEm);
			$OcorrenciaAtualizada->setValue('texto',$texto);
			$OcorrenciaAtualizada->setValue('anexo',$anexo);
			
			/*echo ("Desativado: ".$desativadoAltarar.
				  " Sigla: ".$sigla.
				  " Descricao: ".$descricao.
				  " TipoOcorrencia: ".$disponibilizaEm.
				  " Texto: ".$texto.
				  " Anexo: ".$anexo.
				  " IdOcorrenciaAlterar: ".$idOcorrenciaAlterar);*/
			
			$OcorrenciaAtualizada->Atualizar($OcorrenciaAtualizada, $idOcorrenciaAlterar);
?>
			<script>
				alert ("Ocorrência alterar com sucesso!");
			</script>
<?php		
		}else
		{
?>
			<script>
				alert ("Preencha os campos obrigatórios!");
			</script>
<?php	
		}
	}
?>
</body>
</html>