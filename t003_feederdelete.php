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
$t003_feeder_delete = new t003_feeder_delete();

// Run the page
$t003_feeder_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t003_feeder_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft003_feederdelete = currentForm = new ew.Form("ft003_feederdelete", "delete");

// Form_CustomValidate event
ft003_feederdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft003_feederdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t003_feeder_delete->showPageHeader(); ?>
<?php
$t003_feeder_delete->showMessage();
?>
<form name="ft003_feederdelete" id="ft003_feederdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t003_feeder_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t003_feeder_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t003_feeder">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t003_feeder_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t003_feeder->id->Visible) { // id ?>
		<th class="<?php echo $t003_feeder->id->headerCellClass() ?>"><span id="elh_t003_feeder_id" class="t003_feeder_id"><?php echo $t003_feeder->id->caption() ?></span></th>
<?php } ?>
<?php if ($t003_feeder->Nama->Visible) { // Nama ?>
		<th class="<?php echo $t003_feeder->Nama->headerCellClass() ?>"><span id="elh_t003_feeder_Nama" class="t003_feeder_Nama"><?php echo $t003_feeder->Nama->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t003_feeder_delete->RecCnt = 0;
$i = 0;
while (!$t003_feeder_delete->Recordset->EOF) {
	$t003_feeder_delete->RecCnt++;
	$t003_feeder_delete->RowCnt++;

	// Set row properties
	$t003_feeder->resetAttributes();
	$t003_feeder->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t003_feeder_delete->loadRowValues($t003_feeder_delete->Recordset);

	// Render row
	$t003_feeder_delete->renderRow();
?>
	<tr<?php echo $t003_feeder->rowAttributes() ?>>
<?php if ($t003_feeder->id->Visible) { // id ?>
		<td<?php echo $t003_feeder->id->cellAttributes() ?>>
<span id="el<?php echo $t003_feeder_delete->RowCnt ?>_t003_feeder_id" class="t003_feeder_id">
<span<?php echo $t003_feeder->id->viewAttributes() ?>>
<?php echo $t003_feeder->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t003_feeder->Nama->Visible) { // Nama ?>
		<td<?php echo $t003_feeder->Nama->cellAttributes() ?>>
<span id="el<?php echo $t003_feeder_delete->RowCnt ?>_t003_feeder_Nama" class="t003_feeder_Nama">
<span<?php echo $t003_feeder->Nama->viewAttributes() ?>>
<?php echo $t003_feeder->Nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t003_feeder_delete->Recordset->moveNext();
}
$t003_feeder_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t003_feeder_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t003_feeder_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t003_feeder_delete->terminate();
?>