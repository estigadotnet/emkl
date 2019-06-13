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
$t103_trucking_view = new t103_trucking_view();

// Run the page
$t103_trucking_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t103_trucking_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t103_trucking->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft103_truckingview = currentForm = new ew.Form("ft103_truckingview", "view");

// Form_CustomValidate event
ft103_truckingview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft103_truckingview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft103_truckingview.lists["x_EI"] = <?php echo $t103_trucking_view->EI->Lookup->toClientList() ?>;
ft103_truckingview.lists["x_EI"].options = <?php echo JsonEncode($t103_trucking_view->EI->options(FALSE, TRUE)) ?>;
ft103_truckingview.lists["x_Jenis_Container"] = <?php echo $t103_trucking_view->Jenis_Container->Lookup->toClientList() ?>;
ft103_truckingview.lists["x_Jenis_Container"].options = <?php echo JsonEncode($t103_trucking_view->Jenis_Container->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t103_trucking->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t103_trucking_view->ExportOptions->render("body") ?>
<?php $t103_trucking_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t103_trucking_view->showPageHeader(); ?>
<?php
$t103_trucking_view->showMessage();
?>
<form name="ft103_truckingview" id="ft103_truckingview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t103_trucking_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t103_trucking_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t103_trucking">
<input type="hidden" name="modal" value="<?php echo (int)$t103_trucking_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t103_trucking->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $t103_trucking_view->TableLeftColumnClass ?>"><span id="elh_t103_trucking_id"><?php echo $t103_trucking->id->caption() ?></span></td>
		<td data-name="id"<?php echo $t103_trucking->id->cellAttributes() ?>>
<span id="el_t103_trucking_id">
<span<?php echo $t103_trucking->id->viewAttributes() ?>>
<?php echo $t103_trucking->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t103_trucking->EI->Visible) { // EI ?>
	<tr id="r_EI">
		<td class="<?php echo $t103_trucking_view->TableLeftColumnClass ?>"><span id="elh_t103_trucking_EI"><?php echo $t103_trucking->EI->caption() ?></span></td>
		<td data-name="EI"<?php echo $t103_trucking->EI->cellAttributes() ?>>
<span id="el_t103_trucking_EI">
<span<?php echo $t103_trucking->EI->viewAttributes() ?>>
<?php echo $t103_trucking->EI->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t103_trucking->Shipper_id->Visible) { // Shipper_id ?>
	<tr id="r_Shipper_id">
		<td class="<?php echo $t103_trucking_view->TableLeftColumnClass ?>"><span id="elh_t103_trucking_Shipper_id"><?php echo $t103_trucking->Shipper_id->caption() ?></span></td>
		<td data-name="Shipper_id"<?php echo $t103_trucking->Shipper_id->cellAttributes() ?>>
<span id="el_t103_trucking_Shipper_id">
<span<?php echo $t103_trucking->Shipper_id->viewAttributes() ?>>
<?php echo $t103_trucking->Shipper_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t103_trucking->Party->Visible) { // Party ?>
	<tr id="r_Party">
		<td class="<?php echo $t103_trucking_view->TableLeftColumnClass ?>"><span id="elh_t103_trucking_Party"><?php echo $t103_trucking->Party->caption() ?></span></td>
		<td data-name="Party"<?php echo $t103_trucking->Party->cellAttributes() ?>>
<span id="el_t103_trucking_Party">
<span<?php echo $t103_trucking->Party->viewAttributes() ?>>
<?php echo $t103_trucking->Party->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t103_trucking->Jenis_Container->Visible) { // Jenis_Container ?>
	<tr id="r_Jenis_Container">
		<td class="<?php echo $t103_trucking_view->TableLeftColumnClass ?>"><span id="elh_t103_trucking_Jenis_Container"><?php echo $t103_trucking->Jenis_Container->caption() ?></span></td>
		<td data-name="Jenis_Container"<?php echo $t103_trucking->Jenis_Container->cellAttributes() ?>>
<span id="el_t103_trucking_Jenis_Container">
<span<?php echo $t103_trucking->Jenis_Container->viewAttributes() ?>>
<?php echo $t103_trucking->Jenis_Container->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t103_trucking->Tgl_Stuffing->Visible) { // Tgl_Stuffing ?>
	<tr id="r_Tgl_Stuffing">
		<td class="<?php echo $t103_trucking_view->TableLeftColumnClass ?>"><span id="elh_t103_trucking_Tgl_Stuffing"><?php echo $t103_trucking->Tgl_Stuffing->caption() ?></span></td>
		<td data-name="Tgl_Stuffing"<?php echo $t103_trucking->Tgl_Stuffing->cellAttributes() ?>>
<span id="el_t103_trucking_Tgl_Stuffing">
<span<?php echo $t103_trucking->Tgl_Stuffing->viewAttributes() ?>>
<?php echo $t103_trucking->Tgl_Stuffing->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t103_trucking->Destination_id->Visible) { // Destination_id ?>
	<tr id="r_Destination_id">
		<td class="<?php echo $t103_trucking_view->TableLeftColumnClass ?>"><span id="elh_t103_trucking_Destination_id"><?php echo $t103_trucking->Destination_id->caption() ?></span></td>
		<td data-name="Destination_id"<?php echo $t103_trucking->Destination_id->cellAttributes() ?>>
<span id="el_t103_trucking_Destination_id">
<span<?php echo $t103_trucking->Destination_id->viewAttributes() ?>>
<?php echo $t103_trucking->Destination_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t103_trucking->Feeder_id->Visible) { // Feeder_id ?>
	<tr id="r_Feeder_id">
		<td class="<?php echo $t103_trucking_view->TableLeftColumnClass ?>"><span id="elh_t103_trucking_Feeder_id"><?php echo $t103_trucking->Feeder_id->caption() ?></span></td>
		<td data-name="Feeder_id"<?php echo $t103_trucking->Feeder_id->cellAttributes() ?>>
<span id="el_t103_trucking_Feeder_id">
<span<?php echo $t103_trucking->Feeder_id->viewAttributes() ?>>
<?php echo $t103_trucking->Feeder_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t103_trucking->ETA_ETD->Visible) { // ETA_ETD ?>
	<tr id="r_ETA_ETD">
		<td class="<?php echo $t103_trucking_view->TableLeftColumnClass ?>"><span id="elh_t103_trucking_ETA_ETD"><?php echo $t103_trucking->ETA_ETD->caption() ?></span></td>
		<td data-name="ETA_ETD"<?php echo $t103_trucking->ETA_ETD->cellAttributes() ?>>
<span id="el_t103_trucking_ETA_ETD">
<span<?php echo $t103_trucking->ETA_ETD->viewAttributes() ?>>
<?php echo $t103_trucking->ETA_ETD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t103_trucking->Liner_id->Visible) { // Liner_id ?>
	<tr id="r_Liner_id">
		<td class="<?php echo $t103_trucking_view->TableLeftColumnClass ?>"><span id="elh_t103_trucking_Liner_id"><?php echo $t103_trucking->Liner_id->caption() ?></span></td>
		<td data-name="Liner_id"<?php echo $t103_trucking->Liner_id->cellAttributes() ?>>
<span id="el_t103_trucking_Liner_id">
<span<?php echo $t103_trucking->Liner_id->viewAttributes() ?>>
<?php echo $t103_trucking->Liner_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t103_trucking->Remark->Visible) { // Remark ?>
	<tr id="r_Remark">
		<td class="<?php echo $t103_trucking_view->TableLeftColumnClass ?>"><span id="elh_t103_trucking_Remark"><?php echo $t103_trucking->Remark->caption() ?></span></td>
		<td data-name="Remark"<?php echo $t103_trucking->Remark->cellAttributes() ?>>
<span id="el_t103_trucking_Remark">
<span<?php echo $t103_trucking->Remark->viewAttributes() ?>>
<?php echo $t103_trucking->Remark->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t103_trucking->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
	<tr id="r_TruckingVendor_id">
		<td class="<?php echo $t103_trucking_view->TableLeftColumnClass ?>"><span id="elh_t103_trucking_TruckingVendor_id"><?php echo $t103_trucking->TruckingVendor_id->caption() ?></span></td>
		<td data-name="TruckingVendor_id"<?php echo $t103_trucking->TruckingVendor_id->cellAttributes() ?>>
<span id="el_t103_trucking_TruckingVendor_id">
<span<?php echo $t103_trucking->TruckingVendor_id->viewAttributes() ?>>
<?php echo $t103_trucking->TruckingVendor_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t103_trucking->Driver_id->Visible) { // Driver_id ?>
	<tr id="r_Driver_id">
		<td class="<?php echo $t103_trucking_view->TableLeftColumnClass ?>"><span id="elh_t103_trucking_Driver_id"><?php echo $t103_trucking->Driver_id->caption() ?></span></td>
		<td data-name="Driver_id"<?php echo $t103_trucking->Driver_id->cellAttributes() ?>>
<span id="el_t103_trucking_Driver_id">
<span<?php echo $t103_trucking->Driver_id->viewAttributes() ?>>
<?php echo $t103_trucking->Driver_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t103_trucking->No_Pol_1->Visible) { // No_Pol_1 ?>
	<tr id="r_No_Pol_1">
		<td class="<?php echo $t103_trucking_view->TableLeftColumnClass ?>"><span id="elh_t103_trucking_No_Pol_1"><?php echo $t103_trucking->No_Pol_1->caption() ?></span></td>
		<td data-name="No_Pol_1"<?php echo $t103_trucking->No_Pol_1->cellAttributes() ?>>
<span id="el_t103_trucking_No_Pol_1">
<span<?php echo $t103_trucking->No_Pol_1->viewAttributes() ?>>
<?php echo $t103_trucking->No_Pol_1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t103_trucking->No_Pol_2->Visible) { // No_Pol_2 ?>
	<tr id="r_No_Pol_2">
		<td class="<?php echo $t103_trucking_view->TableLeftColumnClass ?>"><span id="elh_t103_trucking_No_Pol_2"><?php echo $t103_trucking->No_Pol_2->caption() ?></span></td>
		<td data-name="No_Pol_2"<?php echo $t103_trucking->No_Pol_2->cellAttributes() ?>>
<span id="el_t103_trucking_No_Pol_2">
<span<?php echo $t103_trucking->No_Pol_2->viewAttributes() ?>>
<?php echo $t103_trucking->No_Pol_2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t103_trucking->No_Pol_3->Visible) { // No_Pol_3 ?>
	<tr id="r_No_Pol_3">
		<td class="<?php echo $t103_trucking_view->TableLeftColumnClass ?>"><span id="elh_t103_trucking_No_Pol_3"><?php echo $t103_trucking->No_Pol_3->caption() ?></span></td>
		<td data-name="No_Pol_3"<?php echo $t103_trucking->No_Pol_3->cellAttributes() ?>>
<span id="el_t103_trucking_No_Pol_3">
<span<?php echo $t103_trucking->No_Pol_3->viewAttributes() ?>>
<?php echo $t103_trucking->No_Pol_3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t103_trucking->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
	<tr id="r_Nomor_Container_1">
		<td class="<?php echo $t103_trucking_view->TableLeftColumnClass ?>"><span id="elh_t103_trucking_Nomor_Container_1"><?php echo $t103_trucking->Nomor_Container_1->caption() ?></span></td>
		<td data-name="Nomor_Container_1"<?php echo $t103_trucking->Nomor_Container_1->cellAttributes() ?>>
<span id="el_t103_trucking_Nomor_Container_1">
<span<?php echo $t103_trucking->Nomor_Container_1->viewAttributes() ?>>
<?php echo $t103_trucking->Nomor_Container_1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t103_trucking->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
	<tr id="r_Nomor_Container_2">
		<td class="<?php echo $t103_trucking_view->TableLeftColumnClass ?>"><span id="elh_t103_trucking_Nomor_Container_2"><?php echo $t103_trucking->Nomor_Container_2->caption() ?></span></td>
		<td data-name="Nomor_Container_2"<?php echo $t103_trucking->Nomor_Container_2->cellAttributes() ?>>
<span id="el_t103_trucking_Nomor_Container_2">
<span<?php echo $t103_trucking->Nomor_Container_2->viewAttributes() ?>>
<?php echo $t103_trucking->Nomor_Container_2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t103_trucking_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t103_trucking->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t103_trucking_view->terminate();
?>