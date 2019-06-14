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
$t101_jo_head_list = new t101_jo_head_list();

// Run the page
$t101_jo_head_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_jo_head_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t101_jo_head->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft101_jo_headlist = currentForm = new ew.Form("ft101_jo_headlist", "list");
ft101_jo_headlist.formKeyCountName = '<?php echo $t101_jo_head_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft101_jo_headlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft101_jo_headlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft101_jo_headlist.lists["x_Shipper_id"] = <?php echo $t101_jo_head_list->Shipper_id->Lookup->toClientList() ?>;
ft101_jo_headlist.lists["x_Shipper_id"].options = <?php echo JsonEncode($t101_jo_head_list->Shipper_id->lookupOptions()) ?>;
ft101_jo_headlist.lists["x_Container"] = <?php echo $t101_jo_head_list->Container->Lookup->toClientList() ?>;
ft101_jo_headlist.lists["x_Container"].options = <?php echo JsonEncode($t101_jo_head_list->Container->options(FALSE, TRUE)) ?>;
ft101_jo_headlist.lists["x_Destination_id"] = <?php echo $t101_jo_head_list->Destination_id->Lookup->toClientList() ?>;
ft101_jo_headlist.lists["x_Destination_id"].options = <?php echo JsonEncode($t101_jo_head_list->Destination_id->lookupOptions()) ?>;
ft101_jo_headlist.lists["x_Feeder_id"] = <?php echo $t101_jo_head_list->Feeder_id->Lookup->toClientList() ?>;
ft101_jo_headlist.lists["x_Feeder_id"].options = <?php echo JsonEncode($t101_jo_head_list->Feeder_id->lookupOptions()) ?>;

// Form object for search
var ft101_jo_headlistsrch = currentSearchForm = new ew.Form("ft101_jo_headlistsrch");

