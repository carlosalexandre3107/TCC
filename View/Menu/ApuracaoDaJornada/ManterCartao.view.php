<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<link rel="" type="text/javascript" href="Js/NovaJanela.js">-->
</head>
<?php
	require "Style.php";
	require_once("../Entity/Setor.class.php");
	
	require_once("../Business/EnumGenerico.class.php");
	$enumGenerico = new EnumGenerico();
	
	require_once("../Entity/TipoCartao.class.php");
	$tipoCartao = new TipoCartao();
	
	if(empty($_SESSION['anoExer']))
	{
		location.reload();	
	}else{
		$ano = $_SESSION['anoExer'];
	}

?>
<script language=javascript>
	function NovaJanela (url,janela){
		window.open(url, janela);
	}
</script>
<body>
<br />
<div class="boxcadastro">
    	<div class="boxtitulo">
       	  	<p style="width:69px;">CARTÃO</p>
   		</div><!--FIM DA DIV BOX TITULO-->
        
        <table width="500" class="formcadastro">
          <tr>
            <td>MÊS</td>
            <td><select name="meses">
				<option value="0">Todos</option>
                <?php
					$listaMeses = $enumGenerico->ListaMeses();
                    foreach ($listaMeses as $itemMes)
					{ 
				?>		
                        <option value="<?php echo $enumGenerico->ConvMes($itemMes); ?>"><?php echo $itemMes ?></option>
                <?php 
					}
                ?>
            	</select>
            </td>
          </tr>
          <tr>
            <td>Nº DO CARTÃO</td>
            <td><input type="number" name="nDoCartao"/></td>
          </tr>
		  <tr>
			<td>SETOR</td>
			<td><select name="setor">
					<option value="0">Todos</option>
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
            <td>CANCELADOS</td>
            <td><select name="cancelados">
            		<option value="2">Todos</option>
                    <option value="1">Sim</option>
                    <option selected value="0">Não</option>
            	</select>
            </td>
          </tr>
          <tr>
            <td>LANÇADO</td>
            <td><select name="lancado">
            		<option value="2">Todos</option>
                    <option value="1">Sim</option>
                    <option selected value="0">Não</option>
            	</select>
            </td>
            <td>
            <input type="submit" name="buscar" value="BUSCAR"/>
            </td>
          </tr>
  </table>
        </br>
	</div><!--FIM DA DIV BOX Gerenciar-->

