<?php
namespace PHPMaker2019\emkl_prj;

/**
 * Table class for t101_tagihan_trucking
 */
class t101_tagihan_trucking extends DbTable
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
	public $Nomor_Polisi_1;
	public $Nomor_Polisi_2;
	public $Nomor_Polisi_3;
	public $Tanggal;
	public $Shipper_id;
	public $Dari_Lokasi;
	public $Ke_Lokasi;
	public $Jenis_Container;
	public $Nomor_Container_1;
	public $Nomor_Container_2;
	public $Keterangan;
	public $Tagihan;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 't101_tagihan_trucking';
		$this->TableName = 't101_tagihan_trucking';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`t101_tagihan_trucking`";
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
		$this->id = new DbField('t101_tagihan_trucking', 't101_tagihan_trucking', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// Nomor_Polisi_1
		$this->Nomor_Polisi_1 = new DbField('t101_tagihan_trucking', 't101_tagihan_trucking', 'x_Nomor_Polisi_1', 'Nomor_Polisi_1', '`Nomor_Polisi_1`', '`Nomor_Polisi_1`', 200, -1, FALSE, '`Nomor_Polisi_1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Nomor_Polisi_1->Nullable = FALSE; // NOT NULL field
		$this->Nomor_Polisi_1->Required = TRUE; // Required field
		$this->Nomor_Polisi_1->Sortable = TRUE; // Allow sort
		$this->fields['Nomor_Polisi_1'] = &$this->Nomor_Polisi_1;

		// Nomor_Polisi_2
		$this->Nomor_Polisi_2 = new DbField('t101_tagihan_trucking', 't101_tagihan_trucking', 'x_Nomor_Polisi_2', 'Nomor_Polisi_2', '`Nomor_Polisi_2`', '`Nomor_Polisi_2`', 200, -1, FALSE, '`Nomor_Polisi_2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Nomor_Polisi_2->Nullable = FALSE; // NOT NULL field
		$this->Nomor_Polisi_2->Required = TRUE; // Required field
		$this->Nomor_Polisi_2->Sortable = TRUE; // Allow sort
		$this->fields['Nomor_Polisi_2'] = &$this->Nomor_Polisi_2;

		// Nomor_Polisi_3
		$this->Nomor_Polisi_3 = new DbField('t101_tagihan_trucking', 't101_tagihan_trucking', 'x_Nomor_Polisi_3', 'Nomor_Polisi_3', '`Nomor_Polisi_3`', '`Nomor_Polisi_3`', 200, -1, FALSE, '`Nomor_Polisi_3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Nomor_Polisi_3->Nullable = FALSE; // NOT NULL field
		$this->Nomor_Polisi_3->Required = TRUE; // Required field
		$this->Nomor_Polisi_3->Sortable = TRUE; // Allow sort
		$this->fields['Nomor_Polisi_3'] = &$this->Nomor_Polisi_3;

		// Tanggal
		$this->Tanggal = new DbField('t101_tagihan_trucking', 't101_tagihan_trucking', 'x_Tanggal', 'Tanggal', '`Tanggal`', CastDateFieldForLike('`Tanggal`', 7, "DB"), 133, 7, FALSE, '`Tanggal`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tanggal->Nullable = FALSE; // NOT NULL field
		$this->Tanggal->Required = TRUE; // Required field
		$this->Tanggal->Sortable = TRUE; // Allow sort
		$this->Tanggal->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['Tanggal'] = &$this->Tanggal;

		// Shipper_id
		$this->Shipper_id = new DbField('t101_tagihan_trucking', 't101_tagihan_trucking', 'x_Shipper_id', 'Shipper_id', '`Shipper_id`', '`Shipper_id`', 3, -1, FALSE, '`Shipper_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Shipper_id->Nullable = FALSE; // NOT NULL field
		$this->Shipper_id->Required = TRUE; // Required field
		$this->Shipper_id->Sortable = TRUE; // Allow sort
		$this->Shipper_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Shipper_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Shipper_id->Lookup = new Lookup('Shipper_id', 't001_shipper', FALSE, 'id', ["Nama","","",""], [], [], [], [], [], [], '', '');
		$this->Shipper_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Shipper_id'] = &$this->Shipper_id;

		// Dari_Lokasi
		$this->Dari_Lokasi = new DbField('t101_tagihan_trucking', 't101_tagihan_trucking', 'x_Dari_Lokasi', 'Dari_Lokasi', '`Dari_Lokasi`', '`Dari_Lokasi`', 200, -1, FALSE, '`Dari_Lokasi`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Dari_Lokasi->Nullable = FALSE; // NOT NULL field
		$this->Dari_Lokasi->Required = TRUE; // Required field
		$this->Dari_Lokasi->Sortable = TRUE; // Allow sort
		$this->fields['Dari_Lokasi'] = &$this->Dari_Lokasi;

		// Ke_Lokasi
		$this->Ke_Lokasi = new DbField('t101_tagihan_trucking', 't101_tagihan_trucking', 'x_Ke_Lokasi', 'Ke_Lokasi', '`Ke_Lokasi`', '`Ke_Lokasi`', 200, -1, FALSE, '`Ke_Lokasi`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Ke_Lokasi->Nullable = FALSE; // NOT NULL field
		$this->Ke_Lokasi->Required = TRUE; // Required field
		$this->Ke_Lokasi->Sortable = TRUE; // Allow sort
		$this->fields['Ke_Lokasi'] = &$this->Ke_Lokasi;

		// Jenis_Container
		$this->Jenis_Container = new DbField('t101_tagihan_trucking', 't101_tagihan_trucking', 'x_Jenis_Container', 'Jenis_Container', '`Jenis_Container`', '`Jenis_Container`', 202, -1, FALSE, '`Jenis_Container`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->Jenis_Container->Nullable = FALSE; // NOT NULL field
		$this->Jenis_Container->Sortable = TRUE; // Allow sort
		$this->Jenis_Container->Lookup = new Lookup('Jenis_Container', 't101_tagihan_trucking', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Jenis_Container->OptionCount = 2;
		$this->fields['Jenis_Container'] = &$this->Jenis_Container;

		// Nomor_Container_1
		$this->Nomor_Container_1 = new DbField('t101_tagihan_trucking', 't101_tagihan_trucking', 'x_Nomor_Container_1', 'Nomor_Container_1', '`Nomor_Container_1`', '`Nomor_Container_1`', 200, -1, FALSE, '`Nomor_Container_1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Nomor_Container_1->Nullable = FALSE; // NOT NULL field
		$this->Nomor_Container_1->Required = TRUE; // Required field
		$this->Nomor_Container_1->Sortable = TRUE; // Allow sort
		$this->fields['Nomor_Container_1'] = &$this->Nomor_Container_1;

		// Nomor_Container_2
		$this->Nomor_Container_2 = new DbField('t101_tagihan_trucking', 't101_tagihan_trucking', 'x_Nomor_Container_2', 'Nomor_Container_2', '`Nomor_Container_2`', '`Nomor_Container_2`', 200, -1, FALSE, '`Nomor_Container_2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Nomor_Container_2->Nullable = FALSE; // NOT NULL field
		$this->Nomor_Container_2->Required = TRUE; // Required field
		$this->Nomor_Container_2->Sortable = TRUE; // Allow sort
		$this->fields['Nomor_Container_2'] = &$this->Nomor_Container_2;

		// Keterangan
		$this->Keterangan = new DbField('t101_tagihan_trucking', 't101_tagihan_trucking', 'x_Keterangan', 'Keterangan', '`Keterangan`', '`Keterangan`', 201, -1, FALSE, '`Keterangan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Keterangan->Nullable = FALSE; // NOT NULL field
		$this->Keterangan->Required = TRUE; // Required field
		$this->Keterangan->Sortable = TRUE; // Allow sort
		$this->fields['Keterangan'] = &$this->Keterangan;

		// Tagihan
		$this->Tagihan = new DbField('t101_tagihan_trucking', 't101_tagihan_trucking', 'x_Tagihan', 'Tagihan', '`Tagihan`', '`Tagihan`', 4, -1, FALSE, '`Tagihan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tagihan->Nullable = FALSE; // NOT NULL field
		$this->Tagihan->Required = TRUE; // Required field
		$this->Tagihan->Sortable = TRUE; // Allow sort
		$this->Tagihan->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Tagihan'] = &$this->Tagihan;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`t101_tagihan_trucking`";
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
		$this->Nomor_Polisi_1->DbValue = $row['Nomor_Polisi_1'];
		$this->Nomor_Polisi_2->DbValue = $row['Nomor_Polisi_2'];
		$this->Nomor_Polisi_3->DbValue = $row['Nomor_Polisi_3'];
		$this->Tanggal->DbValue = $row['Tanggal'];
		$this->Shipper_id->DbValue = $row['Shipper_id'];
		$this->Dari_Lokasi->DbValue = $row['Dari_Lokasi'];
		$this->Ke_Lokasi->DbValue = $row['Ke_Lokasi'];
		$this->Jenis_Container->DbValue = $row['Jenis_Container'];
		$this->Nomor_Container_1->DbValue = $row['Nomor_Container_1'];
		$this->Nomor_Container_2->DbValue = $row['Nomor_Container_2'];
		$this->Keterangan->DbValue = $row['Keterangan'];
		$this->Tagihan->DbValue = $row['Tagihan'];
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
			return "t101_tagihan_truckinglist.php";
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
		if ($pageName == "t101_tagihan_truckingview.php")
			return $Language->phrase("View");
		elseif ($pageName == "t101_tagihan_truckingedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "t101_tagihan_truckingadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "t101_tagihan_truckinglist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("t101_tagihan_truckingview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("t101_tagihan_truckingview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "t101_tagihan_truckingadd.php?" . $this->getUrlParm($parm);
		else
			$url = "t101_tagihan_truckingadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("t101_tagihan_truckingedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("t101_tagihan_truckingadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("t101_tagihan_truckingdelete.php", $this->getUrlParm());
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
		$this->Nomor_Polisi_1->setDbValue($rs->fields('Nomor_Polisi_1'));
		$this->Nomor_Polisi_2->setDbValue($rs->fields('Nomor_Polisi_2'));
		$this->Nomor_Polisi_3->setDbValue($rs->fields('Nomor_Polisi_3'));
		$this->Tanggal->setDbValue($rs->fields('Tanggal'));
		$this->Shipper_id->setDbValue($rs->fields('Shipper_id'));
		$this->Dari_Lokasi->setDbValue($rs->fields('Dari_Lokasi'));
		$this->Ke_Lokasi->setDbValue($rs->fields('Ke_Lokasi'));
		$this->Jenis_Container->setDbValue($rs->fields('Jenis_Container'));
		$this->Nomor_Container_1->setDbValue($rs->fields('Nomor_Container_1'));
		$this->Nomor_Container_2->setDbValue($rs->fields('Nomor_Container_2'));
		$this->Keterangan->setDbValue($rs->fields('Keterangan'));
		$this->Tagihan->setDbValue($rs->fields('Tagihan'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
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
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

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

		// Tanggal
		$this->Tanggal->EditAttrs["class"] = "form-control";
		$this->Tanggal->EditCustomAttributes = "";
		$this->Tanggal->EditValue = FormatDateTime($this->Tanggal->CurrentValue, 7);
		$this->Tanggal->PlaceHolder = RemoveHtml($this->Tanggal->caption());

		// Shipper_id
		$this->Shipper_id->EditAttrs["class"] = "form-control";
		$this->Shipper_id->EditCustomAttributes = "";

		// Dari_Lokasi
		$this->Dari_Lokasi->EditAttrs["class"] = "form-control";
		$this->Dari_Lokasi->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Dari_Lokasi->CurrentValue = HtmlDecode($this->Dari_Lokasi->CurrentValue);
		$this->Dari_Lokasi->EditValue = $this->Dari_Lokasi->CurrentValue;
		$this->Dari_Lokasi->PlaceHolder = RemoveHtml($this->Dari_Lokasi->caption());

		// Ke_Lokasi
		$this->Ke_Lokasi->EditAttrs["class"] = "form-control";
		$this->Ke_Lokasi->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Ke_Lokasi->CurrentValue = HtmlDecode($this->Ke_Lokasi->CurrentValue);
		$this->Ke_Lokasi->EditValue = $this->Ke_Lokasi->CurrentValue;
		$this->Ke_Lokasi->PlaceHolder = RemoveHtml($this->Ke_Lokasi->caption());

		// Jenis_Container
		$this->Jenis_Container->EditCustomAttributes = "";
		$this->Jenis_Container->EditValue = $this->Jenis_Container->options(FALSE);

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

		// Keterangan
		$this->Keterangan->EditAttrs["class"] = "form-control";
		$this->Keterangan->EditCustomAttributes = "";
		$this->Keterangan->EditValue = $this->Keterangan->CurrentValue;
		$this->Keterangan->PlaceHolder = RemoveHtml($this->Keterangan->caption());

		// Tagihan
		$this->Tagihan->EditAttrs["class"] = "form-control";
		$this->Tagihan->EditCustomAttributes = "";
		$this->Tagihan->EditValue = $this->Tagihan->CurrentValue;
		$this->Tagihan->PlaceHolder = RemoveHtml($this->Tagihan->caption());
		if (strval($this->Tagihan->EditValue) <> "" && is_numeric($this->Tagihan->EditValue))
			$this->Tagihan->EditValue = FormatNumber($this->Tagihan->EditValue, -2, -2, -2, -2);

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
					$doc->exportCaption($this->Nomor_Polisi_1);
					$doc->exportCaption($this->Nomor_Polisi_2);
					$doc->exportCaption($this->Nomor_Polisi_3);
					$doc->exportCaption($this->Tanggal);
					$doc->exportCaption($this->Shipper_id);
					$doc->exportCaption($this->Dari_Lokasi);
					$doc->exportCaption($this->Ke_Lokasi);
					$doc->exportCaption($this->Jenis_Container);
					$doc->exportCaption($this->Nomor_Container_1);
					$doc->exportCaption($this->Nomor_Container_2);
					$doc->exportCaption($this->Keterangan);
					$doc->exportCaption($this->Tagihan);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->Nomor_Polisi_1);
					$doc->exportCaption($this->Nomor_Polisi_2);
					$doc->exportCaption($this->Nomor_Polisi_3);
					$doc->exportCaption($this->Tanggal);
					$doc->exportCaption($this->Shipper_id);
					$doc->exportCaption($this->Dari_Lokasi);
					$doc->exportCaption($this->Ke_Lokasi);
					$doc->exportCaption($this->Jenis_Container);
					$doc->exportCaption($this->Nomor_Container_1);
					$doc->exportCaption($this->Nomor_Container_2);
					$doc->exportCaption($this->Tagihan);
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
						$doc->exportField($this->Nomor_Polisi_1);
						$doc->exportField($this->Nomor_Polisi_2);
						$doc->exportField($this->Nomor_Polisi_3);
						$doc->exportField($this->Tanggal);
						$doc->exportField($this->Shipper_id);
						$doc->exportField($this->Dari_Lokasi);
						$doc->exportField($this->Ke_Lokasi);
						$doc->exportField($this->Jenis_Container);
						$doc->exportField($this->Nomor_Container_1);
						$doc->exportField($this->Nomor_Container_2);
						$doc->exportField($this->Keterangan);
						$doc->exportField($this->Tagihan);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->Nomor_Polisi_1);
						$doc->exportField($this->Nomor_Polisi_2);
						$doc->exportField($this->Nomor_Polisi_3);
						$doc->exportField($this->Tanggal);
						$doc->exportField($this->Shipper_id);
						$doc->exportField($this->Dari_Lokasi);
						$doc->exportField($this->Ke_Lokasi);
						$doc->exportField($this->Jenis_Container);
						$doc->exportField($this->Nomor_Container_1);
						$doc->exportField($this->Nomor_Container_2);
						$doc->exportField($this->Tagihan);
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