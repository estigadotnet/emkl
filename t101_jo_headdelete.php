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
$t101_jo_head_delete = new t101_jo_head_delete();

// Run the page
$t101_jo_head_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_jo_head_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft101_jo_headdelete = currentForm = new ew.Form("ft101_jo_headdelete", "delete");

// Form_CustomValidate event
ft101_jo_headdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft101_jo_headdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft101_jo_headdelete.lists["x_Shipper_id"] = <?php echo $t101_jo_head_delete->Shipper_id->Lookup->toClientList() ?>;
ft101_jo_headdelete.lists["x_Shipper_id"].options = <?php echo JsonEncode($t101_jo_head_delete->Shipper_id->lookupOptions()) ?>;
ft101_jo_headdelete.lists["x_Container"] = <?php echo $t101_jo_head_delete->Container->Lookup->toClientList() ?>;
ft101_jo_headdelete.lists["x_Container"].options = <?php echo JsonEncode($t101_jo_head_delete->Container->options(FALSE, TRUE)) ?>;
ft101_jo_headdelete.lists["x_Destination_id"] = <?php echo $t101_jo_head_delete->Destination_id->Lookup->toClientList() ?>;
ft101_jo_headdelete.lists["x_Destination_id"].options = <?php echo JsonEncode($t101_jo_head_delete->Destination_id->lookupOptions()) ?>;
ft101_jo_headdelete.lists["x_Feeder_id"] = <?php echo $t101_jo_head_delete->Feeder_id->Lookup->toClientList() ?>;
ft101_jo_headdelete.lists["x_Feeder_id"].options = <?php echo JsonEncode($t101_jo_head_delete->Feeder_id->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t101_jo_head_delete->showPageHeader(); ?>
<?php
$t101_jo_head_delete->showMessage();
?>
<form name="ft101_jo_headdelete" id="ft101_jo_headdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t101_jo_head_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t101_jo_head_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_jo_head">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t101_jo_head_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t101_jo_head->id->Visible) { // id ?>
		<th class="<?php echo $t101_jo_head->id->headerCellClass() ?>"><span id="elh_t101_jo_head_id" class="t101_jo_head_id"><?php echo $t101_jo_head->id->caption() ?></span></th>
<?php } ?>
<?php if ($t101_jo_head->Nomor_JO->Visible) { // Nomor_JO ?>
		<th class="<?php echo $t101_jo_head->Nomor_JO->headerCellClass() ?>"><span id="elh_t101_jo_head_Nomor_JO" class="t101_jo_head_Nomor_JO"><?php echo $t101_jo_head->Nomor_JO->caption() ?></span></th>
<?php } ?>
<?php if ($t101_jo_head->Shipper_id->Visible) { // Shipper_id ?>
		<th class="<?php echo $t101_jo_head->Shipper_id->headerCellClass() ?>"><span id="elh_t101_jo_head_Shipper_id" class="t101_jo_head_Shipper_id"><?php echo $t101_jo_head->Shipper_id->caption() ?></span></th>
<?php } ?>
<?php if ($t101_jo_head->Party->Visible) { // Party ?>
		<th class="<?php echo $t101_jo_head->Party->headerCellClass() ?>"><span id="elh_t101_jo_head_Party" class="t101_jo_head_Party"><?php echo $t101_jo_head->Party->caption() ?></span></th>
<?php } ?>
<?php if ($t101_jo_head->Container->Visible) { // Container ?>
		<th class="<?php echo $t101_jo_head->Container->headerCellClass() ?>"><span id="elh_t101_jo_head_Container" class="t101_jo_head_Container"><?php echo $t101_jo_head->Container->caption() ?></span></th>
<?php } ?>
<?php if ($t101_jo_head->Tanggal_Stuffing->Visible) { // Tanggal_Stuffing ?>
		<th class="<?php echo $t101_jo_head->Tanggal_Stuffing->headerCellClass() ?>"><span id="elh_t101_jo_head_Tanggal_Stuffing" class="t101_jo_head_Tanggal_Stuffing"><?php echo $t101_jo_head->Tanggal_Stuffing->caption() ?></span></th>
<?php } ?>
<?php if ($t101_jo_head->Destination_id->Visible) { // Destination_id ?>
		<th class="<?php echo $t101_jo_head->Destination_id->headerCellClass() ?>"><span id="elh_t101_jo_head_Destination_id" class="t101_jo_head_Destination_id"><?php echo $t101_jo_head->Destination_id->caption() ?></span></th>
<?php } ?>
<?php if ($t101_jo_head->Feeder_id->Visible) { // Feeder_id ?>
		<th class="<?php echo $t101_jo_head->Feeder_id->headerCellClass() ?>"><span id="elh_t101_jo_head_Feeder_id" class="t101_jo_head_Feeder_id"><?php echo $t101_jo_head->Feeder_id->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t101_jo_head_delete->RecCnt = 0;
$i = 0;
while (!$t101_jo_head_delete->Recordset->EOF) {
	$t101_jo_head_delete->RecCnt++;
	$t101_jo_head_delete->RowCnt++;

	// Set row properties
	$t101_jo_head->resetAttributes();
	$t101_jo_head->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t101_jo_head_delete->loadRowValues($t101_jo_head_delete->Recordset);

	// Render row
	$t101_jo_head_delete->renderRow();
?>
	<tr<?php echo $t101_jo_head->rowAttributes() ?>>
<?php if ($t101_jo_head->id->Visible) { // id ?>
		<td<?php echo $t101_jo_head->id->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_head_delete->RowCnt ?>_t101_jo_head_id" class="t101_jo_head_id">
<span<?php echo $t101_jo_head->id->viewAttributes() ?>>
<?php echo $t101_jo_head->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_jo_head->Nomor_JO->Visible) { // Nomor_JO ?>
		<td<?php echo $t101_jo_head->Nomor_JO->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_head_delete->RowCnt ?>_t101_jo_head_Nomor_JO" class="t101_jo_head_Nomor_JO">
<span<?php echo $t101_jo_head->Nomor_JO->viewAttributes() ?>>
<?php echo $t101_jo_head->Nomor_JO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_jo_head->Shipper_id->Visible) { // Shipper_id ?>
		<td<?php echo $t101_jo_head->Shipper_id->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_head_delete->RowCnt ?>_t101_jo_head_Shipper_id" class="t101_jo_head_Shipper_id">
<span<?php echo $t101_jo_head->Shipper_id->viewAttributes() ?>>
<?php echo $t101_jo_head->Shipper_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_jo_head->Party->Visible) { // Party ?>
		<td<?php echo $t101_jo_head->Party->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_head_delete->RowCnt ?>_t101_jo_head_Party" class="t101_jo_head_Party">
<span<?php echo $t101_jo_head->Party->viewAttributes() ?>>
<?php echo $t101_jo_head->Party->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_jo_head->Container->Visible) { // Container ?>
		<td<?php echo $t101_jo_head->Container->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_head_delete->RowCnt ?>_t101_jo_head_Container" class="t101_jo_head_Container">
<span<?php echo $t101_jo_head->Container->viewAttributes() ?>>
<?php echo $t101_jo_head->Container->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_jo_head->Tanggal_Stuffing->Visible) { // Tanggal_Stuffing ?>
		<td<?php echo $t101_jo_head->Tanggal_Stuffing->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_head_delete->RowCnt ?>_t101_jo_head_Tanggal_Stuffing" class="t101_jo_head_Tanggal_Stuffing">
<span<?php echo $t101_jo_head->Tanggal_Stuffing->viewAttributes() ?>>
<?php echo $t101_jo_head->Tanggal_Stuffing->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_jo_head->Destination_id->Visible) { // Destination_id ?>
		<td<?php echo $t101_jo_head->Destination_id->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_head_delete->RowCnt ?>_t101_jo_head_Destination_id" class="t101_jo_head_Destination_id">
<span<?php echo $t101_jo_head->Destination_id->viewAttributes() ?>>
<?php echo $t101_jo_head->Destination_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_jo_head->Feeder_id->Visible) { // Feeder_id ?>
		<td<?php echo $t101_jo_head->Feeder_id->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_head_delete->RowCnt ?>_t101_jo_head_Feeder_id" class="t101_jo_head_Feeder_id">
<span<?php echo $t101_jo_head->Feeder_id->viewAttributes() ?>>
<?php echo $t101_jo_head->Feeder_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t101_jo_head_delete->Recordset->moveNext();
}
$t101_jo_head_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_jo_head_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t101_jo_head_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t101_jo_head_delete->terminate();
?>