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
$t102_jo_addopt = new t102_jo_addopt();

// Run the page
$t102_jo_addopt->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_jo_addopt->Page_Render();
?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "addopt";
var ft102_joaddopt = currentForm = new ew.Form("ft102_joaddopt", "addopt");

// Validate form
ft102_joaddopt.validate = function() {
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
		<?php if ($t102_jo_addopt->Nomor_JO->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor_JO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_jo->Nomor_JO->caption(), $t102_jo->Nomor_JO->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
ft102_joaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft102_joaddopt.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t102_jo_addopt->showPageHeader(); ?>
<?php
$t102_jo_addopt->showMessage();
?>
<form name="ft102_joaddopt" id="ft102_joaddopt" class="ew-form ew-horizontal" action="<?php echo API_URL ?>" method="post">
<?php //if ($t102_jo_addopt->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t102_jo_addopt->Token ?>">
<?php //} ?>
<input type="hidden" name="<?php echo API_ACTION_NAME ?>" id="<?php echo API_ACTION_NAME ?>" value="<?php echo API_ADD_ACTION ?>">
<input type="hidden" name="<?php echo API_OBJECT_NAME ?>" id="<?php echo API_OBJECT_NAME ?>" value="<?php echo $t102_jo_addopt->TableVar ?>">
<?php if ($t102_jo->Nomor_JO->Visible) { // Nomor_JO ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Nomor_JO"><?php echo $t102_jo->Nomor_JO->caption() ?><?php echo ($t102_jo->Nomor_JO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="t102_jo" data-field="x_Nomor_JO" name="x_Nomor_JO" id="x_Nomor_JO" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t102_jo->Nomor_JO->getPlaceHolder()) ?>" value="<?php echo $t102_jo->Nomor_JO->EditValue ?>"<?php echo $t102_jo->Nomor_JO->editAttributes() ?>>
<?php echo $t102_jo->Nomor_JO->CustomMsg ?></div>
	</div>
<?php } ?>
</form>
<?php
$t102_jo_addopt->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php
$t102_jo_addopt->terminate();
?>