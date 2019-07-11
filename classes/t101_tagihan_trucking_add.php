<?php
namespace PHPMaker2019\emkl_prj;

/**
 * Page class
 */
class t101_tagihan_trucking_add extends t101_tagihan_trucking
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{D4B21A3D-A1C8-4ED3-BA65-212E10E691E7}";

	// Table name
	public $TableName = 't101_tagihan_trucking';

	// Page object name
	public $PageObjName = "t101_tagihan_trucking_add";

	// Audit Trail
	public $AuditTrailOnAdd = TRUE;
	public $AuditTrailOnEdit = TRUE;
	public $AuditTrailOnDelete = TRUE;
	public $AuditTrailOnView = FALSE;
	public $AuditTrailOnViewData = FALSE;
	public $AuditTrailOnSearch = FALSE;

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

		// Table object (t101_tagihan_trucking)
		if (!isset($GLOBALS["t101_tagihan_trucking"]) || get_class($GLOBALS["t101_tagihan_trucking"]) == PROJECT_NAMESPACE . "t101_tagihan_trucking") {
			$GLOBALS["t101_tagihan_trucking"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["t101_tagihan_trucking"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 't101_tagihan_trucking');

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
		global $EXPORT, $t101_tagihan_trucking;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($t101_tagihan_trucking);
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
					if ($pageName == "t101_tagihan_truckingview.php")
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
		$this->JO_id->setVisibility();
		$this->Nomor_Polisi_1->setVisibility();
		$this->Nomor_Polisi_2->setVisibility();
		$this->Nomor_Polisi_3->setVisibility();
		$this->Tanggal->setVisibility();
		$this->Shipper_id->setVisibility();
		$this->Dari_Lokasi->setVisibility();
		$this->Ke_Lokasi->setVisibility();
		$this->Jenis_Container->setVisibility();
		$this->Nomor_Container_1->setVisibility();
		$this->Nomor_Container_2->setVisibility();
		$this->Keterangan->setVisibility();
		$this->Tagihan->setVisibility();
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
					$this->terminate("t101_tagihan_truckinglist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "t101_tagihan_truckinglist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "t101_tagihan_truckingview.php")
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
		$this->JO_id->CurrentValue = NULL;
		$this->JO_id->OldValue = $this->JO_id->CurrentValue;
		$this->Nomor_Polisi_1->CurrentValue = "-";
		$this->Nomor_Polisi_2->CurrentValue = "-";
		$this->Nomor_Polisi_3->CurrentValue = "-";
		$this->Tanggal->CurrentValue = NULL;
		$this->Tanggal->OldValue = $this->Tanggal->CurrentValue;
		$this->Shipper_id->CurrentValue = NULL;
		$this->Shipper_id->OldValue = $this->Shipper_id->CurrentValue;
		$this->Dari_Lokasi->CurrentValue = "-";
		$this->Ke_Lokasi->CurrentValue = "-";
		$this->Jenis_Container->CurrentValue = "40";
		$this->Nomor_Container_1->CurrentValue = "-";
		$this->Nomor_Container_2->CurrentValue = "-";
		$this->Keterangan->CurrentValue = NULL;
		$this->Keterangan->OldValue = $this->Keterangan->CurrentValue;
		$this->Tagihan->CurrentValue = 0.00;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'JO_id' first before field var 'x_JO_id'
		$val = $CurrentForm->hasValue("JO_id") ? $CurrentForm->getValue("JO_id") : $CurrentForm->getValue("x_JO_id");
		if (!$this->JO_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->JO_id->Visible = FALSE; // Disable update for API request
			else
				$this->JO_id->setFormValue($val);
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

		// Check field name 'Tanggal' first before field var 'x_Tanggal'
		$val = $CurrentForm->hasValue("Tanggal") ? $CurrentForm->getValue("Tanggal") : $CurrentForm->getValue("x_Tanggal");
		if (!$this->Tanggal->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Tanggal->Visible = FALSE; // Disable update for API request
			else
				$this->Tanggal->setFormValue($val);
			$this->Tanggal->CurrentValue = UnFormatDateTime($this->Tanggal->CurrentValue, 7);
		}

		// Check field name 'Shipper_id' first before field var 'x_Shipper_id'
		$val = $CurrentForm->hasValue("Shipper_id") ? $CurrentForm->getValue("Shipper_id") : $CurrentForm->getValue("x_Shipper_id");
		if (!$this->Shipper_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Shipper_id->Visible = FALSE; // Disable update for API request
			else
				$this->Shipper_id->setFormValue($val);
		}

		// Check field name 'Dari_Lokasi' first before field var 'x_Dari_Lokasi'
		$val = $CurrentForm->hasValue("Dari_Lokasi") ? $CurrentForm->getValue("Dari_Lokasi") : $CurrentForm->getValue("x_Dari_Lokasi");
		if (!$this->Dari_Lokasi->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Dari_Lokasi->Visible = FALSE; // Disable update for API request
			else
				$this->Dari_Lokasi->setFormValue($val);
		}

		// Check field name 'Ke_Lokasi' first before field var 'x_Ke_Lokasi'
		$val = $CurrentForm->hasValue("Ke_Lokasi") ? $CurrentForm->getValue("Ke_Lokasi") : $CurrentForm->getValue("x_Ke_Lokasi");
		if (!$this->Ke_Lokasi->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Ke_Lokasi->Visible = FALSE; // Disable update for API request
			else
				$this->Ke_Lokasi->setFormValue($val);
		}

		// Check field name 'Jenis_Container' first before field var 'x_Jenis_Container'
		$val = $CurrentForm->hasValue("Jenis_Container") ? $CurrentForm->getValue("Jenis_Container") : $CurrentForm->getValue("x_Jenis_Container");
		if (!$this->Jenis_Container->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Jenis_Container->Visible = FALSE; // Disable update for API request
			else
				$this->Jenis_Container->setFormValue($val);
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

		// Check field name 'Keterangan' first before field var 'x_Keterangan'
		$val = $CurrentForm->hasValue("Keterangan") ? $CurrentForm->getValue("Keterangan") : $CurrentForm->getValue("x_Keterangan");
		if (!$this->Keterangan->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Keterangan->Visible = FALSE; // Disable update for API request
			else
				$this->Keterangan->setFormValue($val);
		}

		// Check field name 'Tagihan' first before field var 'x_Tagihan'
		$val = $CurrentForm->hasValue("Tagihan") ? $CurrentForm->getValue("Tagihan") : $CurrentForm->getValue("x_Tagihan");
		if (!$this->Tagihan->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Tagihan->Visible = FALSE; // Disable update for API request
			else
				$this->Tagihan->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->JO_id->CurrentValue = $this->JO_id->FormValue;
		$this->Nomor_Polisi_1->CurrentValue = $this->Nomor_Polisi_1->FormValue;
		$this->Nomor_Polisi_2->CurrentValue = $this->Nomor_Polisi_2->FormValue;
		$this->Nomor_Polisi_3->CurrentValue = $this->Nomor_Polisi_3->FormValue;
		$this->Tanggal->CurrentValue = $this->Tanggal->FormValue;
		$this->Tanggal->CurrentValue = UnFormatDateTime($this->Tanggal->CurrentValue, 7);
		$this->Shipper_id->CurrentValue = $this->Shipper_id->FormValue;
		$this->Dari_Lokasi->CurrentValue = $this->Dari_Lokasi->FormValue;
		$this->Ke_Lokasi->CurrentValue = $this->Ke_Lokasi->FormValue;
		$this->Jenis_Container->CurrentValue = $this->Jenis_Container->FormValue;
		$this->Nomor_Container_1->CurrentValue = $this->Nomor_Container_1->FormValue;
		$this->Nomor_Container_2->CurrentValue = $this->Nomor_Container_2->FormValue;
		$this->Keterangan->CurrentValue = $this->Keterangan->FormValue;
		$this->Tagihan->CurrentValue = $this->Tagihan->FormValue;
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
		$this->JO_id->setDbValue($row['JO_id']);
		$this->Nomor_Polisi_1->setDbValue($row['Nomor_Polisi_1']);
		$this->Nomor_Polisi_2->setDbValue($row['Nomor_Polisi_2']);
		$this->Nomor_Polisi_3->setDbValue($row['Nomor_Polisi_3']);
		$this->Tanggal->setDbValue($row['Tanggal']);
		$this->Shipper_id->setDbValue($row['Shipper_id']);
		$this->Dari_Lokasi->setDbValue($row['Dari_Lokasi']);
		$this->Ke_Lokasi->setDbValue($row['Ke_Lokasi']);
		$this->Jenis_Container->setDbValue($row['Jenis_Container']);
		$this->Nomor_Container_1->setDbValue($row['Nomor_Container_1']);
		$this->Nomor_Container_2->setDbValue($row['Nomor_Container_2']);
		$this->Keterangan->setDbValue($row['Keterangan']);
		$this->Tagihan->setDbValue($row['Tagihan']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['JO_id'] = $this->JO_id->CurrentValue;
		$row['Nomor_Polisi_1'] = $this->Nomor_Polisi_1->CurrentValue;
		$row['Nomor_Polisi_2'] = $this->Nomor_Polisi_2->CurrentValue;
		$row['Nomor_Polisi_3'] = $this->Nomor_Polisi_3->CurrentValue;
		$row['Tanggal'] = $this->Tanggal->CurrentValue;
		$row['Shipper_id'] = $this->Shipper_id->CurrentValue;
		$row['Dari_Lokasi'] = $this->Dari_Lokasi->CurrentValue;
		$row['Ke_Lokasi'] = $this->Ke_Lokasi->CurrentValue;
		$row['Jenis_Container'] = $this->Jenis_Container->CurrentValue;
		$row['Nomor_Container_1'] = $this->Nomor_Container_1->CurrentValue;
		$row['Nomor_Container_2'] = $this->Nomor_Container_2->CurrentValue;
		$row['Keterangan'] = $this->Keterangan->CurrentValue;
		$row['Tagihan'] = $this->Tagihan->CurrentValue;
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
		// Convert decimal values if posted back

		if ($this->Tagihan->FormValue == $this->Tagihan->CurrentValue && is_numeric(ConvertToFloatString($this->Tagihan->CurrentValue)))
			$this->Tagihan->CurrentValue = ConvertToFloatString($this->Tagihan->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// JO_id
		// Nomor_Polisi_1
		// Nomor_Polisi_2
		// Nomor_Polisi_3
		// Tanggal
		// Shipper_id
		// Dari_Lokasi
		// Ke_Lokasi
		// Jenis_Container
		// Nomor_Container_1
		// Nomor_Container_2
		// Keterangan
		// Tagihan

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// JO_id
			$this->JO_id->ViewValue = $this->JO_id->CurrentValue;
			$this->JO_id->ViewValue = FormatNumber($this->JO_id->ViewValue, 0, -2, -2, -2);
			$this->JO_id->ViewCustomAttributes = "";

			// Nomor_Polisi_1
			$this->Nomor_Polisi_1->ViewValue = $this->Nomor_Polisi_1->CurrentValue;
			$this->Nomor_Polisi_1->ViewCustomAttributes = "";

			// Nomor_Polisi_2
			$this->Nomor_Polisi_2->ViewValue = $this->Nomor_Polisi_2->CurrentValue;
			$this->Nomor_Polisi_2->ViewCustomAttributes = "";

			// Nomor_Polisi_3
			$this->Nomor_Polisi_3->ViewValue = $this->Nomor_Polisi_3->CurrentValue;
			$this->Nomor_Polisi_3->ViewCustomAttributes = "";

			// Tanggal
			$this->Tanggal->ViewValue = $this->Tanggal->CurrentValue;
			$this->Tanggal->ViewValue = FormatDateTime($this->Tanggal->ViewValue, 7);
			$this->Tanggal->ViewCustomAttributes = "";

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

			// Dari_Lokasi
			$this->Dari_Lokasi->ViewValue = $this->Dari_Lokasi->CurrentValue;
			$this->Dari_Lokasi->ViewCustomAttributes = "";

			// Ke_Lokasi
			$this->Ke_Lokasi->ViewValue = $this->Ke_Lokasi->CurrentValue;
			$this->Ke_Lokasi->ViewCustomAttributes = "";

			// Jenis_Container
			if (strval($this->Jenis_Container->CurrentValue) <> "") {
				$this->Jenis_Container->ViewValue = $this->Jenis_Container->optionCaption($this->Jenis_Container->CurrentValue);
			} else {
				$this->Jenis_Container->ViewValue = NULL;
			}
			$this->Jenis_Container->ViewCustomAttributes = "";

			// Nomor_Container_1
			$this->Nomor_Container_1->ViewValue = $this->Nomor_Container_1->CurrentValue;
			$this->Nomor_Container_1->ViewCustomAttributes = "";

			// Nomor_Container_2
			$this->Nomor_Container_2->ViewValue = $this->Nomor_Container_2->CurrentValue;
			$this->Nomor_Container_2->ViewCustomAttributes = "";

			// Keterangan
			$this->Keterangan->ViewValue = $this->Keterangan->CurrentValue;
			$this->Keterangan->ViewCustomAttributes = "";

			// Tagihan
			$this->Tagihan->ViewValue = $this->Tagihan->CurrentValue;
			$this->Tagihan->ViewValue = FormatNumber($this->Tagihan->ViewValue, 2, -2, -2, -2);
			$this->Tagihan->CellCssStyle .= "text-align: right;";
			$this->Tagihan->ViewCustomAttributes = "";

			// JO_id
			$this->JO_id->LinkCustomAttributes = "";
			$this->JO_id->HrefValue = "";
			$this->JO_id->TooltipValue = "";

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

			// Tanggal
			$this->Tanggal->LinkCustomAttributes = "";
			$this->Tanggal->HrefValue = "";
			$this->Tanggal->TooltipValue = "";

			// Shipper_id
			$this->Shipper_id->LinkCustomAttributes = "";
			$this->Shipper_id->HrefValue = "";
			$this->Shipper_id->TooltipValue = "";

			// Dari_Lokasi
			$this->Dari_Lokasi->LinkCustomAttributes = "";
			$this->Dari_Lokasi->HrefValue = "";
			$this->Dari_Lokasi->TooltipValue = "";

			// Ke_Lokasi
			$this->Ke_Lokasi->LinkCustomAttributes = "";
			$this->Ke_Lokasi->HrefValue = "";
			$this->Ke_Lokasi->TooltipValue = "";

			// Jenis_Container
			$this->Jenis_Container->LinkCustomAttributes = "";
			$this->Jenis_Container->HrefValue = "";
			$this->Jenis_Container->TooltipValue = "";

			// Nomor_Container_1
			$this->Nomor_Container_1->LinkCustomAttributes = "";
			$this->Nomor_Container_1->HrefValue = "";
			$this->Nomor_Container_1->TooltipValue = "";

			// Nomor_Container_2
			$this->Nomor_Container_2->LinkCustomAttributes = "";
			$this->Nomor_Container_2->HrefValue = "";
			$this->Nomor_Container_2->TooltipValue = "";

			// Keterangan
			$this->Keterangan->LinkCustomAttributes = "";
			$this->Keterangan->HrefValue = "";
			$this->Keterangan->TooltipValue = "";

			// Tagihan
			$this->Tagihan->LinkCustomAttributes = "";
			$this->Tagihan->HrefValue = "";
			$this->Tagihan->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// JO_id
			$this->JO_id->EditAttrs["class"] = "form-control";
			$this->JO_id->EditCustomAttributes = "";
			$this->JO_id->EditValue = HtmlEncode($this->JO_id->CurrentValue);
			$this->JO_id->PlaceHolder = RemoveHtml($this->JO_id->caption());

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

			// Tanggal
			$this->Tanggal->EditAttrs["class"] = "form-control";
			$this->Tanggal->EditCustomAttributes = "";
			$this->Tanggal->EditValue = HtmlEncode(FormatDateTime($this->Tanggal->CurrentValue, 7));
			$this->Tanggal->PlaceHolder = RemoveHtml($this->Tanggal->caption());

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

			// Dari_Lokasi
			$this->Dari_Lokasi->EditAttrs["class"] = "form-control";
			$this->Dari_Lokasi->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Dari_Lokasi->CurrentValue = HtmlDecode($this->Dari_Lokasi->CurrentValue);
			$this->Dari_Lokasi->EditValue = HtmlEncode($this->Dari_Lokasi->CurrentValue);
			$this->Dari_Lokasi->PlaceHolder = RemoveHtml($this->Dari_Lokasi->caption());

			// Ke_Lokasi
			$this->Ke_Lokasi->EditAttrs["class"] = "form-control";
			$this->Ke_Lokasi->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Ke_Lokasi->CurrentValue = HtmlDecode($this->Ke_Lokasi->CurrentValue);
			$this->Ke_Lokasi->EditValue = HtmlEncode($this->Ke_Lokasi->CurrentValue);
			$this->Ke_Lokasi->PlaceHolder = RemoveHtml($this->Ke_Lokasi->caption());

			// Jenis_Container
			$this->Jenis_Container->EditCustomAttributes = "";
			$this->Jenis_Container->EditValue = $this->Jenis_Container->options(FALSE);

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

			// Keterangan
			$this->Keterangan->EditAttrs["class"] = "form-control";
			$this->Keterangan->EditCustomAttributes = "";
			$this->Keterangan->EditValue = HtmlEncode($this->Keterangan->CurrentValue);
			$this->Keterangan->PlaceHolder = RemoveHtml($this->Keterangan->caption());

			// Tagihan
			$this->Tagihan->EditAttrs["class"] = "form-control";
			$this->Tagihan->EditCustomAttributes = "";
			$this->Tagihan->EditValue = HtmlEncode($this->Tagihan->CurrentValue);
			$this->Tagihan->PlaceHolder = RemoveHtml($this->Tagihan->caption());
			if (strval($this->Tagihan->EditValue) <> "" && is_numeric($this->Tagihan->EditValue))
				$this->Tagihan->EditValue = FormatNumber($this->Tagihan->EditValue, -2, -2, -2, -2);

			// Add refer script
			// JO_id

			$this->JO_id->LinkCustomAttributes = "";
			$this->JO_id->HrefValue = "";

			// Nomor_Polisi_1
			$this->Nomor_Polisi_1->LinkCustomAttributes = "";
			$this->Nomor_Polisi_1->HrefValue = "";

			// Nomor_Polisi_2
			$this->Nomor_Polisi_2->LinkCustomAttributes = "";
			$this->Nomor_Polisi_2->HrefValue = "";

			// Nomor_Polisi_3
			$this->Nomor_Polisi_3->LinkCustomAttributes = "";
			$this->Nomor_Polisi_3->HrefValue = "";

			// Tanggal
			$this->Tanggal->LinkCustomAttributes = "";
			$this->Tanggal->HrefValue = "";

			// Shipper_id
			$this->Shipper_id->LinkCustomAttributes = "";
			$this->Shipper_id->HrefValue = "";

			// Dari_Lokasi
			$this->Dari_Lokasi->LinkCustomAttributes = "";
			$this->Dari_Lokasi->HrefValue = "";

			// Ke_Lokasi
			$this->Ke_Lokasi->LinkCustomAttributes = "";
			$this->Ke_Lokasi->HrefValue = "";

			// Jenis_Container
			$this->Jenis_Container->LinkCustomAttributes = "";
			$this->Jenis_Container->HrefValue = "";

			// Nomor_Container_1
			$this->Nomor_Container_1->LinkCustomAttributes = "";
			$this->Nomor_Container_1->HrefValue = "";

			// Nomor_Container_2
			$this->Nomor_Container_2->LinkCustomAttributes = "";
			$this->Nomor_Container_2->HrefValue = "";

			// Keterangan
			$this->Keterangan->LinkCustomAttributes = "";
			$this->Keterangan->HrefValue = "";

			// Tagihan
			$this->Tagihan->LinkCustomAttributes = "";
			$this->Tagihan->HrefValue = "";
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
		if ($this->JO_id->Required) {
			if (!$this->JO_id->IsDetailKey && $this->JO_id->FormValue != NULL && $this->JO_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->JO_id->caption(), $this->JO_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->JO_id->FormValue)) {
			AddMessage($FormError, $this->JO_id->errorMessage());
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
		if ($this->Tanggal->Required) {
			if (!$this->Tanggal->IsDetailKey && $this->Tanggal->FormValue != NULL && $this->Tanggal->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Tanggal->caption(), $this->Tanggal->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->Tanggal->FormValue)) {
			AddMessage($FormError, $this->Tanggal->errorMessage());
		}
		if ($this->Shipper_id->Required) {
			if (!$this->Shipper_id->IsDetailKey && $this->Shipper_id->FormValue != NULL && $this->Shipper_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Shipper_id->caption(), $this->Shipper_id->RequiredErrorMessage));
			}
		}
		if ($this->Dari_Lokasi->Required) {
			if (!$this->Dari_Lokasi->IsDetailKey && $this->Dari_Lokasi->FormValue != NULL && $this->Dari_Lokasi->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Dari_Lokasi->caption(), $this->Dari_Lokasi->RequiredErrorMessage));
			}
		}
		if ($this->Ke_Lokasi->Required) {
			if (!$this->Ke_Lokasi->IsDetailKey && $this->Ke_Lokasi->FormValue != NULL && $this->Ke_Lokasi->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Ke_Lokasi->caption(), $this->Ke_Lokasi->RequiredErrorMessage));
			}
		}
		if ($this->Jenis_Container->Required) {
			if ($this->Jenis_Container->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Jenis_Container->caption(), $this->Jenis_Container->RequiredErrorMessage));
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
		if ($this->Keterangan->Required) {
			if (!$this->Keterangan->IsDetailKey && $this->Keterangan->FormValue != NULL && $this->Keterangan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Keterangan->caption(), $this->Keterangan->RequiredErrorMessage));
			}
		}
		if ($this->Tagihan->Required) {
			if (!$this->Tagihan->IsDetailKey && $this->Tagihan->FormValue != NULL && $this->Tagihan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Tagihan->caption(), $this->Tagihan->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Tagihan->FormValue)) {
			AddMessage($FormError, $this->Tagihan->errorMessage());
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

		// JO_id
		$this->JO_id->setDbValueDef($rsnew, $this->JO_id->CurrentValue, NULL, FALSE);

		// Nomor_Polisi_1
		$this->Nomor_Polisi_1->setDbValueDef($rsnew, $this->Nomor_Polisi_1->CurrentValue, "", strval($this->Nomor_Polisi_1->CurrentValue) == "");

		// Nomor_Polisi_2
		$this->Nomor_Polisi_2->setDbValueDef($rsnew, $this->Nomor_Polisi_2->CurrentValue, "", strval($this->Nomor_Polisi_2->CurrentValue) == "");

		// Nomor_Polisi_3
		$this->Nomor_Polisi_3->setDbValueDef($rsnew, $this->Nomor_Polisi_3->CurrentValue, "", strval($this->Nomor_Polisi_3->CurrentValue) == "");

		// Tanggal
		$this->Tanggal->setDbValueDef($rsnew, UnFormatDateTime($this->Tanggal->CurrentValue, 7), CurrentDate(), FALSE);

		// Shipper_id
		$this->Shipper_id->setDbValueDef($rsnew, $this->Shipper_id->CurrentValue, 0, FALSE);

		// Dari_Lokasi
		$this->Dari_Lokasi->setDbValueDef($rsnew, $this->Dari_Lokasi->CurrentValue, "", strval($this->Dari_Lokasi->CurrentValue) == "");

		// Ke_Lokasi
		$this->Ke_Lokasi->setDbValueDef($rsnew, $this->Ke_Lokasi->CurrentValue, "", strval($this->Ke_Lokasi->CurrentValue) == "");

		// Jenis_Container
		$this->Jenis_Container->setDbValueDef($rsnew, $this->Jenis_Container->CurrentValue, "", strval($this->Jenis_Container->CurrentValue) == "");

		// Nomor_Container_1
		$this->Nomor_Container_1->setDbValueDef($rsnew, $this->Nomor_Container_1->CurrentValue, "", strval($this->Nomor_Container_1->CurrentValue) == "");

		// Nomor_Container_2
		$this->Nomor_Container_2->setDbValueDef($rsnew, $this->Nomor_Container_2->CurrentValue, "", strval($this->Nomor_Container_2->CurrentValue) == "");

		// Keterangan
		$this->Keterangan->setDbValueDef($rsnew, $this->Keterangan->CurrentValue, "", FALSE);

		// Tagihan
		$this->Tagihan->setDbValueDef($rsnew, $this->Tagihan->CurrentValue, 0, strval($this->Tagihan->CurrentValue) == "");

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("t101_tagihan_truckinglist.php"), "", $this->TableVar, TRUE);
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
						case "x_Shipper_id":
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