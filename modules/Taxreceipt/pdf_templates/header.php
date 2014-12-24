<?php
/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *
 ********************************************************************************/


define('USD',"$");
define('EURO', chr(128) );

// ************** Begin company information *****************
$imageBlock=array("10","3","80","20");
// $pdf->addImage( $logo_name, $imageBlock);   
// no logo desired
//print($logo_name);
// x,y,width
if($org_phone != '')
  $phone ="\n".$app_strings["Phone"].":".$org_phone;
if($org_fax != '')
  $fax =$app_strings["Fax"].":".$org_fax;

$legalBlockPositions=array( "136","3","100" );

$addressdown="3";
$legal1= "Peraturan Directur Jendral Pajak"."\n"."Normor PER-24/PJ/2012\n\n";
$legal2= "Lembar 1: Untuk Pembeli BKP/Penerima JKP"."\n"."Sebagai Bukti Pajak Masukan\n";
$legaltext=$legal1.$legal2;
$pdf->addTextBlock( "Lampiran IB", $legaltext ,$legalBlockPositions );
	
$companyBlockPositions=array( "4",$addressdown,"100" );
// $companyBlockPositions=array( "10","23","62" );
// $companyText=$org_address." ".$org_city.", ".$org_state." ".$org_code." ".$phone."\n".$org_website."\nNPWP: 02.312.550.3-004.00";

$companyText=$org_address."\n".$org_city.", ".$org_state." ".$org_code."\nNPWP: 02.312.550.3-004.00\n";
$orgname2 = "Pengusaha Kena Pajak";
//$orgname2 = "Kode dan  Nomor: 010.002-14.41097790\nPengusha Kena Pajak\n".$org_name;
$cotext="Nama: PT Production Link Indonesia"."\nAlamat:\n".$companyText;
$pdf->addTextBlock( $orgname2, $cotext ,$companyBlockPositions );

// ************** End company information *******************



// ************* Begin Top-Right Header ***************
// title
$titleBlock=array("80","3","47");
//scott orig $pdf->addBubbleBlock( "",$mod_strings["Delivery Order"], $titleBlock );
//pdf=addTitleTextBlock($pdf,$mod_strings["Delivery Order"], $titleBlock );
$pdf->SetXY( $titleBlock[0], $titleBlock[1]);
$pdf->SetFont( "Helvetica", "B", 22);
$pdf->Cell( $titleBlock[2], 4,"Faktur Pajak");
//   $pdf->Cell( $titleBlock[2], 4,$mod_strings["Faktur Pajak"]);
$pdf->SetFont( "Helvetica", "", 10);
$pdf->SetFont( "Helvetica", "", 10);
    
$downdistance="31";
// $soBubble=array("172",$downdistance,"9");
// $pdf->addBubbleBlock($customerpo, $mod_strings["Customer Ref"], $soBubble);

$poBubble=array("136",$downdistance,"42");
$pdf->addBubbleBlock($f_code_serial, "Kode dan Nomor Seri Faktur Pajak", $poBubble);

// $jobBubble=array("143",$downdistance,"9");
//$pdf->addBubbleBlock($job_number, $mod_strings["Job no"], $jobBubble);
// page number
//scott $pageBubble=array("147",$downdistance,0);
// scott $pdf->addBubbleBlock($page_num, $app_strings["Page"], $pageBubble);
// ************** End Top-Right Header *****************



// ************** Begin Addresses **************
// shipping Addre
$shipdown=31;
$shipLocation = array("4",$shipdown,"120");
if(trim($account_name)!='')
	$shipText = "Nama:".$account_name."\nAlamat:\n";
if(trim($ship_street)!='')
	$shipText .= $ship_street."\n";
if(trim($ship_city) !='')
	$shipText .= $ship_city.", ";
if(trim($ship_state)!='' || trim($ship_code)!= '')
	$shipText .= $ship_state." ".$ship_code.$ship_country."\n";

	// $shipText .=$ship_country."\nAttn: ".$contact_name."\n".$contact_phone."\n"."NWP:".$customernwp."\n";
	$shipText .="NPWP: ".$customernwp."\n";
  
$pdf->addTextBlock( "Pembeli BKP/Penerima JKP".":", $shipText, $shipLocation );
//$pdf->addTextBlock( $mod_strings["Pembeli BKP/Penerima JKP"].":", $shipText, $shipLocation );
//$pdf->addTextBlock( $mod_strings["Shipping Address"].":", $shipText, $shipLocation );

// billing Address
$billPositions = array("10","51","61");
if(trim($bill_street)!='')
	$billText = $bill_street."\n";
if(trim($bill_city) !='')
	$billText .= $bill_city.", ";
if(trim($bill_state)!='' || trim($bill_code)!= '')
	$billText .= $bill_state." ".$bill_code."\n";

	$billText .=$bill_country;
// scott $pdf->addTextBlock($app_strings["Billing Address"].":",$billText, $billPositions);
// ********** End Addresses ******************



/*  ******** Begin Invoice Data ************************ */ 
// terms block
//$termBlock=array("147","40");
//$pdf->addRecBlock($account_name, $app_strings["Customer Name"], $termBlock);

// issue date block
$issueBlock=array("10","65");
//$pdf->addRecBlock(getValidDisplayDate(date("Y-m-d")), $mod_strings["Issue Date"],$issueBlock);

// due date block
//scott $dueBlock=array("81","52");
//scott $pdf->addRecBlock($valid_till, $app_strings["Due Date"],$dueBlock);

// Contact Name block
// scott $conBlock=array("79","67");
// scott $pdf->addRecBlock($contact_name, $app_strings["Contact Name"],$conBlock);

// vtiger_invoice number block
// scott $invBlock=array("145","67");
// scott $pdf->addRecBlock($invoice_no, $app_strings["Invoice Number"],$invBlock);

/* ************ End Invoice Data ************************ */



?>
