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
$t001_shipper_delete = new t001_shipper_delete();

// Run the page
$t001_shipper_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_shipper_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft001_shipperdelete = currentForm = new ew.Form("ft001_shipperdelete", "delete");

// Form_CustomValidate event
ft001_shipperdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft001_shipperdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t001_shipper_delete->showPageHeader(); ?>
<?php
$t001_shipper_delete->showMessage();
?>
<form name="ft001_shipperdelete" id="ft001_shipperdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t001_shipper_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t001_shipper_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_shipper">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t001_shipper_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t001_shipper->id->Visible) { // id ?>
		<th class="<?php echo $t001_shipper->id->headerCellClass() ?>"><span id="elh_t001_shipper_id" class="t001_shipper_id"><?php echo $t001_shipper->id->caption() ?></span></th>
<?php } ?>
<?php if ($t001_shipper->Nama->Visible) { // Nama ?>
		<th class="<?php echo $t001_shipper->Nama->headerCellClass() ?>"><span id="elh_t001_shipper_Nama" class="t001_shipper_Nama"><?php echo $t001_shipper->Nama->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t001_shipper_delete->RecCnt = 0;
$i = 0;
while (!$t001_shipper_delete->Recordset->EOF) {
	$t001_shipper_delete->RecCnt++;
	$t001_shipper_delete->RowCnt++;

	// Set row properties
	$t001_shipper->resetAttributes();
	$t001_shipper->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t001_shipper_delete->loadRowValues($t001_shipper_delete->Recordset);

	// Render row
	$t001_shipper_delete->renderRow();
?>
	<tr<?php echo $t001_shipper->rowAttributes() ?>>
<?php if ($t001_shipper->id->Visible) { // id ?>
		<td<?php echo $t001_shipper->id->cellAttributes() ?>>
<span id="el<?php echo $t001_shipper_delete->RowCnt ?>_t001_shipper_id" class="t001_shipper_id">
<span<?php echo $t001_shipper->id->viewAttributes() ?>>
<?php echo $t001_shipper->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t001_shipper->Nama->Visible) { // Nama ?>
		<td<?php echo $t001_shipper->Nama->cellAttributes() ?>>
<span id="el<?php echo $t001_shipper_delete->RowCnt ?>_t001_shipper_Nama" class="t001_shipper_Nama">
<span<?php echo $t001_shipper->Nama->viewAttributes() ?>>
<?php echo $t001_shipper->Nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t001_shipper_delete->Recordset->moveNext();
}
$t001_shipper_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t001_shipper_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t001_shipper_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t001_shipper_delete->terminate();
?>