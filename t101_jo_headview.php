<?php
namespace PHPMaker2019\emkl_prj;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$t101_jo_head_view = new t101_jo_head_view();

// Run the page
$t101_jo_head_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_jo_head_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t101_jo_head->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft101_jo_headview = currentForm = new ew.Form("ft101_jo_headview", "view");

// Form_CustomValidate event
ft101_jo_headview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft101_jo_headview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft101_jo_headview.lists["x_Export_Import"] = <?php echo $t101_jo_head_view->Export_Import->Lookup->toClientList() ?>;
ft101_jo_headview.lists["x_Export_Import"].options = <?php echo JsonEncode($t101_jo_head_view->Export_Import->options(FALSE, TRUE)) ?>;
ft101_jo_headview.lists["x_Shipper_id"] = <?php echo $t101_jo_head_view->Shipper_id->Lookup->toClientList() ?>;
ft101_jo_headview.lists["x_Shipper_id"].options = <?php echo JsonEncode($t101_jo_head_view->Shipper_id->lookupOptions()) ?>;
ft101_jo_headview.lists["x_Container"] = <?php echo $t101_jo_head_view->Container->Lookup->toClientList() ?>;
ft101_jo_headview.lists["x_Container"].options = <?php echo JsonEncode($t101_jo_head_view->Container->options(FALSE, TRUE)) ?>;
ft101_jo_headview.lists["x_Destination_id"] = <?php echo $t101_jo_head_view->Destination_id->Lookup->toClientList() ?>;
ft101_jo_headview.lists["x_Destination_id"].options = <?php echo JsonEncode($t101_jo_head_view->Destination_id->lookupOptions()) ?>;
ft101_jo_headview.lists["x_Feeder_id"] = <?php echo $t101_jo_head_view->Feeder_id->Lookup->toClientList() ?>;
ft101_jo_headview.lists["x_Feeder_id"].options = <?php echo JsonEncode($t101_jo_head_view->Feeder_id->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t101_jo_head->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t101_jo_head_view->ExportOptions->render("body") ?>
<?php $t101_jo_head_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t101_jo_head_view->showPageHeader(); ?>
<?php
$t101_jo_head_view->showMessage();
?>
<form name="ft101_jo_headview" id="ft101_jo_headview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t101_jo_head_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t101_jo_head_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_jo_head">
<input type="hidden" name="modal" value="<?php echo (int)$t101_jo_head_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t101_jo_head->Export_Import->Visible) { // Export_Import ?>
	<tr id="r_Export_Import">
		<td class="<?php echo $t101_jo_head_view->TableLeftColumnClass ?>"><span id="elh_t101_jo_head_Export_Import"><?php echo $t101_jo_head->Export_Import->caption() ?></span></td>
		<td data-name="Export_Import"<?php echo $t101_jo_head->Export_Import->cellAttributes() ?>>
<span id="el_t101_jo_head_Export_Import">
<span<?php echo $t101_jo_head->Export_Import->viewAttributes() ?>>
<?php echo $t101_jo_head->Export_Import->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_jo_head->Nomor_JO->Visible) { // Nomor_JO ?>
	<tr id="r_Nomor_JO">
		<td class="<?php echo $t101_jo_head_view->TableLeftColumnClass ?>"><span id="elh_t101_jo_head_Nomor_JO"><?php echo $t101_jo_head->Nomor_JO->caption() ?></span></td>
		<td data-name="Nomor_JO"<?php echo $t101_jo_head->Nomor_JO->cellAttributes() ?>>
<span id="el_t101_jo_head_Nomor_JO">
<span<?php echo $t101_jo_head->Nomor_JO->viewAttributes() ?>>
<?php echo $t101_jo_head->Nomor_JO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_jo_head->Shipper_id->Visible) { // Shipper_id ?>
	<tr id="r_Shipper_id">
		<td class="<?php echo $t101_jo_head_view->TableLeftColumnClass ?>"><span id="elh_t101_jo_head_Shipper_id"><?php echo $t101_jo_head->Shipper_id->caption() ?></span></td>
		<td data-name="Shipper_id"<?php echo $t101_jo_head->Shipper_id->cellAttributes() ?>>
<span id="el_t101_jo_head_Shipper_id">
<span<?php echo $t101_jo_head->Shipper_id->viewAttributes() ?>>
<?php echo $t101_jo_head->Shipper_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_jo_head->Party->Visible) { // Party ?>
	<tr id="r_Party">
		<td class="<?php echo $t101_jo_head_view->TableLeftColumnClass ?>"><span id="elh_t101_jo_head_Party"><?php echo $t101_jo_head->Party->caption() ?></span></td>
		<td data-name="Party"<?php echo $t101_jo_head->Party->cellAttributes() ?>>
<span id="el_t101_jo_head_Party">
<span<?php echo $t101_jo_head->Party->viewAttributes() ?>>
<?php echo $t101_jo_head->Party->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_jo_head->Container->Visible) { // Container ?>
	<tr id="r_Container">
		<td class="<?php echo $t101_jo_head_view->TableLeftColumnClass ?>"><span id="elh_t101_jo_head_Container"><?php echo $t101_jo_head->Container->caption() ?></span></td>
		<td data-name="Container"<?php echo $t101_jo_head->Container->cellAttributes() ?>>
<span id="el_t101_jo_head_Container">
<span<?php echo $t101_jo_head->Container->viewAttributes() ?>>
<?php echo $t101_jo_head->Container->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_jo_head->Tanggal_Stuffing->Visible) { // Tanggal_Stuffing ?>
	<tr id="r_Tanggal_Stuffing">
		<td class="<?php echo $t101_jo_head_view->TableLeftColumnClass ?>"><span id="elh_t101_jo_head_Tanggal_Stuffing"><?php echo $t101_jo_head->Tanggal_Stuffing->caption() ?></span></td>
		<td data-name="Tanggal_Stuffing"<?php echo $t101_jo_head->Tanggal_Stuffing->cellAttributes() ?>>
<span id="el_t101_jo_head_Tanggal_Stuffing">
<span<?php echo $t101_jo_head->Tanggal_Stuffing->viewAttributes() ?>>
<?php echo $t101_jo_head->Tanggal_Stuffing->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_jo_head->Destination_id->Visible) { // Destination_id ?>
	<tr id="r_Destination_id">
		<td class="<?php echo $t101_jo_head_view->TableLeftColumnClass ?>"><span id="elh_t101_jo_head_Destination_id"><?php echo $t101_jo_head->Destination_id->caption() ?></span></td>
		<td data-name="Destination_id"<?php echo $t101_jo_head->Destination_id->cellAttributes() ?>>
<span id="el_t101_jo_head_Destination_id">
<span<?php echo $t101_jo_head->Destination_id->viewAttributes() ?>>
<?php echo $t101_jo_head->Destination_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_jo_head->Feeder_id->Visible) { // Feeder_id ?>
	<tr id="r_Feeder_id">
		<td class="<?php echo $t101_jo_head_view->TableLeftColumnClass ?>"><span id="elh_t101_jo_head_Feeder_id"><?php echo $t101_jo_head->Feeder_id->caption() ?></span></td>
		<td data-name="Feeder_id"<?php echo $t101_jo_head->Feeder_id->cellAttributes() ?>>
<span id="el_t101_jo_head_Feeder_id">
<span<?php echo $t101_jo_head->Feeder_id->viewAttributes() ?>>
<?php echo $t101_jo_head->Feeder_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("t101_jo_detail", explode(",", $t101_jo_head->getCurrentDetailTable())) && $t101_jo_detail->DetailView) {
?>
<?php if ($t101_jo_head->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("t101_jo_detail", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t101_jo_detailgrid.php" ?>
<?php } ?>
</form>
<?php
$t101_jo_head_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t101_jo_head->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t101_jo_head_view->terminate();
?>