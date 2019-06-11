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
$t399_audit_trail_view = new t399_audit_trail_view();

// Run the page
$t399_audit_trail_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t399_audit_trail_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t399_audit_trail->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft399_audit_trailview = currentForm = new ew.Form("ft399_audit_trailview", "view");

// Form_CustomValidate event
ft399_audit_trailview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft399_audit_trailview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t399_audit_trail->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t399_audit_trail_view->ExportOptions->render("body") ?>
<?php $t399_audit_trail_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t399_audit_trail_view->showPageHeader(); ?>
<?php
$t399_audit_trail_view->showMessage();
?>
<form name="ft399_audit_trailview" id="ft399_audit_trailview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t399_audit_trail_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t399_audit_trail_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t399_audit_trail">
<input type="hidden" name="modal" value="<?php echo (int)$t399_audit_trail_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t399_audit_trail->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $t399_audit_trail_view->TableLeftColumnClass ?>"><span id="elh_t399_audit_trail_id"><?php echo $t399_audit_trail->id->caption() ?></span></td>
		<td data-name="id"<?php echo $t399_audit_trail->id->cellAttributes() ?>>
<span id="el_t399_audit_trail_id">
<span<?php echo $t399_audit_trail->id->viewAttributes() ?>>
<?php echo $t399_audit_trail->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t399_audit_trail->datetime->Visible) { // datetime ?>
	<tr id="r_datetime">
		<td class="<?php echo $t399_audit_trail_view->TableLeftColumnClass ?>"><span id="elh_t399_audit_trail_datetime"><?php echo $t399_audit_trail->datetime->caption() ?></span></td>
		<td data-name="datetime"<?php echo $t399_audit_trail->datetime->cellAttributes() ?>>
<span id="el_t399_audit_trail_datetime">
<span<?php echo $t399_audit_trail->datetime->viewAttributes() ?>>
<?php echo $t399_audit_trail->datetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t399_audit_trail->script->Visible) { // script ?>
	<tr id="r_script">
		<td class="<?php echo $t399_audit_trail_view->TableLeftColumnClass ?>"><span id="elh_t399_audit_trail_script"><?php echo $t399_audit_trail->script->caption() ?></span></td>
		<td data-name="script"<?php echo $t399_audit_trail->script->cellAttributes() ?>>
<span id="el_t399_audit_trail_script">
<span<?php echo $t399_audit_trail->script->viewAttributes() ?>>
<?php echo $t399_audit_trail->script->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t399_audit_trail->user->Visible) { // user ?>
	<tr id="r_user">
		<td class="<?php echo $t399_audit_trail_view->TableLeftColumnClass ?>"><span id="elh_t399_audit_trail_user"><?php echo $t399_audit_trail->user->caption() ?></span></td>
		<td data-name="user"<?php echo $t399_audit_trail->user->cellAttributes() ?>>
<span id="el_t399_audit_trail_user">
<span<?php echo $t399_audit_trail->user->viewAttributes() ?>>
<?php echo $t399_audit_trail->user->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t399_audit_trail->_action->Visible) { // action ?>
	<tr id="r__action">
		<td class="<?php echo $t399_audit_trail_view->TableLeftColumnClass ?>"><span id="elh_t399_audit_trail__action"><?php echo $t399_audit_trail->_action->caption() ?></span></td>
		<td data-name="_action"<?php echo $t399_audit_trail->_action->cellAttributes() ?>>
<span id="el_t399_audit_trail__action">
<span<?php echo $t399_audit_trail->_action->viewAttributes() ?>>
<?php echo $t399_audit_trail->_action->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t399_audit_trail->_table->Visible) { // table ?>
	<tr id="r__table">
		<td class="<?php echo $t399_audit_trail_view->TableLeftColumnClass ?>"><span id="elh_t399_audit_trail__table"><?php echo $t399_audit_trail->_table->caption() ?></span></td>
		<td data-name="_table"<?php echo $t399_audit_trail->_table->cellAttributes() ?>>
<span id="el_t399_audit_trail__table">
<span<?php echo $t399_audit_trail->_table->viewAttributes() ?>>
<?php echo $t399_audit_trail->_table->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t399_audit_trail->field->Visible) { // field ?>
	<tr id="r_field">
		<td class="<?php echo $t399_audit_trail_view->TableLeftColumnClass ?>"><span id="elh_t399_audit_trail_field"><?php echo $t399_audit_trail->field->caption() ?></span></td>
		<td data-name="field"<?php echo $t399_audit_trail->field->cellAttributes() ?>>
<span id="el_t399_audit_trail_field">
<span<?php echo $t399_audit_trail->field->viewAttributes() ?>>
<?php echo $t399_audit_trail->field->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t399_audit_trail->keyvalue->Visible) { // keyvalue ?>
	<tr id="r_keyvalue">
		<td class="<?php echo $t399_audit_trail_view->TableLeftColumnClass ?>"><span id="elh_t399_audit_trail_keyvalue"><?php echo $t399_audit_trail->keyvalue->caption() ?></span></td>
		<td data-name="keyvalue"<?php echo $t399_audit_trail->keyvalue->cellAttributes() ?>>
<span id="el_t399_audit_trail_keyvalue">
<span<?php echo $t399_audit_trail->keyvalue->viewAttributes() ?>>
<?php echo $t399_audit_trail->keyvalue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t399_audit_trail->oldvalue->Visible) { // oldvalue ?>
	<tr id="r_oldvalue">
		<td class="<?php echo $t399_audit_trail_view->TableLeftColumnClass ?>"><span id="elh_t399_audit_trail_oldvalue"><?php echo $t399_audit_trail->oldvalue->caption() ?></span></td>
		<td data-name="oldvalue"<?php echo $t399_audit_trail->oldvalue->cellAttributes() ?>>
<span id="el_t399_audit_trail_oldvalue">
<span<?php echo $t399_audit_trail->oldvalue->viewAttributes() ?>>
<?php echo $t399_audit_trail->oldvalue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t399_audit_trail->newvalue->Visible) { // newvalue ?>
	<tr id="r_newvalue">
		<td class="<?php echo $t399_audit_trail_view->TableLeftColumnClass ?>"><span id="elh_t399_audit_trail_newvalue"><?php echo $t399_audit_trail->newvalue->caption() ?></span></td>
		<td data-name="newvalue"<?php echo $t399_audit_trail->newvalue->cellAttributes() ?>>
<span id="el_t399_audit_trail_newvalue">
<span<?php echo $t399_audit_trail->newvalue->viewAttributes() ?>>
<?php echo $t399_audit_trail->newvalue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t399_audit_trail_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t399_audit_trail->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t399_audit_trail_view->terminate();
?>