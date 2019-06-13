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
$t006_trucking_vendor_list = new t006_trucking_vendor_list();

// Run the page
$t006_trucking_vendor_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t006_trucking_vendor_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t006_trucking_vendor->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft006_trucking_vendorlist = currentForm = new ew.Form("ft006_trucking_vendorlist", "list");
ft006_trucking_vendorlist.formKeyCountName = '<?php echo $t006_trucking_vendor_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft006_trucking_vendorlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft006_trucking_vendorlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ft006_trucking_vendorlistsrch = currentSearchForm = new ew.Form("ft006_trucking_vendorlistsrch");

// Filters
ft006_trucking_vendorlistsrch.filterList = <?php echo $t006_trucking_vendor_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t006_trucking_vendor->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t006_trucking_vendor_list->TotalRecs > 0 && $t006_trucking_vendor_list->ExportOptions->visible()) { ?>
<?php $t006_trucking_vendor_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t006_trucking_vendor_list->ImportOptions->visible()) { ?>
<?php $t006_trucking_vendor_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t006_trucking_vendor_list->SearchOptions->visible()) { ?>
<?php $t006_trucking_vendor_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t006_trucking_vendor_list->FilterOptions->visible()) { ?>
<?php $t006_trucking_vendor_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t006_trucking_vendor_list->renderOtherOptions();
?>
<?php if (!$t006_trucking_vendor->isExport() && !$t006_trucking_vendor->CurrentAction) { ?>
<form name="ft006_trucking_vendorlistsrch" id="ft006_trucking_vendorlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t006_trucking_vendor_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft006_trucking_vendorlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t006_trucking_vendor">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t006_trucking_vendor_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t006_trucking_vendor_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t006_trucking_vendor_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t006_trucking_vendor_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t006_trucking_vendor_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t006_trucking_vendor_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t006_trucking_vendor_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $t006_trucking_vendor_list->showPageHeader(); ?>
<?php
$t006_trucking_vendor_list->showMessage();
?>
<?php if ($t006_trucking_vendor_list->TotalRecs > 0 || $t006_trucking_vendor->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t006_trucking_vendor_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t006_trucking_vendor">
<form name="ft006_trucking_vendorlist" id="ft006_trucking_vendorlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t006_trucking_vendor_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t006_trucking_vendor_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t006_trucking_vendor">
<div id="gmp_t006_trucking_vendor" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t006_trucking_vendor_list->TotalRecs > 0 || $t006_trucking_vendor->isGridEdit()) { ?>
<table id="tbl_t006_trucking_vendorlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t006_trucking_vendor_list->RowType = ROWTYPE_HEADER;

// Render list options
$t006_trucking_vendor_list->renderListOptions();

// Render list options (header, left)
$t006_trucking_vendor_list->ListOptions->render("header", "left");
?>
<?php if ($t006_trucking_vendor->id->Visible) { // id ?>
	<?php if ($t006_trucking_vendor->sortUrl($t006_trucking_vendor->id) == "") { ?>
		<th data-name="id" class="<?php echo $t006_trucking_vendor->id->headerCellClass() ?>"><div id="elh_t006_trucking_vendor_id" class="t006_trucking_vendor_id"><div class="ew-table-header-caption"><?php echo $t006_trucking_vendor->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $t006_trucking_vendor->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t006_trucking_vendor->SortUrl($t006_trucking_vendor->id) ?>',1);"><div id="elh_t006_trucking_vendor_id" class="t006_trucking_vendor_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t006_trucking_vendor->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t006_trucking_vendor->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t006_trucking_vendor->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t006_trucking_vendor->Nama->Visible) { // Nama ?>
	<?php if ($t006_trucking_vendor->sortUrl($t006_trucking_vendor->Nama) == "") { ?>
		<th data-name="Nama" class="<?php echo $t006_trucking_vendor->Nama->headerCellClass() ?>"><div id="elh_t006_trucking_vendor_Nama" class="t006_trucking_vendor_Nama"><div class="ew-table-header-caption"><?php echo $t006_trucking_vendor->Nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nama" class="<?php echo $t006_trucking_vendor->Nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t006_trucking_vendor->SortUrl($t006_trucking_vendor->Nama) ?>',1);"><div id="elh_t006_trucking_vendor_Nama" class="t006_trucking_vendor_Nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t006_trucking_vendor->Nama->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t006_trucking_vendor->Nama->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t006_trucking_vendor->Nama->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t006_trucking_vendor_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t006_trucking_vendor->ExportAll && $t006_trucking_vendor->isExport()) {
	$t006_trucking_vendor_list->StopRec = $t006_trucking_vendor_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t006_trucking_vendor_list->TotalRecs > $t006_trucking_vendor_list->StartRec + $t006_trucking_vendor_list->DisplayRecs - 1)
		$t006_trucking_vendor_list->StopRec = $t006_trucking_vendor_list->StartRec + $t006_trucking_vendor_list->DisplayRecs - 1;
	else
		$t006_trucking_vendor_list->StopRec = $t006_trucking_vendor_list->TotalRecs;
}
$t006_trucking_vendor_list->RecCnt = $t006_trucking_vendor_list->StartRec - 1;
if ($t006_trucking_vendor_list->Recordset && !$t006_trucking_vendor_list->Recordset->EOF) {
	$t006_trucking_vendor_list->Recordset->moveFirst();
	$selectLimit = $t006_trucking_vendor_list->UseSelectLimit;
	if (!$selectLimit && $t006_trucking_vendor_list->StartRec > 1)
		$t006_trucking_vendor_list->Recordset->move($t006_trucking_vendor_list->StartRec - 1);
} elseif (!$t006_trucking_vendor->AllowAddDeleteRow && $t006_trucking_vendor_list->StopRec == 0) {
	$t006_trucking_vendor_list->StopRec = $t006_trucking_vendor->GridAddRowCount;
}

// Initialize aggregate
$t006_trucking_vendor->RowType = ROWTYPE_AGGREGATEINIT;
$t006_trucking_vendor->resetAttributes();
$t006_trucking_vendor_list->renderRow();
while ($t006_trucking_vendor_list->RecCnt < $t006_trucking_vendor_list->StopRec) {
	$t006_trucking_vendor_list->RecCnt++;
	if ($t006_trucking_vendor_list->RecCnt >= $t006_trucking_vendor_list->StartRec) {
		$t006_trucking_vendor_list->RowCnt++;

		// Set up key count
		$t006_trucking_vendor_list->KeyCount = $t006_trucking_vendor_list->RowIndex;

		// Init row class and style
		$t006_trucking_vendor->resetAttributes();
		$t006_trucking_vendor->CssClass = "";
		if ($t006_trucking_vendor->isGridAdd()) {
		} else {
			$t006_trucking_vendor_list->loadRowValues($t006_trucking_vendor_list->Recordset); // Load row values
		}
		$t006_trucking_vendor->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t006_trucking_vendor->RowAttrs = array_merge($t006_trucking_vendor->RowAttrs, array('data-rowindex'=>$t006_trucking_vendor_list->RowCnt, 'id'=>'r' . $t006_trucking_vendor_list->RowCnt . '_t006_trucking_vendor', 'data-rowtype'=>$t006_trucking_vendor->RowType));

		// Render row
		$t006_trucking_vendor_list->renderRow();

		// Render list options
		$t006_trucking_vendor_list->renderListOptions();
?>
	<tr<?php echo $t006_trucking_vendor->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t006_trucking_vendor_list->ListOptions->render("body", "left", $t006_trucking_vendor_list->RowCnt);
?>
	<?php if ($t006_trucking_vendor->id->Visible) { // id ?>
		<td data-name="id"<?php echo $t006_trucking_vendor->id->cellAttributes() ?>>
<span id="el<?php echo $t006_trucking_vendor_list->RowCnt ?>_t006_trucking_vendor_id" class="t006_trucking_vendor_id">
<span<?php echo $t006_trucking_vendor->id->viewAttributes() ?>>
<?php echo $t006_trucking_vendor->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t006_trucking_vendor->Nama->Visible) { // Nama ?>
		<td data-name="Nama"<?php echo $t006_trucking_vendor->Nama->cellAttributes() ?>>
<span id="el<?php echo $t006_trucking_vendor_list->RowCnt ?>_t006_trucking_vendor_Nama" class="t006_trucking_vendor_Nama">
<span<?php echo $t006_trucking_vendor->Nama->viewAttributes() ?>>
<?php echo $t006_trucking_vendor->Nama->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t006_trucking_vendor_list->ListOptions->render("body", "right", $t006_trucking_vendor_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t006_trucking_vendor->isGridAdd())
		$t006_trucking_vendor_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t006_trucking_vendor->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t006_trucking_vendor_list->Recordset)
	$t006_trucking_vendor_list->Recordset->Close();
?>
<?php if (!$t006_trucking_vendor->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t006_trucking_vendor->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t006_trucking_vendor_list->Pager)) $t006_trucking_vendor_list->Pager = new PrevNextPager($t006_trucking_vendor_list->StartRec, $t006_trucking_vendor_list->DisplayRecs, $t006_trucking_vendor_list->TotalRecs, $t006_trucking_vendor_list->AutoHidePager) ?>
<?php if ($t006_trucking_vendor_list->Pager->RecordCount > 0 && $t006_trucking_vendor_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t006_trucking_vendor_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t006_trucking_vendor_list->pageUrl() ?>start=<?php echo $t006_trucking_vendor_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t006_trucking_vendor_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t006_trucking_vendor_list->pageUrl() ?>start=<?php echo $t006_trucking_vendor_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t006_trucking_vendor_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t006_trucking_vendor_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t006_trucking_vendor_list->pageUrl() ?>start=<?php echo $t006_trucking_vendor_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t006_trucking_vendor_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t006_trucking_vendor_list->pageUrl() ?>start=<?php echo $t006_trucking_vendor_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t006_trucking_vendor_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t006_trucking_vendor_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t006_trucking_vendor_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t006_trucking_vendor_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t006_trucking_vendor_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t006_trucking_vendor_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t006_trucking_vendor_list->TotalRecs == 0 && !$t006_trucking_vendor->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t006_trucking_vendor_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t006_trucking_vendor_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t006_trucking_vendor->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t006_trucking_vendor_list->terminate();
?>