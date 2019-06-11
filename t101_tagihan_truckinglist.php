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
$t101_tagihan_trucking_list = new t101_tagihan_trucking_list();

// Run the page
$t101_tagihan_trucking_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_tagihan_trucking_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t101_tagihan_trucking->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft101_tagihan_truckinglist = currentForm = new ew.Form("ft101_tagihan_truckinglist", "list");
ft101_tagihan_truckinglist.formKeyCountName = '<?php echo $t101_tagihan_trucking_list->FormKeyCountName ?>';

// Validate form
ft101_tagihan_truckinglist.validate = function() {
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
		<?php if ($t101_tagihan_trucking_list->Nomor_Polisi_1->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Polisi_1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_tagihan_trucking->Nomor_Polisi_1->caption(), $t101_tagihan_trucking->Nomor_Polisi_1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_tagihan_trucking_list->Nomor_Polisi_2->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Polisi_2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_tagihan_trucking->Nomor_Polisi_2->caption(), $t101_tagihan_trucking->Nomor_Polisi_2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_tagihan_trucking_list->Nomor_Polisi_3->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Polisi_3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_tagihan_trucking->Nomor_Polisi_3->caption(), $t101_tagihan_trucking->Nomor_Polisi_3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_tagihan_trucking_list->Tanggal->Required) { ?>
			elm = this.getElements("x" + infix + "_Tanggal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_tagihan_trucking->Tanggal->caption(), $t101_tagihan_trucking->Tanggal->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Tanggal");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t101_tagihan_trucking->Tanggal->errorMessage()) ?>");
		<?php if ($t101_tagihan_trucking_list->Shipper_id->Required) { ?>
			elm = this.getElements("x" + infix + "_Shipper_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_tagihan_trucking->Shipper_id->caption(), $t101_tagihan_trucking->Shipper_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_tagihan_trucking_list->Dari_Lokasi->Required) { ?>
			elm = this.getElements("x" + infix + "_Dari_Lokasi");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_tagihan_trucking->Dari_Lokasi->caption(), $t101_tagihan_trucking->Dari_Lokasi->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_tagihan_trucking_list->Ke_Lokasi->Required) { ?>
			elm = this.getElements("x" + infix + "_Ke_Lokasi");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_tagihan_trucking->Ke_Lokasi->caption(), $t101_tagihan_trucking->Ke_Lokasi->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_tagihan_trucking_list->Jenis_Container->Required) { ?>
			elm = this.getElements("x" + infix + "_Jenis_Container");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_tagihan_trucking->Jenis_Container->caption(), $t101_tagihan_trucking->Jenis_Container->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_tagihan_trucking_list->Nomor_Container_1->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Container_1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_tagihan_trucking->Nomor_Container_1->caption(), $t101_tagihan_trucking->Nomor_Container_1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_tagihan_trucking_list->Nomor_Container_2->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Container_2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_tagihan_trucking->Nomor_Container_2->caption(), $t101_tagihan_trucking->Nomor_Container_2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_tagihan_trucking_list->Tagihan->Required) { ?>
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
		} // End Grid Add checking
	}
	if (gridinsert && addcnt == 0) { // No row added
		ew.alert(ew.language.phrase("NoAddRecord"));
		return false;
	}
	return true;
}

