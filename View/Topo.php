<?php
	session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
	require "Style.php";
?>
<body id="bodyTopo">
	<div id="logado">
		<div id="anoExer">
			<?php
				echo "Ano de Exercício - ".$_SESSION['anoExer'];
			?>
		</div>
		<div id="user">
			<?php
				$PrimeiroNome = explode(" ",$_SESSION['nomeUser']);
				echo $PrimeiroNome[0].", ".$PrimeiroNome[1];
			?>
		</div>
		<div id="sair">
			<input type="submit" name="sair" id="sair" value="Sair" />
			<?php
				if (isset($_POST['sair'])){
					session_destroy();
					echo "<script> window.location.href='../View/Index.php'; </script>";
				}
			?>
		</div>
	</div>
	<div id="boxTopo">
    	<img src="Imagens/bgtopo.jpg" />
    </div>
	<div id="boxmenu">
       <ul id="menu">
            <li>
                <a href="?menu=inicio">INÍCIO</a>
            </li>
            <li><a href="#">APURAÇÃO DA JORNADA</a>
        
                <ul class="sub-menu">
                    <li>
                        <a href="?menu=gerarcartao">GERAR CARTÃO</a>
                    </li>
                    <li>
                        <a href="?menu=mantercartao">MANTER CARTÃO</a>
                    </li>
                </ul>
            </li>
             <li>
                <a href="#">RELATÓRIOS</a>
            		<ul class="sub-menu">
                        <li>
                            <a href="?menu=previsaoFerias">PREVISÃO DE FÉRIAS</a>
                        </li>
						<li>
                            <a href="?menu=ocorrenciaPorSetor">OCORRÊNCIA POR SETOR</a>
                        </li>
						<li>
                            <a href="?menu=cartoesSemAssinatura">CARTÕES SEM ASSINATURA</a>
                        </li>
						<li>
                            <a href="?menu=totalHorasMensaisPorSetor">TOTAL DE HORAS POR SETOR</a>
                        </li>
<!--						<li>
                            <a href="?menu=etiquetasCartao">ETIQUETAS DE CARTÃO</a>
                        </li>-->
                    </ul>
             </li> 
            <li><a href="#">GERENCIAR</a>
        
                <ul class="sub-menu">
                    <li>
						<a href="?menu=ocorrencia">OCORRÊNCIA</a>
                    </li>
                    <li>
                        <a href="?menu=cargo">CARGO</a>
                    </li>
                    <li>
						<!--<a href="?menu=calendario">CALENDÁRIO</a>-->
                    </li>
                    <li>
						<a href="?menu=setor">SETOR</a>
                    </li>
                    <li>
                        <a href="?menu=jornada">JORNADA</a>
                    </li>
                    <li>
                        <a href="?menu=colaborador">COLABORADOR</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">SEGURANÇA</a>
            
            		<ul class="sub-menu">
                        <li>
                            <a href="?menu=usuario">USUÁRIO</a>
                        </li>
                        <li>
                            <a href="?menu=alterarsenha">ALTERAR SENHA</a>
                        </li>
                    </ul>
             </li>  
             <li>
                <a href="#">CONFIGURADOR</a>
            
            		<ul class="sub-menu">
                        <li>
                            <a href="?menu=configuracaoapuracao">APURAÇÃO</a>
                        </li>
                    </ul>
             </li>      
        </ul>
        </div><!--FIM DIV BOXMENU-->
</body>
</html>