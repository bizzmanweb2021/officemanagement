<div class="row">
	<div class="col-md-1">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#gstModal" style="background-color: #023e8a; color:#fff">Add GST</button>
	</div>
</div>

<!-- trade licence Table -->
<div class="site-table gstTable" style="overflow: auto; height: 200px;">
	<table class="table table-bordered table-striped" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
		<thead style="background-color:#023047; color: #fff;position: sticky;top: 0;">
		<tr>
			<th>Company Name </th>
			<th>Return File Type</th>
			<th>Period</th>
			<th>Payment</th>
			<th>Date Of File</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach($all_gst as $gstRow): ?>
			<tr style="background-color: #fff; color: #000">
				<td><?= $gstRow['company_name']?></td>
				<td><?= $gstRow['return_file_type']?></td>
				<td><?= $gstRow['period']?></td>
				<td><?= $gstRow['payment']?></td>
				<td><?= $gstRow['date_of_file']?></td>
				<td><a href="<?= base_url('document/delete_gst/'.$gstRow['folder_id'].'/'.$gstRow['id'])?>" class="btn btn-default"  title="Delete Tasks"><button type="button" class="btn btn-default" style="background-color: #023e8a; color:#fff" data-toggle="tooltip"><i class="fa fa-trash"></i></button></a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<!-- end kycOptionTable -->
