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
$t004_liner_view = new t004_liner_view();

// Run the page
$t004_liner_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t004_liner_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t004_liner->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft004_linerview = currentForm = new ew.Form("ft004_linerview", "view");

// Form_CustomValidate event
ft004_linerview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft004_linerview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t004_liner->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t004_liner_view->ExportOptions->render("body") ?>
<?php $t004_liner_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t004_liner_view->showPageHeader(); ?>
<?php
$t004_liner_view->showMessage();
?>
<form name="ft004_linerview" id="ft004_linerview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t004_liner_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t004_liner_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t004_liner">
<input type="hidden" name="modal" value="<?php echo (int)$t004_liner_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t004_liner->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $t004_liner_view->TableLeftColumnClass ?>"><span id="elh_t004_liner_id"><?php echo $t004_liner->id->caption() ?></span></td>
		<td data-name="id"<?php echo $t004_liner->id->cellAttributes() ?>>
<span id="el_t004_liner_id">
<span<?php echo $t004_liner->id->viewAttributes() ?>>
<?php echo $t004_liner->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t004_liner->Nama->Visible) { // Nama ?>
	<tr id="r_Nama">
		<td class="<?php echo $t004_liner_view->TableLeftColumnClass ?>"><span id="elh_t004_liner_Nama"><?php echo $t004_liner->Nama->caption() ?></span></td>
		<td data-name="Nama"<?php echo $t004_liner->Nama->cellAttributes() ?>>
<span id="el_t004_liner_Nama">
<span<?php echo $t004_liner->Nama->viewAttributes() ?>>
<?php echo $t004_liner->Nama->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t004_liner_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t004_liner->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t004_liner_view->terminate();
?>