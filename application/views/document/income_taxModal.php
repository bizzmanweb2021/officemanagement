<?php $folderid = $this->uri->segment(3); ?>

<!-- ROC Modal -->
<div class="modal fade" id="rocModal" tabindex="-1" role="dialog" aria-labelledby="rocModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="rocModalLabel">Registrars Of Companies</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
			<form action="<?= base_url('document/post_add_registrars_companies')?>" method="post" enctype="multipart/form-data">
				<input type="hidden" class="form-control" name="folderid" value = "<?php echo $folderid; ?>">

                <div class="card-body">
						
						<div class="form-group">
							<label for="exampleInputPassword1">ASSIGN USER</label>
							<select class="form-control" name="created_by">
								<?php foreach($employees as $employee): ?>
								<option value="<?= $employee['id']?>"><?= $employee['name']?></option>
								<?php endforeach; ?> 
							</select>
						</div>
					
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputPassword1">COMPANY NAME</label>
									<select class="form-control" name="company_name">
										<?php foreach($employers as $employer): ?>
										<option value="<?= $employer['id']?>"><?= $employer['company_name']?></option>
										<?php endforeach; ?> 
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<label for="exampleInputPassword1">FORM NAME</label>
								<select class="form-control form_number" name="form_number" >
									<option>Select Form Number</option>
									<?php foreach($form_number as $form_numberRow): ?>
									<option value="<?= $form_numberRow['id']?>"><?= $form_numberRow['form_number']?></option>
									<?php endforeach; ?> 
								</select>
							</div>
						</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">SRN(4 to 10 characters)</label>
								<input type="text" class="form-control srnCheck" name="srn" placeholder="Enter SRN" minlength="9" required size="9">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">STATUTORY DUE DATE</label>
								<input type="text" class="form-control statutoryduedate" name="roc_due_date" value="">
							</div>
						</div>
					</div>     

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">YEAR /PERIOD</label>
								<input type="date" class="form-control" name="year_period">
							</div>
						</div>
						<div class="col-md-6">		
							<div class="form-group">
								<label for="exampleInputPassword1">DATE OF FILING</label>
								<input type="date" class="form-control" name="date_of_filing">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Type of Fee</label>
								<select class="form-control" name="type_ofFee">
								<option>Select Type of Fee</option>
								<option value="1">Normal</option>
								<option value="2">Additional</option>
								<option value="3">Normal & Additional</option>
								<option value="4">Total</option>
							</select>
							</div>
						</div>
						<div class="col-md-6">		
							<div class="form-group">
								<label for="exampleInputPassword1">AMOUNT</label>
								<input type="text" class="form-control" name="amount" placeholder="Enter amount">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleFormControlFile1">Challan</label>
								<input type="file" name="roc_challan" class="form-control-file">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleFormControlFile1">ROC FORM</label>
								<input type="file" name="roc_form" class="form-control-file">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleFormControlFile1">Additional File-1</label>
								<input type="file" name="additional_file_1" class="form-control-file">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleFormControlFile1">Additional File-2</label>
								<input type="file" name="additional_file_2" class="form-control-file">
							</div>
						</div>
					</div>
					
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <div class="popup_error" style="font-size: 13px;color:#CC0000;"></div>
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

	<!--From Number Modal -->
	<div class="modal fade" id="addFromNumberModal" tabindex="-1" role="dialog" aria-labelledby="addFromNumberModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="rocModalLabel">ROC Form Number</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
			<form action="<?= base_url('document/post_add_form_number')?>" method="post" enctype="multipart/form-data">
	
				<input type="hidden" class="form-control" name="folderid" value = "<?php echo $folderid; ?>">

                <div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">FORM NUMBER</label>
								<input type="text" class="form-control" name="form_number" placeholder="Enter From Number">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">STATUTORY DUE DATE</label>
								<input type="Date" class="form-control" name="statutory_due_date">
							</div>
						</div>
					</div>     
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <div class="popup_error" style="font-size: 13px;color:#CC0000;"></div>
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
              </form>

			  	<table class="table table-bordered table-striped" style="overflow: auto; width: 100%; height: 100px; text-align: center;">
					<thead style="background-color:#023047; color: #fff;position: sticky;top: 0;">
					<tr>
						<th>Form Number </th>
						<th>Statutory Due Date</th>
					</tr>
					</thead>
					<tbody>
						<?php foreach($form_number as $allform_numberRow): ?>
						<tr style="background-color: #fff; color: #000">
							<td><?= $allform_numberRow['form_number']?></td>
							<td><?= $allform_numberRow['statutory_due_date']?>&nbsp;&nbsp;<a href="<?= base_url('document/delete_form_number/'.$allform_numberRow['id'].'/'.$folderid)?>"><i class="fa fa-trash" style="color: red;"></i></a></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
