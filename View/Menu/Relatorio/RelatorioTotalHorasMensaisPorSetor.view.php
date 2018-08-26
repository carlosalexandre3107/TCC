<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
	require_once("Style.php");
	require_once("../Entity/Configuracao.class.php");
	require_once("../Entity/TipoCartao.class.php");
	require_once("../Entity/Setor.class.php");
	require_once("../Entity/MesesAno.class.php");
	
	$tipoCartao = new TipoCartao();
	$setor = new Setor();
	$mesesAno = new MesesAno();
?>
<body>
<br />
<div class="boxcadastro">
    	<div class="boxtitulo">
       	  	<p style="	width:415px;">RELATÓRIO TOTAL DE HORAS MENSAIS POR SETOR</p>
   		</div><!--FIM DA DIV BOX TITULO-->
        
        <table width="500" class="formcadastro">
          <tr>
            <td>SETOR</td>
            <td><select name="setor">
					<?php
						$listaSetores = $setor->ListarSetores();
						foreach ($listaSetores as $itemSetor)
						{
					?>
							<option value="<?php echo ($itemSetor->id)?>"><?php echo ($itemSetor->descricao)?></option>
					<?php
						}
					?>
            	</select>
            </td>
          </tr>
		  <tr>
            <td>ANO</td>
            <td><select name="ano" >
					<?php
						for ($i=date("Y")-10; $i<=date("Y")+10; $i++){
							if ($i == $_SESSION['anoExer']){
					?>
								
								<option selected><?php echo $i; ?></option>
					<?php
							}else{
					?>
								<option><?php echo $i; ?></option>
					<?php
							}
						}
					?>	
				</select>
            </td>
          </tr>
          <tr>
            <td>MÊS</td>
            <td><select name="meses">
				<?php
					$meses = $mesesAno->ListarMeses();
					foreach ($meses as $mes){
				?>
            		<option value="<?php echo ($mes->id) ?>"><?php echo ($mes->nomeMes) ?></option>
				<?php
					}
				?>	
            	</select>
            </td>
            <td>
            	<input type="submit" name="exibir" value="EXIBIR" />
            </td>
			<td>
				
			</td>
          </tr>
  </table>
        </br>
	</div><!--FIM DA DIV BOX Gerenciar-->
<?php
if (isset($_POST['exibir']))
{
		
		$mesId = $_POST['meses'];
		$setorId = $_POST['setor'];
		$ano = $_POST['ano'];
		
		//echo ("Mes: ".$mesId." SetorId: ".$setorId." Ano: ".$ano);
	
		$listaTotalHorasMensaisPorSetor = $tipoCartao->RelatorioTotalHorasMensaisPorSetor($setorId, $ano,$mesId);
?>
    <div class="boxManter">
        <table width="900" border="1" bordercolor="#000000" class="tbManter">
			<?php
				if(!empty($listaTotalHorasMensaisPorSetor))
				{
			?>
				  <tr style='background:#999; margin:0 auto; font-weight:bold; font-family:calibri;'>
						<td colspan='7'>
							<center>
								<a target="_blank" 
								   href="IndexRelatorioPrint.php?relatorioPrint=totalHorasMensaisPorSetor&GetSetorId=<?php echo $setorId; ?>&GetMesId=<?php echo $mesId; ?>&GetAno=<?php echo $ano; ?>">IMPRIMIR
								</a>
							</center>
						</td>
				  </tr>
			<?php
				}
			?>
              <tr style="background:#999; margin:0 auto; font-weight:bold; font-family:calibri;">
                    <td width="400"><center>NOME</center></td>
                    <td width="60"><center>SETOR</center></td>
				  	<td width="120"><center>MÊS</center></td>
				  	<td width="60"><center>ANO</center></td>
				  	<td width="60"><center>PREVISTO</center></td>
				  	<td width="60"><center>REALIZADA</center></td>
				  	<td width="60"><center>TOTAL</center></td>
              </tr>
			  <?php
					if (empty($listaTotalHorasMensaisPorSetor)){
							//echo "<script> alert ('Não existe colaboradores para esses filtros!');</script>";
							echo "<center><strong>Não existe colaboradores para esses filtros!</strong></center>";
					}else{
						foreach ($listaTotalHorasMensaisPorSetor as $item){
			  ?>
              <tr>
							<td><?php echo $item->nome ?></td>
							<td><center><?php echo $item->sigla ?></center></td>
				  			<td><center><?php echo $item->mes ?></center></td>
							<td><center><?php echo $item->ano ?></center></td>
							<td><center><?php echo $item->prevista ?></center></td>
							<td><center><?php echo $item->realizada ?></center></td>
							<td><center><?php echo $item->total ?></center></td>
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