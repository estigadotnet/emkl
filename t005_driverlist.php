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
$t005_driver_list = new t005_driver_list();

// Run the page
$t005_driver_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t005_driver_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t005_driver->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft005_driverlist = currentForm = new ew.Form("ft005_driverlist", "list");
ft005_driverlist.formKeyCountName = '<?php echo $t005_driver_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft005_driverlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft005_driverlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ft005_driverlistsrch = currentSearchForm = new ew.Form("ft005_driverlistsrch");

// Filters
ft005_driverlistsrch.filterList = <?php echo $t005_driver_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t005_driver->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t005_driver_list->TotalRecs > 0 && $t005_driver_list->ExportOptions->visible()) { ?>
<?php $t005_driver_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t005_driver_list->ImportOptions->visible()) { ?>
<?php $t005_driver_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t005_driver_list->SearchOptions->visible()) { ?>
<?php $t005_driver_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t005_driver_list->FilterOptions->visible()) { ?>
<?php $t005_driver_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$t005_driver->isExport() || EXPORT_MASTER_RECORD && $t005_driver->isExport("print")) { ?>
<?php
if ($t005_driver_list->DbMasterFilter <> "" && $t005_driver->getCurrentMasterTable() == "t006_trucking_vendor") {
	if ($t005_driver_list->MasterRecordExists) {
		include_once "t006_trucking_vendormaster.php";
	}
}
?>
<?php } ?>
<?php
$t005_driver_list->renderOtherOptions();
?>
<?php if (!$t005_driver->isExport() && !$t005_driver->CurrentAction) { ?>
<form name="ft005_driverlistsrch" id="ft005_driverlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t005_driver_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft005_driverlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t005_driver">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t005_driver_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t005_driver_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t005_driver_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t005_driver_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t005_driver_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t005_driver_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t005_driver_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $t005_driver_list->showPageHeader(); ?>
<?php
$t005_driver_list->showMessage();
?>
<?php if ($t005_driver_list->TotalRecs > 0 || $t005_driver->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t005_driver_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t005_driver">
<form name="ft005_driverlist" id="ft005_driverlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t005_driver_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t005_driver_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t005_driver">
<?php if ($t005_driver->getCurrentMasterTable() == "t006_trucking_vendor" && $t005_driver->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="t006_trucking_vendor">
<input type="hidden" name="fk_id" value="<?php echo $t005_driver->TruckingVendor_id->getSessionValue() ?>">
<?php } ?>
<div id="gmp_t005_driver" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t005_driver_list->TotalRecs > 0 || $t005_driver->isGridEdit()) { ?>
<table id="tbl_t005_driverlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t005_driver_list->RowType = ROWTYPE_HEADER;

// Render list options
$t005_driver_list->renderListOptions();

// Render list options (header, left)
$t005_driver_list->ListOptions->render("header", "left");
?>
<?php if ($t005_driver->id->Visible) { // id ?>
	<?php if ($t005_driver->sortUrl($t005_driver->id) == "") { ?>
		<th data-name="id" class="<?php echo $t005_driver->id->headerCellClass() ?>"><div id="elh_t005_driver_id" class="t005_driver_id"><div class="ew-table-header-caption"><?php echo $t005_driver->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $t005_driver->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t005_driver->SortUrl($t005_driver->id) ?>',2);"><div id="elh_t005_driver_id" class="t005_driver_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t005_driver->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t005_driver->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t005_driver->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t005_driver->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
	<?php if ($t005_driver->sortUrl($t005_driver->TruckingVendor_id) == "") { ?>
		<th data-name="TruckingVendor_id" class="<?php echo $t005_driver->TruckingVendor_id->headerCellClass() ?>"><div id="elh_t005_driver_TruckingVendor_id" class="t005_driver_TruckingVendor_id"><div class="ew-table-header-caption"><?php echo $t005_driver->TruckingVendor_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TruckingVendor_id" class="<?php echo $t005_driver->TruckingVendor_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t005_driver->SortUrl($t005_driver->TruckingVendor_id) ?>',2);"><div id="elh_t005_driver_TruckingVendor_id" class="t005_driver_TruckingVendor_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t005_driver->TruckingVendor_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t005_driver->TruckingVendor_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t005_driver->TruckingVendor_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t005_driver->Nama->Visible) { // Nama ?>
	<?php if ($t005_driver->sortUrl($t005_driver->Nama) == "") { ?>
		<th data-name="Nama" class="<?php echo $t005_driver->Nama->headerCellClass() ?>"><div id="elh_t005_driver_Nama" class="t005_driver_Nama"><div class="ew-table-header-caption"><?php echo $t005_driver->Nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nama" class="<?php echo $t005_driver->Nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t005_driver->SortUrl($t005_driver->Nama) ?>',2);"><div id="elh_t005_driver_Nama" class="t005_driver_Nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t005_driver->Nama->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t005_driver->Nama->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t005_driver->Nama->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t005_driver->No_HP_1->Visible) { // No_HP_1 ?>
	<?php if ($t005_driver->sortUrl($t005_driver->No_HP_1) == "") { ?>
		<th data-name="No_HP_1" class="<?php echo $t005_driver->No_HP_1->headerCellClass() ?>"><div id="elh_t005_driver_No_HP_1" class="t005_driver_No_HP_1"><div class="ew-table-header-caption"><?php echo $t005_driver->No_HP_1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="No_HP_1" class="<?php echo $t005_driver->No_HP_1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t005_driver->SortUrl($t005_driver->No_HP_1) ?>',2);"><div id="elh_t005_driver_No_HP_1" class="t005_driver_No_HP_1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t005_driver->No_HP_1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t005_driver->No_HP_1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t005_driver->No_HP_1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t005_driver->No_HP_2->Visible) { // No_HP_2 ?>
	<?php if ($t005_driver->sortUrl($t005_driver->No_HP_2) == "") { ?>
		<th data-name="No_HP_2" class="<?php echo $t005_driver->No_HP_2->headerCellClass() ?>"><div id="elh_t005_driver_No_HP_2" class="t005_driver_No_HP_2"><div class="ew-table-header-caption"><?php echo $t005_driver->No_HP_2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="No_HP_2" class="<?php echo $t005_driver->No_HP_2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t005_driver->SortUrl($t005_driver->No_HP_2) ?>',2);"><div id="elh_t005_driver_No_HP_2" class="t005_driver_No_HP_2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t005_driver->No_HP_2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t005_driver->No_HP_2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t005_driver->No_HP_2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t005_driver_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t005_driver->ExportAll && $t005_driver->isExport()) {
	$t005_driver_list->StopRec = $t005_driver_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t005_driver_list->TotalRecs > $t005_driver_list->StartRec + $t005_driver_list->DisplayRecs - 1)
		$t005_driver_list->StopRec = $t005_driver_list->StartRec + $t005_driver_list->DisplayRecs - 1;
	else
		$t005_driver_list->StopRec = $t005_driver_list->TotalRecs;
}
$t005_driver_list->RecCnt = $t005_driver_list->StartRec - 1;
if ($t005_driver_list->Recordset && !$t005_driver_list->Recordset->EOF) {
	$t005_driver_list->Recordset->moveFirst();
	$selectLimit = $t005_driver_list->UseSelectLimit;
	if (!$selectLimit && $t005_driver_list->StartRec > 1)
		$t005_driver_list->Recordset->move($t005_driver_list->StartRec - 1);
} elseif (!$t005_driver->AllowAddDeleteRow && $t005_driver_list->StopRec == 0) {
	$t005_driver_list->StopRec = $t005_driver->GridAddRowCount;
}

// Initialize aggregate
$t005_driver->RowType = ROWTYPE_AGGREGATEINIT;
$t005_driver->resetAttributes();
$t005_driver_list->renderRow();
while ($t005_driver_list->RecCnt < $t005_driver_list->StopRec) {
	$t005_driver_list->RecCnt++;
	if ($t005_driver_list->RecCnt >= $t005_driver_list->StartRec) {
		$t005_driver_list->RowCnt++;

		// Set up key count
		$t005_driver_list->KeyCount = $t005_driver_list->RowIndex;

		// Init row class and style
		$t005_driver->resetAttributes();
		$t005_driver->CssClass = "";
		if ($t005_driver->isGridAdd()) {
		} else {
			$t005_driver_list->loadRowValues($t005_driver_list->Recordset); // Load row values
		}
		$t005_driver->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t005_driver->RowAttrs = array_merge($t005_driver->RowAttrs, array('data-rowindex'=>$t005_driver_list->RowCnt, 'id'=>'r' . $t005_driver_list->RowCnt . '_t005_driver', 'data-rowtype'=>$t005_driver->RowType));

		// Render row
		$t005_driver_list->renderRow();

		// Render list options
		$t005_driver_list->renderListOptions();
?>
	<tr<?php echo $t005_driver->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t005_driver_list->ListOptions->render("body", "left", $t005_driver_list->RowCnt);
?>
	<?php if ($t005_driver->id->Visible) { // id ?>
		<td data-name="id"<?php echo $t005_driver->id->cellAttributes() ?>>
<span id="el<?php echo $t005_driver_list->RowCnt ?>_t005_driver_id" class="t005_driver_id">
<span<?php echo $t005_driver->id->viewAttributes() ?>>
<?php echo $t005_driver->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t005_driver->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
		<td data-name="TruckingVendor_id"<?php echo $t005_driver->TruckingVendor_id->cellAttributes() ?>>
<span id="el<?php echo $t005_driver_list->RowCnt ?>_t005_driver_TruckingVendor_id" class="t005_driver_TruckingVendor_id">
<span<?php echo $t005_driver->TruckingVendor_id->viewAttributes() ?>>
<?php echo $t005_driver->TruckingVendor_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t005_driver->Nama->Visible) { // Nama ?>
		<td data-name="Nama"<?php echo $t005_driver->Nama->cellAttributes() ?>>
<span id="el<?php echo $t005_driver_list->RowCnt ?>_t005_driver_Nama" class="t005_driver_Nama">
<span<?php echo $t005_driver->Nama->viewAttributes() ?>>
<?php echo $t005_driver->Nama->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t005_driver->No_HP_1->Visible) { // No_HP_1 ?>
		<td data-name="No_HP_1"<?php echo $t005_driver->No_HP_1->cellAttributes() ?>>
<span id="el<?php echo $t005_driver_list->RowCnt ?>_t005_driver_No_HP_1" class="t005_driver_No_HP_1">
<span<?php echo $t005_driver->No_HP_1->viewAttributes() ?>>
<?php echo $t005_driver->No_HP_1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t005_driver->No_HP_2->Visible) { // No_HP_2 ?>
		<td data-name="No_HP_2"<?php echo $t005_driver->No_HP_2->cellAttributes() ?>>
<span id="el<?php echo $t005_driver_list->RowCnt ?>_t005_driver_No_HP_2" class="t005_driver_No_HP_2">
<span<?php echo $t005_driver->No_HP_2->viewAttributes() ?>>
<?php echo $t005_driver->No_HP_2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t005_driver_list->ListOptions->render("body", "right", $t005_driver_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t005_driver->isGridAdd())
		$t005_driver_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t005_driver->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t005_driver_list->Recordset)
	$t005_driver_list->Recordset->Close();
?>
<?php if (!$t005_driver->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t005_driver->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t005_driver_list->Pager)) $t005_driver_list->Pager = new PrevNextPager($t005_driver_list->StartRec, $t005_driver_list->DisplayRecs, $t005_driver_list->TotalRecs, $t005_driver_list->AutoHidePager) ?>
<?php if ($t005_driver_list->Pager->RecordCount > 0 && $t005_driver_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t005_driver_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t005_driver_list->pageUrl() ?>start=<?php echo $t005_driver_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t005_driver_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t005_driver_list->pageUrl() ?>start=<?php echo $t005_driver_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t005_driver_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t005_driver_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t005_driver_list->pageUrl() ?>start=<?php echo $t005_driver_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t005_driver_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t005_driver_list->pageUrl() ?>start=<?php echo $t005_driver_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t005_driver_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t005_driver_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t005_driver_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t005_driver_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t005_driver_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t005_driver_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t005_driver_list->TotalRecs == 0 && !$t005_driver->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t005_driver_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t005_driver_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t005_driver->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$t005_driver->isExport()) { ?>
<script>
ew.scrollableTable("gmp_t005_driver", "100%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t005_driver_list->terminate();
?>