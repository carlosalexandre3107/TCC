<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
	require_once("Style.php");
	require_once("../Entity/Cartao.class.php");
	
	$cartao = new Cartao();

?>
<body>
<br />
<div class="boxcadastro">
    	<div class="boxtitulo">
       	  	<p style="	width:285px;">RELATÓRIO ETIQUETAS POR SETOR</p>
   		</div><!--FIM DA DIV BOX TITULO-->
        
        <table width="500" class="formcadastro">
          <tr>
            <td>PERÍODO DE 
					<select style="width:40px;" name="diaInicial">
						<?php
							for ($i=1; $i<=31; $i++){
								if($i<10){
						?>
								<option><?php echo "0".$i ?></option>
						<?php
								}else{
						?>
								<option><?php echo $i ?></option>
						<?php
								}
							}
						?>	
					</select>
					<b>/</b>
					<select style="width:40px;" name="mesInicial">
						<?php
							for ($i=1; $i<=12; $i++){
								if($i<10){
						?>
								<option><?php echo "0".$i ?></option>
						<?php
								}else{
						?>
								<option><?php echo $i ?></option>
						<?php
								}
							}
						?>
					</select>
					<b>/</b>
					<select style="width:60px;" name="anoInicial">
						<?php
							for ($i=date("Y")-20; $i<=date("Y")+20; $i++){
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
					<b>À</b>
					<select style="width:40px;" name="diaFinal">
						<?php
							for ($i=1; $i<=31; $i++){
								if($i<10){
						?>
								<option><?php echo "0".$i ?></option>
						<?php
								}else{
						?>
								<option><?php echo $i ?></option>
						<?php
								}
							}
						?>
					</select>
				<b>/</b>
					<select style="width:40px;" name="mesFinal">
						<?php
							for ($i=1; $i<=12; $i++){
								if($i<10){
						?>
								<option><?php echo "0".$i ?></option>
						<?php
								}else{
						?>
								<option><?php echo $i ?></option>
						<?php
								}
							}
						?>
					</select>
					<b>/</b>
					<select style="width:60px;" name="anoFinal">
						<?php
							for ($i=date("Y")-20; $i<=date("Y")+20; $i++){
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
            <td>
            	<input type="submit" name="exibir" value="EXIBIR" />
            </td>
          </tr>
  </table>
        </br>
	</div><!--FIM DA DIV BOX Gerenciar-->
<?php
if (isset($_POST['exibir']))
{

	$diaInicial = $_POST['diaInicial'];
	$mesInicial = $_POST['mesInicial'];
	$anoInicial = $_POST['anoInicial'];
	$diaFinal = $_POST['diaFinal'];
	$mesFinal = $_POST['mesFinal'];
	$anoFinal = $_POST['anoFinal'];
	
	//echo("diaInicial: ".$diaInicial." mesInicial: ".$mesInicial." anoInicial: ".$anoInicial." diaFinal: ".$diaFinal." mesFinal: ".$mesFinal." anoFinal: ".$anoFinal);	
	
	$cartao = new Cartao();
	
	$listaEtiquetasCartao = $cartao->RelatorioEtiquetasCartao();
	
?>
    <div class="boxManter">
        <table width="900" border="1" bordercolor="#000000" class="tbManter">
			<?php
				if(!empty($listaEtiquetasCartao))
				{
			?>
				  <tr style='background:#999; margin:0 auto; font-weight:bold; font-family:calibri;'>
						<td colspan='5'>
							<center>
								<a target="_blank" 
								   href="IndexRelatorioPrint.php?relatorioPrint=etiquetasCartao&GetDiaInicial=<?php echo $diaInicial; ?>&GetMesInicial=<?php echo $mesInicial ?>&GetAnoInicial=<?php echo $anoInicial ?>&GetDiaFinal=<?php echo $diaFinal?>&GetMesFinal=<?php echo $mesFinal?>&GetAnoFinal=<?php echo $anoFinal?>">IMPRIMIR
								</a>
							</center>
						</td>
				  </tr>
			<?php
				}
			?>
              <tr style="background:#999; margin:0 auto; font-weight:bold; font-family:calibri;">
                    <td width="410"><center>NOME</center></td>
                    <td width="100"><center>HORÁRIO</center></td>
                    <td width="100"><center>INTERVALO</center></td>
                    <td width="100"><center>SÁBADO</center></td>
                    <td width="100"><center>DOMINGO</center></td>
              </tr>
			  <?php
					if (empty($listaEtiquetasCartao)){
							//echo "<script> alert ('Não existe colaboradores para esses filtros!');</script>";
							echo "<center><strong>Não existe colaboradores para esses filtros!</strong></center>";
					}else{
						foreach ($listaEtiquetasCartao as $item){
			  ?>
              <tr>
							<td><?php echo ("&nbsp;&nbsp;".$item->nome) ?></td>
							<td><center><?php echo $item->horario ?></center></td>
							<td><center><?php echo $item->intervalo ?></center></td>
							<td><center><?php echo $item->sabado ?></center></td>
							<td><center><?php echo $item->domingo ?></center></td>
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