<?php
namespace PHPMaker2019\emkl_prj;
?>
<?php if ($t101_jo_head->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_t101_jo_headmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($t101_jo_head->Export_Import->Visible) { // Export_Import ?>
		<tr id="r_Export_Import">
			<td class="<?php echo $t101_jo_head->TableLeftColumnClass ?>"><?php echo $t101_jo_head->Export_Import->caption() ?></td>
			<td<?php echo $t101_jo_head->Export_Import->cellAttributes() ?>>
<span id="el_t101_jo_head_Export_Import">
<span<?php echo $t101_jo_head->Export_Import->viewAttributes() ?>>
<?php echo $t101_jo_head->Export_Import->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t101_jo_head->No_BL->Visible) { // No_BL ?>
		<tr id="r_No_BL">
			<td class="<?php echo $t101_jo_head->TableLeftColumnClass ?>"><?php echo $t101_jo_head->No_BL->caption() ?></td>
			<td<?php echo $t101_jo_head->No_BL->cellAttributes() ?>>
<span id="el_t101_jo_head_No_BL">
<span<?php echo $t101_jo_head->No_BL->viewAttributes() ?>>
<?php echo $t101_jo_head->No_BL->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t101_jo_head->Nomor_JO->Visible) { // Nomor_JO ?>
		<tr id="r_Nomor_JO">
			<td class="<?php echo $t101_jo_head->TableLeftColumnClass ?>"><?php echo $t101_jo_head->Nomor_JO->caption() ?></td>
			<td<?php echo $t101_jo_head->Nomor_JO->cellAttributes() ?>>
<span id="el_t101_jo_head_Nomor_JO">
<span<?php echo $t101_jo_head->Nomor_JO->viewAttributes() ?>>
<?php echo $t101_jo_head->Nomor_JO->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t101_jo_head->Shipper_id->Visible) { // Shipper_id ?>
		<tr id="r_Shipper_id">
			<td class="<?php echo $t101_jo_head->TableLeftColumnClass ?>"><?php echo $t101_jo_head->Shipper_id->caption() ?></td>
			<td<?php echo $t101_jo_head->Shipper_id->cellAttributes() ?>>
<span id="el_t101_jo_head_Shipper_id">
<span<?php echo $t101_jo_head->Shipper_id->viewAttributes() ?>>
<?php echo $t101_jo_head->Shipper_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t101_jo_head->Party->Visible) { // Party ?>
		<tr id="r_Party">
			<td class="<?php echo $t101_jo_head->TableLeftColumnClass ?>"><?php echo $t101_jo_head->Party->caption() ?></td>
			<td<?php echo $t101_jo_head->Party->cellAttributes() ?>>
<span id="el_t101_jo_head_Party">
<span<?php echo $t101_jo_head->Party->viewAttributes() ?>>
<?php echo $t101_jo_head->Party->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t101_jo_head->Container->Visible) { // Container ?>
		<tr id="r_Container">
			<td class="<?php echo $t101_jo_head->TableLeftColumnClass ?>"><?php echo $t101_jo_head->Container->caption() ?></td>
			<td<?php echo $t101_jo_head->Container->cellAttributes() ?>>
<span id="el_t101_jo_head_Container">
<span<?php echo $t101_jo_head->Container->viewAttributes() ?>>
<?php echo $t101_jo_head->Container->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t101_jo_head->Destination_id->Visible) { // Destination_id ?>
		<tr id="r_Destination_id">
			<td class="<?php echo $t101_jo_head->TableLeftColumnClass ?>"><?php echo $t101_jo_head->Destination_id->caption() ?></td>
			<td<?php echo $t101_jo_head->Destination_id->cellAttributes() ?>>
<span id="el_t101_jo_head_Destination_id">
<span<?php echo $t101_jo_head->Destination_id->viewAttributes() ?>>
<?php echo $t101_jo_head->Destination_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t101_jo_head->Feeder_id->Visible) { // Feeder_id ?>
		<tr id="r_Feeder_id">
			<td class="<?php echo $t101_jo_head->TableLeftColumnClass ?>"><?php echo $t101_jo_head->Feeder_id->caption() ?></td>
			<td<?php echo $t101_jo_head->Feeder_id->cellAttributes() ?>>
<span id="el_t101_jo_head_Feeder_id">
<span<?php echo $t101_jo_head->Feeder_id->viewAttributes() ?>>
<?php echo $t101_jo_head->Feeder_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>