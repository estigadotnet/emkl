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
$t101_tagihan_trucking_search = new t101_tagihan_trucking_search();

// Run the page
$t101_tagihan_trucking_search->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_tagihan_trucking_search->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($t101_tagihan_trucking_search->IsModal) { ?>
var ft101_tagihan_truckingsearch = currentAdvancedSearchForm = new ew.Form("ft101_tagihan_truckingsearch", "search");
<?php } else { ?>
var ft101_tagihan_truckingsearch = currentForm = new ew.Form("ft101_tagihan_truckingsearch", "search");
<?php } ?>

// Form_CustomValidate event
ft101_tagihan_truckingsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft101_tagihan_truckingsearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft101_tagihan_truckingsearch.lists["x_JO_id"] = <?php echo $t101_tagihan_trucking_search->JO_id->Lookup->toClientList() ?>;
ft101_tagihan_truckingsearch.lists["x_JO_id"].options = <?php echo JsonEncode($t101_tagihan_trucking_search->JO_id->lookupOptions()) ?>;
ft101_tagihan_truckingsearch.lists["x_Shipper_id"] = <?php echo $t101_tagihan_trucking_search->Shipper_id->Lookup->toClientList() ?>;
ft101_tagihan_truckingsearch.lists["x_Shipper_id"].options = <?php echo JsonEncode($t101_tagihan_trucking_search->Shipper_id->lookupOptions()) ?>;
ft101_tagihan_truckingsearch.lists["x_Jenis_Container"] = <?php echo $t101_tagihan_trucking_search->Jenis_Container->Lookup->toClientList() ?>;
ft101_tagihan_truckingsearch.lists["x_Jenis_Container"].options = <?php echo JsonEncode($t101_tagihan_trucking_search->Jenis_Container->options(FALSE, TRUE)) ?>;

// Form object for search
// Validate function for search

