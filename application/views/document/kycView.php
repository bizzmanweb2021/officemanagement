


<div class="row">
	<div class="col-md-1">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kycModal" style="background-color: #023e8a; color:#fff">Add KYC DOCUMENTS</button>
	</div>
</div>

<!-- kycOptionTable -->
<div class="site-table kycOptionTable" style="overflow: auto; height: 200px;">
	<table class="table table-bordered table-striped" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
		<thead style="background-color:#023047; color: #fff;position: sticky;top: 0;">
		<tr>
			<th>Company Name </th>
			<th>PAN</th>
			<th> Aadhar</th>
			<th>Passport</th>
			<th>Voter Vard</th>
			<th>Bank Passbook</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach($all_kycDoc as $kycDocRow): ?>
			<tr style="background-color: #fff; color: #000">
				<td><?= $kycDocRow['company_name']?></td>
				<td><?php if($kycDocRow['pan_card'] != ''){ ?>
					<a href="<?= base_url('uploads/kyc_doc/'.$kycDocRow['pan_card'])?>" target="_blank"><button type="button" class="btn btn-success">View PAN</button></a>
				<?php }else{ ?>

				<?php } ?>
					
				</td>
				<td>
					<?php if($kycDocRow['aadhar_card'] != ''){ ?>
					<a href="<?= base_url('uploads/kyc_doc/'.$kycDocRow['aadhar_card'])?>" target="_blank"><button type="button" class="btn btn-success">View Aadhar</button></a>
					<?php }else{ ?>

					<?php } ?>
					
				</td>
				<td><?php if($kycDocRow['passport'] != ''){ ?>
					<a href="<?= base_url('uploads/kyc_doc/'.$kycDocRow['passport'])?>" target="_blank"><button type="button" class="btn btn-success">View Passport</button></a>
					<?php }else{ ?>

					<?php } ?>
				</td>
				<td><?php if($kycDocRow['voter_card'] != ''){ ?>
					<a href="<?= base_url('uploads/kyc_doc/'.$kycDocRow['voter_card'])?>" target="_blank"><button type="button" class="btn btn-success">View Voter Card</button></a>
					<?php }else{ ?>

					<?php } ?>
				</td>
				<td><?php if($kycDocRow['bank_passbook'] != ''){ ?>
					<a href="<?= base_url('uploads/kyc_doc/'.$kycDocRow['bank_passbook'])?>" target="_blank"><button type="button" class="btn btn-success">View Voter Card</button></a>
					<?php }else{ ?>

					<?php } ?>
				</td>
				
				<td>
				<a href="<?= base_url('document/delete_kycDoc/'.$kycDocRow['folder_id'].'/'.$kycDocRow['id'])?>" class="btn btn-default"  title="Delete Tasks"><button type="button" class="btn btn-default" style="background-color: #023e8a; color:#fff" data-toggle="tooltip"><i class="fa fa-trash"></i></button></a>
			
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<!-- end kycOptionTable -->
