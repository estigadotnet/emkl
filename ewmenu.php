<?php
namespace PHPMaker2019\emkl_prj;

// Menu Language
if ($Language && $Language->LanguageFolder == $LANGUAGE_FOLDER)
	$MenuLanguage = &$Language;
else
	$MenuLanguage = new Language();

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
$topMenu->addMenuItem(25, "mi_cf301_home", $MenuLanguage->MenuPhrase("25", "MenuText"), "cf301_home.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(14, "mci_Setup", $MenuLanguage->MenuPhrase("14", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(6, "mi_t001_shipper", $MenuLanguage->MenuPhrase("6", "MenuText"), "t001_shipperlist.php", 14, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(15, "mi_t002_destination", $MenuLanguage->MenuPhrase("15", "MenuText"), "t002_destinationlist.php", 14, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(16, "mi_t003_feeder", $MenuLanguage->MenuPhrase("16", "MenuText"), "t003_feederlist.php", 14, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(17, "mi_t004_liner", $MenuLanguage->MenuPhrase("17", "MenuText"), "t004_linerlist.php", 14, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(18, "mi_t006_trucking_vendor", $MenuLanguage->MenuPhrase("18", "MenuText"), "t006_trucking_vendorlist.php", 14, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(20, "mci_Transaksi", $MenuLanguage->MenuPhrase("20", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(27, "mi_t101_jo_head", $MenuLanguage->MenuPhrase("27", "MenuText"), "t101_jo_headlist.php", 20, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(28, "mi_v101_jo_head_detail", $MenuLanguage->MenuPhrase("28", "MenuText"), "v101_jo_head_detaillist.php", 20, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(22, "mci_General", $MenuLanguage->MenuPhrase("22", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(2, "mi_t399_audit_trail", $MenuLanguage->MenuPhrase("2", "MenuText"), "t399_audit_traillist.php", 22, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(3, "mi_t096_employees", $MenuLanguage->MenuPhrase("3", "MenuText"), "t096_employeeslist.php", 22, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(4, "mi_t097_userlevels", $MenuLanguage->MenuPhrase("4", "MenuText"), "t097_userlevelslist.php", 22, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(5, "mi_t098_userlevelpermissions", $MenuLanguage->MenuPhrase("5", "MenuText"), "t098_userlevelpermissionslist.php", 22, "", TRUE, FALSE, FALSE, "", "", TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(25, "mi_cf301_home", $MenuLanguage->MenuPhrase("25", "MenuText"), "cf301_home.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(14, "mci_Setup", $MenuLanguage->MenuPhrase("14", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(6, "mi_t001_shipper", $MenuLanguage->MenuPhrase("6", "MenuText"), "t001_shipperlist.php", 14, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(15, "mi_t002_destination", $MenuLanguage->MenuPhrase("15", "MenuText"), "t002_destinationlist.php", 14, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(16, "mi_t003_feeder", $MenuLanguage->MenuPhrase("16", "MenuText"), "t003_feederlist.php", 14, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(17, "mi_t004_liner", $MenuLanguage->MenuPhrase("17", "MenuText"), "t004_linerlist.php", 14, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(18, "mi_t006_trucking_vendor", $MenuLanguage->MenuPhrase("18", "MenuText"), "t006_trucking_vendorlist.php", 14, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(20, "mci_Transaksi", $MenuLanguage->MenuPhrase("20", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(27, "mi_t101_jo_head", $MenuLanguage->MenuPhrase("27", "MenuText"), "t101_jo_headlist.php", 20, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(28, "mi_v101_jo_head_detail", $MenuLanguage->MenuPhrase("28", "MenuText"), "v101_jo_head_detaillist.php", 20, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(22, "mci_General", $MenuLanguage->MenuPhrase("22", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(2, "mi_t399_audit_trail", $MenuLanguage->MenuPhrase("2", "MenuText"), "t399_audit_traillist.php", 22, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(3, "mi_t096_employees", $MenuLanguage->MenuPhrase("3", "MenuText"), "t096_employeeslist.php", 22, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(4, "mi_t097_userlevels", $MenuLanguage->MenuPhrase("4", "MenuText"), "t097_userlevelslist.php", 22, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(5, "mi_t098_userlevelpermissions", $MenuLanguage->MenuPhrase("5", "MenuText"), "t098_userlevelpermissionslist.php", 22, "", TRUE, FALSE, FALSE, "", "", TRUE);
echo $sideMenu->toScript();
?>