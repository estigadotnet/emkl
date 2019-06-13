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
$t002_destination_delete = new t002_destination_delete();

// Run the page
$t002_destination_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_destination_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft002_destinationdelete = currentForm = new ew.Form("ft002_destinationdelete", "delete");

// Form_CustomValidate event
ft002_destinationdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft002_destinationdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t002_destination_delete->showPageHeader(); ?>
<?php
$t002_destination_delete->showMessage();
?>
<form name="ft002_destinationdelete" id="ft002_destinationdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t002_destination_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t002_destination_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_destination">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t002_destination_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t002_destination->id->Visible) { // id ?>
		<th class="<?php echo $t002_destination->id->headerCellClass() ?>"><span id="elh_t002_destination_id" class="t002_destination_id"><?php echo $t002_destination->id->caption() ?></span></th>
<?php } ?>
<?php if ($t002_destination->Nama->Visible) { // Nama ?>
		<th class="<?php echo $t002_destination->Nama->headerCellClass() ?>"><span id="elh_t002_destination_Nama" class="t002_destination_Nama"><?php echo $t002_destination->Nama->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t002_destination_delete->RecCnt = 0;
$i = 0;
while (!$t002_destination_delete->Recordset->EOF) {
	$t002_destination_delete->RecCnt++;
	$t002_destination_delete->RowCnt++;

	// Set row properties
	$t002_destination->resetAttributes();
	$t002_destination->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t002_destination_delete->loadRowValues($t002_destination_delete->Recordset);

	// Render row
	$t002_destination_delete->renderRow();
?>
	<tr<?php echo $t002_destination->rowAttributes() ?>>
<?php if ($t002_destination->id->Visible) { // id ?>
		<td<?php echo $t002_destination->id->cellAttributes() ?>>
<span id="el<?php echo $t002_destination_delete->RowCnt ?>_t002_destination_id" class="t002_destination_id">
<span<?php echo $t002_destination->id->viewAttributes() ?>>
<?php echo $t002_destination->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t002_destination->Nama->Visible) { // Nama ?>
		<td<?php echo $t002_destination->Nama->cellAttributes() ?>>
<span id="el<?php echo $t002_destination_delete->RowCnt ?>_t002_destination_Nama" class="t002_destination_Nama">
<span<?php echo $t002_destination->Nama->viewAttributes() ?>>
<?php echo $t002_destination->Nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t002_destination_delete->Recordset->moveNext();
}
$t002_destination_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t002_destination_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t002_destination_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t002_destination_delete->terminate();
?>