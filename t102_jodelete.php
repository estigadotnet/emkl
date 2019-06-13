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
$t102_jo_delete = new t102_jo_delete();

// Run the page
$t102_jo_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_jo_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft102_jodelete = currentForm = new ew.Form("ft102_jodelete", "delete");

// Form_CustomValidate event
ft102_jodelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft102_jodelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t102_jo_delete->showPageHeader(); ?>
<?php
$t102_jo_delete->showMessage();
?>
<form name="ft102_jodelete" id="ft102_jodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t102_jo_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t102_jo_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t102_jo">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t102_jo_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t102_jo->id->Visible) { // id ?>
		<th class="<?php echo $t102_jo->id->headerCellClass() ?>"><span id="elh_t102_jo_id" class="t102_jo_id"><?php echo $t102_jo->id->caption() ?></span></th>
<?php } ?>
<?php if ($t102_jo->Nomor_JO->Visible) { // Nomor_JO ?>
		<th class="<?php echo $t102_jo->Nomor_JO->headerCellClass() ?>"><span id="elh_t102_jo_Nomor_JO" class="t102_jo_Nomor_JO"><?php echo $t102_jo->Nomor_JO->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t102_jo_delete->RecCnt = 0;
$i = 0;
while (!$t102_jo_delete->Recordset->EOF) {
	$t102_jo_delete->RecCnt++;
	$t102_jo_delete->RowCnt++;

	// Set row properties
	$t102_jo->resetAttributes();
	$t102_jo->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t102_jo_delete->loadRowValues($t102_jo_delete->Recordset);

	// Render row
	$t102_jo_delete->renderRow();
?>
	<tr<?php echo $t102_jo->rowAttributes() ?>>
<?php if ($t102_jo->id->Visible) { // id ?>
		<td<?php echo $t102_jo->id->cellAttributes() ?>>
<span id="el<?php echo $t102_jo_delete->RowCnt ?>_t102_jo_id" class="t102_jo_id">
<span<?php echo $t102_jo->id->viewAttributes() ?>>
<?php echo $t102_jo->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t102_jo->Nomor_JO->Visible) { // Nomor_JO ?>
		<td<?php echo $t102_jo->Nomor_JO->cellAttributes() ?>>
<span id="el<?php echo $t102_jo_delete->RowCnt ?>_t102_jo_Nomor_JO" class="t102_jo_Nomor_JO">
<span<?php echo $t102_jo->Nomor_JO->viewAttributes() ?>>
<?php echo $t102_jo->Nomor_JO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t102_jo_delete->Recordset->moveNext();
}
$t102_jo_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t102_jo_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t102_jo_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t102_jo_delete->terminate();
?>