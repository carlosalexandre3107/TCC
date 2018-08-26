<?php
	if (!isset($_GET['menu'])){
		$get="inicio";
	} else {
		$get=$_GET['menu'];
	}
 switch ($get) {	   
		   
		//MENU APURAÇÃO DA JORNADA
	   
		   case 'gerarcartao':
				require "Menu/ApuracaoDaJornada/GerarCartao.view.php";
		   break;
		   
		   case 'mantercartao':
				require "Menu/ApuracaoDaJornada/ManterCartao.view.php";
		   break;
		
		//NÃO VISIVEL
			case 'GerarCalendario':
				require "Menu/ApuracaoDaJornada/GerarCalendario.view.php";
			break;
			
			case 'CadastroCartao':
				require "Menu/ApuracaoDaJornada/CadastroCartao.view.php";
			break;					
	   
		 //MENU Relatório
	 	   case 'previsaoFerias':
				require "Menu/Relatorio/RelatorioPrevesaoFerias.view.php";
		   break;
		   
	 	   case 'ocorrenciaPorSetor':
				require "Menu/Relatorio/RelatorioOcorrenciaPorSetor.view.php";
		   break;
		 
		   case 'cartoesSemAssinatura':
				require "Menu/Relatorio/RelatorioCartaoSemAssinatura.view.php";
		   break;
		 
		   case 'totalHorasMensaisPorSetor':
				require "Menu/Relatorio/RelatorioTotalHorasMensaisPorSetor.view.php";
		   break;
		   
	 	   case 'etiquetasCartao':
				require "Menu/Relatorio/RelatorioEtiquetasCartao.view.php";
		   break;

	   
		//MENU Gerenciar
			case 'colaborador':
				require "Menu/Gerenciar/ManterColaborador.view.php";
	   		break;
			
			case 'ocorrencia':
				require "Menu/Gerenciar/ManterOcorrencia.view.php";
	   		break;
	   		
			case 'cargo':
				require "Menu/Gerenciar/ManterCargo.view.php";
	   		break;
			
			case 'jornada':
				require "Menu/Gerenciar/ManterJornada.view.php";
	   		break;
			
			case 'calendario':
				require "Menu/Gerenciar/ManterCalendario.view.php";
	   		break;
			
			case 'setor':
				require "Menu/Gerenciar/ManterSetor.view.php";
	   		break;
	   
	   
		//MENU SEGURANÇA
		
			case 'usuario':
				require "Menu/Seguranca/ManterUsuario.view.php";
	   		break;
			
			case 'alterarsenha':
				require "Menu/Seguranca/ManterAlterarsenha.view.php";
	   		break;
			
		//MENU CONFIGURAÇÃO
			   case 'configuracaoapuracao':
					require "Menu/Configurador/Configuracao.view.php";
			   break;	   

	  default:
	  		require "Menu/Inicio/Inicio.view.php";
      break;
 }
?>