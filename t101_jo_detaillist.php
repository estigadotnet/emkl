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
$t101_jo_detail_list = new t101_jo_detail_list();

// Run the page
$t101_jo_detail_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_jo_detail_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t101_jo_detail->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft101_jo_detaillist = currentForm = new ew.Form("ft101_jo_detaillist", "list");
ft101_jo_detaillist.formKeyCountName = '<?php echo $t101_jo_detail_list->FormKeyCountName ?>';

// Validate form
ft101_jo_detaillist.validate = function() {
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
		<?php if ($t101_jo_detail_list->TruckingVendor_id->Required) { ?>
			elm = this.getElements("x" + infix + "_TruckingVendor_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->TruckingVendor_id->caption(), $t101_jo_detail->TruckingVendor_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_list->Driver_id->Required) { ?>
			elm = this.getElements("x" + infix + "_Driver_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Driver_id->caption(), $t101_jo_detail->Driver_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_list->Tanggal_Stuffing->Required) { ?>
			elm = this.getElements("x" + infix + "_Tanggal_Stuffing");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Tanggal_Stuffing->caption(), $t101_jo_detail->Tanggal_Stuffing->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Tanggal_Stuffing");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t101_jo_detail->Tanggal_Stuffing->errorMessage()) ?>");
		<?php if ($t101_jo_detail_list->Nomor_Polisi_1->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Polisi_1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Nomor_Polisi_1->caption(), $t101_jo_detail->Nomor_Polisi_1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_list->Nomor_Polisi_2->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Polisi_2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Nomor_Polisi_2->caption(), $t101_jo_detail->Nomor_Polisi_2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_list->Nomor_Polisi_3->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Polisi_3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Nomor_Polisi_3->caption(), $t101_jo_detail->Nomor_Polisi_3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_list->Nomor_Container_1->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Container_1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Nomor_Container_1->caption(), $t101_jo_detail->Nomor_Container_1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_list->Nomor_Container_2->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_Container_2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Nomor_Container_2->caption(), $t101_jo_detail->Nomor_Container_2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_list->Ref_JOHead_id->Required) { ?>
			elm = this.getElements("x" + infix + "_Ref_JOHead_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->Ref_JOHead_id->caption(), $t101_jo_detail->Ref_JOHead_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_detail_list->No_Tagihan->Required) { ?>
			elm = this.getElements("x" + infix + "_No_Tagihan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_detail->No_Tagihan->caption(), $t101_jo_detail->No_Tagihan->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_No_Tagihan");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t101_jo_detail->No_Tagihan->errorMessage()) ?>");
		<?php if ($t101_jo_detail_list->Jumlah_Tagihan->Required) { ?>
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
	return true;
}

// Form_CustomValidate event
ft101_jo_detaillist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft101_jo_detaillist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft101_jo_detaillist.lists["x_TruckingVendor_id"] = <?php echo $t101_jo_detail_list->TruckingVendor_id->Lookup->toClientList() ?>;
ft101_jo_detaillist.lists["x_TruckingVendor_id"].options = <?php echo JsonEncode($t101_jo_detail_list->TruckingVendor_id->lookupOptions()) ?>;
ft101_jo_detaillist.lists["x_Driver_id"] = <?php echo $t101_jo_detail_list->Driver_id->Lookup->toClientList() ?>;
ft101_jo_detaillist.lists["x_Driver_id"].options = <?php echo JsonEncode($t101_jo_detail_list->Driver_id->lookupOptions()) ?>;
ft101_jo_detaillist.lists["x_Ref_JOHead_id"] = <?php echo $t101_jo_detail_list->Ref_JOHead_id->Lookup->toClientList() ?>;
ft101_jo_detaillist.lists["x_Ref_JOHead_id"].options = <?php echo JsonEncode($t101_jo_detail_list->Ref_JOHead_id->lookupOptions()) ?>;

// Form object for search
var ft101_jo_detaillistsrch = currentSearchForm = new ew.Form("ft101_jo_detaillistsrch");

// Filters
ft101_jo_detaillistsrch.filterList = <?php echo $t101_jo_detail_list->getFilterList() ?>;
</script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
	background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
	display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
	<div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
		<ul class="nav nav-tabs"></ul>
		<div class="tab-content"><!-- .tab-content -->
			<div class="tab-pane fade active show"></div>
		</div><!-- /.tab-content -->
	</div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script src="phpjs/ewpreview.js"></script>
<script>
ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "right" : "left";
ew.PREVIEW_SINGLE_ROW = false;
ew.PREVIEW_OVERLAY = false;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t101_jo_detail->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t101_jo_detail_list->TotalRecs > 0 && $t101_jo_detail_list->ExportOptions->visible()) { ?>
<?php $t101_jo_detail_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t101_jo_detail_list->ImportOptions->visible()) { ?>
<?php $t101_jo_detail_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t101_jo_detail_list->SearchOptions->visible()) { ?>
<?php $t101_jo_detail_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t101_jo_detail_list->FilterOptions->visible()) { ?>
<?php $t101_jo_detail_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$t101_jo_detail->isExport() || EXPORT_MASTER_RECORD && $t101_jo_detail->isExport("print")) { ?>
<?php
if ($t101_jo_detail_list->DbMasterFilter <> "" && $t101_jo_detail->getCurrentMasterTable() == "t101_jo_head") {
	if ($t101_jo_detail_list->MasterRecordExists) {
		include_once "t101_jo_headmaster.php";
	}
}
?>
<?php } ?>
<?php
$t101_jo_detail_list->renderOtherOptions();
?>
<?php if (!$t101_jo_detail->isExport() && !$t101_jo_detail->CurrentAction) { ?>
<form name="ft101_jo_detaillistsrch" id="ft101_jo_detaillistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t101_jo_detail_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft101_jo_detaillistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t101_jo_detail">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t101_jo_detail_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t101_jo_detail_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t101_jo_detail_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t101_jo_detail_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t101_jo_detail_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t101_jo_detail_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t101_jo_detail_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $t101_jo_detail_list->showPageHeader(); ?>
<?php
$t101_jo_detail_list->showMessage();
?>
<?php if ($t101_jo_detail_list->TotalRecs > 0 || $t101_jo_detail->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t101_jo_detail_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t101_jo_detail">
<form name="ft101_jo_detaillist" id="ft101_jo_detaillist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t101_jo_detail_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t101_jo_detail_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_jo_detail">
<?php if ($t101_jo_detail->getCurrentMasterTable() == "t101_jo_head" && $t101_jo_detail->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="t101_jo_head">
<input type="hidden" name="fk_id" value="<?php echo $t101_jo_detail->JOHead_id->getSessionValue() ?>">
<?php } ?>
<div id="gmp_t101_jo_detail" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t101_jo_detail_list->TotalRecs > 0 || $t101_jo_detail->isGridEdit()) { ?>
<table id="tbl_t101_jo_detaillist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t101_jo_detail_list->RowType = ROWTYPE_HEADER;

// Render list options
$t101_jo_detail_list->renderListOptions();

// Render list options (header, left)
$t101_jo_detail_list->ListOptions->render("header", "left");
?>
<?php if ($t101_jo_detail->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
	<?php if ($t101_jo_detail->sortUrl($t101_jo_detail->TruckingVendor_id) == "") { ?>
		<th data-name="TruckingVendor_id" class="<?php echo $t101_jo_detail->TruckingVendor_id->headerCellClass() ?>"><div id="elh_t101_jo_detail_TruckingVendor_id" class="t101_jo_detail_TruckingVendor_id"><div class="ew-table-header-caption"><?php echo $t101_jo_detail->TruckingVendor_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TruckingVendor_id" class="<?php echo $t101_jo_detail->TruckingVendor_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_jo_detail->SortUrl($t101_jo_detail->TruckingVendor_id) ?>',2);"><div id="elh_t101_jo_detail_TruckingVendor_id" class="t101_jo_detail_TruckingVendor_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_detail->TruckingVendor_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_detail->TruckingVendor_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_detail->TruckingVendor_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Driver_id->Visible) { // Driver_id ?>
	<?php if ($t101_jo_detail->sortUrl($t101_jo_detail->Driver_id) == "") { ?>
		<th data-name="Driver_id" class="<?php echo $t101_jo_detail->Driver_id->headerCellClass() ?>"><div id="elh_t101_jo_detail_Driver_id" class="t101_jo_detail_Driver_id"><div class="ew-table-header-caption"><?php echo $t101_jo_detail->Driver_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Driver_id" class="<?php echo $t101_jo_detail->Driver_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_jo_detail->SortUrl($t101_jo_detail->Driver_id) ?>',2);"><div id="elh_t101_jo_detail_Driver_id" class="t101_jo_detail_Driver_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_detail->Driver_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_detail->Driver_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_detail->Driver_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Tanggal_Stuffing->Visible) { // Tanggal_Stuffing ?>
	<?php if ($t101_jo_detail->sortUrl($t101_jo_detail->Tanggal_Stuffing) == "") { ?>
		<th data-name="Tanggal_Stuffing" class="<?php echo $t101_jo_detail->Tanggal_Stuffing->headerCellClass() ?>"><div id="elh_t101_jo_detail_Tanggal_Stuffing" class="t101_jo_detail_Tanggal_Stuffing"><div class="ew-table-header-caption"><?php echo $t101_jo_detail->Tanggal_Stuffing->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tanggal_Stuffing" class="<?php echo $t101_jo_detail->Tanggal_Stuffing->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_jo_detail->SortUrl($t101_jo_detail->Tanggal_Stuffing) ?>',2);"><div id="elh_t101_jo_detail_Tanggal_Stuffing" class="t101_jo_detail_Tanggal_Stuffing">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_detail->Tanggal_Stuffing->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_detail->Tanggal_Stuffing->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_detail->Tanggal_Stuffing->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_1->Visible) { // Nomor_Polisi_1 ?>
	<?php if ($t101_jo_detail->sortUrl($t101_jo_detail->Nomor_Polisi_1) == "") { ?>
		<th data-name="Nomor_Polisi_1" class="<?php echo $t101_jo_detail->Nomor_Polisi_1->headerCellClass() ?>"><div id="elh_t101_jo_detail_Nomor_Polisi_1" class="t101_jo_detail_Nomor_Polisi_1"><div class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Polisi_1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nomor_Polisi_1" class="<?php echo $t101_jo_detail->Nomor_Polisi_1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_jo_detail->SortUrl($t101_jo_detail->Nomor_Polisi_1) ?>',2);"><div id="elh_t101_jo_detail_Nomor_Polisi_1" class="t101_jo_detail_Nomor_Polisi_1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Polisi_1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_detail->Nomor_Polisi_1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_detail->Nomor_Polisi_1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_2->Visible) { // Nomor_Polisi_2 ?>
	<?php if ($t101_jo_detail->sortUrl($t101_jo_detail->Nomor_Polisi_2) == "") { ?>
		<th data-name="Nomor_Polisi_2" class="<?php echo $t101_jo_detail->Nomor_Polisi_2->headerCellClass() ?>"><div id="elh_t101_jo_detail_Nomor_Polisi_2" class="t101_jo_detail_Nomor_Polisi_2"><div class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Polisi_2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nomor_Polisi_2" class="<?php echo $t101_jo_detail->Nomor_Polisi_2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_jo_detail->SortUrl($t101_jo_detail->Nomor_Polisi_2) ?>',2);"><div id="elh_t101_jo_detail_Nomor_Polisi_2" class="t101_jo_detail_Nomor_Polisi_2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Polisi_2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_detail->Nomor_Polisi_2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_detail->Nomor_Polisi_2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_3->Visible) { // Nomor_Polisi_3 ?>
	<?php if ($t101_jo_detail->sortUrl($t101_jo_detail->Nomor_Polisi_3) == "") { ?>
		<th data-name="Nomor_Polisi_3" class="<?php echo $t101_jo_detail->Nomor_Polisi_3->headerCellClass() ?>"><div id="elh_t101_jo_detail_Nomor_Polisi_3" class="t101_jo_detail_Nomor_Polisi_3"><div class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Polisi_3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nomor_Polisi_3" class="<?php echo $t101_jo_detail->Nomor_Polisi_3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_jo_detail->SortUrl($t101_jo_detail->Nomor_Polisi_3) ?>',2);"><div id="elh_t101_jo_detail_Nomor_Polisi_3" class="t101_jo_detail_Nomor_Polisi_3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Polisi_3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_detail->Nomor_Polisi_3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_detail->Nomor_Polisi_3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
	<?php if ($t101_jo_detail->sortUrl($t101_jo_detail->Nomor_Container_1) == "") { ?>
		<th data-name="Nomor_Container_1" class="<?php echo $t101_jo_detail->Nomor_Container_1->headerCellClass() ?>"><div id="elh_t101_jo_detail_Nomor_Container_1" class="t101_jo_detail_Nomor_Container_1"><div class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Container_1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nomor_Container_1" class="<?php echo $t101_jo_detail->Nomor_Container_1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_jo_detail->SortUrl($t101_jo_detail->Nomor_Container_1) ?>',2);"><div id="elh_t101_jo_detail_Nomor_Container_1" class="t101_jo_detail_Nomor_Container_1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Container_1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_detail->Nomor_Container_1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_detail->Nomor_Container_1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
	<?php if ($t101_jo_detail->sortUrl($t101_jo_detail->Nomor_Container_2) == "") { ?>
		<th data-name="Nomor_Container_2" class="<?php echo $t101_jo_detail->Nomor_Container_2->headerCellClass() ?>"><div id="elh_t101_jo_detail_Nomor_Container_2" class="t101_jo_detail_Nomor_Container_2"><div class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Container_2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nomor_Container_2" class="<?php echo $t101_jo_detail->Nomor_Container_2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_jo_detail->SortUrl($t101_jo_detail->Nomor_Container_2) ?>',2);"><div id="elh_t101_jo_detail_Nomor_Container_2" class="t101_jo_detail_Nomor_Container_2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Container_2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_detail->Nomor_Container_2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_detail->Nomor_Container_2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Ref_JOHead_id->Visible) { // Ref_JOHead_id ?>
	<?php if ($t101_jo_detail->sortUrl($t101_jo_detail->Ref_JOHead_id) == "") { ?>
		<th data-name="Ref_JOHead_id" class="<?php echo $t101_jo_detail->Ref_JOHead_id->headerCellClass() ?>"><div id="elh_t101_jo_detail_Ref_JOHead_id" class="t101_jo_detail_Ref_JOHead_id"><div class="ew-table-header-caption"><?php echo $t101_jo_detail->Ref_JOHead_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Ref_JOHead_id" class="<?php echo $t101_jo_detail->Ref_JOHead_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_jo_detail->SortUrl($t101_jo_detail->Ref_JOHead_id) ?>',2);"><div id="elh_t101_jo_detail_Ref_JOHead_id" class="t101_jo_detail_Ref_JOHead_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_detail->Ref_JOHead_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_detail->Ref_JOHead_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_detail->Ref_JOHead_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->No_Tagihan->Visible) { // No_Tagihan ?>
	<?php if ($t101_jo_detail->sortUrl($t101_jo_detail->No_Tagihan) == "") { ?>
		<th data-name="No_Tagihan" class="<?php echo $t101_jo_detail->No_Tagihan->headerCellClass() ?>"><div id="elh_t101_jo_detail_No_Tagihan" class="t101_jo_detail_No_Tagihan"><div class="ew-table-header-caption"><?php echo $t101_jo_detail->No_Tagihan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="No_Tagihan" class="<?php echo $t101_jo_detail->No_Tagihan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_jo_detail->SortUrl($t101_jo_detail->No_Tagihan) ?>',2);"><div id="elh_t101_jo_detail_No_Tagihan" class="t101_jo_detail_No_Tagihan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_detail->No_Tagihan->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_detail->No_Tagihan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_detail->No_Tagihan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Jumlah_Tagihan->Visible) { // Jumlah_Tagihan ?>
	<?php if ($t101_jo_detail->sortUrl($t101_jo_detail->Jumlah_Tagihan) == "") { ?>
		<th data-name="Jumlah_Tagihan" class="<?php echo $t101_jo_detail->Jumlah_Tagihan->headerCellClass() ?>"><div id="elh_t101_jo_detail_Jumlah_Tagihan" class="t101_jo_detail_Jumlah_Tagihan"><div class="ew-table-header-caption"><?php echo $t101_jo_detail->Jumlah_Tagihan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jumlah_Tagihan" class="<?php echo $t101_jo_detail->Jumlah_Tagihan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_jo_detail->SortUrl($t101_jo_detail->Jumlah_Tagihan) ?>',2);"><div id="elh_t101_jo_detail_Jumlah_Tagihan" class="t101_jo_detail_Jumlah_Tagihan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_detail->Jumlah_Tagihan->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_detail->Jumlah_Tagihan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_detail->Jumlah_Tagihan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t101_jo_detail_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t101_jo_detail->ExportAll && $t101_jo_detail->isExport()) {
	$t101_jo_detail_list->StopRec = $t101_jo_detail_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t101_jo_detail_list->TotalRecs > $t101_jo_detail_list->StartRec + $t101_jo_detail_list->DisplayRecs - 1)
		$t101_jo_detail_list->StopRec = $t101_jo_detail_list->StartRec + $t101_jo_detail_list->DisplayRecs - 1;
	else
		$t101_jo_detail_list->StopRec = $t101_jo_detail_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $t101_jo_detail_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t101_jo_detail_list->FormKeyCountName) && ($t101_jo_detail->isGridAdd() || $t101_jo_detail->isGridEdit() || $t101_jo_detail->isConfirm())) {
		$t101_jo_detail_list->KeyCount = $CurrentForm->getValue($t101_jo_detail_list->FormKeyCountName);
		$t101_jo_detail_list->StopRec = $t101_jo_detail_list->StartRec + $t101_jo_detail_list->KeyCount - 1;
	}
}
$t101_jo_detail_list->RecCnt = $t101_jo_detail_list->StartRec - 1;
if ($t101_jo_detail_list->Recordset && !$t101_jo_detail_list->Recordset->EOF) {
	$t101_jo_detail_list->Recordset->moveFirst();
	$selectLimit = $t101_jo_detail_list->UseSelectLimit;
	if (!$selectLimit && $t101_jo_detail_list->StartRec > 1)
		$t101_jo_detail_list->Recordset->move($t101_jo_detail_list->StartRec - 1);
} elseif (!$t101_jo_detail->AllowAddDeleteRow && $t101_jo_detail_list->StopRec == 0) {
	$t101_jo_detail_list->StopRec = $t101_jo_detail->GridAddRowCount;
}

// Initialize aggregate
$t101_jo_detail->RowType = ROWTYPE_AGGREGATEINIT;
$t101_jo_detail->resetAttributes();
$t101_jo_detail_list->renderRow();
$t101_jo_detail_list->EditRowCnt = 0;
if ($t101_jo_detail->isEdit())
	$t101_jo_detail_list->RowIndex = 1;
if ($t101_jo_detail->isGridEdit())
	$t101_jo_detail_list->RowIndex = 0;
while ($t101_jo_detail_list->RecCnt < $t101_jo_detail_list->StopRec) {
	$t101_jo_detail_list->RecCnt++;
	if ($t101_jo_detail_list->RecCnt >= $t101_jo_detail_list->StartRec) {
		$t101_jo_detail_list->RowCnt++;
		if ($t101_jo_detail->isGridAdd() || $t101_jo_detail->isGridEdit() || $t101_jo_detail->isConfirm()) {
			$t101_jo_detail_list->RowIndex++;
			$CurrentForm->Index = $t101_jo_detail_list->RowIndex;
			if ($CurrentForm->hasValue($t101_jo_detail_list->FormActionName) && $t101_jo_detail_list->EventCancelled)
				$t101_jo_detail_list->RowAction = strval($CurrentForm->getValue($t101_jo_detail_list->FormActionName));
			elseif ($t101_jo_detail->isGridAdd())
				$t101_jo_detail_list->RowAction = "insert";
			else
				$t101_jo_detail_list->RowAction = "";
		}

		// Set up key count
		$t101_jo_detail_list->KeyCount = $t101_jo_detail_list->RowIndex;

		// Init row class and style
		$t101_jo_detail->resetAttributes();
		$t101_jo_detail->CssClass = "";
		if ($t101_jo_detail->isGridAdd()) {
			$t101_jo_detail_list->loadRowValues(); // Load default values
		} else {
			$t101_jo_detail_list->loadRowValues($t101_jo_detail_list->Recordset); // Load row values
		}
		$t101_jo_detail->RowType = ROWTYPE_VIEW; // Render view
		if ($t101_jo_detail->isEdit()) {
			if ($t101_jo_detail_list->checkInlineEditKey() && $t101_jo_detail_list->EditRowCnt == 0) { // Inline edit
				$t101_jo_detail->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($t101_jo_detail->isGridEdit()) { // Grid edit
			if ($t101_jo_detail->EventCancelled)
				$t101_jo_detail_list->restoreCurrentRowFormValues($t101_jo_detail_list->RowIndex); // Restore form values
			if ($t101_jo_detail_list->RowAction == "insert")
				$t101_jo_detail->RowType = ROWTYPE_ADD; // Render add
			else
				$t101_jo_detail->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t101_jo_detail->isEdit() && $t101_jo_detail->RowType == ROWTYPE_EDIT && $t101_jo_detail->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$t101_jo_detail_list->restoreFormValues(); // Restore form values
		}
		if ($t101_jo_detail->isGridEdit() && ($t101_jo_detail->RowType == ROWTYPE_EDIT || $t101_jo_detail->RowType == ROWTYPE_ADD) && $t101_jo_detail->EventCancelled) // Update failed
			$t101_jo_detail_list->restoreCurrentRowFormValues($t101_jo_detail_list->RowIndex); // Restore form values
		if ($t101_jo_detail->RowType == ROWTYPE_EDIT) // Edit row
			$t101_jo_detail_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$t101_jo_detail->RowAttrs = array_merge($t101_jo_detail->RowAttrs, array('data-rowindex'=>$t101_jo_detail_list->RowCnt, 'id'=>'r' . $t101_jo_detail_list->RowCnt . '_t101_jo_detail', 'data-rowtype'=>$t101_jo_detail->RowType));

		// Render row
		$t101_jo_detail_list->renderRow();

		// Render list options
		$t101_jo_detail_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t101_jo_detail_list->RowAction <> "delete" && $t101_jo_detail_list->RowAction <> "insertdelete" && !($t101_jo_detail_list->RowAction == "insert" && $t101_jo_detail->isConfirm() && $t101_jo_detail_list->emptyRow())) {
?>
	<tr<?php echo $t101_jo_detail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t101_jo_detail_list->ListOptions->render("body", "left", $t101_jo_detail_list->RowCnt);
?>
	<?php if ($t101_jo_detail->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
		<td data-name="TruckingVendor_id"<?php echo $t101_jo_detail->TruckingVendor_id->cellAttributes() ?>>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_TruckingVendor_id" class="form-group t101_jo_detail_TruckingVendor_id">
<?php $t101_jo_detail->TruckingVendor_id->EditAttrs["onchange"] = "ew.updateOptions.call(this);" . @$t101_jo_detail->TruckingVendor_id->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_detail" data-field="x_TruckingVendor_id" data-value-separator="<?php echo $t101_jo_detail->TruckingVendor_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_TruckingVendor_id" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_TruckingVendor_id"<?php echo $t101_jo_detail->TruckingVendor_id->editAttributes() ?>>
		<?php echo $t101_jo_detail->TruckingVendor_id->selectOptionListHtml("x<?php echo $t101_jo_detail_list->RowIndex ?>_TruckingVendor_id") ?>
	</select>
</div>
<?php echo $t101_jo_detail->TruckingVendor_id->Lookup->getParamTag("p_x" . $t101_jo_detail_list->RowIndex . "_TruckingVendor_id") ?>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_TruckingVendor_id" name="o<?php echo $t101_jo_detail_list->RowIndex ?>_TruckingVendor_id" id="o<?php echo $t101_jo_detail_list->RowIndex ?>_TruckingVendor_id" value="<?php echo HtmlEncode($t101_jo_detail->TruckingVendor_id->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_TruckingVendor_id" class="form-group t101_jo_detail_TruckingVendor_id">
<?php $t101_jo_detail->TruckingVendor_id->EditAttrs["onchange"] = "ew.updateOptions.call(this);" . @$t101_jo_detail->TruckingVendor_id->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_detail" data-field="x_TruckingVendor_id" data-value-separator="<?php echo $t101_jo_detail->TruckingVendor_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_TruckingVendor_id" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_TruckingVendor_id"<?php echo $t101_jo_detail->TruckingVendor_id->editAttributes() ?>>
		<?php echo $t101_jo_detail->TruckingVendor_id->selectOptionListHtml("x<?php echo $t101_jo_detail_list->RowIndex ?>_TruckingVendor_id") ?>
	</select>
</div>
<?php echo $t101_jo_detail->TruckingVendor_id->Lookup->getParamTag("p_x" . $t101_jo_detail_list->RowIndex . "_TruckingVendor_id") ?>
</span>
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_TruckingVendor_id" class="t101_jo_detail_TruckingVendor_id">
<span<?php echo $t101_jo_detail->TruckingVendor_id->viewAttributes() ?>>
<?php echo $t101_jo_detail->TruckingVendor_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_id" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_id" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t101_jo_detail->id->CurrentValue) ?>">
<input type="hidden" data-table="t101_jo_detail" data-field="x_id" name="o<?php echo $t101_jo_detail_list->RowIndex ?>_id" id="o<?php echo $t101_jo_detail_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t101_jo_detail->id->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT || $t101_jo_detail->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t101_jo_detail" data-field="x_id" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_id" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t101_jo_detail->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t101_jo_detail->Driver_id->Visible) { // Driver_id ?>
		<td data-name="Driver_id"<?php echo $t101_jo_detail->Driver_id->cellAttributes() ?>>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Driver_id" class="form-group t101_jo_detail_Driver_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_detail" data-field="x_Driver_id" data-value-separator="<?php echo $t101_jo_detail->Driver_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Driver_id" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Driver_id"<?php echo $t101_jo_detail->Driver_id->editAttributes() ?>>
		<?php echo $t101_jo_detail->Driver_id->selectOptionListHtml("x<?php echo $t101_jo_detail_list->RowIndex ?>_Driver_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t101_jo_detail_list->RowIndex ?>_Driver_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_jo_detail->Driver_id->caption() ?>" data-title="<?php echo $t101_jo_detail->Driver_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t101_jo_detail_list->RowIndex ?>_Driver_id',url:'t005_driveraddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_jo_detail->Driver_id->Lookup->getParamTag("p_x" . $t101_jo_detail_list->RowIndex . "_Driver_id") ?>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Driver_id" name="o<?php echo $t101_jo_detail_list->RowIndex ?>_Driver_id" id="o<?php echo $t101_jo_detail_list->RowIndex ?>_Driver_id" value="<?php echo HtmlEncode($t101_jo_detail->Driver_id->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Driver_id" class="form-group t101_jo_detail_Driver_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_detail" data-field="x_Driver_id" data-value-separator="<?php echo $t101_jo_detail->Driver_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Driver_id" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Driver_id"<?php echo $t101_jo_detail->Driver_id->editAttributes() ?>>
		<?php echo $t101_jo_detail->Driver_id->selectOptionListHtml("x<?php echo $t101_jo_detail_list->RowIndex ?>_Driver_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t101_jo_detail_list->RowIndex ?>_Driver_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_jo_detail->Driver_id->caption() ?>" data-title="<?php echo $t101_jo_detail->Driver_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t101_jo_detail_list->RowIndex ?>_Driver_id',url:'t005_driveraddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_jo_detail->Driver_id->Lookup->getParamTag("p_x" . $t101_jo_detail_list->RowIndex . "_Driver_id") ?>
</span>
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Driver_id" class="t101_jo_detail_Driver_id">
<span<?php echo $t101_jo_detail->Driver_id->viewAttributes() ?>>
<?php echo $t101_jo_detail->Driver_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Tanggal_Stuffing->Visible) { // Tanggal_Stuffing ?>
		<td data-name="Tanggal_Stuffing"<?php echo $t101_jo_detail->Tanggal_Stuffing->cellAttributes() ?>>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Tanggal_Stuffing" class="form-group t101_jo_detail_Tanggal_Stuffing">
<input type="text" data-table="t101_jo_detail" data-field="x_Tanggal_Stuffing" data-format="11" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Tanggal_Stuffing" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Tanggal_Stuffing" size="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Tanggal_Stuffing->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Tanggal_Stuffing->EditValue ?>"<?php echo $t101_jo_detail->Tanggal_Stuffing->editAttributes() ?>>
<?php if (!$t101_jo_detail->Tanggal_Stuffing->ReadOnly && !$t101_jo_detail->Tanggal_Stuffing->Disabled && !isset($t101_jo_detail->Tanggal_Stuffing->EditAttrs["readonly"]) && !isset($t101_jo_detail->Tanggal_Stuffing->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft101_jo_detaillist", "x<?php echo $t101_jo_detail_list->RowIndex ?>_Tanggal_Stuffing", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Tanggal_Stuffing" name="o<?php echo $t101_jo_detail_list->RowIndex ?>_Tanggal_Stuffing" id="o<?php echo $t101_jo_detail_list->RowIndex ?>_Tanggal_Stuffing" value="<?php echo HtmlEncode($t101_jo_detail->Tanggal_Stuffing->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Tanggal_Stuffing" class="form-group t101_jo_detail_Tanggal_Stuffing">
<input type="text" data-table="t101_jo_detail" data-field="x_Tanggal_Stuffing" data-format="11" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Tanggal_Stuffing" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Tanggal_Stuffing" size="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Tanggal_Stuffing->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Tanggal_Stuffing->EditValue ?>"<?php echo $t101_jo_detail->Tanggal_Stuffing->editAttributes() ?>>
<?php if (!$t101_jo_detail->Tanggal_Stuffing->ReadOnly && !$t101_jo_detail->Tanggal_Stuffing->Disabled && !isset($t101_jo_detail->Tanggal_Stuffing->EditAttrs["readonly"]) && !isset($t101_jo_detail->Tanggal_Stuffing->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft101_jo_detaillist", "x<?php echo $t101_jo_detail_list->RowIndex ?>_Tanggal_Stuffing", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Tanggal_Stuffing" class="t101_jo_detail_Tanggal_Stuffing">
<span<?php echo $t101_jo_detail->Tanggal_Stuffing->viewAttributes() ?>>
<?php echo $t101_jo_detail->Tanggal_Stuffing->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Polisi_1->Visible) { // Nomor_Polisi_1 ?>
		<td data-name="Nomor_Polisi_1"<?php echo $t101_jo_detail->Nomor_Polisi_1->cellAttributes() ?>>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Nomor_Polisi_1" class="form-group t101_jo_detail_Nomor_Polisi_1">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_1" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_1" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_1" size="1" maxlength="5" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_1->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_1->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_1->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_1" name="o<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_1" id="o<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_1" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_1->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Nomor_Polisi_1" class="form-group t101_jo_detail_Nomor_Polisi_1">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_1" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_1" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_1" size="1" maxlength="5" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_1->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_1->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Nomor_Polisi_1" class="t101_jo_detail_Nomor_Polisi_1">
<span<?php echo $t101_jo_detail->Nomor_Polisi_1->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Polisi_1->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Polisi_2->Visible) { // Nomor_Polisi_2 ?>
		<td data-name="Nomor_Polisi_2"<?php echo $t101_jo_detail->Nomor_Polisi_2->cellAttributes() ?>>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Nomor_Polisi_2" class="form-group t101_jo_detail_Nomor_Polisi_2">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_2" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_2" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_2" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_2->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_2->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_2->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_2" name="o<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_2" id="o<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_2" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_2->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Nomor_Polisi_2" class="form-group t101_jo_detail_Nomor_Polisi_2">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_2" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_2" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_2" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_2->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_2->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Nomor_Polisi_2" class="t101_jo_detail_Nomor_Polisi_2">
<span<?php echo $t101_jo_detail->Nomor_Polisi_2->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Polisi_2->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Polisi_3->Visible) { // Nomor_Polisi_3 ?>
		<td data-name="Nomor_Polisi_3"<?php echo $t101_jo_detail->Nomor_Polisi_3->cellAttributes() ?>>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Nomor_Polisi_3" class="form-group t101_jo_detail_Nomor_Polisi_3">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_3" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_3" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_3" size="5" maxlength="5" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_3->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_3->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_3->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_3" name="o<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_3" id="o<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_3" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_3->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Nomor_Polisi_3" class="form-group t101_jo_detail_Nomor_Polisi_3">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_3" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_3" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_3" size="5" maxlength="5" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_3->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_3->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_3->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Nomor_Polisi_3" class="t101_jo_detail_Nomor_Polisi_3">
<span<?php echo $t101_jo_detail->Nomor_Polisi_3->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Polisi_3->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
		<td data-name="Nomor_Container_1"<?php echo $t101_jo_detail->Nomor_Container_1->cellAttributes() ?>>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Nomor_Container_1" class="form-group t101_jo_detail_Nomor_Container_1">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Container_1" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Container_1" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Container_1" size="5" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_1->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Container_1->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Container_1->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Container_1" name="o<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Container_1" id="o<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Container_1" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_1->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Nomor_Container_1" class="form-group t101_jo_detail_Nomor_Container_1">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Container_1" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Container_1" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Container_1" size="5" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_1->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Container_1->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Container_1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Nomor_Container_1" class="t101_jo_detail_Nomor_Container_1">
<span<?php echo $t101_jo_detail->Nomor_Container_1->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Container_1->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
		<td data-name="Nomor_Container_2"<?php echo $t101_jo_detail->Nomor_Container_2->cellAttributes() ?>>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Nomor_Container_2" class="form-group t101_jo_detail_Nomor_Container_2">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Container_2" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Container_2" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Container_2" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_2->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Container_2->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Container_2->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Container_2" name="o<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Container_2" id="o<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Container_2" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_2->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Nomor_Container_2" class="form-group t101_jo_detail_Nomor_Container_2">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Container_2" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Container_2" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Container_2" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_2->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Container_2->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Container_2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Nomor_Container_2" class="t101_jo_detail_Nomor_Container_2">
<span<?php echo $t101_jo_detail->Nomor_Container_2->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Container_2->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Ref_JOHead_id->Visible) { // Ref_JOHead_id ?>
		<td data-name="Ref_JOHead_id"<?php echo $t101_jo_detail->Ref_JOHead_id->cellAttributes() ?>>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Ref_JOHead_id" class="form-group t101_jo_detail_Ref_JOHead_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_detail" data-field="x_Ref_JOHead_id" data-value-separator="<?php echo $t101_jo_detail->Ref_JOHead_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Ref_JOHead_id" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Ref_JOHead_id"<?php echo $t101_jo_detail->Ref_JOHead_id->editAttributes() ?>>
		<?php echo $t101_jo_detail->Ref_JOHead_id->selectOptionListHtml("x<?php echo $t101_jo_detail_list->RowIndex ?>_Ref_JOHead_id") ?>
	</select>
</div>
<?php echo $t101_jo_detail->Ref_JOHead_id->Lookup->getParamTag("p_x" . $t101_jo_detail_list->RowIndex . "_Ref_JOHead_id") ?>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Ref_JOHead_id" name="o<?php echo $t101_jo_detail_list->RowIndex ?>_Ref_JOHead_id" id="o<?php echo $t101_jo_detail_list->RowIndex ?>_Ref_JOHead_id" value="<?php echo HtmlEncode($t101_jo_detail->Ref_JOHead_id->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Ref_JOHead_id" class="form-group t101_jo_detail_Ref_JOHead_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_detail" data-field="x_Ref_JOHead_id" data-value-separator="<?php echo $t101_jo_detail->Ref_JOHead_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Ref_JOHead_id" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Ref_JOHead_id"<?php echo $t101_jo_detail->Ref_JOHead_id->editAttributes() ?>>
		<?php echo $t101_jo_detail->Ref_JOHead_id->selectOptionListHtml("x<?php echo $t101_jo_detail_list->RowIndex ?>_Ref_JOHead_id") ?>
	</select>
</div>
<?php echo $t101_jo_detail->Ref_JOHead_id->Lookup->getParamTag("p_x" . $t101_jo_detail_list->RowIndex . "_Ref_JOHead_id") ?>
</span>
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Ref_JOHead_id" class="t101_jo_detail_Ref_JOHead_id">
<span<?php echo $t101_jo_detail->Ref_JOHead_id->viewAttributes() ?>>
<?php echo $t101_jo_detail->Ref_JOHead_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->No_Tagihan->Visible) { // No_Tagihan ?>
		<td data-name="No_Tagihan"<?php echo $t101_jo_detail->No_Tagihan->cellAttributes() ?>>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_No_Tagihan" class="form-group t101_jo_detail_No_Tagihan">
<input type="text" data-table="t101_jo_detail" data-field="x_No_Tagihan" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_No_Tagihan" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_No_Tagihan" size="5" placeholder="<?php echo HtmlEncode($t101_jo_detail->No_Tagihan->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->No_Tagihan->EditValue ?>"<?php echo $t101_jo_detail->No_Tagihan->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_No_Tagihan" name="o<?php echo $t101_jo_detail_list->RowIndex ?>_No_Tagihan" id="o<?php echo $t101_jo_detail_list->RowIndex ?>_No_Tagihan" value="<?php echo HtmlEncode($t101_jo_detail->No_Tagihan->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_No_Tagihan" class="form-group t101_jo_detail_No_Tagihan">
<input type="text" data-table="t101_jo_detail" data-field="x_No_Tagihan" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_No_Tagihan" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_No_Tagihan" size="5" placeholder="<?php echo HtmlEncode($t101_jo_detail->No_Tagihan->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->No_Tagihan->EditValue ?>"<?php echo $t101_jo_detail->No_Tagihan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_No_Tagihan" class="t101_jo_detail_No_Tagihan">
<span<?php echo $t101_jo_detail->No_Tagihan->viewAttributes() ?>>
<?php echo $t101_jo_detail->No_Tagihan->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Jumlah_Tagihan->Visible) { // Jumlah_Tagihan ?>
		<td data-name="Jumlah_Tagihan"<?php echo $t101_jo_detail->Jumlah_Tagihan->cellAttributes() ?>>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Jumlah_Tagihan" class="form-group t101_jo_detail_Jumlah_Tagihan">
<input type="text" data-table="t101_jo_detail" data-field="x_Jumlah_Tagihan" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Jumlah_Tagihan" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Jumlah_Tagihan" size="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Jumlah_Tagihan->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Jumlah_Tagihan->EditValue ?>"<?php echo $t101_jo_detail->Jumlah_Tagihan->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Jumlah_Tagihan" name="o<?php echo $t101_jo_detail_list->RowIndex ?>_Jumlah_Tagihan" id="o<?php echo $t101_jo_detail_list->RowIndex ?>_Jumlah_Tagihan" value="<?php echo HtmlEncode($t101_jo_detail->Jumlah_Tagihan->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Jumlah_Tagihan" class="form-group t101_jo_detail_Jumlah_Tagihan">
<input type="text" data-table="t101_jo_detail" data-field="x_Jumlah_Tagihan" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Jumlah_Tagihan" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Jumlah_Tagihan" size="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Jumlah_Tagihan->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Jumlah_Tagihan->EditValue ?>"<?php echo $t101_jo_detail->Jumlah_Tagihan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_jo_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Jumlah_Tagihan" class="t101_jo_detail_Jumlah_Tagihan">
<span<?php echo $t101_jo_detail->Jumlah_Tagihan->viewAttributes() ?>>
<?php echo $t101_jo_detail->Jumlah_Tagihan->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t101_jo_detail_list->ListOptions->render("body", "right", $t101_jo_detail_list->RowCnt);
?>
	</tr>
<?php if ($t101_jo_detail->RowType == ROWTYPE_ADD || $t101_jo_detail->RowType == ROWTYPE_EDIT) { ?>
<script>
ft101_jo_detaillist.updateLists(<?php echo $t101_jo_detail_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t101_jo_detail->isGridAdd())
		if (!$t101_jo_detail_list->Recordset->EOF)
			$t101_jo_detail_list->Recordset->moveNext();
}
?>
<?php
	if ($t101_jo_detail->isGridAdd() || $t101_jo_detail->isGridEdit()) {
		$t101_jo_detail_list->RowIndex = '$rowindex$';
		$t101_jo_detail_list->loadRowValues();

		// Set row properties
		$t101_jo_detail->resetAttributes();
		$t101_jo_detail->RowAttrs = array_merge($t101_jo_detail->RowAttrs, array('data-rowindex'=>$t101_jo_detail_list->RowIndex, 'id'=>'r0_t101_jo_detail', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($t101_jo_detail->RowAttrs["class"], "ew-template");
		$t101_jo_detail->RowType = ROWTYPE_ADD;

		// Render row
		$t101_jo_detail_list->renderRow();

		// Render list options
		$t101_jo_detail_list->renderListOptions();
		$t101_jo_detail_list->StartRowCnt = 0;
?>
	<tr<?php echo $t101_jo_detail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t101_jo_detail_list->ListOptions->render("body", "left", $t101_jo_detail_list->RowIndex);
?>
	<?php if ($t101_jo_detail->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
		<td data-name="TruckingVendor_id">
<span id="el$rowindex$_t101_jo_detail_TruckingVendor_id" class="form-group t101_jo_detail_TruckingVendor_id">
<?php $t101_jo_detail->TruckingVendor_id->EditAttrs["onchange"] = "ew.updateOptions.call(this);" . @$t101_jo_detail->TruckingVendor_id->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_detail" data-field="x_TruckingVendor_id" data-value-separator="<?php echo $t101_jo_detail->TruckingVendor_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_TruckingVendor_id" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_TruckingVendor_id"<?php echo $t101_jo_detail->TruckingVendor_id->editAttributes() ?>>
		<?php echo $t101_jo_detail->TruckingVendor_id->selectOptionListHtml("x<?php echo $t101_jo_detail_list->RowIndex ?>_TruckingVendor_id") ?>
	</select>
</div>
<?php echo $t101_jo_detail->TruckingVendor_id->Lookup->getParamTag("p_x" . $t101_jo_detail_list->RowIndex . "_TruckingVendor_id") ?>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_TruckingVendor_id" name="o<?php echo $t101_jo_detail_list->RowIndex ?>_TruckingVendor_id" id="o<?php echo $t101_jo_detail_list->RowIndex ?>_TruckingVendor_id" value="<?php echo HtmlEncode($t101_jo_detail->TruckingVendor_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Driver_id->Visible) { // Driver_id ?>
		<td data-name="Driver_id">
<span id="el$rowindex$_t101_jo_detail_Driver_id" class="form-group t101_jo_detail_Driver_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_detail" data-field="x_Driver_id" data-value-separator="<?php echo $t101_jo_detail->Driver_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Driver_id" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Driver_id"<?php echo $t101_jo_detail->Driver_id->editAttributes() ?>>
		<?php echo $t101_jo_detail->Driver_id->selectOptionListHtml("x<?php echo $t101_jo_detail_list->RowIndex ?>_Driver_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t101_jo_detail_list->RowIndex ?>_Driver_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_jo_detail->Driver_id->caption() ?>" data-title="<?php echo $t101_jo_detail->Driver_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t101_jo_detail_list->RowIndex ?>_Driver_id',url:'t005_driveraddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_jo_detail->Driver_id->Lookup->getParamTag("p_x" . $t101_jo_detail_list->RowIndex . "_Driver_id") ?>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Driver_id" name="o<?php echo $t101_jo_detail_list->RowIndex ?>_Driver_id" id="o<?php echo $t101_jo_detail_list->RowIndex ?>_Driver_id" value="<?php echo HtmlEncode($t101_jo_detail->Driver_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Tanggal_Stuffing->Visible) { // Tanggal_Stuffing ?>
		<td data-name="Tanggal_Stuffing">
<span id="el$rowindex$_t101_jo_detail_Tanggal_Stuffing" class="form-group t101_jo_detail_Tanggal_Stuffing">
<input type="text" data-table="t101_jo_detail" data-field="x_Tanggal_Stuffing" data-format="11" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Tanggal_Stuffing" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Tanggal_Stuffing" size="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Tanggal_Stuffing->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Tanggal_Stuffing->EditValue ?>"<?php echo $t101_jo_detail->Tanggal_Stuffing->editAttributes() ?>>
<?php if (!$t101_jo_detail->Tanggal_Stuffing->ReadOnly && !$t101_jo_detail->Tanggal_Stuffing->Disabled && !isset($t101_jo_detail->Tanggal_Stuffing->EditAttrs["readonly"]) && !isset($t101_jo_detail->Tanggal_Stuffing->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft101_jo_detaillist", "x<?php echo $t101_jo_detail_list->RowIndex ?>_Tanggal_Stuffing", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Tanggal_Stuffing" name="o<?php echo $t101_jo_detail_list->RowIndex ?>_Tanggal_Stuffing" id="o<?php echo $t101_jo_detail_list->RowIndex ?>_Tanggal_Stuffing" value="<?php echo HtmlEncode($t101_jo_detail->Tanggal_Stuffing->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Polisi_1->Visible) { // Nomor_Polisi_1 ?>
		<td data-name="Nomor_Polisi_1">
<span id="el$rowindex$_t101_jo_detail_Nomor_Polisi_1" class="form-group t101_jo_detail_Nomor_Polisi_1">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_1" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_1" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_1" size="1" maxlength="5" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_1->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_1->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_1->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_1" name="o<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_1" id="o<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_1" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Polisi_2->Visible) { // Nomor_Polisi_2 ?>
		<td data-name="Nomor_Polisi_2">
<span id="el$rowindex$_t101_jo_detail_Nomor_Polisi_2" class="form-group t101_jo_detail_Nomor_Polisi_2">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_2" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_2" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_2" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_2->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_2->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_2->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_2" name="o<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_2" id="o<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_2" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Polisi_3->Visible) { // Nomor_Polisi_3 ?>
		<td data-name="Nomor_Polisi_3">
<span id="el$rowindex$_t101_jo_detail_Nomor_Polisi_3" class="form-group t101_jo_detail_Nomor_Polisi_3">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_3" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_3" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_3" size="5" maxlength="5" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_3->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Polisi_3->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Polisi_3->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Polisi_3" name="o<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_3" id="o<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Polisi_3" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Polisi_3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
		<td data-name="Nomor_Container_1">
<span id="el$rowindex$_t101_jo_detail_Nomor_Container_1" class="form-group t101_jo_detail_Nomor_Container_1">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Container_1" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Container_1" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Container_1" size="5" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_1->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Container_1->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Container_1->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Container_1" name="o<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Container_1" id="o<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Container_1" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
		<td data-name="Nomor_Container_2">
<span id="el$rowindex$_t101_jo_detail_Nomor_Container_2" class="form-group t101_jo_detail_Nomor_Container_2">
<input type="text" data-table="t101_jo_detail" data-field="x_Nomor_Container_2" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Container_2" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Container_2" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_2->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Nomor_Container_2->EditValue ?>"<?php echo $t101_jo_detail->Nomor_Container_2->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Nomor_Container_2" name="o<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Container_2" id="o<?php echo $t101_jo_detail_list->RowIndex ?>_Nomor_Container_2" value="<?php echo HtmlEncode($t101_jo_detail->Nomor_Container_2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Ref_JOHead_id->Visible) { // Ref_JOHead_id ?>
		<td data-name="Ref_JOHead_id">
<span id="el$rowindex$_t101_jo_detail_Ref_JOHead_id" class="form-group t101_jo_detail_Ref_JOHead_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_detail" data-field="x_Ref_JOHead_id" data-value-separator="<?php echo $t101_jo_detail->Ref_JOHead_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Ref_JOHead_id" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Ref_JOHead_id"<?php echo $t101_jo_detail->Ref_JOHead_id->editAttributes() ?>>
		<?php echo $t101_jo_detail->Ref_JOHead_id->selectOptionListHtml("x<?php echo $t101_jo_detail_list->RowIndex ?>_Ref_JOHead_id") ?>
	</select>
</div>
<?php echo $t101_jo_detail->Ref_JOHead_id->Lookup->getParamTag("p_x" . $t101_jo_detail_list->RowIndex . "_Ref_JOHead_id") ?>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Ref_JOHead_id" name="o<?php echo $t101_jo_detail_list->RowIndex ?>_Ref_JOHead_id" id="o<?php echo $t101_jo_detail_list->RowIndex ?>_Ref_JOHead_id" value="<?php echo HtmlEncode($t101_jo_detail->Ref_JOHead_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->No_Tagihan->Visible) { // No_Tagihan ?>
		<td data-name="No_Tagihan">
<span id="el$rowindex$_t101_jo_detail_No_Tagihan" class="form-group t101_jo_detail_No_Tagihan">
<input type="text" data-table="t101_jo_detail" data-field="x_No_Tagihan" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_No_Tagihan" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_No_Tagihan" size="5" placeholder="<?php echo HtmlEncode($t101_jo_detail->No_Tagihan->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->No_Tagihan->EditValue ?>"<?php echo $t101_jo_detail->No_Tagihan->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_No_Tagihan" name="o<?php echo $t101_jo_detail_list->RowIndex ?>_No_Tagihan" id="o<?php echo $t101_jo_detail_list->RowIndex ?>_No_Tagihan" value="<?php echo HtmlEncode($t101_jo_detail->No_Tagihan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Jumlah_Tagihan->Visible) { // Jumlah_Tagihan ?>
		<td data-name="Jumlah_Tagihan">
<span id="el$rowindex$_t101_jo_detail_Jumlah_Tagihan" class="form-group t101_jo_detail_Jumlah_Tagihan">
<input type="text" data-table="t101_jo_detail" data-field="x_Jumlah_Tagihan" name="x<?php echo $t101_jo_detail_list->RowIndex ?>_Jumlah_Tagihan" id="x<?php echo $t101_jo_detail_list->RowIndex ?>_Jumlah_Tagihan" size="10" placeholder="<?php echo HtmlEncode($t101_jo_detail->Jumlah_Tagihan->getPlaceHolder()) ?>" value="<?php echo $t101_jo_detail->Jumlah_Tagihan->EditValue ?>"<?php echo $t101_jo_detail->Jumlah_Tagihan->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_detail" data-field="x_Jumlah_Tagihan" name="o<?php echo $t101_jo_detail_list->RowIndex ?>_Jumlah_Tagihan" id="o<?php echo $t101_jo_detail_list->RowIndex ?>_Jumlah_Tagihan" value="<?php echo HtmlEncode($t101_jo_detail->Jumlah_Tagihan->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t101_jo_detail_list->ListOptions->render("body", "right", $t101_jo_detail_list->RowIndex);
?>
<script>
ft101_jo_detaillist.updateLists(<?php echo $t101_jo_detail_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($t101_jo_detail->isEdit()) { ?>
<input type="hidden" name="<?php echo $t101_jo_detail_list->FormKeyCountName ?>" id="<?php echo $t101_jo_detail_list->FormKeyCountName ?>" value="<?php echo $t101_jo_detail_list->KeyCount ?>">
<?php } ?>
<?php if ($t101_jo_detail->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t101_jo_detail_list->FormKeyCountName ?>" id="<?php echo $t101_jo_detail_list->FormKeyCountName ?>" value="<?php echo $t101_jo_detail_list->KeyCount ?>">
<?php echo $t101_jo_detail_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t101_jo_detail->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t101_jo_detail_list->Recordset)
	$t101_jo_detail_list->Recordset->Close();
?>
<?php if (!$t101_jo_detail->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t101_jo_detail->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t101_jo_detail_list->Pager)) $t101_jo_detail_list->Pager = new PrevNextPager($t101_jo_detail_list->StartRec, $t101_jo_detail_list->DisplayRecs, $t101_jo_detail_list->TotalRecs, $t101_jo_detail_list->AutoHidePager) ?>
<?php if ($t101_jo_detail_list->Pager->RecordCount > 0 && $t101_jo_detail_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t101_jo_detail_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t101_jo_detail_list->pageUrl() ?>start=<?php echo $t101_jo_detail_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t101_jo_detail_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t101_jo_detail_list->pageUrl() ?>start=<?php echo $t101_jo_detail_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t101_jo_detail_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t101_jo_detail_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t101_jo_detail_list->pageUrl() ?>start=<?php echo $t101_jo_detail_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t101_jo_detail_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t101_jo_detail_list->pageUrl() ?>start=<?php echo $t101_jo_detail_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t101_jo_detail_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t101_jo_detail_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t101_jo_detail_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t101_jo_detail_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t101_jo_detail_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($t101_jo_detail_list->TotalRecs > 0 && (!$t101_jo_detail_list->AutoHidePageSizeSelector || $t101_jo_detail_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="t101_jo_detail">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($t101_jo_detail_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($t101_jo_detail_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($t101_jo_detail_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="100"<?php if ($t101_jo_detail_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="ALL"<?php if ($t101_jo_detail->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t101_jo_detail_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t101_jo_detail_list->TotalRecs == 0 && !$t101_jo_detail->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t101_jo_detail_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t101_jo_detail_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t101_jo_detail->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t101_jo_detail_list->terminate();
?>