<html>
<head>
<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
</head>
<script type="text/javascript">

 function MostraFiltro(valor){
 
	 if (valor=='Setor') {
		 document.getElementById('filtro1').style.display = 'block';
		 document.getElementById('filtro3').style.display = 'block';
		 document.getElementById('filtro2').style.display = 'none';
		 document.getElementById('filtro4').style.display = 'none';
	 }else if (valor=='Colaborador') {
		 document.getElementById('filtro2').style.display = 'block';
		 document.getElementById('filtro4').style.display = 'block';
		 document.getElementById('filtro1').style.display = 'none';
		 document.getElementById('filtro3').style.display = 'none';
	 }else {
 		 document.getElementById('filtro1').style.display = 'none';
		 document.getElementById('filtro2').style.display = 'none';
		 document.getElementById('filtro3').style.display = 'none';
		 document.getElementById('filtro4').style.display = 'none';
	 }
 }
 
 function NovaJanela (url,janela){
	window.open(url, janela);
 }

</script>
<?php
	require "Style.php";
	require_once("../Business/EnumGenerico.class.php");
	require_once("../Entity/TipoCartao.class.php");
	require_once("../Entity/Setor.class.php");
	require_once("../Entity/Colaborador.class.php");
	$enumGenerico = new EnumGenerico();
	
	$ano = $_SESSION['anoExer'];
?>
<body>
	<br />
<div class="boxcadastro">
    	<div class="boxtitulo">
       	  	<p style="	width:130px;">GERAR CARTÃO</p>
   		</div><!--FIM DA DIV BOX TITULO-->
        <!-- <form method="post" > -->
            <table width="100" class="formcadastro">
              <tr>
                <td><span>MÊS</span></td>
                <td>
					<select name="meses">
						<?php
							
							$listaMeses = $enumGenerico->ListaMeses();
							foreach ($listaMeses as $itemMes)
							{ 
						?>
								<option value="<?php echo $enumGenerico->ConvMes($itemMes); ?>"><?php echo $itemMes; ?></option>
							<?php 
							}
							?>
                    </select>
                </td>
              </tr>
              
			  <tr>
                <td><span>OPÇÃO</span></td>
                <td>
					<select name="opcao" id="opcao" onChange="MostraFiltro(this.value);">
                        <option id="geral">Geral</option>
                        <option id="setor" >Setor</option>
                        <option id="colaborador">Colaborador</option>
                    </select>
				</td>
              </tr>
			  
              <tr>
                    <td><span id="filtro1" style="display:none;">SETOR</span></td>
                    <td>
						<select name="setor" id="filtro3" style="display:none;">
                            <?php
								$setor = new Setor();
								$listaSetores = $setor->ListarSetores();
								foreach ($listaSetores as $itemSetor)
								{
							?>
									<option value="<?php echo $itemSetor->id ?>"><?php echo $itemSetor->descricao ?></option>
							<?php
								}
							?>
                        </select>
                    </td>
              </tr>
              <tr>
                <td><span id="filtro2" style="display:none;">Nº DO CARTÃO</span></td>
                <td><input type="number" name="nDoCartao" id="filtro4" style="display:none;"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><input type="submit" name="proximo" value="PROXIMO"/></td>
                <td>&nbsp;</td>
              </tr>
      </table>
      <!-- </form> -->
        </br>
	</div><!--FIM DA DIV BOX Gerenciar-->
	        </br>
<?php
	
