<?php
namespace PHPMaker2019\emkl_prj;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($t005_driver_grid))
	$t005_driver_grid = new t005_driver_grid();

// Run the page
$t005_driver_grid->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t005_driver_grid->Page_Render();
?>
<?php if (!$t005_driver->isExport()) { ?>
<script>

// Form object
var ft005_drivergrid = new ew.Form("ft005_drivergrid", "grid");
ft005_drivergrid.formKeyCountName = '<?php echo $t005_driver_grid->FormKeyCountName ?>';

// Validate form
ft005_drivergrid.validate = function() {
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
		var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
		if (checkrow) {
			addcnt++;
		<?php if ($t005_driver_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_driver->id->caption(), $t005_driver->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t005_driver_grid->TruckingVendor_id->Required) { ?>
			elm = this.getElements("x" + infix + "_TruckingVendor_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_driver->TruckingVendor_id->caption(), $t005_driver->TruckingVendor_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TruckingVendor_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t005_driver->TruckingVendor_id->errorMessage()) ?>");
		<?php if ($t005_driver_grid->Nama->Required) { ?>
			elm = this.getElements("x" + infix + "_Nama");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_driver->Nama->caption(), $t005_driver->Nama->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t005_driver_grid->No_HP_1->Required) { ?>
			elm = this.getElements("x" + infix + "_No_HP_1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_driver->No_HP_1->caption(), $t005_driver->No_HP_1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t005_driver_grid->No_HP_2->Required) { ?>
			elm = this.getElements("x" + infix + "_No_HP_2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_driver->No_HP_2->caption(), $t005_driver->No_HP_2->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
ft005_drivergrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "TruckingVendor_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "Nama", false)) return false;
	if (ew.valueChanged(fobj, infix, "No_HP_1", false)) return false;
	if (ew.valueChanged(fobj, infix, "No_HP_2", false)) return false;
	return true;
}

// Form_CustomValidate event
ft005_drivergrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft005_drivergrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$t005_driver_grid->renderOtherOptions();
?>
<?php $t005_driver_grid->showPageHeader(); ?>
<?php
$t005_driver_grid->showMessage();
?>
<?php if ($t005_driver_grid->TotalRecs > 0 || $t005_driver->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t005_driver_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t005_driver">
<div id="ft005_drivergrid" class="ew-form ew-list-form form-inline">
<div id="gmp_t005_driver" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_t005_drivergrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t005_driver_grid->RowType = ROWTYPE_HEADER;

// Render list options
$t005_driver_grid->renderListOptions();

// Render list options (header, left)
$t005_driver_grid->ListOptions->render("header", "left");
?>
<?php if ($t005_driver->id->Visible) { // id ?>
	<?php if ($t005_driver->sortUrl($t005_driver->id) == "") { ?>
		<th data-name="id" class="<?php echo $t005_driver->id->headerCellClass() ?>"><div id="elh_t005_driver_id" class="t005_driver_id"><div class="ew-table-header-caption"><?php echo $t005_driver->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $t005_driver->id->headerCellClass() ?>"><div><div id="elh_t005_driver_id" class="t005_driver_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t005_driver->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t005_driver->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t005_driver->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t005_driver->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
	<?php if ($t005_driver->sortUrl($t005_driver->TruckingVendor_id) == "") { ?>
		<th data-name="TruckingVendor_id" class="<?php echo $t005_driver->TruckingVendor_id->headerCellClass() ?>"><div id="elh_t005_driver_TruckingVendor_id" class="t005_driver_TruckingVendor_id"><div class="ew-table-header-caption"><?php echo $t005_driver->TruckingVendor_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TruckingVendor_id" class="<?php echo $t005_driver->TruckingVendor_id->headerCellClass() ?>"><div><div id="elh_t005_driver_TruckingVendor_id" class="t005_driver_TruckingVendor_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t005_driver->TruckingVendor_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t005_driver->TruckingVendor_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t005_driver->TruckingVendor_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t005_driver->Nama->Visible) { // Nama ?>
	<?php if ($t005_driver->sortUrl($t005_driver->Nama) == "") { ?>
		<th data-name="Nama" class="<?php echo $t005_driver->Nama->headerCellClass() ?>"><div id="elh_t005_driver_Nama" class="t005_driver_Nama"><div class="ew-table-header-caption"><?php echo $t005_driver->Nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nama" class="<?php echo $t005_driver->Nama->headerCellClass() ?>"><div><div id="elh_t005_driver_Nama" class="t005_driver_Nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t005_driver->Nama->caption() ?></span><span class="ew-table-header-sort"><?php if ($t005_driver->Nama->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t005_driver->Nama->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t005_driver->No_HP_1->Visible) { // No_HP_1 ?>
	<?php if ($t005_driver->sortUrl($t005_driver->No_HP_1) == "") { ?>
		<th data-name="No_HP_1" class="<?php echo $t005_driver->No_HP_1->headerCellClass() ?>"><div id="elh_t005_driver_No_HP_1" class="t005_driver_No_HP_1"><div class="ew-table-header-caption"><?php echo $t005_driver->No_HP_1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="No_HP_1" class="<?php echo $t005_driver->No_HP_1->headerCellClass() ?>"><div><div id="elh_t005_driver_No_HP_1" class="t005_driver_No_HP_1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t005_driver->No_HP_1->caption() ?></span><span class="ew-table-header-sort"><?php if ($t005_driver->No_HP_1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t005_driver->No_HP_1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t005_driver->No_HP_2->Visible) { // No_HP_2 ?>
	<?php if ($t005_driver->sortUrl($t005_driver->No_HP_2) == "") { ?>
		<th data-name="No_HP_2" class="<?php echo $t005_driver->No_HP_2->headerCellClass() ?>"><div id="elh_t005_driver_No_HP_2" class="t005_driver_No_HP_2"><div class="ew-table-header-caption"><?php echo $t005_driver->No_HP_2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="No_HP_2" class="<?php echo $t005_driver->No_HP_2->headerCellClass() ?>"><div><div id="elh_t005_driver_No_HP_2" class="t005_driver_No_HP_2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t005_driver->No_HP_2->caption() ?></span><span class="ew-table-header-sort"><?php if ($t005_driver->No_HP_2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t005_driver->No_HP_2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t005_driver_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$t005_driver_grid->StartRec = 1;
$t005_driver_grid->StopRec = $t005_driver_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $t005_driver_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t005_driver_grid->FormKeyCountName) && ($t005_driver->isGridAdd() || $t005_driver->isGridEdit() || $t005_driver->isConfirm())) {
		$t005_driver_grid->KeyCount = $CurrentForm->getValue($t005_driver_grid->FormKeyCountName);
		$t005_driver_grid->StopRec = $t005_driver_grid->StartRec + $t005_driver_grid->KeyCount - 1;
	}
}
$t005_driver_grid->RecCnt = $t005_driver_grid->StartRec - 1;
if ($t005_driver_grid->Recordset && !$t005_driver_grid->Recordset->EOF) {
	$t005_driver_grid->Recordset->moveFirst();
	$selectLimit = $t005_driver_grid->UseSelectLimit;
	if (!$selectLimit && $t005_driver_grid->StartRec > 1)
		$t005_driver_grid->Recordset->move($t005_driver_grid->StartRec - 1);
} elseif (!$t005_driver->AllowAddDeleteRow && $t005_driver_grid->StopRec == 0) {
	$t005_driver_grid->StopRec = $t005_driver->GridAddRowCount;
}

// Initialize aggregate
$t005_driver->RowType = ROWTYPE_AGGREGATEINIT;
$t005_driver->resetAttributes();
$t005_driver_grid->renderRow();
if ($t005_driver->isGridAdd())
	$t005_driver_grid->RowIndex = 0;
if ($t005_driver->isGridEdit())
	$t005_driver_grid->RowIndex = 0;
while ($t005_driver_grid->RecCnt < $t005_driver_grid->StopRec) {
	$t005_driver_grid->RecCnt++;
	if ($t005_driver_grid->RecCnt >= $t005_driver_grid->StartRec) {
		$t005_driver_grid->RowCnt++;
		if ($t005_driver->isGridAdd() || $t005_driver->isGridEdit() || $t005_driver->isConfirm()) {
			$t005_driver_grid->RowIndex++;
			$CurrentForm->Index = $t005_driver_grid->RowIndex;
			if ($CurrentForm->hasValue($t005_driver_grid->FormActionName) && $t005_driver_grid->EventCancelled)
				$t005_driver_grid->RowAction = strval($CurrentForm->getValue($t005_driver_grid->FormActionName));
			elseif ($t005_driver->isGridAdd())
				$t005_driver_grid->RowAction = "insert";
			else
				$t005_driver_grid->RowAction = "";
		}

		// Set up key count
		$t005_driver_grid->KeyCount = $t005_driver_grid->RowIndex;

		// Init row class and style
		$t005_driver->resetAttributes();
		$t005_driver->CssClass = "";
		if ($t005_driver->isGridAdd()) {
			if ($t005_driver->CurrentMode == "copy") {
				$t005_driver_grid->loadRowValues($t005_driver_grid->Recordset); // Load row values
				$t005_driver_grid->setRecordKey($t005_driver_grid->RowOldKey, $t005_driver_grid->Recordset); // Set old record key
			} else {
				$t005_driver_grid->loadRowValues(); // Load default values
				$t005_driver_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$t005_driver_grid->loadRowValues($t005_driver_grid->Recordset); // Load row values
		}
		$t005_driver->RowType = ROWTYPE_VIEW; // Render view
		if ($t005_driver->isGridAdd()) // Grid add
			$t005_driver->RowType = ROWTYPE_ADD; // Render add
		if ($t005_driver->isGridAdd() && $t005_driver->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t005_driver_grid->restoreCurrentRowFormValues($t005_driver_grid->RowIndex); // Restore form values
		if ($t005_driver->isGridEdit()) { // Grid edit
			if ($t005_driver->EventCancelled)
				$t005_driver_grid->restoreCurrentRowFormValues($t005_driver_grid->RowIndex); // Restore form values
			if ($t005_driver_grid->RowAction == "insert")
				$t005_driver->RowType = ROWTYPE_ADD; // Render add
			else
				$t005_driver->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t005_driver->isGridEdit() && ($t005_driver->RowType == ROWTYPE_EDIT || $t005_driver->RowType == ROWTYPE_ADD) && $t005_driver->EventCancelled) // Update failed
			$t005_driver_grid->restoreCurrentRowFormValues($t005_driver_grid->RowIndex); // Restore form values
		if ($t005_driver->RowType == ROWTYPE_EDIT) // Edit row
			$t005_driver_grid->EditRowCnt++;
		if ($t005_driver->isConfirm()) // Confirm row
			$t005_driver_grid->restoreCurrentRowFormValues($t005_driver_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$t005_driver->RowAttrs = array_merge($t005_driver->RowAttrs, array('data-rowindex'=>$t005_driver_grid->RowCnt, 'id'=>'r' . $t005_driver_grid->RowCnt . '_t005_driver', 'data-rowtype'=>$t005_driver->RowType));

		// Render row
		$t005_driver_grid->renderRow();

		// Render list options
		$t005_driver_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t005_driver_grid->RowAction <> "delete" && $t005_driver_grid->RowAction <> "insertdelete" && !($t005_driver_grid->RowAction == "insert" && $t005_driver->isConfirm() && $t005_driver_grid->emptyRow())) {
?>
	<tr<?php echo $t005_driver->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t005_driver_grid->ListOptions->render("body", "left", $t005_driver_grid->RowCnt);
?>
	<?php if ($t005_driver->id->Visible) { // id ?>
		<td data-name="id"<?php echo $t005_driver->id->cellAttributes() ?>>
<?php if ($t005_driver->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t005_driver" data-field="x_id" name="o<?php echo $t005_driver_grid->RowIndex ?>_id" id="o<?php echo $t005_driver_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t005_driver->id->OldValue) ?>">
<?php } ?>
<?php if ($t005_driver->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t005_driver_grid->RowCnt ?>_t005_driver_id" class="form-group t005_driver_id">
<span<?php echo $t005_driver->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t005_driver->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="t005_driver" data-field="x_id" name="x<?php echo $t005_driver_grid->RowIndex ?>_id" id="x<?php echo $t005_driver_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t005_driver->id->CurrentValue) ?>">
<?php } ?>
<?php if ($t005_driver->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t005_driver_grid->RowCnt ?>_t005_driver_id" class="t005_driver_id">
<span<?php echo $t005_driver->id->viewAttributes() ?>>
<?php echo $t005_driver->id->getViewValue() ?></span>
</span>
<?php if (!$t005_driver->isConfirm()) { ?>
<input type="hidden" data-table="t005_driver" data-field="x_id" name="x<?php echo $t005_driver_grid->RowIndex ?>_id" id="x<?php echo $t005_driver_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t005_driver->id->FormValue) ?>">
<input type="hidden" data-table="t005_driver" data-field="x_id" name="o<?php echo $t005_driver_grid->RowIndex ?>_id" id="o<?php echo $t005_driver_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t005_driver->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t005_driver" data-field="x_id" name="ft005_drivergrid$x<?php echo $t005_driver_grid->RowIndex ?>_id" id="ft005_drivergrid$x<?php echo $t005_driver_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t005_driver->id->FormValue) ?>">
<input type="hidden" data-table="t005_driver" data-field="x_id" name="ft005_drivergrid$o<?php echo $t005_driver_grid->RowIndex ?>_id" id="ft005_drivergrid$o<?php echo $t005_driver_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t005_driver->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t005_driver->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
		<td data-name="TruckingVendor_id"<?php echo $t005_driver->TruckingVendor_id->cellAttributes() ?>>
<?php if ($t005_driver->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($t005_driver->TruckingVendor_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $t005_driver_grid->RowCnt ?>_t005_driver_TruckingVendor_id" class="form-group t005_driver_TruckingVendor_id">
<span<?php echo $t005_driver->TruckingVendor_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t005_driver->TruckingVendor_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" name="x<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" value="<?php echo HtmlEncode($t005_driver->TruckingVendor_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $t005_driver_grid->RowCnt ?>_t005_driver_TruckingVendor_id" class="form-group t005_driver_TruckingVendor_id">
<input type="text" data-table="t005_driver" data-field="x_TruckingVendor_id" name="x<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" id="x<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" size="30" placeholder="<?php echo HtmlEncode($t005_driver->TruckingVendor_id->getPlaceHolder()) ?>" value="<?php echo $t005_driver->TruckingVendor_id->EditValue ?>"<?php echo $t005_driver->TruckingVendor_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="t005_driver" data-field="x_TruckingVendor_id" name="o<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" id="o<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" value="<?php echo HtmlEncode($t005_driver->TruckingVendor_id->OldValue) ?>">
<?php } ?>
<?php if ($t005_driver->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($t005_driver->TruckingVendor_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $t005_driver_grid->RowCnt ?>_t005_driver_TruckingVendor_id" class="form-group t005_driver_TruckingVendor_id">
<span<?php echo $t005_driver->TruckingVendor_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t005_driver->TruckingVendor_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" name="x<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" value="<?php echo HtmlEncode($t005_driver->TruckingVendor_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $t005_driver_grid->RowCnt ?>_t005_driver_TruckingVendor_id" class="form-group t005_driver_TruckingVendor_id">
<input type="text" data-table="t005_driver" data-field="x_TruckingVendor_id" name="x<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" id="x<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" size="30" placeholder="<?php echo HtmlEncode($t005_driver->TruckingVendor_id->getPlaceHolder()) ?>" value="<?php echo $t005_driver->TruckingVendor_id->EditValue ?>"<?php echo $t005_driver->TruckingVendor_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($t005_driver->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t005_driver_grid->RowCnt ?>_t005_driver_TruckingVendor_id" class="t005_driver_TruckingVendor_id">
<span<?php echo $t005_driver->TruckingVendor_id->viewAttributes() ?>>
<?php echo $t005_driver->TruckingVendor_id->getViewValue() ?></span>
</span>
<?php if (!$t005_driver->isConfirm()) { ?>
<input type="hidden" data-table="t005_driver" data-field="x_TruckingVendor_id" name="x<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" id="x<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" value="<?php echo HtmlEncode($t005_driver->TruckingVendor_id->FormValue) ?>">
<input type="hidden" data-table="t005_driver" data-field="x_TruckingVendor_id" name="o<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" id="o<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" value="<?php echo HtmlEncode($t005_driver->TruckingVendor_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t005_driver" data-field="x_TruckingVendor_id" name="ft005_drivergrid$x<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" id="ft005_drivergrid$x<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" value="<?php echo HtmlEncode($t005_driver->TruckingVendor_id->FormValue) ?>">
<input type="hidden" data-table="t005_driver" data-field="x_TruckingVendor_id" name="ft005_drivergrid$o<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" id="ft005_drivergrid$o<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" value="<?php echo HtmlEncode($t005_driver->TruckingVendor_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t005_driver->Nama->Visible) { // Nama ?>
		<td data-name="Nama"<?php echo $t005_driver->Nama->cellAttributes() ?>>
<?php if ($t005_driver->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t005_driver_grid->RowCnt ?>_t005_driver_Nama" class="form-group t005_driver_Nama">
<input type="text" data-table="t005_driver" data-field="x_Nama" name="x<?php echo $t005_driver_grid->RowIndex ?>_Nama" id="x<?php echo $t005_driver_grid->RowIndex ?>_Nama" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t005_driver->Nama->getPlaceHolder()) ?>" value="<?php echo $t005_driver->Nama->EditValue ?>"<?php echo $t005_driver->Nama->editAttributes() ?>>
</span>
<input type="hidden" data-table="t005_driver" data-field="x_Nama" name="o<?php echo $t005_driver_grid->RowIndex ?>_Nama" id="o<?php echo $t005_driver_grid->RowIndex ?>_Nama" value="<?php echo HtmlEncode($t005_driver->Nama->OldValue) ?>">
<?php } ?>
<?php if ($t005_driver->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t005_driver_grid->RowCnt ?>_t005_driver_Nama" class="form-group t005_driver_Nama">
<input type="text" data-table="t005_driver" data-field="x_Nama" name="x<?php echo $t005_driver_grid->RowIndex ?>_Nama" id="x<?php echo $t005_driver_grid->RowIndex ?>_Nama" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t005_driver->Nama->getPlaceHolder()) ?>" value="<?php echo $t005_driver->Nama->EditValue ?>"<?php echo $t005_driver->Nama->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t005_driver->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t005_driver_grid->RowCnt ?>_t005_driver_Nama" class="t005_driver_Nama">
<span<?php echo $t005_driver->Nama->viewAttributes() ?>>
<?php echo $t005_driver->Nama->getViewValue() ?></span>
</span>
<?php if (!$t005_driver->isConfirm()) { ?>
<input type="hidden" data-table="t005_driver" data-field="x_Nama" name="x<?php echo $t005_driver_grid->RowIndex ?>_Nama" id="x<?php echo $t005_driver_grid->RowIndex ?>_Nama" value="<?php echo HtmlEncode($t005_driver->Nama->FormValue) ?>">
<input type="hidden" data-table="t005_driver" data-field="x_Nama" name="o<?php echo $t005_driver_grid->RowIndex ?>_Nama" id="o<?php echo $t005_driver_grid->RowIndex ?>_Nama" value="<?php echo HtmlEncode($t005_driver->Nama->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t005_driver" data-field="x_Nama" name="ft005_drivergrid$x<?php echo $t005_driver_grid->RowIndex ?>_Nama" id="ft005_drivergrid$x<?php echo $t005_driver_grid->RowIndex ?>_Nama" value="<?php echo HtmlEncode($t005_driver->Nama->FormValue) ?>">
<input type="hidden" data-table="t005_driver" data-field="x_Nama" name="ft005_drivergrid$o<?php echo $t005_driver_grid->RowIndex ?>_Nama" id="ft005_drivergrid$o<?php echo $t005_driver_grid->RowIndex ?>_Nama" value="<?php echo HtmlEncode($t005_driver->Nama->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t005_driver->No_HP_1->Visible) { // No_HP_1 ?>
		<td data-name="No_HP_1"<?php echo $t005_driver->No_HP_1->cellAttributes() ?>>
<?php if ($t005_driver->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t005_driver_grid->RowCnt ?>_t005_driver_No_HP_1" class="form-group t005_driver_No_HP_1">
<input type="text" data-table="t005_driver" data-field="x_No_HP_1" name="x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_1" id="x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_1" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t005_driver->No_HP_1->getPlaceHolder()) ?>" value="<?php echo $t005_driver->No_HP_1->EditValue ?>"<?php echo $t005_driver->No_HP_1->editAttributes() ?>>
</span>
<input type="hidden" data-table="t005_driver" data-field="x_No_HP_1" name="o<?php echo $t005_driver_grid->RowIndex ?>_No_HP_1" id="o<?php echo $t005_driver_grid->RowIndex ?>_No_HP_1" value="<?php echo HtmlEncode($t005_driver->No_HP_1->OldValue) ?>">
<?php } ?>
<?php if ($t005_driver->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t005_driver_grid->RowCnt ?>_t005_driver_No_HP_1" class="form-group t005_driver_No_HP_1">
<input type="text" data-table="t005_driver" data-field="x_No_HP_1" name="x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_1" id="x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_1" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t005_driver->No_HP_1->getPlaceHolder()) ?>" value="<?php echo $t005_driver->No_HP_1->EditValue ?>"<?php echo $t005_driver->No_HP_1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t005_driver->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t005_driver_grid->RowCnt ?>_t005_driver_No_HP_1" class="t005_driver_No_HP_1">
<span<?php echo $t005_driver->No_HP_1->viewAttributes() ?>>
<?php echo $t005_driver->No_HP_1->getViewValue() ?></span>
</span>
<?php if (!$t005_driver->isConfirm()) { ?>
<input type="hidden" data-table="t005_driver" data-field="x_No_HP_1" name="x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_1" id="x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_1" value="<?php echo HtmlEncode($t005_driver->No_HP_1->FormValue) ?>">
<input type="hidden" data-table="t005_driver" data-field="x_No_HP_1" name="o<?php echo $t005_driver_grid->RowIndex ?>_No_HP_1" id="o<?php echo $t005_driver_grid->RowIndex ?>_No_HP_1" value="<?php echo HtmlEncode($t005_driver->No_HP_1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t005_driver" data-field="x_No_HP_1" name="ft005_drivergrid$x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_1" id="ft005_drivergrid$x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_1" value="<?php echo HtmlEncode($t005_driver->No_HP_1->FormValue) ?>">
<input type="hidden" data-table="t005_driver" data-field="x_No_HP_1" name="ft005_drivergrid$o<?php echo $t005_driver_grid->RowIndex ?>_No_HP_1" id="ft005_drivergrid$o<?php echo $t005_driver_grid->RowIndex ?>_No_HP_1" value="<?php echo HtmlEncode($t005_driver->No_HP_1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t005_driver->No_HP_2->Visible) { // No_HP_2 ?>
		<td data-name="No_HP_2"<?php echo $t005_driver->No_HP_2->cellAttributes() ?>>
<?php if ($t005_driver->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t005_driver_grid->RowCnt ?>_t005_driver_No_HP_2" class="form-group t005_driver_No_HP_2">
<input type="text" data-table="t005_driver" data-field="x_No_HP_2" name="x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_2" id="x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_2" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t005_driver->No_HP_2->getPlaceHolder()) ?>" value="<?php echo $t005_driver->No_HP_2->EditValue ?>"<?php echo $t005_driver->No_HP_2->editAttributes() ?>>
</span>
<input type="hidden" data-table="t005_driver" data-field="x_No_HP_2" name="o<?php echo $t005_driver_grid->RowIndex ?>_No_HP_2" id="o<?php echo $t005_driver_grid->RowIndex ?>_No_HP_2" value="<?php echo HtmlEncode($t005_driver->No_HP_2->OldValue) ?>">
<?php } ?>
<?php if ($t005_driver->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t005_driver_grid->RowCnt ?>_t005_driver_No_HP_2" class="form-group t005_driver_No_HP_2">
<input type="text" data-table="t005_driver" data-field="x_No_HP_2" name="x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_2" id="x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_2" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t005_driver->No_HP_2->getPlaceHolder()) ?>" value="<?php echo $t005_driver->No_HP_2->EditValue ?>"<?php echo $t005_driver->No_HP_2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t005_driver->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t005_driver_grid->RowCnt ?>_t005_driver_No_HP_2" class="t005_driver_No_HP_2">
<span<?php echo $t005_driver->No_HP_2->viewAttributes() ?>>
<?php echo $t005_driver->No_HP_2->getViewValue() ?></span>
</span>
<?php if (!$t005_driver->isConfirm()) { ?>
<input type="hidden" data-table="t005_driver" data-field="x_No_HP_2" name="x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_2" id="x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_2" value="<?php echo HtmlEncode($t005_driver->No_HP_2->FormValue) ?>">
<input type="hidden" data-table="t005_driver" data-field="x_No_HP_2" name="o<?php echo $t005_driver_grid->RowIndex ?>_No_HP_2" id="o<?php echo $t005_driver_grid->RowIndex ?>_No_HP_2" value="<?php echo HtmlEncode($t005_driver->No_HP_2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t005_driver" data-field="x_No_HP_2" name="ft005_drivergrid$x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_2" id="ft005_drivergrid$x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_2" value="<?php echo HtmlEncode($t005_driver->No_HP_2->FormValue) ?>">
<input type="hidden" data-table="t005_driver" data-field="x_No_HP_2" name="ft005_drivergrid$o<?php echo $t005_driver_grid->RowIndex ?>_No_HP_2" id="ft005_drivergrid$o<?php echo $t005_driver_grid->RowIndex ?>_No_HP_2" value="<?php echo HtmlEncode($t005_driver->No_HP_2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t005_driver_grid->ListOptions->render("body", "right", $t005_driver_grid->RowCnt);
?>
	</tr>
<?php if ($t005_driver->RowType == ROWTYPE_ADD || $t005_driver->RowType == ROWTYPE_EDIT) { ?>
<script>
ft005_drivergrid.updateLists(<?php echo $t005_driver_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t005_driver->isGridAdd() || $t005_driver->CurrentMode == "copy")
		if (!$t005_driver_grid->Recordset->EOF)
			$t005_driver_grid->Recordset->moveNext();
}
?>
<?php
	if ($t005_driver->CurrentMode == "add" || $t005_driver->CurrentMode == "copy" || $t005_driver->CurrentMode == "edit") {
		$t005_driver_grid->RowIndex = '$rowindex$';
		$t005_driver_grid->loadRowValues();

		// Set row properties
		$t005_driver->resetAttributes();
		$t005_driver->RowAttrs = array_merge($t005_driver->RowAttrs, array('data-rowindex'=>$t005_driver_grid->RowIndex, 'id'=>'r0_t005_driver', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($t005_driver->RowAttrs["class"], "ew-template");
		$t005_driver->RowType = ROWTYPE_ADD;

		// Render row
		$t005_driver_grid->renderRow();

		// Render list options
		$t005_driver_grid->renderListOptions();
		$t005_driver_grid->StartRowCnt = 0;
?>
	<tr<?php echo $t005_driver->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t005_driver_grid->ListOptions->render("body", "left", $t005_driver_grid->RowIndex);
?>
	<?php if ($t005_driver->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$t005_driver->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_t005_driver_id" class="form-group t005_driver_id">
<span<?php echo $t005_driver->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t005_driver->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t005_driver" data-field="x_id" name="x<?php echo $t005_driver_grid->RowIndex ?>_id" id="x<?php echo $t005_driver_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t005_driver->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t005_driver" data-field="x_id" name="o<?php echo $t005_driver_grid->RowIndex ?>_id" id="o<?php echo $t005_driver_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t005_driver->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t005_driver->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
		<td data-name="TruckingVendor_id">
<?php if (!$t005_driver->isConfirm()) { ?>
<?php if ($t005_driver->TruckingVendor_id->getSessionValue() <> "") { ?>
<span id="el$rowindex$_t005_driver_TruckingVendor_id" class="form-group t005_driver_TruckingVendor_id">
<span<?php echo $t005_driver->TruckingVendor_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t005_driver->TruckingVendor_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" name="x<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" value="<?php echo HtmlEncode($t005_driver->TruckingVendor_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_t005_driver_TruckingVendor_id" class="form-group t005_driver_TruckingVendor_id">
<input type="text" data-table="t005_driver" data-field="x_TruckingVendor_id" name="x<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" id="x<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" size="30" placeholder="<?php echo HtmlEncode($t005_driver->TruckingVendor_id->getPlaceHolder()) ?>" value="<?php echo $t005_driver->TruckingVendor_id->EditValue ?>"<?php echo $t005_driver->TruckingVendor_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_t005_driver_TruckingVendor_id" class="form-group t005_driver_TruckingVendor_id">
<span<?php echo $t005_driver->TruckingVendor_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t005_driver->TruckingVendor_id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t005_driver" data-field="x_TruckingVendor_id" name="x<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" id="x<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" value="<?php echo HtmlEncode($t005_driver->TruckingVendor_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t005_driver" data-field="x_TruckingVendor_id" name="o<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" id="o<?php echo $t005_driver_grid->RowIndex ?>_TruckingVendor_id" value="<?php echo HtmlEncode($t005_driver->TruckingVendor_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t005_driver->Nama->Visible) { // Nama ?>
		<td data-name="Nama">
<?php if (!$t005_driver->isConfirm()) { ?>
<span id="el$rowindex$_t005_driver_Nama" class="form-group t005_driver_Nama">
<input type="text" data-table="t005_driver" data-field="x_Nama" name="x<?php echo $t005_driver_grid->RowIndex ?>_Nama" id="x<?php echo $t005_driver_grid->RowIndex ?>_Nama" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t005_driver->Nama->getPlaceHolder()) ?>" value="<?php echo $t005_driver->Nama->EditValue ?>"<?php echo $t005_driver->Nama->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t005_driver_Nama" class="form-group t005_driver_Nama">
<span<?php echo $t005_driver->Nama->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t005_driver->Nama->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t005_driver" data-field="x_Nama" name="x<?php echo $t005_driver_grid->RowIndex ?>_Nama" id="x<?php echo $t005_driver_grid->RowIndex ?>_Nama" value="<?php echo HtmlEncode($t005_driver->Nama->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t005_driver" data-field="x_Nama" name="o<?php echo $t005_driver_grid->RowIndex ?>_Nama" id="o<?php echo $t005_driver_grid->RowIndex ?>_Nama" value="<?php echo HtmlEncode($t005_driver->Nama->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t005_driver->No_HP_1->Visible) { // No_HP_1 ?>
		<td data-name="No_HP_1">
<?php if (!$t005_driver->isConfirm()) { ?>
<span id="el$rowindex$_t005_driver_No_HP_1" class="form-group t005_driver_No_HP_1">
<input type="text" data-table="t005_driver" data-field="x_No_HP_1" name="x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_1" id="x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_1" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t005_driver->No_HP_1->getPlaceHolder()) ?>" value="<?php echo $t005_driver->No_HP_1->EditValue ?>"<?php echo $t005_driver->No_HP_1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t005_driver_No_HP_1" class="form-group t005_driver_No_HP_1">
<span<?php echo $t005_driver->No_HP_1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t005_driver->No_HP_1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t005_driver" data-field="x_No_HP_1" name="x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_1" id="x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_1" value="<?php echo HtmlEncode($t005_driver->No_HP_1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t005_driver" data-field="x_No_HP_1" name="o<?php echo $t005_driver_grid->RowIndex ?>_No_HP_1" id="o<?php echo $t005_driver_grid->RowIndex ?>_No_HP_1" value="<?php echo HtmlEncode($t005_driver->No_HP_1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t005_driver->No_HP_2->Visible) { // No_HP_2 ?>
		<td data-name="No_HP_2">
<?php if (!$t005_driver->isConfirm()) { ?>
<span id="el$rowindex$_t005_driver_No_HP_2" class="form-group t005_driver_No_HP_2">
<input type="text" data-table="t005_driver" data-field="x_No_HP_2" name="x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_2" id="x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_2" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t005_driver->No_HP_2->getPlaceHolder()) ?>" value="<?php echo $t005_driver->No_HP_2->EditValue ?>"<?php echo $t005_driver->No_HP_2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t005_driver_No_HP_2" class="form-group t005_driver_No_HP_2">
<span<?php echo $t005_driver->No_HP_2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t005_driver->No_HP_2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t005_driver" data-field="x_No_HP_2" name="x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_2" id="x<?php echo $t005_driver_grid->RowIndex ?>_No_HP_2" value="<?php echo HtmlEncode($t005_driver->No_HP_2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t005_driver" data-field="x_No_HP_2" name="o<?php echo $t005_driver_grid->RowIndex ?>_No_HP_2" id="o<?php echo $t005_driver_grid->RowIndex ?>_No_HP_2" value="<?php echo HtmlEncode($t005_driver->No_HP_2->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t005_driver_grid->ListOptions->render("body", "right", $t005_driver_grid->RowIndex);
?>
<script>
ft005_drivergrid.updateLists(<?php echo $t005_driver_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($t005_driver->CurrentMode == "add" || $t005_driver->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $t005_driver_grid->FormKeyCountName ?>" id="<?php echo $t005_driver_grid->FormKeyCountName ?>" value="<?php echo $t005_driver_grid->KeyCount ?>">
<?php echo $t005_driver_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t005_driver->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $t005_driver_grid->FormKeyCountName ?>" id="<?php echo $t005_driver_grid->FormKeyCountName ?>" value="<?php echo $t005_driver_grid->KeyCount ?>">
<?php echo $t005_driver_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t005_driver->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="ft005_drivergrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($t005_driver_grid->Recordset)
	$t005_driver_grid->Recordset->Close();
?>
</div>
<?php if ($t005_driver_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $t005_driver_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t005_driver_grid->TotalRecs == 0 && !$t005_driver->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t005_driver_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t005_driver_grid->terminate();
?>
<?php if (!$t005_driver->isExport()) { ?>
<script>
ew.scrollableTable("gmp_t005_driver", "100%", "");
</script>
<?php } ?>