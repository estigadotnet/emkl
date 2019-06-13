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
$t003_feeder_view = new t003_feeder_view();

// Run the page
$t003_feeder_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t003_feeder_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t003_feeder->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft003_feederview = currentForm = new ew.Form("ft003_feederview", "view");

// Form_CustomValidate event
ft003_feederview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft003_feederview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t003_feeder->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t003_feeder_view->ExportOptions->render("body") ?>
<?php $t003_feeder_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t003_feeder_view->showPageHeader(); ?>
<?php
$t003_feeder_view->showMessage();
?>
<form name="ft003_feederview" id="ft003_feederview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t003_feeder_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t003_feeder_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t003_feeder">
<input type="hidden" name="modal" value="<?php echo (int)$t003_feeder_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t003_feeder->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $t003_feeder_view->TableLeftColumnClass ?>"><span id="elh_t003_feeder_id"><?php echo $t003_feeder->id->caption() ?></span></td>
		<td data-name="id"<?php echo $t003_feeder->id->cellAttributes() ?>>
<span id="el_t003_feeder_id">
<span<?php echo $t003_feeder->id->viewAttributes() ?>>
<?php echo $t003_feeder->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t003_feeder->Nama->Visible) { // Nama ?>
	<tr id="r_Nama">
		<td class="<?php echo $t003_feeder_view->TableLeftColumnClass ?>"><span id="elh_t003_feeder_Nama"><?php echo $t003_feeder->Nama->caption() ?></span></td>
		<td data-name="Nama"<?php echo $t003_feeder->Nama->cellAttributes() ?>>
<span id="el_t003_feeder_Nama">
<span<?php echo $t003_feeder->Nama->viewAttributes() ?>>
<?php echo $t003_feeder->Nama->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t003_feeder_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t003_feeder->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t003_feeder_view->terminate();
?>