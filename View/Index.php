<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="Imagens/favicon.ico" type="image/x-icon" />
<title>Sistema de Apuração de Carga Horária</title>
</head>
<?php
	require "Style.php";
?>
<body style="background:url(Imagens/login.jpg) no-repeat;">
	<div id="boxlogin">
        	<center><img src="Imagens/sach.png" width="62" height="36" /></center>
 			<form method="post">
				<table width="270" align="center" style="margin-top:20px;">
					  <tr>
						<td><b Style="color:#FFF;">MATRÍCULA</b></td>
						<td><center><input type="number" name="matricula" size="20"/></center></td>
					  </tr>
					  <tr>
						<td><b Style="color:#FFF;">SENHA</b></td>
						<td><center><input type="password" name="senha" size="20"/></center></td>
					  </tr>
					  <tr>
						<td colspan="2"><center><input type="submit" name="acessar" value="Acessar" style="margin-top:20px;"/></center></td>
					  </tr>
					  <tr>		
						<td colspan="2"><center><input type="submit" name="gerarnovasenha" value="Gerar Nova Senha" style="margin-top:10px;"/></center></td>
					  </tr>
					</table>
			</form>		
    </div>
<?php
if (isset($_POST['acessar']))
{

	$matr = $_POST['matricula'];
	$senha = $_POST['senha'];
	$senha = md5($senha);
	
	
	require_once("../Entity/Usuario.class.php");
	$usuario = new Usuario();
	
	$result = $usuario->LogarUsuario($matr, $senha);
	
	if (!empty($result)){
		
		session_start();
		
		require_once("../Entity/Configuracao.class.php");
		$config = new Configuracao();
		$parametros = $config->ListarConfiguracao();

		foreach ($parametros as $value){
			$_SESSION['anoExer'] = $value->anoExer;
		}			
		foreach ($result as $item){
			$_SESSION['nomeUser'] = "Olá ".$item->nome;
		}
	?>	
		<script type="text/javascript">
			window.location.href="Index2.php";
		</script>
	<?php	
	}else {
	?>			
		<script type="text/javascript">
			alert("Matrícula ou senha inválida!");
		</script>
	<?php
	}
}
?>

<?php
if (isset($_POST['gerarnovasenha'])){
?>		
		<script type="text/javascript">
			//window.location.href="Menu/Seguranca/GerarNovaSenha.view.php";
			window.location.href="GerarNovaSenha.view.php";
		</script>
<?php
}
?>
</body>
</html>