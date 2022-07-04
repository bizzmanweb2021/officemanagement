<div class="row">
	<div class="col-md-1">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#trade_licenceModal" style="background-color: #023e8a; color:#fff">Add Trade Licence</button>
	</div>
</div>

<!-- trade licence Table -->
<div class="site-table tradelicenceTable" style="overflow: auto; height: 200px;">
	<table class="table table-bordered table-striped" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
		<thead style="background-color:#023047; color: #fff;position: sticky;top: 0;">
		<tr>
			<th>Company Name </th>
			<th>TL Challan</th>
			<th>TL Date</th>
			<th>TL Amount</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach($all_trade_licence as $trade_licenceRow): ?>
			<tr style="background-color: #fff; color: #000">
				<td><?= $trade_licenceRow['company_name']?></td>
				<td><a href="<?= base_url('uploads/trade_licence/'.$trade_licenceRow['trade_licence_challan'])?>" target="_blank"><button type="button" class="btn btn-success">View Challan</button></a></td>
				<td><?= $trade_licenceRow['trade_licence_date']?></td>
				<td><?= $trade_licenceRow['trade_licence_amount']?></td>
				<td>
				<a href="<?= base_url('document/delete_tradelicence/'.$trade_licenceRow['folder_id'].'/'.$trade_licenceRow['id'])?>" class="btn btn-default"  title="Delete Tasks"><button type="button" class="btn btn-default" style="background-color: #023e8a; color:#fff" data-toggle="tooltip"><i class="fa fa-trash"></i></button></a>
			
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<!-- End Trade Licence Table -->
