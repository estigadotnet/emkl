<?php
namespace PHPMaker2019\emkl_prj;

/**
 * Page class
 */
class t101_jo_detail_edit extends t101_jo_detail
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{D4B21A3D-A1C8-4ED3-BA65-212E10E691E7}";

	// Table name
	public $TableName = 't101_jo_detail';

	// Page object name
	public $PageObjName = "t101_jo_detail_edit";

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

		// Table object (t101_jo_detail)
		if (!isset($GLOBALS["t101_jo_detail"]) || get_class($GLOBALS["t101_jo_detail"]) == PROJECT_NAMESPACE . "t101_jo_detail") {
			$GLOBALS["t101_jo_detail"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["t101_jo_detail"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (t101_jo_head)
		if (!isset($GLOBALS['t101_jo_head']))
			$GLOBALS['t101_jo_head'] = new t101_jo_head();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 't101_jo_detail');

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
		global $EXPORT, $t101_jo_detail;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($t101_jo_detail);
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
					if ($pageName == "t101_jo_detailview.php")
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
		$this->id->setVisibility();
		$this->JOHead_id->setVisibility();
		$this->TruckingVendor_id->setVisibility();
		$this->Driver_id->setVisibility();
		$this->Nomor_Polisi_1->setVisibility();
		$this->Nomor_Polisi_2->setVisibility();
		$this->Nomor_Polisi_3->setVisibility();
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
		$this->setupLookupOptions($this->TruckingVendor_id);
		$this->setupLookupOptions($this->Driver_id);

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

		// Set up master detail parameters
		$this->setupMasterParms();

		// Load current record
		$loaded = $this->loadRow();

		// Process form if post back
		if ($postBack) {
			$this->loadFormValues(); // Get form values
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
					$this->terminate("t101_jo_detaillist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "t101_jo_detaillist.php")
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

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);

		// Check field name 'JOHead_id' first before field var 'x_JOHead_id'
		$val = $CurrentForm->hasValue("JOHead_id") ? $CurrentForm->getValue("JOHead_id") : $CurrentForm->getValue("x_JOHead_id");
		if (!$this->JOHead_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->JOHead_id->Visible = FALSE; // Disable update for API request
			else
				$this->JOHead_id->setFormValue($val);
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

		// Check field name 'Nomor_Polisi_1' first before field var 'x_Nomor_Polisi_1'
		$val = $CurrentForm->hasValue("Nomor_Polisi_1") ? $CurrentForm->getValue("Nomor_Polisi_1") : $CurrentForm->getValue("x_Nomor_Polisi_1");
		if (!$this->Nomor_Polisi_1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Nomor_Polisi_1->Visible = FALSE; // Disable update for API request
			else
				$this->Nomor_Polisi_1->setFormValue($val);
		}

		// Check field name 'Nomor_Polisi_2' first before field var 'x_Nomor_Polisi_2'
		$val = $CurrentForm->hasValue("Nomor_Polisi_2") ? $CurrentForm->getValue("Nomor_Polisi_2") : $CurrentForm->getValue("x_Nomor_Polisi_2");
		if (!$this->Nomor_Polisi_2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Nomor_Polisi_2->Visible = FALSE; // Disable update for API request
			else
				$this->Nomor_Polisi_2->setFormValue($val);
		}

		// Check field name 'Nomor_Polisi_3' first before field var 'x_Nomor_Polisi_3'
		$val = $CurrentForm->hasValue("Nomor_Polisi_3") ? $CurrentForm->getValue("Nomor_Polisi_3") : $CurrentForm->getValue("x_Nomor_Polisi_3");
		if (!$this->Nomor_Polisi_3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Nomor_Polisi_3->Visible = FALSE; // Disable update for API request
			else
				$this->Nomor_Polisi_3->setFormValue($val);
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
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->JOHead_id->CurrentValue = $this->JOHead_id->FormValue;
		$this->TruckingVendor_id->CurrentValue = $this->TruckingVendor_id->FormValue;
		$this->Driver_id->CurrentValue = $this->Driver_id->FormValue;
		$this->Nomor_Polisi_1->CurrentValue = $this->Nomor_Polisi_1->FormValue;
		$this->Nomor_Polisi_2->CurrentValue = $this->Nomor_Polisi_2->FormValue;
		$this->Nomor_Polisi_3->CurrentValue = $this->Nomor_Polisi_3->FormValue;
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
		$this->JOHead_id->setDbValue($row['JOHead_id']);
		$this->TruckingVendor_id->setDbValue($row['TruckingVendor_id']);
		$this->Driver_id->setDbValue($row['Driver_id']);
		$this->Nomor_Polisi_1->setDbValue($row['Nomor_Polisi_1']);
		$this->Nomor_Polisi_2->setDbValue($row['Nomor_Polisi_2']);
		$this->Nomor_Polisi_3->setDbValue($row['Nomor_Polisi_3']);
		$this->Nomor_Container_1->setDbValue($row['Nomor_Container_1']);
		$this->Nomor_Container_2->setDbValue($row['Nomor_Container_2']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['JOHead_id'] = NULL;
		$row['TruckingVendor_id'] = NULL;
		$row['Driver_id'] = NULL;
		$row['Nomor_Polisi_1'] = NULL;
		$row['Nomor_Polisi_2'] = NULL;
		$row['Nomor_Polisi_3'] = NULL;
		$row['Nomor_Container_1'] = NULL;
		$row['Nomor_Container_2'] = NULL;
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
		// JOHead_id
		// TruckingVendor_id
		// Driver_id
		// Nomor_Polisi_1
		// Nomor_Polisi_2
		// Nomor_Polisi_3
		// Nomor_Container_1
		// Nomor_Container_2

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// JOHead_id
			$this->JOHead_id->ViewValue = $this->JOHead_id->CurrentValue;
			$this->JOHead_id->ViewValue = FormatNumber($this->JOHead_id->ViewValue, 0, -2, -2, -2);
			$this->JOHead_id->ViewCustomAttributes = "";

			// TruckingVendor_id
			$curVal = strval($this->TruckingVendor_id->CurrentValue);
			if ($curVal <> "") {
				$this->TruckingVendor_id->ViewValue = $this->TruckingVendor_id->lookupCacheOption($curVal);
				if ($this->TruckingVendor_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->TruckingVendor_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TruckingVendor_id->ViewValue = $this->TruckingVendor_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TruckingVendor_id->ViewValue = $this->TruckingVendor_id->CurrentValue;
					}
				}
			} else {
				$this->TruckingVendor_id->ViewValue = NULL;
			}
			$this->TruckingVendor_id->ViewCustomAttributes = "";

			// Driver_id
			$curVal = strval($this->Driver_id->CurrentValue);
			if ($curVal <> "") {
				$this->Driver_id->ViewValue = $this->Driver_id->lookupCacheOption($curVal);
				if ($this->Driver_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Driver_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Driver_id->ViewValue = $this->Driver_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Driver_id->ViewValue = $this->Driver_id->CurrentValue;
					}
				}
			} else {
				$this->Driver_id->ViewValue = NULL;
			}
			$this->Driver_id->ViewCustomAttributes = "";

			// Nomor_Polisi_1
			$this->Nomor_Polisi_1->ViewValue = $this->Nomor_Polisi_1->CurrentValue;
			$this->Nomor_Polisi_1->ViewCustomAttributes = "";

			// Nomor_Polisi_2
			$this->Nomor_Polisi_2->ViewValue = $this->Nomor_Polisi_2->CurrentValue;
			$this->Nomor_Polisi_2->ViewCustomAttributes = "";

			// Nomor_Polisi_3
			$this->Nomor_Polisi_3->ViewValue = $this->Nomor_Polisi_3->CurrentValue;
			$this->Nomor_Polisi_3->ViewCustomAttributes = "";

			// Nomor_Container_1
			$this->Nomor_Container_1->ViewValue = $this->Nomor_Container_1->CurrentValue;
			$this->Nomor_Container_1->ViewCustomAttributes = "";

			// Nomor_Container_2
			$this->Nomor_Container_2->ViewValue = $this->Nomor_Container_2->CurrentValue;
			$this->Nomor_Container_2->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// JOHead_id
			$this->JOHead_id->LinkCustomAttributes = "";
			$this->JOHead_id->HrefValue = "";
			$this->JOHead_id->TooltipValue = "";

			// TruckingVendor_id
			$this->TruckingVendor_id->LinkCustomAttributes = "";
			$this->TruckingVendor_id->HrefValue = "";
			$this->TruckingVendor_id->TooltipValue = "";

			// Driver_id
			$this->Driver_id->LinkCustomAttributes = "";
			$this->Driver_id->HrefValue = "";
			$this->Driver_id->TooltipValue = "";

			// Nomor_Polisi_1
			$this->Nomor_Polisi_1->LinkCustomAttributes = "";
			$this->Nomor_Polisi_1->HrefValue = "";
			$this->Nomor_Polisi_1->TooltipValue = "";

			// Nomor_Polisi_2
			$this->Nomor_Polisi_2->LinkCustomAttributes = "";
			$this->Nomor_Polisi_2->HrefValue = "";
			$this->Nomor_Polisi_2->TooltipValue = "";

			// Nomor_Polisi_3
			$this->Nomor_Polisi_3->LinkCustomAttributes = "";
			$this->Nomor_Polisi_3->HrefValue = "";
			$this->Nomor_Polisi_3->TooltipValue = "";

			// Nomor_Container_1
			$this->Nomor_Container_1->LinkCustomAttributes = "";
			$this->Nomor_Container_1->HrefValue = "";
			$this->Nomor_Container_1->TooltipValue = "";

			// Nomor_Container_2
			$this->Nomor_Container_2->LinkCustomAttributes = "";
			$this->Nomor_Container_2->HrefValue = "";
			$this->Nomor_Container_2->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// JOHead_id
			$this->JOHead_id->EditAttrs["class"] = "form-control";
			$this->JOHead_id->EditCustomAttributes = "";
			if ($this->JOHead_id->getSessionValue() <> "") {
				$this->JOHead_id->CurrentValue = $this->JOHead_id->getSessionValue();
			$this->JOHead_id->ViewValue = $this->JOHead_id->CurrentValue;
			$this->JOHead_id->ViewValue = FormatNumber($this->JOHead_id->ViewValue, 0, -2, -2, -2);
			$this->JOHead_id->ViewCustomAttributes = "";
			} else {
			$this->JOHead_id->EditValue = HtmlEncode($this->JOHead_id->CurrentValue);
			$this->JOHead_id->PlaceHolder = RemoveHtml($this->JOHead_id->caption());
			}

			// TruckingVendor_id
			$this->TruckingVendor_id->EditAttrs["class"] = "form-control";
			$this->TruckingVendor_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->TruckingVendor_id->CurrentValue));
			if ($curVal <> "")
				$this->TruckingVendor_id->ViewValue = $this->TruckingVendor_id->lookupCacheOption($curVal);
			else
				$this->TruckingVendor_id->ViewValue = $this->TruckingVendor_id->Lookup !== NULL && is_array($this->TruckingVendor_id->Lookup->Options) ? $curVal : NULL;
			if ($this->TruckingVendor_id->ViewValue !== NULL) { // Load from cache
				$this->TruckingVendor_id->EditValue = array_values($this->TruckingVendor_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->TruckingVendor_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->TruckingVendor_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->TruckingVendor_id->EditValue = $arwrk;
			}

			// Driver_id
			$this->Driver_id->EditAttrs["class"] = "form-control";
			$this->Driver_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->Driver_id->CurrentValue));
			if ($curVal <> "")
				$this->Driver_id->ViewValue = $this->Driver_id->lookupCacheOption($curVal);
			else
				$this->Driver_id->ViewValue = $this->Driver_id->Lookup !== NULL && is_array($this->Driver_id->Lookup->Options) ? $curVal : NULL;
			if ($this->Driver_id->ViewValue !== NULL) { // Load from cache
				$this->Driver_id->EditValue = array_values($this->Driver_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->Driver_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->Driver_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Driver_id->EditValue = $arwrk;
			}

			// Nomor_Polisi_1
			$this->Nomor_Polisi_1->EditAttrs["class"] = "form-control";
			$this->Nomor_Polisi_1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Nomor_Polisi_1->CurrentValue = HtmlDecode($this->Nomor_Polisi_1->CurrentValue);
			$this->Nomor_Polisi_1->EditValue = HtmlEncode($this->Nomor_Polisi_1->CurrentValue);
			$this->Nomor_Polisi_1->PlaceHolder = RemoveHtml($this->Nomor_Polisi_1->caption());

			// Nomor_Polisi_2
			$this->Nomor_Polisi_2->EditAttrs["class"] = "form-control";
			$this->Nomor_Polisi_2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Nomor_Polisi_2->CurrentValue = HtmlDecode($this->Nomor_Polisi_2->CurrentValue);
			$this->Nomor_Polisi_2->EditValue = HtmlEncode($this->Nomor_Polisi_2->CurrentValue);
			$this->Nomor_Polisi_2->PlaceHolder = RemoveHtml($this->Nomor_Polisi_2->caption());

			// Nomor_Polisi_3
			$this->Nomor_Polisi_3->EditAttrs["class"] = "form-control";
			$this->Nomor_Polisi_3->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Nomor_Polisi_3->CurrentValue = HtmlDecode($this->Nomor_Polisi_3->CurrentValue);
			$this->Nomor_Polisi_3->EditValue = HtmlEncode($this->Nomor_Polisi_3->CurrentValue);
			$this->Nomor_Polisi_3->PlaceHolder = RemoveHtml($this->Nomor_Polisi_3->caption());

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

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// JOHead_id
			$this->JOHead_id->LinkCustomAttributes = "";
			$this->JOHead_id->HrefValue = "";

			// TruckingVendor_id
			$this->TruckingVendor_id->LinkCustomAttributes = "";
			$this->TruckingVendor_id->HrefValue = "";

			// Driver_id
			$this->Driver_id->LinkCustomAttributes = "";
			$this->Driver_id->HrefValue = "";

			// Nomor_Polisi_1
			$this->Nomor_Polisi_1->LinkCustomAttributes = "";
			$this->Nomor_Polisi_1->HrefValue = "";

			// Nomor_Polisi_2
			$this->Nomor_Polisi_2->LinkCustomAttributes = "";
			$this->Nomor_Polisi_2->HrefValue = "";

			// Nomor_Polisi_3
			$this->Nomor_Polisi_3->LinkCustomAttributes = "";
			$this->Nomor_Polisi_3->HrefValue = "";

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
		if ($this->JOHead_id->Required) {
			if (!$this->JOHead_id->IsDetailKey && $this->JOHead_id->FormValue != NULL && $this->JOHead_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->JOHead_id->caption(), $this->JOHead_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->JOHead_id->FormValue)) {
			AddMessage($FormError, $this->JOHead_id->errorMessage());
		}
		if ($this->TruckingVendor_id->Required) {
			if (!$this->TruckingVendor_id->IsDetailKey && $this->TruckingVendor_id->FormValue != NULL && $this->TruckingVendor_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TruckingVendor_id->caption(), $this->TruckingVendor_id->RequiredErrorMessage));
			}
		}
		if ($this->Driver_id->Required) {
			if (!$this->Driver_id->IsDetailKey && $this->Driver_id->FormValue != NULL && $this->Driver_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Driver_id->caption(), $this->Driver_id->RequiredErrorMessage));
			}
		}
		if ($this->Nomor_Polisi_1->Required) {
			if (!$this->Nomor_Polisi_1->IsDetailKey && $this->Nomor_Polisi_1->FormValue != NULL && $this->Nomor_Polisi_1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Nomor_Polisi_1->caption(), $this->Nomor_Polisi_1->RequiredErrorMessage));
			}
		}
		if ($this->Nomor_Polisi_2->Required) {
			if (!$this->Nomor_Polisi_2->IsDetailKey && $this->Nomor_Polisi_2->FormValue != NULL && $this->Nomor_Polisi_2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Nomor_Polisi_2->caption(), $this->Nomor_Polisi_2->RequiredErrorMessage));
			}
		}
		if ($this->Nomor_Polisi_3->Required) {
			if (!$this->Nomor_Polisi_3->IsDetailKey && $this->Nomor_Polisi_3->FormValue != NULL && $this->Nomor_Polisi_3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Nomor_Polisi_3->caption(), $this->Nomor_Polisi_3->RequiredErrorMessage));
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

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// JOHead_id
			$this->JOHead_id->setDbValueDef($rsnew, $this->JOHead_id->CurrentValue, 0, $this->JOHead_id->ReadOnly);

			// TruckingVendor_id
			$this->TruckingVendor_id->setDbValueDef($rsnew, $this->TruckingVendor_id->CurrentValue, 0, $this->TruckingVendor_id->ReadOnly);

			// Driver_id
			$this->Driver_id->setDbValueDef($rsnew, $this->Driver_id->CurrentValue, 0, $this->Driver_id->ReadOnly);

			// Nomor_Polisi_1
			$this->Nomor_Polisi_1->setDbValueDef($rsnew, $this->Nomor_Polisi_1->CurrentValue, "", $this->Nomor_Polisi_1->ReadOnly);

			// Nomor_Polisi_2
			$this->Nomor_Polisi_2->setDbValueDef($rsnew, $this->Nomor_Polisi_2->CurrentValue, "", $this->Nomor_Polisi_2->ReadOnly);

			// Nomor_Polisi_3
			$this->Nomor_Polisi_3->setDbValueDef($rsnew, $this->Nomor_Polisi_3->CurrentValue, "", $this->Nomor_Polisi_3->ReadOnly);

			// Nomor_Container_1
			$this->Nomor_Container_1->setDbValueDef($rsnew, $this->Nomor_Container_1->CurrentValue, "", $this->Nomor_Container_1->ReadOnly);

			// Nomor_Container_2
			$this->Nomor_Container_2->setDbValueDef($rsnew, $this->Nomor_Container_2->CurrentValue, "", $this->Nomor_Container_2->ReadOnly);

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

	// Set up master/detail based on QueryString
	protected function setupMasterParms()
	{
		$validMaster = FALSE;

		// Get the keys for master table
		if (Get(TABLE_SHOW_MASTER) !== NULL) {
			$masterTblVar = Get(TABLE_SHOW_MASTER);
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "t101_jo_head") {
				$validMaster = TRUE;
				if (Get("fk_id") !== NULL) {
					$this->JOHead_id->setQueryStringValue(Get("fk_id"));
					$this->JOHead_id->setSessionValue($this->JOHead_id->QueryStringValue);
					if (!is_numeric($this->JOHead_id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		} elseif (Post(TABLE_SHOW_MASTER) !== NULL) {
			$masterTblVar = Post(TABLE_SHOW_MASTER);
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "t101_jo_head") {
				$validMaster = TRUE;
				if (Post("fk_id") !== NULL) {
					$this->JOHead_id->setFormValue(Post("fk_id"));
					$this->JOHead_id->setSessionValue($this->JOHead_id->FormValue);
					if (!is_numeric($this->JOHead_id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);
			$this->setSessionWhere($this->getDetailFilter());

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRec = 1;
				$this->setStartRecordNumber($this->StartRec);
			}

			// Clear previous master key from Session
			if ($masterTblVar <> "t101_jo_head") {
				if ($this->JOHead_id->CurrentValue == "")
					$this->JOHead_id->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("t101_jo_detaillist.php"), "", $this->TableVar, TRUE);
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
						case "x_TruckingVendor_id":
							break;
						case "x_Driver_id":
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