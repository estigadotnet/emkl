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
$t002_destination_list = new t002_destination_list();

// Run the page
$t002_destination_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_destination_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t002_destination->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft002_destinationlist = currentForm = new ew.Form("ft002_destinationlist", "list");
ft002_destinationlist.formKeyCountName = '<?php echo $t002_destination_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft002_destinationlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft002_destinationlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ft002_destinationlistsrch = currentSearchForm = new ew.Form("ft002_destinationlistsrch");

// Filters
ft002_destinationlistsrch.filterList = <?php echo $t002_destination_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t002_destination->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t002_destination_list->TotalRecs > 0 && $t002_destination_list->ExportOptions->visible()) { ?>
<?php $t002_destination_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t002_destination_list->ImportOptions->visible()) { ?>
<?php $t002_destination_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t002_destination_list->SearchOptions->visible()) { ?>
<?php $t002_destination_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t002_destination_list->FilterOptions->visible()) { ?>
<?php $t002_destination_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t002_destination_list->renderOtherOptions();
?>
<?php if (!$t002_destination->isExport() && !$t002_destination->CurrentAction) { ?>
<form name="ft002_destinationlistsrch" id="ft002_destinationlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t002_destination_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft002_destinationlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t002_destination">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t002_destination_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t002_destination_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t002_destination_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t002_destination_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t002_destination_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t002_destination_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t002_destination_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $t002_destination_list->showPageHeader(); ?>
<?php
$t002_destination_list->showMessage();
?>
<?php if ($t002_destination_list->TotalRecs > 0 || $t002_destination->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t002_destination_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t002_destination">
<form name="ft002_destinationlist" id="ft002_destinationlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t002_destination_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t002_destination_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_destination">
<div id="gmp_t002_destination" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t002_destination_list->TotalRecs > 0 || $t002_destination->isGridEdit()) { ?>
<table id="tbl_t002_destinationlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t002_destination_list->RowType = ROWTYPE_HEADER;

// Render list options
$t002_destination_list->renderListOptions();

// Render list options (header, left)
$t002_destination_list->ListOptions->render("header", "left");
?>
<?php if ($t002_destination->id->Visible) { // id ?>
	<?php if ($t002_destination->sortUrl($t002_destination->id) == "") { ?>
		<th data-name="id" class="<?php echo $t002_destination->id->headerCellClass() ?>"><div id="elh_t002_destination_id" class="t002_destination_id"><div class="ew-table-header-caption"><?php echo $t002_destination->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $t002_destination->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t002_destination->SortUrl($t002_destination->id) ?>',1);"><div id="elh_t002_destination_id" class="t002_destination_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_destination->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_destination->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t002_destination->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t002_destination->Nama->Visible) { // Nama ?>
	<?php if ($t002_destination->sortUrl($t002_destination->Nama) == "") { ?>
		<th data-name="Nama" class="<?php echo $t002_destination->Nama->headerCellClass() ?>"><div id="elh_t002_destination_Nama" class="t002_destination_Nama"><div class="ew-table-header-caption"><?php echo $t002_destination->Nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nama" class="<?php echo $t002_destination->Nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t002_destination->SortUrl($t002_destination->Nama) ?>',1);"><div id="elh_t002_destination_Nama" class="t002_destination_Nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_destination->Nama->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t002_destination->Nama->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t002_destination->Nama->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t002_destination_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t002_destination->ExportAll && $t002_destination->isExport()) {
	$t002_destination_list->StopRec = $t002_destination_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t002_destination_list->TotalRecs > $t002_destination_list->StartRec + $t002_destination_list->DisplayRecs - 1)
		$t002_destination_list->StopRec = $t002_destination_list->StartRec + $t002_destination_list->DisplayRecs - 1;
	else
		$t002_destination_list->StopRec = $t002_destination_list->TotalRecs;
}
$t002_destination_list->RecCnt = $t002_destination_list->StartRec - 1;
if ($t002_destination_list->Recordset && !$t002_destination_list->Recordset->EOF) {
	$t002_destination_list->Recordset->moveFirst();
	$selectLimit = $t002_destination_list->UseSelectLimit;
	if (!$selectLimit && $t002_destination_list->StartRec > 1)
		$t002_destination_list->Recordset->move($t002_destination_list->StartRec - 1);
} elseif (!$t002_destination->AllowAddDeleteRow && $t002_destination_list->StopRec == 0) {
	$t002_destination_list->StopRec = $t002_destination->GridAddRowCount;
}

// Initialize aggregate
$t002_destination->RowType = ROWTYPE_AGGREGATEINIT;
$t002_destination->resetAttributes();
$t002_destination_list->renderRow();
while ($t002_destination_list->RecCnt < $t002_destination_list->StopRec) {
	$t002_destination_list->RecCnt++;
	if ($t002_destination_list->RecCnt >= $t002_destination_list->StartRec) {
		$t002_destination_list->RowCnt++;

		// Set up key count
		$t002_destination_list->KeyCount = $t002_destination_list->RowIndex;

		// Init row class and style
		$t002_destination->resetAttributes();
		$t002_destination->CssClass = "";
		if ($t002_destination->isGridAdd()) {
		} else {
			$t002_destination_list->loadRowValues($t002_destination_list->Recordset); // Load row values
		}
		$t002_destination->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t002_destination->RowAttrs = array_merge($t002_destination->RowAttrs, array('data-rowindex'=>$t002_destination_list->RowCnt, 'id'=>'r' . $t002_destination_list->RowCnt . '_t002_destination', 'data-rowtype'=>$t002_destination->RowType));

		// Render row
		$t002_destination_list->renderRow();

		// Render list options
		$t002_destination_list->renderListOptions();
?>
	<tr<?php echo $t002_destination->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t002_destination_list->ListOptions->render("body", "left", $t002_destination_list->RowCnt);
?>
	<?php if ($t002_destination->id->Visible) { // id ?>
		<td data-name="id"<?php echo $t002_destination->id->cellAttributes() ?>>
<span id="el<?php echo $t002_destination_list->RowCnt ?>_t002_destination_id" class="t002_destination_id">
<span<?php echo $t002_destination->id->viewAttributes() ?>>
<?php echo $t002_destination->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t002_destination->Nama->Visible) { // Nama ?>
		<td data-name="Nama"<?php echo $t002_destination->Nama->cellAttributes() ?>>
<span id="el<?php echo $t002_destination_list->RowCnt ?>_t002_destination_Nama" class="t002_destination_Nama">
<span<?php echo $t002_destination->Nama->viewAttributes() ?>>
<?php echo $t002_destination->Nama->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t002_destination_list->ListOptions->render("body", "right", $t002_destination_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t002_destination->isGridAdd())
		$t002_destination_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t002_destination->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t002_destination_list->Recordset)
	$t002_destination_list->Recordset->Close();
?>
<?php if (!$t002_destination->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t002_destination->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t002_destination_list->Pager)) $t002_destination_list->Pager = new PrevNextPager($t002_destination_list->StartRec, $t002_destination_list->DisplayRecs, $t002_destination_list->TotalRecs, $t002_destination_list->AutoHidePager) ?>
<?php if ($t002_destination_list->Pager->RecordCount > 0 && $t002_destination_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t002_destination_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t002_destination_list->pageUrl() ?>start=<?php echo $t002_destination_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t002_destination_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t002_destination_list->pageUrl() ?>start=<?php echo $t002_destination_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t002_destination_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t002_destination_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t002_destination_list->pageUrl() ?>start=<?php echo $t002_destination_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t002_destination_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t002_destination_list->pageUrl() ?>start=<?php echo $t002_destination_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t002_destination_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t002_destination_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t002_destination_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t002_destination_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t002_destination_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t002_destination_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t002_destination_list->TotalRecs == 0 && !$t002_destination->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t002_destination_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t002_destination_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t002_destination->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t002_destination_list->terminate();
?>