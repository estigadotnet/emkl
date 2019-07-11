<?php
namespace PHPMaker2019\emkl_prj;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE, "utf-8");

// Create page object
$t101_jo_detail_preview = new t101_jo_detail_preview();

// Run the page
$t101_jo_detail_preview->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_jo_detail_preview->Page_Render();
?>
<?php $t101_jo_detail_preview->showPageHeader(); ?>
<div class="card ew-grid t101_jo_detail"><!-- .card -->
<?php if ($t101_jo_detail_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$t101_jo_detail_preview->renderListOptions();

// Render list options (header, left)
$t101_jo_detail_preview->ListOptions->render("header", "left");
?>
<?php if ($t101_jo_detail->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
	<?php if ($t101_jo_detail->SortUrl($t101_jo_detail->TruckingVendor_id) == "") { ?>
		<th class="<?php echo $t101_jo_detail->TruckingVendor_id->headerCellClass() ?>"><?php echo $t101_jo_detail->TruckingVendor_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t101_jo_detail->TruckingVendor_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t101_jo_detail->TruckingVendor_id->Name ?>" data-sort-order="<?php echo $t101_jo_detail_preview->SortField == $t101_jo_detail->TruckingVendor_id->Name && $t101_jo_detail_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t101_jo_detail->TruckingVendor_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t101_jo_detail_preview->SortField == $t101_jo_detail->TruckingVendor_id->Name) { ?><?php if ($t101_jo_detail_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t101_jo_detail_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Driver_id->Visible) { // Driver_id ?>
	<?php if ($t101_jo_detail->SortUrl($t101_jo_detail->Driver_id) == "") { ?>
		<th class="<?php echo $t101_jo_detail->Driver_id->headerCellClass() ?>"><?php echo $t101_jo_detail->Driver_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t101_jo_detail->Driver_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t101_jo_detail->Driver_id->Name ?>" data-sort-order="<?php echo $t101_jo_detail_preview->SortField == $t101_jo_detail->Driver_id->Name && $t101_jo_detail_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t101_jo_detail->Driver_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t101_jo_detail_preview->SortField == $t101_jo_detail->Driver_id->Name) { ?><?php if ($t101_jo_detail_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t101_jo_detail_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Tanggal_Stuffing->Visible) { // Tanggal_Stuffing ?>
	<?php if ($t101_jo_detail->SortUrl($t101_jo_detail->Tanggal_Stuffing) == "") { ?>
		<th class="<?php echo $t101_jo_detail->Tanggal_Stuffing->headerCellClass() ?>"><?php echo $t101_jo_detail->Tanggal_Stuffing->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t101_jo_detail->Tanggal_Stuffing->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t101_jo_detail->Tanggal_Stuffing->Name ?>" data-sort-order="<?php echo $t101_jo_detail_preview->SortField == $t101_jo_detail->Tanggal_Stuffing->Name && $t101_jo_detail_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t101_jo_detail->Tanggal_Stuffing->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t101_jo_detail_preview->SortField == $t101_jo_detail->Tanggal_Stuffing->Name) { ?><?php if ($t101_jo_detail_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t101_jo_detail_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_1->Visible) { // Nomor_Polisi_1 ?>
	<?php if ($t101_jo_detail->SortUrl($t101_jo_detail->Nomor_Polisi_1) == "") { ?>
		<th class="<?php echo $t101_jo_detail->Nomor_Polisi_1->headerCellClass() ?>"><?php echo $t101_jo_detail->Nomor_Polisi_1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t101_jo_detail->Nomor_Polisi_1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t101_jo_detail->Nomor_Polisi_1->Name ?>" data-sort-order="<?php echo $t101_jo_detail_preview->SortField == $t101_jo_detail->Nomor_Polisi_1->Name && $t101_jo_detail_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Polisi_1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t101_jo_detail_preview->SortField == $t101_jo_detail->Nomor_Polisi_1->Name) { ?><?php if ($t101_jo_detail_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t101_jo_detail_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_2->Visible) { // Nomor_Polisi_2 ?>
	<?php if ($t101_jo_detail->SortUrl($t101_jo_detail->Nomor_Polisi_2) == "") { ?>
		<th class="<?php echo $t101_jo_detail->Nomor_Polisi_2->headerCellClass() ?>"><?php echo $t101_jo_detail->Nomor_Polisi_2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t101_jo_detail->Nomor_Polisi_2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t101_jo_detail->Nomor_Polisi_2->Name ?>" data-sort-order="<?php echo $t101_jo_detail_preview->SortField == $t101_jo_detail->Nomor_Polisi_2->Name && $t101_jo_detail_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Polisi_2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t101_jo_detail_preview->SortField == $t101_jo_detail->Nomor_Polisi_2->Name) { ?><?php if ($t101_jo_detail_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t101_jo_detail_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_3->Visible) { // Nomor_Polisi_3 ?>
	<?php if ($t101_jo_detail->SortUrl($t101_jo_detail->Nomor_Polisi_3) == "") { ?>
		<th class="<?php echo $t101_jo_detail->Nomor_Polisi_3->headerCellClass() ?>"><?php echo $t101_jo_detail->Nomor_Polisi_3->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t101_jo_detail->Nomor_Polisi_3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t101_jo_detail->Nomor_Polisi_3->Name ?>" data-sort-order="<?php echo $t101_jo_detail_preview->SortField == $t101_jo_detail->Nomor_Polisi_3->Name && $t101_jo_detail_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Polisi_3->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t101_jo_detail_preview->SortField == $t101_jo_detail->Nomor_Polisi_3->Name) { ?><?php if ($t101_jo_detail_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t101_jo_detail_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
	<?php if ($t101_jo_detail->SortUrl($t101_jo_detail->Nomor_Container_1) == "") { ?>
		<th class="<?php echo $t101_jo_detail->Nomor_Container_1->headerCellClass() ?>"><?php echo $t101_jo_detail->Nomor_Container_1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t101_jo_detail->Nomor_Container_1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t101_jo_detail->Nomor_Container_1->Name ?>" data-sort-order="<?php echo $t101_jo_detail_preview->SortField == $t101_jo_detail->Nomor_Container_1->Name && $t101_jo_detail_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Container_1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t101_jo_detail_preview->SortField == $t101_jo_detail->Nomor_Container_1->Name) { ?><?php if ($t101_jo_detail_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t101_jo_detail_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
	<?php if ($t101_jo_detail->SortUrl($t101_jo_detail->Nomor_Container_2) == "") { ?>
		<th class="<?php echo $t101_jo_detail->Nomor_Container_2->headerCellClass() ?>"><?php echo $t101_jo_detail->Nomor_Container_2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t101_jo_detail->Nomor_Container_2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t101_jo_detail->Nomor_Container_2->Name ?>" data-sort-order="<?php echo $t101_jo_detail_preview->SortField == $t101_jo_detail->Nomor_Container_2->Name && $t101_jo_detail_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t101_jo_detail->Nomor_Container_2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t101_jo_detail_preview->SortField == $t101_jo_detail->Nomor_Container_2->Name) { ?><?php if ($t101_jo_detail_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t101_jo_detail_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Ref_JOHead_id->Visible) { // Ref_JOHead_id ?>
	<?php if ($t101_jo_detail->SortUrl($t101_jo_detail->Ref_JOHead_id) == "") { ?>
		<th class="<?php echo $t101_jo_detail->Ref_JOHead_id->headerCellClass() ?>"><?php echo $t101_jo_detail->Ref_JOHead_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t101_jo_detail->Ref_JOHead_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t101_jo_detail->Ref_JOHead_id->Name ?>" data-sort-order="<?php echo $t101_jo_detail_preview->SortField == $t101_jo_detail->Ref_JOHead_id->Name && $t101_jo_detail_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t101_jo_detail->Ref_JOHead_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t101_jo_detail_preview->SortField == $t101_jo_detail->Ref_JOHead_id->Name) { ?><?php if ($t101_jo_detail_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t101_jo_detail_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->No_Tagihan->Visible) { // No_Tagihan ?>
	<?php if ($t101_jo_detail->SortUrl($t101_jo_detail->No_Tagihan) == "") { ?>
		<th class="<?php echo $t101_jo_detail->No_Tagihan->headerCellClass() ?>"><?php echo $t101_jo_detail->No_Tagihan->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t101_jo_detail->No_Tagihan->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t101_jo_detail->No_Tagihan->Name ?>" data-sort-order="<?php echo $t101_jo_detail_preview->SortField == $t101_jo_detail->No_Tagihan->Name && $t101_jo_detail_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t101_jo_detail->No_Tagihan->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t101_jo_detail_preview->SortField == $t101_jo_detail->No_Tagihan->Name) { ?><?php if ($t101_jo_detail_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t101_jo_detail_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jo_detail->Jumlah_Tagihan->Visible) { // Jumlah_Tagihan ?>
	<?php if ($t101_jo_detail->SortUrl($t101_jo_detail->Jumlah_Tagihan) == "") { ?>
		<th class="<?php echo $t101_jo_detail->Jumlah_Tagihan->headerCellClass() ?>"><?php echo $t101_jo_detail->Jumlah_Tagihan->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t101_jo_detail->Jumlah_Tagihan->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t101_jo_detail->Jumlah_Tagihan->Name ?>" data-sort-order="<?php echo $t101_jo_detail_preview->SortField == $t101_jo_detail->Jumlah_Tagihan->Name && $t101_jo_detail_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t101_jo_detail->Jumlah_Tagihan->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t101_jo_detail_preview->SortField == $t101_jo_detail->Jumlah_Tagihan->Name) { ?><?php if ($t101_jo_detail_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t101_jo_detail_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t101_jo_detail_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$t101_jo_detail_preview->RecCount = 0;
$t101_jo_detail_preview->RowCnt = 0;
while ($t101_jo_detail_preview->Recordset && !$t101_jo_detail_preview->Recordset->EOF) {

	// Init row class and style
	$t101_jo_detail_preview->RecCount++;
	$t101_jo_detail_preview->RowCnt++;
	$t101_jo_detail_preview->CssStyle = "";
	$t101_jo_detail_preview->loadListRowValues($t101_jo_detail_preview->Recordset);

	// Render row
	$t101_jo_detail_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$t101_jo_detail_preview->resetAttributes();
	$t101_jo_detail_preview->renderListRow();

	// Render list options
	$t101_jo_detail_preview->renderListOptions();
?>
	<tr<?php echo $t101_jo_detail_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t101_jo_detail_preview->ListOptions->render("body", "left", $t101_jo_detail_preview->RowCnt);
?>
<?php if ($t101_jo_detail->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
		<!-- TruckingVendor_id -->
		<td<?php echo $t101_jo_detail->TruckingVendor_id->cellAttributes() ?>>
<span<?php echo $t101_jo_detail->TruckingVendor_id->viewAttributes() ?>>
<?php echo $t101_jo_detail->TruckingVendor_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t101_jo_detail->Driver_id->Visible) { // Driver_id ?>
		<!-- Driver_id -->
		<td<?php echo $t101_jo_detail->Driver_id->cellAttributes() ?>>
<span<?php echo $t101_jo_detail->Driver_id->viewAttributes() ?>>
<?php echo $t101_jo_detail->Driver_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t101_jo_detail->Tanggal_Stuffing->Visible) { // Tanggal_Stuffing ?>
		<!-- Tanggal_Stuffing -->
		<td<?php echo $t101_jo_detail->Tanggal_Stuffing->cellAttributes() ?>>
<span<?php echo $t101_jo_detail->Tanggal_Stuffing->viewAttributes() ?>>
<?php echo $t101_jo_detail->Tanggal_Stuffing->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_1->Visible) { // Nomor_Polisi_1 ?>
		<!-- Nomor_Polisi_1 -->
		<td<?php echo $t101_jo_detail->Nomor_Polisi_1->cellAttributes() ?>>
<span<?php echo $t101_jo_detail->Nomor_Polisi_1->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Polisi_1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_2->Visible) { // Nomor_Polisi_2 ?>
		<!-- Nomor_Polisi_2 -->
		<td<?php echo $t101_jo_detail->Nomor_Polisi_2->cellAttributes() ?>>
<span<?php echo $t101_jo_detail->Nomor_Polisi_2->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Polisi_2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Polisi_3->Visible) { // Nomor_Polisi_3 ?>
		<!-- Nomor_Polisi_3 -->
		<td<?php echo $t101_jo_detail->Nomor_Polisi_3->cellAttributes() ?>>
<span<?php echo $t101_jo_detail->Nomor_Polisi_3->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Polisi_3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Container_1->Visible) { // Nomor_Container_1 ?>
		<!-- Nomor_Container_1 -->
		<td<?php echo $t101_jo_detail->Nomor_Container_1->cellAttributes() ?>>
<span<?php echo $t101_jo_detail->Nomor_Container_1->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Container_1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t101_jo_detail->Nomor_Container_2->Visible) { // Nomor_Container_2 ?>
		<!-- Nomor_Container_2 -->
		<td<?php echo $t101_jo_detail->Nomor_Container_2->cellAttributes() ?>>
<span<?php echo $t101_jo_detail->Nomor_Container_2->viewAttributes() ?>>
<?php echo $t101_jo_detail->Nomor_Container_2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t101_jo_detail->Ref_JOHead_id->Visible) { // Ref_JOHead_id ?>
		<!-- Ref_JOHead_id -->
		<td<?php echo $t101_jo_detail->Ref_JOHead_id->cellAttributes() ?>>
<span<?php echo $t101_jo_detail->Ref_JOHead_id->viewAttributes() ?>>
<?php echo $t101_jo_detail->Ref_JOHead_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t101_jo_detail->No_Tagihan->Visible) { // No_Tagihan ?>
		<!-- No_Tagihan -->
		<td<?php echo $t101_jo_detail->No_Tagihan->cellAttributes() ?>>
<span<?php echo $t101_jo_detail->No_Tagihan->viewAttributes() ?>>
<?php echo $t101_jo_detail->No_Tagihan->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t101_jo_detail->Jumlah_Tagihan->Visible) { // Jumlah_Tagihan ?>
		<!-- Jumlah_Tagihan -->
		<td<?php echo $t101_jo_detail->Jumlah_Tagihan->cellAttributes() ?>>
<span<?php echo $t101_jo_detail->Jumlah_Tagihan->viewAttributes() ?>>
<?php echo $t101_jo_detail->Jumlah_Tagihan->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$t101_jo_detail_preview->ListOptions->render("body", "right", $t101_jo_detail_preview->RowCnt);
?>
	</tr>
<?php
	$t101_jo_detail_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($t101_jo_detail_preview->TotalRecs > 0) { ?>
<?php if (!isset($t101_jo_detail_preview->Pager)) $t101_jo_detail_preview->Pager = new PrevNextPager($t101_jo_detail_preview->StartRec, $t101_jo_detail_preview->DisplayRecs, $t101_jo_detail_preview->TotalRecs) ?>
<?php if ($t101_jo_detail_preview->Pager->RecordCount > 0 && $t101_jo_detail_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($t101_jo_detail_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $t101_jo_detail_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($t101_jo_detail_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $t101_jo_detail_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($t101_jo_detail_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $t101_jo_detail_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($t101_jo_detail_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $t101_jo_detail_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t101_jo_detail_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t101_jo_detail_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t101_jo_detail_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($t101_jo_detail_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$t101_jo_detail_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($t101_jo_detail_preview->Recordset)
	$t101_jo_detail_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$t101_jo_detail_preview->terminate();
?>