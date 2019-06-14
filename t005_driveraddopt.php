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
$t005_driver_addopt = new t005_driver_addopt();

// Run the page
$t005_driver_addopt->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t005_driver_addopt->Page_Render();
?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "addopt";
var ft005_driveraddopt = currentForm = new ew.Form("ft005_driveraddopt", "addopt");

// Validate form
ft005_driveraddopt.validate = function() {
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
		<?php if ($t005_driver_addopt->TruckingVendor_id->Required) { ?>
			elm = this.getElements("x" + infix + "_TruckingVendor_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_driver->TruckingVendor_id->caption(), $t005_driver->TruckingVendor_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TruckingVendor_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t005_driver->TruckingVendor_id->errorMessage()) ?>");
		<?php if ($t005_driver_addopt->Nama->Required) { ?>
			elm = this.getElements("x" + infix + "_Nama");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_driver->Nama->caption(), $t005_driver->Nama->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t005_driver_addopt->No_HP_1->Required) { ?>
			elm = this.getElements("x" + infix + "_No_HP_1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_driver->No_HP_1->caption(), $t005_driver->No_HP_1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t005_driver_addopt->No_HP_2->Required) { ?>
			elm = this.getElements("x" + infix + "_No_HP_2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_driver->No_HP_2->caption(), $t005_driver->No_HP_2->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
ft005_driveraddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft005_driveraddopt.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t005_driver_addopt->showPageHeader(); ?>
<?php
$t005_driver_addopt->showMessage();
?>
<form name="ft005_driveraddopt" id="ft005_driveraddopt" class="ew-form ew-horizontal" action="<?php echo API_URL ?>" method="post">
<?php //if ($t005_driver_addopt->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t005_driver_addopt->Token ?>">
<?php //} ?>
<input type="hidden" name="<?php echo API_ACTION_NAME ?>" id="<?php echo API_ACTION_NAME ?>" value="<?php echo API_ADD_ACTION ?>">
<input type="hidden" name="<?php echo API_OBJECT_NAME ?>" id="<?php echo API_OBJECT_NAME ?>" value="<?php echo $t005_driver_addopt->TableVar ?>">
<?php if ($t005_driver->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TruckingVendor_id"><?php echo $t005_driver->TruckingVendor_id->caption() ?><?php echo ($t005_driver->TruckingVendor_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="t005_driver" data-field="x_TruckingVendor_id" name="x_TruckingVendor_id" id="x_TruckingVendor_id" size="30" placeholder="<?php echo HtmlEncode($t005_driver->TruckingVendor_id->getPlaceHolder()) ?>" value="<?php echo $t005_driver->TruckingVendor_id->EditValue ?>"<?php echo $t005_driver->TruckingVendor_id->editAttributes() ?>>
<?php echo $t005_driver->TruckingVendor_id->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($t005_driver->Nama->Visible) { // Nama ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Nama"><?php echo $t005_driver->Nama->caption() ?><?php echo ($t005_driver->Nama->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="t005_driver" data-field="x_Nama" name="x_Nama" id="x_Nama" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t005_driver->Nama->getPlaceHolder()) ?>" value="<?php echo $t005_driver->Nama->EditValue ?>"<?php echo $t005_driver->Nama->editAttributes() ?>>
<?php echo $t005_driver->Nama->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($t005_driver->No_HP_1->Visible) { // No_HP_1 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_No_HP_1"><?php echo $t005_driver->No_HP_1->caption() ?><?php echo ($t005_driver->No_HP_1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="t005_driver" data-field="x_No_HP_1" name="x_No_HP_1" id="x_No_HP_1" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t005_driver->No_HP_1->getPlaceHolder()) ?>" value="<?php echo $t005_driver->No_HP_1->EditValue ?>"<?php echo $t005_driver->No_HP_1->editAttributes() ?>>
<?php echo $t005_driver->No_HP_1->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($t005_driver->No_HP_2->Visible) { // No_HP_2 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_No_HP_2"><?php echo $t005_driver->No_HP_2->caption() ?><?php echo ($t005_driver->No_HP_2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="t005_driver" data-field="x_No_HP_2" name="x_No_HP_2" id="x_No_HP_2" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t005_driver->No_HP_2->getPlaceHolder()) ?>" value="<?php echo $t005_driver->No_HP_2->EditValue ?>"<?php echo $t005_driver->No_HP_2->editAttributes() ?>>
<?php echo $t005_driver->No_HP_2->CustomMsg ?></div>
	</div>
<?php } ?>
</form>
<?php
$t005_driver_addopt->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php
$t005_driver_addopt->terminate();
?>