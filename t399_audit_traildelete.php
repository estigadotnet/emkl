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
$t399_audit_trail_delete = new t399_audit_trail_delete();

// Run the page
$t399_audit_trail_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t399_audit_trail_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft399_audit_traildelete = currentForm = new ew.Form("ft399_audit_traildelete", "delete");

// Form_CustomValidate event
ft399_audit_traildelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft399_audit_traildelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t399_audit_trail_delete->showPageHeader(); ?>
<?php
$t399_audit_trail_delete->showMessage();
?>
<form name="ft399_audit_traildelete" id="ft399_audit_traildelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t399_audit_trail_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t399_audit_trail_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t399_audit_trail">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t399_audit_trail_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t399_audit_trail->id->Visible) { // id ?>
		<th class="<?php echo $t399_audit_trail->id->headerCellClass() ?>"><span id="elh_t399_audit_trail_id" class="t399_audit_trail_id"><?php echo $t399_audit_trail->id->caption() ?></span></th>
<?php } ?>
<?php if ($t399_audit_trail->datetime->Visible) { // datetime ?>
		<th class="<?php echo $t399_audit_trail->datetime->headerCellClass() ?>"><span id="elh_t399_audit_trail_datetime" class="t399_audit_trail_datetime"><?php echo $t399_audit_trail->datetime->caption() ?></span></th>
<?php } ?>
<?php if ($t399_audit_trail->script->Visible) { // script ?>
		<th class="<?php echo $t399_audit_trail->script->headerCellClass() ?>"><span id="elh_t399_audit_trail_script" class="t399_audit_trail_script"><?php echo $t399_audit_trail->script->caption() ?></span></th>
<?php } ?>
<?php if ($t399_audit_trail->user->Visible) { // user ?>
		<th class="<?php echo $t399_audit_trail->user->headerCellClass() ?>"><span id="elh_t399_audit_trail_user" class="t399_audit_trail_user"><?php echo $t399_audit_trail->user->caption() ?></span></th>
<?php } ?>
<?php if ($t399_audit_trail->_action->Visible) { // action ?>
		<th class="<?php echo $t399_audit_trail->_action->headerCellClass() ?>"><span id="elh_t399_audit_trail__action" class="t399_audit_trail__action"><?php echo $t399_audit_trail->_action->caption() ?></span></th>
<?php } ?>
<?php if ($t399_audit_trail->_table->Visible) { // table ?>
		<th class="<?php echo $t399_audit_trail->_table->headerCellClass() ?>"><span id="elh_t399_audit_trail__table" class="t399_audit_trail__table"><?php echo $t399_audit_trail->_table->caption() ?></span></th>
<?php } ?>
<?php if ($t399_audit_trail->field->Visible) { // field ?>
		<th class="<?php echo $t399_audit_trail->field->headerCellClass() ?>"><span id="elh_t399_audit_trail_field" class="t399_audit_trail_field"><?php echo $t399_audit_trail->field->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t399_audit_trail_delete->RecCnt = 0;
$i = 0;
while (!$t399_audit_trail_delete->Recordset->EOF) {
	$t399_audit_trail_delete->RecCnt++;
	$t399_audit_trail_delete->RowCnt++;

	// Set row properties
	$t399_audit_trail->resetAttributes();
	$t399_audit_trail->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t399_audit_trail_delete->loadRowValues($t399_audit_trail_delete->Recordset);

	// Render row
	$t399_audit_trail_delete->renderRow();
?>
	<tr<?php echo $t399_audit_trail->rowAttributes() ?>>
<?php if ($t399_audit_trail->id->Visible) { // id ?>
		<td<?php echo $t399_audit_trail->id->cellAttributes() ?>>
<span id="el<?php echo $t399_audit_trail_delete->RowCnt ?>_t399_audit_trail_id" class="t399_audit_trail_id">
<span<?php echo $t399_audit_trail->id->viewAttributes() ?>>
<?php echo $t399_audit_trail->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t399_audit_trail->datetime->Visible) { // datetime ?>
		<td<?php echo $t399_audit_trail->datetime->cellAttributes() ?>>
<span id="el<?php echo $t399_audit_trail_delete->RowCnt ?>_t399_audit_trail_datetime" class="t399_audit_trail_datetime">
<span<?php echo $t399_audit_trail->datetime->viewAttributes() ?>>
<?php echo $t399_audit_trail->datetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t399_audit_trail->script->Visible) { // script ?>
		<td<?php echo $t399_audit_trail->script->cellAttributes() ?>>
<span id="el<?php echo $t399_audit_trail_delete->RowCnt ?>_t399_audit_trail_script" class="t399_audit_trail_script">
<span<?php echo $t399_audit_trail->script->viewAttributes() ?>>
<?php echo $t399_audit_trail->script->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t399_audit_trail->user->Visible) { // user ?>
		<td<?php echo $t399_audit_trail->user->cellAttributes() ?>>
<span id="el<?php echo $t399_audit_trail_delete->RowCnt ?>_t399_audit_trail_user" class="t399_audit_trail_user">
<span<?php echo $t399_audit_trail->user->viewAttributes() ?>>
<?php echo $t399_audit_trail->user->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t399_audit_trail->_action->Visible) { // action ?>
		<td<?php echo $t399_audit_trail->_action->cellAttributes() ?>>
<span id="el<?php echo $t399_audit_trail_delete->RowCnt ?>_t399_audit_trail__action" class="t399_audit_trail__action">
<span<?php echo $t399_audit_trail->_action->viewAttributes() ?>>
<?php echo $t399_audit_trail->_action->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t399_audit_trail->_table->Visible) { // table ?>
		<td<?php echo $t399_audit_trail->_table->cellAttributes() ?>>
<span id="el<?php echo $t399_audit_trail_delete->RowCnt ?>_t399_audit_trail__table" class="t399_audit_trail__table">
<span<?php echo $t399_audit_trail->_table->viewAttributes() ?>>
<?php echo $t399_audit_trail->_table->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t399_audit_trail->field->Visible) { // field ?>
		<td<?php echo $t399_audit_trail->field->cellAttributes() ?>>
<span id="el<?php echo $t399_audit_trail_delete->RowCnt ?>_t399_audit_trail_field" class="t399_audit_trail_field">
<span<?php echo $t399_audit_trail->field->viewAttributes() ?>>
<?php echo $t399_audit_trail->field->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t399_audit_trail_delete->Recordset->moveNext();
}
$t399_audit_trail_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t399_audit_trail_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t399_audit_trail_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t399_audit_trail_delete->terminate();
?>