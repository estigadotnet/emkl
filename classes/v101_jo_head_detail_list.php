<?php
namespace PHPMaker2019\emkl_prj;

/**
 * Page class
 */
class v101_jo_head_detail_list extends v101_jo_head_detail
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{D4B21A3D-A1C8-4ED3-BA65-212E10E691E7}";

	// Table name
	public $TableName = 'v101_jo_head_detail';

	// Page object name
	public $PageObjName = "v101_jo_head_detail_list";

	// Grid form hidden field names
	public $FormName = "fv101_jo_head_detaillist";
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

		// Table object (v101_jo_head_detail)
		if (!isset($GLOBALS["v101_jo_head_detail"]) || get_class($GLOBALS["v101_jo_head_detail"]) == PROJECT_NAMESPACE . "v101_jo_head_detail") {
			$GLOBALS["v101_jo_head_detail"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["v101_jo_head_detail"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "v101_jo_head_detailadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "v101_jo_head_detaildelete.php";
		$this->MultiUpdateUrl = "v101_jo_head_detailupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'v101_jo_head_detail');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fv101_jo_head_detaillistsrch";

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
		global $EXPORT, $v101_jo_head_detail;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($v101_jo_head_detail);
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
		$this->export_import->setVisibility();
		$this->no_bl->setVisibility();
		$this->nomor_jo->setVisibility();
		$this->shipper_id->setVisibility();
		$this->party->setVisibility();
		$this->container->setVisibility();
		$this->tanggal_stuffing->setVisibility();
		$this->destination_id->setVisibility();
		$this->feeder_id->setVisibility();
		$this->truckingvendor_id->setVisibility();
		$this->driver_id->setVisibility();
		$this->nomor_polisi_1->setVisibility();
		$this->nomor_polisi_2->setVisibility();
		$this->nomor_polisi_3->setVisibility();
		$this->nomor_container_1->setVisibility();
		$this->nomor_container_2->setVisibility();
		$this->ref_johead_id->setVisibility();
		$this->no_tagihan->setVisibility();
		$this->jumlah_tagihan->setVisibility();
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
		$this->setupLookupOptions($this->shipper_id);
		$this->setupLookupOptions($this->destination_id);
		$this->setupLookupOptions($this->feeder_id);
		$this->setupLookupOptions($this->truckingvendor_id);
		$this->setupLookupOptions($this->driver_id);
		$this->setupLookupOptions($this->ref_johead_id);

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
		$this->jumlah_tagihan->FormValue = ""; // Clear form value
		$this->LastAction = $this->CurrentAction; // Save last action
		$this->CurrentAction = ""; // Clear action
		$_SESSION[SESSION_INLINE_MODE] = ""; // Clear inline mode
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

	// Check if empty row
	public function emptyRow()
	{
		global $CurrentForm;
		if ($CurrentForm->hasValue("x_export_import") && $CurrentForm->hasValue("o_export_import") && $this->export_import->CurrentValue <> $this->export_import->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_no_bl") && $CurrentForm->hasValue("o_no_bl") && $this->no_bl->CurrentValue <> $this->no_bl->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_nomor_jo") && $CurrentForm->hasValue("o_nomor_jo") && $this->nomor_jo->CurrentValue <> $this->nomor_jo->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_shipper_id") && $CurrentForm->hasValue("o_shipper_id") && $this->shipper_id->CurrentValue <> $this->shipper_id->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_party") && $CurrentForm->hasValue("o_party") && $this->party->CurrentValue <> $this->party->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_container") && $CurrentForm->hasValue("o_container") && $this->container->CurrentValue <> $this->container->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_tanggal_stuffing") && $CurrentForm->hasValue("o_tanggal_stuffing") && $this->tanggal_stuffing->CurrentValue <> $this->tanggal_stuffing->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_destination_id") && $CurrentForm->hasValue("o_destination_id") && $this->destination_id->CurrentValue <> $this->destination_id->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_feeder_id") && $CurrentForm->hasValue("o_feeder_id") && $this->feeder_id->CurrentValue <> $this->feeder_id->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_truckingvendor_id") && $CurrentForm->hasValue("o_truckingvendor_id") && $this->truckingvendor_id->CurrentValue <> $this->truckingvendor_id->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_driver_id") && $CurrentForm->hasValue("o_driver_id") && $this->driver_id->CurrentValue <> $this->driver_id->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_nomor_polisi_1") && $CurrentForm->hasValue("o_nomor_polisi_1") && $this->nomor_polisi_1->CurrentValue <> $this->nomor_polisi_1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_nomor_polisi_2") && $CurrentForm->hasValue("o_nomor_polisi_2") && $this->nomor_polisi_2->CurrentValue <> $this->nomor_polisi_2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_nomor_polisi_3") && $CurrentForm->hasValue("o_nomor_polisi_3") && $this->nomor_polisi_3->CurrentValue <> $this->nomor_polisi_3->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_nomor_container_1") && $CurrentForm->hasValue("o_nomor_container_1") && $this->nomor_container_1->CurrentValue <> $this->nomor_container_1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_nomor_container_2") && $CurrentForm->hasValue("o_nomor_container_2") && $this->nomor_container_2->CurrentValue <> $this->nomor_container_2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ref_johead_id") && $CurrentForm->hasValue("o_ref_johead_id") && $this->ref_johead_id->CurrentValue <> $this->ref_johead_id->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_no_tagihan") && $CurrentForm->hasValue("o_no_tagihan") && $this->no_tagihan->CurrentValue <> $this->no_tagihan->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_jumlah_tagihan") && $CurrentForm->hasValue("o_jumlah_tagihan") && $this->jumlah_tagihan->CurrentValue <> $this->jumlah_tagihan->OldValue)
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
		$filterList = Concat($filterList, $this->export_import->AdvancedSearch->toJson(), ","); // Field export_import
		$filterList = Concat($filterList, $this->no_bl->AdvancedSearch->toJson(), ","); // Field no_bl
		$filterList = Concat($filterList, $this->nomor_jo->AdvancedSearch->toJson(), ","); // Field nomor_jo
		$filterList = Concat($filterList, $this->shipper_id->AdvancedSearch->toJson(), ","); // Field shipper_id
		$filterList = Concat($filterList, $this->party->AdvancedSearch->toJson(), ","); // Field party
		$filterList = Concat($filterList, $this->container->AdvancedSearch->toJson(), ","); // Field container
		$filterList = Concat($filterList, $this->tanggal_stuffing->AdvancedSearch->toJson(), ","); // Field tanggal_stuffing
		$filterList = Concat($filterList, $this->destination_id->AdvancedSearch->toJson(), ","); // Field destination_id
		$filterList = Concat($filterList, $this->feeder_id->AdvancedSearch->toJson(), ","); // Field feeder_id
		$filterList = Concat($filterList, $this->truckingvendor_id->AdvancedSearch->toJson(), ","); // Field truckingvendor_id
		$filterList = Concat($filterList, $this->driver_id->AdvancedSearch->toJson(), ","); // Field driver_id
		$filterList = Concat($filterList, $this->nomor_polisi_1->AdvancedSearch->toJson(), ","); // Field nomor_polisi_1
		$filterList = Concat($filterList, $this->nomor_polisi_2->AdvancedSearch->toJson(), ","); // Field nomor_polisi_2
		$filterList = Concat($filterList, $this->nomor_polisi_3->AdvancedSearch->toJson(), ","); // Field nomor_polisi_3
		$filterList = Concat($filterList, $this->nomor_container_1->AdvancedSearch->toJson(), ","); // Field nomor_container_1
		$filterList = Concat($filterList, $this->nomor_container_2->AdvancedSearch->toJson(), ","); // Field nomor_container_2
		$filterList = Concat($filterList, $this->ref_johead_id->AdvancedSearch->toJson(), ","); // Field ref_johead_id
		$filterList = Concat($filterList, $this->no_tagihan->AdvancedSearch->toJson(), ","); // Field no_tagihan
		$filterList = Concat($filterList, $this->jumlah_tagihan->AdvancedSearch->toJson(), ","); // Field jumlah_tagihan
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fv101_jo_head_detaillistsrch", $filters);
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

		// Field export_import
		$this->export_import->AdvancedSearch->SearchValue = @$filter["x_export_import"];
		$this->export_import->AdvancedSearch->SearchOperator = @$filter["z_export_import"];
		$this->export_import->AdvancedSearch->SearchCondition = @$filter["v_export_import"];
		$this->export_import->AdvancedSearch->SearchValue2 = @$filter["y_export_import"];
		$this->export_import->AdvancedSearch->SearchOperator2 = @$filter["w_export_import"];
		$this->export_import->AdvancedSearch->save();

		// Field no_bl
		$this->no_bl->AdvancedSearch->SearchValue = @$filter["x_no_bl"];
		$this->no_bl->AdvancedSearch->SearchOperator = @$filter["z_no_bl"];
		$this->no_bl->AdvancedSearch->SearchCondition = @$filter["v_no_bl"];
		$this->no_bl->AdvancedSearch->SearchValue2 = @$filter["y_no_bl"];
		$this->no_bl->AdvancedSearch->SearchOperator2 = @$filter["w_no_bl"];
		$this->no_bl->AdvancedSearch->save();

		// Field nomor_jo
		$this->nomor_jo->AdvancedSearch->SearchValue = @$filter["x_nomor_jo"];
		$this->nomor_jo->AdvancedSearch->SearchOperator = @$filter["z_nomor_jo"];
		$this->nomor_jo->AdvancedSearch->SearchCondition = @$filter["v_nomor_jo"];
		$this->nomor_jo->AdvancedSearch->SearchValue2 = @$filter["y_nomor_jo"];
		$this->nomor_jo->AdvancedSearch->SearchOperator2 = @$filter["w_nomor_jo"];
		$this->nomor_jo->AdvancedSearch->save();

		// Field shipper_id
		$this->shipper_id->AdvancedSearch->SearchValue = @$filter["x_shipper_id"];
		$this->shipper_id->AdvancedSearch->SearchOperator = @$filter["z_shipper_id"];
		$this->shipper_id->AdvancedSearch->SearchCondition = @$filter["v_shipper_id"];
		$this->shipper_id->AdvancedSearch->SearchValue2 = @$filter["y_shipper_id"];
		$this->shipper_id->AdvancedSearch->SearchOperator2 = @$filter["w_shipper_id"];
		$this->shipper_id->AdvancedSearch->save();

		// Field party
		$this->party->AdvancedSearch->SearchValue = @$filter["x_party"];
		$this->party->AdvancedSearch->SearchOperator = @$filter["z_party"];
		$this->party->AdvancedSearch->SearchCondition = @$filter["v_party"];
		$this->party->AdvancedSearch->SearchValue2 = @$filter["y_party"];
		$this->party->AdvancedSearch->SearchOperator2 = @$filter["w_party"];
		$this->party->AdvancedSearch->save();

		// Field container
		$this->container->AdvancedSearch->SearchValue = @$filter["x_container"];
		$this->container->AdvancedSearch->SearchOperator = @$filter["z_container"];
		$this->container->AdvancedSearch->SearchCondition = @$filter["v_container"];
		$this->container->AdvancedSearch->SearchValue2 = @$filter["y_container"];
		$this->container->AdvancedSearch->SearchOperator2 = @$filter["w_container"];
		$this->container->AdvancedSearch->save();

		// Field tanggal_stuffing
		$this->tanggal_stuffing->AdvancedSearch->SearchValue = @$filter["x_tanggal_stuffing"];
		$this->tanggal_stuffing->AdvancedSearch->SearchOperator = @$filter["z_tanggal_stuffing"];
		$this->tanggal_stuffing->AdvancedSearch->SearchCondition = @$filter["v_tanggal_stuffing"];
		$this->tanggal_stuffing->AdvancedSearch->SearchValue2 = @$filter["y_tanggal_stuffing"];
		$this->tanggal_stuffing->AdvancedSearch->SearchOperator2 = @$filter["w_tanggal_stuffing"];
		$this->tanggal_stuffing->AdvancedSearch->save();

		// Field destination_id
		$this->destination_id->AdvancedSearch->SearchValue = @$filter["x_destination_id"];
		$this->destination_id->AdvancedSearch->SearchOperator = @$filter["z_destination_id"];
		$this->destination_id->AdvancedSearch->SearchCondition = @$filter["v_destination_id"];
		$this->destination_id->AdvancedSearch->SearchValue2 = @$filter["y_destination_id"];
		$this->destination_id->AdvancedSearch->SearchOperator2 = @$filter["w_destination_id"];
		$this->destination_id->AdvancedSearch->save();

		// Field feeder_id
		$this->feeder_id->AdvancedSearch->SearchValue = @$filter["x_feeder_id"];
		$this->feeder_id->AdvancedSearch->SearchOperator = @$filter["z_feeder_id"];
		$this->feeder_id->AdvancedSearch->SearchCondition = @$filter["v_feeder_id"];
		$this->feeder_id->AdvancedSearch->SearchValue2 = @$filter["y_feeder_id"];
		$this->feeder_id->AdvancedSearch->SearchOperator2 = @$filter["w_feeder_id"];
		$this->feeder_id->AdvancedSearch->save();

		// Field truckingvendor_id
		$this->truckingvendor_id->AdvancedSearch->SearchValue = @$filter["x_truckingvendor_id"];
		$this->truckingvendor_id->AdvancedSearch->SearchOperator = @$filter["z_truckingvendor_id"];
		$this->truckingvendor_id->AdvancedSearch->SearchCondition = @$filter["v_truckingvendor_id"];
		$this->truckingvendor_id->AdvancedSearch->SearchValue2 = @$filter["y_truckingvendor_id"];
		$this->truckingvendor_id->AdvancedSearch->SearchOperator2 = @$filter["w_truckingvendor_id"];
		$this->truckingvendor_id->AdvancedSearch->save();

		// Field driver_id
		$this->driver_id->AdvancedSearch->SearchValue = @$filter["x_driver_id"];
		$this->driver_id->AdvancedSearch->SearchOperator = @$filter["z_driver_id"];
		$this->driver_id->AdvancedSearch->SearchCondition = @$filter["v_driver_id"];
		$this->driver_id->AdvancedSearch->SearchValue2 = @$filter["y_driver_id"];
		$this->driver_id->AdvancedSearch->SearchOperator2 = @$filter["w_driver_id"];
		$this->driver_id->AdvancedSearch->save();

		// Field nomor_polisi_1
		$this->nomor_polisi_1->AdvancedSearch->SearchValue = @$filter["x_nomor_polisi_1"];
		$this->nomor_polisi_1->AdvancedSearch->SearchOperator = @$filter["z_nomor_polisi_1"];
		$this->nomor_polisi_1->AdvancedSearch->SearchCondition = @$filter["v_nomor_polisi_1"];
		$this->nomor_polisi_1->AdvancedSearch->SearchValue2 = @$filter["y_nomor_polisi_1"];
		$this->nomor_polisi_1->AdvancedSearch->SearchOperator2 = @$filter["w_nomor_polisi_1"];
		$this->nomor_polisi_1->AdvancedSearch->save();

		// Field nomor_polisi_2
		$this->nomor_polisi_2->AdvancedSearch->SearchValue = @$filter["x_nomor_polisi_2"];
		$this->nomor_polisi_2->AdvancedSearch->SearchOperator = @$filter["z_nomor_polisi_2"];
		$this->nomor_polisi_2->AdvancedSearch->SearchCondition = @$filter["v_nomor_polisi_2"];
		$this->nomor_polisi_2->AdvancedSearch->SearchValue2 = @$filter["y_nomor_polisi_2"];
		$this->nomor_polisi_2->AdvancedSearch->SearchOperator2 = @$filter["w_nomor_polisi_2"];
		$this->nomor_polisi_2->AdvancedSearch->save();

		// Field nomor_polisi_3
		$this->nomor_polisi_3->AdvancedSearch->SearchValue = @$filter["x_nomor_polisi_3"];
		$this->nomor_polisi_3->AdvancedSearch->SearchOperator = @$filter["z_nomor_polisi_3"];
		$this->nomor_polisi_3->AdvancedSearch->SearchCondition = @$filter["v_nomor_polisi_3"];
		$this->nomor_polisi_3->AdvancedSearch->SearchValue2 = @$filter["y_nomor_polisi_3"];
		$this->nomor_polisi_3->AdvancedSearch->SearchOperator2 = @$filter["w_nomor_polisi_3"];
		$this->nomor_polisi_3->AdvancedSearch->save();

		// Field nomor_container_1
		$this->nomor_container_1->AdvancedSearch->SearchValue = @$filter["x_nomor_container_1"];
		$this->nomor_container_1->AdvancedSearch->SearchOperator = @$filter["z_nomor_container_1"];
		$this->nomor_container_1->AdvancedSearch->SearchCondition = @$filter["v_nomor_container_1"];
		$this->nomor_container_1->AdvancedSearch->SearchValue2 = @$filter["y_nomor_container_1"];
		$this->nomor_container_1->AdvancedSearch->SearchOperator2 = @$filter["w_nomor_container_1"];
		$this->nomor_container_1->AdvancedSearch->save();

		// Field nomor_container_2
		$this->nomor_container_2->AdvancedSearch->SearchValue = @$filter["x_nomor_container_2"];
		$this->nomor_container_2->AdvancedSearch->SearchOperator = @$filter["z_nomor_container_2"];
		$this->nomor_container_2->AdvancedSearch->SearchCondition = @$filter["v_nomor_container_2"];
		$this->nomor_container_2->AdvancedSearch->SearchValue2 = @$filter["y_nomor_container_2"];
		$this->nomor_container_2->AdvancedSearch->SearchOperator2 = @$filter["w_nomor_container_2"];
		$this->nomor_container_2->AdvancedSearch->save();

		// Field ref_johead_id
		$this->ref_johead_id->AdvancedSearch->SearchValue = @$filter["x_ref_johead_id"];
		$this->ref_johead_id->AdvancedSearch->SearchOperator = @$filter["z_ref_johead_id"];
		$this->ref_johead_id->AdvancedSearch->SearchCondition = @$filter["v_ref_johead_id"];
		$this->ref_johead_id->AdvancedSearch->SearchValue2 = @$filter["y_ref_johead_id"];
		$this->ref_johead_id->AdvancedSearch->SearchOperator2 = @$filter["w_ref_johead_id"];
		$this->ref_johead_id->AdvancedSearch->save();

		// Field no_tagihan
		$this->no_tagihan->AdvancedSearch->SearchValue = @$filter["x_no_tagihan"];
		$this->no_tagihan->AdvancedSearch->SearchOperator = @$filter["z_no_tagihan"];
		$this->no_tagihan->AdvancedSearch->SearchCondition = @$filter["v_no_tagihan"];
		$this->no_tagihan->AdvancedSearch->SearchValue2 = @$filter["y_no_tagihan"];
		$this->no_tagihan->AdvancedSearch->SearchOperator2 = @$filter["w_no_tagihan"];
		$this->no_tagihan->AdvancedSearch->save();

		// Field jumlah_tagihan
		$this->jumlah_tagihan->AdvancedSearch->SearchValue = @$filter["x_jumlah_tagihan"];
		$this->jumlah_tagihan->AdvancedSearch->SearchOperator = @$filter["z_jumlah_tagihan"];
		$this->jumlah_tagihan->AdvancedSearch->SearchCondition = @$filter["v_jumlah_tagihan"];
		$this->jumlah_tagihan->AdvancedSearch->SearchValue2 = @$filter["y_jumlah_tagihan"];
		$this->jumlah_tagihan->AdvancedSearch->SearchOperator2 = @$filter["w_jumlah_tagihan"];
		$this->jumlah_tagihan->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[TABLE_BASIC_SEARCH]);
		$this->BasicSearch->setType(@$filter[TABLE_BASIC_SEARCH_TYPE]);
	}

	// Advanced search WHERE clause based on QueryString
	protected function advancedSearchWhere($default = FALSE)
	{
		global $Security;
		$where = "";
		$this->buildSearchSql($where, $this->id, $default, FALSE); // id
		$this->buildSearchSql($where, $this->export_import, $default, FALSE); // export_import
		$this->buildSearchSql($where, $this->no_bl, $default, FALSE); // no_bl
		$this->buildSearchSql($where, $this->nomor_jo, $default, FALSE); // nomor_jo
		$this->buildSearchSql($where, $this->shipper_id, $default, FALSE); // shipper_id
		$this->buildSearchSql($where, $this->party, $default, FALSE); // party
		$this->buildSearchSql($where, $this->container, $default, FALSE); // container
		$this->buildSearchSql($where, $this->tanggal_stuffing, $default, FALSE); // tanggal_stuffing
		$this->buildSearchSql($where, $this->destination_id, $default, FALSE); // destination_id
		$this->buildSearchSql($where, $this->feeder_id, $default, FALSE); // feeder_id
		$this->buildSearchSql($where, $this->truckingvendor_id, $default, FALSE); // truckingvendor_id
		$this->buildSearchSql($where, $this->driver_id, $default, FALSE); // driver_id
		$this->buildSearchSql($where, $this->nomor_polisi_1, $default, FALSE); // nomor_polisi_1
		$this->buildSearchSql($where, $this->nomor_polisi_2, $default, FALSE); // nomor_polisi_2
		$this->buildSearchSql($where, $this->nomor_polisi_3, $default, FALSE); // nomor_polisi_3
		$this->buildSearchSql($where, $this->nomor_container_1, $default, FALSE); // nomor_container_1
		$this->buildSearchSql($where, $this->nomor_container_2, $default, FALSE); // nomor_container_2
		$this->buildSearchSql($where, $this->ref_johead_id, $default, FALSE); // ref_johead_id
		$this->buildSearchSql($where, $this->no_tagihan, $default, FALSE); // no_tagihan
		$this->buildSearchSql($where, $this->jumlah_tagihan, $default, FALSE); // jumlah_tagihan

		// Set up search parm
		if (!$default && $where <> "" && in_array($this->Command, array("", "reset", "resetall"))) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->id->AdvancedSearch->save(); // id
			$this->export_import->AdvancedSearch->save(); // export_import
			$this->no_bl->AdvancedSearch->save(); // no_bl
			$this->nomor_jo->AdvancedSearch->save(); // nomor_jo
			$this->shipper_id->AdvancedSearch->save(); // shipper_id
			$this->party->AdvancedSearch->save(); // party
			$this->container->AdvancedSearch->save(); // container
			$this->tanggal_stuffing->AdvancedSearch->save(); // tanggal_stuffing
			$this->destination_id->AdvancedSearch->save(); // destination_id
			$this->feeder_id->AdvancedSearch->save(); // feeder_id
			$this->truckingvendor_id->AdvancedSearch->save(); // truckingvendor_id
			$this->driver_id->AdvancedSearch->save(); // driver_id
			$this->nomor_polisi_1->AdvancedSearch->save(); // nomor_polisi_1
			$this->nomor_polisi_2->AdvancedSearch->save(); // nomor_polisi_2
			$this->nomor_polisi_3->AdvancedSearch->save(); // nomor_polisi_3
			$this->nomor_container_1->AdvancedSearch->save(); // nomor_container_1
			$this->nomor_container_2->AdvancedSearch->save(); // nomor_container_2
			$this->ref_johead_id->AdvancedSearch->save(); // ref_johead_id
			$this->no_tagihan->AdvancedSearch->save(); // no_tagihan
			$this->jumlah_tagihan->AdvancedSearch->save(); // jumlah_tagihan
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
		$this->buildBasicSearchSql($where, $this->no_bl, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->nomor_jo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->shipper_id, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->nomor_polisi_1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->nomor_polisi_2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->nomor_polisi_3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->nomor_container_1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->nomor_container_2, $arKeywords, $type);
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
		if ($this->export_import->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->no_bl->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->nomor_jo->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->shipper_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->party->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->container->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->tanggal_stuffing->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->destination_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->feeder_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->truckingvendor_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->driver_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->nomor_polisi_1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->nomor_polisi_2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->nomor_polisi_3->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->nomor_container_1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->nomor_container_2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ref_johead_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->no_tagihan->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->jumlah_tagihan->AdvancedSearch->issetSession())
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
		$this->export_import->AdvancedSearch->unsetSession();
		$this->no_bl->AdvancedSearch->unsetSession();
		$this->nomor_jo->AdvancedSearch->unsetSession();
		$this->shipper_id->AdvancedSearch->unsetSession();
		$this->party->AdvancedSearch->unsetSession();
		$this->container->AdvancedSearch->unsetSession();
		$this->tanggal_stuffing->AdvancedSearch->unsetSession();
		$this->destination_id->AdvancedSearch->unsetSession();
		$this->feeder_id->AdvancedSearch->unsetSession();
		$this->truckingvendor_id->AdvancedSearch->unsetSession();
		$this->driver_id->AdvancedSearch->unsetSession();
		$this->nomor_polisi_1->AdvancedSearch->unsetSession();
		$this->nomor_polisi_2->AdvancedSearch->unsetSession();
		$this->nomor_polisi_3->AdvancedSearch->unsetSession();
		$this->nomor_container_1->AdvancedSearch->unsetSession();
		$this->nomor_container_2->AdvancedSearch->unsetSession();
		$this->ref_johead_id->AdvancedSearch->unsetSession();
		$this->no_tagihan->AdvancedSearch->unsetSession();
		$this->jumlah_tagihan->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->id->AdvancedSearch->load();
		$this->export_import->AdvancedSearch->load();
		$this->no_bl->AdvancedSearch->load();
		$this->nomor_jo->AdvancedSearch->load();
		$this->shipper_id->AdvancedSearch->load();
		$this->party->AdvancedSearch->load();
		$this->container->AdvancedSearch->load();
		$this->tanggal_stuffing->AdvancedSearch->load();
		$this->destination_id->AdvancedSearch->load();
		$this->feeder_id->AdvancedSearch->load();
		$this->truckingvendor_id->AdvancedSearch->load();
		$this->driver_id->AdvancedSearch->load();
		$this->nomor_polisi_1->AdvancedSearch->load();
		$this->nomor_polisi_2->AdvancedSearch->load();
		$this->nomor_polisi_3->AdvancedSearch->load();
		$this->nomor_container_1->AdvancedSearch->load();
		$this->nomor_container_2->AdvancedSearch->load();
		$this->ref_johead_id->AdvancedSearch->load();
		$this->no_tagihan->AdvancedSearch->load();
		$this->jumlah_tagihan->AdvancedSearch->load();
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
			$this->updateSort($this->export_import, $ctrl); // export_import
			$this->updateSort($this->no_bl, $ctrl); // no_bl
			$this->updateSort($this->nomor_jo, $ctrl); // nomor_jo
			$this->updateSort($this->shipper_id, $ctrl); // shipper_id
			$this->updateSort($this->party, $ctrl); // party
			$this->updateSort($this->container, $ctrl); // container
			$this->updateSort($this->tanggal_stuffing, $ctrl); // tanggal_stuffing
			$this->updateSort($this->destination_id, $ctrl); // destination_id
			$this->updateSort($this->feeder_id, $ctrl); // feeder_id
			$this->updateSort($this->truckingvendor_id, $ctrl); // truckingvendor_id
			$this->updateSort($this->driver_id, $ctrl); // driver_id
			$this->updateSort($this->nomor_polisi_1, $ctrl); // nomor_polisi_1
			$this->updateSort($this->nomor_polisi_2, $ctrl); // nomor_polisi_2
			$this->updateSort($this->nomor_polisi_3, $ctrl); // nomor_polisi_3
			$this->updateSort($this->nomor_container_1, $ctrl); // nomor_container_1
			$this->updateSort($this->nomor_container_2, $ctrl); // nomor_container_2
			$this->updateSort($this->ref_johead_id, $ctrl); // ref_johead_id
			$this->updateSort($this->no_tagihan, $ctrl); // no_tagihan
			$this->updateSort($this->jumlah_tagihan, $ctrl); // jumlah_tagihan
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
				$this->shipper_id->setSort("ASC");
				$this->no_tagihan->setSort("ASC");
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
				$this->export_import->setSort("");
				$this->no_bl->setSort("");
				$this->nomor_jo->setSort("");
				$this->shipper_id->setSort("");
				$this->party->setSort("");
				$this->container->setSort("");
				$this->tanggal_stuffing->setSort("");
				$this->destination_id->setSort("");
				$this->feeder_id->setSort("");
				$this->truckingvendor_id->setSort("");
				$this->driver_id->setSort("");
				$this->nomor_polisi_1->setSort("");
				$this->nomor_polisi_2->setSort("");
				$this->nomor_polisi_3->setSort("");
				$this->nomor_container_1->setSort("");
				$this->nomor_container_2->setSort("");
				$this->ref_johead_id->setSort("");
				$this->no_tagihan->setSort("");
				$this->jumlah_tagihan->setSort("");
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

		// "edit"
		$item = &$this->ListOptions->add("edit");
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
				if (is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$opt->Body = "&nbsp;";
				} else {
					$opt->Body = "<a class=\"ew-grid-link ew-grid-delete\" title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" onclick=\"return ew.deleteGridRow(this, " . $this->RowIndex . ");\">" . $Language->phrase("DeleteLink") . "</a>";
				}
			}
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

		// "edit"
		$opt = &$this->ListOptions->Items["edit"];
		$editcaption = HtmlTitle($Language->phrase("EditLink"));
		if (TRUE) {
			$opt->Body .= "<a class=\"ew-row-link ew-inline-edit\" title=\"" . HtmlTitle($Language->phrase("InlineEditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InlineEditLink")) . "\" href=\"" . HtmlEncode(UrlAddHash($this->InlineEditUrl, "r" . $this->RowCnt . "_" . $this->TableVar)) . "\">" . $Language->phrase("InlineEditLink") . "</a>";
		} else {
			$opt->Body = "";
		}

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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fv101_jo_head_detaillistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fv101_jo_head_detaillistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fv101_jo_head_detaillist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
			if ($this->isGridEdit()) {
				if ($this->AllowAddDeleteRow) {

					// Add add blank row
					$option = &$options["addedit"];
					$option->UseDropDownButton = FALSE;
					$item = &$option->add("addblankrow");
					$item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"javascript:void(0);\" onclick=\"ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
					$item->Visible = FALSE;
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fv101_jo_head_detaillistsrch\">" . $Language->phrase("SearchLink") . "</button>";
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

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->export_import->CurrentValue = "Export";
		$this->export_import->OldValue = $this->export_import->CurrentValue;
		$this->no_bl->CurrentValue = "-";
		$this->no_bl->OldValue = $this->no_bl->CurrentValue;
		$this->nomor_jo->CurrentValue = "-";
		$this->nomor_jo->OldValue = $this->nomor_jo->CurrentValue;
		$this->shipper_id->CurrentValue = NULL;
		$this->shipper_id->OldValue = $this->shipper_id->CurrentValue;
		$this->party->CurrentValue = NULL;
		$this->party->OldValue = $this->party->CurrentValue;
		$this->container->CurrentValue = "40";
		$this->container->OldValue = $this->container->CurrentValue;
		$this->tanggal_stuffing->CurrentValue = NULL;
		$this->tanggal_stuffing->OldValue = $this->tanggal_stuffing->CurrentValue;
		$this->destination_id->CurrentValue = NULL;
		$this->destination_id->OldValue = $this->destination_id->CurrentValue;
		$this->feeder_id->CurrentValue = NULL;
		$this->feeder_id->OldValue = $this->feeder_id->CurrentValue;
		$this->truckingvendor_id->CurrentValue = NULL;
		$this->truckingvendor_id->OldValue = $this->truckingvendor_id->CurrentValue;
		$this->driver_id->CurrentValue = NULL;
		$this->driver_id->OldValue = $this->driver_id->CurrentValue;
		$this->nomor_polisi_1->CurrentValue = NULL;
		$this->nomor_polisi_1->OldValue = $this->nomor_polisi_1->CurrentValue;
		$this->nomor_polisi_2->CurrentValue = NULL;
		$this->nomor_polisi_2->OldValue = $this->nomor_polisi_2->CurrentValue;
		$this->nomor_polisi_3->CurrentValue = NULL;
		$this->nomor_polisi_3->OldValue = $this->nomor_polisi_3->CurrentValue;
		$this->nomor_container_1->CurrentValue = NULL;
		$this->nomor_container_1->OldValue = $this->nomor_container_1->CurrentValue;
		$this->nomor_container_2->CurrentValue = NULL;
		$this->nomor_container_2->OldValue = $this->nomor_container_2->CurrentValue;
		$this->ref_johead_id->CurrentValue = 0;
		$this->ref_johead_id->OldValue = $this->ref_johead_id->CurrentValue;
		$this->no_tagihan->CurrentValue = 0;
		$this->no_tagihan->OldValue = $this->no_tagihan->CurrentValue;
		$this->jumlah_tagihan->CurrentValue = 0.00;
		$this->jumlah_tagihan->OldValue = $this->jumlah_tagihan->CurrentValue;
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

		// export_import
		if (!$this->isAddOrEdit())
			$this->export_import->AdvancedSearch->setSearchValue(Get("x_export_import", Get("export_import", "")));
		if ($this->export_import->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->export_import->AdvancedSearch->setSearchOperator(Get("z_export_import", ""));

		// no_bl
		if (!$this->isAddOrEdit())
			$this->no_bl->AdvancedSearch->setSearchValue(Get("x_no_bl", Get("no_bl", "")));
		if ($this->no_bl->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->no_bl->AdvancedSearch->setSearchOperator(Get("z_no_bl", ""));

		// nomor_jo
		if (!$this->isAddOrEdit())
			$this->nomor_jo->AdvancedSearch->setSearchValue(Get("x_nomor_jo", Get("nomor_jo", "")));
		if ($this->nomor_jo->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->nomor_jo->AdvancedSearch->setSearchOperator(Get("z_nomor_jo", ""));

		// shipper_id
		if (!$this->isAddOrEdit())
			$this->shipper_id->AdvancedSearch->setSearchValue(Get("x_shipper_id", Get("shipper_id", "")));
		if ($this->shipper_id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->shipper_id->AdvancedSearch->setSearchOperator(Get("z_shipper_id", ""));

		// party
		if (!$this->isAddOrEdit())
			$this->party->AdvancedSearch->setSearchValue(Get("x_party", Get("party", "")));
		if ($this->party->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->party->AdvancedSearch->setSearchOperator(Get("z_party", ""));

		// container
		if (!$this->isAddOrEdit())
			$this->container->AdvancedSearch->setSearchValue(Get("x_container", Get("container", "")));
		if ($this->container->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->container->AdvancedSearch->setSearchOperator(Get("z_container", ""));

		// tanggal_stuffing
		if (!$this->isAddOrEdit())
			$this->tanggal_stuffing->AdvancedSearch->setSearchValue(Get("x_tanggal_stuffing", Get("tanggal_stuffing", "")));
		if ($this->tanggal_stuffing->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->tanggal_stuffing->AdvancedSearch->setSearchOperator(Get("z_tanggal_stuffing", ""));

		// destination_id
		if (!$this->isAddOrEdit())
			$this->destination_id->AdvancedSearch->setSearchValue(Get("x_destination_id", Get("destination_id", "")));
		if ($this->destination_id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->destination_id->AdvancedSearch->setSearchOperator(Get("z_destination_id", ""));

		// feeder_id
		if (!$this->isAddOrEdit())
			$this->feeder_id->AdvancedSearch->setSearchValue(Get("x_feeder_id", Get("feeder_id", "")));
		if ($this->feeder_id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->feeder_id->AdvancedSearch->setSearchOperator(Get("z_feeder_id", ""));

		// truckingvendor_id
		if (!$this->isAddOrEdit())
			$this->truckingvendor_id->AdvancedSearch->setSearchValue(Get("x_truckingvendor_id", Get("truckingvendor_id", "")));
		if ($this->truckingvendor_id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->truckingvendor_id->AdvancedSearch->setSearchOperator(Get("z_truckingvendor_id", ""));

		// driver_id
		if (!$this->isAddOrEdit())
			$this->driver_id->AdvancedSearch->setSearchValue(Get("x_driver_id", Get("driver_id", "")));
		if ($this->driver_id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->driver_id->AdvancedSearch->setSearchOperator(Get("z_driver_id", ""));

		// nomor_polisi_1
		if (!$this->isAddOrEdit())
			$this->nomor_polisi_1->AdvancedSearch->setSearchValue(Get("x_nomor_polisi_1", Get("nomor_polisi_1", "")));
		if ($this->nomor_polisi_1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->nomor_polisi_1->AdvancedSearch->setSearchOperator(Get("z_nomor_polisi_1", ""));

		// nomor_polisi_2
		if (!$this->isAddOrEdit())
			$this->nomor_polisi_2->AdvancedSearch->setSearchValue(Get("x_nomor_polisi_2", Get("nomor_polisi_2", "")));
		if ($this->nomor_polisi_2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->nomor_polisi_2->AdvancedSearch->setSearchOperator(Get("z_nomor_polisi_2", ""));

		// nomor_polisi_3
		if (!$this->isAddOrEdit())
			$this->nomor_polisi_3->AdvancedSearch->setSearchValue(Get("x_nomor_polisi_3", Get("nomor_polisi_3", "")));
		if ($this->nomor_polisi_3->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->nomor_polisi_3->AdvancedSearch->setSearchOperator(Get("z_nomor_polisi_3", ""));

		// nomor_container_1
		if (!$this->isAddOrEdit())
			$this->nomor_container_1->AdvancedSearch->setSearchValue(Get("x_nomor_container_1", Get("nomor_container_1", "")));
		if ($this->nomor_container_1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->nomor_container_1->AdvancedSearch->setSearchOperator(Get("z_nomor_container_1", ""));

		// nomor_container_2
		if (!$this->isAddOrEdit())
			$this->nomor_container_2->AdvancedSearch->setSearchValue(Get("x_nomor_container_2", Get("nomor_container_2", "")));
		if ($this->nomor_container_2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->nomor_container_2->AdvancedSearch->setSearchOperator(Get("z_nomor_container_2", ""));

		// ref_johead_id
		if (!$this->isAddOrEdit())
			$this->ref_johead_id->AdvancedSearch->setSearchValue(Get("x_ref_johead_id", Get("ref_johead_id", "")));
		if ($this->ref_johead_id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ref_johead_id->AdvancedSearch->setSearchOperator(Get("z_ref_johead_id", ""));

		// no_tagihan
		if (!$this->isAddOrEdit())
			$this->no_tagihan->AdvancedSearch->setSearchValue(Get("x_no_tagihan", Get("no_tagihan", "")));
		if ($this->no_tagihan->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->no_tagihan->AdvancedSearch->setSearchOperator(Get("z_no_tagihan", ""));

		// jumlah_tagihan
		if (!$this->isAddOrEdit())
			$this->jumlah_tagihan->AdvancedSearch->setSearchValue(Get("x_jumlah_tagihan", Get("jumlah_tagihan", "")));
		if ($this->jumlah_tagihan->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->jumlah_tagihan->AdvancedSearch->setSearchOperator(Get("z_jumlah_tagihan", ""));
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'export_import' first before field var 'x_export_import'
		$val = $CurrentForm->hasValue("export_import") ? $CurrentForm->getValue("export_import") : $CurrentForm->getValue("x_export_import");
		if (!$this->export_import->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->export_import->Visible = FALSE; // Disable update for API request
			else
				$this->export_import->setFormValue($val);
		}

		// Check field name 'no_bl' first before field var 'x_no_bl'
		$val = $CurrentForm->hasValue("no_bl") ? $CurrentForm->getValue("no_bl") : $CurrentForm->getValue("x_no_bl");
		if (!$this->no_bl->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->no_bl->Visible = FALSE; // Disable update for API request
			else
				$this->no_bl->setFormValue($val);
		}

		// Check field name 'nomor_jo' first before field var 'x_nomor_jo'
		$val = $CurrentForm->hasValue("nomor_jo") ? $CurrentForm->getValue("nomor_jo") : $CurrentForm->getValue("x_nomor_jo");
		if (!$this->nomor_jo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->nomor_jo->Visible = FALSE; // Disable update for API request
			else
				$this->nomor_jo->setFormValue($val);
		}

		// Check field name 'shipper_id' first before field var 'x_shipper_id'
		$val = $CurrentForm->hasValue("shipper_id") ? $CurrentForm->getValue("shipper_id") : $CurrentForm->getValue("x_shipper_id");
		if (!$this->shipper_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->shipper_id->Visible = FALSE; // Disable update for API request
			else
				$this->shipper_id->setFormValue($val);
		}

		// Check field name 'party' first before field var 'x_party'
		$val = $CurrentForm->hasValue("party") ? $CurrentForm->getValue("party") : $CurrentForm->getValue("x_party");
		if (!$this->party->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->party->Visible = FALSE; // Disable update for API request
			else
				$this->party->setFormValue($val);
		}

		// Check field name 'container' first before field var 'x_container'
		$val = $CurrentForm->hasValue("container") ? $CurrentForm->getValue("container") : $CurrentForm->getValue("x_container");
		if (!$this->container->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->container->Visible = FALSE; // Disable update for API request
			else
				$this->container->setFormValue($val);
		}

		// Check field name 'tanggal_stuffing' first before field var 'x_tanggal_stuffing'
		$val = $CurrentForm->hasValue("tanggal_stuffing") ? $CurrentForm->getValue("tanggal_stuffing") : $CurrentForm->getValue("x_tanggal_stuffing");
		if (!$this->tanggal_stuffing->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->tanggal_stuffing->Visible = FALSE; // Disable update for API request
			else
				$this->tanggal_stuffing->setFormValue($val);
			$this->tanggal_stuffing->CurrentValue = UnFormatDateTime($this->tanggal_stuffing->CurrentValue, 7);
		}

		// Check field name 'destination_id' first before field var 'x_destination_id'
		$val = $CurrentForm->hasValue("destination_id") ? $CurrentForm->getValue("destination_id") : $CurrentForm->getValue("x_destination_id");
		if (!$this->destination_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->destination_id->Visible = FALSE; // Disable update for API request
			else
				$this->destination_id->setFormValue($val);
		}

		// Check field name 'feeder_id' first before field var 'x_feeder_id'
		$val = $CurrentForm->hasValue("feeder_id") ? $CurrentForm->getValue("feeder_id") : $CurrentForm->getValue("x_feeder_id");
		if (!$this->feeder_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->feeder_id->Visible = FALSE; // Disable update for API request
			else
				$this->feeder_id->setFormValue($val);
		}

		// Check field name 'truckingvendor_id' first before field var 'x_truckingvendor_id'
		$val = $CurrentForm->hasValue("truckingvendor_id") ? $CurrentForm->getValue("truckingvendor_id") : $CurrentForm->getValue("x_truckingvendor_id");
		if (!$this->truckingvendor_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->truckingvendor_id->Visible = FALSE; // Disable update for API request
			else
				$this->truckingvendor_id->setFormValue($val);
		}

		// Check field name 'driver_id' first before field var 'x_driver_id'
		$val = $CurrentForm->hasValue("driver_id") ? $CurrentForm->getValue("driver_id") : $CurrentForm->getValue("x_driver_id");
		if (!$this->driver_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->driver_id->Visible = FALSE; // Disable update for API request
			else
				$this->driver_id->setFormValue($val);
		}

		// Check field name 'nomor_polisi_1' first before field var 'x_nomor_polisi_1'
		$val = $CurrentForm->hasValue("nomor_polisi_1") ? $CurrentForm->getValue("nomor_polisi_1") : $CurrentForm->getValue("x_nomor_polisi_1");
		if (!$this->nomor_polisi_1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->nomor_polisi_1->Visible = FALSE; // Disable update for API request
			else
				$this->nomor_polisi_1->setFormValue($val);
		}

		// Check field name 'nomor_polisi_2' first before field var 'x_nomor_polisi_2'
		$val = $CurrentForm->hasValue("nomor_polisi_2") ? $CurrentForm->getValue("nomor_polisi_2") : $CurrentForm->getValue("x_nomor_polisi_2");
		if (!$this->nomor_polisi_2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->nomor_polisi_2->Visible = FALSE; // Disable update for API request
			else
				$this->nomor_polisi_2->setFormValue($val);
		}

		// Check field name 'nomor_polisi_3' first before field var 'x_nomor_polisi_3'
		$val = $CurrentForm->hasValue("nomor_polisi_3") ? $CurrentForm->getValue("nomor_polisi_3") : $CurrentForm->getValue("x_nomor_polisi_3");
		if (!$this->nomor_polisi_3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->nomor_polisi_3->Visible = FALSE; // Disable update for API request
			else
				$this->nomor_polisi_3->setFormValue($val);
		}

		// Check field name 'nomor_container_1' first before field var 'x_nomor_container_1'
		$val = $CurrentForm->hasValue("nomor_container_1") ? $CurrentForm->getValue("nomor_container_1") : $CurrentForm->getValue("x_nomor_container_1");
		if (!$this->nomor_container_1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->nomor_container_1->Visible = FALSE; // Disable update for API request
			else
				$this->nomor_container_1->setFormValue($val);
		}

		// Check field name 'nomor_container_2' first before field var 'x_nomor_container_2'
		$val = $CurrentForm->hasValue("nomor_container_2") ? $CurrentForm->getValue("nomor_container_2") : $CurrentForm->getValue("x_nomor_container_2");
		if (!$this->nomor_container_2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->nomor_container_2->Visible = FALSE; // Disable update for API request
			else
				$this->nomor_container_2->setFormValue($val);
		}

		// Check field name 'ref_johead_id' first before field var 'x_ref_johead_id'
		$val = $CurrentForm->hasValue("ref_johead_id") ? $CurrentForm->getValue("ref_johead_id") : $CurrentForm->getValue("x_ref_johead_id");
		if (!$this->ref_johead_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ref_johead_id->Visible = FALSE; // Disable update for API request
			else
				$this->ref_johead_id->setFormValue($val);
		}

		// Check field name 'no_tagihan' first before field var 'x_no_tagihan'
		$val = $CurrentForm->hasValue("no_tagihan") ? $CurrentForm->getValue("no_tagihan") : $CurrentForm->getValue("x_no_tagihan");
		if (!$this->no_tagihan->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->no_tagihan->Visible = FALSE; // Disable update for API request
			else
				$this->no_tagihan->setFormValue($val);
		}

		// Check field name 'jumlah_tagihan' first before field var 'x_jumlah_tagihan'
		$val = $CurrentForm->hasValue("jumlah_tagihan") ? $CurrentForm->getValue("jumlah_tagihan") : $CurrentForm->getValue("x_jumlah_tagihan");
		if (!$this->jumlah_tagihan->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->jumlah_tagihan->Visible = FALSE; // Disable update for API request
			else
				$this->jumlah_tagihan->setFormValue($val);
		}

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
		$this->export_import->CurrentValue = $this->export_import->FormValue;
		$this->no_bl->CurrentValue = $this->no_bl->FormValue;
		$this->nomor_jo->CurrentValue = $this->nomor_jo->FormValue;
		$this->shipper_id->CurrentValue = $this->shipper_id->FormValue;
		$this->party->CurrentValue = $this->party->FormValue;
		$this->container->CurrentValue = $this->container->FormValue;
		$this->tanggal_stuffing->CurrentValue = $this->tanggal_stuffing->FormValue;
		$this->tanggal_stuffing->CurrentValue = UnFormatDateTime($this->tanggal_stuffing->CurrentValue, 7);
		$this->destination_id->CurrentValue = $this->destination_id->FormValue;
		$this->feeder_id->CurrentValue = $this->feeder_id->FormValue;
		$this->truckingvendor_id->CurrentValue = $this->truckingvendor_id->FormValue;
		$this->driver_id->CurrentValue = $this->driver_id->FormValue;
		$this->nomor_polisi_1->CurrentValue = $this->nomor_polisi_1->FormValue;
		$this->nomor_polisi_2->CurrentValue = $this->nomor_polisi_2->FormValue;
		$this->nomor_polisi_3->CurrentValue = $this->nomor_polisi_3->FormValue;
		$this->nomor_container_1->CurrentValue = $this->nomor_container_1->FormValue;
		$this->nomor_container_2->CurrentValue = $this->nomor_container_2->FormValue;
		$this->ref_johead_id->CurrentValue = $this->ref_johead_id->FormValue;
		$this->no_tagihan->CurrentValue = $this->no_tagihan->FormValue;
		$this->jumlah_tagihan->CurrentValue = $this->jumlah_tagihan->FormValue;
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
		$this->export_import->setDbValue($row['export_import']);
		$this->no_bl->setDbValue($row['no_bl']);
		$this->nomor_jo->setDbValue($row['nomor_jo']);
		$this->shipper_id->setDbValue($row['shipper_id']);
		$this->party->setDbValue($row['party']);
		$this->container->setDbValue($row['container']);
		$this->tanggal_stuffing->setDbValue($row['tanggal_stuffing']);
		$this->destination_id->setDbValue($row['destination_id']);
		$this->feeder_id->setDbValue($row['feeder_id']);
		$this->truckingvendor_id->setDbValue($row['truckingvendor_id']);
		$this->driver_id->setDbValue($row['driver_id']);
		$this->nomor_polisi_1->setDbValue($row['nomor_polisi_1']);
		$this->nomor_polisi_2->setDbValue($row['nomor_polisi_2']);
		$this->nomor_polisi_3->setDbValue($row['nomor_polisi_3']);
		$this->nomor_container_1->setDbValue($row['nomor_container_1']);
		$this->nomor_container_2->setDbValue($row['nomor_container_2']);
		$this->ref_johead_id->setDbValue($row['ref_johead_id']);
		$this->no_tagihan->setDbValue($row['no_tagihan']);
		$this->jumlah_tagihan->setDbValue($row['jumlah_tagihan']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['export_import'] = $this->export_import->CurrentValue;
		$row['no_bl'] = $this->no_bl->CurrentValue;
		$row['nomor_jo'] = $this->nomor_jo->CurrentValue;
		$row['shipper_id'] = $this->shipper_id->CurrentValue;
		$row['party'] = $this->party->CurrentValue;
		$row['container'] = $this->container->CurrentValue;
		$row['tanggal_stuffing'] = $this->tanggal_stuffing->CurrentValue;
		$row['destination_id'] = $this->destination_id->CurrentValue;
		$row['feeder_id'] = $this->feeder_id->CurrentValue;
		$row['truckingvendor_id'] = $this->truckingvendor_id->CurrentValue;
		$row['driver_id'] = $this->driver_id->CurrentValue;
		$row['nomor_polisi_1'] = $this->nomor_polisi_1->CurrentValue;
		$row['nomor_polisi_2'] = $this->nomor_polisi_2->CurrentValue;
		$row['nomor_polisi_3'] = $this->nomor_polisi_3->CurrentValue;
		$row['nomor_container_1'] = $this->nomor_container_1->CurrentValue;
		$row['nomor_container_2'] = $this->nomor_container_2->CurrentValue;
		$row['ref_johead_id'] = $this->ref_johead_id->CurrentValue;
		$row['no_tagihan'] = $this->no_tagihan->CurrentValue;
		$row['jumlah_tagihan'] = $this->jumlah_tagihan->CurrentValue;
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
		if ($this->jumlah_tagihan->FormValue == $this->jumlah_tagihan->CurrentValue && is_numeric(ConvertToFloatString($this->jumlah_tagihan->CurrentValue)))
			$this->jumlah_tagihan->CurrentValue = ConvertToFloatString($this->jumlah_tagihan->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// export_import
		// no_bl
		// nomor_jo
		// shipper_id
		// party
		// container
		// tanggal_stuffing
		// destination_id
		// feeder_id
		// truckingvendor_id
		// driver_id
		// nomor_polisi_1
		// nomor_polisi_2
		// nomor_polisi_3
		// nomor_container_1
		// nomor_container_2
		// ref_johead_id
		// no_tagihan
		// jumlah_tagihan

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// export_import
			if (strval($this->export_import->CurrentValue) <> "") {
				$this->export_import->ViewValue = $this->export_import->optionCaption($this->export_import->CurrentValue);
			} else {
				$this->export_import->ViewValue = NULL;
			}
			$this->export_import->ViewCustomAttributes = "";

			// no_bl
			$this->no_bl->ViewValue = $this->no_bl->CurrentValue;
			$this->no_bl->ViewCustomAttributes = "";

			// nomor_jo
			$this->nomor_jo->ViewValue = $this->nomor_jo->CurrentValue;
			$this->nomor_jo->ViewCustomAttributes = "";

			// shipper_id
			$curVal = strval($this->shipper_id->CurrentValue);
			if ($curVal <> "") {
				$this->shipper_id->ViewValue = $this->shipper_id->lookupCacheOption($curVal);
				if ($this->shipper_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->shipper_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->shipper_id->ViewValue = $this->shipper_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->shipper_id->ViewValue = $this->shipper_id->CurrentValue;
					}
				}
			} else {
				$this->shipper_id->ViewValue = NULL;
			}
			$this->shipper_id->ViewCustomAttributes = "";

			// party
			$this->party->ViewValue = $this->party->CurrentValue;
			$this->party->ViewValue = FormatNumber($this->party->ViewValue, 0, -2, -2, -2);
			$this->party->ViewCustomAttributes = "";

			// container
			if (strval($this->container->CurrentValue) <> "") {
				$this->container->ViewValue = $this->container->optionCaption($this->container->CurrentValue);
			} else {
				$this->container->ViewValue = NULL;
			}
			$this->container->ViewCustomAttributes = "";

			// tanggal_stuffing
			$this->tanggal_stuffing->ViewValue = $this->tanggal_stuffing->CurrentValue;
			$this->tanggal_stuffing->ViewValue = FormatDateTime($this->tanggal_stuffing->ViewValue, 7);
			$this->tanggal_stuffing->ViewCustomAttributes = "";

			// destination_id
			$this->destination_id->ViewValue = $this->destination_id->CurrentValue;
			$curVal = strval($this->destination_id->CurrentValue);
			if ($curVal <> "") {
				$this->destination_id->ViewValue = $this->destination_id->lookupCacheOption($curVal);
				if ($this->destination_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->destination_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->destination_id->ViewValue = $this->destination_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->destination_id->ViewValue = $this->destination_id->CurrentValue;
					}
				}
			} else {
				$this->destination_id->ViewValue = NULL;
			}
			$this->destination_id->ViewCustomAttributes = "";

			// feeder_id
			$this->feeder_id->ViewValue = $this->feeder_id->CurrentValue;
			$curVal = strval($this->feeder_id->CurrentValue);
			if ($curVal <> "") {
				$this->feeder_id->ViewValue = $this->feeder_id->lookupCacheOption($curVal);
				if ($this->feeder_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->feeder_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->feeder_id->ViewValue = $this->feeder_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->feeder_id->ViewValue = $this->feeder_id->CurrentValue;
					}
				}
			} else {
				$this->feeder_id->ViewValue = NULL;
			}
			$this->feeder_id->ViewCustomAttributes = "";

			// truckingvendor_id
			$curVal = strval($this->truckingvendor_id->CurrentValue);
			if ($curVal <> "") {
				$this->truckingvendor_id->ViewValue = $this->truckingvendor_id->lookupCacheOption($curVal);
				if ($this->truckingvendor_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->truckingvendor_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->truckingvendor_id->ViewValue = $this->truckingvendor_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->truckingvendor_id->ViewValue = $this->truckingvendor_id->CurrentValue;
					}
				}
			} else {
				$this->truckingvendor_id->ViewValue = NULL;
			}
			$this->truckingvendor_id->ViewCustomAttributes = "";

			// driver_id
			$curVal = strval($this->driver_id->CurrentValue);
			if ($curVal <> "") {
				$this->driver_id->ViewValue = $this->driver_id->lookupCacheOption($curVal);
				if ($this->driver_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->driver_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->driver_id->ViewValue = $this->driver_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->driver_id->ViewValue = $this->driver_id->CurrentValue;
					}
				}
			} else {
				$this->driver_id->ViewValue = NULL;
			}
			$this->driver_id->ViewCustomAttributes = "";

			// nomor_polisi_1
			$this->nomor_polisi_1->ViewValue = $this->nomor_polisi_1->CurrentValue;
			$this->nomor_polisi_1->ViewCustomAttributes = "";

			// nomor_polisi_2
			$this->nomor_polisi_2->ViewValue = $this->nomor_polisi_2->CurrentValue;
			$this->nomor_polisi_2->ViewCustomAttributes = "";

			// nomor_polisi_3
			$this->nomor_polisi_3->ViewValue = $this->nomor_polisi_3->CurrentValue;
			$this->nomor_polisi_3->ViewCustomAttributes = "";

			// nomor_container_1
			$this->nomor_container_1->ViewValue = $this->nomor_container_1->CurrentValue;
			$this->nomor_container_1->ViewCustomAttributes = "";

			// nomor_container_2
			$this->nomor_container_2->ViewValue = $this->nomor_container_2->CurrentValue;
			$this->nomor_container_2->ViewCustomAttributes = "";

			// ref_johead_id
			$curVal = strval($this->ref_johead_id->CurrentValue);
			if ($curVal <> "") {
				$this->ref_johead_id->ViewValue = $this->ref_johead_id->lookupCacheOption($curVal);
				if ($this->ref_johead_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->ref_johead_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->ref_johead_id->ViewValue = $this->ref_johead_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ref_johead_id->ViewValue = $this->ref_johead_id->CurrentValue;
					}
				}
			} else {
				$this->ref_johead_id->ViewValue = NULL;
			}
			$this->ref_johead_id->ViewCustomAttributes = "";

			// no_tagihan
			$this->no_tagihan->ViewValue = $this->no_tagihan->CurrentValue;
			$this->no_tagihan->ViewValue = FormatNumber($this->no_tagihan->ViewValue, 0, -2, -2, -2);
			$this->no_tagihan->ViewCustomAttributes = "";

			// jumlah_tagihan
			$this->jumlah_tagihan->ViewValue = $this->jumlah_tagihan->CurrentValue;
			$this->jumlah_tagihan->ViewValue = FormatNumber($this->jumlah_tagihan->ViewValue, 2, -2, -2, -2);
			$this->jumlah_tagihan->ViewCustomAttributes = "";

			// export_import
			$this->export_import->LinkCustomAttributes = "";
			$this->export_import->HrefValue = "";
			$this->export_import->TooltipValue = "";

			// no_bl
			$this->no_bl->LinkCustomAttributes = "";
			$this->no_bl->HrefValue = "";
			$this->no_bl->TooltipValue = "";

			// nomor_jo
			$this->nomor_jo->LinkCustomAttributes = "";
			$this->nomor_jo->HrefValue = "";
			$this->nomor_jo->TooltipValue = "";

			// shipper_id
			$this->shipper_id->LinkCustomAttributes = "";
			$this->shipper_id->HrefValue = "";
			$this->shipper_id->TooltipValue = "";

			// party
			$this->party->LinkCustomAttributes = "";
			$this->party->HrefValue = "";
			$this->party->TooltipValue = "";

			// container
			$this->container->LinkCustomAttributes = "";
			$this->container->HrefValue = "";
			$this->container->TooltipValue = "";

			// tanggal_stuffing
			$this->tanggal_stuffing->LinkCustomAttributes = "";
			$this->tanggal_stuffing->HrefValue = "";
			$this->tanggal_stuffing->TooltipValue = "";

			// destination_id
			$this->destination_id->LinkCustomAttributes = "";
			$this->destination_id->HrefValue = "";
			$this->destination_id->TooltipValue = "";

			// feeder_id
			$this->feeder_id->LinkCustomAttributes = "";
			$this->feeder_id->HrefValue = "";
			$this->feeder_id->TooltipValue = "";

			// truckingvendor_id
			$this->truckingvendor_id->LinkCustomAttributes = "";
			$this->truckingvendor_id->HrefValue = "";
			$this->truckingvendor_id->TooltipValue = "";

			// driver_id
			$this->driver_id->LinkCustomAttributes = "";
			$this->driver_id->HrefValue = "";
			$this->driver_id->TooltipValue = "";

			// nomor_polisi_1
			$this->nomor_polisi_1->LinkCustomAttributes = "";
			$this->nomor_polisi_1->HrefValue = "";
			$this->nomor_polisi_1->TooltipValue = "";

			// nomor_polisi_2
			$this->nomor_polisi_2->LinkCustomAttributes = "";
			$this->nomor_polisi_2->HrefValue = "";
			$this->nomor_polisi_2->TooltipValue = "";

			// nomor_polisi_3
			$this->nomor_polisi_3->LinkCustomAttributes = "";
			$this->nomor_polisi_3->HrefValue = "";
			$this->nomor_polisi_3->TooltipValue = "";

			// nomor_container_1
			$this->nomor_container_1->LinkCustomAttributes = "";
			$this->nomor_container_1->HrefValue = "";
			$this->nomor_container_1->TooltipValue = "";

			// nomor_container_2
			$this->nomor_container_2->LinkCustomAttributes = "";
			$this->nomor_container_2->HrefValue = "";
			$this->nomor_container_2->TooltipValue = "";

			// ref_johead_id
			$this->ref_johead_id->LinkCustomAttributes = "";
			$this->ref_johead_id->HrefValue = "";
			$this->ref_johead_id->TooltipValue = "";

			// no_tagihan
			$this->no_tagihan->LinkCustomAttributes = "";
			$this->no_tagihan->HrefValue = "";
			$this->no_tagihan->TooltipValue = "";

			// jumlah_tagihan
			$this->jumlah_tagihan->LinkCustomAttributes = "";
			$this->jumlah_tagihan->HrefValue = "";
			$this->jumlah_tagihan->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// export_import
			$this->export_import->EditCustomAttributes = "";
			$this->export_import->EditValue = $this->export_import->options(FALSE);

			// no_bl
			$this->no_bl->EditAttrs["class"] = "form-control";
			$this->no_bl->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->no_bl->CurrentValue = HtmlDecode($this->no_bl->CurrentValue);
			$this->no_bl->EditValue = HtmlEncode($this->no_bl->CurrentValue);
			$this->no_bl->PlaceHolder = RemoveHtml($this->no_bl->caption());

			// nomor_jo
			$this->nomor_jo->EditAttrs["class"] = "form-control";
			$this->nomor_jo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->nomor_jo->CurrentValue = HtmlDecode($this->nomor_jo->CurrentValue);
			$this->nomor_jo->EditValue = HtmlEncode($this->nomor_jo->CurrentValue);
			$this->nomor_jo->PlaceHolder = RemoveHtml($this->nomor_jo->caption());

			// shipper_id
			$this->shipper_id->EditAttrs["class"] = "form-control";
			$this->shipper_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->shipper_id->CurrentValue));
			if ($curVal <> "")
				$this->shipper_id->ViewValue = $this->shipper_id->lookupCacheOption($curVal);
			else
				$this->shipper_id->ViewValue = $this->shipper_id->Lookup !== NULL && is_array($this->shipper_id->Lookup->Options) ? $curVal : NULL;
			if ($this->shipper_id->ViewValue !== NULL) { // Load from cache
				$this->shipper_id->EditValue = array_values($this->shipper_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->shipper_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->shipper_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->shipper_id->EditValue = $arwrk;
			}

			// party
			$this->party->EditAttrs["class"] = "form-control";
			$this->party->EditCustomAttributes = "";
			$this->party->EditValue = HtmlEncode($this->party->CurrentValue);
			$this->party->PlaceHolder = RemoveHtml($this->party->caption());

			// container
			$this->container->EditCustomAttributes = "";
			$this->container->EditValue = $this->container->options(FALSE);

			// tanggal_stuffing
			$this->tanggal_stuffing->EditAttrs["class"] = "form-control";
			$this->tanggal_stuffing->EditCustomAttributes = "";
			$this->tanggal_stuffing->EditValue = HtmlEncode(FormatDateTime($this->tanggal_stuffing->CurrentValue, 7));
			$this->tanggal_stuffing->PlaceHolder = RemoveHtml($this->tanggal_stuffing->caption());

			// destination_id
			$this->destination_id->EditAttrs["class"] = "form-control";
			$this->destination_id->EditCustomAttributes = "";
			$this->destination_id->EditValue = HtmlEncode($this->destination_id->CurrentValue);
			$curVal = strval($this->destination_id->CurrentValue);
			if ($curVal <> "") {
				$this->destination_id->EditValue = $this->destination_id->lookupCacheOption($curVal);
				if ($this->destination_id->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->destination_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->destination_id->EditValue = $this->destination_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->destination_id->EditValue = HtmlEncode($this->destination_id->CurrentValue);
					}
				}
			} else {
				$this->destination_id->EditValue = NULL;
			}
			$this->destination_id->PlaceHolder = RemoveHtml($this->destination_id->caption());

			// feeder_id
			$this->feeder_id->EditAttrs["class"] = "form-control";
			$this->feeder_id->EditCustomAttributes = "";
			$this->feeder_id->EditValue = HtmlEncode($this->feeder_id->CurrentValue);
			$curVal = strval($this->feeder_id->CurrentValue);
			if ($curVal <> "") {
				$this->feeder_id->EditValue = $this->feeder_id->lookupCacheOption($curVal);
				if ($this->feeder_id->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->feeder_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->feeder_id->EditValue = $this->feeder_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->feeder_id->EditValue = HtmlEncode($this->feeder_id->CurrentValue);
					}
				}
			} else {
				$this->feeder_id->EditValue = NULL;
			}
			$this->feeder_id->PlaceHolder = RemoveHtml($this->feeder_id->caption());

			// truckingvendor_id
			$this->truckingvendor_id->EditAttrs["class"] = "form-control";
			$this->truckingvendor_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->truckingvendor_id->CurrentValue));
			if ($curVal <> "")
				$this->truckingvendor_id->ViewValue = $this->truckingvendor_id->lookupCacheOption($curVal);
			else
				$this->truckingvendor_id->ViewValue = $this->truckingvendor_id->Lookup !== NULL && is_array($this->truckingvendor_id->Lookup->Options) ? $curVal : NULL;
			if ($this->truckingvendor_id->ViewValue !== NULL) { // Load from cache
				$this->truckingvendor_id->EditValue = array_values($this->truckingvendor_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->truckingvendor_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->truckingvendor_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->truckingvendor_id->EditValue = $arwrk;
			}

			// driver_id
			$this->driver_id->EditAttrs["class"] = "form-control";
			$this->driver_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->driver_id->CurrentValue));
			if ($curVal <> "")
				$this->driver_id->ViewValue = $this->driver_id->lookupCacheOption($curVal);
			else
				$this->driver_id->ViewValue = $this->driver_id->Lookup !== NULL && is_array($this->driver_id->Lookup->Options) ? $curVal : NULL;
			if ($this->driver_id->ViewValue !== NULL) { // Load from cache
				$this->driver_id->EditValue = array_values($this->driver_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->driver_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->driver_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->driver_id->EditValue = $arwrk;
			}

			// nomor_polisi_1
			$this->nomor_polisi_1->EditAttrs["class"] = "form-control";
			$this->nomor_polisi_1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->nomor_polisi_1->CurrentValue = HtmlDecode($this->nomor_polisi_1->CurrentValue);
			$this->nomor_polisi_1->EditValue = HtmlEncode($this->nomor_polisi_1->CurrentValue);
			$this->nomor_polisi_1->PlaceHolder = RemoveHtml($this->nomor_polisi_1->caption());

			// nomor_polisi_2
			$this->nomor_polisi_2->EditAttrs["class"] = "form-control";
			$this->nomor_polisi_2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->nomor_polisi_2->CurrentValue = HtmlDecode($this->nomor_polisi_2->CurrentValue);
			$this->nomor_polisi_2->EditValue = HtmlEncode($this->nomor_polisi_2->CurrentValue);
			$this->nomor_polisi_2->PlaceHolder = RemoveHtml($this->nomor_polisi_2->caption());

			// nomor_polisi_3
			$this->nomor_polisi_3->EditAttrs["class"] = "form-control";
			$this->nomor_polisi_3->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->nomor_polisi_3->CurrentValue = HtmlDecode($this->nomor_polisi_3->CurrentValue);
			$this->nomor_polisi_3->EditValue = HtmlEncode($this->nomor_polisi_3->CurrentValue);
			$this->nomor_polisi_3->PlaceHolder = RemoveHtml($this->nomor_polisi_3->caption());

			// nomor_container_1
			$this->nomor_container_1->EditAttrs["class"] = "form-control";
			$this->nomor_container_1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->nomor_container_1->CurrentValue = HtmlDecode($this->nomor_container_1->CurrentValue);
			$this->nomor_container_1->EditValue = HtmlEncode($this->nomor_container_1->CurrentValue);
			$this->nomor_container_1->PlaceHolder = RemoveHtml($this->nomor_container_1->caption());

			// nomor_container_2
			$this->nomor_container_2->EditAttrs["class"] = "form-control";
			$this->nomor_container_2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->nomor_container_2->CurrentValue = HtmlDecode($this->nomor_container_2->CurrentValue);
			$this->nomor_container_2->EditValue = HtmlEncode($this->nomor_container_2->CurrentValue);
			$this->nomor_container_2->PlaceHolder = RemoveHtml($this->nomor_container_2->caption());

			// ref_johead_id
			$this->ref_johead_id->EditAttrs["class"] = "form-control";
			$this->ref_johead_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->ref_johead_id->CurrentValue));
			if ($curVal <> "")
				$this->ref_johead_id->ViewValue = $this->ref_johead_id->lookupCacheOption($curVal);
			else
				$this->ref_johead_id->ViewValue = $this->ref_johead_id->Lookup !== NULL && is_array($this->ref_johead_id->Lookup->Options) ? $curVal : NULL;
			if ($this->ref_johead_id->ViewValue !== NULL) { // Load from cache
				$this->ref_johead_id->EditValue = array_values($this->ref_johead_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->ref_johead_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->ref_johead_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->ref_johead_id->EditValue = $arwrk;
			}

			// no_tagihan
			$this->no_tagihan->EditAttrs["class"] = "form-control";
			$this->no_tagihan->EditCustomAttributes = "";
			$this->no_tagihan->EditValue = HtmlEncode($this->no_tagihan->CurrentValue);
			$this->no_tagihan->PlaceHolder = RemoveHtml($this->no_tagihan->caption());

			// jumlah_tagihan
			$this->jumlah_tagihan->EditAttrs["class"] = "form-control";
			$this->jumlah_tagihan->EditCustomAttributes = "";
			$this->jumlah_tagihan->EditValue = HtmlEncode($this->jumlah_tagihan->CurrentValue);
			$this->jumlah_tagihan->PlaceHolder = RemoveHtml($this->jumlah_tagihan->caption());
			if (strval($this->jumlah_tagihan->EditValue) <> "" && is_numeric($this->jumlah_tagihan->EditValue))
				$this->jumlah_tagihan->EditValue = FormatNumber($this->jumlah_tagihan->EditValue, -2, -2, -2, -2);

			// Add refer script
			// export_import

			$this->export_import->LinkCustomAttributes = "";
			$this->export_import->HrefValue = "";

			// no_bl
			$this->no_bl->LinkCustomAttributes = "";
			$this->no_bl->HrefValue = "";

			// nomor_jo
			$this->nomor_jo->LinkCustomAttributes = "";
			$this->nomor_jo->HrefValue = "";

			// shipper_id
			$this->shipper_id->LinkCustomAttributes = "";
			$this->shipper_id->HrefValue = "";

			// party
			$this->party->LinkCustomAttributes = "";
			$this->party->HrefValue = "";

			// container
			$this->container->LinkCustomAttributes = "";
			$this->container->HrefValue = "";

			// tanggal_stuffing
			$this->tanggal_stuffing->LinkCustomAttributes = "";
			$this->tanggal_stuffing->HrefValue = "";

			// destination_id
			$this->destination_id->LinkCustomAttributes = "";
			$this->destination_id->HrefValue = "";

			// feeder_id
			$this->feeder_id->LinkCustomAttributes = "";
			$this->feeder_id->HrefValue = "";

			// truckingvendor_id
			$this->truckingvendor_id->LinkCustomAttributes = "";
			$this->truckingvendor_id->HrefValue = "";

			// driver_id
			$this->driver_id->LinkCustomAttributes = "";
			$this->driver_id->HrefValue = "";

			// nomor_polisi_1
			$this->nomor_polisi_1->LinkCustomAttributes = "";
			$this->nomor_polisi_1->HrefValue = "";

			// nomor_polisi_2
			$this->nomor_polisi_2->LinkCustomAttributes = "";
			$this->nomor_polisi_2->HrefValue = "";

			// nomor_polisi_3
			$this->nomor_polisi_3->LinkCustomAttributes = "";
			$this->nomor_polisi_3->HrefValue = "";

			// nomor_container_1
			$this->nomor_container_1->LinkCustomAttributes = "";
			$this->nomor_container_1->HrefValue = "";

			// nomor_container_2
			$this->nomor_container_2->LinkCustomAttributes = "";
			$this->nomor_container_2->HrefValue = "";

			// ref_johead_id
			$this->ref_johead_id->LinkCustomAttributes = "";
			$this->ref_johead_id->HrefValue = "";

			// no_tagihan
			$this->no_tagihan->LinkCustomAttributes = "";
			$this->no_tagihan->HrefValue = "";

			// jumlah_tagihan
			$this->jumlah_tagihan->LinkCustomAttributes = "";
			$this->jumlah_tagihan->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// export_import
			$this->export_import->EditAttrs["class"] = "form-control";
			$this->export_import->EditCustomAttributes = "";
			if (strval($this->export_import->CurrentValue) <> "") {
				$this->export_import->EditValue = $this->export_import->optionCaption($this->export_import->CurrentValue);
			} else {
				$this->export_import->EditValue = NULL;
			}
			$this->export_import->ViewCustomAttributes = "";

			// no_bl
			$this->no_bl->EditAttrs["class"] = "form-control";
			$this->no_bl->EditCustomAttributes = "";
			$this->no_bl->EditValue = $this->no_bl->CurrentValue;
			$this->no_bl->ViewCustomAttributes = "";

			// nomor_jo
			$this->nomor_jo->EditAttrs["class"] = "form-control";
			$this->nomor_jo->EditCustomAttributes = "";
			$this->nomor_jo->EditValue = $this->nomor_jo->CurrentValue;
			$this->nomor_jo->ViewCustomAttributes = "";

			// shipper_id
			$this->shipper_id->EditAttrs["class"] = "form-control";
			$this->shipper_id->EditCustomAttributes = "";
			$curVal = strval($this->shipper_id->CurrentValue);
			if ($curVal <> "") {
				$this->shipper_id->EditValue = $this->shipper_id->lookupCacheOption($curVal);
				if ($this->shipper_id->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->shipper_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->shipper_id->EditValue = $this->shipper_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->shipper_id->EditValue = $this->shipper_id->CurrentValue;
					}
				}
			} else {
				$this->shipper_id->EditValue = NULL;
			}
			$this->shipper_id->ViewCustomAttributes = "";

			// party
			$this->party->EditAttrs["class"] = "form-control";
			$this->party->EditCustomAttributes = "";
			$this->party->EditValue = $this->party->CurrentValue;
			$this->party->EditValue = FormatNumber($this->party->EditValue, 0, -2, -2, -2);
			$this->party->ViewCustomAttributes = "";

			// container
			$this->container->EditAttrs["class"] = "form-control";
			$this->container->EditCustomAttributes = "";
			if (strval($this->container->CurrentValue) <> "") {
				$this->container->EditValue = $this->container->optionCaption($this->container->CurrentValue);
			} else {
				$this->container->EditValue = NULL;
			}
			$this->container->ViewCustomAttributes = "";

			// tanggal_stuffing
			$this->tanggal_stuffing->EditAttrs["class"] = "form-control";
			$this->tanggal_stuffing->EditCustomAttributes = "";
			$this->tanggal_stuffing->EditValue = $this->tanggal_stuffing->CurrentValue;
			$this->tanggal_stuffing->EditValue = FormatDateTime($this->tanggal_stuffing->EditValue, 7);
			$this->tanggal_stuffing->ViewCustomAttributes = "";

			// destination_id
			$this->destination_id->EditAttrs["class"] = "form-control";
			$this->destination_id->EditCustomAttributes = "";
			$this->destination_id->EditValue = $this->destination_id->CurrentValue;
			$curVal = strval($this->destination_id->CurrentValue);
			if ($curVal <> "") {
				$this->destination_id->EditValue = $this->destination_id->lookupCacheOption($curVal);
				if ($this->destination_id->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->destination_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->destination_id->EditValue = $this->destination_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->destination_id->EditValue = $this->destination_id->CurrentValue;
					}
				}
			} else {
				$this->destination_id->EditValue = NULL;
			}
			$this->destination_id->ViewCustomAttributes = "";

			// feeder_id
			$this->feeder_id->EditAttrs["class"] = "form-control";
			$this->feeder_id->EditCustomAttributes = "";
			$this->feeder_id->EditValue = $this->feeder_id->CurrentValue;
			$curVal = strval($this->feeder_id->CurrentValue);
			if ($curVal <> "") {
				$this->feeder_id->EditValue = $this->feeder_id->lookupCacheOption($curVal);
				if ($this->feeder_id->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->feeder_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->feeder_id->EditValue = $this->feeder_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->feeder_id->EditValue = $this->feeder_id->CurrentValue;
					}
				}
			} else {
				$this->feeder_id->EditValue = NULL;
			}
			$this->feeder_id->ViewCustomAttributes = "";

			// truckingvendor_id
			$this->truckingvendor_id->EditAttrs["class"] = "form-control";
			$this->truckingvendor_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->truckingvendor_id->CurrentValue));
			if ($curVal <> "")
				$this->truckingvendor_id->ViewValue = $this->truckingvendor_id->lookupCacheOption($curVal);
			else
				$this->truckingvendor_id->ViewValue = $this->truckingvendor_id->Lookup !== NULL && is_array($this->truckingvendor_id->Lookup->Options) ? $curVal : NULL;
			if ($this->truckingvendor_id->ViewValue !== NULL) { // Load from cache
				$this->truckingvendor_id->EditValue = array_values($this->truckingvendor_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->truckingvendor_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->truckingvendor_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->truckingvendor_id->EditValue = $arwrk;
			}

			// driver_id
			$this->driver_id->EditAttrs["class"] = "form-control";
			$this->driver_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->driver_id->CurrentValue));
			if ($curVal <> "")
				$this->driver_id->ViewValue = $this->driver_id->lookupCacheOption($curVal);
			else
				$this->driver_id->ViewValue = $this->driver_id->Lookup !== NULL && is_array($this->driver_id->Lookup->Options) ? $curVal : NULL;
			if ($this->driver_id->ViewValue !== NULL) { // Load from cache
				$this->driver_id->EditValue = array_values($this->driver_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->driver_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->driver_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->driver_id->EditValue = $arwrk;
			}

			// nomor_polisi_1
			$this->nomor_polisi_1->EditAttrs["class"] = "form-control";
			$this->nomor_polisi_1->EditCustomAttributes = "";
			$this->nomor_polisi_1->EditValue = $this->nomor_polisi_1->CurrentValue;
			$this->nomor_polisi_1->ViewCustomAttributes = "";

			// nomor_polisi_2
			$this->nomor_polisi_2->EditAttrs["class"] = "form-control";
			$this->nomor_polisi_2->EditCustomAttributes = "";
			$this->nomor_polisi_2->EditValue = $this->nomor_polisi_2->CurrentValue;
			$this->nomor_polisi_2->ViewCustomAttributes = "";

			// nomor_polisi_3
			$this->nomor_polisi_3->EditAttrs["class"] = "form-control";
			$this->nomor_polisi_3->EditCustomAttributes = "";
			$this->nomor_polisi_3->EditValue = $this->nomor_polisi_3->CurrentValue;
			$this->nomor_polisi_3->ViewCustomAttributes = "";

			// nomor_container_1
			$this->nomor_container_1->EditAttrs["class"] = "form-control";
			$this->nomor_container_1->EditCustomAttributes = "";
			$this->nomor_container_1->EditValue = $this->nomor_container_1->CurrentValue;
			$this->nomor_container_1->ViewCustomAttributes = "";

			// nomor_container_2
			$this->nomor_container_2->EditAttrs["class"] = "form-control";
			$this->nomor_container_2->EditCustomAttributes = "";
			$this->nomor_container_2->EditValue = $this->nomor_container_2->CurrentValue;
			$this->nomor_container_2->ViewCustomAttributes = "";

			// ref_johead_id
			$this->ref_johead_id->EditAttrs["class"] = "form-control";
			$this->ref_johead_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->ref_johead_id->CurrentValue));
			if ($curVal <> "")
				$this->ref_johead_id->ViewValue = $this->ref_johead_id->lookupCacheOption($curVal);
			else
				$this->ref_johead_id->ViewValue = $this->ref_johead_id->Lookup !== NULL && is_array($this->ref_johead_id->Lookup->Options) ? $curVal : NULL;
			if ($this->ref_johead_id->ViewValue !== NULL) { // Load from cache
				$this->ref_johead_id->EditValue = array_values($this->ref_johead_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->ref_johead_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->ref_johead_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->ref_johead_id->EditValue = $arwrk;
			}

			// no_tagihan
			$this->no_tagihan->EditAttrs["class"] = "form-control";
			$this->no_tagihan->EditCustomAttributes = "";
			$this->no_tagihan->EditValue = HtmlEncode($this->no_tagihan->CurrentValue);
			$this->no_tagihan->PlaceHolder = RemoveHtml($this->no_tagihan->caption());

			// jumlah_tagihan
			$this->jumlah_tagihan->EditAttrs["class"] = "form-control";
			$this->jumlah_tagihan->EditCustomAttributes = "";
			$this->jumlah_tagihan->EditValue = HtmlEncode($this->jumlah_tagihan->CurrentValue);
			$this->jumlah_tagihan->PlaceHolder = RemoveHtml($this->jumlah_tagihan->caption());
			if (strval($this->jumlah_tagihan->EditValue) <> "" && is_numeric($this->jumlah_tagihan->EditValue))
				$this->jumlah_tagihan->EditValue = FormatNumber($this->jumlah_tagihan->EditValue, -2, -2, -2, -2);

			// Edit refer script
			// export_import

			$this->export_import->LinkCustomAttributes = "";
			$this->export_import->HrefValue = "";
			$this->export_import->TooltipValue = "";

			// no_bl
			$this->no_bl->LinkCustomAttributes = "";
			$this->no_bl->HrefValue = "";
			$this->no_bl->TooltipValue = "";

			// nomor_jo
			$this->nomor_jo->LinkCustomAttributes = "";
			$this->nomor_jo->HrefValue = "";
			$this->nomor_jo->TooltipValue = "";

			// shipper_id
			$this->shipper_id->LinkCustomAttributes = "";
			$this->shipper_id->HrefValue = "";
			$this->shipper_id->TooltipValue = "";

			// party
			$this->party->LinkCustomAttributes = "";
			$this->party->HrefValue = "";
			$this->party->TooltipValue = "";

			// container
			$this->container->LinkCustomAttributes = "";
			$this->container->HrefValue = "";
			$this->container->TooltipValue = "";

			// tanggal_stuffing
			$this->tanggal_stuffing->LinkCustomAttributes = "";
			$this->tanggal_stuffing->HrefValue = "";
			$this->tanggal_stuffing->TooltipValue = "";

			// destination_id
			$this->destination_id->LinkCustomAttributes = "";
			$this->destination_id->HrefValue = "";
			$this->destination_id->TooltipValue = "";

			// feeder_id
			$this->feeder_id->LinkCustomAttributes = "";
			$this->feeder_id->HrefValue = "";
			$this->feeder_id->TooltipValue = "";

			// truckingvendor_id
			$this->truckingvendor_id->LinkCustomAttributes = "";
			$this->truckingvendor_id->HrefValue = "";

			// driver_id
			$this->driver_id->LinkCustomAttributes = "";
			$this->driver_id->HrefValue = "";

			// nomor_polisi_1
			$this->nomor_polisi_1->LinkCustomAttributes = "";
			$this->nomor_polisi_1->HrefValue = "";
			$this->nomor_polisi_1->TooltipValue = "";

			// nomor_polisi_2
			$this->nomor_polisi_2->LinkCustomAttributes = "";
			$this->nomor_polisi_2->HrefValue = "";
			$this->nomor_polisi_2->TooltipValue = "";

			// nomor_polisi_3
			$this->nomor_polisi_3->LinkCustomAttributes = "";
			$this->nomor_polisi_3->HrefValue = "";
			$this->nomor_polisi_3->TooltipValue = "";

			// nomor_container_1
			$this->nomor_container_1->LinkCustomAttributes = "";
			$this->nomor_container_1->HrefValue = "";
			$this->nomor_container_1->TooltipValue = "";

			// nomor_container_2
			$this->nomor_container_2->LinkCustomAttributes = "";
			$this->nomor_container_2->HrefValue = "";
			$this->nomor_container_2->TooltipValue = "";

			// ref_johead_id
			$this->ref_johead_id->LinkCustomAttributes = "";
			$this->ref_johead_id->HrefValue = "";

			// no_tagihan
			$this->no_tagihan->LinkCustomAttributes = "";
			$this->no_tagihan->HrefValue = "";

			// jumlah_tagihan
			$this->jumlah_tagihan->LinkCustomAttributes = "";
			$this->jumlah_tagihan->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// export_import
			$this->export_import->EditCustomAttributes = "";
			$this->export_import->EditValue = $this->export_import->options(FALSE);

			// no_bl
			$this->no_bl->EditAttrs["class"] = "form-control";
			$this->no_bl->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->no_bl->AdvancedSearch->SearchValue = HtmlDecode($this->no_bl->AdvancedSearch->SearchValue);
			$this->no_bl->EditValue = HtmlEncode($this->no_bl->AdvancedSearch->SearchValue);
			$this->no_bl->PlaceHolder = RemoveHtml($this->no_bl->caption());

			// nomor_jo
			$this->nomor_jo->EditAttrs["class"] = "form-control";
			$this->nomor_jo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->nomor_jo->AdvancedSearch->SearchValue = HtmlDecode($this->nomor_jo->AdvancedSearch->SearchValue);
			$this->nomor_jo->EditValue = HtmlEncode($this->nomor_jo->AdvancedSearch->SearchValue);
			$this->nomor_jo->PlaceHolder = RemoveHtml($this->nomor_jo->caption());

			// shipper_id
			$this->shipper_id->EditAttrs["class"] = "form-control";
			$this->shipper_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->shipper_id->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->shipper_id->AdvancedSearch->ViewValue = $this->shipper_id->lookupCacheOption($curVal);
			else
				$this->shipper_id->AdvancedSearch->ViewValue = $this->shipper_id->Lookup !== NULL && is_array($this->shipper_id->Lookup->Options) ? $curVal : NULL;
			if ($this->shipper_id->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->shipper_id->EditValue = array_values($this->shipper_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->shipper_id->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->shipper_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->shipper_id->EditValue = $arwrk;
			}

			// party
			$this->party->EditAttrs["class"] = "form-control";
			$this->party->EditCustomAttributes = "";
			$this->party->EditValue = HtmlEncode($this->party->AdvancedSearch->SearchValue);
			$this->party->PlaceHolder = RemoveHtml($this->party->caption());

			// container
			$this->container->EditCustomAttributes = "";
			$this->container->EditValue = $this->container->options(FALSE);

			// tanggal_stuffing
			$this->tanggal_stuffing->EditAttrs["class"] = "form-control";
			$this->tanggal_stuffing->EditCustomAttributes = "";
			$this->tanggal_stuffing->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->tanggal_stuffing->AdvancedSearch->SearchValue, 7), 7));
			$this->tanggal_stuffing->PlaceHolder = RemoveHtml($this->tanggal_stuffing->caption());

			// destination_id
			$this->destination_id->EditAttrs["class"] = "form-control";
			$this->destination_id->EditCustomAttributes = "";
			$this->destination_id->EditValue = HtmlEncode($this->destination_id->AdvancedSearch->SearchValue);
			$this->destination_id->PlaceHolder = RemoveHtml($this->destination_id->caption());

			// feeder_id
			$this->feeder_id->EditAttrs["class"] = "form-control";
			$this->feeder_id->EditCustomAttributes = "";
			$this->feeder_id->EditValue = HtmlEncode($this->feeder_id->AdvancedSearch->SearchValue);
			$this->feeder_id->PlaceHolder = RemoveHtml($this->feeder_id->caption());

			// truckingvendor_id
			$this->truckingvendor_id->EditAttrs["class"] = "form-control";
			$this->truckingvendor_id->EditCustomAttributes = "";

			// driver_id
			$this->driver_id->EditAttrs["class"] = "form-control";
			$this->driver_id->EditCustomAttributes = "";

			// nomor_polisi_1
			$this->nomor_polisi_1->EditAttrs["class"] = "form-control";
			$this->nomor_polisi_1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->nomor_polisi_1->AdvancedSearch->SearchValue = HtmlDecode($this->nomor_polisi_1->AdvancedSearch->SearchValue);
			$this->nomor_polisi_1->EditValue = HtmlEncode($this->nomor_polisi_1->AdvancedSearch->SearchValue);
			$this->nomor_polisi_1->PlaceHolder = RemoveHtml($this->nomor_polisi_1->caption());

			// nomor_polisi_2
			$this->nomor_polisi_2->EditAttrs["class"] = "form-control";
			$this->nomor_polisi_2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->nomor_polisi_2->AdvancedSearch->SearchValue = HtmlDecode($this->nomor_polisi_2->AdvancedSearch->SearchValue);
			$this->nomor_polisi_2->EditValue = HtmlEncode($this->nomor_polisi_2->AdvancedSearch->SearchValue);
			$this->nomor_polisi_2->PlaceHolder = RemoveHtml($this->nomor_polisi_2->caption());

			// nomor_polisi_3
			$this->nomor_polisi_3->EditAttrs["class"] = "form-control";
			$this->nomor_polisi_3->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->nomor_polisi_3->AdvancedSearch->SearchValue = HtmlDecode($this->nomor_polisi_3->AdvancedSearch->SearchValue);
			$this->nomor_polisi_3->EditValue = HtmlEncode($this->nomor_polisi_3->AdvancedSearch->SearchValue);
			$this->nomor_polisi_3->PlaceHolder = RemoveHtml($this->nomor_polisi_3->caption());

			// nomor_container_1
			$this->nomor_container_1->EditAttrs["class"] = "form-control";
			$this->nomor_container_1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->nomor_container_1->AdvancedSearch->SearchValue = HtmlDecode($this->nomor_container_1->AdvancedSearch->SearchValue);
			$this->nomor_container_1->EditValue = HtmlEncode($this->nomor_container_1->AdvancedSearch->SearchValue);
			$this->nomor_container_1->PlaceHolder = RemoveHtml($this->nomor_container_1->caption());

			// nomor_container_2
			$this->nomor_container_2->EditAttrs["class"] = "form-control";
			$this->nomor_container_2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->nomor_container_2->AdvancedSearch->SearchValue = HtmlDecode($this->nomor_container_2->AdvancedSearch->SearchValue);
			$this->nomor_container_2->EditValue = HtmlEncode($this->nomor_container_2->AdvancedSearch->SearchValue);
			$this->nomor_container_2->PlaceHolder = RemoveHtml($this->nomor_container_2->caption());

			// ref_johead_id
			$this->ref_johead_id->EditAttrs["class"] = "form-control";
			$this->ref_johead_id->EditCustomAttributes = "";

			// no_tagihan
			$this->no_tagihan->EditAttrs["class"] = "form-control";
			$this->no_tagihan->EditCustomAttributes = "";
			$this->no_tagihan->EditValue = HtmlEncode($this->no_tagihan->AdvancedSearch->SearchValue);
			$this->no_tagihan->PlaceHolder = RemoveHtml($this->no_tagihan->caption());

			// jumlah_tagihan
			$this->jumlah_tagihan->EditAttrs["class"] = "form-control";
			$this->jumlah_tagihan->EditCustomAttributes = "";
			$this->jumlah_tagihan->EditValue = HtmlEncode($this->jumlah_tagihan->AdvancedSearch->SearchValue);
			$this->jumlah_tagihan->PlaceHolder = RemoveHtml($this->jumlah_tagihan->caption());
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
		if ($this->export_import->Required) {
			if ($this->export_import->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->export_import->caption(), $this->export_import->RequiredErrorMessage));
			}
		}
		if ($this->no_bl->Required) {
			if (!$this->no_bl->IsDetailKey && $this->no_bl->FormValue != NULL && $this->no_bl->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->no_bl->caption(), $this->no_bl->RequiredErrorMessage));
			}
		}
		if ($this->nomor_jo->Required) {
			if (!$this->nomor_jo->IsDetailKey && $this->nomor_jo->FormValue != NULL && $this->nomor_jo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nomor_jo->caption(), $this->nomor_jo->RequiredErrorMessage));
			}
		}
		if ($this->shipper_id->Required) {
			if (!$this->shipper_id->IsDetailKey && $this->shipper_id->FormValue != NULL && $this->shipper_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->shipper_id->caption(), $this->shipper_id->RequiredErrorMessage));
			}
		}
		if ($this->party->Required) {
			if (!$this->party->IsDetailKey && $this->party->FormValue != NULL && $this->party->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->party->caption(), $this->party->RequiredErrorMessage));
			}
		}
		if ($this->container->Required) {
			if ($this->container->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->container->caption(), $this->container->RequiredErrorMessage));
			}
		}
		if ($this->tanggal_stuffing->Required) {
			if (!$this->tanggal_stuffing->IsDetailKey && $this->tanggal_stuffing->FormValue != NULL && $this->tanggal_stuffing->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tanggal_stuffing->caption(), $this->tanggal_stuffing->RequiredErrorMessage));
			}
		}
		if ($this->destination_id->Required) {
			if (!$this->destination_id->IsDetailKey && $this->destination_id->FormValue != NULL && $this->destination_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->destination_id->caption(), $this->destination_id->RequiredErrorMessage));
			}
		}
		if ($this->feeder_id->Required) {
			if (!$this->feeder_id->IsDetailKey && $this->feeder_id->FormValue != NULL && $this->feeder_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->feeder_id->caption(), $this->feeder_id->RequiredErrorMessage));
			}
		}
		if ($this->truckingvendor_id->Required) {
			if (!$this->truckingvendor_id->IsDetailKey && $this->truckingvendor_id->FormValue != NULL && $this->truckingvendor_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->truckingvendor_id->caption(), $this->truckingvendor_id->RequiredErrorMessage));
			}
		}
		if ($this->driver_id->Required) {
			if (!$this->driver_id->IsDetailKey && $this->driver_id->FormValue != NULL && $this->driver_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->driver_id->caption(), $this->driver_id->RequiredErrorMessage));
			}
		}
		if ($this->nomor_polisi_1->Required) {
			if (!$this->nomor_polisi_1->IsDetailKey && $this->nomor_polisi_1->FormValue != NULL && $this->nomor_polisi_1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nomor_polisi_1->caption(), $this->nomor_polisi_1->RequiredErrorMessage));
			}
		}
		if ($this->nomor_polisi_2->Required) {
			if (!$this->nomor_polisi_2->IsDetailKey && $this->nomor_polisi_2->FormValue != NULL && $this->nomor_polisi_2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nomor_polisi_2->caption(), $this->nomor_polisi_2->RequiredErrorMessage));
			}
		}
		if ($this->nomor_polisi_3->Required) {
			if (!$this->nomor_polisi_3->IsDetailKey && $this->nomor_polisi_3->FormValue != NULL && $this->nomor_polisi_3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nomor_polisi_3->caption(), $this->nomor_polisi_3->RequiredErrorMessage));
			}
		}
		if ($this->nomor_container_1->Required) {
			if (!$this->nomor_container_1->IsDetailKey && $this->nomor_container_1->FormValue != NULL && $this->nomor_container_1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nomor_container_1->caption(), $this->nomor_container_1->RequiredErrorMessage));
			}
		}
		if ($this->nomor_container_2->Required) {
			if (!$this->nomor_container_2->IsDetailKey && $this->nomor_container_2->FormValue != NULL && $this->nomor_container_2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nomor_container_2->caption(), $this->nomor_container_2->RequiredErrorMessage));
			}
		}
		if ($this->ref_johead_id->Required) {
			if (!$this->ref_johead_id->IsDetailKey && $this->ref_johead_id->FormValue != NULL && $this->ref_johead_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ref_johead_id->caption(), $this->ref_johead_id->RequiredErrorMessage));
			}
		}
		if ($this->no_tagihan->Required) {
			if (!$this->no_tagihan->IsDetailKey && $this->no_tagihan->FormValue != NULL && $this->no_tagihan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->no_tagihan->caption(), $this->no_tagihan->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->no_tagihan->FormValue)) {
			AddMessage($FormError, $this->no_tagihan->errorMessage());
		}
		if ($this->jumlah_tagihan->Required) {
			if (!$this->jumlah_tagihan->IsDetailKey && $this->jumlah_tagihan->FormValue != NULL && $this->jumlah_tagihan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->jumlah_tagihan->caption(), $this->jumlah_tagihan->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->jumlah_tagihan->FormValue)) {
			AddMessage($FormError, $this->jumlah_tagihan->errorMessage());
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

			// truckingvendor_id
			$this->truckingvendor_id->setDbValueDef($rsnew, $this->truckingvendor_id->CurrentValue, 0, $this->truckingvendor_id->ReadOnly);

			// driver_id
			$this->driver_id->setDbValueDef($rsnew, $this->driver_id->CurrentValue, 0, $this->driver_id->ReadOnly);

			// ref_johead_id
			$this->ref_johead_id->setDbValueDef($rsnew, $this->ref_johead_id->CurrentValue, NULL, $this->ref_johead_id->ReadOnly);

			// no_tagihan
			$this->no_tagihan->setDbValueDef($rsnew, $this->no_tagihan->CurrentValue, 0, $this->no_tagihan->ReadOnly);

			// jumlah_tagihan
			$this->jumlah_tagihan->setDbValueDef($rsnew, $this->jumlah_tagihan->CurrentValue, 0, $this->jumlah_tagihan->ReadOnly);

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
		$hash .= GetFieldHash($rs->fields('truckingvendor_id')); // truckingvendor_id
		$hash .= GetFieldHash($rs->fields('driver_id')); // driver_id
		$hash .= GetFieldHash($rs->fields('ref_johead_id')); // ref_johead_id
		$hash .= GetFieldHash($rs->fields('no_tagihan')); // no_tagihan
		$hash .= GetFieldHash($rs->fields('jumlah_tagihan')); // jumlah_tagihan
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

		// export_import
		$this->export_import->setDbValueDef($rsnew, $this->export_import->CurrentValue, NULL, strval($this->export_import->CurrentValue) == "");

		// no_bl
		$this->no_bl->setDbValueDef($rsnew, $this->no_bl->CurrentValue, NULL, strval($this->no_bl->CurrentValue) == "");

		// nomor_jo
		$this->nomor_jo->setDbValueDef($rsnew, $this->nomor_jo->CurrentValue, NULL, strval($this->nomor_jo->CurrentValue) == "");

		// shipper_id
		$this->shipper_id->setDbValueDef($rsnew, $this->shipper_id->CurrentValue, NULL, FALSE);

		// party
		$this->party->setDbValueDef($rsnew, $this->party->CurrentValue, NULL, FALSE);

		// container
		$this->container->setDbValueDef($rsnew, $this->container->CurrentValue, NULL, strval($this->container->CurrentValue) == "");

		// tanggal_stuffing
		$this->tanggal_stuffing->setDbValueDef($rsnew, UnFormatDateTime($this->tanggal_stuffing->CurrentValue, 7), NULL, FALSE);

		// destination_id
		$this->destination_id->setDbValueDef($rsnew, $this->destination_id->CurrentValue, NULL, FALSE);

		// feeder_id
		$this->feeder_id->setDbValueDef($rsnew, $this->feeder_id->CurrentValue, NULL, FALSE);

		// truckingvendor_id
		$this->truckingvendor_id->setDbValueDef($rsnew, $this->truckingvendor_id->CurrentValue, 0, FALSE);

		// driver_id
		$this->driver_id->setDbValueDef($rsnew, $this->driver_id->CurrentValue, 0, FALSE);

		// nomor_polisi_1
		$this->nomor_polisi_1->setDbValueDef($rsnew, $this->nomor_polisi_1->CurrentValue, "", FALSE);

		// nomor_polisi_2
		$this->nomor_polisi_2->setDbValueDef($rsnew, $this->nomor_polisi_2->CurrentValue, "", FALSE);

		// nomor_polisi_3
		$this->nomor_polisi_3->setDbValueDef($rsnew, $this->nomor_polisi_3->CurrentValue, "", FALSE);

		// nomor_container_1
		$this->nomor_container_1->setDbValueDef($rsnew, $this->nomor_container_1->CurrentValue, "", FALSE);

		// nomor_container_2
		$this->nomor_container_2->setDbValueDef($rsnew, $this->nomor_container_2->CurrentValue, "", FALSE);

		// ref_johead_id
		$this->ref_johead_id->setDbValueDef($rsnew, $this->ref_johead_id->CurrentValue, NULL, strval($this->ref_johead_id->CurrentValue) == "");

		// no_tagihan
		$this->no_tagihan->setDbValueDef($rsnew, $this->no_tagihan->CurrentValue, 0, strval($this->no_tagihan->CurrentValue) == "");

		// jumlah_tagihan
		$this->jumlah_tagihan->setDbValueDef($rsnew, $this->jumlah_tagihan->CurrentValue, 0, strval($this->jumlah_tagihan->CurrentValue) == "");

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
		$this->export_import->AdvancedSearch->load();
		$this->no_bl->AdvancedSearch->load();
		$this->nomor_jo->AdvancedSearch->load();
		$this->shipper_id->AdvancedSearch->load();
		$this->party->AdvancedSearch->load();
		$this->container->AdvancedSearch->load();
		$this->tanggal_stuffing->AdvancedSearch->load();
		$this->destination_id->AdvancedSearch->load();
		$this->feeder_id->AdvancedSearch->load();
		$this->truckingvendor_id->AdvancedSearch->load();
		$this->driver_id->AdvancedSearch->load();
		$this->nomor_polisi_1->AdvancedSearch->load();
		$this->nomor_polisi_2->AdvancedSearch->load();
		$this->nomor_polisi_3->AdvancedSearch->load();
		$this->nomor_container_1->AdvancedSearch->load();
		$this->nomor_container_2->AdvancedSearch->load();
		$this->ref_johead_id->AdvancedSearch->load();
		$this->no_tagihan->AdvancedSearch->load();
		$this->jumlah_tagihan->AdvancedSearch->load();
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
						case "x_shipper_id":
							break;
						case "x_destination_id":
							break;
						case "x_feeder_id":
							break;
						case "x_truckingvendor_id":
							break;
						case "x_driver_id":
							break;
						case "x_ref_johead_id":
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