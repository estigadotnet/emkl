<?php
namespace PHPMaker2019\emkl_prj;

/**
 * Page class
 */
class t101_tagihan_trucking_search extends t101_tagihan_trucking
{

	// Page ID
	public $PageID = "search";

	// Project ID
	public $ProjectID = "{D4B21A3D-A1C8-4ED3-BA65-212E10E691E7}";

	// Table name
	public $TableName = 't101_tagihan_trucking';

	// Page object name
	public $PageObjName = "t101_tagihan_trucking_search";

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
			define(PROJECT_NAMESPACE . "PAGE_ID", 'search');

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
	public $FormClassName = "ew-horizontal ew-form ew-search-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$SearchError, $SkipHeaderFooter;

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
		$this->setupLookupOptions($this->JO_id);
		$this->setupLookupOptions($this->Shipper_id);

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		if ($this->isPageRequest()) { // Validate request

			// Get action
			$this->CurrentAction = Post("action");
			if ($this->isSearch()) {

				// Build search string for advanced search, remove blank field
				$this->loadSearchValues(); // Get search values
				if ($this->validateSearch()) {
					$srchStr = $this->buildAdvancedSearch();
				} else {
					$srchStr = "";
					$this->setFailureMessage($SearchError);
				}
				if ($srchStr <> "") {
					$srchStr = $this->getUrlParm($srchStr);
					$srchStr = "t101_tagihan_truckinglist.php" . "?" . $srchStr;
					$this->terminate($srchStr); // Go to list page
				}
			}
		}

		// Restore search settings from Session
		if ($SearchError == "")
			$this->loadAdvancedSearch();

