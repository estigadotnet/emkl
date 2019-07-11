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
$t101_jo_detail_add = new t101_jo_detail_add();

// Run the page
$t101_jo_detail_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_jo_detail_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ft101_jo_detailadd = currentForm = new ew.Form("ft101_jo_detailadd", "add");

// Validate form
ft101_jo_detailadd.validate = function() {
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
		<?php if ($t101_jo_detail_add->TruckingVendor_id->Required) { ?>
			elm = this.getElements("x" + infix + "_TruckingVendor_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->TruckingVendor_id->caption(), $t101_jo_detail->TruckingVendor_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_add->Driver_id->Required) { ?>
			elm = this.getElements("x" + infix + "_Driver_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Driver_id->caption(), $t101_jo_detail->Driver_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_add->Tanggal_Stuffing->Required) { ?>
			elm = this.getElements("x" + infix + "_Tanggal_Stuffing");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Tanggal_Stuffing->caption(), $t101_jo_detail->Tanggal_Stuffing->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Tanggal_Stuffing");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t101_jo_detail->Tanggal_Stuffing->errorMessage()) ?>");
		<?php if ($t101_jo_detail_add->Nomor_Polisi_1->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Polisi_1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Nomor_Polisi_1->caption(), $t101_jo_detail->Nomor_Polisi_1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_add->Nomor_Polisi_2->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Polisi_2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Nomor_Polisi_2->caption(), $t101_jo_detail->Nomor_Polisi_2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_add->Nomor_Polisi_3->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Polisi_3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Nomor_Polisi_3->caption(), $t101_jo_detail->Nomor_Polisi_3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_add->Nomor_Container_1->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Container_1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Nomor_Container_1->caption(), $t101_jo_detail->Nomor_Container_1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_add->Nomor_Container_2->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Container_2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Nomor_Container_2->caption(), $t101_jo_detail->Nomor_Container_2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_add->Ref_JOHead_id->Required) { ?>
			elm = this.getElements("x" + infix + "_Ref_JOHead_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Ref_JOHead_id->caption(), $t101_jo_detail->Ref_JOHead_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_add->No_Tagihan->Required) { ?>
			elm = this.getElements("x" + infix + "_No_Tagihan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->No_Tagihan->caption(), $t101_jo_detail->No_Tagihan->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_No_Tagihan");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t101_jo_detail->No_Tagihan->errorMessage()) ?>");
		<?php if ($t101_jo_detail_add->Jumlah_Tagihan->Required) { ?>
			elm = this.getElements("x" + infix + "_Jumlah_Tagihan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Jumlah_Tagihan->caption(), $t101_jo_detail->Jumlah_Tagihan->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Jumlah_Tagihan");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t101_jo_detail->Jumlah_Tagihan->errorMessage()) ?>");

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
ft101_jo_detailadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft101_jo_detailadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft101_jo_detailadd.lists["x_TruckingVendor_id"] = <?php echo $t101_jo_detail_add->TruckingVendor_id->Lookup->toClientList() ?>;
ft101_jo_detailadd.lists["x_TruckingVendor_id"].options = <?php echo JsonEncode($t101_jo_detail_add->TruckingVendor_id->lookupOptions()) ?>;
ft101_jo_detailadd.lists["x_Driver_id"] = <?php echo $t101_jo_detail_add->Driver_id->Lookup->toClientList() ?>;
ft101_jo_detailadd.lists["x_Driver_id"].options = <?php echo JsonEncode($t101_jo_detail_add->Driver_id->lookupOptions()) ?>;
ft101_jo_detailadd.lists["x_Ref_JOHead_id"] = <?php echo $t101_jo_detail_add->Ref_JOHead_id->Lookup->toClientList() ?>;
ft101_jo_detailadd.lists["x_Ref_JOHead_id"].options = <?php echo JsonEncode($t101_jo_detail_add->Ref_JOHead_id->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t101_jo_detail_add->showPageHeader(); ?>
<?php
$t101_jo_detail_add->showMessage();
?>
<form name="ft101_jo_detailadd" id="ft101_jo_detailadd" class="<?php echo $t101_jo_detail_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t101_jo_detail_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t101_jo_detail_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_jo_detail">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t101_jo_detail_add->IsModal ?>">
<?php if ($t101_jo_detail->getCurrentMasterTable() == "t101_jo_head") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="t101_jo_head">
<input type="hidden" name="fk_id" value="<?php echo $t101_jo_detail->JOHead_id->getSessionValue() ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($t101_jo_detail->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
	<div id="r_TruckingVendor_id" class="form-group row">
		<label id="elh_t101_jo_detail_TruckingVendor_id" for="x_TruckingVendor_id" class="<?php echo $t101_jo_detail_add->LeftColumnClass ?>"><?php echo $t101_jo_detail->TruckingVendor_id->caption() ?><?php echo ($t101_jo_detail->TruckingVendor_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_detail_add->RightColumnClass ?>"><div<?php echo $t101_jo_detail->TruckingVendor_id->cellAttributes() ?>>
<span id="el_t101_jo_detail_TruckingVendor_id">
<?php $t101_jo_detail->TruckingVendor_id->EditAttrs["onchange"] = "ew.updateOptions.call(this);" . @$t101_jo_detail->TruckingVendor_id->EditAttrs["onchange"]; ?>
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
		<label id="elh_t101_jo_detail_Driver_id" for="x_Driver_id" class="<?php echo $t101_jo_detail_add->LeftColumnClass ?>"><?php echo $t101_jo_detail->Driver_id->caption() ?><?php echo ($t101_jo_detail->Driver_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_detail_add->RightColumnClass ?>"><div<?php echo $t101_jo_detail->Driver_id->cellAttributes() ?>>
<span id="el_t101_jo_detail_Driver_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_detail" data-field="x_Driver_id" data-value-separator="<?php echo $t101_jo_detail->Driver_id->displayValueSeparatorAttribute() ?>" id="x_Driver_id" name="x_Driver_id"<?php echo $t101_jo_detail->Driver_id->editAttributes() ?>>
		<?php echo $t101_jo_detail->Driver_id->selectOptionListHtml("x_Driver_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Driver_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_jo_detail->Driver_id->caption() ?>" data-title="<?php echo $t101_jo_detail->Driver_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Driver_id',url:'t005_driveraddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_jo_detail->Driver_id->Lookup->getParamTag("p_x_Driver_id") ?>
</span>
<?php echo $t101_jo_detail->Driver_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jo_detail->Tanggal_Stuffing->Visible) { // Tanggal_Stuffing ?>
	<div id="r_Tanggal_Stuffing" class="form-group row">
		<label id="elh_t101_jo_detail_Tanggal_Stuffing" for="x_Tanggal_Stuffing" class="<?php echo $t101_jo_detail_add->LeftColumnClass ?>"><?php echo $t101_jo_detail->Tanggal_Stuffing->caption() ?><?php echo ($t101_jo_detail->Tanggal_Stuffing->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_detail_add->RightColumnClass ?>"><div<?php echo $t101_jo_detail->Tanggal_Stuffing->cellAttributes() ?>>
<span id="el_t101_jo_detail_Tanggal_Stuffing">
<input type="text" data-table="t101_jo_detail" data-field="x_Tanggal_Stuffing" data-format="11" name="x_Tanggal_Stuffing" id="x_Tanggal_Stuffing" size="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Tanggal_Stuffing->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Tanggal_Stuffing->EditValue ?>"<?php echo $t101_jo_detail->Tanggal_Stuffing->editAttributes() ?>>
<?php if (!$t101_jo_detail->Tanggal_Stuffing->ReadOnly && !$t101_jo_detail->Tanggal_Stuffing->Disabled && !isset($t101_jo_detail->Tanggal_Stuffing->EditAttrs["readonly"]) && !isset($t101_jo_detail->Tanggal_Stuffing->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft101_jo_detailadd", "x_Tanggal_Stuffing", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php echo $t101_jo_detail->Tanggal_Stuffing->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_1->Visible) { // Nomor_Polisi_1 ?>
	<div id="r_Nomor_Polisi_1" class="form-group row">
		<label id="elh_t101_jo_detail_Nomor_Polisi_1" for="x_Nomor_Polisi_1" class="<?php echo $t101_jo_detail_add->LeftColumnClass ?>"><?php echo $t101_jo_detail->Nomor_Polisi_1->caption() ?><?php echo ($t101_jo_detail->Nomor_Polisi_1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_detail_add->RightColumnClass ?>"><div<?php echo $t101_jo_detail->Nomor_Polisi_1->cellAttributes() ?>>
<span id="el_t101_jo_detail_Nomor_Polisi_1">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_1" name="x_Nomor_Polisi_1" id="x_Nomor_Polisi_1" size="1" maxlength="5" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_1->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_1->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_1->editAttributes() ?>>
</span>
<?php echo $t101_jo_detail->Nomor_Polisi_1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_2->Visible) { // Nomor_Polisi_2 ?>
	<div id="r_Nomor_Polisi_2" class="form-group row">
		<label id="elh_t101_jo_detail_Nomor_Polisi_2" for="x_Nomor_Polisi_2" class="<?php echo $t101_jo_detail_add->LeftColumnClass ?>"><?php echo $t101_jo_detail->Nomor_Polisi_2->caption() ?><?php echo ($t101_jo_detail->Nomor_Polisi_2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_detail_add->RightColumnClass ?>"><div<?php echo $t101_jo_detail->Nomor_Polisi_2->cellAttributes() ?>>
<span id="el_t101_jo_detail_Nomor_Polisi_2">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_2" name="x_Nomor_Polisi_2" id="x_Nomor_Polisi_2" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_2->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_2->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_2->editAttributes() ?>>
</span>
<?php echo $t101_jo_detail->Nomor_Polisi_2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_3->Visible) { // Nomor_Polisi_3 ?>
	<div id="r_Nomor_Polisi_3" class="form-group row">
		<label id="elh_t101_jo_detail_Nomor_Polisi_3" for="x_Nomor_Polisi_3" class="<?php echo $t101_jo_detail_add->LeftColumnClass ?>"><?php echo $t101_jo_detail->Nomor_Polisi_3->caption() ?><?php echo ($t101_jo_detail->Nomor_Polisi_3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_detail_add->RightColumnClass ?>"><div<?php echo $t101_jo_detail->Nomor_Polisi_3->cellAttributes() ?>>
<span id="el_t101_jo_detail_Nomor_Polisi_3">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_3" name="x_Nomor_Polisi_3" id="x_Nomor_Polisi_3" size="5" maxlength="5" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_3->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_3->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_3->editAttributes() ?>>
</span>
<?php echo $t101_jo_detail->Nomor_Polisi_3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
	<div id="r_Nomor_Container_1" class="form-group row">
		<label id="elh_t101_jo_detail_Nomor_Container_1" for="x_Nomor_Container_1" class="<?php echo $t101_jo_detail_add->LeftColumnClass ?>"><?php echo $t101_jo_detail->Nomor_Container_1->caption() ?><?php echo ($t101_jo_detail->Nomor_Container_1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_detail_add->RightColumnClass ?>"><div<?php echo $t101_jo_detail->Nomor_Container_1->cellAttributes() ?>>
<span id="el_t101_jo_detail_Nomor_Container_1">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Container_1" name="x_Nomor_Container_1" id="x_Nomor_Container_1" size="5" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_1->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Container_1->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Container_1->editAttributes() ?>>
</span>
<?php echo $t101_jo_detail->Nomor_Container_1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
	<div id="r_Nomor_Container_2" class="form-group row">
		<label id="elh_t101_jo_detail_Nomor_Container_2" for="x_Nomor_Container_2" class="<?php echo $t101_jo_detail_add->LeftColumnClass ?>"><?php echo $t101_jo_detail->Nomor_Container_2->caption() ?><?php echo ($t101_jo_detail->Nomor_Container_2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_detail_add->RightColumnClass ?>"><div<?php echo $t101_jo_detail->Nomor_Container_2->cellAttributes() ?>>
<span id="el_t101_jo_detail_Nomor_Container_2">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Container_2" name="x_Nomor_Container_2" id="x_Nomor_Container_2" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_2->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Container_2->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Container_2->editAttributes() ?>>
</span>
<?php echo $t101_jo_detail->Nomor_Container_2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jo_detail->Ref_JOHead_id->Visible) { // Ref_JOHead_id ?>
	<div id="r_Ref_JOHead_id" class="form-group row">
		<label id="elh_t101_jo_detail_Ref_JOHead_id" for="x_Ref_JOHead_id" class="<?php echo $t101_jo_detail_add->LeftColumnClass ?>"><?php echo $t101_jo_detail->Ref_JOHead_id->caption() ?><?php echo ($t101_jo_detail->Ref_JOHead_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_detail_add->RightColumnClass ?>"><div<?php echo $t101_jo_detail->Ref_JOHead_id->cellAttributes() ?>>
<span id="el_t101_jo_detail_Ref_JOHead_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_detail" data-field="x_Ref_JOHead_id" data-value-separator="<?php echo $t101_jo_detail->Ref_JOHead_id->displayValueSeparatorAttribute() ?>" id="x_Ref_JOHead_id" name="x_Ref_JOHead_id"<?php echo $t101_jo_detail->Ref_JOHead_id->editAttributes() ?>>
		<?php echo $t101_jo_detail->Ref_JOHead_id->selectOptionListHtml("x_Ref_JOHead_id") ?>
	</select>
</div>
<?php echo $t101_jo_detail->Ref_JOHead_id->Lookup->getParamTag("p_x_Ref_JOHead_id") ?>
</span>
<?php echo $t101_jo_detail->Ref_JOHead_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jo_detail->No_Tagihan->Visible) { // No_Tagihan ?>
	<div id="r_No_Tagihan" class="form-group row">
		<label id="elh_t101_jo_detail_No_Tagihan" for="x_No_Tagihan" class="<?php echo $t101_jo_detail_add->LeftColumnClass ?>"><?php echo $t101_jo_detail->No_Tagihan->caption() ?><?php echo ($t101_jo_detail->No_Tagihan->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_detail_add->RightColumnClass ?>"><div<?php echo $t101_jo_detail->No_Tagihan->cellAttributes() ?>>
<span id="el_t101_jo_detail_No_Tagihan">
<input type="text" data-table="t101_jo_detail" data-field="x_No_Tagihan" name="x_No_Tagihan" id="x_No_Tagihan" size="5" placeholder="<?php echo HtmlEncode($t101_jo_detail->No_Tagihan->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->No_Tagihan->EditValue ?>"<?php echo $t101_jo_detail->No_Tagihan->editAttributes() ?>>
</span>
<?php echo $t101_jo_detail->No_Tagihan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jo_detail->Jumlah_Tagihan->Visible) { // Jumlah_Tagihan ?>
	<div id="r_Jumlah_Tagihan" class="form-group row">
		<label id="elh_t101_jo_detail_Jumlah_Tagihan" for="x_Jumlah_Tagihan" class="<?php echo $t101_jo_detail_add->LeftColumnClass ?>"><?php echo $t101_jo_detail->Jumlah_Tagihan->caption() ?><?php echo ($t101_jo_detail->Jumlah_Tagihan->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jo_detail_add->RightColumnClass ?>"><div<?php echo $t101_jo_detail->Jumlah_Tagihan->cellAttributes() ?>>
<span id="el_t101_jo_detail_Jumlah_Tagihan">
<input type="text" data-table="t101_jo_detail" data-field="x_Jumlah_Tagihan" name="x_Jumlah_Tagihan" id="x_Jumlah_Tagihan" size="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Jumlah_Tagihan->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Jumlah_Tagihan->EditValue ?>"<?php echo $t101_jo_detail->Jumlah_Tagihan->editAttributes() ?>>
</span>
<?php echo $t101_jo_detail->Jumlah_Tagihan->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<?php if (strval($t101_jo_detail->JOHead_id->getSessionValue()) <> "") { ?>
	<input type="hidden" name="x_JOHead_id" id="x_JOHead_id" value="<?php echo HtmlEncode(strval($t101_jo_detail->JOHead_id->getSessionValue())) ?>">
	<?php } ?>
<?php if (!$t101_jo_detail_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t101_jo_detail_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_jo_detail_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t101_jo_detail_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");
	// tampilkan TANGGAL HARI INI

	$("[data-table=t101_jo_detail][data-field=x_Tanggal_Stuffing]").val("<?php echo date('d-m-Y');?>");
	$(document).ready(
		function() {
			$("[data-table=t101_jo_detail][data-field=x_Tanggal_Stuffing]").change(
				function() {
					var str = this.value;
					var res = str.slice(0, -8);
					res = res + "00:00:00";
					$("[data-table=t101_jo_detail][data-field=x_Tanggal_Stuffing]").val(res); //alert(res);
				}
			);
		}
	);
</script>
<?php include_once "footer.php" ?>
<?php
$t101_jo_detail_add->terminate();
?>