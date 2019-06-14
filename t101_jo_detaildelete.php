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
$t101_jo_detail_delete = new t101_jo_detail_delete();

// Run the page
$t101_jo_detail_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_jo_detail_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft101_jo_detaildelete = currentForm = new ew.Form("ft101_jo_detaildelete", "delete");

// Form_CustomValidate event
ft101_jo_detaildelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft101_jo_detaildelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft101_jo_detaildelete.lists["x_TruckingVendor_id"] = <?php echo $t101_jo_detail_delete->TruckingVendor_id->Lookup->toClientList() ?>;
ft101_jo_detaildelete.lists["x_TruckingVendor_id"].options = <?php echo JsonEncode($t101_jo_detail_delete->TruckingVendor_id->lookupOptions()) ?>;
ft101_jo_detaildelete.lists["x_Driver_id"] = <?php echo $t101_jo_detail_delete->Driver_id->Lookup->toClientList() ?>;
ft101_jo_detaildelete.lists["x_Driver_id"].options = <?php echo JsonEncode($t101_jo_detail_delete->Driver_id->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t101_jo_detail_delete->showPageHeader(); ?>
<?php
$t101_jo_detail_delete->showMessage();
?>
<form name="ft101_jo_detaildelete" id="ft101_jo_detaildelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t101_jo_detail_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t101_jo_detail_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_jo_detail">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t101_jo_detail_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t101_jo_detail->id->Visible) { // id ?>
		<th class="<?php echo $t101_jo_detail->id->headerCellClass() ?>"><span id="elh_t101_jo_detail_id" class="t101_jo_detail_id"><?php echo $t101_jo_detail->id->caption() ?></span></th>
<?php } ?>
<?php if ($t101_jo_detail->JOHead_id->Visible) { // JOHead_id ?>
		<th class="<?php echo $t101_jo_detail->JOHead_id->headerCellClass() ?>"><span id="elh_t101_jo_detail_JOHead_id" class="t101_jo_detail_JOHead_id"><?php echo $t101_jo_detail->JOHead_id->caption() ?></span></th>
<?php } ?>
<?php if ($t101_jo_detail->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
		<th class="<?php echo $t101_jo_detail->TruckingVendor_id->headerCellClass() ?>"><span id="elh_t101_jo_detail_TruckingVendor_id" class="t101_jo_detail_TruckingVendor_id"><?php echo $t101_jo_detail->TruckingVendor_id->caption() ?></span></th>
<?php } ?>
<?php if ($t101_jo_detail->Driver_id->Visible) { // Driver_id ?>
		<th class="<?php echo $t101_jo_detail->Driver_id->headerCellClass() ?>"><span id="elh_t101_jo_detail_Driver_id" class="t101_jo_detail_Driver_id"><?php echo $t101_jo_detail->Driver_id->caption() ?></span></th>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_1->Visible) { // Nomor_Polisi_1 ?>
		<th class="<?php echo $t101_jo_detail->Nomor_Polisi_1->headerCellClass() ?>"><span id="elh_t101_jo_detail_Nomor_Polisi_1" class="t101_jo_detail_Nomor_Polisi_1"><?php echo $t101_jo_detail->Nomor_Polisi_1->caption() ?></span></th>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_2->Visible) { // Nomor_Polisi_2 ?>
		<th class="<?php echo $t101_jo_detail->Nomor_Polisi_2->headerCellClass() ?>"><span id="elh_t101_jo_detail_Nomor_Polisi_2" class="t101_jo_detail_Nomor_Polisi_2"><?php echo $t101_jo_detail->Nomor_Polisi_2->caption() ?></span></th>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_3->Visible) { // Nomor_Polisi_3 ?>
		<th class="<?php echo $t101_jo_detail->Nomor_Polisi_3->headerCellClass() ?>"><span id="elh_t101_jo_detail_Nomor_Polisi_3" class="t101_jo_detail_Nomor_Polisi_3"><?php echo $t101_jo_detail->Nomor_Polisi_3->caption() ?></span></th>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
		<th class="<?php echo $t101_jo_detail->Nomor_Container_1->headerCellClass() ?>"><span id="elh_t101_jo_detail_Nomor_Container_1" class="t101_jo_detail_Nomor_Container_1"><?php echo $t101_jo_detail->Nomor_Container_1->caption() ?></span></th>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
		<th class="<?php echo $t101_jo_detail->Nomor_Container_2->headerCellClass() ?>"><span id="elh_t101_jo_detail_Nomor_Container_2" class="t101_jo_detail_Nomor_Container_2"><?php echo $t101_jo_detail->Nomor_Container_2->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t101_jo_detail_delete->RecCnt = 0;
$i = 0;
while (!$t101_jo_detail_delete->Recordset->EOF) {
	$t101_jo_detail_delete->RecCnt++;
	$t101_jo_detail_delete->RowCnt++;

	// Set row properties
	$t101_jo_detail->resetAttributes();
	$t101_jo_detail->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t101_jo_detail_delete->loadRowValues($t101_jo_detail_delete->Recordset);

	// Render row
	$t101_jo_detail_delete->renderRow();
?>
	<tr<?php echo $t101_jo_detail->rowAttributes() ?>>
<?php if ($t101_jo_detail->id->Visible) { // id ?>
		<td<?php echo $t101_jo_detail->id->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_detail_delete->RowCnt ?>_t101_jo_detail_id" class="t101_jo_detail_id">
<span<?php echo $t101_jo_detail->id->viewAttributes() ?>>
<?php echo $t101_jo_detail->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_jo_detail->JOHead_id->Visible) { // JOHead_id ?>
		<td<?php echo $t101_jo_detail->JOHead_id->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_detail_delete->RowCnt ?>_t101_jo_detail_JOHead_id" class="t101_jo_detail_JOHead_id">
<span<?php echo $t101_jo_detail->JOHead_id->viewAttributes() ?>>
<?php echo $t101_jo_detail->JOHead_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_jo_detail->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
		<td<?php echo $t101_jo_detail->TruckingVendor_id->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_detail_delete->RowCnt ?>_t101_jo_detail_TruckingVendor_id" class="t101_jo_detail_TruckingVendor_id">
<span<?php echo $t101_jo_detail->TruckingVendor_id->viewAttributes() ?>>
<?php echo $t101_jo_detail->TruckingVendor_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_jo_detail->Driver_id->Visible) { // Driver_id ?>
		<td<?php echo $t101_jo_detail->Driver_id->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_detail_delete->RowCnt ?>_t101_jo_detail_Driver_id" class="t101_jo_detail_Driver_id">
<span<?php echo $t101_jo_detail->Driver_id->viewAttributes() ?>>
<?php echo $t101_jo_detail->Driver_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_1->Visible) { // Nomor_Polisi_1 ?>
		<td<?php echo $t101_jo_detail->Nomor_Polisi_1->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_detail_delete->RowCnt ?>_t101_jo_detail_Nomor_Polisi_1" class="t101_jo_detail_Nomor_Polisi_1">
<span<?php echo $t101_jo_detail->Nomor_Polisi_1->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Polisi_1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_2->Visible) { // Nomor_Polisi_2 ?>
		<td<?php echo $t101_jo_detail->Nomor_Polisi_2->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_detail_delete->RowCnt ?>_t101_jo_detail_Nomor_Polisi_2" class="t101_jo_detail_Nomor_Polisi_2">
<span<?php echo $t101_jo_detail->Nomor_Polisi_2->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Polisi_2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_3->Visible) { // Nomor_Polisi_3 ?>
		<td<?php echo $t101_jo_detail->Nomor_Polisi_3->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_detail_delete->RowCnt ?>_t101_jo_detail_Nomor_Polisi_3" class="t101_jo_detail_Nomor_Polisi_3">
<span<?php echo $t101_jo_detail->Nomor_Polisi_3->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Polisi_3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
		<td<?php echo $t101_jo_detail->Nomor_Container_1->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_detail_delete->RowCnt ?>_t101_jo_detail_Nomor_Container_1" class="t101_jo_detail_Nomor_Container_1">
<span<?php echo $t101_jo_detail->Nomor_Container_1->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Container_1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
		<td<?php echo $t101_jo_detail->Nomor_Container_2->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_detail_delete->RowCnt ?>_t101_jo_detail_Nomor_Container_2" class="t101_jo_detail_Nomor_Container_2">
<span<?php echo $t101_jo_detail->Nomor_Container_2->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Container_2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t101_jo_detail_delete->Recordset->moveNext();
}
$t101_jo_detail_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_jo_detail_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t101_jo_detail_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t101_jo_detail_delete->terminate();
?>