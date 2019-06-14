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
$t006_trucking_vendor_edit = new t006_trucking_vendor_edit();

// Run the page
$t006_trucking_vendor_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t006_trucking_vendor_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ft006_trucking_vendoredit = currentForm = new ew.Form("ft006_trucking_vendoredit", "edit");

// Validate form
ft006_trucking_vendoredit.validate = function() {
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
		<?php if ($t006_trucking_vendor_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_trucking_vendor->id->caption(), $t006_trucking_vendor->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t006_trucking_vendor_edit->Nama->Required) { ?>
			elm = this.getElements("x" + infix + "_Nama");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_trucking_vendor->Nama->caption(), $t006_trucking_vendor->Nama->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
ft006_trucking_vendoredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft006_trucking_vendoredit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t006_trucking_vendor_edit->showPageHeader(); ?>
<?php
$t006_trucking_vendor_edit->showMessage();
?>
<form name="ft006_trucking_vendoredit" id="ft006_trucking_vendoredit" class="<?php echo $t006_trucking_vendor_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t006_trucking_vendor_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t006_trucking_vendor_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t006_trucking_vendor">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t006_trucking_vendor_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t006_trucking_vendor->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_t006_trucking_vendor_id" class="<?php echo $t006_trucking_vendor_edit->LeftColumnClass ?>"><?php echo $t006_trucking_vendor->id->caption() ?><?php echo ($t006_trucking_vendor->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t006_trucking_vendor_edit->RightColumnClass ?>"><div<?php echo $t006_trucking_vendor->id->cellAttributes() ?>>
<span id="el_t006_trucking_vendor_id">
<span<?php echo $t006_trucking_vendor->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t006_trucking_vendor->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="t006_trucking_vendor" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t006_trucking_vendor->id->CurrentValue) ?>">
<?php echo $t006_trucking_vendor->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t006_trucking_vendor->Nama->Visible) { // Nama ?>
	<div id="r_Nama" class="form-group row">
		<label id="elh_t006_trucking_vendor_Nama" for="x_Nama" class="<?php echo $t006_trucking_vendor_edit->LeftColumnClass ?>"><?php echo $t006_trucking_vendor->Nama->caption() ?><?php echo ($t006_trucking_vendor->Nama->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t006_trucking_vendor_edit->RightColumnClass ?>"><div<?php echo $t006_trucking_vendor->Nama->cellAttributes() ?>>
<span id="el_t006_trucking_vendor_Nama">
<input type="text" data-table="t006_trucking_vendor" data-field="x_Nama" name="x_Nama" id="x_Nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t006_trucking_vendor->Nama->getPlaceHolder()) ?>" value="<?php echo $t006_trucking_vendor->Nama->EditValue ?>"<?php echo $t006_trucking_vendor->Nama->editAttributes() ?>>
</span>
<?php echo $t006_trucking_vendor->Nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("t005_driver", explode(",", $t006_trucking_vendor->getCurrentDetailTable())) && $t005_driver->DetailEdit) {
?>
<?php if ($t006_trucking_vendor->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("t005_driver", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t005_drivergrid.php" ?>
<?php } ?>
<?php if (!$t006_trucking_vendor_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t006_trucking_vendor_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t006_trucking_vendor_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t006_trucking_vendor_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t006_trucking_vendor_edit->terminate();
?>