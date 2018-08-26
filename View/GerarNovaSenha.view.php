<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="Css/login.css">
<link rel="shortcut icon" href="Imagens/favicon.ico" type="image/x-icon" />
<title>Gerar Nova Senha</title>
</head>
<body style="background:url(Imagens/login.jpg) no-repeat;">
	<form method="post">
		<div id="boxlogin">
				<center><img src="Imagens/sach.png" width="62" height="36" /></center>
				<center>GERAR NOVA SENHA</center>
				<br/> 
				<table width="400" align="center" style="margin-top:20px;">
					  <tr>
						<td style="color:#fff; font-weight:bold;"><center>E-MAIL</center></td>
						<td><center><input type="text" name="email" size="40" required /></center></td>
					  </tr>
					  <tr>
						<td colspan="2"><center><input onClick="javascript:window.history.go(-1)" type="button" name="voltar" value="Voltar" style="margin-top:20px;"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="enviar" value="Enviar" style="margin-top:20px;"/></center></td>
					  </tr>
					</table>
			 <br/>     
			 <br/> 
			 <br/>   
		</div>
	</form>	
<?php
if(isset($_POST['enviar'])){

	$email = $_POST['email'];
	require_once("../Entity/Usuario.class.php");
	
	$obj = new Usuario();
	$user = $obj->VerificaEmail($email);
	
	if (!empty($user)){
		$senha = $obj->GerarNovaSenha($email);
		echo $senha;
	}else{
?>
		<script type="text/javascript">
			alert("E-mail não cadastrado!");
		</script>
<?php		
	}
}
?>
</body>
</html>