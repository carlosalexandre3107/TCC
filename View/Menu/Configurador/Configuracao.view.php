<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
	require "Style.php";
	require_once("../Entity/Configuracao.class.php");
	$configurador = new Configuracao();
?>
<body>
<br>
<div class="boxcadastro">
    	<div class="boxtitulo">
       	  	<p style="	width:261px;">CONFIGURAÇÃO DA APURAÇÃO</p>
   		</div><!--FIM DA DIV BOX TITULO-->
        
        <table width="600" class="formcadastro">
		<?php
			$result = $configurador->ListarConfiguracao();
			foreach ($result as $item){
		?>
				  <tr>
					<td>DIA DE INÍCIO DO LANÇAMENTO DO CARTÃO</td>
					<td><select name="dias" disabled>
						<?php
							for ($i=1; $i<=31; $i++){
								if ($i == $item->inicioCartao){
						?>
									<option selected><?php echo $i ?></option>
									
						<?php
								}else{
						?>
									<option><?php echo $i ?></option>
						<?php	
								}
							}
						?>	
						</select> 
					</td>
				  </tr>
				  <tr>
					<td>PREENCHIMENTO AUTOMÁTICO DO CARTÃO</td>
					<td><select name="autocartao" disabled>
						<?php
							if ($item->preenCartao == 1){
						?>
							<option value="1" selected>SIM</option>
							<option value="0" >NÃO</option>
						<?php
							}else{
						?>	
							<option value="1">SIM</option>
							<option value="0" selected>NÃO</option>
						<?php
							}
						?>
						</select> </td>
				  </tr>
				  <tr>
					<td>ANO DE EXERCÍCIO</td>
					<td>
						<select name="anoExer" >
							<?php
								for ($i=date("Y")-15; $i<=date("Y")+15; $i++){
									if ($i == $item->anoExer){
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
				  	<td>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<input type="submit" name="gravar" value="GRAVAR"/>
					</td>
				  </tr>
			<?php
				}
			?>  
			</table>
        </br>
</div><!--FIM DA DIV BOX Gerenciar-->

<?php
if (isset($_POST['gravar']))
{
	
	$dia = 0;//$_POST['dias'];
	$preenCartao = 1;//$_POST['autocartao'];
	$anoExer = $_POST['anoExer'];
	
	$configuracao = new Configuracao();
	
	$configuracao->setValue('preenCartao',$preenCartao);
	$configuracao->setValue('inicioCartao',$dia);
	$configuracao->setValue('anoExer',$anoExer);
	
	$result = $configuracao->Atualizar($configuracao,1);
	
	if($result == 1)
	{
		echo ("<center><strong>Configuração gravada com sucesso!</strong></center>");
	}
	
	if($anoExer != $_SESSION['anoExer'])
	{
		$_SESSION['anoExer'] = $anoExer;
?>
	<script>
		location.reload();
	</script>
	<?php
	}
		
	
}
?>
	

</body>
</html>