		// Render row for search
		$this->RowType = ROWTYPE_SEARCH;
		$this->resetAttributes();
		$this->renderRow();
	}

	// Build advanced search
	protected function buildAdvancedSearch()
	{
		$srchUrl = "";
		$this->buildSearchUrl($srchUrl, $this->id); // id
		$this->buildSearchUrl($srchUrl, $this->JO_id); // JO_id
		$this->buildSearchUrl($srchUrl, $this->Nomor_Polisi_1); // Nomor_Polisi_1
		$this->buildSearchUrl($srchUrl, $this->Nomor_Polisi_2); // Nomor_Polisi_2
		$this->buildSearchUrl($srchUrl, $this->Nomor_Polisi_3); // Nomor_Polisi_3
		$this->buildSearchUrl($srchUrl, $this->Tanggal); // Tanggal
		$this->buildSearchUrl($srchUrl, $this->Shipper_id); // Shipper_id
		$this->buildSearchUrl($srchUrl, $this->Dari_Lokasi); // Dari_Lokasi
		$this->buildSearchUrl($srchUrl, $this->Ke_Lokasi); // Ke_Lokasi
		$this->buildSearchUrl($srchUrl, $this->Jenis_Container); // Jenis_Container
		$this->buildSearchUrl($srchUrl, $this->Nomor_Container_1); // Nomor_Container_1
		$this->buildSearchUrl($srchUrl, $this->Nomor_Container_2); // Nomor_Container_2
		$this->buildSearchUrl($srchUrl, $this->Keterangan); // Keterangan
		$this->buildSearchUrl($srchUrl, $this->Tagihan); // Tagihan
		if ($srchUrl <> "")
			$srchUrl .= "&";
		$srchUrl .= "cmd=search";
		return $srchUrl;
	}

	// Build search URL
	protected function buildSearchUrl(&$url, &$fld, $oprOnly = FALSE)
	{
		global $CurrentForm;
		$wrk = "";
		$fldParm = $fld->Param;
		$fldVal = $CurrentForm->getValue("x_$fldParm");
		$fldOpr = $CurrentForm->getValue("z_$fldParm");
		$fldCond = $CurrentForm->getValue("v_$fldParm");
		$fldVal2 = $CurrentForm->getValue("y_$fldParm");
		$fldOpr2 = $CurrentForm->getValue("w_$fldParm");
		if (is_array($fldVal))
			$fldVal = implode(",", $fldVal);
		if (is_array($fldVal2))
			$fldVal2 = implode(",", $fldVal2);
		$fldOpr = strtoupper(trim($fldOpr));
		$fldDataType = ($fld->IsVirtual) ? DATATYPE_STRING : $fld->DataType;
		if ($fldOpr == "BETWEEN") {
			$isValidValue = ($fldDataType <> DATATYPE_NUMBER) ||
				($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal) && $this->searchValueIsNumeric($fld, $fldVal2));
			if ($fldVal <> "" && $fldVal2 <> "" && $isValidValue) {
				$wrk = "x_" . $fldParm . "=" . urlencode($fldVal) .
					"&y_" . $fldParm . "=" . urlencode($fldVal2) .
					"&z_" . $fldParm . "=" . urlencode($fldOpr);
			}
		} else {
			$isValidValue = ($fldDataType <> DATATYPE_NUMBER) ||
				($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal));
			if ($fldVal <> "" && $isValidValue && IsValidOpr($fldOpr, $fldDataType)) {
				$wrk = "x_" . $fldParm . "=" . urlencode($fldVal) .
					"&z_" . $fldParm . "=" . urlencode($fldOpr);
			} elseif ($fldOpr == "IS NULL" || $fldOpr == "IS NOT NULL" || ($fldOpr <> "" && $oprOnly && IsValidOpr($fldOpr, $fldDataType))) {
				$wrk = "z_" . $fldParm . "=" . urlencode($fldOpr);
			}
			$isValidValue = ($fldDataType <> DATATYPE_NUMBER) ||
				($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal2));
			if ($fldVal2 <> "" && $isValidValue && IsValidOpr($fldOpr2, $fldDataType)) {
				if ($wrk <> "")
					$wrk .= "&v_" . $fldParm . "=" . urlencode($fldCond) . "&";
				$wrk .= "y_" . $fldParm . "=" . urlencode($fldVal2) .
					"&w_" . $fldParm . "=" . urlencode($fldOpr2);
			} elseif ($fldOpr2 == "IS NULL" || $fldOpr2 == "IS NOT NULL" || ($fldOpr2 <> "" && $oprOnly && IsValidOpr($fldOpr2, $fldDataType))) {
				if ($wrk <> "")
					$wrk .= "&v_" . $fldParm . "=" . urlencode($fldCond) . "&";
				$wrk .= "w_" . $fldParm . "=" . urlencode($fldOpr2);
			}
		}
		if ($wrk <> "") {
			if ($url <> "")
				$url .= "&";
			$url .= $wrk;
		}
	}
	protected function searchValueIsNumeric($fld, $value)
	{
		if (IsFloatFormat($fld->Type))
			$value = ConvertToFloatString($value);
		return is_numeric($value);
	}

	// Load search values for validation
	protected function loadSearchValues()
	{
		global $CurrentForm;

		// Load search values
		// id

		if (!$this->isAddOrEdit())
			$this->id->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_id"));
		$this->id->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_id"));

		// JO_id
		if (!$this->isAddOrEdit())
			$this->JO_id->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_JO_id"));
		$this->JO_id->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_JO_id"));

		// Nomor_Polisi_1
		if (!$this->isAddOrEdit())
			$this->Nomor_Polisi_1->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Nomor_Polisi_1"));
		$this->Nomor_Polisi_1->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Nomor_Polisi_1"));

		// Nomor_Polisi_2
		if (!$this->isAddOrEdit())
			$this->Nomor_Polisi_2->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Nomor_Polisi_2"));
		$this->Nomor_Polisi_2->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Nomor_Polisi_2"));

		// Nomor_Polisi_3
		if (!$this->isAddOrEdit())
			$this->Nomor_Polisi_3->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Nomor_Polisi_3"));
		$this->Nomor_Polisi_3->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Nomor_Polisi_3"));

		// Tanggal
		if (!$this->isAddOrEdit())
			$this->Tanggal->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Tanggal"));
		$this->Tanggal->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Tanggal"));

		// Shipper_id
		if (!$this->isAddOrEdit())
			$this->Shipper_id->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Shipper_id"));
		$this->Shipper_id->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Shipper_id"));

		// Dari_Lokasi
		if (!$this->isAddOrEdit())
			$this->Dari_Lokasi->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Dari_Lokasi"));
		$this->Dari_Lokasi->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Dari_Lokasi"));

		// Ke_Lokasi
		if (!$this->isAddOrEdit())
			$this->Ke_Lokasi->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Ke_Lokasi"));
		$this->Ke_Lokasi->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Ke_Lokasi"));

		// Jenis_Container
		if (!$this->isAddOrEdit())
			$this->Jenis_Container->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Jenis_Container"));
		$this->Jenis_Container->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Jenis_Container"));

		// Nomor_Container_1
		if (!$this->isAddOrEdit())
			$this->Nomor_Container_1->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Nomor_Container_1"));
		$this->Nomor_Container_1->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Nomor_Container_1"));

		// Nomor_Container_2
		if (!$this->isAddOrEdit())
			$this->Nomor_Container_2->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Nomor_Container_2"));
		$this->Nomor_Container_2->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Nomor_Container_2"));

		// Keterangan
		if (!$this->isAddOrEdit())
			$this->Keterangan->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Keterangan"));
		$this->Keterangan->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Keterangan"));

		// Tagihan
		if (!$this->isAddOrEdit())
			$this->Tagihan->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Tagihan"));
		$this->Tagihan->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Tagihan"));
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
			$curVal = strval($this->JO_id->CurrentValue);
			if ($curVal <> "") {
				$this->JO_id->ViewValue = $this->JO_id->lookupCacheOption($curVal);
				if ($this->JO_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->JO_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->JO_id->ViewValue = $this->JO_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->JO_id->ViewValue = $this->JO_id->CurrentValue;
					}
				}
			} else {
				$this->JO_id->ViewValue = NULL;
			}
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

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

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
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// JO_id
			$this->JO_id->EditAttrs["class"] = "form-control";
			$this->JO_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->JO_id->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->JO_id->AdvancedSearch->ViewValue = $this->JO_id->lookupCacheOption($curVal);
			else
				$this->JO_id->AdvancedSearch->ViewValue = $this->JO_id->Lookup !== NULL && is_array($this->JO_id->Lookup->Options) ? $curVal : NULL;
			if ($this->JO_id->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->JO_id->EditValue = array_values($this->JO_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->JO_id->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->JO_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->JO_id->EditValue = $arwrk;
			}

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
		if (!CheckInteger($this->id->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->id->errorMessage());
		}
		if (!CheckEuroDate($this->Tanggal->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->Tanggal->errorMessage());
		}
		if (!CheckNumber($this->Tagihan->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->Tagihan->errorMessage());
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("t101_tagihan_truckinglist.php"), "", $this->TableVar, TRUE);
		$pageId = "search";
		$Breadcrumb->add("search", $pageId, $url);
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
						case "x_JO_id":
							break;
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