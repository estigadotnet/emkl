<?php
namespace PHPMaker2019\emkl_prj;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($t101_jo_detail_grid))
	$t101_jo_detail_grid = new t101_jo_detail_grid();

// Run the page
$t101_jo_detail_grid->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_jo_detail_grid->Page_Render();
?>
<?php if (!$t101_jo_detail->isExport()) { ?>
<script>

// Form object
var ft101_jo_detailgrid = new ew.Form("ft101_jo_detailgrid", "grid");
ft101_jo_detailgrid.formKeyCountName = '<?php echo $t101_jo_detail_grid->FormKeyCountName ?>';

// Validate form
ft101_jo_detailgrid.validate = function() {
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
		var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
		if (checkrow) {
			addcnt++;
		<?php if ($t101_jo_detail_grid->TruckingVendor_id->Required) { ?>
			elm = this.getElements("x" + infix + "_TruckingVendor_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->TruckingVendor_id->caption(), $t101_jo_detail->TruckingVendor_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_grid->Driver_id->Required) { ?>
			elm = this.getElements("x" + infix + "_Driver_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Driver_id->caption(), $t101_jo_detail->Driver_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_grid->Tanggal_Stuffing->Required) { ?>
			elm = this.getElements("x" + infix + "_Tanggal_Stuffing");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Tanggal_Stuffing->caption(), $t101_jo_detail->Tanggal_Stuffing->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Tanggal_Stuffing");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t101_jo_detail->Tanggal_Stuffing->errorMessage()) ?>");
		<?php if ($t101_jo_detail_grid->Nomor_Polisi_1->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Polisi_1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Nomor_Polisi_1->caption(), $t101_jo_detail->Nomor_Polisi_1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_grid->Nomor_Polisi_2->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Polisi_2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Nomor_Polisi_2->caption(), $t101_jo_detail->Nomor_Polisi_2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_grid->Nomor_Polisi_3->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Polisi_3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Nomor_Polisi_3->caption(), $t101_jo_detail->Nomor_Polisi_3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_grid->Nomor_Container_1->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Container_1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Nomor_Container_1->caption(), $t101_jo_detail->Nomor_Container_1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_grid->Nomor_Container_2->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Container_2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Nomor_Container_2->caption(), $t101_jo_detail->Nomor_Container_2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_grid->Ref_JOHead_id->Required) { ?>
			elm = this.getElements("x" + infix + "_Ref_JOHead_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Ref_JOHead_id->caption(), $t101_jo_detail->Ref_JOHead_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_grid->No_Tagihan->Required) { ?>
			elm = this.getElements("x" + infix + "_No_Tagihan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->No_Tagihan->caption(), $t101_jo_detail->No_Tagihan->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_No_Tagihan");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t101_jo_detail->No_Tagihan->errorMessage()) ?>");
		<?php if ($t101_jo_detail_grid->Jumlah_Tagihan->Required) { ?>
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
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
ft101_jo_detailgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "TruckingVendor_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "Driver_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "Tanggal_Stuffing", false)) return false;
	if (ew.valueChanged(fobj, infix, "Nomor_Polisi_1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Nomor_Polisi_2", false)) return false;
	if (ew.valueChanged(fobj, infix, "Nomor_Polisi_3", false)) return false;
	if (ew.valueChanged(fobj, infix, "Nomor_Container_1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Nomor_Container_2", false)) return false;
	if (ew.valueChanged(fobj, infix, "Ref_JOHead_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "No_Tagihan", false)) return false;
	if (ew.valueChanged(fobj, infix, "Jumlah_Tagihan", false)) return false;
	return true;
}

// Form_CustomValidate event
ft101_jo_detailgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft101_jo_detailgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft101_jo_detailgrid.lists["x_TruckingVendor_id"] = <?php echo $t101_jo_detail_grid->TruckingVendor_id->Lookup->toClientList() ?>;
ft101_jo_detailgrid.lists["x_TruckingVendor_id"].options = <?php echo JsonEncode($t101_jo_detail_grid->TruckingVendor_id->lookupOptions()) ?>;
ft101_jo_detailgrid.lists["x_Driver_id"] = <?php echo $t101_jo_detail_grid->Driver_id->Lookup->toClientList() ?>;
ft101_jo_detailgrid.lists["x_Driver_id"].options = <?php echo JsonEncode($t101_jo_detail_grid->Driver_id->lookupOptions()) ?>;
ft101_jo_detailgrid.lists["x_Ref_JOHead_id"] = <?php echo $t101_jo_detail_grid->Ref_JOHead_id->Lookup->toClientList() ?>;
ft101_jo_detailgrid.lists["x_Ref_JOHead_id"].options = <?php echo JsonEncode($t101_jo_detail_grid->Ref_JOHead_id->lookupOptions()) ?>;

// Form object for search
</script>
<?php } ?>
<?php
$t101_jo_detail_grid->renderOtherOptions();
?>
<?php $t101_jo_detail_grid->showPageHeader(); ?>
<?php
$t101_jo_detail_grid->showMessage();
?>
<?php if ($t101_jo_detail_grid->TotalRecs > 0 || $t101_jo_detail->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t101_jo_detail_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t101_jo_detail">
<div id="ft101_jo_detailgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_t101_jo_detail" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_t101_jo_detailgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t101_jo_detail_grid->RowType = ROWTYPE_HEADER;

// Render list options
$t101_jo_detail_grid->renderListOptions();

// Render list options (header, left)
$t101_jo_detail_grid->ListOptions->render("header", "left");
?>
<?php if ($t101_jo_detail->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
	<?php if ($t101_jo_detail->sortUrl($t101_jo_detail->TruckingVendor_id) == "") { ?>
		<th data-name="TruckingVendor_id" class="<?php echo $t101_jo_detail->TruckingVendor_id->headerCellClass() ?>"><div id="elh_t101_jo_detail_TruckingVendor_id" class="t101_jo_detail_TruckingVendor_id"><div class="ew-table-header-caption"><?php echo $t101_jo_detail->TruckingVendor_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TruckingVendor_id" class="<?php echo $t101_jo_detail->TruckingVendor_id->headerCellClass() ?>"><div><div id="elh_t101_jo_detail_TruckingVendor_id" class="t101_jo_detail_TruckingVendor_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_detail->TruckingVendor_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_detail->TruckingVendor_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_detail->TruckingVendor_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Driver_id->Visible) { // Driver_id ?>
	<?php if ($t101_jo_detail->sortUrl($t101_jo_detail->Driver_id) == "") { ?>
		<th data-name="Driver_id" class="<?php echo $t101_jo_detail->Driver_id->headerCellClass() ?>"><div id="elh_t101_jo_detail_Driver_id" class="t101_jo_detail_Driver_id"><div class="ew-table-header-caption"><?php echo $t101_jo_detail->Driver_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Driver_id" class="<?php echo $t101_jo_detail->Driver_id->headerCellClass() ?>"><div><div id="elh_t101_jo_detail_Driver_id" class="t101_jo_detail_Driver_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_detail->Driver_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_detail->Driver_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_detail->Driver_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Tanggal_Stuffing->Visible) { // Tanggal_Stuffing ?>
	<?php if ($t101_jo_detail->sortUrl($t101_jo_detail->Tanggal_Stuffing) == "") { ?>
		<th data-name="Tanggal_Stuffing" class="<?php echo $t101_jo_detail->Tanggal_Stuffing->headerCellClass() ?>"><div id="elh_t101_jo_detail_Tanggal_Stuffing" class="t101_jo_detail_Tanggal_Stuffing"><div class="ew-table-header-caption"><?php echo $t101_jo_detail->Tanggal_Stuffing->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tanggal_Stuffing" class="<?php echo $t101_jo_detail->Tanggal_Stuffing->headerCellClass() ?>"><div><div id="elh_t101_jo_detail_Tanggal_Stuffing" class="t101_jo_detail_Tanggal_Stuffing">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_detail->Tanggal_Stuffing->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_detail->Tanggal_Stuffing->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_detail->Tanggal_Stuffing->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_1->Visible) { // Nomor_Polisi_1 ?>
	<?php if ($t101_jo_detail->sortUrl($t101_jo_detail->Nomor_Polisi_1) == "") { ?>
		<th data-name="Nomor_Polisi_1" class="<?php echo $t101_jo_detail->Nomor_Polisi_1->headerCellClass() ?>"><div id="elh_t101_jo_detail_Nomor_Polisi_1" class="t101_jo_detail_Nomor_Polisi_1"><div class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Polisi_1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nomor_Polisi_1" class="<?php echo $t101_jo_detail->Nomor_Polisi_1->headerCellClass() ?>"><div><div id="elh_t101_jo_detail_Nomor_Polisi_1" class="t101_jo_detail_Nomor_Polisi_1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Polisi_1->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_detail->Nomor_Polisi_1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_detail->Nomor_Polisi_1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_2->Visible) { // Nomor_Polisi_2 ?>
	<?php if ($t101_jo_detail->sortUrl($t101_jo_detail->Nomor_Polisi_2) == "") { ?>
		<th data-name="Nomor_Polisi_2" class="<?php echo $t101_jo_detail->Nomor_Polisi_2->headerCellClass() ?>"><div id="elh_t101_jo_detail_Nomor_Polisi_2" class="t101_jo_detail_Nomor_Polisi_2"><div class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Polisi_2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nomor_Polisi_2" class="<?php echo $t101_jo_detail->Nomor_Polisi_2->headerCellClass() ?>"><div><div id="elh_t101_jo_detail_Nomor_Polisi_2" class="t101_jo_detail_Nomor_Polisi_2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Polisi_2->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_detail->Nomor_Polisi_2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_detail->Nomor_Polisi_2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_3->Visible) { // Nomor_Polisi_3 ?>
	<?php if ($t101_jo_detail->sortUrl($t101_jo_detail->Nomor_Polisi_3) == "") { ?>
		<th data-name="Nomor_Polisi_3" class="<?php echo $t101_jo_detail->Nomor_Polisi_3->headerCellClass() ?>"><div id="elh_t101_jo_detail_Nomor_Polisi_3" class="t101_jo_detail_Nomor_Polisi_3"><div class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Polisi_3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nomor_Polisi_3" class="<?php echo $t101_jo_detail->Nomor_Polisi_3->headerCellClass() ?>"><div><div id="elh_t101_jo_detail_Nomor_Polisi_3" class="t101_jo_detail_Nomor_Polisi_3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Polisi_3->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_detail->Nomor_Polisi_3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_detail->Nomor_Polisi_3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
	<?php if ($t101_jo_detail->sortUrl($t101_jo_detail->Nomor_Container_1) == "") { ?>
		<th data-name="Nomor_Container_1" class="<?php echo $t101_jo_detail->Nomor_Container_1->headerCellClass() ?>"><div id="elh_t101_jo_detail_Nomor_Container_1" class="t101_jo_detail_Nomor_Container_1"><div class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Container_1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nomor_Container_1" class="<?php echo $t101_jo_detail->Nomor_Container_1->headerCellClass() ?>"><div><div id="elh_t101_jo_detail_Nomor_Container_1" class="t101_jo_detail_Nomor_Container_1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Container_1->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_detail->Nomor_Container_1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_detail->Nomor_Container_1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
	<?php if ($t101_jo_detail->sortUrl($t101_jo_detail->Nomor_Container_2) == "") { ?>
		<th data-name="Nomor_Container_2" class="<?php echo $t101_jo_detail->Nomor_Container_2->headerCellClass() ?>"><div id="elh_t101_jo_detail_Nomor_Container_2" class="t101_jo_detail_Nomor_Container_2"><div class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Container_2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nomor_Container_2" class="<?php echo $t101_jo_detail->Nomor_Container_2->headerCellClass() ?>"><div><div id="elh_t101_jo_detail_Nomor_Container_2" class="t101_jo_detail_Nomor_Container_2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Container_2->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_detail->Nomor_Container_2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_detail->Nomor_Container_2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Ref_JOHead_id->Visible) { // Ref_JOHead_id ?>
	<?php if ($t101_jo_detail->sortUrl($t101_jo_detail->Ref_JOHead_id) == "") { ?>
		<th data-name="Ref_JOHead_id" class="<?php echo $t101_jo_detail->Ref_JOHead_id->headerCellClass() ?>"><div id="elh_t101_jo_detail_Ref_JOHead_id" class="t101_jo_detail_Ref_JOHead_id"><div class="ew-table-header-caption"><?php echo $t101_jo_detail->Ref_JOHead_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Ref_JOHead_id" class="<?php echo $t101_jo_detail->Ref_JOHead_id->headerCellClass() ?>"><div><div id="elh_t101_jo_detail_Ref_JOHead_id" class="t101_jo_detail_Ref_JOHead_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_detail->Ref_JOHead_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_detail->Ref_JOHead_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_detail->Ref_JOHead_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->No_Tagihan->Visible) { // No_Tagihan ?>
	<?php if ($t101_jo_detail->sortUrl($t101_jo_detail->No_Tagihan) == "") { ?>
		<th data-name="No_Tagihan" class="<?php echo $t101_jo_detail->No_Tagihan->headerCellClass() ?>"><div id="elh_t101_jo_detail_No_Tagihan" class="t101_jo_detail_No_Tagihan"><div class="ew-table-header-caption"><?php echo $t101_jo_detail->No_Tagihan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="No_Tagihan" class="<?php echo $t101_jo_detail->No_Tagihan->headerCellClass() ?>"><div><div id="elh_t101_jo_detail_No_Tagihan" class="t101_jo_detail_No_Tagihan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_detail->No_Tagihan->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_detail->No_Tagihan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_detail->No_Tagihan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Jumlah_Tagihan->Visible) { // Jumlah_Tagihan ?>
	<?php if ($t101_jo_detail->sortUrl($t101_jo_detail->Jumlah_Tagihan) == "") { ?>
		<th data-name="Jumlah_Tagihan" class="<?php echo $t101_jo_detail->Jumlah_Tagihan->headerCellClass() ?>"><div id="elh_t101_jo_detail_Jumlah_Tagihan" class="t101_jo_detail_Jumlah_Tagihan"><div class="ew-table-header-caption"><?php echo $t101_jo_detail->Jumlah_Tagihan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jumlah_Tagihan" class="<?php echo $t101_jo_detail->Jumlah_Tagihan->headerCellClass() ?>"><div><div id="elh_t101_jo_detail_Jumlah_Tagihan" class="t101_jo_detail_Jumlah_Tagihan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_detail->Jumlah_Tagihan->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_detail->Jumlah_Tagihan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_detail->Jumlah_Tagihan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t101_jo_detail_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$t101_jo_detail_grid->StartRec = 1;
$t101_jo_detail_grid->StopRec = $t101_jo_detail_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $t101_jo_detail_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t101_jo_detail_grid->FormKeyCountName) && ($t101_jo_detail->isGridAdd() || $t101_jo_detail->isGridEdit() || $t101_jo_detail->isConfirm())) {
		$t101_jo_detail_grid->KeyCount = $CurrentForm->getValue($t101_jo_detail_grid->FormKeyCountName);
		$t101_jo_detail_grid->StopRec = $t101_jo_detail_grid->StartRec + $t101_jo_detail_grid->KeyCount - 1;
	}
}
$t101_jo_detail_grid->RecCnt = $t101_jo_detail_grid->StartRec - 1;
if ($t101_jo_detail_grid->Recordset && !$t101_jo_detail_grid->Recordset->EOF) {
	$t101_jo_detail_grid->Recordset->moveFirst();
	$selectLimit = $t101_jo_detail_grid->UseSelectLimit;
	if (!$selectLimit && $t101_jo_detail_grid->StartRec > 1)
		$t101_jo_detail_grid->Recordset->move($t101_jo_detail_grid->StartRec - 1);
} elseif (!$t101_jo_detail->AllowAddDeleteRow && $t101_jo_detail_grid->StopRec == 0) {
	$t101_jo_detail_grid->StopRec = $t101_jo_detail->GridAddRowCount;
}

// Initialize aggregate
$t101_jo_detail->RowType = ROWTYPE_AGGREGATEINIT;
$t101_jo_detail->resetAttributes();
$t101_jo_detail_grid->renderRow();
if ($t101_jo_detail->isGridAdd())
	$t101_jo_detail_grid->RowIndex = 0;
if ($t101_jo_detail->isGridEdit())
	$t101_jo_detail_grid->RowIndex = 0;
while ($t101_jo_detail_grid->RecCnt < $t101_jo_detail_grid->StopRec) {
	$t101_jo_detail_grid->RecCnt++;
	if ($t101_jo_detail_grid->RecCnt >= $t101_jo_detail_grid->StartRec) {
		$t101_jo_detail_grid->RowCnt++;
		if ($t101_jo_detail->isGridAdd() || $t101_jo_detail->isGridEdit() || $t101_jo_detail->isConfirm()) {
			$t101_jo_detail_grid->RowIndex++;
			$CurrentForm->Index = $t101_jo_detail_grid->RowIndex;
			if ($CurrentForm->hasValue($t101_jo_detail_grid->FormActionName) && $t101_jo_detail_grid->EventCancelled)
				$t101_jo_detail_grid->RowAction = strval($CurrentForm->getValue($t101_jo_detail_grid->FormActionName));
			elseif ($t101_jo_detail->isGridAdd())
				$t101_jo_detail_grid->RowAction = "insert";
			else
				$t101_jo_detail_grid->RowAction = "";
		}

		// Set up key count
		$t101_jo_detail_grid->KeyCount = $t101_jo_detail_grid->RowIndex;

		// Init row class and style
		$t101_jo_detail->resetAttributes();
		$t101_jo_detail->CssClass = "";
		if ($t101_jo_detail->isGridAdd()) {
			if ($t101_jo_detail->CurrentMode == "copy") {
				$t101_jo_detail_grid->loadRowValues($t101_jo_detail_grid->Recordset); // Load row values
				$t101_jo_detail_grid->setRecordKey($t101_jo_detail_grid->RowOldKey, $t101_jo_detail_grid->Recordset); // Set old record key
			} else {
				$t101_jo_detail_grid->loadRowValues(); // Load default values
				$t101_jo_detail_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$t101_jo_detail_grid->loadRowValues($t101_jo_detail_grid->Recordset); // Load row values
		}
		$t101_jo_detail->RowType = ROWTYPE_VIEW; // Render view
		if ($t101_jo_detail->isGridAdd()) // Grid add
			$t101_jo_detail->RowType = ROWTYPE_ADD; // Render add
		if ($t101_jo_detail->isGridAdd() && $t101_jo_detail->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t101_jo_detail_grid->restoreCurrentRowFormValues($t101_jo_detail_grid->RowIndex); // Restore form values
		if ($t101_jo_detail->isGridEdit()) { // Grid edit
			if ($t101_jo_detail->EventCancelled)
				$t101_jo_detail_grid->restoreCurrentRowFormValues($t101_jo_detail_grid->RowIndex); // Restore form values
			if ($t101_jo_detail_grid->RowAction == "insert")
				$t101_jo_detail->RowType = ROWTYPE_ADD; // Render add
			else
				$t101_jo_detail->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t101_jo_detail->isGridEdit() && ($t101_jo_detail->RowType == ROWTYPE_EDIT || $t101_jo_detail->RowType == ROWTYPE_ADD) && $t101_jo_detail->EventCancelled) // Update failed
			$t101_jo_detail_grid->restoreCurrentRowFormValues($t101_jo_detail_grid->RowIndex); // Restore form values
		if ($t101_jo_detail->RowType == ROWTYPE_EDIT) // Edit row
			$t101_jo_detail_grid->EditRowCnt++;
		if ($t101_jo_detail->isConfirm()) // Confirm row
			$t101_jo_detail_grid->restoreCurrentRowFormValues($t101_jo_detail_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$t101_jo_detail->RowAttrs = array_merge($t101_jo_detail->RowAttrs, array('data-rowindex'=>$t101_jo_detail_grid->RowCnt, 'id'=>'r' . $t101_jo_detail_grid->RowCnt . '_t101_jo_detail', 'data-rowtype'=>$t101_jo_detail->RowType));

		// Render row
		$t101_jo_detail_grid->renderRow();

		// Render list options
		$t101_jo_detail_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t101_jo_detail_grid->RowAction <> "delete" && $t101_jo_detail_grid->RowAction <> "insertdelete" && !($t101_jo_detail_grid->RowAction == "insert" && $t101_jo_detail->isConfirm() && $t101_jo_detail_grid->emptyRow())) {
?>
	<tr<?php echo $t101_jo_detail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t101_jo_detail_grid->ListOptions->render("body", "left", $t101_jo_detail_grid->RowCnt);
?>
	<?php if ($t101_jo_detail->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
		<td data-name="TruckingVendor_id"<?php echo $t101_jo_detail->TruckingVendor_id->cellAttributes() ?>>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_TruckingVendor_id" class="form-group t101_jo_detail_TruckingVendor_id">
<?php $t101_jo_detail->TruckingVendor_id->EditAttrs["onchange"] = "ew.updateOptions.call(this);" . @$t101_jo_detail->TruckingVendor_id->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_detail" data-field="x_TruckingVendor_id" data-value-separator="<?php echo $t101_jo_detail->TruckingVendor_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_TruckingVendor_id" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_TruckingVendor_id"<?php echo $t101_jo_detail->TruckingVendor_id->editAttributes() ?>>
		<?php echo $t101_jo_detail->TruckingVendor_id->selectOptionListHtml("x<?php echo $t101_jo_detail_grid->RowIndex ?>_TruckingVendor_id") ?>
	</select>
</div>
<?php echo $t101_jo_detail->TruckingVendor_id->Lookup->getParamTag("p_x" . $t101_jo_detail_grid->RowIndex . "_TruckingVendor_id") ?>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_TruckingVendor_id" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_TruckingVendor_id" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_TruckingVendor_id" value="<?php echo HtmlEncode($t101_jo_detail->TruckingVendor_id->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_TruckingVendor_id" class="form-group t101_jo_detail_TruckingVendor_id">
<?php $t101_jo_detail->TruckingVendor_id->EditAttrs["onchange"] = "ew.updateOptions.call(this);" . @$t101_jo_detail->TruckingVendor_id->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_detail" data-field="x_TruckingVendor_id" data-value-separator="<?php echo $t101_jo_detail->TruckingVendor_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_TruckingVendor_id" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_TruckingVendor_id"<?php echo $t101_jo_detail->TruckingVendor_id->editAttributes() ?>>
		<?php echo $t101_jo_detail->TruckingVendor_id->selectOptionListHtml("x<?php echo $t101_jo_detail_grid->RowIndex ?>_TruckingVendor_id") ?>
	</select>
</div>
<?php echo $t101_jo_detail->TruckingVendor_id->Lookup->getParamTag("p_x" . $t101_jo_detail_grid->RowIndex . "_TruckingVendor_id") ?>
</span>
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_TruckingVendor_id" class="t101_jo_detail_TruckingVendor_id">
<span<?php echo $t101_jo_detail->TruckingVendor_id->viewAttributes() ?>>
<?php echo $t101_jo_detail->TruckingVendor_id->getViewValue() ?></span>
</span>
<?php if (!$t101_jo_detail->isConfirm()) { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_TruckingVendor_id" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_TruckingVendor_id" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_TruckingVendor_id" value="<?php echo HtmlEncode($t101_jo_detail->TruckingVendor_id->FormValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_TruckingVendor_id" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_TruckingVendor_id" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_TruckingVendor_id" value="<?php echo HtmlEncode($t101_jo_detail->TruckingVendor_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_TruckingVendor_id" name="ft101_jo_detailgrid$x<?php echo $t101_jo_detail_grid->RowIndex ?>_TruckingVendor_id" id="ft101_jo_detailgrid$x<?php echo $t101_jo_detail_grid->RowIndex ?>_TruckingVendor_id" value="<?php echo HtmlEncode($t101_jo_detail->TruckingVendor_id->FormValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_TruckingVendor_id" name="ft101_jo_detailgrid$o<?php echo $t101_jo_detail_grid->RowIndex ?>_TruckingVendor_id" id="ft101_jo_detailgrid$o<?php echo $t101_jo_detail_grid->RowIndex ?>_TruckingVendor_id" value="<?php echo HtmlEncode($t101_jo_detail->TruckingVendor_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_id" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_id" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t101_jo_detail->id->CurrentValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_id" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_id" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t101_jo_detail->id->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT || $t101_jo_detail->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_id" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_id" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t101_jo_detail->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t101_jo_detail->Driver_id->Visible) { // Driver_id ?>
		<td data-name="Driver_id"<?php echo $t101_jo_detail->Driver_id->cellAttributes() ?>>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Driver_id" class="form-group t101_jo_detail_Driver_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_detail" data-field="x_Driver_id" data-value-separator="<?php echo $t101_jo_detail->Driver_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id"<?php echo $t101_jo_detail->Driver_id->editAttributes() ?>>
		<?php echo $t101_jo_detail->Driver_id->selectOptionListHtml("x<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_jo_detail->Driver_id->caption() ?>" data-title="<?php echo $t101_jo_detail->Driver_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id',url:'t005_driveraddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_jo_detail->Driver_id->Lookup->getParamTag("p_x" . $t101_jo_detail_grid->RowIndex . "_Driver_id") ?>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Driver_id" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id" value="<?php echo HtmlEncode($t101_jo_detail->Driver_id->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Driver_id" class="form-group t101_jo_detail_Driver_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_detail" data-field="x_Driver_id" data-value-separator="<?php echo $t101_jo_detail->Driver_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id"<?php echo $t101_jo_detail->Driver_id->editAttributes() ?>>
		<?php echo $t101_jo_detail->Driver_id->selectOptionListHtml("x<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_jo_detail->Driver_id->caption() ?>" data-title="<?php echo $t101_jo_detail->Driver_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id',url:'t005_driveraddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_jo_detail->Driver_id->Lookup->getParamTag("p_x" . $t101_jo_detail_grid->RowIndex . "_Driver_id") ?>
</span>
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Driver_id" class="t101_jo_detail_Driver_id">
<span<?php echo $t101_jo_detail->Driver_id->viewAttributes() ?>>
<?php echo $t101_jo_detail->Driver_id->getViewValue() ?></span>
</span>
<?php if (!$t101_jo_detail->isConfirm()) { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Driver_id" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id" value="<?php echo HtmlEncode($t101_jo_detail->Driver_id->FormValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_Driver_id" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id" value="<?php echo HtmlEncode($t101_jo_detail->Driver_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Driver_id" name="ft101_jo_detailgrid$x<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id" id="ft101_jo_detailgrid$x<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id" value="<?php echo HtmlEncode($t101_jo_detail->Driver_id->FormValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_Driver_id" name="ft101_jo_detailgrid$o<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id" id="ft101_jo_detailgrid$o<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id" value="<?php echo HtmlEncode($t101_jo_detail->Driver_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Tanggal_Stuffing->Visible) { // Tanggal_Stuffing ?>
		<td data-name="Tanggal_Stuffing"<?php echo $t101_jo_detail->Tanggal_Stuffing->cellAttributes() ?>>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Tanggal_Stuffing" class="form-group t101_jo_detail_Tanggal_Stuffing">
<input type="text" data-table="t101_jo_detail" data-field="x_Tanggal_Stuffing" data-format="11" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Tanggal_Stuffing" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Tanggal_Stuffing" size="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Tanggal_Stuffing->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Tanggal_Stuffing->EditValue ?>"<?php echo $t101_jo_detail->Tanggal_Stuffing->editAttributes() ?>>
<?php if (!$t101_jo_detail->Tanggal_Stuffing->ReadOnly && !$t101_jo_detail->Tanggal_Stuffing->Disabled && !isset($t101_jo_detail->Tanggal_Stuffing->EditAttrs["readonly"]) && !isset($t101_jo_detail->Tanggal_Stuffing->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft101_jo_detailgrid", "x<?php echo $t101_jo_detail_grid->RowIndex ?>_Tanggal_Stuffing", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Tanggal_Stuffing" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Tanggal_Stuffing" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Tanggal_Stuffing" value="<?php echo HtmlEncode($t101_jo_detail->Tanggal_Stuffing->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Tanggal_Stuffing" class="form-group t101_jo_detail_Tanggal_Stuffing">
<input type="text" data-table="t101_jo_detail" data-field="x_Tanggal_Stuffing" data-format="11" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Tanggal_Stuffing" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Tanggal_Stuffing" size="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Tanggal_Stuffing->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Tanggal_Stuffing->EditValue ?>"<?php echo $t101_jo_detail->Tanggal_Stuffing->editAttributes() ?>>
<?php if (!$t101_jo_detail->Tanggal_Stuffing->ReadOnly && !$t101_jo_detail->Tanggal_Stuffing->Disabled && !isset($t101_jo_detail->Tanggal_Stuffing->EditAttrs["readonly"]) && !isset($t101_jo_detail->Tanggal_Stuffing->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft101_jo_detailgrid", "x<?php echo $t101_jo_detail_grid->RowIndex ?>_Tanggal_Stuffing", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Tanggal_Stuffing" class="t101_jo_detail_Tanggal_Stuffing">
<span<?php echo $t101_jo_detail->Tanggal_Stuffing->viewAttributes() ?>>
<?php echo $t101_jo_detail->Tanggal_Stuffing->getViewValue() ?></span>
</span>
<?php if (!$t101_jo_detail->isConfirm()) { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Tanggal_Stuffing" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Tanggal_Stuffing" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Tanggal_Stuffing" value="<?php echo HtmlEncode($t101_jo_detail->Tanggal_Stuffing->FormValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_Tanggal_Stuffing" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Tanggal_Stuffing" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Tanggal_Stuffing" value="<?php echo HtmlEncode($t101_jo_detail->Tanggal_Stuffing->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Tanggal_Stuffing" name="ft101_jo_detailgrid$x<?php echo $t101_jo_detail_grid->RowIndex ?>_Tanggal_Stuffing" id="ft101_jo_detailgrid$x<?php echo $t101_jo_detail_grid->RowIndex ?>_Tanggal_Stuffing" value="<?php echo HtmlEncode($t101_jo_detail->Tanggal_Stuffing->FormValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_Tanggal_Stuffing" name="ft101_jo_detailgrid$o<?php echo $t101_jo_detail_grid->RowIndex ?>_Tanggal_Stuffing" id="ft101_jo_detailgrid$o<?php echo $t101_jo_detail_grid->RowIndex ?>_Tanggal_Stuffing" value="<?php echo HtmlEncode($t101_jo_detail->Tanggal_Stuffing->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Polisi_1->Visible) { // Nomor_Polisi_1 ?>
		<td data-name="Nomor_Polisi_1"<?php echo $t101_jo_detail->Nomor_Polisi_1->cellAttributes() ?>>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Nomor_Polisi_1" class="form-group t101_jo_detail_Nomor_Polisi_1">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_1" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_1" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_1" size="1" maxlength="5" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_1->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_1->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_1->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_1" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_1" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_1" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_1->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Nomor_Polisi_1" class="form-group t101_jo_detail_Nomor_Polisi_1">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_1" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_1" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_1" size="1" maxlength="5" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_1->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_1->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Nomor_Polisi_1" class="t101_jo_detail_Nomor_Polisi_1">
<span<?php echo $t101_jo_detail->Nomor_Polisi_1->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Polisi_1->getViewValue() ?></span>
</span>
<?php if (!$t101_jo_detail->isConfirm()) { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_1" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_1" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_1" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_1->FormValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_1" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_1" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_1" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_1" name="ft101_jo_detailgrid$x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_1" id="ft101_jo_detailgrid$x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_1" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_1->FormValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_1" name="ft101_jo_detailgrid$o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_1" id="ft101_jo_detailgrid$o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_1" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Polisi_2->Visible) { // Nomor_Polisi_2 ?>
		<td data-name="Nomor_Polisi_2"<?php echo $t101_jo_detail->Nomor_Polisi_2->cellAttributes() ?>>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Nomor_Polisi_2" class="form-group t101_jo_detail_Nomor_Polisi_2">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_2" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_2" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_2" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_2->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_2->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_2->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_2" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_2" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_2" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_2->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Nomor_Polisi_2" class="form-group t101_jo_detail_Nomor_Polisi_2">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_2" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_2" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_2" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_2->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_2->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Nomor_Polisi_2" class="t101_jo_detail_Nomor_Polisi_2">
<span<?php echo $t101_jo_detail->Nomor_Polisi_2->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Polisi_2->getViewValue() ?></span>
</span>
<?php if (!$t101_jo_detail->isConfirm()) { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_2" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_2" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_2" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_2->FormValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_2" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_2" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_2" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_2" name="ft101_jo_detailgrid$x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_2" id="ft101_jo_detailgrid$x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_2" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_2->FormValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_2" name="ft101_jo_detailgrid$o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_2" id="ft101_jo_detailgrid$o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_2" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Polisi_3->Visible) { // Nomor_Polisi_3 ?>
		<td data-name="Nomor_Polisi_3"<?php echo $t101_jo_detail->Nomor_Polisi_3->cellAttributes() ?>>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Nomor_Polisi_3" class="form-group t101_jo_detail_Nomor_Polisi_3">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_3" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_3" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_3" size="5" maxlength="5" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_3->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_3->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_3->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_3" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_3" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_3" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_3->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Nomor_Polisi_3" class="form-group t101_jo_detail_Nomor_Polisi_3">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_3" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_3" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_3" size="5" maxlength="5" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_3->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_3->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_3->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Nomor_Polisi_3" class="t101_jo_detail_Nomor_Polisi_3">
<span<?php echo $t101_jo_detail->Nomor_Polisi_3->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Polisi_3->getViewValue() ?></span>
</span>
<?php if (!$t101_jo_detail->isConfirm()) { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_3" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_3" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_3" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_3->FormValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_3" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_3" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_3" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_3->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_3" name="ft101_jo_detailgrid$x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_3" id="ft101_jo_detailgrid$x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_3" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_3->FormValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_3" name="ft101_jo_detailgrid$o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_3" id="ft101_jo_detailgrid$o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_3" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
		<td data-name="Nomor_Container_1"<?php echo $t101_jo_detail->Nomor_Container_1->cellAttributes() ?>>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Nomor_Container_1" class="form-group t101_jo_detail_Nomor_Container_1">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Container_1" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_1" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_1" size="5" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_1->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Container_1->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Container_1->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Container_1" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_1" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_1" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_1->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Nomor_Container_1" class="form-group t101_jo_detail_Nomor_Container_1">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Container_1" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_1" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_1" size="5" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_1->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Container_1->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Container_1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Nomor_Container_1" class="t101_jo_detail_Nomor_Container_1">
<span<?php echo $t101_jo_detail->Nomor_Container_1->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Container_1->getViewValue() ?></span>
</span>
<?php if (!$t101_jo_detail->isConfirm()) { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Container_1" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_1" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_1" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_1->FormValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Container_1" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_1" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_1" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Container_1" name="ft101_jo_detailgrid$x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_1" id="ft101_jo_detailgrid$x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_1" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_1->FormValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Container_1" name="ft101_jo_detailgrid$o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_1" id="ft101_jo_detailgrid$o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_1" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
		<td data-name="Nomor_Container_2"<?php echo $t101_jo_detail->Nomor_Container_2->cellAttributes() ?>>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Nomor_Container_2" class="form-group t101_jo_detail_Nomor_Container_2">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Container_2" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_2" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_2" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_2->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Container_2->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Container_2->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Container_2" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_2" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_2" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_2->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Nomor_Container_2" class="form-group t101_jo_detail_Nomor_Container_2">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Container_2" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_2" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_2" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_2->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Container_2->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Container_2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Nomor_Container_2" class="t101_jo_detail_Nomor_Container_2">
<span<?php echo $t101_jo_detail->Nomor_Container_2->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Container_2->getViewValue() ?></span>
</span>
<?php if (!$t101_jo_detail->isConfirm()) { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Container_2" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_2" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_2" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_2->FormValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Container_2" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_2" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_2" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Container_2" name="ft101_jo_detailgrid$x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_2" id="ft101_jo_detailgrid$x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_2" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_2->FormValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Container_2" name="ft101_jo_detailgrid$o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_2" id="ft101_jo_detailgrid$o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_2" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Ref_JOHead_id->Visible) { // Ref_JOHead_id ?>
		<td data-name="Ref_JOHead_id"<?php echo $t101_jo_detail->Ref_JOHead_id->cellAttributes() ?>>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Ref_JOHead_id" class="form-group t101_jo_detail_Ref_JOHead_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_detail" data-field="x_Ref_JOHead_id" data-value-separator="<?php echo $t101_jo_detail->Ref_JOHead_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Ref_JOHead_id" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Ref_JOHead_id"<?php echo $t101_jo_detail->Ref_JOHead_id->editAttributes() ?>>
		<?php echo $t101_jo_detail->Ref_JOHead_id->selectOptionListHtml("x<?php echo $t101_jo_detail_grid->RowIndex ?>_Ref_JOHead_id") ?>
	</select>
</div>
<?php echo $t101_jo_detail->Ref_JOHead_id->Lookup->getParamTag("p_x" . $t101_jo_detail_grid->RowIndex . "_Ref_JOHead_id") ?>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Ref_JOHead_id" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Ref_JOHead_id" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Ref_JOHead_id" value="<?php echo HtmlEncode($t101_jo_detail->Ref_JOHead_id->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Ref_JOHead_id" class="form-group t101_jo_detail_Ref_JOHead_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_detail" data-field="x_Ref_JOHead_id" data-value-separator="<?php echo $t101_jo_detail->Ref_JOHead_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Ref_JOHead_id" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Ref_JOHead_id"<?php echo $t101_jo_detail->Ref_JOHead_id->editAttributes() ?>>
		<?php echo $t101_jo_detail->Ref_JOHead_id->selectOptionListHtml("x<?php echo $t101_jo_detail_grid->RowIndex ?>_Ref_JOHead_id") ?>
	</select>
</div>
<?php echo $t101_jo_detail->Ref_JOHead_id->Lookup->getParamTag("p_x" . $t101_jo_detail_grid->RowIndex . "_Ref_JOHead_id") ?>
</span>
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Ref_JOHead_id" class="t101_jo_detail_Ref_JOHead_id">
<span<?php echo $t101_jo_detail->Ref_JOHead_id->viewAttributes() ?>>
<?php echo $t101_jo_detail->Ref_JOHead_id->getViewValue() ?></span>
</span>
<?php if (!$t101_jo_detail->isConfirm()) { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Ref_JOHead_id" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Ref_JOHead_id" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Ref_JOHead_id" value="<?php echo HtmlEncode($t101_jo_detail->Ref_JOHead_id->FormValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_Ref_JOHead_id" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Ref_JOHead_id" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Ref_JOHead_id" value="<?php echo HtmlEncode($t101_jo_detail->Ref_JOHead_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Ref_JOHead_id" name="ft101_jo_detailgrid$x<?php echo $t101_jo_detail_grid->RowIndex ?>_Ref_JOHead_id" id="ft101_jo_detailgrid$x<?php echo $t101_jo_detail_grid->RowIndex ?>_Ref_JOHead_id" value="<?php echo HtmlEncode($t101_jo_detail->Ref_JOHead_id->FormValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_Ref_JOHead_id" name="ft101_jo_detailgrid$o<?php echo $t101_jo_detail_grid->RowIndex ?>_Ref_JOHead_id" id="ft101_jo_detailgrid$o<?php echo $t101_jo_detail_grid->RowIndex ?>_Ref_JOHead_id" value="<?php echo HtmlEncode($t101_jo_detail->Ref_JOHead_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->No_Tagihan->Visible) { // No_Tagihan ?>
		<td data-name="No_Tagihan"<?php echo $t101_jo_detail->No_Tagihan->cellAttributes() ?>>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_No_Tagihan" class="form-group t101_jo_detail_No_Tagihan">
<input type="text" data-table="t101_jo_detail" data-field="x_No_Tagihan" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_No_Tagihan" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_No_Tagihan" size="5" placeholder="<?php echo HtmlEncode($t101_jo_detail->No_Tagihan->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->No_Tagihan->EditValue ?>"<?php echo $t101_jo_detail->No_Tagihan->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_No_Tagihan" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_No_Tagihan" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_No_Tagihan" value="<?php echo HtmlEncode($t101_jo_detail->No_Tagihan->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_No_Tagihan" class="form-group t101_jo_detail_No_Tagihan">
<input type="text" data-table="t101_jo_detail" data-field="x_No_Tagihan" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_No_Tagihan" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_No_Tagihan" size="5" placeholder="<?php echo HtmlEncode($t101_jo_detail->No_Tagihan->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->No_Tagihan->EditValue ?>"<?php echo $t101_jo_detail->No_Tagihan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_No_Tagihan" class="t101_jo_detail_No_Tagihan">
<span<?php echo $t101_jo_detail->No_Tagihan->viewAttributes() ?>>
<?php echo $t101_jo_detail->No_Tagihan->getViewValue() ?></span>
</span>
<?php if (!$t101_jo_detail->isConfirm()) { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_No_Tagihan" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_No_Tagihan" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_No_Tagihan" value="<?php echo HtmlEncode($t101_jo_detail->No_Tagihan->FormValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_No_Tagihan" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_No_Tagihan" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_No_Tagihan" value="<?php echo HtmlEncode($t101_jo_detail->No_Tagihan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_No_Tagihan" name="ft101_jo_detailgrid$x<?php echo $t101_jo_detail_grid->RowIndex ?>_No_Tagihan" id="ft101_jo_detailgrid$x<?php echo $t101_jo_detail_grid->RowIndex ?>_No_Tagihan" value="<?php echo HtmlEncode($t101_jo_detail->No_Tagihan->FormValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_No_Tagihan" name="ft101_jo_detailgrid$o<?php echo $t101_jo_detail_grid->RowIndex ?>_No_Tagihan" id="ft101_jo_detailgrid$o<?php echo $t101_jo_detail_grid->RowIndex ?>_No_Tagihan" value="<?php echo HtmlEncode($t101_jo_detail->No_Tagihan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Jumlah_Tagihan->Visible) { // Jumlah_Tagihan ?>
		<td data-name="Jumlah_Tagihan"<?php echo $t101_jo_detail->Jumlah_Tagihan->cellAttributes() ?>>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Jumlah_Tagihan" class="form-group t101_jo_detail_Jumlah_Tagihan">
<input type="text" data-table="t101_jo_detail" data-field="x_Jumlah_Tagihan" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Jumlah_Tagihan" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Jumlah_Tagihan" size="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Jumlah_Tagihan->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Jumlah_Tagihan->EditValue ?>"<?php echo $t101_jo_detail->Jumlah_Tagihan->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Jumlah_Tagihan" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Jumlah_Tagihan" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Jumlah_Tagihan" value="<?php echo HtmlEncode($t101_jo_detail->Jumlah_Tagihan->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Jumlah_Tagihan" class="form-group t101_jo_detail_Jumlah_Tagihan">
<input type="text" data-table="t101_jo_detail" data-field="x_Jumlah_Tagihan" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Jumlah_Tagihan" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Jumlah_Tagihan" size="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Jumlah_Tagihan->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Jumlah_Tagihan->EditValue ?>"<?php echo $t101_jo_detail->Jumlah_Tagihan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_detail_grid->RowCnt ?>_t101_jo_detail_Jumlah_Tagihan" class="t101_jo_detail_Jumlah_Tagihan">
<span<?php echo $t101_jo_detail->Jumlah_Tagihan->viewAttributes() ?>>
<?php echo $t101_jo_detail->Jumlah_Tagihan->getViewValue() ?></span>
</span>
<?php if (!$t101_jo_detail->isConfirm()) { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Jumlah_Tagihan" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Jumlah_Tagihan" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Jumlah_Tagihan" value="<?php echo HtmlEncode($t101_jo_detail->Jumlah_Tagihan->FormValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_Jumlah_Tagihan" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Jumlah_Tagihan" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Jumlah_Tagihan" value="<?php echo HtmlEncode($t101_jo_detail->Jumlah_Tagihan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Jumlah_Tagihan" name="ft101_jo_detailgrid$x<?php echo $t101_jo_detail_grid->RowIndex ?>_Jumlah_Tagihan" id="ft101_jo_detailgrid$x<?php echo $t101_jo_detail_grid->RowIndex ?>_Jumlah_Tagihan" value="<?php echo HtmlEncode($t101_jo_detail->Jumlah_Tagihan->FormValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_Jumlah_Tagihan" name="ft101_jo_detailgrid$o<?php echo $t101_jo_detail_grid->RowIndex ?>_Jumlah_Tagihan" id="ft101_jo_detailgrid$o<?php echo $t101_jo_detail_grid->RowIndex ?>_Jumlah_Tagihan" value="<?php echo HtmlEncode($t101_jo_detail->Jumlah_Tagihan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t101_jo_detail_grid->ListOptions->render("body", "right", $t101_jo_detail_grid->RowCnt);
?>
	</tr>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD || $t101_jo_detail->RowType == ROWTYPE_EDIT) { ?>
<script>
ft101_jo_detailgrid.updateLists(<?php echo $t101_jo_detail_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t101_jo_detail->isGridAdd() || $t101_jo_detail->CurrentMode == "copy")
		if (!$t101_jo_detail_grid->Recordset->EOF)
			$t101_jo_detail_grid->Recordset->moveNext();
}
?>
<?php
	if ($t101_jo_detail->CurrentMode == "add" || $t101_jo_detail->CurrentMode == "copy" || $t101_jo_detail->CurrentMode == "edit") {
		$t101_jo_detail_grid->RowIndex = '$rowindex$';
		$t101_jo_detail_grid->loadRowValues();

		// Set row properties
		$t101_jo_detail->resetAttributes();
		$t101_jo_detail->RowAttrs = array_merge($t101_jo_detail->RowAttrs, array('data-rowindex'=>$t101_jo_detail_grid->RowIndex, 'id'=>'r0_t101_jo_detail', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($t101_jo_detail->RowAttrs["class"], "ew-template");
		$t101_jo_detail->RowType = ROWTYPE_ADD;

		// Render row
		$t101_jo_detail_grid->renderRow();

		// Render list options
		$t101_jo_detail_grid->renderListOptions();
		$t101_jo_detail_grid->StartRowCnt = 0;
?>
	<tr<?php echo $t101_jo_detail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t101_jo_detail_grid->ListOptions->render("body", "left", $t101_jo_detail_grid->RowIndex);
?>
	<?php if ($t101_jo_detail->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
		<td data-name="TruckingVendor_id">
<?php if (!$t101_jo_detail->isConfirm()) { ?>
<span id="el$rowindex$_t101_jo_detail_TruckingVendor_id" class="form-group t101_jo_detail_TruckingVendor_id">
<?php $t101_jo_detail->TruckingVendor_id->EditAttrs["onchange"] = "ew.updateOptions.call(this);" . @$t101_jo_detail->TruckingVendor_id->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_detail" data-field="x_TruckingVendor_id" data-value-separator="<?php echo $t101_jo_detail->TruckingVendor_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_TruckingVendor_id" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_TruckingVendor_id"<?php echo $t101_jo_detail->TruckingVendor_id->editAttributes() ?>>
		<?php echo $t101_jo_detail->TruckingVendor_id->selectOptionListHtml("x<?php echo $t101_jo_detail_grid->RowIndex ?>_TruckingVendor_id") ?>
	</select>
</div>
<?php echo $t101_jo_detail->TruckingVendor_id->Lookup->getParamTag("p_x" . $t101_jo_detail_grid->RowIndex . "_TruckingVendor_id") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_t101_jo_detail_TruckingVendor_id" class="form-group t101_jo_detail_TruckingVendor_id">
<span<?php echo $t101_jo_detail->TruckingVendor_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t101_jo_detail->TruckingVendor_id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_TruckingVendor_id" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_TruckingVendor_id" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_TruckingVendor_id" value="<?php echo HtmlEncode($t101_jo_detail->TruckingVendor_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_TruckingVendor_id" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_TruckingVendor_id" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_TruckingVendor_id" value="<?php echo HtmlEncode($t101_jo_detail->TruckingVendor_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Driver_id->Visible) { // Driver_id ?>
		<td data-name="Driver_id">
<?php if (!$t101_jo_detail->isConfirm()) { ?>
<span id="el$rowindex$_t101_jo_detail_Driver_id" class="form-group t101_jo_detail_Driver_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_detail" data-field="x_Driver_id" data-value-separator="<?php echo $t101_jo_detail->Driver_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id"<?php echo $t101_jo_detail->Driver_id->editAttributes() ?>>
		<?php echo $t101_jo_detail->Driver_id->selectOptionListHtml("x<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_jo_detail->Driver_id->caption() ?>" data-title="<?php echo $t101_jo_detail->Driver_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id',url:'t005_driveraddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_jo_detail->Driver_id->Lookup->getParamTag("p_x" . $t101_jo_detail_grid->RowIndex . "_Driver_id") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_t101_jo_detail_Driver_id" class="form-group t101_jo_detail_Driver_id">
<span<?php echo $t101_jo_detail->Driver_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t101_jo_detail->Driver_id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Driver_id" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id" value="<?php echo HtmlEncode($t101_jo_detail->Driver_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Driver_id" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Driver_id" value="<?php echo HtmlEncode($t101_jo_detail->Driver_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Tanggal_Stuffing->Visible) { // Tanggal_Stuffing ?>
		<td data-name="Tanggal_Stuffing">
<?php if (!$t101_jo_detail->isConfirm()) { ?>
<span id="el$rowindex$_t101_jo_detail_Tanggal_Stuffing" class="form-group t101_jo_detail_Tanggal_Stuffing">
<input type="text" data-table="t101_jo_detail" data-field="x_Tanggal_Stuffing" data-format="11" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Tanggal_Stuffing" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Tanggal_Stuffing" size="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Tanggal_Stuffing->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Tanggal_Stuffing->EditValue ?>"<?php echo $t101_jo_detail->Tanggal_Stuffing->editAttributes() ?>>
<?php if (!$t101_jo_detail->Tanggal_Stuffing->ReadOnly && !$t101_jo_detail->Tanggal_Stuffing->Disabled && !isset($t101_jo_detail->Tanggal_Stuffing->EditAttrs["readonly"]) && !isset($t101_jo_detail->Tanggal_Stuffing->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft101_jo_detailgrid", "x<?php echo $t101_jo_detail_grid->RowIndex ?>_Tanggal_Stuffing", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_t101_jo_detail_Tanggal_Stuffing" class="form-group t101_jo_detail_Tanggal_Stuffing">
<span<?php echo $t101_jo_detail->Tanggal_Stuffing->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t101_jo_detail->Tanggal_Stuffing->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Tanggal_Stuffing" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Tanggal_Stuffing" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Tanggal_Stuffing" value="<?php echo HtmlEncode($t101_jo_detail->Tanggal_Stuffing->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Tanggal_Stuffing" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Tanggal_Stuffing" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Tanggal_Stuffing" value="<?php echo HtmlEncode($t101_jo_detail->Tanggal_Stuffing->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Polisi_1->Visible) { // Nomor_Polisi_1 ?>
		<td data-name="Nomor_Polisi_1">
<?php if (!$t101_jo_detail->isConfirm()) { ?>
<span id="el$rowindex$_t101_jo_detail_Nomor_Polisi_1" class="form-group t101_jo_detail_Nomor_Polisi_1">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_1" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_1" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_1" size="1" maxlength="5" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_1->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_1->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t101_jo_detail_Nomor_Polisi_1" class="form-group t101_jo_detail_Nomor_Polisi_1">
<span<?php echo $t101_jo_detail->Nomor_Polisi_1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t101_jo_detail->Nomor_Polisi_1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_1" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_1" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_1" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_1" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_1" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_1" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Polisi_2->Visible) { // Nomor_Polisi_2 ?>
		<td data-name="Nomor_Polisi_2">
<?php if (!$t101_jo_detail->isConfirm()) { ?>
<span id="el$rowindex$_t101_jo_detail_Nomor_Polisi_2" class="form-group t101_jo_detail_Nomor_Polisi_2">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_2" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_2" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_2" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_2->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_2->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t101_jo_detail_Nomor_Polisi_2" class="form-group t101_jo_detail_Nomor_Polisi_2">
<span<?php echo $t101_jo_detail->Nomor_Polisi_2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t101_jo_detail->Nomor_Polisi_2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_2" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_2" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_2" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_2" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_2" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_2" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Polisi_3->Visible) { // Nomor_Polisi_3 ?>
		<td data-name="Nomor_Polisi_3">
<?php if (!$t101_jo_detail->isConfirm()) { ?>
<span id="el$rowindex$_t101_jo_detail_Nomor_Polisi_3" class="form-group t101_jo_detail_Nomor_Polisi_3">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_3" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_3" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_3" size="5" maxlength="5" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_3->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_3->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_3->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t101_jo_detail_Nomor_Polisi_3" class="form-group t101_jo_detail_Nomor_Polisi_3">
<span<?php echo $t101_jo_detail->Nomor_Polisi_3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t101_jo_detail->Nomor_Polisi_3->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_3" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_3" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_3" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_3" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_3" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Polisi_3" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
		<td data-name="Nomor_Container_1">
<?php if (!$t101_jo_detail->isConfirm()) { ?>
<span id="el$rowindex$_t101_jo_detail_Nomor_Container_1" class="form-group t101_jo_detail_Nomor_Container_1">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Container_1" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_1" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_1" size="5" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_1->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Container_1->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Container_1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t101_jo_detail_Nomor_Container_1" class="form-group t101_jo_detail_Nomor_Container_1">
<span<?php echo $t101_jo_detail->Nomor_Container_1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t101_jo_detail->Nomor_Container_1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Container_1" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_1" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_1" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Container_1" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_1" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_1" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
		<td data-name="Nomor_Container_2">
<?php if (!$t101_jo_detail->isConfirm()) { ?>
<span id="el$rowindex$_t101_jo_detail_Nomor_Container_2" class="form-group t101_jo_detail_Nomor_Container_2">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Container_2" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_2" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_2" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_2->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Container_2->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Container_2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t101_jo_detail_Nomor_Container_2" class="form-group t101_jo_detail_Nomor_Container_2">
<span<?php echo $t101_jo_detail->Nomor_Container_2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t101_jo_detail->Nomor_Container_2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Container_2" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_2" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_2" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Container_2" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_2" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Nomor_Container_2" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Ref_JOHead_id->Visible) { // Ref_JOHead_id ?>
		<td data-name="Ref_JOHead_id">
<?php if (!$t101_jo_detail->isConfirm()) { ?>
<span id="el$rowindex$_t101_jo_detail_Ref_JOHead_id" class="form-group t101_jo_detail_Ref_JOHead_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_detail" data-field="x_Ref_JOHead_id" data-value-separator="<?php echo $t101_jo_detail->Ref_JOHead_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Ref_JOHead_id" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Ref_JOHead_id"<?php echo $t101_jo_detail->Ref_JOHead_id->editAttributes() ?>>
		<?php echo $t101_jo_detail->Ref_JOHead_id->selectOptionListHtml("x<?php echo $t101_jo_detail_grid->RowIndex ?>_Ref_JOHead_id") ?>
	</select>
</div>
<?php echo $t101_jo_detail->Ref_JOHead_id->Lookup->getParamTag("p_x" . $t101_jo_detail_grid->RowIndex . "_Ref_JOHead_id") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_t101_jo_detail_Ref_JOHead_id" class="form-group t101_jo_detail_Ref_JOHead_id">
<span<?php echo $t101_jo_detail->Ref_JOHead_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t101_jo_detail->Ref_JOHead_id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Ref_JOHead_id" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Ref_JOHead_id" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Ref_JOHead_id" value="<?php echo HtmlEncode($t101_jo_detail->Ref_JOHead_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Ref_JOHead_id" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Ref_JOHead_id" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Ref_JOHead_id" value="<?php echo HtmlEncode($t101_jo_detail->Ref_JOHead_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->No_Tagihan->Visible) { // No_Tagihan ?>
		<td data-name="No_Tagihan">
<?php if (!$t101_jo_detail->isConfirm()) { ?>
<span id="el$rowindex$_t101_jo_detail_No_Tagihan" class="form-group t101_jo_detail_No_Tagihan">
<input type="text" data-table="t101_jo_detail" data-field="x_No_Tagihan" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_No_Tagihan" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_No_Tagihan" size="5" placeholder="<?php echo HtmlEncode($t101_jo_detail->No_Tagihan->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->No_Tagihan->EditValue ?>"<?php echo $t101_jo_detail->No_Tagihan->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t101_jo_detail_No_Tagihan" class="form-group t101_jo_detail_No_Tagihan">
<span<?php echo $t101_jo_detail->No_Tagihan->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t101_jo_detail->No_Tagihan->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_No_Tagihan" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_No_Tagihan" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_No_Tagihan" value="<?php echo HtmlEncode($t101_jo_detail->No_Tagihan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_No_Tagihan" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_No_Tagihan" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_No_Tagihan" value="<?php echo HtmlEncode($t101_jo_detail->No_Tagihan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Jumlah_Tagihan->Visible) { // Jumlah_Tagihan ?>
		<td data-name="Jumlah_Tagihan">
<?php if (!$t101_jo_detail->isConfirm()) { ?>
<span id="el$rowindex$_t101_jo_detail_Jumlah_Tagihan" class="form-group t101_jo_detail_Jumlah_Tagihan">
<input type="text" data-table="t101_jo_detail" data-field="x_Jumlah_Tagihan" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Jumlah_Tagihan" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Jumlah_Tagihan" size="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Jumlah_Tagihan->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Jumlah_Tagihan->EditValue ?>"<?php echo $t101_jo_detail->Jumlah_Tagihan->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t101_jo_detail_Jumlah_Tagihan" class="form-group t101_jo_detail_Jumlah_Tagihan">
<span<?php echo $t101_jo_detail->Jumlah_Tagihan->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t101_jo_detail->Jumlah_Tagihan->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Jumlah_Tagihan" name="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Jumlah_Tagihan" id="x<?php echo $t101_jo_detail_grid->RowIndex ?>_Jumlah_Tagihan" value="<?php echo HtmlEncode($t101_jo_detail->Jumlah_Tagihan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Jumlah_Tagihan" name="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Jumlah_Tagihan" id="o<?php echo $t101_jo_detail_grid->RowIndex ?>_Jumlah_Tagihan" value="<?php echo HtmlEncode($t101_jo_detail->Jumlah_Tagihan->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t101_jo_detail_grid->ListOptions->render("body", "right", $t101_jo_detail_grid->RowIndex);
?>
<script>
ft101_jo_detailgrid.updateLists(<?php echo $t101_jo_detail_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($t101_jo_detail->CurrentMode == "add" || $t101_jo_detail->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $t101_jo_detail_grid->FormKeyCountName ?>" id="<?php echo $t101_jo_detail_grid->FormKeyCountName ?>" value="<?php echo $t101_jo_detail_grid->KeyCount ?>">
<?php echo $t101_jo_detail_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t101_jo_detail->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $t101_jo_detail_grid->FormKeyCountName ?>" id="<?php echo $t101_jo_detail_grid->FormKeyCountName ?>" value="<?php echo $t101_jo_detail_grid->KeyCount ?>">
<?php echo $t101_jo_detail_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t101_jo_detail->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="ft101_jo_detailgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($t101_jo_detail_grid->Recordset)
	$t101_jo_detail_grid->Recordset->Close();
?>
</div>
<?php if ($t101_jo_detail_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $t101_jo_detail_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t101_jo_detail_grid->TotalRecs == 0 && !$t101_jo_detail->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t101_jo_detail_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t101_jo_detail_grid->terminate();
?>