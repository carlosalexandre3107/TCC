<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="Css/TabelaJornada.css">
<link rel="stylesheet" type="text/css" href="Css/Gerenciar.css">
</head>
<body>
<?php
	$idCartao = $_GET['idCartao'];
	$ano = $_GET['ano'];
	$mes = $_GET['mes'];
	$dia = $_GET['dia'];
	//echo $idCartao." - ".$ano." - ".$mes." - ".$dia;
?>
<div class="boxcadastro" style="margin-top:20px;">
    	<div class="boxtitulo">
       	  	<p style="	width:235px;">JUSTIFICATIVA</p>
   		</div><!--FIM DA DIV BOX TITULO-->
   <form method="post">    
        <table width="400" class="formcadastro">
			<tr>
				<td>Motivo:</td>
				<td><textarea name="textoJus" cols="30" rows="5"></textarea>
					<input type="hidden" name="idCartao" value="<?php echo $idCartao;?>"/>
					<input type="hidden" name="ano" value="<?php echo $ano;?>"/>
					<input type="hidden" name="mes" value="<?php echo $mes;?>"/>
					<input type="hidden" name="dia" value="<?php echo $dia;?>"/>
					<input type="submit" name="inserir" value="Enviar"/>
				</td>
			</tr>
		</table>
	</form>	
        </br>
</div><!--FIM DA DIV BOX Gerenciar-->

<?php
	if (isset($_POST['inserir'])){
		$textoJus = $_POST['textoJus'];
		$idCartao = $_POST['idCartao'];
		$ano   = $_POST['ano'];
		$mes   = $_POST['mes'];
		$dia   = $_POST['dia'];
			
        if (!empty($textoJus) && !empty($idCartao) && !empty($ano) && !empty($mes) && !empty($dia))
        {
            require_once("../Entity/Justificativa.class.php");
            $justificativa = new Justificativa();

            $justificativa->setValue('texto', $textoJus);
            $justificativa->setValue('anexo', 'NULL');
            $justificativa->setValue('Cartao_id', $idCartao);
            $justificativa->setValue('ano', $ano);
            $justificativa->setValue('mes', $mes);
            $justificativa->setValue('dia', $dia);

            $justificativa->Inserir($justificativa);
?>
            <script>
               alert("Justificativa enviado sucesso!");  
               window.close();
            </script>
<?php
        }
        else
        {
?>
            <script>
                alert("Opsss... Texto não foi preenchido!");    
            </script>
<?php
        }
	}
?>
</body>
</html>