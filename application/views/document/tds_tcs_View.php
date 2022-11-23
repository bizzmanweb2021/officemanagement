<div class="row">
	<div class="col-md-3">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tdstcsModal" style="background-color: #023e8a; color:#fff">Add TDS And TCS</button>
	</div>
	<div class="col-md-2">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tdstcsformModal" style="background-color: #023e8a; color:#fff">Add Form Name</button>
	</div>
</div>

<!-- trade licence Table -->
<div class="site-table gstTable" style="overflow: auto; height: 300px;">
	<table class="table table-bordered table-striped" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
		<thead style="background-color:#023047; color: #fff;position: sticky;top: 0;">
		<tr>
			<th>Company Name </th>
			<th>Acknowledement No.</th>
			<th>Form Name</th>
			<th>Statutory Due Date</th>
			<th>Return Type</th>
			<th>Financial Year</th>
			<th>Quarter</th>
			<th>Date Of File</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach($all_tds_and_tcs as $tds_and_tcsRow): ?>
			<tr style="background-color: #fff; color: #000">
				<td><?= $tds_and_tcsRow['company_name']?></td>
				<td><?= $tds_and_tcsRow['acknowledement_no'] ?></td>
				<td><?= $tds_and_tcsRow['form_name']?></td>
				<td><?= $tds_and_tcsRow['statutory_due_date']?></td>
				<td><?php if($tds_and_tcsRow['return_type'] == '1'){ ?>
					 Correction
				<?php }else{ ?>
					 Original
				<?php } ?>
				</td>
				<td><?= $tds_and_tcsRow['financial_year']?></td>
				<td><?= $tds_and_tcsRow['quarter']?></td>
				<td><?= $tds_and_tcsRow['date_of_file']?></td>
				<td><a href="<?= base_url('document/delete_tds_and_tcs/'.$tds_and_tcsRow['folder_id'].'/'.$tds_and_tcsRow['id'])?>" class="btn btn-default"  title="Delete Tasks"><button type="button" class="btn btn-default" style="background-color: #023e8a; color:#fff" data-toggle="tooltip"><i class="fa fa-trash"></i></button></a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<!-- end kycOptionTable -->
