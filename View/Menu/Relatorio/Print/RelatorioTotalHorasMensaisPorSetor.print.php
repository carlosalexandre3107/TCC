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
$GetAno = $_GET['GetAno'];

//echo ("GetSetorId = ".$GetSetorId." GetMesId = ".$GetMesId." GetAno = ".$GetAno."<br>");

$PHPJasperXML = new PHPJasperXML("en","TCPDF");
$PHPJasperXML->debugsql=false;

$PHPJasperXML->arrayParameter=array("GetIdSetor"=>$GetSetorId,"GetMesCartao"=>$GetMesId,"GetAnoCartao"=>$GetAno);
$PHPJasperXML->load_xml_file("LayoutRelatorios/TotalHorasMensaisPorSetor/RelatorioTotalHorasMensaisPorSetor.jrxml");

$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file

?>

