<?php
namespace PHPMaker2019\emkl_prj;

/**
 * Table class for t101_jo_detail
 */
class t101_jo_detail extends DbTable
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

	// Audit trail
	public $AuditTrailOnAdd = TRUE;
	public $AuditTrailOnEdit = TRUE;
	public $AuditTrailOnDelete = TRUE;
	public $AuditTrailOnView = FALSE;
	public $AuditTrailOnViewData = FALSE;
	public $AuditTrailOnSearch = FALSE;

	// Export
	public $ExportDoc;

	// Fields
	public $id;
	public $JOHead_id;
	public $TruckingVendor_id;
	public $Driver_id;
	public $Tanggal_Stuffing;
	public $Nomor_Polisi_1;
	public $Nomor_Polisi_2;
	public $Nomor_Polisi_3;
	public $Nomor_Container_1;
	public $Nomor_Container_2;
	public $Ref_JOHead_id;
	public $No_Tagihan;
	public $Jumlah_Tagihan;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 't101_jo_detail';
		$this->TableName = 't101_jo_detail';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`t101_jo_detail`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = TRUE; // Allow detail add
		$this->DetailEdit = TRUE; // Allow detail edit
		$this->DetailView = TRUE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 1;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id
		$this->id = new DbField('t101_jo_detail', 't101_jo_detail', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// JOHead_id
		$this->JOHead_id = new DbField('t101_jo_detail', 't101_jo_detail', 'x_JOHead_id', 'JOHead_id', '`JOHead_id`', '`JOHead_id`', 3, -1, FALSE, '`JOHead_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->JOHead_id->IsForeignKey = TRUE; // Foreign key field
		$this->JOHead_id->Nullable = FALSE; // NOT NULL field
		$this->JOHead_id->Required = TRUE; // Required field
		$this->JOHead_id->Sortable = TRUE; // Allow sort
		$this->JOHead_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['JOHead_id'] = &$this->JOHead_id;

		// TruckingVendor_id
		$this->TruckingVendor_id = new DbField('t101_jo_detail', 't101_jo_detail', 'x_TruckingVendor_id', 'TruckingVendor_id', '`TruckingVendor_id`', '`TruckingVendor_id`', 3, -1, FALSE, '`TruckingVendor_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TruckingVendor_id->Nullable = FALSE; // NOT NULL field
		$this->TruckingVendor_id->Required = TRUE; // Required field
		$this->TruckingVendor_id->Sortable = TRUE; // Allow sort
		$this->TruckingVendor_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TruckingVendor_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->TruckingVendor_id->Lookup = new Lookup('TruckingVendor_id', 't006_trucking_vendor', FALSE, 'id', ["Nama","","",""], [], ["x_Driver_id"], [], [], [], [], '`Nama` ASC', '');
		$this->TruckingVendor_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TruckingVendor_id'] = &$this->TruckingVendor_id;

		// Driver_id
		$this->Driver_id = new DbField('t101_jo_detail', 't101_jo_detail', 'x_Driver_id', 'Driver_id', '`Driver_id`', '`Driver_id`', 3, -1, FALSE, '`Driver_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Driver_id->Nullable = FALSE; // NOT NULL field
		$this->Driver_id->Required = TRUE; // Required field
		$this->Driver_id->Sortable = TRUE; // Allow sort
		$this->Driver_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Driver_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Driver_id->Lookup = new Lookup('Driver_id', 't005_driver', FALSE, 'id', ["Nama","","",""], ["x_TruckingVendor_id"], [], ["TruckingVendor_id"], ["x_TruckingVendor_id"], [], [], '`Nama` ASC', '');
		$this->Driver_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Driver_id'] = &$this->Driver_id;

		// Tanggal_Stuffing
		$this->Tanggal_Stuffing = new DbField('t101_jo_detail', 't101_jo_detail', 'x_Tanggal_Stuffing', 'Tanggal_Stuffing', '`Tanggal_Stuffing`', CastDateFieldForLike('`Tanggal_Stuffing`', 11, "DB"), 133, 11, FALSE, '`Tanggal_Stuffing`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tanggal_Stuffing->Sortable = TRUE; // Allow sort
		$this->Tanggal_Stuffing->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['Tanggal_Stuffing'] = &$this->Tanggal_Stuffing;

		// Nomor_Polisi_1
		$this->Nomor_Polisi_1 = new DbField('t101_jo_detail', 't101_jo_detail', 'x_Nomor_Polisi_1', 'Nomor_Polisi_1', '`Nomor_Polisi_1`', '`Nomor_Polisi_1`', 200, -1, FALSE, '`Nomor_Polisi_1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Nomor_Polisi_1->Nullable = FALSE; // NOT NULL field
		$this->Nomor_Polisi_1->Required = TRUE; // Required field
		$this->Nomor_Polisi_1->Sortable = TRUE; // Allow sort
		$this->fields['Nomor_Polisi_1'] = &$this->Nomor_Polisi_1;

		// Nomor_Polisi_2
		$this->Nomor_Polisi_2 = new DbField('t101_jo_detail', 't101_jo_detail', 'x_Nomor_Polisi_2', 'Nomor_Polisi_2', '`Nomor_Polisi_2`', '`Nomor_Polisi_2`', 200, -1, FALSE, '`Nomor_Polisi_2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Nomor_Polisi_2->Nullable = FALSE; // NOT NULL field
		$this->Nomor_Polisi_2->Required = TRUE; // Required field
		$this->Nomor_Polisi_2->Sortable = TRUE; // Allow sort
		$this->fields['Nomor_Polisi_2'] = &$this->Nomor_Polisi_2;

		// Nomor_Polisi_3
		$this->Nomor_Polisi_3 = new DbField('t101_jo_detail', 't101_jo_detail', 'x_Nomor_Polisi_3', 'Nomor_Polisi_3', '`Nomor_Polisi_3`', '`Nomor_Polisi_3`', 200, -1, FALSE, '`Nomor_Polisi_3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Nomor_Polisi_3->Nullable = FALSE; // NOT NULL field
		$this->Nomor_Polisi_3->Required = TRUE; // Required field
		$this->Nomor_Polisi_3->Sortable = TRUE; // Allow sort
		$this->fields['Nomor_Polisi_3'] = &$this->Nomor_Polisi_3;

		// Nomor_Container_1
		$this->Nomor_Container_1 = new DbField('t101_jo_detail', 't101_jo_detail', 'x_Nomor_Container_1', 'Nomor_Container_1', '`Nomor_Container_1`', '`Nomor_Container_1`', 200, -1, FALSE, '`Nomor_Container_1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Nomor_Container_1->Nullable = FALSE; // NOT NULL field
		$this->Nomor_Container_1->Required = TRUE; // Required field
		$this->Nomor_Container_1->Sortable = TRUE; // Allow sort
		$this->fields['Nomor_Container_1'] = &$this->Nomor_Container_1;

		// Nomor_Container_2
		$this->Nomor_Container_2 = new DbField('t101_jo_detail', 't101_jo_detail', 'x_Nomor_Container_2', 'Nomor_Container_2', '`Nomor_Container_2`', '`Nomor_Container_2`', 200, -1, FALSE, '`Nomor_Container_2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Nomor_Container_2->Nullable = FALSE; // NOT NULL field
		$this->Nomor_Container_2->Required = TRUE; // Required field
		$this->Nomor_Container_2->Sortable = TRUE; // Allow sort
		$this->fields['Nomor_Container_2'] = &$this->Nomor_Container_2;

		// Ref_JOHead_id
		$this->Ref_JOHead_id = new DbField('t101_jo_detail', 't101_jo_detail', 'x_Ref_JOHead_id', 'Ref_JOHead_id', '`Ref_JOHead_id`', '`Ref_JOHead_id`', 3, -1, FALSE, '`Ref_JOHead_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Ref_JOHead_id->Sortable = TRUE; // Allow sort
		$this->Ref_JOHead_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Ref_JOHead_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Ref_JOHead_id->Lookup = new Lookup('Ref_JOHead_id', 't101_jo_head', FALSE, 'id', ["Nomor_JO","","",""], [], [], [], [], [], [], '', '');
		$this->Ref_JOHead_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Ref_JOHead_id'] = &$this->Ref_JOHead_id;

		// No_Tagihan
		$this->No_Tagihan = new DbField('t101_jo_detail', 't101_jo_detail', 'x_No_Tagihan', 'No_Tagihan', '`No_Tagihan`', '`No_Tagihan`', 16, -1, FALSE, '`No_Tagihan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->No_Tagihan->Nullable = FALSE; // NOT NULL field
		$this->No_Tagihan->Sortable = TRUE; // Allow sort
		$this->No_Tagihan->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['No_Tagihan'] = &$this->No_Tagihan;

		// Jumlah_Tagihan
		$this->Jumlah_Tagihan = new DbField('t101_jo_detail', 't101_jo_detail', 'x_Jumlah_Tagihan', 'Jumlah_Tagihan', '`Jumlah_Tagihan`', '`Jumlah_Tagihan`', 4, -1, FALSE, '`Jumlah_Tagihan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Jumlah_Tagihan->Nullable = FALSE; // NOT NULL field
		$this->Jumlah_Tagihan->Sortable = TRUE; // Allow sort
		$this->Jumlah_Tagihan->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Jumlah_Tagihan'] = &$this->Jumlah_Tagihan;
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

	// Current master table name
	public function getCurrentMasterTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_MASTER_TABLE];
	}
	public function setCurrentMasterTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_MASTER_TABLE] = $v;
	}

	// Session master WHERE clause
	public function getMasterFilter()
	{

		// Master filter
		$masterFilter = "";
		if ($this->getCurrentMasterTable() == "t101_jo_head") {
			if ($this->JOHead_id->getSessionValue() <> "")
				$masterFilter .= "`id`=" . QuotedValue($this->JOHead_id->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $masterFilter;
	}

	// Session detail WHERE clause
	public function getDetailFilter()
	{

		// Detail filter
		$detailFilter = "";
		if ($this->getCurrentMasterTable() == "t101_jo_head") {
			if ($this->JOHead_id->getSessionValue() <> "")
				$detailFilter .= "`JOHead_id`=" . QuotedValue($this->JOHead_id->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter_t101_jo_head()
	{
		return "`id`=@id@";
	}

	// Detail filter
	public function sqlDetailFilter_t101_jo_head()
	{
		return "`JOHead_id`=@JOHead_id@";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`t101_jo_detail`";
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
			if ($this->AuditTrailOnAdd)
				$this->writeAuditTrailOnAdd($rs);
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
		if ($success && $this->AuditTrailOnEdit && $rsold) {
			$rsaudit = $rs;
			$fldname = 'id';
			if (!array_key_exists($fldname, $rsaudit))
				$rsaudit[$fldname] = $rsold[$fldname];
			$this->writeAuditTrailOnEdit($rsold, $rsaudit);
		}
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
		if ($success && $this->AuditTrailOnDelete)
			$this->writeAuditTrailOnDelete($rs);
		return $success;
	}

	// Load DbValue from recordset or array
	protected function loadDbValues(&$rs)
	{
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->id->DbValue = $row['id'];
		$this->JOHead_id->DbValue = $row['JOHead_id'];
		$this->TruckingVendor_id->DbValue = $row['TruckingVendor_id'];
		$this->Driver_id->DbValue = $row['Driver_id'];
		$this->Tanggal_Stuffing->DbValue = $row['Tanggal_Stuffing'];
		$this->Nomor_Polisi_1->DbValue = $row['Nomor_Polisi_1'];
		$this->Nomor_Polisi_2->DbValue = $row['Nomor_Polisi_2'];
		$this->Nomor_Polisi_3->DbValue = $row['Nomor_Polisi_3'];
		$this->Nomor_Container_1->DbValue = $row['Nomor_Container_1'];
		$this->Nomor_Container_2->DbValue = $row['Nomor_Container_2'];
		$this->Ref_JOHead_id->DbValue = $row['Ref_JOHead_id'];
		$this->No_Tagihan->DbValue = $row['No_Tagihan'];
		$this->Jumlah_Tagihan->DbValue = $row['Jumlah_Tagihan'];
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
			return "t101_jo_detaillist.php";
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
		if ($pageName == "t101_jo_detailview.php")
			return $Language->phrase("View");
		elseif ($pageName == "t101_jo_detailedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "t101_jo_detailadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "t101_jo_detaillist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("t101_jo_detailview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("t101_jo_detailview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "t101_jo_detailadd.php?" . $this->getUrlParm($parm);
		else
			$url = "t101_jo_detailadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("t101_jo_detailedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("t101_jo_detailadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("t101_jo_detaildelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "t101_jo_head" && !ContainsString($url, TABLE_SHOW_MASTER . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . TABLE_SHOW_MASTER . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_id=" . urlencode($this->JOHead_id->CurrentValue);
		}
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
		$this->JOHead_id->setDbValue($rs->fields('JOHead_id'));
		$this->TruckingVendor_id->setDbValue($rs->fields('TruckingVendor_id'));
		$this->Driver_id->setDbValue($rs->fields('Driver_id'));
		$this->Tanggal_Stuffing->setDbValue($rs->fields('Tanggal_Stuffing'));
		$this->Nomor_Polisi_1->setDbValue($rs->fields('Nomor_Polisi_1'));
		$this->Nomor_Polisi_2->setDbValue($rs->fields('Nomor_Polisi_2'));
		$this->Nomor_Polisi_3->setDbValue($rs->fields('Nomor_Polisi_3'));
		$this->Nomor_Container_1->setDbValue($rs->fields('Nomor_Container_1'));
		$this->Nomor_Container_2->setDbValue($rs->fields('Nomor_Container_2'));
		$this->Ref_JOHead_id->setDbValue($rs->fields('Ref_JOHead_id'));
		$this->No_Tagihan->setDbValue($rs->fields('No_Tagihan'));
		$this->Jumlah_Tagihan->setDbValue($rs->fields('Jumlah_Tagihan'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// JOHead_id
		// TruckingVendor_id
		// Driver_id
		// Tanggal_Stuffing
		// Nomor_Polisi_1
		// Nomor_Polisi_2
		// Nomor_Polisi_3
		// Nomor_Container_1
		// Nomor_Container_2
		// Ref_JOHead_id
		// No_Tagihan
		// Jumlah_Tagihan
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

		// Tanggal_Stuffing
		$this->Tanggal_Stuffing->ViewValue = $this->Tanggal_Stuffing->CurrentValue;
		$this->Tanggal_Stuffing->ViewValue = FormatDateTime($this->Tanggal_Stuffing->ViewValue, 11);
		$this->Tanggal_Stuffing->ViewCustomAttributes = "";

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

		// Ref_JOHead_id
		$curVal = strval($this->Ref_JOHead_id->CurrentValue);
		if ($curVal <> "") {
			$this->Ref_JOHead_id->ViewValue = $this->Ref_JOHead_id->lookupCacheOption($curVal);
			if ($this->Ref_JOHead_id->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->Ref_JOHead_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Ref_JOHead_id->ViewValue = $this->Ref_JOHead_id->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Ref_JOHead_id->ViewValue = $this->Ref_JOHead_id->CurrentValue;
				}
			}
		} else {
			$this->Ref_JOHead_id->ViewValue = NULL;
		}
		$this->Ref_JOHead_id->ViewCustomAttributes = "";

		// No_Tagihan
		$this->No_Tagihan->ViewValue = $this->No_Tagihan->CurrentValue;
		$this->No_Tagihan->ViewValue = FormatNumber($this->No_Tagihan->ViewValue, 0, -2, -2, -2);
		$this->No_Tagihan->ViewCustomAttributes = "";

		// Jumlah_Tagihan
		$this->Jumlah_Tagihan->ViewValue = $this->Jumlah_Tagihan->CurrentValue;
		$this->Jumlah_Tagihan->ViewValue = FormatNumber($this->Jumlah_Tagihan->ViewValue, 2, -2, -2, -2);
		$this->Jumlah_Tagihan->ViewCustomAttributes = "";

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

		// Tanggal_Stuffing
		$this->Tanggal_Stuffing->LinkCustomAttributes = "";
		$this->Tanggal_Stuffing->HrefValue = "";
		$this->Tanggal_Stuffing->TooltipValue = "";

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

		// Ref_JOHead_id
		$this->Ref_JOHead_id->LinkCustomAttributes = "";
		$this->Ref_JOHead_id->HrefValue = "";
		$this->Ref_JOHead_id->TooltipValue = "";

		// No_Tagihan
		$this->No_Tagihan->LinkCustomAttributes = "";
		$this->No_Tagihan->HrefValue = "";
		$this->No_Tagihan->TooltipValue = "";

		// Jumlah_Tagihan
		$this->Jumlah_Tagihan->LinkCustomAttributes = "";
		$this->Jumlah_Tagihan->HrefValue = "";
		$this->Jumlah_Tagihan->TooltipValue = "";

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

		// JOHead_id
		$this->JOHead_id->EditAttrs["class"] = "form-control";
		$this->JOHead_id->EditCustomAttributes = "";
		if ($this->JOHead_id->getSessionValue() <> "") {
			$this->JOHead_id->CurrentValue = $this->JOHead_id->getSessionValue();
		$this->JOHead_id->ViewValue = $this->JOHead_id->CurrentValue;
		$this->JOHead_id->ViewValue = FormatNumber($this->JOHead_id->ViewValue, 0, -2, -2, -2);
		$this->JOHead_id->ViewCustomAttributes = "";
		} else {
		$this->JOHead_id->EditValue = $this->JOHead_id->CurrentValue;
		$this->JOHead_id->PlaceHolder = RemoveHtml($this->JOHead_id->caption());
		}

		// TruckingVendor_id
		$this->TruckingVendor_id->EditAttrs["class"] = "form-control";
		$this->TruckingVendor_id->EditCustomAttributes = "";

		// Driver_id
		$this->Driver_id->EditAttrs["class"] = "form-control";
		$this->Driver_id->EditCustomAttributes = "";

		// Tanggal_Stuffing
		$this->Tanggal_Stuffing->EditAttrs["class"] = "form-control";
		$this->Tanggal_Stuffing->EditCustomAttributes = "style='width: 152px;'";
		$this->Tanggal_Stuffing->EditValue = FormatDateTime($this->Tanggal_Stuffing->CurrentValue, 11);
		$this->Tanggal_Stuffing->PlaceHolder = RemoveHtml($this->Tanggal_Stuffing->caption());

		// Nomor_Polisi_1
		$this->Nomor_Polisi_1->EditAttrs["class"] = "form-control";
		$this->Nomor_Polisi_1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Nomor_Polisi_1->CurrentValue = HtmlDecode($this->Nomor_Polisi_1->CurrentValue);
		$this->Nomor_Polisi_1->EditValue = $this->Nomor_Polisi_1->CurrentValue;
		$this->Nomor_Polisi_1->PlaceHolder = RemoveHtml($this->Nomor_Polisi_1->caption());

		// Nomor_Polisi_2
		$this->Nomor_Polisi_2->EditAttrs["class"] = "form-control";
		$this->Nomor_Polisi_2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Nomor_Polisi_2->CurrentValue = HtmlDecode($this->Nomor_Polisi_2->CurrentValue);
		$this->Nomor_Polisi_2->EditValue = $this->Nomor_Polisi_2->CurrentValue;
		$this->Nomor_Polisi_2->PlaceHolder = RemoveHtml($this->Nomor_Polisi_2->caption());

		// Nomor_Polisi_3
		$this->Nomor_Polisi_3->EditAttrs["class"] = "form-control";
		$this->Nomor_Polisi_3->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Nomor_Polisi_3->CurrentValue = HtmlDecode($this->Nomor_Polisi_3->CurrentValue);
		$this->Nomor_Polisi_3->EditValue = $this->Nomor_Polisi_3->CurrentValue;
		$this->Nomor_Polisi_3->PlaceHolder = RemoveHtml($this->Nomor_Polisi_3->caption());

		// Nomor_Container_1
		$this->Nomor_Container_1->EditAttrs["class"] = "form-control";
		$this->Nomor_Container_1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Nomor_Container_1->CurrentValue = HtmlDecode($this->Nomor_Container_1->CurrentValue);
		$this->Nomor_Container_1->EditValue = $this->Nomor_Container_1->CurrentValue;
		$this->Nomor_Container_1->PlaceHolder = RemoveHtml($this->Nomor_Container_1->caption());

		// Nomor_Container_2
		$this->Nomor_Container_2->EditAttrs["class"] = "form-control";
		$this->Nomor_Container_2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Nomor_Container_2->CurrentValue = HtmlDecode($this->Nomor_Container_2->CurrentValue);
		$this->Nomor_Container_2->EditValue = $this->Nomor_Container_2->CurrentValue;
		$this->Nomor_Container_2->PlaceHolder = RemoveHtml($this->Nomor_Container_2->caption());

		// Ref_JOHead_id
		$this->Ref_JOHead_id->EditAttrs["class"] = "form-control";
		$this->Ref_JOHead_id->EditCustomAttributes = "";

		// No_Tagihan
		$this->No_Tagihan->EditAttrs["class"] = "form-control";
		$this->No_Tagihan->EditCustomAttributes = "";
		$this->No_Tagihan->EditValue = $this->No_Tagihan->CurrentValue;
		$this->No_Tagihan->PlaceHolder = RemoveHtml($this->No_Tagihan->caption());

		// Jumlah_Tagihan
		$this->Jumlah_Tagihan->EditAttrs["class"] = "form-control";
		$this->Jumlah_Tagihan->EditCustomAttributes = "";
		$this->Jumlah_Tagihan->EditValue = $this->Jumlah_Tagihan->CurrentValue;
		$this->Jumlah_Tagihan->PlaceHolder = RemoveHtml($this->Jumlah_Tagihan->caption());
		if (strval($this->Jumlah_Tagihan->EditValue) <> "" && is_numeric($this->Jumlah_Tagihan->EditValue))
			$this->Jumlah_Tagihan->EditValue = FormatNumber($this->Jumlah_Tagihan->EditValue, -2, -2, -2, -2);

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
					$doc->exportCaption($this->TruckingVendor_id);
					$doc->exportCaption($this->Driver_id);
					$doc->exportCaption($this->Tanggal_Stuffing);
					$doc->exportCaption($this->Nomor_Polisi_1);
					$doc->exportCaption($this->Nomor_Polisi_2);
					$doc->exportCaption($this->Nomor_Polisi_3);
					$doc->exportCaption($this->Nomor_Container_1);
					$doc->exportCaption($this->Nomor_Container_2);
					$doc->exportCaption($this->Ref_JOHead_id);
					$doc->exportCaption($this->No_Tagihan);
					$doc->exportCaption($this->Jumlah_Tagihan);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->JOHead_id);
					$doc->exportCaption($this->TruckingVendor_id);
					$doc->exportCaption($this->Driver_id);
					$doc->exportCaption($this->Tanggal_Stuffing);
					$doc->exportCaption($this->Nomor_Polisi_1);
					$doc->exportCaption($this->Nomor_Polisi_2);
					$doc->exportCaption($this->Nomor_Polisi_3);
					$doc->exportCaption($this->Nomor_Container_1);
					$doc->exportCaption($this->Nomor_Container_2);
					$doc->exportCaption($this->Ref_JOHead_id);
					$doc->exportCaption($this->No_Tagihan);
					$doc->exportCaption($this->Jumlah_Tagihan);
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
						$doc->exportField($this->TruckingVendor_id);
						$doc->exportField($this->Driver_id);
						$doc->exportField($this->Tanggal_Stuffing);
						$doc->exportField($this->Nomor_Polisi_1);
						$doc->exportField($this->Nomor_Polisi_2);
						$doc->exportField($this->Nomor_Polisi_3);
						$doc->exportField($this->Nomor_Container_1);
						$doc->exportField($this->Nomor_Container_2);
						$doc->exportField($this->Ref_JOHead_id);
						$doc->exportField($this->No_Tagihan);
						$doc->exportField($this->Jumlah_Tagihan);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->JOHead_id);
						$doc->exportField($this->TruckingVendor_id);
						$doc->exportField($this->Driver_id);
						$doc->exportField($this->Tanggal_Stuffing);
						$doc->exportField($this->Nomor_Polisi_1);
						$doc->exportField($this->Nomor_Polisi_2);
						$doc->exportField($this->Nomor_Polisi_3);
						$doc->exportField($this->Nomor_Container_1);
						$doc->exportField($this->Nomor_Container_2);
						$doc->exportField($this->Ref_JOHead_id);
						$doc->exportField($this->No_Tagihan);
						$doc->exportField($this->Jumlah_Tagihan);
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

	// Write Audit Trail start/end for grid update
	public function writeAuditTrailDummy($typ)
	{
		$table = 't101_jo_detail';
		$usr = CurrentUserName();
		WriteAuditTrail("log", DbCurrentDateTime(), ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (add page)
	public function writeAuditTrailOnAdd(&$rs)
	{
		global $Language;
		if (!$this->AuditTrailOnAdd)
			return;
		$table = 't101_jo_detail';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
		$key .= $rs['id'];

		// Write Audit Trail
		$dt = DbCurrentDateTime();
		$id = ScriptName();
		$usr = CurrentUserName();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $this->fields) && $this->fields[$fldname]->DataType <> DATATYPE_BLOB) { // Ignore BLOB fields
				if ($this->fields[$fldname]->HtmlTag == "PASSWORD") {
					$newvalue = $Language->phrase("PasswordMask"); // Password Field
				} elseif ($this->fields[$fldname]->DataType == DATATYPE_MEMO) {
					if (AUDIT_TRAIL_TO_DATABASE)
						$newvalue = $rs[$fldname];
					else
						$newvalue = "[MEMO]"; // Memo Field
				} elseif ($this->fields[$fldname]->DataType == DATATYPE_XML) {
					$newvalue = "[XML]"; // XML Field
				} else {
					$newvalue = $rs[$fldname];
				}
				WriteAuditTrail("log", $dt, $id, $usr, "A", $table, $fldname, $key, "", $newvalue);
			}
		}
	}

	// Write Audit Trail (edit page)
	public function writeAuditTrailOnEdit(&$rsold, &$rsnew)
	{
		global $Language;
		if (!$this->AuditTrailOnEdit)
			return;
		$table = 't101_jo_detail';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
		$key .= $rsold['id'];

		// Write Audit Trail
		$dt = DbCurrentDateTime();
		$id = ScriptName();
		$usr = CurrentUserName();
		foreach (array_keys($rsnew) as $fldname) {
			if (array_key_exists($fldname, $this->fields) && array_key_exists($fldname, $rsold) && $this->fields[$fldname]->DataType <> DATATYPE_BLOB) { // Ignore BLOB fields
				if ($this->fields[$fldname]->DataType == DATATYPE_DATE) { // DateTime field
					$modified = (FormatDateTime($rsold[$fldname], 0) <> FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($this->fields[$fldname]->HtmlTag == "PASSWORD") { // Password Field
						$oldvalue = $Language->phrase("PasswordMask");
						$newvalue = $Language->phrase("PasswordMask");
					} elseif ($this->fields[$fldname]->DataType == DATATYPE_MEMO) { // Memo field
						if (AUDIT_TRAIL_TO_DATABASE) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($this->fields[$fldname]->DataType == DATATYPE_XML) { // XML field
						$oldvalue = "[XML]";
						$newvalue = "[XML]";
					} else {
						$oldvalue = $rsold[$fldname];
						$newvalue = $rsnew[$fldname];
					}
					WriteAuditTrail("log", $dt, $id, $usr, "U", $table, $fldname, $key, $oldvalue, $newvalue);
				}
			}
		}
	}

	// Write Audit Trail (delete page)
	public function writeAuditTrailOnDelete(&$rs)
	{
		global $Language;
		if (!$this->AuditTrailOnDelete)
			return;
		$table = 't101_jo_detail';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
		$key .= $rs['id'];

		// Write Audit Trail
		$dt = DbCurrentDateTime();
		$id = ScriptName();
		$curUser = CurrentUserName();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $this->fields) && $this->fields[$fldname]->DataType <> DATATYPE_BLOB) { // Ignore BLOB fields
				if ($this->fields[$fldname]->HtmlTag == "PASSWORD") {
					$oldvalue = $Language->phrase("PasswordMask"); // Password Field
				} elseif ($this->fields[$fldname]->DataType == DATATYPE_MEMO) {
					if (AUDIT_TRAIL_TO_DATABASE)
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($this->fields[$fldname]->DataType == DATATYPE_XML) {
					$oldvalue = "[XML]"; // XML field
				} else {
					$oldvalue = $rs[$fldname];
				}
				WriteAuditTrail("log", $dt, $id, $curUser, "D", $table, $fldname, $key, $oldvalue, "");
			}
		}
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