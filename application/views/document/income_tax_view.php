<!-- income_tax -->
<div class="row">
	<div class="col-md-1">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#IncomeTaxModal" style="background-color: #023e8a; color:#fff">Add Income Tax</button>
	</div>
</div>
<div class="site-table incomeTaxTable" style="overflow: auto; height: 200px;">
	<table class="table table-bordered table-striped" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
		<thead style="background-color:#023047; color: #fff;position: sticky;top: 0;">
		<tr>
			<th>company Name</th>
			<th>Date Of Filing </th>
			<th>Asstment Year</th>
			<th>Acknowledement No</th>
			<th>XML File</th>
			<th>Computation</th>
			<th>Balance Sheet</th>
			<th>Profit and Loss</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach($income_tax as $income_taxRow): ?>
			<tr style="background-color: #fff; color: #000">
				<td><?= $income_taxRow['company_name']?></td>
				<td><?= $income_taxRow['date_of_filing']?></td>
				<td><?= $income_taxRow['asstment_year']?></td>
				<td><?= $income_taxRow['acknowledement_no']?></td>
				<td><?php if($income_taxRow['XML_file'] != ''){ ?>
					<a href="<?= base_url('uploads/income_tax/'.$income_taxRow['XML_file'])?>" target="_blank"><i class="fa fa-file-pdf" style="font-size:40px;color:red;"></i></a>
				<?php }else{ ?>

				<?php } ?>
					</td>
				<td><?= $income_taxRow['computation']?></td>
				<td><?php if($income_taxRow['balance_sheet'] != ''){ ?>
					<a href="<?= base_url('uploads/income_tax/'.$income_taxRow['balance_sheet'])?>" target="_blank"><i class="fa fa-file-pdf" style="font-size:40px;color:red;"></i></a>
					<?php }else{ ?>

					<?php } ?>
				</td>
				<td><?php if($income_taxRow['profit_and_loss'] != ''){ ?>
				<a href="<?= base_url('uploads/income_tax/'.$income_taxRow['profit_and_loss'])?>" target="_blank"><i class="fa fa-file-pdf" style="font-size:40px;color:red;"></i></a>
				<?php }else{ ?>

				<?php } ?>
				</td>
				
				<td>
				<a href="<?= base_url('document/delete_incomeTax/'.$income_taxRow['folder_id'].'/'.$income_taxRow['id'])?>" class="btn btn-default" style="background-color: #264653; color:#fff" data-toggle="tooltip" title="Delete Tasks"><i class="fa fa-trash"></i></a>
			
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<!-- end income_tax -->
