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
$t001_shipper_view = new t001_shipper_view();

// Run the page
$t001_shipper_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_shipper_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t001_shipper->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft001_shipperview = currentForm = new ew.Form("ft001_shipperview", "view");

// Form_CustomValidate event
ft001_shipperview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft001_shipperview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t001_shipper->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t001_shipper_view->ExportOptions->render("body") ?>
<?php $t001_shipper_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t001_shipper_view->showPageHeader(); ?>
<?php
$t001_shipper_view->showMessage();
?>
<form name="ft001_shipperview" id="ft001_shipperview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t001_shipper_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t001_shipper_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_shipper">
<input type="hidden" name="modal" value="<?php echo (int)$t001_shipper_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t001_shipper->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $t001_shipper_view->TableLeftColumnClass ?>"><span id="elh_t001_shipper_id"><?php echo $t001_shipper->id->caption() ?></span></td>
		<td data-name="id"<?php echo $t001_shipper->id->cellAttributes() ?>>
<span id="el_t001_shipper_id">
<span<?php echo $t001_shipper->id->viewAttributes() ?>>
<?php echo $t001_shipper->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t001_shipper->Nama->Visible) { // Nama ?>
	<tr id="r_Nama">
		<td class="<?php echo $t001_shipper_view->TableLeftColumnClass ?>"><span id="elh_t001_shipper_Nama"><?php echo $t001_shipper->Nama->caption() ?></span></td>
		<td data-name="Nama"<?php echo $t001_shipper->Nama->cellAttributes() ?>>
<span id="el_t001_shipper_Nama">
<span<?php echo $t001_shipper->Nama->viewAttributes() ?>>
<?php echo $t001_shipper->Nama->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t001_shipper_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t001_shipper->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t001_shipper_view->terminate();
?>