// Filters
ft101_jo_headlistsrch.filterList = <?php echo $t101_jo_head_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t101_jo_head->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t101_jo_head_list->TotalRecs > 0 && $t101_jo_head_list->ExportOptions->visible()) { ?>
<?php $t101_jo_head_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t101_jo_head_list->ImportOptions->visible()) { ?>
<?php $t101_jo_head_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t101_jo_head_list->SearchOptions->visible()) { ?>
<?php $t101_jo_head_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t101_jo_head_list->FilterOptions->visible()) { ?>
<?php $t101_jo_head_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t101_jo_head_list->renderOtherOptions();
?>
<?php if (!$t101_jo_head->isExport() && !$t101_jo_head->CurrentAction) { ?>
<form name="ft101_jo_headlistsrch" id="ft101_jo_headlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t101_jo_head_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft101_jo_headlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t101_jo_head">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t101_jo_head_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t101_jo_head_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t101_jo_head_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t101_jo_head_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t101_jo_head_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t101_jo_head_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t101_jo_head_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $t101_jo_head_list->showPageHeader(); ?>
<?php
$t101_jo_head_list->showMessage();
?>
<?php if ($t101_jo_head_list->TotalRecs > 0 || $t101_jo_head->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t101_jo_head_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t101_jo_head">
<form name="ft101_jo_headlist" id="ft101_jo_headlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t101_jo_head_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t101_jo_head_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_jo_head">
<div id="gmp_t101_jo_head" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t101_jo_head_list->TotalRecs > 0 || $t101_jo_head->isGridEdit()) { ?>
<table id="tbl_t101_jo_headlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t101_jo_head_list->RowType = ROWTYPE_HEADER;

// Render list options
$t101_jo_head_list->renderListOptions();

// Render list options (header, left)
$t101_jo_head_list->ListOptions->render("header", "left");
?>
<?php if ($t101_jo_head->id->Visible) { // id ?>
	<?php if ($t101_jo_head->sortUrl($t101_jo_head->id) == "") { ?>
		<th data-name="id" class="<?php echo $t101_jo_head->id->headerCellClass() ?>"><div id="elh_t101_jo_head_id" class="t101_jo_head_id"><div class="ew-table-header-caption"><?php echo $t101_jo_head->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $t101_jo_head->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_jo_head->SortUrl($t101_jo_head->id) ?>',2);"><div id="elh_t101_jo_head_id" class="t101_jo_head_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_head->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_head->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_head->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_head->Nomor_JO->Visible) { // Nomor_JO ?>
	<?php if ($t101_jo_head->sortUrl($t101_jo_head->Nomor_JO) == "") { ?>
		<th data-name="Nomor_JO" class="<?php echo $t101_jo_head->Nomor_JO->headerCellClass() ?>"><div id="elh_t101_jo_head_Nomor_JO" class="t101_jo_head_Nomor_JO"><div class="ew-table-header-caption"><?php echo $t101_jo_head->Nomor_JO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nomor_JO" class="<?php echo $t101_jo_head->Nomor_JO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_jo_head->SortUrl($t101_jo_head->Nomor_JO) ?>',2);"><div id="elh_t101_jo_head_Nomor_JO" class="t101_jo_head_Nomor_JO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_head->Nomor_JO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_head->Nomor_JO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_head->Nomor_JO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_head->Shipper_id->Visible) { // Shipper_id ?>
	<?php if ($t101_jo_head->sortUrl($t101_jo_head->Shipper_id) == "") { ?>
		<th data-name="Shipper_id" class="<?php echo $t101_jo_head->Shipper_id->headerCellClass() ?>"><div id="elh_t101_jo_head_Shipper_id" class="t101_jo_head_Shipper_id"><div class="ew-table-header-caption"><?php echo $t101_jo_head->Shipper_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Shipper_id" class="<?php echo $t101_jo_head->Shipper_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_jo_head->SortUrl($t101_jo_head->Shipper_id) ?>',2);"><div id="elh_t101_jo_head_Shipper_id" class="t101_jo_head_Shipper_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_head->Shipper_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_head->Shipper_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_head->Shipper_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_head->Party->Visible) { // Party ?>
	<?php if ($t101_jo_head->sortUrl($t101_jo_head->Party) == "") { ?>
		<th data-name="Party" class="<?php echo $t101_jo_head->Party->headerCellClass() ?>"><div id="elh_t101_jo_head_Party" class="t101_jo_head_Party"><div class="ew-table-header-caption"><?php echo $t101_jo_head->Party->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Party" class="<?php echo $t101_jo_head->Party->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_jo_head->SortUrl($t101_jo_head->Party) ?>',2);"><div id="elh_t101_jo_head_Party" class="t101_jo_head_Party">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_head->Party->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_head->Party->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_head->Party->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_head->Container->Visible) { // Container ?>
	<?php if ($t101_jo_head->sortUrl($t101_jo_head->Container) == "") { ?>
		<th data-name="Container" class="<?php echo $t101_jo_head->Container->headerCellClass() ?>"><div id="elh_t101_jo_head_Container" class="t101_jo_head_Container"><div class="ew-table-header-caption"><?php echo $t101_jo_head->Container->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Container" class="<?php echo $t101_jo_head->Container->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_jo_head->SortUrl($t101_jo_head->Container) ?>',2);"><div id="elh_t101_jo_head_Container" class="t101_jo_head_Container">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_head->Container->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_head->Container->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_head->Container->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_head->Tanggal_Stuffing->Visible) { // Tanggal_Stuffing ?>
	<?php if ($t101_jo_head->sortUrl($t101_jo_head->Tanggal_Stuffing) == "") { ?>
		<th data-name="Tanggal_Stuffing" class="<?php echo $t101_jo_head->Tanggal_Stuffing->headerCellClass() ?>"><div id="elh_t101_jo_head_Tanggal_Stuffing" class="t101_jo_head_Tanggal_Stuffing"><div class="ew-table-header-caption"><?php echo $t101_jo_head->Tanggal_Stuffing->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tanggal_Stuffing" class="<?php echo $t101_jo_head->Tanggal_Stuffing->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_jo_head->SortUrl($t101_jo_head->Tanggal_Stuffing) ?>',2);"><div id="elh_t101_jo_head_Tanggal_Stuffing" class="t101_jo_head_Tanggal_Stuffing">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_head->Tanggal_Stuffing->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_head->Tanggal_Stuffing->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_head->Tanggal_Stuffing->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_head->Destination_id->Visible) { // Destination_id ?>
	<?php if ($t101_jo_head->sortUrl($t101_jo_head->Destination_id) == "") { ?>
		<th data-name="Destination_id" class="<?php echo $t101_jo_head->Destination_id->headerCellClass() ?>"><div id="elh_t101_jo_head_Destination_id" class="t101_jo_head_Destination_id"><div class="ew-table-header-caption"><?php echo $t101_jo_head->Destination_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Destination_id" class="<?php echo $t101_jo_head->Destination_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_jo_head->SortUrl($t101_jo_head->Destination_id) ?>',2);"><div id="elh_t101_jo_head_Destination_id" class="t101_jo_head_Destination_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_head->Destination_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_head->Destination_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_head->Destination_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_head->Feeder_id->Visible) { // Feeder_id ?>
	<?php if ($t101_jo_head->sortUrl($t101_jo_head->Feeder_id) == "") { ?>
		<th data-name="Feeder_id" class="<?php echo $t101_jo_head->Feeder_id->headerCellClass() ?>"><div id="elh_t101_jo_head_Feeder_id" class="t101_jo_head_Feeder_id"><div class="ew-table-header-caption"><?php echo $t101_jo_head->Feeder_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Feeder_id" class="<?php echo $t101_jo_head->Feeder_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_jo_head->SortUrl($t101_jo_head->Feeder_id) ?>',2);"><div id="elh_t101_jo_head_Feeder_id" class="t101_jo_head_Feeder_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_head->Feeder_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_head->Feeder_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_head->Feeder_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t101_jo_head_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t101_jo_head->ExportAll && $t101_jo_head->isExport()) {
	$t101_jo_head_list->StopRec = $t101_jo_head_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t101_jo_head_list->TotalRecs > $t101_jo_head_list->StartRec + $t101_jo_head_list->DisplayRecs - 1)
		$t101_jo_head_list->StopRec = $t101_jo_head_list->StartRec + $t101_jo_head_list->DisplayRecs - 1;
	else
		$t101_jo_head_list->StopRec = $t101_jo_head_list->TotalRecs;
}
$t101_jo_head_list->RecCnt = $t101_jo_head_list->StartRec - 1;
if ($t101_jo_head_list->Recordset && !$t101_jo_head_list->Recordset->EOF) {
	$t101_jo_head_list->Recordset->moveFirst();
	$selectLimit = $t101_jo_head_list->UseSelectLimit;
	if (!$selectLimit && $t101_jo_head_list->StartRec > 1)
		$t101_jo_head_list->Recordset->move($t101_jo_head_list->StartRec - 1);
} elseif (!$t101_jo_head->AllowAddDeleteRow && $t101_jo_head_list->StopRec == 0) {
	$t101_jo_head_list->StopRec = $t101_jo_head->GridAddRowCount;
}

// Initialize aggregate
$t101_jo_head->RowType = ROWTYPE_AGGREGATEINIT;
$t101_jo_head->resetAttributes();
$t101_jo_head_list->renderRow();
while ($t101_jo_head_list->RecCnt < $t101_jo_head_list->StopRec) {
	$t101_jo_head_list->RecCnt++;
	if ($t101_jo_head_list->RecCnt >= $t101_jo_head_list->StartRec) {
		$t101_jo_head_list->RowCnt++;

		// Set up key count
		$t101_jo_head_list->KeyCount = $t101_jo_head_list->RowIndex;

		// Init row class and style
		$t101_jo_head->resetAttributes();
		$t101_jo_head->CssClass = "";
		if ($t101_jo_head->isGridAdd()) {
		} else {
			$t101_jo_head_list->loadRowValues($t101_jo_head_list->Recordset); // Load row values
		}
		$t101_jo_head->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t101_jo_head->RowAttrs = array_merge($t101_jo_head->RowAttrs, array('data-rowindex'=>$t101_jo_head_list->RowCnt, 'id'=>'r' . $t101_jo_head_list->RowCnt . '_t101_jo_head', 'data-rowtype'=>$t101_jo_head->RowType));

		// Render row
		$t101_jo_head_list->renderRow();

		// Render list options
		$t101_jo_head_list->renderListOptions();
?>
	<tr<?php echo $t101_jo_head->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t101_jo_head_list->ListOptions->render("body", "left", $t101_jo_head_list->RowCnt);
?>
	<?php if ($t101_jo_head->id->Visible) { // id ?>
		<td data-name="id"<?php echo $t101_jo_head->id->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_id" class="t101_jo_head_id">
<span<?php echo $t101_jo_head->id->viewAttributes() ?>>
<?php echo $t101_jo_head->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_jo_head->Nomor_JO->Visible) { // Nomor_JO ?>
		<td data-name="Nomor_JO"<?php echo $t101_jo_head->Nomor_JO->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Nomor_JO" class="t101_jo_head_Nomor_JO">
<span<?php echo $t101_jo_head->Nomor_JO->viewAttributes() ?>>
<?php echo $t101_jo_head->Nomor_JO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_jo_head->Shipper_id->Visible) { // Shipper_id ?>
		<td data-name="Shipper_id"<?php echo $t101_jo_head->Shipper_id->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Shipper_id" class="t101_jo_head_Shipper_id">
<span<?php echo $t101_jo_head->Shipper_id->viewAttributes() ?>>
<?php echo $t101_jo_head->Shipper_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_jo_head->Party->Visible) { // Party ?>
		<td data-name="Party"<?php echo $t101_jo_head->Party->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Party" class="t101_jo_head_Party">
<span<?php echo $t101_jo_head->Party->viewAttributes() ?>>
<?php echo $t101_jo_head->Party->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_jo_head->Container->Visible) { // Container ?>
		<td data-name="Container"<?php echo $t101_jo_head->Container->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Container" class="t101_jo_head_Container">
<span<?php echo $t101_jo_head->Container->viewAttributes() ?>>
<?php echo $t101_jo_head->Container->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_jo_head->Tanggal_Stuffing->Visible) { // Tanggal_Stuffing ?>
		<td data-name="Tanggal_Stuffing"<?php echo $t101_jo_head->Tanggal_Stuffing->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Tanggal_Stuffing" class="t101_jo_head_Tanggal_Stuffing">
<span<?php echo $t101_jo_head->Tanggal_Stuffing->viewAttributes() ?>>
<?php echo $t101_jo_head->Tanggal_Stuffing->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_jo_head->Destination_id->Visible) { // Destination_id ?>
		<td data-name="Destination_id"<?php echo $t101_jo_head->Destination_id->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Destination_id" class="t101_jo_head_Destination_id">
<span<?php echo $t101_jo_head->Destination_id->viewAttributes() ?>>
<?php echo $t101_jo_head->Destination_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_jo_head->Feeder_id->Visible) { // Feeder_id ?>
		<td data-name="Feeder_id"<?php echo $t101_jo_head->Feeder_id->cellAttributes() ?>>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Feeder_id" class="t101_jo_head_Feeder_id">
<span<?php echo $t101_jo_head->Feeder_id->viewAttributes() ?>>
<?php echo $t101_jo_head->Feeder_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t101_jo_head_list->ListOptions->render("body", "right", $t101_jo_head_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t101_jo_head->isGridAdd())
		$t101_jo_head_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t101_jo_head->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t101_jo_head_list->Recordset)
	$t101_jo_head_list->Recordset->Close();
?>
<?php if (!$t101_jo_head->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t101_jo_head->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t101_jo_head_list->Pager)) $t101_jo_head_list->Pager = new PrevNextPager($t101_jo_head_list->StartRec, $t101_jo_head_list->DisplayRecs, $t101_jo_head_list->TotalRecs, $t101_jo_head_list->AutoHidePager) ?>
<?php if ($t101_jo_head_list->Pager->RecordCount > 0 && $t101_jo_head_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t101_jo_head_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t101_jo_head_list->pageUrl() ?>start=<?php echo $t101_jo_head_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t101_jo_head_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t101_jo_head_list->pageUrl() ?>start=<?php echo $t101_jo_head_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t101_jo_head_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t101_jo_head_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t101_jo_head_list->pageUrl() ?>start=<?php echo $t101_jo_head_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t101_jo_head_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t101_jo_head_list->pageUrl() ?>start=<?php echo $t101_jo_head_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t101_jo_head_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t101_jo_head_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t101_jo_head_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t101_jo_head_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t101_jo_head_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t101_jo_head_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t101_jo_head_list->TotalRecs == 0 && !$t101_jo_head->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t101_jo_head_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t101_jo_head_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t101_jo_head->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t101_jo_head_list->terminate();
?>