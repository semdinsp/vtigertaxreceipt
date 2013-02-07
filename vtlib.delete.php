<?php
$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Module.php');

$module = Vtiger_Module::getInstance('Taxreceipt');
if($module) {
    $module->delete();
}
?>