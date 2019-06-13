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
$t399_audit_trail_list = new t399_audit_trail_list();

// Run the page
$t399_audit_trail_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t399_audit_trail_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t399_audit_trail->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft399_audit_traillist = currentForm = new ew.Form("ft399_audit_traillist", "list");
ft399_audit_traillist.formKeyCountName = '<?php echo $t399_audit_trail_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft399_audit_traillist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft399_audit_traillist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ft399_audit_traillistsrch = currentSearchForm = new ew.Form("ft399_audit_traillistsrch");

// Filters
ft399_audit_traillistsrch.filterList = <?php echo $t399_audit_trail_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t399_audit_trail->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t399_audit_trail_list->TotalRecs > 0 && $t399_audit_trail_list->ExportOptions->visible()) { ?>
<?php $t399_audit_trail_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t399_audit_trail_list->ImportOptions->visible()) { ?>
<?php $t399_audit_trail_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t399_audit_trail_list->SearchOptions->visible()) { ?>
<?php $t399_audit_trail_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t399_audit_trail_list->FilterOptions->visible()) { ?>
<?php $t399_audit_trail_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t399_audit_trail_list->renderOtherOptions();
?>
<?php if (!$t399_audit_trail->isExport() && !$t399_audit_trail->CurrentAction) { ?>
<form name="ft399_audit_traillistsrch" id="ft399_audit_traillistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t399_audit_trail_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft399_audit_traillistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t399_audit_trail">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t399_audit_trail_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t399_audit_trail_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t399_audit_trail_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t399_audit_trail_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t399_audit_trail_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t399_audit_trail_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t399_audit_trail_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $t399_audit_trail_list->showPageHeader(); ?>
<?php
$t399_audit_trail_list->showMessage();
?>
<?php if ($t399_audit_trail_list->TotalRecs > 0 || $t399_audit_trail->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t399_audit_trail_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t399_audit_trail">
<form name="ft399_audit_traillist" id="ft399_audit_traillist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t399_audit_trail_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t399_audit_trail_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t399_audit_trail">
<div id="gmp_t399_audit_trail" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t399_audit_trail_list->TotalRecs > 0 || $t399_audit_trail->isGridEdit()) { ?>
<table id="tbl_t399_audit_traillist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t399_audit_trail_list->RowType = ROWTYPE_HEADER;

// Render list options
$t399_audit_trail_list->renderListOptions();

// Render list options (header, left)
$t399_audit_trail_list->ListOptions->render("header", "left");
?>
<?php if ($t399_audit_trail->id->Visible) { // id ?>
	<?php if ($t399_audit_trail->sortUrl($t399_audit_trail->id) == "") { ?>
		<th data-name="id" class="<?php echo $t399_audit_trail->id->headerCellClass() ?>"><div id="elh_t399_audit_trail_id" class="t399_audit_trail_id"><div class="ew-table-header-caption"><?php echo $t399_audit_trail->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $t399_audit_trail->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t399_audit_trail->SortUrl($t399_audit_trail->id) ?>',1);"><div id="elh_t399_audit_trail_id" class="t399_audit_trail_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t399_audit_trail->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t399_audit_trail->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t399_audit_trail->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t399_audit_trail->datetime->Visible) { // datetime ?>
	<?php if ($t399_audit_trail->sortUrl($t399_audit_trail->datetime) == "") { ?>
		<th data-name="datetime" class="<?php echo $t399_audit_trail->datetime->headerCellClass() ?>"><div id="elh_t399_audit_trail_datetime" class="t399_audit_trail_datetime"><div class="ew-table-header-caption"><?php echo $t399_audit_trail->datetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="datetime" class="<?php echo $t399_audit_trail->datetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t399_audit_trail->SortUrl($t399_audit_trail->datetime) ?>',1);"><div id="elh_t399_audit_trail_datetime" class="t399_audit_trail_datetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t399_audit_trail->datetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($t399_audit_trail->datetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t399_audit_trail->datetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t399_audit_trail->script->Visible) { // script ?>
	<?php if ($t399_audit_trail->sortUrl($t399_audit_trail->script) == "") { ?>
		<th data-name="script" class="<?php echo $t399_audit_trail->script->headerCellClass() ?>"><div id="elh_t399_audit_trail_script" class="t399_audit_trail_script"><div class="ew-table-header-caption"><?php echo $t399_audit_trail->script->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="script" class="<?php echo $t399_audit_trail->script->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t399_audit_trail->SortUrl($t399_audit_trail->script) ?>',1);"><div id="elh_t399_audit_trail_script" class="t399_audit_trail_script">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t399_audit_trail->script->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t399_audit_trail->script->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t399_audit_trail->script->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t399_audit_trail->user->Visible) { // user ?>
	<?php if ($t399_audit_trail->sortUrl($t399_audit_trail->user) == "") { ?>
		<th data-name="user" class="<?php echo $t399_audit_trail->user->headerCellClass() ?>"><div id="elh_t399_audit_trail_user" class="t399_audit_trail_user"><div class="ew-table-header-caption"><?php echo $t399_audit_trail->user->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="user" class="<?php echo $t399_audit_trail->user->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t399_audit_trail->SortUrl($t399_audit_trail->user) ?>',1);"><div id="elh_t399_audit_trail_user" class="t399_audit_trail_user">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t399_audit_trail->user->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t399_audit_trail->user->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t399_audit_trail->user->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t399_audit_trail->_action->Visible) { // action ?>
	<?php if ($t399_audit_trail->sortUrl($t399_audit_trail->_action) == "") { ?>
		<th data-name="_action" class="<?php echo $t399_audit_trail->_action->headerCellClass() ?>"><div id="elh_t399_audit_trail__action" class="t399_audit_trail__action"><div class="ew-table-header-caption"><?php echo $t399_audit_trail->_action->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_action" class="<?php echo $t399_audit_trail->_action->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t399_audit_trail->SortUrl($t399_audit_trail->_action) ?>',1);"><div id="elh_t399_audit_trail__action" class="t399_audit_trail__action">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t399_audit_trail->_action->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t399_audit_trail->_action->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t399_audit_trail->_action->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t399_audit_trail->_table->Visible) { // table ?>
	<?php if ($t399_audit_trail->sortUrl($t399_audit_trail->_table) == "") { ?>
		<th data-name="_table" class="<?php echo $t399_audit_trail->_table->headerCellClass() ?>"><div id="elh_t399_audit_trail__table" class="t399_audit_trail__table"><div class="ew-table-header-caption"><?php echo $t399_audit_trail->_table->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_table" class="<?php echo $t399_audit_trail->_table->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t399_audit_trail->SortUrl($t399_audit_trail->_table) ?>',1);"><div id="elh_t399_audit_trail__table" class="t399_audit_trail__table">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t399_audit_trail->_table->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t399_audit_trail->_table->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t399_audit_trail->_table->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t399_audit_trail->field->Visible) { // field ?>
	<?php if ($t399_audit_trail->sortUrl($t399_audit_trail->field) == "") { ?>
		<th data-name="field" class="<?php echo $t399_audit_trail->field->headerCellClass() ?>"><div id="elh_t399_audit_trail_field" class="t399_audit_trail_field"><div class="ew-table-header-caption"><?php echo $t399_audit_trail->field->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="field" class="<?php echo $t399_audit_trail->field->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t399_audit_trail->SortUrl($t399_audit_trail->field) ?>',1);"><div id="elh_t399_audit_trail_field" class="t399_audit_trail_field">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t399_audit_trail->field->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t399_audit_trail->field->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t399_audit_trail->field->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t399_audit_trail_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t399_audit_trail->ExportAll && $t399_audit_trail->isExport()) {
	$t399_audit_trail_list->StopRec = $t399_audit_trail_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t399_audit_trail_list->TotalRecs > $t399_audit_trail_list->StartRec + $t399_audit_trail_list->DisplayRecs - 1)
		$t399_audit_trail_list->StopRec = $t399_audit_trail_list->StartRec + $t399_audit_trail_list->DisplayRecs - 1;
	else
		$t399_audit_trail_list->StopRec = $t399_audit_trail_list->TotalRecs;
}
$t399_audit_trail_list->RecCnt = $t399_audit_trail_list->StartRec - 1;
if ($t399_audit_trail_list->Recordset && !$t399_audit_trail_list->Recordset->EOF) {
	$t399_audit_trail_list->Recordset->moveFirst();
	$selectLimit = $t399_audit_trail_list->UseSelectLimit;
	if (!$selectLimit && $t399_audit_trail_list->StartRec > 1)
		$t399_audit_trail_list->Recordset->move($t399_audit_trail_list->StartRec - 1);
} elseif (!$t399_audit_trail->AllowAddDeleteRow && $t399_audit_trail_list->StopRec == 0) {
	$t399_audit_trail_list->StopRec = $t399_audit_trail->GridAddRowCount;
}

// Initialize aggregate
$t399_audit_trail->RowType = ROWTYPE_AGGREGATEINIT;
$t399_audit_trail->resetAttributes();
$t399_audit_trail_list->renderRow();
while ($t399_audit_trail_list->RecCnt < $t399_audit_trail_list->StopRec) {
	$t399_audit_trail_list->RecCnt++;
	if ($t399_audit_trail_list->RecCnt >= $t399_audit_trail_list->StartRec) {
		$t399_audit_trail_list->RowCnt++;

		// Set up key count
		$t399_audit_trail_list->KeyCount = $t399_audit_trail_list->RowIndex;

		// Init row class and style
		$t399_audit_trail->resetAttributes();
		$t399_audit_trail->CssClass = "";
		if ($t399_audit_trail->isGridAdd()) {
		} else {
			$t399_audit_trail_list->loadRowValues($t399_audit_trail_list->Recordset); // Load row values
		}
		$t399_audit_trail->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t399_audit_trail->RowAttrs = array_merge($t399_audit_trail->RowAttrs, array('data-rowindex'=>$t399_audit_trail_list->RowCnt, 'id'=>'r' . $t399_audit_trail_list->RowCnt . '_t399_audit_trail', 'data-rowtype'=>$t399_audit_trail->RowType));

		// Render row
		$t399_audit_trail_list->renderRow();

		// Render list options
		$t399_audit_trail_list->renderListOptions();
?>
	<tr<?php echo $t399_audit_trail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t399_audit_trail_list->ListOptions->render("body", "left", $t399_audit_trail_list->RowCnt);
?>
	<?php if ($t399_audit_trail->id->Visible) { // id ?>
		<td data-name="id"<?php echo $t399_audit_trail->id->cellAttributes() ?>>
<span id="el<?php echo $t399_audit_trail_list->RowCnt ?>_t399_audit_trail_id" class="t399_audit_trail_id">
<span<?php echo $t399_audit_trail->id->viewAttributes() ?>>
<?php echo $t399_audit_trail->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t399_audit_trail->datetime->Visible) { // datetime ?>
		<td data-name="datetime"<?php echo $t399_audit_trail->datetime->cellAttributes() ?>>
<span id="el<?php echo $t399_audit_trail_list->RowCnt ?>_t399_audit_trail_datetime" class="t399_audit_trail_datetime">
<span<?php echo $t399_audit_trail->datetime->viewAttributes() ?>>
<?php echo $t399_audit_trail->datetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t399_audit_trail->script->Visible) { // script ?>
		<td data-name="script"<?php echo $t399_audit_trail->script->cellAttributes() ?>>
<span id="el<?php echo $t399_audit_trail_list->RowCnt ?>_t399_audit_trail_script" class="t399_audit_trail_script">
<span<?php echo $t399_audit_trail->script->viewAttributes() ?>>
<?php echo $t399_audit_trail->script->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t399_audit_trail->user->Visible) { // user ?>
		<td data-name="user"<?php echo $t399_audit_trail->user->cellAttributes() ?>>
<span id="el<?php echo $t399_audit_trail_list->RowCnt ?>_t399_audit_trail_user" class="t399_audit_trail_user">
<span<?php echo $t399_audit_trail->user->viewAttributes() ?>>
<?php echo $t399_audit_trail->user->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t399_audit_trail->_action->Visible) { // action ?>
		<td data-name="_action"<?php echo $t399_audit_trail->_action->cellAttributes() ?>>
<span id="el<?php echo $t399_audit_trail_list->RowCnt ?>_t399_audit_trail__action" class="t399_audit_trail__action">
<span<?php echo $t399_audit_trail->_action->viewAttributes() ?>>
<?php echo $t399_audit_trail->_action->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t399_audit_trail->_table->Visible) { // table ?>
		<td data-name="_table"<?php echo $t399_audit_trail->_table->cellAttributes() ?>>
<span id="el<?php echo $t399_audit_trail_list->RowCnt ?>_t399_audit_trail__table" class="t399_audit_trail__table">
<span<?php echo $t399_audit_trail->_table->viewAttributes() ?>>
<?php echo $t399_audit_trail->_table->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t399_audit_trail->field->Visible) { // field ?>
		<td data-name="field"<?php echo $t399_audit_trail->field->cellAttributes() ?>>
<span id="el<?php echo $t399_audit_trail_list->RowCnt ?>_t399_audit_trail_field" class="t399_audit_trail_field">
<span<?php echo $t399_audit_trail->field->viewAttributes() ?>>
<?php echo $t399_audit_trail->field->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t399_audit_trail_list->ListOptions->render("body", "right", $t399_audit_trail_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t399_audit_trail->isGridAdd())
		$t399_audit_trail_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t399_audit_trail->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t399_audit_trail_list->Recordset)
	$t399_audit_trail_list->Recordset->Close();
?>
<?php if (!$t399_audit_trail->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t399_audit_trail->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t399_audit_trail_list->Pager)) $t399_audit_trail_list->Pager = new PrevNextPager($t399_audit_trail_list->StartRec, $t399_audit_trail_list->DisplayRecs, $t399_audit_trail_list->TotalRecs, $t399_audit_trail_list->AutoHidePager) ?>
<?php if ($t399_audit_trail_list->Pager->RecordCount > 0 && $t399_audit_trail_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t399_audit_trail_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t399_audit_trail_list->pageUrl() ?>start=<?php echo $t399_audit_trail_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t399_audit_trail_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t399_audit_trail_list->pageUrl() ?>start=<?php echo $t399_audit_trail_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t399_audit_trail_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t399_audit_trail_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t399_audit_trail_list->pageUrl() ?>start=<?php echo $t399_audit_trail_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t399_audit_trail_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t399_audit_trail_list->pageUrl() ?>start=<?php echo $t399_audit_trail_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t399_audit_trail_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t399_audit_trail_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t399_audit_trail_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t399_audit_trail_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t399_audit_trail_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t399_audit_trail_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t399_audit_trail_list->TotalRecs == 0 && !$t399_audit_trail->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t399_audit_trail_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t399_audit_trail_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t399_audit_trail->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$t399_audit_trail->isExport()) { ?>
<script>
ew.scrollableTable("gmp_t399_audit_trail", "100%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t399_audit_trail_list->terminate();
?>