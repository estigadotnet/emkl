<?php
namespace PHPMaker2019\emkl_prj;

// Menu Language
if ($Language && $Language->LanguageFolder == $LANGUAGE_FOLDER)
	$MenuLanguage = &$Language;
else
	$MenuLanguage = new Language();

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
$topMenu->addMenuItem(6, "mi_t001_shipper", $MenuLanguage->MenuPhrase("6", "MenuText"), "t001_shipperlist.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(1, "mi_t101_tagihan_trucking", $MenuLanguage->MenuPhrase("1", "MenuText"), "t101_tagihan_truckinglist.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(2, "mi_t399_audit_trail", $MenuLanguage->MenuPhrase("2", "MenuText"), "t399_audit_traillist.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(3, "mi_t096_employees", $MenuLanguage->MenuPhrase("3", "MenuText"), "t096_employeeslist.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(4, "mi_t097_userlevels", $MenuLanguage->MenuPhrase("4", "MenuText"), "t097_userlevelslist.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(5, "mi_t098_userlevelpermissions", $MenuLanguage->MenuPhrase("5", "MenuText"), "t098_userlevelpermissionslist.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(6, "mi_t001_shipper", $MenuLanguage->MenuPhrase("6", "MenuText"), "t001_shipperlist.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(1, "mi_t101_tagihan_trucking", $MenuLanguage->MenuPhrase("1", "MenuText"), "t101_tagihan_truckinglist.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(2, "mi_t399_audit_trail", $MenuLanguage->MenuPhrase("2", "MenuText"), "t399_audit_traillist.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(3, "mi_t096_employees", $MenuLanguage->MenuPhrase("3", "MenuText"), "t096_employeeslist.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(4, "mi_t097_userlevels", $MenuLanguage->MenuPhrase("4", "MenuText"), "t097_userlevelslist.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(5, "mi_t098_userlevelpermissions", $MenuLanguage->MenuPhrase("5", "MenuText"), "t098_userlevelpermissionslist.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
echo $sideMenu->toScript();
?>