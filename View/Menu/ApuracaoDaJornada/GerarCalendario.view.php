<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
	require "Style.php";
	require_once("../Business/EnumGenerico.class.php");
	
	$obj = new EnumGenerico();
	$linha = $obj->ListaMeses();
	
	$mesGet = $_GET['mes'];
?>
<body>
<div class="boxcadastro">
    	<div class="boxtitulo">
   	  	  <p style="	width:300px;">CALENDÁRIO DE FUNCIONAMENTO</p>
   		</div><!--FIM DA DIV BOX TITULO-->
        
        <table width="500" class="formcadastro">
              <tr>
                <td>MÊS: </td>
                <td><b><?php echo $obj->NumMes($mesGet); ?></b></td>
				<td><input type="submit" name="atualizar" value="ATUALIZAR" /></td>
              </tr>
  		</table>
        </br>
	</div>	<!--FIM DA DIV BOX Gerenciar-->
<?php
	require_once("../Business/EnumGenerico.class.php");
	
	$obj = new EnumGenerico();
	$linha = $obj->ListaMeses();

	require_once("../Business/MontarCalendario.class.php");
	echo '    <div class="boxManterCalendario">';
						 require_once("../Entity/Calendario.class.php");
						 $obj = new Calendario();
						  $l = $obj->ListarOcorrencia();
	echo MostreCalendario($mesGet, $l);
	echo "</div>";
?>
 
<?php
	if (isset($_POST['atualizar'])){
	
		$atualizarCalendario = $_POST['ocorrencia'];
		$diaCorrente         = $_POST['diaCorrente'];
		$numMes              = $_POST['numMes'];
		$idCalendario        = $_POST['idCalendario'];
		
		$cont = count($atualizarCalendario);

		
		require_once("../Business/EnumGenerico.class.php");
		$enumGenerico = new EnumGenerico();
		
		
		require_once("../Entity/Calendario.class.php");

		$diaSemana = 0;
		for ($i=0; $i<$cont; $i++){
		
			$diaSemana = $diaSemana + 1;
			
			$calendario = new Calendario();
			
			$calendario->setValue('ano', $_SESSION['anoExer']);
			$calendario->setValue('mes', $numMes);
			$calendario->setValue('dia', $diaCorrente[$i]);
			$calendario->setValue('diaSemana', $diaSemana);
			$calendario->setValue('Ocorrencia_id', $atualizarCalendario[$i]);
		
			//echo "</br> ANO ".$_SESSION['anoExer']." - MES ".$numMes." - DIACORR".$diaCorrente[$i]." - DIASEMA ".$diaSemana." - ATUCALEN ".$atualizarCalendario[$i]." - ID ".$idCalendario[$i];
			$calendario->Atualizar($calendario, $idCalendario[$i]);
		}
?>
		<script>
			alert ("Calendario atualizado com sucesso!");
		</script>
<?php		
	}
?>  
    
</body>
</html>