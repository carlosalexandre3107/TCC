<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
	require_once("Style.php");
	require_once("../Entity/Configuracao.class.php");
	require_once("../Entity/Colaborador.class.php");
	require_once("../Business/EnumGenerico.class.php");
	
	$obj = new EnumGenerico();
	$obj2 = new Colaborador();
	
	$meses = $obj->ListaMeses();
	
?>
<body>

<div class="boxcadastro">
    	<div class="boxtitulo">
       	  	<p style="	width:107px;">RELATÓRIOS</p>
   		</div><!--FIM DA DIV BOX TITULO-->
        
        <table width="500" class="formcadastro">
          <tr>
            <td>TIPOS</td>
            <td><select name="tipos" style="width:200px;">
            		<option>PREVISÃO DE FÉRIAS</option>
            	</select>
            </td>
          </tr>
          <tr>
            <td>MÊS</td>
            <td><select name="meses">
				<option>Todos</option>
				<?php
					foreach ($meses as $i){
				?>
            		<option><?php echo $i?></option>
				<?php
					}
				?>	
            	</select>
            </td>
            <td>
            	<input type="submit" name="exibir" value="EXIBIR" />
            </td>
			<td>
				<a target="_blank" href="RelatorioPrevesaoFerias.view.php?mes=1">Imprimir</a>
			</td>
          </tr>
  </table>
        </br>
	</div><!--FIM DA DIV BOX Gerenciar-->
<?php
	if (isset($_POST['exibir'])){
		$mes = $_POST['meses'];
		echo ($mes);
		if($mes != "Todos")
		{
			$numMes = $obj->ConvMes($mes);
		}else
		{
			$numMes = 0;
		}

?>
    <div class="boxManter">
        <table width="900" border="1" bordercolor="#000000" class="tbManter">
              <tr style="background:#999; margin:0 auto; font-weight:bold; font-family:calibri;">
                    <td width="120"><center>Nº DO CARTÃO</center></td>
                    <td width="120"><center>MATRÍCULA</center></td>
                    <td width="400"><center>NOME</center></td>
                    <td width="120"><center>SETOR</center></td>
              </tr>
			  <?php
					$linha = $obj2->ListarInner(1, 'Colaborador', 'feriasPrev', $numMes);
					if (empty($linha)){
							echo "<script> alert ('Não existe colaboradores para esses filtros!');</script>";
					}else{
						foreach ($linha as $item){
						  ?>
  ?>
              <tr>
							<td><center><?php echo $item->numCartao ?></center></td>
							<td><center><?php echo $item->matr ?></center></td>
							<td><?php echo $item->nome ?></td>
							<td><center><?php echo $item->descricao ?></center></td>
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