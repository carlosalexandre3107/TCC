<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include_once('../PHPJasperXML/class/tcpdf/tcpdf.php');
include_once("../PHPJasperXML/class/PHPJasperXML.inc.php");

include_once ('../PHPJasperXML/setting.php');

$GetIdMes = $_GET['GetIdMes'];
$GetAno = $_GET['GetAno'];

$PHPJasperXML = new PHPJasperXML("en","TCPDF");
$PHPJasperXML->debugsql=false;

if($GetIdMes == 0 && $GetAno == 0)
{
	$PHPJasperXML->load_xml_file("LayoutRelatorios/AssinaturasCartao/RelatorioAssinaturasCartaoMesALLAnoALL.jrxml");
	
}else if($GetIdMes > 0 && $GetAno == 0)
{
	$PHPJasperXML->arrayParameter=array("GetIdMes"=>$GetIdMes);
	$PHPJasperXML->load_xml_file("LayoutRelatorios/AssinaturasCartao/RelatorioAssinaturasCartaoMesIdAnoALL.jrxml");
	
}else if($GetAno > 0 && $GetIdMes == 0)
{
	$PHPJasperXML->arrayParameter=array("GetAno"=>$GetAno);
	$PHPJasperXML->load_xml_file("LayoutRelatorios/AssinaturasCartao/RelatorioAssinaturasCartaoMesIdALLAno.jrxml");
	
}else if($GetIdMes > 0 && $GetAno > 0)
{
	$PHPJasperXML->arrayParameter=array("GetIdMes"=>$GetIdMes,"GetAno"=>$GetAno);
	$PHPJasperXML->load_xml_file("LayoutRelatorios/AssinaturasCartao/RelatorioAssinaturasCartaoMesIdAndAno.jrxml");
}

$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file


?>

