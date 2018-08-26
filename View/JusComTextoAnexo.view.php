<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="Css/TabelaJornada.css">
<link rel="stylesheet" type="text/css" href="Css/Gerenciar.css">
</head>
<body>
<?php
	$idCartao = $_GET['idCartao'];
	$ano      = $_GET['ano'];
	$mes      = $_GET['mes'];
	$dia      = $_GET['dia'];
	//echo "IDCARTAO ".$idCartao." - ANO ".$ano." - MES ".$mes." - DIA ".$dia;
?>
	<div class="boxcadastro" style="margin-top:20px; width: 500px;">
			<div class="boxtitulo">
				<p style="	width:118px;">JUSTIFICATIVA</p>
			</div><!--FIM DA DIV BOX TITULO-->
		<form method="post" enctype="multipart/form-data">	
			<table width="150" class="formcadastro">
				<tr>
					<td><label for="file">Anexo:</label></td>
					<td><input type="file" name="file" id="file"/></td>
				</tr>
                <tr>
                    
                </tr>
				<tr>  
					<td>Motivo: </td>
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
		$ano      = $_POST['ano'];
		$mes      = $_POST['mes'];
		$dia      = $_POST['dia'];
		
		if ((($_FILES["file"]["type"] == "image/gif")
		  || ($_FILES["file"]["type"] == "image/jpeg")
		  || ($_FILES["file"]["type"] == "image/pjpeg")
		  || ($_FILES["file"]["type"] == "image/jpg")
		  || ($_FILES["file"]["type"] == "image/png"))
		  && ($_FILES["file"]["size"] < 1024 * 1000000)) {
            
            $erro    = $_FILES["file"]["error"];
            $nome    = $_FILES["file"]["name"];
            $tipo    = $_FILES["file"]["type"];
            $tamanho = ($_FILES["file"]["size"] / 1024);
            
            $nome = explode(".",$nome);
            $nome = $nome[0]."_".$idCartao."&".$dia."&".$mes."&".$ano.".".$nome[1];
            
            //echo ("<b>".$nome."</b>");

                if ($erro > 0) 
                {
                    echo "Código de retorno: ".$erro."<br />";
                }
                else
                {
                    echo "Arquivo: ".$nome."<br />";
                    echo "Tipo: ".$tipo."<br />";
                    echo "Tamanho: ".$tamanho." Kb<br />";

                    if (file_exists("Upload/".$nome))
                    {
                        echo $nome." já existe.";
                    }
                    else
                    {
                        move_uploaded_file($_FILES["file"]["tmp_name"], "Upload/".$nome);
                        $anexo = "Upload/".$nome;	
                    }
                }
        }
        else {
?>
            <script>
                alert("Opsss... Arquivo inválido!");    
            </script>
<?php
        }
        
        if (!empty($textoJus) && !empty($anexo) && !empty($idCartao) && !empty($ano) && !empty($mes) && !empty($dia))
        {
            require_once("../Entity/Justificativa.class.php");
            $justificativa = new Justificativa();

            /*echo (" Texto:    ".$textoJus.
                  "<br>Anexo: ".$anexo.
                  "<br>IdCar: ".$idCartao.
                  "<br>Ano:   ".$ano.
                  "<br>Mes:   ".$mes.
                  "<br>Dia:   ".$dia);*/
            
                $justificativa->setValue('texto'    , $textoJus);
                $justificativa->setValue('anexo'    , $anexo);
                $justificativa->setValue('Cartao_id', $idCartao);
                $justificativa->setValue('ano'      , $ano);
                $justificativa->setValue('mes'      , $mes);
                $justificativa->setValue('dia'      , $dia);

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
                alert("Opsss... Anexo, Texto ou Nome do arquivo duplicado  não foi preenchido!");    
            </script>
<?php
        }
	}

?>	
</body>
</html>