<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include_once('../PHPJasperXML/class/tcpdf/tcpdf.php');
include_once("../PHPJasperXML/class/PHPJasperXML.inc.php");

include_once ('../PHPJasperXML/setting.php');



$GetSetorId = $_GET['GetSetorId'];
$GetMesId = $_GET['GetMesId'];

$PHPJasperXML = new PHPJasperXML("en","TCPDF");
$PHPJasperXML->debugsql=false;

if($GetSetorId == 0 && $GetMesId == 0)
{
	$PHPJasperXML->load_xml_file("LayoutRelatorios/PrevisaoFerias/RelatorioPrevisaoFeriasSetorALLMesALL.jrxml");
	
}else if($GetSetorId > 0 && $GetMesId == 0)
{
	$PHPJasperXML->arrayParameter=array("GetSetorId"=>$GetSetorId);
	$PHPJasperXML->load_xml_file("LayoutRelatorios/PrevisaoFerias/RelatorioPrevisaoFeriasSetor.jrxml");
	
}else if($GetMesId > 0 && $GetSetorId == 0)
{
	$PHPJasperXML->arrayParameter=array("GetMesId"=>$GetMesId);
	$PHPJasperXML->load_xml_file("LayoutRelatorios/PrevisaoFerias/RelatorioPrevisaoFeriasMes.jrxml");
	
}else if($GetSetorId > 0 && $GetMesId > 0)
{
	$PHPJasperXML->arrayParameter=array("GetSetorId"=>$GetSetorId,"GetMesId"=>$GetMesId);
	$PHPJasperXML->load_xml_file("LayoutRelatorios/PrevisaoFerias/RelatorioPrevisaoFeriasSetorAndMes.jrxml");
}

$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file


?>

