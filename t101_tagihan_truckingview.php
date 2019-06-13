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
$t101_tagihan_trucking_view = new t101_tagihan_trucking_view();

// Run the page
$t101_tagihan_trucking_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_tagihan_trucking_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t101_tagihan_trucking->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft101_tagihan_truckingview = currentForm = new ew.Form("ft101_tagihan_truckingview", "view");

// Form_CustomValidate event
ft101_tagihan_truckingview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft101_tagihan_truckingview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft101_tagihan_truckingview.lists["x_JO_id"] = <?php echo $t101_tagihan_trucking_view->JO_id->Lookup->toClientList() ?>;
ft101_tagihan_truckingview.lists["x_JO_id"].options = <?php echo JsonEncode($t101_tagihan_trucking_view->JO_id->lookupOptions()) ?>;
ft101_tagihan_truckingview.lists["x_Shipper_id"] = <?php echo $t101_tagihan_trucking_view->Shipper_id->Lookup->toClientList() ?>;
ft101_tagihan_truckingview.lists["x_Shipper_id"].options = <?php echo JsonEncode($t101_tagihan_trucking_view->Shipper_id->lookupOptions()) ?>;
ft101_tagihan_truckingview.lists["x_Jenis_Container"] = <?php echo $t101_tagihan_trucking_view->Jenis_Container->Lookup->toClientList() ?>;
ft101_tagihan_truckingview.lists["x_Jenis_Container"].options = <?php echo JsonEncode($t101_tagihan_trucking_view->Jenis_Container->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t101_tagihan_trucking->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t101_tagihan_trucking_view->ExportOptions->render("body") ?>
<?php $t101_tagihan_trucking_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t101_tagihan_trucking_view->showPageHeader(); ?>
<?php
$t101_tagihan_trucking_view->showMessage();
?>
<form name="ft101_tagihan_truckingview" id="ft101_tagihan_truckingview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t101_tagihan_trucking_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t101_tagihan_trucking_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_tagihan_trucking">
<input type="hidden" name="modal" value="<?php echo (int)$t101_tagihan_trucking_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t101_tagihan_trucking->JO_id->Visible) { // JO_id ?>
	<tr id="r_JO_id">
		<td class="<?php echo $t101_tagihan_trucking_view->TableLeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_JO_id"><?php echo $t101_tagihan_trucking->JO_id->caption() ?></span></td>
		<td data-name="JO_id"<?php echo $t101_tagihan_trucking->JO_id->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_JO_id">
<span<?php echo $t101_tagihan_trucking->JO_id->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->JO_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Polisi_1->Visible) { // Nomor_Polisi_1 ?>
	<tr id="r_Nomor_Polisi_1">
		<td class="<?php echo $t101_tagihan_trucking_view->TableLeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Nomor_Polisi_1"><?php echo $t101_tagihan_trucking->Nomor_Polisi_1->caption() ?></span></td>
		<td data-name="Nomor_Polisi_1"<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Nomor_Polisi_1">
<span<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Nomor_Polisi_1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Polisi_2->Visible) { // Nomor_Polisi_2 ?>
	<tr id="r_Nomor_Polisi_2">
		<td class="<?php echo $t101_tagihan_trucking_view->TableLeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Nomor_Polisi_2"><?php echo $t101_tagihan_trucking->Nomor_Polisi_2->caption() ?></span></td>
		<td data-name="Nomor_Polisi_2"<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Nomor_Polisi_2">
<span<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Nomor_Polisi_2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Polisi_3->Visible) { // Nomor_Polisi_3 ?>
	<tr id="r_Nomor_Polisi_3">
		<td class="<?php echo $t101_tagihan_trucking_view->TableLeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Nomor_Polisi_3"><?php echo $t101_tagihan_trucking->Nomor_Polisi_3->caption() ?></span></td>
		<td data-name="Nomor_Polisi_3"<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Nomor_Polisi_3">
<span<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Nomor_Polisi_3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_tagihan_trucking->Tanggal->Visible) { // Tanggal ?>
	<tr id="r_Tanggal">
		<td class="<?php echo $t101_tagihan_trucking_view->TableLeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Tanggal"><?php echo $t101_tagihan_trucking->Tanggal->caption() ?></span></td>
		<td data-name="Tanggal"<?php echo $t101_tagihan_trucking->Tanggal->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Tanggal">
<span<?php echo $t101_tagihan_trucking->Tanggal->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Tanggal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_tagihan_trucking->Shipper_id->Visible) { // Shipper_id ?>
	<tr id="r_Shipper_id">
		<td class="<?php echo $t101_tagihan_trucking_view->TableLeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Shipper_id"><?php echo $t101_tagihan_trucking->Shipper_id->caption() ?></span></td>
		<td data-name="Shipper_id"<?php echo $t101_tagihan_trucking->Shipper_id->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Shipper_id">
<span<?php echo $t101_tagihan_trucking->Shipper_id->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Shipper_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_tagihan_trucking->Dari_Lokasi->Visible) { // Dari_Lokasi ?>
	<tr id="r_Dari_Lokasi">
		<td class="<?php echo $t101_tagihan_trucking_view->TableLeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Dari_Lokasi"><?php echo $t101_tagihan_trucking->Dari_Lokasi->caption() ?></span></td>
		<td data-name="Dari_Lokasi"<?php echo $t101_tagihan_trucking->Dari_Lokasi->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Dari_Lokasi">
<span<?php echo $t101_tagihan_trucking->Dari_Lokasi->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Dari_Lokasi->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_tagihan_trucking->Ke_Lokasi->Visible) { // Ke_Lokasi ?>
	<tr id="r_Ke_Lokasi">
		<td class="<?php echo $t101_tagihan_trucking_view->TableLeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Ke_Lokasi"><?php echo $t101_tagihan_trucking->Ke_Lokasi->caption() ?></span></td>
		<td data-name="Ke_Lokasi"<?php echo $t101_tagihan_trucking->Ke_Lokasi->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Ke_Lokasi">
<span<?php echo $t101_tagihan_trucking->Ke_Lokasi->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Ke_Lokasi->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_tagihan_trucking->Jenis_Container->Visible) { // Jenis_Container ?>
	<tr id="r_Jenis_Container">
		<td class="<?php echo $t101_tagihan_trucking_view->TableLeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Jenis_Container"><?php echo $t101_tagihan_trucking->Jenis_Container->caption() ?></span></td>
		<td data-name="Jenis_Container"<?php echo $t101_tagihan_trucking->Jenis_Container->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Jenis_Container">
<span<?php echo $t101_tagihan_trucking->Jenis_Container->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Jenis_Container->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
	<tr id="r_Nomor_Container_1">
		<td class="<?php echo $t101_tagihan_trucking_view->TableLeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Nomor_Container_1"><?php echo $t101_tagihan_trucking->Nomor_Container_1->caption() ?></span></td>
		<td data-name="Nomor_Container_1"<?php echo $t101_tagihan_trucking->Nomor_Container_1->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Nomor_Container_1">
<span<?php echo $t101_tagihan_trucking->Nomor_Container_1->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Nomor_Container_1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_tagihan_trucking->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
	<tr id="r_Nomor_Container_2">
		<td class="<?php echo $t101_tagihan_trucking_view->TableLeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Nomor_Container_2"><?php echo $t101_tagihan_trucking->Nomor_Container_2->caption() ?></span></td>
		<td data-name="Nomor_Container_2"<?php echo $t101_tagihan_trucking->Nomor_Container_2->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Nomor_Container_2">
<span<?php echo $t101_tagihan_trucking->Nomor_Container_2->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Nomor_Container_2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_tagihan_trucking->Keterangan->Visible) { // Keterangan ?>
	<tr id="r_Keterangan">
		<td class="<?php echo $t101_tagihan_trucking_view->TableLeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Keterangan"><?php echo $t101_tagihan_trucking->Keterangan->caption() ?></span></td>
		<td data-name="Keterangan"<?php echo $t101_tagihan_trucking->Keterangan->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Keterangan">
<span<?php echo $t101_tagihan_trucking->Keterangan->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Keterangan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_tagihan_trucking->Tagihan->Visible) { // Tagihan ?>
	<tr id="r_Tagihan">
		<td class="<?php echo $t101_tagihan_trucking_view->TableLeftColumnClass ?>"><span id="elh_t101_tagihan_trucking_Tagihan"><?php echo $t101_tagihan_trucking->Tagihan->caption() ?></span></td>
		<td data-name="Tagihan"<?php echo $t101_tagihan_trucking->Tagihan->cellAttributes() ?>>
<span id="el_t101_tagihan_trucking_Tagihan">
<span<?php echo $t101_tagihan_trucking->Tagihan->viewAttributes() ?>>
<?php echo $t101_tagihan_trucking->Tagihan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t101_tagihan_trucking_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t101_tagihan_trucking->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t101_tagihan_trucking_view->terminate();
?>