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
$t005_driver_view = new t005_driver_view();

// Run the page
$t005_driver_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t005_driver_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t005_driver->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft005_driverview = currentForm = new ew.Form("ft005_driverview", "view");

// Form_CustomValidate event
ft005_driverview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft005_driverview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft005_driverview.lists["x_TruckingVendor_id"] = <?php echo $t005_driver_view->TruckingVendor_id->Lookup->toClientList() ?>;
ft005_driverview.lists["x_TruckingVendor_id"].options = <?php echo JsonEncode($t005_driver_view->TruckingVendor_id->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t005_driver->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t005_driver_view->ExportOptions->render("body") ?>
<?php $t005_driver_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t005_driver_view->showPageHeader(); ?>
<?php
$t005_driver_view->showMessage();
?>
<form name="ft005_driverview" id="ft005_driverview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t005_driver_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t005_driver_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t005_driver">
<input type="hidden" name="modal" value="<?php echo (int)$t005_driver_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t005_driver->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
	<tr id="r_TruckingVendor_id">
		<td class="<?php echo $t005_driver_view->TableLeftColumnClass ?>"><span id="elh_t005_driver_TruckingVendor_id"><?php echo $t005_driver->TruckingVendor_id->caption() ?></span></td>
		<td data-name="TruckingVendor_id"<?php echo $t005_driver->TruckingVendor_id->cellAttributes() ?>>
<span id="el_t005_driver_TruckingVendor_id">
<span<?php echo $t005_driver->TruckingVendor_id->viewAttributes() ?>>
<?php echo $t005_driver->TruckingVendor_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t005_driver->Nama->Visible) { // Nama ?>
	<tr id="r_Nama">
		<td class="<?php echo $t005_driver_view->TableLeftColumnClass ?>"><span id="elh_t005_driver_Nama"><?php echo $t005_driver->Nama->caption() ?></span></td>
		<td data-name="Nama"<?php echo $t005_driver->Nama->cellAttributes() ?>>
<span id="el_t005_driver_Nama">
<span<?php echo $t005_driver->Nama->viewAttributes() ?>>
<?php echo $t005_driver->Nama->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t005_driver->No_HP_1->Visible) { // No_HP_1 ?>
	<tr id="r_No_HP_1">
		<td class="<?php echo $t005_driver_view->TableLeftColumnClass ?>"><span id="elh_t005_driver_No_HP_1"><?php echo $t005_driver->No_HP_1->caption() ?></span></td>
		<td data-name="No_HP_1"<?php echo $t005_driver->No_HP_1->cellAttributes() ?>>
<span id="el_t005_driver_No_HP_1">
<span<?php echo $t005_driver->No_HP_1->viewAttributes() ?>>
<?php echo $t005_driver->No_HP_1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t005_driver->No_HP_2->Visible) { // No_HP_2 ?>
	<tr id="r_No_HP_2">
		<td class="<?php echo $t005_driver_view->TableLeftColumnClass ?>"><span id="elh_t005_driver_No_HP_2"><?php echo $t005_driver->No_HP_2->caption() ?></span></td>
		<td data-name="No_HP_2"<?php echo $t005_driver->No_HP_2->cellAttributes() ?>>
<span id="el_t005_driver_No_HP_2">
<span<?php echo $t005_driver->No_HP_2->viewAttributes() ?>>
<?php echo $t005_driver->No_HP_2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t005_driver_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t005_driver->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t005_driver_view->terminate();
?>