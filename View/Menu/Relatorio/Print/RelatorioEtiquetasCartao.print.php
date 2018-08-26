<?php

/* * To change this template, choose Tools | Templates
 * and open the template in the editor.*/
 

include_once('../PHPJasperXML/class/tcpdf/tcpdf.php');
include_once("../PHPJasperXML/class/PHPJasperXML.inc.php");

include_once ('../PHPJasperXML/setting.php');

$GetDiaInicial = $_GET['GetDiaInicial'];
$GetMesInicial = $_GET['GetMesInicial'];
$GetAnoInicial = $_GET['GetAnoInicial'];
$GetDiaFinal = $_GET['GetDiaFinal'];
$GetMesFinal = $_GET['GetMesFinal'];
$GetAnoFinal = $_GET['GetAnoFinal'];

$PHPJasperXML = new PHPJasperXML("en","TCPDF");
$PHPJasperXML->debugsql=false;

$PHPJasperXML->arrayParameter=array("GetDiaInicial"=>$GetDiaInicial,"GetMesInicial"=>$GetMesInicial,"GetAnoInicial"=>$GetAnoInicial,"GetDiaFinal"=>$GetDiaFinal,"GetMesFinal"=>$GetMesFinal,"GetAnoFinal"=>$GetAnoFinal);
$PHPJasperXML->load_xml_file("LayoutRelatorios/EtiquetaCartao/RelatorioEtiquetaCartaoNEW.jrxml");

$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file




?>

