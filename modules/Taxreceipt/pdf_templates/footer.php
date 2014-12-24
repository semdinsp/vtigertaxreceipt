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

$desc=explode("\n",$description);
$cond=explode("\n",$conditions);
$num=230;
$desc2=$description."\n ";
// $names=array($app_strings["Subtotal"],$app_strings["Tax"],$app_strings["Adjustment"],$app_strings["Total"]);
// $totals=array($price_subtotal,$price_salestax,$price_adjustment,$price_total);
$desc2="Total Invoice Value"."\n".$app_strings["Total"].":     ".$price_total."\n".$mod_strings["TotalTaxValue"]."\n".$app_strings["Tax"].":     ".$price_salestax."\n ";
/* **************** Begin Description ****************** */
$descBlock=array("10",$top,"53", $num);
$pdf->addDescBlock($desc2, $mod_strings["TotalTax"], $descBlock);

/* ************** End Description *********************** */



/* **************** Begin Terms ****************** */
 $stampBlock=array("107",$top,"53", $num);
// $pdf->addDescBlock($conditions, $app_strings["DOTerms"], $termBlock);
$iss_date=getValidDisplayDate(date("Y-m-d"));
$newtitle="Jakarta, ".$iss_date;
//$pdf->addDescBlock("\n\n\n\n\n\n\n".$mod_strings["AuthIndividual"].":\n "."Jakarta, ".$iss_date."\n", $mod_strings["AuthStamp"], $stampBlock);
$pdf->addDescBlock(" ", $newtitle, $stampBlock);
$imageBlock3=array("17",$top+25,"60","20");
$pdf->addImage("tax.jpg", $imageBlock3);
$imageBlock2=array("109",$top+15,"20","20");
$pdf->addImage("stamp.jpg", $imageBlock2);
/* ************** End Terms *********************** */


?>
