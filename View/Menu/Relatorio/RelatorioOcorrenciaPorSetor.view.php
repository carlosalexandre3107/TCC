<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
	require "Style.php";
	require_once("../Entity/Cartao.class.php");
	$cartao = new Cartao();
	
	require_once("../Entity/Colaborador.class.php");
	$colaborador = new Colaborador();
	
	require_once("../Entity/Setor.class.php");
	$setor = new Setor();
	
	require_once("../Business/EnumGenerico.class.php");
	$enumGenerico = new EnumGenerico();
	
	require_once("../Entity/MesesAno.class.php");
	$mesesAno = new MesesAno();
	
	require_once("../Entity/Ocorrencia.class.php");
	$ocorrencia = new Ocorrencia();
?>
<body>
<br />
<div class="boxcadastro">
    	<div class="boxtitulo">
       	  	<p style="	width:254px;">RELATÓRIO FALTAS POR SETOR</p>
   		</div><!--FIM DA DIV BOX TITULO-->
        
        <table width="500" class="formcadastro">
          <tr>
            <td>SETOR</td>
            <td>
				<select name="setor" style="width:200px;">
					<?php
						$listaSetores =	$setor->ListarSetores();
						
						if(count($listaSetores) > 0)
						{
							foreach($listaSetores as $itemSetor)
							{
					?>
								<option value="<?php echo $itemSetor->id ?>"><?php echo $itemSetor->descricao ?></option>
					<?php
							}
						}
					?>
            	</select>
            </td>
          </tr>
		  <tr>
            <td>OCORRENCIA</td>
            <td>
				<select name="ocorrencia" style="width:200px;">
					<?php
						$listaOcorrencias =	$ocorrencia->ListarSiglaOcorrencia();
						
						if(count($listaOcorrencias) > 0)
						{
							foreach($listaOcorrencias as $itemOcorrencia)
							{
					?>
								<option value="<?php echo $itemOcorrencia->id ?>"><?php echo $itemOcorrencia->descricao ?></option>
					<?php
							}
						}
					?>
            	</select>
            </td>
          </tr>
          <tr>
            <td>MÊS DO CARTÃO</td>
            <td><select name="meses">
				<?php
					$meses = $mesesAno->ListarMeses();
					foreach ($meses as $itemMes)
					{
						//$numMes = $enumGenerico->ConvMes($itemMes);
				?>
            		<option value="<?php echo ($itemMes->id) ?>"><?php echo ($itemMes->nomeMes) ?></option>
				<?php
					}
				?>	
            	</select>
            </td>
            <td>
            	<input type="submit" name="exibir" value="EXIBIR" />
            </td>
          </tr>
  </table>
        </br>
	</div><!--FIM DA DIV BOX Gerenciar-->
<?php
	if (isset($_POST['exibir'])){
		
		$mesId = $_POST['meses'];
		$setorId = $_POST['setor'];
		$ocorrenciaId = $_POST['ocorrencia'];
		
		//echo ("SetorId = ".$setorId." Mês = ".$mesId);
		
		$listaOcorrenciaPorSetor = $cartao->ListarOcorrenciaPorSetor($setorId, $mesId, $ocorrenciaId);
?>
    <div class="boxManter">
        <table width="900" border="1" bordercolor="#000000" class="tbManter">
			<?php
				if(!empty($listaOcorrenciaPorSetor))
				{
			?>
			  <tr style='background:#999; margin:0 auto; font-weight:bold; font-family:calibri;'>
						<td colspan='5'>
							<center>
								<a target="_blank" 
								   href="IndexRelatorioPrint.php?relatorioPrint=ocorrenciaPorSetor&GetSetorId=<?php echo $setorId; ?>&GetMesId=<?php echo $mesId; ?>&GetOcorrenciaId=<?php echo $ocorrenciaId; ?>">IMPRIMIR
								</a>
							</center>
						</td>
			  </tr>
			<?php
				}
			?>
              <tr style="background:#999; margin:0 auto; font-weight:bold; font-family:calibri;">
                    <td width="60"><center>DATA</center></td>
                    <td width="180"><center>TIPO</center></td>
                    <td width="400"><center>NOME</center></td>
                    <td width="120"><center>SETOR</center></td>
              </tr>
			  <?php
					if (empty($listaOcorrenciaPorSetor)){
							echo "<strong><center>Não existe colaboradores para esses filtros</center></strong>";
					}else{
						foreach ($listaOcorrenciaPorSetor as $item){
			  ?>
              <tr>
							<td><center><?php echo $item->diaCartao."/".$item->mesCartao ?></center></td>
							<td><center><?php echo $item->descricaoOcorrencia ?></center></td>
							<td><?php echo $item->nomeColaborador ?></td>
							<td><center><?php echo $item->descricaoSetor ?></center></td>
              </tr>
			  <?php
					}//FIM DO FOREACH
			  }//FIM DO ELSE
			  ?>
		</table>

    </div><!--FIM DA DIV TBMANTER-->
<?php
}
?>
</body>
</html>