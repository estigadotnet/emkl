<?php
namespace PHPMaker2019\emkl_prj;

/**
 * Page class
 */
class t096_employees_list extends t096_employees
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{D4B21A3D-A1C8-4ED3-BA65-212E10E691E7}";

	// Table name
	public $TableName = 't096_employees';

	// Page object name
	public $PageObjName = "t096_employees_list";

	// Grid form hidden field names
	public $FormName = "ft096_employeeslist";
	public $FormActionName = "k_action";
	public $FormKeyName = "k_key";
	public $FormOldKeyName = "k_oldkey";
	public $FormBlankRowName = "k_blankrow";
	public $FormKeyCountName = "key_count";

	// Page URLs
	public $AddUrl;
	public $EditUrl;
	public $CopyUrl;
	public $DeleteUrl;
	public $ViewUrl;
	public $ListUrl;
	public $CancelUrl;

	// Export URLs
	public $ExportPrintUrl;
	public $ExportHtmlUrl;
	public $ExportExcelUrl;
	public $ExportWordUrl;
	public $ExportXmlUrl;
	public $ExportCsvUrl;
	public $ExportPdfUrl;

	// Custom export
	public $ExportExcelCustom = FALSE;
	public $ExportWordCustom = FALSE;
	public $ExportPdfCustom = FALSE;
	public $ExportEmailCustom = FALSE;

	// Update URLs
	public $InlineAddUrl;
	public $InlineCopyUrl;
	public $InlineEditUrl;
	public $GridAddUrl;
	public $GridEditUrl;
	public $MultiDeleteUrl;
	public $MultiUpdateUrl;

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

		// Table object (t096_employees)
		if (!isset($GLOBALS["t096_employees"]) || get_class($GLOBALS["t096_employees"]) == PROJECT_NAMESPACE . "t096_employees") {
			$GLOBALS["t096_employees"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["t096_employees"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "t096_employeesadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "t096_employeesdelete.php";
		$this->MultiUpdateUrl = "t096_employeesupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 't096_employees');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = &$this->getConnection();

		// List options
		$this->ListOptions = new ListOptions();
		$this->ListOptions->TableVar = $this->TableVar;

		// Export options
		$this->ExportOptions = new ListOptions();
		$this->ExportOptions->Tag = "div";
		$this->ExportOptions->TagClassName = "ew-export-option";

		// Import options
		$this->ImportOptions = new ListOptions();
		$this->ImportOptions->Tag = "div";
		$this->ImportOptions->TagClassName = "ew-import-option";

		// Other options
		if (!$this->OtherOptions)
			$this->OtherOptions = new ListOptionsArray();
		$this->OtherOptions["addedit"] = new ListOptions();
		$this->OtherOptions["addedit"]->Tag = "div";
		$this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
		$this->OtherOptions["detail"] = new ListOptions();
		$this->OtherOptions["detail"]->Tag = "div";
		$this->OtherOptions["detail"]->TagClassName = "ew-detail-option";
		$this->OtherOptions["action"] = new ListOptions();
		$this->OtherOptions["action"]->Tag = "div";
		$this->OtherOptions["action"]->TagClassName = "ew-action-option";

		// Filter options
		$this->FilterOptions = new ListOptions();
		$this->FilterOptions->Tag = "div";
		$this->FilterOptions->TagClassName = "ew-filter-option ft096_employeeslistsrch";

		// List actions
		$this->ListActions = new ListActions();
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
		global $EXPORT, $t096_employees;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($t096_employees);
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
			SaveDebugMessage();
			AddHeader("Location", $url);
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
			$key .= @$ar['EmployeeID'];
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
			$this->EmployeeID->Visible = FALSE;
	}

	// Class variables
	public $ListOptions; // List options
	public $ExportOptions; // Export options
	public $SearchOptions; // Search options
	public $OtherOptions; // Other options
	public $FilterOptions; // Filter options
	public $ImportOptions; // Import options
	public $ListActions; // List actions
	public $SelectedCount = 0;
	public $SelectedIndex = 0;
	public $DisplayRecs = 50;
	public $StartRec;
	public $StopRec;
	public $TotalRecs = 0;
	public $RecRange = 10;
	public $Pager;
	public $AutoHidePager = AUTO_HIDE_PAGER;
	public $AutoHidePageSizeSelector = AUTO_HIDE_PAGE_SIZE_SELECTOR;
	public $DefaultSearchWhere = ""; // Default search WHERE clause
	public $SearchWhere = ""; // Search WHERE clause
	public $RecCnt = 0; // Record count
	public $EditRowCnt;
	public $StartRowCnt = 1;
	public $RowCnt = 0;
	public $Attrs = array(); // Row attributes and cell attributes
	public $RowIndex = 0; // Row index
	public $KeyCount = 0; // Key count
	public $RowAction = ""; // Row action
	public $RowOldKey = ""; // Row old key (for copy)
	public $MultiColumnClass = "col-sm";
	public $MultiColumnEditClass = "w-100";
	public $DbMasterFilter = ""; // Master filter
	public $DbDetailFilter = ""; // Detail filter
	public $MasterRecordExists;
	public $MultiSelectKey;
	public $Command;
	public $RestoreSearch = FALSE;
	public $DetailPages;
	public $OldRecordset;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$FormError, $SearchError, $EXPORT;

		// Init Session data for API request if token found
		if (IsApi() && session_status() !== PHP_SESSION_ACTIVE) {
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Param(TOKEN_NAME) !== NULL && $func(Param(TOKEN_NAME), SessionTimeoutTime()))
				session_start();
		}
		$this->CurrentAction = Param("action"); // Set up current action

		// Get grid add count
		$gridaddcnt = Get(TABLE_GRID_ADD_ROW_COUNT, "");
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->setupListOptions();
		$this->EmployeeID->setVisibility();
		$this->LastName->setVisibility();
		$this->FirstName->setVisibility();
		$this->Title->setVisibility();
		$this->TitleOfCourtesy->setVisibility();
		$this->BirthDate->setVisibility();
		$this->HireDate->setVisibility();
		$this->Address->setVisibility();
		$this->City->setVisibility();
		$this->Region->setVisibility();
		$this->PostalCode->setVisibility();
		$this->Country->setVisibility();
		$this->HomePhone->setVisibility();
		$this->Extension->setVisibility();
		$this->_Email->setVisibility();
		$this->Photo->setVisibility();
		$this->Notes->Visible = FALSE;
		$this->ReportsTo->setVisibility();
		$this->Password->setVisibility();
		$this->UserLevel->setVisibility();
		$this->Username->setVisibility();
		$this->Activated->setVisibility();
		$this->Profile->Visible = FALSE;
		$this->hideFieldsForAddEdit();

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

		// Setup other options
		$this->setupOtherOptions();

		// Set up custom action (compatible with old version)
		foreach ($this->CustomActions as $name => $action)
			$this->ListActions->add($name, $action);

		// Show checkbox column if multiple action
		foreach ($this->ListActions->Items as $listaction) {
			if ($listaction->Select == ACTION_MULTIPLE && $listaction->Allow) {
				$this->ListOptions->Items["checkbox"]->Visible = TRUE;
				break;
			}
		}

		// Set up lookup cache
		// Search filters

		$srchAdvanced = ""; // Advanced search filter
		$srchBasic = ""; // Basic search filter
		$filter = "";

		// Get command
		$this->Command = strtolower(Get("cmd"));
		if ($this->isPageRequest()) { // Validate request

			// Process list action first
			if ($this->processListAction()) // Ajax request
				$this->terminate();

			// Set up records per page
			$this->setupDisplayRecs();

			// Handle reset command
			$this->resetCmd();

			// Set up Breadcrumb
			if (!$this->isExport())
				$this->setupBreadcrumb();

			// Hide list options
			if ($this->isExport()) {
				$this->ListOptions->hideAllOptions(array("sequence"));
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			} elseif ($this->isGridAdd() || $this->isGridEdit()) {
				$this->ListOptions->hideAllOptions();
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			}

			// Hide options
			if ($this->isExport() || $this->CurrentAction) {
				$this->ExportOptions->hideAllOptions();
				$this->FilterOptions->hideAllOptions();
				$this->ImportOptions->hideAllOptions();
			}

			// Hide other options
			if ($this->isExport())
				$this->OtherOptions->hideAllOptions();

			// Get default search criteria
			AddFilter($this->DefaultSearchWhere, $this->basicSearchWhere(TRUE));
			AddFilter($this->DefaultSearchWhere, $this->advancedSearchWhere(TRUE));

			// Get basic search values
			$this->loadBasicSearchValues();

			// Get and validate search values for advanced search
			$this->loadSearchValues(); // Get search values

			// Process filter list
			if ($this->processFilterList())
				$this->terminate();
			if (!$this->validateSearch())
				$this->setFailureMessage($SearchError);

			// Restore search parms from Session if not searching / reset / export
			if (($this->isExport() || $this->Command <> "search" && $this->Command <> "reset" && $this->Command <> "resetall") && $this->Command <> "json" && $this->checkSearchParms())
				$this->restoreSearchParms();

			// Call Recordset SearchValidated event
			$this->Recordset_SearchValidated();

			// Set up sorting order
			$this->setupSortOrder();

			// Get basic search criteria
			if ($SearchError == "")
				$srchBasic = $this->basicSearchWhere();

			// Get search criteria for advanced search
			if ($SearchError == "")
				$srchAdvanced = $this->advancedSearchWhere();
		}

		// Restore display records
		if ($this->Command <> "json" && $this->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $this->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 50; // Load default
		}

		// Load Sorting Order
		if ($this->Command <> "json")
			$this->loadSortOrder();

		// Load search default if no existing search criteria
		if (!$this->checkSearchParms()) {

			// Load basic search from default
			$this->BasicSearch->loadDefault();
			if ($this->BasicSearch->Keyword != "")
				$srchBasic = $this->basicSearchWhere();

			// Load advanced search from default
			if ($this->loadAdvancedSearchDefault()) {
				$srchAdvanced = $this->advancedSearchWhere();
			}
		}

		// Build search criteria
		AddFilter($this->SearchWhere, $srchAdvanced);
		AddFilter($this->SearchWhere, $srchBasic);

		// Call Recordset_Searching event
		$this->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->Command == "search" && !$this->RestoreSearch) {
			$this->setSearchWhere($this->SearchWhere); // Save to Session
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif ($this->Command <> "json") {
			$this->SearchWhere = $this->getSearchWhere();
		}

		// Build filter
		$filter = "";
		AddFilter($filter, $this->DbDetailFilter);
		AddFilter($filter, $this->SearchWhere);

		// Set up filter
		if ($this->Command == "json") {
			$this->UseSessionForListSql = FALSE; // Do not use session for ListSQL
			$this->CurrentFilter = $filter;
		} else {
			$this->setSessionWhere($filter);
			$this->CurrentFilter = "";
		}
		if ($this->isGridAdd()) {
			$this->CurrentFilter = "0=1";
			$this->StartRec = 1;
			$this->DisplayRecs = $this->GridAddRowCount;
			$this->TotalRecs = $this->DisplayRecs;
			$this->StopRec = $this->DisplayRecs;
		} else {
			$selectLimit = $this->UseSelectLimit;
			if ($selectLimit) {
				$this->TotalRecs = $this->listRecordCount();
			} else {
				if ($this->Recordset = $this->loadRecordset())
					$this->TotalRecs = $this->Recordset->RecordCount();
			}
			$this->StartRec = 1;
			if ($this->DisplayRecs <= 0 || ($this->isExport() && $this->ExportAll)) // Display all records
				$this->DisplayRecs = $this->TotalRecs;
			if (!($this->isExport() && $this->ExportAll)) // Set up start record position
				$this->setupStartRec();
			if ($selectLimit)
				$this->Recordset = $this->loadRecordset($this->StartRec - 1, $this->DisplayRecs);

			// Set no record found message
			if (!$this->CurrentAction && $this->TotalRecs == 0) {
				if ($this->SearchWhere == "0=101")
					$this->setWarningMessage($Language->phrase("EnterSearchCriteria"));
				else
					$this->setWarningMessage($Language->phrase("NoRecord"));
			}

			// Audit trail on search
			if ($this->AuditTrailOnSearch && $this->Command == "search" && !$this->RestoreSearch) {
				$searchParm = ServerVar("QUERY_STRING");
				$searchSql = $this->getSessionWhere();
				$this->writeAuditTrailOnSearch($searchParm, $searchSql);
			}
		}

		// Search options
		$this->setupSearchOptions();

		// Normal return
		if (IsApi()) {
			$rows = $this->getRecordsFromRecordset($this->Recordset);
			$this->Recordset->close();
			WriteJson(["success" => TRUE, $this->TableVar => $rows, "totalRecordCount" => $this->TotalRecs]);
			$this->terminate(TRUE);
		}
	}

	// Set up number of records displayed per page
	protected function setupDisplayRecs()
	{
		$wrk = Get(TABLE_REC_PER_PAGE, "");
		if ($wrk <> "") {
			if (is_numeric($wrk)) {
				$this->DisplayRecs = (int)$wrk;
			} else {
				if (SameText($wrk, "all")) { // Display all records
					$this->DisplayRecs = -1;
				} else {
					$this->DisplayRecs = 50; // Non-numeric, load default
				}
			}
			$this->setRecordsPerPage($this->DisplayRecs); // Save to Session

			// Reset start position
			$this->StartRec = 1;
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Build filter for all keys
	protected function buildKeyFilter()
	{
		global $CurrentForm;
		$wrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$CurrentForm->Index = $rowindex;
		$thisKey = strval($CurrentForm->getValue($this->FormKeyName));
		while ($thisKey <> "") {
			if ($this->setupKeyValues($thisKey)) {
				$filter = $this->getRecordFilter();
				if ($wrkFilter <> "")
					$wrkFilter .= " OR ";
				$wrkFilter .= $filter;
			} else {
				$wrkFilter = "0=1";
				break;
			}

			// Update row index and get row key
			$rowindex++; // Next row
			$CurrentForm->Index = $rowindex;
			$thisKey = strval($CurrentForm->getValue($this->FormKeyName));
		}
		return $wrkFilter;
	}

	// Set up key values
	protected function setupKeyValues($key)
	{
		$arKeyFlds = explode($GLOBALS["COMPOSITE_KEY_SEPARATOR"], $key);
		if (count($arKeyFlds) >= 1) {
			$this->EmployeeID->setFormValue($arKeyFlds[0]);
			if (!is_numeric($this->EmployeeID->FormValue))
				return FALSE;
		}
		return TRUE;
	}

	// Get list of filters
	public function getFilterList()
	{
		global $UserProfile;

		// Initialize
		$filterList = "";
		$savedFilterList = "";
		$filterList = Concat($filterList, $this->EmployeeID->AdvancedSearch->toJson(), ","); // Field EmployeeID
		$filterList = Concat($filterList, $this->LastName->AdvancedSearch->toJson(), ","); // Field LastName
		$filterList = Concat($filterList, $this->FirstName->AdvancedSearch->toJson(), ","); // Field FirstName
		$filterList = Concat($filterList, $this->Title->AdvancedSearch->toJson(), ","); // Field Title
		$filterList = Concat($filterList, $this->TitleOfCourtesy->AdvancedSearch->toJson(), ","); // Field TitleOfCourtesy
		$filterList = Concat($filterList, $this->BirthDate->AdvancedSearch->toJson(), ","); // Field BirthDate
		$filterList = Concat($filterList, $this->HireDate->AdvancedSearch->toJson(), ","); // Field HireDate
		$filterList = Concat($filterList, $this->Address->AdvancedSearch->toJson(), ","); // Field Address
		$filterList = Concat($filterList, $this->City->AdvancedSearch->toJson(), ","); // Field City
		$filterList = Concat($filterList, $this->Region->AdvancedSearch->toJson(), ","); // Field Region
		$filterList = Concat($filterList, $this->PostalCode->AdvancedSearch->toJson(), ","); // Field PostalCode
		$filterList = Concat($filterList, $this->Country->AdvancedSearch->toJson(), ","); // Field Country
		$filterList = Concat($filterList, $this->HomePhone->AdvancedSearch->toJson(), ","); // Field HomePhone
		$filterList = Concat($filterList, $this->Extension->AdvancedSearch->toJson(), ","); // Field Extension
		$filterList = Concat($filterList, $this->_Email->AdvancedSearch->toJson(), ","); // Field Email
		$filterList = Concat($filterList, $this->Photo->AdvancedSearch->toJson(), ","); // Field Photo
		$filterList = Concat($filterList, $this->Notes->AdvancedSearch->toJson(), ","); // Field Notes
		$filterList = Concat($filterList, $this->ReportsTo->AdvancedSearch->toJson(), ","); // Field ReportsTo
		$filterList = Concat($filterList, $this->Password->AdvancedSearch->toJson(), ","); // Field Password
		$filterList = Concat($filterList, $this->UserLevel->AdvancedSearch->toJson(), ","); // Field UserLevel
		$filterList = Concat($filterList, $this->Username->AdvancedSearch->toJson(), ","); // Field Username
		$filterList = Concat($filterList, $this->Activated->AdvancedSearch->toJson(), ","); // Field Activated
		$filterList = Concat($filterList, $this->Profile->AdvancedSearch->toJson(), ","); // Field Profile
		if ($this->BasicSearch->Keyword <> "") {
			$wrk = "\"" . TABLE_BASIC_SEARCH . "\":\"" . JsEncode($this->BasicSearch->Keyword) . "\",\"" . TABLE_BASIC_SEARCH_TYPE . "\":\"" . JsEncode($this->BasicSearch->Type) . "\"";
			$filterList = Concat($filterList, $wrk, ",");
		}

		// Return filter list in JSON
		if ($filterList <> "")
			$filterList = "\"data\":{" . $filterList . "}";
		if ($savedFilterList <> "")
			$filterList = Concat($filterList, "\"filters\":" . $savedFilterList, ",");
		return ($filterList <> "") ? "{" . $filterList . "}" : "null";
	}

	// Process filter list
	protected function processFilterList()
	{
		global $UserProfile;
		if (Post("ajax") == "savefilters") { // Save filter request (Ajax)
			$filters = Post("filters");
			$UserProfile->setSearchFilters(CurrentUserName(), "ft096_employeeslistsrch", $filters);
			WriteJson([["success" => TRUE]]); // Success
			return TRUE;
		} elseif (Post("cmd") == "resetfilter") {
			$this->restoreFilterList();
		}
		return FALSE;
	}

	// Restore list of filters
	protected function restoreFilterList()
	{

		// Return if not reset filter
		if (Post("cmd") !== "resetfilter")
			return FALSE;
		$filter = json_decode(Post("filter"), TRUE);
		$this->Command = "search";

		// Field EmployeeID
		$this->EmployeeID->AdvancedSearch->SearchValue = @$filter["x_EmployeeID"];
		$this->EmployeeID->AdvancedSearch->SearchOperator = @$filter["z_EmployeeID"];
		$this->EmployeeID->AdvancedSearch->SearchCondition = @$filter["v_EmployeeID"];
		$this->EmployeeID->AdvancedSearch->SearchValue2 = @$filter["y_EmployeeID"];
		$this->EmployeeID->AdvancedSearch->SearchOperator2 = @$filter["w_EmployeeID"];
		$this->EmployeeID->AdvancedSearch->save();

		// Field LastName
		$this->LastName->AdvancedSearch->SearchValue = @$filter["x_LastName"];
		$this->LastName->AdvancedSearch->SearchOperator = @$filter["z_LastName"];
		$this->LastName->AdvancedSearch->SearchCondition = @$filter["v_LastName"];
		$this->LastName->AdvancedSearch->SearchValue2 = @$filter["y_LastName"];
		$this->LastName->AdvancedSearch->SearchOperator2 = @$filter["w_LastName"];
		$this->LastName->AdvancedSearch->save();

		// Field FirstName
		$this->FirstName->AdvancedSearch->SearchValue = @$filter["x_FirstName"];
		$this->FirstName->AdvancedSearch->SearchOperator = @$filter["z_FirstName"];
		$this->FirstName->AdvancedSearch->SearchCondition = @$filter["v_FirstName"];
		$this->FirstName->AdvancedSearch->SearchValue2 = @$filter["y_FirstName"];
		$this->FirstName->AdvancedSearch->SearchOperator2 = @$filter["w_FirstName"];
		$this->FirstName->AdvancedSearch->save();

		// Field Title
		$this->Title->AdvancedSearch->SearchValue = @$filter["x_Title"];
		$this->Title->AdvancedSearch->SearchOperator = @$filter["z_Title"];
		$this->Title->AdvancedSearch->SearchCondition = @$filter["v_Title"];
		$this->Title->AdvancedSearch->SearchValue2 = @$filter["y_Title"];
		$this->Title->AdvancedSearch->SearchOperator2 = @$filter["w_Title"];
		$this->Title->AdvancedSearch->save();

		// Field TitleOfCourtesy
		$this->TitleOfCourtesy->AdvancedSearch->SearchValue = @$filter["x_TitleOfCourtesy"];
		$this->TitleOfCourtesy->AdvancedSearch->SearchOperator = @$filter["z_TitleOfCourtesy"];
		$this->TitleOfCourtesy->AdvancedSearch->SearchCondition = @$filter["v_TitleOfCourtesy"];
		$this->TitleOfCourtesy->AdvancedSearch->SearchValue2 = @$filter["y_TitleOfCourtesy"];
		$this->TitleOfCourtesy->AdvancedSearch->SearchOperator2 = @$filter["w_TitleOfCourtesy"];
		$this->TitleOfCourtesy->AdvancedSearch->save();

		// Field BirthDate
		$this->BirthDate->AdvancedSearch->SearchValue = @$filter["x_BirthDate"];
		$this->BirthDate->AdvancedSearch->SearchOperator = @$filter["z_BirthDate"];
		$this->BirthDate->AdvancedSearch->SearchCondition = @$filter["v_BirthDate"];
		$this->BirthDate->AdvancedSearch->SearchValue2 = @$filter["y_BirthDate"];
		$this->BirthDate->AdvancedSearch->SearchOperator2 = @$filter["w_BirthDate"];
		$this->BirthDate->AdvancedSearch->save();

		// Field HireDate
		$this->HireDate->AdvancedSearch->SearchValue = @$filter["x_HireDate"];
		$this->HireDate->AdvancedSearch->SearchOperator = @$filter["z_HireDate"];
		$this->HireDate->AdvancedSearch->SearchCondition = @$filter["v_HireDate"];
		$this->HireDate->AdvancedSearch->SearchValue2 = @$filter["y_HireDate"];
		$this->HireDate->AdvancedSearch->SearchOperator2 = @$filter["w_HireDate"];
		$this->HireDate->AdvancedSearch->save();

		// Field Address
		$this->Address->AdvancedSearch->SearchValue = @$filter["x_Address"];
		$this->Address->AdvancedSearch->SearchOperator = @$filter["z_Address"];
		$this->Address->AdvancedSearch->SearchCondition = @$filter["v_Address"];
		$this->Address->AdvancedSearch->SearchValue2 = @$filter["y_Address"];
		$this->Address->AdvancedSearch->SearchOperator2 = @$filter["w_Address"];
		$this->Address->AdvancedSearch->save();

		// Field City
		$this->City->AdvancedSearch->SearchValue = @$filter["x_City"];
		$this->City->AdvancedSearch->SearchOperator = @$filter["z_City"];
		$this->City->AdvancedSearch->SearchCondition = @$filter["v_City"];
		$this->City->AdvancedSearch->SearchValue2 = @$filter["y_City"];
		$this->City->AdvancedSearch->SearchOperator2 = @$filter["w_City"];
		$this->City->AdvancedSearch->save();

		// Field Region
		$this->Region->AdvancedSearch->SearchValue = @$filter["x_Region"];
		$this->Region->AdvancedSearch->SearchOperator = @$filter["z_Region"];
		$this->Region->AdvancedSearch->SearchCondition = @$filter["v_Region"];
		$this->Region->AdvancedSearch->SearchValue2 = @$filter["y_Region"];
		$this->Region->AdvancedSearch->SearchOperator2 = @$filter["w_Region"];
		$this->Region->AdvancedSearch->save();

		// Field PostalCode
		$this->PostalCode->AdvancedSearch->SearchValue = @$filter["x_PostalCode"];
		$this->PostalCode->AdvancedSearch->SearchOperator = @$filter["z_PostalCode"];
		$this->PostalCode->AdvancedSearch->SearchCondition = @$filter["v_PostalCode"];
		$this->PostalCode->AdvancedSearch->SearchValue2 = @$filter["y_PostalCode"];
		$this->PostalCode->AdvancedSearch->SearchOperator2 = @$filter["w_PostalCode"];
		$this->PostalCode->AdvancedSearch->save();

		// Field Country
		$this->Country->AdvancedSearch->SearchValue = @$filter["x_Country"];
		$this->Country->AdvancedSearch->SearchOperator = @$filter["z_Country"];
		$this->Country->AdvancedSearch->SearchCondition = @$filter["v_Country"];
		$this->Country->AdvancedSearch->SearchValue2 = @$filter["y_Country"];
		$this->Country->AdvancedSearch->SearchOperator2 = @$filter["w_Country"];
		$this->Country->AdvancedSearch->save();

		// Field HomePhone
		$this->HomePhone->AdvancedSearch->SearchValue = @$filter["x_HomePhone"];
		$this->HomePhone->AdvancedSearch->SearchOperator = @$filter["z_HomePhone"];
		$this->HomePhone->AdvancedSearch->SearchCondition = @$filter["v_HomePhone"];
		$this->HomePhone->AdvancedSearch->SearchValue2 = @$filter["y_HomePhone"];
		$this->HomePhone->AdvancedSearch->SearchOperator2 = @$filter["w_HomePhone"];
		$this->HomePhone->AdvancedSearch->save();

		// Field Extension
		$this->Extension->AdvancedSearch->SearchValue = @$filter["x_Extension"];
		$this->Extension->AdvancedSearch->SearchOperator = @$filter["z_Extension"];
		$this->Extension->AdvancedSearch->SearchCondition = @$filter["v_Extension"];
		$this->Extension->AdvancedSearch->SearchValue2 = @$filter["y_Extension"];
		$this->Extension->AdvancedSearch->SearchOperator2 = @$filter["w_Extension"];
		$this->Extension->AdvancedSearch->save();

		// Field Email
		$this->_Email->AdvancedSearch->SearchValue = @$filter["x__Email"];
		$this->_Email->AdvancedSearch->SearchOperator = @$filter["z__Email"];
		$this->_Email->AdvancedSearch->SearchCondition = @$filter["v__Email"];
		$this->_Email->AdvancedSearch->SearchValue2 = @$filter["y__Email"];
		$this->_Email->AdvancedSearch->SearchOperator2 = @$filter["w__Email"];
		$this->_Email->AdvancedSearch->save();

		// Field Photo
		$this->Photo->AdvancedSearch->SearchValue = @$filter["x_Photo"];
		$this->Photo->AdvancedSearch->SearchOperator = @$filter["z_Photo"];
		$this->Photo->AdvancedSearch->SearchCondition = @$filter["v_Photo"];
		$this->Photo->AdvancedSearch->SearchValue2 = @$filter["y_Photo"];
		$this->Photo->AdvancedSearch->SearchOperator2 = @$filter["w_Photo"];
		$this->Photo->AdvancedSearch->save();

		// Field Notes
		$this->Notes->AdvancedSearch->SearchValue = @$filter["x_Notes"];
		$this->Notes->AdvancedSearch->SearchOperator = @$filter["z_Notes"];
		$this->Notes->AdvancedSearch->SearchCondition = @$filter["v_Notes"];
		$this->Notes->AdvancedSearch->SearchValue2 = @$filter["y_Notes"];
		$this->Notes->AdvancedSearch->SearchOperator2 = @$filter["w_Notes"];
		$this->Notes->AdvancedSearch->save();

		// Field ReportsTo
		$this->ReportsTo->AdvancedSearch->SearchValue = @$filter["x_ReportsTo"];
		$this->ReportsTo->AdvancedSearch->SearchOperator = @$filter["z_ReportsTo"];
		$this->ReportsTo->AdvancedSearch->SearchCondition = @$filter["v_ReportsTo"];
		$this->ReportsTo->AdvancedSearch->SearchValue2 = @$filter["y_ReportsTo"];
		$this->ReportsTo->AdvancedSearch->SearchOperator2 = @$filter["w_ReportsTo"];
		$this->ReportsTo->AdvancedSearch->save();

		// Field Password
		$this->Password->AdvancedSearch->SearchValue = @$filter["x_Password"];
		$this->Password->AdvancedSearch->SearchOperator = @$filter["z_Password"];
		$this->Password->AdvancedSearch->SearchCondition = @$filter["v_Password"];
		$this->Password->AdvancedSearch->SearchValue2 = @$filter["y_Password"];
		$this->Password->AdvancedSearch->SearchOperator2 = @$filter["w_Password"];
		$this->Password->AdvancedSearch->save();

		// Field UserLevel
		$this->UserLevel->AdvancedSearch->SearchValue = @$filter["x_UserLevel"];
		$this->UserLevel->AdvancedSearch->SearchOperator = @$filter["z_UserLevel"];
		$this->UserLevel->AdvancedSearch->SearchCondition = @$filter["v_UserLevel"];
		$this->UserLevel->AdvancedSearch->SearchValue2 = @$filter["y_UserLevel"];
		$this->UserLevel->AdvancedSearch->SearchOperator2 = @$filter["w_UserLevel"];
		$this->UserLevel->AdvancedSearch->save();

		// Field Username
		$this->Username->AdvancedSearch->SearchValue = @$filter["x_Username"];
		$this->Username->AdvancedSearch->SearchOperator = @$filter["z_Username"];
		$this->Username->AdvancedSearch->SearchCondition = @$filter["v_Username"];
		$this->Username->AdvancedSearch->SearchValue2 = @$filter["y_Username"];
		$this->Username->AdvancedSearch->SearchOperator2 = @$filter["w_Username"];
		$this->Username->AdvancedSearch->save();

		// Field Activated
		$this->Activated->AdvancedSearch->SearchValue = @$filter["x_Activated"];
		$this->Activated->AdvancedSearch->SearchOperator = @$filter["z_Activated"];
		$this->Activated->AdvancedSearch->SearchCondition = @$filter["v_Activated"];
		$this->Activated->AdvancedSearch->SearchValue2 = @$filter["y_Activated"];
		$this->Activated->AdvancedSearch->SearchOperator2 = @$filter["w_Activated"];
		$this->Activated->AdvancedSearch->save();

		// Field Profile
		$this->Profile->AdvancedSearch->SearchValue = @$filter["x_Profile"];
		$this->Profile->AdvancedSearch->SearchOperator = @$filter["z_Profile"];
		$this->Profile->AdvancedSearch->SearchCondition = @$filter["v_Profile"];
		$this->Profile->AdvancedSearch->SearchValue2 = @$filter["y_Profile"];
		$this->Profile->AdvancedSearch->SearchOperator2 = @$filter["w_Profile"];
		$this->Profile->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[TABLE_BASIC_SEARCH]);
		$this->BasicSearch->setType(@$filter[TABLE_BASIC_SEARCH_TYPE]);
	}

	// Advanced search WHERE clause based on QueryString
	protected function advancedSearchWhere($default = FALSE)
	{
		global $Security;
		$where = "";
		$this->buildSearchSql($where, $this->EmployeeID, $default, FALSE); // EmployeeID
		$this->buildSearchSql($where, $this->LastName, $default, FALSE); // LastName
		$this->buildSearchSql($where, $this->FirstName, $default, FALSE); // FirstName
		$this->buildSearchSql($where, $this->Title, $default, FALSE); // Title
		$this->buildSearchSql($where, $this->TitleOfCourtesy, $default, FALSE); // TitleOfCourtesy
		$this->buildSearchSql($where, $this->BirthDate, $default, FALSE); // BirthDate
		$this->buildSearchSql($where, $this->HireDate, $default, FALSE); // HireDate
		$this->buildSearchSql($where, $this->Address, $default, FALSE); // Address
		$this->buildSearchSql($where, $this->City, $default, FALSE); // City
		$this->buildSearchSql($where, $this->Region, $default, FALSE); // Region
		$this->buildSearchSql($where, $this->PostalCode, $default, FALSE); // PostalCode
		$this->buildSearchSql($where, $this->Country, $default, FALSE); // Country
		$this->buildSearchSql($where, $this->HomePhone, $default, FALSE); // HomePhone
		$this->buildSearchSql($where, $this->Extension, $default, FALSE); // Extension
		$this->buildSearchSql($where, $this->_Email, $default, FALSE); // Email
		$this->buildSearchSql($where, $this->Photo, $default, FALSE); // Photo
		$this->buildSearchSql($where, $this->Notes, $default, FALSE); // Notes
		$this->buildSearchSql($where, $this->ReportsTo, $default, FALSE); // ReportsTo
		$this->buildSearchSql($where, $this->Password, $default, FALSE); // Password
		$this->buildSearchSql($where, $this->UserLevel, $default, FALSE); // UserLevel
		$this->buildSearchSql($where, $this->Username, $default, FALSE); // Username
		$this->buildSearchSql($where, $this->Activated, $default, FALSE); // Activated
		$this->buildSearchSql($where, $this->Profile, $default, FALSE); // Profile

		// Set up search parm
		if (!$default && $where <> "" && in_array($this->Command, array("", "reset", "resetall"))) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->EmployeeID->AdvancedSearch->save(); // EmployeeID
			$this->LastName->AdvancedSearch->save(); // LastName
			$this->FirstName->AdvancedSearch->save(); // FirstName
			$this->Title->AdvancedSearch->save(); // Title
			$this->TitleOfCourtesy->AdvancedSearch->save(); // TitleOfCourtesy
			$this->BirthDate->AdvancedSearch->save(); // BirthDate
			$this->HireDate->AdvancedSearch->save(); // HireDate
			$this->Address->AdvancedSearch->save(); // Address
			$this->City->AdvancedSearch->save(); // City
			$this->Region->AdvancedSearch->save(); // Region
			$this->PostalCode->AdvancedSearch->save(); // PostalCode
			$this->Country->AdvancedSearch->save(); // Country
			$this->HomePhone->AdvancedSearch->save(); // HomePhone
			$this->Extension->AdvancedSearch->save(); // Extension
			$this->_Email->AdvancedSearch->save(); // Email
			$this->Photo->AdvancedSearch->save(); // Photo
			$this->Notes->AdvancedSearch->save(); // Notes
			$this->ReportsTo->AdvancedSearch->save(); // ReportsTo
			$this->Password->AdvancedSearch->save(); // Password
			$this->UserLevel->AdvancedSearch->save(); // UserLevel
			$this->Username->AdvancedSearch->save(); // Username
			$this->Activated->AdvancedSearch->save(); // Activated
			$this->Profile->AdvancedSearch->save(); // Profile
		}
		return $where;
	}

	// Build search SQL
	protected function buildSearchSql(&$where, &$fld, $default, $multiValue)
	{
		$fldParm = $fld->Param;
		$fldVal = ($default) ? $fld->AdvancedSearch->SearchValueDefault : $fld->AdvancedSearch->SearchValue;
		$fldOpr = ($default) ? $fld->AdvancedSearch->SearchOperatorDefault : $fld->AdvancedSearch->SearchOperator;
		$fldCond = ($default) ? $fld->AdvancedSearch->SearchConditionDefault : $fld->AdvancedSearch->SearchCondition;
		$fldVal2 = ($default) ? $fld->AdvancedSearch->SearchValue2Default : $fld->AdvancedSearch->SearchValue2;
		$fldOpr2 = ($default) ? $fld->AdvancedSearch->SearchOperator2Default : $fld->AdvancedSearch->SearchOperator2;
		$wrk = "";
		if (is_array($fldVal))
			$fldVal = implode(",", $fldVal);
		if (is_array($fldVal2))
			$fldVal2 = implode(",", $fldVal2);
		$fldOpr = strtoupper(trim($fldOpr));
		if ($fldOpr == "")
			$fldOpr = "=";
		$fldOpr2 = strtoupper(trim($fldOpr2));
		if ($fldOpr2 == "")
			$fldOpr2 = "=";
		if (SEARCH_MULTI_VALUE_OPTION == 1)
			$multiValue = FALSE;
		if ($multiValue) {
			$wrk1 = ($fldVal <> "") ? GetMultiSearchSql($fld, $fldOpr, $fldVal, $this->Dbid) : ""; // Field value 1
			$wrk2 = ($fldVal2 <> "") ? GetMultiSearchSql($fld, $fldOpr2, $fldVal2, $this->Dbid) : ""; // Field value 2
			$wrk = $wrk1; // Build final SQL
			if ($wrk2 <> "")
				$wrk = ($wrk <> "") ? "($wrk) $fldCond ($wrk2)" : $wrk2;
		} else {
			$fldVal = $this->convertSearchValue($fld, $fldVal);
			$fldVal2 = $this->convertSearchValue($fld, $fldVal2);
			$wrk = GetSearchSql($fld, $fldVal, $fldOpr, $fldCond, $fldVal2, $fldOpr2, $this->Dbid);
		}
		AddFilter($where, $wrk);
	}

	// Convert search value
	protected function convertSearchValue(&$fld, $fldVal)
	{
		if ($fldVal == NULL_VALUE || $fldVal == NOT_NULL_VALUE)
			return $fldVal;
		$value = $fldVal;
		if ($fld->DataType == DATATYPE_BOOLEAN) {
			if ($fldVal <> "")
				$value = (SameText($fldVal, "1") || SameText($fldVal, "y") || SameText($fldVal, "t")) ? $fld->TrueValue : $fld->FalseValue;
		} elseif ($fld->DataType == DATATYPE_DATE || $fld->DataType == DATATYPE_TIME) {
			if ($fldVal <> "")
				$value = UnFormatDateTime($fldVal, $fld->DateTimeFormat);
		}
		return $value;
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->LastName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FirstName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Title, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TitleOfCourtesy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Address, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->City, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Region, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PostalCode, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Country, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HomePhone, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Extension, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->_Email, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Photo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Notes, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Password, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Username, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Profile, $arKeywords, $type);
		return $where;
	}

	// Build basic search SQL
	protected function buildBasicSearchSql(&$where, &$fld, $arKeywords, $type)
	{
		global $BASIC_SEARCH_IGNORE_PATTERN;
		$defCond = ($type == "OR") ? "OR" : "AND";
		$arSql = array(); // Array for SQL parts
		$arCond = array(); // Array for search conditions
		$cnt = count($arKeywords);
		$j = 0; // Number of SQL parts
		for ($i = 0; $i < $cnt; $i++) {
			$keyword = $arKeywords[$i];
			$keyword = trim($keyword);
			if ($BASIC_SEARCH_IGNORE_PATTERN <> "") {
				$keyword = preg_replace($BASIC_SEARCH_IGNORE_PATTERN, "\\", $keyword);
				$ar = explode("\\", $keyword);
			} else {
				$ar = array($keyword);
			}
			foreach ($ar as $keyword) {
				if ($keyword <> "") {
					$wrk = "";
					if ($keyword == "OR" && $type == "") {
						if ($j > 0)
							$arCond[$j - 1] = "OR";
					} elseif ($keyword == NULL_VALUE) {
						$wrk = $fld->Expression . " IS NULL";
					} elseif ($keyword == NOT_NULL_VALUE) {
						$wrk = $fld->Expression . " IS NOT NULL";
					} elseif ($fld->IsVirtual) {
						$wrk = $fld->VirtualExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
					} elseif ($fld->DataType != DATATYPE_NUMBER || is_numeric($keyword)) {
						$wrk = $fld->BasicSearchExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
					}
					if ($wrk <> "") {
						$arSql[$j] = $wrk;
						$arCond[$j] = $defCond;
						$j += 1;
					}
				}
			}
		}
		$cnt = count($arSql);
		$quoted = FALSE;
		$sql = "";
		if ($cnt > 0) {
			for ($i = 0; $i < $cnt - 1; $i++) {
				if ($arCond[$i] == "OR") {
					if (!$quoted)
						$sql .= "(";
					$quoted = TRUE;
				}
				$sql .= $arSql[$i];
				if ($quoted && $arCond[$i] <> "OR") {
					$sql .= ")";
					$quoted = FALSE;
				}
				$sql .= " " . $arCond[$i] . " ";
			}
			$sql .= $arSql[$cnt - 1];
			if ($quoted)
				$sql .= ")";
		}
		if ($sql <> "") {
			if ($where <> "")
				$where .= " OR ";
			$where .= "(" . $sql . ")";
		}
	}

	// Return basic search WHERE clause based on search keyword and type
	protected function basicSearchWhere($default = FALSE)
	{
		global $Security;
		$searchStr = "";
		$searchKeyword = ($default) ? $this->BasicSearch->KeywordDefault : $this->BasicSearch->Keyword;
		$searchType = ($default) ? $this->BasicSearch->TypeDefault : $this->BasicSearch->Type;

		// Get search SQL
		if ($searchKeyword <> "") {
			$ar = $this->BasicSearch->keywordList($default);

			// Search keyword in any fields
			if (($searchType == "OR" || $searchType == "AND") && $this->BasicSearch->BasicSearchAnyFields) {
				foreach ($ar as $keyword) {
					if ($keyword <> "") {
						if ($searchStr <> "")
							$searchStr .= " " . $searchType . " ";
						$searchStr .= "(" . $this->basicSearchSql(array($keyword), $searchType) . ")";
					}
				}
			} else {
				$searchStr = $this->basicSearchSql($ar, $searchType);
			}
			if (!$default && in_array($this->Command, array("", "reset", "resetall")))
				$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->BasicSearch->setKeyword($searchKeyword);
			$this->BasicSearch->setType($searchType);
		}
		return $searchStr;
	}

	// Check if search parm exists
	protected function checkSearchParms()
	{

		// Check basic search
		if ($this->BasicSearch->issetSession())
			return TRUE;
		if ($this->EmployeeID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LastName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->FirstName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Title->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TitleOfCourtesy->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BirthDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HireDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Address->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->City->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Region->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PostalCode->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Country->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HomePhone->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Extension->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_Email->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Photo->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Notes->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ReportsTo->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Password->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->UserLevel->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Username->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Activated->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Profile->AdvancedSearch->issetSession())
			return TRUE;
		return FALSE;
	}

	// Clear all search parameters
	protected function resetSearchParms()
	{

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$this->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->resetBasicSearchParms();

		// Clear advanced search parameters
		$this->resetAdvancedSearchParms();
	}

	// Load advanced search default values
	protected function loadAdvancedSearchDefault()
	{
		return FALSE;
	}

	// Clear all basic search parameters
	protected function resetBasicSearchParms()
	{
		$this->BasicSearch->unsetSession();
	}

	// Clear all advanced search parameters
	protected function resetAdvancedSearchParms()
	{
		$this->EmployeeID->AdvancedSearch->unsetSession();
		$this->LastName->AdvancedSearch->unsetSession();
		$this->FirstName->AdvancedSearch->unsetSession();
		$this->Title->AdvancedSearch->unsetSession();
		$this->TitleOfCourtesy->AdvancedSearch->unsetSession();
		$this->BirthDate->AdvancedSearch->unsetSession();
		$this->HireDate->AdvancedSearch->unsetSession();
		$this->Address->AdvancedSearch->unsetSession();
		$this->City->AdvancedSearch->unsetSession();
		$this->Region->AdvancedSearch->unsetSession();
		$this->PostalCode->AdvancedSearch->unsetSession();
		$this->Country->AdvancedSearch->unsetSession();
		$this->HomePhone->AdvancedSearch->unsetSession();
		$this->Extension->AdvancedSearch->unsetSession();
		$this->_Email->AdvancedSearch->unsetSession();
		$this->Photo->AdvancedSearch->unsetSession();
		$this->Notes->AdvancedSearch->unsetSession();
		$this->ReportsTo->AdvancedSearch->unsetSession();
		$this->Password->AdvancedSearch->unsetSession();
		$this->UserLevel->AdvancedSearch->unsetSession();
		$this->Username->AdvancedSearch->unsetSession();
		$this->Activated->AdvancedSearch->unsetSession();
		$this->Profile->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->EmployeeID->AdvancedSearch->load();
		$this->LastName->AdvancedSearch->load();
		$this->FirstName->AdvancedSearch->load();
		$this->Title->AdvancedSearch->load();
		$this->TitleOfCourtesy->AdvancedSearch->load();
		$this->BirthDate->AdvancedSearch->load();
		$this->HireDate->AdvancedSearch->load();
		$this->Address->AdvancedSearch->load();
		$this->City->AdvancedSearch->load();
		$this->Region->AdvancedSearch->load();
		$this->PostalCode->AdvancedSearch->load();
		$this->Country->AdvancedSearch->load();
		$this->HomePhone->AdvancedSearch->load();
		$this->Extension->AdvancedSearch->load();
		$this->_Email->AdvancedSearch->load();
		$this->Photo->AdvancedSearch->load();
		$this->Notes->AdvancedSearch->load();
		$this->ReportsTo->AdvancedSearch->load();
		$this->Password->AdvancedSearch->load();
		$this->UserLevel->AdvancedSearch->load();
		$this->Username->AdvancedSearch->load();
		$this->Activated->AdvancedSearch->load();
		$this->Profile->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for Ctrl pressed
		$ctrl = Get("ctrl") !== NULL;

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->EmployeeID, $ctrl); // EmployeeID
			$this->updateSort($this->LastName, $ctrl); // LastName
			$this->updateSort($this->FirstName, $ctrl); // FirstName
			$this->updateSort($this->Title, $ctrl); // Title
			$this->updateSort($this->TitleOfCourtesy, $ctrl); // TitleOfCourtesy
			$this->updateSort($this->BirthDate, $ctrl); // BirthDate
			$this->updateSort($this->HireDate, $ctrl); // HireDate
			$this->updateSort($this->Address, $ctrl); // Address
			$this->updateSort($this->City, $ctrl); // City
			$this->updateSort($this->Region, $ctrl); // Region
			$this->updateSort($this->PostalCode, $ctrl); // PostalCode
			$this->updateSort($this->Country, $ctrl); // Country
			$this->updateSort($this->HomePhone, $ctrl); // HomePhone
			$this->updateSort($this->Extension, $ctrl); // Extension
			$this->updateSort($this->_Email, $ctrl); // Email
			$this->updateSort($this->Photo, $ctrl); // Photo
			$this->updateSort($this->ReportsTo, $ctrl); // ReportsTo
			$this->updateSort($this->Password, $ctrl); // Password
			$this->updateSort($this->UserLevel, $ctrl); // UserLevel
			$this->updateSort($this->Username, $ctrl); // Username
			$this->updateSort($this->Activated, $ctrl); // Activated
			$this->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	protected function loadSortOrder()
	{
		$orderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
		if ($orderBy == "") {
			if ($this->getSqlOrderBy() <> "") {
				$orderBy = $this->getSqlOrderBy();
				$this->setSessionOrderBy($orderBy);
			}
		}
	}

	// Reset command
	// - cmd=reset (Reset search parameters)
	// - cmd=resetall (Reset search and master/detail parameters)
	// - cmd=resetsort (Reset sort parameters)

	protected function resetCmd()
	{

		// Check if reset command
		if (substr($this->Command,0,5) == "reset") {

			// Reset search criteria
			if ($this->Command == "reset" || $this->Command == "resetall")
				$this->resetSearchParms();

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
				$this->EmployeeID->setSort("");
				$this->LastName->setSort("");
				$this->FirstName->setSort("");
				$this->Title->setSort("");
				$this->TitleOfCourtesy->setSort("");
				$this->BirthDate->setSort("");
				$this->HireDate->setSort("");
				$this->Address->setSort("");
				$this->City->setSort("");
				$this->Region->setSort("");
				$this->PostalCode->setSort("");
				$this->Country->setSort("");
				$this->HomePhone->setSort("");
				$this->Extension->setSort("");
				$this->_Email->setSort("");
				$this->Photo->setSort("");
				$this->ReportsTo->setSort("");
				$this->Password->setSort("");
				$this->UserLevel->setSort("");
				$this->Username->setSort("");
				$this->Activated->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	protected function setupListOptions()
	{
		global $Security, $Language;

		// Add group option item
		$item = &$this->ListOptions->add($this->ListOptions->GroupOptionName);
		$item->Body = "";
		$item->OnLeft = FALSE;
		$item->Visible = FALSE;

		// "view"
		$item = &$this->ListOptions->add("view");
		$item->CssClass = "text-nowrap";
		$item->Visible = TRUE;
		$item->OnLeft = FALSE;

		// "edit"
		$item = &$this->ListOptions->add("edit");
		$item->CssClass = "text-nowrap";
		$item->Visible = TRUE;
		$item->OnLeft = FALSE;

		// "copy"
		$item = &$this->ListOptions->add("copy");
		$item->CssClass = "text-nowrap";
		$item->Visible = TRUE;
		$item->OnLeft = FALSE;

		// "delete"
		$item = &$this->ListOptions->add("delete");
		$item->CssClass = "text-nowrap";
		$item->Visible = TRUE;
		$item->OnLeft = FALSE;

		// List actions
		$item = &$this->ListOptions->add("listactions");
		$item->CssClass = "text-nowrap";
		$item->OnLeft = FALSE;
		$item->Visible = FALSE;
		$item->ShowInButtonGroup = FALSE;
		$item->ShowInDropDown = FALSE;

		// "checkbox"
		$item = &$this->ListOptions->add("checkbox");
		$item->Visible = FALSE;
		$item->OnLeft = FALSE;
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" onclick=\"ew.selectAllKey(this);\">";
		$item->ShowInDropDown = FALSE;
		$item->ShowInButtonGroup = FALSE;

		// "sequence"
		$item = &$this->ListOptions->add("sequence");
		$item->CssClass = "text-nowrap";
		$item->Visible = TRUE;
		$item->OnLeft = TRUE; // Always on left
		$item->ShowInDropDown = FALSE;
		$item->ShowInButtonGroup = FALSE;

		// Drop down button for ListOptions
		$this->ListOptions->UseDropDownButton = FALSE;
		$this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
		$this->ListOptions->UseButtonGroup = FALSE;
		if ($this->ListOptions->UseButtonGroup && IsMobile())
			$this->ListOptions->UseDropDownButton = TRUE;

		//$this->ListOptions->ButtonClass = ""; // Class for button group
		// Call ListOptions_Load event

		$this->ListOptions_Load();
		$this->setupListOptionsExt();
		$item = &$this->ListOptions->getItem($this->ListOptions->GroupOptionName);
		$item->Visible = $this->ListOptions->groupOptionVisible();
	}

	// Render list options
	public function renderListOptions()
	{
		global $Security, $Language, $CurrentForm;
		$this->ListOptions->loadDefault();

		// Call ListOptions_Rendering event
		$this->ListOptions_Rendering();

		// "sequence"
		$opt = &$this->ListOptions->Items["sequence"];
		$opt->Body = FormatSequenceNumber($this->RecCnt);

		// "view"
		$opt = &$this->ListOptions->Items["view"];
		$viewcaption = HtmlTitle($Language->phrase("ViewLink"));
		if (TRUE) {
			$opt->Body = "<a class=\"ew-row-link ew-view\" title=\"" . $viewcaption . "\" data-caption=\"" . $viewcaption . "\" href=\"" . HtmlEncode($this->ViewUrl) . "\">" . $Language->phrase("ViewLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "edit"
		$opt = &$this->ListOptions->Items["edit"];
		$editcaption = HtmlTitle($Language->phrase("EditLink"));
		if (TRUE) {
			$opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" href=\"" . HtmlEncode($this->EditUrl) . "\">" . $Language->phrase("EditLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "copy"
		$opt = &$this->ListOptions->Items["copy"];
		$copycaption = HtmlTitle($Language->phrase("CopyLink"));
		if (TRUE) {
			$opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode($this->CopyUrl) . "\">" . $Language->phrase("CopyLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "delete"
		$opt = &$this->ListOptions->Items["delete"];
		if (TRUE)
			$opt->Body = "<a class=\"ew-row-link ew-delete\"" . "" . " title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" href=\"" . HtmlEncode($this->DeleteUrl) . "\">" . $Language->phrase("DeleteLink") . "</a>";
		else
			$opt->Body = "";

		// Set up list action buttons
		$opt = &$this->ListOptions->getItem("listactions");
		if ($opt && !$this->isExport() && !$this->CurrentAction) {
			$body = "";
			$links = array();
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_SINGLE && $listaction->Allow) {
					$action = $listaction->Action;
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon <> "") ? "<i class=\"" . HtmlEncode(str_replace(" ew-icon", "", $listaction->Icon)) . "\" data-caption=\"" . HtmlTitle($caption) . "\"></i> " : "";
					$links[] = "<li><a class=\"dropdown-item ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(TRUE) . "}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . $listaction->Caption . "</a></li>";
					if (count($links) == 1) // Single button
						$body = "<a class=\"ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(TRUE) . "}," . $listaction->toJson(TRUE) . "));return false;\">" . $Language->phrase("ListActionButton") . "</a>";
				}
			}
			if (count($links) > 1) { // More than one buttons, use dropdown
				$body = "<button class=\"dropdown-toggle btn btn-default ew-actions\" title=\"" . HtmlTitle($Language->phrase("ListActionButton")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("ListActionButton") . "</button>";
				$content = "";
				foreach ($links as $link)
					$content .= "<li>" . $link . "</li>";
				$body .= "<ul class=\"dropdown-menu" . ($opt->OnLeft ? "" : " dropdown-menu-right") . "\">". $content . "</ul>";
				$body = "<div class=\"btn-group btn-group-sm\">" . $body . "</div>";
			}
			if (count($links) > 0) {
				$opt->Body = $body;
				$opt->Visible = TRUE;
			}
		}

		// "checkbox"
		$opt = &$this->ListOptions->Items["checkbox"];
		$opt->Body = "<input type=\"checkbox\" name=\"key_m[]\" class=\"ew-multi-select\" value=\"" . HtmlEncode($this->EmployeeID->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\">";
		$this->renderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		$option = $options["addedit"];

		// Add
		$item = &$option->add("add");
		$addcaption = HtmlTitle($Language->phrase("AddLink"));
		$item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode($this->AddUrl) . "\">" . $Language->phrase("AddLink") . "</a>";
		$item->Visible = ($this->AddUrl <> "");
		$option = $options["action"];

		// Set up options default
		foreach ($options as &$option) {
			$option->UseDropDownButton = FALSE;
			$option->UseButtonGroup = TRUE;

			//$option->ButtonClass = ""; // Class for button group
			$item = &$option->add($option->GroupOptionName);
			$item->Body = "";
			$item->Visible = FALSE;
		}
		$options["addedit"]->DropDownButtonPhrase = $Language->phrase("ButtonAddEdit");
		$options["detail"]->DropDownButtonPhrase = $Language->phrase("ButtonDetails");
		$options["action"]->DropDownButtonPhrase = $Language->phrase("ButtonActions");

		// Filter button
		$item = &$this->FilterOptions->add("savecurrentfilter");
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"ft096_employeeslistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"ft096_employeeslistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
		$item->Visible = TRUE;
		$this->FilterOptions->UseDropDownButton = TRUE;
		$this->FilterOptions->UseButtonGroup = !$this->FilterOptions->UseDropDownButton;
		$this->FilterOptions->DropDownButtonPhrase = $Language->phrase("Filters");

		// Add group option item
		$item = &$this->FilterOptions->add($this->FilterOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
	}

	// Render other options
	public function renderOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
			$option = &$options["action"];

			// Set up list action buttons
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_MULTIPLE) {
					$item = &$option->add("custom_" . $listaction->Action);
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon <> "") ? "<i class=\"" . HtmlEncode($listaction->Icon) . "\" data-caption=\"" . HtmlEncode($caption) . "\"></i> " . $caption : $caption;
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.ft096_employeeslist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
					$item->Visible = $listaction->Allow;
				}
			}

			// Hide grid edit and other options
			if ($this->TotalRecs <= 0) {
				$option = &$options["addedit"];
				$item = &$option->getItem("gridedit");
				if ($item) $item->Visible = FALSE;
				$option = &$options["action"];
				$option->hideAllOptions();
			}
	}

	// Process list action
	protected function processListAction()
	{
		global $Language, $Security;
		$userlist = "";
		$user = "";
		$filter = $this->getFilterFromRecordKeys();
		$userAction = Post("useraction", "");
		if ($filter <> "" && $userAction <> "") {

			// Check permission first
			$actionCaption = $userAction;
			if (array_key_exists($userAction, $this->ListActions->Items)) {
				$actionCaption = $this->ListActions->Items[$userAction]->Caption;
				if (!$this->ListActions->Items[$userAction]->Allow) {
					$errmsg = str_replace('%s', $actionCaption, $Language->phrase("CustomActionNotAllowed"));
					if (Post("ajax") == $userAction) // Ajax
						echo "<p class=\"text-danger\">" . $errmsg . "</p>";
					else
						$this->setFailureMessage($errmsg);
					return FALSE;
				}
			}
			$this->CurrentFilter = $filter;
			$sql = $this->getCurrentSql();
			$conn = &$this->getConnection();
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$rs = $conn->execute($sql);
			$conn->raiseErrorFn = '';
			$this->CurrentAction = $userAction;

			// Call row action event
			if ($rs && !$rs->EOF) {
				$conn->beginTrans();
				$this->SelectedCount = $rs->RecordCount();
				$this->SelectedIndex = 0;
				while (!$rs->EOF) {
					$this->SelectedIndex++;
					$row = $rs->fields;
					$processed = $this->Row_CustomAction($userAction, $row);
					if (!$processed)
						break;
					$rs->moveNext();
				}
				if ($processed) {
					$conn->commitTrans(); // Commit the changes
					if ($this->getSuccessMessage() == "" && !ob_get_length()) // No output
						$this->setSuccessMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionCompleted"))); // Set up success message
				} else {
					$conn->rollbackTrans(); // Rollback changes

					// Set up error message
					if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

						// Use the message, do nothing
					} elseif ($this->CancelMessage <> "") {
						$this->setFailureMessage($this->CancelMessage);
						$this->CancelMessage = "";
					} else {
						$this->setFailureMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionFailed")));
					}
				}
			}
			if ($rs)
				$rs->close();
			$this->CurrentAction = ""; // Clear action
			if (Post("ajax") == $userAction) { // Ajax
				if ($this->getSuccessMessage() <> "") {
					echo "<p class=\"text-success\">" . $this->getSuccessMessage() . "</p>";
					$this->clearSuccessMessage(); // Clear message
				}
				if ($this->getFailureMessage() <> "") {
					echo "<p class=\"text-danger\">" . $this->getFailureMessage() . "</p>";
					$this->clearFailureMessage(); // Clear message
				}
				return TRUE;
			}
		}
		return FALSE; // Not ajax request
	}

	// Set up search options
	protected function setupSearchOptions()
	{
		global $Language;
		$this->SearchOptions = new ListOptions();
		$this->SearchOptions->Tag = "div";
		$this->SearchOptions->TagClassName = "ew-search-option";

		// Search button
		$item = &$this->SearchOptions->add("searchtoggle");
		$searchToggleClass = ($this->SearchWhere <> "") ? " active" : " active";
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"ft096_employeeslistsrch\">" . $Language->phrase("SearchLink") . "</button>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere <> $this->DefaultSearchWhere && $this->SearchWhere <> "0=101");

		// Button group for search
		$this->SearchOptions->UseDropDownButton = FALSE;
		$this->SearchOptions->UseButtonGroup = TRUE;
		$this->SearchOptions->DropDownButtonPhrase = $Language->phrase("ButtonSearch");

		// Add group option item
		$item = &$this->SearchOptions->add($this->SearchOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Hide search options
		if ($this->isExport() || $this->CurrentAction)
			$this->SearchOptions->hideAllOptions();
	}
	protected function setupListOptionsExt()
	{
		global $Security, $Language;

		// Hide detail items for dropdown if necessary
		$this->ListOptions->hideDetailItemsForDropDown();
	}
	protected function renderListOptionsExt()
	{
		global $Security, $Language;
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

	// Load basic search values
	protected function loadBasicSearchValues()
	{
		$this->BasicSearch->setKeyword(Get(TABLE_BASIC_SEARCH, ""), FALSE);
		if ($this->BasicSearch->Keyword <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BasicSearch->setType(Get(TABLE_BASIC_SEARCH_TYPE, ""), FALSE);
	}

	// Load search values for validation
	protected function loadSearchValues()
	{
		global $CurrentForm;

		// Load search values
		// EmployeeID

		if (!$this->isAddOrEdit())
			$this->EmployeeID->AdvancedSearch->setSearchValue(Get("x_EmployeeID", Get("EmployeeID", "")));
		if ($this->EmployeeID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->EmployeeID->AdvancedSearch->setSearchOperator(Get("z_EmployeeID", ""));

		// LastName
		if (!$this->isAddOrEdit())
			$this->LastName->AdvancedSearch->setSearchValue(Get("x_LastName", Get("LastName", "")));
		if ($this->LastName->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LastName->AdvancedSearch->setSearchOperator(Get("z_LastName", ""));

		// FirstName
		if (!$this->isAddOrEdit())
			$this->FirstName->AdvancedSearch->setSearchValue(Get("x_FirstName", Get("FirstName", "")));
		if ($this->FirstName->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->FirstName->AdvancedSearch->setSearchOperator(Get("z_FirstName", ""));

		// Title
		if (!$this->isAddOrEdit())
			$this->Title->AdvancedSearch->setSearchValue(Get("x_Title", Get("Title", "")));
		if ($this->Title->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Title->AdvancedSearch->setSearchOperator(Get("z_Title", ""));

		// TitleOfCourtesy
		if (!$this->isAddOrEdit())
			$this->TitleOfCourtesy->AdvancedSearch->setSearchValue(Get("x_TitleOfCourtesy", Get("TitleOfCourtesy", "")));
		if ($this->TitleOfCourtesy->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TitleOfCourtesy->AdvancedSearch->setSearchOperator(Get("z_TitleOfCourtesy", ""));

		// BirthDate
		if (!$this->isAddOrEdit())
			$this->BirthDate->AdvancedSearch->setSearchValue(Get("x_BirthDate", Get("BirthDate", "")));
		if ($this->BirthDate->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BirthDate->AdvancedSearch->setSearchOperator(Get("z_BirthDate", ""));

		// HireDate
		if (!$this->isAddOrEdit())
			$this->HireDate->AdvancedSearch->setSearchValue(Get("x_HireDate", Get("HireDate", "")));
		if ($this->HireDate->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HireDate->AdvancedSearch->setSearchOperator(Get("z_HireDate", ""));

		// Address
		if (!$this->isAddOrEdit())
			$this->Address->AdvancedSearch->setSearchValue(Get("x_Address", Get("Address", "")));
		if ($this->Address->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Address->AdvancedSearch->setSearchOperator(Get("z_Address", ""));

		// City
		if (!$this->isAddOrEdit())
			$this->City->AdvancedSearch->setSearchValue(Get("x_City", Get("City", "")));
		if ($this->City->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->City->AdvancedSearch->setSearchOperator(Get("z_City", ""));

		// Region
		if (!$this->isAddOrEdit())
			$this->Region->AdvancedSearch->setSearchValue(Get("x_Region", Get("Region", "")));
		if ($this->Region->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Region->AdvancedSearch->setSearchOperator(Get("z_Region", ""));

		// PostalCode
		if (!$this->isAddOrEdit())
			$this->PostalCode->AdvancedSearch->setSearchValue(Get("x_PostalCode", Get("PostalCode", "")));
		if ($this->PostalCode->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PostalCode->AdvancedSearch->setSearchOperator(Get("z_PostalCode", ""));

		// Country
		if (!$this->isAddOrEdit())
			$this->Country->AdvancedSearch->setSearchValue(Get("x_Country", Get("Country", "")));
		if ($this->Country->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Country->AdvancedSearch->setSearchOperator(Get("z_Country", ""));

		// HomePhone
		if (!$this->isAddOrEdit())
			$this->HomePhone->AdvancedSearch->setSearchValue(Get("x_HomePhone", Get("HomePhone", "")));
		if ($this->HomePhone->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HomePhone->AdvancedSearch->setSearchOperator(Get("z_HomePhone", ""));

		// Extension
		if (!$this->isAddOrEdit())
			$this->Extension->AdvancedSearch->setSearchValue(Get("x_Extension", Get("Extension", "")));
		if ($this->Extension->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Extension->AdvancedSearch->setSearchOperator(Get("z_Extension", ""));

		// Email
		if (!$this->isAddOrEdit())
			$this->_Email->AdvancedSearch->setSearchValue(Get("x__Email", Get("_Email", "")));
		if ($this->_Email->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->_Email->AdvancedSearch->setSearchOperator(Get("z__Email", ""));

		// Photo
		if (!$this->isAddOrEdit())
			$this->Photo->AdvancedSearch->setSearchValue(Get("x_Photo", Get("Photo", "")));
		if ($this->Photo->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Photo->AdvancedSearch->setSearchOperator(Get("z_Photo", ""));

		// Notes
		if (!$this->isAddOrEdit())
			$this->Notes->AdvancedSearch->setSearchValue(Get("x_Notes", Get("Notes", "")));
		if ($this->Notes->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Notes->AdvancedSearch->setSearchOperator(Get("z_Notes", ""));

		// ReportsTo
		if (!$this->isAddOrEdit())
			$this->ReportsTo->AdvancedSearch->setSearchValue(Get("x_ReportsTo", Get("ReportsTo", "")));
		if ($this->ReportsTo->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ReportsTo->AdvancedSearch->setSearchOperator(Get("z_ReportsTo", ""));

		// Password
		if (!$this->isAddOrEdit())
			$this->Password->AdvancedSearch->setSearchValue(Get("x_Password", Get("Password", "")));
		if ($this->Password->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Password->AdvancedSearch->setSearchOperator(Get("z_Password", ""));

		// UserLevel
		if (!$this->isAddOrEdit())
			$this->UserLevel->AdvancedSearch->setSearchValue(Get("x_UserLevel", Get("UserLevel", "")));
		if ($this->UserLevel->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->UserLevel->AdvancedSearch->setSearchOperator(Get("z_UserLevel", ""));

		// Username
		if (!$this->isAddOrEdit())
			$this->Username->AdvancedSearch->setSearchValue(Get("x_Username", Get("Username", "")));
		if ($this->Username->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Username->AdvancedSearch->setSearchOperator(Get("z_Username", ""));

		// Activated
		if (!$this->isAddOrEdit())
			$this->Activated->AdvancedSearch->setSearchValue(Get("x_Activated", Get("Activated", "")));
		if ($this->Activated->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Activated->AdvancedSearch->setSearchOperator(Get("z_Activated", ""));
		if (is_array($this->Activated->AdvancedSearch->SearchValue))
			$this->Activated->AdvancedSearch->SearchValue = implode(",", $this->Activated->AdvancedSearch->SearchValue);
		if (is_array($this->Activated->AdvancedSearch->SearchValue2))
			$this->Activated->AdvancedSearch->SearchValue2 = implode(",", $this->Activated->AdvancedSearch->SearchValue2);

		// Profile
		if (!$this->isAddOrEdit())
			$this->Profile->AdvancedSearch->setSearchValue(Get("x_Profile", Get("Profile", "")));
		if ($this->Profile->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Profile->AdvancedSearch->setSearchOperator(Get("z_Profile", ""));
	}

	// Load recordset
	public function loadRecordset($offset = -1, $rowcnt = -1)
	{

		// Load List page SQL
		$sql = $this->getListSql();
		$conn = &$this->getConnection();

		// Load recordset
		$dbtype = GetConnectionType($this->Dbid);
		if ($this->UseSelectLimit) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			if ($dbtype == "MSSQL") {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderBy())]);
			} else {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset);
			}
			$conn->raiseErrorFn = '';
		} else {
			$rs = LoadRecordset($sql, $conn);
		}

		// Call Recordset Selected event
		$this->Recordset_Selected($rs);
		return $rs;
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
		$this->EmployeeID->setDbValue($row['EmployeeID']);
		$this->LastName->setDbValue($row['LastName']);
		$this->FirstName->setDbValue($row['FirstName']);
		$this->Title->setDbValue($row['Title']);
		$this->TitleOfCourtesy->setDbValue($row['TitleOfCourtesy']);
		$this->BirthDate->setDbValue($row['BirthDate']);
		$this->HireDate->setDbValue($row['HireDate']);
		$this->Address->setDbValue($row['Address']);
		$this->City->setDbValue($row['City']);
		$this->Region->setDbValue($row['Region']);
		$this->PostalCode->setDbValue($row['PostalCode']);
		$this->Country->setDbValue($row['Country']);
		$this->HomePhone->setDbValue($row['HomePhone']);
		$this->Extension->setDbValue($row['Extension']);
		$this->_Email->setDbValue($row['Email']);
		$this->Photo->setDbValue($row['Photo']);
		$this->Notes->setDbValue($row['Notes']);
		$this->ReportsTo->setDbValue($row['ReportsTo']);
		$this->Password->setDbValue($row['Password']);
		$this->UserLevel->setDbValue($row['UserLevel']);
		$this->Username->setDbValue($row['Username']);
		$this->Activated->setDbValue($row['Activated']);
		$this->Profile->setDbValue($row['Profile']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['EmployeeID'] = NULL;
		$row['LastName'] = NULL;
		$row['FirstName'] = NULL;
		$row['Title'] = NULL;
		$row['TitleOfCourtesy'] = NULL;
		$row['BirthDate'] = NULL;
		$row['HireDate'] = NULL;
		$row['Address'] = NULL;
		$row['City'] = NULL;
		$row['Region'] = NULL;
		$row['PostalCode'] = NULL;
		$row['Country'] = NULL;
		$row['HomePhone'] = NULL;
		$row['Extension'] = NULL;
		$row['Email'] = NULL;
		$row['Photo'] = NULL;
		$row['Notes'] = NULL;
		$row['ReportsTo'] = NULL;
		$row['Password'] = NULL;
		$row['UserLevel'] = NULL;
		$row['Username'] = NULL;
		$row['Activated'] = NULL;
		$row['Profile'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("EmployeeID")) <> "")
			$this->EmployeeID->CurrentValue = $this->getKey("EmployeeID"); // EmployeeID
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
		$this->ViewUrl = $this->getViewUrl();
		$this->EditUrl = $this->getEditUrl();
		$this->InlineEditUrl = $this->getInlineEditUrl();
		$this->CopyUrl = $this->getCopyUrl();
		$this->InlineCopyUrl = $this->getInlineCopyUrl();
		$this->DeleteUrl = $this->getDeleteUrl();

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// EmployeeID
		// LastName
		// FirstName
		// Title
		// TitleOfCourtesy
		// BirthDate
		// HireDate
		// Address
		// City
		// Region
		// PostalCode
		// Country
		// HomePhone
		// Extension
		// Email
		// Photo
		// Notes
		// ReportsTo
		// Password
		// UserLevel
		// Username
		// Activated
		// Profile

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// EmployeeID
			$this->EmployeeID->ViewValue = $this->EmployeeID->CurrentValue;
			$this->EmployeeID->ViewCustomAttributes = "";

			// LastName
			$this->LastName->ViewValue = $this->LastName->CurrentValue;
			$this->LastName->ViewCustomAttributes = "";

			// FirstName
			$this->FirstName->ViewValue = $this->FirstName->CurrentValue;
			$this->FirstName->ViewCustomAttributes = "";

			// Title
			$this->Title->ViewValue = $this->Title->CurrentValue;
			$this->Title->ViewCustomAttributes = "";

			// TitleOfCourtesy
			$this->TitleOfCourtesy->ViewValue = $this->TitleOfCourtesy->CurrentValue;
			$this->TitleOfCourtesy->ViewCustomAttributes = "";

			// BirthDate
			$this->BirthDate->ViewValue = $this->BirthDate->CurrentValue;
			$this->BirthDate->ViewValue = FormatDateTime($this->BirthDate->ViewValue, 0);
			$this->BirthDate->ViewCustomAttributes = "";

			// HireDate
			$this->HireDate->ViewValue = $this->HireDate->CurrentValue;
			$this->HireDate->ViewValue = FormatDateTime($this->HireDate->ViewValue, 0);
			$this->HireDate->ViewCustomAttributes = "";

			// Address
			$this->Address->ViewValue = $this->Address->CurrentValue;
			$this->Address->ViewCustomAttributes = "";

			// City
			$this->City->ViewValue = $this->City->CurrentValue;
			$this->City->ViewCustomAttributes = "";

			// Region
			$this->Region->ViewValue = $this->Region->CurrentValue;
			$this->Region->ViewCustomAttributes = "";

			// PostalCode
			$this->PostalCode->ViewValue = $this->PostalCode->CurrentValue;
			$this->PostalCode->ViewCustomAttributes = "";

			// Country
			$this->Country->ViewValue = $this->Country->CurrentValue;
			$this->Country->ViewCustomAttributes = "";

			// HomePhone
			$this->HomePhone->ViewValue = $this->HomePhone->CurrentValue;
			$this->HomePhone->ViewCustomAttributes = "";

			// Extension
			$this->Extension->ViewValue = $this->Extension->CurrentValue;
			$this->Extension->ViewCustomAttributes = "";

			// Email
			$this->_Email->ViewValue = $this->_Email->CurrentValue;
			$this->_Email->ViewCustomAttributes = "";

			// Photo
			$this->Photo->ViewValue = $this->Photo->CurrentValue;
			$this->Photo->ViewCustomAttributes = "";

			// ReportsTo
			$this->ReportsTo->ViewValue = $this->ReportsTo->CurrentValue;
			$this->ReportsTo->ViewValue = FormatNumber($this->ReportsTo->ViewValue, 0, -2, -2, -2);
			$this->ReportsTo->ViewCustomAttributes = "";

			// Password
			$this->Password->ViewValue = $this->Password->CurrentValue;
			$this->Password->ViewCustomAttributes = "";

			// UserLevel
			$this->UserLevel->ViewValue = $this->UserLevel->CurrentValue;
			$this->UserLevel->ViewValue = FormatNumber($this->UserLevel->ViewValue, 0, -2, -2, -2);
			$this->UserLevel->ViewCustomAttributes = "";

			// Username
			$this->Username->ViewValue = $this->Username->CurrentValue;
			$this->Username->ViewCustomAttributes = "";

			// Activated
			if (ConvertToBool($this->Activated->CurrentValue)) {
				$this->Activated->ViewValue = $this->Activated->tagCaption(1) <> "" ? $this->Activated->tagCaption(1) : "Y";
			} else {
				$this->Activated->ViewValue = $this->Activated->tagCaption(2) <> "" ? $this->Activated->tagCaption(2) : "N";
			}
			$this->Activated->ViewCustomAttributes = "";

			// EmployeeID
			$this->EmployeeID->LinkCustomAttributes = "";
			$this->EmployeeID->HrefValue = "";
			$this->EmployeeID->TooltipValue = "";

			// LastName
			$this->LastName->LinkCustomAttributes = "";
			$this->LastName->HrefValue = "";
			$this->LastName->TooltipValue = "";

			// FirstName
			$this->FirstName->LinkCustomAttributes = "";
			$this->FirstName->HrefValue = "";
			$this->FirstName->TooltipValue = "";

			// Title
			$this->Title->LinkCustomAttributes = "";
			$this->Title->HrefValue = "";
			$this->Title->TooltipValue = "";

			// TitleOfCourtesy
			$this->TitleOfCourtesy->LinkCustomAttributes = "";
			$this->TitleOfCourtesy->HrefValue = "";
			$this->TitleOfCourtesy->TooltipValue = "";

			// BirthDate
			$this->BirthDate->LinkCustomAttributes = "";
			$this->BirthDate->HrefValue = "";
			$this->BirthDate->TooltipValue = "";

			// HireDate
			$this->HireDate->LinkCustomAttributes = "";
			$this->HireDate->HrefValue = "";
			$this->HireDate->TooltipValue = "";

			// Address
			$this->Address->LinkCustomAttributes = "";
			$this->Address->HrefValue = "";
			$this->Address->TooltipValue = "";

			// City
			$this->City->LinkCustomAttributes = "";
			$this->City->HrefValue = "";
			$this->City->TooltipValue = "";

			// Region
			$this->Region->LinkCustomAttributes = "";
			$this->Region->HrefValue = "";
			$this->Region->TooltipValue = "";

			// PostalCode
			$this->PostalCode->LinkCustomAttributes = "";
			$this->PostalCode->HrefValue = "";
			$this->PostalCode->TooltipValue = "";

			// Country
			$this->Country->LinkCustomAttributes = "";
			$this->Country->HrefValue = "";
			$this->Country->TooltipValue = "";

			// HomePhone
			$this->HomePhone->LinkCustomAttributes = "";
			$this->HomePhone->HrefValue = "";
			$this->HomePhone->TooltipValue = "";

			// Extension
			$this->Extension->LinkCustomAttributes = "";
			$this->Extension->HrefValue = "";
			$this->Extension->TooltipValue = "";

			// Email
			$this->_Email->LinkCustomAttributes = "";
			$this->_Email->HrefValue = "";
			$this->_Email->TooltipValue = "";

			// Photo
			$this->Photo->LinkCustomAttributes = "";
			$this->Photo->HrefValue = "";
			$this->Photo->TooltipValue = "";

			// ReportsTo
			$this->ReportsTo->LinkCustomAttributes = "";
			$this->ReportsTo->HrefValue = "";
			$this->ReportsTo->TooltipValue = "";

			// Password
			$this->Password->LinkCustomAttributes = "";
			$this->Password->HrefValue = "";
			$this->Password->TooltipValue = "";

			// UserLevel
			$this->UserLevel->LinkCustomAttributes = "";
			$this->UserLevel->HrefValue = "";
			$this->UserLevel->TooltipValue = "";

			// Username
			$this->Username->LinkCustomAttributes = "";
			$this->Username->HrefValue = "";
			$this->Username->TooltipValue = "";

			// Activated
			$this->Activated->LinkCustomAttributes = "";
			$this->Activated->HrefValue = "";
			$this->Activated->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// EmployeeID
			$this->EmployeeID->EditAttrs["class"] = "form-control";
			$this->EmployeeID->EditCustomAttributes = "";
			$this->EmployeeID->EditValue = HtmlEncode($this->EmployeeID->AdvancedSearch->SearchValue);
			$this->EmployeeID->PlaceHolder = RemoveHtml($this->EmployeeID->caption());

			// LastName
			$this->LastName->EditAttrs["class"] = "form-control";
			$this->LastName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->LastName->AdvancedSearch->SearchValue = HtmlDecode($this->LastName->AdvancedSearch->SearchValue);
			$this->LastName->EditValue = HtmlEncode($this->LastName->AdvancedSearch->SearchValue);
			$this->LastName->PlaceHolder = RemoveHtml($this->LastName->caption());

			// FirstName
			$this->FirstName->EditAttrs["class"] = "form-control";
			$this->FirstName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->FirstName->AdvancedSearch->SearchValue = HtmlDecode($this->FirstName->AdvancedSearch->SearchValue);
			$this->FirstName->EditValue = HtmlEncode($this->FirstName->AdvancedSearch->SearchValue);
			$this->FirstName->PlaceHolder = RemoveHtml($this->FirstName->caption());

			// Title
			$this->Title->EditAttrs["class"] = "form-control";
			$this->Title->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Title->AdvancedSearch->SearchValue = HtmlDecode($this->Title->AdvancedSearch->SearchValue);
			$this->Title->EditValue = HtmlEncode($this->Title->AdvancedSearch->SearchValue);
			$this->Title->PlaceHolder = RemoveHtml($this->Title->caption());

			// TitleOfCourtesy
			$this->TitleOfCourtesy->EditAttrs["class"] = "form-control";
			$this->TitleOfCourtesy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TitleOfCourtesy->AdvancedSearch->SearchValue = HtmlDecode($this->TitleOfCourtesy->AdvancedSearch->SearchValue);
			$this->TitleOfCourtesy->EditValue = HtmlEncode($this->TitleOfCourtesy->AdvancedSearch->SearchValue);
			$this->TitleOfCourtesy->PlaceHolder = RemoveHtml($this->TitleOfCourtesy->caption());

			// BirthDate
			$this->BirthDate->EditAttrs["class"] = "form-control";
			$this->BirthDate->EditCustomAttributes = "";
			$this->BirthDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->BirthDate->AdvancedSearch->SearchValue, 0), 8));
			$this->BirthDate->PlaceHolder = RemoveHtml($this->BirthDate->caption());

			// HireDate
			$this->HireDate->EditAttrs["class"] = "form-control";
			$this->HireDate->EditCustomAttributes = "";
			$this->HireDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->HireDate->AdvancedSearch->SearchValue, 0), 8));
			$this->HireDate->PlaceHolder = RemoveHtml($this->HireDate->caption());

			// Address
			$this->Address->EditAttrs["class"] = "form-control";
			$this->Address->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Address->AdvancedSearch->SearchValue = HtmlDecode($this->Address->AdvancedSearch->SearchValue);
			$this->Address->EditValue = HtmlEncode($this->Address->AdvancedSearch->SearchValue);
			$this->Address->PlaceHolder = RemoveHtml($this->Address->caption());

			// City
			$this->City->EditAttrs["class"] = "form-control";
			$this->City->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->City->AdvancedSearch->SearchValue = HtmlDecode($this->City->AdvancedSearch->SearchValue);
			$this->City->EditValue = HtmlEncode($this->City->AdvancedSearch->SearchValue);
			$this->City->PlaceHolder = RemoveHtml($this->City->caption());

			// Region
			$this->Region->EditAttrs["class"] = "form-control";
			$this->Region->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Region->AdvancedSearch->SearchValue = HtmlDecode($this->Region->AdvancedSearch->SearchValue);
			$this->Region->EditValue = HtmlEncode($this->Region->AdvancedSearch->SearchValue);
			$this->Region->PlaceHolder = RemoveHtml($this->Region->caption());

			// PostalCode
			$this->PostalCode->EditAttrs["class"] = "form-control";
			$this->PostalCode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PostalCode->AdvancedSearch->SearchValue = HtmlDecode($this->PostalCode->AdvancedSearch->SearchValue);
			$this->PostalCode->EditValue = HtmlEncode($this->PostalCode->AdvancedSearch->SearchValue);
			$this->PostalCode->PlaceHolder = RemoveHtml($this->PostalCode->caption());

			// Country
			$this->Country->EditAttrs["class"] = "form-control";
			$this->Country->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Country->AdvancedSearch->SearchValue = HtmlDecode($this->Country->AdvancedSearch->SearchValue);
			$this->Country->EditValue = HtmlEncode($this->Country->AdvancedSearch->SearchValue);
			$this->Country->PlaceHolder = RemoveHtml($this->Country->caption());

			// HomePhone
			$this->HomePhone->EditAttrs["class"] = "form-control";
			$this->HomePhone->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HomePhone->AdvancedSearch->SearchValue = HtmlDecode($this->HomePhone->AdvancedSearch->SearchValue);
			$this->HomePhone->EditValue = HtmlEncode($this->HomePhone->AdvancedSearch->SearchValue);
			$this->HomePhone->PlaceHolder = RemoveHtml($this->HomePhone->caption());

			// Extension
			$this->Extension->EditAttrs["class"] = "form-control";
			$this->Extension->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Extension->AdvancedSearch->SearchValue = HtmlDecode($this->Extension->AdvancedSearch->SearchValue);
			$this->Extension->EditValue = HtmlEncode($this->Extension->AdvancedSearch->SearchValue);
			$this->Extension->PlaceHolder = RemoveHtml($this->Extension->caption());

			// Email
			$this->_Email->EditAttrs["class"] = "form-control";
			$this->_Email->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->_Email->AdvancedSearch->SearchValue = HtmlDecode($this->_Email->AdvancedSearch->SearchValue);
			$this->_Email->EditValue = HtmlEncode($this->_Email->AdvancedSearch->SearchValue);
			$this->_Email->PlaceHolder = RemoveHtml($this->_Email->caption());

			// Photo
			$this->Photo->EditAttrs["class"] = "form-control";
			$this->Photo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Photo->AdvancedSearch->SearchValue = HtmlDecode($this->Photo->AdvancedSearch->SearchValue);
			$this->Photo->EditValue = HtmlEncode($this->Photo->AdvancedSearch->SearchValue);
			$this->Photo->PlaceHolder = RemoveHtml($this->Photo->caption());

			// ReportsTo
			$this->ReportsTo->EditAttrs["class"] = "form-control";
			$this->ReportsTo->EditCustomAttributes = "";
			$this->ReportsTo->EditValue = HtmlEncode($this->ReportsTo->AdvancedSearch->SearchValue);
			$this->ReportsTo->PlaceHolder = RemoveHtml($this->ReportsTo->caption());

			// Password
			$this->Password->EditAttrs["class"] = "form-control";
			$this->Password->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Password->AdvancedSearch->SearchValue = HtmlDecode($this->Password->AdvancedSearch->SearchValue);
			$this->Password->EditValue = HtmlEncode($this->Password->AdvancedSearch->SearchValue);
			$this->Password->PlaceHolder = RemoveHtml($this->Password->caption());

			// UserLevel
			$this->UserLevel->EditAttrs["class"] = "form-control";
			$this->UserLevel->EditCustomAttributes = "";
			$this->UserLevel->EditValue = HtmlEncode($this->UserLevel->AdvancedSearch->SearchValue);
			$this->UserLevel->PlaceHolder = RemoveHtml($this->UserLevel->caption());

			// Username
			$this->Username->EditAttrs["class"] = "form-control";
			$this->Username->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Username->AdvancedSearch->SearchValue = HtmlDecode($this->Username->AdvancedSearch->SearchValue);
			$this->Username->EditValue = HtmlEncode($this->Username->AdvancedSearch->SearchValue);
			$this->Username->PlaceHolder = RemoveHtml($this->Username->caption());

			// Activated
			$this->Activated->EditCustomAttributes = "";
			$this->Activated->EditValue = $this->Activated->options(FALSE);
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate search
	protected function validateSearch()
	{
		global $SearchError;

		// Initialize
		$SearchError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return TRUE;

		// Return validate result
		$validateSearch = ($SearchError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateSearch = $validateSearch && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			AddMessage($SearchError, $formCustomError);
		}
		return $validateSearch;
	}

	// Load advanced search
	public function loadAdvancedSearch()
	{
		$this->EmployeeID->AdvancedSearch->load();
		$this->LastName->AdvancedSearch->load();
		$this->FirstName->AdvancedSearch->load();
		$this->Title->AdvancedSearch->load();
		$this->TitleOfCourtesy->AdvancedSearch->load();
		$this->BirthDate->AdvancedSearch->load();
		$this->HireDate->AdvancedSearch->load();
		$this->Address->AdvancedSearch->load();
		$this->City->AdvancedSearch->load();
		$this->Region->AdvancedSearch->load();
		$this->PostalCode->AdvancedSearch->load();
		$this->Country->AdvancedSearch->load();
		$this->HomePhone->AdvancedSearch->load();
		$this->Extension->AdvancedSearch->load();
		$this->_Email->AdvancedSearch->load();
		$this->Photo->AdvancedSearch->load();
		$this->Notes->AdvancedSearch->load();
		$this->ReportsTo->AdvancedSearch->load();
		$this->Password->AdvancedSearch->load();
		$this->UserLevel->AdvancedSearch->load();
		$this->Username->AdvancedSearch->load();
		$this->Activated->AdvancedSearch->load();
		$this->Profile->AdvancedSearch->load();
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$url = preg_replace('/\?cmd=reset(all){0,1}$/i', '', $url); // Remove cmd=reset / cmd=resetall
		$Breadcrumb->add("list", $this->TableVar, $url, "", $this->TableVar, TRUE);
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

	// ListOptions Load event
	function ListOptions_Load() {

		// Example:
		//$opt = &$this->ListOptions->Add("new");
		//$opt->Header = "xxx";
		//$opt->OnLeft = TRUE; // Link on left
		//$opt->MoveTo(0); // Move to first column

	}

	// ListOptions Rendering event
	function ListOptions_Rendering() {

		//$GLOBALS["xxx_grid"]->DetailAdd = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailEdit = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailView = (...condition...); // Set to TRUE or FALSE conditionally

	}

	// ListOptions Rendered event
	function ListOptions_Rendered() {

		// Example:
		//$this->ListOptions->Items["new"]->Body = "xxx";

	}

	// Row Custom Action event
	function Row_CustomAction($action, $row) {

		// Return FALSE to abort
		return TRUE;
	}

	// Page Exporting event
	// $this->ExportDoc = export document object
	function Page_Exporting() {

		//$this->ExportDoc->Text = "my header"; // Export header
		//return FALSE; // Return FALSE to skip default export and use Row_Export event

		return TRUE; // Return TRUE to use default export and skip Row_Export event
	}

	// Row Export event
	// $this->ExportDoc = export document object
	function Row_Export($rs) {

		//$this->ExportDoc->Text .= "my content"; // Build HTML with field value: $rs["MyField"] or $this->MyField->ViewValue
	}

	// Page Exported event
	// $this->ExportDoc = export document object
	function Page_Exported() {

		//$this->ExportDoc->Text .= "my footer"; // Export footer
		//echo $this->ExportDoc->Text;

	}

	// Page Importing event
	function Page_Importing($reader, &$options) {

		//var_dump($reader); // Import data reader
		//var_dump($options); // Show all options for importing
		//return FALSE; // Return FALSE to skip import

		return TRUE;
	}

	// Row Import event
	function Row_Import(&$row, $cnt) {

		//echo $cnt; // Import record count
		//var_dump($row); // Import row
		//return FALSE; // Return FALSE to skip import

		return TRUE;
	}

	// Page Imported event
	function Page_Imported($reader, $results) {

		//var_dump($reader); // Import data reader
		//var_dump($results); // Import results

	}
}
?>