// Check empty row
ft101_tagihan_truckinglist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "Nomor_Polisi_1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Nomor_Polisi_2", false)) return false;
	if (ew.valueChanged(fobj, infix, "Nomor_Polisi_3", false)) return false;
	if (ew.valueChanged(fobj, infix, "Tanggal", false)) return false;
	if (ew.valueChanged(fobj, infix, "Shipper_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "Dari_Lokasi", false)) return false;
	if (ew.valueChanged(fobj, infix, "Ke_Lokasi", false)) return false;
	if (ew.valueChanged(fobj, infix, "Jenis_Container", false)) return false;
	if (ew.valueChanged(fobj, infix, "Nomor_Container_1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Nomor_Container_2", false)) return false;
	if (ew.valueChanged(fobj, infix, "Tagihan", false)) return false;
	return true;
}

// Form_CustomValidate event
ft101_tagihan_truckinglist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft101_tagihan_truckinglist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft101_tagihan_truckinglist.lists["x_Shipper_id"] = <?php echo $t101_tagihan_trucking_list->Shipper_id->Lookup->toClientList() ?>;
ft101_tagihan_truckinglist.lists["x_Shipper_id"].options = <?php echo JsonEncode($t101_tagihan_trucking_list->Shipper_id->lookupOptions()) ?>;
ft101_tagihan_truckinglist.lists["x_Jenis_Container"] = <?php echo $t101_tagihan_trucking_list->Jenis_Container->Lookup->toClientList() ?>;
ft101_tagihan_truckinglist.lists["x_Jenis_Container"].options = <?php echo JsonEncode($t101_tagihan_trucking_list->Jenis_Container->options(FALSE, TRUE)) ?>;

// Form object for search
var ft101_tagihan_truckinglistsrch = currentSearchForm = new ew.Form("ft101_tagihan_truckinglistsrch");

// Validate function for search
ft101_tagihan_truckinglistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
ft101_tagihan_truckinglistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft101_tagihan_truckinglistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft101_tagihan_truckinglistsrch.lists["x_Shipper_id"] = <?php echo $t101_tagihan_trucking_list->Shipper_id->Lookup->toClientList() ?>;
ft101_tagihan_truckinglistsrch.lists["x_Shipper_id"].options = <?php echo JsonEncode($t101_tagihan_trucking_list->Shipper_id->lookupOptions()) ?>;

// Filters
ft101_tagihan_truckinglistsrch.filterList = <?php echo $t101_tagihan_trucking_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t101_tagihan_trucking->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t101_tagihan_trucking_list->TotalRecs > 0 && $t101_tagihan_trucking_list->ExportOptions->visible()) { ?>
<?php $t101_tagihan_trucking_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t101_tagihan_trucking_list->ImportOptions->visible()) { ?>
<?php $t101_tagihan_trucking_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t101_tagihan_trucking_list->SearchOptions->visible()) { ?>
<?php $t101_tagihan_trucking_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t101_tagihan_trucking_list->FilterOptions->visible()) { ?>
<?php $t101_tagihan_trucking_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t101_tagihan_trucking_list->renderOtherOptions();
?>
<?php if (!$t101_tagihan_trucking->isExport() && !$t101_tagihan_trucking->CurrentAction) { ?>
<form name="ft101_tagihan_truckinglistsrch" id="ft101_tagihan_truckinglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t101_tagihan_trucking_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft101_tagihan_truckinglistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t101_tagihan_trucking">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$t101_tagihan_trucking_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$t101_tagihan_trucking->RowType = ROWTYPE_SEARCH;

// Render row
$t101_tagihan_trucking->resetAttributes();
$t101_tagihan_trucking_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($t101_tagihan_trucking->Shipper_id->Visible) { // Shipper_id ?>
	<div id="xsc_Shipper_id" class="ew-cell form-group">
		<label for="x_Shipper_id" class="ew-search-caption ew-label"><?php echo $t101_tagihan_trucking->Shipper_id->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Shipper_id" id="z_Shipper_id" value="="></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_tagihan_trucking" data-field="x_Shipper_id" data-value-separator="<?php echo $t101_tagihan_trucking->Shipper_id->displayValueSeparatorAttribute() ?>" id="x_Shipper_id" name="x_Shipper_id"<?php echo $t101_tagihan_trucking->Shipper_id->editAttributes() ?>>
		<?php echo $t101_tagihan_trucking->Shipper_id->selectOptionListHtml("x_Shipper_id") ?>
	</select>
</div>
<?php echo $t101_tagihan_trucking->Shipper_id->Lookup->getParamTag("p_x_Shipper_id") ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $t101_tagihan_trucking_list->showPageHeader(); ?>
<?php
$t101_tagihan_trucking_list->showMessage();
?>
<?php if ($t101_tagihan_trucking_list->TotalRecs > 0 || $t101_tagihan_trucking->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t101_tagihan_trucking_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t101_tagihan_trucking">
<form name="ft101_tagihan_truckinglist" id="ft101_tagihan_truckinglist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t101_tagihan_trucking_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t101_tagihan_trucking_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_tagihan_trucking">
<div id="gmp_t101_tagihan_trucking" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t101_tagihan_trucking_list->TotalRecs > 0 || $t101_tagihan_trucking->isAdd() || $t101_tagihan_trucking->isCopy() || $t101_tagihan_trucking->isGridEdit()) { ?>
<table id="tbl_t101_tagihan_truckinglist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t101_tagihan_trucking_list->RowType = ROWTYPE_HEADER;

// Render list options
$t101_tagihan_trucking_list->renderListOptions();

// Render list options (header, left)
$t101_tagihan_trucking_list->ListOptions->render("header", "left");
?>
<?php if ($t101_tagihan_trucking->Nomor_Polisi_1->Visible) { // Nomor_Polisi_1 ?>
	<?php if ($t101_tagihan_trucking->sortUrl($t101_tagihan_trucking->Nomor_Polisi_1) == "") { ?>
		<th data-name="Nomor_Polisi_1" class="<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->headerCellClass() ?>"><div id="elh_t101_tagihan_trucking_Nomor_Polisi_1" class="t101_tagihan_trucking_Nomor_Polisi_1"><div class="ew-table-header-caption"><?php echo $t101_tagihan_trucking->Nomor_Polisi_1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nomor_Polisi_1" class="<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_tagihan_trucking->SortUrl($t101_tagihan_trucking->Nomor_Polisi_1) ?>',1);"><div id="elh_t101_tagihan_trucking_Nomor_Polisi_1" class="t101_tagihan_trucking_Nomor_Polisi_1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_tagihan_trucking->Nomor_Polisi_1->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_tagihan_trucking->Nomor_Polisi_1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_tagihan_trucking->Nomor_Polisi_1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Polisi_2->Visible) { // Nomor_Polisi_2 ?>
	<?php if ($t101_tagihan_trucking->sortUrl($t101_tagihan_trucking->Nomor_Polisi_2) == "") { ?>
		<th data-name="Nomor_Polisi_2" class="<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->headerCellClass() ?>"><div id="elh_t101_tagihan_trucking_Nomor_Polisi_2" class="t101_tagihan_trucking_Nomor_Polisi_2"><div class="ew-table-header-caption"><?php echo $t101_tagihan_trucking->Nomor_Polisi_2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nomor_Polisi_2" class="<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_tagihan_trucking->SortUrl($t101_tagihan_trucking->Nomor_Polisi_2) ?>',1);"><div id="elh_t101_tagihan_trucking_Nomor_Polisi_2" class="t101_tagihan_trucking_Nomor_Polisi_2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_tagihan_trucking->Nomor_Polisi_2->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_tagihan_trucking->Nomor_Polisi_2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_tagihan_trucking->Nomor_Polisi_2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Polisi_3->Visible) { // Nomor_Polisi_3 ?>
	<?php if ($t101_tagihan_trucking->sortUrl($t101_tagihan_trucking->Nomor_Polisi_3) == "") { ?>
		<th data-name="Nomor_Polisi_3" class="<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->headerCellClass() ?>"><div id="elh_t101_tagihan_trucking_Nomor_Polisi_3" class="t101_tagihan_trucking_Nomor_Polisi_3"><div class="ew-table-header-caption"><?php echo $t101_tagihan_trucking->Nomor_Polisi_3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nomor_Polisi_3" class="<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_tagihan_trucking->SortUrl($t101_tagihan_trucking->Nomor_Polisi_3) ?>',1);"><div id="elh_t101_tagihan_trucking_Nomor_Polisi_3" class="t101_tagihan_trucking_Nomor_Polisi_3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_tagihan_trucking->Nomor_Polisi_3->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_tagihan_trucking->Nomor_Polisi_3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_tagihan_trucking->Nomor_Polisi_3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_tagihan_trucking->Tanggal->Visible) { // Tanggal ?>
	<?php if ($t101_tagihan_trucking->sortUrl($t101_tagihan_trucking->Tanggal) == "") { ?>
		<th data-name="Tanggal" class="<?php echo $t101_tagihan_trucking->Tanggal->headerCellClass() ?>"><div id="elh_t101_tagihan_trucking_Tanggal" class="t101_tagihan_trucking_Tanggal"><div class="ew-table-header-caption"><?php echo $t101_tagihan_trucking->Tanggal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tanggal" class="<?php echo $t101_tagihan_trucking->Tanggal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_tagihan_trucking->SortUrl($t101_tagihan_trucking->Tanggal) ?>',1);"><div id="elh_t101_tagihan_trucking_Tanggal" class="t101_tagihan_trucking_Tanggal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_tagihan_trucking->Tanggal->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_tagihan_trucking->Tanggal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_tagihan_trucking->Tanggal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_tagihan_trucking->Shipper_id->Visible) { // Shipper_id ?>
	<?php if ($t101_tagihan_trucking->sortUrl($t101_tagihan_trucking->Shipper_id) == "") { ?>
		<th data-name="Shipper_id" class="<?php echo $t101_tagihan_trucking->Shipper_id->headerCellClass() ?>"><div id="elh_t101_tagihan_trucking_Shipper_id" class="t101_tagihan_trucking_Shipper_id"><div class="ew-table-header-caption"><?php echo $t101_tagihan_trucking->Shipper_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Shipper_id" class="<?php echo $t101_tagihan_trucking->Shipper_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_tagihan_trucking->SortUrl($t101_tagihan_trucking->Shipper_id) ?>',1);"><div id="elh_t101_tagihan_trucking_Shipper_id" class="t101_tagihan_trucking_Shipper_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_tagihan_trucking->Shipper_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_tagihan_trucking->Shipper_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_tagihan_trucking->Shipper_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_tagihan_trucking->Dari_Lokasi->Visible) { // Dari_Lokasi ?>
	<?php if ($t101_tagihan_trucking->sortUrl($t101_tagihan_trucking->Dari_Lokasi) == "") { ?>
		<th data-name="Dari_Lokasi" class="<?php echo $t101_tagihan_trucking->Dari_Lokasi->headerCellClass() ?>"><div id="elh_t101_tagihan_trucking_Dari_Lokasi" class="t101_tagihan_trucking_Dari_Lokasi"><div class="ew-table-header-caption"><?php echo $t101_tagihan_trucking->Dari_Lokasi->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dari_Lokasi" class="<?php echo $t101_tagihan_trucking->Dari_Lokasi->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_tagihan_trucking->SortUrl($t101_tagihan_trucking->Dari_Lokasi) ?>',1);"><div id="elh_t101_tagihan_trucking_Dari_Lokasi" class="t101_tagihan_trucking_Dari_Lokasi">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_tagihan_trucking->Dari_Lokasi->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_tagihan_trucking->Dari_Lokasi->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_tagihan_trucking->Dari_Lokasi->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_tagihan_trucking->Ke_Lokasi->Visible) { // Ke_Lokasi ?>
	<?php if ($t101_tagihan_trucking->sortUrl($t101_tagihan_trucking->Ke_Lokasi) == "") { ?>
		<th data-name="Ke_Lokasi" class="<?php echo $t101_tagihan_trucking->Ke_Lokasi->headerCellClass() ?>"><div id="elh_t101_tagihan_trucking_Ke_Lokasi" class="t101_tagihan_trucking_Ke_Lokasi"><div class="ew-table-header-caption"><?php echo $t101_tagihan_trucking->Ke_Lokasi->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Ke_Lokasi" class="<?php echo $t101_tagihan_trucking->Ke_Lokasi->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_tagihan_trucking->SortUrl($t101_tagihan_trucking->Ke_Lokasi) ?>',1);"><div id="elh_t101_tagihan_trucking_Ke_Lokasi" class="t101_tagihan_trucking_Ke_Lokasi">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_tagihan_trucking->Ke_Lokasi->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_tagihan_trucking->Ke_Lokasi->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_tagihan_trucking->Ke_Lokasi->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_tagihan_trucking->Jenis_Container->Visible) { // Jenis_Container ?>
	<?php if ($t101_tagihan_trucking->sortUrl($t101_tagihan_trucking->Jenis_Container) == "") { ?>
		<th data-name="Jenis_Container" class="<?php echo $t101_tagihan_trucking->Jenis_Container->headerCellClass() ?>"><div id="elh_t101_tagihan_trucking_Jenis_Container" class="t101_tagihan_trucking_Jenis_Container"><div class="ew-table-header-caption"><?php echo $t101_tagihan_trucking->Jenis_Container->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jenis_Container" class="<?php echo $t101_tagihan_trucking->Jenis_Container->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_tagihan_trucking->SortUrl($t101_tagihan_trucking->Jenis_Container) ?>',1);"><div id="elh_t101_tagihan_trucking_Jenis_Container" class="t101_tagihan_trucking_Jenis_Container">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_tagihan_trucking->Jenis_Container->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_tagihan_trucking->Jenis_Container->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_tagihan_trucking->Jenis_Container->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
	<?php if ($t101_tagihan_trucking->sortUrl($t101_tagihan_trucking->Nomor_Container_1) == "") { ?>
		<th data-name="Nomor_Container_1" class="<?php echo $t101_tagihan_trucking->Nomor_Container_1->headerCellClass() ?>"><div id="elh_t101_tagihan_trucking_Nomor_Container_1" class="t101_tagihan_trucking_Nomor_Container_1"><div class="ew-table-header-caption"><?php echo $t101_tagihan_trucking->Nomor_Container_1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nomor_Container_1" class="<?php echo $t101_tagihan_trucking->Nomor_Container_1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_tagihan_trucking->SortUrl($t101_tagihan_trucking->Nomor_Container_1) ?>',1);"><div id="elh_t101_tagihan_trucking_Nomor_Container_1" class="t101_tagihan_trucking_Nomor_Container_1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_tagihan_trucking->Nomor_Container_1->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_tagihan_trucking->Nomor_Container_1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_tagihan_trucking->Nomor_Container_1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
	<?php if ($t101_tagihan_trucking->sortUrl($t101_tagihan_trucking->Nomor_Container_2) == "") { ?>
		<th data-name="Nomor_Container_2" class="<?php echo $t101_tagihan_trucking->Nomor_Container_2->headerCellClass() ?>"><div id="elh_t101_tagihan_trucking_Nomor_Container_2" class="t101_tagihan_trucking_Nomor_Container_2"><div class="ew-table-header-caption"><?php echo $t101_tagihan_trucking->Nomor_Container_2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nomor_Container_2" class="<?php echo $t101_tagihan_trucking->Nomor_Container_2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_tagihan_trucking->SortUrl($t101_tagihan_trucking->Nomor_Container_2) ?>',1);"><div id="elh_t101_tagihan_trucking_Nomor_Container_2" class="t101_tagihan_trucking_Nomor_Container_2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_tagihan_trucking->Nomor_Container_2->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_tagihan_trucking->Nomor_Container_2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_tagihan_trucking->Nomor_Container_2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_tagihan_trucking->Tagihan->Visible) { // Tagihan ?>
	<?php if ($t101_tagihan_trucking->sortUrl($t101_tagihan_trucking->Tagihan) == "") { ?>
		<th data-name="Tagihan" class="<?php echo $t101_tagihan_trucking->Tagihan->headerCellClass() ?>"><div id="elh_t101_tagihan_trucking_Tagihan" class="t101_tagihan_trucking_Tagihan"><div class="ew-table-header-caption"><?php echo $t101_tagihan_trucking->Tagihan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tagihan" class="<?php echo $t101_tagihan_trucking->Tagihan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_tagihan_trucking->SortUrl($t101_tagihan_trucking->Tagihan) ?>',1);"><div id="elh_t101_tagihan_trucking_Tagihan" class="t101_tagihan_trucking_Tagihan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_tagihan_trucking->Tagihan->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_tagihan_trucking->Tagihan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_tagihan_trucking->Tagihan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t101_tagihan_trucking_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($t101_tagihan_trucking->isAdd() || $t101_tagihan_trucking->isCopy()) {
		$t101_tagihan_trucking_list->RowIndex = 0;
		$t101_tagihan_trucking_list->KeyCount = $t101_tagihan_trucking_list->RowIndex;
		if ($t101_tagihan_trucking->isCopy() && !$t101_tagihan_trucking_list->loadRow())
			$t101_tagihan_trucking->CurrentAction = "add";
		if ($t101_tagihan_trucking->isAdd())
			$t101_tagihan_trucking_list->loadRowValues();
		if ($t101_tagihan_trucking->EventCancelled) // Insert failed
			$t101_tagihan_trucking_list->restoreFormValues(); // Restore form values

		// Set row properties
		$t101_tagihan_trucking->resetAttributes();
		$t101_tagihan_trucking->RowAttrs = array_merge($t101_tagihan_trucking->RowAttrs, array('data-rowindex'=>0, 'id'=>'r0_t101_tagihan_trucking', 'data-rowtype'=>ROWTYPE_ADD));
		$t101_tagihan_trucking->RowType = ROWTYPE_ADD;

		// Render row
		$t101_tagihan_trucking_list->renderRow();

		// Render list options
		$t101_tagihan_trucking_list->renderListOptions();
		$t101_tagihan_trucking_list->StartRowCnt = 0;
?>
	<tr<?php echo $t101_tagihan_trucking->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t101_tagihan_trucking_list->ListOptions->render("body", "left", $t101_tagihan_trucking_list->RowCnt);
?>
	<?php if ($t101_tagihan_trucking->Nomor_Polisi_1->Visible) { // Nomor_Polisi_1 ?>
		<td data-name="Nomor_Polisi_1">
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Nomor_Polisi_1" class="form-group t101_tagihan_trucking_Nomor_Polisi_1">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_1" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_1" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_1" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_1->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_1" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_1" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_1" value="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Nomor_Polisi_2->Visible) { // Nomor_Polisi_2 ?>
		<td data-name="Nomor_Polisi_2">
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Nomor_Polisi_2" class="form-group t101_tagihan_trucking_Nomor_Polisi_2">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_2" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_2" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_2" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_2->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_2" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_2" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_2" value="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Nomor_Polisi_3->Visible) { // Nomor_Polisi_3 ?>
		<td data-name="Nomor_Polisi_3">
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Nomor_Polisi_3" class="form-group t101_tagihan_trucking_Nomor_Polisi_3">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_3" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_3" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_3" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_3->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_3" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_3" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_3" value="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Tanggal->Visible) { // Tanggal ?>
		<td data-name="Tanggal">
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Tanggal" class="form-group t101_tagihan_trucking_Tanggal">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Tanggal" data-format="7" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tanggal" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tanggal" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Tanggal->EditValue ?>"<?php echo $t101_tagihan_trucking->Tanggal->editAttributes() ?>>
<?php if (!$t101_tagihan_trucking->Tanggal->ReadOnly && !$t101_tagihan_trucking->Tanggal->Disabled && !isset($t101_tagihan_trucking->Tanggal->EditAttrs["readonly"]) && !isset($t101_tagihan_trucking->Tanggal->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft101_tagihan_truckinglist", "x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Tanggal" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tanggal" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tanggal" value="<?php echo HtmlEncode($t101_tagihan_trucking->Tanggal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Shipper_id->Visible) { // Shipper_id ?>
		<td data-name="Shipper_id">
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Shipper_id" class="form-group t101_tagihan_trucking_Shipper_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_tagihan_trucking" data-field="x_Shipper_id" data-value-separator="<?php echo $t101_tagihan_trucking->Shipper_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id"<?php echo $t101_tagihan_trucking->Shipper_id->editAttributes() ?>>
		<?php echo $t101_tagihan_trucking->Shipper_id->selectOptionListHtml("x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_tagihan_trucking->Shipper_id->caption() ?>" data-title="<?php echo $t101_tagihan_trucking->Shipper_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id',url:'t001_shipperaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_tagihan_trucking->Shipper_id->Lookup->getParamTag("p_x" . $t101_tagihan_trucking_list->RowIndex . "_Shipper_id") ?>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Shipper_id" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id" value="<?php echo HtmlEncode($t101_tagihan_trucking->Shipper_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Dari_Lokasi->Visible) { // Dari_Lokasi ?>
		<td data-name="Dari_Lokasi">
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Dari_Lokasi" class="form-group t101_tagihan_trucking_Dari_Lokasi">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Dari_Lokasi" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Dari_Lokasi" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Dari_Lokasi" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Dari_Lokasi->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Dari_Lokasi->EditValue ?>"<?php echo $t101_tagihan_trucking->Dari_Lokasi->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Dari_Lokasi" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Dari_Lokasi" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Dari_Lokasi" value="<?php echo HtmlEncode($t101_tagihan_trucking->Dari_Lokasi->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Ke_Lokasi->Visible) { // Ke_Lokasi ?>
		<td data-name="Ke_Lokasi">
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Ke_Lokasi" class="form-group t101_tagihan_trucking_Ke_Lokasi">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Ke_Lokasi" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Ke_Lokasi" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Ke_Lokasi" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Ke_Lokasi->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Ke_Lokasi->EditValue ?>"<?php echo $t101_tagihan_trucking->Ke_Lokasi->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Ke_Lokasi" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Ke_Lokasi" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Ke_Lokasi" value="<?php echo HtmlEncode($t101_tagihan_trucking->Ke_Lokasi->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Jenis_Container->Visible) { // Jenis_Container ?>
		<td data-name="Jenis_Container">
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Jenis_Container" class="form-group t101_tagihan_trucking_Jenis_Container">
<div id="tp_x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Jenis_Container" class="ew-template"><input type="radio" class="form-check-input" data-table="t101_tagihan_trucking" data-field="x_Jenis_Container" data-value-separator="<?php echo $t101_tagihan_trucking->Jenis_Container->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Jenis_Container" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Jenis_Container" value="{value}"<?php echo $t101_tagihan_trucking->Jenis_Container->editAttributes() ?>></div>
<div id="dsl_x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Jenis_Container" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t101_tagihan_trucking->Jenis_Container->radioButtonListHtml(FALSE, "x{$t101_tagihan_trucking_list->RowIndex}_Jenis_Container") ?>
</div></div>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Jenis_Container" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Jenis_Container" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Jenis_Container" value="<?php echo HtmlEncode($t101_tagihan_trucking->Jenis_Container->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
		<td data-name="Nomor_Container_1">
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Nomor_Container_1" class="form-group t101_tagihan_trucking_Nomor_Container_1">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Container_1" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_1" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_1" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Container_1->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Container_1->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Container_1->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Nomor_Container_1" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_1" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_1" value="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Container_1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
		<td data-name="Nomor_Container_2">
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Nomor_Container_2" class="form-group t101_tagihan_trucking_Nomor_Container_2">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Container_2" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_2" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_2" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Container_2->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Container_2->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Container_2->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Nomor_Container_2" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_2" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_2" value="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Container_2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Tagihan->Visible) { // Tagihan ?>
		<td data-name="Tagihan">
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Tagihan" class="form-group t101_tagihan_trucking_Tagihan">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Tagihan" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tagihan" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tagihan" size="30" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Tagihan->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Tagihan->EditValue ?>"<?php echo $t101_tagihan_trucking->Tagihan->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Tagihan" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tagihan" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tagihan" value="<?php echo HtmlEncode($t101_tagihan_trucking->Tagihan->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t101_tagihan_trucking_list->ListOptions->render("body", "right", $t101_tagihan_trucking_list->RowCnt);
?>
<script>
ft101_tagihan_truckinglist.updateLists(<?php echo $t101_tagihan_trucking_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
<?php
if ($t101_tagihan_trucking->ExportAll && $t101_tagihan_trucking->isExport()) {
	$t101_tagihan_trucking_list->StopRec = $t101_tagihan_trucking_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t101_tagihan_trucking_list->TotalRecs > $t101_tagihan_trucking_list->StartRec + $t101_tagihan_trucking_list->DisplayRecs - 1)
		$t101_tagihan_trucking_list->StopRec = $t101_tagihan_trucking_list->StartRec + $t101_tagihan_trucking_list->DisplayRecs - 1;
	else
		$t101_tagihan_trucking_list->StopRec = $t101_tagihan_trucking_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $t101_tagihan_trucking_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t101_tagihan_trucking_list->FormKeyCountName) && ($t101_tagihan_trucking->isGridAdd() || $t101_tagihan_trucking->isGridEdit() || $t101_tagihan_trucking->isConfirm())) {
		$t101_tagihan_trucking_list->KeyCount = $CurrentForm->getValue($t101_tagihan_trucking_list->FormKeyCountName);
		$t101_tagihan_trucking_list->StopRec = $t101_tagihan_trucking_list->StartRec + $t101_tagihan_trucking_list->KeyCount - 1;
	}
}
$t101_tagihan_trucking_list->RecCnt = $t101_tagihan_trucking_list->StartRec - 1;
if ($t101_tagihan_trucking_list->Recordset && !$t101_tagihan_trucking_list->Recordset->EOF) {
	$t101_tagihan_trucking_list->Recordset->moveFirst();
	$selectLimit = $t101_tagihan_trucking_list->UseSelectLimit;
	if (!$selectLimit && $t101_tagihan_trucking_list->StartRec > 1)
		$t101_tagihan_trucking_list->Recordset->move($t101_tagihan_trucking_list->StartRec - 1);
} elseif (!$t101_tagihan_trucking->AllowAddDeleteRow && $t101_tagihan_trucking_list->StopRec == 0) {
	$t101_tagihan_trucking_list->StopRec = $t101_tagihan_trucking->GridAddRowCount;
}

// Initialize aggregate
$t101_tagihan_trucking->RowType = ROWTYPE_AGGREGATEINIT;
$t101_tagihan_trucking->resetAttributes();
$t101_tagihan_trucking_list->renderRow();
$t101_tagihan_trucking_list->EditRowCnt = 0;
if ($t101_tagihan_trucking->isEdit())
	$t101_tagihan_trucking_list->RowIndex = 1;
if ($t101_tagihan_trucking->isGridAdd())
	$t101_tagihan_trucking_list->RowIndex = 0;
if ($t101_tagihan_trucking->isGridEdit())
	$t101_tagihan_trucking_list->RowIndex = 0;
while ($t101_tagihan_trucking_list->RecCnt < $t101_tagihan_trucking_list->StopRec) {
	$t101_tagihan_trucking_list->RecCnt++;
	if ($t101_tagihan_trucking_list->RecCnt >= $t101_tagihan_trucking_list->StartRec) {
		$t101_tagihan_trucking_list->RowCnt++;
		if ($t101_tagihan_trucking->isGridAdd() || $t101_tagihan_trucking->isGridEdit() || $t101_tagihan_trucking->isConfirm()) {
			$t101_tagihan_trucking_list->RowIndex++;
			$CurrentForm->Index = $t101_tagihan_trucking_list->RowIndex;
			if ($CurrentForm->hasValue($t101_tagihan_trucking_list->FormActionName) && $t101_tagihan_trucking_list->EventCancelled)
				$t101_tagihan_trucking_list->RowAction = strval($CurrentForm->getValue($t101_tagihan_trucking_list->FormActionName));
			elseif ($t101_tagihan_trucking->isGridAdd())
				$t101_tagihan_trucking_list->RowAction = "insert";
			else
				$t101_tagihan_trucking_list->RowAction = "";
		}

		// Set up key count
		$t101_tagihan_trucking_list->KeyCount = $t101_tagihan_trucking_list->RowIndex;

		// Init row class and style
		$t101_tagihan_trucking->resetAttributes();
		$t101_tagihan_trucking->CssClass = "";
		if ($t101_tagihan_trucking->isGridAdd()) {
			$t101_tagihan_trucking_list->loadRowValues(); // Load default values
		} else {
			$t101_tagihan_trucking_list->loadRowValues($t101_tagihan_trucking_list->Recordset); // Load row values
		}
		$t101_tagihan_trucking->RowType = ROWTYPE_VIEW; // Render view
		if ($t101_tagihan_trucking->isGridAdd()) // Grid add
			$t101_tagihan_trucking->RowType = ROWTYPE_ADD; // Render add
		if ($t101_tagihan_trucking->isGridAdd() && $t101_tagihan_trucking->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t101_tagihan_trucking_list->restoreCurrentRowFormValues($t101_tagihan_trucking_list->RowIndex); // Restore form values
		if ($t101_tagihan_trucking->isEdit()) {
			if ($t101_tagihan_trucking_list->checkInlineEditKey() && $t101_tagihan_trucking_list->EditRowCnt == 0) { // Inline edit
				$t101_tagihan_trucking->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($t101_tagihan_trucking->isGridEdit()) { // Grid edit
			if ($t101_tagihan_trucking->EventCancelled)
				$t101_tagihan_trucking_list->restoreCurrentRowFormValues($t101_tagihan_trucking_list->RowIndex); // Restore form values
			if ($t101_tagihan_trucking_list->RowAction == "insert")
				$t101_tagihan_trucking->RowType = ROWTYPE_ADD; // Render add
			else
				$t101_tagihan_trucking->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t101_tagihan_trucking->isEdit() && $t101_tagihan_trucking->RowType == ROWTYPE_EDIT && $t101_tagihan_trucking->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$t101_tagihan_trucking_list->restoreFormValues(); // Restore form values
		}
		if ($t101_tagihan_trucking->isGridEdit() && ($t101_tagihan_trucking->RowType == ROWTYPE_EDIT || $t101_tagihan_trucking->RowType == ROWTYPE_ADD) && $t101_tagihan_trucking->EventCancelled) // Update failed
			$t101_tagihan_trucking_list->restoreCurrentRowFormValues($t101_tagihan_trucking_list->RowIndex); // Restore form values
		if ($t101_tagihan_trucking->RowType == ROWTYPE_EDIT) // Edit row
			$t101_tagihan_trucking_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$t101_tagihan_trucking->RowAttrs = array_merge($t101_tagihan_trucking->RowAttrs, array('data-rowindex'=>$t101_tagihan_trucking_list->RowCnt, 'id'=>'r' . $t101_tagihan_trucking_list->RowCnt . '_t101_tagihan_trucking', 'data-rowtype'=>$t101_tagihan_trucking->RowType));

		// Render row
		$t101_tagihan_trucking_list->renderRow();

		// Render list options
		$t101_tagihan_trucking_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t101_tagihan_trucking_list->RowAction <> "delete" && $t101_tagihan_trucking_list->RowAction <> "insertdelete" && !($t101_tagihan_trucking_list->RowAction == "insert" && $t101_tagihan_trucking->isConfirm() && $t101_tagihan_trucking_list->emptyRow())) {
?>
	<tr<?php echo $t101_tagihan_trucking->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t101_tagihan_trucking_list->ListOptions->render("body", "left", $t101_tagihan_trucking_list->RowCnt);
?>
	<?php if ($t101_tagihan_trucking->Nomor_Polisi_1->Visible) { // Nomor_Polisi_1 ?>
		<td data-name="Nomor_Polisi_1"<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->cellAttributes() ?>>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Nomor_Polisi_1" class="form-group t101_tagihan_trucking_Nomor_Polisi_1">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_1" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_1" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_1" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_1->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_1" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_1" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_1" value="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_1->OldValue) ?>">
<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Nomor_Polisi_1" class="form-group t101_tagihan_trucking_Nomor_Polisi_1">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_1" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_1" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_1" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_1->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Nomor_Polisi_1" class="t101_tagihan_trucking_Nomor_Polisi_1">
<span<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_id" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_id" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t101_tagihan_trucking->id->CurrentValue) ?>">
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_id" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_id" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t101_tagihan_trucking->id->OldValue) ?>">
<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_EDIT || $t101_tagihan_trucking->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_id" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_id" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t101_tagihan_trucking->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t101_tagihan_trucking->Nomor_Polisi_2->Visible) { // Nomor_Polisi_2 ?>
		<td data-name="Nomor_Polisi_2"<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->cellAttributes() ?>>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Nomor_Polisi_2" class="form-group t101_tagihan_trucking_Nomor_Polisi_2">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_2" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_2" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_2" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_2->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_2" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_2" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_2" value="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_2->OldValue) ?>">
<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Nomor_Polisi_2" class="form-group t101_tagihan_trucking_Nomor_Polisi_2">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_2" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_2" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_2" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_2->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Nomor_Polisi_2" class="t101_tagihan_trucking_Nomor_Polisi_2">
<span<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Nomor_Polisi_3->Visible) { // Nomor_Polisi_3 ?>
		<td data-name="Nomor_Polisi_3"<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->cellAttributes() ?>>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Nomor_Polisi_3" class="form-group t101_tagihan_trucking_Nomor_Polisi_3">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_3" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_3" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_3" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_3->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_3" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_3" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_3" value="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_3->OldValue) ?>">
<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Nomor_Polisi_3" class="form-group t101_tagihan_trucking_Nomor_Polisi_3">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_3" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_3" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_3" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_3->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Nomor_Polisi_3" class="t101_tagihan_trucking_Nomor_Polisi_3">
<span<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Tanggal->Visible) { // Tanggal ?>
		<td data-name="Tanggal"<?php echo $t101_tagihan_trucking->Tanggal->cellAttributes() ?>>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Tanggal" class="form-group t101_tagihan_trucking_Tanggal">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Tanggal" data-format="7" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tanggal" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tanggal" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Tanggal->EditValue ?>"<?php echo $t101_tagihan_trucking->Tanggal->editAttributes() ?>>
<?php if (!$t101_tagihan_trucking->Tanggal->ReadOnly && !$t101_tagihan_trucking->Tanggal->Disabled && !isset($t101_tagihan_trucking->Tanggal->EditAttrs["readonly"]) && !isset($t101_tagihan_trucking->Tanggal->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft101_tagihan_truckinglist", "x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Tanggal" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tanggal" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tanggal" value="<?php echo HtmlEncode($t101_tagihan_trucking->Tanggal->OldValue) ?>">
<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Tanggal" class="form-group t101_tagihan_trucking_Tanggal">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Tanggal" data-format="7" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tanggal" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tanggal" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Tanggal->EditValue ?>"<?php echo $t101_tagihan_trucking->Tanggal->editAttributes() ?>>
<?php if (!$t101_tagihan_trucking->Tanggal->ReadOnly && !$t101_tagihan_trucking->Tanggal->Disabled && !isset($t101_tagihan_trucking->Tanggal->EditAttrs["readonly"]) && !isset($t101_tagihan_trucking->Tanggal->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft101_tagihan_truckinglist", "x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Tanggal" class="t101_tagihan_trucking_Tanggal">
<span<?php echo $t101_tagihan_trucking->Tanggal->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Tanggal->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Shipper_id->Visible) { // Shipper_id ?>
		<td data-name="Shipper_id"<?php echo $t101_tagihan_trucking->Shipper_id->cellAttributes() ?>>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Shipper_id" class="form-group t101_tagihan_trucking_Shipper_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_tagihan_trucking" data-field="x_Shipper_id" data-value-separator="<?php echo $t101_tagihan_trucking->Shipper_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id"<?php echo $t101_tagihan_trucking->Shipper_id->editAttributes() ?>>
		<?php echo $t101_tagihan_trucking->Shipper_id->selectOptionListHtml("x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_tagihan_trucking->Shipper_id->caption() ?>" data-title="<?php echo $t101_tagihan_trucking->Shipper_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id',url:'t001_shipperaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_tagihan_trucking->Shipper_id->Lookup->getParamTag("p_x" . $t101_tagihan_trucking_list->RowIndex . "_Shipper_id") ?>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Shipper_id" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id" value="<?php echo HtmlEncode($t101_tagihan_trucking->Shipper_id->OldValue) ?>">
<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Shipper_id" class="form-group t101_tagihan_trucking_Shipper_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_tagihan_trucking" data-field="x_Shipper_id" data-value-separator="<?php echo $t101_tagihan_trucking->Shipper_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id"<?php echo $t101_tagihan_trucking->Shipper_id->editAttributes() ?>>
		<?php echo $t101_tagihan_trucking->Shipper_id->selectOptionListHtml("x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_tagihan_trucking->Shipper_id->caption() ?>" data-title="<?php echo $t101_tagihan_trucking->Shipper_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id',url:'t001_shipperaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_tagihan_trucking->Shipper_id->Lookup->getParamTag("p_x" . $t101_tagihan_trucking_list->RowIndex . "_Shipper_id") ?>
</span>
<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Shipper_id" class="t101_tagihan_trucking_Shipper_id">
<span<?php echo $t101_tagihan_trucking->Shipper_id->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Shipper_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Dari_Lokasi->Visible) { // Dari_Lokasi ?>
		<td data-name="Dari_Lokasi"<?php echo $t101_tagihan_trucking->Dari_Lokasi->cellAttributes() ?>>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Dari_Lokasi" class="form-group t101_tagihan_trucking_Dari_Lokasi">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Dari_Lokasi" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Dari_Lokasi" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Dari_Lokasi" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Dari_Lokasi->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Dari_Lokasi->EditValue ?>"<?php echo $t101_tagihan_trucking->Dari_Lokasi->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Dari_Lokasi" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Dari_Lokasi" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Dari_Lokasi" value="<?php echo HtmlEncode($t101_tagihan_trucking->Dari_Lokasi->OldValue) ?>">
<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Dari_Lokasi" class="form-group t101_tagihan_trucking_Dari_Lokasi">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Dari_Lokasi" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Dari_Lokasi" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Dari_Lokasi" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Dari_Lokasi->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Dari_Lokasi->EditValue ?>"<?php echo $t101_tagihan_trucking->Dari_Lokasi->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Dari_Lokasi" class="t101_tagihan_trucking_Dari_Lokasi">
<span<?php echo $t101_tagihan_trucking->Dari_Lokasi->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Dari_Lokasi->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Ke_Lokasi->Visible) { // Ke_Lokasi ?>
		<td data-name="Ke_Lokasi"<?php echo $t101_tagihan_trucking->Ke_Lokasi->cellAttributes() ?>>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Ke_Lokasi" class="form-group t101_tagihan_trucking_Ke_Lokasi">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Ke_Lokasi" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Ke_Lokasi" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Ke_Lokasi" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Ke_Lokasi->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Ke_Lokasi->EditValue ?>"<?php echo $t101_tagihan_trucking->Ke_Lokasi->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Ke_Lokasi" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Ke_Lokasi" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Ke_Lokasi" value="<?php echo HtmlEncode($t101_tagihan_trucking->Ke_Lokasi->OldValue) ?>">
<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Ke_Lokasi" class="form-group t101_tagihan_trucking_Ke_Lokasi">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Ke_Lokasi" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Ke_Lokasi" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Ke_Lokasi" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Ke_Lokasi->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Ke_Lokasi->EditValue ?>"<?php echo $t101_tagihan_trucking->Ke_Lokasi->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Ke_Lokasi" class="t101_tagihan_trucking_Ke_Lokasi">
<span<?php echo $t101_tagihan_trucking->Ke_Lokasi->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Ke_Lokasi->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Jenis_Container->Visible) { // Jenis_Container ?>
		<td data-name="Jenis_Container"<?php echo $t101_tagihan_trucking->Jenis_Container->cellAttributes() ?>>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Jenis_Container" class="form-group t101_tagihan_trucking_Jenis_Container">
<div id="tp_x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Jenis_Container" class="ew-template"><input type="radio" class="form-check-input" data-table="t101_tagihan_trucking" data-field="x_Jenis_Container" data-value-separator="<?php echo $t101_tagihan_trucking->Jenis_Container->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Jenis_Container" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Jenis_Container" value="{value}"<?php echo $t101_tagihan_trucking->Jenis_Container->editAttributes() ?>></div>
<div id="dsl_x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Jenis_Container" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t101_tagihan_trucking->Jenis_Container->radioButtonListHtml(FALSE, "x{$t101_tagihan_trucking_list->RowIndex}_Jenis_Container") ?>
</div></div>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Jenis_Container" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Jenis_Container" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Jenis_Container" value="<?php echo HtmlEncode($t101_tagihan_trucking->Jenis_Container->OldValue) ?>">
<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Jenis_Container" class="form-group t101_tagihan_trucking_Jenis_Container">
<div id="tp_x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Jenis_Container" class="ew-template"><input type="radio" class="form-check-input" data-table="t101_tagihan_trucking" data-field="x_Jenis_Container" data-value-separator="<?php echo $t101_tagihan_trucking->Jenis_Container->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Jenis_Container" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Jenis_Container" value="{value}"<?php echo $t101_tagihan_trucking->Jenis_Container->editAttributes() ?>></div>
<div id="dsl_x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Jenis_Container" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t101_tagihan_trucking->Jenis_Container->radioButtonListHtml(FALSE, "x{$t101_tagihan_trucking_list->RowIndex}_Jenis_Container") ?>
</div></div>
</span>
<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Jenis_Container" class="t101_tagihan_trucking_Jenis_Container">
<span<?php echo $t101_tagihan_trucking->Jenis_Container->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Jenis_Container->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
		<td data-name="Nomor_Container_1"<?php echo $t101_tagihan_trucking->Nomor_Container_1->cellAttributes() ?>>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Nomor_Container_1" class="form-group t101_tagihan_trucking_Nomor_Container_1">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Container_1" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_1" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_1" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Container_1->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Container_1->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Container_1->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Nomor_Container_1" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_1" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_1" value="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Container_1->OldValue) ?>">
<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Nomor_Container_1" class="form-group t101_tagihan_trucking_Nomor_Container_1">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Container_1" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_1" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_1" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Container_1->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Container_1->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Container_1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Nomor_Container_1" class="t101_tagihan_trucking_Nomor_Container_1">
<span<?php echo $t101_tagihan_trucking->Nomor_Container_1->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Nomor_Container_1->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
		<td data-name="Nomor_Container_2"<?php echo $t101_tagihan_trucking->Nomor_Container_2->cellAttributes() ?>>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Nomor_Container_2" class="form-group t101_tagihan_trucking_Nomor_Container_2">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Container_2" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_2" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_2" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Container_2->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Container_2->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Container_2->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Nomor_Container_2" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_2" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_2" value="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Container_2->OldValue) ?>">
<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Nomor_Container_2" class="form-group t101_tagihan_trucking_Nomor_Container_2">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Container_2" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_2" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_2" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Container_2->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Container_2->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Container_2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Nomor_Container_2" class="t101_tagihan_trucking_Nomor_Container_2">
<span<?php echo $t101_tagihan_trucking->Nomor_Container_2->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Nomor_Container_2->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Tagihan->Visible) { // Tagihan ?>
		<td data-name="Tagihan"<?php echo $t101_tagihan_trucking->Tagihan->cellAttributes() ?>>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Tagihan" class="form-group t101_tagihan_trucking_Tagihan">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Tagihan" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tagihan" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tagihan" size="30" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Tagihan->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Tagihan->EditValue ?>"<?php echo $t101_tagihan_trucking->Tagihan->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Tagihan" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tagihan" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tagihan" value="<?php echo HtmlEncode($t101_tagihan_trucking->Tagihan->OldValue) ?>">
<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Tagihan" class="form-group t101_tagihan_trucking_Tagihan">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Tagihan" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tagihan" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tagihan" size="30" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Tagihan->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Tagihan->EditValue ?>"<?php echo $t101_tagihan_trucking->Tagihan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_tagihan_trucking_list->RowCnt ?>_t101_tagihan_trucking_Tagihan" class="t101_tagihan_trucking_Tagihan">
<span<?php echo $t101_tagihan_trucking->Tagihan->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Tagihan->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t101_tagihan_trucking_list->ListOptions->render("body", "right", $t101_tagihan_trucking_list->RowCnt);
?>
	</tr>
<?php if ($t101_tagihan_trucking->RowType == ROWTYPE_ADD || $t101_tagihan_trucking->RowType == ROWTYPE_EDIT) { ?>
<script>
ft101_tagihan_truckinglist.updateLists(<?php echo $t101_tagihan_trucking_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t101_tagihan_trucking->isGridAdd())
		if (!$t101_tagihan_trucking_list->Recordset->EOF)
			$t101_tagihan_trucking_list->Recordset->moveNext();
}
?>
<?php
	if ($t101_tagihan_trucking->isGridAdd() || $t101_tagihan_trucking->isGridEdit()) {
		$t101_tagihan_trucking_list->RowIndex = '$rowindex$';
		$t101_tagihan_trucking_list->loadRowValues();

		// Set row properties
		$t101_tagihan_trucking->resetAttributes();
		$t101_tagihan_trucking->RowAttrs = array_merge($t101_tagihan_trucking->RowAttrs, array('data-rowindex'=>$t101_tagihan_trucking_list->RowIndex, 'id'=>'r0_t101_tagihan_trucking', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($t101_tagihan_trucking->RowAttrs["class"], "ew-template");
		$t101_tagihan_trucking->RowType = ROWTYPE_ADD;

		// Render row
		$t101_tagihan_trucking_list->renderRow();

		// Render list options
		$t101_tagihan_trucking_list->renderListOptions();
		$t101_tagihan_trucking_list->StartRowCnt = 0;
?>
	<tr<?php echo $t101_tagihan_trucking->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t101_tagihan_trucking_list->ListOptions->render("body", "left", $t101_tagihan_trucking_list->RowIndex);
?>
	<?php if ($t101_tagihan_trucking->Nomor_Polisi_1->Visible) { // Nomor_Polisi_1 ?>
		<td data-name="Nomor_Polisi_1">
<span id="el$rowindex$_t101_tagihan_trucking_Nomor_Polisi_1" class="form-group t101_tagihan_trucking_Nomor_Polisi_1">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_1" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_1" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_1" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_1->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_1" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_1" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_1" value="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Nomor_Polisi_2->Visible) { // Nomor_Polisi_2 ?>
		<td data-name="Nomor_Polisi_2">
<span id="el$rowindex$_t101_tagihan_trucking_Nomor_Polisi_2" class="form-group t101_tagihan_trucking_Nomor_Polisi_2">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_2" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_2" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_2" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_2->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_2" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_2" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_2" value="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Nomor_Polisi_3->Visible) { // Nomor_Polisi_3 ?>
		<td data-name="Nomor_Polisi_3">
<span id="el$rowindex$_t101_tagihan_trucking_Nomor_Polisi_3" class="form-group t101_tagihan_trucking_Nomor_Polisi_3">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_3" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_3" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_3" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_3->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Nomor_Polisi_3" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_3" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Polisi_3" value="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Polisi_3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Tanggal->Visible) { // Tanggal ?>
		<td data-name="Tanggal">
<span id="el$rowindex$_t101_tagihan_trucking_Tanggal" class="form-group t101_tagihan_trucking_Tanggal">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Tanggal" data-format="7" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tanggal" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tanggal" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Tanggal->EditValue ?>"<?php echo $t101_tagihan_trucking->Tanggal->editAttributes() ?>>
<?php if (!$t101_tagihan_trucking->Tanggal->ReadOnly && !$t101_tagihan_trucking->Tanggal->Disabled && !isset($t101_tagihan_trucking->Tanggal->EditAttrs["readonly"]) && !isset($t101_tagihan_trucking->Tanggal->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft101_tagihan_truckinglist", "x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Tanggal" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tanggal" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tanggal" value="<?php echo HtmlEncode($t101_tagihan_trucking->Tanggal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Shipper_id->Visible) { // Shipper_id ?>
		<td data-name="Shipper_id">
<span id="el$rowindex$_t101_tagihan_trucking_Shipper_id" class="form-group t101_tagihan_trucking_Shipper_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_tagihan_trucking" data-field="x_Shipper_id" data-value-separator="<?php echo $t101_tagihan_trucking->Shipper_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id"<?php echo $t101_tagihan_trucking->Shipper_id->editAttributes() ?>>
		<?php echo $t101_tagihan_trucking->Shipper_id->selectOptionListHtml("x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_tagihan_trucking->Shipper_id->caption() ?>" data-title="<?php echo $t101_tagihan_trucking->Shipper_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id',url:'t001_shipperaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_tagihan_trucking->Shipper_id->Lookup->getParamTag("p_x" . $t101_tagihan_trucking_list->RowIndex . "_Shipper_id") ?>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Shipper_id" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Shipper_id" value="<?php echo HtmlEncode($t101_tagihan_trucking->Shipper_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Dari_Lokasi->Visible) { // Dari_Lokasi ?>
		<td data-name="Dari_Lokasi">
<span id="el$rowindex$_t101_tagihan_trucking_Dari_Lokasi" class="form-group t101_tagihan_trucking_Dari_Lokasi">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Dari_Lokasi" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Dari_Lokasi" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Dari_Lokasi" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Dari_Lokasi->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Dari_Lokasi->EditValue ?>"<?php echo $t101_tagihan_trucking->Dari_Lokasi->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Dari_Lokasi" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Dari_Lokasi" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Dari_Lokasi" value="<?php echo HtmlEncode($t101_tagihan_trucking->Dari_Lokasi->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Ke_Lokasi->Visible) { // Ke_Lokasi ?>
		<td data-name="Ke_Lokasi">
<span id="el$rowindex$_t101_tagihan_trucking_Ke_Lokasi" class="form-group t101_tagihan_trucking_Ke_Lokasi">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Ke_Lokasi" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Ke_Lokasi" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Ke_Lokasi" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Ke_Lokasi->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Ke_Lokasi->EditValue ?>"<?php echo $t101_tagihan_trucking->Ke_Lokasi->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Ke_Lokasi" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Ke_Lokasi" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Ke_Lokasi" value="<?php echo HtmlEncode($t101_tagihan_trucking->Ke_Lokasi->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Jenis_Container->Visible) { // Jenis_Container ?>
		<td data-name="Jenis_Container">
<span id="el$rowindex$_t101_tagihan_trucking_Jenis_Container" class="form-group t101_tagihan_trucking_Jenis_Container">
<div id="tp_x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Jenis_Container" class="ew-template"><input type="radio" class="form-check-input" data-table="t101_tagihan_trucking" data-field="x_Jenis_Container" data-value-separator="<?php echo $t101_tagihan_trucking->Jenis_Container->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Jenis_Container" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Jenis_Container" value="{value}"<?php echo $t101_tagihan_trucking->Jenis_Container->editAttributes() ?>></div>
<div id="dsl_x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Jenis_Container" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t101_tagihan_trucking->Jenis_Container->radioButtonListHtml(FALSE, "x{$t101_tagihan_trucking_list->RowIndex}_Jenis_Container") ?>
</div></div>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Jenis_Container" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Jenis_Container" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Jenis_Container" value="<?php echo HtmlEncode($t101_tagihan_trucking->Jenis_Container->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
		<td data-name="Nomor_Container_1">
<span id="el$rowindex$_t101_tagihan_trucking_Nomor_Container_1" class="form-group t101_tagihan_trucking_Nomor_Container_1">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Container_1" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_1" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_1" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Container_1->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Container_1->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Container_1->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Nomor_Container_1" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_1" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_1" value="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Container_1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
		<td data-name="Nomor_Container_2">
<span id="el$rowindex$_t101_tagihan_trucking_Nomor_Container_2" class="form-group t101_tagihan_trucking_Nomor_Container_2">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Nomor_Container_2" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_2" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_2" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Container_2->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Nomor_Container_2->EditValue ?>"<?php echo $t101_tagihan_trucking->Nomor_Container_2->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Nomor_Container_2" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_2" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Nomor_Container_2" value="<?php echo HtmlEncode($t101_tagihan_trucking->Nomor_Container_2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_tagihan_trucking->Tagihan->Visible) { // Tagihan ?>
		<td data-name="Tagihan">
<span id="el$rowindex$_t101_tagihan_trucking_Tagihan" class="form-group t101_tagihan_trucking_Tagihan">
<input type="text" data-table="t101_tagihan_trucking" data-field="x_Tagihan" name="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tagihan" id="x<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tagihan" size="30" placeholder="<?php echo HtmlEncode($t101_tagihan_trucking->Tagihan->getPlaceHolder()) ?>" value="<?php echo $t101_tagihan_trucking->Tagihan->EditValue ?>"<?php echo $t101_tagihan_trucking->Tagihan->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_tagihan_trucking" data-field="x_Tagihan" name="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tagihan" id="o<?php echo $t101_tagihan_trucking_list->RowIndex ?>_Tagihan" value="<?php echo HtmlEncode($t101_tagihan_trucking->Tagihan->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t101_tagihan_trucking_list->ListOptions->render("body", "right", $t101_tagihan_trucking_list->RowIndex);
?>
<script>
ft101_tagihan_truckinglist.updateLists(<?php echo $t101_tagihan_trucking_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($t101_tagihan_trucking->isAdd() || $t101_tagihan_trucking->isCopy()) { ?>
<input type="hidden" name="<?php echo $t101_tagihan_trucking_list->FormKeyCountName ?>" id="<?php echo $t101_tagihan_trucking_list->FormKeyCountName ?>" value="<?php echo $t101_tagihan_trucking_list->KeyCount ?>">
<?php } ?>
<?php if ($t101_tagihan_trucking->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t101_tagihan_trucking_list->FormKeyCountName ?>" id="<?php echo $t101_tagihan_trucking_list->FormKeyCountName ?>" value="<?php echo $t101_tagihan_trucking_list->KeyCount ?>">
<?php echo $t101_tagihan_trucking_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t101_tagihan_trucking->isEdit()) { ?>
<input type="hidden" name="<?php echo $t101_tagihan_trucking_list->FormKeyCountName ?>" id="<?php echo $t101_tagihan_trucking_list->FormKeyCountName ?>" value="<?php echo $t101_tagihan_trucking_list->KeyCount ?>">
<?php } ?>
<?php if ($t101_tagihan_trucking->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t101_tagihan_trucking_list->FormKeyCountName ?>" id="<?php echo $t101_tagihan_trucking_list->FormKeyCountName ?>" value="<?php echo $t101_tagihan_trucking_list->KeyCount ?>">
<?php echo $t101_tagihan_trucking_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t101_tagihan_trucking->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t101_tagihan_trucking_list->Recordset)
	$t101_tagihan_trucking_list->Recordset->Close();
?>
<?php if (!$t101_tagihan_trucking->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t101_tagihan_trucking->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t101_tagihan_trucking_list->Pager)) $t101_tagihan_trucking_list->Pager = new PrevNextPager($t101_tagihan_trucking_list->StartRec, $t101_tagihan_trucking_list->DisplayRecs, $t101_tagihan_trucking_list->TotalRecs, $t101_tagihan_trucking_list->AutoHidePager) ?>
<?php if ($t101_tagihan_trucking_list->Pager->RecordCount > 0 && $t101_tagihan_trucking_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t101_tagihan_trucking_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t101_tagihan_trucking_list->pageUrl() ?>start=<?php echo $t101_tagihan_trucking_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t101_tagihan_trucking_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t101_tagihan_trucking_list->pageUrl() ?>start=<?php echo $t101_tagihan_trucking_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t101_tagihan_trucking_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t101_tagihan_trucking_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t101_tagihan_trucking_list->pageUrl() ?>start=<?php echo $t101_tagihan_trucking_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t101_tagihan_trucking_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t101_tagihan_trucking_list->pageUrl() ?>start=<?php echo $t101_tagihan_trucking_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t101_tagihan_trucking_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t101_tagihan_trucking_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t101_tagihan_trucking_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t101_tagihan_trucking_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t101_tagihan_trucking_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t101_tagihan_trucking_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t101_tagihan_trucking_list->TotalRecs == 0 && !$t101_tagihan_trucking->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t101_tagihan_trucking_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t101_tagihan_trucking_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t101_tagihan_trucking->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t101_tagihan_trucking_list->terminate();
?>