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
$t101_jo_head_edit = new t101_jo_head_edit();

// Run the page
$t101_jo_head_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_jo_head_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ft101_jo_headedit = currentForm = new ew.Form("ft101_jo_headedit", "edit");

// Validate form
ft101_jo_headedit.validate = function() {
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
		<?php if ($t101_jo_head_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_head->id->caption(), $t101_jo_head->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_head_edit->Nomor_JO->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_JO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_head->Nomor_JO->caption(), $t101_jo_head->Nomor_JO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_head_edit->Shipper_id->Required) { ?>
			elm = this.getElements("x" + infix + "_Shipper_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_head->Shipper_id->caption(), $t101_jo_head->Shipper_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_head_edit->Party->Required) { ?>
			elm = this.getElements("x" + infix + "_Party");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_head->Party->caption(), $t101_jo_head->Party->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Party");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t101_jo_head->Party->errorMessage()) ?>");
		<?php if ($t101_jo_head_edit->Container->Required) { ?>
			elm = this.getElements("x" + infix + "_Container");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_head->Container->caption(), $t101_jo_head->Container->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_head_edit->Tanggal_Stuffing->Required) { ?>
			elm = this.getElements("x" + infix + "_Tanggal_Stuffing");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_head->Tanggal_Stuffing->caption(), $t101_jo_head->Tanggal_Stuffing->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Tanggal_Stuffing");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t101_jo_head->Tanggal_Stuffing->errorMessage()) ?>");
		<?php if ($t101_jo_head_edit->Destination_id->Required) { ?>
			elm = this.getElements("x" + infix + "_Destination_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_head->Destination_id->caption(), $t101_jo_head->Destination_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_head_edit->Feeder_id->Required) { ?>
			elm = this.getElements("x" + infix + "_Feeder_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_head->Feeder_id->caption(), $t101_jo_head->Feeder_id->RequiredErrorMessage)) ?>");
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
ft101_jo_headedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft101_jo_headedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft101_jo_headedit.lists["x_Shipper_id"] = <?php echo $t101_jo_head_edit->Shipper_id->Lookup->toClientList() ?>;
ft101_jo_headedit.lists["x_Shipper_id"].options = <?php echo JsonEncode($t101_jo_head_edit->Shipper_id->lookupOptions()) ?>;
ft101_jo_headedit.lists["x_Container"] = <?php echo $t101_jo_head_edit->Container->Lookup->toClientList() ?>;
ft101_jo_headedit.lists["x_Container"].options = <?php echo JsonEncode($t101_jo_head_edit->Container->options(FALSE, TRUE)) ?>;
ft101_jo_headedit.lists["x_Destination_id"] = <?php echo $t101_jo_head_edit->Destination_id->Lookup->toClientList() ?>;
ft101_jo_headedit.lists["x_Destination_id"].options = <?php echo JsonEncode($t101_jo_head_edit->Destination_id->lookupOptions()) ?>;
ft101_jo_headedit.lists["x_Feeder_id"] = <?php echo $t101_jo_head_edit->Feeder_id->Lookup->toClientList() ?>;
ft101_jo_headedit.lists["x_Feeder_id"].options = <?php echo JsonEncode($t101_jo_head_edit->Feeder_id->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t101_jo_head_edit->showPageHeader(); ?>
<?php
$t101_jo_head_edit->showMessage();
?>
<form name="ft101_jo_headedit" id="ft101_jo_headedit" class="<?php echo $t101_jo_head_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t101_jo_head_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t101_jo_head_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_jo_head">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t101_jo_head_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t101_jo_head->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_t101_jo_head_id" class="<?php echo $t101_jo_head_edit->LeftColumnClass ?>"><?php echo $t101_jo_head->id->caption() ?><?php echo ($t101_jo_head->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_head_edit->RightColumnClass ?>"><div<?php echo $t101_jo_head->id->cellAttributes() ?>>
<span id="el_t101_jo_head_id">
<span<?php echo $t101_jo_head->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t101_jo_head->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="t101_jo_head" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t101_jo_head->id->CurrentValue) ?>">
<?php echo $t101_jo_head->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jo_head->Nomor_JO->Visible) { // Nomor_JO ?>
	<div id="r_Nomor_JO" class="form-group row">
		<label id="elh_t101_jo_head_Nomor_JO" for="x_Nomor_JO" class="<?php echo $t101_jo_head_edit->LeftColumnClass ?>"><?php echo $t101_jo_head->Nomor_JO->caption() ?><?php echo ($t101_jo_head->Nomor_JO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_head_edit->RightColumnClass ?>"><div<?php echo $t101_jo_head->Nomor_JO->cellAttributes() ?>>
<span id="el_t101_jo_head_Nomor_JO">
<input type="text" data-table="t101_jo_head" data-field="x_Nomor_JO" name="x_Nomor_JO" id="x_Nomor_JO" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t101_jo_head->Nomor_JO->getPlaceHolder()) ?>" value="<?php echo $t101_jo_head->Nomor_JO->EditValue ?>"<?php echo $t101_jo_head->Nomor_JO->editAttributes() ?>>
</span>
<?php echo $t101_jo_head->Nomor_JO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jo_head->Shipper_id->Visible) { // Shipper_id ?>
	<div id="r_Shipper_id" class="form-group row">
		<label id="elh_t101_jo_head_Shipper_id" for="x_Shipper_id" class="<?php echo $t101_jo_head_edit->LeftColumnClass ?>"><?php echo $t101_jo_head->Shipper_id->caption() ?><?php echo ($t101_jo_head->Shipper_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_head_edit->RightColumnClass ?>"><div<?php echo $t101_jo_head->Shipper_id->cellAttributes() ?>>
<span id="el_t101_jo_head_Shipper_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_head" data-field="x_Shipper_id" data-value-separator="<?php echo $t101_jo_head->Shipper_id->displayValueSeparatorAttribute() ?>" id="x_Shipper_id" name="x_Shipper_id"<?php echo $t101_jo_head->Shipper_id->editAttributes() ?>>
		<?php echo $t101_jo_head->Shipper_id->selectOptionListHtml("x_Shipper_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Shipper_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_jo_head->Shipper_id->caption() ?>" data-title="<?php echo $t101_jo_head->Shipper_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Shipper_id',url:'t001_shipperaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_jo_head->Shipper_id->Lookup->getParamTag("p_x_Shipper_id") ?>
</span>
<?php echo $t101_jo_head->Shipper_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jo_head->Party->Visible) { // Party ?>
	<div id="r_Party" class="form-group row">
		<label id="elh_t101_jo_head_Party" for="x_Party" class="<?php echo $t101_jo_head_edit->LeftColumnClass ?>"><?php echo $t101_jo_head->Party->caption() ?><?php echo ($t101_jo_head->Party->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_head_edit->RightColumnClass ?>"><div<?php echo $t101_jo_head->Party->cellAttributes() ?>>
<span id="el_t101_jo_head_Party">
<input type="text" data-table="t101_jo_head" data-field="x_Party" name="x_Party" id="x_Party" size="1" placeholder="<?php echo HtmlEncode($t101_jo_head->Party->getPlaceHolder()) ?>" value="<?php echo $t101_jo_head->Party->EditValue ?>"<?php echo $t101_jo_head->Party->editAttributes() ?>>
</span>
<?php echo $t101_jo_head->Party->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jo_head->Container->Visible) { // Container ?>
	<div id="r_Container" class="form-group row">
		<label id="elh_t101_jo_head_Container" class="<?php echo $t101_jo_head_edit->LeftColumnClass ?>"><?php echo $t101_jo_head->Container->caption() ?><?php echo ($t101_jo_head->Container->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_head_edit->RightColumnClass ?>"><div<?php echo $t101_jo_head->Container->cellAttributes() ?>>
<span id="el_t101_jo_head_Container">
<div id="tp_x_Container" class="ew-template"><input type="radio" class="form-check-input" data-table="t101_jo_head" data-field="x_Container" data-value-separator="<?php echo $t101_jo_head->Container->displayValueSeparatorAttribute() ?>" name="x_Container" id="x_Container" value="{value}"<?php echo $t101_jo_head->Container->editAttributes() ?>></div>
<div id="dsl_x_Container" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t101_jo_head->Container->radioButtonListHtml(FALSE, "x_Container") ?>
</div></div>
</span>
<?php echo $t101_jo_head->Container->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jo_head->Tanggal_Stuffing->Visible) { // Tanggal_Stuffing ?>
	<div id="r_Tanggal_Stuffing" class="form-group row">
		<label id="elh_t101_jo_head_Tanggal_Stuffing" for="x_Tanggal_Stuffing" class="<?php echo $t101_jo_head_edit->LeftColumnClass ?>"><?php echo $t101_jo_head->Tanggal_Stuffing->caption() ?><?php echo ($t101_jo_head->Tanggal_Stuffing->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_head_edit->RightColumnClass ?>"><div<?php echo $t101_jo_head->Tanggal_Stuffing->cellAttributes() ?>>
<span id="el_t101_jo_head_Tanggal_Stuffing">
<input type="text" data-table="t101_jo_head" data-field="x_Tanggal_Stuffing" data-format="11" name="x_Tanggal_Stuffing" id="x_Tanggal_Stuffing" placeholder="<?php echo HtmlEncode($t101_jo_head->Tanggal_Stuffing->getPlaceHolder()) ?>" value="<?php echo $t101_jo_head->Tanggal_Stuffing->EditValue ?>"<?php echo $t101_jo_head->Tanggal_Stuffing->editAttributes() ?>>
<?php if (!$t101_jo_head->Tanggal_Stuffing->ReadOnly && !$t101_jo_head->Tanggal_Stuffing->Disabled && !isset($t101_jo_head->Tanggal_Stuffing->EditAttrs["readonly"]) && !isset($t101_jo_head->Tanggal_Stuffing->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft101_jo_headedit", "x_Tanggal_Stuffing", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php echo $t101_jo_head->Tanggal_Stuffing->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jo_head->Destination_id->Visible) { // Destination_id ?>
	<div id="r_Destination_id" class="form-group row">
		<label id="elh_t101_jo_head_Destination_id" for="x_Destination_id" class="<?php echo $t101_jo_head_edit->LeftColumnClass ?>"><?php echo $t101_jo_head->Destination_id->caption() ?><?php echo ($t101_jo_head->Destination_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_head_edit->RightColumnClass ?>"><div<?php echo $t101_jo_head->Destination_id->cellAttributes() ?>>
<span id="el_t101_jo_head_Destination_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_head" data-field="x_Destination_id" data-value-separator="<?php echo $t101_jo_head->Destination_id->displayValueSeparatorAttribute() ?>" id="x_Destination_id" name="x_Destination_id"<?php echo $t101_jo_head->Destination_id->editAttributes() ?>>
		<?php echo $t101_jo_head->Destination_id->selectOptionListHtml("x_Destination_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Destination_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_jo_head->Destination_id->caption() ?>" data-title="<?php echo $t101_jo_head->Destination_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Destination_id',url:'t002_destinationaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_jo_head->Destination_id->Lookup->getParamTag("p_x_Destination_id") ?>
</span>
<?php echo $t101_jo_head->Destination_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jo_head->Feeder_id->Visible) { // Feeder_id ?>
	<div id="r_Feeder_id" class="form-group row">
		<label id="elh_t101_jo_head_Feeder_id" for="x_Feeder_id" class="<?php echo $t101_jo_head_edit->LeftColumnClass ?>"><?php echo $t101_jo_head->Feeder_id->caption() ?><?php echo ($t101_jo_head->Feeder_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_head_edit->RightColumnClass ?>"><div<?php echo $t101_jo_head->Feeder_id->cellAttributes() ?>>
<span id="el_t101_jo_head_Feeder_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_head" data-field="x_Feeder_id" data-value-separator="<?php echo $t101_jo_head->Feeder_id->displayValueSeparatorAttribute() ?>" id="x_Feeder_id" name="x_Feeder_id"<?php echo $t101_jo_head->Feeder_id->editAttributes() ?>>
		<?php echo $t101_jo_head->Feeder_id->selectOptionListHtml("x_Feeder_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Feeder_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_jo_head->Feeder_id->caption() ?>" data-title="<?php echo $t101_jo_head->Feeder_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Feeder_id',url:'t003_feederaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_jo_head->Feeder_id->Lookup->getParamTag("p_x_Feeder_id") ?>
</span>
<?php echo $t101_jo_head->Feeder_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("t101_jo_detail", explode(",", $t101_jo_head->getCurrentDetailTable())) && $t101_jo_detail->DetailEdit) {
?>
<?php if ($t101_jo_head->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("t101_jo_detail", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t101_jo_detailgrid.php" ?>
<?php } ?>
<?php if (!$t101_jo_head_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t101_jo_head_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_jo_head_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t101_jo_head_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

$().ready(
	function() {
		$("#x_Tanggal_Stuffing").change(
			function() {
				var str = this.value;
				var res = str.slice(0, -8);
				res = res + "00:00:00";
				$("#x_Tanggal_Stuffing").val(res); alert(res);
			}
		);
	}
);
alert($("#x_Tanggal_Stuffing"));
</script>
<?php include_once "footer.php" ?>
<?php
$t101_jo_head_edit->terminate();
?>