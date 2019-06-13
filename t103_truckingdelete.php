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
$t103_trucking_delete = new t103_trucking_delete();

// Run the page
$t103_trucking_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t103_trucking_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft103_truckingdelete = currentForm = new ew.Form("ft103_truckingdelete", "delete");

// Form_CustomValidate event
ft103_truckingdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft103_truckingdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft103_truckingdelete.lists["x_EI"] = <?php echo $t103_trucking_delete->EI->Lookup->toClientList() ?>;
ft103_truckingdelete.lists["x_EI"].options = <?php echo JsonEncode($t103_trucking_delete->EI->options(FALSE, TRUE)) ?>;
ft103_truckingdelete.lists["x_Jenis_Container"] = <?php echo $t103_trucking_delete->Jenis_Container->Lookup->toClientList() ?>;
ft103_truckingdelete.lists["x_Jenis_Container"].options = <?php echo JsonEncode($t103_trucking_delete->Jenis_Container->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t103_trucking_delete->showPageHeader(); ?>
<?php
$t103_trucking_delete->showMessage();
?>
<form name="ft103_truckingdelete" id="ft103_truckingdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t103_trucking_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t103_trucking_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t103_trucking">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t103_trucking_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t103_trucking->id->Visible) { // id ?>
		<th class="<?php echo $t103_trucking->id->headerCellClass() ?>"><span id="elh_t103_trucking_id" class="t103_trucking_id"><?php echo $t103_trucking->id->caption() ?></span></th>
<?php } ?>
<?php if ($t103_trucking->EI->Visible) { // EI ?>
		<th class="<?php echo $t103_trucking->EI->headerCellClass() ?>"><span id="elh_t103_trucking_EI" class="t103_trucking_EI"><?php echo $t103_trucking->EI->caption() ?></span></th>
<?php } ?>
<?php if ($t103_trucking->Shipper_id->Visible) { // Shipper_id ?>
		<th class="<?php echo $t103_trucking->Shipper_id->headerCellClass() ?>"><span id="elh_t103_trucking_Shipper_id" class="t103_trucking_Shipper_id"><?php echo $t103_trucking->Shipper_id->caption() ?></span></th>
<?php } ?>
<?php if ($t103_trucking->Party->Visible) { // Party ?>
		<th class="<?php echo $t103_trucking->Party->headerCellClass() ?>"><span id="elh_t103_trucking_Party" class="t103_trucking_Party"><?php echo $t103_trucking->Party->caption() ?></span></th>
<?php } ?>
<?php if ($t103_trucking->Jenis_Container->Visible) { // Jenis_Container ?>
		<th class="<?php echo $t103_trucking->Jenis_Container->headerCellClass() ?>"><span id="elh_t103_trucking_Jenis_Container" class="t103_trucking_Jenis_Container"><?php echo $t103_trucking->Jenis_Container->caption() ?></span></th>
<?php } ?>
<?php if ($t103_trucking->Tgl_Stuffing->Visible) { // Tgl_Stuffing ?>
		<th class="<?php echo $t103_trucking->Tgl_Stuffing->headerCellClass() ?>"><span id="elh_t103_trucking_Tgl_Stuffing" class="t103_trucking_Tgl_Stuffing"><?php echo $t103_trucking->Tgl_Stuffing->caption() ?></span></th>
<?php } ?>
<?php if ($t103_trucking->Destination_id->Visible) { // Destination_id ?>
		<th class="<?php echo $t103_trucking->Destination_id->headerCellClass() ?>"><span id="elh_t103_trucking_Destination_id" class="t103_trucking_Destination_id"><?php echo $t103_trucking->Destination_id->caption() ?></span></th>
<?php } ?>
<?php if ($t103_trucking->Feeder_id->Visible) { // Feeder_id ?>
		<th class="<?php echo $t103_trucking->Feeder_id->headerCellClass() ?>"><span id="elh_t103_trucking_Feeder_id" class="t103_trucking_Feeder_id"><?php echo $t103_trucking->Feeder_id->caption() ?></span></th>
<?php } ?>
<?php if ($t103_trucking->ETA_ETD->Visible) { // ETA_ETD ?>
		<th class="<?php echo $t103_trucking->ETA_ETD->headerCellClass() ?>"><span id="elh_t103_trucking_ETA_ETD" class="t103_trucking_ETA_ETD"><?php echo $t103_trucking->ETA_ETD->caption() ?></span></th>
<?php } ?>
<?php if ($t103_trucking->Liner_id->Visible) { // Liner_id ?>
		<th class="<?php echo $t103_trucking->Liner_id->headerCellClass() ?>"><span id="elh_t103_trucking_Liner_id" class="t103_trucking_Liner_id"><?php echo $t103_trucking->Liner_id->caption() ?></span></th>
<?php } ?>
<?php if ($t103_trucking->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
		<th class="<?php echo $t103_trucking->TruckingVendor_id->headerCellClass() ?>"><span id="elh_t103_trucking_TruckingVendor_id" class="t103_trucking_TruckingVendor_id"><?php echo $t103_trucking->TruckingVendor_id->caption() ?></span></th>
<?php } ?>
<?php if ($t103_trucking->Driver_id->Visible) { // Driver_id ?>
		<th class="<?php echo $t103_trucking->Driver_id->headerCellClass() ?>"><span id="elh_t103_trucking_Driver_id" class="t103_trucking_Driver_id"><?php echo $t103_trucking->Driver_id->caption() ?></span></th>
<?php } ?>
<?php if ($t103_trucking->No_Pol_1->Visible) { // No_Pol_1 ?>
		<th class="<?php echo $t103_trucking->No_Pol_1->headerCellClass() ?>"><span id="elh_t103_trucking_No_Pol_1" class="t103_trucking_No_Pol_1"><?php echo $t103_trucking->No_Pol_1->caption() ?></span></th>
<?php } ?>
<?php if ($t103_trucking->No_Pol_2->Visible) { // No_Pol_2 ?>
		<th class="<?php echo $t103_trucking->No_Pol_2->headerCellClass() ?>"><span id="elh_t103_trucking_No_Pol_2" class="t103_trucking_No_Pol_2"><?php echo $t103_trucking->No_Pol_2->caption() ?></span></th>
<?php } ?>
<?php if ($t103_trucking->No_Pol_3->Visible) { // No_Pol_3 ?>
		<th class="<?php echo $t103_trucking->No_Pol_3->headerCellClass() ?>"><span id="elh_t103_trucking_No_Pol_3" class="t103_trucking_No_Pol_3"><?php echo $t103_trucking->No_Pol_3->caption() ?></span></th>
<?php } ?>
<?php if ($t103_trucking->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
		<th class="<?php echo $t103_trucking->Nomor_Container_1->headerCellClass() ?>"><span id="elh_t103_trucking_Nomor_Container_1" class="t103_trucking_Nomor_Container_1"><?php echo $t103_trucking->Nomor_Container_1->caption() ?></span></th>
<?php } ?>
<?php if ($t103_trucking->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
		<th class="<?php echo $t103_trucking->Nomor_Container_2->headerCellClass() ?>"><span id="elh_t103_trucking_Nomor_Container_2" class="t103_trucking_Nomor_Container_2"><?php echo $t103_trucking->Nomor_Container_2->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t103_trucking_delete->RecCnt = 0;
$i = 0;
while (!$t103_trucking_delete->Recordset->EOF) {
	$t103_trucking_delete->RecCnt++;
	$t103_trucking_delete->RowCnt++;

	// Set row properties
	$t103_trucking->resetAttributes();
	$t103_trucking->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t103_trucking_delete->loadRowValues($t103_trucking_delete->Recordset);

	// Render row
	$t103_trucking_delete->renderRow();
?>
	<tr<?php echo $t103_trucking->rowAttributes() ?>>
<?php if ($t103_trucking->id->Visible) { // id ?>
		<td<?php echo $t103_trucking->id->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_delete->RowCnt ?>_t103_trucking_id" class="t103_trucking_id">
<span<?php echo $t103_trucking->id->viewAttributes() ?>>
<?php echo $t103_trucking->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t103_trucking->EI->Visible) { // EI ?>
		<td<?php echo $t103_trucking->EI->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_delete->RowCnt ?>_t103_trucking_EI" class="t103_trucking_EI">
<span<?php echo $t103_trucking->EI->viewAttributes() ?>>
<?php echo $t103_trucking->EI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t103_trucking->Shipper_id->Visible) { // Shipper_id ?>
		<td<?php echo $t103_trucking->Shipper_id->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_delete->RowCnt ?>_t103_trucking_Shipper_id" class="t103_trucking_Shipper_id">
<span<?php echo $t103_trucking->Shipper_id->viewAttributes() ?>>
<?php echo $t103_trucking->Shipper_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t103_trucking->Party->Visible) { // Party ?>
		<td<?php echo $t103_trucking->Party->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_delete->RowCnt ?>_t103_trucking_Party" class="t103_trucking_Party">
<span<?php echo $t103_trucking->Party->viewAttributes() ?>>
<?php echo $t103_trucking->Party->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t103_trucking->Jenis_Container->Visible) { // Jenis_Container ?>
		<td<?php echo $t103_trucking->Jenis_Container->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_delete->RowCnt ?>_t103_trucking_Jenis_Container" class="t103_trucking_Jenis_Container">
<span<?php echo $t103_trucking->Jenis_Container->viewAttributes() ?>>
<?php echo $t103_trucking->Jenis_Container->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t103_trucking->Tgl_Stuffing->Visible) { // Tgl_Stuffing ?>
		<td<?php echo $t103_trucking->Tgl_Stuffing->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_delete->RowCnt ?>_t103_trucking_Tgl_Stuffing" class="t103_trucking_Tgl_Stuffing">
<span<?php echo $t103_trucking->Tgl_Stuffing->viewAttributes() ?>>
<?php echo $t103_trucking->Tgl_Stuffing->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t103_trucking->Destination_id->Visible) { // Destination_id ?>
		<td<?php echo $t103_trucking->Destination_id->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_delete->RowCnt ?>_t103_trucking_Destination_id" class="t103_trucking_Destination_id">
<span<?php echo $t103_trucking->Destination_id->viewAttributes() ?>>
<?php echo $t103_trucking->Destination_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t103_trucking->Feeder_id->Visible) { // Feeder_id ?>
		<td<?php echo $t103_trucking->Feeder_id->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_delete->RowCnt ?>_t103_trucking_Feeder_id" class="t103_trucking_Feeder_id">
<span<?php echo $t103_trucking->Feeder_id->viewAttributes() ?>>
<?php echo $t103_trucking->Feeder_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t103_trucking->ETA_ETD->Visible) { // ETA_ETD ?>
		<td<?php echo $t103_trucking->ETA_ETD->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_delete->RowCnt ?>_t103_trucking_ETA_ETD" class="t103_trucking_ETA_ETD">
<span<?php echo $t103_trucking->ETA_ETD->viewAttributes() ?>>
<?php echo $t103_trucking->ETA_ETD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t103_trucking->Liner_id->Visible) { // Liner_id ?>
		<td<?php echo $t103_trucking->Liner_id->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_delete->RowCnt ?>_t103_trucking_Liner_id" class="t103_trucking_Liner_id">
<span<?php echo $t103_trucking->Liner_id->viewAttributes() ?>>
<?php echo $t103_trucking->Liner_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t103_trucking->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
		<td<?php echo $t103_trucking->TruckingVendor_id->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_delete->RowCnt ?>_t103_trucking_TruckingVendor_id" class="t103_trucking_TruckingVendor_id">
<span<?php echo $t103_trucking->TruckingVendor_id->viewAttributes() ?>>
<?php echo $t103_trucking->TruckingVendor_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t103_trucking->Driver_id->Visible) { // Driver_id ?>
		<td<?php echo $t103_trucking->Driver_id->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_delete->RowCnt ?>_t103_trucking_Driver_id" class="t103_trucking_Driver_id">
<span<?php echo $t103_trucking->Driver_id->viewAttributes() ?>>
<?php echo $t103_trucking->Driver_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t103_trucking->No_Pol_1->Visible) { // No_Pol_1 ?>
		<td<?php echo $t103_trucking->No_Pol_1->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_delete->RowCnt ?>_t103_trucking_No_Pol_1" class="t103_trucking_No_Pol_1">
<span<?php echo $t103_trucking->No_Pol_1->viewAttributes() ?>>
<?php echo $t103_trucking->No_Pol_1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t103_trucking->No_Pol_2->Visible) { // No_Pol_2 ?>
		<td<?php echo $t103_trucking->No_Pol_2->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_delete->RowCnt ?>_t103_trucking_No_Pol_2" class="t103_trucking_No_Pol_2">
<span<?php echo $t103_trucking->No_Pol_2->viewAttributes() ?>>
<?php echo $t103_trucking->No_Pol_2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t103_trucking->No_Pol_3->Visible) { // No_Pol_3 ?>
		<td<?php echo $t103_trucking->No_Pol_3->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_delete->RowCnt ?>_t103_trucking_No_Pol_3" class="t103_trucking_No_Pol_3">
<span<?php echo $t103_trucking->No_Pol_3->viewAttributes() ?>>
<?php echo $t103_trucking->No_Pol_3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t103_trucking->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
		<td<?php echo $t103_trucking->Nomor_Container_1->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_delete->RowCnt ?>_t103_trucking_Nomor_Container_1" class="t103_trucking_Nomor_Container_1">
<span<?php echo $t103_trucking->Nomor_Container_1->viewAttributes() ?>>
<?php echo $t103_trucking->Nomor_Container_1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t103_trucking->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
		<td<?php echo $t103_trucking->Nomor_Container_2->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_delete->RowCnt ?>_t103_trucking_Nomor_Container_2" class="t103_trucking_Nomor_Container_2">
<span<?php echo $t103_trucking->Nomor_Container_2->viewAttributes() ?>>
<?php echo $t103_trucking->Nomor_Container_2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t103_trucking_delete->Recordset->moveNext();
}
$t103_trucking_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t103_trucking_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t103_trucking_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t103_trucking_delete->terminate();
?>