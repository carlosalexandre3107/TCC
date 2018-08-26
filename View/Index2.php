<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="Imagens/favicon.ico" type="image/x-icon" />
<script src="Js/jquery-1.5.2.min.js"></script>
<script src="Js/jquery.maskedinput-1.3.min.js"></script>
<script src="Js/mascaras.js"></script>
<script src="Js/calcula.js"></script>
<title>Sistema de Apuração de Carga Horária</title>

</head>
<style type="text/css">
		#boxGeral 
		{
			width:1000px;
			margin:0 auto;
			margin-top:10px;
		}
</style>
<script>
	$(document).ready(function () 
	{
	   $('input').keypress(function (e) 
	   {
			var code = null;
			code = (e.keyCode ? e.keyCode : e.which);                
			return (code == 13) ? false : true;
	   });
	});
</script>
<body>
<form method="post">
	<?php
		require_once("Topo.php");
	?>
	<div id="boxGeral">
		<?php
        	require_once("Corpo.php");
        ?>
	</div>
		<?php
			require_once("Rodape.php");
		?>
</form>
</body>
</html>
