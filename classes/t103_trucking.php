<?php
namespace PHPMaker2019\emkl_prj;

/**
 * Table class for t103_trucking
 */
class t103_trucking extends DbTable
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
	public $EI;
	public $Shipper_id;
	public $Party;
	public $Jenis_Container;
	public $Tgl_Stuffing;
	public $Destination_id;
	public $Feeder_id;
	public $ETA_ETD;
	public $Liner_id;
	public $Remark;
	public $TruckingVendor_id;
	public $Driver_id;
	public $No_Pol_1;
	public $No_Pol_2;
	public $No_Pol_3;
	public $Nomor_Container_1;
	public $Nomor_Container_2;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 't103_trucking';
		$this->TableName = 't103_trucking';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`t103_trucking`";
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
		$this->id = new DbField('t103_trucking', 't103_trucking', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// EI
		$this->EI = new DbField('t103_trucking', 't103_trucking', 'x_EI', 'EI', '`EI`', '`EI`', 202, -1, FALSE, '`EI`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->EI->Nullable = FALSE; // NOT NULL field
		$this->EI->Sortable = TRUE; // Allow sort
		$this->EI->Lookup = new Lookup('EI', 't103_trucking', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->EI->OptionCount = 2;
		$this->fields['EI'] = &$this->EI;

		// Shipper_id
		$this->Shipper_id = new DbField('t103_trucking', 't103_trucking', 'x_Shipper_id', 'Shipper_id', '`Shipper_id`', '`Shipper_id`', 3, -1, FALSE, '`Shipper_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Shipper_id->Nullable = FALSE; // NOT NULL field
		$this->Shipper_id->Required = TRUE; // Required field
		$this->Shipper_id->Sortable = TRUE; // Allow sort
		$this->Shipper_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Shipper_id'] = &$this->Shipper_id;

		// Party
		$this->Party = new DbField('t103_trucking', 't103_trucking', 'x_Party', 'Party', '`Party`', '`Party`', 16, -1, FALSE, '`Party`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Party->Nullable = FALSE; // NOT NULL field
		$this->Party->Sortable = TRUE; // Allow sort
		$this->Party->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Party'] = &$this->Party;

		// Jenis_Container
		$this->Jenis_Container = new DbField('t103_trucking', 't103_trucking', 'x_Jenis_Container', 'Jenis_Container', '`Jenis_Container`', '`Jenis_Container`', 202, -1, FALSE, '`Jenis_Container`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->Jenis_Container->Nullable = FALSE; // NOT NULL field
		$this->Jenis_Container->Sortable = TRUE; // Allow sort
		$this->Jenis_Container->Lookup = new Lookup('Jenis_Container', 't103_trucking', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Jenis_Container->OptionCount = 2;
		$this->fields['Jenis_Container'] = &$this->Jenis_Container;

		// Tgl_Stuffing
		$this->Tgl_Stuffing = new DbField('t103_trucking', 't103_trucking', 'x_Tgl_Stuffing', 'Tgl_Stuffing', '`Tgl_Stuffing`', CastDateFieldForLike('`Tgl_Stuffing`', 0, "DB"), 133, 0, FALSE, '`Tgl_Stuffing`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tgl_Stuffing->Nullable = FALSE; // NOT NULL field
		$this->Tgl_Stuffing->Required = TRUE; // Required field
		$this->Tgl_Stuffing->Sortable = TRUE; // Allow sort
		$this->Tgl_Stuffing->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['Tgl_Stuffing'] = &$this->Tgl_Stuffing;

		// Destination_id
		$this->Destination_id = new DbField('t103_trucking', 't103_trucking', 'x_Destination_id', 'Destination_id', '`Destination_id`', '`Destination_id`', 3, -1, FALSE, '`Destination_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Destination_id->Nullable = FALSE; // NOT NULL field
		$this->Destination_id->Required = TRUE; // Required field
		$this->Destination_id->Sortable = TRUE; // Allow sort
		$this->Destination_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Destination_id'] = &$this->Destination_id;

		// Feeder_id
		$this->Feeder_id = new DbField('t103_trucking', 't103_trucking', 'x_Feeder_id', 'Feeder_id', '`Feeder_id`', '`Feeder_id`', 3, -1, FALSE, '`Feeder_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Feeder_id->Nullable = FALSE; // NOT NULL field
		$this->Feeder_id->Required = TRUE; // Required field
		$this->Feeder_id->Sortable = TRUE; // Allow sort
		$this->Feeder_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Feeder_id'] = &$this->Feeder_id;

		// ETA_ETD
		$this->ETA_ETD = new DbField('t103_trucking', 't103_trucking', 'x_ETA_ETD', 'ETA_ETD', '`ETA_ETD`', CastDateFieldForLike('`ETA_ETD`', 0, "DB"), 135, 0, FALSE, '`ETA_ETD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ETA_ETD->Nullable = FALSE; // NOT NULL field
		$this->ETA_ETD->Required = TRUE; // Required field
		$this->ETA_ETD->Sortable = TRUE; // Allow sort
		$this->ETA_ETD->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ETA_ETD'] = &$this->ETA_ETD;

		// Liner_id
		$this->Liner_id = new DbField('t103_trucking', 't103_trucking', 'x_Liner_id', 'Liner_id', '`Liner_id`', '`Liner_id`', 3, -1, FALSE, '`Liner_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Liner_id->Nullable = FALSE; // NOT NULL field
		$this->Liner_id->Required = TRUE; // Required field
		$this->Liner_id->Sortable = TRUE; // Allow sort
		$this->Liner_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Liner_id'] = &$this->Liner_id;

		// Remark
		$this->Remark = new DbField('t103_trucking', 't103_trucking', 'x_Remark', 'Remark', '`Remark`', '`Remark`', 201, -1, FALSE, '`Remark`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Remark->Nullable = FALSE; // NOT NULL field
		$this->Remark->Required = TRUE; // Required field
		$this->Remark->Sortable = TRUE; // Allow sort
		$this->fields['Remark'] = &$this->Remark;

		// TruckingVendor_id
		$this->TruckingVendor_id = new DbField('t103_trucking', 't103_trucking', 'x_TruckingVendor_id', 'TruckingVendor_id', '`TruckingVendor_id`', '`TruckingVendor_id`', 3, -1, FALSE, '`TruckingVendor_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TruckingVendor_id->Nullable = FALSE; // NOT NULL field
		$this->TruckingVendor_id->Required = TRUE; // Required field
		$this->TruckingVendor_id->Sortable = TRUE; // Allow sort
		$this->TruckingVendor_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TruckingVendor_id'] = &$this->TruckingVendor_id;

		// Driver_id
		$this->Driver_id = new DbField('t103_trucking', 't103_trucking', 'x_Driver_id', 'Driver_id', '`Driver_id`', '`Driver_id`', 3, -1, FALSE, '`Driver_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Driver_id->Nullable = FALSE; // NOT NULL field
		$this->Driver_id->Required = TRUE; // Required field
		$this->Driver_id->Sortable = TRUE; // Allow sort
		$this->Driver_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Driver_id'] = &$this->Driver_id;

		// No_Pol_1
		$this->No_Pol_1 = new DbField('t103_trucking', 't103_trucking', 'x_No_Pol_1', 'No_Pol_1', '`No_Pol_1`', '`No_Pol_1`', 200, -1, FALSE, '`No_Pol_1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->No_Pol_1->Nullable = FALSE; // NOT NULL field
		$this->No_Pol_1->Sortable = TRUE; // Allow sort
		$this->fields['No_Pol_1'] = &$this->No_Pol_1;

		// No_Pol_2
		$this->No_Pol_2 = new DbField('t103_trucking', 't103_trucking', 'x_No_Pol_2', 'No_Pol_2', '`No_Pol_2`', '`No_Pol_2`', 200, -1, FALSE, '`No_Pol_2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->No_Pol_2->Nullable = FALSE; // NOT NULL field
		$this->No_Pol_2->Required = TRUE; // Required field
		$this->No_Pol_2->Sortable = TRUE; // Allow sort
		$this->fields['No_Pol_2'] = &$this->No_Pol_2;

		// No_Pol_3
		$this->No_Pol_3 = new DbField('t103_trucking', 't103_trucking', 'x_No_Pol_3', 'No_Pol_3', '`No_Pol_3`', '`No_Pol_3`', 200, -1, FALSE, '`No_Pol_3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->No_Pol_3->Nullable = FALSE; // NOT NULL field
		$this->No_Pol_3->Sortable = TRUE; // Allow sort
		$this->fields['No_Pol_3'] = &$this->No_Pol_3;

		// Nomor_Container_1
		$this->Nomor_Container_1 = new DbField('t103_trucking', 't103_trucking', 'x_Nomor_Container_1', 'Nomor_Container_1', '`Nomor_Container_1`', '`Nomor_Container_1`', 200, -1, FALSE, '`Nomor_Container_1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Nomor_Container_1->Nullable = FALSE; // NOT NULL field
		$this->Nomor_Container_1->Required = TRUE; // Required field
		$this->Nomor_Container_1->Sortable = TRUE; // Allow sort
		$this->fields['Nomor_Container_1'] = &$this->Nomor_Container_1;

		// Nomor_Container_2
		$this->Nomor_Container_2 = new DbField('t103_trucking', 't103_trucking', 'x_Nomor_Container_2', 'Nomor_Container_2', '`Nomor_Container_2`', '`Nomor_Container_2`', 200, -1, FALSE, '`Nomor_Container_2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Nomor_Container_2->Nullable = FALSE; // NOT NULL field
		$this->Nomor_Container_2->Required = TRUE; // Required field
		$this->Nomor_Container_2->Sortable = TRUE; // Allow sort
		$this->fields['Nomor_Container_2'] = &$this->Nomor_Container_2;
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

	// Single column sort
	public function updateSort(&$fld)
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
			$this->setSessionOrderBy($sortField . " " . $thisSort); // Save to Session
		} else {
			$fld->setSort("");
		}
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`t103_trucking`";
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
		$this->EI->DbValue = $row['EI'];
		$this->Shipper_id->DbValue = $row['Shipper_id'];
		$this->Party->DbValue = $row['Party'];
		$this->Jenis_Container->DbValue = $row['Jenis_Container'];
		$this->Tgl_Stuffing->DbValue = $row['Tgl_Stuffing'];
		$this->Destination_id->DbValue = $row['Destination_id'];
		$this->Feeder_id->DbValue = $row['Feeder_id'];
		$this->ETA_ETD->DbValue = $row['ETA_ETD'];
		$this->Liner_id->DbValue = $row['Liner_id'];
		$this->Remark->DbValue = $row['Remark'];
		$this->TruckingVendor_id->DbValue = $row['TruckingVendor_id'];
		$this->Driver_id->DbValue = $row['Driver_id'];
		$this->No_Pol_1->DbValue = $row['No_Pol_1'];
		$this->No_Pol_2->DbValue = $row['No_Pol_2'];
		$this->No_Pol_3->DbValue = $row['No_Pol_3'];
		$this->Nomor_Container_1->DbValue = $row['Nomor_Container_1'];
		$this->Nomor_Container_2->DbValue = $row['Nomor_Container_2'];
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
			return "t103_truckinglist.php";
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
		if ($pageName == "t103_truckingview.php")
			return $Language->phrase("View");
		elseif ($pageName == "t103_truckingedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "t103_truckingadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "t103_truckinglist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("t103_truckingview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("t103_truckingview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "t103_truckingadd.php?" . $this->getUrlParm($parm);
		else
			$url = "t103_truckingadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("t103_truckingedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("t103_truckingadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("t103_truckingdelete.php", $this->getUrlParm());
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
		$this->EI->setDbValue($rs->fields('EI'));
		$this->Shipper_id->setDbValue($rs->fields('Shipper_id'));
		$this->Party->setDbValue($rs->fields('Party'));
		$this->Jenis_Container->setDbValue($rs->fields('Jenis_Container'));
		$this->Tgl_Stuffing->setDbValue($rs->fields('Tgl_Stuffing'));
		$this->Destination_id->setDbValue($rs->fields('Destination_id'));
		$this->Feeder_id->setDbValue($rs->fields('Feeder_id'));
		$this->ETA_ETD->setDbValue($rs->fields('ETA_ETD'));
		$this->Liner_id->setDbValue($rs->fields('Liner_id'));
		$this->Remark->setDbValue($rs->fields('Remark'));
		$this->TruckingVendor_id->setDbValue($rs->fields('TruckingVendor_id'));
		$this->Driver_id->setDbValue($rs->fields('Driver_id'));
		$this->No_Pol_1->setDbValue($rs->fields('No_Pol_1'));
		$this->No_Pol_2->setDbValue($rs->fields('No_Pol_2'));
		$this->No_Pol_3->setDbValue($rs->fields('No_Pol_3'));
		$this->Nomor_Container_1->setDbValue($rs->fields('Nomor_Container_1'));
		$this->Nomor_Container_2->setDbValue($rs->fields('Nomor_Container_2'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
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

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

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

		// EI
		$this->EI->EditCustomAttributes = "";
		$this->EI->EditValue = $this->EI->options(FALSE);

		// Shipper_id
		$this->Shipper_id->EditAttrs["class"] = "form-control";
		$this->Shipper_id->EditCustomAttributes = "";
		$this->Shipper_id->EditValue = $this->Shipper_id->CurrentValue;
		$this->Shipper_id->PlaceHolder = RemoveHtml($this->Shipper_id->caption());

		// Party
		$this->Party->EditAttrs["class"] = "form-control";
		$this->Party->EditCustomAttributes = "";
		$this->Party->EditValue = $this->Party->CurrentValue;
		$this->Party->PlaceHolder = RemoveHtml($this->Party->caption());

		// Jenis_Container
		$this->Jenis_Container->EditCustomAttributes = "";
		$this->Jenis_Container->EditValue = $this->Jenis_Container->options(FALSE);

		// Tgl_Stuffing
		$this->Tgl_Stuffing->EditAttrs["class"] = "form-control";
		$this->Tgl_Stuffing->EditCustomAttributes = "";
		$this->Tgl_Stuffing->EditValue = FormatDateTime($this->Tgl_Stuffing->CurrentValue, 8);
		$this->Tgl_Stuffing->PlaceHolder = RemoveHtml($this->Tgl_Stuffing->caption());

		// Destination_id
		$this->Destination_id->EditAttrs["class"] = "form-control";
		$this->Destination_id->EditCustomAttributes = "";
		$this->Destination_id->EditValue = $this->Destination_id->CurrentValue;
		$this->Destination_id->PlaceHolder = RemoveHtml($this->Destination_id->caption());

		// Feeder_id
		$this->Feeder_id->EditAttrs["class"] = "form-control";
		$this->Feeder_id->EditCustomAttributes = "";
		$this->Feeder_id->EditValue = $this->Feeder_id->CurrentValue;
		$this->Feeder_id->PlaceHolder = RemoveHtml($this->Feeder_id->caption());

		// ETA_ETD
		$this->ETA_ETD->EditAttrs["class"] = "form-control";
		$this->ETA_ETD->EditCustomAttributes = "";
		$this->ETA_ETD->EditValue = FormatDateTime($this->ETA_ETD->CurrentValue, 8);
		$this->ETA_ETD->PlaceHolder = RemoveHtml($this->ETA_ETD->caption());

		// Liner_id
		$this->Liner_id->EditAttrs["class"] = "form-control";
		$this->Liner_id->EditCustomAttributes = "";
		$this->Liner_id->EditValue = $this->Liner_id->CurrentValue;
		$this->Liner_id->PlaceHolder = RemoveHtml($this->Liner_id->caption());

		// Remark
		$this->Remark->EditAttrs["class"] = "form-control";
		$this->Remark->EditCustomAttributes = "";
		$this->Remark->EditValue = $this->Remark->CurrentValue;
		$this->Remark->PlaceHolder = RemoveHtml($this->Remark->caption());

		// TruckingVendor_id
		$this->TruckingVendor_id->EditAttrs["class"] = "form-control";
		$this->TruckingVendor_id->EditCustomAttributes = "";
		$this->TruckingVendor_id->EditValue = $this->TruckingVendor_id->CurrentValue;
		$this->TruckingVendor_id->PlaceHolder = RemoveHtml($this->TruckingVendor_id->caption());

		// Driver_id
		$this->Driver_id->EditAttrs["class"] = "form-control";
		$this->Driver_id->EditCustomAttributes = "";
		$this->Driver_id->EditValue = $this->Driver_id->CurrentValue;
		$this->Driver_id->PlaceHolder = RemoveHtml($this->Driver_id->caption());

		// No_Pol_1
		$this->No_Pol_1->EditAttrs["class"] = "form-control";
		$this->No_Pol_1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->No_Pol_1->CurrentValue = HtmlDecode($this->No_Pol_1->CurrentValue);
		$this->No_Pol_1->EditValue = $this->No_Pol_1->CurrentValue;
		$this->No_Pol_1->PlaceHolder = RemoveHtml($this->No_Pol_1->caption());

		// No_Pol_2
		$this->No_Pol_2->EditAttrs["class"] = "form-control";
		$this->No_Pol_2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->No_Pol_2->CurrentValue = HtmlDecode($this->No_Pol_2->CurrentValue);
		$this->No_Pol_2->EditValue = $this->No_Pol_2->CurrentValue;
		$this->No_Pol_2->PlaceHolder = RemoveHtml($this->No_Pol_2->caption());

		// No_Pol_3
		$this->No_Pol_3->EditAttrs["class"] = "form-control";
		$this->No_Pol_3->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->No_Pol_3->CurrentValue = HtmlDecode($this->No_Pol_3->CurrentValue);
		$this->No_Pol_3->EditValue = $this->No_Pol_3->CurrentValue;
		$this->No_Pol_3->PlaceHolder = RemoveHtml($this->No_Pol_3->caption());

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
					$doc->exportCaption($this->EI);
					$doc->exportCaption($this->Shipper_id);
					$doc->exportCaption($this->Party);
					$doc->exportCaption($this->Jenis_Container);
					$doc->exportCaption($this->Tgl_Stuffing);
					$doc->exportCaption($this->Destination_id);
					$doc->exportCaption($this->Feeder_id);
					$doc->exportCaption($this->ETA_ETD);
					$doc->exportCaption($this->Liner_id);
					$doc->exportCaption($this->Remark);
					$doc->exportCaption($this->TruckingVendor_id);
					$doc->exportCaption($this->Driver_id);
					$doc->exportCaption($this->No_Pol_1);
					$doc->exportCaption($this->No_Pol_2);
					$doc->exportCaption($this->No_Pol_3);
					$doc->exportCaption($this->Nomor_Container_1);
					$doc->exportCaption($this->Nomor_Container_2);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->EI);
					$doc->exportCaption($this->Shipper_id);
					$doc->exportCaption($this->Party);
					$doc->exportCaption($this->Jenis_Container);
					$doc->exportCaption($this->Tgl_Stuffing);
					$doc->exportCaption($this->Destination_id);
					$doc->exportCaption($this->Feeder_id);
					$doc->exportCaption($this->ETA_ETD);
					$doc->exportCaption($this->Liner_id);
					$doc->exportCaption($this->TruckingVendor_id);
					$doc->exportCaption($this->Driver_id);
					$doc->exportCaption($this->No_Pol_1);
					$doc->exportCaption($this->No_Pol_2);
					$doc->exportCaption($this->No_Pol_3);
					$doc->exportCaption($this->Nomor_Container_1);
					$doc->exportCaption($this->Nomor_Container_2);
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
						$doc->exportField($this->EI);
						$doc->exportField($this->Shipper_id);
						$doc->exportField($this->Party);
						$doc->exportField($this->Jenis_Container);
						$doc->exportField($this->Tgl_Stuffing);
						$doc->exportField($this->Destination_id);
						$doc->exportField($this->Feeder_id);
						$doc->exportField($this->ETA_ETD);
						$doc->exportField($this->Liner_id);
						$doc->exportField($this->Remark);
						$doc->exportField($this->TruckingVendor_id);
						$doc->exportField($this->Driver_id);
						$doc->exportField($this->No_Pol_1);
						$doc->exportField($this->No_Pol_2);
						$doc->exportField($this->No_Pol_3);
						$doc->exportField($this->Nomor_Container_1);
						$doc->exportField($this->Nomor_Container_2);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->EI);
						$doc->exportField($this->Shipper_id);
						$doc->exportField($this->Party);
						$doc->exportField($this->Jenis_Container);
						$doc->exportField($this->Tgl_Stuffing);
						$doc->exportField($this->Destination_id);
						$doc->exportField($this->Feeder_id);
						$doc->exportField($this->ETA_ETD);
						$doc->exportField($this->Liner_id);
						$doc->exportField($this->TruckingVendor_id);
						$doc->exportField($this->Driver_id);
						$doc->exportField($this->No_Pol_1);
						$doc->exportField($this->No_Pol_2);
						$doc->exportField($this->No_Pol_3);
						$doc->exportField($this->Nomor_Container_1);
						$doc->exportField($this->Nomor_Container_2);
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