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
$t101_jo_detail_view = new t101_jo_detail_view();

// Run the page
$t101_jo_detail_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_jo_detail_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t101_jo_detail->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft101_jo_detailview = currentForm = new ew.Form("ft101_jo_detailview", "view");

// Form_CustomValidate event
ft101_jo_detailview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft101_jo_detailview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft101_jo_detailview.lists["x_TruckingVendor_id"] = <?php echo $t101_jo_detail_view->TruckingVendor_id->Lookup->toClientList() ?>;
ft101_jo_detailview.lists["x_TruckingVendor_id"].options = <?php echo JsonEncode($t101_jo_detail_view->TruckingVendor_id->lookupOptions()) ?>;
ft101_jo_detailview.lists["x_Driver_id"] = <?php echo $t101_jo_detail_view->Driver_id->Lookup->toClientList() ?>;
ft101_jo_detailview.lists["x_Driver_id"].options = <?php echo JsonEncode($t101_jo_detail_view->Driver_id->lookupOptions()) ?>;
ft101_jo_detailview.lists["x_Ref_JOHead_id"] = <?php echo $t101_jo_detail_view->Ref_JOHead_id->Lookup->toClientList() ?>;
ft101_jo_detailview.lists["x_Ref_JOHead_id"].options = <?php echo JsonEncode($t101_jo_detail_view->Ref_JOHead_id->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t101_jo_detail->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t101_jo_detail_view->ExportOptions->render("body") ?>
<?php $t101_jo_detail_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t101_jo_detail_view->showPageHeader(); ?>
<?php
$t101_jo_detail_view->showMessage();
?>
<form name="ft101_jo_detailview" id="ft101_jo_detailview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t101_jo_detail_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t101_jo_detail_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_jo_detail">
<input type="hidden" name="modal" value="<?php echo (int)$t101_jo_detail_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t101_jo_detail->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
	<tr id="r_TruckingVendor_id">
		<td class="<?php echo $t101_jo_detail_view->TableLeftColumnClass ?>"><span id="elh_t101_jo_detail_TruckingVendor_id"><?php echo $t101_jo_detail->TruckingVendor_id->caption() ?></span></td>
		<td data-name="TruckingVendor_id"<?php echo $t101_jo_detail->TruckingVendor_id->cellAttributes() ?>>
<span id="el_t101_jo_detail_TruckingVendor_id">
<span<?php echo $t101_jo_detail->TruckingVendor_id->viewAttributes() ?>>
<?php echo $t101_jo_detail->TruckingVendor_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_jo_detail->Driver_id->Visible) { // Driver_id ?>
	<tr id="r_Driver_id">
		<td class="<?php echo $t101_jo_detail_view->TableLeftColumnClass ?>"><span id="elh_t101_jo_detail_Driver_id"><?php echo $t101_jo_detail->Driver_id->caption() ?></span></td>
		<td data-name="Driver_id"<?php echo $t101_jo_detail->Driver_id->cellAttributes() ?>>
<span id="el_t101_jo_detail_Driver_id">
<span<?php echo $t101_jo_detail->Driver_id->viewAttributes() ?>>
<?php echo $t101_jo_detail->Driver_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_jo_detail->Tanggal_Stuffing->Visible) { // Tanggal_Stuffing ?>
	<tr id="r_Tanggal_Stuffing">
		<td class="<?php echo $t101_jo_detail_view->TableLeftColumnClass ?>"><span id="elh_t101_jo_detail_Tanggal_Stuffing"><?php echo $t101_jo_detail->Tanggal_Stuffing->caption() ?></span></td>
		<td data-name="Tanggal_Stuffing"<?php echo $t101_jo_detail->Tanggal_Stuffing->cellAttributes() ?>>
<span id="el_t101_jo_detail_Tanggal_Stuffing">
<span<?php echo $t101_jo_detail->Tanggal_Stuffing->viewAttributes() ?>>
<?php echo $t101_jo_detail->Tanggal_Stuffing->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_1->Visible) { // Nomor_Polisi_1 ?>
	<tr id="r_Nomor_Polisi_1">
		<td class="<?php echo $t101_jo_detail_view->TableLeftColumnClass ?>"><span id="elh_t101_jo_detail_Nomor_Polisi_1"><?php echo $t101_jo_detail->Nomor_Polisi_1->caption() ?></span></td>
		<td data-name="Nomor_Polisi_1"<?php echo $t101_jo_detail->Nomor_Polisi_1->cellAttributes() ?>>
<span id="el_t101_jo_detail_Nomor_Polisi_1">
<span<?php echo $t101_jo_detail->Nomor_Polisi_1->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Polisi_1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_2->Visible) { // Nomor_Polisi_2 ?>
	<tr id="r_Nomor_Polisi_2">
		<td class="<?php echo $t101_jo_detail_view->TableLeftColumnClass ?>"><span id="elh_t101_jo_detail_Nomor_Polisi_2"><?php echo $t101_jo_detail->Nomor_Polisi_2->caption() ?></span></td>
		<td data-name="Nomor_Polisi_2"<?php echo $t101_jo_detail->Nomor_Polisi_2->cellAttributes() ?>>
<span id="el_t101_jo_detail_Nomor_Polisi_2">
<span<?php echo $t101_jo_detail->Nomor_Polisi_2->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Polisi_2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_3->Visible) { // Nomor_Polisi_3 ?>
	<tr id="r_Nomor_Polisi_3">
		<td class="<?php echo $t101_jo_detail_view->TableLeftColumnClass ?>"><span id="elh_t101_jo_detail_Nomor_Polisi_3"><?php echo $t101_jo_detail->Nomor_Polisi_3->caption() ?></span></td>
		<td data-name="Nomor_Polisi_3"<?php echo $t101_jo_detail->Nomor_Polisi_3->cellAttributes() ?>>
<span id="el_t101_jo_detail_Nomor_Polisi_3">
<span<?php echo $t101_jo_detail->Nomor_Polisi_3->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Polisi_3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
	<tr id="r_Nomor_Container_1">
		<td class="<?php echo $t101_jo_detail_view->TableLeftColumnClass ?>"><span id="elh_t101_jo_detail_Nomor_Container_1"><?php echo $t101_jo_detail->Nomor_Container_1->caption() ?></span></td>
		<td data-name="Nomor_Container_1"<?php echo $t101_jo_detail->Nomor_Container_1->cellAttributes() ?>>
<span id="el_t101_jo_detail_Nomor_Container_1">
<span<?php echo $t101_jo_detail->Nomor_Container_1->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Container_1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
	<tr id="r_Nomor_Container_2">
		<td class="<?php echo $t101_jo_detail_view->TableLeftColumnClass ?>"><span id="elh_t101_jo_detail_Nomor_Container_2"><?php echo $t101_jo_detail->Nomor_Container_2->caption() ?></span></td>
		<td data-name="Nomor_Container_2"<?php echo $t101_jo_detail->Nomor_Container_2->cellAttributes() ?>>
<span id="el_t101_jo_detail_Nomor_Container_2">
<span<?php echo $t101_jo_detail->Nomor_Container_2->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Container_2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_jo_detail->Ref_JOHead_id->Visible) { // Ref_JOHead_id ?>
	<tr id="r_Ref_JOHead_id">
		<td class="<?php echo $t101_jo_detail_view->TableLeftColumnClass ?>"><span id="elh_t101_jo_detail_Ref_JOHead_id"><?php echo $t101_jo_detail->Ref_JOHead_id->caption() ?></span></td>
		<td data-name="Ref_JOHead_id"<?php echo $t101_jo_detail->Ref_JOHead_id->cellAttributes() ?>>
<span id="el_t101_jo_detail_Ref_JOHead_id">
<span<?php echo $t101_jo_detail->Ref_JOHead_id->viewAttributes() ?>>
<?php echo $t101_jo_detail->Ref_JOHead_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_jo_detail->No_Tagihan->Visible) { // No_Tagihan ?>
	<tr id="r_No_Tagihan">
		<td class="<?php echo $t101_jo_detail_view->TableLeftColumnClass ?>"><span id="elh_t101_jo_detail_No_Tagihan"><?php echo $t101_jo_detail->No_Tagihan->caption() ?></span></td>
		<td data-name="No_Tagihan"<?php echo $t101_jo_detail->No_Tagihan->cellAttributes() ?>>
<span id="el_t101_jo_detail_No_Tagihan">
<span<?php echo $t101_jo_detail->No_Tagihan->viewAttributes() ?>>
<?php echo $t101_jo_detail->No_Tagihan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_jo_detail->Jumlah_Tagihan->Visible) { // Jumlah_Tagihan ?>
	<tr id="r_Jumlah_Tagihan">
		<td class="<?php echo $t101_jo_detail_view->TableLeftColumnClass ?>"><span id="elh_t101_jo_detail_Jumlah_Tagihan"><?php echo $t101_jo_detail->Jumlah_Tagihan->caption() ?></span></td>
		<td data-name="Jumlah_Tagihan"<?php echo $t101_jo_detail->Jumlah_Tagihan->cellAttributes() ?>>
<span id="el_t101_jo_detail_Jumlah_Tagihan">
<span<?php echo $t101_jo_detail->Jumlah_Tagihan->viewAttributes() ?>>
<?php echo $t101_jo_detail->Jumlah_Tagihan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t101_jo_detail_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t101_jo_detail->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t101_jo_detail_view->terminate();
?>