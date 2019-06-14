<?php
namespace PHPMaker2019\emkl_prj;
?>
<?php if ($t006_trucking_vendor->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_t006_trucking_vendormaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($t006_trucking_vendor->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $t006_trucking_vendor->TableLeftColumnClass ?>"><?php echo $t006_trucking_vendor->id->caption() ?></td>
			<td<?php echo $t006_trucking_vendor->id->cellAttributes() ?>>
<span id="el_t006_trucking_vendor_id">
<span<?php echo $t006_trucking_vendor->id->viewAttributes() ?>>
<?php echo $t006_trucking_vendor->id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t006_trucking_vendor->Nama->Visible) { // Nama ?>
		<tr id="r_Nama">
			<td class="<?php echo $t006_trucking_vendor->TableLeftColumnClass ?>"><?php echo $t006_trucking_vendor->Nama->caption() ?></td>
			<td<?php echo $t006_trucking_vendor->Nama->cellAttributes() ?>>
<span id="el_t006_trucking_vendor_Nama">
<span<?php echo $t006_trucking_vendor->Nama->viewAttributes() ?>>
<?php echo $t006_trucking_vendor->Nama->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>