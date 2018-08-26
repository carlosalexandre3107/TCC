<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
	require "Style.php";
	require_once("../Entity/Cargo.class.php");
	$cargo = new Cargo();
	
	require_once("../Business/EnumGenerico.class.php");
	$enumGenerico = new EnumGenerico();
	
?>
<body>
	<br />
<div class="boxcadastro">
    	<div class="boxtitulo">
       	  	<p style="	width:60px;">CARGO</p>
   		</div><!--FIM DA DIV BOX TITULO-->
        
        <table width="500" class="formcadastro">
          <tr>
            <td>NOME COMPLETO</td>
            <td><select name="cargoId">
					<option value="0">Todos</option>
					<?php
						$listaCargos = $cargo->ListarCargos();
						foreach($listaCargos as $itemCargo){
					?>
            		<option value="<?php echo ($itemCargo->id) ?>"><?php echo $itemCargo->nomCompleto?></option>
					<?php
						}
					?>
            	</select>
            </td>
          <tr>
            <td>CANCELADO</td>
            <td><select name="cancelado">
            		<option value="2">Todos</option>
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
<?php
if (isset($_POST['buscar'])){
	$cargoId = $_POST['cargoId'];
	$cancelado = $_POST['cancelado'];
	//echo ("cargoId = ".$cargoId."<br />");
	//echo ("cancelado = ".$cancelado);
?>
    <div class="boxManter">
        <table width="900" border="1" bordercolor="#000000" class="tbManter">
              <tr style="background:#999; margin:0 auto; font-weight:bold; font-family:calibri;">
                    <td width="90"><center>MANTER</center></td>
				    <td width="120"><center>CÓDIGO</center></td>
                    <td width="410"><center>NOME COMPLETO</center></td>
				  	<td width="150"><center>CBO</center></td>
                    <td width="90"><center>CANCELADO</center></td>
              </tr>
			  <?php 
					$listaCargosFiltro = $cargo->ListaCargosFiltro($cargoId, $cancelado);
					if ($listaCargosFiltro == NULL){
							echo ("<center><strong>Não a resultado para esse filtro!</strong></center>");
					}else{
						foreach($listaCargosFiltro as $itemCargo)
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
											<?php echo $itemCargo->codigo ?>
											<input type="hidden" name="codigoCargo" value="<?php echo $itemCargo->codigo ?>" />	
										</center>
									</td>
								  	<td>
										<?php echo $itemCargo->nomCompleto ?>
										<input type="hidden" name="nomCompletoCargo" value="<?php echo $itemCargo->nomCompleto ?>" />
								    </td>
									<td>
										<center>
											<?php echo $itemCargo->cbo?>
											<input type="hidden" name="cboCargo" value="<?php echo $itemCargo->cbo ?>" />
										</center>
								  	</td>
									<?php
										if ($itemCargo->cancelado == 1)
										{
									?>
											<td>
												<center>
													<input style="border: 3px solid #900;" type="submit" 
														   name="canceladoCargo" 
														   value="<?php echo $enumGenerico->Status($itemCargo->cancelado); ?>" />
												</center>
								  			</td>
									<?php
										}else{
									?>	
											<td>
												<center>
													<input style="border: 3px solid #060;" type="submit" 
														   name="canceladoCargo" 
														   value="<?php echo $enumGenerico->Status($itemCargo->cancelado); ?>" />												 </center>
								  			</td>
									<?php
										}
									?>
									<input type="hidden" name="nomAbrevCargo" value="<?php echo $itemCargo->nomAbrev; ?>"/>
									<input type="hidden" name="idCargo" value="<?php echo $itemCargo->id; ?>"/>
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
if (isset($_POST['incluir']))
{
?>
<div class="boxcadastro" style="margin-top:20px;">
    	<div class="boxtitulo">
       	  	<p style="	width:130px;">INCLUIR CARGO</p>
   		</div><!--FIM DA DIV BOX TITULO-->
        
        <table width="400" class="formcadastro">
		  <tr>
            <td>CÓDIGO<b style="color:red;">*</b></td>
            <td><input type="text" name="codigo" required/></td>
          </tr>
          <tr>
            <td>NOME COMPLETO<b style="color:red;">*</b></td>
            <td><input type="text" name="nomeCompleto" required/></td>
          </tr>
          <tr>
            <td>NOME ABREVIADO<b style="color:red;">*</b></td>
            <td><input type="text" name="nomeAbreviado" required/></td>
          </tr>
		  <tr>
            <td>CBO</td>
            <td><input type="text" name="cbo"/></td>
          </tr>
		  <tr>
			<td>&nbsp</td>
            <td><br /><input type="submit" name="gravar" value="GRAVAR"/></td>
		  </tr>
		</table>
        </br>
</div><!--FIM DA DIV BOX Gerenciar-->
<?php
}
?>

<?php
if (isset($_POST['gravar']))
{
		if (!empty($_POST['nomeCompleto']) && !empty($_POST['nomeAbreviado']) && !empty($_POST['codigo']))
		{
		
		$nomeCompleto  = strtoupper ($_POST['nomeCompleto']);
		$nomeAbreviado = strtoupper ($_POST['nomeAbreviado']);
		$codigo 	   = $_POST['codigo'];
		$cbo 		   = $_POST['cbo'];
		
		$cargo = new Cargo();
			
		$cargo->setValue('nomCompleto',$nomeCompleto);
		$cargo->setValue('nomAbrev',$nomeAbreviado);
		$cargo->setValue('codigo',$codigo);
		$cargo->setValue('cancelado','0');
		$cargo->setValue('cbo',$cbo);
		
		$cargo->Inserir($cargo);
?>
			<script>
				alert ("Cargo cadastrada com sucesso!");
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

<!-- BOX DE CANCELADO DE CARGO -->
<?php
if (isset($_POST['canceladoCargo']))
{
		
	    $nomCompletoCargo = strtoupper ($_POST['nomCompletoCargo']);
		$nomAbrevCargo    = strtoupper ($_POST['nomAbrevCargo']);
		$codigoCargo      = $_POST['codigoCargo'];
	    $cboCargo         = $_POST['cboCargo'];
		$canceladoCargo   = $_POST['canceladoCargo'];
		$idCargo		  = $_POST['idCargo'];
		
		if ($canceladoCargo == "Sim"){
			$numDesligado = '0';
		}else if ($canceladoCargo == "Não"){
			$numDesligado = 1;
		}
		
		//require_once("../Entity/Cargo.class.php");
		$cargo = new Cargo();
		
		$cargo->setValue('nomCompleto', $nomCompletoCargo);
		$cargo->setValue('nomAbrev', $nomAbrevCargo);
		$cargo->setValue('codigo', $codigoCargo);
		$cargo->setValue('cancelado', $numDesligado);
		$cargo->setValue('cbo', $cboCargo);
		
		$cargo->Atualizar($cargo, $idCargo);
?>
		<script>
			alert ("Ocorrência modificada com sucesso!");
		</script>
<?php	
	}	
?>

<!-- BOX DE ALTERAÇÃO DE CARGO -->
<?php
if (isset ($_POST['alterar']))
{
		$idAlterar = $_POST['idCargo'];
		
		$cargoAlterar = new Cargo();
		
		$resultCargo = $cargoAlterar->CargoEditar($idAlterar);
?>

		<div class="boxcadastro" style="margin-top:20px;">
				<div class="boxtitulo">
					<p style="	width:137px;">ALTERAR CARGO</p>
				</div><!--FIM DA DIV BOX TITULO-->
			<?php
				foreach ($resultCargo as $itemAlterar)
				{
			?>	
					<form method="post">	
						<input type="hidden" name="idAltarar" value="<?php echo $idAlterar; ?>"/>
							<table width="400" class="formcadastro">
								<tr>
									<td>CÓDIGO<b style="color:red;">*</b></td>
									<td>
										<input type="text" name="codigoAlterar" 
											   value="<?php echo $itemAlterar->codigo?>" required/>
									</td>
								</tr>
								<tr>
									<td>NOME COMPLETO<b style="color:red;">*</b></td>
									<td>
										<input type="text" name="nomeCompletoAlterar" 
											   value="<?php echo $itemAlterar->nomCompleto; ?>" required/>
									</td>
								</tr>
								<tr>
									<td>NOME ABREVIADO<b style="color:red;">*</b></td>
									<td>
										<input type="text" name="nomeAbreviadoAlterar" 
											   value="<?php echo $itemAlterar->nomAbrev ;?>" required/>
									</td>
								</tr>
								<tr>
									<td>CBO</td>
								<td><input type="text" name="cboAlterar" value="<?php echo $itemAlterar->cbo?>" /></td>
								<td><input type="submit" name="atualizar" value="ALTERAR"/></td>
								<input type="hidden" name="canceladoAlterar" value="<?php echo $itemAlterar->cancelado; ?>"/>	
								</tr>
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

<?php
if (isset ($_POST['atualizar']))
{
		
		if (!empty($_POST['nomeCompletoAlterar']) && !empty($_POST['nomeAbreviadoAlterar']) && !empty($_POST['codigoAlterar']))
		{	
			$idAltarar            = $_POST['idAltarar'];
			$nomeCompletoAlterar  = strtoupper ($_POST['nomeCompletoAlterar']);
			$nomeAbreviadoAlterar = strtoupper ($_POST['nomeAbreviadoAlterar']);
			$codigoAlterar        = $_POST['codigoAlterar'];
			$cboAlterar           = $_POST['cboAlterar'];
			$canceladoAlterar     = $_POST['canceladoAlterar'];
			
			
			if ($canceladoAlterar == "Sim"){
				$numDesligado = '0';
			}else if ($canceladoAlterar == "Não"){
				$numDesligado = 1;
			}
			
			require_once("../Entity/Cargo.class.php");
			$cargoAtualizar = new Cargo();
			
			$cargoAtualizar->setValue('nomCompleto', $nomeCompletoAlterar);
			$cargoAtualizar->setValue('codigo', $codigoAlterar);
			$cargoAtualizar->setValue('cbo', $cboAlterar);
			$cargoAtualizar->setValue('cancelado', $canceladoAlterar);
			$cargoAtualizar->setValue('nomAbrev', $nomeAbreviadoAlterar);
			
			/*echo ("ID: ".$idAltarar.
				  " NOMECOMPLETO: ".$nomeCompletoAlterar.
				  " CÓDIGO: ".$codigoAlterar.
				  " CBO: ".$cboAlterar.
				  " CANCELADO: ".$canceladoAlterar.
				  " NOMEABREVIADO: ".$nomeAbreviadoAlterar);*/	
			
			$cargoAtualizar->Atualizar($cargoAtualizar, $idAltarar);
	?>
			<script>
				alert ("Cargo alterado com sucesso!");
			</script>
<?php
		}else{
?>
			<script>
				alert ("Preencha os campos obrigatórios!");
			</script>
<?php		
		
		}
?>			
<?php	
	}	
?>
</body>
</html>