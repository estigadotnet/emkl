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
$t102_jo_add = new t102_jo_add();

// Run the page
$t102_jo_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_jo_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ft102_joadd = currentForm = new ew.Form("ft102_joadd", "add");

// Validate form
ft102_joadd.validate = function() {
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
		<?php if ($t102_jo_add->Nomor_JO->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_JO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_jo->Nomor_JO->caption(), $t102_jo->Nomor_JO->RequiredErrorMessage)) ?>");
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
ft102_joadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft102_joadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t102_jo_add->showPageHeader(); ?>
<?php
$t102_jo_add->showMessage();
?>
<form name="ft102_joadd" id="ft102_joadd" class="<?php echo $t102_jo_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t102_jo_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t102_jo_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t102_jo">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t102_jo_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t102_jo->Nomor_JO->Visible) { // Nomor_JO ?>
	<div id="r_Nomor_JO" class="form-group row">
		<label id="elh_t102_jo_Nomor_JO" for="x_Nomor_JO" class="<?php echo $t102_jo_add->LeftColumnClass ?>"><?php echo $t102_jo->Nomor_JO->caption() ?><?php echo ($t102_jo->Nomor_JO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_jo_add->RightColumnClass ?>"><div<?php echo $t102_jo->Nomor_JO->cellAttributes() ?>>
<span id="el_t102_jo_Nomor_JO">
<input type="text" data-table="t102_jo" data-field="x_Nomor_JO" name="x_Nomor_JO" id="x_Nomor_JO" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t102_jo->Nomor_JO->getPlaceHolder()) ?>" value="<?php echo $t102_jo->Nomor_JO->EditValue ?>"<?php echo $t102_jo->Nomor_JO->editAttributes() ?>>
</span>
<?php echo $t102_jo->Nomor_JO->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t102_jo_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t102_jo_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t102_jo_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t102_jo_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t102_jo_add->terminate();
?>