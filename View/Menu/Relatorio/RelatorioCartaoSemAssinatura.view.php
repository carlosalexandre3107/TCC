<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
	require "Style.php";
	require_once("../Entity/Cartao.class.php");
	require_once("../Entity/MesesAno.class.php");
	
	$cartao = new Cartao();
	$mesesAno = new MesesAno();

?>
<body>
<br />
<div class="boxcadastro">
    	<div class="boxtitulo">
       	  	<p style="	width:316px;">RELATÓRIO CARTÃO SEM ASSINATURA</p>
   		</div><!--FIM DA DIV BOX TITULO-->
        
        <table width="300" class="formcadastro">
          <tr>
            <td>
				<center>
					<select name="meses">
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
				</center>
            </td>
			</tr>
			<tr>
			<td>
				<center>
					<select name="ano" >
						<option value="0">Todos</option>
						<?php
							for ($i=date("Y")-15; $i<=date("Y")+15; $i++){
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
				</center>
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
		$idMes = $_POST['meses'];
		$ano = $_POST['ano'];
	
		$listarCartoesSemAssinatura = $cartao->ListarCartoesSemAssinatura($idMes, $ano);
?>
    <div class="boxManter">
        <table width="900" border="1" bordercolor="#000000" class="tbManter">
			<?php
				if(!empty($listarCartoesSemAssinatura))
				{
			?>
				  <tr style='background:#999; margin:0 auto; font-weight:bold; font-family:calibri;'>
						<td colspan='5'>
							<center>
								<a target="_blank" 
								   href="IndexRelatorioPrint.php?relatorioPrint=cartoesSemAssinatura&GetIdMes=<?php echo $idMes; ?>&GetAno=<?php echo $ano ?>">IMPRIMIR
								</a>
							</center>
						</td>
				  </tr>
			<?php
				}
			?>
              <tr style="background:#999; margin:0 auto; font-weight:bold; font-family:calibri;">
                    <td width="400"><center>NOME</center></td>
                    <td width="200"><center>SETOR</center></td>
                    <td width="110"><center>MÊS</center></td>
                    <td width="50"><center>ANO</center></td>
              </tr>
			  <?php
					if (empty($listarCartoesSemAssinatura)){
							//echo "<script> alert ('Não existe colaboradores para esses filtros!');</script>";
							echo "<center><strong>Não existe colaboradores para esses filtros!</strong></center>";
					}else{
						foreach ($listarCartoesSemAssinatura as $item){
			  ?>
              <tr>
							<td><?php echo ("&nbsp;&nbsp;".$item->nome) ?></td>
							<td><center><?php echo $item->descricao ?></center></td>
							<td><center><?php echo $item->nomeMes ?></center></td>
							<td><center><?php echo $item->ano ?></center></td>
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