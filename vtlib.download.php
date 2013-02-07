<?php
require_once('vtlib/Vtiger/Package.php');
require_once('vtlib/Vtiger/Module.php');
$package = new Vtiger_Package();
$package->export(
Vtiger_Module::getInstance('Taxreceipt'),
'test/vtlib',
'Taxreceipt.zip',
true);
?>