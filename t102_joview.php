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
$t102_jo_view = new t102_jo_view();

// Run the page
$t102_jo_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_jo_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t102_jo->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft102_joview = currentForm = new ew.Form("ft102_joview", "view");

// Form_CustomValidate event
ft102_joview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft102_joview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t102_jo->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t102_jo_view->ExportOptions->render("body") ?>
<?php $t102_jo_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t102_jo_view->showPageHeader(); ?>
<?php
$t102_jo_view->showMessage();
?>
<form name="ft102_joview" id="ft102_joview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t102_jo_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t102_jo_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t102_jo">
<input type="hidden" name="modal" value="<?php echo (int)$t102_jo_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t102_jo->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $t102_jo_view->TableLeftColumnClass ?>"><span id="elh_t102_jo_id"><?php echo $t102_jo->id->caption() ?></span></td>
		<td data-name="id"<?php echo $t102_jo->id->cellAttributes() ?>>
<span id="el_t102_jo_id">
<span<?php echo $t102_jo->id->viewAttributes() ?>>
<?php echo $t102_jo->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t102_jo->Nomor_JO->Visible) { // Nomor_JO ?>
	<tr id="r_Nomor_JO">
		<td class="<?php echo $t102_jo_view->TableLeftColumnClass ?>"><span id="elh_t102_jo_Nomor_JO"><?php echo $t102_jo->Nomor_JO->caption() ?></span></td>
		<td data-name="Nomor_JO"<?php echo $t102_jo->Nomor_JO->cellAttributes() ?>>
<span id="el_t102_jo_Nomor_JO">
<span<?php echo $t102_jo->Nomor_JO->viewAttributes() ?>>
<?php echo $t102_jo->Nomor_JO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t102_jo_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t102_jo->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t102_jo_view->terminate();
?>