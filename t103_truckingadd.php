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
$t103_trucking_add = new t103_trucking_add();

// Run the page
$t103_trucking_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t103_trucking_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ft103_truckingadd = currentForm = new ew.Form("ft103_truckingadd", "add");

// Validate form
ft103_truckingadd.validate = function() {
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
		<?php if ($t103_trucking_add->EI->Required) { ?>
			elm = this.getElements("x" + infix + "_EI");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_trucking->EI->caption(), $t103_trucking->EI->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t103_trucking_add->Shipper_id->Required) { ?>
			elm = this.getElements("x" + infix + "_Shipper_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_trucking->Shipper_id->caption(), $t103_trucking->Shipper_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Shipper_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t103_trucking->Shipper_id->errorMessage()) ?>");
		<?php if ($t103_trucking_add->Party->Required) { ?>
			elm = this.getElements("x" + infix + "_Party");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_trucking->Party->caption(), $t103_trucking->Party->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Party");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t103_trucking->Party->errorMessage()) ?>");
		<?php if ($t103_trucking_add->Jenis_Container->Required) { ?>
			elm = this.getElements("x" + infix + "_Jenis_Container");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_trucking->Jenis_Container->caption(), $t103_trucking->Jenis_Container->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t103_trucking_add->Tgl_Stuffing->Required) { ?>
			elm = this.getElements("x" + infix + "_Tgl_Stuffing");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_trucking->Tgl_Stuffing->caption(), $t103_trucking->Tgl_Stuffing->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Tgl_Stuffing");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t103_trucking->Tgl_Stuffing->errorMessage()) ?>");
		<?php if ($t103_trucking_add->Destination_id->Required) { ?>
			elm = this.getElements("x" + infix + "_Destination_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_trucking->Destination_id->caption(), $t103_trucking->Destination_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Destination_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t103_trucking->Destination_id->errorMessage()) ?>");
		<?php if ($t103_trucking_add->Feeder_id->Required) { ?>
			elm = this.getElements("x" + infix + "_Feeder_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_trucking->Feeder_id->caption(), $t103_trucking->Feeder_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Feeder_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t103_trucking->Feeder_id->errorMessage()) ?>");
		<?php if ($t103_trucking_add->ETA_ETD->Required) { ?>
			elm = this.getElements("x" + infix + "_ETA_ETD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_trucking->ETA_ETD->caption(), $t103_trucking->ETA_ETD->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ETA_ETD");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t103_trucking->ETA_ETD->errorMessage()) ?>");
		<?php if ($t103_trucking_add->Liner_id->Required) { ?>
			elm = this.getElements("x" + infix + "_Liner_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_trucking->Liner_id->caption(), $t103_trucking->Liner_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Liner_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t103_trucking->Liner_id->errorMessage()) ?>");
		<?php if ($t103_trucking_add->Remark->Required) { ?>
			elm = this.getElements("x" + infix + "_Remark");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_trucking->Remark->caption(), $t103_trucking->Remark->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t103_trucking_add->TruckingVendor_id->Required) { ?>
			elm = this.getElements("x" + infix + "_TruckingVendor_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_trucking->TruckingVendor_id->caption(), $t103_trucking->TruckingVendor_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TruckingVendor_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t103_trucking->TruckingVendor_id->errorMessage()) ?>");
		<?php if ($t103_trucking_add->Driver_id->Required) { ?>
			elm = this.getElements("x" + infix + "_Driver_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_trucking->Driver_id->caption(), $t103_trucking->Driver_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Driver_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t103_trucking->Driver_id->errorMessage()) ?>");
		<?php if ($t103_trucking_add->No_Pol_1->Required) { ?>
			elm = this.getElements("x" + infix + "_No_Pol_1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_trucking->No_Pol_1->caption(), $t103_trucking->No_Pol_1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t103_trucking_add->No_Pol_2->Required) { ?>
			elm = this.getElements("x" + infix + "_No_Pol_2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_trucking->No_Pol_2->caption(), $t103_trucking->No_Pol_2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t103_trucking_add->No_Pol_3->Required) { ?>
			elm = this.getElements("x" + infix + "_No_Pol_3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_trucking->No_Pol_3->caption(), $t103_trucking->No_Pol_3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t103_trucking_add->Nomor_Container_1->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Container_1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_trucking->Nomor_Container_1->caption(), $t103_trucking->Nomor_Container_1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t103_trucking_add->Nomor_Container_2->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Container_2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_trucking->Nomor_Container_2->caption(), $t103_trucking->Nomor_Container_2->RequiredErrorMessage)) ?>");
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
ft103_truckingadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft103_truckingadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft103_truckingadd.lists["x_EI"] = <?php echo $t103_trucking_add->EI->Lookup->toClientList() ?>;
ft103_truckingadd.lists["x_EI"].options = <?php echo JsonEncode($t103_trucking_add->EI->options(FALSE, TRUE)) ?>;
ft103_truckingadd.lists["x_Jenis_Container"] = <?php echo $t103_trucking_add->Jenis_Container->Lookup->toClientList() ?>;
ft103_truckingadd.lists["x_Jenis_Container"].options = <?php echo JsonEncode($t103_trucking_add->Jenis_Container->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t103_trucking_add->showPageHeader(); ?>
<?php
$t103_trucking_add->showMessage();
?>
<form name="ft103_truckingadd" id="ft103_truckingadd" class="<?php echo $t103_trucking_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t103_trucking_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t103_trucking_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t103_trucking">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t103_trucking_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t103_trucking->EI->Visible) { // EI ?>
	<div id="r_EI" class="form-group row">
		<label id="elh_t103_trucking_EI" class="<?php echo $t103_trucking_add->LeftColumnClass ?>"><?php echo $t103_trucking->EI->caption() ?><?php echo ($t103_trucking->EI->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_trucking_add->RightColumnClass ?>"><div<?php echo $t103_trucking->EI->cellAttributes() ?>>
<span id="el_t103_trucking_EI">
<div id="tp_x_EI" class="ew-template"><input type="radio" class="form-check-input" data-table="t103_trucking" data-field="x_EI" data-value-separator="<?php echo $t103_trucking->EI->displayValueSeparatorAttribute() ?>" name="x_EI" id="x_EI" value="{value}"<?php echo $t103_trucking->EI->editAttributes() ?>></div>
<div id="dsl_x_EI" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t103_trucking->EI->radioButtonListHtml(FALSE, "x_EI") ?>
</div></div>
</span>
<?php echo $t103_trucking->EI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_trucking->Shipper_id->Visible) { // Shipper_id ?>
	<div id="r_Shipper_id" class="form-group row">
		<label id="elh_t103_trucking_Shipper_id" for="x_Shipper_id" class="<?php echo $t103_trucking_add->LeftColumnClass ?>"><?php echo $t103_trucking->Shipper_id->caption() ?><?php echo ($t103_trucking->Shipper_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_trucking_add->RightColumnClass ?>"><div<?php echo $t103_trucking->Shipper_id->cellAttributes() ?>>
<span id="el_t103_trucking_Shipper_id">
<input type="text" data-table="t103_trucking" data-field="x_Shipper_id" name="x_Shipper_id" id="x_Shipper_id" size="30" placeholder="<?php echo HtmlEncode($t103_trucking->Shipper_id->getPlaceHolder()) ?>" value="<?php echo $t103_trucking->Shipper_id->EditValue ?>"<?php echo $t103_trucking->Shipper_id->editAttributes() ?>>
</span>
<?php echo $t103_trucking->Shipper_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_trucking->Party->Visible) { // Party ?>
	<div id="r_Party" class="form-group row">
		<label id="elh_t103_trucking_Party" for="x_Party" class="<?php echo $t103_trucking_add->LeftColumnClass ?>"><?php echo $t103_trucking->Party->caption() ?><?php echo ($t103_trucking->Party->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_trucking_add->RightColumnClass ?>"><div<?php echo $t103_trucking->Party->cellAttributes() ?>>
<span id="el_t103_trucking_Party">
<input type="text" data-table="t103_trucking" data-field="x_Party" name="x_Party" id="x_Party" size="30" placeholder="<?php echo HtmlEncode($t103_trucking->Party->getPlaceHolder()) ?>" value="<?php echo $t103_trucking->Party->EditValue ?>"<?php echo $t103_trucking->Party->editAttributes() ?>>
</span>
<?php echo $t103_trucking->Party->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_trucking->Jenis_Container->Visible) { // Jenis_Container ?>
	<div id="r_Jenis_Container" class="form-group row">
		<label id="elh_t103_trucking_Jenis_Container" class="<?php echo $t103_trucking_add->LeftColumnClass ?>"><?php echo $t103_trucking->Jenis_Container->caption() ?><?php echo ($t103_trucking->Jenis_Container->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_trucking_add->RightColumnClass ?>"><div<?php echo $t103_trucking->Jenis_Container->cellAttributes() ?>>
<span id="el_t103_trucking_Jenis_Container">
<div id="tp_x_Jenis_Container" class="ew-template"><input type="radio" class="form-check-input" data-table="t103_trucking" data-field="x_Jenis_Container" data-value-separator="<?php echo $t103_trucking->Jenis_Container->displayValueSeparatorAttribute() ?>" name="x_Jenis_Container" id="x_Jenis_Container" value="{value}"<?php echo $t103_trucking->Jenis_Container->editAttributes() ?>></div>
<div id="dsl_x_Jenis_Container" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t103_trucking->Jenis_Container->radioButtonListHtml(FALSE, "x_Jenis_Container") ?>
</div></div>
</span>
<?php echo $t103_trucking->Jenis_Container->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_trucking->Tgl_Stuffing->Visible) { // Tgl_Stuffing ?>
	<div id="r_Tgl_Stuffing" class="form-group row">
		<label id="elh_t103_trucking_Tgl_Stuffing" for="x_Tgl_Stuffing" class="<?php echo $t103_trucking_add->LeftColumnClass ?>"><?php echo $t103_trucking->Tgl_Stuffing->caption() ?><?php echo ($t103_trucking->Tgl_Stuffing->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_trucking_add->RightColumnClass ?>"><div<?php echo $t103_trucking->Tgl_Stuffing->cellAttributes() ?>>
<span id="el_t103_trucking_Tgl_Stuffing">
<input type="text" data-table="t103_trucking" data-field="x_Tgl_Stuffing" name="x_Tgl_Stuffing" id="x_Tgl_Stuffing" placeholder="<?php echo HtmlEncode($t103_trucking->Tgl_Stuffing->getPlaceHolder()) ?>" value="<?php echo $t103_trucking->Tgl_Stuffing->EditValue ?>"<?php echo $t103_trucking->Tgl_Stuffing->editAttributes() ?>>
<?php if (!$t103_trucking->Tgl_Stuffing->ReadOnly && !$t103_trucking->Tgl_Stuffing->Disabled && !isset($t103_trucking->Tgl_Stuffing->EditAttrs["readonly"]) && !isset($t103_trucking->Tgl_Stuffing->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft103_truckingadd", "x_Tgl_Stuffing", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $t103_trucking->Tgl_Stuffing->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_trucking->Destination_id->Visible) { // Destination_id ?>
	<div id="r_Destination_id" class="form-group row">
		<label id="elh_t103_trucking_Destination_id" for="x_Destination_id" class="<?php echo $t103_trucking_add->LeftColumnClass ?>"><?php echo $t103_trucking->Destination_id->caption() ?><?php echo ($t103_trucking->Destination_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_trucking_add->RightColumnClass ?>"><div<?php echo $t103_trucking->Destination_id->cellAttributes() ?>>
<span id="el_t103_trucking_Destination_id">
<input type="text" data-table="t103_trucking" data-field="x_Destination_id" name="x_Destination_id" id="x_Destination_id" size="30" placeholder="<?php echo HtmlEncode($t103_trucking->Destination_id->getPlaceHolder()) ?>" value="<?php echo $t103_trucking->Destination_id->EditValue ?>"<?php echo $t103_trucking->Destination_id->editAttributes() ?>>
</span>
<?php echo $t103_trucking->Destination_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_trucking->Feeder_id->Visible) { // Feeder_id ?>
	<div id="r_Feeder_id" class="form-group row">
		<label id="elh_t103_trucking_Feeder_id" for="x_Feeder_id" class="<?php echo $t103_trucking_add->LeftColumnClass ?>"><?php echo $t103_trucking->Feeder_id->caption() ?><?php echo ($t103_trucking->Feeder_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_trucking_add->RightColumnClass ?>"><div<?php echo $t103_trucking->Feeder_id->cellAttributes() ?>>
<span id="el_t103_trucking_Feeder_id">
<input type="text" data-table="t103_trucking" data-field="x_Feeder_id" name="x_Feeder_id" id="x_Feeder_id" size="30" placeholder="<?php echo HtmlEncode($t103_trucking->Feeder_id->getPlaceHolder()) ?>" value="<?php echo $t103_trucking->Feeder_id->EditValue ?>"<?php echo $t103_trucking->Feeder_id->editAttributes() ?>>
</span>
<?php echo $t103_trucking->Feeder_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_trucking->ETA_ETD->Visible) { // ETA_ETD ?>
	<div id="r_ETA_ETD" class="form-group row">
		<label id="elh_t103_trucking_ETA_ETD" for="x_ETA_ETD" class="<?php echo $t103_trucking_add->LeftColumnClass ?>"><?php echo $t103_trucking->ETA_ETD->caption() ?><?php echo ($t103_trucking->ETA_ETD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_trucking_add->RightColumnClass ?>"><div<?php echo $t103_trucking->ETA_ETD->cellAttributes() ?>>
<span id="el_t103_trucking_ETA_ETD">
<input type="text" data-table="t103_trucking" data-field="x_ETA_ETD" name="x_ETA_ETD" id="x_ETA_ETD" placeholder="<?php echo HtmlEncode($t103_trucking->ETA_ETD->getPlaceHolder()) ?>" value="<?php echo $t103_trucking->ETA_ETD->EditValue ?>"<?php echo $t103_trucking->ETA_ETD->editAttributes() ?>>
<?php if (!$t103_trucking->ETA_ETD->ReadOnly && !$t103_trucking->ETA_ETD->Disabled && !isset($t103_trucking->ETA_ETD->EditAttrs["readonly"]) && !isset($t103_trucking->ETA_ETD->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft103_truckingadd", "x_ETA_ETD", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $t103_trucking->ETA_ETD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_trucking->Liner_id->Visible) { // Liner_id ?>
	<div id="r_Liner_id" class="form-group row">
		<label id="elh_t103_trucking_Liner_id" for="x_Liner_id" class="<?php echo $t103_trucking_add->LeftColumnClass ?>"><?php echo $t103_trucking->Liner_id->caption() ?><?php echo ($t103_trucking->Liner_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_trucking_add->RightColumnClass ?>"><div<?php echo $t103_trucking->Liner_id->cellAttributes() ?>>
<span id="el_t103_trucking_Liner_id">
<input type="text" data-table="t103_trucking" data-field="x_Liner_id" name="x_Liner_id" id="x_Liner_id" size="30" placeholder="<?php echo HtmlEncode($t103_trucking->Liner_id->getPlaceHolder()) ?>" value="<?php echo $t103_trucking->Liner_id->EditValue ?>"<?php echo $t103_trucking->Liner_id->editAttributes() ?>>
</span>
<?php echo $t103_trucking->Liner_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_trucking->Remark->Visible) { // Remark ?>
	<div id="r_Remark" class="form-group row">
		<label id="elh_t103_trucking_Remark" for="x_Remark" class="<?php echo $t103_trucking_add->LeftColumnClass ?>"><?php echo $t103_trucking->Remark->caption() ?><?php echo ($t103_trucking->Remark->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_trucking_add->RightColumnClass ?>"><div<?php echo $t103_trucking->Remark->cellAttributes() ?>>
<span id="el_t103_trucking_Remark">
<textarea data-table="t103_trucking" data-field="x_Remark" name="x_Remark" id="x_Remark" cols="35" rows="4" placeholder="<?php echo HtmlEncode($t103_trucking->Remark->getPlaceHolder()) ?>"<?php echo $t103_trucking->Remark->editAttributes() ?>><?php echo $t103_trucking->Remark->EditValue ?></textarea>
</span>
<?php echo $t103_trucking->Remark->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_trucking->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
	<div id="r_TruckingVendor_id" class="form-group row">
		<label id="elh_t103_trucking_TruckingVendor_id" for="x_TruckingVendor_id" class="<?php echo $t103_trucking_add->LeftColumnClass ?>"><?php echo $t103_trucking->TruckingVendor_id->caption() ?><?php echo ($t103_trucking->TruckingVendor_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_trucking_add->RightColumnClass ?>"><div<?php echo $t103_trucking->TruckingVendor_id->cellAttributes() ?>>
<span id="el_t103_trucking_TruckingVendor_id">
<input type="text" data-table="t103_trucking" data-field="x_TruckingVendor_id" name="x_TruckingVendor_id" id="x_TruckingVendor_id" size="30" placeholder="<?php echo HtmlEncode($t103_trucking->TruckingVendor_id->getPlaceHolder()) ?>" value="<?php echo $t103_trucking->TruckingVendor_id->EditValue ?>"<?php echo $t103_trucking->TruckingVendor_id->editAttributes() ?>>
</span>
<?php echo $t103_trucking->TruckingVendor_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_trucking->Driver_id->Visible) { // Driver_id ?>
	<div id="r_Driver_id" class="form-group row">
		<label id="elh_t103_trucking_Driver_id" for="x_Driver_id" class="<?php echo $t103_trucking_add->LeftColumnClass ?>"><?php echo $t103_trucking->Driver_id->caption() ?><?php echo ($t103_trucking->Driver_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_trucking_add->RightColumnClass ?>"><div<?php echo $t103_trucking->Driver_id->cellAttributes() ?>>
<span id="el_t103_trucking_Driver_id">
<input type="text" data-table="t103_trucking" data-field="x_Driver_id" name="x_Driver_id" id="x_Driver_id" size="30" placeholder="<?php echo HtmlEncode($t103_trucking->Driver_id->getPlaceHolder()) ?>" value="<?php echo $t103_trucking->Driver_id->EditValue ?>"<?php echo $t103_trucking->Driver_id->editAttributes() ?>>
</span>
<?php echo $t103_trucking->Driver_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_trucking->No_Pol_1->Visible) { // No_Pol_1 ?>
	<div id="r_No_Pol_1" class="form-group row">
		<label id="elh_t103_trucking_No_Pol_1" for="x_No_Pol_1" class="<?php echo $t103_trucking_add->LeftColumnClass ?>"><?php echo $t103_trucking->No_Pol_1->caption() ?><?php echo ($t103_trucking->No_Pol_1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_trucking_add->RightColumnClass ?>"><div<?php echo $t103_trucking->No_Pol_1->cellAttributes() ?>>
<span id="el_t103_trucking_No_Pol_1">
<input type="text" data-table="t103_trucking" data-field="x_No_Pol_1" name="x_No_Pol_1" id="x_No_Pol_1" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($t103_trucking->No_Pol_1->getPlaceHolder()) ?>" value="<?php echo $t103_trucking->No_Pol_1->EditValue ?>"<?php echo $t103_trucking->No_Pol_1->editAttributes() ?>>
</span>
<?php echo $t103_trucking->No_Pol_1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_trucking->No_Pol_2->Visible) { // No_Pol_2 ?>
	<div id="r_No_Pol_2" class="form-group row">
		<label id="elh_t103_trucking_No_Pol_2" for="x_No_Pol_2" class="<?php echo $t103_trucking_add->LeftColumnClass ?>"><?php echo $t103_trucking->No_Pol_2->caption() ?><?php echo ($t103_trucking->No_Pol_2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_trucking_add->RightColumnClass ?>"><div<?php echo $t103_trucking->No_Pol_2->cellAttributes() ?>>
<span id="el_t103_trucking_No_Pol_2">
<input type="text" data-table="t103_trucking" data-field="x_No_Pol_2" name="x_No_Pol_2" id="x_No_Pol_2" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($t103_trucking->No_Pol_2->getPlaceHolder()) ?>" value="<?php echo $t103_trucking->No_Pol_2->EditValue ?>"<?php echo $t103_trucking->No_Pol_2->editAttributes() ?>>
</span>
<?php echo $t103_trucking->No_Pol_2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_trucking->No_Pol_3->Visible) { // No_Pol_3 ?>
	<div id="r_No_Pol_3" class="form-group row">
		<label id="elh_t103_trucking_No_Pol_3" for="x_No_Pol_3" class="<?php echo $t103_trucking_add->LeftColumnClass ?>"><?php echo $t103_trucking->No_Pol_3->caption() ?><?php echo ($t103_trucking->No_Pol_3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_trucking_add->RightColumnClass ?>"><div<?php echo $t103_trucking->No_Pol_3->cellAttributes() ?>>
<span id="el_t103_trucking_No_Pol_3">
<input type="text" data-table="t103_trucking" data-field="x_No_Pol_3" name="x_No_Pol_3" id="x_No_Pol_3" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($t103_trucking->No_Pol_3->getPlaceHolder()) ?>" value="<?php echo $t103_trucking->No_Pol_3->EditValue ?>"<?php echo $t103_trucking->No_Pol_3->editAttributes() ?>>
</span>
<?php echo $t103_trucking->No_Pol_3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_trucking->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
	<div id="r_Nomor_Container_1" class="form-group row">
		<label id="elh_t103_trucking_Nomor_Container_1" for="x_Nomor_Container_1" class="<?php echo $t103_trucking_add->LeftColumnClass ?>"><?php echo $t103_trucking->Nomor_Container_1->caption() ?><?php echo ($t103_trucking->Nomor_Container_1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_trucking_add->RightColumnClass ?>"><div<?php echo $t103_trucking->Nomor_Container_1->cellAttributes() ?>>
<span id="el_t103_trucking_Nomor_Container_1">
<input type="text" data-table="t103_trucking" data-field="x_Nomor_Container_1" name="x_Nomor_Container_1" id="x_Nomor_Container_1" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($t103_trucking->Nomor_Container_1->getPlaceHolder()) ?>" value="<?php echo $t103_trucking->Nomor_Container_1->EditValue ?>"<?php echo $t103_trucking->Nomor_Container_1->editAttributes() ?>>
</span>
<?php echo $t103_trucking->Nomor_Container_1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_trucking->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
	<div id="r_Nomor_Container_2" class="form-group row">
		<label id="elh_t103_trucking_Nomor_Container_2" for="x_Nomor_Container_2" class="<?php echo $t103_trucking_add->LeftColumnClass ?>"><?php echo $t103_trucking->Nomor_Container_2->caption() ?><?php echo ($t103_trucking->Nomor_Container_2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_trucking_add->RightColumnClass ?>"><div<?php echo $t103_trucking->Nomor_Container_2->cellAttributes() ?>>
<span id="el_t103_trucking_Nomor_Container_2">
<input type="text" data-table="t103_trucking" data-field="x_Nomor_Container_2" name="x_Nomor_Container_2" id="x_Nomor_Container_2" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($t103_trucking->Nomor_Container_2->getPlaceHolder()) ?>" value="<?php echo $t103_trucking->Nomor_Container_2->EditValue ?>"<?php echo $t103_trucking->Nomor_Container_2->editAttributes() ?>>
</span>
<?php echo $t103_trucking->Nomor_Container_2->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t103_trucking_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t103_trucking_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t103_trucking_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t103_trucking_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t103_trucking_add->terminate();
?>