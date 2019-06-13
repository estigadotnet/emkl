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
$t006_trucking_vendor_delete = new t006_trucking_vendor_delete();

// Run the page
$t006_trucking_vendor_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t006_trucking_vendor_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft006_trucking_vendordelete = currentForm = new ew.Form("ft006_trucking_vendordelete", "delete");

// Form_CustomValidate event
ft006_trucking_vendordelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft006_trucking_vendordelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t006_trucking_vendor_delete->showPageHeader(); ?>
<?php
$t006_trucking_vendor_delete->showMessage();
?>
<form name="ft006_trucking_vendordelete" id="ft006_trucking_vendordelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t006_trucking_vendor_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t006_trucking_vendor_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t006_trucking_vendor">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t006_trucking_vendor_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t006_trucking_vendor->id->Visible) { // id ?>
		<th class="<?php echo $t006_trucking_vendor->id->headerCellClass() ?>"><span id="elh_t006_trucking_vendor_id" class="t006_trucking_vendor_id"><?php echo $t006_trucking_vendor->id->caption() ?></span></th>
<?php } ?>
<?php if ($t006_trucking_vendor->Nama->Visible) { // Nama ?>
		<th class="<?php echo $t006_trucking_vendor->Nama->headerCellClass() ?>"><span id="elh_t006_trucking_vendor_Nama" class="t006_trucking_vendor_Nama"><?php echo $t006_trucking_vendor->Nama->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t006_trucking_vendor_delete->RecCnt = 0;
$i = 0;
while (!$t006_trucking_vendor_delete->Recordset->EOF) {
	$t006_trucking_vendor_delete->RecCnt++;
	$t006_trucking_vendor_delete->RowCnt++;

	// Set row properties
	$t006_trucking_vendor->resetAttributes();
	$t006_trucking_vendor->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t006_trucking_vendor_delete->loadRowValues($t006_trucking_vendor_delete->Recordset);

	// Render row
	$t006_trucking_vendor_delete->renderRow();
?>
	<tr<?php echo $t006_trucking_vendor->rowAttributes() ?>>
<?php if ($t006_trucking_vendor->id->Visible) { // id ?>
		<td<?php echo $t006_trucking_vendor->id->cellAttributes() ?>>
<span id="el<?php echo $t006_trucking_vendor_delete->RowCnt ?>_t006_trucking_vendor_id" class="t006_trucking_vendor_id">
<span<?php echo $t006_trucking_vendor->id->viewAttributes() ?>>
<?php echo $t006_trucking_vendor->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t006_trucking_vendor->Nama->Visible) { // Nama ?>
		<td<?php echo $t006_trucking_vendor->Nama->cellAttributes() ?>>
<span id="el<?php echo $t006_trucking_vendor_delete->RowCnt ?>_t006_trucking_vendor_Nama" class="t006_trucking_vendor_Nama">
<span<?php echo $t006_trucking_vendor->Nama->viewAttributes() ?>>
<?php echo $t006_trucking_vendor->Nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t006_trucking_vendor_delete->Recordset->moveNext();
}
$t006_trucking_vendor_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t006_trucking_vendor_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t006_trucking_vendor_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t006_trucking_vendor_delete->terminate();
?>