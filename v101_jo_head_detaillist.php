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
$v101_jo_head_detail_list = new v101_jo_head_detail_list();

// Run the page
$v101_jo_head_detail_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v101_jo_head_detail_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$v101_jo_head_detail->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fv101_jo_head_detaillist = currentForm = new ew.Form("fv101_jo_head_detaillist", "list");
fv101_jo_head_detaillist.formKeyCountName = '<?php echo $v101_jo_head_detail_list->FormKeyCountName ?>';

// Validate form
fv101_jo_head_detaillist.validate = function() {
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
		<?php if ($v101_jo_head_detail_list->export_import->Required) { ?>
			elm = this.getElements("x" + infix + "_export_import");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v101_jo_head_detail->export_import->caption(), $v101_jo_head_detail->export_import->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($v101_jo_head_detail_list->no_bl->Required) { ?>
			elm = this.getElements("x" + infix + "_no_bl");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v101_jo_head_detail->no_bl->caption(), $v101_jo_head_detail->no_bl->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($v101_jo_head_detail_list->nomor_jo->Required) { ?>
			elm = this.getElements("x" + infix + "_nomor_jo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v101_jo_head_detail->nomor_jo->caption(), $v101_jo_head_detail->nomor_jo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($v101_jo_head_detail_list->shipper_id->Required) { ?>
			elm = this.getElements("x" + infix + "_shipper_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v101_jo_head_detail->shipper_id->caption(), $v101_jo_head_detail->shipper_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($v101_jo_head_detail_list->party->Required) { ?>
			elm = this.getElements("x" + infix + "_party");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v101_jo_head_detail->party->caption(), $v101_jo_head_detail->party->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($v101_jo_head_detail_list->container->Required) { ?>
			elm = this.getElements("x" + infix + "_container");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v101_jo_head_detail->container->caption(), $v101_jo_head_detail->container->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($v101_jo_head_detail_list->tanggal_stuffing->Required) { ?>
			elm = this.getElements("x" + infix + "_tanggal_stuffing");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v101_jo_head_detail->tanggal_stuffing->caption(), $v101_jo_head_detail->tanggal_stuffing->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($v101_jo_head_detail_list->destination_id->Required) { ?>
			elm = this.getElements("x" + infix + "_destination_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v101_jo_head_detail->destination_id->caption(), $v101_jo_head_detail->destination_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($v101_jo_head_detail_list->feeder_id->Required) { ?>
			elm = this.getElements("x" + infix + "_feeder_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v101_jo_head_detail->feeder_id->caption(), $v101_jo_head_detail->feeder_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($v101_jo_head_detail_list->truckingvendor_id->Required) { ?>
			elm = this.getElements("x" + infix + "_truckingvendor_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v101_jo_head_detail->truckingvendor_id->caption(), $v101_jo_head_detail->truckingvendor_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($v101_jo_head_detail_list->driver_id->Required) { ?>
			elm = this.getElements("x" + infix + "_driver_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v101_jo_head_detail->driver_id->caption(), $v101_jo_head_detail->driver_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($v101_jo_head_detail_list->nomor_polisi_1->Required) { ?>
			elm = this.getElements("x" + infix + "_nomor_polisi_1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v101_jo_head_detail->nomor_polisi_1->caption(), $v101_jo_head_detail->nomor_polisi_1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($v101_jo_head_detail_list->nomor_polisi_2->Required) { ?>
			elm = this.getElements("x" + infix + "_nomor_polisi_2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v101_jo_head_detail->nomor_polisi_2->caption(), $v101_jo_head_detail->nomor_polisi_2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($v101_jo_head_detail_list->nomor_polisi_3->Required) { ?>
			elm = this.getElements("x" + infix + "_nomor_polisi_3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v101_jo_head_detail->nomor_polisi_3->caption(), $v101_jo_head_detail->nomor_polisi_3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($v101_jo_head_detail_list->nomor_container_1->Required) { ?>
			elm = this.getElements("x" + infix + "_nomor_container_1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v101_jo_head_detail->nomor_container_1->caption(), $v101_jo_head_detail->nomor_container_1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($v101_jo_head_detail_list->nomor_container_2->Required) { ?>
			elm = this.getElements("x" + infix + "_nomor_container_2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v101_jo_head_detail->nomor_container_2->caption(), $v101_jo_head_detail->nomor_container_2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($v101_jo_head_detail_list->ref_johead_id->Required) { ?>
			elm = this.getElements("x" + infix + "_ref_johead_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v101_jo_head_detail->ref_johead_id->caption(), $v101_jo_head_detail->ref_johead_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($v101_jo_head_detail_list->no_tagihan->Required) { ?>
			elm = this.getElements("x" + infix + "_no_tagihan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v101_jo_head_detail->no_tagihan->caption(), $v101_jo_head_detail->no_tagihan->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_no_tagihan");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($v101_jo_head_detail->no_tagihan->errorMessage()) ?>");
		<?php if ($v101_jo_head_detail_list->jumlah_tagihan->Required) { ?>
			elm = this.getElements("x" + infix + "_jumlah_tagihan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $v101_jo_head_detail->jumlah_tagihan->caption(), $v101_jo_head_detail->jumlah_tagihan->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_jumlah_tagihan");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($v101_jo_head_detail->jumlah_tagihan->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fv101_jo_head_detaillist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fv101_jo_head_detaillist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fv101_jo_head_detaillist.lists["x_export_import"] = <?php echo $v101_jo_head_detail_list->export_import->Lookup->toClientList() ?>;
fv101_jo_head_detaillist.lists["x_export_import"].options = <?php echo JsonEncode($v101_jo_head_detail_list->export_import->options(FALSE, TRUE)) ?>;
fv101_jo_head_detaillist.lists["x_shipper_id"] = <?php echo $v101_jo_head_detail_list->shipper_id->Lookup->toClientList() ?>;
fv101_jo_head_detaillist.lists["x_shipper_id"].options = <?php echo JsonEncode($v101_jo_head_detail_list->shipper_id->lookupOptions()) ?>;
fv101_jo_head_detaillist.lists["x_container"] = <?php echo $v101_jo_head_detail_list->container->Lookup->toClientList() ?>;
fv101_jo_head_detaillist.lists["x_container"].options = <?php echo JsonEncode($v101_jo_head_detail_list->container->options(FALSE, TRUE)) ?>;
fv101_jo_head_detaillist.lists["x_destination_id"] = <?php echo $v101_jo_head_detail_list->destination_id->Lookup->toClientList() ?>;
fv101_jo_head_detaillist.lists["x_destination_id"].options = <?php echo JsonEncode($v101_jo_head_detail_list->destination_id->lookupOptions()) ?>;
fv101_jo_head_detaillist.autoSuggests["x_destination_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fv101_jo_head_detaillist.lists["x_feeder_id"] = <?php echo $v101_jo_head_detail_list->feeder_id->Lookup->toClientList() ?>;
fv101_jo_head_detaillist.lists["x_feeder_id"].options = <?php echo JsonEncode($v101_jo_head_detail_list->feeder_id->lookupOptions()) ?>;
fv101_jo_head_detaillist.autoSuggests["x_feeder_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fv101_jo_head_detaillist.lists["x_truckingvendor_id"] = <?php echo $v101_jo_head_detail_list->truckingvendor_id->Lookup->toClientList() ?>;
fv101_jo_head_detaillist.lists["x_truckingvendor_id"].options = <?php echo JsonEncode($v101_jo_head_detail_list->truckingvendor_id->lookupOptions()) ?>;
fv101_jo_head_detaillist.lists["x_driver_id"] = <?php echo $v101_jo_head_detail_list->driver_id->Lookup->toClientList() ?>;
fv101_jo_head_detaillist.lists["x_driver_id"].options = <?php echo JsonEncode($v101_jo_head_detail_list->driver_id->lookupOptions()) ?>;
fv101_jo_head_detaillist.lists["x_ref_johead_id"] = <?php echo $v101_jo_head_detail_list->ref_johead_id->Lookup->toClientList() ?>;
fv101_jo_head_detaillist.lists["x_ref_johead_id"].options = <?php echo JsonEncode($v101_jo_head_detail_list->ref_johead_id->lookupOptions()) ?>;

// Form object for search
var fv101_jo_head_detaillistsrch = currentSearchForm = new ew.Form("fv101_jo_head_detaillistsrch");

// Validate function for search
fv101_jo_head_detaillistsrch.validate = function(fobj) {
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
fv101_jo_head_detaillistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fv101_jo_head_detaillistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fv101_jo_head_detaillistsrch.lists["x_export_import"] = <?php echo $v101_jo_head_detail_list->export_import->Lookup->toClientList() ?>;
fv101_jo_head_detaillistsrch.lists["x_export_import"].options = <?php echo JsonEncode($v101_jo_head_detail_list->export_import->options(FALSE, TRUE)) ?>;
fv101_jo_head_detaillistsrch.lists["x_shipper_id"] = <?php echo $v101_jo_head_detail_list->shipper_id->Lookup->toClientList() ?>;
fv101_jo_head_detaillistsrch.lists["x_shipper_id"].options = <?php echo JsonEncode($v101_jo_head_detail_list->shipper_id->lookupOptions()) ?>;
fv101_jo_head_detaillistsrch.lists["x_container"] = <?php echo $v101_jo_head_detail_list->container->Lookup->toClientList() ?>;
fv101_jo_head_detaillistsrch.lists["x_container"].options = <?php echo JsonEncode($v101_jo_head_detail_list->container->options(FALSE, TRUE)) ?>;

// Filters
fv101_jo_head_detaillistsrch.filterList = <?php echo $v101_jo_head_detail_list->getFilterList() ?>;
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
<?php if (!$v101_jo_head_detail->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($v101_jo_head_detail_list->TotalRecs > 0 && $v101_jo_head_detail_list->ExportOptions->visible()) { ?>
<?php $v101_jo_head_detail_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($v101_jo_head_detail_list->ImportOptions->visible()) { ?>
<?php $v101_jo_head_detail_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($v101_jo_head_detail_list->SearchOptions->visible()) { ?>
<?php $v101_jo_head_detail_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($v101_jo_head_detail_list->FilterOptions->visible()) { ?>
<?php $v101_jo_head_detail_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$v101_jo_head_detail_list->renderOtherOptions();
?>
<?php if (!$v101_jo_head_detail->isExport() && !$v101_jo_head_detail->CurrentAction) { ?>
<form name="fv101_jo_head_detaillistsrch" id="fv101_jo_head_detaillistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($v101_jo_head_detail_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fv101_jo_head_detaillistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="v101_jo_head_detail">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$v101_jo_head_detail_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$v101_jo_head_detail->RowType = ROWTYPE_SEARCH;

// Render row
$v101_jo_head_detail->resetAttributes();
$v101_jo_head_detail_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($v101_jo_head_detail->export_import->Visible) { // export_import ?>
	<div id="xsc_export_import" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $v101_jo_head_detail->export_import->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_export_import" id="z_export_import" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_export_import" class="ew-template"><input type="radio" class="form-check-input" data-table="v101_jo_head_detail" data-field="x_export_import" data-value-separator="<?php echo $v101_jo_head_detail->export_import->displayValueSeparatorAttribute() ?>" name="x_export_import" id="x_export_import" value="{value}"<?php echo $v101_jo_head_detail->export_import->editAttributes() ?>></div>
<div id="dsl_x_export_import" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $v101_jo_head_detail->export_import->radioButtonListHtml(FALSE, "x_export_import") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($v101_jo_head_detail->shipper_id->Visible) { // shipper_id ?>
	<div id="xsc_shipper_id" class="ew-cell form-group">
		<label for="x_shipper_id" class="ew-search-caption ew-label"><?php echo $v101_jo_head_detail->shipper_id->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_shipper_id" id="z_shipper_id" value="="></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="v101_jo_head_detail" data-field="x_shipper_id" data-value-separator="<?php echo $v101_jo_head_detail->shipper_id->displayValueSeparatorAttribute() ?>" id="x_shipper_id" name="x_shipper_id"<?php echo $v101_jo_head_detail->shipper_id->editAttributes() ?>>
		<?php echo $v101_jo_head_detail->shipper_id->selectOptionListHtml("x_shipper_id") ?>
	</select>
</div>
<?php echo $v101_jo_head_detail->shipper_id->Lookup->getParamTag("p_x_shipper_id") ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($v101_jo_head_detail->container->Visible) { // container ?>
	<div id="xsc_container" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $v101_jo_head_detail->container->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_container" id="z_container" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_container" class="ew-template"><input type="radio" class="form-check-input" data-table="v101_jo_head_detail" data-field="x_container" data-value-separator="<?php echo $v101_jo_head_detail->container->displayValueSeparatorAttribute() ?>" name="x_container" id="x_container" value="{value}"<?php echo $v101_jo_head_detail->container->editAttributes() ?>></div>
<div id="dsl_x_container" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $v101_jo_head_detail->container->radioButtonListHtml(FALSE, "x_container") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($v101_jo_head_detail_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($v101_jo_head_detail_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $v101_jo_head_detail_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($v101_jo_head_detail_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($v101_jo_head_detail_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($v101_jo_head_detail_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($v101_jo_head_detail_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $v101_jo_head_detail_list->showPageHeader(); ?>
<?php
$v101_jo_head_detail_list->showMessage();
?>
<?php if ($v101_jo_head_detail_list->TotalRecs > 0 || $v101_jo_head_detail->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($v101_jo_head_detail_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> v101_jo_head_detail">
<form name="fv101_jo_head_detaillist" id="fv101_jo_head_detaillist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($v101_jo_head_detail_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $v101_jo_head_detail_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v101_jo_head_detail">
<div id="gmp_v101_jo_head_detail" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($v101_jo_head_detail_list->TotalRecs > 0 || $v101_jo_head_detail->isGridEdit()) { ?>
<table id="tbl_v101_jo_head_detaillist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$v101_jo_head_detail_list->RowType = ROWTYPE_HEADER;

// Render list options
$v101_jo_head_detail_list->renderListOptions();

// Render list options (header, left)
$v101_jo_head_detail_list->ListOptions->render("header", "left");
?>
<?php if ($v101_jo_head_detail->export_import->Visible) { // export_import ?>
	<?php if ($v101_jo_head_detail->sortUrl($v101_jo_head_detail->export_import) == "") { ?>
		<th data-name="export_import" class="<?php echo $v101_jo_head_detail->export_import->headerCellClass() ?>"><div id="elh_v101_jo_head_detail_export_import" class="v101_jo_head_detail_export_import"><div class="ew-table-header-caption"><?php echo $v101_jo_head_detail->export_import->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="export_import" class="<?php echo $v101_jo_head_detail->export_import->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v101_jo_head_detail->SortUrl($v101_jo_head_detail->export_import) ?>',2);"><div id="elh_v101_jo_head_detail_export_import" class="v101_jo_head_detail_export_import">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_jo_head_detail->export_import->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_jo_head_detail->export_import->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v101_jo_head_detail->export_import->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_jo_head_detail->no_bl->Visible) { // no_bl ?>
	<?php if ($v101_jo_head_detail->sortUrl($v101_jo_head_detail->no_bl) == "") { ?>
		<th data-name="no_bl" class="<?php echo $v101_jo_head_detail->no_bl->headerCellClass() ?>"><div id="elh_v101_jo_head_detail_no_bl" class="v101_jo_head_detail_no_bl"><div class="ew-table-header-caption"><?php echo $v101_jo_head_detail->no_bl->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="no_bl" class="<?php echo $v101_jo_head_detail->no_bl->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v101_jo_head_detail->SortUrl($v101_jo_head_detail->no_bl) ?>',2);"><div id="elh_v101_jo_head_detail_no_bl" class="v101_jo_head_detail_no_bl">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_jo_head_detail->no_bl->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_jo_head_detail->no_bl->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v101_jo_head_detail->no_bl->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_jo_head_detail->nomor_jo->Visible) { // nomor_jo ?>
	<?php if ($v101_jo_head_detail->sortUrl($v101_jo_head_detail->nomor_jo) == "") { ?>
		<th data-name="nomor_jo" class="<?php echo $v101_jo_head_detail->nomor_jo->headerCellClass() ?>"><div id="elh_v101_jo_head_detail_nomor_jo" class="v101_jo_head_detail_nomor_jo"><div class="ew-table-header-caption"><?php echo $v101_jo_head_detail->nomor_jo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nomor_jo" class="<?php echo $v101_jo_head_detail->nomor_jo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v101_jo_head_detail->SortUrl($v101_jo_head_detail->nomor_jo) ?>',2);"><div id="elh_v101_jo_head_detail_nomor_jo" class="v101_jo_head_detail_nomor_jo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_jo_head_detail->nomor_jo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_jo_head_detail->nomor_jo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v101_jo_head_detail->nomor_jo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_jo_head_detail->shipper_id->Visible) { // shipper_id ?>
	<?php if ($v101_jo_head_detail->sortUrl($v101_jo_head_detail->shipper_id) == "") { ?>
		<th data-name="shipper_id" class="<?php echo $v101_jo_head_detail->shipper_id->headerCellClass() ?>"><div id="elh_v101_jo_head_detail_shipper_id" class="v101_jo_head_detail_shipper_id"><div class="ew-table-header-caption"><?php echo $v101_jo_head_detail->shipper_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="shipper_id" class="<?php echo $v101_jo_head_detail->shipper_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v101_jo_head_detail->SortUrl($v101_jo_head_detail->shipper_id) ?>',2);"><div id="elh_v101_jo_head_detail_shipper_id" class="v101_jo_head_detail_shipper_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_jo_head_detail->shipper_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_jo_head_detail->shipper_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v101_jo_head_detail->shipper_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_jo_head_detail->party->Visible) { // party ?>
	<?php if ($v101_jo_head_detail->sortUrl($v101_jo_head_detail->party) == "") { ?>
		<th data-name="party" class="<?php echo $v101_jo_head_detail->party->headerCellClass() ?>"><div id="elh_v101_jo_head_detail_party" class="v101_jo_head_detail_party"><div class="ew-table-header-caption"><?php echo $v101_jo_head_detail->party->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="party" class="<?php echo $v101_jo_head_detail->party->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v101_jo_head_detail->SortUrl($v101_jo_head_detail->party) ?>',2);"><div id="elh_v101_jo_head_detail_party" class="v101_jo_head_detail_party">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_jo_head_detail->party->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_jo_head_detail->party->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v101_jo_head_detail->party->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_jo_head_detail->container->Visible) { // container ?>
	<?php if ($v101_jo_head_detail->sortUrl($v101_jo_head_detail->container) == "") { ?>
		<th data-name="container" class="<?php echo $v101_jo_head_detail->container->headerCellClass() ?>"><div id="elh_v101_jo_head_detail_container" class="v101_jo_head_detail_container"><div class="ew-table-header-caption"><?php echo $v101_jo_head_detail->container->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="container" class="<?php echo $v101_jo_head_detail->container->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v101_jo_head_detail->SortUrl($v101_jo_head_detail->container) ?>',2);"><div id="elh_v101_jo_head_detail_container" class="v101_jo_head_detail_container">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_jo_head_detail->container->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_jo_head_detail->container->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v101_jo_head_detail->container->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_jo_head_detail->tanggal_stuffing->Visible) { // tanggal_stuffing ?>
	<?php if ($v101_jo_head_detail->sortUrl($v101_jo_head_detail->tanggal_stuffing) == "") { ?>
		<th data-name="tanggal_stuffing" class="<?php echo $v101_jo_head_detail->tanggal_stuffing->headerCellClass() ?>"><div id="elh_v101_jo_head_detail_tanggal_stuffing" class="v101_jo_head_detail_tanggal_stuffing"><div class="ew-table-header-caption"><?php echo $v101_jo_head_detail->tanggal_stuffing->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tanggal_stuffing" class="<?php echo $v101_jo_head_detail->tanggal_stuffing->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v101_jo_head_detail->SortUrl($v101_jo_head_detail->tanggal_stuffing) ?>',2);"><div id="elh_v101_jo_head_detail_tanggal_stuffing" class="v101_jo_head_detail_tanggal_stuffing">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_jo_head_detail->tanggal_stuffing->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_jo_head_detail->tanggal_stuffing->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v101_jo_head_detail->tanggal_stuffing->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_jo_head_detail->destination_id->Visible) { // destination_id ?>
	<?php if ($v101_jo_head_detail->sortUrl($v101_jo_head_detail->destination_id) == "") { ?>
		<th data-name="destination_id" class="<?php echo $v101_jo_head_detail->destination_id->headerCellClass() ?>"><div id="elh_v101_jo_head_detail_destination_id" class="v101_jo_head_detail_destination_id"><div class="ew-table-header-caption"><?php echo $v101_jo_head_detail->destination_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="destination_id" class="<?php echo $v101_jo_head_detail->destination_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v101_jo_head_detail->SortUrl($v101_jo_head_detail->destination_id) ?>',2);"><div id="elh_v101_jo_head_detail_destination_id" class="v101_jo_head_detail_destination_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_jo_head_detail->destination_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_jo_head_detail->destination_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v101_jo_head_detail->destination_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_jo_head_detail->feeder_id->Visible) { // feeder_id ?>
	<?php if ($v101_jo_head_detail->sortUrl($v101_jo_head_detail->feeder_id) == "") { ?>
		<th data-name="feeder_id" class="<?php echo $v101_jo_head_detail->feeder_id->headerCellClass() ?>"><div id="elh_v101_jo_head_detail_feeder_id" class="v101_jo_head_detail_feeder_id"><div class="ew-table-header-caption"><?php echo $v101_jo_head_detail->feeder_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="feeder_id" class="<?php echo $v101_jo_head_detail->feeder_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v101_jo_head_detail->SortUrl($v101_jo_head_detail->feeder_id) ?>',2);"><div id="elh_v101_jo_head_detail_feeder_id" class="v101_jo_head_detail_feeder_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_jo_head_detail->feeder_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_jo_head_detail->feeder_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v101_jo_head_detail->feeder_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_jo_head_detail->truckingvendor_id->Visible) { // truckingvendor_id ?>
	<?php if ($v101_jo_head_detail->sortUrl($v101_jo_head_detail->truckingvendor_id) == "") { ?>
		<th data-name="truckingvendor_id" class="<?php echo $v101_jo_head_detail->truckingvendor_id->headerCellClass() ?>"><div id="elh_v101_jo_head_detail_truckingvendor_id" class="v101_jo_head_detail_truckingvendor_id"><div class="ew-table-header-caption"><?php echo $v101_jo_head_detail->truckingvendor_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="truckingvendor_id" class="<?php echo $v101_jo_head_detail->truckingvendor_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v101_jo_head_detail->SortUrl($v101_jo_head_detail->truckingvendor_id) ?>',2);"><div id="elh_v101_jo_head_detail_truckingvendor_id" class="v101_jo_head_detail_truckingvendor_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_jo_head_detail->truckingvendor_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_jo_head_detail->truckingvendor_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v101_jo_head_detail->truckingvendor_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_jo_head_detail->driver_id->Visible) { // driver_id ?>
	<?php if ($v101_jo_head_detail->sortUrl($v101_jo_head_detail->driver_id) == "") { ?>
		<th data-name="driver_id" class="<?php echo $v101_jo_head_detail->driver_id->headerCellClass() ?>"><div id="elh_v101_jo_head_detail_driver_id" class="v101_jo_head_detail_driver_id"><div class="ew-table-header-caption"><?php echo $v101_jo_head_detail->driver_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="driver_id" class="<?php echo $v101_jo_head_detail->driver_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v101_jo_head_detail->SortUrl($v101_jo_head_detail->driver_id) ?>',2);"><div id="elh_v101_jo_head_detail_driver_id" class="v101_jo_head_detail_driver_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_jo_head_detail->driver_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_jo_head_detail->driver_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v101_jo_head_detail->driver_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_jo_head_detail->nomor_polisi_1->Visible) { // nomor_polisi_1 ?>
	<?php if ($v101_jo_head_detail->sortUrl($v101_jo_head_detail->nomor_polisi_1) == "") { ?>
		<th data-name="nomor_polisi_1" class="<?php echo $v101_jo_head_detail->nomor_polisi_1->headerCellClass() ?>"><div id="elh_v101_jo_head_detail_nomor_polisi_1" class="v101_jo_head_detail_nomor_polisi_1"><div class="ew-table-header-caption"><?php echo $v101_jo_head_detail->nomor_polisi_1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nomor_polisi_1" class="<?php echo $v101_jo_head_detail->nomor_polisi_1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v101_jo_head_detail->SortUrl($v101_jo_head_detail->nomor_polisi_1) ?>',2);"><div id="elh_v101_jo_head_detail_nomor_polisi_1" class="v101_jo_head_detail_nomor_polisi_1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_jo_head_detail->nomor_polisi_1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_jo_head_detail->nomor_polisi_1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v101_jo_head_detail->nomor_polisi_1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_jo_head_detail->nomor_polisi_2->Visible) { // nomor_polisi_2 ?>
	<?php if ($v101_jo_head_detail->sortUrl($v101_jo_head_detail->nomor_polisi_2) == "") { ?>
		<th data-name="nomor_polisi_2" class="<?php echo $v101_jo_head_detail->nomor_polisi_2->headerCellClass() ?>"><div id="elh_v101_jo_head_detail_nomor_polisi_2" class="v101_jo_head_detail_nomor_polisi_2"><div class="ew-table-header-caption"><?php echo $v101_jo_head_detail->nomor_polisi_2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nomor_polisi_2" class="<?php echo $v101_jo_head_detail->nomor_polisi_2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v101_jo_head_detail->SortUrl($v101_jo_head_detail->nomor_polisi_2) ?>',2);"><div id="elh_v101_jo_head_detail_nomor_polisi_2" class="v101_jo_head_detail_nomor_polisi_2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_jo_head_detail->nomor_polisi_2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_jo_head_detail->nomor_polisi_2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v101_jo_head_detail->nomor_polisi_2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_jo_head_detail->nomor_polisi_3->Visible) { // nomor_polisi_3 ?>
	<?php if ($v101_jo_head_detail->sortUrl($v101_jo_head_detail->nomor_polisi_3) == "") { ?>
		<th data-name="nomor_polisi_3" class="<?php echo $v101_jo_head_detail->nomor_polisi_3->headerCellClass() ?>"><div id="elh_v101_jo_head_detail_nomor_polisi_3" class="v101_jo_head_detail_nomor_polisi_3"><div class="ew-table-header-caption"><?php echo $v101_jo_head_detail->nomor_polisi_3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nomor_polisi_3" class="<?php echo $v101_jo_head_detail->nomor_polisi_3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v101_jo_head_detail->SortUrl($v101_jo_head_detail->nomor_polisi_3) ?>',2);"><div id="elh_v101_jo_head_detail_nomor_polisi_3" class="v101_jo_head_detail_nomor_polisi_3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_jo_head_detail->nomor_polisi_3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_jo_head_detail->nomor_polisi_3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v101_jo_head_detail->nomor_polisi_3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_jo_head_detail->nomor_container_1->Visible) { // nomor_container_1 ?>
	<?php if ($v101_jo_head_detail->sortUrl($v101_jo_head_detail->nomor_container_1) == "") { ?>
		<th data-name="nomor_container_1" class="<?php echo $v101_jo_head_detail->nomor_container_1->headerCellClass() ?>"><div id="elh_v101_jo_head_detail_nomor_container_1" class="v101_jo_head_detail_nomor_container_1"><div class="ew-table-header-caption"><?php echo $v101_jo_head_detail->nomor_container_1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nomor_container_1" class="<?php echo $v101_jo_head_detail->nomor_container_1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v101_jo_head_detail->SortUrl($v101_jo_head_detail->nomor_container_1) ?>',2);"><div id="elh_v101_jo_head_detail_nomor_container_1" class="v101_jo_head_detail_nomor_container_1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_jo_head_detail->nomor_container_1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_jo_head_detail->nomor_container_1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v101_jo_head_detail->nomor_container_1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_jo_head_detail->nomor_container_2->Visible) { // nomor_container_2 ?>
	<?php if ($v101_jo_head_detail->sortUrl($v101_jo_head_detail->nomor_container_2) == "") { ?>
		<th data-name="nomor_container_2" class="<?php echo $v101_jo_head_detail->nomor_container_2->headerCellClass() ?>"><div id="elh_v101_jo_head_detail_nomor_container_2" class="v101_jo_head_detail_nomor_container_2"><div class="ew-table-header-caption"><?php echo $v101_jo_head_detail->nomor_container_2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nomor_container_2" class="<?php echo $v101_jo_head_detail->nomor_container_2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v101_jo_head_detail->SortUrl($v101_jo_head_detail->nomor_container_2) ?>',2);"><div id="elh_v101_jo_head_detail_nomor_container_2" class="v101_jo_head_detail_nomor_container_2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_jo_head_detail->nomor_container_2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_jo_head_detail->nomor_container_2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v101_jo_head_detail->nomor_container_2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_jo_head_detail->ref_johead_id->Visible) { // ref_johead_id ?>
	<?php if ($v101_jo_head_detail->sortUrl($v101_jo_head_detail->ref_johead_id) == "") { ?>
		<th data-name="ref_johead_id" class="<?php echo $v101_jo_head_detail->ref_johead_id->headerCellClass() ?>"><div id="elh_v101_jo_head_detail_ref_johead_id" class="v101_jo_head_detail_ref_johead_id"><div class="ew-table-header-caption"><?php echo $v101_jo_head_detail->ref_johead_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ref_johead_id" class="<?php echo $v101_jo_head_detail->ref_johead_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v101_jo_head_detail->SortUrl($v101_jo_head_detail->ref_johead_id) ?>',2);"><div id="elh_v101_jo_head_detail_ref_johead_id" class="v101_jo_head_detail_ref_johead_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_jo_head_detail->ref_johead_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_jo_head_detail->ref_johead_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v101_jo_head_detail->ref_johead_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_jo_head_detail->no_tagihan->Visible) { // no_tagihan ?>
	<?php if ($v101_jo_head_detail->sortUrl($v101_jo_head_detail->no_tagihan) == "") { ?>
		<th data-name="no_tagihan" class="<?php echo $v101_jo_head_detail->no_tagihan->headerCellClass() ?>"><div id="elh_v101_jo_head_detail_no_tagihan" class="v101_jo_head_detail_no_tagihan"><div class="ew-table-header-caption"><?php echo $v101_jo_head_detail->no_tagihan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="no_tagihan" class="<?php echo $v101_jo_head_detail->no_tagihan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v101_jo_head_detail->SortUrl($v101_jo_head_detail->no_tagihan) ?>',2);"><div id="elh_v101_jo_head_detail_no_tagihan" class="v101_jo_head_detail_no_tagihan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_jo_head_detail->no_tagihan->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_jo_head_detail->no_tagihan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v101_jo_head_detail->no_tagihan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_jo_head_detail->jumlah_tagihan->Visible) { // jumlah_tagihan ?>
	<?php if ($v101_jo_head_detail->sortUrl($v101_jo_head_detail->jumlah_tagihan) == "") { ?>
		<th data-name="jumlah_tagihan" class="<?php echo $v101_jo_head_detail->jumlah_tagihan->headerCellClass() ?>"><div id="elh_v101_jo_head_detail_jumlah_tagihan" class="v101_jo_head_detail_jumlah_tagihan"><div class="ew-table-header-caption"><?php echo $v101_jo_head_detail->jumlah_tagihan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jumlah_tagihan" class="<?php echo $v101_jo_head_detail->jumlah_tagihan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v101_jo_head_detail->SortUrl($v101_jo_head_detail->jumlah_tagihan) ?>',2);"><div id="elh_v101_jo_head_detail_jumlah_tagihan" class="v101_jo_head_detail_jumlah_tagihan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_jo_head_detail->jumlah_tagihan->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_jo_head_detail->jumlah_tagihan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v101_jo_head_detail->jumlah_tagihan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$v101_jo_head_detail_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($v101_jo_head_detail->ExportAll && $v101_jo_head_detail->isExport()) {
	$v101_jo_head_detail_list->StopRec = $v101_jo_head_detail_list->TotalRecs;
} else {

	// Set the last record to display
	if ($v101_jo_head_detail_list->TotalRecs > $v101_jo_head_detail_list->StartRec + $v101_jo_head_detail_list->DisplayRecs - 1)
		$v101_jo_head_detail_list->StopRec = $v101_jo_head_detail_list->StartRec + $v101_jo_head_detail_list->DisplayRecs - 1;
	else
		$v101_jo_head_detail_list->StopRec = $v101_jo_head_detail_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $v101_jo_head_detail_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($v101_jo_head_detail_list->FormKeyCountName) && ($v101_jo_head_detail->isGridAdd() || $v101_jo_head_detail->isGridEdit() || $v101_jo_head_detail->isConfirm())) {
		$v101_jo_head_detail_list->KeyCount = $CurrentForm->getValue($v101_jo_head_detail_list->FormKeyCountName);
		$v101_jo_head_detail_list->StopRec = $v101_jo_head_detail_list->StartRec + $v101_jo_head_detail_list->KeyCount - 1;
	}
}
$v101_jo_head_detail_list->RecCnt = $v101_jo_head_detail_list->StartRec - 1;
if ($v101_jo_head_detail_list->Recordset && !$v101_jo_head_detail_list->Recordset->EOF) {
	$v101_jo_head_detail_list->Recordset->moveFirst();
	$selectLimit = $v101_jo_head_detail_list->UseSelectLimit;
	if (!$selectLimit && $v101_jo_head_detail_list->StartRec > 1)
		$v101_jo_head_detail_list->Recordset->move($v101_jo_head_detail_list->StartRec - 1);
} elseif (!$v101_jo_head_detail->AllowAddDeleteRow && $v101_jo_head_detail_list->StopRec == 0) {
	$v101_jo_head_detail_list->StopRec = $v101_jo_head_detail->GridAddRowCount;
}

// Initialize aggregate
$v101_jo_head_detail->RowType = ROWTYPE_AGGREGATEINIT;
$v101_jo_head_detail->resetAttributes();
$v101_jo_head_detail_list->renderRow();
$v101_jo_head_detail_list->EditRowCnt = 0;
if ($v101_jo_head_detail->isEdit())
	$v101_jo_head_detail_list->RowIndex = 1;
if ($v101_jo_head_detail->isGridEdit())
	$v101_jo_head_detail_list->RowIndex = 0;
while ($v101_jo_head_detail_list->RecCnt < $v101_jo_head_detail_list->StopRec) {
	$v101_jo_head_detail_list->RecCnt++;
	if ($v101_jo_head_detail_list->RecCnt >= $v101_jo_head_detail_list->StartRec) {
		$v101_jo_head_detail_list->RowCnt++;
		if ($v101_jo_head_detail->isGridAdd() || $v101_jo_head_detail->isGridEdit() || $v101_jo_head_detail->isConfirm()) {
			$v101_jo_head_detail_list->RowIndex++;
			$CurrentForm->Index = $v101_jo_head_detail_list->RowIndex;
			if ($CurrentForm->hasValue($v101_jo_head_detail_list->FormActionName) && $v101_jo_head_detail_list->EventCancelled)
				$v101_jo_head_detail_list->RowAction = strval($CurrentForm->getValue($v101_jo_head_detail_list->FormActionName));
			elseif ($v101_jo_head_detail->isGridAdd())
				$v101_jo_head_detail_list->RowAction = "insert";
			else
				$v101_jo_head_detail_list->RowAction = "";
		}

		// Set up key count
		$v101_jo_head_detail_list->KeyCount = $v101_jo_head_detail_list->RowIndex;

		// Init row class and style
		$v101_jo_head_detail->resetAttributes();
		$v101_jo_head_detail->CssClass = "";
		if ($v101_jo_head_detail->isGridAdd()) {
			$v101_jo_head_detail_list->loadRowValues(); // Load default values
		} else {
			$v101_jo_head_detail_list->loadRowValues($v101_jo_head_detail_list->Recordset); // Load row values
		}
		$v101_jo_head_detail->RowType = ROWTYPE_VIEW; // Render view
		if ($v101_jo_head_detail->isEdit()) {
			if ($v101_jo_head_detail_list->checkInlineEditKey() && $v101_jo_head_detail_list->EditRowCnt == 0) { // Inline edit
				$v101_jo_head_detail->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($v101_jo_head_detail->isGridEdit()) { // Grid edit
			if ($v101_jo_head_detail->EventCancelled)
				$v101_jo_head_detail_list->restoreCurrentRowFormValues($v101_jo_head_detail_list->RowIndex); // Restore form values
			if ($v101_jo_head_detail_list->RowAction == "insert")
				$v101_jo_head_detail->RowType = ROWTYPE_ADD; // Render add
			else
				$v101_jo_head_detail->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($v101_jo_head_detail->isEdit() && $v101_jo_head_detail->RowType == ROWTYPE_EDIT && $v101_jo_head_detail->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$v101_jo_head_detail_list->restoreFormValues(); // Restore form values
		}
		if ($v101_jo_head_detail->isGridEdit() && ($v101_jo_head_detail->RowType == ROWTYPE_EDIT || $v101_jo_head_detail->RowType == ROWTYPE_ADD) && $v101_jo_head_detail->EventCancelled) // Update failed
			$v101_jo_head_detail_list->restoreCurrentRowFormValues($v101_jo_head_detail_list->RowIndex); // Restore form values
		if ($v101_jo_head_detail->RowType == ROWTYPE_EDIT) // Edit row
			$v101_jo_head_detail_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$v101_jo_head_detail->RowAttrs = array_merge($v101_jo_head_detail->RowAttrs, array('data-rowindex'=>$v101_jo_head_detail_list->RowCnt, 'id'=>'r' . $v101_jo_head_detail_list->RowCnt . '_v101_jo_head_detail', 'data-rowtype'=>$v101_jo_head_detail->RowType));

		// Render row
		$v101_jo_head_detail_list->renderRow();

		// Render list options
		$v101_jo_head_detail_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($v101_jo_head_detail_list->RowAction <> "delete" && $v101_jo_head_detail_list->RowAction <> "insertdelete" && !($v101_jo_head_detail_list->RowAction == "insert" && $v101_jo_head_detail->isConfirm() && $v101_jo_head_detail_list->emptyRow())) {
?>
	<tr<?php echo $v101_jo_head_detail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v101_jo_head_detail_list->ListOptions->render("body", "left", $v101_jo_head_detail_list->RowCnt);
?>
	<?php if ($v101_jo_head_detail->export_import->Visible) { // export_import ?>
		<td data-name="export_import"<?php echo $v101_jo_head_detail->export_import->cellAttributes() ?>>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_export_import" class="form-group v101_jo_head_detail_export_import">
<div id="tp_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_export_import" class="ew-template"><input type="radio" class="form-check-input" data-table="v101_jo_head_detail" data-field="x_export_import" data-value-separator="<?php echo $v101_jo_head_detail->export_import->displayValueSeparatorAttribute() ?>" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_export_import" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_export_import" value="{value}"<?php echo $v101_jo_head_detail->export_import->editAttributes() ?>></div>
<div id="dsl_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_export_import" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $v101_jo_head_detail->export_import->radioButtonListHtml(FALSE, "x{$v101_jo_head_detail_list->RowIndex}_export_import") ?>
</div></div>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_export_import" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_export_import" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_export_import" value="<?php echo HtmlEncode($v101_jo_head_detail->export_import->OldValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_export_import" class="form-group v101_jo_head_detail_export_import">
<span<?php echo $v101_jo_head_detail->export_import->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($v101_jo_head_detail->export_import->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_export_import" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_export_import" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_export_import" value="<?php echo HtmlEncode($v101_jo_head_detail->export_import->CurrentValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_export_import" class="v101_jo_head_detail_export_import">
<span<?php echo $v101_jo_head_detail->export_import->viewAttributes() ?>>
<?php echo $v101_jo_head_detail->export_import->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_id" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_id" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_id" value="<?php echo HtmlEncode($v101_jo_head_detail->id->CurrentValue) ?>">
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_id" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_id" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_id" value="<?php echo HtmlEncode($v101_jo_head_detail->id->OldValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_EDIT || $v101_jo_head_detail->CurrentMode == "edit") { ?>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_id" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_id" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_id" value="<?php echo HtmlEncode($v101_jo_head_detail->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($v101_jo_head_detail->no_bl->Visible) { // no_bl ?>
		<td data-name="no_bl"<?php echo $v101_jo_head_detail->no_bl->cellAttributes() ?>>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_no_bl" class="form-group v101_jo_head_detail_no_bl">
<input type="text" data-table="v101_jo_head_detail" data-field="x_no_bl" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_no_bl" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_no_bl" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->no_bl->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->no_bl->EditValue ?>"<?php echo $v101_jo_head_detail->no_bl->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_no_bl" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_no_bl" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_no_bl" value="<?php echo HtmlEncode($v101_jo_head_detail->no_bl->OldValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_no_bl" class="form-group v101_jo_head_detail_no_bl">
<span<?php echo $v101_jo_head_detail->no_bl->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($v101_jo_head_detail->no_bl->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_no_bl" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_no_bl" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_no_bl" value="<?php echo HtmlEncode($v101_jo_head_detail->no_bl->CurrentValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_no_bl" class="v101_jo_head_detail_no_bl">
<span<?php echo $v101_jo_head_detail->no_bl->viewAttributes() ?>>
<?php echo $v101_jo_head_detail->no_bl->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->nomor_jo->Visible) { // nomor_jo ?>
		<td data-name="nomor_jo"<?php echo $v101_jo_head_detail->nomor_jo->cellAttributes() ?>>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_nomor_jo" class="form-group v101_jo_head_detail_nomor_jo">
<input type="text" data-table="v101_jo_head_detail" data-field="x_nomor_jo" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_jo" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_jo" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->nomor_jo->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->nomor_jo->EditValue ?>"<?php echo $v101_jo_head_detail->nomor_jo->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_nomor_jo" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_jo" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_jo" value="<?php echo HtmlEncode($v101_jo_head_detail->nomor_jo->OldValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_nomor_jo" class="form-group v101_jo_head_detail_nomor_jo">
<span<?php echo $v101_jo_head_detail->nomor_jo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($v101_jo_head_detail->nomor_jo->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_nomor_jo" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_jo" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_jo" value="<?php echo HtmlEncode($v101_jo_head_detail->nomor_jo->CurrentValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_nomor_jo" class="v101_jo_head_detail_nomor_jo">
<span<?php echo $v101_jo_head_detail->nomor_jo->viewAttributes() ?>>
<?php echo $v101_jo_head_detail->nomor_jo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->shipper_id->Visible) { // shipper_id ?>
		<td data-name="shipper_id"<?php echo $v101_jo_head_detail->shipper_id->cellAttributes() ?>>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_shipper_id" class="form-group v101_jo_head_detail_shipper_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="v101_jo_head_detail" data-field="x_shipper_id" data-value-separator="<?php echo $v101_jo_head_detail->shipper_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_shipper_id" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_shipper_id"<?php echo $v101_jo_head_detail->shipper_id->editAttributes() ?>>
		<?php echo $v101_jo_head_detail->shipper_id->selectOptionListHtml("x<?php echo $v101_jo_head_detail_list->RowIndex ?>_shipper_id") ?>
	</select>
</div>
<?php echo $v101_jo_head_detail->shipper_id->Lookup->getParamTag("p_x" . $v101_jo_head_detail_list->RowIndex . "_shipper_id") ?>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_shipper_id" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_shipper_id" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_shipper_id" value="<?php echo HtmlEncode($v101_jo_head_detail->shipper_id->OldValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_shipper_id" class="form-group v101_jo_head_detail_shipper_id">
<span<?php echo $v101_jo_head_detail->shipper_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($v101_jo_head_detail->shipper_id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_shipper_id" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_shipper_id" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_shipper_id" value="<?php echo HtmlEncode($v101_jo_head_detail->shipper_id->CurrentValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_shipper_id" class="v101_jo_head_detail_shipper_id">
<span<?php echo $v101_jo_head_detail->shipper_id->viewAttributes() ?>>
<?php echo $v101_jo_head_detail->shipper_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->party->Visible) { // party ?>
		<td data-name="party"<?php echo $v101_jo_head_detail->party->cellAttributes() ?>>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_party" class="form-group v101_jo_head_detail_party">
<input type="text" data-table="v101_jo_head_detail" data-field="x_party" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_party" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_party" size="30" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->party->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->party->EditValue ?>"<?php echo $v101_jo_head_detail->party->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_party" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_party" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_party" value="<?php echo HtmlEncode($v101_jo_head_detail->party->OldValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_party" class="form-group v101_jo_head_detail_party">
<span<?php echo $v101_jo_head_detail->party->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($v101_jo_head_detail->party->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_party" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_party" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_party" value="<?php echo HtmlEncode($v101_jo_head_detail->party->CurrentValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_party" class="v101_jo_head_detail_party">
<span<?php echo $v101_jo_head_detail->party->viewAttributes() ?>>
<?php echo $v101_jo_head_detail->party->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->container->Visible) { // container ?>
		<td data-name="container"<?php echo $v101_jo_head_detail->container->cellAttributes() ?>>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_container" class="form-group v101_jo_head_detail_container">
<div id="tp_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_container" class="ew-template"><input type="radio" class="form-check-input" data-table="v101_jo_head_detail" data-field="x_container" data-value-separator="<?php echo $v101_jo_head_detail->container->displayValueSeparatorAttribute() ?>" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_container" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_container" value="{value}"<?php echo $v101_jo_head_detail->container->editAttributes() ?>></div>
<div id="dsl_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_container" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $v101_jo_head_detail->container->radioButtonListHtml(FALSE, "x{$v101_jo_head_detail_list->RowIndex}_container") ?>
</div></div>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_container" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_container" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_container" value="<?php echo HtmlEncode($v101_jo_head_detail->container->OldValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_container" class="form-group v101_jo_head_detail_container">
<span<?php echo $v101_jo_head_detail->container->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($v101_jo_head_detail->container->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_container" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_container" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_container" value="<?php echo HtmlEncode($v101_jo_head_detail->container->CurrentValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_container" class="v101_jo_head_detail_container">
<span<?php echo $v101_jo_head_detail->container->viewAttributes() ?>>
<?php echo $v101_jo_head_detail->container->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->tanggal_stuffing->Visible) { // tanggal_stuffing ?>
		<td data-name="tanggal_stuffing"<?php echo $v101_jo_head_detail->tanggal_stuffing->cellAttributes() ?>>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_tanggal_stuffing" class="form-group v101_jo_head_detail_tanggal_stuffing">
<input type="text" data-table="v101_jo_head_detail" data-field="x_tanggal_stuffing" data-format="7" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_tanggal_stuffing" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_tanggal_stuffing" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->tanggal_stuffing->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->tanggal_stuffing->EditValue ?>"<?php echo $v101_jo_head_detail->tanggal_stuffing->editAttributes() ?>>
<?php if (!$v101_jo_head_detail->tanggal_stuffing->ReadOnly && !$v101_jo_head_detail->tanggal_stuffing->Disabled && !isset($v101_jo_head_detail->tanggal_stuffing->EditAttrs["readonly"]) && !isset($v101_jo_head_detail->tanggal_stuffing->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fv101_jo_head_detaillist", "x<?php echo $v101_jo_head_detail_list->RowIndex ?>_tanggal_stuffing", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_tanggal_stuffing" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_tanggal_stuffing" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_tanggal_stuffing" value="<?php echo HtmlEncode($v101_jo_head_detail->tanggal_stuffing->OldValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_tanggal_stuffing" class="form-group v101_jo_head_detail_tanggal_stuffing">
<span<?php echo $v101_jo_head_detail->tanggal_stuffing->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($v101_jo_head_detail->tanggal_stuffing->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_tanggal_stuffing" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_tanggal_stuffing" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_tanggal_stuffing" value="<?php echo HtmlEncode($v101_jo_head_detail->tanggal_stuffing->CurrentValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_tanggal_stuffing" class="v101_jo_head_detail_tanggal_stuffing">
<span<?php echo $v101_jo_head_detail->tanggal_stuffing->viewAttributes() ?>>
<?php echo $v101_jo_head_detail->tanggal_stuffing->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->destination_id->Visible) { // destination_id ?>
		<td data-name="destination_id"<?php echo $v101_jo_head_detail->destination_id->cellAttributes() ?>>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_destination_id" class="form-group v101_jo_head_detail_destination_id">
<?php
$wrkonchange = "" . trim(@$v101_jo_head_detail->destination_id->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$v101_jo_head_detail->destination_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_destination_id" class="text-nowrap" style="z-index: <?php echo (9000 - $v101_jo_head_detail_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_destination_id" id="sv_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_destination_id" value="<?php echo RemoveHtml($v101_jo_head_detail->destination_id->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->destination_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($v101_jo_head_detail->destination_id->getPlaceHolder()) ?>"<?php echo $v101_jo_head_detail->destination_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_destination_id" data-value-separator="<?php echo $v101_jo_head_detail->destination_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_destination_id" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_destination_id" value="<?php echo HtmlEncode($v101_jo_head_detail->destination_id->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fv101_jo_head_detaillist.createAutoSuggest({"id":"x<?php echo $v101_jo_head_detail_list->RowIndex ?>_destination_id","forceSelect":false});
</script>
<?php echo $v101_jo_head_detail->destination_id->Lookup->getParamTag("p_x" . $v101_jo_head_detail_list->RowIndex . "_destination_id") ?>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_destination_id" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_destination_id" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_destination_id" value="<?php echo HtmlEncode($v101_jo_head_detail->destination_id->OldValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_destination_id" class="form-group v101_jo_head_detail_destination_id">
<span<?php echo $v101_jo_head_detail->destination_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($v101_jo_head_detail->destination_id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_destination_id" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_destination_id" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_destination_id" value="<?php echo HtmlEncode($v101_jo_head_detail->destination_id->CurrentValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_destination_id" class="v101_jo_head_detail_destination_id">
<span<?php echo $v101_jo_head_detail->destination_id->viewAttributes() ?>>
<?php echo $v101_jo_head_detail->destination_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->feeder_id->Visible) { // feeder_id ?>
		<td data-name="feeder_id"<?php echo $v101_jo_head_detail->feeder_id->cellAttributes() ?>>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_feeder_id" class="form-group v101_jo_head_detail_feeder_id">
<?php
$wrkonchange = "" . trim(@$v101_jo_head_detail->feeder_id->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$v101_jo_head_detail->feeder_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_feeder_id" class="text-nowrap" style="z-index: <?php echo (9000 - $v101_jo_head_detail_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_feeder_id" id="sv_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_feeder_id" value="<?php echo RemoveHtml($v101_jo_head_detail->feeder_id->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->feeder_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($v101_jo_head_detail->feeder_id->getPlaceHolder()) ?>"<?php echo $v101_jo_head_detail->feeder_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_feeder_id" data-value-separator="<?php echo $v101_jo_head_detail->feeder_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_feeder_id" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_feeder_id" value="<?php echo HtmlEncode($v101_jo_head_detail->feeder_id->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fv101_jo_head_detaillist.createAutoSuggest({"id":"x<?php echo $v101_jo_head_detail_list->RowIndex ?>_feeder_id","forceSelect":false});
</script>
<?php echo $v101_jo_head_detail->feeder_id->Lookup->getParamTag("p_x" . $v101_jo_head_detail_list->RowIndex . "_feeder_id") ?>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_feeder_id" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_feeder_id" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_feeder_id" value="<?php echo HtmlEncode($v101_jo_head_detail->feeder_id->OldValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_feeder_id" class="form-group v101_jo_head_detail_feeder_id">
<span<?php echo $v101_jo_head_detail->feeder_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($v101_jo_head_detail->feeder_id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_feeder_id" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_feeder_id" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_feeder_id" value="<?php echo HtmlEncode($v101_jo_head_detail->feeder_id->CurrentValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_feeder_id" class="v101_jo_head_detail_feeder_id">
<span<?php echo $v101_jo_head_detail->feeder_id->viewAttributes() ?>>
<?php echo $v101_jo_head_detail->feeder_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->truckingvendor_id->Visible) { // truckingvendor_id ?>
		<td data-name="truckingvendor_id"<?php echo $v101_jo_head_detail->truckingvendor_id->cellAttributes() ?>>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_truckingvendor_id" class="form-group v101_jo_head_detail_truckingvendor_id">
<?php $v101_jo_head_detail->truckingvendor_id->EditAttrs["onchange"] = "ew.updateOptions.call(this);" . @$v101_jo_head_detail->truckingvendor_id->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="v101_jo_head_detail" data-field="x_truckingvendor_id" data-value-separator="<?php echo $v101_jo_head_detail->truckingvendor_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_truckingvendor_id" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_truckingvendor_id"<?php echo $v101_jo_head_detail->truckingvendor_id->editAttributes() ?>>
		<?php echo $v101_jo_head_detail->truckingvendor_id->selectOptionListHtml("x<?php echo $v101_jo_head_detail_list->RowIndex ?>_truckingvendor_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_truckingvendor_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $v101_jo_head_detail->truckingvendor_id->caption() ?>" data-title="<?php echo $v101_jo_head_detail->truckingvendor_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $v101_jo_head_detail_list->RowIndex ?>_truckingvendor_id',url:'t006_trucking_vendoraddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $v101_jo_head_detail->truckingvendor_id->Lookup->getParamTag("p_x" . $v101_jo_head_detail_list->RowIndex . "_truckingvendor_id") ?>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_truckingvendor_id" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_truckingvendor_id" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_truckingvendor_id" value="<?php echo HtmlEncode($v101_jo_head_detail->truckingvendor_id->OldValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_truckingvendor_id" class="form-group v101_jo_head_detail_truckingvendor_id">
<?php $v101_jo_head_detail->truckingvendor_id->EditAttrs["onchange"] = "ew.updateOptions.call(this);" . @$v101_jo_head_detail->truckingvendor_id->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="v101_jo_head_detail" data-field="x_truckingvendor_id" data-value-separator="<?php echo $v101_jo_head_detail->truckingvendor_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_truckingvendor_id" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_truckingvendor_id"<?php echo $v101_jo_head_detail->truckingvendor_id->editAttributes() ?>>
		<?php echo $v101_jo_head_detail->truckingvendor_id->selectOptionListHtml("x<?php echo $v101_jo_head_detail_list->RowIndex ?>_truckingvendor_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_truckingvendor_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $v101_jo_head_detail->truckingvendor_id->caption() ?>" data-title="<?php echo $v101_jo_head_detail->truckingvendor_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $v101_jo_head_detail_list->RowIndex ?>_truckingvendor_id',url:'t006_trucking_vendoraddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $v101_jo_head_detail->truckingvendor_id->Lookup->getParamTag("p_x" . $v101_jo_head_detail_list->RowIndex . "_truckingvendor_id") ?>
</span>
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_truckingvendor_id" class="v101_jo_head_detail_truckingvendor_id">
<span<?php echo $v101_jo_head_detail->truckingvendor_id->viewAttributes() ?>>
<?php echo $v101_jo_head_detail->truckingvendor_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->driver_id->Visible) { // driver_id ?>
		<td data-name="driver_id"<?php echo $v101_jo_head_detail->driver_id->cellAttributes() ?>>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_driver_id" class="form-group v101_jo_head_detail_driver_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="v101_jo_head_detail" data-field="x_driver_id" data-value-separator="<?php echo $v101_jo_head_detail->driver_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_driver_id" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_driver_id"<?php echo $v101_jo_head_detail->driver_id->editAttributes() ?>>
		<?php echo $v101_jo_head_detail->driver_id->selectOptionListHtml("x<?php echo $v101_jo_head_detail_list->RowIndex ?>_driver_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_driver_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $v101_jo_head_detail->driver_id->caption() ?>" data-title="<?php echo $v101_jo_head_detail->driver_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $v101_jo_head_detail_list->RowIndex ?>_driver_id',url:'t005_driveraddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $v101_jo_head_detail->driver_id->Lookup->getParamTag("p_x" . $v101_jo_head_detail_list->RowIndex . "_driver_id") ?>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_driver_id" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_driver_id" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_driver_id" value="<?php echo HtmlEncode($v101_jo_head_detail->driver_id->OldValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_driver_id" class="form-group v101_jo_head_detail_driver_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="v101_jo_head_detail" data-field="x_driver_id" data-value-separator="<?php echo $v101_jo_head_detail->driver_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_driver_id" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_driver_id"<?php echo $v101_jo_head_detail->driver_id->editAttributes() ?>>
		<?php echo $v101_jo_head_detail->driver_id->selectOptionListHtml("x<?php echo $v101_jo_head_detail_list->RowIndex ?>_driver_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_driver_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $v101_jo_head_detail->driver_id->caption() ?>" data-title="<?php echo $v101_jo_head_detail->driver_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $v101_jo_head_detail_list->RowIndex ?>_driver_id',url:'t005_driveraddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $v101_jo_head_detail->driver_id->Lookup->getParamTag("p_x" . $v101_jo_head_detail_list->RowIndex . "_driver_id") ?>
</span>
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_driver_id" class="v101_jo_head_detail_driver_id">
<span<?php echo $v101_jo_head_detail->driver_id->viewAttributes() ?>>
<?php echo $v101_jo_head_detail->driver_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->nomor_polisi_1->Visible) { // nomor_polisi_1 ?>
		<td data-name="nomor_polisi_1"<?php echo $v101_jo_head_detail->nomor_polisi_1->cellAttributes() ?>>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_nomor_polisi_1" class="form-group v101_jo_head_detail_nomor_polisi_1">
<input type="text" data-table="v101_jo_head_detail" data-field="x_nomor_polisi_1" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_1" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_1" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->nomor_polisi_1->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->nomor_polisi_1->EditValue ?>"<?php echo $v101_jo_head_detail->nomor_polisi_1->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_nomor_polisi_1" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_1" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_1" value="<?php echo HtmlEncode($v101_jo_head_detail->nomor_polisi_1->OldValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_nomor_polisi_1" class="form-group v101_jo_head_detail_nomor_polisi_1">
<span<?php echo $v101_jo_head_detail->nomor_polisi_1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($v101_jo_head_detail->nomor_polisi_1->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_nomor_polisi_1" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_1" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_1" value="<?php echo HtmlEncode($v101_jo_head_detail->nomor_polisi_1->CurrentValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_nomor_polisi_1" class="v101_jo_head_detail_nomor_polisi_1">
<span<?php echo $v101_jo_head_detail->nomor_polisi_1->viewAttributes() ?>>
<?php echo $v101_jo_head_detail->nomor_polisi_1->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->nomor_polisi_2->Visible) { // nomor_polisi_2 ?>
		<td data-name="nomor_polisi_2"<?php echo $v101_jo_head_detail->nomor_polisi_2->cellAttributes() ?>>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_nomor_polisi_2" class="form-group v101_jo_head_detail_nomor_polisi_2">
<input type="text" data-table="v101_jo_head_detail" data-field="x_nomor_polisi_2" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_2" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_2" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->nomor_polisi_2->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->nomor_polisi_2->EditValue ?>"<?php echo $v101_jo_head_detail->nomor_polisi_2->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_nomor_polisi_2" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_2" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_2" value="<?php echo HtmlEncode($v101_jo_head_detail->nomor_polisi_2->OldValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_nomor_polisi_2" class="form-group v101_jo_head_detail_nomor_polisi_2">
<span<?php echo $v101_jo_head_detail->nomor_polisi_2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($v101_jo_head_detail->nomor_polisi_2->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_nomor_polisi_2" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_2" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_2" value="<?php echo HtmlEncode($v101_jo_head_detail->nomor_polisi_2->CurrentValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_nomor_polisi_2" class="v101_jo_head_detail_nomor_polisi_2">
<span<?php echo $v101_jo_head_detail->nomor_polisi_2->viewAttributes() ?>>
<?php echo $v101_jo_head_detail->nomor_polisi_2->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->nomor_polisi_3->Visible) { // nomor_polisi_3 ?>
		<td data-name="nomor_polisi_3"<?php echo $v101_jo_head_detail->nomor_polisi_3->cellAttributes() ?>>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_nomor_polisi_3" class="form-group v101_jo_head_detail_nomor_polisi_3">
<input type="text" data-table="v101_jo_head_detail" data-field="x_nomor_polisi_3" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_3" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_3" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->nomor_polisi_3->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->nomor_polisi_3->EditValue ?>"<?php echo $v101_jo_head_detail->nomor_polisi_3->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_nomor_polisi_3" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_3" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_3" value="<?php echo HtmlEncode($v101_jo_head_detail->nomor_polisi_3->OldValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_nomor_polisi_3" class="form-group v101_jo_head_detail_nomor_polisi_3">
<span<?php echo $v101_jo_head_detail->nomor_polisi_3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($v101_jo_head_detail->nomor_polisi_3->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_nomor_polisi_3" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_3" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_3" value="<?php echo HtmlEncode($v101_jo_head_detail->nomor_polisi_3->CurrentValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_nomor_polisi_3" class="v101_jo_head_detail_nomor_polisi_3">
<span<?php echo $v101_jo_head_detail->nomor_polisi_3->viewAttributes() ?>>
<?php echo $v101_jo_head_detail->nomor_polisi_3->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->nomor_container_1->Visible) { // nomor_container_1 ?>
		<td data-name="nomor_container_1"<?php echo $v101_jo_head_detail->nomor_container_1->cellAttributes() ?>>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_nomor_container_1" class="form-group v101_jo_head_detail_nomor_container_1">
<input type="text" data-table="v101_jo_head_detail" data-field="x_nomor_container_1" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_container_1" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_container_1" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->nomor_container_1->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->nomor_container_1->EditValue ?>"<?php echo $v101_jo_head_detail->nomor_container_1->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_nomor_container_1" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_container_1" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_container_1" value="<?php echo HtmlEncode($v101_jo_head_detail->nomor_container_1->OldValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_nomor_container_1" class="form-group v101_jo_head_detail_nomor_container_1">
<span<?php echo $v101_jo_head_detail->nomor_container_1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($v101_jo_head_detail->nomor_container_1->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_nomor_container_1" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_container_1" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_container_1" value="<?php echo HtmlEncode($v101_jo_head_detail->nomor_container_1->CurrentValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_nomor_container_1" class="v101_jo_head_detail_nomor_container_1">
<span<?php echo $v101_jo_head_detail->nomor_container_1->viewAttributes() ?>>
<?php echo $v101_jo_head_detail->nomor_container_1->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->nomor_container_2->Visible) { // nomor_container_2 ?>
		<td data-name="nomor_container_2"<?php echo $v101_jo_head_detail->nomor_container_2->cellAttributes() ?>>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_nomor_container_2" class="form-group v101_jo_head_detail_nomor_container_2">
<input type="text" data-table="v101_jo_head_detail" data-field="x_nomor_container_2" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_container_2" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_container_2" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->nomor_container_2->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->nomor_container_2->EditValue ?>"<?php echo $v101_jo_head_detail->nomor_container_2->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_nomor_container_2" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_container_2" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_container_2" value="<?php echo HtmlEncode($v101_jo_head_detail->nomor_container_2->OldValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_nomor_container_2" class="form-group v101_jo_head_detail_nomor_container_2">
<span<?php echo $v101_jo_head_detail->nomor_container_2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($v101_jo_head_detail->nomor_container_2->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_nomor_container_2" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_container_2" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_container_2" value="<?php echo HtmlEncode($v101_jo_head_detail->nomor_container_2->CurrentValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_nomor_container_2" class="v101_jo_head_detail_nomor_container_2">
<span<?php echo $v101_jo_head_detail->nomor_container_2->viewAttributes() ?>>
<?php echo $v101_jo_head_detail->nomor_container_2->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->ref_johead_id->Visible) { // ref_johead_id ?>
		<td data-name="ref_johead_id"<?php echo $v101_jo_head_detail->ref_johead_id->cellAttributes() ?>>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_ref_johead_id" class="form-group v101_jo_head_detail_ref_johead_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="v101_jo_head_detail" data-field="x_ref_johead_id" data-value-separator="<?php echo $v101_jo_head_detail->ref_johead_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_ref_johead_id" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_ref_johead_id"<?php echo $v101_jo_head_detail->ref_johead_id->editAttributes() ?>>
		<?php echo $v101_jo_head_detail->ref_johead_id->selectOptionListHtml("x<?php echo $v101_jo_head_detail_list->RowIndex ?>_ref_johead_id") ?>
	</select>
</div>
<?php echo $v101_jo_head_detail->ref_johead_id->Lookup->getParamTag("p_x" . $v101_jo_head_detail_list->RowIndex . "_ref_johead_id") ?>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_ref_johead_id" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_ref_johead_id" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_ref_johead_id" value="<?php echo HtmlEncode($v101_jo_head_detail->ref_johead_id->OldValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_ref_johead_id" class="form-group v101_jo_head_detail_ref_johead_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="v101_jo_head_detail" data-field="x_ref_johead_id" data-value-separator="<?php echo $v101_jo_head_detail->ref_johead_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_ref_johead_id" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_ref_johead_id"<?php echo $v101_jo_head_detail->ref_johead_id->editAttributes() ?>>
		<?php echo $v101_jo_head_detail->ref_johead_id->selectOptionListHtml("x<?php echo $v101_jo_head_detail_list->RowIndex ?>_ref_johead_id") ?>
	</select>
</div>
<?php echo $v101_jo_head_detail->ref_johead_id->Lookup->getParamTag("p_x" . $v101_jo_head_detail_list->RowIndex . "_ref_johead_id") ?>
</span>
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_ref_johead_id" class="v101_jo_head_detail_ref_johead_id">
<span<?php echo $v101_jo_head_detail->ref_johead_id->viewAttributes() ?>>
<?php echo $v101_jo_head_detail->ref_johead_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->no_tagihan->Visible) { // no_tagihan ?>
		<td data-name="no_tagihan"<?php echo $v101_jo_head_detail->no_tagihan->cellAttributes() ?>>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_no_tagihan" class="form-group v101_jo_head_detail_no_tagihan">
<input type="text" data-table="v101_jo_head_detail" data-field="x_no_tagihan" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_no_tagihan" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_no_tagihan" size="10" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->no_tagihan->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->no_tagihan->EditValue ?>"<?php echo $v101_jo_head_detail->no_tagihan->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_no_tagihan" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_no_tagihan" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_no_tagihan" value="<?php echo HtmlEncode($v101_jo_head_detail->no_tagihan->OldValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_no_tagihan" class="form-group v101_jo_head_detail_no_tagihan">
<input type="text" data-table="v101_jo_head_detail" data-field="x_no_tagihan" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_no_tagihan" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_no_tagihan" size="10" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->no_tagihan->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->no_tagihan->EditValue ?>"<?php echo $v101_jo_head_detail->no_tagihan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_no_tagihan" class="v101_jo_head_detail_no_tagihan">
<span<?php echo $v101_jo_head_detail->no_tagihan->viewAttributes() ?>>
<?php echo $v101_jo_head_detail->no_tagihan->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->jumlah_tagihan->Visible) { // jumlah_tagihan ?>
		<td data-name="jumlah_tagihan"<?php echo $v101_jo_head_detail->jumlah_tagihan->cellAttributes() ?>>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_jumlah_tagihan" class="form-group v101_jo_head_detail_jumlah_tagihan">
<input type="text" data-table="v101_jo_head_detail" data-field="x_jumlah_tagihan" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_jumlah_tagihan" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_jumlah_tagihan" size="10" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->jumlah_tagihan->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->jumlah_tagihan->EditValue ?>"<?php echo $v101_jo_head_detail->jumlah_tagihan->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_jumlah_tagihan" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_jumlah_tagihan" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_jumlah_tagihan" value="<?php echo HtmlEncode($v101_jo_head_detail->jumlah_tagihan->OldValue) ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_jumlah_tagihan" class="form-group v101_jo_head_detail_jumlah_tagihan">
<input type="text" data-table="v101_jo_head_detail" data-field="x_jumlah_tagihan" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_jumlah_tagihan" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_jumlah_tagihan" size="10" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->jumlah_tagihan->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->jumlah_tagihan->EditValue ?>"<?php echo $v101_jo_head_detail->jumlah_tagihan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v101_jo_head_detail_list->RowCnt ?>_v101_jo_head_detail_jumlah_tagihan" class="v101_jo_head_detail_jumlah_tagihan">
<span<?php echo $v101_jo_head_detail->jumlah_tagihan->viewAttributes() ?>>
<?php echo $v101_jo_head_detail->jumlah_tagihan->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v101_jo_head_detail_list->ListOptions->render("body", "right", $v101_jo_head_detail_list->RowCnt);
?>
	</tr>
<?php if ($v101_jo_head_detail->RowType == ROWTYPE_ADD || $v101_jo_head_detail->RowType == ROWTYPE_EDIT) { ?>
<script>
fv101_jo_head_detaillist.updateLists(<?php echo $v101_jo_head_detail_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$v101_jo_head_detail->isGridAdd())
		if (!$v101_jo_head_detail_list->Recordset->EOF)
			$v101_jo_head_detail_list->Recordset->moveNext();
}
?>
<?php
	if ($v101_jo_head_detail->isGridAdd() || $v101_jo_head_detail->isGridEdit()) {
		$v101_jo_head_detail_list->RowIndex = '$rowindex$';
		$v101_jo_head_detail_list->loadRowValues();

		// Set row properties
		$v101_jo_head_detail->resetAttributes();
		$v101_jo_head_detail->RowAttrs = array_merge($v101_jo_head_detail->RowAttrs, array('data-rowindex'=>$v101_jo_head_detail_list->RowIndex, 'id'=>'r0_v101_jo_head_detail', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($v101_jo_head_detail->RowAttrs["class"], "ew-template");
		$v101_jo_head_detail->RowType = ROWTYPE_ADD;

		// Render row
		$v101_jo_head_detail_list->renderRow();

		// Render list options
		$v101_jo_head_detail_list->renderListOptions();
		$v101_jo_head_detail_list->StartRowCnt = 0;
?>
	<tr<?php echo $v101_jo_head_detail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v101_jo_head_detail_list->ListOptions->render("body", "left", $v101_jo_head_detail_list->RowIndex);
?>
	<?php if ($v101_jo_head_detail->export_import->Visible) { // export_import ?>
		<td data-name="export_import">
<span id="el$rowindex$_v101_jo_head_detail_export_import" class="form-group v101_jo_head_detail_export_import">
<div id="tp_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_export_import" class="ew-template"><input type="radio" class="form-check-input" data-table="v101_jo_head_detail" data-field="x_export_import" data-value-separator="<?php echo $v101_jo_head_detail->export_import->displayValueSeparatorAttribute() ?>" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_export_import" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_export_import" value="{value}"<?php echo $v101_jo_head_detail->export_import->editAttributes() ?>></div>
<div id="dsl_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_export_import" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $v101_jo_head_detail->export_import->radioButtonListHtml(FALSE, "x{$v101_jo_head_detail_list->RowIndex}_export_import") ?>
</div></div>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_export_import" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_export_import" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_export_import" value="<?php echo HtmlEncode($v101_jo_head_detail->export_import->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->no_bl->Visible) { // no_bl ?>
		<td data-name="no_bl">
<span id="el$rowindex$_v101_jo_head_detail_no_bl" class="form-group v101_jo_head_detail_no_bl">
<input type="text" data-table="v101_jo_head_detail" data-field="x_no_bl" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_no_bl" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_no_bl" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->no_bl->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->no_bl->EditValue ?>"<?php echo $v101_jo_head_detail->no_bl->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_no_bl" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_no_bl" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_no_bl" value="<?php echo HtmlEncode($v101_jo_head_detail->no_bl->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->nomor_jo->Visible) { // nomor_jo ?>
		<td data-name="nomor_jo">
<span id="el$rowindex$_v101_jo_head_detail_nomor_jo" class="form-group v101_jo_head_detail_nomor_jo">
<input type="text" data-table="v101_jo_head_detail" data-field="x_nomor_jo" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_jo" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_jo" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->nomor_jo->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->nomor_jo->EditValue ?>"<?php echo $v101_jo_head_detail->nomor_jo->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_nomor_jo" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_jo" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_jo" value="<?php echo HtmlEncode($v101_jo_head_detail->nomor_jo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->shipper_id->Visible) { // shipper_id ?>
		<td data-name="shipper_id">
<span id="el$rowindex$_v101_jo_head_detail_shipper_id" class="form-group v101_jo_head_detail_shipper_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="v101_jo_head_detail" data-field="x_shipper_id" data-value-separator="<?php echo $v101_jo_head_detail->shipper_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_shipper_id" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_shipper_id"<?php echo $v101_jo_head_detail->shipper_id->editAttributes() ?>>
		<?php echo $v101_jo_head_detail->shipper_id->selectOptionListHtml("x<?php echo $v101_jo_head_detail_list->RowIndex ?>_shipper_id") ?>
	</select>
</div>
<?php echo $v101_jo_head_detail->shipper_id->Lookup->getParamTag("p_x" . $v101_jo_head_detail_list->RowIndex . "_shipper_id") ?>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_shipper_id" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_shipper_id" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_shipper_id" value="<?php echo HtmlEncode($v101_jo_head_detail->shipper_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->party->Visible) { // party ?>
		<td data-name="party">
<span id="el$rowindex$_v101_jo_head_detail_party" class="form-group v101_jo_head_detail_party">
<input type="text" data-table="v101_jo_head_detail" data-field="x_party" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_party" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_party" size="30" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->party->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->party->EditValue ?>"<?php echo $v101_jo_head_detail->party->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_party" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_party" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_party" value="<?php echo HtmlEncode($v101_jo_head_detail->party->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->container->Visible) { // container ?>
		<td data-name="container">
<span id="el$rowindex$_v101_jo_head_detail_container" class="form-group v101_jo_head_detail_container">
<div id="tp_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_container" class="ew-template"><input type="radio" class="form-check-input" data-table="v101_jo_head_detail" data-field="x_container" data-value-separator="<?php echo $v101_jo_head_detail->container->displayValueSeparatorAttribute() ?>" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_container" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_container" value="{value}"<?php echo $v101_jo_head_detail->container->editAttributes() ?>></div>
<div id="dsl_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_container" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $v101_jo_head_detail->container->radioButtonListHtml(FALSE, "x{$v101_jo_head_detail_list->RowIndex}_container") ?>
</div></div>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_container" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_container" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_container" value="<?php echo HtmlEncode($v101_jo_head_detail->container->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->tanggal_stuffing->Visible) { // tanggal_stuffing ?>
		<td data-name="tanggal_stuffing">
<span id="el$rowindex$_v101_jo_head_detail_tanggal_stuffing" class="form-group v101_jo_head_detail_tanggal_stuffing">
<input type="text" data-table="v101_jo_head_detail" data-field="x_tanggal_stuffing" data-format="7" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_tanggal_stuffing" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_tanggal_stuffing" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->tanggal_stuffing->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->tanggal_stuffing->EditValue ?>"<?php echo $v101_jo_head_detail->tanggal_stuffing->editAttributes() ?>>
<?php if (!$v101_jo_head_detail->tanggal_stuffing->ReadOnly && !$v101_jo_head_detail->tanggal_stuffing->Disabled && !isset($v101_jo_head_detail->tanggal_stuffing->EditAttrs["readonly"]) && !isset($v101_jo_head_detail->tanggal_stuffing->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fv101_jo_head_detaillist", "x<?php echo $v101_jo_head_detail_list->RowIndex ?>_tanggal_stuffing", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_tanggal_stuffing" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_tanggal_stuffing" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_tanggal_stuffing" value="<?php echo HtmlEncode($v101_jo_head_detail->tanggal_stuffing->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->destination_id->Visible) { // destination_id ?>
		<td data-name="destination_id">
<span id="el$rowindex$_v101_jo_head_detail_destination_id" class="form-group v101_jo_head_detail_destination_id">
<?php
$wrkonchange = "" . trim(@$v101_jo_head_detail->destination_id->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$v101_jo_head_detail->destination_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_destination_id" class="text-nowrap" style="z-index: <?php echo (9000 - $v101_jo_head_detail_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_destination_id" id="sv_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_destination_id" value="<?php echo RemoveHtml($v101_jo_head_detail->destination_id->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->destination_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($v101_jo_head_detail->destination_id->getPlaceHolder()) ?>"<?php echo $v101_jo_head_detail->destination_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_destination_id" data-value-separator="<?php echo $v101_jo_head_detail->destination_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_destination_id" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_destination_id" value="<?php echo HtmlEncode($v101_jo_head_detail->destination_id->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fv101_jo_head_detaillist.createAutoSuggest({"id":"x<?php echo $v101_jo_head_detail_list->RowIndex ?>_destination_id","forceSelect":false});
</script>
<?php echo $v101_jo_head_detail->destination_id->Lookup->getParamTag("p_x" . $v101_jo_head_detail_list->RowIndex . "_destination_id") ?>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_destination_id" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_destination_id" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_destination_id" value="<?php echo HtmlEncode($v101_jo_head_detail->destination_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->feeder_id->Visible) { // feeder_id ?>
		<td data-name="feeder_id">
<span id="el$rowindex$_v101_jo_head_detail_feeder_id" class="form-group v101_jo_head_detail_feeder_id">
<?php
$wrkonchange = "" . trim(@$v101_jo_head_detail->feeder_id->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$v101_jo_head_detail->feeder_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_feeder_id" class="text-nowrap" style="z-index: <?php echo (9000 - $v101_jo_head_detail_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_feeder_id" id="sv_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_feeder_id" value="<?php echo RemoveHtml($v101_jo_head_detail->feeder_id->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->feeder_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($v101_jo_head_detail->feeder_id->getPlaceHolder()) ?>"<?php echo $v101_jo_head_detail->feeder_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_feeder_id" data-value-separator="<?php echo $v101_jo_head_detail->feeder_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_feeder_id" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_feeder_id" value="<?php echo HtmlEncode($v101_jo_head_detail->feeder_id->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fv101_jo_head_detaillist.createAutoSuggest({"id":"x<?php echo $v101_jo_head_detail_list->RowIndex ?>_feeder_id","forceSelect":false});
</script>
<?php echo $v101_jo_head_detail->feeder_id->Lookup->getParamTag("p_x" . $v101_jo_head_detail_list->RowIndex . "_feeder_id") ?>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_feeder_id" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_feeder_id" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_feeder_id" value="<?php echo HtmlEncode($v101_jo_head_detail->feeder_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->truckingvendor_id->Visible) { // truckingvendor_id ?>
		<td data-name="truckingvendor_id">
<span id="el$rowindex$_v101_jo_head_detail_truckingvendor_id" class="form-group v101_jo_head_detail_truckingvendor_id">
<?php $v101_jo_head_detail->truckingvendor_id->EditAttrs["onchange"] = "ew.updateOptions.call(this);" . @$v101_jo_head_detail->truckingvendor_id->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="v101_jo_head_detail" data-field="x_truckingvendor_id" data-value-separator="<?php echo $v101_jo_head_detail->truckingvendor_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_truckingvendor_id" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_truckingvendor_id"<?php echo $v101_jo_head_detail->truckingvendor_id->editAttributes() ?>>
		<?php echo $v101_jo_head_detail->truckingvendor_id->selectOptionListHtml("x<?php echo $v101_jo_head_detail_list->RowIndex ?>_truckingvendor_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_truckingvendor_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $v101_jo_head_detail->truckingvendor_id->caption() ?>" data-title="<?php echo $v101_jo_head_detail->truckingvendor_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $v101_jo_head_detail_list->RowIndex ?>_truckingvendor_id',url:'t006_trucking_vendoraddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $v101_jo_head_detail->truckingvendor_id->Lookup->getParamTag("p_x" . $v101_jo_head_detail_list->RowIndex . "_truckingvendor_id") ?>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_truckingvendor_id" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_truckingvendor_id" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_truckingvendor_id" value="<?php echo HtmlEncode($v101_jo_head_detail->truckingvendor_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->driver_id->Visible) { // driver_id ?>
		<td data-name="driver_id">
<span id="el$rowindex$_v101_jo_head_detail_driver_id" class="form-group v101_jo_head_detail_driver_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="v101_jo_head_detail" data-field="x_driver_id" data-value-separator="<?php echo $v101_jo_head_detail->driver_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_driver_id" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_driver_id"<?php echo $v101_jo_head_detail->driver_id->editAttributes() ?>>
		<?php echo $v101_jo_head_detail->driver_id->selectOptionListHtml("x<?php echo $v101_jo_head_detail_list->RowIndex ?>_driver_id") ?>
	</select>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $v101_jo_head_detail_list->RowIndex ?>_driver_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $v101_jo_head_detail->driver_id->caption() ?>" data-title="<?php echo $v101_jo_head_detail->driver_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $v101_jo_head_detail_list->RowIndex ?>_driver_id',url:'t005_driveraddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
</div>
<?php echo $v101_jo_head_detail->driver_id->Lookup->getParamTag("p_x" . $v101_jo_head_detail_list->RowIndex . "_driver_id") ?>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_driver_id" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_driver_id" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_driver_id" value="<?php echo HtmlEncode($v101_jo_head_detail->driver_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->nomor_polisi_1->Visible) { // nomor_polisi_1 ?>
		<td data-name="nomor_polisi_1">
<span id="el$rowindex$_v101_jo_head_detail_nomor_polisi_1" class="form-group v101_jo_head_detail_nomor_polisi_1">
<input type="text" data-table="v101_jo_head_detail" data-field="x_nomor_polisi_1" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_1" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_1" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->nomor_polisi_1->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->nomor_polisi_1->EditValue ?>"<?php echo $v101_jo_head_detail->nomor_polisi_1->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_nomor_polisi_1" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_1" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_1" value="<?php echo HtmlEncode($v101_jo_head_detail->nomor_polisi_1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->nomor_polisi_2->Visible) { // nomor_polisi_2 ?>
		<td data-name="nomor_polisi_2">
<span id="el$rowindex$_v101_jo_head_detail_nomor_polisi_2" class="form-group v101_jo_head_detail_nomor_polisi_2">
<input type="text" data-table="v101_jo_head_detail" data-field="x_nomor_polisi_2" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_2" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_2" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->nomor_polisi_2->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->nomor_polisi_2->EditValue ?>"<?php echo $v101_jo_head_detail->nomor_polisi_2->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_nomor_polisi_2" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_2" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_2" value="<?php echo HtmlEncode($v101_jo_head_detail->nomor_polisi_2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->nomor_polisi_3->Visible) { // nomor_polisi_3 ?>
		<td data-name="nomor_polisi_3">
<span id="el$rowindex$_v101_jo_head_detail_nomor_polisi_3" class="form-group v101_jo_head_detail_nomor_polisi_3">
<input type="text" data-table="v101_jo_head_detail" data-field="x_nomor_polisi_3" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_3" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_3" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->nomor_polisi_3->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->nomor_polisi_3->EditValue ?>"<?php echo $v101_jo_head_detail->nomor_polisi_3->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_nomor_polisi_3" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_3" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_polisi_3" value="<?php echo HtmlEncode($v101_jo_head_detail->nomor_polisi_3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->nomor_container_1->Visible) { // nomor_container_1 ?>
		<td data-name="nomor_container_1">
<span id="el$rowindex$_v101_jo_head_detail_nomor_container_1" class="form-group v101_jo_head_detail_nomor_container_1">
<input type="text" data-table="v101_jo_head_detail" data-field="x_nomor_container_1" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_container_1" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_container_1" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->nomor_container_1->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->nomor_container_1->EditValue ?>"<?php echo $v101_jo_head_detail->nomor_container_1->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_nomor_container_1" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_container_1" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_container_1" value="<?php echo HtmlEncode($v101_jo_head_detail->nomor_container_1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->nomor_container_2->Visible) { // nomor_container_2 ?>
		<td data-name="nomor_container_2">
<span id="el$rowindex$_v101_jo_head_detail_nomor_container_2" class="form-group v101_jo_head_detail_nomor_container_2">
<input type="text" data-table="v101_jo_head_detail" data-field="x_nomor_container_2" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_container_2" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_container_2" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->nomor_container_2->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->nomor_container_2->EditValue ?>"<?php echo $v101_jo_head_detail->nomor_container_2->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_nomor_container_2" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_container_2" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_nomor_container_2" value="<?php echo HtmlEncode($v101_jo_head_detail->nomor_container_2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->ref_johead_id->Visible) { // ref_johead_id ?>
		<td data-name="ref_johead_id">
<span id="el$rowindex$_v101_jo_head_detail_ref_johead_id" class="form-group v101_jo_head_detail_ref_johead_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="v101_jo_head_detail" data-field="x_ref_johead_id" data-value-separator="<?php echo $v101_jo_head_detail->ref_johead_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_ref_johead_id" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_ref_johead_id"<?php echo $v101_jo_head_detail->ref_johead_id->editAttributes() ?>>
		<?php echo $v101_jo_head_detail->ref_johead_id->selectOptionListHtml("x<?php echo $v101_jo_head_detail_list->RowIndex ?>_ref_johead_id") ?>
	</select>
</div>
<?php echo $v101_jo_head_detail->ref_johead_id->Lookup->getParamTag("p_x" . $v101_jo_head_detail_list->RowIndex . "_ref_johead_id") ?>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_ref_johead_id" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_ref_johead_id" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_ref_johead_id" value="<?php echo HtmlEncode($v101_jo_head_detail->ref_johead_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->no_tagihan->Visible) { // no_tagihan ?>
		<td data-name="no_tagihan">
<span id="el$rowindex$_v101_jo_head_detail_no_tagihan" class="form-group v101_jo_head_detail_no_tagihan">
<input type="text" data-table="v101_jo_head_detail" data-field="x_no_tagihan" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_no_tagihan" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_no_tagihan" size="10" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->no_tagihan->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->no_tagihan->EditValue ?>"<?php echo $v101_jo_head_detail->no_tagihan->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_no_tagihan" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_no_tagihan" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_no_tagihan" value="<?php echo HtmlEncode($v101_jo_head_detail->no_tagihan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v101_jo_head_detail->jumlah_tagihan->Visible) { // jumlah_tagihan ?>
		<td data-name="jumlah_tagihan">
<span id="el$rowindex$_v101_jo_head_detail_jumlah_tagihan" class="form-group v101_jo_head_detail_jumlah_tagihan">
<input type="text" data-table="v101_jo_head_detail" data-field="x_jumlah_tagihan" name="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_jumlah_tagihan" id="x<?php echo $v101_jo_head_detail_list->RowIndex ?>_jumlah_tagihan" size="10" placeholder="<?php echo HtmlEncode($v101_jo_head_detail->jumlah_tagihan->getPlaceHolder()) ?>" value="<?php echo $v101_jo_head_detail->jumlah_tagihan->EditValue ?>"<?php echo $v101_jo_head_detail->jumlah_tagihan->editAttributes() ?>>
</span>
<input type="hidden" data-table="v101_jo_head_detail" data-field="x_jumlah_tagihan" name="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_jumlah_tagihan" id="o<?php echo $v101_jo_head_detail_list->RowIndex ?>_jumlah_tagihan" value="<?php echo HtmlEncode($v101_jo_head_detail->jumlah_tagihan->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v101_jo_head_detail_list->ListOptions->render("body", "right", $v101_jo_head_detail_list->RowIndex);
?>
<script>
fv101_jo_head_detaillist.updateLists(<?php echo $v101_jo_head_detail_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($v101_jo_head_detail->isEdit()) { ?>
<input type="hidden" name="<?php echo $v101_jo_head_detail_list->FormKeyCountName ?>" id="<?php echo $v101_jo_head_detail_list->FormKeyCountName ?>" value="<?php echo $v101_jo_head_detail_list->KeyCount ?>">
<?php } ?>
<?php if ($v101_jo_head_detail->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $v101_jo_head_detail_list->FormKeyCountName ?>" id="<?php echo $v101_jo_head_detail_list->FormKeyCountName ?>" value="<?php echo $v101_jo_head_detail_list->KeyCount ?>">
<?php echo $v101_jo_head_detail_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$v101_jo_head_detail->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($v101_jo_head_detail_list->Recordset)
	$v101_jo_head_detail_list->Recordset->Close();
?>
<?php if (!$v101_jo_head_detail->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$v101_jo_head_detail->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($v101_jo_head_detail_list->Pager)) $v101_jo_head_detail_list->Pager = new PrevNextPager($v101_jo_head_detail_list->StartRec, $v101_jo_head_detail_list->DisplayRecs, $v101_jo_head_detail_list->TotalRecs, $v101_jo_head_detail_list->AutoHidePager) ?>
<?php if ($v101_jo_head_detail_list->Pager->RecordCount > 0 && $v101_jo_head_detail_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($v101_jo_head_detail_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $v101_jo_head_detail_list->pageUrl() ?>start=<?php echo $v101_jo_head_detail_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($v101_jo_head_detail_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $v101_jo_head_detail_list->pageUrl() ?>start=<?php echo $v101_jo_head_detail_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $v101_jo_head_detail_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($v101_jo_head_detail_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $v101_jo_head_detail_list->pageUrl() ?>start=<?php echo $v101_jo_head_detail_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($v101_jo_head_detail_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $v101_jo_head_detail_list->pageUrl() ?>start=<?php echo $v101_jo_head_detail_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $v101_jo_head_detail_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($v101_jo_head_detail_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $v101_jo_head_detail_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $v101_jo_head_detail_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $v101_jo_head_detail_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($v101_jo_head_detail_list->TotalRecs > 0 && (!$v101_jo_head_detail_list->AutoHidePageSizeSelector || $v101_jo_head_detail_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="v101_jo_head_detail">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($v101_jo_head_detail_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($v101_jo_head_detail_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($v101_jo_head_detail_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="100"<?php if ($v101_jo_head_detail_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="ALL"<?php if ($v101_jo_head_detail->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v101_jo_head_detail_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($v101_jo_head_detail_list->TotalRecs == 0 && !$v101_jo_head_detail->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $v101_jo_head_detail_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$v101_jo_head_detail_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$v101_jo_head_detail->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$v101_jo_head_detail->isExport()) { ?>
<script>
ew.scrollableTable("gmp_v101_jo_head_detail", "100%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$v101_jo_head_detail_list->terminate();
?>