<?php
namespace PHPMaker2019\emkl_prj;

/**
 * Page class
 */
class t101_tagihan_trucking_list extends t101_tagihan_trucking
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{D4B21A3D-A1C8-4ED3-BA65-212E10E691E7}";

	// Table name
	public $TableName = 't101_tagihan_trucking';

	// Page object name
	public $PageObjName = "t101_tagihan_trucking_list";

	// Grid form hidden field names
	public $FormName = "ft101_tagihan_truckinglist";
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

		// Table object (t101_tagihan_trucking)
		if (!isset($GLOBALS["t101_tagihan_trucking"]) || get_class($GLOBALS["t101_tagihan_trucking"]) == PROJECT_NAMESPACE . "t101_tagihan_trucking") {
			$GLOBALS["t101_tagihan_trucking"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["t101_tagihan_trucking"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "t101_tagihan_truckingadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "t101_tagihan_truckingdelete.php";
		$this->MultiUpdateUrl = "t101_tagihan_truckingupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

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
		$this->FilterOptions->TagClassName = "ew-filter-option ft101_tagihan_truckinglistsrch";

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

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action

		// Get grid add count
		$gridaddcnt = Get(TABLE_GRID_ADD_ROW_COUNT, "");
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->setupListOptions();
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
		$this->setupLookupOptions($this->Shipper_id);

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

			// Check QueryString parameters
			if (Get("action") !== NULL) {
				$this->CurrentAction = Get("action");

				// Clear inline mode
				if ($this->isCancel())
					$this->clearInlineMode();

				// Switch to grid edit mode
				if ($this->isGridEdit())
					$this->gridEditMode();

				// Switch to inline edit mode
				if ($this->isEdit())
					$this->inlineEditMode();

				// Switch to inline add mode
				if ($this->isAdd() || $this->isCopy())
					$this->inlineAddMode();

				// Switch to grid add mode
				if ($this->isGridAdd())
					$this->gridAddMode();
			} else {
				if (Post("action") !== NULL) {
					$this->CurrentAction = Post("action"); // Get action

					// Grid Update
					if (($this->isGridUpdate() || $this->isGridOverwrite()) && @$_SESSION[SESSION_INLINE_MODE] == "gridedit") {
						if ($this->validateGridForm()) {
							$gridUpdate = $this->gridUpdate();
						} else {
							$gridUpdate = FALSE;
							$this->setFailureMessage($FormError);
						}
						if ($gridUpdate) {
						} else {
							$this->EventCancelled = TRUE;
							$this->gridEditMode(); // Stay in Grid edit mode
						}
					}

					// Inline Update
					if (($this->isUpdate() || $this->isOverwrite()) && @$_SESSION[SESSION_INLINE_MODE] == "edit")
						$this->inlineUpdate();

					// Insert Inline
					if ($this->isInsert() && @$_SESSION[SESSION_INLINE_MODE] == "add")
						$this->inlineInsert();

					// Grid Insert
					if ($this->isGridInsert() && @$_SESSION[SESSION_INLINE_MODE] == "gridadd") {
						if ($this->validateGridForm()) {
							$gridInsert = $this->gridInsert();
						} else {
							$gridInsert = FALSE;
							$this->setFailureMessage($FormError);
						}
						if ($gridInsert) {
						} else {
							$this->EventCancelled = TRUE;
							$this->gridAddMode(); // Stay in Grid add mode
						}
					}
				} elseif (@$_SESSION[SESSION_INLINE_MODE] == "gridedit") { // Previously in grid edit mode
					if (Get(TABLE_START_REC) !== NULL || Get(TABLE_PAGE_NO) !== NULL) // Stay in grid edit mode if paging
						$this->gridEditMode();
					else // Reset grid edit
						$this->clearInlineMode();
				}
			}

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

			// Show grid delete link for grid add / grid edit
			if ($this->AllowAddDeleteRow) {
				if ($this->isGridAdd() || $this->isGridEdit()) {
					$item = &$this->ListOptions->getItem("griddelete");
					if ($item)
						$item->Visible = TRUE;
				}
			}

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

	// Exit inline mode
	protected function clearInlineMode()
	{
		$this->setKey("id", ""); // Clear inline edit key
		$this->Tagihan->FormValue = ""; // Clear form value
		$this->LastAction = $this->CurrentAction; // Save last action
		$this->CurrentAction = ""; // Clear action
		$_SESSION[SESSION_INLINE_MODE] = ""; // Clear inline mode
	}

	// Switch to Grid Add mode
	protected function gridAddMode()
	{
		$this->CurrentAction = "gridadd";
		$_SESSION[SESSION_INLINE_MODE] = "gridadd";
		$this->hideFieldsForAddEdit();
	}

	// Switch to Grid Edit mode
	protected function gridEditMode()
	{
		$this->CurrentAction = "gridedit";
		$_SESSION[SESSION_INLINE_MODE] = "gridedit";
		$this->hideFieldsForAddEdit();
	}

	// Switch to Inline Edit mode
	protected function inlineEditMode()
	{
		global $Security, $Language;
		$inlineEdit = TRUE;
		if (Get("id") !== NULL) {
			$this->id->setQueryStringValue(Get("id"));
		} else {
			$inlineEdit = FALSE;
		}
		if ($inlineEdit) {
			if ($this->loadRow()) {
				$this->setKey("id", $this->id->CurrentValue); // Set up inline edit key
				$_SESSION[SESSION_INLINE_MODE] = "edit"; // Enable inline edit
			}
		}
		return TRUE;
	}

	// Perform update to Inline Edit record
	protected function inlineUpdate()
	{
		global $Language, $CurrentForm, $FormError;
		$CurrentForm->Index = 1;
		$this->loadFormValues(); // Get form values

		// Validate form
		$inlineUpdate = TRUE;
		if (!$this->validateForm()) {
			$inlineUpdate = FALSE; // Form error, reset action
			$this->setFailureMessage($FormError);
		} else {
			$inlineUpdate = FALSE;
			$rowkey = strval($CurrentForm->getValue($this->FormKeyName));
			if ($this->setupKeyValues($rowkey)) { // Set up key values
				if ($this->checkInlineEditKey()) { // Check key
					$this->SendEmail = TRUE; // Send email on update success
					$inlineUpdate = $this->editRow(); // Update record
				} else {
					$inlineUpdate = FALSE;
				}
			}
		}
		if ($inlineUpdate) { // Update success
			if ($this->getSuccessMessage() == "")
				$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Set up success message
			$this->clearInlineMode(); // Clear inline edit mode
		} else {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("UpdateFailed")); // Set update failed message
			$this->EventCancelled = TRUE; // Cancel event
			$this->CurrentAction = "edit"; // Stay in edit mode
		}
	}

	// Check Inline Edit key
	public function checkInlineEditKey()
	{
		if (strval($this->getKey("id")) <> strval($this->id->CurrentValue))
			return FALSE;
		return TRUE;
	}

	// Switch to Inline Add mode
	protected function inlineAddMode()
	{
		global $Security, $Language;
		if ($this->isCopy()) {
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$this->setKey("id", $this->id->CurrentValue); // Set up key
			} else {
				$this->setKey("id", ""); // Clear key
				$this->CurrentAction = "add";
			}
		}
		$_SESSION[SESSION_INLINE_MODE] = "add"; // Enable inline add
		return TRUE;
	}

	// Perform update to Inline Add/Copy record
	protected function inlineInsert()
	{
		global $Language, $CurrentForm, $FormError;
		$this->loadOldRecord(); // Load old record
		$CurrentForm->Index = 0;
		$this->loadFormValues(); // Get form values

		// Validate form
		if (!$this->validateForm()) {
			$this->setFailureMessage($FormError); // Set validation error message
			$this->EventCancelled = TRUE; // Set event cancelled
			$this->CurrentAction = "add"; // Stay in add mode
			return;
		}
		$this->SendEmail = TRUE; // Send email on add success
		if ($this->addRow($this->OldRecordset)) { // Add record
			if ($this->getSuccessMessage() == "")
				$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up add success message
			$this->clearInlineMode(); // Clear inline add mode
		} else { // Add failed
			$this->EventCancelled = TRUE; // Set event cancelled
			$this->CurrentAction = "add"; // Stay in add mode
		}
	}

	// Perform update to grid
	public function gridUpdate()
	{
		global $Language, $CurrentForm, $FormError;
		$gridUpdate = TRUE;

		// Get old recordset
		$this->CurrentFilter = $this->buildKeyFilter();
		if ($this->CurrentFilter == "")
			$this->CurrentFilter = "0=1";
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		if ($rs = $conn->execute($sql)) {
			$rsold = $rs->getRows();
			$rs->close();
		}

		// Call Grid Updating event
		if (!$this->Grid_Updating($rsold)) {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("GridEditCancelled")); // Set grid edit cancelled message
			return FALSE;
		}

		// Begin transaction
		$conn->beginTrans();
		if ($this->AuditTrailOnEdit)
			$this->writeAuditTrailDummy($Language->phrase("BatchUpdateBegin")); // Batch update begin
		$key = "";

		// Update row index and get row key
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Update all rows based on key
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {
			$CurrentForm->Index = $rowindex;
			$rowkey = strval($CurrentForm->getValue($this->FormKeyName));
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));

			// Load all values and keys
			if ($rowaction <> "insertdelete") { // Skip insert then deleted rows
				$this->loadFormValues(); // Get form values
				if ($rowaction == "" || $rowaction == "edit" || $rowaction == "delete") {
					$gridUpdate = $this->setupKeyValues($rowkey); // Set up key values
				} else {
					$gridUpdate = TRUE;
				}

				// Skip empty row
				if ($rowaction == "insert" && $this->emptyRow()) {

					// No action required
				// Validate form and insert/update/delete record

				} elseif ($gridUpdate) {
					if ($rowaction == "delete") {
						$this->CurrentFilter = $this->getRecordFilter();
						$gridUpdate = $this->deleteRows(); // Delete this row
					} else if (!$this->validateForm()) {
						$gridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($FormError);
					} else {
						if ($rowaction == "insert") {
							$gridUpdate = $this->addRow(); // Insert this row
						} else {
							if ($rowkey <> "") {
								$this->SendEmail = FALSE; // Do not send email on update success
								$gridUpdate = $this->editRow(); // Update this row
							}
						} // End update
					}
				}
				if ($gridUpdate) {
					if ($key <> "")
						$key .= ", ";
					$key .= $rowkey;
				} else {
					break;
				}
			}
		}
		if ($gridUpdate) {
			$conn->commitTrans(); // Commit transaction

			// Get new recordset
			if ($rs = $conn->execute($sql)) {
				$rsnew = $rs->getRows();
				$rs->close();
			}

			// Call Grid_Updated event
			$this->Grid_Updated($rsold, $rsnew);
			if ($this->AuditTrailOnEdit)
				$this->writeAuditTrailDummy($Language->phrase("BatchUpdateSuccess")); // Batch update success
			if ($this->getSuccessMessage() == "")
				$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Set up update success message
			$this->clearInlineMode(); // Clear inline edit mode
		} else {
			$conn->rollbackTrans(); // Rollback transaction
			if ($this->AuditTrailOnEdit)
				$this->writeAuditTrailDummy($Language->phrase("BatchUpdateRollback")); // Batch update rollback
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("UpdateFailed")); // Set update failed message
		}
		return $gridUpdate;
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
			$this->id->setFormValue($arKeyFlds[0]);
			if (!is_numeric($this->id->FormValue))
				return FALSE;
		}
		return TRUE;
	}

	// Perform Grid Add
	public function gridInsert()
	{
		global $Language, $CurrentForm, $FormError;
		$rowindex = 1;
		$gridInsert = FALSE;
		$conn = &$this->getConnection();

		// Call Grid Inserting event
		if (!$this->Grid_Inserting()) {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("GridAddCancelled")); // Set grid add cancelled message
			return FALSE;
		}

		// Begin transaction
		$conn->beginTrans();

		// Init key filter
		$wrkfilter = "";
		$addcnt = 0;
		if ($this->AuditTrailOnAdd)
			$this->writeAuditTrailDummy($Language->phrase("BatchInsertBegin")); // Batch insert begin
		$key = "";

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Insert all rows
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction <> "" && $rowaction <> "insert")
				continue; // Skip
			$this->loadFormValues(); // Get form values
			if (!$this->emptyRow()) {
				$addcnt++;
				$this->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->validateForm()) {
					$gridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($FormError);
				} else {
					$gridInsert = $this->addRow($this->OldRecordset); // Insert this row
				}
				if ($gridInsert) {
					if ($key <> "")
						$key .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
					$key .= $this->id->CurrentValue;

					// Add filter for this record
					$filter = $this->getRecordFilter();
					if ($wrkfilter <> "")
						$wrkfilter .= " OR ";
					$wrkfilter .= $filter;
				} else {
					break;
				}
			}
		}
		if ($addcnt == 0) { // No record inserted
			$this->setFailureMessage($Language->phrase("NoAddRecord"));
			$gridInsert = FALSE;
		}
		if ($gridInsert) {
			$conn->commitTrans(); // Commit transaction

			// Get new recordset
			$this->CurrentFilter = $wrkfilter;
			$sql = $this->getCurrentSql();
			if ($rs = $conn->execute($sql)) {
				$rsnew = $rs->getRows();
				$rs->close();
			}

			// Call Grid_Inserted event
			$this->Grid_Inserted($rsnew);
			if ($this->AuditTrailOnAdd)
				$this->writeAuditTrailDummy($Language->phrase("BatchInsertSuccess")); // Batch insert success
			if ($this->getSuccessMessage() == "")
				$this->setSuccessMessage($Language->phrase("InsertSuccess")); // Set up insert success message
			$this->clearInlineMode(); // Clear grid add mode
		} else {
			$conn->rollbackTrans(); // Rollback transaction
			if ($this->AuditTrailOnAdd)
				$this->writeAuditTrailDummy($Language->phrase("BatchInsertRollback")); // Batch insert rollback
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("InsertFailed")); // Set insert failed message
		}
		return $gridInsert;
	}

	// Check if empty row
	public function emptyRow()
	{
		global $CurrentForm;
		if ($CurrentForm->hasValue("x_JO_id") && $CurrentForm->hasValue("o_JO_id") && $this->JO_id->CurrentValue <> $this->JO_id->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Nomor_Polisi_1") && $CurrentForm->hasValue("o_Nomor_Polisi_1") && $this->Nomor_Polisi_1->CurrentValue <> $this->Nomor_Polisi_1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Nomor_Polisi_2") && $CurrentForm->hasValue("o_Nomor_Polisi_2") && $this->Nomor_Polisi_2->CurrentValue <> $this->Nomor_Polisi_2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Nomor_Polisi_3") && $CurrentForm->hasValue("o_Nomor_Polisi_3") && $this->Nomor_Polisi_3->CurrentValue <> $this->Nomor_Polisi_3->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Tanggal") && $CurrentForm->hasValue("o_Tanggal") && $this->Tanggal->CurrentValue <> $this->Tanggal->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Shipper_id") && $CurrentForm->hasValue("o_Shipper_id") && $this->Shipper_id->CurrentValue <> $this->Shipper_id->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Dari_Lokasi") && $CurrentForm->hasValue("o_Dari_Lokasi") && $this->Dari_Lokasi->CurrentValue <> $this->Dari_Lokasi->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Ke_Lokasi") && $CurrentForm->hasValue("o_Ke_Lokasi") && $this->Ke_Lokasi->CurrentValue <> $this->Ke_Lokasi->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Jenis_Container") && $CurrentForm->hasValue("o_Jenis_Container") && $this->Jenis_Container->CurrentValue <> $this->Jenis_Container->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Nomor_Container_1") && $CurrentForm->hasValue("o_Nomor_Container_1") && $this->Nomor_Container_1->CurrentValue <> $this->Nomor_Container_1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Nomor_Container_2") && $CurrentForm->hasValue("o_Nomor_Container_2") && $this->Nomor_Container_2->CurrentValue <> $this->Nomor_Container_2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Keterangan") && $CurrentForm->hasValue("o_Keterangan") && $this->Keterangan->CurrentValue <> $this->Keterangan->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Tagihan") && $CurrentForm->hasValue("o_Tagihan") && $this->Tagihan->CurrentValue <> $this->Tagihan->OldValue)
			return FALSE;
		return TRUE;
	}

	// Validate grid form
	public function validateGridForm()
	{
		global $CurrentForm;

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Validate all records
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction <> "delete" && $rowaction <> "insertdelete") {
				$this->loadFormValues(); // Get form values
				if ($rowaction == "insert" && $this->emptyRow()) {

					// Ignore
				} else if (!$this->validateForm()) {
					return FALSE;
				}
			}
		}
		return TRUE;
	}

	// Get all form values of the grid
	public function getGridFormValues()
	{
		global $CurrentForm;

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;
		$rows = array();

		// Loop through all records
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction <> "delete" && $rowaction <> "insertdelete") {
				$this->loadFormValues(); // Get form values
				if ($rowaction == "insert" && $this->emptyRow()) {

					// Ignore
				} else {
					$rows[] = $this->getFieldValues("FormValue"); // Return row as array
				}
			}
		}
		return $rows; // Return as array of array
	}

	// Restore form values for current row
	public function restoreCurrentRowFormValues($idx)
	{
		global $CurrentForm;

		// Get row based on current index
		$CurrentForm->Index = $idx;
		$this->loadFormValues(); // Load form values
	}

	// Get list of filters
	public function getFilterList()
	{
		global $UserProfile;

		// Initialize
		$filterList = "";
		$savedFilterList = "";
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->JO_id->AdvancedSearch->toJson(), ","); // Field JO_id
		$filterList = Concat($filterList, $this->Nomor_Polisi_1->AdvancedSearch->toJson(), ","); // Field Nomor_Polisi_1
		$filterList = Concat($filterList, $this->Nomor_Polisi_2->AdvancedSearch->toJson(), ","); // Field Nomor_Polisi_2
		$filterList = Concat($filterList, $this->Nomor_Polisi_3->AdvancedSearch->toJson(), ","); // Field Nomor_Polisi_3
		$filterList = Concat($filterList, $this->Tanggal->AdvancedSearch->toJson(), ","); // Field Tanggal
		$filterList = Concat($filterList, $this->Shipper_id->AdvancedSearch->toJson(), ","); // Field Shipper_id
		$filterList = Concat($filterList, $this->Dari_Lokasi->AdvancedSearch->toJson(), ","); // Field Dari_Lokasi
		$filterList = Concat($filterList, $this->Ke_Lokasi->AdvancedSearch->toJson(), ","); // Field Ke_Lokasi
		$filterList = Concat($filterList, $this->Jenis_Container->AdvancedSearch->toJson(), ","); // Field Jenis_Container
		$filterList = Concat($filterList, $this->Nomor_Container_1->AdvancedSearch->toJson(), ","); // Field Nomor_Container_1
		$filterList = Concat($filterList, $this->Nomor_Container_2->AdvancedSearch->toJson(), ","); // Field Nomor_Container_2
		$filterList = Concat($filterList, $this->Keterangan->AdvancedSearch->toJson(), ","); // Field Keterangan
		$filterList = Concat($filterList, $this->Tagihan->AdvancedSearch->toJson(), ","); // Field Tagihan
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
			$UserProfile->setSearchFilters(CurrentUserName(), "ft101_tagihan_truckinglistsrch", $filters);
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

		// Field id
		$this->id->AdvancedSearch->SearchValue = @$filter["x_id"];
		$this->id->AdvancedSearch->SearchOperator = @$filter["z_id"];
		$this->id->AdvancedSearch->SearchCondition = @$filter["v_id"];
		$this->id->AdvancedSearch->SearchValue2 = @$filter["y_id"];
		$this->id->AdvancedSearch->SearchOperator2 = @$filter["w_id"];
		$this->id->AdvancedSearch->save();

		// Field JO_id
		$this->JO_id->AdvancedSearch->SearchValue = @$filter["x_JO_id"];
		$this->JO_id->AdvancedSearch->SearchOperator = @$filter["z_JO_id"];
		$this->JO_id->AdvancedSearch->SearchCondition = @$filter["v_JO_id"];
		$this->JO_id->AdvancedSearch->SearchValue2 = @$filter["y_JO_id"];
		$this->JO_id->AdvancedSearch->SearchOperator2 = @$filter["w_JO_id"];
		$this->JO_id->AdvancedSearch->save();

		// Field Nomor_Polisi_1
		$this->Nomor_Polisi_1->AdvancedSearch->SearchValue = @$filter["x_Nomor_Polisi_1"];
		$this->Nomor_Polisi_1->AdvancedSearch->SearchOperator = @$filter["z_Nomor_Polisi_1"];
		$this->Nomor_Polisi_1->AdvancedSearch->SearchCondition = @$filter["v_Nomor_Polisi_1"];
		$this->Nomor_Polisi_1->AdvancedSearch->SearchValue2 = @$filter["y_Nomor_Polisi_1"];
		$this->Nomor_Polisi_1->AdvancedSearch->SearchOperator2 = @$filter["w_Nomor_Polisi_1"];
		$this->Nomor_Polisi_1->AdvancedSearch->save();

		// Field Nomor_Polisi_2
		$this->Nomor_Polisi_2->AdvancedSearch->SearchValue = @$filter["x_Nomor_Polisi_2"];
		$this->Nomor_Polisi_2->AdvancedSearch->SearchOperator = @$filter["z_Nomor_Polisi_2"];
		$this->Nomor_Polisi_2->AdvancedSearch->SearchCondition = @$filter["v_Nomor_Polisi_2"];
		$this->Nomor_Polisi_2->AdvancedSearch->SearchValue2 = @$filter["y_Nomor_Polisi_2"];
		$this->Nomor_Polisi_2->AdvancedSearch->SearchOperator2 = @$filter["w_Nomor_Polisi_2"];
		$this->Nomor_Polisi_2->AdvancedSearch->save();

		// Field Nomor_Polisi_3
		$this->Nomor_Polisi_3->AdvancedSearch->SearchValue = @$filter["x_Nomor_Polisi_3"];
		$this->Nomor_Polisi_3->AdvancedSearch->SearchOperator = @$filter["z_Nomor_Polisi_3"];
		$this->Nomor_Polisi_3->AdvancedSearch->SearchCondition = @$filter["v_Nomor_Polisi_3"];
		$this->Nomor_Polisi_3->AdvancedSearch->SearchValue2 = @$filter["y_Nomor_Polisi_3"];
		$this->Nomor_Polisi_3->AdvancedSearch->SearchOperator2 = @$filter["w_Nomor_Polisi_3"];
		$this->Nomor_Polisi_3->AdvancedSearch->save();

		// Field Tanggal
		$this->Tanggal->AdvancedSearch->SearchValue = @$filter["x_Tanggal"];
		$this->Tanggal->AdvancedSearch->SearchOperator = @$filter["z_Tanggal"];
		$this->Tanggal->AdvancedSearch->SearchCondition = @$filter["v_Tanggal"];
		$this->Tanggal->AdvancedSearch->SearchValue2 = @$filter["y_Tanggal"];
		$this->Tanggal->AdvancedSearch->SearchOperator2 = @$filter["w_Tanggal"];
		$this->Tanggal->AdvancedSearch->save();

		// Field Shipper_id
		$this->Shipper_id->AdvancedSearch->SearchValue = @$filter["x_Shipper_id"];
		$this->Shipper_id->AdvancedSearch->SearchOperator = @$filter["z_Shipper_id"];
		$this->Shipper_id->AdvancedSearch->SearchCondition = @$filter["v_Shipper_id"];
		$this->Shipper_id->AdvancedSearch->SearchValue2 = @$filter["y_Shipper_id"];
		$this->Shipper_id->AdvancedSearch->SearchOperator2 = @$filter["w_Shipper_id"];
		$this->Shipper_id->AdvancedSearch->save();

		// Field Dari_Lokasi
		$this->Dari_Lokasi->AdvancedSearch->SearchValue = @$filter["x_Dari_Lokasi"];
		$this->Dari_Lokasi->AdvancedSearch->SearchOperator = @$filter["z_Dari_Lokasi"];
		$this->Dari_Lokasi->AdvancedSearch->SearchCondition = @$filter["v_Dari_Lokasi"];
		$this->Dari_Lokasi->AdvancedSearch->SearchValue2 = @$filter["y_Dari_Lokasi"];
		$this->Dari_Lokasi->AdvancedSearch->SearchOperator2 = @$filter["w_Dari_Lokasi"];
		$this->Dari_Lokasi->AdvancedSearch->save();

		// Field Ke_Lokasi
		$this->Ke_Lokasi->AdvancedSearch->SearchValue = @$filter["x_Ke_Lokasi"];
		$this->Ke_Lokasi->AdvancedSearch->SearchOperator = @$filter["z_Ke_Lokasi"];
		$this->Ke_Lokasi->AdvancedSearch->SearchCondition = @$filter["v_Ke_Lokasi"];
		$this->Ke_Lokasi->AdvancedSearch->SearchValue2 = @$filter["y_Ke_Lokasi"];
		$this->Ke_Lokasi->AdvancedSearch->SearchOperator2 = @$filter["w_Ke_Lokasi"];
		$this->Ke_Lokasi->AdvancedSearch->save();

		// Field Jenis_Container
		$this->Jenis_Container->AdvancedSearch->SearchValue = @$filter["x_Jenis_Container"];
		$this->Jenis_Container->AdvancedSearch->SearchOperator = @$filter["z_Jenis_Container"];
		$this->Jenis_Container->AdvancedSearch->SearchCondition = @$filter["v_Jenis_Container"];
		$this->Jenis_Container->AdvancedSearch->SearchValue2 = @$filter["y_Jenis_Container"];
		$this->Jenis_Container->AdvancedSearch->SearchOperator2 = @$filter["w_Jenis_Container"];
		$this->Jenis_Container->AdvancedSearch->save();

		// Field Nomor_Container_1
		$this->Nomor_Container_1->AdvancedSearch->SearchValue = @$filter["x_Nomor_Container_1"];
		$this->Nomor_Container_1->AdvancedSearch->SearchOperator = @$filter["z_Nomor_Container_1"];
		$this->Nomor_Container_1->AdvancedSearch->SearchCondition = @$filter["v_Nomor_Container_1"];
		$this->Nomor_Container_1->AdvancedSearch->SearchValue2 = @$filter["y_Nomor_Container_1"];
		$this->Nomor_Container_1->AdvancedSearch->SearchOperator2 = @$filter["w_Nomor_Container_1"];
		$this->Nomor_Container_1->AdvancedSearch->save();

		// Field Nomor_Container_2
		$this->Nomor_Container_2->AdvancedSearch->SearchValue = @$filter["x_Nomor_Container_2"];
		$this->Nomor_Container_2->AdvancedSearch->SearchOperator = @$filter["z_Nomor_Container_2"];
		$this->Nomor_Container_2->AdvancedSearch->SearchCondition = @$filter["v_Nomor_Container_2"];
		$this->Nomor_Container_2->AdvancedSearch->SearchValue2 = @$filter["y_Nomor_Container_2"];
		$this->Nomor_Container_2->AdvancedSearch->SearchOperator2 = @$filter["w_Nomor_Container_2"];
		$this->Nomor_Container_2->AdvancedSearch->save();

		// Field Keterangan
		$this->Keterangan->AdvancedSearch->SearchValue = @$filter["x_Keterangan"];
		$this->Keterangan->AdvancedSearch->SearchOperator = @$filter["z_Keterangan"];
		$this->Keterangan->AdvancedSearch->SearchCondition = @$filter["v_Keterangan"];
		$this->Keterangan->AdvancedSearch->SearchValue2 = @$filter["y_Keterangan"];
		$this->Keterangan->AdvancedSearch->SearchOperator2 = @$filter["w_Keterangan"];
		$this->Keterangan->AdvancedSearch->save();

		// Field Tagihan
		$this->Tagihan->AdvancedSearch->SearchValue = @$filter["x_Tagihan"];
		$this->Tagihan->AdvancedSearch->SearchOperator = @$filter["z_Tagihan"];
		$this->Tagihan->AdvancedSearch->SearchCondition = @$filter["v_Tagihan"];
		$this->Tagihan->AdvancedSearch->SearchValue2 = @$filter["y_Tagihan"];
		$this->Tagihan->AdvancedSearch->SearchOperator2 = @$filter["w_Tagihan"];
		$this->Tagihan->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[TABLE_BASIC_SEARCH]);
		$this->BasicSearch->setType(@$filter[TABLE_BASIC_SEARCH_TYPE]);
	}

	// Advanced search WHERE clause based on QueryString
	protected function advancedSearchWhere($default = FALSE)
	{
		global $Security;
		$where = "";
		$this->buildSearchSql($where, $this->id, $default, FALSE); // id
		$this->buildSearchSql($where, $this->JO_id, $default, FALSE); // JO_id
		$this->buildSearchSql($where, $this->Nomor_Polisi_1, $default, FALSE); // Nomor_Polisi_1
		$this->buildSearchSql($where, $this->Nomor_Polisi_2, $default, FALSE); // Nomor_Polisi_2
		$this->buildSearchSql($where, $this->Nomor_Polisi_3, $default, FALSE); // Nomor_Polisi_3
		$this->buildSearchSql($where, $this->Tanggal, $default, FALSE); // Tanggal
		$this->buildSearchSql($where, $this->Shipper_id, $default, FALSE); // Shipper_id
		$this->buildSearchSql($where, $this->Dari_Lokasi, $default, FALSE); // Dari_Lokasi
		$this->buildSearchSql($where, $this->Ke_Lokasi, $default, FALSE); // Ke_Lokasi
		$this->buildSearchSql($where, $this->Jenis_Container, $default, FALSE); // Jenis_Container
		$this->buildSearchSql($where, $this->Nomor_Container_1, $default, FALSE); // Nomor_Container_1
		$this->buildSearchSql($where, $this->Nomor_Container_2, $default, FALSE); // Nomor_Container_2
		$this->buildSearchSql($where, $this->Keterangan, $default, FALSE); // Keterangan
		$this->buildSearchSql($where, $this->Tagihan, $default, FALSE); // Tagihan

		// Set up search parm
		if (!$default && $where <> "" && in_array($this->Command, array("", "reset", "resetall"))) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->id->AdvancedSearch->save(); // id
			$this->JO_id->AdvancedSearch->save(); // JO_id
			$this->Nomor_Polisi_1->AdvancedSearch->save(); // Nomor_Polisi_1
			$this->Nomor_Polisi_2->AdvancedSearch->save(); // Nomor_Polisi_2
			$this->Nomor_Polisi_3->AdvancedSearch->save(); // Nomor_Polisi_3
			$this->Tanggal->AdvancedSearch->save(); // Tanggal
			$this->Shipper_id->AdvancedSearch->save(); // Shipper_id
			$this->Dari_Lokasi->AdvancedSearch->save(); // Dari_Lokasi
			$this->Ke_Lokasi->AdvancedSearch->save(); // Ke_Lokasi
			$this->Jenis_Container->AdvancedSearch->save(); // Jenis_Container
			$this->Nomor_Container_1->AdvancedSearch->save(); // Nomor_Container_1
			$this->Nomor_Container_2->AdvancedSearch->save(); // Nomor_Container_2
			$this->Keterangan->AdvancedSearch->save(); // Keterangan
			$this->Tagihan->AdvancedSearch->save(); // Tagihan
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
		$this->buildBasicSearchSql($where, $this->JO_id, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Nomor_Polisi_1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Nomor_Polisi_2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Nomor_Polisi_3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tanggal, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Shipper_id, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Dari_Lokasi, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Ke_Lokasi, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Jenis_Container, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Nomor_Container_1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Nomor_Container_2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Keterangan, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tagihan, $arKeywords, $type);
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
		if ($this->id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->JO_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Nomor_Polisi_1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Nomor_Polisi_2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Nomor_Polisi_3->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Tanggal->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Shipper_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Dari_Lokasi->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Ke_Lokasi->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Jenis_Container->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Nomor_Container_1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Nomor_Container_2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Keterangan->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Tagihan->AdvancedSearch->issetSession())
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
		$this->id->AdvancedSearch->unsetSession();
		$this->JO_id->AdvancedSearch->unsetSession();
		$this->Nomor_Polisi_1->AdvancedSearch->unsetSession();
		$this->Nomor_Polisi_2->AdvancedSearch->unsetSession();
		$this->Nomor_Polisi_3->AdvancedSearch->unsetSession();
		$this->Tanggal->AdvancedSearch->unsetSession();
		$this->Shipper_id->AdvancedSearch->unsetSession();
		$this->Dari_Lokasi->AdvancedSearch->unsetSession();
		$this->Ke_Lokasi->AdvancedSearch->unsetSession();
		$this->Jenis_Container->AdvancedSearch->unsetSession();
		$this->Nomor_Container_1->AdvancedSearch->unsetSession();
		$this->Nomor_Container_2->AdvancedSearch->unsetSession();
		$this->Keterangan->AdvancedSearch->unsetSession();
		$this->Tagihan->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->id->AdvancedSearch->load();
		$this->JO_id->AdvancedSearch->load();
		$this->Nomor_Polisi_1->AdvancedSearch->load();
		$this->Nomor_Polisi_2->AdvancedSearch->load();
		$this->Nomor_Polisi_3->AdvancedSearch->load();
		$this->Tanggal->AdvancedSearch->load();
		$this->Shipper_id->AdvancedSearch->load();
		$this->Dari_Lokasi->AdvancedSearch->load();
		$this->Ke_Lokasi->AdvancedSearch->load();
		$this->Jenis_Container->AdvancedSearch->load();
		$this->Nomor_Container_1->AdvancedSearch->load();
		$this->Nomor_Container_2->AdvancedSearch->load();
		$this->Keterangan->AdvancedSearch->load();
		$this->Tagihan->AdvancedSearch->load();
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
			$this->updateSort($this->JO_id, $ctrl); // JO_id
			$this->updateSort($this->Nomor_Polisi_1, $ctrl); // Nomor_Polisi_1
			$this->updateSort($this->Nomor_Polisi_2, $ctrl); // Nomor_Polisi_2
			$this->updateSort($this->Nomor_Polisi_3, $ctrl); // Nomor_Polisi_3
			$this->updateSort($this->Tanggal, $ctrl); // Tanggal
			$this->updateSort($this->Shipper_id, $ctrl); // Shipper_id
			$this->updateSort($this->Dari_Lokasi, $ctrl); // Dari_Lokasi
			$this->updateSort($this->Ke_Lokasi, $ctrl); // Ke_Lokasi
			$this->updateSort($this->Jenis_Container, $ctrl); // Jenis_Container
			$this->updateSort($this->Nomor_Container_1, $ctrl); // Nomor_Container_1
			$this->updateSort($this->Nomor_Container_2, $ctrl); // Nomor_Container_2
			$this->updateSort($this->Keterangan, $ctrl); // Keterangan
			$this->updateSort($this->Tagihan, $ctrl); // Tagihan
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
				$this->JO_id->setSort("");
				$this->Nomor_Polisi_1->setSort("");
				$this->Nomor_Polisi_2->setSort("");
				$this->Nomor_Polisi_3->setSort("");
				$this->Tanggal->setSort("");
				$this->Shipper_id->setSort("");
				$this->Dari_Lokasi->setSort("");
				$this->Ke_Lokasi->setSort("");
				$this->Jenis_Container->setSort("");
				$this->Nomor_Container_1->setSort("");
				$this->Nomor_Container_2->setSort("");
				$this->Keterangan->setSort("");
				$this->Tagihan->setSort("");
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

		// "griddelete"
		if ($this->AllowAddDeleteRow) {
			$item = &$this->ListOptions->add("griddelete");
			$item->CssClass = "text-nowrap";
			$item->OnLeft = FALSE;
			$item->Visible = FALSE; // Default hidden
		}

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

		// Set up row action and key
		if (is_numeric($this->RowIndex) && $this->CurrentMode <> "view") {
			$CurrentForm->Index = $this->RowIndex;
			$actionName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormActionName);
			$oldKeyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormOldKeyName);
			$keyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormKeyName);
			$blankRowName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormBlankRowName);
			if ($this->RowAction <> "")
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $actionName . "\" id=\"" . $actionName . "\" value=\"" . $this->RowAction . "\">";
			if ($this->RowAction == "delete") {
				$rowkey = $CurrentForm->getValue($this->FormKeyName);
				$this->setupKeyValues($rowkey);
			}
			if ($this->RowAction == "insert" && $this->isConfirm() && $this->emptyRow())
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $blankRowName . "\" id=\"" . $blankRowName . "\" value=\"1\">";
		}

		// "delete"
		if ($this->AllowAddDeleteRow) {
			if ($this->isGridAdd() || $this->isGridEdit()) {
				$options = &$this->ListOptions;
				$options->UseButtonGroup = TRUE; // Use button group for grid delete button
				$opt = &$options->Items["griddelete"];
				$opt->Body = "<a class=\"ew-grid-link ew-grid-delete\" title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" onclick=\"return ew.deleteGridRow(this, " . $this->RowIndex . ");\">" . $Language->phrase("DeleteLink") . "</a>";
			}
		}

		// "sequence"
		$opt = &$this->ListOptions->Items["sequence"];
		$opt->Body = FormatSequenceNumber($this->RecCnt);

		// "copy"
		$opt = &$this->ListOptions->Items["copy"];
		if ($this->isInlineAddRow() || $this->isInlineCopyRow()) { // Inline Add/Copy
			$this->ListOptions->CustomItem = "copy"; // Show copy column only
			$opt->Body = "<div" . (($opt->OnLeft) ? " class=\"text-right\"" : "") . ">" .
				"<a class=\"ew-grid-link ew-inline-insert\" title=\"" . HtmlTitle($Language->phrase("InsertLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InsertLink")) . "\" href=\"\" onclick=\"return ew.forms(this).submit('" . $this->pageName() . "');\">" . $Language->phrase("InsertLink") . "</a>&nbsp;" .
				"<a class=\"ew-grid-link ew-inline-cancel\" title=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" href=\"" . $this->CancelUrl . "\">" . $Language->phrase("CancelLink") . "</a>" .
				"<input type=\"hidden\" name=\"action\" id=\"action\" value=\"insert\"></div>";
			return;
		}

		// "edit"
		$opt = &$this->ListOptions->Items["edit"];
		if ($this->isInlineEditRow()) { // Inline-Edit
			$this->ListOptions->CustomItem = "edit"; // Show edit column only
				$opt->Body = "<div" . (($opt->OnLeft) ? " class=\"text-right\"" : "") . ">" .
					"<a class=\"ew-grid-link ew-inline-update\" title=\"" . HtmlTitle($Language->phrase("UpdateLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("UpdateLink")) . "\" href=\"\" onclick=\"return ew.forms(this).submit('" . UrlAddHash($this->pageName(), "r" . $this->RowCnt . "_" . $this->TableVar) . "');\">" . $Language->phrase("UpdateLink") . "</a>&nbsp;" .
					"<a class=\"ew-grid-link ew-inline-cancel\" title=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" href=\"" . $this->CancelUrl . "\">" . $Language->phrase("CancelLink") . "</a>" .
					"<input type=\"hidden\" name=\"action\" id=\"action\" value=\"update\"></div>";
			$opt->Body .= "<input type=\"hidden\" name=\"k" . $this->RowIndex . "_key\" id=\"k" . $this->RowIndex . "_key\" value=\"" . HtmlEncode($this->id->CurrentValue) . "\">";
			return;
		}

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
			$opt->Body .= "<a class=\"ew-row-link ew-inline-edit\" title=\"" . HtmlTitle($Language->phrase("InlineEditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InlineEditLink")) . "\" href=\"" . HtmlEncode(UrlAddHash($this->InlineEditUrl, "r" . $this->RowCnt . "_" . $this->TableVar)) . "\">" . $Language->phrase("InlineEditLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "copy"
		$opt = &$this->ListOptions->Items["copy"];
		$copycaption = HtmlTitle($Language->phrase("CopyLink"));
		if (TRUE) {
			$opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode($this->CopyUrl) . "\">" . $Language->phrase("CopyLink") . "</a>";
			$opt->Body .= "<a class=\"ew-row-link ew-inline-copy\" title=\"" . HtmlTitle($Language->phrase("InlineCopyLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InlineCopyLink")) . "\" href=\"" . HtmlEncode($this->InlineCopyUrl) . "\">" . $Language->phrase("InlineCopyLink") . "</a>";
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
		$opt->Body = "<input type=\"checkbox\" name=\"key_m[]\" class=\"ew-multi-select\" value=\"" . HtmlEncode($this->id->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\">";
		if ($this->isGridEdit() && is_numeric($this->RowIndex)) {
			$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $keyName . "\" id=\"" . $keyName . "\" value=\"" . $this->id->CurrentValue . "\">";
		}
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

		// Inline Add
		$item = &$option->add("inlineadd");
		$item->Body = "<a class=\"ew-add-edit ew-inline-add\" title=\"" . HtmlTitle($Language->phrase("InlineAddLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InlineAddLink")) . "\" href=\"" . HtmlEncode($this->InlineAddUrl) . "\">" .$Language->phrase("InlineAddLink") . "</a>";
		$item->Visible = ($this->InlineAddUrl <> "");
		$item = &$option->add("gridadd");
		$item->Body = "<a class=\"ew-add-edit ew-grid-add\" title=\"" . HtmlTitle($Language->phrase("GridAddLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridAddLink")) . "\" href=\"" . HtmlEncode($this->GridAddUrl) . "\">" . $Language->phrase("GridAddLink") . "</a>";
		$item->Visible = ($this->GridAddUrl <> "");

		// Add grid edit
		$option = $options["addedit"];
		$item = &$option->add("gridedit");
		$item->Body = "<a class=\"ew-add-edit ew-grid-edit\" title=\"" . HtmlTitle($Language->phrase("GridEditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridEditLink")) . "\" href=\"" . HtmlEncode($this->GridEditUrl) . "\">" . $Language->phrase("GridEditLink") . "</a>";
		$item->Visible = ($this->GridEditUrl <> "");
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"ft101_tagihan_truckinglistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"ft101_tagihan_truckinglistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
		if (!$this->isGridAdd() && !$this->isGridEdit()) { // Not grid add/edit mode
			$option = &$options["action"];

			// Set up list action buttons
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_MULTIPLE) {
					$item = &$option->add("custom_" . $listaction->Action);
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon <> "") ? "<i class=\"" . HtmlEncode($listaction->Icon) . "\" data-caption=\"" . HtmlEncode($caption) . "\"></i> " . $caption : $caption;
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.ft101_tagihan_truckinglist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		} else { // Grid add/edit mode

			// Hide all options first
			foreach ($options as &$option)
				$option->hideAllOptions();
			if ($this->isGridAdd()) {
				if ($this->AllowAddDeleteRow) {

					// Add add blank row
					$option = &$options["addedit"];
					$option->UseDropDownButton = FALSE;
					$item = &$option->add("addblankrow");
					$item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"javascript:void(0);\" onclick=\"ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
					$item->Visible = TRUE;
				}
				$option = &$options["action"];
				$option->UseDropDownButton = FALSE;

				// Add grid insert
				$item = &$option->add("gridinsert");
				$item->Body = "<a class=\"ew-action ew-grid-insert\" title=\"" . HtmlTitle($Language->phrase("GridInsertLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridInsertLink")) . "\" href=\"\" onclick=\"return ew.forms(this).submit('" . $this->pageName() . "');\">" . $Language->phrase("GridInsertLink") . "</a>";

				// Add grid cancel
				$item = &$option->add("gridcancel");
				$item->Body = "<a class=\"ew-action ew-grid-cancel\" title=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" href=\"" . $this->CancelUrl . "\">" . $Language->phrase("GridCancelLink") . "</a>";
			}
			if ($this->isGridEdit()) {
				if ($this->AllowAddDeleteRow) {

					// Add add blank row
					$option = &$options["addedit"];
					$option->UseDropDownButton = FALSE;
					$item = &$option->add("addblankrow");
					$item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"javascript:void(0);\" onclick=\"ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
					$item->Visible = TRUE;
				}
				$option = &$options["action"];
				$option->UseDropDownButton = FALSE;
					$item = &$option->add("gridsave");
					$item->Body = "<a class=\"ew-action ew-grid-save\" title=\"" . HtmlTitle($Language->phrase("GridSaveLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridSaveLink")) . "\" href=\"\" onclick=\"return ew.forms(this).submit('" . $this->pageName() . "');\">" . $Language->phrase("GridSaveLink") . "</a>";
					$item = &$option->add("gridcancel");
					$item->Body = "<a class=\"ew-action ew-grid-cancel\" title=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" href=\"" . $this->CancelUrl . "\">" . $Language->phrase("GridCancelLink") . "</a>";
			}
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"ft101_tagihan_truckinglistsrch\">" . $Language->phrase("SearchLink") . "</button>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere <> $this->DefaultSearchWhere && $this->SearchWhere <> "0=101");

		// Advanced search button
		$item = &$this->SearchOptions->add("advancedsearch");
		if (IsMobile())
			$item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"t101_tagihan_truckingsrch.php\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
		else
			$item->Body = "<button type=\"button\" class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-table=\"t101_tagihan_trucking\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" onclick=\"ew.modalDialogShow({lnk:this,btn:'SearchBtn',url:'t101_tagihan_truckingsrch.php'});\">" . $Language->phrase("AdvancedSearchBtn") . "</button>";
		$item->Visible = TRUE;

		// Search highlight button
		$item = &$this->SearchOptions->add("searchhighlight");
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-highlight active\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"ft101_tagihan_truckinglistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</button>";
		$item->Visible = ($this->SearchWhere <> "" && $this->TotalRecs > 0);

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

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->JO_id->CurrentValue = NULL;
		$this->JO_id->OldValue = $this->JO_id->CurrentValue;
		$this->Nomor_Polisi_1->CurrentValue = "-";
		$this->Nomor_Polisi_1->OldValue = $this->Nomor_Polisi_1->CurrentValue;
		$this->Nomor_Polisi_2->CurrentValue = "-";
		$this->Nomor_Polisi_2->OldValue = $this->Nomor_Polisi_2->CurrentValue;
		$this->Nomor_Polisi_3->CurrentValue = "-";
		$this->Nomor_Polisi_3->OldValue = $this->Nomor_Polisi_3->CurrentValue;
		$this->Tanggal->CurrentValue = NULL;
		$this->Tanggal->OldValue = $this->Tanggal->CurrentValue;
		$this->Shipper_id->CurrentValue = NULL;
		$this->Shipper_id->OldValue = $this->Shipper_id->CurrentValue;
		$this->Dari_Lokasi->CurrentValue = "-";
		$this->Dari_Lokasi->OldValue = $this->Dari_Lokasi->CurrentValue;
		$this->Ke_Lokasi->CurrentValue = "-";
		$this->Ke_Lokasi->OldValue = $this->Ke_Lokasi->CurrentValue;
		$this->Jenis_Container->CurrentValue = "40";
		$this->Jenis_Container->OldValue = $this->Jenis_Container->CurrentValue;
		$this->Nomor_Container_1->CurrentValue = "-";
		$this->Nomor_Container_1->OldValue = $this->Nomor_Container_1->CurrentValue;
		$this->Nomor_Container_2->CurrentValue = "-";
		$this->Nomor_Container_2->OldValue = $this->Nomor_Container_2->CurrentValue;
		$this->Keterangan->CurrentValue = NULL;
		$this->Keterangan->OldValue = $this->Keterangan->CurrentValue;
		$this->Tagihan->CurrentValue = 0.00;
		$this->Tagihan->OldValue = $this->Tagihan->CurrentValue;
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
		// id

		if (!$this->isAddOrEdit())
			$this->id->AdvancedSearch->setSearchValue(Get("x_id", Get("id", "")));
		if ($this->id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->id->AdvancedSearch->setSearchOperator(Get("z_id", ""));

		// JO_id
		if (!$this->isAddOrEdit())
			$this->JO_id->AdvancedSearch->setSearchValue(Get("x_JO_id", Get("JO_id", "")));
		if ($this->JO_id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->JO_id->AdvancedSearch->setSearchOperator(Get("z_JO_id", ""));

		// Nomor_Polisi_1
		if (!$this->isAddOrEdit())
			$this->Nomor_Polisi_1->AdvancedSearch->setSearchValue(Get("x_Nomor_Polisi_1", Get("Nomor_Polisi_1", "")));
		if ($this->Nomor_Polisi_1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Nomor_Polisi_1->AdvancedSearch->setSearchOperator(Get("z_Nomor_Polisi_1", ""));

		// Nomor_Polisi_2
		if (!$this->isAddOrEdit())
			$this->Nomor_Polisi_2->AdvancedSearch->setSearchValue(Get("x_Nomor_Polisi_2", Get("Nomor_Polisi_2", "")));
		if ($this->Nomor_Polisi_2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Nomor_Polisi_2->AdvancedSearch->setSearchOperator(Get("z_Nomor_Polisi_2", ""));

		// Nomor_Polisi_3
		if (!$this->isAddOrEdit())
			$this->Nomor_Polisi_3->AdvancedSearch->setSearchValue(Get("x_Nomor_Polisi_3", Get("Nomor_Polisi_3", "")));
		if ($this->Nomor_Polisi_3->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Nomor_Polisi_3->AdvancedSearch->setSearchOperator(Get("z_Nomor_Polisi_3", ""));

		// Tanggal
		if (!$this->isAddOrEdit())
			$this->Tanggal->AdvancedSearch->setSearchValue(Get("x_Tanggal", Get("Tanggal", "")));
		if ($this->Tanggal->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Tanggal->AdvancedSearch->setSearchOperator(Get("z_Tanggal", ""));

		// Shipper_id
		if (!$this->isAddOrEdit())
			$this->Shipper_id->AdvancedSearch->setSearchValue(Get("x_Shipper_id", Get("Shipper_id", "")));
		if ($this->Shipper_id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Shipper_id->AdvancedSearch->setSearchOperator(Get("z_Shipper_id", ""));

		// Dari_Lokasi
		if (!$this->isAddOrEdit())
			$this->Dari_Lokasi->AdvancedSearch->setSearchValue(Get("x_Dari_Lokasi", Get("Dari_Lokasi", "")));
		if ($this->Dari_Lokasi->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Dari_Lokasi->AdvancedSearch->setSearchOperator(Get("z_Dari_Lokasi", ""));

		// Ke_Lokasi
		if (!$this->isAddOrEdit())
			$this->Ke_Lokasi->AdvancedSearch->setSearchValue(Get("x_Ke_Lokasi", Get("Ke_Lokasi", "")));
		if ($this->Ke_Lokasi->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Ke_Lokasi->AdvancedSearch->setSearchOperator(Get("z_Ke_Lokasi", ""));

		// Jenis_Container
		if (!$this->isAddOrEdit())
			$this->Jenis_Container->AdvancedSearch->setSearchValue(Get("x_Jenis_Container", Get("Jenis_Container", "")));
		if ($this->Jenis_Container->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Jenis_Container->AdvancedSearch->setSearchOperator(Get("z_Jenis_Container", ""));

		// Nomor_Container_1
		if (!$this->isAddOrEdit())
			$this->Nomor_Container_1->AdvancedSearch->setSearchValue(Get("x_Nomor_Container_1", Get("Nomor_Container_1", "")));
		if ($this->Nomor_Container_1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Nomor_Container_1->AdvancedSearch->setSearchOperator(Get("z_Nomor_Container_1", ""));

		// Nomor_Container_2
		if (!$this->isAddOrEdit())
			$this->Nomor_Container_2->AdvancedSearch->setSearchValue(Get("x_Nomor_Container_2", Get("Nomor_Container_2", "")));
		if ($this->Nomor_Container_2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Nomor_Container_2->AdvancedSearch->setSearchOperator(Get("z_Nomor_Container_2", ""));

		// Keterangan
		if (!$this->isAddOrEdit())
			$this->Keterangan->AdvancedSearch->setSearchValue(Get("x_Keterangan", Get("Keterangan", "")));
		if ($this->Keterangan->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Keterangan->AdvancedSearch->setSearchOperator(Get("z_Keterangan", ""));

		// Tagihan
		if (!$this->isAddOrEdit())
			$this->Tagihan->AdvancedSearch->setSearchValue(Get("x_Tagihan", Get("Tagihan", "")));
		if ($this->Tagihan->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Tagihan->AdvancedSearch->setSearchOperator(Get("z_Tagihan", ""));
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
		$this->JO_id->setOldValue($CurrentForm->getValue("o_JO_id"));

		// Check field name 'Nomor_Polisi_1' first before field var 'x_Nomor_Polisi_1'
		$val = $CurrentForm->hasValue("Nomor_Polisi_1") ? $CurrentForm->getValue("Nomor_Polisi_1") : $CurrentForm->getValue("x_Nomor_Polisi_1");
		if (!$this->Nomor_Polisi_1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Nomor_Polisi_1->Visible = FALSE; // Disable update for API request
			else
				$this->Nomor_Polisi_1->setFormValue($val);
		}
		$this->Nomor_Polisi_1->setOldValue($CurrentForm->getValue("o_Nomor_Polisi_1"));

		// Check field name 'Nomor_Polisi_2' first before field var 'x_Nomor_Polisi_2'
		$val = $CurrentForm->hasValue("Nomor_Polisi_2") ? $CurrentForm->getValue("Nomor_Polisi_2") : $CurrentForm->getValue("x_Nomor_Polisi_2");
		if (!$this->Nomor_Polisi_2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Nomor_Polisi_2->Visible = FALSE; // Disable update for API request
			else
				$this->Nomor_Polisi_2->setFormValue($val);
		}
		$this->Nomor_Polisi_2->setOldValue($CurrentForm->getValue("o_Nomor_Polisi_2"));

		// Check field name 'Nomor_Polisi_3' first before field var 'x_Nomor_Polisi_3'
		$val = $CurrentForm->hasValue("Nomor_Polisi_3") ? $CurrentForm->getValue("Nomor_Polisi_3") : $CurrentForm->getValue("x_Nomor_Polisi_3");
		if (!$this->Nomor_Polisi_3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Nomor_Polisi_3->Visible = FALSE; // Disable update for API request
			else
				$this->Nomor_Polisi_3->setFormValue($val);
		}
		$this->Nomor_Polisi_3->setOldValue($CurrentForm->getValue("o_Nomor_Polisi_3"));

		// Check field name 'Tanggal' first before field var 'x_Tanggal'
		$val = $CurrentForm->hasValue("Tanggal") ? $CurrentForm->getValue("Tanggal") : $CurrentForm->getValue("x_Tanggal");
		if (!$this->Tanggal->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Tanggal->Visible = FALSE; // Disable update for API request
			else
				$this->Tanggal->setFormValue($val);
			$this->Tanggal->CurrentValue = UnFormatDateTime($this->Tanggal->CurrentValue, 7);
		}
		$this->Tanggal->setOldValue($CurrentForm->getValue("o_Tanggal"));

		// Check field name 'Shipper_id' first before field var 'x_Shipper_id'
		$val = $CurrentForm->hasValue("Shipper_id") ? $CurrentForm->getValue("Shipper_id") : $CurrentForm->getValue("x_Shipper_id");
		if (!$this->Shipper_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Shipper_id->Visible = FALSE; // Disable update for API request
			else
				$this->Shipper_id->setFormValue($val);
		}
		$this->Shipper_id->setOldValue($CurrentForm->getValue("o_Shipper_id"));

		// Check field name 'Dari_Lokasi' first before field var 'x_Dari_Lokasi'
		$val = $CurrentForm->hasValue("Dari_Lokasi") ? $CurrentForm->getValue("Dari_Lokasi") : $CurrentForm->getValue("x_Dari_Lokasi");
		if (!$this->Dari_Lokasi->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Dari_Lokasi->Visible = FALSE; // Disable update for API request
			else
				$this->Dari_Lokasi->setFormValue($val);
		}
		$this->Dari_Lokasi->setOldValue($CurrentForm->getValue("o_Dari_Lokasi"));

		// Check field name 'Ke_Lokasi' first before field var 'x_Ke_Lokasi'
		$val = $CurrentForm->hasValue("Ke_Lokasi") ? $CurrentForm->getValue("Ke_Lokasi") : $CurrentForm->getValue("x_Ke_Lokasi");
		if (!$this->Ke_Lokasi->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Ke_Lokasi->Visible = FALSE; // Disable update for API request
			else
				$this->Ke_Lokasi->setFormValue($val);
		}
		$this->Ke_Lokasi->setOldValue($CurrentForm->getValue("o_Ke_Lokasi"));

		// Check field name 'Jenis_Container' first before field var 'x_Jenis_Container'
		$val = $CurrentForm->hasValue("Jenis_Container") ? $CurrentForm->getValue("Jenis_Container") : $CurrentForm->getValue("x_Jenis_Container");
		if (!$this->Jenis_Container->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Jenis_Container->Visible = FALSE; // Disable update for API request
			else
				$this->Jenis_Container->setFormValue($val);
		}
		$this->Jenis_Container->setOldValue($CurrentForm->getValue("o_Jenis_Container"));

		// Check field name 'Nomor_Container_1' first before field var 'x_Nomor_Container_1'
		$val = $CurrentForm->hasValue("Nomor_Container_1") ? $CurrentForm->getValue("Nomor_Container_1") : $CurrentForm->getValue("x_Nomor_Container_1");
		if (!$this->Nomor_Container_1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Nomor_Container_1->Visible = FALSE; // Disable update for API request
			else
				$this->Nomor_Container_1->setFormValue($val);
		}
		$this->Nomor_Container_1->setOldValue($CurrentForm->getValue("o_Nomor_Container_1"));

		// Check field name 'Nomor_Container_2' first before field var 'x_Nomor_Container_2'
		$val = $CurrentForm->hasValue("Nomor_Container_2") ? $CurrentForm->getValue("Nomor_Container_2") : $CurrentForm->getValue("x_Nomor_Container_2");
		if (!$this->Nomor_Container_2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Nomor_Container_2->Visible = FALSE; // Disable update for API request
			else
				$this->Nomor_Container_2->setFormValue($val);
		}
		$this->Nomor_Container_2->setOldValue($CurrentForm->getValue("o_Nomor_Container_2"));

		// Check field name 'Keterangan' first before field var 'x_Keterangan'
		$val = $CurrentForm->hasValue("Keterangan") ? $CurrentForm->getValue("Keterangan") : $CurrentForm->getValue("x_Keterangan");
		if (!$this->Keterangan->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Keterangan->Visible = FALSE; // Disable update for API request
			else
				$this->Keterangan->setFormValue($val);
		}
		$this->Keterangan->setOldValue($CurrentForm->getValue("o_Keterangan"));

		// Check field name 'Tagihan' first before field var 'x_Tagihan'
		$val = $CurrentForm->hasValue("Tagihan") ? $CurrentForm->getValue("Tagihan") : $CurrentForm->getValue("x_Tagihan");
		if (!$this->Tagihan->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Tagihan->Visible = FALSE; // Disable update for API request
			else
				$this->Tagihan->setFormValue($val);
		}
		$this->Tagihan->setOldValue($CurrentForm->getValue("o_Tagihan"));

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd())
			$this->id->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
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
			if (!$this->EventCancelled)
				$this->HashValue = $this->getRowHash($rs); // Get hash value for record
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
		$this->ViewUrl = $this->getViewUrl();
		$this->EditUrl = $this->getEditUrl();
		$this->InlineEditUrl = $this->getInlineEditUrl();
		$this->CopyUrl = $this->getCopyUrl();
		$this->InlineCopyUrl = $this->getInlineCopyUrl();
		$this->DeleteUrl = $this->getDeleteUrl();

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
			if (!$this->isExport())
				$this->Nomor_Polisi_1->ViewValue = $this->highlightValue($this->Nomor_Polisi_1);

			// Nomor_Polisi_2
			$this->Nomor_Polisi_2->LinkCustomAttributes = "";
			$this->Nomor_Polisi_2->HrefValue = "";
			$this->Nomor_Polisi_2->TooltipValue = "";
			if (!$this->isExport())
				$this->Nomor_Polisi_2->ViewValue = $this->highlightValue($this->Nomor_Polisi_2);

			// Nomor_Polisi_3
			$this->Nomor_Polisi_3->LinkCustomAttributes = "";
			$this->Nomor_Polisi_3->HrefValue = "";
			$this->Nomor_Polisi_3->TooltipValue = "";
			if (!$this->isExport())
				$this->Nomor_Polisi_3->ViewValue = $this->highlightValue($this->Nomor_Polisi_3);

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
			if (!$this->isExport())
				$this->Dari_Lokasi->ViewValue = $this->highlightValue($this->Dari_Lokasi);

			// Ke_Lokasi
			$this->Ke_Lokasi->LinkCustomAttributes = "";
			$this->Ke_Lokasi->HrefValue = "";
			$this->Ke_Lokasi->TooltipValue = "";
			if (!$this->isExport())
				$this->Ke_Lokasi->ViewValue = $this->highlightValue($this->Ke_Lokasi);

			// Jenis_Container
			$this->Jenis_Container->LinkCustomAttributes = "";
			$this->Jenis_Container->HrefValue = "";
			$this->Jenis_Container->TooltipValue = "";

			// Nomor_Container_1
			$this->Nomor_Container_1->LinkCustomAttributes = "";
			$this->Nomor_Container_1->HrefValue = "";
			$this->Nomor_Container_1->TooltipValue = "";
			if (!$this->isExport())
				$this->Nomor_Container_1->ViewValue = $this->highlightValue($this->Nomor_Container_1);

			// Nomor_Container_2
			$this->Nomor_Container_2->LinkCustomAttributes = "";
			$this->Nomor_Container_2->HrefValue = "";
			$this->Nomor_Container_2->TooltipValue = "";
			if (!$this->isExport())
				$this->Nomor_Container_2->ViewValue = $this->highlightValue($this->Nomor_Container_2);

			// Keterangan
			$this->Keterangan->LinkCustomAttributes = "";
			$this->Keterangan->HrefValue = "";
			$this->Keterangan->TooltipValue = "";
			if (!$this->isExport())
				$this->Keterangan->ViewValue = $this->highlightValue($this->Keterangan);

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
			if (strval($this->Tagihan->EditValue) <> "" && is_numeric($this->Tagihan->EditValue)) {
				$this->Tagihan->EditValue = FormatNumber($this->Tagihan->EditValue, -2, -2, -2, -2);
				$this->Tagihan->OldValue = $this->Tagihan->EditValue;
			}

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
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

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
			if (strval($this->Tagihan->EditValue) <> "" && is_numeric($this->Tagihan->EditValue)) {
				$this->Tagihan->EditValue = FormatNumber($this->Tagihan->EditValue, -2, -2, -2, -2);
				$this->Tagihan->OldValue = $this->Tagihan->EditValue;
			}

			// Edit refer script
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
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// JO_id
			$this->JO_id->EditAttrs["class"] = "form-control";
			$this->JO_id->EditCustomAttributes = "";
			$this->JO_id->EditValue = HtmlEncode($this->JO_id->AdvancedSearch->SearchValue);
			$this->JO_id->PlaceHolder = RemoveHtml($this->JO_id->caption());

			// Nomor_Polisi_1
			$this->Nomor_Polisi_1->EditAttrs["class"] = "form-control";
			$this->Nomor_Polisi_1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Nomor_Polisi_1->AdvancedSearch->SearchValue = HtmlDecode($this->Nomor_Polisi_1->AdvancedSearch->SearchValue);
			$this->Nomor_Polisi_1->EditValue = HtmlEncode($this->Nomor_Polisi_1->AdvancedSearch->SearchValue);
			$this->Nomor_Polisi_1->PlaceHolder = RemoveHtml($this->Nomor_Polisi_1->caption());

			// Nomor_Polisi_2
			$this->Nomor_Polisi_2->EditAttrs["class"] = "form-control";
			$this->Nomor_Polisi_2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Nomor_Polisi_2->AdvancedSearch->SearchValue = HtmlDecode($this->Nomor_Polisi_2->AdvancedSearch->SearchValue);
			$this->Nomor_Polisi_2->EditValue = HtmlEncode($this->Nomor_Polisi_2->AdvancedSearch->SearchValue);
			$this->Nomor_Polisi_2->PlaceHolder = RemoveHtml($this->Nomor_Polisi_2->caption());

			// Nomor_Polisi_3
			$this->Nomor_Polisi_3->EditAttrs["class"] = "form-control";
			$this->Nomor_Polisi_3->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Nomor_Polisi_3->AdvancedSearch->SearchValue = HtmlDecode($this->Nomor_Polisi_3->AdvancedSearch->SearchValue);
			$this->Nomor_Polisi_3->EditValue = HtmlEncode($this->Nomor_Polisi_3->AdvancedSearch->SearchValue);
			$this->Nomor_Polisi_3->PlaceHolder = RemoveHtml($this->Nomor_Polisi_3->caption());

			// Tanggal
			$this->Tanggal->EditAttrs["class"] = "form-control";
			$this->Tanggal->EditCustomAttributes = "";
			$this->Tanggal->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->Tanggal->AdvancedSearch->SearchValue, 7), 7));
			$this->Tanggal->PlaceHolder = RemoveHtml($this->Tanggal->caption());

			// Shipper_id
			$this->Shipper_id->EditAttrs["class"] = "form-control";
			$this->Shipper_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->Shipper_id->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->Shipper_id->AdvancedSearch->ViewValue = $this->Shipper_id->lookupCacheOption($curVal);
			else
				$this->Shipper_id->AdvancedSearch->ViewValue = $this->Shipper_id->Lookup !== NULL && is_array($this->Shipper_id->Lookup->Options) ? $curVal : NULL;
			if ($this->Shipper_id->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->Shipper_id->EditValue = array_values($this->Shipper_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->Shipper_id->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
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
				$this->Dari_Lokasi->AdvancedSearch->SearchValue = HtmlDecode($this->Dari_Lokasi->AdvancedSearch->SearchValue);
			$this->Dari_Lokasi->EditValue = HtmlEncode($this->Dari_Lokasi->AdvancedSearch->SearchValue);
			$this->Dari_Lokasi->PlaceHolder = RemoveHtml($this->Dari_Lokasi->caption());

			// Ke_Lokasi
			$this->Ke_Lokasi->EditAttrs["class"] = "form-control";
			$this->Ke_Lokasi->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Ke_Lokasi->AdvancedSearch->SearchValue = HtmlDecode($this->Ke_Lokasi->AdvancedSearch->SearchValue);
			$this->Ke_Lokasi->EditValue = HtmlEncode($this->Ke_Lokasi->AdvancedSearch->SearchValue);
			$this->Ke_Lokasi->PlaceHolder = RemoveHtml($this->Ke_Lokasi->caption());

			// Jenis_Container
			$this->Jenis_Container->EditCustomAttributes = "";
			$this->Jenis_Container->EditValue = $this->Jenis_Container->options(FALSE);

			// Nomor_Container_1
			$this->Nomor_Container_1->EditAttrs["class"] = "form-control";
			$this->Nomor_Container_1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Nomor_Container_1->AdvancedSearch->SearchValue = HtmlDecode($this->Nomor_Container_1->AdvancedSearch->SearchValue);
			$this->Nomor_Container_1->EditValue = HtmlEncode($this->Nomor_Container_1->AdvancedSearch->SearchValue);
			$this->Nomor_Container_1->PlaceHolder = RemoveHtml($this->Nomor_Container_1->caption());

			// Nomor_Container_2
			$this->Nomor_Container_2->EditAttrs["class"] = "form-control";
			$this->Nomor_Container_2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Nomor_Container_2->AdvancedSearch->SearchValue = HtmlDecode($this->Nomor_Container_2->AdvancedSearch->SearchValue);
			$this->Nomor_Container_2->EditValue = HtmlEncode($this->Nomor_Container_2->AdvancedSearch->SearchValue);
			$this->Nomor_Container_2->PlaceHolder = RemoveHtml($this->Nomor_Container_2->caption());

			// Keterangan
			$this->Keterangan->EditAttrs["class"] = "form-control";
			$this->Keterangan->EditCustomAttributes = "";
			$this->Keterangan->EditValue = HtmlEncode($this->Keterangan->AdvancedSearch->SearchValue);
			$this->Keterangan->PlaceHolder = RemoveHtml($this->Keterangan->caption());

			// Tagihan
			$this->Tagihan->EditAttrs["class"] = "form-control";
			$this->Tagihan->EditCustomAttributes = "";
			$this->Tagihan->EditValue = HtmlEncode($this->Tagihan->AdvancedSearch->SearchValue);
			$this->Tagihan->PlaceHolder = RemoveHtml($this->Tagihan->caption());
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
		if (!CheckInteger($this->JO_id->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->JO_id->errorMessage());
		}

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

	// Delete records based on current filter
	protected function deleteRows()
	{
		global $Language, $Security;
		$deleteRows = TRUE;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
			$rs->close();
			return FALSE;
		}
		$rows = ($rs) ? $rs->getRows() : [];
		if ($this->AuditTrailOnDelete)
			$this->writeAuditTrailDummy($Language->phrase("BatchDeleteBegin")); // Batch delete begin

		// Clone old rows
		$rsold = $rows;
		if ($rs)
			$rs->close();

		// Call row deleting event
		if ($deleteRows) {
			foreach ($rsold as $row) {
				$deleteRows = $this->Row_Deleting($row);
				if (!$deleteRows)
					break;
			}
		}
		if ($deleteRows) {
			$key = "";
			foreach ($rsold as $row) {
				$thisKey = "";
				if ($thisKey <> "")
					$thisKey .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
				$thisKey .= $row['id'];
				if (DELETE_UPLOADED_FILES) // Delete old files
					$this->deleteUploadedFiles($row);
				$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
				$deleteRows = $this->delete($row); // Delete
				$conn->raiseErrorFn = '';
				if ($deleteRows === FALSE)
					break;
				if ($key <> "")
					$key .= ", ";
				$key .= $thisKey;
			}
		}
		if (!$deleteRows) {

			// Set up error message
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("DeleteCancelled"));
			}
		}

		// Call Row Deleted event
		if ($deleteRows) {
			foreach ($rsold as $row) {
				$this->Row_Deleted($row);
			}
		}

		// Write JSON for API request (Support single row only)
		if (IsApi() && $deleteRows) {
			$row = $this->getRecordsFromRecordset($rsold, TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $deleteRows;
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

			// JO_id
			$this->JO_id->setDbValueDef($rsnew, $this->JO_id->CurrentValue, NULL, $this->JO_id->ReadOnly);

			// Nomor_Polisi_1
			$this->Nomor_Polisi_1->setDbValueDef($rsnew, $this->Nomor_Polisi_1->CurrentValue, "", $this->Nomor_Polisi_1->ReadOnly);

			// Nomor_Polisi_2
			$this->Nomor_Polisi_2->setDbValueDef($rsnew, $this->Nomor_Polisi_2->CurrentValue, "", $this->Nomor_Polisi_2->ReadOnly);

			// Nomor_Polisi_3
			$this->Nomor_Polisi_3->setDbValueDef($rsnew, $this->Nomor_Polisi_3->CurrentValue, "", $this->Nomor_Polisi_3->ReadOnly);

			// Tanggal
			$this->Tanggal->setDbValueDef($rsnew, UnFormatDateTime($this->Tanggal->CurrentValue, 7), CurrentDate(), $this->Tanggal->ReadOnly);

			// Shipper_id
			$this->Shipper_id->setDbValueDef($rsnew, $this->Shipper_id->CurrentValue, 0, $this->Shipper_id->ReadOnly);

			// Dari_Lokasi
			$this->Dari_Lokasi->setDbValueDef($rsnew, $this->Dari_Lokasi->CurrentValue, "", $this->Dari_Lokasi->ReadOnly);

			// Ke_Lokasi
			$this->Ke_Lokasi->setDbValueDef($rsnew, $this->Ke_Lokasi->CurrentValue, "", $this->Ke_Lokasi->ReadOnly);

			// Jenis_Container
			$this->Jenis_Container->setDbValueDef($rsnew, $this->Jenis_Container->CurrentValue, "", $this->Jenis_Container->ReadOnly);

			// Nomor_Container_1
			$this->Nomor_Container_1->setDbValueDef($rsnew, $this->Nomor_Container_1->CurrentValue, "", $this->Nomor_Container_1->ReadOnly);

			// Nomor_Container_2
			$this->Nomor_Container_2->setDbValueDef($rsnew, $this->Nomor_Container_2->CurrentValue, "", $this->Nomor_Container_2->ReadOnly);

			// Keterangan
			$this->Keterangan->setDbValueDef($rsnew, $this->Keterangan->CurrentValue, "", $this->Keterangan->ReadOnly);

			// Tagihan
			$this->Tagihan->setDbValueDef($rsnew, $this->Tagihan->CurrentValue, 0, $this->Tagihan->ReadOnly);

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

	// Load row hash
	protected function loadRowHash()
	{
		$filter = $this->getRecordFilter();

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$rsRow = $conn->Execute($sql);
		$this->HashValue = ($rsRow && !$rsRow->EOF) ? $this->getRowHash($rsRow) : ""; // Get hash value for record
		$rsRow->close();
	}

	// Get Row Hash
	public function getRowHash(&$rs)
	{
		if (!$rs)
			return "";
		$hash = "";
		$hash .= GetFieldHash($rs->fields('JO_id')); // JO_id
		$hash .= GetFieldHash($rs->fields('Nomor_Polisi_1')); // Nomor_Polisi_1
		$hash .= GetFieldHash($rs->fields('Nomor_Polisi_2')); // Nomor_Polisi_2
		$hash .= GetFieldHash($rs->fields('Nomor_Polisi_3')); // Nomor_Polisi_3
		$hash .= GetFieldHash($rs->fields('Tanggal')); // Tanggal
		$hash .= GetFieldHash($rs->fields('Shipper_id')); // Shipper_id
		$hash .= GetFieldHash($rs->fields('Dari_Lokasi')); // Dari_Lokasi
		$hash .= GetFieldHash($rs->fields('Ke_Lokasi')); // Ke_Lokasi
		$hash .= GetFieldHash($rs->fields('Jenis_Container')); // Jenis_Container
		$hash .= GetFieldHash($rs->fields('Nomor_Container_1')); // Nomor_Container_1
		$hash .= GetFieldHash($rs->fields('Nomor_Container_2')); // Nomor_Container_2
		$hash .= GetFieldHash($rs->fields('Keterangan')); // Keterangan
		$hash .= GetFieldHash($rs->fields('Tagihan')); // Tagihan
		return md5($hash);
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

	// Load advanced search
	public function loadAdvancedSearch()
	{
		$this->id->AdvancedSearch->load();
		$this->JO_id->AdvancedSearch->load();
		$this->Nomor_Polisi_1->AdvancedSearch->load();
		$this->Nomor_Polisi_2->AdvancedSearch->load();
		$this->Nomor_Polisi_3->AdvancedSearch->load();
		$this->Tanggal->AdvancedSearch->load();
		$this->Shipper_id->AdvancedSearch->load();
		$this->Dari_Lokasi->AdvancedSearch->load();
		$this->Ke_Lokasi->AdvancedSearch->load();
		$this->Jenis_Container->AdvancedSearch->load();
		$this->Nomor_Container_1->AdvancedSearch->load();
		$this->Nomor_Container_2->AdvancedSearch->load();
		$this->Keterangan->AdvancedSearch->load();
		$this->Tagihan->AdvancedSearch->load();
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