if(isset($_POST['proximo']))
	{

	$mes = $_POST ['meses'];
	$opcao = $_POST['opcao'];
	if (isset($_POST['setor'])){
		$setor = $_POST['setor'];
	}else{
			$setor = NULL;
	}
	$numCartao = $_POST['nDoCartao'];
?>	
	<input type="hidden" name="mesG" id="mesG" value="<?php echo $mes; ?>" />
	
<?php	
	function opcaoCartao($mes, $opcao, $setor, $numCartao)
	{
		if ($opcao == 'Setor'){
			$enumGenerico = new EnumGenerico();
?>
			<div class='boxcadastro'>
						<div class='boxtitulo'>
						  <p style='width:305px;'>CARTÕES PREVISTO PARA GERAÇÃO</p>
						</div><!--FIM DA DIV BOX TITULO-->
					
					<table width='300' class='formcadastro'>
						  <tr>
							<td>MÊS</td>
							<td><input type="text" name="mesSetor" value="<?php echo $enumGenerico->NumMes($mes); ?>" disabled /></td>
						  </tr>
						  <tr>
							<td>SETOR</td>
							<td>
								<?php
									$setorObjeto = new Setor();
									$returnSetor = $setorObjeto->SetorEditar($setor);
									foreach($returnSetor as $itemSetor)
										{
								?>
											<input type="text" name="setor" value="<?php echo $itemSetor->sigla; ?>" disabled />
								<?php
										}
								?>
							  </td>
						  </tr>
						  <tr>
							<td>OPÇÃO</td>
							<td><input type="text" name="opcaoSetor" value=" <?php echo $opcao; ?>" disabled /></td>
							<td><input type='submit' id='gerarCartao' name='gerarCartao' value='GERAR' /></td>
						  </tr>
					</table>					
				</br>
			<div class='boxManter'>
					<table width='900' border='1' bordercolor='#000000' class='tbManter' align='center'>
						  <tr style='background:#999; margin:0 auto; font-weight:bold; font-family:calibri;'>
							<td colspan='5'><center><?php echo $enumGenerico->NumMes($mes); ?></center></td>
						  </tr>
						  <tr style='background:#999; margin:0 auto; font-weight:bold; font-family:calibri;'>
								<td width='120'><center>Nº DO CARTÃO</center></td>
								<td width='400'><center>NOME</center></td>
								<td width='120'><center>SETOR</center></td>
						  </tr>
						  	<?php
								$colaborador = new Colaborador();
								$enumGenerico = new EnumGenerico();
								
								//echo "2 - ".$opcao." numCartao ".$numCartao." - ".$mes." - ".$_SESSION['anoExer'];
								
								$listaColaboradores = $colaborador->PrevGeracao(1,$opcao,'id',$setor, $mes, $_SESSION['anoExer']);
								if (count($listaColaboradores)>0){
								foreach($listaColaboradores as $itemColaborador){
							?>
								  <tr>
										<input type="hidden" name="id[]" value="<?php echo $itemColaborador->id; ?>" />
										<td><center><?php echo $itemColaborador->numCartao;?></center></td>
										<td><center><?php echo $itemColaborador->nome; ?></center></td>
										<td><center><?php echo $itemColaborador->sigla; ?></center></td>
								  </tr>
							<?php } 
								}else{
									echo ("<strong><center>Não exitem cartão para esse filtro</center></strong>");
								}
							?>
					</table>
						
				</div><!--FIM DA DIV TBMANTER-->
				<br />
			</div>	<!--FIM DA DIV BOX Gerenciar-->
<?php
		}else if ($opcao == 'Colaborador')
			{
			$enumGenerico = new EnumGenerico();
?>
			<div class='boxcadastro'>
						<div class='boxtitulo'>
						  <p style='width:305px;'>CARTÕES PREVISTO PARA GERAÇÃO</p>
						</div><!--FIM DA DIV BOX TITULO-->
					
					<table width='300' class='formcadastro'>
						  <tr>
							<td>MÊS</td>
							<td><input type="text" name="mesColaborador" value=" <?php echo $enumGenerico->NumMes($mes); ?>" disabled /></td>
						  </tr>
						  <tr>
							<td>NÚMERO DO CARTÃO</td>
							<td><input type="text" name="numCartaoColaborador" value=" <?php echo $numCartao; ?>" disabled /></td>
						  </tr>
						  <tr>
							<td>OPÇÃO</td>
							<td><input type="text" name="opcaoColaborador" value=" <?php echo $opcao; ?>" disabled /></td>
							<td><input type='submit' id='gerarCartao' name='gerarCartao' value='GERAR'/></td>
						  </tr>
					</table>				
				</br>
			<div class='boxManter'>
					<table width='900' border='1' bordercolor='#000000' class='tbManter' align='center'>
						  <tr style='background:#999; margin:0 auto; font-weight:bold; font-family:calibri;'>
							<td colspan='5'><center><?php echo $enumGenerico->NumMes($mes); ?></center></td>
						  </tr>
						  <tr style='background:#999; margin:0 auto; font-weight:bold; font-family:calibri;'>
								<td width='120'><center>Nº DO CARTÃO</center></td>
								<td width='400'><center>NOME</center></td>
								<td width='120'><center>SETOR</center></td>
						  </tr>
						  	<?php
								$colaborador = new Colaborador();
								$enumGenerico = new EnumGenerico();
								
								//echo "2 - ".$opcao." numCartao ".$numCartao." - ".$mes." - ".$_SESSION['anoExer'];
								
								$listaColaboradores = $colaborador->PrevGeracao(2,$opcao,'numCartao',$numCartao, $mes, $_SESSION['anoExer']);
								if (count($listaColaboradores)>0){
								foreach($listaColaboradores as $itemColaborador){
							?>
								  <tr>
										<input type="hidden" name="id[]" value="<?php echo $itemColaborador->id; ?>" />
										<td><center><?php echo $itemColaborador->numCartao;?></center></td>
										<td><center><?php echo $itemColaborador->nome; ?></center></td>
										<td><center><?php echo $itemColaborador->sigla; ?></center></td>
								  </tr>
							<?php }
								}else{
										echo ("<strong><center>Não exitem cartão para esse filtro</center></strong>");		
								}
							?>
					</table>
						
				</div><!--FIM DA DIV TBMANTER-->
				<br />
			</div>	<!--FIM DA DIV BOX Gerenciar-->
<?php
		}else if ($opcao == 'Geral')
			{
			$enumGenerico = new EnumGenerico();
?>
			<div class="boxcadastro">
				<div class="boxtitulo">
					  <p style="width:295">CARTÕES PREVISTO PARA GERAÇÃO</p>
				</div><!--FIM DA DIV BOX TITULO-->
					
					<table width='300' class='formcadastro'>
						  <tr>
							<td>MÊS</td>
							<td><input type="text" name="mesGeral" value="<?php echo $enumGenerico->NumMes($mes); ?>" disabled /></td>
							
						  </tr>
						  <tr>
							<td>OPÇÃO</td>
							<td><input type="text" name="opcaoGeral" value=" <?php echo $opcao; ?>" disabled /></td>
							<td><input type="submit" id="gerarCartao" name="gerarCartao" value='GERAR'/></td>
						  </tr>
					</table>				
				</br>
			<div class='boxManter'>
					<table width='900' border='1' bordercolor='#000000' class='tbManter' align='center'>
						  <tr style='background:#999; margin:0 auto; font-weight:bold; font-family:calibri;'>
							<td colspan='5'><center><?php echo $enumGenerico->NumMes($mes); ?></center></td>
						  </tr>
						  <tr style='background:#999; margin:0 auto; font-weight:bold; font-family:calibri;'>
								<td width='120'><center>Nº DO CARTÃO</center></td>
								<td width='400'><center>NOME</center></td>
								<td width='120'><center>SETOR</center></td>
						  </tr>
						  	<?php
								$colaborador = new Colaborador();
								$enumGenerico = new EnumGenerico();
								
								//echo "2 - ".$opcao." numCartao ".$numCartao." - ".$mes." - ".$_SESSION['anoExer'];
								
								$listaColaboradores = $colaborador->PrevGeracao(0,'','','',$mes, $_SESSION['anoExer']);
								if (count($listaColaboradores) > 0)
									{
										foreach($listaColaboradores as $itemColaborador){
							?>
									  <tr>	
											<input type="hidden" name="id[]" value="<?php echo $itemColaborador->id; ?>" />
											<td><center><?php echo $itemColaborador->numCartao;?></center></td>
											<td><center><?php echo $itemColaborador->nome; ?></center></td>
											<td><center><?php echo $itemColaborador->sigla; ?></center></td>
									  </tr>
								 
							<?php 
									}
								}else{
							?>	
									<script type="text/javascript">
										alert("Não possui resultado!");
									</script>
							<?php	
								}
							?>
					</table>
						
				</div><!--FIM DA DIV TBMANTER-->
				<br />
			</div>	<!--FIM DA DIV BOX Gerenciar-->
				
<?php
		}else {
			echo ("<strong><center>Não exitem cartão para esse filtro</center></strong>");			
		}
		return;
	}
	opcaoCartao($mes, $opcao, $setor, $numCartao);
} 
?>

<?php
if(isset($_POST['gerarCartao'])){

	$id = $_POST['id'];
	$mesG = $_POST['mesG'];
	$ano = $_SESSION['anoExer'];
	
	$qtd = count($id);
	$cont = 0;
	
	for($i=0; $i<$qtd; $i++){

		$tipoCartao = new TipoCartao();

		$tipoCartao->setValue('mes',$mesG);
		$tipoCartao->setValue('lancado','0');
		$tipoCartao->setValue('cancelado','0');
		$tipoCartao->setValue('ano',$ano);
		$tipoCartao->setValue('colaborador_id',$id[$i]);
		
		//echo("<br>");
		//print_r($tipoCartao);
		
		$return = $tipoCartao->Inserir($tipoCartao);
		//$return = 0;
		
		if($return > 0)
		{
			$cont++;
		}
	}
	if($cont == $qtd)
	{
		echo ("<strong><center>Foram gerados ".$cont." cartão com sucesso</center></strong>");
	}else
	{
		echo ("<strong><center>Desculpe, ocorreu algum erro na geração</center></strong>");
	}
}
?>

	
</body>
</html>