<!--end roc -->
	
	
	<div id="Registrars_companiesStatusModal" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Status</h5>
					<button type="button" class="close close_btn" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url(); ?>Document/updateroc_status" method="post" enctype="multipart/form-data">
					
						<?php $folderid = $this->uri->segment(3); ?>
						<input type="hidden" class="form-control" name="folderid" value = "<?php echo $folderid; ?>">
						<input type="hidden" name="rocStatusId" class="rocStatusId form-control" value=""/>
						
						<div class = "form-group">
							<select class="form-control" name="status_name" data-placeholder="Select Status Name" >
								<option>Select Status</option>
								<option value="1">Completed</option>
								<option value="2">Pending</option>
								<option value="3">Approved</option>
							</select>
						</div>
						<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 120px;">
					</form>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary close_btn" data-dismiss="modal">Cancel</button>
					
				</div>
			</div>
		</div>
	</div>

<!--Income tax Modal -->
<div class="modal fade" id="IncomeTaxModal" tabindex="-1" role="dialog" aria-labelledby="rocModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="rocModalLabel">Income Tax</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
			<form action="<?= base_url('document/post_add_IncomeTax')?>" method="post" enctype="multipart/form-data">
				
				<input type="hidden" class="form-control" name="folderid" value = "<?php echo $folderid; ?>">

                <div class="card-body">   
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for=""> Company Name</label>
								<select class="form-control" name="company_name">
									<?php foreach($employers as $employer): ?>
									<option value="<?= $employer['id']?>"><?= $employer['company_name']?></option>
									<?php endforeach; ?> 
								</select>
							</div>
						</div>
					</div>  
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleInputPassword1">DATE OF FILING</label>
								<input type="date" class="form-control" name="date_of_filing">
							</div>
						</div>
						<div class="col-md-6">		
							<div class="form-group">
								<label for="">YEAR /PERIOD</label>
								<input type="text" class="form-control" name="year_period" placeholder="Enter Year">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Acknowledement No</label>
								<input type="text" class="form-control" name="acknowledement_no">
							</div>
						</div>
						<div class="col-md-6">		
							<div class="form-group">
								<label for="exampleInputPassword1">Computation</label>
								<input type="text" class="form-control" name="computation" placeholder="Enter computation">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleFormControlFile1">XML File</label>
								<input type="file" name="XML_file" class="form-control-file">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleFormControlFile1">Balance Sheet</label>
								<input type="file" name="balance_sheet" class="form-control-file">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleFormControlFile1">Profit And loss</label>
								<input type="file" name="profit_and_loss" class="form-control-file">
							</div>
						</div>
					</div>
					
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <div class="popup_error" style="font-size: 13px;color:#CC0000;"></div>
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


