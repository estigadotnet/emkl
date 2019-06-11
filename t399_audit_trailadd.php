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
$t399_audit_trail_add = new t399_audit_trail_add();

// Run the page
$t399_audit_trail_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t399_audit_trail_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ft399_audit_trailadd = currentForm = new ew.Form("ft399_audit_trailadd", "add");

// Validate form
ft399_audit_trailadd.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($t399_audit_trail_add->datetime->Required) { ?>
			elm = this.getElements("x" + infix + "_datetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t399_audit_trail->datetime->caption(), $t399_audit_trail->datetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_datetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t399_audit_trail->datetime->errorMessage()) ?>");
		<?php if ($t399_audit_trail_add->script->Required) { ?>
			elm = this.getElements("x" + infix + "_script");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t399_audit_trail->script->caption(), $t399_audit_trail->script->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t399_audit_trail_add->user->Required) { ?>
			elm = this.getElements("x" + infix + "_user");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t399_audit_trail->user->caption(), $t399_audit_trail->user->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t399_audit_trail_add->_action->Required) { ?>
			elm = this.getElements("x" + infix + "__action");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t399_audit_trail->_action->caption(), $t399_audit_trail->_action->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t399_audit_trail_add->_table->Required) { ?>
			elm = this.getElements("x" + infix + "__table");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t399_audit_trail->_table->caption(), $t399_audit_trail->_table->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t399_audit_trail_add->field->Required) { ?>
			elm = this.getElements("x" + infix + "_field");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t399_audit_trail->field->caption(), $t399_audit_trail->field->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t399_audit_trail_add->keyvalue->Required) { ?>
			elm = this.getElements("x" + infix + "_keyvalue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t399_audit_trail->keyvalue->caption(), $t399_audit_trail->keyvalue->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t399_audit_trail_add->oldvalue->Required) { ?>
			elm = this.getElements("x" + infix + "_oldvalue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t399_audit_trail->oldvalue->caption(), $t399_audit_trail->oldvalue->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t399_audit_trail_add->newvalue->Required) { ?>
			elm = this.getElements("x" + infix + "_newvalue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t399_audit_trail->newvalue->caption(), $t399_audit_trail->newvalue->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
ft399_audit_trailadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft399_audit_trailadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t399_audit_trail_add->showPageHeader(); ?>
<?php
$t399_audit_trail_add->showMessage();
?>
<form name="ft399_audit_trailadd" id="ft399_audit_trailadd" class="<?php echo $t399_audit_trail_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t399_audit_trail_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t399_audit_trail_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t399_audit_trail">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t399_audit_trail_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t399_audit_trail->datetime->Visible) { // datetime ?>
	<div id="r_datetime" class="form-group row">
		<label id="elh_t399_audit_trail_datetime" for="x_datetime" class="<?php echo $t399_audit_trail_add->LeftColumnClass ?>"><?php echo $t399_audit_trail->datetime->caption() ?><?php echo ($t399_audit_trail->datetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t399_audit_trail_add->RightColumnClass ?>"><div<?php echo $t399_audit_trail->datetime->cellAttributes() ?>>
<span id="el_t399_audit_trail_datetime">
<input type="text" data-table="t399_audit_trail" data-field="x_datetime" name="x_datetime" id="x_datetime" placeholder="<?php echo HtmlEncode($t399_audit_trail->datetime->getPlaceHolder()) ?>" value="<?php echo $t399_audit_trail->datetime->EditValue ?>"<?php echo $t399_audit_trail->datetime->editAttributes() ?>>
<?php if (!$t399_audit_trail->datetime->ReadOnly && !$t399_audit_trail->datetime->Disabled && !isset($t399_audit_trail->datetime->EditAttrs["readonly"]) && !isset($t399_audit_trail->datetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft399_audit_trailadd", "x_datetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $t399_audit_trail->datetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t399_audit_trail->script->Visible) { // script ?>
	<div id="r_script" class="form-group row">
		<label id="elh_t399_audit_trail_script" for="x_script" class="<?php echo $t399_audit_trail_add->LeftColumnClass ?>"><?php echo $t399_audit_trail->script->caption() ?><?php echo ($t399_audit_trail->script->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t399_audit_trail_add->RightColumnClass ?>"><div<?php echo $t399_audit_trail->script->cellAttributes() ?>>
<span id="el_t399_audit_trail_script">
<input type="text" data-table="t399_audit_trail" data-field="x_script" name="x_script" id="x_script" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($t399_audit_trail->script->getPlaceHolder()) ?>" value="<?php echo $t399_audit_trail->script->EditValue ?>"<?php echo $t399_audit_trail->script->editAttributes() ?>>
</span>
<?php echo $t399_audit_trail->script->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t399_audit_trail->user->Visible) { // user ?>
	<div id="r_user" class="form-group row">
		<label id="elh_t399_audit_trail_user" for="x_user" class="<?php echo $t399_audit_trail_add->LeftColumnClass ?>"><?php echo $t399_audit_trail->user->caption() ?><?php echo ($t399_audit_trail->user->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t399_audit_trail_add->RightColumnClass ?>"><div<?php echo $t399_audit_trail->user->cellAttributes() ?>>
<span id="el_t399_audit_trail_user">
<input type="text" data-table="t399_audit_trail" data-field="x_user" name="x_user" id="x_user" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($t399_audit_trail->user->getPlaceHolder()) ?>" value="<?php echo $t399_audit_trail->user->EditValue ?>"<?php echo $t399_audit_trail->user->editAttributes() ?>>
</span>
<?php echo $t399_audit_trail->user->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t399_audit_trail->_action->Visible) { // action ?>
	<div id="r__action" class="form-group row">
		<label id="elh_t399_audit_trail__action" for="x__action" class="<?php echo $t399_audit_trail_add->LeftColumnClass ?>"><?php echo $t399_audit_trail->_action->caption() ?><?php echo ($t399_audit_trail->_action->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t399_audit_trail_add->RightColumnClass ?>"><div<?php echo $t399_audit_trail->_action->cellAttributes() ?>>
<span id="el_t399_audit_trail__action">
<input type="text" data-table="t399_audit_trail" data-field="x__action" name="x__action" id="x__action" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($t399_audit_trail->_action->getPlaceHolder()) ?>" value="<?php echo $t399_audit_trail->_action->EditValue ?>"<?php echo $t399_audit_trail->_action->editAttributes() ?>>
</span>
<?php echo $t399_audit_trail->_action->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t399_audit_trail->_table->Visible) { // table ?>
	<div id="r__table" class="form-group row">
		<label id="elh_t399_audit_trail__table" for="x__table" class="<?php echo $t399_audit_trail_add->LeftColumnClass ?>"><?php echo $t399_audit_trail->_table->caption() ?><?php echo ($t399_audit_trail->_table->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t399_audit_trail_add->RightColumnClass ?>"><div<?php echo $t399_audit_trail->_table->cellAttributes() ?>>
<span id="el_t399_audit_trail__table">
<input type="text" data-table="t399_audit_trail" data-field="x__table" name="x__table" id="x__table" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($t399_audit_trail->_table->getPlaceHolder()) ?>" value="<?php echo $t399_audit_trail->_table->EditValue ?>"<?php echo $t399_audit_trail->_table->editAttributes() ?>>
</span>
<?php echo $t399_audit_trail->_table->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t399_audit_trail->field->Visible) { // field ?>
	<div id="r_field" class="form-group row">
		<label id="elh_t399_audit_trail_field" for="x_field" class="<?php echo $t399_audit_trail_add->LeftColumnClass ?>"><?php echo $t399_audit_trail->field->caption() ?><?php echo ($t399_audit_trail->field->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t399_audit_trail_add->RightColumnClass ?>"><div<?php echo $t399_audit_trail->field->cellAttributes() ?>>
<span id="el_t399_audit_trail_field">
<input type="text" data-table="t399_audit_trail" data-field="x_field" name="x_field" id="x_field" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($t399_audit_trail->field->getPlaceHolder()) ?>" value="<?php echo $t399_audit_trail->field->EditValue ?>"<?php echo $t399_audit_trail->field->editAttributes() ?>>
</span>
<?php echo $t399_audit_trail->field->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t399_audit_trail->keyvalue->Visible) { // keyvalue ?>
	<div id="r_keyvalue" class="form-group row">
		<label id="elh_t399_audit_trail_keyvalue" for="x_keyvalue" class="<?php echo $t399_audit_trail_add->LeftColumnClass ?>"><?php echo $t399_audit_trail->keyvalue->caption() ?><?php echo ($t399_audit_trail->keyvalue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t399_audit_trail_add->RightColumnClass ?>"><div<?php echo $t399_audit_trail->keyvalue->cellAttributes() ?>>
<span id="el_t399_audit_trail_keyvalue">
<textarea data-table="t399_audit_trail" data-field="x_keyvalue" name="x_keyvalue" id="x_keyvalue" cols="35" rows="4" placeholder="<?php echo HtmlEncode($t399_audit_trail->keyvalue->getPlaceHolder()) ?>"<?php echo $t399_audit_trail->keyvalue->editAttributes() ?>><?php echo $t399_audit_trail->keyvalue->EditValue ?></textarea>
</span>
<?php echo $t399_audit_trail->keyvalue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t399_audit_trail->oldvalue->Visible) { // oldvalue ?>
	<div id="r_oldvalue" class="form-group row">
		<label id="elh_t399_audit_trail_oldvalue" for="x_oldvalue" class="<?php echo $t399_audit_trail_add->LeftColumnClass ?>"><?php echo $t399_audit_trail->oldvalue->caption() ?><?php echo ($t399_audit_trail->oldvalue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t399_audit_trail_add->RightColumnClass ?>"><div<?php echo $t399_audit_trail->oldvalue->cellAttributes() ?>>
<span id="el_t399_audit_trail_oldvalue">
<textarea data-table="t399_audit_trail" data-field="x_oldvalue" name="x_oldvalue" id="x_oldvalue" cols="35" rows="4" placeholder="<?php echo HtmlEncode($t399_audit_trail->oldvalue->getPlaceHolder()) ?>"<?php echo $t399_audit_trail->oldvalue->editAttributes() ?>><?php echo $t399_audit_trail->oldvalue->EditValue ?></textarea>
</span>
<?php echo $t399_audit_trail->oldvalue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t399_audit_trail->newvalue->Visible) { // newvalue ?>
	<div id="r_newvalue" class="form-group row">
		<label id="elh_t399_audit_trail_newvalue" for="x_newvalue" class="<?php echo $t399_audit_trail_add->LeftColumnClass ?>"><?php echo $t399_audit_trail->newvalue->caption() ?><?php echo ($t399_audit_trail->newvalue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t399_audit_trail_add->RightColumnClass ?>"><div<?php echo $t399_audit_trail->newvalue->cellAttributes() ?>>
<span id="el_t399_audit_trail_newvalue">
<textarea data-table="t399_audit_trail" data-field="x_newvalue" name="x_newvalue" id="x_newvalue" cols="35" rows="4" placeholder="<?php echo HtmlEncode($t399_audit_trail->newvalue->getPlaceHolder()) ?>"<?php echo $t399_audit_trail->newvalue->editAttributes() ?>><?php echo $t399_audit_trail->newvalue->EditValue ?></textarea>
</span>
<?php echo $t399_audit_trail->newvalue->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t399_audit_trail_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t399_audit_trail_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t399_audit_trail_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t399_audit_trail_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t399_audit_trail_add->terminate();
?>