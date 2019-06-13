<?php
namespace PHPMaker2019\emkl_prj;

/**
 * Page class
 */
class t103_trucking_add extends t103_trucking
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{D4B21A3D-A1C8-4ED3-BA65-212E10E691E7}";

	// Table name
	public $TableName = 't103_trucking';

	// Page object name
	public $PageObjName = "t103_trucking_add";

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken = CHECK_TOKEN;

	// Messages
	private $_message = "";
	private $_failureMessage = "";
	private $_successMessage = "";
	private $_warningMessage = "";

	// Page URL
	private $_pageUrl = "";

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading <> "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading <> "")
			return $this->Subheading;
		if ($this->TableName)
			return $Language->phrase($this->PageID);
		return "";
	}

	// Page name
	public function pageName()
	{
		return CurrentPageName();
	}

	// Page URL
	public function pageUrl()
	{
		if ($this->_pageUrl == "") {
			$this->_pageUrl = CurrentPageName() . "?";
			if ($this->UseTokenInUrl)
				$this->_pageUrl .= "t=" . $this->TableVar . "&"; // Add page token
		}
		return $this->_pageUrl;
	}

	// Get message
	public function getMessage()
	{
		return isset($_SESSION[SESSION_MESSAGE]) ? $_SESSION[SESSION_MESSAGE] : $this->_message;
	}

	// Set message
	public function setMessage($v)
	{
		AddMessage($this->_message, $v);
		$_SESSION[SESSION_MESSAGE] = $this->_message;
	}

	// Get failure message
	public function getFailureMessage()
	{
		return isset($_SESSION[SESSION_FAILURE_MESSAGE]) ? $_SESSION[SESSION_FAILURE_MESSAGE] : $this->_failureMessage;
	}

	// Set failure message
	public function setFailureMessage($v)
	{
		AddMessage($this->_failureMessage, $v);
		$_SESSION[SESSION_FAILURE_MESSAGE] = $this->_failureMessage;
	}

	// Get success message
	public function getSuccessMessage()
	{
		return isset($_SESSION[SESSION_SUCCESS_MESSAGE]) ? $_SESSION[SESSION_SUCCESS_MESSAGE] : $this->_successMessage;
	}

	// Set success message
	public function setSuccessMessage($v)
	{
		AddMessage($this->_successMessage, $v);
		$_SESSION[SESSION_SUCCESS_MESSAGE] = $this->_successMessage;
	}

	// Get warning message
	public function getWarningMessage()
	{
		return isset($_SESSION[SESSION_WARNING_MESSAGE]) ? $_SESSION[SESSION_WARNING_MESSAGE] : $this->_warningMessage;
	}

	// Set warning message
	public function setWarningMessage($v)
	{
		AddMessage($this->_warningMessage, $v);
		$_SESSION[SESSION_WARNING_MESSAGE] = $this->_warningMessage;
	}

	// Clear message
	public function clearMessage()
	{
		$this->_message = "";
		$_SESSION[SESSION_MESSAGE] = "";
	}

	// Clear failure message
	public function clearFailureMessage()
	{
		$this->_failureMessage = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}

	// Clear success message
	public function clearSuccessMessage()
	{
		$this->_successMessage = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}

	// Clear warning message
	public function clearWarningMessage()
	{
		$this->_warningMessage = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Clear messages
	public function clearMessages()
	{
		$this->clearMessage();
		$this->clearFailureMessage();
		$this->clearSuccessMessage();
		$this->clearWarningMessage();
	}

	// Show message
	public function showMessage()
	{
		$hidden = FALSE;
		$html = "";

		// Message
		$message = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($message, "");
		if ($message <> "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fa fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage <> "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fa fa-warning"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage <> "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fa fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage <> "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fa fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessages()
	{
		$ar = array();

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message <> "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage <> "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage <> "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage <> "") { // Message in Session, display
			$ar["failureMessage"] = $failureMessage;
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		return $ar;
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header <> "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer <> "") { // Footer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
		}
	}

	// Validate page request
	protected function isPageRequest()
	{
		global $CurrentForm;
		if ($this->UseTokenInUrl) {
			if ($CurrentForm)
				return ($this->TableVar == $CurrentForm->getValue("t"));
			if (Get("t") !== NULL)
				return ($this->TableVar == Get("t"));
		}
		return TRUE;
	}

	// Valid Post
	protected function validPost()
	{
		if (!$this->CheckToken || !IsPost() || IsApi())
			return TRUE;
		if (Post(TOKEN_NAME) === NULL)
			return FALSE;
		$fn = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
		if (is_callable($fn))
			return $fn(Post(TOKEN_NAME), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = PROJECT_NAMESPACE . CREATE_TOKEN_FUNC; // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $COMPOSITE_KEY_SEPARATOR;

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (t103_trucking)
		if (!isset($GLOBALS["t103_trucking"]) || get_class($GLOBALS["t103_trucking"]) == PROJECT_NAMESPACE . "t103_trucking") {
			$GLOBALS["t103_trucking"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["t103_trucking"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 't103_trucking');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = &$this->getConnection();
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $EXPORT, $t103_trucking;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($t103_trucking);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

		// Return for API
		if (IsApi()) {
			$res = $url === TRUE;
			if (!$res) // Show error
				WriteJson(array_merge(["success" => FALSE], $this->getMessages()));
			return;
		}

		// Go to URL if specified
		if ($url <> "") {
			if (!DEBUG_ENABLED && ob_get_length())
				ob_end_clean();

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = array("url" => $url, "modal" => "1");
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "t103_truckingview.php")
						$row["view"] = "1";
				} else { // List page should not be shown as modal => error
					$row["error"] = $this->getFailureMessage();
					$this->clearFailureMessage();
				}
				WriteJson($row);
			} else {
				SaveDebugMessage();
				AddHeader("Location", $url);
			}
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = array();
		if (is_object($rs)) { // Recordset
			while ($rs && !$rs->EOF) {
				$this->loadRowValues($rs); // Set up DbValue/CurrentValue
				$row = $this->getRecordFromArray($rs->fields);
				if ($current)
					return $row;
				else
					$rows[] = $row;
				$rs->moveNext();
			}
		} elseif (is_array($rs)) {
			foreach ($rs as $ar) {
				$row = $this->getRecordFromArray($ar);
				if ($current)
					return $row;
				else
					$rows[] = $row;
			}
		}
		return $rows;
	}

	// Get record from array
	protected function getRecordFromArray($ar)
	{
		$row = array();
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {

								//$url = FullUrl($fld->TableVar . "/" . API_FILE_ACTION . "/" . $fld->Param . "/" . rawurlencode($this->getRecordKeyValue($ar))); // URL rewrite format
								$url = FullUrl(GetPageName(API_URL) . "?" . API_OBJECT_NAME . "=" . $fld->TableVar . "&" . API_ACTION_NAME . "=" . API_FILE_ACTION . "&" . API_FIELD_NAME . "=" . $fld->Param . "&" . API_KEY_NAME . "=" . rawurlencode($this->getRecordKeyValue($ar))); // Query string format
								$row[$fldname] = ["mimeType" => ContentType($val), "url" => $url];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, MULTIPLE_UPLOAD_SEPARATOR)) { // Single file
								$row[$fldname] = ["mimeType" => MimeContentType($val), "url" => FullUrl($fld->hrefPath() . $val)];
							} else { // Multiple files
								$files = explode(MULTIPLE_UPLOAD_SEPARATOR, $val);
								$ar = [];
								foreach ($files as $file) {
									if (!EmptyValue($file))
										$ar[] = ["type" => MimeContentType($file), "url" => FullUrl($fld->hrefPath() . $file)];
								}
								$row[$fldname] = $ar;
							}
						}
					} else {
						$row[$fldname] = $val;
					}
				}
			}
		}
		return $row;
	}

	// Get record key value from array
	protected function getRecordKeyValue($ar)
	{
		global $COMPOSITE_KEY_SEPARATOR;
		$key = "";
		if (is_array($ar)) {
			$key .= @$ar['id'];
		}
		return $key;
	}

	/**
	 * Hide fields for add/edit
	 *
	 * @return void
	 */
	protected function hideFieldsForAddEdit()
	{
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->id->Visible = FALSE;
	}
	public $FormClassName = "ew-horizontal ew-form ew-add-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRec;
	public $Priv = 0;
	public $OldRecordset;
	public $CopyRecord;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Init Session data for API request if token found
		if (IsApi() && session_status() !== PHP_SESSION_ACTIVE) {
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Param(TOKEN_NAME) !== NULL && $func(Param(TOKEN_NAME), SessionTimeoutTime()))
				session_start();
		}

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->EI->setVisibility();
		$this->Shipper_id->setVisibility();
		$this->Party->setVisibility();
		$this->Jenis_Container->setVisibility();
		$this->Tgl_Stuffing->setVisibility();
		$this->Destination_id->setVisibility();
		$this->Feeder_id->setVisibility();
		$this->ETA_ETD->setVisibility();
		$this->Liner_id->setVisibility();
		$this->Remark->setVisibility();
		$this->TruckingVendor_id->setVisibility();
		$this->Driver_id->setVisibility();
		$this->No_Pol_1->setVisibility();
		$this->No_Pol_2->setVisibility();
		$this->No_Pol_3->setVisibility();
		$this->Nomor_Container_1->setVisibility();
		$this->Nomor_Container_2->setVisibility();
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			Write($Language->phrase("InvalidPostRequest"));
			$this->terminate();
		}

		// Create Token
		$this->createToken();

		// Set up lookup cache
		// Check modal

		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-add-form ew-horizontal";
		$postBack = FALSE;

		// Set up current action
		if (IsApi()) {
			$this->CurrentAction = "insert"; // Add record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get form action
			$postBack = TRUE;
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$this->setKey("id", $this->id->CurrentValue); // Set up key
			} else {
				$this->setKey("id", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$this->CurrentAction = "copy"; // Copy record
			} else {
				$this->CurrentAction = "show"; // Display blank record
			}
		}

		// Load old record / default values
		$loaded = $this->loadOldRecord();

		// Load form values
		if ($postBack) {
			$this->loadFormValues(); // Load form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues(); // Restore form values
				$this->setFailureMessage($FormError);
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = "show"; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "copy": // Copy an existing record
				if (!$loaded) { // Record not loaded
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("t103_truckinglist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "t103_truckinglist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "t103_truckingview.php")
						$returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
					if (IsApi()) { // Return to caller
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl);
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Add failed, restore form values
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render row based on row type
		$this->RowType = ROWTYPE_ADD; // Render add type

		// Render row
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->EI->CurrentValue = "Export";
		$this->Shipper_id->CurrentValue = NULL;
		$this->Shipper_id->OldValue = $this->Shipper_id->CurrentValue;
		$this->Party->CurrentValue = 1;
		$this->Jenis_Container->CurrentValue = "40";
		$this->Tgl_Stuffing->CurrentValue = NULL;
		$this->Tgl_Stuffing->OldValue = $this->Tgl_Stuffing->CurrentValue;
		$this->Destination_id->CurrentValue = NULL;
		$this->Destination_id->OldValue = $this->Destination_id->CurrentValue;
		$this->Feeder_id->CurrentValue = NULL;
		$this->Feeder_id->OldValue = $this->Feeder_id->CurrentValue;
		$this->ETA_ETD->CurrentValue = NULL;
		$this->ETA_ETD->OldValue = $this->ETA_ETD->CurrentValue;
		$this->Liner_id->CurrentValue = NULL;
		$this->Liner_id->OldValue = $this->Liner_id->CurrentValue;
		$this->Remark->CurrentValue = NULL;
		$this->Remark->OldValue = $this->Remark->CurrentValue;
		$this->TruckingVendor_id->CurrentValue = NULL;
		$this->TruckingVendor_id->OldValue = $this->TruckingVendor_id->CurrentValue;
		$this->Driver_id->CurrentValue = NULL;
		$this->Driver_id->OldValue = $this->Driver_id->CurrentValue;
		$this->No_Pol_1->CurrentValue = "L";
		$this->No_Pol_2->CurrentValue = NULL;
		$this->No_Pol_2->OldValue = $this->No_Pol_2->CurrentValue;
		$this->No_Pol_3->CurrentValue = "-";
		$this->Nomor_Container_1->CurrentValue = NULL;
		$this->Nomor_Container_1->OldValue = $this->Nomor_Container_1->CurrentValue;
		$this->Nomor_Container_2->CurrentValue = NULL;
		$this->Nomor_Container_2->OldValue = $this->Nomor_Container_2->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'EI' first before field var 'x_EI'
		$val = $CurrentForm->hasValue("EI") ? $CurrentForm->getValue("EI") : $CurrentForm->getValue("x_EI");
		if (!$this->EI->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EI->Visible = FALSE; // Disable update for API request
			else
				$this->EI->setFormValue($val);
		}

		// Check field name 'Shipper_id' first before field var 'x_Shipper_id'
		$val = $CurrentForm->hasValue("Shipper_id") ? $CurrentForm->getValue("Shipper_id") : $CurrentForm->getValue("x_Shipper_id");
		if (!$this->Shipper_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Shipper_id->Visible = FALSE; // Disable update for API request
			else
				$this->Shipper_id->setFormValue($val);
		}

		// Check field name 'Party' first before field var 'x_Party'
		$val = $CurrentForm->hasValue("Party") ? $CurrentForm->getValue("Party") : $CurrentForm->getValue("x_Party");
		if (!$this->Party->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Party->Visible = FALSE; // Disable update for API request
			else
				$this->Party->setFormValue($val);
		}

		// Check field name 'Jenis_Container' first before field var 'x_Jenis_Container'
		$val = $CurrentForm->hasValue("Jenis_Container") ? $CurrentForm->getValue("Jenis_Container") : $CurrentForm->getValue("x_Jenis_Container");
		if (!$this->Jenis_Container->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Jenis_Container->Visible = FALSE; // Disable update for API request
			else
				$this->Jenis_Container->setFormValue($val);
		}

		// Check field name 'Tgl_Stuffing' first before field var 'x_Tgl_Stuffing'
		$val = $CurrentForm->hasValue("Tgl_Stuffing") ? $CurrentForm->getValue("Tgl_Stuffing") : $CurrentForm->getValue("x_Tgl_Stuffing");
		if (!$this->Tgl_Stuffing->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Tgl_Stuffing->Visible = FALSE; // Disable update for API request
			else
				$this->Tgl_Stuffing->setFormValue($val);
			$this->Tgl_Stuffing->CurrentValue = UnFormatDateTime($this->Tgl_Stuffing->CurrentValue, 0);
		}

		// Check field name 'Destination_id' first before field var 'x_Destination_id'
		$val = $CurrentForm->hasValue("Destination_id") ? $CurrentForm->getValue("Destination_id") : $CurrentForm->getValue("x_Destination_id");
		if (!$this->Destination_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Destination_id->Visible = FALSE; // Disable update for API request
			else
				$this->Destination_id->setFormValue($val);
		}

		// Check field name 'Feeder_id' first before field var 'x_Feeder_id'
		$val = $CurrentForm->hasValue("Feeder_id") ? $CurrentForm->getValue("Feeder_id") : $CurrentForm->getValue("x_Feeder_id");
		if (!$this->Feeder_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Feeder_id->Visible = FALSE; // Disable update for API request
			else
				$this->Feeder_id->setFormValue($val);
		}

		// Check field name 'ETA_ETD' first before field var 'x_ETA_ETD'
		$val = $CurrentForm->hasValue("ETA_ETD") ? $CurrentForm->getValue("ETA_ETD") : $CurrentForm->getValue("x_ETA_ETD");
		if (!$this->ETA_ETD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ETA_ETD->Visible = FALSE; // Disable update for API request
			else
				$this->ETA_ETD->setFormValue($val);
			$this->ETA_ETD->CurrentValue = UnFormatDateTime($this->ETA_ETD->CurrentValue, 0);
		}

		// Check field name 'Liner_id' first before field var 'x_Liner_id'
		$val = $CurrentForm->hasValue("Liner_id") ? $CurrentForm->getValue("Liner_id") : $CurrentForm->getValue("x_Liner_id");
		if (!$this->Liner_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Liner_id->Visible = FALSE; // Disable update for API request
			else
				$this->Liner_id->setFormValue($val);
		}

		// Check field name 'Remark' first before field var 'x_Remark'
		$val = $CurrentForm->hasValue("Remark") ? $CurrentForm->getValue("Remark") : $CurrentForm->getValue("x_Remark");
		if (!$this->Remark->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Remark->Visible = FALSE; // Disable update for API request
			else
				$this->Remark->setFormValue($val);
		}

		// Check field name 'TruckingVendor_id' first before field var 'x_TruckingVendor_id'
		$val = $CurrentForm->hasValue("TruckingVendor_id") ? $CurrentForm->getValue("TruckingVendor_id") : $CurrentForm->getValue("x_TruckingVendor_id");
		if (!$this->TruckingVendor_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TruckingVendor_id->Visible = FALSE; // Disable update for API request
			else
				$this->TruckingVendor_id->setFormValue($val);
		}

		// Check field name 'Driver_id' first before field var 'x_Driver_id'
		$val = $CurrentForm->hasValue("Driver_id") ? $CurrentForm->getValue("Driver_id") : $CurrentForm->getValue("x_Driver_id");
		if (!$this->Driver_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Driver_id->Visible = FALSE; // Disable update for API request
			else
				$this->Driver_id->setFormValue($val);
		}

		// Check field name 'No_Pol_1' first before field var 'x_No_Pol_1'
		$val = $CurrentForm->hasValue("No_Pol_1") ? $CurrentForm->getValue("No_Pol_1") : $CurrentForm->getValue("x_No_Pol_1");
		if (!$this->No_Pol_1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->No_Pol_1->Visible = FALSE; // Disable update for API request
			else
				$this->No_Pol_1->setFormValue($val);
		}

		// Check field name 'No_Pol_2' first before field var 'x_No_Pol_2'
		$val = $CurrentForm->hasValue("No_Pol_2") ? $CurrentForm->getValue("No_Pol_2") : $CurrentForm->getValue("x_No_Pol_2");
		if (!$this->No_Pol_2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->No_Pol_2->Visible = FALSE; // Disable update for API request
			else
				$this->No_Pol_2->setFormValue($val);
		}

		// Check field name 'No_Pol_3' first before field var 'x_No_Pol_3'
		$val = $CurrentForm->hasValue("No_Pol_3") ? $CurrentForm->getValue("No_Pol_3") : $CurrentForm->getValue("x_No_Pol_3");
		if (!$this->No_Pol_3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->No_Pol_3->Visible = FALSE; // Disable update for API request
			else
				$this->No_Pol_3->setFormValue($val);
		}

		// Check field name 'Nomor_Container_1' first before field var 'x_Nomor_Container_1'
		$val = $CurrentForm->hasValue("Nomor_Container_1") ? $CurrentForm->getValue("Nomor_Container_1") : $CurrentForm->getValue("x_Nomor_Container_1");
		if (!$this->Nomor_Container_1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Nomor_Container_1->Visible = FALSE; // Disable update for API request
			else
				$this->Nomor_Container_1->setFormValue($val);
		}

		// Check field name 'Nomor_Container_2' first before field var 'x_Nomor_Container_2'
		$val = $CurrentForm->hasValue("Nomor_Container_2") ? $CurrentForm->getValue("Nomor_Container_2") : $CurrentForm->getValue("x_Nomor_Container_2");
		if (!$this->Nomor_Container_2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Nomor_Container_2->Visible = FALSE; // Disable update for API request
			else
				$this->Nomor_Container_2->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->EI->CurrentValue = $this->EI->FormValue;
		$this->Shipper_id->CurrentValue = $this->Shipper_id->FormValue;
		$this->Party->CurrentValue = $this->Party->FormValue;
		$this->Jenis_Container->CurrentValue = $this->Jenis_Container->FormValue;
		$this->Tgl_Stuffing->CurrentValue = $this->Tgl_Stuffing->FormValue;
		$this->Tgl_Stuffing->CurrentValue = UnFormatDateTime($this->Tgl_Stuffing->CurrentValue, 0);
		$this->Destination_id->CurrentValue = $this->Destination_id->FormValue;
		$this->Feeder_id->CurrentValue = $this->Feeder_id->FormValue;
		$this->ETA_ETD->CurrentValue = $this->ETA_ETD->FormValue;
		$this->ETA_ETD->CurrentValue = UnFormatDateTime($this->ETA_ETD->CurrentValue, 0);
		$this->Liner_id->CurrentValue = $this->Liner_id->FormValue;
		$this->Remark->CurrentValue = $this->Remark->FormValue;
		$this->TruckingVendor_id->CurrentValue = $this->TruckingVendor_id->FormValue;
		$this->Driver_id->CurrentValue = $this->Driver_id->FormValue;
		$this->No_Pol_1->CurrentValue = $this->No_Pol_1->FormValue;
		$this->No_Pol_2->CurrentValue = $this->No_Pol_2->FormValue;
		$this->No_Pol_3->CurrentValue = $this->No_Pol_3->FormValue;
		$this->Nomor_Container_1->CurrentValue = $this->Nomor_Container_1->FormValue;
		$this->Nomor_Container_2->CurrentValue = $this->Nomor_Container_2->FormValue;
	}

	// Load row based on key values
	public function loadRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();

		// Call Row Selecting event
		$this->Row_Selecting($filter);

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$res = FALSE;
		$rs = LoadRecordset($sql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->loadRowValues($rs); // Load row values
			$rs->close();
		}
		return $res;
	}

	// Load row values from recordset
	public function loadRowValues($rs = NULL)
	{
		if ($rs && !$rs->EOF)
			$row = $rs->fields;
		else
			$row = $this->newRow();

		// Call Row Selected event
		$this->Row_Selected($row);
		if (!$rs || $rs->EOF)
			return;
		$this->id->setDbValue($row['id']);
		$this->EI->setDbValue($row['EI']);
		$this->Shipper_id->setDbValue($row['Shipper_id']);
		$this->Party->setDbValue($row['Party']);
		$this->Jenis_Container->setDbValue($row['Jenis_Container']);
		$this->Tgl_Stuffing->setDbValue($row['Tgl_Stuffing']);
		$this->Destination_id->setDbValue($row['Destination_id']);
		$this->Feeder_id->setDbValue($row['Feeder_id']);
		$this->ETA_ETD->setDbValue($row['ETA_ETD']);
		$this->Liner_id->setDbValue($row['Liner_id']);
		$this->Remark->setDbValue($row['Remark']);
		$this->TruckingVendor_id->setDbValue($row['TruckingVendor_id']);
		$this->Driver_id->setDbValue($row['Driver_id']);
		$this->No_Pol_1->setDbValue($row['No_Pol_1']);
		$this->No_Pol_2->setDbValue($row['No_Pol_2']);
		$this->No_Pol_3->setDbValue($row['No_Pol_3']);
		$this->Nomor_Container_1->setDbValue($row['Nomor_Container_1']);
		$this->Nomor_Container_2->setDbValue($row['Nomor_Container_2']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['EI'] = $this->EI->CurrentValue;
		$row['Shipper_id'] = $this->Shipper_id->CurrentValue;
		$row['Party'] = $this->Party->CurrentValue;
		$row['Jenis_Container'] = $this->Jenis_Container->CurrentValue;
		$row['Tgl_Stuffing'] = $this->Tgl_Stuffing->CurrentValue;
		$row['Destination_id'] = $this->Destination_id->CurrentValue;
		$row['Feeder_id'] = $this->Feeder_id->CurrentValue;
		$row['ETA_ETD'] = $this->ETA_ETD->CurrentValue;
		$row['Liner_id'] = $this->Liner_id->CurrentValue;
		$row['Remark'] = $this->Remark->CurrentValue;
		$row['TruckingVendor_id'] = $this->TruckingVendor_id->CurrentValue;
		$row['Driver_id'] = $this->Driver_id->CurrentValue;
		$row['No_Pol_1'] = $this->No_Pol_1->CurrentValue;
		$row['No_Pol_2'] = $this->No_Pol_2->CurrentValue;
		$row['No_Pol_3'] = $this->No_Pol_3->CurrentValue;
		$row['Nomor_Container_1'] = $this->Nomor_Container_1->CurrentValue;
		$row['Nomor_Container_2'] = $this->Nomor_Container_2->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id")) <> "")
			$this->id->CurrentValue = $this->getKey("id"); // id
		else
			$validKey = FALSE;

		// Load old record
		$this->OldRecordset = NULL;
		if ($validKey) {
			$this->CurrentFilter = $this->getRecordFilter();
			$sql = $this->getCurrentSql();
			$conn = &$this->getConnection();
			$this->OldRecordset = LoadRecordset($sql, $conn);
		}
		$this->loadRowValues($this->OldRecordset); // Load row values
		return $validKey;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// EI
		// Shipper_id
		// Party
		// Jenis_Container
		// Tgl_Stuffing
		// Destination_id
		// Feeder_id
		// ETA_ETD
		// Liner_id
		// Remark
		// TruckingVendor_id
		// Driver_id
		// No_Pol_1
		// No_Pol_2
		// No_Pol_3
		// Nomor_Container_1
		// Nomor_Container_2

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// EI
			if (strval($this->EI->CurrentValue) <> "") {
				$this->EI->ViewValue = $this->EI->optionCaption($this->EI->CurrentValue);
			} else {
				$this->EI->ViewValue = NULL;
			}
			$this->EI->ViewCustomAttributes = "";

			// Shipper_id
			$this->Shipper_id->ViewValue = $this->Shipper_id->CurrentValue;
			$this->Shipper_id->ViewValue = FormatNumber($this->Shipper_id->ViewValue, 0, -2, -2, -2);
			$this->Shipper_id->ViewCustomAttributes = "";

			// Party
			$this->Party->ViewValue = $this->Party->CurrentValue;
			$this->Party->ViewValue = FormatNumber($this->Party->ViewValue, 0, -2, -2, -2);
			$this->Party->ViewCustomAttributes = "";

			// Jenis_Container
			if (strval($this->Jenis_Container->CurrentValue) <> "") {
				$this->Jenis_Container->ViewValue = $this->Jenis_Container->optionCaption($this->Jenis_Container->CurrentValue);
			} else {
				$this->Jenis_Container->ViewValue = NULL;
			}
			$this->Jenis_Container->ViewCustomAttributes = "";

			// Tgl_Stuffing
			$this->Tgl_Stuffing->ViewValue = $this->Tgl_Stuffing->CurrentValue;
			$this->Tgl_Stuffing->ViewValue = FormatDateTime($this->Tgl_Stuffing->ViewValue, 0);
			$this->Tgl_Stuffing->ViewCustomAttributes = "";

			// Destination_id
			$this->Destination_id->ViewValue = $this->Destination_id->CurrentValue;
			$this->Destination_id->ViewValue = FormatNumber($this->Destination_id->ViewValue, 0, -2, -2, -2);
			$this->Destination_id->ViewCustomAttributes = "";

			// Feeder_id
			$this->Feeder_id->ViewValue = $this->Feeder_id->CurrentValue;
			$this->Feeder_id->ViewValue = FormatNumber($this->Feeder_id->ViewValue, 0, -2, -2, -2);
			$this->Feeder_id->ViewCustomAttributes = "";

			// ETA_ETD
			$this->ETA_ETD->ViewValue = $this->ETA_ETD->CurrentValue;
			$this->ETA_ETD->ViewValue = FormatDateTime($this->ETA_ETD->ViewValue, 0);
			$this->ETA_ETD->ViewCustomAttributes = "";

			// Liner_id
			$this->Liner_id->ViewValue = $this->Liner_id->CurrentValue;
			$this->Liner_id->ViewValue = FormatNumber($this->Liner_id->ViewValue, 0, -2, -2, -2);
			$this->Liner_id->ViewCustomAttributes = "";

			// Remark
			$this->Remark->ViewValue = $this->Remark->CurrentValue;
			$this->Remark->ViewCustomAttributes = "";

			// TruckingVendor_id
			$this->TruckingVendor_id->ViewValue = $this->TruckingVendor_id->CurrentValue;
			$this->TruckingVendor_id->ViewValue = FormatNumber($this->TruckingVendor_id->ViewValue, 0, -2, -2, -2);
			$this->TruckingVendor_id->ViewCustomAttributes = "";

			// Driver_id
			$this->Driver_id->ViewValue = $this->Driver_id->CurrentValue;
			$this->Driver_id->ViewValue = FormatNumber($this->Driver_id->ViewValue, 0, -2, -2, -2);
			$this->Driver_id->ViewCustomAttributes = "";

			// No_Pol_1
			$this->No_Pol_1->ViewValue = $this->No_Pol_1->CurrentValue;
			$this->No_Pol_1->ViewCustomAttributes = "";

			// No_Pol_2
			$this->No_Pol_2->ViewValue = $this->No_Pol_2->CurrentValue;
			$this->No_Pol_2->ViewCustomAttributes = "";

			// No_Pol_3
			$this->No_Pol_3->ViewValue = $this->No_Pol_3->CurrentValue;
			$this->No_Pol_3->ViewCustomAttributes = "";

			// Nomor_Container_1
			$this->Nomor_Container_1->ViewValue = $this->Nomor_Container_1->CurrentValue;
			$this->Nomor_Container_1->ViewCustomAttributes = "";

			// Nomor_Container_2
			$this->Nomor_Container_2->ViewValue = $this->Nomor_Container_2->CurrentValue;
			$this->Nomor_Container_2->ViewCustomAttributes = "";

			// EI
			$this->EI->LinkCustomAttributes = "";
			$this->EI->HrefValue = "";
			$this->EI->TooltipValue = "";

			// Shipper_id
			$this->Shipper_id->LinkCustomAttributes = "";
			$this->Shipper_id->HrefValue = "";
			$this->Shipper_id->TooltipValue = "";

			// Party
			$this->Party->LinkCustomAttributes = "";
			$this->Party->HrefValue = "";
			$this->Party->TooltipValue = "";

			// Jenis_Container
			$this->Jenis_Container->LinkCustomAttributes = "";
			$this->Jenis_Container->HrefValue = "";
			$this->Jenis_Container->TooltipValue = "";

			// Tgl_Stuffing
			$this->Tgl_Stuffing->LinkCustomAttributes = "";
			$this->Tgl_Stuffing->HrefValue = "";
			$this->Tgl_Stuffing->TooltipValue = "";

			// Destination_id
			$this->Destination_id->LinkCustomAttributes = "";
			$this->Destination_id->HrefValue = "";
			$this->Destination_id->TooltipValue = "";

			// Feeder_id
			$this->Feeder_id->LinkCustomAttributes = "";
			$this->Feeder_id->HrefValue = "";
			$this->Feeder_id->TooltipValue = "";

			// ETA_ETD
			$this->ETA_ETD->LinkCustomAttributes = "";
			$this->ETA_ETD->HrefValue = "";
			$this->ETA_ETD->TooltipValue = "";

			// Liner_id
			$this->Liner_id->LinkCustomAttributes = "";
			$this->Liner_id->HrefValue = "";
			$this->Liner_id->TooltipValue = "";

			// Remark
			$this->Remark->LinkCustomAttributes = "";
			$this->Remark->HrefValue = "";
			$this->Remark->TooltipValue = "";

			// TruckingVendor_id
			$this->TruckingVendor_id->LinkCustomAttributes = "";
			$this->TruckingVendor_id->HrefValue = "";
			$this->TruckingVendor_id->TooltipValue = "";

			// Driver_id
			$this->Driver_id->LinkCustomAttributes = "";
			$this->Driver_id->HrefValue = "";
			$this->Driver_id->TooltipValue = "";

			// No_Pol_1
			$this->No_Pol_1->LinkCustomAttributes = "";
			$this->No_Pol_1->HrefValue = "";
			$this->No_Pol_1->TooltipValue = "";

			// No_Pol_2
			$this->No_Pol_2->LinkCustomAttributes = "";
			$this->No_Pol_2->HrefValue = "";
			$this->No_Pol_2->TooltipValue = "";

			// No_Pol_3
			$this->No_Pol_3->LinkCustomAttributes = "";
			$this->No_Pol_3->HrefValue = "";
			$this->No_Pol_3->TooltipValue = "";

			// Nomor_Container_1
			$this->Nomor_Container_1->LinkCustomAttributes = "";
			$this->Nomor_Container_1->HrefValue = "";
			$this->Nomor_Container_1->TooltipValue = "";

			// Nomor_Container_2
			$this->Nomor_Container_2->LinkCustomAttributes = "";
			$this->Nomor_Container_2->HrefValue = "";
			$this->Nomor_Container_2->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// EI
			$this->EI->EditCustomAttributes = "";
			$this->EI->EditValue = $this->EI->options(FALSE);

			// Shipper_id
			$this->Shipper_id->EditAttrs["class"] = "form-control";
			$this->Shipper_id->EditCustomAttributes = "";
			$this->Shipper_id->EditValue = HtmlEncode($this->Shipper_id->CurrentValue);
			$this->Shipper_id->PlaceHolder = RemoveHtml($this->Shipper_id->caption());

			// Party
			$this->Party->EditAttrs["class"] = "form-control";
			$this->Party->EditCustomAttributes = "";
			$this->Party->EditValue = HtmlEncode($this->Party->CurrentValue);
			$this->Party->PlaceHolder = RemoveHtml($this->Party->caption());

			// Jenis_Container
			$this->Jenis_Container->EditCustomAttributes = "";
			$this->Jenis_Container->EditValue = $this->Jenis_Container->options(FALSE);

			// Tgl_Stuffing
			$this->Tgl_Stuffing->EditAttrs["class"] = "form-control";
			$this->Tgl_Stuffing->EditCustomAttributes = "";
			$this->Tgl_Stuffing->EditValue = HtmlEncode(FormatDateTime($this->Tgl_Stuffing->CurrentValue, 8));
			$this->Tgl_Stuffing->PlaceHolder = RemoveHtml($this->Tgl_Stuffing->caption());

			// Destination_id
			$this->Destination_id->EditAttrs["class"] = "form-control";
			$this->Destination_id->EditCustomAttributes = "";
			$this->Destination_id->EditValue = HtmlEncode($this->Destination_id->CurrentValue);
			$this->Destination_id->PlaceHolder = RemoveHtml($this->Destination_id->caption());

			// Feeder_id
			$this->Feeder_id->EditAttrs["class"] = "form-control";
			$this->Feeder_id->EditCustomAttributes = "";
			$this->Feeder_id->EditValue = HtmlEncode($this->Feeder_id->CurrentValue);
			$this->Feeder_id->PlaceHolder = RemoveHtml($this->Feeder_id->caption());

			// ETA_ETD
			$this->ETA_ETD->EditAttrs["class"] = "form-control";
			$this->ETA_ETD->EditCustomAttributes = "";
			$this->ETA_ETD->EditValue = HtmlEncode(FormatDateTime($this->ETA_ETD->CurrentValue, 8));
			$this->ETA_ETD->PlaceHolder = RemoveHtml($this->ETA_ETD->caption());

			// Liner_id
			$this->Liner_id->EditAttrs["class"] = "form-control";
			$this->Liner_id->EditCustomAttributes = "";
			$this->Liner_id->EditValue = HtmlEncode($this->Liner_id->CurrentValue);
			$this->Liner_id->PlaceHolder = RemoveHtml($this->Liner_id->caption());

			// Remark
			$this->Remark->EditAttrs["class"] = "form-control";
			$this->Remark->EditCustomAttributes = "";
			$this->Remark->EditValue = HtmlEncode($this->Remark->CurrentValue);
			$this->Remark->PlaceHolder = RemoveHtml($this->Remark->caption());

			// TruckingVendor_id
			$this->TruckingVendor_id->EditAttrs["class"] = "form-control";
			$this->TruckingVendor_id->EditCustomAttributes = "";
			$this->TruckingVendor_id->EditValue = HtmlEncode($this->TruckingVendor_id->CurrentValue);
			$this->TruckingVendor_id->PlaceHolder = RemoveHtml($this->TruckingVendor_id->caption());

			// Driver_id
			$this->Driver_id->EditAttrs["class"] = "form-control";
			$this->Driver_id->EditCustomAttributes = "";
			$this->Driver_id->EditValue = HtmlEncode($this->Driver_id->CurrentValue);
			$this->Driver_id->PlaceHolder = RemoveHtml($this->Driver_id->caption());

			// No_Pol_1
			$this->No_Pol_1->EditAttrs["class"] = "form-control";
			$this->No_Pol_1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->No_Pol_1->CurrentValue = HtmlDecode($this->No_Pol_1->CurrentValue);
			$this->No_Pol_1->EditValue = HtmlEncode($this->No_Pol_1->CurrentValue);
			$this->No_Pol_1->PlaceHolder = RemoveHtml($this->No_Pol_1->caption());

			// No_Pol_2
			$this->No_Pol_2->EditAttrs["class"] = "form-control";
			$this->No_Pol_2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->No_Pol_2->CurrentValue = HtmlDecode($this->No_Pol_2->CurrentValue);
			$this->No_Pol_2->EditValue = HtmlEncode($this->No_Pol_2->CurrentValue);
			$this->No_Pol_2->PlaceHolder = RemoveHtml($this->No_Pol_2->caption());

			// No_Pol_3
			$this->No_Pol_3->EditAttrs["class"] = "form-control";
			$this->No_Pol_3->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->No_Pol_3->CurrentValue = HtmlDecode($this->No_Pol_3->CurrentValue);
			$this->No_Pol_3->EditValue = HtmlEncode($this->No_Pol_3->CurrentValue);
			$this->No_Pol_3->PlaceHolder = RemoveHtml($this->No_Pol_3->caption());

			// Nomor_Container_1
			$this->Nomor_Container_1->EditAttrs["class"] = "form-control";
			$this->Nomor_Container_1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Nomor_Container_1->CurrentValue = HtmlDecode($this->Nomor_Container_1->CurrentValue);
			$this->Nomor_Container_1->EditValue = HtmlEncode($this->Nomor_Container_1->CurrentValue);
			$this->Nomor_Container_1->PlaceHolder = RemoveHtml($this->Nomor_Container_1->caption());

			// Nomor_Container_2
			$this->Nomor_Container_2->EditAttrs["class"] = "form-control";
			$this->Nomor_Container_2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Nomor_Container_2->CurrentValue = HtmlDecode($this->Nomor_Container_2->CurrentValue);
			$this->Nomor_Container_2->EditValue = HtmlEncode($this->Nomor_Container_2->CurrentValue);
			$this->Nomor_Container_2->PlaceHolder = RemoveHtml($this->Nomor_Container_2->caption());

			// Add refer script
			// EI

			$this->EI->LinkCustomAttributes = "";
			$this->EI->HrefValue = "";

			// Shipper_id
			$this->Shipper_id->LinkCustomAttributes = "";
			$this->Shipper_id->HrefValue = "";

			// Party
			$this->Party->LinkCustomAttributes = "";
			$this->Party->HrefValue = "";

			// Jenis_Container
			$this->Jenis_Container->LinkCustomAttributes = "";
			$this->Jenis_Container->HrefValue = "";

			// Tgl_Stuffing
			$this->Tgl_Stuffing->LinkCustomAttributes = "";
			$this->Tgl_Stuffing->HrefValue = "";

			// Destination_id
			$this->Destination_id->LinkCustomAttributes = "";
			$this->Destination_id->HrefValue = "";

			// Feeder_id
			$this->Feeder_id->LinkCustomAttributes = "";
			$this->Feeder_id->HrefValue = "";

			// ETA_ETD
			$this->ETA_ETD->LinkCustomAttributes = "";
			$this->ETA_ETD->HrefValue = "";

			// Liner_id
			$this->Liner_id->LinkCustomAttributes = "";
			$this->Liner_id->HrefValue = "";

			// Remark
			$this->Remark->LinkCustomAttributes = "";
			$this->Remark->HrefValue = "";

			// TruckingVendor_id
			$this->TruckingVendor_id->LinkCustomAttributes = "";
			$this->TruckingVendor_id->HrefValue = "";

			// Driver_id
			$this->Driver_id->LinkCustomAttributes = "";
			$this->Driver_id->HrefValue = "";

			// No_Pol_1
			$this->No_Pol_1->LinkCustomAttributes = "";
			$this->No_Pol_1->HrefValue = "";

			// No_Pol_2
			$this->No_Pol_2->LinkCustomAttributes = "";
			$this->No_Pol_2->HrefValue = "";

			// No_Pol_3
			$this->No_Pol_3->LinkCustomAttributes = "";
			$this->No_Pol_3->HrefValue = "";

			// Nomor_Container_1
			$this->Nomor_Container_1->LinkCustomAttributes = "";
			$this->Nomor_Container_1->HrefValue = "";

			// Nomor_Container_2
			$this->Nomor_Container_2->LinkCustomAttributes = "";
			$this->Nomor_Container_2->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->EI->Required) {
			if ($this->EI->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EI->caption(), $this->EI->RequiredErrorMessage));
			}
		}
		if ($this->Shipper_id->Required) {
			if (!$this->Shipper_id->IsDetailKey && $this->Shipper_id->FormValue != NULL && $this->Shipper_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Shipper_id->caption(), $this->Shipper_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Shipper_id->FormValue)) {
			AddMessage($FormError, $this->Shipper_id->errorMessage());
		}
		if ($this->Party->Required) {
			if (!$this->Party->IsDetailKey && $this->Party->FormValue != NULL && $this->Party->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Party->caption(), $this->Party->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Party->FormValue)) {
			AddMessage($FormError, $this->Party->errorMessage());
		}
		if ($this->Jenis_Container->Required) {
			if ($this->Jenis_Container->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Jenis_Container->caption(), $this->Jenis_Container->RequiredErrorMessage));
			}
		}
		if ($this->Tgl_Stuffing->Required) {
			if (!$this->Tgl_Stuffing->IsDetailKey && $this->Tgl_Stuffing->FormValue != NULL && $this->Tgl_Stuffing->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Tgl_Stuffing->caption(), $this->Tgl_Stuffing->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->Tgl_Stuffing->FormValue)) {
			AddMessage($FormError, $this->Tgl_Stuffing->errorMessage());
		}
		if ($this->Destination_id->Required) {
			if (!$this->Destination_id->IsDetailKey && $this->Destination_id->FormValue != NULL && $this->Destination_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Destination_id->caption(), $this->Destination_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Destination_id->FormValue)) {
			AddMessage($FormError, $this->Destination_id->errorMessage());
		}
		if ($this->Feeder_id->Required) {
			if (!$this->Feeder_id->IsDetailKey && $this->Feeder_id->FormValue != NULL && $this->Feeder_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Feeder_id->caption(), $this->Feeder_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Feeder_id->FormValue)) {
			AddMessage($FormError, $this->Feeder_id->errorMessage());
		}
		if ($this->ETA_ETD->Required) {
			if (!$this->ETA_ETD->IsDetailKey && $this->ETA_ETD->FormValue != NULL && $this->ETA_ETD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ETA_ETD->caption(), $this->ETA_ETD->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ETA_ETD->FormValue)) {
			AddMessage($FormError, $this->ETA_ETD->errorMessage());
		}
		if ($this->Liner_id->Required) {
			if (!$this->Liner_id->IsDetailKey && $this->Liner_id->FormValue != NULL && $this->Liner_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Liner_id->caption(), $this->Liner_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Liner_id->FormValue)) {
			AddMessage($FormError, $this->Liner_id->errorMessage());
		}
		if ($this->Remark->Required) {
			if (!$this->Remark->IsDetailKey && $this->Remark->FormValue != NULL && $this->Remark->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Remark->caption(), $this->Remark->RequiredErrorMessage));
			}
		}
		if ($this->TruckingVendor_id->Required) {
			if (!$this->TruckingVendor_id->IsDetailKey && $this->TruckingVendor_id->FormValue != NULL && $this->TruckingVendor_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TruckingVendor_id->caption(), $this->TruckingVendor_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->TruckingVendor_id->FormValue)) {
			AddMessage($FormError, $this->TruckingVendor_id->errorMessage());
		}
		if ($this->Driver_id->Required) {
			if (!$this->Driver_id->IsDetailKey && $this->Driver_id->FormValue != NULL && $this->Driver_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Driver_id->caption(), $this->Driver_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Driver_id->FormValue)) {
			AddMessage($FormError, $this->Driver_id->errorMessage());
		}
		if ($this->No_Pol_1->Required) {
			if (!$this->No_Pol_1->IsDetailKey && $this->No_Pol_1->FormValue != NULL && $this->No_Pol_1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->No_Pol_1->caption(), $this->No_Pol_1->RequiredErrorMessage));
			}
		}
		if ($this->No_Pol_2->Required) {
			if (!$this->No_Pol_2->IsDetailKey && $this->No_Pol_2->FormValue != NULL && $this->No_Pol_2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->No_Pol_2->caption(), $this->No_Pol_2->RequiredErrorMessage));
			}
		}
		if ($this->No_Pol_3->Required) {
			if (!$this->No_Pol_3->IsDetailKey && $this->No_Pol_3->FormValue != NULL && $this->No_Pol_3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->No_Pol_3->caption(), $this->No_Pol_3->RequiredErrorMessage));
			}
		}
		if ($this->Nomor_Container_1->Required) {
			if (!$this->Nomor_Container_1->IsDetailKey && $this->Nomor_Container_1->FormValue != NULL && $this->Nomor_Container_1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Nomor_Container_1->caption(), $this->Nomor_Container_1->RequiredErrorMessage));
			}
		}
		if ($this->Nomor_Container_2->Required) {
			if (!$this->Nomor_Container_2->IsDetailKey && $this->Nomor_Container_2->FormValue != NULL && $this->Nomor_Container_2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Nomor_Container_2->caption(), $this->Nomor_Container_2->RequiredErrorMessage));
			}
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// EI
		$this->EI->setDbValueDef($rsnew, $this->EI->CurrentValue, "", strval($this->EI->CurrentValue) == "");

		// Shipper_id
		$this->Shipper_id->setDbValueDef($rsnew, $this->Shipper_id->CurrentValue, 0, FALSE);

		// Party
		$this->Party->setDbValueDef($rsnew, $this->Party->CurrentValue, 0, strval($this->Party->CurrentValue) == "");

		// Jenis_Container
		$this->Jenis_Container->setDbValueDef($rsnew, $this->Jenis_Container->CurrentValue, "", strval($this->Jenis_Container->CurrentValue) == "");

		// Tgl_Stuffing
		$this->Tgl_Stuffing->setDbValueDef($rsnew, UnFormatDateTime($this->Tgl_Stuffing->CurrentValue, 0), CurrentDate(), FALSE);

		// Destination_id
		$this->Destination_id->setDbValueDef($rsnew, $this->Destination_id->CurrentValue, 0, FALSE);

		// Feeder_id
		$this->Feeder_id->setDbValueDef($rsnew, $this->Feeder_id->CurrentValue, 0, FALSE);

		// ETA_ETD
		$this->ETA_ETD->setDbValueDef($rsnew, UnFormatDateTime($this->ETA_ETD->CurrentValue, 0), CurrentDate(), FALSE);

		// Liner_id
		$this->Liner_id->setDbValueDef($rsnew, $this->Liner_id->CurrentValue, 0, FALSE);

		// Remark
		$this->Remark->setDbValueDef($rsnew, $this->Remark->CurrentValue, "", FALSE);

		// TruckingVendor_id
		$this->TruckingVendor_id->setDbValueDef($rsnew, $this->TruckingVendor_id->CurrentValue, 0, FALSE);

		// Driver_id
		$this->Driver_id->setDbValueDef($rsnew, $this->Driver_id->CurrentValue, 0, FALSE);

		// No_Pol_1
		$this->No_Pol_1->setDbValueDef($rsnew, $this->No_Pol_1->CurrentValue, "", strval($this->No_Pol_1->CurrentValue) == "");

		// No_Pol_2
		$this->No_Pol_2->setDbValueDef($rsnew, $this->No_Pol_2->CurrentValue, "", FALSE);

		// No_Pol_3
		$this->No_Pol_3->setDbValueDef($rsnew, $this->No_Pol_3->CurrentValue, "", strval($this->No_Pol_3->CurrentValue) == "");

		// Nomor_Container_1
		$this->Nomor_Container_1->setDbValueDef($rsnew, $this->Nomor_Container_1->CurrentValue, "", FALSE);

		// Nomor_Container_2
		$this->Nomor_Container_2->setDbValueDef($rsnew, $this->Nomor_Container_2->CurrentValue, "", FALSE);

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = '';
			if ($addRow) {
			}
		} else {
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("InsertCancelled"));
			}
			$addRow = FALSE;
		}
		if ($addRow) {

			// Call Row Inserted event
			$rs = ($rsold) ? $rsold->fields : NULL;
			$this->Row_Inserted($rs, $rsnew);
		}

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("t103_truckinglist.php"), "", $this->TableVar, TRUE);
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL
			switch ($fld->FieldVar) {
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql <> "" && count($fld->Lookup->ParentFields) == 0 && count($fld->Lookup->Options) == 0) {
				$conn = &$this->getConnection();
				$totalCnt = $this->getRecordCount($sql);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
					}
					$ar[strval($row[0])] = $row;
					$rs->moveNext();
				}
				if ($rs)
					$rs->close();
				$fld->Lookup->Options = $ar;
			}
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>