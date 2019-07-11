<?php
namespace PHPMaker2019\emkl_prj;

/**
 * Table class for v101_jo_head_detail
 */
class v101_jo_head_detail extends DbTable
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
	public $export_import;
	public $no_bl;
	public $nomor_jo;
	public $shipper_id;
	public $party;
	public $container;
	public $tanggal_stuffing;
	public $destination_id;
	public $feeder_id;
	public $truckingvendor_id;
	public $driver_id;
	public $nomor_polisi_1;
	public $nomor_polisi_2;
	public $nomor_polisi_3;
	public $nomor_container_1;
	public $nomor_container_2;
	public $ref_johead_id;
	public $no_tagihan;
	public $jumlah_tagihan;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'v101_jo_head_detail';
		$this->TableName = 'v101_jo_head_detail';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`v101_jo_head_detail`";
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
		$this->GridAddRowCount = 1;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id
		$this->id = new DbField('v101_jo_head_detail', 'v101_jo_head_detail', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// export_import
		$this->export_import = new DbField('v101_jo_head_detail', 'v101_jo_head_detail', 'x_export_import', 'export_import', '`export_import`', '`export_import`', 202, -1, FALSE, '`export_import`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->export_import->Sortable = TRUE; // Allow sort
		$this->export_import->Lookup = new Lookup('export_import', 'v101_jo_head_detail', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->export_import->OptionCount = 2;
		$this->fields['export_import'] = &$this->export_import;

		// no_bl
		$this->no_bl = new DbField('v101_jo_head_detail', 'v101_jo_head_detail', 'x_no_bl', 'no_bl', '`no_bl`', '`no_bl`', 200, -1, FALSE, '`no_bl`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->no_bl->Sortable = TRUE; // Allow sort
		$this->fields['no_bl'] = &$this->no_bl;

		// nomor_jo
		$this->nomor_jo = new DbField('v101_jo_head_detail', 'v101_jo_head_detail', 'x_nomor_jo', 'nomor_jo', '`nomor_jo`', '`nomor_jo`', 200, -1, FALSE, '`nomor_jo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nomor_jo->Sortable = TRUE; // Allow sort
		$this->fields['nomor_jo'] = &$this->nomor_jo;

		// shipper_id
		$this->shipper_id = new DbField('v101_jo_head_detail', 'v101_jo_head_detail', 'x_shipper_id', 'shipper_id', '`shipper_id`', '`shipper_id`', 3, -1, FALSE, '`shipper_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->shipper_id->Sortable = TRUE; // Allow sort
		$this->shipper_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->shipper_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->shipper_id->Lookup = new Lookup('shipper_id', 't001_shipper', FALSE, 'id', ["Nama","","",""], [], [], [], [], [], [], '', '');
		$this->shipper_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['shipper_id'] = &$this->shipper_id;

		// party
		$this->party = new DbField('v101_jo_head_detail', 'v101_jo_head_detail', 'x_party', 'party', '`party`', '`party`', 3, -1, FALSE, '`party`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->party->Sortable = TRUE; // Allow sort
		$this->party->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['party'] = &$this->party;

		// container
		$this->container = new DbField('v101_jo_head_detail', 'v101_jo_head_detail', 'x_container', 'container', '`container`', '`container`', 202, -1, FALSE, '`container`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->container->Sortable = TRUE; // Allow sort
		$this->container->Lookup = new Lookup('container', 'v101_jo_head_detail', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->container->OptionCount = 2;
		$this->fields['container'] = &$this->container;

		// tanggal_stuffing
		$this->tanggal_stuffing = new DbField('v101_jo_head_detail', 'v101_jo_head_detail', 'x_tanggal_stuffing', 'tanggal_stuffing', '`tanggal_stuffing`', CastDateFieldForLike('`tanggal_stuffing`', 7, "DB"), 133, 7, FALSE, '`tanggal_stuffing`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tanggal_stuffing->Sortable = TRUE; // Allow sort
		$this->tanggal_stuffing->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['tanggal_stuffing'] = &$this->tanggal_stuffing;

		// destination_id
		$this->destination_id = new DbField('v101_jo_head_detail', 'v101_jo_head_detail', 'x_destination_id', 'destination_id', '`destination_id`', '`destination_id`', 3, -1, FALSE, '`destination_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->destination_id->Sortable = TRUE; // Allow sort
		$this->destination_id->Lookup = new Lookup('destination_id', 't002_destination', FALSE, 'id', ["Nama","","",""], [], [], [], [], [], [], '', '');
		$this->destination_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['destination_id'] = &$this->destination_id;

		// feeder_id
		$this->feeder_id = new DbField('v101_jo_head_detail', 'v101_jo_head_detail', 'x_feeder_id', 'feeder_id', '`feeder_id`', '`feeder_id`', 3, -1, FALSE, '`feeder_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->feeder_id->Sortable = TRUE; // Allow sort
		$this->feeder_id->Lookup = new Lookup('feeder_id', 't003_feeder', FALSE, 'id', ["Nama","","",""], [], [], [], [], [], [], '', '');
		$this->feeder_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['feeder_id'] = &$this->feeder_id;

		// truckingvendor_id
		$this->truckingvendor_id = new DbField('v101_jo_head_detail', 'v101_jo_head_detail', 'x_truckingvendor_id', 'truckingvendor_id', '`truckingvendor_id`', '`truckingvendor_id`', 3, -1, FALSE, '`truckingvendor_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->truckingvendor_id->Nullable = FALSE; // NOT NULL field
		$this->truckingvendor_id->Required = TRUE; // Required field
		$this->truckingvendor_id->Sortable = TRUE; // Allow sort
		$this->truckingvendor_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->truckingvendor_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->truckingvendor_id->Lookup = new Lookup('truckingvendor_id', 't006_trucking_vendor', FALSE, 'id', ["Nama","","",""], [], ["x_driver_id"], [], [], [], [], '`Nama` ASC', '');
		$this->truckingvendor_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['truckingvendor_id'] = &$this->truckingvendor_id;

		// driver_id
		$this->driver_id = new DbField('v101_jo_head_detail', 'v101_jo_head_detail', 'x_driver_id', 'driver_id', '`driver_id`', '`driver_id`', 3, -1, FALSE, '`driver_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->driver_id->Nullable = FALSE; // NOT NULL field
		$this->driver_id->Required = TRUE; // Required field
		$this->driver_id->Sortable = TRUE; // Allow sort
		$this->driver_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->driver_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->driver_id->Lookup = new Lookup('driver_id', 't005_driver', FALSE, 'id', ["Nama","","",""], ["x_truckingvendor_id"], [], ["TruckingVendor_id"], ["x_TruckingVendor_id"], [], [], '`Nama` ASC', '');
		$this->driver_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['driver_id'] = &$this->driver_id;

		// nomor_polisi_1
		$this->nomor_polisi_1 = new DbField('v101_jo_head_detail', 'v101_jo_head_detail', 'x_nomor_polisi_1', 'nomor_polisi_1', '`nomor_polisi_1`', '`nomor_polisi_1`', 200, -1, FALSE, '`nomor_polisi_1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nomor_polisi_1->Nullable = FALSE; // NOT NULL field
		$this->nomor_polisi_1->Required = TRUE; // Required field
		$this->nomor_polisi_1->Sortable = TRUE; // Allow sort
		$this->fields['nomor_polisi_1'] = &$this->nomor_polisi_1;

		// nomor_polisi_2
		$this->nomor_polisi_2 = new DbField('v101_jo_head_detail', 'v101_jo_head_detail', 'x_nomor_polisi_2', 'nomor_polisi_2', '`nomor_polisi_2`', '`nomor_polisi_2`', 200, -1, FALSE, '`nomor_polisi_2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nomor_polisi_2->Nullable = FALSE; // NOT NULL field
		$this->nomor_polisi_2->Required = TRUE; // Required field
		$this->nomor_polisi_2->Sortable = TRUE; // Allow sort
		$this->fields['nomor_polisi_2'] = &$this->nomor_polisi_2;

		// nomor_polisi_3
		$this->nomor_polisi_3 = new DbField('v101_jo_head_detail', 'v101_jo_head_detail', 'x_nomor_polisi_3', 'nomor_polisi_3', '`nomor_polisi_3`', '`nomor_polisi_3`', 200, -1, FALSE, '`nomor_polisi_3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nomor_polisi_3->Nullable = FALSE; // NOT NULL field
		$this->nomor_polisi_3->Required = TRUE; // Required field
		$this->nomor_polisi_3->Sortable = TRUE; // Allow sort
		$this->fields['nomor_polisi_3'] = &$this->nomor_polisi_3;

		// nomor_container_1
		$this->nomor_container_1 = new DbField('v101_jo_head_detail', 'v101_jo_head_detail', 'x_nomor_container_1', 'nomor_container_1', '`nomor_container_1`', '`nomor_container_1`', 200, -1, FALSE, '`nomor_container_1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nomor_container_1->Nullable = FALSE; // NOT NULL field
		$this->nomor_container_1->Required = TRUE; // Required field
		$this->nomor_container_1->Sortable = TRUE; // Allow sort
		$this->fields['nomor_container_1'] = &$this->nomor_container_1;

		// nomor_container_2
		$this->nomor_container_2 = new DbField('v101_jo_head_detail', 'v101_jo_head_detail', 'x_nomor_container_2', 'nomor_container_2', '`nomor_container_2`', '`nomor_container_2`', 200, -1, FALSE, '`nomor_container_2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nomor_container_2->Nullable = FALSE; // NOT NULL field
		$this->nomor_container_2->Required = TRUE; // Required field
		$this->nomor_container_2->Sortable = TRUE; // Allow sort
		$this->fields['nomor_container_2'] = &$this->nomor_container_2;

		// ref_johead_id
		$this->ref_johead_id = new DbField('v101_jo_head_detail', 'v101_jo_head_detail', 'x_ref_johead_id', 'ref_johead_id', '`ref_johead_id`', '`ref_johead_id`', 3, -1, FALSE, '`ref_johead_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->ref_johead_id->Sortable = TRUE; // Allow sort
		$this->ref_johead_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ref_johead_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->ref_johead_id->Lookup = new Lookup('ref_johead_id', 't101_jo_head', FALSE, 'id', ["Nomor_JO","","",""], [], [], [], [], [], [], '', '');
		$this->ref_johead_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['ref_johead_id'] = &$this->ref_johead_id;

		// no_tagihan
		$this->no_tagihan = new DbField('v101_jo_head_detail', 'v101_jo_head_detail', 'x_no_tagihan', 'no_tagihan', '`no_tagihan`', '`no_tagihan`', 16, -1, FALSE, '`no_tagihan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->no_tagihan->Nullable = FALSE; // NOT NULL field
		$this->no_tagihan->Sortable = TRUE; // Allow sort
		$this->no_tagihan->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['no_tagihan'] = &$this->no_tagihan;

		// jumlah_tagihan
		$this->jumlah_tagihan = new DbField('v101_jo_head_detail', 'v101_jo_head_detail', 'x_jumlah_tagihan', 'jumlah_tagihan', '`jumlah_tagihan`', '`jumlah_tagihan`', 4, -1, FALSE, '`jumlah_tagihan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->jumlah_tagihan->Nullable = FALSE; // NOT NULL field
		$this->jumlah_tagihan->Sortable = TRUE; // Allow sort
		$this->jumlah_tagihan->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['jumlah_tagihan'] = &$this->jumlah_tagihan;
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

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`v101_jo_head_detail`";
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
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "`shipper_id` ASC,`no_tagihan` ASC";
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
		$this->export_import->DbValue = $row['export_import'];
		$this->no_bl->DbValue = $row['no_bl'];
		$this->nomor_jo->DbValue = $row['nomor_jo'];
		$this->shipper_id->DbValue = $row['shipper_id'];
		$this->party->DbValue = $row['party'];
		$this->container->DbValue = $row['container'];
		$this->tanggal_stuffing->DbValue = $row['tanggal_stuffing'];
		$this->destination_id->DbValue = $row['destination_id'];
		$this->feeder_id->DbValue = $row['feeder_id'];
		$this->truckingvendor_id->DbValue = $row['truckingvendor_id'];
		$this->driver_id->DbValue = $row['driver_id'];
		$this->nomor_polisi_1->DbValue = $row['nomor_polisi_1'];
		$this->nomor_polisi_2->DbValue = $row['nomor_polisi_2'];
		$this->nomor_polisi_3->DbValue = $row['nomor_polisi_3'];
		$this->nomor_container_1->DbValue = $row['nomor_container_1'];
		$this->nomor_container_2->DbValue = $row['nomor_container_2'];
		$this->ref_johead_id->DbValue = $row['ref_johead_id'];
		$this->no_tagihan->DbValue = $row['no_tagihan'];
		$this->jumlah_tagihan->DbValue = $row['jumlah_tagihan'];
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
			return "v101_jo_head_detaillist.php";
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
		if ($pageName == "v101_jo_head_detailview.php")
			return $Language->phrase("View");
		elseif ($pageName == "v101_jo_head_detailedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "v101_jo_head_detailadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "v101_jo_head_detaillist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("v101_jo_head_detailview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("v101_jo_head_detailview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "v101_jo_head_detailadd.php?" . $this->getUrlParm($parm);
		else
			$url = "v101_jo_head_detailadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("v101_jo_head_detailedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("v101_jo_head_detailadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("v101_jo_head_detaildelete.php", $this->getUrlParm());
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
		$this->export_import->setDbValue($rs->fields('export_import'));
		$this->no_bl->setDbValue($rs->fields('no_bl'));
		$this->nomor_jo->setDbValue($rs->fields('nomor_jo'));
		$this->shipper_id->setDbValue($rs->fields('shipper_id'));
		$this->party->setDbValue($rs->fields('party'));
		$this->container->setDbValue($rs->fields('container'));
		$this->tanggal_stuffing->setDbValue($rs->fields('tanggal_stuffing'));
		$this->destination_id->setDbValue($rs->fields('destination_id'));
		$this->feeder_id->setDbValue($rs->fields('feeder_id'));
		$this->truckingvendor_id->setDbValue($rs->fields('truckingvendor_id'));
		$this->driver_id->setDbValue($rs->fields('driver_id'));
		$this->nomor_polisi_1->setDbValue($rs->fields('nomor_polisi_1'));
		$this->nomor_polisi_2->setDbValue($rs->fields('nomor_polisi_2'));
		$this->nomor_polisi_3->setDbValue($rs->fields('nomor_polisi_3'));
		$this->nomor_container_1->setDbValue($rs->fields('nomor_container_1'));
		$this->nomor_container_2->setDbValue($rs->fields('nomor_container_2'));
		$this->ref_johead_id->setDbValue($rs->fields('ref_johead_id'));
		$this->no_tagihan->setDbValue($rs->fields('no_tagihan'));
		$this->jumlah_tagihan->setDbValue($rs->fields('jumlah_tagihan'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
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

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

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

		// driver_id
		$this->driver_id->EditAttrs["class"] = "form-control";
		$this->driver_id->EditCustomAttributes = "";

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

		// no_tagihan
		$this->no_tagihan->EditAttrs["class"] = "form-control";
		$this->no_tagihan->EditCustomAttributes = "";
		$this->no_tagihan->EditValue = $this->no_tagihan->CurrentValue;
		$this->no_tagihan->PlaceHolder = RemoveHtml($this->no_tagihan->caption());

		// jumlah_tagihan
		$this->jumlah_tagihan->EditAttrs["class"] = "form-control";
		$this->jumlah_tagihan->EditCustomAttributes = "";
		$this->jumlah_tagihan->EditValue = $this->jumlah_tagihan->CurrentValue;
		$this->jumlah_tagihan->PlaceHolder = RemoveHtml($this->jumlah_tagihan->caption());
		if (strval($this->jumlah_tagihan->EditValue) <> "" && is_numeric($this->jumlah_tagihan->EditValue))
			$this->jumlah_tagihan->EditValue = FormatNumber($this->jumlah_tagihan->EditValue, -2, -2, -2, -2);

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
					$doc->exportCaption($this->export_import);
					$doc->exportCaption($this->no_bl);
					$doc->exportCaption($this->nomor_jo);
					$doc->exportCaption($this->shipper_id);
					$doc->exportCaption($this->party);
					$doc->exportCaption($this->container);
					$doc->exportCaption($this->tanggal_stuffing);
					$doc->exportCaption($this->destination_id);
					$doc->exportCaption($this->feeder_id);
					$doc->exportCaption($this->truckingvendor_id);
					$doc->exportCaption($this->driver_id);
					$doc->exportCaption($this->nomor_polisi_1);
					$doc->exportCaption($this->nomor_polisi_2);
					$doc->exportCaption($this->nomor_polisi_3);
					$doc->exportCaption($this->nomor_container_1);
					$doc->exportCaption($this->nomor_container_2);
					$doc->exportCaption($this->ref_johead_id);
					$doc->exportCaption($this->no_tagihan);
					$doc->exportCaption($this->jumlah_tagihan);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->export_import);
					$doc->exportCaption($this->no_bl);
					$doc->exportCaption($this->nomor_jo);
					$doc->exportCaption($this->shipper_id);
					$doc->exportCaption($this->party);
					$doc->exportCaption($this->container);
					$doc->exportCaption($this->tanggal_stuffing);
					$doc->exportCaption($this->destination_id);
					$doc->exportCaption($this->feeder_id);
					$doc->exportCaption($this->truckingvendor_id);
					$doc->exportCaption($this->driver_id);
					$doc->exportCaption($this->nomor_polisi_1);
					$doc->exportCaption($this->nomor_polisi_2);
					$doc->exportCaption($this->nomor_polisi_3);
					$doc->exportCaption($this->nomor_container_1);
					$doc->exportCaption($this->nomor_container_2);
					$doc->exportCaption($this->ref_johead_id);
					$doc->exportCaption($this->no_tagihan);
					$doc->exportCaption($this->jumlah_tagihan);
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
						$doc->exportField($this->export_import);
						$doc->exportField($this->no_bl);
						$doc->exportField($this->nomor_jo);
						$doc->exportField($this->shipper_id);
						$doc->exportField($this->party);
						$doc->exportField($this->container);
						$doc->exportField($this->tanggal_stuffing);
						$doc->exportField($this->destination_id);
						$doc->exportField($this->feeder_id);
						$doc->exportField($this->truckingvendor_id);
						$doc->exportField($this->driver_id);
						$doc->exportField($this->nomor_polisi_1);
						$doc->exportField($this->nomor_polisi_2);
						$doc->exportField($this->nomor_polisi_3);
						$doc->exportField($this->nomor_container_1);
						$doc->exportField($this->nomor_container_2);
						$doc->exportField($this->ref_johead_id);
						$doc->exportField($this->no_tagihan);
						$doc->exportField($this->jumlah_tagihan);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->export_import);
						$doc->exportField($this->no_bl);
						$doc->exportField($this->nomor_jo);
						$doc->exportField($this->shipper_id);
						$doc->exportField($this->party);
						$doc->exportField($this->container);
						$doc->exportField($this->tanggal_stuffing);
						$doc->exportField($this->destination_id);
						$doc->exportField($this->feeder_id);
						$doc->exportField($this->truckingvendor_id);
						$doc->exportField($this->driver_id);
						$doc->exportField($this->nomor_polisi_1);
						$doc->exportField($this->nomor_polisi_2);
						$doc->exportField($this->nomor_polisi_3);
						$doc->exportField($this->nomor_container_1);
						$doc->exportField($this->nomor_container_2);
						$doc->exportField($this->ref_johead_id);
						$doc->exportField($this->no_tagihan);
						$doc->exportField($this->jumlah_tagihan);
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
		$table = 'v101_jo_head_detail';
		$usr = CurrentUserName();
		WriteAuditTrail("log", DbCurrentDateTime(), ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (add page)
	public function writeAuditTrailOnAdd(&$rs)
	{
		global $Language;
		if (!$this->AuditTrailOnAdd)
			return;
		$table = 'v101_jo_head_detail';

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
		$table = 'v101_jo_head_detail';

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
		$table = 'v101_jo_head_detail';

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

		$this->UpdateTable = "t101_jo_detail";
		unset($rsnew["export_import"]);
		unset($rsnew["nomor_jo"]);
		unset($rsnew["shipper_id"]);
		unset($rsnew["party"]);
		unset($rsnew["container"]);
		unset($rsnew["tanggal_stuffing"]);
		unset($rsnew["destination_id"]);
		unset($rsnew["feeder_id"]);

		//unset($rsnew["truckingvendor_id"]);
		//unset($rsnew["driver_id"]);

		unset($rsnew["nomor_polisi_1"]);
		unset($rsnew["nomor_polisi_2"]);
		unset($rsnew["nomor_polisi_3"]);
		unset($rsnew["no_bl"]);
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