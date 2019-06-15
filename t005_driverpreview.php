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
$t005_driver_preview = new t005_driver_preview();

// Run the page
$t005_driver_preview->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t005_driver_preview->Page_Render();
?>
<?php $t005_driver_preview->showPageHeader(); ?>
<div class="card ew-grid t005_driver"><!-- .card -->
<?php if ($t005_driver_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$t005_driver_preview->renderListOptions();

// Render list options (header, left)
$t005_driver_preview->ListOptions->render("header", "left");
?>
<?php if ($t005_driver->id->Visible) { // id ?>
	<?php if ($t005_driver->SortUrl($t005_driver->id) == "") { ?>
		<th class="<?php echo $t005_driver->id->headerCellClass() ?>"><?php echo $t005_driver->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t005_driver->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t005_driver->id->Name ?>" data-sort-order="<?php echo $t005_driver_preview->SortField == $t005_driver->id->Name && $t005_driver_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t005_driver->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t005_driver_preview->SortField == $t005_driver->id->Name) { ?><?php if ($t005_driver_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t005_driver_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t005_driver->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
	<?php if ($t005_driver->SortUrl($t005_driver->TruckingVendor_id) == "") { ?>
		<th class="<?php echo $t005_driver->TruckingVendor_id->headerCellClass() ?>"><?php echo $t005_driver->TruckingVendor_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t005_driver->TruckingVendor_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t005_driver->TruckingVendor_id->Name ?>" data-sort-order="<?php echo $t005_driver_preview->SortField == $t005_driver->TruckingVendor_id->Name && $t005_driver_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t005_driver->TruckingVendor_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t005_driver_preview->SortField == $t005_driver->TruckingVendor_id->Name) { ?><?php if ($t005_driver_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t005_driver_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t005_driver->Nama->Visible) { // Nama ?>
	<?php if ($t005_driver->SortUrl($t005_driver->Nama) == "") { ?>
		<th class="<?php echo $t005_driver->Nama->headerCellClass() ?>"><?php echo $t005_driver->Nama->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t005_driver->Nama->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t005_driver->Nama->Name ?>" data-sort-order="<?php echo $t005_driver_preview->SortField == $t005_driver->Nama->Name && $t005_driver_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t005_driver->Nama->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t005_driver_preview->SortField == $t005_driver->Nama->Name) { ?><?php if ($t005_driver_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t005_driver_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t005_driver->No_HP_1->Visible) { // No_HP_1 ?>
	<?php if ($t005_driver->SortUrl($t005_driver->No_HP_1) == "") { ?>
		<th class="<?php echo $t005_driver->No_HP_1->headerCellClass() ?>"><?php echo $t005_driver->No_HP_1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t005_driver->No_HP_1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t005_driver->No_HP_1->Name ?>" data-sort-order="<?php echo $t005_driver_preview->SortField == $t005_driver->No_HP_1->Name && $t005_driver_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t005_driver->No_HP_1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t005_driver_preview->SortField == $t005_driver->No_HP_1->Name) { ?><?php if ($t005_driver_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t005_driver_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t005_driver->No_HP_2->Visible) { // No_HP_2 ?>
	<?php if ($t005_driver->SortUrl($t005_driver->No_HP_2) == "") { ?>
		<th class="<?php echo $t005_driver->No_HP_2->headerCellClass() ?>"><?php echo $t005_driver->No_HP_2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t005_driver->No_HP_2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t005_driver->No_HP_2->Name ?>" data-sort-order="<?php echo $t005_driver_preview->SortField == $t005_driver->No_HP_2->Name && $t005_driver_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t005_driver->No_HP_2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t005_driver_preview->SortField == $t005_driver->No_HP_2->Name) { ?><?php if ($t005_driver_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t005_driver_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t005_driver_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$t005_driver_preview->RecCount = 0;
$t005_driver_preview->RowCnt = 0;
while ($t005_driver_preview->Recordset && !$t005_driver_preview->Recordset->EOF) {

	// Init row class and style
	$t005_driver_preview->RecCount++;
	$t005_driver_preview->RowCnt++;
	$t005_driver_preview->CssStyle = "";
	$t005_driver_preview->loadListRowValues($t005_driver_preview->Recordset);

	// Render row
	$t005_driver_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$t005_driver_preview->resetAttributes();
	$t005_driver_preview->renderListRow();

	// Render list options
	$t005_driver_preview->renderListOptions();
?>
	<tr<?php echo $t005_driver_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t005_driver_preview->ListOptions->render("body", "left", $t005_driver_preview->RowCnt);
?>
<?php if ($t005_driver->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $t005_driver->id->cellAttributes() ?>>
<span<?php echo $t005_driver->id->viewAttributes() ?>>
<?php echo $t005_driver->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t005_driver->TruckingVendor_id->Visible) { // TruckingVendor_id ?>
		<!-- TruckingVendor_id -->
		<td<?php echo $t005_driver->TruckingVendor_id->cellAttributes() ?>>
<span<?php echo $t005_driver->TruckingVendor_id->viewAttributes() ?>>
<?php echo $t005_driver->TruckingVendor_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t005_driver->Nama->Visible) { // Nama ?>
		<!-- Nama -->
		<td<?php echo $t005_driver->Nama->cellAttributes() ?>>
<span<?php echo $t005_driver->Nama->viewAttributes() ?>>
<?php echo $t005_driver->Nama->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t005_driver->No_HP_1->Visible) { // No_HP_1 ?>
		<!-- No_HP_1 -->
		<td<?php echo $t005_driver->No_HP_1->cellAttributes() ?>>
<span<?php echo $t005_driver->No_HP_1->viewAttributes() ?>>
<?php echo $t005_driver->No_HP_1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t005_driver->No_HP_2->Visible) { // No_HP_2 ?>
		<!-- No_HP_2 -->
		<td<?php echo $t005_driver->No_HP_2->cellAttributes() ?>>
<span<?php echo $t005_driver->No_HP_2->viewAttributes() ?>>
<?php echo $t005_driver->No_HP_2->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$t005_driver_preview->ListOptions->render("body", "right", $t005_driver_preview->RowCnt);
?>
	</tr>
<?php
	$t005_driver_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($t005_driver_preview->TotalRecs > 0) { ?>
<?php if (!isset($t005_driver_preview->Pager)) $t005_driver_preview->Pager = new PrevNextPager($t005_driver_preview->StartRec, $t005_driver_preview->DisplayRecs, $t005_driver_preview->TotalRecs) ?>
<?php if ($t005_driver_preview->Pager->RecordCount > 0 && $t005_driver_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($t005_driver_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $t005_driver_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($t005_driver_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $t005_driver_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($t005_driver_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $t005_driver_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($t005_driver_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $t005_driver_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t005_driver_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t005_driver_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t005_driver_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($t005_driver_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$t005_driver_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($t005_driver_preview->Recordset)
	$t005_driver_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$t005_driver_preview->terminate();
?>