<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
	require_once("Style.php");
	require_once("../Business/EnumGenerico.class.php");
	require_once("../Entity/Colaborador.class.php");
	
	$enumGenerico = new EnumGenerico();
	$colaborador = new Colaborador();	

?>
<body>
	<br>
<div class="boxcadastro">
    	<div class="boxtitulo">
   	  	  <p style="width:290px;">CALENDÁRIO DE FUNCIONAMENTO</p>
   		</div><!--FIM DA DIV BOX TITULO-->
        
        <table width="500" class="formcadastro">
              <tr>
                <td>MÊS</td>
                <td><select name="meses">
				<?php
					$listaMeses = $enumGenerico->ListaMeses();
					foreach ($listaMeses as $mes){
				?>
            		<option><?php echo $mes?></option>
				<?php
					}
				?>	
                    </select>
                </td>
				<td><input type="submit" name="exibir" value="EXIBIR"/></td>
              </tr>
  		</table>
        </br>
	</div>	<!--FIM DA DIV BOX Gerenciar-->
	<?php
		if (!isset($_POST['meses'])){
			$mes = "Janeiro";
		}else { 
			$mes = $_POST['meses'];
		}
	?>
    <div class="boxManterCalendario">
	<?php
		$numMes = $enumGenerico->ConvMes($mes);
		
		require_once("../Business/MontarCalendario.class.php");
		echo "<br />";
		MontarCalendario::MostreCalendarioView($numMes);
	?>
	</div><!-- FIM DA DIV BOX MANTER CALENDARIO-->
	</br>
    </br>
    <div class="boxManter">
        <table width="900" border="1" bordercolor="#000000" class="tbManter">
              <tr style="background:#999; margin:0 auto; font-weight:bold; font-family:calibri;">
              	<td colspan="5"><center>COLABORADORES COM FÉRIAS PREVISTA</center></td>
              </tr>
              <tr style="background:#999; margin:0 auto; font-weight:bold; font-family:calibri;">
                    <td width="120"><center>Nº DO CARTÃO</center></td>
                    <td width="120"><center>MATRICULA</center></td>
                    <td width="400"><center>NOME</center></td>
                    <td width="120"><center>SETOR</center></td>
                    <td width="120"><center>MÊS</center></td>
              </tr>
			  <?php

					$numMes = $enumGenerico->ConvMes($mes);
					
					$linha = $colaborador->ListarInner(1, 'Colaborador', 'MesesAno_id', $numMes);
					if (!empty($linha)){
						foreach ($linha as $item){
				  ?>
				  <tr>
						<td><center><?php echo $item->numCartao ?></center></td>
						<td><center><?php echo $item->matr ?></center></td>
						<td><?php echo $item->nome ?></td>
						<td><center><?php echo $item->descricao ?></center></td>
						<td><center><?php echo $mes ?></center></td>
				  </tr>
				  <?php
						}
					}
			  ?>
    </table>
		
    </div><!--FIM DA DIV TBMANTER-->
    <br>
    
</body>
</html>