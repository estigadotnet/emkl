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
$t002_destination_view = new t002_destination_view();

// Run the page
$t002_destination_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_destination_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t002_destination->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft002_destinationview = currentForm = new ew.Form("ft002_destinationview", "view");

// Form_CustomValidate event
ft002_destinationview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft002_destinationview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t002_destination->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t002_destination_view->ExportOptions->render("body") ?>
<?php $t002_destination_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t002_destination_view->showPageHeader(); ?>
<?php
$t002_destination_view->showMessage();
?>
<form name="ft002_destinationview" id="ft002_destinationview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t002_destination_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t002_destination_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_destination">
<input type="hidden" name="modal" value="<?php echo (int)$t002_destination_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t002_destination->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $t002_destination_view->TableLeftColumnClass ?>"><span id="elh_t002_destination_id"><?php echo $t002_destination->id->caption() ?></span></td>
		<td data-name="id"<?php echo $t002_destination->id->cellAttributes() ?>>
<span id="el_t002_destination_id">
<span<?php echo $t002_destination->id->viewAttributes() ?>>
<?php echo $t002_destination->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t002_destination->Nama->Visible) { // Nama ?>
	<tr id="r_Nama">
		<td class="<?php echo $t002_destination_view->TableLeftColumnClass ?>"><span id="elh_t002_destination_Nama"><?php echo $t002_destination->Nama->caption() ?></span></td>
		<td data-name="Nama"<?php echo $t002_destination->Nama->cellAttributes() ?>>
<span id="el_t002_destination_Nama">
<span<?php echo $t002_destination->Nama->viewAttributes() ?>>
<?php echo $t002_destination->Nama->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t002_destination_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t002_destination->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t002_destination_view->terminate();
?>