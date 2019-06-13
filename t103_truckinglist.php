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
$t103_trucking_list = new t103_trucking_list();

// Run the page
$t103_trucking_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t103_trucking_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t103_trucking->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft103_truckinglist = currentForm = new ew.Form("ft103_truckinglist", "list");
ft103_truckinglist.formKeyCountName = '<?php echo $t103_trucking_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft103_truckinglist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft103_truckinglist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft103_truckinglist.lists["x_EI"] = <?php echo $t103_trucking_list->EI->Lookup->toClientList() ?>;
ft103_truckinglist.lists["x_EI"].options = <?php echo JsonEncode($t103_trucking_list->EI->options(FALSE, TRUE)) ?>;
ft103_truckinglist.lists["x_Jenis_Container"] = <?php echo $t103_trucking_list->Jenis_Container->Lookup->toClientList() ?>;
ft103_truckinglist.lists["x_Jenis_Container"].options = <?php echo JsonEncode($t103_trucking_list->Jenis_Container->options(FALSE, TRUE)) ?>;

// Form object for search
var ft103_truckinglistsrch = currentSearchForm = new ew.Form("ft103_truckinglistsrch");

// Validate function for search
ft103_truckinglistsrch.validate = function(fobj) {
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
ft103_truckinglistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft103_truckinglistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft103_truckinglistsrch.lists["x_EI"] = <?php echo $t103_trucking_list->EI->Lookup->toClientList() ?>;
ft103_truckinglistsrch.lists["x_EI"].options = <?php echo JsonEncode($t103_trucking_list->EI->options(FALSE, TRUE)) ?>;
ft103_truckinglistsrch.lists["x_Jenis_Container"] = <?php echo $t103_trucking_list->Jenis_Container->Lookup->toClientList() ?>;
ft103_truckinglistsrch.lists["x_Jenis_Container"].options = <?php echo JsonEncode($t103_trucking_list->Jenis_Container->options(FALSE, TRUE)) ?>;

// Filters
ft103_truckinglistsrch.filterList = <?php echo $t103_trucking_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t103_trucking->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t103_trucking_list->TotalRecs > 0 && $t103_trucking_list->ExportOptions->visible()) { ?>
<?php $t103_trucking_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t103_trucking_list->ImportOptions->visible()) { ?>
<?php $t103_trucking_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t103_trucking_list->SearchOptions->visible()) { ?>
<?php $t103_trucking_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t103_trucking_list->FilterOptions->visible()) { ?>
<?php $t103_trucking_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t103_trucking_list->renderOtherOptions();
?>
<?php if (!$t103_trucking->isExport() && !$t103_trucking->CurrentAction) { ?>
<form name="ft103_truckinglistsrch" id="ft103_truckinglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t103_trucking_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft103_truckinglistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t103_trucking">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$t103_trucking_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$t103_trucking->RowType = ROWTYPE_SEARCH;

// Render row
$t103_trucking->resetAttributes();
$t103_trucking_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($t103_trucking->EI->Visible) { // EI ?>
	<div id="xsc_EI" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $t103_trucking->EI->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_EI" id="z_EI" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_EI" class="ew-template"><input type="radio" class="form-check-input" data-table="t103_trucking" data-field="x_EI" data-value-separator="<?php echo $t103_trucking->EI->displayValueSeparatorAttribute() ?>" name="x_EI" id="x_EI" value="{value}"<?php echo $t103_trucking->EI->editAttributes() ?>></div>
<div id="dsl_x_EI" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t103_trucking->EI->radioButtonListHtml(FALSE, "x_EI") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($t103_trucking->Jenis_Container->Visible) { // Jenis_Container ?>
	<div id="xsc_Jenis_Container" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $t103_trucking->Jenis_Container->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Jenis_Container" id="z_Jenis_Container" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_Jenis_Container" class="ew-template"><input type="radio" class="form-check-input" data-table="t103_trucking" data-field="x_Jenis_Container" data-value-separator="<?php echo $t103_trucking->Jenis_Container->displayValueSeparatorAttribute() ?>" name="x_Jenis_Container" id="x_Jenis_Container" value="{value}"<?php echo $t103_trucking->Jenis_Container->editAttributes() ?>></div>
<div id="dsl_x_Jenis_Container" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t103_trucking->Jenis_Container->radioButtonListHtml(FALSE, "x_Jenis_Container") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t103_trucking_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t103_trucking_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t103_trucking_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t103_trucking_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t103_trucking_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t103_trucking_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t103_trucking_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $t103_trucking_list->showPageHeader(); ?>
<?php
$t103_trucking_list->showMessage();
?>
<?php if ($t103_trucking_list->TotalRecs > 0 || $t103_trucking->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t103_trucking_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t103_trucking">
<form name="ft103_truckinglist" id="ft103_truckinglist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t103_trucking_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t103_trucking_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t103_trucking">
<div id="gmp_t103_trucking" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t103_trucking_list->TotalRecs > 0 || $t103_trucking->isGridEdit()) { ?>
<table id="tbl_t103_truckinglist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t103_trucking_list->RowType = ROWTYPE_HEADER;

// Render list options
$t103_trucking_list->renderListOptions();

// Render list options (header, left)
$t103_trucking_list->ListOptions->render("header", "left");
?>
<?php if ($t103_trucking->id->Visible) { // id ?>
	<?php if ($t103_trucking->sortUrl($t103_trucking->id) == "") { ?>
		<th data-name="id" class="<?php echo $t103_trucking->id->headerCellClass() ?>"><div id="elh_t103_trucking_id" class="t103_trucking_id"><div class="ew-table-header-caption"><?php echo $t103_trucking->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $t103_trucking->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t103_trucking->SortUrl($t103_trucking->id) ?>',1);"><div id="elh_t103_trucking_id" class="t103_trucking_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_trucking->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t103_trucking->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t103_trucking->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_trucking->EI->Visible) { // EI ?>
	<?php if ($t103_trucking->sortUrl($t103_trucking->EI) == "") { ?>
		<th data-name="EI" class="<?php echo $t103_trucking->EI->headerCellClass() ?>"><div id="elh_t103_trucking_EI" class="t103_trucking_EI"><div class="ew-table-header-caption"><?php echo $t103_trucking->EI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EI" class="<?php echo $t103_trucking->EI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t103_trucking->SortUrl($t103_trucking->EI) ?>',1);"><div id="elh_t103_trucking_EI" class="t103_trucking_EI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_trucking->EI->caption() ?></span><span class="ew-table-header-sort"><?php if ($t103_trucking->EI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t103_trucking->EI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_trucking->Shipper_id->Visible) { // Shipper_id ?>
	<?php if ($t103_trucking->sortUrl($t103_trucking->Shipper_id) == "") { ?>
		<th data-name="Shipper_id" class="<?php echo $t103_trucking->Shipper_id->headerCellClass() ?>"><div id="elh_t103_trucking_Shipper_id" class="t103_trucking_Shipper_id"><div class="ew-table-header-caption"><?php echo $t103_trucking->Shipper_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Shipper_id" class="<?php echo $t103_trucking->Shipper_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t103_trucking->SortUrl($t103_trucking->Shipper_id) ?>',1);"><div id="elh_t103_trucking_Shipper_id" class="t103_trucking_Shipper_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_trucking->Shipper_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t103_trucking->Shipper_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t103_trucking->Shipper_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_trucking->Party->Visible) { // Party ?>
	<?php if ($t103_trucking->sortUrl($t103_trucking->Party) == "") { ?>
		<th data-name="Party" class="<?php echo $t103_trucking->Party->headerCellClass() ?>"><div id="elh_t103_trucking_Party" class="t103_trucking_Party"><div class="ew-table-header-caption"><?php echo $t103_trucking->Party->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Party" class="<?php echo $t103_trucking->Party->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t103_trucking->SortUrl($t103_trucking->Party) ?>',1);"><div id="elh_t103_trucking_Party" class="t103_trucking_Party">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_trucking->Party->caption() ?></span><span class="ew-table-header-sort"><?php if ($t103_trucking->Party->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t103_trucking->Party->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_trucking->Jenis_Container->Visible) { // Jenis_Container ?>
	<?php if ($t103_trucking->sortUrl($t103_trucking->Jenis_Container) == "") { ?>
		<th data-name="Jenis_Container" class="<?php echo $t103_trucking->Jenis_Container->headerCellClass() ?>"><div id="elh_t103_trucking_Jenis_Container" class="t103_trucking_Jenis_Container"><div class="ew-table-header-caption"><?php echo $t103_trucking->Jenis_Container->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jenis_Container" class="<?php echo $t103_trucking->Jenis_Container->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t103_trucking->SortUrl($t103_trucking->Jenis_Container) ?>',1);"><div id="elh_t103_trucking_Jenis_Container" class="t103_trucking_Jenis_Container">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_trucking->Jenis_Container->caption() ?></span><span class="ew-table-header-sort"><?php if ($t103_trucking->Jenis_Container->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t103_trucking->Jenis_Container->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_trucking->Tgl_Stuffing->Visible) { // Tgl_Stuffing ?>
	<?php if ($t103_trucking->sortUrl($t103_trucking->Tgl_Stuffing) == "") { ?>
		<th data-name="Tgl_Stuffing" class="<?php echo $t103_trucking->Tgl_Stuffing->headerCellClass() ?>"><div id="elh_t103_trucking_Tgl_Stuffing" class="t103_trucking_Tgl_Stuffing"><div class="ew-table-header-caption"><?php echo $t103_trucking->Tgl_Stuffing->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tgl_Stuffing" class="<?php echo $t103_trucking->Tgl_Stuffing->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t103_trucking->SortUrl($t103_trucking->Tgl_Stuffing) ?>',1);"><div id="elh_t103_trucking_Tgl_Stuffing" class="t103_trucking_Tgl_Stuffing">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_trucking->Tgl_Stuffing->caption() ?></span><span class="ew-table-header-sort"><?php if ($t103_trucking->Tgl_Stuffing->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t103_trucking->Tgl_Stuffing->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_trucking->Destination_id->Visible) { // Destination_id ?>
	<?php if ($t103_trucking->sortUrl($t103_trucking->Destination_id) == "") { ?>
		<th data-name="Destination_id" class="<?php echo $t103_trucking->Destination_id->headerCellClass() ?>"><div id="elh_t103_trucking_Destination_id" class="t103_trucking_Destination_id"><div class="ew-table-header-caption"><?php echo $t103_trucking->Destination_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Destination_id" class="<?php echo $t103_trucking->Destination_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t103_trucking->SortUrl($t103_trucking->Destination_id) ?>',1);"><div id="elh_t103_trucking_Destination_id" class="t103_trucking_Destination_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_trucking->Destination_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t103_trucking->Destination_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t103_trucking->Destination_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_trucking->Feeder_id->Visible) { // Feeder_id ?>
	<?php if ($t103_trucking->sortUrl($t103_trucking->Feeder_id) == "") { ?>
		<th data-name="Feeder_id" class="<?php echo $t103_trucking->Feeder_id->headerCellClass() ?>"><div id="elh_t103_trucking_Feeder_id" class="t103_trucking_Feeder_id"><div class="ew-table-header-caption"><?php echo $t103_trucking->Feeder_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Feeder_id" class="<?php echo $t103_trucking->Feeder_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t103_trucking->SortUrl($t103_trucking->Feeder_id) ?>',1);"><div id="elh_t103_trucking_Feeder_id" class="t103_trucking_Feeder_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_trucking->Feeder_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t103_trucking->Feeder_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t103_trucking->Feeder_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_trucking->ETA_ETD->Visible) { // ETA_ETD ?>
	<?php if ($t103_trucking->sortUrl($t103_trucking->ETA_ETD) == "") { ?>
		<th data-name="ETA_ETD" class="<?php echo $t103_trucking->ETA_ETD->headerCellClass() ?>"><div id="elh_t103_trucking_ETA_ETD" class="t103_trucking_ETA_ETD"><div class="ew-table-header-caption"><?php echo $t103_trucking->ETA_ETD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ETA_ETD" class="<?php echo $t103_trucking->ETA_ETD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t103_trucking->SortUrl($t103_trucking->ETA_ETD) ?>',1);"><div id="elh_t103_trucking_ETA_ETD" class="t103_trucking_ETA_ETD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_trucking->ETA_ETD->caption() ?></span><span class="ew-table-header-sort"><?php if ($t103_trucking->ETA_ETD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t103_trucking->ETA_ETD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_trucking->Liner_id->Visible) { // Liner_id ?>
	<?php if ($t103_trucking->sortUrl($t103_trucking->Liner_id) == "") { ?>
		<th data-name="Liner_id" class="<?php echo $t103_trucking->Liner_id->headerCellClass() ?>"><div id="elh_t103_trucking_Liner_id" class="t103_trucking_Liner_id"><div class="ew-table-header-caption"><?php echo $t103_trucking->Liner_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Liner_id" class="<?php echo $t103_trucking->Liner_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t103_trucking->SortUrl($t103_trucking->Liner_id) ?>',1);"><div id="elh_t103_trucking_Liner_id" class="t103_trucking_Liner_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_trucking->Liner_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t103_trucking->Liner_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t103_trucking->Liner_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_trucking->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
	<?php if ($t103_trucking->sortUrl($t103_trucking->TruckingVendor_id) == "") { ?>
		<th data-name="TruckingVendor_id" class="<?php echo $t103_trucking->TruckingVendor_id->headerCellClass() ?>"><div id="elh_t103_trucking_TruckingVendor_id" class="t103_trucking_TruckingVendor_id"><div class="ew-table-header-caption"><?php echo $t103_trucking->TruckingVendor_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TruckingVendor_id" class="<?php echo $t103_trucking->TruckingVendor_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t103_trucking->SortUrl($t103_trucking->TruckingVendor_id) ?>',1);"><div id="elh_t103_trucking_TruckingVendor_id" class="t103_trucking_TruckingVendor_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_trucking->TruckingVendor_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t103_trucking->TruckingVendor_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t103_trucking->TruckingVendor_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_trucking->Driver_id->Visible) { // Driver_id ?>
	<?php if ($t103_trucking->sortUrl($t103_trucking->Driver_id) == "") { ?>
		<th data-name="Driver_id" class="<?php echo $t103_trucking->Driver_id->headerCellClass() ?>"><div id="elh_t103_trucking_Driver_id" class="t103_trucking_Driver_id"><div class="ew-table-header-caption"><?php echo $t103_trucking->Driver_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Driver_id" class="<?php echo $t103_trucking->Driver_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t103_trucking->SortUrl($t103_trucking->Driver_id) ?>',1);"><div id="elh_t103_trucking_Driver_id" class="t103_trucking_Driver_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_trucking->Driver_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t103_trucking->Driver_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t103_trucking->Driver_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_trucking->No_Pol_1->Visible) { // No_Pol_1 ?>
	<?php if ($t103_trucking->sortUrl($t103_trucking->No_Pol_1) == "") { ?>
		<th data-name="No_Pol_1" class="<?php echo $t103_trucking->No_Pol_1->headerCellClass() ?>"><div id="elh_t103_trucking_No_Pol_1" class="t103_trucking_No_Pol_1"><div class="ew-table-header-caption"><?php echo $t103_trucking->No_Pol_1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="No_Pol_1" class="<?php echo $t103_trucking->No_Pol_1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t103_trucking->SortUrl($t103_trucking->No_Pol_1) ?>',1);"><div id="elh_t103_trucking_No_Pol_1" class="t103_trucking_No_Pol_1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_trucking->No_Pol_1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t103_trucking->No_Pol_1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t103_trucking->No_Pol_1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_trucking->No_Pol_2->Visible) { // No_Pol_2 ?>
	<?php if ($t103_trucking->sortUrl($t103_trucking->No_Pol_2) == "") { ?>
		<th data-name="No_Pol_2" class="<?php echo $t103_trucking->No_Pol_2->headerCellClass() ?>"><div id="elh_t103_trucking_No_Pol_2" class="t103_trucking_No_Pol_2"><div class="ew-table-header-caption"><?php echo $t103_trucking->No_Pol_2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="No_Pol_2" class="<?php echo $t103_trucking->No_Pol_2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t103_trucking->SortUrl($t103_trucking->No_Pol_2) ?>',1);"><div id="elh_t103_trucking_No_Pol_2" class="t103_trucking_No_Pol_2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_trucking->No_Pol_2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t103_trucking->No_Pol_2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t103_trucking->No_Pol_2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_trucking->No_Pol_3->Visible) { // No_Pol_3 ?>
	<?php if ($t103_trucking->sortUrl($t103_trucking->No_Pol_3) == "") { ?>
		<th data-name="No_Pol_3" class="<?php echo $t103_trucking->No_Pol_3->headerCellClass() ?>"><div id="elh_t103_trucking_No_Pol_3" class="t103_trucking_No_Pol_3"><div class="ew-table-header-caption"><?php echo $t103_trucking->No_Pol_3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="No_Pol_3" class="<?php echo $t103_trucking->No_Pol_3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t103_trucking->SortUrl($t103_trucking->No_Pol_3) ?>',1);"><div id="elh_t103_trucking_No_Pol_3" class="t103_trucking_No_Pol_3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_trucking->No_Pol_3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t103_trucking->No_Pol_3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t103_trucking->No_Pol_3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_trucking->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
	<?php if ($t103_trucking->sortUrl($t103_trucking->Nomor_Container_1) == "") { ?>
		<th data-name="Nomor_Container_1" class="<?php echo $t103_trucking->Nomor_Container_1->headerCellClass() ?>"><div id="elh_t103_trucking_Nomor_Container_1" class="t103_trucking_Nomor_Container_1"><div class="ew-table-header-caption"><?php echo $t103_trucking->Nomor_Container_1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nomor_Container_1" class="<?php echo $t103_trucking->Nomor_Container_1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t103_trucking->SortUrl($t103_trucking->Nomor_Container_1) ?>',1);"><div id="elh_t103_trucking_Nomor_Container_1" class="t103_trucking_Nomor_Container_1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_trucking->Nomor_Container_1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t103_trucking->Nomor_Container_1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t103_trucking->Nomor_Container_1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_trucking->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
	<?php if ($t103_trucking->sortUrl($t103_trucking->Nomor_Container_2) == "") { ?>
		<th data-name="Nomor_Container_2" class="<?php echo $t103_trucking->Nomor_Container_2->headerCellClass() ?>"><div id="elh_t103_trucking_Nomor_Container_2" class="t103_trucking_Nomor_Container_2"><div class="ew-table-header-caption"><?php echo $t103_trucking->Nomor_Container_2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nomor_Container_2" class="<?php echo $t103_trucking->Nomor_Container_2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t103_trucking->SortUrl($t103_trucking->Nomor_Container_2) ?>',1);"><div id="elh_t103_trucking_Nomor_Container_2" class="t103_trucking_Nomor_Container_2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_trucking->Nomor_Container_2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t103_trucking->Nomor_Container_2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t103_trucking->Nomor_Container_2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t103_trucking_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t103_trucking->ExportAll && $t103_trucking->isExport()) {
	$t103_trucking_list->StopRec = $t103_trucking_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t103_trucking_list->TotalRecs > $t103_trucking_list->StartRec + $t103_trucking_list->DisplayRecs - 1)
		$t103_trucking_list->StopRec = $t103_trucking_list->StartRec + $t103_trucking_list->DisplayRecs - 1;
	else
		$t103_trucking_list->StopRec = $t103_trucking_list->TotalRecs;
}
$t103_trucking_list->RecCnt = $t103_trucking_list->StartRec - 1;
if ($t103_trucking_list->Recordset && !$t103_trucking_list->Recordset->EOF) {
	$t103_trucking_list->Recordset->moveFirst();
	$selectLimit = $t103_trucking_list->UseSelectLimit;
	if (!$selectLimit && $t103_trucking_list->StartRec > 1)
		$t103_trucking_list->Recordset->move($t103_trucking_list->StartRec - 1);
} elseif (!$t103_trucking->AllowAddDeleteRow && $t103_trucking_list->StopRec == 0) {
	$t103_trucking_list->StopRec = $t103_trucking->GridAddRowCount;
}

// Initialize aggregate
$t103_trucking->RowType = ROWTYPE_AGGREGATEINIT;
$t103_trucking->resetAttributes();
$t103_trucking_list->renderRow();
while ($t103_trucking_list->RecCnt < $t103_trucking_list->StopRec) {
	$t103_trucking_list->RecCnt++;
	if ($t103_trucking_list->RecCnt >= $t103_trucking_list->StartRec) {
		$t103_trucking_list->RowCnt++;

		// Set up key count
		$t103_trucking_list->KeyCount = $t103_trucking_list->RowIndex;

		// Init row class and style
		$t103_trucking->resetAttributes();
		$t103_trucking->CssClass = "";
		if ($t103_trucking->isGridAdd()) {
		} else {
			$t103_trucking_list->loadRowValues($t103_trucking_list->Recordset); // Load row values
		}
		$t103_trucking->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t103_trucking->RowAttrs = array_merge($t103_trucking->RowAttrs, array('data-rowindex'=>$t103_trucking_list->RowCnt, 'id'=>'r' . $t103_trucking_list->RowCnt . '_t103_trucking', 'data-rowtype'=>$t103_trucking->RowType));

		// Render row
		$t103_trucking_list->renderRow();

		// Render list options
		$t103_trucking_list->renderListOptions();
?>
	<tr<?php echo $t103_trucking->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t103_trucking_list->ListOptions->render("body", "left", $t103_trucking_list->RowCnt);
?>
	<?php if ($t103_trucking->id->Visible) { // id ?>
		<td data-name="id"<?php echo $t103_trucking->id->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_list->RowCnt ?>_t103_trucking_id" class="t103_trucking_id">
<span<?php echo $t103_trucking->id->viewAttributes() ?>>
<?php echo $t103_trucking->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_trucking->EI->Visible) { // EI ?>
		<td data-name="EI"<?php echo $t103_trucking->EI->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_list->RowCnt ?>_t103_trucking_EI" class="t103_trucking_EI">
<span<?php echo $t103_trucking->EI->viewAttributes() ?>>
<?php echo $t103_trucking->EI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_trucking->Shipper_id->Visible) { // Shipper_id ?>
		<td data-name="Shipper_id"<?php echo $t103_trucking->Shipper_id->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_list->RowCnt ?>_t103_trucking_Shipper_id" class="t103_trucking_Shipper_id">
<span<?php echo $t103_trucking->Shipper_id->viewAttributes() ?>>
<?php echo $t103_trucking->Shipper_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_trucking->Party->Visible) { // Party ?>
		<td data-name="Party"<?php echo $t103_trucking->Party->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_list->RowCnt ?>_t103_trucking_Party" class="t103_trucking_Party">
<span<?php echo $t103_trucking->Party->viewAttributes() ?>>
<?php echo $t103_trucking->Party->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_trucking->Jenis_Container->Visible) { // Jenis_Container ?>
		<td data-name="Jenis_Container"<?php echo $t103_trucking->Jenis_Container->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_list->RowCnt ?>_t103_trucking_Jenis_Container" class="t103_trucking_Jenis_Container">
<span<?php echo $t103_trucking->Jenis_Container->viewAttributes() ?>>
<?php echo $t103_trucking->Jenis_Container->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_trucking->Tgl_Stuffing->Visible) { // Tgl_Stuffing ?>
		<td data-name="Tgl_Stuffing"<?php echo $t103_trucking->Tgl_Stuffing->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_list->RowCnt ?>_t103_trucking_Tgl_Stuffing" class="t103_trucking_Tgl_Stuffing">
<span<?php echo $t103_trucking->Tgl_Stuffing->viewAttributes() ?>>
<?php echo $t103_trucking->Tgl_Stuffing->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_trucking->Destination_id->Visible) { // Destination_id ?>
		<td data-name="Destination_id"<?php echo $t103_trucking->Destination_id->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_list->RowCnt ?>_t103_trucking_Destination_id" class="t103_trucking_Destination_id">
<span<?php echo $t103_trucking->Destination_id->viewAttributes() ?>>
<?php echo $t103_trucking->Destination_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_trucking->Feeder_id->Visible) { // Feeder_id ?>
		<td data-name="Feeder_id"<?php echo $t103_trucking->Feeder_id->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_list->RowCnt ?>_t103_trucking_Feeder_id" class="t103_trucking_Feeder_id">
<span<?php echo $t103_trucking->Feeder_id->viewAttributes() ?>>
<?php echo $t103_trucking->Feeder_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_trucking->ETA_ETD->Visible) { // ETA_ETD ?>
		<td data-name="ETA_ETD"<?php echo $t103_trucking->ETA_ETD->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_list->RowCnt ?>_t103_trucking_ETA_ETD" class="t103_trucking_ETA_ETD">
<span<?php echo $t103_trucking->ETA_ETD->viewAttributes() ?>>
<?php echo $t103_trucking->ETA_ETD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_trucking->Liner_id->Visible) { // Liner_id ?>
		<td data-name="Liner_id"<?php echo $t103_trucking->Liner_id->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_list->RowCnt ?>_t103_trucking_Liner_id" class="t103_trucking_Liner_id">
<span<?php echo $t103_trucking->Liner_id->viewAttributes() ?>>
<?php echo $t103_trucking->Liner_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_trucking->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
		<td data-name="TruckingVendor_id"<?php echo $t103_trucking->TruckingVendor_id->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_list->RowCnt ?>_t103_trucking_TruckingVendor_id" class="t103_trucking_TruckingVendor_id">
<span<?php echo $t103_trucking->TruckingVendor_id->viewAttributes() ?>>
<?php echo $t103_trucking->TruckingVendor_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_trucking->Driver_id->Visible) { // Driver_id ?>
		<td data-name="Driver_id"<?php echo $t103_trucking->Driver_id->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_list->RowCnt ?>_t103_trucking_Driver_id" class="t103_trucking_Driver_id">
<span<?php echo $t103_trucking->Driver_id->viewAttributes() ?>>
<?php echo $t103_trucking->Driver_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_trucking->No_Pol_1->Visible) { // No_Pol_1 ?>
		<td data-name="No_Pol_1"<?php echo $t103_trucking->No_Pol_1->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_list->RowCnt ?>_t103_trucking_No_Pol_1" class="t103_trucking_No_Pol_1">
<span<?php echo $t103_trucking->No_Pol_1->viewAttributes() ?>>
<?php echo $t103_trucking->No_Pol_1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_trucking->No_Pol_2->Visible) { // No_Pol_2 ?>
		<td data-name="No_Pol_2"<?php echo $t103_trucking->No_Pol_2->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_list->RowCnt ?>_t103_trucking_No_Pol_2" class="t103_trucking_No_Pol_2">
<span<?php echo $t103_trucking->No_Pol_2->viewAttributes() ?>>
<?php echo $t103_trucking->No_Pol_2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_trucking->No_Pol_3->Visible) { // No_Pol_3 ?>
		<td data-name="No_Pol_3"<?php echo $t103_trucking->No_Pol_3->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_list->RowCnt ?>_t103_trucking_No_Pol_3" class="t103_trucking_No_Pol_3">
<span<?php echo $t103_trucking->No_Pol_3->viewAttributes() ?>>
<?php echo $t103_trucking->No_Pol_3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_trucking->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
		<td data-name="Nomor_Container_1"<?php echo $t103_trucking->Nomor_Container_1->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_list->RowCnt ?>_t103_trucking_Nomor_Container_1" class="t103_trucking_Nomor_Container_1">
<span<?php echo $t103_trucking->Nomor_Container_1->viewAttributes() ?>>
<?php echo $t103_trucking->Nomor_Container_1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_trucking->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
		<td data-name="Nomor_Container_2"<?php echo $t103_trucking->Nomor_Container_2->cellAttributes() ?>>
<span id="el<?php echo $t103_trucking_list->RowCnt ?>_t103_trucking_Nomor_Container_2" class="t103_trucking_Nomor_Container_2">
<span<?php echo $t103_trucking->Nomor_Container_2->viewAttributes() ?>>
<?php echo $t103_trucking->Nomor_Container_2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t103_trucking_list->ListOptions->render("body", "right", $t103_trucking_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t103_trucking->isGridAdd())
		$t103_trucking_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t103_trucking->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t103_trucking_list->Recordset)
	$t103_trucking_list->Recordset->Close();
?>
<?php if (!$t103_trucking->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t103_trucking->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t103_trucking_list->Pager)) $t103_trucking_list->Pager = new PrevNextPager($t103_trucking_list->StartRec, $t103_trucking_list->DisplayRecs, $t103_trucking_list->TotalRecs, $t103_trucking_list->AutoHidePager) ?>
<?php if ($t103_trucking_list->Pager->RecordCount > 0 && $t103_trucking_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t103_trucking_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t103_trucking_list->pageUrl() ?>start=<?php echo $t103_trucking_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t103_trucking_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t103_trucking_list->pageUrl() ?>start=<?php echo $t103_trucking_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t103_trucking_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t103_trucking_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t103_trucking_list->pageUrl() ?>start=<?php echo $t103_trucking_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t103_trucking_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t103_trucking_list->pageUrl() ?>start=<?php echo $t103_trucking_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t103_trucking_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t103_trucking_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t103_trucking_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t103_trucking_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t103_trucking_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t103_trucking_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t103_trucking_list->TotalRecs == 0 && !$t103_trucking->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t103_trucking_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t103_trucking_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t103_trucking->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t103_trucking_list->terminate();
?>