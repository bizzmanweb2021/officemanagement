<div class="row">
	<div class="col-md-1">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#accountModal" style="background-color: #023e8a; color:#fff">Add Account</button>
	</div>
</div>
<!-- Accounts Table -->
<div class="site-table accountsTable" style="overflow: auto; height: 400px;">
	<table class="table table-bordered table-striped" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
		<thead style="background-color:#023047; color: #fff;position: sticky;top: 0;">
		<tr>
			<th>Company Name</th>
			<th>Balance Sheet </th>
			<th>profit And Loss</th>
			<th>Bank Statement </th>
			<th>Loan Confirmation</th>
			<th>Vouchers</th>
			<th>Memorandum Article Association</th>
			<th>PT Challan</th>
			<th>PT Date</th>
			<th>PT Amount</th>
			<th>TL Challan</th>
			<th>TL Date</th>
			<th>TL Amount</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach($all_accounts as $accountsRow){ ?>
				
			<tr style="background-color: #fff; color: #000">
				<td><?= $accountsRow['company_name'] ?></td>
				<td><?php if($accountsRow['balance_sheet'] != ''){ ?>
					<a href="<?= base_url('uploads/accounts/'.$accountsRow['balance_sheet'])?>" target="_blank"><i class="fa fa-file-pdf" style="font-size:40px;color:red;"></i></a>
					<?php }else{ ?>

					<?php } ?>
				</td>
				<td><?php if($accountsRow['profit_and_loss'] != ''){ ?>
					<a href="<?= base_url('uploads/accounts/'.$accountsRow['profit_and_loss'])?>" target="_blank"><i class="fa fa-file-pdf" style="font-size:40px;color:red;"></i></a>
					<?php }else{ ?>

					<?php } ?>
				</td>
				<td><?php if($accountsRow['bank_statement'] != ''){ ?>
					<a href="<?= base_url('uploads/accounts/'.$accountsRow['bank_statement'])?>" target="_blank"><i class="fa fa-file-pdf" style="font-size:40px;color:red;"></i></a>
					<?php }else{ ?>

					<?php } ?>
					
				</td>
				<td><?= $accountsRow['loan_confirmation'] ?></td>
				<td>
					<?php if($accountsRow['vouchers'] != ''){ ?>
					<a href="<?= base_url('uploads/accounts/'.$accountsRow['vouchers'])?>" target="_blank"><i class="fa fa-file-pdf" style="font-size:40px;color:red;"></i></a>
					<?php }else{ ?>

					<?php } ?>
				</td>
				<td><?= $accountsRow['memorandum_article_association']?></td>
				<td><?php if($accountsRow['professionalTax_challan'] != ''){ ?>
					<a href="<?= base_url('uploads/accounts/'.$accountsRow['professionalTax_challan'])?>" target="_blank"><i class="fa fa-file-pdf" style="font-size:40px;color:red;"></i></a>
					<?php }else{ ?>

					<?php } ?>
				</td>
				<td><?php if($accountsRow['professionalTax_date'] != ''){ ?>
					<?= $accountsRow['professionalTax_date']?>
					<?php }else{ ?>

					<?php } ?></td>
				<td><?php if($accountsRow['professionalTax_amount'] != ''){ ?>
					<?= $accountsRow['professionalTax_amount']?>
					<?php }else{ ?>

					<?php } ?></td>
				<td><?php if($accountsRow['trade_licence_challan'] != ''){ ?>
					<a href="<?= base_url('uploads/accounts/'.$accountsRow['trade_licence_challan'])?>" target="_blank"><i class="fa fa-file-pdf" style="font-size:40px;color:red;"></i></a>
					<?php }else{ ?>

					<?php } ?></td>
				<td><?php if($accountsRow['trade_licence_date'] != ''){ ?>
					<?= $accountsRow['trade_licence_date']?>
					<?php }else{ ?>

					<?php } ?>
				</td>
				<td><?php if($accountsRow['trade_licence_amount'] != ''){ ?>
					<?= $accountsRow['trade_licence_amount']?>
					<?php }else{ ?>

					<?php } ?>
				</td>
				<td>
					<a href="<?= base_url('document/delete_accounts/'.$accountsRow['folder_id'].'/'.$accountsRow['account_id']) ?>" class="btn btn-default" title="Delete Tasks"><button type="button" class="btn btn-default" style="background-color: #023e8a; color:#fff" data-toggle="tooltip"><i class="fa fa-trash"></i></button></a>

					<a href="javascript:void(0);" data-Tax_date="<?= $accountsRow['professionalTax_date'] ?>" data-Tax_amount="<?= $accountsRow['professionalTax_amount']?>" data-accountsID="<?=  $accountsRow['account_id'];?>" data-folder_id = "<?= $accountsRow['folder_id'] ?>" class="btn btn-default professional_taxbutton" title="Professional Tax"><button type="button" class="btn btn-default" style="background-color: #023e8a; color:#fff"><i class="fa fa-bar-chart"></i></button></a>

					<a href="javascript:void(0);" data-trade_licence_date="<?= $accountsRow['trade_licence_date']?>" data-trade_licence_amount="<?= $accountsRow['trade_licence_amount']?>" data-accountsID="<?=  $accountsRow['account_id'];?>" data-folder_id = "<?= $accountsRow['folder_id'] ?>" class="btn btn-default trade_licenceButton" title="Trade Licence"><button type="button" class="btn btn-default" style="background-color: #023e8a; color:#fff"><i class="fa fa-tasks"></i></button></a>
			
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