<?php
if (isset($_POST['buscar']))
	{
?>
    <div class="boxManter">
        <table width="900" border="1" bordercolor="#000000" class="tbManter">
              <tr style="background:#999; margin:0 auto; font-weight:bold; font-family:calibri;">
					<td width="80"><center>MANTER</center></td>
					<td width="90"><center>Nº CARTÃO</center></td>
                    <td width="470"><center>NOME</center></td>
                    <td width="120"><center>MÊS</center></td>
                    <td width="120"><center>LANÇADO</center></td>
                    <td width="120"><center>CANCELADO</center></td>
              </tr>
			  <?php
					
						$mes = $_POST['meses'];
						$numCartao = $_POST['nDoCartao'];
						$setor = $_POST['setor'];
						$cancelado = $_POST['cancelados'];
    				    $lancado = $_POST['lancado'];
    
						
                       /*
                        echo ("Mes: ".$mes.
                              " == numCartao: ".$numCartao.
                              " == Setor: ".$setor.
                              " == Cancelado: ".$cancelado.
                              " == Lancado: ".$lancado);
                       */
						
						//echo ("Ano = ".$ano." Mes = ".$mes." NumCartao = ".$numCartao." Setor = ".$setor." Cancelado = ".$cancelado." Lançado = ".$lancado."<br />");
						$listaCartoes = $tipoCartao->ListarCartoes($ano ,$mes, $numCartao, $setor ,$cancelado, $lancado);
						
						if (empty($listaCartoes)){
							echo ("<strong><center>Não existe cartão com esses filtros!</center></strong>");
						}else{
							foreach($listaCartoes as $item){
				?>
								<form method="post">	
								  <tr>
										<?php
											if ($item->lancado == 1){
										?>
												<td>
                                                    <center>
                                                        <a title="Editar Cartão" style="color: inherit; text-decoration: inherit;" href="?menu=CadastroCartao&mes=<?php echo $item->mes; ?>&numCartao=<?php echo $item->numCartao; ?>&idCartao=<?php echo $item->id; ?>&idCol=<?php echo $item->colaborador_id; ?>&Cancelado=<?php echo $item->cancelado; ?>&ano=<?php echo $item->ano; ?>&lancado=<?php echo $item->lancado; ?>">
                                                            <i class="fa fa-pencil-square-o fa-lg"></i>
                                                        </a>
                                                    </center>
                                                </td>
										<?php
											}else{
										?>
												<td>
                                                    <center>
                                                        <a title="Lancar cartão" style="color: inherit; text-decoration: inherit;" href="?menu=CadastroCartao&mes=<?php echo $item->mes; ?>&numCartao=<?php echo $item->numCartao; ?>&idCartao=<?php echo $item->id; ?>&idCol=<?php echo $item->colaborador_id; ?>&Cancelado=<?php echo $item->cancelado; ?>&ano=<?php echo $item->ano; ?>&lancado=<?php echo $item->lancado; ?>">
                                                            <i class="fa fa-file-o fa-lg"></i>
                                                        </a>
                                                    </center>
                                                </td>
										<?php	
											}
										
										?>
										<td><center><?php echo $item->numCartao; ?><input type="hidden" name="numCartaoManter" value="<?php echo $item->numCartao; ?>" /></center></td>
										<td><center><?php echo $item->nome; ?></center></td>
										<td><center><?php echo $enumGenerico->NumMes($item->mes); ?><input type="hidden" name="mesCartaoManter" value="<?php echo $item->mes; ?>" /></center></td>
										<td><center><?php echo $enumGenerico->Status($item->lancado); ?><input type="hidden" name="lancadoCartaoManter" value="<?php echo $item->lancado; ?>" /></center></td>
										<?php
											if ($item->cancelado == 1){
										?>
											<td><center><input style="border: 3px solid #900;" type="submit" name="cancelado" value="<?php echo $enumGenerico->Status($item->cancelado); ?>" /></center></td>
										<?php
											}else{
										?>
											<td><center><input style="border: 3px solid #060;" type="submit" name="cancelado" value="<?php echo $enumGenerico->Status($item->cancelado); ?>" /></center></td>
										<?php
											}
										?>
										<input type="hidden" name="idTipoCartao" value="<?php echo $item->id; ?>"/>
										<input type="hidden" name="idColaboradorTipoCartao" value="<?php echo $item->colaborador_id; ?>"/>
										
								  </tr>
								</form>  
				<?php
							}//FIM DO FOREACH
						}//FIM ELSE
			  ?>  
    </table>
    </div><!--FIM DA DIV TBMANTER-->
	
<?php
}//FIM DO IF DO POST['BUSCAR']
?>

<?php
if (isset($_POST['cancelado']))
{
	$cancelado = $_POST['cancelado'];
	$id = $_POST['idTipoCartao'];
	$mes = $_POST['mesCartaoManter'];
	$lancado = $_POST['lancadoCartaoManter'];
	$col_id = $_POST['idColaboradorTipoCartao'];
	
	if ($cancelado == "Sim"){
		$numCancelado = '0';
	}else if ($cancelado == "Não"){
		$numCancelado = 1;
	}
	
	require_once("../Entity/TipoCartao.class.php");
	$tipoCartao = new TipoCartao();
	
	$tipoCartao->setValue('id',$id);
	$tipoCartao->setValue('mes',$mes);
	$tipoCartao->setValue('lancado',$lancado);
	$tipoCartao->setValue('cancelado',$numCancelado);
	$tipoCartao->setValue('ano',$_SESSION['anoExer']);
	$tipoCartao->setValue('colaborador_id',$col_id);
	
	$tipoCartao->Atualizar($tipoCartao,$id);
?>
<?php
}
?>
</body>
</html>