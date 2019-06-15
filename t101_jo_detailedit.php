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
$t101_jo_detail_edit = new t101_jo_detail_edit();

// Run the page
$t101_jo_detail_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_jo_detail_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ft101_jo_detailedit = currentForm = new ew.Form("ft101_jo_detailedit", "edit");

// Validate form
ft101_jo_detailedit.validate = function() {
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
		<?php if ($t101_jo_detail_edit->TruckingVendor_id->Required) { ?>
			elm = this.getElements("x" + infix + "_TruckingVendor_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->TruckingVendor_id->caption(), $t101_jo_detail->TruckingVendor_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_edit->Driver_id->Required) { ?>
			elm = this.getElements("x" + infix + "_Driver_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Driver_id->caption(), $t101_jo_detail->Driver_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_edit->Nomor_Polisi_1->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Polisi_1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Nomor_Polisi_1->caption(), $t101_jo_detail->Nomor_Polisi_1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_edit->Nomor_Polisi_2->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Polisi_2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Nomor_Polisi_2->caption(), $t101_jo_detail->Nomor_Polisi_2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_edit->Nomor_Polisi_3->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Polisi_3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Nomor_Polisi_3->caption(), $t101_jo_detail->Nomor_Polisi_3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_edit->Nomor_Container_1->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Container_1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Nomor_Container_1->caption(), $t101_jo_detail->Nomor_Container_1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_edit->Nomor_Container_2->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Container_2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Nomor_Container_2->caption(), $t101_jo_detail->Nomor_Container_2->RequiredErrorMessage)) ?>");
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
ft101_jo_detailedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft101_jo_detailedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft101_jo_detailedit.lists["x_TruckingVendor_id"] = <?php echo $t101_jo_detail_edit->TruckingVendor_id->Lookup->toClientList() ?>;
ft101_jo_detailedit.lists["x_TruckingVendor_id"].options = <?php echo JsonEncode($t101_jo_detail_edit->TruckingVendor_id->lookupOptions()) ?>;
ft101_jo_detailedit.lists["x_Driver_id"] = <?php echo $t101_jo_detail_edit->Driver_id->Lookup->toClientList() ?>;
ft101_jo_detailedit.lists["x_Driver_id"].options = <?php echo JsonEncode($t101_jo_detail_edit->Driver_id->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t101_jo_detail_edit->showPageHeader(); ?>
<?php
$t101_jo_detail_edit->showMessage();
?>
<form name="ft101_jo_detailedit" id="ft101_jo_detailedit" class="<?php echo $t101_jo_detail_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t101_jo_detail_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t101_jo_detail_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_jo_detail">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t101_jo_detail_edit->IsModal ?>">
<?php if ($t101_jo_detail->getCurrentMasterTable() == "t101_jo_head") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="t101_jo_head">
<input type="hidden" name="fk_id" value="<?php echo $t101_jo_detail->JOHead_id->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($t101_jo_detail->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
	<div id="r_TruckingVendor_id" class="form-group row">
		<label id="elh_t101_jo_detail_TruckingVendor_id" for="x_TruckingVendor_id" class="<?php echo $t101_jo_detail_edit->LeftColumnClass ?>"><?php echo $t101_jo_detail->TruckingVendor_id->caption() ?><?php echo ($t101_jo_detail->TruckingVendor_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_detail_edit->RightColumnClass ?>"><div<?php echo $t101_jo_detail->TruckingVendor_id->cellAttributes() ?>>
<span id="el_t101_jo_detail_TruckingVendor_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_detail" data-field="x_TruckingVendor_id" data-value-separator="<?php echo $t101_jo_detail->TruckingVendor_id->displayValueSeparatorAttribute() ?>" id="x_TruckingVendor_id" name="x_TruckingVendor_id"<?php echo $t101_jo_detail->TruckingVendor_id->editAttributes() ?>>
		<?php echo $t101_jo_detail->TruckingVendor_id->selectOptionListHtml("x_TruckingVendor_id") ?>
	</select>
</div>
<?php echo $t101_jo_detail->TruckingVendor_id->Lookup->getParamTag("p_x_TruckingVendor_id") ?>
</span>
<?php echo $t101_jo_detail->TruckingVendor_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jo_detail->Driver_id->Visible) { // Driver_id ?>
	<div id="r_Driver_id" class="form-group row">
		<label id="elh_t101_jo_detail_Driver_id" for="x_Driver_id" class="<?php echo $t101_jo_detail_edit->LeftColumnClass ?>"><?php echo $t101_jo_detail->Driver_id->caption() ?><?php echo ($t101_jo_detail->Driver_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_detail_edit->RightColumnClass ?>"><div<?php echo $t101_jo_detail->Driver_id->cellAttributes() ?>>
<span id="el_t101_jo_detail_Driver_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_detail" data-field="x_Driver_id" data-value-separator="<?php echo $t101_jo_detail->Driver_id->displayValueSeparatorAttribute() ?>" id="x_Driver_id" name="x_Driver_id"<?php echo $t101_jo_detail->Driver_id->editAttributes() ?>>
		<?php echo $t101_jo_detail->Driver_id->selectOptionListHtml("x_Driver_id") ?>
	</select>
</div>
<?php echo $t101_jo_detail->Driver_id->Lookup->getParamTag("p_x_Driver_id") ?>
</span>
<?php echo $t101_jo_detail->Driver_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_1->Visible) { // Nomor_Polisi_1 ?>
	<div id="r_Nomor_Polisi_1" class="form-group row">
		<label id="elh_t101_jo_detail_Nomor_Polisi_1" for="x_Nomor_Polisi_1" class="<?php echo $t101_jo_detail_edit->LeftColumnClass ?>"><?php echo $t101_jo_detail->Nomor_Polisi_1->caption() ?><?php echo ($t101_jo_detail->Nomor_Polisi_1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_detail_edit->RightColumnClass ?>"><div<?php echo $t101_jo_detail->Nomor_Polisi_1->cellAttributes() ?>>
<span id="el_t101_jo_detail_Nomor_Polisi_1">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_1" name="x_Nomor_Polisi_1" id="x_Nomor_Polisi_1" size="1" maxlength="5" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_1->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_1->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_1->editAttributes() ?>>
</span>
<?php echo $t101_jo_detail->Nomor_Polisi_1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_2->Visible) { // Nomor_Polisi_2 ?>
	<div id="r_Nomor_Polisi_2" class="form-group row">
		<label id="elh_t101_jo_detail_Nomor_Polisi_2" for="x_Nomor_Polisi_2" class="<?php echo $t101_jo_detail_edit->LeftColumnClass ?>"><?php echo $t101_jo_detail->Nomor_Polisi_2->caption() ?><?php echo ($t101_jo_detail->Nomor_Polisi_2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_detail_edit->RightColumnClass ?>"><div<?php echo $t101_jo_detail->Nomor_Polisi_2->cellAttributes() ?>>
<span id="el_t101_jo_detail_Nomor_Polisi_2">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_2" name="x_Nomor_Polisi_2" id="x_Nomor_Polisi_2" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_2->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_2->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_2->editAttributes() ?>>
</span>
<?php echo $t101_jo_detail->Nomor_Polisi_2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_3->Visible) { // Nomor_Polisi_3 ?>
	<div id="r_Nomor_Polisi_3" class="form-group row">
		<label id="elh_t101_jo_detail_Nomor_Polisi_3" for="x_Nomor_Polisi_3" class="<?php echo $t101_jo_detail_edit->LeftColumnClass ?>"><?php echo $t101_jo_detail->Nomor_Polisi_3->caption() ?><?php echo ($t101_jo_detail->Nomor_Polisi_3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_detail_edit->RightColumnClass ?>"><div<?php echo $t101_jo_detail->Nomor_Polisi_3->cellAttributes() ?>>
<span id="el_t101_jo_detail_Nomor_Polisi_3">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_3" name="x_Nomor_Polisi_3" id="x_Nomor_Polisi_3" size="5" maxlength="5" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_3->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_3->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_3->editAttributes() ?>>
</span>
<?php echo $t101_jo_detail->Nomor_Polisi_3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
	<div id="r_Nomor_Container_1" class="form-group row">
		<label id="elh_t101_jo_detail_Nomor_Container_1" for="x_Nomor_Container_1" class="<?php echo $t101_jo_detail_edit->LeftColumnClass ?>"><?php echo $t101_jo_detail->Nomor_Container_1->caption() ?><?php echo ($t101_jo_detail->Nomor_Container_1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_detail_edit->RightColumnClass ?>"><div<?php echo $t101_jo_detail->Nomor_Container_1->cellAttributes() ?>>
<span id="el_t101_jo_detail_Nomor_Container_1">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Container_1" name="x_Nomor_Container_1" id="x_Nomor_Container_1" size="5" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_1->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Container_1->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Container_1->editAttributes() ?>>
</span>
<?php echo $t101_jo_detail->Nomor_Container_1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
	<div id="r_Nomor_Container_2" class="form-group row">
		<label id="elh_t101_jo_detail_Nomor_Container_2" for="x_Nomor_Container_2" class="<?php echo $t101_jo_detail_edit->LeftColumnClass ?>"><?php echo $t101_jo_detail->Nomor_Container_2->caption() ?><?php echo ($t101_jo_detail->Nomor_Container_2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_detail_edit->RightColumnClass ?>"><div<?php echo $t101_jo_detail->Nomor_Container_2->cellAttributes() ?>>
<span id="el_t101_jo_detail_Nomor_Container_2">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Container_2" name="x_Nomor_Container_2" id="x_Nomor_Container_2" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_2->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Container_2->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Container_2->editAttributes() ?>>
</span>
<?php echo $t101_jo_detail->Nomor_Container_2->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t101_jo_detail" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t101_jo_detail->id->CurrentValue) ?>">
<?php if (!$t101_jo_detail_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t101_jo_detail_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_jo_detail_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t101_jo_detail_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t101_jo_detail_edit->terminate();
?>