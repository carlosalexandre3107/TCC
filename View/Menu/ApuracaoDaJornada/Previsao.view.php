<link rel="stylesheet" type="text/css" href="Css/Gerenciar.css">
<link rel="stylesheet" type="text/css" href="css/TabelaManter.css">
<?php
	require_once "../entity/colaborador.class.php";
	
	echo "
		<style type='text/css'>
			.boxcadastro{
				margin:0 auto;
				border:1px solid #888;
				width:950px;
				font-weight:bold;
				margin-bottom: 20px;
			
			}
			.boxtitulo p{
				font-family:calibri;
				font-size:20px;
				margin-left:30px;
				margin-top:-14px;
				background:#FFF;
			}
			.formcadastro{
				font-family:calibri;
				font-size:15px;
				margin-left:30px;
			}
		</style>
	";
	
	$mes = $_POST ['meses'];
	$opcao = $_POST['opcao'];
	$setor = $_POST['setor'];
	$numCartao = $_POST['nDoCartao'];
	

	opcaoCartao($mes, $opcao, $setor, $numCartao);
	
	function opcaoCartao($mes, $opcao, $setor, $numCartao){
		if ($opcao == 'Setor'){
			prevSetor($mes, $setor, $opcao);
		}else if ($opcao == 'Colaborador'){
			prevColaborador($mes, $numCartao, $opcao);
		}else if ($opcao == 'Geral'){
			prevGeral($mes, $opcao);
		}else {
			echo "Vazio";			
		}
		return;
	}
	

	
	function prevGeral($mes, $opcao){
		
		//$sql = mysql_query("SELECT numCartao, nome, descricao FROM colaborador , setor WHERE Setor_idSetor=idSetor");
?>			
					<div class='boxcadastro'>
						<div class='boxtitulo'>
						  <p style='width:305px;'>CARTÕES PREVISTO PARA GERAÇÃO</p>
						</div><!--FIM DA DIV BOX TITULO-->
					
					<table width='300' class='formcadastro'>
						  <tr>
							<td>MÊS</td>
							<td><?php echo $mes; ?></td>
						  </tr>
						  <tr>
							<td>OPÇÃO</td>
							<td><?php echo $opcao; ?></td>
							<td><input type='button' id='gerarCartao' name='gerarCartao' value='GERAR' onclick='window.open("Class.GeracaoCartao.php?mes=<?php echo $mes;?>&opcao=<?php echo $opcao?>")'/></td>
						  </tr>
					</table>
					
				</br>
			</div>	<!--FIM DA DIV BOX Gerenciar-->
			
			
			
			<div class='boxManter'>
					<table width='900' border='1' bordercolor='#000000' class='tbManter' align='center'>
						  <tr style='background:#999; margin:0 auto; font-weight:bold; font-family:calibri;'>
							<td colspan='5'><center>$mes</center></td>
						  </tr>
						  <tr style='background:#999; margin:0 auto; font-weight:bold; font-family:calibri;'>
								<td width='120'><center>Nº DO CARTÃO</center></td>
								<td width='400'><center>NOME</center></td>
								<td width='120'><center>SETOR</center></td>
						  </tr>
						  	<?php
								
								$obj = new Colaborador();
								
								$linha = $obj->ListaInner(0,'','','');
								
								foreach($linha as $item){
							?>
								  <tr>
										<td><?php echo $item->numCartao;?></td>
										<td><?php echo $item->nome; ?></td>
										<td><?php echo $item->descricao; ?></td>
								  </tr>
							<?php } ?>
					</table>
						
				</div><!--FIM DA DIV TBMANTER-->";

	<?php } ?>