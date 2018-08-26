<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
	require_once("Style.php");
	require_once("../Entity/Configuracao.class.php");
	require_once("../Entity/Colaborador.class.php");
	require_once("../Entity/Setor.class.php");
	require_once("../Entity/MesesAno.class.php");
	require_once("../Business/EnumGenerico.class.php");
	
	$enumGenerico = new EnumGenerico();
	$colaborador = new Colaborador();
	$setor = new Setor();
	$mesesAno = new MesesAno();
?>
<body>
<br />
<div class="boxcadastro">
    	<div class="boxtitulo">
       	  	<p style="	width:267px;">RELATÓRIO PREVISÃO DE FÉRIAS</p>
   		</div><!--FIM DA DIV BOX TITULO-->
        
        <table width="500" class="formcadastro">
          <tr>
            <td>SETOR</td>
            <td><select name="setor">
            		<option value="0">Todos</option>
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
            <td>MÊS</td>
            <td><select name="meses">
				<option value="0">Todos</option>
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
	if (isset($_POST['exibir'])){
		$mesId = $_POST['meses'];
		$setorId = $_POST['setor'];
		$listaPrevisaoFerias = $colaborador->RelatorioPrevisaoFerias($setorId, $mesId);
?>
    <div class="boxManter">
        <table width="900" border="1" bordercolor="#000000" class="tbManter">
			<?php
				if(!empty($listaPrevisaoFerias))
				{
			?>
				  <tr style='background:#999; margin:0 auto; font-weight:bold; font-family:calibri;'>
						<td colspan='5'>
							<center>
								<a target="_blank" 
								   href="IndexRelatorioPrint.php?relatorioPrint=previsaoFerias&GetSetorId=<?php echo $setorId; ?>&GetMesId=<?php echo $mesId; ?>">IMPRIMIR
								</a>
							</center>
						</td>
				  </tr>
			<?php
				}
			?>
              <tr style="background:#999; margin:0 auto; font-weight:bold; font-family:calibri;">
                    <td width="120"><center>Nº DO CARTÃO</center></td>
                    <td width="120"><center>MATRÍCULA</center></td>
                    <td width="400"><center>NOME</center></td>
                    <td width="120"><center>SETOR</center></td>
              </tr>
			  <?php
					if (empty($listaPrevisaoFerias)){
							//echo "<script> alert ('Não existe colaboradores para esses filtros!');</script>";
							echo "<center><strong>Não existe colaboradores para esses filtros!</strong></center>";
					}else{
						foreach ($listaPrevisaoFerias as $item){
			  ?>
              <tr>
							<td><center><?php echo $item->numeroCartao ?></center></td>
							<td><center><?php echo $item->matricula ?></center></td>
							<td><?php echo $item->nome ?></td>
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