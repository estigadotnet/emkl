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
$t006_trucking_vendor_view = new t006_trucking_vendor_view();

// Run the page
$t006_trucking_vendor_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t006_trucking_vendor_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t006_trucking_vendor->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft006_trucking_vendorview = currentForm = new ew.Form("ft006_trucking_vendorview", "view");

// Form_CustomValidate event
ft006_trucking_vendorview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft006_trucking_vendorview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t006_trucking_vendor->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t006_trucking_vendor_view->ExportOptions->render("body") ?>
<?php $t006_trucking_vendor_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t006_trucking_vendor_view->showPageHeader(); ?>
<?php
$t006_trucking_vendor_view->showMessage();
?>
<form name="ft006_trucking_vendorview" id="ft006_trucking_vendorview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t006_trucking_vendor_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t006_trucking_vendor_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t006_trucking_vendor">
<input type="hidden" name="modal" value="<?php echo (int)$t006_trucking_vendor_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t006_trucking_vendor->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $t006_trucking_vendor_view->TableLeftColumnClass ?>"><span id="elh_t006_trucking_vendor_id"><?php echo $t006_trucking_vendor->id->caption() ?></span></td>
		<td data-name="id"<?php echo $t006_trucking_vendor->id->cellAttributes() ?>>
<span id="el_t006_trucking_vendor_id">
<span<?php echo $t006_trucking_vendor->id->viewAttributes() ?>>
<?php echo $t006_trucking_vendor->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t006_trucking_vendor->Nama->Visible) { // Nama ?>
	<tr id="r_Nama">
		<td class="<?php echo $t006_trucking_vendor_view->TableLeftColumnClass ?>"><span id="elh_t006_trucking_vendor_Nama"><?php echo $t006_trucking_vendor->Nama->caption() ?></span></td>
		<td data-name="Nama"<?php echo $t006_trucking_vendor->Nama->cellAttributes() ?>>
<span id="el_t006_trucking_vendor_Nama">
<span<?php echo $t006_trucking_vendor->Nama->viewAttributes() ?>>
<?php echo $t006_trucking_vendor->Nama->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("t005_driver", explode(",", $t006_trucking_vendor->getCurrentDetailTable())) && $t005_driver->DetailView) {
?>
<?php if ($t006_trucking_vendor->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("t005_driver", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t005_drivergrid.php" ?>
<?php } ?>
</form>
<?php
$t006_trucking_vendor_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t006_trucking_vendor->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t006_trucking_vendor_view->terminate();
?>