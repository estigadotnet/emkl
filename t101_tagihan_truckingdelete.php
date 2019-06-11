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
$t101_tagihan_trucking_delete = new t101_tagihan_trucking_delete();

// Run the page
$t101_tagihan_trucking_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_tagihan_trucking_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft101_tagihan_truckingdelete = currentForm = new ew.Form("ft101_tagihan_truckingdelete", "delete");

// Form_CustomValidate event
ft101_tagihan_truckingdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft101_tagihan_truckingdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft101_tagihan_truckingdelete.lists["x_Shipper_id"] = <?php echo $t101_tagihan_trucking_delete->Shipper_id->Lookup->toClientList() ?>;
ft101_tagihan_truckingdelete.lists["x_Shipper_id"].options = <?php echo JsonEncode($t101_tagihan_trucking_delete->Shipper_id->lookupOptions()) ?>;
ft101_tagihan_truckingdelete.lists["x_Jenis_Container"] = <?php echo $t101_tagihan_trucking_delete->Jenis_Container->Lookup->toClientList() ?>;
ft101_tagihan_truckingdelete.lists["x_Jenis_Container"].options = <?php echo JsonEncode($t101_tagihan_trucking_delete->Jenis_Container->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t101_tagihan_trucking_delete->showPageHeader(); ?>
<?php
$t101_tagihan_trucking_delete->showMessage();
?>
<form name="ft101_tagihan_truckingdelete" id="ft101_tagihan_truckingdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t101_tagihan_trucking_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t101_tagihan_trucking_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_tagihan_trucking">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t101_tagihan_trucking_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t101_tagihan_trucking->Nomor_Polisi_1->Visible) { // Nomor_Polisi_1 ?>
		<th class="<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->headerCellClass() ?>"><span id="elh_t101_tagihan_trucking_Nomor_Polisi_1" class="t101_tagihan_trucking_Nomor_Polisi_1"><?php echo $t101_tagihan_trucking->Nomor_Polisi_1->caption() ?></span></th>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Polisi_2->Visible) { // Nomor_Polisi_2 ?>
		<th class="<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->headerCellClass() ?>"><span id="elh_t101_tagihan_trucking_Nomor_Polisi_2" class="t101_tagihan_trucking_Nomor_Polisi_2"><?php echo $t101_tagihan_trucking->Nomor_Polisi_2->caption() ?></span></th>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Polisi_3->Visible) { // Nomor_Polisi_3 ?>
		<th class="<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->headerCellClass() ?>"><span id="elh_t101_tagihan_trucking_Nomor_Polisi_3" class="t101_tagihan_trucking_Nomor_Polisi_3"><?php echo $t101_tagihan_trucking->Nomor_Polisi_3->caption() ?></span></th>
<?php } ?>
<?php if ($t101_tagihan_trucking->Tanggal->Visible) { // Tanggal ?>
		<th class="<?php echo $t101_tagihan_trucking->Tanggal->headerCellClass() ?>"><span id="elh_t101_tagihan_trucking_Tanggal" class="t101_tagihan_trucking_Tanggal"><?php echo $t101_tagihan_trucking->Tanggal->caption() ?></span></th>
<?php } ?>
<?php if ($t101_tagihan_trucking->Shipper_id->Visible) { // Shipper_id ?>
		<th class="<?php echo $t101_tagihan_trucking->Shipper_id->headerCellClass() ?>"><span id="elh_t101_tagihan_trucking_Shipper_id" class="t101_tagihan_trucking_Shipper_id"><?php echo $t101_tagihan_trucking->Shipper_id->caption() ?></span></th>
<?php } ?>
<?php if ($t101_tagihan_trucking->Dari_Lokasi->Visible) { // Dari_Lokasi ?>
		<th class="<?php echo $t101_tagihan_trucking->Dari_Lokasi->headerCellClass() ?>"><span id="elh_t101_tagihan_trucking_Dari_Lokasi" class="t101_tagihan_trucking_Dari_Lokasi"><?php echo $t101_tagihan_trucking->Dari_Lokasi->caption() ?></span></th>
<?php } ?>
<?php if ($t101_tagihan_trucking->Ke_Lokasi->Visible) { // Ke_Lokasi ?>
		<th class="<?php echo $t101_tagihan_trucking->Ke_Lokasi->headerCellClass() ?>"><span id="elh_t101_tagihan_trucking_Ke_Lokasi" class="t101_tagihan_trucking_Ke_Lokasi"><?php echo $t101_tagihan_trucking->Ke_Lokasi->caption() ?></span></th>
<?php } ?>
<?php if ($t101_tagihan_trucking->Jenis_Container->Visible) { // Jenis_Container ?>
		<th class="<?php echo $t101_tagihan_trucking->Jenis_Container->headerCellClass() ?>"><span id="elh_t101_tagihan_trucking_Jenis_Container" class="t101_tagihan_trucking_Jenis_Container"><?php echo $t101_tagihan_trucking->Jenis_Container->caption() ?></span></th>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
		<th class="<?php echo $t101_tagihan_trucking->Nomor_Container_1->headerCellClass() ?>"><span id="elh_t101_tagihan_trucking_Nomor_Container_1" class="t101_tagihan_trucking_Nomor_Container_1"><?php echo $t101_tagihan_trucking->Nomor_Container_1->caption() ?></span></th>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
		<th class="<?php echo $t101_tagihan_trucking->Nomor_Container_2->headerCellClass() ?>"><span id="elh_t101_tagihan_trucking_Nomor_Container_2" class="t101_tagihan_trucking_Nomor_Container_2"><?php echo $t101_tagihan_trucking->Nomor_Container_2->caption() ?></span></th>
<?php } ?>
<?php if ($t101_tagihan_trucking->Tagihan->Visible) { // Tagihan ?>
		<th class="<?php echo $t101_tagihan_trucking->Tagihan->headerCellClass() ?>"><span id="elh_t101_tagihan_trucking_Tagihan" class="t101_tagihan_trucking_Tagihan"><?php echo $t101_tagihan_trucking->Tagihan->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t101_tagihan_trucking_delete->RecCnt = 0;
$i = 0;
while (!$t101_tagihan_trucking_delete->Recordset->EOF) {
	$t101_tagihan_trucking_delete->RecCnt++;
	$t101_tagihan_trucking_delete->RowCnt++;

	// Set row properties
	$t101_tagihan_trucking->resetAttributes();
	$t101_tagihan_trucking->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t101_tagihan_trucking_delete->loadRowValues($t101_tagihan_trucking_delete->Recordset);

	// Render row
	$t101_tagihan_trucking_delete->renderRow();
?>
	<tr<?php echo $t101_tagihan_trucking->rowAttributes() ?>>
<?php if ($t101_tagihan_trucking->Nomor_Polisi_1->Visible) { // Nomor_Polisi_1 ?>
		<td<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->cellAttributes() ?>>
<span id="el<?php echo $t101_tagihan_trucking_delete->RowCnt ?>_t101_tagihan_trucking_Nomor_Polisi_1" class="t101_tagihan_trucking_Nomor_Polisi_1">
<span<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Polisi_2->Visible) { // Nomor_Polisi_2 ?>
		<td<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->cellAttributes() ?>>
<span id="el<?php echo $t101_tagihan_trucking_delete->RowCnt ?>_t101_tagihan_trucking_Nomor_Polisi_2" class="t101_tagihan_trucking_Nomor_Polisi_2">
<span<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Polisi_3->Visible) { // Nomor_Polisi_3 ?>
		<td<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->cellAttributes() ?>>
<span id="el<?php echo $t101_tagihan_trucking_delete->RowCnt ?>_t101_tagihan_trucking_Nomor_Polisi_3" class="t101_tagihan_trucking_Nomor_Polisi_3">
<span<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_tagihan_trucking->Tanggal->Visible) { // Tanggal ?>
		<td<?php echo $t101_tagihan_trucking->Tanggal->cellAttributes() ?>>
<span id="el<?php echo $t101_tagihan_trucking_delete->RowCnt ?>_t101_tagihan_trucking_Tanggal" class="t101_tagihan_trucking_Tanggal">
<span<?php echo $t101_tagihan_trucking->Tanggal->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Tanggal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_tagihan_trucking->Shipper_id->Visible) { // Shipper_id ?>
		<td<?php echo $t101_tagihan_trucking->Shipper_id->cellAttributes() ?>>
<span id="el<?php echo $t101_tagihan_trucking_delete->RowCnt ?>_t101_tagihan_trucking_Shipper_id" class="t101_tagihan_trucking_Shipper_id">
<span<?php echo $t101_tagihan_trucking->Shipper_id->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Shipper_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_tagihan_trucking->Dari_Lokasi->Visible) { // Dari_Lokasi ?>
		<td<?php echo $t101_tagihan_trucking->Dari_Lokasi->cellAttributes() ?>>
<span id="el<?php echo $t101_tagihan_trucking_delete->RowCnt ?>_t101_tagihan_trucking_Dari_Lokasi" class="t101_tagihan_trucking_Dari_Lokasi">
<span<?php echo $t101_tagihan_trucking->Dari_Lokasi->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Dari_Lokasi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_tagihan_trucking->Ke_Lokasi->Visible) { // Ke_Lokasi ?>
		<td<?php echo $t101_tagihan_trucking->Ke_Lokasi->cellAttributes() ?>>
<span id="el<?php echo $t101_tagihan_trucking_delete->RowCnt ?>_t101_tagihan_trucking_Ke_Lokasi" class="t101_tagihan_trucking_Ke_Lokasi">
<span<?php echo $t101_tagihan_trucking->Ke_Lokasi->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Ke_Lokasi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_tagihan_trucking->Jenis_Container->Visible) { // Jenis_Container ?>
		<td<?php echo $t101_tagihan_trucking->Jenis_Container->cellAttributes() ?>>
<span id="el<?php echo $t101_tagihan_trucking_delete->RowCnt ?>_t101_tagihan_trucking_Jenis_Container" class="t101_tagihan_trucking_Jenis_Container">
<span<?php echo $t101_tagihan_trucking->Jenis_Container->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Jenis_Container->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
		<td<?php echo $t101_tagihan_trucking->Nomor_Container_1->cellAttributes() ?>>
<span id="el<?php echo $t101_tagihan_trucking_delete->RowCnt ?>_t101_tagihan_trucking_Nomor_Container_1" class="t101_tagihan_trucking_Nomor_Container_1">
<span<?php echo $t101_tagihan_trucking->Nomor_Container_1->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Nomor_Container_1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
		<td<?php echo $t101_tagihan_trucking->Nomor_Container_2->cellAttributes() ?>>
<span id="el<?php echo $t101_tagihan_trucking_delete->RowCnt ?>_t101_tagihan_trucking_Nomor_Container_2" class="t101_tagihan_trucking_Nomor_Container_2">
<span<?php echo $t101_tagihan_trucking->Nomor_Container_2->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Nomor_Container_2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_tagihan_trucking->Tagihan->Visible) { // Tagihan ?>
		<td<?php echo $t101_tagihan_trucking->Tagihan->cellAttributes() ?>>
<span id="el<?php echo $t101_tagihan_trucking_delete->RowCnt ?>_t101_tagihan_trucking_Tagihan" class="t101_tagihan_trucking_Tagihan">
<span<?php echo $t101_tagihan_trucking->Tagihan->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Tagihan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t101_tagihan_trucking_delete->Recordset->moveNext();
}
$t101_tagihan_trucking_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_tagihan_trucking_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t101_tagihan_trucking_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t101_tagihan_trucking_delete->terminate();
?>