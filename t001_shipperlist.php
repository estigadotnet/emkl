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
$t001_shipper_list = new t001_shipper_list();

// Run the page
$t001_shipper_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_shipper_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t001_shipper->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft001_shipperlist = currentForm = new ew.Form("ft001_shipperlist", "list");
ft001_shipperlist.formKeyCountName = '<?php echo $t001_shipper_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft001_shipperlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft001_shipperlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ft001_shipperlistsrch = currentSearchForm = new ew.Form("ft001_shipperlistsrch");

// Filters
ft001_shipperlistsrch.filterList = <?php echo $t001_shipper_list->getFilterList() ?>;
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
<script src="phpjs/ewscrolltable.js"></script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t001_shipper->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t001_shipper_list->TotalRecs > 0 && $t001_shipper_list->ExportOptions->visible()) { ?>
<?php $t001_shipper_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t001_shipper_list->ImportOptions->visible()) { ?>
<?php $t001_shipper_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t001_shipper_list->SearchOptions->visible()) { ?>
<?php $t001_shipper_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t001_shipper_list->FilterOptions->visible()) { ?>
<?php $t001_shipper_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t001_shipper_list->renderOtherOptions();
?>
<?php if (!$t001_shipper->isExport() && !$t001_shipper->CurrentAction) { ?>
<form name="ft001_shipperlistsrch" id="ft001_shipperlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t001_shipper_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft001_shipperlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t001_shipper">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t001_shipper_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t001_shipper_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t001_shipper_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t001_shipper_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t001_shipper_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t001_shipper_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t001_shipper_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $t001_shipper_list->showPageHeader(); ?>
<?php
$t001_shipper_list->showMessage();
?>
<?php if ($t001_shipper_list->TotalRecs > 0 || $t001_shipper->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t001_shipper_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t001_shipper">
<form name="ft001_shipperlist" id="ft001_shipperlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t001_shipper_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t001_shipper_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_shipper">
<div id="gmp_t001_shipper" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t001_shipper_list->TotalRecs > 0 || $t001_shipper->isGridEdit()) { ?>
<table id="tbl_t001_shipperlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t001_shipper_list->RowType = ROWTYPE_HEADER;

// Render list options
$t001_shipper_list->renderListOptions();

// Render list options (header, left)
$t001_shipper_list->ListOptions->render("header", "left");
?>
<?php if ($t001_shipper->id->Visible) { // id ?>
	<?php if ($t001_shipper->sortUrl($t001_shipper->id) == "") { ?>
		<th data-name="id" class="<?php echo $t001_shipper->id->headerCellClass() ?>"><div id="elh_t001_shipper_id" class="t001_shipper_id"><div class="ew-table-header-caption"><?php echo $t001_shipper->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $t001_shipper->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t001_shipper->SortUrl($t001_shipper->id) ?>',2);"><div id="elh_t001_shipper_id" class="t001_shipper_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t001_shipper->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t001_shipper->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t001_shipper->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t001_shipper->Nama->Visible) { // Nama ?>
	<?php if ($t001_shipper->sortUrl($t001_shipper->Nama) == "") { ?>
		<th data-name="Nama" class="<?php echo $t001_shipper->Nama->headerCellClass() ?>"><div id="elh_t001_shipper_Nama" class="t001_shipper_Nama"><div class="ew-table-header-caption"><?php echo $t001_shipper->Nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nama" class="<?php echo $t001_shipper->Nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t001_shipper->SortUrl($t001_shipper->Nama) ?>',2);"><div id="elh_t001_shipper_Nama" class="t001_shipper_Nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t001_shipper->Nama->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t001_shipper->Nama->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t001_shipper->Nama->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t001_shipper_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t001_shipper->ExportAll && $t001_shipper->isExport()) {
	$t001_shipper_list->StopRec = $t001_shipper_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t001_shipper_list->TotalRecs > $t001_shipper_list->StartRec + $t001_shipper_list->DisplayRecs - 1)
		$t001_shipper_list->StopRec = $t001_shipper_list->StartRec + $t001_shipper_list->DisplayRecs - 1;
	else
		$t001_shipper_list->StopRec = $t001_shipper_list->TotalRecs;
}
$t001_shipper_list->RecCnt = $t001_shipper_list->StartRec - 1;
if ($t001_shipper_list->Recordset && !$t001_shipper_list->Recordset->EOF) {
	$t001_shipper_list->Recordset->moveFirst();
	$selectLimit = $t001_shipper_list->UseSelectLimit;
	if (!$selectLimit && $t001_shipper_list->StartRec > 1)
		$t001_shipper_list->Recordset->move($t001_shipper_list->StartRec - 1);
} elseif (!$t001_shipper->AllowAddDeleteRow && $t001_shipper_list->StopRec == 0) {
	$t001_shipper_list->StopRec = $t001_shipper->GridAddRowCount;
}

// Initialize aggregate
$t001_shipper->RowType = ROWTYPE_AGGREGATEINIT;
$t001_shipper->resetAttributes();
$t001_shipper_list->renderRow();
while ($t001_shipper_list->RecCnt < $t001_shipper_list->StopRec) {
	$t001_shipper_list->RecCnt++;
	if ($t001_shipper_list->RecCnt >= $t001_shipper_list->StartRec) {
		$t001_shipper_list->RowCnt++;

		// Set up key count
		$t001_shipper_list->KeyCount = $t001_shipper_list->RowIndex;

		// Init row class and style
		$t001_shipper->resetAttributes();
		$t001_shipper->CssClass = "";
		if ($t001_shipper->isGridAdd()) {
		} else {
			$t001_shipper_list->loadRowValues($t001_shipper_list->Recordset); // Load row values
		}
		$t001_shipper->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t001_shipper->RowAttrs = array_merge($t001_shipper->RowAttrs, array('data-rowindex'=>$t001_shipper_list->RowCnt, 'id'=>'r' . $t001_shipper_list->RowCnt . '_t001_shipper', 'data-rowtype'=>$t001_shipper->RowType));

		// Render row
		$t001_shipper_list->renderRow();

		// Render list options
		$t001_shipper_list->renderListOptions();
?>
	<tr<?php echo $t001_shipper->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t001_shipper_list->ListOptions->render("body", "left", $t001_shipper_list->RowCnt);
?>
	<?php if ($t001_shipper->id->Visible) { // id ?>
		<td data-name="id"<?php echo $t001_shipper->id->cellAttributes() ?>>
<span id="el<?php echo $t001_shipper_list->RowCnt ?>_t001_shipper_id" class="t001_shipper_id">
<span<?php echo $t001_shipper->id->viewAttributes() ?>>
<?php echo $t001_shipper->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t001_shipper->Nama->Visible) { // Nama ?>
		<td data-name="Nama"<?php echo $t001_shipper->Nama->cellAttributes() ?>>
<span id="el<?php echo $t001_shipper_list->RowCnt ?>_t001_shipper_Nama" class="t001_shipper_Nama">
<span<?php echo $t001_shipper->Nama->viewAttributes() ?>>
<?php echo $t001_shipper->Nama->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t001_shipper_list->ListOptions->render("body", "right", $t001_shipper_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t001_shipper->isGridAdd())
		$t001_shipper_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t001_shipper->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t001_shipper_list->Recordset)
	$t001_shipper_list->Recordset->Close();
?>
<?php if (!$t001_shipper->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t001_shipper->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t001_shipper_list->Pager)) $t001_shipper_list->Pager = new PrevNextPager($t001_shipper_list->StartRec, $t001_shipper_list->DisplayRecs, $t001_shipper_list->TotalRecs, $t001_shipper_list->AutoHidePager) ?>
<?php if ($t001_shipper_list->Pager->RecordCount > 0 && $t001_shipper_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t001_shipper_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t001_shipper_list->pageUrl() ?>start=<?php echo $t001_shipper_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t001_shipper_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t001_shipper_list->pageUrl() ?>start=<?php echo $t001_shipper_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t001_shipper_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t001_shipper_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t001_shipper_list->pageUrl() ?>start=<?php echo $t001_shipper_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t001_shipper_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t001_shipper_list->pageUrl() ?>start=<?php echo $t001_shipper_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t001_shipper_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t001_shipper_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t001_shipper_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t001_shipper_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t001_shipper_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($t001_shipper_list->TotalRecs > 0 && (!$t001_shipper_list->AutoHidePageSizeSelector || $t001_shipper_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="t001_shipper">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($t001_shipper_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($t001_shipper_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($t001_shipper_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="100"<?php if ($t001_shipper_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="ALL"<?php if ($t001_shipper->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t001_shipper_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t001_shipper_list->TotalRecs == 0 && !$t001_shipper->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t001_shipper_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t001_shipper_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t001_shipper->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$t001_shipper->isExport()) { ?>
<script>
ew.scrollableTable("gmp_t001_shipper", "100%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t001_shipper_list->terminate();
?>