<!--account Modal -->
<div class="modal fade" id="accountModal" tabindex="-1" role="dialog" aria-labelledby="accountModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="rocModalLabel">Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
			<form action="<?= base_url('document/post_add_accounts')?>" method="post" enctype="multipart/form-data">
				
				<input type="hidden" class="form-control" name="folderid" value = "<?php echo $folderid; ?>">

                <div class="card-body">   
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for=""> Company Name</label>
								<select class="form-control" name="company_name">
									<?php foreach($employers as $employer): ?>
									<option value="<?= $employer['id']?>"><?= $employer['company_name']?></option>
									<?php endforeach; ?> 
								</select>
							</div>
						</div>
					</div>  
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="exampleInputPassword1">Loan Confirmation</label>
								<textarea class="form-control" name="loan_confirmation" rows="3"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Trail Balance</label>
								<input type="text" class="form-control" name="trail_balance">
							</div>
						</div>
						<div class="col-md-6">		
							<div class="form-group">
								<label for="exampleInputPassword1">Memorandum And Article Of Association</label>
								<input type="text" class="form-control" name="memorandum_article_association">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleFormControlFile1">Bank Statement</label>
								<input type="file" name="bank_statement" class="form-control-file">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleFormControlFile1">Balance Sheet</label>
								<input type="file" name="balance_sheet" class="form-control-file">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleFormControlFile1">Profit And loss</label>
								<input type="file" name="profit_and_loss" class="form-control-file">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleFormControlFile1">Vouchers</label>
								<input type="file" name="vouchers" class="form-control-file">
							</div>
						</div>
					</div>
					
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <div class="popup_error" style="font-size: 13px;color:#CC0000;"></div>
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


	<!--Professional Tax Modal -->
	<div class="modal fade" id="professional_taxModal" tabindex="-1" role="dialog" aria-labelledby="professional_taxModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="rocModalLabel">Professional Tax</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
			<form action="<?= base_url('document/post_add_professional_tax')?>" method="post" enctype="multipart/form-data">
	
				<input type="hidden" class="form-control" name="folderid" value = "<?php echo $folderid; ?>">
				<input type="hidden" class="form-control accounts_id" name="accounts_id" value = "">

                <div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for=""> Amount</label>
								<input type="text" class="form-control professionalTax_amount" name="professionalTax_amount">
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label for=""> Date</label>
								<input type="Date" class="form-control professionalTax_date" name="professionalTax_date">
							</div>
						</div>
						
					</div> 
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for=""> Challan</label>
								<input type="file" class="form-control" name="professionalTax_challan">
							</div>
						</div>
					</div>    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
              </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
<!--end Professional Model -->


<!--trade_licence Modal -->
<div class="modal fade" id="trade_licenceModal" tabindex="-1" role="dialog" aria-labelledby="professional_taxModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="rocModalLabel">Trade Licence</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
			<form action="<?= base_url('document/post_add_trade_licence')?>" method="post" enctype="multipart/form-data">
	
				<input type="hidden" class="form-control" name="folderid" value = "<?php echo $folderid; ?>">
				<input type="hidden" class="form-control accounts_id" name="accounts_id" value = "">

                <div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for=""> Amount</label>
								<input type="text" class="form-control trade_licence_amount" name="trade_licence_amount">
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label for=""> Date</label>
								<input type="Date" class="form-control trade_licence_date" name="trade_licence_date">
							</div>
						</div>
						
					</div> 
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for=""> Challan</label>
								<input type="file" class="form-control" name="trade_licence_challan">
							</div>
						</div>
					</div>    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
              </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
<!--end trade_licence Modal -->

<!--trade_licence Modal -->
<div class="modal fade" id="kycModal" tabindex="-1" role="dialog" aria-labelledby="kycModallLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="rocModalLabel">KYC</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
			<form action="<?= base_url('document/post_add_kycDoc')?>" method="post" enctype="multipart/form-data">
	
				<input type="hidden" class="form-control" name="folderid" value = "<?php echo $folderid; ?>">
				
                <div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for=""> Company Name</label>
								<select class="form-control" name="company_name">
									<?php foreach($employers as $employer): ?>
									<option value="<?= $employer['id']?>"><?= $employer['company_name']?></option>
									<?php endforeach; ?> 
								</select>
							</div>
						</div>
					</div>    
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for=""> PAN</label>
								<input type="file" class="form-control" name="pan_card">
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label for=""> Aadhar</label>
								<input type="file" class="form-control" name="aadhar_card">
							</div>
						</div>
					</div> 
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for=""> Passport</label>
								<input type="file" class="form-control" name="passport">
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label for=""> Voter Card</label>
								<input type="file" class="form-control" name="voter_card">
							</div>
						</div>
					</div> 
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for=""> Bank Passbook</label>
								<input type="file" class="form-control" name="bank_passbook">
							</div>
						</div>
					</div>    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
              </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
<!--end trade_licence Modal -->
