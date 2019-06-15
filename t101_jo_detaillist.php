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
while ($t101_jo_detail_list->RecCnt < $t101_jo_detail_list->StopRec) {
	$t101_jo_detail_list->RecCnt++;
	if ($t101_jo_detail_list->RecCnt >= $t101_jo_detail_list->StartRec) {
		$t101_jo_detail_list->RowCnt++;

		// Set up key count
		$t101_jo_detail_list->KeyCount = $t101_jo_detail_list->RowIndex;

		// Init row class and style
		$t101_jo_detail->resetAttributes();
		$t101_jo_detail->CssClass = "";
		if ($t101_jo_detail->isGridAdd()) {
		} else {
			$t101_jo_detail_list->loadRowValues($t101_jo_detail_list->Recordset); // Load row values
		}
		$t101_jo_detail->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t101_jo_detail->RowAttrs = array_merge($t101_jo_detail->RowAttrs, array('data-rowindex'=>$t101_jo_detail_list->RowCnt, 'id'=>'r' . $t101_jo_detail_list->RowCnt . '_t101_jo_detail', 'data-rowtype'=>$t101_jo_detail->RowType));

		// Render row
		$t101_jo_detail_list->renderRow();

		// Render list options
		$t101_jo_detail_list->renderListOptions();
?>
	<tr<?php echo $t101_jo_detail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t101_jo_detail_list->ListOptions->render("body", "left", $t101_jo_detail_list->RowCnt);
?>
	<?php if ($t101_jo_detail->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
		<td data-name="TruckingVendor_id"<?php echo $t101_jo_detail->TruckingVendor_id->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_TruckingVendor_id" class="t101_jo_detail_TruckingVendor_id">
<span<?php echo $t101_jo_detail->TruckingVendor_id->viewAttributes() ?>>
<?php echo $t101_jo_detail->TruckingVendor_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Driver_id->Visible) { // Driver_id ?>
		<td data-name="Driver_id"<?php echo $t101_jo_detail->Driver_id->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Driver_id" class="t101_jo_detail_Driver_id">
<span<?php echo $t101_jo_detail->Driver_id->viewAttributes() ?>>
<?php echo $t101_jo_detail->Driver_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Polisi_1->Visible) { // Nomor_Polisi_1 ?>
		<td data-name="Nomor_Polisi_1"<?php echo $t101_jo_detail->Nomor_Polisi_1->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Nomor_Polisi_1" class="t101_jo_detail_Nomor_Polisi_1">
<span<?php echo $t101_jo_detail->Nomor_Polisi_1->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Polisi_1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Polisi_2->Visible) { // Nomor_Polisi_2 ?>
		<td data-name="Nomor_Polisi_2"<?php echo $t101_jo_detail->Nomor_Polisi_2->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Nomor_Polisi_2" class="t101_jo_detail_Nomor_Polisi_2">
<span<?php echo $t101_jo_detail->Nomor_Polisi_2->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Polisi_2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Polisi_3->Visible) { // Nomor_Polisi_3 ?>
		<td data-name="Nomor_Polisi_3"<?php echo $t101_jo_detail->Nomor_Polisi_3->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Nomor_Polisi_3" class="t101_jo_detail_Nomor_Polisi_3">
<span<?php echo $t101_jo_detail->Nomor_Polisi_3->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Polisi_3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
		<td data-name="Nomor_Container_1"<?php echo $t101_jo_detail->Nomor_Container_1->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Nomor_Container_1" class="t101_jo_detail_Nomor_Container_1">
<span<?php echo $t101_jo_detail->Nomor_Container_1->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Container_1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_jo_detail->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
		<td data-name="Nomor_Container_2"<?php echo $t101_jo_detail->Nomor_Container_2->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_detail_list->RowCnt ?>_t101_jo_detail_Nomor_Container_2" class="t101_jo_detail_Nomor_Container_2">
<span<?php echo $t101_jo_detail->Nomor_Container_2->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Container_2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t101_jo_detail_list->ListOptions->render("body", "right", $t101_jo_detail_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t101_jo_detail->isGridAdd())
		$t101_jo_detail_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
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