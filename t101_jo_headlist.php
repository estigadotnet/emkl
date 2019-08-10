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

// Validate form
ft101_jo_headlist.validate = function() {
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
		<?php if ($t101_jo_head_list->Export_Import->Required) { ?>
			elm = this.getElements("x" + infix + "_Export_Import");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_head->Export_Import->caption(), $t101_jo_head->Export_Import->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_head_list->No_BL->Required) { ?>
			elm = this.getElements("x" + infix + "_No_BL");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_head->No_BL->caption(), $t101_jo_head->No_BL->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_head_list->Nomor_JO->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_JO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_head->Nomor_JO->caption(), $t101_jo_head->Nomor_JO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_head_list->Shipper_id->Required) { ?>
			elm = this.getElements("x" + infix + "_Shipper_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_head->Shipper_id->caption(), $t101_jo_head->Shipper_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_head_list->Party->Required) { ?>
			elm = this.getElements("x" + infix + "_Party");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_head->Party->caption(), $t101_jo_head->Party->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Party");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t101_jo_head->Party->errorMessage()) ?>");
		<?php if ($t101_jo_head_list->Container->Required) { ?>
			elm = this.getElements("x" + infix + "_Container");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_head->Container->caption(), $t101_jo_head->Container->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_head_list->Destination_id->Required) { ?>
			elm = this.getElements("x" + infix + "_Destination_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_head->Destination_id->caption(), $t101_jo_head->Destination_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t101_jo_head_list->Feeder_id->Required) { ?>
			elm = this.getElements("x" + infix + "_Feeder_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jo_head->Feeder_id->caption(), $t101_jo_head->Feeder_id->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
ft101_jo_headlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft101_jo_headlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft101_jo_headlist.lists["x_Export_Import"] = <?php echo $t101_jo_head_list->Export_Import->Lookup->toClientList() ?>;
ft101_jo_headlist.lists["x_Export_Import"].options = <?php echo JsonEncode($t101_jo_head_list->Export_Import->options(FALSE, TRUE)) ?>;
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

// Validate function for search
ft101_jo_headlistsrch.validate = function(fobj) {
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
ft101_jo_headlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft101_jo_headlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft101_jo_headlistsrch.lists["x_Export_Import"] = <?php echo $t101_jo_head_list->Export_Import->Lookup->toClientList() ?>;
ft101_jo_headlistsrch.lists["x_Export_Import"].options = <?php echo JsonEncode($t101_jo_head_list->Export_Import->options(FALSE, TRUE)) ?>;
ft101_jo_headlistsrch.lists["x_Shipper_id"] = <?php echo $t101_jo_head_list->Shipper_id->Lookup->toClientList() ?>;
ft101_jo_headlistsrch.lists["x_Shipper_id"].options = <?php echo JsonEncode($t101_jo_head_list->Shipper_id->lookupOptions()) ?>;
ft101_jo_headlistsrch.lists["x_Feeder_id"] = <?php echo $t101_jo_head_list->Feeder_id->Lookup->toClientList() ?>;
ft101_jo_headlistsrch.lists["x_Feeder_id"].options = <?php echo JsonEncode($t101_jo_head_list->Feeder_id->lookupOptions()) ?>;

// Filters
ft101_jo_headlistsrch.filterList = <?php echo $t101_jo_head_list->getFilterList() ?>;
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
<?php
if ($SearchError == "")
	$t101_jo_head_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$t101_jo_head->RowType = ROWTYPE_SEARCH;

// Render row
$t101_jo_head->resetAttributes();
$t101_jo_head_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($t101_jo_head->Export_Import->Visible) { // Export_Import ?>
	<div id="xsc_Export_Import" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $t101_jo_head->Export_Import->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Export_Import" id="z_Export_Import" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_Export_Import" class="ew-template"><input type="radio" class="form-check-input" data-table="t101_jo_head" data-field="x_Export_Import" data-value-separator="<?php echo $t101_jo_head->Export_Import->displayValueSeparatorAttribute() ?>" name="x_Export_Import" id="x_Export_Import" value="{value}"<?php echo $t101_jo_head->Export_Import->editAttributes() ?>></div>
<div id="dsl_x_Export_Import" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t101_jo_head->Export_Import->radioButtonListHtml(FALSE, "x_Export_Import") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($t101_jo_head->No_BL->Visible) { // No_BL ?>
	<div id="xsc_No_BL" class="ew-cell form-group">
		<label for="x_No_BL" class="ew-search-caption ew-label"><?php echo $t101_jo_head->No_BL->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_No_BL" id="z_No_BL" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="t101_jo_head" data-field="x_No_BL" name="x_No_BL" id="x_No_BL" size="20" maxlength="50" placeholder="<?php echo HtmlEncode($t101_jo_head->No_BL->getPlaceHolder()) ?>" value="<?php echo $t101_jo_head->No_BL->EditValue ?>"<?php echo $t101_jo_head->No_BL->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($t101_jo_head->Nomor_JO->Visible) { // Nomor_JO ?>
	<div id="xsc_Nomor_JO" class="ew-cell form-group">
		<label for="x_Nomor_JO" class="ew-search-caption ew-label"><?php echo $t101_jo_head->Nomor_JO->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Nomor_JO" id="z_Nomor_JO" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="t101_jo_head" data-field="x_Nomor_JO" name="x_Nomor_JO" id="x_Nomor_JO" size="20" maxlength="50" placeholder="<?php echo HtmlEncode($t101_jo_head->Nomor_JO->getPlaceHolder()) ?>" value="<?php echo $t101_jo_head->Nomor_JO->EditValue ?>"<?php echo $t101_jo_head->Nomor_JO->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
<?php if ($t101_jo_head->Shipper_id->Visible) { // Shipper_id ?>
	<div id="xsc_Shipper_id" class="ew-cell form-group">
		<label for="x_Shipper_id" class="ew-search-caption ew-label"><?php echo $t101_jo_head->Shipper_id->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Shipper_id" id="z_Shipper_id" value="="></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_head" data-field="x_Shipper_id" data-value-separator="<?php echo $t101_jo_head->Shipper_id->displayValueSeparatorAttribute() ?>" id="x_Shipper_id" name="x_Shipper_id"<?php echo $t101_jo_head->Shipper_id->editAttributes() ?>>
		<?php echo $t101_jo_head->Shipper_id->selectOptionListHtml("x_Shipper_id") ?>
	</select>
</div>
<?php echo $t101_jo_head->Shipper_id->Lookup->getParamTag("p_x_Shipper_id") ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_5" class="ew-row d-sm-flex">
<?php if ($t101_jo_head->Feeder_id->Visible) { // Feeder_id ?>
	<div id="xsc_Feeder_id" class="ew-cell form-group">
		<label for="x_Feeder_id" class="ew-search-caption ew-label"><?php echo $t101_jo_head->Feeder_id->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Feeder_id" id="z_Feeder_id" value="="></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_head" data-field="x_Feeder_id" data-value-separator="<?php echo $t101_jo_head->Feeder_id->displayValueSeparatorAttribute() ?>" id="x_Feeder_id" name="x_Feeder_id"<?php echo $t101_jo_head->Feeder_id->editAttributes() ?>>
		<?php echo $t101_jo_head->Feeder_id->selectOptionListHtml("x_Feeder_id") ?>
	</select>
</div>
<?php echo $t101_jo_head->Feeder_id->Lookup->getParamTag("p_x_Feeder_id") ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_6" class="ew-row d-sm-flex">
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
<?php if ($t101_jo_head->Export_Import->Visible) { // Export_Import ?>
	<?php if ($t101_jo_head->sortUrl($t101_jo_head->Export_Import) == "") { ?>
		<th data-name="Export_Import" class="<?php echo $t101_jo_head->Export_Import->headerCellClass() ?>"><div id="elh_t101_jo_head_Export_Import" class="t101_jo_head_Export_Import"><div class="ew-table-header-caption"><?php echo $t101_jo_head->Export_Import->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Export_Import" class="<?php echo $t101_jo_head->Export_Import->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_jo_head->SortUrl($t101_jo_head->Export_Import) ?>',2);"><div id="elh_t101_jo_head_Export_Import" class="t101_jo_head_Export_Import">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_head->Export_Import->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_head->Export_Import->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_head->Export_Import->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_head->No_BL->Visible) { // No_BL ?>
	<?php if ($t101_jo_head->sortUrl($t101_jo_head->No_BL) == "") { ?>
		<th data-name="No_BL" class="<?php echo $t101_jo_head->No_BL->headerCellClass() ?>"><div id="elh_t101_jo_head_No_BL" class="t101_jo_head_No_BL"><div class="ew-table-header-caption"><?php echo $t101_jo_head->No_BL->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="No_BL" class="<?php echo $t101_jo_head->No_BL->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t101_jo_head->SortUrl($t101_jo_head->No_BL) ?>',2);"><div id="elh_t101_jo_head_No_BL" class="t101_jo_head_No_BL">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jo_head->No_BL->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t101_jo_head->No_BL->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t101_jo_head->No_BL->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
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

// Restore number of post back records
if ($CurrentForm && $t101_jo_head_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t101_jo_head_list->FormKeyCountName) && ($t101_jo_head->isGridAdd() || $t101_jo_head->isGridEdit() || $t101_jo_head->isConfirm())) {
		$t101_jo_head_list->KeyCount = $CurrentForm->getValue($t101_jo_head_list->FormKeyCountName);
		$t101_jo_head_list->StopRec = $t101_jo_head_list->StartRec + $t101_jo_head_list->KeyCount - 1;
	}
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
$t101_jo_head_list->EditRowCnt = 0;
if ($t101_jo_head->isEdit())
	$t101_jo_head_list->RowIndex = 1;
if ($t101_jo_head->isGridEdit())
	$t101_jo_head_list->RowIndex = 0;
while ($t101_jo_head_list->RecCnt < $t101_jo_head_list->StopRec) {
	$t101_jo_head_list->RecCnt++;
	if ($t101_jo_head_list->RecCnt >= $t101_jo_head_list->StartRec) {
		$t101_jo_head_list->RowCnt++;
		if ($t101_jo_head->isGridAdd() || $t101_jo_head->isGridEdit() || $t101_jo_head->isConfirm()) {
			$t101_jo_head_list->RowIndex++;
			$CurrentForm->Index = $t101_jo_head_list->RowIndex;
			if ($CurrentForm->hasValue($t101_jo_head_list->FormActionName) && $t101_jo_head_list->EventCancelled)
				$t101_jo_head_list->RowAction = strval($CurrentForm->getValue($t101_jo_head_list->FormActionName));
			elseif ($t101_jo_head->isGridAdd())
				$t101_jo_head_list->RowAction = "insert";
			else
				$t101_jo_head_list->RowAction = "";
		}

		// Set up key count
		$t101_jo_head_list->KeyCount = $t101_jo_head_list->RowIndex;

		// Init row class and style
		$t101_jo_head->resetAttributes();
		$t101_jo_head->CssClass = "";
		if ($t101_jo_head->isGridAdd()) {
			$t101_jo_head_list->loadRowValues(); // Load default values
		} else {
			$t101_jo_head_list->loadRowValues($t101_jo_head_list->Recordset); // Load row values
		}
		$t101_jo_head->RowType = ROWTYPE_VIEW; // Render view
		if ($t101_jo_head->isEdit()) {
			if ($t101_jo_head_list->checkInlineEditKey() && $t101_jo_head_list->EditRowCnt == 0) { // Inline edit
				$t101_jo_head->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($t101_jo_head->isGridEdit()) { // Grid edit
			if ($t101_jo_head->EventCancelled)
				$t101_jo_head_list->restoreCurrentRowFormValues($t101_jo_head_list->RowIndex); // Restore form values
			if ($t101_jo_head_list->RowAction == "insert")
				$t101_jo_head->RowType = ROWTYPE_ADD; // Render add
			else
				$t101_jo_head->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t101_jo_head->isEdit() && $t101_jo_head->RowType == ROWTYPE_EDIT && $t101_jo_head->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$t101_jo_head_list->restoreFormValues(); // Restore form values
		}
		if ($t101_jo_head->isGridEdit() && ($t101_jo_head->RowType == ROWTYPE_EDIT || $t101_jo_head->RowType == ROWTYPE_ADD) && $t101_jo_head->EventCancelled) // Update failed
			$t101_jo_head_list->restoreCurrentRowFormValues($t101_jo_head_list->RowIndex); // Restore form values
		if ($t101_jo_head->RowType == ROWTYPE_EDIT) // Edit row
			$t101_jo_head_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$t101_jo_head->RowAttrs = array_merge($t101_jo_head->RowAttrs, array('data-rowindex'=>$t101_jo_head_list->RowCnt, 'id'=>'r' . $t101_jo_head_list->RowCnt . '_t101_jo_head', 'data-rowtype'=>$t101_jo_head->RowType));

		// Render row
		$t101_jo_head_list->renderRow();

		// Render list options
		$t101_jo_head_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t101_jo_head_list->RowAction <> "delete" && $t101_jo_head_list->RowAction <> "insertdelete" && !($t101_jo_head_list->RowAction == "insert" && $t101_jo_head->isConfirm() && $t101_jo_head_list->emptyRow())) {
?>
	<tr<?php echo $t101_jo_head->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t101_jo_head_list->ListOptions->render("body", "left", $t101_jo_head_list->RowCnt);
?>
	<?php if ($t101_jo_head->Export_Import->Visible) { // Export_Import ?>
		<td data-name="Export_Import"<?php echo $t101_jo_head->Export_Import->cellAttributes() ?>>
<?php if ($t101_jo_head->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Export_Import" class="form-group t101_jo_head_Export_Import">
<div id="tp_x<?php echo $t101_jo_head_list->RowIndex ?>_Export_Import" class="ew-template"><input type="radio" class="form-check-input" data-table="t101_jo_head" data-field="x_Export_Import" data-value-separator="<?php echo $t101_jo_head->Export_Import->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_jo_head_list->RowIndex ?>_Export_Import" id="x<?php echo $t101_jo_head_list->RowIndex ?>_Export_Import" value="{value}"<?php echo $t101_jo_head->Export_Import->editAttributes() ?>></div>
<div id="dsl_x<?php echo $t101_jo_head_list->RowIndex ?>_Export_Import" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t101_jo_head->Export_Import->radioButtonListHtml(FALSE, "x{$t101_jo_head_list->RowIndex}_Export_Import") ?>
</div></div>
</span>
<input type="hidden" data-table="t101_jo_head" data-field="x_Export_Import" name="o<?php echo $t101_jo_head_list->RowIndex ?>_Export_Import" id="o<?php echo $t101_jo_head_list->RowIndex ?>_Export_Import" value="<?php echo HtmlEncode($t101_jo_head->Export_Import->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_head->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Export_Import" class="form-group t101_jo_head_Export_Import">
<div id="tp_x<?php echo $t101_jo_head_list->RowIndex ?>_Export_Import" class="ew-template"><input type="radio" class="form-check-input" data-table="t101_jo_head" data-field="x_Export_Import" data-value-separator="<?php echo $t101_jo_head->Export_Import->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_jo_head_list->RowIndex ?>_Export_Import" id="x<?php echo $t101_jo_head_list->RowIndex ?>_Export_Import" value="{value}"<?php echo $t101_jo_head->Export_Import->editAttributes() ?>></div>
<div id="dsl_x<?php echo $t101_jo_head_list->RowIndex ?>_Export_Import" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t101_jo_head->Export_Import->radioButtonListHtml(FALSE, "x{$t101_jo_head_list->RowIndex}_Export_Import") ?>
</div></div>
</span>
<?php } ?>
<?php if ($t101_jo_head->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Export_Import" class="t101_jo_head_Export_Import">
<span<?php echo $t101_jo_head->Export_Import->viewAttributes() ?>>
<?php echo $t101_jo_head->Export_Import->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t101_jo_head->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t101_jo_head" data-field="x_id" name="x<?php echo $t101_jo_head_list->RowIndex ?>_id" id="x<?php echo $t101_jo_head_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t101_jo_head->id->CurrentValue) ?>">
<input type="hidden" data-table="t101_jo_head" data-field="x_id" name="o<?php echo $t101_jo_head_list->RowIndex ?>_id" id="o<?php echo $t101_jo_head_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t101_jo_head->id->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_head->RowType == ROWTYPE_EDIT || $t101_jo_head->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t101_jo_head" data-field="x_id" name="x<?php echo $t101_jo_head_list->RowIndex ?>_id" id="x<?php echo $t101_jo_head_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t101_jo_head->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t101_jo_head->No_BL->Visible) { // No_BL ?>
		<td data-name="No_BL"<?php echo $t101_jo_head->No_BL->cellAttributes() ?>>
<?php if ($t101_jo_head->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_No_BL" class="form-group t101_jo_head_No_BL">
<input type="text" data-table="t101_jo_head" data-field="x_No_BL" name="x<?php echo $t101_jo_head_list->RowIndex ?>_No_BL" id="x<?php echo $t101_jo_head_list->RowIndex ?>_No_BL" size="20" maxlength="50" placeholder="<?php echo HtmlEncode($t101_jo_head->No_BL->getPlaceHolder()) ?>" value="<?php echo $t101_jo_head->No_BL->EditValue ?>"<?php echo $t101_jo_head->No_BL->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_head" data-field="x_No_BL" name="o<?php echo $t101_jo_head_list->RowIndex ?>_No_BL" id="o<?php echo $t101_jo_head_list->RowIndex ?>_No_BL" value="<?php echo HtmlEncode($t101_jo_head->No_BL->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_head->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_No_BL" class="form-group t101_jo_head_No_BL">
<input type="text" data-table="t101_jo_head" data-field="x_No_BL" name="x<?php echo $t101_jo_head_list->RowIndex ?>_No_BL" id="x<?php echo $t101_jo_head_list->RowIndex ?>_No_BL" size="20" maxlength="50" placeholder="<?php echo HtmlEncode($t101_jo_head->No_BL->getPlaceHolder()) ?>" value="<?php echo $t101_jo_head->No_BL->EditValue ?>"<?php echo $t101_jo_head->No_BL->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_jo_head->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_No_BL" class="t101_jo_head_No_BL">
<span<?php echo $t101_jo_head->No_BL->viewAttributes() ?>>
<?php echo $t101_jo_head->No_BL->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_head->Nomor_JO->Visible) { // Nomor_JO ?>
		<td data-name="Nomor_JO"<?php echo $t101_jo_head->Nomor_JO->cellAttributes() ?>>
<?php if ($t101_jo_head->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Nomor_JO" class="form-group t101_jo_head_Nomor_JO">
<input type="text" data-table="t101_jo_head" data-field="x_Nomor_JO" name="x<?php echo $t101_jo_head_list->RowIndex ?>_Nomor_JO" id="x<?php echo $t101_jo_head_list->RowIndex ?>_Nomor_JO" size="20" maxlength="50" placeholder="<?php echo HtmlEncode($t101_jo_head->Nomor_JO->getPlaceHolder()) ?>" value="<?php echo $t101_jo_head->Nomor_JO->EditValue ?>"<?php echo $t101_jo_head->Nomor_JO->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_head" data-field="x_Nomor_JO" name="o<?php echo $t101_jo_head_list->RowIndex ?>_Nomor_JO" id="o<?php echo $t101_jo_head_list->RowIndex ?>_Nomor_JO" value="<?php echo HtmlEncode($t101_jo_head->Nomor_JO->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_head->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Nomor_JO" class="form-group t101_jo_head_Nomor_JO">
<input type="text" data-table="t101_jo_head" data-field="x_Nomor_JO" name="x<?php echo $t101_jo_head_list->RowIndex ?>_Nomor_JO" id="x<?php echo $t101_jo_head_list->RowIndex ?>_Nomor_JO" size="20" maxlength="50" placeholder="<?php echo HtmlEncode($t101_jo_head->Nomor_JO->getPlaceHolder()) ?>" value="<?php echo $t101_jo_head->Nomor_JO->EditValue ?>"<?php echo $t101_jo_head->Nomor_JO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_jo_head->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Nomor_JO" class="t101_jo_head_Nomor_JO">
<span<?php echo $t101_jo_head->Nomor_JO->viewAttributes() ?>>
<?php echo $t101_jo_head->Nomor_JO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_head->Shipper_id->Visible) { // Shipper_id ?>
		<td data-name="Shipper_id"<?php echo $t101_jo_head->Shipper_id->cellAttributes() ?>>
<?php if ($t101_jo_head->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Shipper_id" class="form-group t101_jo_head_Shipper_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_head" data-field="x_Shipper_id" data-value-separator="<?php echo $t101_jo_head->Shipper_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_head_list->RowIndex ?>_Shipper_id" name="x<?php echo $t101_jo_head_list->RowIndex ?>_Shipper_id"<?php echo $t101_jo_head->Shipper_id->editAttributes() ?>>
		<?php echo $t101_jo_head->Shipper_id->selectOptionListHtml("x<?php echo $t101_jo_head_list->RowIndex ?>_Shipper_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t101_jo_head_list->RowIndex ?>_Shipper_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_jo_head->Shipper_id->caption() ?>" data-title="<?php echo $t101_jo_head->Shipper_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t101_jo_head_list->RowIndex ?>_Shipper_id',url:'t001_shipperaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_jo_head->Shipper_id->Lookup->getParamTag("p_x" . $t101_jo_head_list->RowIndex . "_Shipper_id") ?>
</span>
<input type="hidden" data-table="t101_jo_head" data-field="x_Shipper_id" name="o<?php echo $t101_jo_head_list->RowIndex ?>_Shipper_id" id="o<?php echo $t101_jo_head_list->RowIndex ?>_Shipper_id" value="<?php echo HtmlEncode($t101_jo_head->Shipper_id->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_head->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Shipper_id" class="form-group t101_jo_head_Shipper_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_head" data-field="x_Shipper_id" data-value-separator="<?php echo $t101_jo_head->Shipper_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_head_list->RowIndex ?>_Shipper_id" name="x<?php echo $t101_jo_head_list->RowIndex ?>_Shipper_id"<?php echo $t101_jo_head->Shipper_id->editAttributes() ?>>
		<?php echo $t101_jo_head->Shipper_id->selectOptionListHtml("x<?php echo $t101_jo_head_list->RowIndex ?>_Shipper_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t101_jo_head_list->RowIndex ?>_Shipper_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_jo_head->Shipper_id->caption() ?>" data-title="<?php echo $t101_jo_head->Shipper_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t101_jo_head_list->RowIndex ?>_Shipper_id',url:'t001_shipperaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_jo_head->Shipper_id->Lookup->getParamTag("p_x" . $t101_jo_head_list->RowIndex . "_Shipper_id") ?>
</span>
<?php } ?>
<?php if ($t101_jo_head->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Shipper_id" class="t101_jo_head_Shipper_id">
<span<?php echo $t101_jo_head->Shipper_id->viewAttributes() ?>>
<?php echo $t101_jo_head->Shipper_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_head->Party->Visible) { // Party ?>
		<td data-name="Party"<?php echo $t101_jo_head->Party->cellAttributes() ?>>
<?php if ($t101_jo_head->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Party" class="form-group t101_jo_head_Party">
<input type="text" data-table="t101_jo_head" data-field="x_Party" name="x<?php echo $t101_jo_head_list->RowIndex ?>_Party" id="x<?php echo $t101_jo_head_list->RowIndex ?>_Party" size="1" placeholder="<?php echo HtmlEncode($t101_jo_head->Party->getPlaceHolder()) ?>" value="<?php echo $t101_jo_head->Party->EditValue ?>"<?php echo $t101_jo_head->Party->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_head" data-field="x_Party" name="o<?php echo $t101_jo_head_list->RowIndex ?>_Party" id="o<?php echo $t101_jo_head_list->RowIndex ?>_Party" value="<?php echo HtmlEncode($t101_jo_head->Party->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_head->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Party" class="form-group t101_jo_head_Party">
<input type="text" data-table="t101_jo_head" data-field="x_Party" name="x<?php echo $t101_jo_head_list->RowIndex ?>_Party" id="x<?php echo $t101_jo_head_list->RowIndex ?>_Party" size="1" placeholder="<?php echo HtmlEncode($t101_jo_head->Party->getPlaceHolder()) ?>" value="<?php echo $t101_jo_head->Party->EditValue ?>"<?php echo $t101_jo_head->Party->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_jo_head->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Party" class="t101_jo_head_Party">
<span<?php echo $t101_jo_head->Party->viewAttributes() ?>>
<?php echo $t101_jo_head->Party->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_head->Container->Visible) { // Container ?>
		<td data-name="Container"<?php echo $t101_jo_head->Container->cellAttributes() ?>>
<?php if ($t101_jo_head->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Container" class="form-group t101_jo_head_Container">
<div id="tp_x<?php echo $t101_jo_head_list->RowIndex ?>_Container" class="ew-template"><input type="radio" class="form-check-input" data-table="t101_jo_head" data-field="x_Container" data-value-separator="<?php echo $t101_jo_head->Container->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_jo_head_list->RowIndex ?>_Container" id="x<?php echo $t101_jo_head_list->RowIndex ?>_Container" value="{value}"<?php echo $t101_jo_head->Container->editAttributes() ?>></div>
<div id="dsl_x<?php echo $t101_jo_head_list->RowIndex ?>_Container" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t101_jo_head->Container->radioButtonListHtml(FALSE, "x{$t101_jo_head_list->RowIndex}_Container") ?>
</div></div>
</span>
<input type="hidden" data-table="t101_jo_head" data-field="x_Container" name="o<?php echo $t101_jo_head_list->RowIndex ?>_Container" id="o<?php echo $t101_jo_head_list->RowIndex ?>_Container" value="<?php echo HtmlEncode($t101_jo_head->Container->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_head->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Container" class="form-group t101_jo_head_Container">
<div id="tp_x<?php echo $t101_jo_head_list->RowIndex ?>_Container" class="ew-template"><input type="radio" class="form-check-input" data-table="t101_jo_head" data-field="x_Container" data-value-separator="<?php echo $t101_jo_head->Container->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_jo_head_list->RowIndex ?>_Container" id="x<?php echo $t101_jo_head_list->RowIndex ?>_Container" value="{value}"<?php echo $t101_jo_head->Container->editAttributes() ?>></div>
<div id="dsl_x<?php echo $t101_jo_head_list->RowIndex ?>_Container" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t101_jo_head->Container->radioButtonListHtml(FALSE, "x{$t101_jo_head_list->RowIndex}_Container") ?>
</div></div>
</span>
<?php } ?>
<?php if ($t101_jo_head->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Container" class="t101_jo_head_Container">
<span<?php echo $t101_jo_head->Container->viewAttributes() ?>>
<?php echo $t101_jo_head->Container->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_head->Destination_id->Visible) { // Destination_id ?>
		<td data-name="Destination_id"<?php echo $t101_jo_head->Destination_id->cellAttributes() ?>>
<?php if ($t101_jo_head->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Destination_id" class="form-group t101_jo_head_Destination_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_head" data-field="x_Destination_id" data-value-separator="<?php echo $t101_jo_head->Destination_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_head_list->RowIndex ?>_Destination_id" name="x<?php echo $t101_jo_head_list->RowIndex ?>_Destination_id"<?php echo $t101_jo_head->Destination_id->editAttributes() ?>>
		<?php echo $t101_jo_head->Destination_id->selectOptionListHtml("x<?php echo $t101_jo_head_list->RowIndex ?>_Destination_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t101_jo_head_list->RowIndex ?>_Destination_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_jo_head->Destination_id->caption() ?>" data-title="<?php echo $t101_jo_head->Destination_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t101_jo_head_list->RowIndex ?>_Destination_id',url:'t002_destinationaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_jo_head->Destination_id->Lookup->getParamTag("p_x" . $t101_jo_head_list->RowIndex . "_Destination_id") ?>
</span>
<input type="hidden" data-table="t101_jo_head" data-field="x_Destination_id" name="o<?php echo $t101_jo_head_list->RowIndex ?>_Destination_id" id="o<?php echo $t101_jo_head_list->RowIndex ?>_Destination_id" value="<?php echo HtmlEncode($t101_jo_head->Destination_id->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_head->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Destination_id" class="form-group t101_jo_head_Destination_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_head" data-field="x_Destination_id" data-value-separator="<?php echo $t101_jo_head->Destination_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_head_list->RowIndex ?>_Destination_id" name="x<?php echo $t101_jo_head_list->RowIndex ?>_Destination_id"<?php echo $t101_jo_head->Destination_id->editAttributes() ?>>
		<?php echo $t101_jo_head->Destination_id->selectOptionListHtml("x<?php echo $t101_jo_head_list->RowIndex ?>_Destination_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t101_jo_head_list->RowIndex ?>_Destination_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_jo_head->Destination_id->caption() ?>" data-title="<?php echo $t101_jo_head->Destination_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t101_jo_head_list->RowIndex ?>_Destination_id',url:'t002_destinationaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_jo_head->Destination_id->Lookup->getParamTag("p_x" . $t101_jo_head_list->RowIndex . "_Destination_id") ?>
</span>
<?php } ?>
<?php if ($t101_jo_head->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Destination_id" class="t101_jo_head_Destination_id">
<span<?php echo $t101_jo_head->Destination_id->viewAttributes() ?>>
<?php echo $t101_jo_head->Destination_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_jo_head->Feeder_id->Visible) { // Feeder_id ?>
		<td data-name="Feeder_id"<?php echo $t101_jo_head->Feeder_id->cellAttributes() ?>>
<?php if ($t101_jo_head->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Feeder_id" class="form-group t101_jo_head_Feeder_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_head" data-field="x_Feeder_id" data-value-separator="<?php echo $t101_jo_head->Feeder_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_head_list->RowIndex ?>_Feeder_id" name="x<?php echo $t101_jo_head_list->RowIndex ?>_Feeder_id"<?php echo $t101_jo_head->Feeder_id->editAttributes() ?>>
		<?php echo $t101_jo_head->Feeder_id->selectOptionListHtml("x<?php echo $t101_jo_head_list->RowIndex ?>_Feeder_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t101_jo_head_list->RowIndex ?>_Feeder_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_jo_head->Feeder_id->caption() ?>" data-title="<?php echo $t101_jo_head->Feeder_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t101_jo_head_list->RowIndex ?>_Feeder_id',url:'t003_feederaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_jo_head->Feeder_id->Lookup->getParamTag("p_x" . $t101_jo_head_list->RowIndex . "_Feeder_id") ?>
</span>
<input type="hidden" data-table="t101_jo_head" data-field="x_Feeder_id" name="o<?php echo $t101_jo_head_list->RowIndex ?>_Feeder_id" id="o<?php echo $t101_jo_head_list->RowIndex ?>_Feeder_id" value="<?php echo HtmlEncode($t101_jo_head->Feeder_id->OldValue) ?>">
<?php } ?>
<?php if ($t101_jo_head->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Feeder_id" class="form-group t101_jo_head_Feeder_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_head" data-field="x_Feeder_id" data-value-separator="<?php echo $t101_jo_head->Feeder_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_head_list->RowIndex ?>_Feeder_id" name="x<?php echo $t101_jo_head_list->RowIndex ?>_Feeder_id"<?php echo $t101_jo_head->Feeder_id->editAttributes() ?>>
		<?php echo $t101_jo_head->Feeder_id->selectOptionListHtml("x<?php echo $t101_jo_head_list->RowIndex ?>_Feeder_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t101_jo_head_list->RowIndex ?>_Feeder_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_jo_head->Feeder_id->caption() ?>" data-title="<?php echo $t101_jo_head->Feeder_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t101_jo_head_list->RowIndex ?>_Feeder_id',url:'t003_feederaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_jo_head->Feeder_id->Lookup->getParamTag("p_x" . $t101_jo_head_list->RowIndex . "_Feeder_id") ?>
</span>
<?php } ?>
<?php if ($t101_jo_head->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_jo_head_list->RowCnt ?>_t101_jo_head_Feeder_id" class="t101_jo_head_Feeder_id">
<span<?php echo $t101_jo_head->Feeder_id->viewAttributes() ?>>
<?php echo $t101_jo_head->Feeder_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t101_jo_head_list->ListOptions->render("body", "right", $t101_jo_head_list->RowCnt);
?>
	</tr>
<?php if ($t101_jo_head->RowType == ROWTYPE_ADD || $t101_jo_head->RowType == ROWTYPE_EDIT) { ?>
<script>
ft101_jo_headlist.updateLists(<?php echo $t101_jo_head_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t101_jo_head->isGridAdd())
		if (!$t101_jo_head_list->Recordset->EOF)
			$t101_jo_head_list->Recordset->moveNext();
}
?>
<?php
	if ($t101_jo_head->isGridAdd() || $t101_jo_head->isGridEdit()) {
		$t101_jo_head_list->RowIndex = '$rowindex$';
		$t101_jo_head_list->loadRowValues();

		// Set row properties
		$t101_jo_head->resetAttributes();
		$t101_jo_head->RowAttrs = array_merge($t101_jo_head->RowAttrs, array('data-rowindex'=>$t101_jo_head_list->RowIndex, 'id'=>'r0_t101_jo_head', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($t101_jo_head->RowAttrs["class"], "ew-template");
		$t101_jo_head->RowType = ROWTYPE_ADD;

		// Render row
		$t101_jo_head_list->renderRow();

		// Render list options
		$t101_jo_head_list->renderListOptions();
		$t101_jo_head_list->StartRowCnt = 0;
?>
	<tr<?php echo $t101_jo_head->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t101_jo_head_list->ListOptions->render("body", "left", $t101_jo_head_list->RowIndex);
?>
	<?php if ($t101_jo_head->Export_Import->Visible) { // Export_Import ?>
		<td data-name="Export_Import">
<span id="el$rowindex$_t101_jo_head_Export_Import" class="form-group t101_jo_head_Export_Import">
<div id="tp_x<?php echo $t101_jo_head_list->RowIndex ?>_Export_Import" class="ew-template"><input type="radio" class="form-check-input" data-table="t101_jo_head" data-field="x_Export_Import" data-value-separator="<?php echo $t101_jo_head->Export_Import->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_jo_head_list->RowIndex ?>_Export_Import" id="x<?php echo $t101_jo_head_list->RowIndex ?>_Export_Import" value="{value}"<?php echo $t101_jo_head->Export_Import->editAttributes() ?>></div>
<div id="dsl_x<?php echo $t101_jo_head_list->RowIndex ?>_Export_Import" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t101_jo_head->Export_Import->radioButtonListHtml(FALSE, "x{$t101_jo_head_list->RowIndex}_Export_Import") ?>
</div></div>
</span>
<input type="hidden" data-table="t101_jo_head" data-field="x_Export_Import" name="o<?php echo $t101_jo_head_list->RowIndex ?>_Export_Import" id="o<?php echo $t101_jo_head_list->RowIndex ?>_Export_Import" value="<?php echo HtmlEncode($t101_jo_head->Export_Import->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_head->No_BL->Visible) { // No_BL ?>
		<td data-name="No_BL">
<span id="el$rowindex$_t101_jo_head_No_BL" class="form-group t101_jo_head_No_BL">
<input type="text" data-table="t101_jo_head" data-field="x_No_BL" name="x<?php echo $t101_jo_head_list->RowIndex ?>_No_BL" id="x<?php echo $t101_jo_head_list->RowIndex ?>_No_BL" size="20" maxlength="50" placeholder="<?php echo HtmlEncode($t101_jo_head->No_BL->getPlaceHolder()) ?>" value="<?php echo $t101_jo_head->No_BL->EditValue ?>"<?php echo $t101_jo_head->No_BL->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_head" data-field="x_No_BL" name="o<?php echo $t101_jo_head_list->RowIndex ?>_No_BL" id="o<?php echo $t101_jo_head_list->RowIndex ?>_No_BL" value="<?php echo HtmlEncode($t101_jo_head->No_BL->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_head->Nomor_JO->Visible) { // Nomor_JO ?>
		<td data-name="Nomor_JO">
<span id="el$rowindex$_t101_jo_head_Nomor_JO" class="form-group t101_jo_head_Nomor_JO">
<input type="text" data-table="t101_jo_head" data-field="x_Nomor_JO" name="x<?php echo $t101_jo_head_list->RowIndex ?>_Nomor_JO" id="x<?php echo $t101_jo_head_list->RowIndex ?>_Nomor_JO" size="20" maxlength="50" placeholder="<?php echo HtmlEncode($t101_jo_head->Nomor_JO->getPlaceHolder()) ?>" value="<?php echo $t101_jo_head->Nomor_JO->EditValue ?>"<?php echo $t101_jo_head->Nomor_JO->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_head" data-field="x_Nomor_JO" name="o<?php echo $t101_jo_head_list->RowIndex ?>_Nomor_JO" id="o<?php echo $t101_jo_head_list->RowIndex ?>_Nomor_JO" value="<?php echo HtmlEncode($t101_jo_head->Nomor_JO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_head->Shipper_id->Visible) { // Shipper_id ?>
		<td data-name="Shipper_id">
<span id="el$rowindex$_t101_jo_head_Shipper_id" class="form-group t101_jo_head_Shipper_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_head" data-field="x_Shipper_id" data-value-separator="<?php echo $t101_jo_head->Shipper_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_head_list->RowIndex ?>_Shipper_id" name="x<?php echo $t101_jo_head_list->RowIndex ?>_Shipper_id"<?php echo $t101_jo_head->Shipper_id->editAttributes() ?>>
		<?php echo $t101_jo_head->Shipper_id->selectOptionListHtml("x<?php echo $t101_jo_head_list->RowIndex ?>_Shipper_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t101_jo_head_list->RowIndex ?>_Shipper_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_jo_head->Shipper_id->caption() ?>" data-title="<?php echo $t101_jo_head->Shipper_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t101_jo_head_list->RowIndex ?>_Shipper_id',url:'t001_shipperaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_jo_head->Shipper_id->Lookup->getParamTag("p_x" . $t101_jo_head_list->RowIndex . "_Shipper_id") ?>
</span>
<input type="hidden" data-table="t101_jo_head" data-field="x_Shipper_id" name="o<?php echo $t101_jo_head_list->RowIndex ?>_Shipper_id" id="o<?php echo $t101_jo_head_list->RowIndex ?>_Shipper_id" value="<?php echo HtmlEncode($t101_jo_head->Shipper_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_head->Party->Visible) { // Party ?>
		<td data-name="Party">
<span id="el$rowindex$_t101_jo_head_Party" class="form-group t101_jo_head_Party">
<input type="text" data-table="t101_jo_head" data-field="x_Party" name="x<?php echo $t101_jo_head_list->RowIndex ?>_Party" id="x<?php echo $t101_jo_head_list->RowIndex ?>_Party" size="1" placeholder="<?php echo HtmlEncode($t101_jo_head->Party->getPlaceHolder()) ?>" value="<?php echo $t101_jo_head->Party->EditValue ?>"<?php echo $t101_jo_head->Party->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_jo_head" data-field="x_Party" name="o<?php echo $t101_jo_head_list->RowIndex ?>_Party" id="o<?php echo $t101_jo_head_list->RowIndex ?>_Party" value="<?php echo HtmlEncode($t101_jo_head->Party->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_head->Container->Visible) { // Container ?>
		<td data-name="Container">
<span id="el$rowindex$_t101_jo_head_Container" class="form-group t101_jo_head_Container">
<div id="tp_x<?php echo $t101_jo_head_list->RowIndex ?>_Container" class="ew-template"><input type="radio" class="form-check-input" data-table="t101_jo_head" data-field="x_Container" data-value-separator="<?php echo $t101_jo_head->Container->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_jo_head_list->RowIndex ?>_Container" id="x<?php echo $t101_jo_head_list->RowIndex ?>_Container" value="{value}"<?php echo $t101_jo_head->Container->editAttributes() ?>></div>
<div id="dsl_x<?php echo $t101_jo_head_list->RowIndex ?>_Container" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t101_jo_head->Container->radioButtonListHtml(FALSE, "x{$t101_jo_head_list->RowIndex}_Container") ?>
</div></div>
</span>
<input type="hidden" data-table="t101_jo_head" data-field="x_Container" name="o<?php echo $t101_jo_head_list->RowIndex ?>_Container" id="o<?php echo $t101_jo_head_list->RowIndex ?>_Container" value="<?php echo HtmlEncode($t101_jo_head->Container->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_head->Destination_id->Visible) { // Destination_id ?>
		<td data-name="Destination_id">
<span id="el$rowindex$_t101_jo_head_Destination_id" class="form-group t101_jo_head_Destination_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_head" data-field="x_Destination_id" data-value-separator="<?php echo $t101_jo_head->Destination_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_head_list->RowIndex ?>_Destination_id" name="x<?php echo $t101_jo_head_list->RowIndex ?>_Destination_id"<?php echo $t101_jo_head->Destination_id->editAttributes() ?>>
		<?php echo $t101_jo_head->Destination_id->selectOptionListHtml("x<?php echo $t101_jo_head_list->RowIndex ?>_Destination_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t101_jo_head_list->RowIndex ?>_Destination_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_jo_head->Destination_id->caption() ?>" data-title="<?php echo $t101_jo_head->Destination_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t101_jo_head_list->RowIndex ?>_Destination_id',url:'t002_destinationaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_jo_head->Destination_id->Lookup->getParamTag("p_x" . $t101_jo_head_list->RowIndex . "_Destination_id") ?>
</span>
<input type="hidden" data-table="t101_jo_head" data-field="x_Destination_id" name="o<?php echo $t101_jo_head_list->RowIndex ?>_Destination_id" id="o<?php echo $t101_jo_head_list->RowIndex ?>_Destination_id" value="<?php echo HtmlEncode($t101_jo_head->Destination_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_jo_head->Feeder_id->Visible) { // Feeder_id ?>
		<td data-name="Feeder_id">
<span id="el$rowindex$_t101_jo_head_Feeder_id" class="form-group t101_jo_head_Feeder_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jo_head" data-field="x_Feeder_id" data-value-separator="<?php echo $t101_jo_head->Feeder_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t101_jo_head_list->RowIndex ?>_Feeder_id" name="x<?php echo $t101_jo_head_list->RowIndex ?>_Feeder_id"<?php echo $t101_jo_head->Feeder_id->editAttributes() ?>>
		<?php echo $t101_jo_head->Feeder_id->selectOptionListHtml("x<?php echo $t101_jo_head_list->RowIndex ?>_Feeder_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t101_jo_head_list->RowIndex ?>_Feeder_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_jo_head->Feeder_id->caption() ?>" data-title="<?php echo $t101_jo_head->Feeder_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t101_jo_head_list->RowIndex ?>_Feeder_id',url:'t003_feederaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $t101_jo_head->Feeder_id->Lookup->getParamTag("p_x" . $t101_jo_head_list->RowIndex . "_Feeder_id") ?>
</span>
<input type="hidden" data-table="t101_jo_head" data-field="x_Feeder_id" name="o<?php echo $t101_jo_head_list->RowIndex ?>_Feeder_id" id="o<?php echo $t101_jo_head_list->RowIndex ?>_Feeder_id" value="<?php echo HtmlEncode($t101_jo_head->Feeder_id->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t101_jo_head_list->ListOptions->render("body", "right", $t101_jo_head_list->RowIndex);
?>
<script>
ft101_jo_headlist.updateLists(<?php echo $t101_jo_head_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
<?php

// Render aggregate row
$t101_jo_head->RowType = ROWTYPE_AGGREGATE;
$t101_jo_head->resetAttributes();
$t101_jo_head_list->renderRow();
?>
<?php if ($t101_jo_head_list->TotalRecs > 0 && !$t101_jo_head->isGridAdd() && !$t101_jo_head->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$t101_jo_head_list->renderListOptions();

// Render list options (footer, left)
$t101_jo_head_list->ListOptions->render("footer", "left");
?>
	<?php if ($t101_jo_head->Export_Import->Visible) { // Export_Import ?>
		<td data-name="Export_Import" class="<?php echo $t101_jo_head->Export_Import->footerCellClass() ?>"><span id="elf_t101_jo_head_Export_Import" class="t101_jo_head_Export_Import">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($t101_jo_head->No_BL->Visible) { // No_BL ?>
		<td data-name="No_BL" class="<?php echo $t101_jo_head->No_BL->footerCellClass() ?>"><span id="elf_t101_jo_head_No_BL" class="t101_jo_head_No_BL">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($t101_jo_head->Nomor_JO->Visible) { // Nomor_JO ?>
		<td data-name="Nomor_JO" class="<?php echo $t101_jo_head->Nomor_JO->footerCellClass() ?>"><span id="elf_t101_jo_head_Nomor_JO" class="t101_jo_head_Nomor_JO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($t101_jo_head->Shipper_id->Visible) { // Shipper_id ?>
		<td data-name="Shipper_id" class="<?php echo $t101_jo_head->Shipper_id->footerCellClass() ?>"><span id="elf_t101_jo_head_Shipper_id" class="t101_jo_head_Shipper_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($t101_jo_head->Party->Visible) { // Party ?>
		<td data-name="Party" class="<?php echo $t101_jo_head->Party->footerCellClass() ?>"><span id="elf_t101_jo_head_Party" class="t101_jo_head_Party">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $t101_jo_head->Party->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($t101_jo_head->Container->Visible) { // Container ?>
		<td data-name="Container" class="<?php echo $t101_jo_head->Container->footerCellClass() ?>"><span id="elf_t101_jo_head_Container" class="t101_jo_head_Container">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($t101_jo_head->Destination_id->Visible) { // Destination_id ?>
		<td data-name="Destination_id" class="<?php echo $t101_jo_head->Destination_id->footerCellClass() ?>"><span id="elf_t101_jo_head_Destination_id" class="t101_jo_head_Destination_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($t101_jo_head->Feeder_id->Visible) { // Feeder_id ?>
		<td data-name="Feeder_id" class="<?php echo $t101_jo_head->Feeder_id->footerCellClass() ?>"><span id="elf_t101_jo_head_Feeder_id" class="t101_jo_head_Feeder_id">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$t101_jo_head_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($t101_jo_head->isEdit()) { ?>
<input type="hidden" name="<?php echo $t101_jo_head_list->FormKeyCountName ?>" id="<?php echo $t101_jo_head_list->FormKeyCountName ?>" value="<?php echo $t101_jo_head_list->KeyCount ?>">
<?php } ?>
<?php if ($t101_jo_head->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t101_jo_head_list->FormKeyCountName ?>" id="<?php echo $t101_jo_head_list->FormKeyCountName ?>" value="<?php echo $t101_jo_head_list->KeyCount ?>">
<?php echo $t101_jo_head_list->MultiSelectKey ?>
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
<?php if ($t101_jo_head_list->TotalRecs > 0 && (!$t101_jo_head_list->AutoHidePageSizeSelector || $t101_jo_head_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="t101_jo_head">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($t101_jo_head_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($t101_jo_head_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($t101_jo_head_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="100"<?php if ($t101_jo_head_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="ALL"<?php if ($t101_jo_head->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
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