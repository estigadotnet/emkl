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
$t005_driver_delete = new t005_driver_delete();

// Run the page
$t005_driver_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t005_driver_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft005_driverdelete = currentForm = new ew.Form("ft005_driverdelete", "delete");

// Form_CustomValidate event
ft005_driverdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft005_driverdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t005_driver_delete->showPageHeader(); ?>
<?php
$t005_driver_delete->showMessage();
?>
<form name="ft005_driverdelete" id="ft005_driverdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t005_driver_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t005_driver_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t005_driver">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t005_driver_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t005_driver->id->Visible) { // id ?>
		<th class="<?php echo $t005_driver->id->headerCellClass() ?>"><span id="elh_t005_driver_id" class="t005_driver_id"><?php echo $t005_driver->id->caption() ?></span></th>
<?php } ?>
<?php if ($t005_driver->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
		<th class="<?php echo $t005_driver->TruckingVendor_id->headerCellClass() ?>"><span id="elh_t005_driver_TruckingVendor_id" class="t005_driver_TruckingVendor_id"><?php echo $t005_driver->TruckingVendor_id->caption() ?></span></th>
<?php } ?>
<?php if ($t005_driver->Nama->Visible) { // Nama ?>
		<th class="<?php echo $t005_driver->Nama->headerCellClass() ?>"><span id="elh_t005_driver_Nama" class="t005_driver_Nama"><?php echo $t005_driver->Nama->caption() ?></span></th>
<?php } ?>
<?php if ($t005_driver->No_HP_1->Visible) { // No_HP_1 ?>
		<th class="<?php echo $t005_driver->No_HP_1->headerCellClass() ?>"><span id="elh_t005_driver_No_HP_1" class="t005_driver_No_HP_1"><?php echo $t005_driver->No_HP_1->caption() ?></span></th>
<?php } ?>
<?php if ($t005_driver->No_HP_2->Visible) { // No_HP_2 ?>
		<th class="<?php echo $t005_driver->No_HP_2->headerCellClass() ?>"><span id="elh_t005_driver_No_HP_2" class="t005_driver_No_HP_2"><?php echo $t005_driver->No_HP_2->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t005_driver_delete->RecCnt = 0;
$i = 0;
while (!$t005_driver_delete->Recordset->EOF) {
	$t005_driver_delete->RecCnt++;
	$t005_driver_delete->RowCnt++;

	// Set row properties
	$t005_driver->resetAttributes();
	$t005_driver->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t005_driver_delete->loadRowValues($t005_driver_delete->Recordset);

	// Render row
	$t005_driver_delete->renderRow();
?>
	<tr<?php echo $t005_driver->rowAttributes() ?>>
<?php if ($t005_driver->id->Visible) { // id ?>
		<td<?php echo $t005_driver->id->cellAttributes() ?>>
<span id="el<?php echo $t005_driver_delete->RowCnt ?>_t005_driver_id" class="t005_driver_id">
<span<?php echo $t005_driver->id->viewAttributes() ?>>
<?php echo $t005_driver->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t005_driver->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
		<td<?php echo $t005_driver->TruckingVendor_id->cellAttributes() ?>>
<span id="el<?php echo $t005_driver_delete->RowCnt ?>_t005_driver_TruckingVendor_id" class="t005_driver_TruckingVendor_id">
<span<?php echo $t005_driver->TruckingVendor_id->viewAttributes() ?>>
<?php echo $t005_driver->TruckingVendor_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t005_driver->Nama->Visible) { // Nama ?>
		<td<?php echo $t005_driver->Nama->cellAttributes() ?>>
<span id="el<?php echo $t005_driver_delete->RowCnt ?>_t005_driver_Nama" class="t005_driver_Nama">
<span<?php echo $t005_driver->Nama->viewAttributes() ?>>
<?php echo $t005_driver->Nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t005_driver->No_HP_1->Visible) { // No_HP_1 ?>
		<td<?php echo $t005_driver->No_HP_1->cellAttributes() ?>>
<span id="el<?php echo $t005_driver_delete->RowCnt ?>_t005_driver_No_HP_1" class="t005_driver_No_HP_1">
<span<?php echo $t005_driver->No_HP_1->viewAttributes() ?>>
<?php echo $t005_driver->No_HP_1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t005_driver->No_HP_2->Visible) { // No_HP_2 ?>
		<td<?php echo $t005_driver->No_HP_2->cellAttributes() ?>>
<span id="el<?php echo $t005_driver_delete->RowCnt ?>_t005_driver_No_HP_2" class="t005_driver_No_HP_2">
<span<?php echo $t005_driver->No_HP_2->viewAttributes() ?>>
<?php echo $t005_driver->No_HP_2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t005_driver_delete->Recordset->moveNext();
}
$t005_driver_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t005_driver_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t005_driver_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t005_driver_delete->terminate();
?>