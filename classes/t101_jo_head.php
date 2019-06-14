<?php
namespace PHPMaker2019\emkl_prj;

/**
 * Table class for t101_jo_head
 */
class t101_jo_head extends DbTable
{
	protected $SqlFrom = "";
	protected $SqlSelect = "";
	protected $SqlSelectList = "";
	protected $SqlWhere = "";
	protected $SqlGroupBy = "";
	protected $SqlHaving = "";
	protected $SqlOrderBy = "";
	public $UseSessionForListSql = TRUE;

	// Column CSS classes
	public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
	public $RightColumnClass = "col-sm-10";
	public $OffsetColumnClass = "col-sm-10 offset-sm-2";
	public $TableLeftColumnClass = "w-col-2";

	// Export
	public $ExportDoc;

	// Fields
	public $id;
	public $Nomor_JO;
	public $Shipper_id;
	public $Party;
	public $Container;
	public $Tanggal_Stuffing;
	public $Destination_id;
	public $Feeder_id;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 't101_jo_head';
		$this->TableName = 't101_jo_head';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`t101_jo_head`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id
		$this->id = new DbField('t101_jo_head', 't101_jo_head', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->IsForeignKey = TRUE; // Foreign key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// Nomor_JO
		$this->Nomor_JO = new DbField('t101_jo_head', 't101_jo_head', 'x_Nomor_JO', 'Nomor_JO', '`Nomor_JO`', '`Nomor_JO`', 200, -1, FALSE, '`Nomor_JO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Nomor_JO->Nullable = FALSE; // NOT NULL field
		$this->Nomor_JO->Sortable = TRUE; // Allow sort
		$this->fields['Nomor_JO'] = &$this->Nomor_JO;

		// Shipper_id
		$this->Shipper_id = new DbField('t101_jo_head', 't101_jo_head', 'x_Shipper_id', 'Shipper_id', '`Shipper_id`', '`Shipper_id`', 3, -1, FALSE, '`Shipper_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Shipper_id->Nullable = FALSE; // NOT NULL field
		$this->Shipper_id->Required = TRUE; // Required field
		$this->Shipper_id->Sortable = TRUE; // Allow sort
		$this->Shipper_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Shipper_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Shipper_id->Lookup = new Lookup('Shipper_id', 't001_shipper', FALSE, 'id', ["Nama","","",""], [], [], [], [], [], [], '', '');
		$this->Shipper_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Shipper_id'] = &$this->Shipper_id;

		// Party
		$this->Party = new DbField('t101_jo_head', 't101_jo_head', 'x_Party', 'Party', '`Party`', '`Party`', 3, -1, FALSE, '`Party`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Party->Nullable = FALSE; // NOT NULL field
		$this->Party->Required = TRUE; // Required field
		$this->Party->Sortable = TRUE; // Allow sort
		$this->Party->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Party'] = &$this->Party;

		// Container
		$this->Container = new DbField('t101_jo_head', 't101_jo_head', 'x_Container', 'Container', '`Container`', '`Container`', 202, -1, FALSE, '`Container`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->Container->Nullable = FALSE; // NOT NULL field
		$this->Container->Sortable = TRUE; // Allow sort
		$this->Container->Lookup = new Lookup('Container', 't101_jo_head', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Container->OptionCount = 2;
		$this->fields['Container'] = &$this->Container;

		// Tanggal_Stuffing
		$this->Tanggal_Stuffing = new DbField('t101_jo_head', 't101_jo_head', 'x_Tanggal_Stuffing', 'Tanggal_Stuffing', '`Tanggal_Stuffing`', CastDateFieldForLike('`Tanggal_Stuffing`', 11, "DB"), 135, 11, FALSE, '`Tanggal_Stuffing`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tanggal_Stuffing->Nullable = FALSE; // NOT NULL field
		$this->Tanggal_Stuffing->Required = TRUE; // Required field
		$this->Tanggal_Stuffing->Sortable = TRUE; // Allow sort
		$this->Tanggal_Stuffing->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['Tanggal_Stuffing'] = &$this->Tanggal_Stuffing;

		// Destination_id
		$this->Destination_id = new DbField('t101_jo_head', 't101_jo_head', 'x_Destination_id', 'Destination_id', '`Destination_id`', '`Destination_id`', 3, -1, FALSE, '`Destination_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Destination_id->Nullable = FALSE; // NOT NULL field
		$this->Destination_id->Required = TRUE; // Required field
		$this->Destination_id->Sortable = TRUE; // Allow sort
		$this->Destination_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Destination_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Destination_id->Lookup = new Lookup('Destination_id', 't002_destination', FALSE, 'id', ["Nama","","",""], [], [], [], [], [], [], '', '');
		$this->Destination_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Destination_id'] = &$this->Destination_id;

		// Feeder_id
		$this->Feeder_id = new DbField('t101_jo_head', 't101_jo_head', 'x_Feeder_id', 'Feeder_id', '`Feeder_id`', '`Feeder_id`', 3, -1, FALSE, '`Feeder_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Feeder_id->Nullable = FALSE; // NOT NULL field
		$this->Feeder_id->Required = TRUE; // Required field
		$this->Feeder_id->Sortable = TRUE; // Allow sort
		$this->Feeder_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Feeder_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Feeder_id->Lookup = new Lookup('Feeder_id', 't003_feeder', FALSE, 'id', ["Nama","","",""], [], [], [], [], [], [], '', '');
		$this->Feeder_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Feeder_id'] = &$this->Feeder_id;
	}

	// Field Visibility
	public function getFieldVisibility($fldParm)
	{
		global $Security;
		return $this->$fldParm->Visible; // Returns original value
	}

	// Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
	function setLeftColumnClass($class)
	{
		if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
			$this->LeftColumnClass = $class . " col-form-label ew-label";
			$this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
			$this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
			$this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
		}
	}

	// Multiple column sort
	public function updateSort(&$fld, $ctrl)
	{
		if ($this->CurrentOrder == $fld->Name) {
			$sortField = $fld->Expression;
			$lastSort = $fld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$thisSort = $this->CurrentOrderType;
			} else {
				$thisSort = ($lastSort == "ASC") ? "DESC" : "ASC";
			}
			$fld->setSort($thisSort);
			if ($ctrl) {
				$orderBy = $this->getSessionOrderBy();
				if (ContainsString($orderBy, $sortField . " " . $lastSort)) {
					$orderBy = str_replace($sortField . " " . $lastSort, $sortField . " " . $thisSort, $orderBy);
				} else {
					if ($orderBy <> "")
						$orderBy .= ", ";
					$orderBy .= $sortField . " " . $thisSort;
				}
				$this->setSessionOrderBy($orderBy); // Save to Session
			} else {
				$this->setSessionOrderBy($sortField . " " . $thisSort); // Save to Session
			}
		} else {
			if (!$ctrl)
				$fld->setSort("");
		}
	}

	// Current detail table name
	public function getCurrentDetailTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_DETAIL_TABLE];
	}
	public function setCurrentDetailTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_DETAIL_TABLE] = $v;
	}

	// Get detail url
	public function getDetailUrl()
	{

		// Detail url
		$detailUrl = "";
		if ($this->getCurrentDetailTable() == "t101_jo_detail") {
			$detailUrl = $GLOBALS["t101_jo_detail"]->getListUrl() . "?" . TABLE_SHOW_MASTER . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "t101_jo_headlist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`t101_jo_head`";
	}
	public function sqlFrom() // For backward compatibility
	{
		return $this->getSqlFrom();
	}
	public function setSqlFrom($v)
	{
		$this->SqlFrom = $v;
	}
	public function getSqlSelect() // Select
	{
		return ($this->SqlSelect <> "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function sqlSelect() // For backward compatibility
	{
		return $this->getSqlSelect();
	}
	public function setSqlSelect($v)
	{
		$this->SqlSelect = $v;
	}
	public function getSqlWhere() // Where
	{
		$where = ($this->SqlWhere <> "") ? $this->SqlWhere : "";
		$this->TableFilter = "";
		AddFilter($where, $this->TableFilter);
		return $where;
	}
	public function sqlWhere() // For backward compatibility
	{
		return $this->getSqlWhere();
	}
	public function setSqlWhere($v)
	{
		$this->SqlWhere = $v;
	}
	public function getSqlGroupBy() // Group By
	{
		return ($this->SqlGroupBy <> "") ? $this->SqlGroupBy : "";
	}
	public function sqlGroupBy() // For backward compatibility
	{
		return $this->getSqlGroupBy();
	}
	public function setSqlGroupBy($v)
	{
		$this->SqlGroupBy = $v;
	}
	public function getSqlHaving() // Having
	{
		return ($this->SqlHaving <> "") ? $this->SqlHaving : "";
	}
	public function sqlHaving() // For backward compatibility
	{
		return $this->getSqlHaving();
	}
	public function setSqlHaving($v)
	{
		$this->SqlHaving = $v;
	}
	public function getSqlOrderBy() // Order By
	{
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "";
	}
	public function sqlOrderBy() // For backward compatibility
	{
		return $this->getSqlOrderBy();
	}
	public function setSqlOrderBy($v)
	{
		$this->SqlOrderBy = $v;
	}

	// Apply User ID filters
	public function applyUserIDFilters($filter)
	{
		return $filter;
	}

	// Check if User ID security allows view all
	public function userIDAllow($id = "")
	{
		$allow = USER_ID_ALLOW;
		switch ($id) {
			case "add":
			case "copy":
			case "gridadd":
			case "register":
			case "addopt":
				return (($allow & 1) == 1);
			case "edit":
			case "gridedit":
			case "update":
			case "changepwd":
			case "forgotpwd":
				return (($allow & 4) == 4);
			case "delete":
				return (($allow & 2) == 2);
			case "view":
				return (($allow & 32) == 32);
			case "search":
				return (($allow & 64) == 64);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Table SQL
	public function getCurrentSql()
	{
		$filter = $this->CurrentFilter;
		$filter = $this->applyUserIDFilters($filter);
		$sort = $this->getSessionOrderBy();
		return $this->getSql($filter, $sort);
	}

	// Table SQL with List page filter
	public function getListSql()
	{
		$filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->getSqlSelect();
		$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Get record count
	public function getRecordCount($sql)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery and SELECT DISTINCT
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) && !preg_match('/^\s*select\s+distinct\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = &$this->getConnection();
		if ($rs = $conn->execute($sqlwrk)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->close();
			}
			return (int)$cnt;
		}

		// Unable to get count, get record count directly
		if ($rs = $conn->execute($sql)) {
			$cnt = $rs->RecordCount();
			$rs->close();
			return (int)$cnt;
		}
		return $cnt;
	}

	// Get record count based on filter (for detail record count in master table pages)
	public function loadRecordCount($filter)
	{
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $filter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
		$cnt = $this->getRecordCount($sql);
		$this->CurrentFilter = $origFilter;
		return $cnt;
	}

	// Get record count (for current List page)
	public function listRecordCount()
	{
		$filter = $this->getSessionWhere();
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		$cnt = $this->getRecordCount($sql);
		return $cnt;
	}

	// INSERT statement
	protected function insertSql(&$rs)
	{
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom)
				continue;
			$names .= $this->fields[$name]->Expression . ",";
			$values .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$names = preg_replace('/,+$/', "", $names);
		$values = preg_replace('/,+$/', "", $values);
		return "INSERT INTO " . $this->UpdateTable . " ($names) VALUES ($values)";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->insertSql($rs));
		if ($success) {

			// Get insert id if necessary
			$this->id->setDbValue($conn->insert_ID());
			$rs['id'] = $this->id->DbValue;
		}
		return $success;
	}

	// UPDATE statement
	protected function updateSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "UPDATE " . $this->UpdateTable . " SET ";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsPrimaryKey)
				continue;
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->updateSql($rs, $where, $curfilter));
		return $success;
	}

	// DELETE statement
	protected function deleteSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		if ($rs) {
			if (array_key_exists('id', $rs))
				AddFilter($where, QuotedName('id', $this->Dbid) . '=' . QuotedValue($rs['id'], $this->id->DataType, $this->Dbid));
		}
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = &$this->getConnection();
		if ($success)
			$success = $conn->execute($this->deleteSql($rs, $where, $curfilter));
		return $success;
	}

