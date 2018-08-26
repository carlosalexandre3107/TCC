<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
	require_once("Style.php");
	require_once("../Entity/Setor.class.php");
	$setor = new Setor();
	//$linha = $setor->ListarSetor(NULL, NULL, NULL);
	
	require_once("../Business/EnumGenerico.class.php");
	$obj2 = new EnumGenerico();
?>
<body>
<br />
<div class="boxcadastro">
    	<div class="boxtitulo">
       	  	<p style="width:54px;">SETOR</p>
   		</div><!--FIM DA DIV BOX TITULO-->
        
        <table width="500" class="formcadastro">
          <tr>
            <td>DESCRIÇÃO</td>
            <td><select name="sigla">
					<option value="0">Todos</option>
					<?php
						$listaSetores = $setor->ListarSetores();
						echo (count($listaSetores));
						foreach ($listaSetores as $itemSetor){
					?>
						<option value="<?php echo $itemSetor->id ?>"><?php echo $itemSetor->descricao ?></option>
					<?php
						}
					?>	
            	</select>
            </td>
          </tr>
          <tr>
            <td>CANCELADOS</td>
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
if (isset($_POST['buscar']))
{
	
	$setorId = $_POST['sigla'];
	$cancelado = $_POST['cancelado'];
	//echo("setorId = ".$setorId);
	//echo("cancelado = ".$cancelado);
	
?>	
    <div class="boxManter">
        <table width="900" border="1" bordercolor="#000000" class="tbManter">
              <tr style="background:#999; margin:0 auto; font-weight:bold; font-family:calibri;">
                    <td width="90"><center>MANTER</center></td>
					<td width="150"><center>SIGLA</center></td>
                    <td width="400"><center>E-MAIL</center></td>
                    <td width="100"><center>RAMAL</center></td>
                    <td width="170"><center>RESPONSÁVEL</center></td>
                    <td width="90"><center>CANCELADO</center></td>
              </tr>
			  <?php
				$listaSetoresFiltro = $setor->ListaSetoresFiltro($setorId, $cancelado);
				
				if ($listaSetoresFiltro == NULL){
					echo ("<center><strong>Não a resultado para esse filtro!</strong></center>");	
				}else{
					foreach ($listaSetoresFiltro as $itemSetor){
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
										<?php echo $itemSetor->sigla ?>
										<input required  type="hidden" name="siglaSetor" 
											   value="<?php echo $itemSetor->sigla; ?>" />
									</center>
								</td>
								<td>
									<?php echo $itemSetor->email ?>
									<input required  type="hidden" name="emailSetor" 
										   value="<?php echo $itemSetor->email; ?>" />
								</td>
								<td>
									<center>
										<?php echo $itemSetor->ramal ?>
										<input required  type="hidden" name="ramalSetor" 
											   value="<?php echo $itemSetor->ramal; ?>" />								  
									</center>
								</td>
								<td>
									<?php echo $itemSetor->responsavel ?>
										<input required  type="hidden" name="responsavelSetor" 
											   value="<?php echo $itemSetor->responsavel; ?>" />
								</td>
								<?php
									if ($itemSetor->cancelado == 1){
								?>
								<td>
									<center>
										<input required  style="border: 3px solid #900;" 
											   type="submit" name="canceladoSetor" 
											   value="<?php echo $obj2->Status($itemSetor->cancelado); ?>" />
									</center>
								</td>
								<?php
									}else{
								?>	
								<td>
									<center>
										<input required style="border: 3px solid #060;" type="submit" 
											   name="canceladoSetor" value="<?php echo $obj2->Status($itemSetor->cancelado); ?>" />									   </center>
								</td>
								<?php
									}
								?>
									<input type="hidden" name="descricaoSetor" value="<?php echo $itemSetor->descricao; ?>" />	
									<input type="hidden" name="idSetor" value="<?php echo $itemSetor->id; ?>" />	
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
if (isset ($_POST['canceladoSetor']))
{
		
		$idSetor    	  = $_POST['idSetor'];
		$descricaoSetor   = strtoupper ($_POST['descricaoSetor']);
		$canceladoSetor   = $_POST['canceladoSetor'];
		$responsavelSetor = strtoupper ($_POST['responsavelSetor']);
		$ramalSetor 	  = $_POST['ramalSetor'];
		$emailSetor 	  = strtoupper ($_POST['emailSetor']);
		$siglaSetor 	  = strtoupper ($_POST['siglaSetor']);
		
		if ($canceladoSetor == "Sim"){
			$numDesligado = '0';
		}else if ($canceladoSetor == "Não"){
			$numDesligado = 1;
		}
	
		require_once("../Entity/Setor.class.php");
		$setor = new Setor();
		
		$setor->setValue('descricao', $descricaoSetor);
		$setor->setValue('responsavel', $responsavelSetor);
		$setor->setValue('ramal', $ramalSetor);
		$setor->setValue('sigla', $siglaSetor);
		$setor->setValue('cancelado', $numDesligado);
		$setor->setValue('email', $emailSetor);
		
		$setor->Atualizar($setor, $idSetor);
?>
		<script>
			alert ("Setor modificada com sucesso!");
		</script>
<?php	
	}	
?>

<?php
if (isset($_POST['incluir']))
{
?>
	<div class="boxcadastro" style="margin-top:20px;">
    	<div class="boxtitulo">
       	  	<p style="	width:126px;">INCLUIR SETOR</p>
   		</div><!--FIM DA DIV BOX TITULO-->
       <form method="post"> 
			<table width="400" class="formcadastro">
			  <tr>
				<td>SIGLA<b style="color:red;">*</b></td>
				<td><input type="text" name="siglaIncluir" required/></td>
			  </tr>
			  <tr>
				<td>DESCRIÇÃO<b style="color:red;">*</b></td>
				<td><input type="text" name="descricaoIncluir" required/></td>
			  </tr>
			  <tr>
				<td>NOME DO RESPONSÁVEL<b style="color:red;">*</b></td>
				<td><input type="text" name="responsavelIncluir" required/></td>
			  </tr>
			  <tr>
				<td>E-MAIL</td>
				<td><input type="text" name="emailIncluir"/></td>
			  </tr>
			  <tr>
				<td>RAMAL</td>
				<td><input type="text" name="ramalIncluir"/></td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td><br /><input type="submit" name="gravar" value="GRAVAR"/></td>
			  </tr>
	  </table>
	  </form>
  </br>
	</div><!--FIM DA DIV BOX Gerenciar-->
<?php
}
?>	

<?php
if (isset($_POST['gravar']))
{
		
		if(!empty($_POST['siglaIncluir']) && !empty($_POST['descricaoIncluir']) && !empty($_POST['responsavelIncluir']))
		{
			$siglaIncluir 		= strtoupper ($_POST['siglaIncluir']);
			$descricaoIncluir   = strtoupper ($_POST['descricaoIncluir']);
			$emailIncluir 		= strtoupper ($_POST['emailIncluir']);
			$responsavelIncluir = strtoupper ($_POST['responsavelIncluir']);
			$ramalIncluir 		= $_POST['ramalIncluir'];

			$setor = new Setor();

			$setor->setValue('descricao',$descricaoIncluir);
			$setor->setValue('responsavel',$responsavelIncluir);
			$setor->setValue('ramal',$ramalIncluir);
			$setor->setValue('sigla',$siglaIncluir);
			$setor->setValue('cancelado','0');
			$setor->setValue('email',$emailIncluir);

			$setor->Inserir($setor);	
?>
			<script>
				alert ("Setor cadastrada com sucesso!");
			</script>
<?php
		}else{
?>
			<script>
				alert ("Setor não cadastrada, preencha os campos obrigatórios!");
			</script>
<?php
		}
	}
?>
	
<!-- BOX ALTERAR SETOR -->
<?php
if (isset($_POST['alterar']))
{
		$idAlterar = $_POST['idSetor'];
?>
		<div class="boxcadastro" style="margin-top:20px;">
			<div class="boxtitulo">
				<p style="	width:132px;">ALTERAR SETOR</p>
			</div><!--FIM DA DIV BOX TITULO-->
		<?php
			$setorEditado = $setor->SetorEditar($idAlterar);
			foreach ($setorEditado as $itemSetor){
		?>	
			   <form method="post"> 
					<input type="hidden" name="idAlterar" value="<?php echo $itemSetor->id; ?>" />
					<table width="400" class="formcadastro">
					  <tr>
						<td>SIGLA<b style="color:red;">*</b></td>
						<td><input type="text" name="siglaAlterar" value="<?php echo $itemSetor->sigla; ?>" required/></td>
					  </tr>
					  <tr>
						<td>DESCRIÇÃO<b style="color:red;">*</b></td>
						<td><input type="text" name="descricaoAlterar" value="<?php echo $itemSetor->descricao; ?>" required/></td>
					  </tr>
					  <tr>
						<td>RESPONSÁVEL<b style="color:red;">*</b></td>
						<td><input type="text" name="responsavelAlterar" value="<?php echo $itemSetor->responsavel; ?>" required/></td>
					  </tr>
					  <tr>
						<td>E-MAIL</td>
						<td><input type="text" name="emailAlterar" value="<?php echo $itemSetor->email; ?>"/></td>
					  </tr>
					  <tr>
						<td>RAMAL</td>
						<td><input type="text" name="ramalAlterar" value="<?php echo $itemSetor->ramal; ?>"/></td>
					  </tr>
					  <tr>
						<td>&nbsp;</td>
						<td><br /><input type="submit" name="atualizar" value="ALTERAR"/></td>
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
	if (isset($_POST['atualizar'])){
		
		if(!empty($_POST['siglaAlterar']) && !empty($_POST['descricaoAlterar']) && !empty($_POST['responsavelAlterar']))
		{
			$siglaIncluir 		= strtoupper($_POST['siglaAlterar']);
			$descricaoIncluir 	= strtoupper($_POST['descricaoAlterar']);
			$responsavelIncluir = strtoupper($_POST['responsavelAlterar']);
			$emailIncluir 		= strtoupper($_POST['emailAlterar']);
			$ramalIncluir 		= $_POST['ramalAlterar'];
			$idAlterar 			= $_POST['idAlterar'];

			$setor = new Setor();

			$setor->setValue('descricao',$descricaoIncluir);
			$setor->setValue('responsavel',$responsavelIncluir);
			$setor->setValue('ramal',$ramalIncluir);
			$setor->setValue('sigla',$siglaIncluir);
			$setor->setValue('cancelado','0');
			$setor->setValue('email',$emailIncluir);

			$setor->Atualizar($setor, $idAlterar);
?>
			<script>
				alert ("Setor alterado com sucesso!");
			</script>
<?php
		}else{
?>
			<script>
				alert ("Setor não alterado, preencha os campos obrigatórios!");
			</script>
<?php
		}
	}
?>	
</body>
</html>