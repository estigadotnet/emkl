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
$t102_jo_list = new t102_jo_list();

// Run the page
$t102_jo_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_jo_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t102_jo->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft102_jolist = currentForm = new ew.Form("ft102_jolist", "list");
ft102_jolist.formKeyCountName = '<?php echo $t102_jo_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft102_jolist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft102_jolist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ft102_jolistsrch = currentSearchForm = new ew.Form("ft102_jolistsrch");

// Filters
ft102_jolistsrch.filterList = <?php echo $t102_jo_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t102_jo->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t102_jo_list->TotalRecs > 0 && $t102_jo_list->ExportOptions->visible()) { ?>
<?php $t102_jo_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t102_jo_list->ImportOptions->visible()) { ?>
<?php $t102_jo_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t102_jo_list->SearchOptions->visible()) { ?>
<?php $t102_jo_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t102_jo_list->FilterOptions->visible()) { ?>
<?php $t102_jo_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t102_jo_list->renderOtherOptions();
?>
<?php if (!$t102_jo->isExport() && !$t102_jo->CurrentAction) { ?>
<form name="ft102_jolistsrch" id="ft102_jolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t102_jo_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft102_jolistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t102_jo">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t102_jo_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t102_jo_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t102_jo_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t102_jo_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t102_jo_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t102_jo_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t102_jo_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $t102_jo_list->showPageHeader(); ?>
<?php
$t102_jo_list->showMessage();
?>
<?php if ($t102_jo_list->TotalRecs > 0 || $t102_jo->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t102_jo_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t102_jo">
<form name="ft102_jolist" id="ft102_jolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t102_jo_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t102_jo_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t102_jo">
<div id="gmp_t102_jo" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t102_jo_list->TotalRecs > 0 || $t102_jo->isGridEdit()) { ?>
<table id="tbl_t102_jolist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t102_jo_list->RowType = ROWTYPE_HEADER;

// Render list options
$t102_jo_list->renderListOptions();

// Render list options (header, left)
$t102_jo_list->ListOptions->render("header", "left");
?>
<?php if ($t102_jo->id->Visible) { // id ?>
	<?php if ($t102_jo->sortUrl($t102_jo->id) == "") { ?>
		<th data-name="id" class="<?php echo $t102_jo->id->headerCellClass() ?>"><div id="elh_t102_jo_id" class="t102_jo_id"><div class="ew-table-header-caption"><?php echo $t102_jo->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $t102_jo->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t102_jo->SortUrl($t102_jo->id) ?>',1);"><div id="elh_t102_jo_id" class="t102_jo_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_jo->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_jo->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t102_jo->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_jo->Nomor_JO->Visible) { // Nomor_JO ?>
	<?php if ($t102_jo->sortUrl($t102_jo->Nomor_JO) == "") { ?>
		<th data-name="Nomor_JO" class="<?php echo $t102_jo->Nomor_JO->headerCellClass() ?>"><div id="elh_t102_jo_Nomor_JO" class="t102_jo_Nomor_JO"><div class="ew-table-header-caption"><?php echo $t102_jo->Nomor_JO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nomor_JO" class="<?php echo $t102_jo->Nomor_JO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t102_jo->SortUrl($t102_jo->Nomor_JO) ?>',1);"><div id="elh_t102_jo_Nomor_JO" class="t102_jo_Nomor_JO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_jo->Nomor_JO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t102_jo->Nomor_JO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t102_jo->Nomor_JO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t102_jo_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t102_jo->ExportAll && $t102_jo->isExport()) {
	$t102_jo_list->StopRec = $t102_jo_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t102_jo_list->TotalRecs > $t102_jo_list->StartRec + $t102_jo_list->DisplayRecs - 1)
		$t102_jo_list->StopRec = $t102_jo_list->StartRec + $t102_jo_list->DisplayRecs - 1;
	else
		$t102_jo_list->StopRec = $t102_jo_list->TotalRecs;
}
$t102_jo_list->RecCnt = $t102_jo_list->StartRec - 1;
if ($t102_jo_list->Recordset && !$t102_jo_list->Recordset->EOF) {
	$t102_jo_list->Recordset->moveFirst();
	$selectLimit = $t102_jo_list->UseSelectLimit;
	if (!$selectLimit && $t102_jo_list->StartRec > 1)
		$t102_jo_list->Recordset->move($t102_jo_list->StartRec - 1);
} elseif (!$t102_jo->AllowAddDeleteRow && $t102_jo_list->StopRec == 0) {
	$t102_jo_list->StopRec = $t102_jo->GridAddRowCount;
}

// Initialize aggregate
$t102_jo->RowType = ROWTYPE_AGGREGATEINIT;
$t102_jo->resetAttributes();
$t102_jo_list->renderRow();
while ($t102_jo_list->RecCnt < $t102_jo_list->StopRec) {
	$t102_jo_list->RecCnt++;
	if ($t102_jo_list->RecCnt >= $t102_jo_list->StartRec) {
		$t102_jo_list->RowCnt++;

		// Set up key count
		$t102_jo_list->KeyCount = $t102_jo_list->RowIndex;

		// Init row class and style
		$t102_jo->resetAttributes();
		$t102_jo->CssClass = "";
		if ($t102_jo->isGridAdd()) {
		} else {
			$t102_jo_list->loadRowValues($t102_jo_list->Recordset); // Load row values
		}
		$t102_jo->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t102_jo->RowAttrs = array_merge($t102_jo->RowAttrs, array('data-rowindex'=>$t102_jo_list->RowCnt, 'id'=>'r' . $t102_jo_list->RowCnt . '_t102_jo', 'data-rowtype'=>$t102_jo->RowType));

		// Render row
		$t102_jo_list->renderRow();

		// Render list options
		$t102_jo_list->renderListOptions();
?>
	<tr<?php echo $t102_jo->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t102_jo_list->ListOptions->render("body", "left", $t102_jo_list->RowCnt);
?>
	<?php if ($t102_jo->id->Visible) { // id ?>
		<td data-name="id"<?php echo $t102_jo->id->cellAttributes() ?>>
<span id="el<?php echo $t102_jo_list->RowCnt ?>_t102_jo_id" class="t102_jo_id">
<span<?php echo $t102_jo->id->viewAttributes() ?>>
<?php echo $t102_jo->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t102_jo->Nomor_JO->Visible) { // Nomor_JO ?>
		<td data-name="Nomor_JO"<?php echo $t102_jo->Nomor_JO->cellAttributes() ?>>
<span id="el<?php echo $t102_jo_list->RowCnt ?>_t102_jo_Nomor_JO" class="t102_jo_Nomor_JO">
<span<?php echo $t102_jo->Nomor_JO->viewAttributes() ?>>
<?php echo $t102_jo->Nomor_JO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t102_jo_list->ListOptions->render("body", "right", $t102_jo_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t102_jo->isGridAdd())
		$t102_jo_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t102_jo->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t102_jo_list->Recordset)
	$t102_jo_list->Recordset->Close();
?>
<?php if (!$t102_jo->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t102_jo->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t102_jo_list->Pager)) $t102_jo_list->Pager = new PrevNextPager($t102_jo_list->StartRec, $t102_jo_list->DisplayRecs, $t102_jo_list->TotalRecs, $t102_jo_list->AutoHidePager) ?>
<?php if ($t102_jo_list->Pager->RecordCount > 0 && $t102_jo_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t102_jo_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t102_jo_list->pageUrl() ?>start=<?php echo $t102_jo_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t102_jo_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t102_jo_list->pageUrl() ?>start=<?php echo $t102_jo_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t102_jo_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t102_jo_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t102_jo_list->pageUrl() ?>start=<?php echo $t102_jo_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t102_jo_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t102_jo_list->pageUrl() ?>start=<?php echo $t102_jo_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t102_jo_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t102_jo_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t102_jo_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t102_jo_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t102_jo_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t102_jo_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t102_jo_list->TotalRecs == 0 && !$t102_jo->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t102_jo_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t102_jo_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t102_jo->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$t102_jo->isExport()) { ?>
<script>
ew.scrollableTable("gmp_t102_jo", "100%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t102_jo_list->terminate();
?>