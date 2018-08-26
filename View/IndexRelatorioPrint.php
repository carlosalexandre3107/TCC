<?php

	if (!isset($_GET['relatorioPrint'])){
		$get = "inicio";
	} else {
		$get = $_GET['relatorioPrint'];
	}

 switch ($get) {	
		   case 'inicio':
	  	   ?>
				<script>
					window.close();	
				</script>
		   <?php
      	   break;				
	   
		 //MENU Relatório
	 	   case 'previsaoFerias':
				require "Menu/Relatorio/Print/RelatorioPrevesaoFerias.print.php";
		   break;
		 
	 	   case 'ocorrenciaPorSetor':
				require "Menu/Relatorio/Print/RelatorioOcorrenciaPorSetor.print.php";
		   break;

		   case 'cartoesSemAssinatura':
				require "Menu/Relatorio/Print/RelatorioCartaoSemAssinatura.print.php";
		   break;
		   
	 	   case 'totalHorasMensaisPorSetor':
				require "Menu/Relatorio/Print/RelatorioTotalHorasMensaisPorSetor.print.php";
		   break;
		 
		   case 'etiquetasCartao':
				require "Menu/Relatorio/Print/RelatorioEtiquetasCartao.print.php";
		   break;
 }
?>