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
$GetOcorrenciaId = $_GET['GetOcorrenciaId'];

$PHPJasperXML = new PHPJasperXML("en","TCPDF");
$PHPJasperXML->debugsql=false;

$PHPJasperXML->arrayParameter=array("GetOcorrenciaId"=>$GetOcorrenciaId,"GetSetorId"=>$GetSetorId,"GetMesNumero"=>$GetMesId);
$PHPJasperXML->load_xml_file("LayoutRelatorios/OcorrenciaPorSetor/RelatorioOcorrenciaPorSetor.jrxml");

$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file


?>

