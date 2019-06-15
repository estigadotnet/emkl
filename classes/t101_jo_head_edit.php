<?php
namespace PHPMaker2019\emkl_prj;

/**
 * Page class
 */
class t101_jo_head_edit extends t101_jo_head
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{D4B21A3D-A1C8-4ED3-BA65-212E10E691E7}";

	// Table name
	public $TableName = 't101_jo_head';

	// Page object name
	public $PageObjName = "t101_jo_head_edit";

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

		// Table object (t101_jo_head)
		if (!isset($GLOBALS["t101_jo_head"]) || get_class($GLOBALS["t101_jo_head"]) == PROJECT_NAMESPACE . "t101_jo_head") {
			$GLOBALS["t101_jo_head"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["t101_jo_head"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 't101_jo_head');

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
		global $EXPORT, $t101_jo_head;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($t101_jo_head);
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
					if ($pageName == "t101_jo_headview.php")
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
	public $FormClassName = "ew-horizontal ew-form ew-edit-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter;
	public $DbDetailFilter;

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
		$this->Export_Import->setVisibility();
		$this->Nomor_JO->setVisibility();
		$this->Shipper_id->setVisibility();
		$this->Party->setVisibility();
		$this->Container->setVisibility();
		$this->Tanggal_Stuffing->setVisibility();
		$this->Destination_id->setVisibility();
		$this->Feeder_id->setVisibility();
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
		$this->setupLookupOptions($this->Shipper_id);
		$this->setupLookupOptions($this->Destination_id);
		$this->setupLookupOptions($this->Feeder_id);

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-edit-form ew-horizontal";
		$loaded = FALSE;
		$postBack = FALSE;

		// Set up current action and primary key
		if (IsApi()) {
			$this->CurrentAction = "update"; // Update record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get action code
			if (!$this->isShow()) // Not reload record, handle as postback
				$postBack = TRUE;

			// Load key from Form
			if ($CurrentForm->hasValue("x_id")) {
				$this->id->setFormValue($CurrentForm->getValue("x_id"));
			}
		} else {
			$this->CurrentAction = "show"; // Default action is display

			// Load key from QueryString
			$loadByQuery = FALSE;
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$loadByQuery = TRUE;
			} else {
				$this->id->CurrentValue = NULL;
			}
		}

		// Load current record
		$loaded = $this->loadRow();

		// Process form if post back
		if ($postBack) {
			$this->loadFormValues(); // Get form values

			// Set up detail parameters
			$this->setupDetailParms();
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->setFailureMessage($FormError);
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues();
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = ""; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "show": // Get a record to display
				if (!$loaded) { // Load record based on key
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("t101_jo_headlist.php"); // No matching record, return to list
				}

				// Set up detail parameters
				$this->setupDetailParms();
				break;
			case "update": // Update
				if ($this->getCurrentDetailTable() <> "") // Master/detail edit
					$returnUrl = $this->getViewUrl(TABLE_SHOW_DETAIL . "=" . $this->getCurrentDetailTable()); // Master/Detail view page
				else
					$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "t101_jo_headlist.php")
					$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
				$this->SendEmail = TRUE; // Send email on update success
				if ($this->editRow()) { // Update record based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Update success
					if (IsApi()) {
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl); // Return to caller
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} elseif ($this->getFailureMessage() == $Language->phrase("NoRecord")) {
					$this->terminate($returnUrl); // Return to caller
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Restore form values if update failed

					// Set up detail parameters
					$this->setupDetailParms();
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render the record
		$this->RowType = ROWTYPE_EDIT; // Render as Edit
		$this->resetAttributes();
		$this->renderRow();
	}

	// Set up starting record parameters
	public function setupStartRec()
	{
		if ($this->DisplayRecs == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			if (Get(TABLE_START_REC) !== NULL) { // Check for "start" parameter
				$this->StartRec = Get(TABLE_START_REC);
				$this->setStartRecordNumber($this->StartRec);
			} elseif (Get(TABLE_PAGE_NO) !== NULL) {
				$pageNo = Get(TABLE_PAGE_NO);
				if (is_numeric($pageNo)) {
					$this->StartRec = ($pageNo - 1) * $this->DisplayRecs + 1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1) {
						$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1;
					}
					$this->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif ($this->StartRec > $this->TotalRecs) { // Avoid starting record > total records
			$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec - 1) % $this->DisplayRecs <> 0) {
			$this->StartRec = (int)(($this->StartRec - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'Export_Import' first before field var 'x_Export_Import'
		$val = $CurrentForm->hasValue("Export_Import") ? $CurrentForm->getValue("Export_Import") : $CurrentForm->getValue("x_Export_Import");
		if (!$this->Export_Import->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Export_Import->Visible = FALSE; // Disable update for API request
			else
				$this->Export_Import->setFormValue($val);
		}

		// Check field name 'Nomor_JO' first before field var 'x_Nomor_JO'
		$val = $CurrentForm->hasValue("Nomor_JO") ? $CurrentForm->getValue("Nomor_JO") : $CurrentForm->getValue("x_Nomor_JO");
		if (!$this->Nomor_JO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Nomor_JO->Visible = FALSE; // Disable update for API request
			else
				$this->Nomor_JO->setFormValue($val);
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

		// Check field name 'Container' first before field var 'x_Container'
		$val = $CurrentForm->hasValue("Container") ? $CurrentForm->getValue("Container") : $CurrentForm->getValue("x_Container");
		if (!$this->Container->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Container->Visible = FALSE; // Disable update for API request
			else
				$this->Container->setFormValue($val);
		}

		// Check field name 'Tanggal_Stuffing' first before field var 'x_Tanggal_Stuffing'
		$val = $CurrentForm->hasValue("Tanggal_Stuffing") ? $CurrentForm->getValue("Tanggal_Stuffing") : $CurrentForm->getValue("x_Tanggal_Stuffing");
		if (!$this->Tanggal_Stuffing->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Tanggal_Stuffing->Visible = FALSE; // Disable update for API request
			else
				$this->Tanggal_Stuffing->setFormValue($val);
			$this->Tanggal_Stuffing->CurrentValue = UnFormatDateTime($this->Tanggal_Stuffing->CurrentValue, 11);
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

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->Export_Import->CurrentValue = $this->Export_Import->FormValue;
		$this->Nomor_JO->CurrentValue = $this->Nomor_JO->FormValue;
		$this->Shipper_id->CurrentValue = $this->Shipper_id->FormValue;
		$this->Party->CurrentValue = $this->Party->FormValue;
		$this->Container->CurrentValue = $this->Container->FormValue;
		$this->Tanggal_Stuffing->CurrentValue = $this->Tanggal_Stuffing->FormValue;
		$this->Tanggal_Stuffing->CurrentValue = UnFormatDateTime($this->Tanggal_Stuffing->CurrentValue, 11);
		$this->Destination_id->CurrentValue = $this->Destination_id->FormValue;
		$this->Feeder_id->CurrentValue = $this->Feeder_id->FormValue;
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
		$this->Export_Import->setDbValue($row['Export_Import']);
		$this->Nomor_JO->setDbValue($row['Nomor_JO']);
		$this->Shipper_id->setDbValue($row['Shipper_id']);
		$this->Party->setDbValue($row['Party']);
		$this->Container->setDbValue($row['Container']);
		$this->Tanggal_Stuffing->setDbValue($row['Tanggal_Stuffing']);
		$this->Destination_id->setDbValue($row['Destination_id']);
		$this->Feeder_id->setDbValue($row['Feeder_id']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['Export_Import'] = NULL;
		$row['Nomor_JO'] = NULL;
		$row['Shipper_id'] = NULL;
		$row['Party'] = NULL;
		$row['Container'] = NULL;
		$row['Tanggal_Stuffing'] = NULL;
		$row['Destination_id'] = NULL;
		$row['Feeder_id'] = NULL;
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
		// Export_Import
		// Nomor_JO
		// Shipper_id
		// Party
		// Container
		// Tanggal_Stuffing
		// Destination_id
		// Feeder_id

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Export_Import
			if (strval($this->Export_Import->CurrentValue) <> "") {
				$this->Export_Import->ViewValue = $this->Export_Import->optionCaption($this->Export_Import->CurrentValue);
			} else {
				$this->Export_Import->ViewValue = NULL;
			}
			$this->Export_Import->ViewCustomAttributes = "";

			// Nomor_JO
			$this->Nomor_JO->ViewValue = $this->Nomor_JO->CurrentValue;
			$this->Nomor_JO->ViewCustomAttributes = "";

			// Shipper_id
			$curVal = strval($this->Shipper_id->CurrentValue);
			if ($curVal <> "") {
				$this->Shipper_id->ViewValue = $this->Shipper_id->lookupCacheOption($curVal);
				if ($this->Shipper_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Shipper_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Shipper_id->ViewValue = $this->Shipper_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Shipper_id->ViewValue = $this->Shipper_id->CurrentValue;
					}
				}
			} else {
				$this->Shipper_id->ViewValue = NULL;
			}
			$this->Shipper_id->ViewCustomAttributes = "";

			// Party
			$this->Party->ViewValue = $this->Party->CurrentValue;
			$this->Party->ViewValue = FormatNumber($this->Party->ViewValue, 0, -2, -2, -2);
			$this->Party->ViewCustomAttributes = "";

			// Container
			if (strval($this->Container->CurrentValue) <> "") {
				$this->Container->ViewValue = $this->Container->optionCaption($this->Container->CurrentValue);
			} else {
				$this->Container->ViewValue = NULL;
			}
			$this->Container->ViewCustomAttributes = "";

			// Tanggal_Stuffing
			$this->Tanggal_Stuffing->ViewValue = $this->Tanggal_Stuffing->CurrentValue;
			$this->Tanggal_Stuffing->ViewValue = FormatDateTime($this->Tanggal_Stuffing->ViewValue, 11);
			$this->Tanggal_Stuffing->ViewCustomAttributes = "";

			// Destination_id
			$curVal = strval($this->Destination_id->CurrentValue);
			if ($curVal <> "") {
				$this->Destination_id->ViewValue = $this->Destination_id->lookupCacheOption($curVal);
				if ($this->Destination_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Destination_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Destination_id->ViewValue = $this->Destination_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Destination_id->ViewValue = $this->Destination_id->CurrentValue;
					}
				}
			} else {
				$this->Destination_id->ViewValue = NULL;
			}
			$this->Destination_id->ViewCustomAttributes = "";

			// Feeder_id
			$curVal = strval($this->Feeder_id->CurrentValue);
			if ($curVal <> "") {
				$this->Feeder_id->ViewValue = $this->Feeder_id->lookupCacheOption($curVal);
				if ($this->Feeder_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Feeder_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Feeder_id->ViewValue = $this->Feeder_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Feeder_id->ViewValue = $this->Feeder_id->CurrentValue;
					}
				}
			} else {
				$this->Feeder_id->ViewValue = NULL;
			}
			$this->Feeder_id->ViewCustomAttributes = "";

			// Export_Import
			$this->Export_Import->LinkCustomAttributes = "";
			$this->Export_Import->HrefValue = "";
			$this->Export_Import->TooltipValue = "";

			// Nomor_JO
			$this->Nomor_JO->LinkCustomAttributes = "";
			$this->Nomor_JO->HrefValue = "";
			$this->Nomor_JO->TooltipValue = "";

			// Shipper_id
			$this->Shipper_id->LinkCustomAttributes = "";
			$this->Shipper_id->HrefValue = "";
			$this->Shipper_id->TooltipValue = "";

			// Party
			$this->Party->LinkCustomAttributes = "";
			$this->Party->HrefValue = "";
			$this->Party->TooltipValue = "";

			// Container
			$this->Container->LinkCustomAttributes = "";
			$this->Container->HrefValue = "";
			$this->Container->TooltipValue = "";

			// Tanggal_Stuffing
			$this->Tanggal_Stuffing->LinkCustomAttributes = "";
			$this->Tanggal_Stuffing->HrefValue = "";
			$this->Tanggal_Stuffing->TooltipValue = "";

			// Destination_id
			$this->Destination_id->LinkCustomAttributes = "";
			$this->Destination_id->HrefValue = "";
			$this->Destination_id->TooltipValue = "";

			// Feeder_id
			$this->Feeder_id->LinkCustomAttributes = "";
			$this->Feeder_id->HrefValue = "";
			$this->Feeder_id->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// Export_Import
			$this->Export_Import->EditCustomAttributes = "";
			$this->Export_Import->EditValue = $this->Export_Import->options(FALSE);

			// Nomor_JO
			$this->Nomor_JO->EditAttrs["class"] = "form-control";
			$this->Nomor_JO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Nomor_JO->CurrentValue = HtmlDecode($this->Nomor_JO->CurrentValue);
			$this->Nomor_JO->EditValue = HtmlEncode($this->Nomor_JO->CurrentValue);
			$this->Nomor_JO->PlaceHolder = RemoveHtml($this->Nomor_JO->caption());

			// Shipper_id
			$this->Shipper_id->EditAttrs["class"] = "form-control";
			$this->Shipper_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->Shipper_id->CurrentValue));
			if ($curVal <> "")
				$this->Shipper_id->ViewValue = $this->Shipper_id->lookupCacheOption($curVal);
			else
				$this->Shipper_id->ViewValue = $this->Shipper_id->Lookup !== NULL && is_array($this->Shipper_id->Lookup->Options) ? $curVal : NULL;
			if ($this->Shipper_id->ViewValue !== NULL) { // Load from cache
				$this->Shipper_id->EditValue = array_values($this->Shipper_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->Shipper_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->Shipper_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Shipper_id->EditValue = $arwrk;
			}

			// Party
			$this->Party->EditAttrs["class"] = "form-control";
			$this->Party->EditCustomAttributes = "";
			$this->Party->EditValue = HtmlEncode($this->Party->CurrentValue);
			$this->Party->PlaceHolder = RemoveHtml($this->Party->caption());

			// Container
			$this->Container->EditCustomAttributes = "";
			$this->Container->EditValue = $this->Container->options(FALSE);

			// Tanggal_Stuffing
			$this->Tanggal_Stuffing->EditAttrs["class"] = "form-control";
			$this->Tanggal_Stuffing->EditCustomAttributes = "";
			$this->Tanggal_Stuffing->EditValue = HtmlEncode(FormatDateTime($this->Tanggal_Stuffing->CurrentValue, 11));
			$this->Tanggal_Stuffing->PlaceHolder = RemoveHtml($this->Tanggal_Stuffing->caption());

			// Destination_id
			$this->Destination_id->EditAttrs["class"] = "form-control";
			$this->Destination_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->Destination_id->CurrentValue));
			if ($curVal <> "")
				$this->Destination_id->ViewValue = $this->Destination_id->lookupCacheOption($curVal);
			else
				$this->Destination_id->ViewValue = $this->Destination_id->Lookup !== NULL && is_array($this->Destination_id->Lookup->Options) ? $curVal : NULL;
			if ($this->Destination_id->ViewValue !== NULL) { // Load from cache
				$this->Destination_id->EditValue = array_values($this->Destination_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->Destination_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->Destination_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Destination_id->EditValue = $arwrk;
			}

			// Feeder_id
			$this->Feeder_id->EditAttrs["class"] = "form-control";
			$this->Feeder_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->Feeder_id->CurrentValue));
			if ($curVal <> "")
				$this->Feeder_id->ViewValue = $this->Feeder_id->lookupCacheOption($curVal);
			else
				$this->Feeder_id->ViewValue = $this->Feeder_id->Lookup !== NULL && is_array($this->Feeder_id->Lookup->Options) ? $curVal : NULL;
			if ($this->Feeder_id->ViewValue !== NULL) { // Load from cache
				$this->Feeder_id->EditValue = array_values($this->Feeder_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->Feeder_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->Feeder_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Feeder_id->EditValue = $arwrk;
			}

			// Edit refer script
			// Export_Import

			$this->Export_Import->LinkCustomAttributes = "";
			$this->Export_Import->HrefValue = "";

			// Nomor_JO
			$this->Nomor_JO->LinkCustomAttributes = "";
			$this->Nomor_JO->HrefValue = "";

			// Shipper_id
			$this->Shipper_id->LinkCustomAttributes = "";
			$this->Shipper_id->HrefValue = "";

			// Party
			$this->Party->LinkCustomAttributes = "";
			$this->Party->HrefValue = "";

			// Container
			$this->Container->LinkCustomAttributes = "";
			$this->Container->HrefValue = "";

			// Tanggal_Stuffing
			$this->Tanggal_Stuffing->LinkCustomAttributes = "";
			$this->Tanggal_Stuffing->HrefValue = "";

			// Destination_id
			$this->Destination_id->LinkCustomAttributes = "";
			$this->Destination_id->HrefValue = "";

			// Feeder_id
			$this->Feeder_id->LinkCustomAttributes = "";
			$this->Feeder_id->HrefValue = "";
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
		if ($this->Export_Import->Required) {
			if ($this->Export_Import->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Export_Import->caption(), $this->Export_Import->RequiredErrorMessage));
			}
		}
		if ($this->Nomor_JO->Required) {
			if (!$this->Nomor_JO->IsDetailKey && $this->Nomor_JO->FormValue != NULL && $this->Nomor_JO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Nomor_JO->caption(), $this->Nomor_JO->RequiredErrorMessage));
			}
		}
		if ($this->Shipper_id->Required) {
			if (!$this->Shipper_id->IsDetailKey && $this->Shipper_id->FormValue != NULL && $this->Shipper_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Shipper_id->caption(), $this->Shipper_id->RequiredErrorMessage));
			}
		}
		if ($this->Party->Required) {
			if (!$this->Party->IsDetailKey && $this->Party->FormValue != NULL && $this->Party->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Party->caption(), $this->Party->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Party->FormValue)) {
			AddMessage($FormError, $this->Party->errorMessage());
		}
		if ($this->Container->Required) {
			if ($this->Container->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Container->caption(), $this->Container->RequiredErrorMessage));
			}
		}
		if ($this->Tanggal_Stuffing->Required) {
			if (!$this->Tanggal_Stuffing->IsDetailKey && $this->Tanggal_Stuffing->FormValue != NULL && $this->Tanggal_Stuffing->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Tanggal_Stuffing->caption(), $this->Tanggal_Stuffing->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->Tanggal_Stuffing->FormValue)) {
			AddMessage($FormError, $this->Tanggal_Stuffing->errorMessage());
		}
		if ($this->Destination_id->Required) {
			if (!$this->Destination_id->IsDetailKey && $this->Destination_id->FormValue != NULL && $this->Destination_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Destination_id->caption(), $this->Destination_id->RequiredErrorMessage));
			}
		}
		if ($this->Feeder_id->Required) {
			if (!$this->Feeder_id->IsDetailKey && $this->Feeder_id->FormValue != NULL && $this->Feeder_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Feeder_id->caption(), $this->Feeder_id->RequiredErrorMessage));
			}
		}

		// Validate detail grid
		$detailTblVar = explode(",", $this->getCurrentDetailTable());
		if (in_array("t101_jo_detail", $detailTblVar) && $GLOBALS["t101_jo_detail"]->DetailEdit) {
			if (!isset($GLOBALS["t101_jo_detail_grid"]))
				$GLOBALS["t101_jo_detail_grid"] = new t101_jo_detail_grid(); // Get detail page object
			$GLOBALS["t101_jo_detail_grid"]->validateGridForm();
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

	// Update record based on key values
	protected function editRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();
		$filter = $this->applyUserIDFilters($filter);
		$conn = &$this->getConnection();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
			$editRow = FALSE; // Update Failed
		} else {

			// Begin transaction
			if ($this->getCurrentDetailTable() <> "")
				$conn->beginTrans();

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// Export_Import
			$this->Export_Import->setDbValueDef($rsnew, $this->Export_Import->CurrentValue, "", $this->Export_Import->ReadOnly);

			// Nomor_JO
			$this->Nomor_JO->setDbValueDef($rsnew, $this->Nomor_JO->CurrentValue, "", $this->Nomor_JO->ReadOnly);

			// Shipper_id
			$this->Shipper_id->setDbValueDef($rsnew, $this->Shipper_id->CurrentValue, 0, $this->Shipper_id->ReadOnly);

			// Party
			$this->Party->setDbValueDef($rsnew, $this->Party->CurrentValue, 0, $this->Party->ReadOnly);

			// Container
			$this->Container->setDbValueDef($rsnew, $this->Container->CurrentValue, "", $this->Container->ReadOnly);

			// Tanggal_Stuffing
			$this->Tanggal_Stuffing->setDbValueDef($rsnew, UnFormatDateTime($this->Tanggal_Stuffing->CurrentValue, 11), CurrentDate(), $this->Tanggal_Stuffing->ReadOnly);

			// Destination_id
			$this->Destination_id->setDbValueDef($rsnew, $this->Destination_id->CurrentValue, 0, $this->Destination_id->ReadOnly);

			// Feeder_id
			$this->Feeder_id->setDbValueDef($rsnew, $this->Feeder_id->CurrentValue, 0, $this->Feeder_id->ReadOnly);

			// Call Row Updating event
			$updateRow = $this->Row_Updating($rsold, $rsnew);
			if ($updateRow) {
				$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
				if (count($rsnew) > 0)
					$editRow = $this->update($rsnew, "", $rsold);
				else
					$editRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
				if ($editRow) {
				}

				// Update detail records
				$detailTblVar = explode(",", $this->getCurrentDetailTable());
				if ($editRow) {
					if (in_array("t101_jo_detail", $detailTblVar) && $GLOBALS["t101_jo_detail"]->DetailEdit) {
						if (!isset($GLOBALS["t101_jo_detail_grid"]))
							$GLOBALS["t101_jo_detail_grid"] = new t101_jo_detail_grid(); // Get detail page object
						$editRow = $GLOBALS["t101_jo_detail_grid"]->gridUpdate();
					}
				}

				// Commit/Rollback transaction
				if ($this->getCurrentDetailTable() <> "") {
					if ($editRow) {
						$conn->commitTrans(); // Commit transaction
					} else {
						$conn->rollbackTrans(); // Rollback transaction
					}
				}
			} else {
				if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage <> "") {
					$this->setFailureMessage($this->CancelMessage);
					$this->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->phrase("UpdateCancelled"));
				}
				$editRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($editRow)
			$this->Row_Updated($rsold, $rsnew);
		$rs->close();

		// Write JSON for API request
		if (IsApi() && $editRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $editRow;
	}

	// Set up detail parms based on QueryString
	protected function setupDetailParms()
	{

		// Get the keys for master table
		if (Get(TABLE_SHOW_DETAIL) !== NULL) {
			$detailTblVar = Get(TABLE_SHOW_DETAIL);
			$this->setCurrentDetailTable($detailTblVar);
		} else {
			$detailTblVar = $this->getCurrentDetailTable();
		}
		if ($detailTblVar <> "") {
			$detailTblVar = explode(",", $detailTblVar);
			if (in_array("t101_jo_detail", $detailTblVar)) {
				if (!isset($GLOBALS["t101_jo_detail_grid"]))
					$GLOBALS["t101_jo_detail_grid"] = new t101_jo_detail_grid();
				if ($GLOBALS["t101_jo_detail_grid"]->DetailEdit) {
					$GLOBALS["t101_jo_detail_grid"]->CurrentMode = "edit";
					$GLOBALS["t101_jo_detail_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["t101_jo_detail_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["t101_jo_detail_grid"]->setStartRecordNumber(1);
					$GLOBALS["t101_jo_detail_grid"]->JOHead_id->IsDetailKey = TRUE;
					$GLOBALS["t101_jo_detail_grid"]->JOHead_id->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["t101_jo_detail_grid"]->JOHead_id->setSessionValue($GLOBALS["t101_jo_detail_grid"]->JOHead_id->CurrentValue);
				}
			}
		}
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("t101_jo_headlist.php"), "", $this->TableVar, TRUE);
		$pageId = "edit";
		$Breadcrumb->add("edit", $pageId, $url);
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
						case "x_Shipper_id":
							break;
						case "x_Destination_id":
							break;
						case "x_Feeder_id":
							break;
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