ft101_tagihan_truckingsearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($t101_tagihan_trucking->id->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Tanggal");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($t101_tagihan_trucking->Tanggal->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Tagihan");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($t101_tagihan_trucking->Tagihan->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t101_tagihan_trucking_search->showPageHeader(); ?>
<?php
$t101_tagihan_trucking_search->showMessage();
?>
<form name="ft101_tagihan_truckingsearch" id="ft101_tagihan_truckingsearch" class="<?php echo $t101_tagihan_trucking_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t101_tagihan_trucking_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t101_tagihan_trucking_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_tagihan_trucking">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$t101_tagihan_trucking_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($t101_tagihan_trucking->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $t101_tagihan_trucking_search->LeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_id"><?php echo $t101_tagihan_trucking->id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_id" id="z_id" value="="></span>
		</label>
		<div class="<?php echo $t101_tagihan_trucking_search->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->id->cellAttributes() ?>>
			<span id="el_t101_tagihan_trucking_id">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->id->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->id->EditValue ?>"<?php echo $t101_tagihan_trucking->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->JO_id->Visible) { // JO_id ?>
	<div id="r_JO_id" class="form-group row">
		<label for="x_JO_id" class="<?php echo $t101_tagihan_trucking_search->LeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_JO_id"><?php echo $t101_tagihan_trucking->JO_id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_JO_id" id="z_JO_id" value="="></span>
		</label>
		<div class="<?php echo $t101_tagihan_trucking_search->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->JO_id->cellAttributes() ?>>
			<span id="el_t101_tagihan_trucking_JO_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_tagihan_trucking" data-field="x_JO_id" data-value-separator="<?php echo $t101_tagihan_trucking->JO_id->displayValueSeparatorAttribute() ?>" id="x_JO_id" name="x_JO_id"<?php echo $t101_tagihan_trucking->JO_id->editAttributes() ?>>
		<?php echo $t101_tagihan_trucking->JO_id->selectOptionListHtml("x_JO_id") ?>
	</select>
</div>
<?php echo $t101_tagihan_trucking->JO_id->Lookup->getParamTag("p_x_JO_id") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Polisi_1->Visible) { // Nomor_Polisi_1 ?>
	<div id="r_Nomor_Polisi_1" class="form-group row">
		<label for="x_Nomor_Polisi_1" class="<?php echo $t101_tagihan_trucking_search->LeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Nomor_Polisi_1"><?php echo $t101_tagihan_trucking->Nomor_Polisi_1->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Nomor_Polisi_1" id="z_Nomor_Polisi_1" value="LIKE"></span>
		</label>
		<div class="<?php echo $t101_tagihan_trucking_search->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->cellAttributes() ?>>
			<span id="el_t101_tagihan_trucking_Nomor_Polisi_1">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_1" name="x_Nomor_Polisi_1" id="x_Nomor_Polisi_1" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_1->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Polisi_2->Visible) { // Nomor_Polisi_2 ?>
	<div id="r_Nomor_Polisi_2" class="form-group row">
		<label for="x_Nomor_Polisi_2" class="<?php echo $t101_tagihan_trucking_search->LeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Nomor_Polisi_2"><?php echo $t101_tagihan_trucking->Nomor_Polisi_2->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Nomor_Polisi_2" id="z_Nomor_Polisi_2" value="LIKE"></span>
		</label>
		<div class="<?php echo $t101_tagihan_trucking_search->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->cellAttributes() ?>>
			<span id="el_t101_tagihan_trucking_Nomor_Polisi_2">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_2" name="x_Nomor_Polisi_2" id="x_Nomor_Polisi_2" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_2->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Polisi_3->Visible) { // Nomor_Polisi_3 ?>
	<div id="r_Nomor_Polisi_3" class="form-group row">
		<label for="x_Nomor_Polisi_3" class="<?php echo $t101_tagihan_trucking_search->LeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Nomor_Polisi_3"><?php echo $t101_tagihan_trucking->Nomor_Polisi_3->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Nomor_Polisi_3" id="z_Nomor_Polisi_3" value="LIKE"></span>
		</label>
		<div class="<?php echo $t101_tagihan_trucking_search->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->cellAttributes() ?>>
			<span id="el_t101_tagihan_trucking_Nomor_Polisi_3">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_3" name="x_Nomor_Polisi_3" id="x_Nomor_Polisi_3" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_3->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->Tanggal->Visible) { // Tanggal ?>
	<div id="r_Tanggal" class="form-group row">
		<label for="x_Tanggal" class="<?php echo $t101_tagihan_trucking_search->LeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Tanggal"><?php echo $t101_tagihan_trucking->Tanggal->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Tanggal" id="z_Tanggal" value="="></span>
		</label>
		<div class="<?php echo $t101_tagihan_trucking_search->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Tanggal->cellAttributes() ?>>
			<span id="el_t101_tagihan_trucking_Tanggal">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Tanggal" data-format="7" name="x_Tanggal" id="x_Tanggal" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Tanggal->EditValue ?>"<?php echo $t101_tagihan_trucking->Tanggal->editAttributes() ?>>
<?php if (!$t101_tagihan_trucking->Tanggal->ReadOnly && !$t101_tagihan_trucking->Tanggal->Disabled && !isset($t101_tagihan_trucking->Tanggal->EditAttrs["readonly"]) && !isset($t101_tagihan_trucking->Tanggal->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft101_tagihan_truckingsearch", "x_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->Shipper_id->Visible) { // Shipper_id ?>
	<div id="r_Shipper_id" class="form-group row">
		<label for="x_Shipper_id" class="<?php echo $t101_tagihan_trucking_search->LeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Shipper_id"><?php echo $t101_tagihan_trucking->Shipper_id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Shipper_id" id="z_Shipper_id" value="="></span>
		</label>
		<div class="<?php echo $t101_tagihan_trucking_search->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Shipper_id->cellAttributes() ?>>
			<span id="el_t101_tagihan_trucking_Shipper_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_tagihan_trucking" data-field="x_Shipper_id" data-value-separator="<?php echo $t101_tagihan_trucking->Shipper_id->displayValueSeparatorAttribute() ?>" id="x_Shipper_id" name="x_Shipper_id"<?php echo $t101_tagihan_trucking->Shipper_id->editAttributes() ?>>
		<?php echo $t101_tagihan_trucking->Shipper_id->selectOptionListHtml("x_Shipper_id") ?>
	</select>
</div>
<?php echo $t101_tagihan_trucking->Shipper_id->Lookup->getParamTag("p_x_Shipper_id") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->Dari_Lokasi->Visible) { // Dari_Lokasi ?>
	<div id="r_Dari_Lokasi" class="form-group row">
		<label for="x_Dari_Lokasi" class="<?php echo $t101_tagihan_trucking_search->LeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Dari_Lokasi"><?php echo $t101_tagihan_trucking->Dari_Lokasi->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Dari_Lokasi" id="z_Dari_Lokasi" value="LIKE"></span>
		</label>
		<div class="<?php echo $t101_tagihan_trucking_search->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Dari_Lokasi->cellAttributes() ?>>
			<span id="el_t101_tagihan_trucking_Dari_Lokasi">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Dari_Lokasi" name="x_Dari_Lokasi" id="x_Dari_Lokasi" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Dari_Lokasi->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Dari_Lokasi->EditValue ?>"<?php echo $t101_tagihan_trucking->Dari_Lokasi->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->Ke_Lokasi->Visible) { // Ke_Lokasi ?>
	<div id="r_Ke_Lokasi" class="form-group row">
		<label for="x_Ke_Lokasi" class="<?php echo $t101_tagihan_trucking_search->LeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Ke_Lokasi"><?php echo $t101_tagihan_trucking->Ke_Lokasi->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Ke_Lokasi" id="z_Ke_Lokasi" value="LIKE"></span>
		</label>
		<div class="<?php echo $t101_tagihan_trucking_search->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Ke_Lokasi->cellAttributes() ?>>
			<span id="el_t101_tagihan_trucking_Ke_Lokasi">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Ke_Lokasi" name="x_Ke_Lokasi" id="x_Ke_Lokasi" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Ke_Lokasi->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Ke_Lokasi->EditValue ?>"<?php echo $t101_tagihan_trucking->Ke_Lokasi->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->Jenis_Container->Visible) { // Jenis_Container ?>
	<div id="r_Jenis_Container" class="form-group row">
		<label class="<?php echo $t101_tagihan_trucking_search->LeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Jenis_Container"><?php echo $t101_tagihan_trucking->Jenis_Container->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Jenis_Container" id="z_Jenis_Container" value="="></span>
		</label>
		<div class="<?php echo $t101_tagihan_trucking_search->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Jenis_Container->cellAttributes() ?>>
			<span id="el_t101_tagihan_trucking_Jenis_Container">
<div id="tp_x_Jenis_Container" class="ew-template"><input type="radio" class="form-check-input" data-table="t101_tagihan_trucking" data-field="x_Jenis_Container" data-value-separator="<?php echo $t101_tagihan_trucking->Jenis_Container->displayValueSeparatorAttribute() ?>" name="x_Jenis_Container" id="x_Jenis_Container" value="{value}"<?php echo $t101_tagihan_trucking->Jenis_Container->editAttributes() ?>></div>
<div id="dsl_x_Jenis_Container" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t101_tagihan_trucking->Jenis_Container->radioButtonListHtml(FALSE, "x_Jenis_Container") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
	<div id="r_Nomor_Container_1" class="form-group row">
		<label for="x_Nomor_Container_1" class="<?php echo $t101_tagihan_trucking_search->LeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Nomor_Container_1"><?php echo $t101_tagihan_trucking->Nomor_Container_1->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Nomor_Container_1" id="z_Nomor_Container_1" value="LIKE"></span>
		</label>
		<div class="<?php echo $t101_tagihan_trucking_search->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Nomor_Container_1->cellAttributes() ?>>
			<span id="el_t101_tagihan_trucking_Nomor_Container_1">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Container_1" name="x_Nomor_Container_1" id="x_Nomor_Container_1" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Container_1->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Container_1->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Container_1->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
	<div id="r_Nomor_Container_2" class="form-group row">
		<label for="x_Nomor_Container_2" class="<?php echo $t101_tagihan_trucking_search->LeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Nomor_Container_2"><?php echo $t101_tagihan_trucking->Nomor_Container_2->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Nomor_Container_2" id="z_Nomor_Container_2" value="LIKE"></span>
		</label>
		<div class="<?php echo $t101_tagihan_trucking_search->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Nomor_Container_2->cellAttributes() ?>>
			<span id="el_t101_tagihan_trucking_Nomor_Container_2">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Container_2" name="x_Nomor_Container_2" id="x_Nomor_Container_2" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Container_2->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Container_2->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Container_2->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->Keterangan->Visible) { // Keterangan ?>
	<div id="r_Keterangan" class="form-group row">
		<label for="x_Keterangan" class="<?php echo $t101_tagihan_trucking_search->LeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Keterangan"><?php echo $t101_tagihan_trucking->Keterangan->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Keterangan" id="z_Keterangan" value="LIKE"></span>
		</label>
		<div class="<?php echo $t101_tagihan_trucking_search->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Keterangan->cellAttributes() ?>>
			<span id="el_t101_tagihan_trucking_Keterangan">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Keterangan" name="x_Keterangan" id="x_Keterangan" size="35" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Keterangan->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Keterangan->EditValue ?>"<?php echo $t101_tagihan_trucking->Keterangan->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_tagihan_trucking->Tagihan->Visible) { // Tagihan ?>
	<div id="r_Tagihan" class="form-group row">
		<label for="x_Tagihan" class="<?php echo $t101_tagihan_trucking_search->LeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Tagihan"><?php echo $t101_tagihan_trucking->Tagihan->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Tagihan" id="z_Tagihan" value="="></span>
		</label>
		<div class="<?php echo $t101_tagihan_trucking_search->RightColumnClass ?>"><div<?php echo $t101_tagihan_trucking->Tagihan->cellAttributes() ?>>
			<span id="el_t101_tagihan_trucking_Tagihan">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Tagihan" name="x_Tagihan" id="x_Tagihan" size="30" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Tagihan->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Tagihan->EditValue ?>"<?php echo $t101_tagihan_trucking->Tagihan->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t101_tagihan_trucking_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t101_tagihan_trucking_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t101_tagihan_trucking_search->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t101_tagihan_trucking_search->terminate();
?>