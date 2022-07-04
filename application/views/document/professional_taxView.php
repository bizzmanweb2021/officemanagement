<div class="row">
	<div class="col-md-1">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#professionalTaxModal" style="background-color: #023e8a; color:#fff">Add Professional Tax</button>
	</div>
</div>

<!-- trade licence Table -->
<div class="site-table professionalTaxTable" style="overflow: auto; height: 200px;">
	<table class="table table-bordered table-striped" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
		<thead style="background-color:#023047; color: #fff;position: sticky;top: 0;">
		<tr>
			<th>Company Name </th>
			<th>PT Challan</th>
			<th>PT Date</th>
			<th>PT Amount</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach($all_professional_tax as $professional_taxRow): ?>
			<tr style="background-color: #fff; color: #000">
				<td><?= $professional_taxRow['company_name']?></td>
				<td><a href="<?= base_url('uploads/professionalTax/'.$professional_taxRow['professionalTax_challan'])?>" target="_blank"><button type="button" class="btn btn-success">View Challan</button></a></td>
				<td><?= $professional_taxRow['professionalTax_date']?></td>
				<td><?= $professional_taxRow['professionalTax_amount']?></td>
				<td>
				<a href="<?= base_url('document/delete_professionalTax/'.$professional_taxRow['folder_id'].'/'.$professional_taxRow['id'])?>" class="btn btn-default"  title="Delete Tasks"><button type="button" class="btn btn-default" style="background-color: #023e8a; color:#fff" data-toggle="tooltip"><i class="fa fa-trash"></i></button></a>
			
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<!-- end kycOptionTable -->
