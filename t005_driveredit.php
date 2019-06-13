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
$t005_driver_edit = new t005_driver_edit();

// Run the page
$t005_driver_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t005_driver_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ft005_driveredit = currentForm = new ew.Form("ft005_driveredit", "edit");

// Validate form
ft005_driveredit.validate = function() {
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
		<?php if ($t005_driver_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_driver->id->caption(), $t005_driver->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t005_driver_edit->TruckingVendor_id->Required) { ?>
			elm = this.getElements("x" + infix + "_TruckingVendor_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_driver->TruckingVendor_id->caption(), $t005_driver->TruckingVendor_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TruckingVendor_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t005_driver->TruckingVendor_id->errorMessage()) ?>");
		<?php if ($t005_driver_edit->Nama->Required) { ?>
			elm = this.getElements("x" + infix + "_Nama");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_driver->Nama->caption(), $t005_driver->Nama->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t005_driver_edit->No_HP_1->Required) { ?>
			elm = this.getElements("x" + infix + "_No_HP_1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_driver->No_HP_1->caption(), $t005_driver->No_HP_1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t005_driver_edit->No_HP_2->Required) { ?>
			elm = this.getElements("x" + infix + "_No_HP_2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_driver->No_HP_2->caption(), $t005_driver->No_HP_2->RequiredErrorMessage)) ?>");
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
ft005_driveredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft005_driveredit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t005_driver_edit->showPageHeader(); ?>
<?php
$t005_driver_edit->showMessage();
?>
<form name="ft005_driveredit" id="ft005_driveredit" class="<?php echo $t005_driver_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t005_driver_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t005_driver_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t005_driver">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t005_driver_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t005_driver->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_t005_driver_id" class="<?php echo $t005_driver_edit->LeftColumnClass ?>"><?php echo $t005_driver->id->caption() ?><?php echo ($t005_driver->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_driver_edit->RightColumnClass ?>"><div<?php echo $t005_driver->id->cellAttributes() ?>>
<span id="el_t005_driver_id">
<span<?php echo $t005_driver->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t005_driver->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="t005_driver" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t005_driver->id->CurrentValue) ?>">
<?php echo $t005_driver->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t005_driver->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
	<div id="r_TruckingVendor_id" class="form-group row">
		<label id="elh_t005_driver_TruckingVendor_id" for="x_TruckingVendor_id" class="<?php echo $t005_driver_edit->LeftColumnClass ?>"><?php echo $t005_driver->TruckingVendor_id->caption() ?><?php echo ($t005_driver->TruckingVendor_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_driver_edit->RightColumnClass ?>"><div<?php echo $t005_driver->TruckingVendor_id->cellAttributes() ?>>
<span id="el_t005_driver_TruckingVendor_id">
<input type="text" data-table="t005_driver" data-field="x_TruckingVendor_id" name="x_TruckingVendor_id" id="x_TruckingVendor_id" size="30" placeholder="<?php echo HtmlEncode($t005_driver->TruckingVendor_id->getPlaceHolder()) ?>" value="<?php echo $t005_driver->TruckingVendor_id->EditValue ?>"<?php echo $t005_driver->TruckingVendor_id->editAttributes() ?>>
</span>
<?php echo $t005_driver->TruckingVendor_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t005_driver->Nama->Visible) { // Nama ?>
	<div id="r_Nama" class="form-group row">
		<label id="elh_t005_driver_Nama" for="x_Nama" class="<?php echo $t005_driver_edit->LeftColumnClass ?>"><?php echo $t005_driver->Nama->caption() ?><?php echo ($t005_driver->Nama->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_driver_edit->RightColumnClass ?>"><div<?php echo $t005_driver->Nama->cellAttributes() ?>>
<span id="el_t005_driver_Nama">
<input type="text" data-table="t005_driver" data-field="x_Nama" name="x_Nama" id="x_Nama" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t005_driver->Nama->getPlaceHolder()) ?>" value="<?php echo $t005_driver->Nama->EditValue ?>"<?php echo $t005_driver->Nama->editAttributes() ?>>
</span>
<?php echo $t005_driver->Nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t005_driver->No_HP_1->Visible) { // No_HP_1 ?>
	<div id="r_No_HP_1" class="form-group row">
		<label id="elh_t005_driver_No_HP_1" for="x_No_HP_1" class="<?php echo $t005_driver_edit->LeftColumnClass ?>"><?php echo $t005_driver->No_HP_1->caption() ?><?php echo ($t005_driver->No_HP_1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_driver_edit->RightColumnClass ?>"><div<?php echo $t005_driver->No_HP_1->cellAttributes() ?>>
<span id="el_t005_driver_No_HP_1">
<input type="text" data-table="t005_driver" data-field="x_No_HP_1" name="x_No_HP_1" id="x_No_HP_1" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t005_driver->No_HP_1->getPlaceHolder()) ?>" value="<?php echo $t005_driver->No_HP_1->EditValue ?>"<?php echo $t005_driver->No_HP_1->editAttributes() ?>>
</span>
<?php echo $t005_driver->No_HP_1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t005_driver->No_HP_2->Visible) { // No_HP_2 ?>
	<div id="r_No_HP_2" class="form-group row">
		<label id="elh_t005_driver_No_HP_2" for="x_No_HP_2" class="<?php echo $t005_driver_edit->LeftColumnClass ?>"><?php echo $t005_driver->No_HP_2->caption() ?><?php echo ($t005_driver->No_HP_2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_driver_edit->RightColumnClass ?>"><div<?php echo $t005_driver->No_HP_2->cellAttributes() ?>>
<span id="el_t005_driver_No_HP_2">
<input type="text" data-table="t005_driver" data-field="x_No_HP_2" name="x_No_HP_2" id="x_No_HP_2" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t005_driver->No_HP_2->getPlaceHolder()) ?>" value="<?php echo $t005_driver->No_HP_2->EditValue ?>"<?php echo $t005_driver->No_HP_2->editAttributes() ?>>
</span>
<?php echo $t005_driver->No_HP_2->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t005_driver_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t005_driver_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t005_driver_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t005_driver_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t005_driver_edit->terminate();
?>