	// Load DbValue from recordset or array
	protected function loadDbValues(&$rs)
	{
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->id->DbValue = $row['id'];
		$this->Nomor_JO->DbValue = $row['Nomor_JO'];
		$this->Shipper_id->DbValue = $row['Shipper_id'];
		$this->Party->DbValue = $row['Party'];
		$this->Container->DbValue = $row['Container'];
		$this->Tanggal_Stuffing->DbValue = $row['Tanggal_Stuffing'];
		$this->Destination_id->DbValue = $row['Destination_id'];
		$this->Feeder_id->DbValue = $row['Feeder_id'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`id` = @id@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('id', $row) ? $row['id'] : NULL) : $this->id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		return $keyFilter;
	}

	// Return page URL
	public function getReturnUrl()
	{
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") <> "" && ReferPageName() <> CurrentPageName() && ReferPageName() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "t101_jo_headlist.php";
		}
	}
	public function setReturnUrl($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL] = $v;
	}

	// Get modal caption
	public function getModalCaption($pageName)
	{
		global $Language;
		if ($pageName == "t101_jo_headview.php")
			return $Language->phrase("View");
		elseif ($pageName == "t101_jo_headedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "t101_jo_headadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "t101_jo_headlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("t101_jo_headview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("t101_jo_headview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "t101_jo_headadd.php?" . $this->getUrlParm($parm);
		else
			$url = "t101_jo_headadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("t101_jo_headedit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("t101_jo_headedit.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Inline edit URL
	public function getInlineEditUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=edit"));
		return $this->addMasterUrl($url);
	}

	// Copy URL
	public function getCopyUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("t101_jo_headadd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("t101_jo_headadd.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Inline copy URL
	public function getInlineCopyUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=copy"));
		return $this->addMasterUrl($url);
	}

	// Delete URL
	public function getDeleteUrl()
	{
		return $this->keyUrl("t101_jo_headdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id:" . JsonEncode($this->id->CurrentValue, "number");
		$json = "{" . $json . "}";
		if ($htmlEncode)
			$json = HtmlEncode($json);
		return $json;
	}

	// Add key value to URL
	public function keyUrl($url, $parm = "")
	{
		$url = $url . "?";
		if ($parm <> "")
			$url .= $parm . "&";
		if ($this->id->CurrentValue != NULL) {
			$url .= "id=" . urlencode($this->id->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		return $url;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		if ($this->CurrentAction || $this->isExport() ||
			in_array($fld->Type, array(128, 204, 205))) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->reverseSort());
			return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
		} else {
			return "";
		}
	}

	// Get record keys from Post/Get/Session
	public function getRecordKeys()
	{
		global $COMPOSITE_KEY_SEPARATOR;
		$arKeys = array();
		$arKey = array();
		if (Param("key_m") !== NULL) {
			$arKeys = Param("key_m");
			$cnt = count($arKeys);
		} else {
			if (Param("id") !== NULL)
				$arKeys[] = Param("id");
			elseif (IsApi() && Key(0) !== NULL)
				$arKeys[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKeys[] = Route(2);
			else
				$arKeys = NULL; // Do not setup

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = array();
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_numeric($key))
					continue;
				$ar[] = $key;
			}
		}
		return $ar;
	}

	// Get filter from record keys
	public function getFilterFromRecordKeys()
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter <> "") $keyFilter .= " OR ";
			$this->id->CurrentValue = $key;
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = &$this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->id->setDbValue($rs->fields('id'));
		$this->Nomor_JO->setDbValue($rs->fields('Nomor_JO'));
		$this->Shipper_id->setDbValue($rs->fields('Shipper_id'));
		$this->Party->setDbValue($rs->fields('Party'));
		$this->Container->setDbValue($rs->fields('Container'));
		$this->Tanggal_Stuffing->setDbValue($rs->fields('Tanggal_Stuffing'));
		$this->Destination_id->setDbValue($rs->fields('Destination_id'));
		$this->Feeder_id->setDbValue($rs->fields('Feeder_id'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// Nomor_JO
		// Shipper_id
		// Party
		// Container
		// Tanggal_Stuffing
		// Destination_id
		// Feeder_id
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

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

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

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

		// Call Row Rendered event
		$this->Row_Rendered();

		// Save data for Custom Template
		$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Render edit row values
	public function renderEditRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// id
		$this->id->EditAttrs["class"] = "form-control";
		$this->id->EditCustomAttributes = "";
		$this->id->EditValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// Nomor_JO
		$this->Nomor_JO->EditAttrs["class"] = "form-control";
		$this->Nomor_JO->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Nomor_JO->CurrentValue = HtmlDecode($this->Nomor_JO->CurrentValue);
		$this->Nomor_JO->EditValue = $this->Nomor_JO->CurrentValue;
		$this->Nomor_JO->PlaceHolder = RemoveHtml($this->Nomor_JO->caption());

		// Shipper_id
		$this->Shipper_id->EditAttrs["class"] = "form-control";
		$this->Shipper_id->EditCustomAttributes = "";

		// Party
		$this->Party->EditAttrs["class"] = "form-control";
		$this->Party->EditCustomAttributes = "";
		$this->Party->EditValue = $this->Party->CurrentValue;
		$this->Party->PlaceHolder = RemoveHtml($this->Party->caption());

		// Container
		$this->Container->EditCustomAttributes = "";
		$this->Container->EditValue = $this->Container->options(FALSE);

		// Tanggal_Stuffing
		$this->Tanggal_Stuffing->EditAttrs["class"] = "form-control";
		$this->Tanggal_Stuffing->EditCustomAttributes = "";
		$this->Tanggal_Stuffing->EditValue = FormatDateTime($this->Tanggal_Stuffing->CurrentValue, 11);
		$this->Tanggal_Stuffing->PlaceHolder = RemoveHtml($this->Tanggal_Stuffing->caption());

		// Destination_id
		$this->Destination_id->EditAttrs["class"] = "form-control";
		$this->Destination_id->EditCustomAttributes = "";

		// Feeder_id
		$this->Feeder_id->EditAttrs["class"] = "form-control";
		$this->Feeder_id->EditCustomAttributes = "";

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
	{
		if (!$recordset || !$doc)
			return;
		if (!$doc->ExportCustom) {

			// Write header
			$doc->exportTableHeader();
			if ($doc->Horizontal) { // Horizontal format, write header
				$doc->beginExportRow();
				if ($exportPageType == "view") {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->Nomor_JO);
					$doc->exportCaption($this->Shipper_id);
					$doc->exportCaption($this->Party);
					$doc->exportCaption($this->Container);
					$doc->exportCaption($this->Tanggal_Stuffing);
					$doc->exportCaption($this->Destination_id);
					$doc->exportCaption($this->Feeder_id);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->Nomor_JO);
					$doc->exportCaption($this->Shipper_id);
					$doc->exportCaption($this->Party);
					$doc->exportCaption($this->Container);
					$doc->exportCaption($this->Tanggal_Stuffing);
					$doc->exportCaption($this->Destination_id);
					$doc->exportCaption($this->Feeder_id);
				}
				$doc->endExportRow();
			}
		}

		// Move to first record
		$recCnt = $startRec - 1;
		if (!$recordset->EOF) {
			$recordset->moveFirst();
			if ($startRec > 1)
				$recordset->move($startRec - 1);
		}
		while (!$recordset->EOF && $recCnt < $stopRec) {
			$recCnt++;
			if ($recCnt >= $startRec) {
				$rowCnt = $recCnt - $startRec + 1;

				// Page break
				if ($this->ExportPageBreakCount > 0) {
					if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0)
						$doc->exportPageBreak();
				}
				$this->loadListRowValues($recordset);

				// Render row
				$this->RowType = ROWTYPE_VIEW; // Render view
				$this->resetAttributes();
				$this->renderListRow();
				if (!$doc->ExportCustom) {
					$doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
					if ($exportPageType == "view") {
						$doc->exportField($this->id);
						$doc->exportField($this->Nomor_JO);
						$doc->exportField($this->Shipper_id);
						$doc->exportField($this->Party);
						$doc->exportField($this->Container);
						$doc->exportField($this->Tanggal_Stuffing);
						$doc->exportField($this->Destination_id);
						$doc->exportField($this->Feeder_id);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->Nomor_JO);
						$doc->exportField($this->Shipper_id);
						$doc->exportField($this->Party);
						$doc->exportField($this->Container);
						$doc->exportField($this->Tanggal_Stuffing);
						$doc->exportField($this->Destination_id);
						$doc->exportField($this->Feeder_id);
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
		}
		if (!$doc->ExportCustom) {
			$doc->exportTableFooter();
		}
	}

	// Lookup data from table
	public function lookup()
	{
		global $Language, $LANGUAGE_FOLDER, $PROJECT_ID;
		if (!isset($Language))
			$Language = new Language($LANGUAGE_FOLDER, Post("language", ""));

		// Load lookup parameters
		$distinct = ConvertToBool(Post("distinct"));
		$linkField = Post("linkField");
		$displayFields = Post("displayFields");
		$parentFields = Post("parentFields");
		if (!is_array($parentFields))
			$parentFields = [];
		$childFields = Post("childFields");
		if (!is_array($childFields))
			$childFields = [];
		$filterFields = Post("filterFields");
		if (!is_array($filterFields))
			$filterFields = [];
		$filterFieldVars = Post("filterFieldVars");
		if (!is_array($filterFieldVars))
			$filterFieldVars = [];
		$filterOperators = Post("filterOperators");
		if (!is_array($filterOperators))
			$filterOperators = [];
		$autoFillSourceFields = Post("autoFillSourceFields");
		if (!is_array($autoFillSourceFields))
			$autoFillSourceFields = [];
		$formatAutoFill = FALSE;
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Get("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = AUTO_SUGGEST_MAX_ENTRIES;
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));
		$keys = Post("keys");

		// Selected records from modal, skip parent/filter fields and show all records
		if ($keys !== NULL) {
			$parentFields = [];
			$filterFields = [];
			$filterFieldVars = [];
			$offset = 0;
			$pageSize = 0;
		}

		// Create lookup object and output JSON
		$lookup = new Lookup($linkField, $this->TableVar, $distinct, $linkField, $displayFields, $parentFields, $childFields, $filterFields, $filterFieldVars, $autoFillSourceFields);
		foreach ($filterFields as $i => $filterField) { // Set up filter operators
			if (@$filterOperators[$i] <> "")
				$lookup->setFilterOperator($filterField, $filterOperators[$i]);
		}
		$lookup->LookupType = $lookupType; // Lookup type
		if ($keys !== NULL) { // Selected records from modal
			if (is_array($keys))
				$keys = implode(LOOKUP_FILTER_VALUE_SEPARATOR, $keys);
			$lookup->FilterValues[] = $keys; // Lookup values
		} else { // Lookup values
			$lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
		}
		$cnt = is_array($filterFields) ? count($filterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = Post("v" . $i, "");
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect <> "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter <> "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy <> "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson();
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = THUMBNAIL_DEFAULT_WIDTH, $height = THUMBNAIL_DEFAULT_HEIGHT)
	{

		// No binary fields
		return FALSE;
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Grid Inserting event
	function Grid_Inserting() {

		// Enter your code here
		// To reject grid insert, set return value to FALSE

		return TRUE;
	}

	// Grid Inserted event
	function Grid_Inserted($rsnew) {

		//echo "Grid Inserted";
	}

	// Grid Updating event
	function Grid_Updating($rsold) {

		// Enter your code here
		// To reject grid update, set return value to FALSE

		return TRUE;
	}

	// Grid Updated event
	function Grid_Updated($rsold, $rsnew) {

		//echo "Grid Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending($email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		//var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
		// Enter your code here

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>);

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>