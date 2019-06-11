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
$t101_tagihan_trucking_edit = new t101_tagihan_trucking_edit();

// Run the page
$t101_tagihan_trucking_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_tagihan_trucking_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ft101_tagihan_truckingedit = currentForm = new ew.Form("ft101_tagihan_truckingedit", "edit");

// Validate form
ft101_tagihan_truckingedit.validate = function() {
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
		<?php if ($t101_tagihan_trucking_edit->Nomor_Polisi_1->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Polisi_1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_tagihan_trucking->Nomor_Polisi_1->caption(), $t101_tagihan_trucking->Nomor_Polisi_1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_tagihan_trucking_edit->Nomor_Polisi_2->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Polisi_2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_tagihan_trucking->Nomor_Polisi_2->caption(), $t101_tagihan_trucking->Nomor_Polisi_2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_tagihan_trucking_edit->Nomor_Polisi_3->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Polisi_3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_tagihan_trucking->Nomor_Polisi_3->caption(), $t101_tagihan_trucking->Nomor_Polisi_3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_tagihan_trucking_edit->Tanggal->Required) { ?>
			elm = this.getElements("x" + infix + "_Tanggal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_tagihan_trucking->Tanggal->caption(), $t101_tagihan_trucking->Tanggal->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Tanggal");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t101_tagihan_trucking->Tanggal->errorMessage()) ?>");
		<?php if ($t101_tagihan_trucking_edit->Shipper_id->Required) { ?>
			elm = this.getElements("x" + infix + "_Shipper_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_tagihan_trucking->Shipper_id->caption(), $t101_tagihan_trucking->Shipper_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_tagihan_trucking_edit->Dari_Lokasi->Required) { ?>
			elm = this.getElements("x" + infix + "_Dari_Lokasi");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_tagihan_trucking->Dari_Lokasi->caption(), $t101_tagihan_trucking->Dari_Lokasi->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_tagihan_trucking_edit->Ke_Lokasi->Required) { ?>
			elm = this.getElements("x" + infix + "_Ke_Lokasi");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_tagihan_trucking->Ke_Lokasi->caption(), $t101_tagihan_trucking->Ke_Lokasi->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_tagihan_trucking_edit->Jenis_Container->Required) { ?>
			elm = this.getElements("x" + infix + "_Jenis_Container");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_tagihan_trucking->Jenis_Container->caption(), $t101_tagihan_trucking->Jenis_Container->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_tagihan_trucking_edit->Nomor_Container_1->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Container_1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_tagihan_trucking->Nomor_Container_1->caption(), $t101_tagihan_trucking->Nomor_Container_1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_tagihan_trucking_edit->Nomor_Container_2->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Container_2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_tagihan_trucking->Nomor_Container_2->caption(), $t101_tagihan_trucking->Nomor_Container_2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_tagihan_trucking_edit->Keterangan->Required) { ?>
			elm = this.getElements("x" + infix + "_Keterangan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_tagihan_trucking->Keterangan->caption(), $t101_tagihan_trucking->Keterangan->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_tagihan_trucking_edit->Tagihan->Required) { ?>
			elm = this.getElements("x" + infix + "_Tagihan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_tagihan_trucking->Tagihan->caption(), $t101_tagihan_trucking->Tagihan->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Tagihan");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t101_tagihan_trucking->Tagihan->errorMessage()) ?>");

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
ft101_tagihan_truckingedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft101_tagihan_truckingedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft101_tagihan_truckingedit.lists["x_Shipper_id"] = <?php echo $t101_tagihan_trucking_edit->Shipper_id->Lookup->toClientList() ?>;
ft101_tagihan_truckingedit.lists["x_Shipper_id"].options = <?php echo JsonEncode($t101_tagihan_trucking_edit->Shipper_id->lookupOptions()) ?>;
ft101_tagihan_truckingedit.lists["x_Jenis_Container"] = <?php echo $t101_tagihan_trucking_edit->Jenis_Container->Lookup->toClientList() ?>;
ft101_tagihan_truckingedit.lists["x_Jenis_Container"].options = <?php echo JsonEncode($t101_tagihan_trucking_edit->Jenis_Container->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t101_tagihan_trucking_edit->showPageHeader(); ?>
<?php
$t101_tagihan_trucking_edit->showMessage();
?>
<form name="ft101_tagihan_truckingedit" id="ft101_tagihan_truckingedit" class="<?php echo $t101_tagihan_trucking_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t101_tagihan_trucking_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t101_tagihan_trucking_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_tagihan_trucking">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t101_tagihan_trucking_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t101_tagihan_trucking->Nomor_Polisi_1->Visible) { // Nomor_Polisi_1 ?>
	<div id="r_Nomor_Polisi_1" class="form-group row">
		<label id="elh_t101_tagihan_trucking_Nomor_Polisi_1" for="x_Nomor_Polisi_1" class="<?php echo $t101_tagihan_trucking_edit->LeftColumnClass ?>"><?php echo $t101_tagihan_trucking->Nomor_Polisi_1->caption() ?><?php echo ($t101_tagihan_trucking->Nomor_Polisi_1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_tagihan_trucking_edit->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Nomor_Polisi_1">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_1" name="x_Nomor_Polisi_1" id="x_Nomor_Polisi_1" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_1->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->editAttributes() ?>>
</span>
<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Polisi_2->Visible) { // Nomor_Polisi_2 ?>
	<div id="r_Nomor_Polisi_2" class="form-group row">
		<label id="elh_t101_tagihan_trucking_Nomor_Polisi_2" for="x_Nomor_Polisi_2" class="<?php echo $t101_tagihan_trucking_edit->LeftColumnClass ?>"><?php echo $t101_tagihan_trucking->Nomor_Polisi_2->caption() ?><?php echo ($t101_tagihan_trucking->Nomor_Polisi_2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_tagihan_trucking_edit->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Nomor_Polisi_2">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_2" name="x_Nomor_Polisi_2" id="x_Nomor_Polisi_2" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_2->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->editAttributes() ?>>
</span>
<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Polisi_3->Visible) { // Nomor_Polisi_3 ?>
	<div id="r_Nomor_Polisi_3" class="form-group row">
		<label id="elh_t101_tagihan_trucking_Nomor_Polisi_3" for="x_Nomor_Polisi_3" class="<?php echo $t101_tagihan_trucking_edit->LeftColumnClass ?>"><?php echo $t101_tagihan_trucking->Nomor_Polisi_3->caption() ?><?php echo ($t101_tagihan_trucking->Nomor_Polisi_3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_tagihan_trucking_edit->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Nomor_Polisi_3">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_3" name="x_Nomor_Polisi_3" id="x_Nomor_Polisi_3" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_3->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->editAttributes() ?>>
</span>
<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->Tanggal->Visible) { // Tanggal ?>
	<div id="r_Tanggal" class="form-group row">
		<label id="elh_t101_tagihan_trucking_Tanggal" for="x_Tanggal" class="<?php echo $t101_tagihan_trucking_edit->LeftColumnClass ?>"><?php echo $t101_tagihan_trucking->Tanggal->caption() ?><?php echo ($t101_tagihan_trucking->Tanggal->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_tagihan_trucking_edit->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Tanggal->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Tanggal">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Tanggal" data-format="7" name="x_Tanggal" id="x_Tanggal" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Tanggal->EditValue ?>"<?php echo $t101_tagihan_trucking->Tanggal->editAttributes() ?>>
<?php if (!$t101_tagihan_trucking->Tanggal->ReadOnly && !$t101_tagihan_trucking->Tanggal->Disabled && !isset($t101_tagihan_trucking->Tanggal->EditAttrs["readonly"]) && !isset($t101_tagihan_trucking->Tanggal->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft101_tagihan_truckingedit", "x_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php echo $t101_tagihan_trucking->Tanggal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->Shipper_id->Visible) { // Shipper_id ?>
	<div id="r_Shipper_id" class="form-group row">
		<label id="elh_t101_tagihan_trucking_Shipper_id" for="x_Shipper_id" class="<?php echo $t101_tagihan_trucking_edit->LeftColumnClass ?>"><?php echo $t101_tagihan_trucking->Shipper_id->caption() ?><?php echo ($t101_tagihan_trucking->Shipper_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_tagihan_trucking_edit->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Shipper_id->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Shipper_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_tagihan_trucking" data-field="x_Shipper_id" data-value-separator="<?php echo $t101_tagihan_trucking->Shipper_id->displayValueSeparatorAttribute() ?>" id="x_Shipper_id" name="x_Shipper_id"<?php echo $t101_tagihan_trucking->Shipper_id->editAttributes() ?>>
		<?php echo $t101_tagihan_trucking->Shipper_id->selectOptionListHtml("x_Shipper_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Shipper_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_tagihan_trucking->Shipper_id->caption() ?>" data-title="<?php echo $t101_tagihan_trucking->Shipper_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Shipper_id',url:'t001_shipperaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_tagihan_trucking->Shipper_id->Lookup->getParamTag("p_x_Shipper_id") ?>
</span>
<?php echo $t101_tagihan_trucking->Shipper_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->Dari_Lokasi->Visible) { // Dari_Lokasi ?>
	<div id="r_Dari_Lokasi" class="form-group row">
		<label id="elh_t101_tagihan_trucking_Dari_Lokasi" for="x_Dari_Lokasi" class="<?php echo $t101_tagihan_trucking_edit->LeftColumnClass ?>"><?php echo $t101_tagihan_trucking->Dari_Lokasi->caption() ?><?php echo ($t101_tagihan_trucking->Dari_Lokasi->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_tagihan_trucking_edit->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Dari_Lokasi->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Dari_Lokasi">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Dari_Lokasi" name="x_Dari_Lokasi" id="x_Dari_Lokasi" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Dari_Lokasi->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Dari_Lokasi->EditValue ?>"<?php echo $t101_tagihan_trucking->Dari_Lokasi->editAttributes() ?>>
</span>
<?php echo $t101_tagihan_trucking->Dari_Lokasi->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->Ke_Lokasi->Visible) { // Ke_Lokasi ?>
	<div id="r_Ke_Lokasi" class="form-group row">
		<label id="elh_t101_tagihan_trucking_Ke_Lokasi" for="x_Ke_Lokasi" class="<?php echo $t101_tagihan_trucking_edit->LeftColumnClass ?>"><?php echo $t101_tagihan_trucking->Ke_Lokasi->caption() ?><?php echo ($t101_tagihan_trucking->Ke_Lokasi->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_tagihan_trucking_edit->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Ke_Lokasi->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Ke_Lokasi">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Ke_Lokasi" name="x_Ke_Lokasi" id="x_Ke_Lokasi" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Ke_Lokasi->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Ke_Lokasi->EditValue ?>"<?php echo $t101_tagihan_trucking->Ke_Lokasi->editAttributes() ?>>
</span>
<?php echo $t101_tagihan_trucking->Ke_Lokasi->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->Jenis_Container->Visible) { // Jenis_Container ?>
	<div id="r_Jenis_Container" class="form-group row">
		<label id="elh_t101_tagihan_trucking_Jenis_Container" class="<?php echo $t101_tagihan_trucking_edit->LeftColumnClass ?>"><?php echo $t101_tagihan_trucking->Jenis_Container->caption() ?><?php echo ($t101_tagihan_trucking->Jenis_Container->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_tagihan_trucking_edit->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Jenis_Container->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Jenis_Container">
<div id="tp_x_Jenis_Container" class="ew-template"><input type="radio" class="form-check-input" data-table="t101_tagihan_trucking" data-field="x_Jenis_Container" data-value-separator="<?php echo $t101_tagihan_trucking->Jenis_Container->displayValueSeparatorAttribute() ?>" name="x_Jenis_Container" id="x_Jenis_Container" value="{value}"<?php echo $t101_tagihan_trucking->Jenis_Container->editAttributes() ?>></div>
<div id="dsl_x_Jenis_Container" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t101_tagihan_trucking->Jenis_Container->radioButtonListHtml(FALSE, "x_Jenis_Container") ?>
</div></div>
</span>
<?php echo $t101_tagihan_trucking->Jenis_Container->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
	<div id="r_Nomor_Container_1" class="form-group row">
		<label id="elh_t101_tagihan_trucking_Nomor_Container_1" for="x_Nomor_Container_1" class="<?php echo $t101_tagihan_trucking_edit->LeftColumnClass ?>"><?php echo $t101_tagihan_trucking->Nomor_Container_1->caption() ?><?php echo ($t101_tagihan_trucking->Nomor_Container_1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_tagihan_trucking_edit->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Nomor_Container_1->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Nomor_Container_1">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Container_1" name="x_Nomor_Container_1" id="x_Nomor_Container_1" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Container_1->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Container_1->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Container_1->editAttributes() ?>>
</span>
<?php echo $t101_tagihan_trucking->Nomor_Container_1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
	<div id="r_Nomor_Container_2" class="form-group row">
		<label id="elh_t101_tagihan_trucking_Nomor_Container_2" for="x_Nomor_Container_2" class="<?php echo $t101_tagihan_trucking_edit->LeftColumnClass ?>"><?php echo $t101_tagihan_trucking->Nomor_Container_2->caption() ?><?php echo ($t101_tagihan_trucking->Nomor_Container_2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_tagihan_trucking_edit->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Nomor_Container_2->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Nomor_Container_2">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Container_2" name="x_Nomor_Container_2" id="x_Nomor_Container_2" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Container_2->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Container_2->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Container_2->editAttributes() ?>>
</span>
<?php echo $t101_tagihan_trucking->Nomor_Container_2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->Keterangan->Visible) { // Keterangan ?>
	<div id="r_Keterangan" class="form-group row">
		<label id="elh_t101_tagihan_trucking_Keterangan" for="x_Keterangan" class="<?php echo $t101_tagihan_trucking_edit->LeftColumnClass ?>"><?php echo $t101_tagihan_trucking->Keterangan->caption() ?><?php echo ($t101_tagihan_trucking->Keterangan->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_tagihan_trucking_edit->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Keterangan->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Keterangan">
<textarea data-table="t101_tagihan_trucking" data-field="x_Keterangan" name="x_Keterangan" id="x_Keterangan" cols="35" rows="4" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Keterangan->getPlaceHolder()) ?>"<?php echo $t101_tagihan_trucking->Keterangan->editAttributes() ?>><?php echo $t101_tagihan_trucking->Keterangan->EditValue ?></textarea>
</span>
<?php echo $t101_tagihan_trucking->Keterangan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->Tagihan->Visible) { // Tagihan ?>
	<div id="r_Tagihan" class="form-group row">
		<label id="elh_t101_tagihan_trucking_Tagihan" for="x_Tagihan" class="<?php echo $t101_tagihan_trucking_edit->LeftColumnClass ?>"><?php echo $t101_tagihan_trucking->Tagihan->caption() ?><?php echo ($t101_tagihan_trucking->Tagihan->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_tagihan_trucking_edit->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Tagihan->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Tagihan">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Tagihan" name="x_Tagihan" id="x_Tagihan" size="30" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Tagihan->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Tagihan->EditValue ?>"<?php echo $t101_tagihan_trucking->Tagihan->editAttributes() ?>>
</span>
<?php echo $t101_tagihan_trucking->Tagihan->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t101_tagihan_trucking->id->CurrentValue) ?>">
<?php if (!$t101_tagihan_trucking_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t101_tagihan_trucking_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_tagihan_trucking_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t101_tagihan_trucking_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t101_tagihan_trucking_edit->terminate();
?>