<!-- Button trigger modal -->
<!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dist/js/dropzone/dropzone.min.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/dropzone/dropzone.min.js"></script>
  <div class="content-wrapper" style="margin-left: 0;">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Add File</h1> 
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">

              <div class="row">
                  <div class="col-md-12">

                    <div class="card" style="border-radius: 15px">
                        <div class="card-header"></div>

						
						<!-- /.card-header -->
						<div class="row">
							<div class="col-md-6">
								<!--start ROC -->
									<div class="accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">
										<!-- Accordion card -->
										<div class="card">
											<!-- Card header -->
											<div class="card-header" role="tab" id="headingThree1" style="background-color: #00b0bb;">
											<a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseThree1"
												aria-expanded="false" aria-controls="collapseThree1" style="color: #FFFFFF;text-decoration: none;">
												<div class="purple-gradient delivery-heading">
													<h2>ROC:<i class="fa fa-angle-down rotate-icon" style="float:right;"></i></h2>
												</div>
											</a>
											</div>
											<!-- Card body -->
											<div id="collapseThree1" class="collapse" role="tabpanel" aria-labelledby="headingThree1"
											data-parent="#accordionEx1">
											<div class="card-body">
												<div class="clearfix">
													<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
														<div class="card bg-c-darkred update-card">
														<div class="card-block">
															<div class="align-items-end">
																<div class="row">
																	<div class="col-md-2 roc_button">
																		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rocModal" style="background-color: #023e8a; color:#fff">Add ROC</button>
																	</div>
																	<div class="col-md-2 roc_button">
																		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addFromNumberModal" style="background-color: #023e8a; color:#fff">Add Form Name</button>
																	</div>
																</div>
																<div class="site-table rocTable" style="overflow: auto; height: 300px;">
																	<table class="table table-bordered" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
																	<thead style="background-color:#023047; color: #fff;position: sticky;top: 0;">
																	<tr>
																		<th>Company Name </th>
																		<th>Form Name</th>
																		<th>Year/Period</th>
																		<th>Date Of Filing</th>
																		<th>Statutory Due Date</th>
																		<th>SRN</th>
																		<th>Type of Fee</th>
																		<th>Amount</th>
																		<th>Created By</th>
																		<th>Challan</th>
																		<th>ROC Form</th>
																		<th>Additional file-1</th>
																		<th>Additional file-2</th>
																		<th>Status</th>
																		<th>Action</th>
																	</tr>
																	</thead>
																	<tbody>
																		<?php foreach($registrars_companies as $registrars_companiesRow): ?>
																		<tr style="background-color: #fff; color: #000">
																			<td><?= $registrars_companiesRow['company_name']?></td>
																			<td><?= $registrars_companiesRow['form_number']?></td>
																			<td><?= $registrars_companiesRow['year_period']?></td>
																			<td><?= $registrars_companiesRow['date_of_filing']?></td>
																			<td><?= $registrars_companiesRow['statutory_due_date']?></td>
																			<td><?= $registrars_companiesRow['srn']?></td>
																			<td><?php if($registrars_companiesRow['type_ofFee'] == 1){ ?>
																				Normal
																			<?php }elseif($registrars_companiesRow['type_ofFee'] == 2){ ?>
																				Additional
																			<?php }elseif($registrars_companiesRow['type_ofFee'] == 3){ ?>
																				Normal & Additional
																			<?php }elseif($registrars_companiesRow['type_ofFee'] == 4){ ?>
																				Total
																			<?php }else{} ?></td>
																			<td><?= $registrars_companiesRow['amount']?></td>
																			<td><?= $registrars_companiesRow['user_name']?></td>
																			<td>
																				<?php if($registrars_companiesRow['challan_type']=='image/jpg' || $registrars_companiesRow['challan_type']=='image/png' || $registrars_companiesRow['challan_type']=='image/jpeg'){ ?>
																	
																				<a href="<?php echo base_url('uploads/roc_img/'.$registrars_companiesRow['roc_challan']) ?>" target="_blank" class=""><img src="<?= base_url('uploads/roc_img/'.$registrars_companiesRow['roc_challan'])?>" width="60" height="60" style="object-fit:cover;"></a>
																		
																				<?php } elseif($registrars_companiesRow['challan_type'] =='application/pdf' || $registrars_companiesRow['challan_type'] =='application/docx') { ?>
																					<a href="<?= base_url('uploads/roc_img/'.$registrars_companiesRow['roc_challan'])?>" target="_blank"><i class="fa fa-file-pdf" style="font-size:40px;color:red;"></i></a>
																				<?php }else{} ?>
																			</td>
																			<td>
																			<?php if($registrars_companiesRow['form_type']=='image/jpg' || $registrars_companiesRow['form_type']=='image/png' || $registrars_companiesRow['form_type']=='image/jpeg'){ ?>

																				<a href="<?php echo base_url('uploads/roc_img/'.$registrars_companiesRow['roc_form']); ?>" target="_blank" class=""><img src="<?= base_url('uploads/roc_img/'.$registrars_companiesRow['roc_form'])?>" width="60" height="60" style="object-fit:cover;"></a>

																			<?php } elseif($registrars_companiesRow['form_type'] =='application/pdf' || $registrars_companiesRow['form_type'] =='application/docx') { ?>
																			<a href="<?= base_url('uploads/roc_img/'.$registrars_companiesRow['roc_form'])?>" target="_blank"><i class="fa fa-file-pdf" style="font-size:40px;color:red;"></i></a>
																			<?php } ?>
																			</td>
																			<td>
																			<?php if($registrars_companiesRow['additional_file1_type']=='image/jpg' || $registrars_companiesRow['additional_file1_type']=='image/png' || $registrars_companiesRow['additional_file1_type']=='image/jpeg'){ ?>
																	
																				<a href="<?php echo base_url('uploads/roc_img/'.$registrars_companiesRow['additional_file_1']) ?>" target="_blank" class=""><img src="<?= base_url('uploads/roc_img/'.$registrars_companiesRow['additional_file_1'])?>" width="60" height="60" style="object-fit:cover;"></a>
																		
																				<?php } elseif($registrars_companiesRow['additional_file1_type'] =='application/pdf' || $registrars_companiesRow['additional_file1_type'] =='application/docx') { ?>
																					<a href="<?= base_url('uploads/roc_img/'.$registrars_companiesRow['additional_file_1'])?>" target="_blank"><i class="fa fa-file-pdf" style="font-size:40px;color:red;"></i></a>
																				<?php }else{} ?>
																			</td>
																			<td>
																			<?php if($registrars_companiesRow['additional_file2_type']=='image/jpg' || $registrars_companiesRow['additional_file2_type']=='image/png' || $registrars_companiesRow['additional_file2_type']=='image/jpeg'){ ?>
																	
																			<a href="<?php echo base_url('uploads/roc_img/'.$registrars_companiesRow['additional_file_2']) ?>" target="_blank" class=""><img src="<?= base_url('uploads/roc_img/'.$registrars_companiesRow['additional_file_2'])?>" width="60" height="60" style="object-fit:cover;"></a>
																	
																			<?php } elseif($registrars_companiesRow['additional_file2_type'] =='application/pdf' || $registrars_companiesRow['additional_file2_type'] =='application/docx') { ?>
																				<a href="<?= base_url('uploads/roc_img/'.$registrars_companiesRow['additional_file_2'])?>" target="_blank"><i class="fa fa-file-pdf" style="font-size:40px;color:red;"></i></a>
																			<?php }else{} ?>
																			</td>
																			<td><?php if($registrars_companiesRow['status'] == 1){ ?>
																				<span class = "btn btn-primary" style="box-shadow:none !important; text-transform:uppercase;">Completed</span>
																			<?php }elseif($registrars_companiesRow['status'] == 3){ ?>
																				<span class="btn btn-success" style="box-shadow:none !important; text-transform:uppercase;">Approved</span>	
																			<?php }else{ ?>
																				<span class="btn btn-info" style="box-shadow:none !important; text-transform:uppercase;">Pending</span>	
																			<?php } ?>
																			</td>
																			<td>
																			<a href="<?= base_url('document/delete_roc/'.$registrars_companiesRow['folder_assign_id'].'/'.$registrars_companiesRow['id'])?>" class="btn btn-default"  title="Delete Tasks"><button type="button" class="btn btn-default" style="background-color: #023e8a; color:#fff" data-toggle="tooltip"><i class="fa fa-trash"></i></button></a>

																			<a  href="javascript:void(0);" data-registrars_companies_Id="<?=  $registrars_companiesRow['id'];?>" data-folder_assign_id = "<?= $registrars_companiesRow['folder_assign_id'] ?>" class="btn btn-default Registrars_companiesStatus" title="Status"><button type="button" class="btn btn-default" style="background-color: #023e8a; color:#fff" data-toggle="tooltip"><i class="fas fa-tasks"></i></button></a>
																			
																			<a href="javascript:void(0);" data-registrars_companies_Id="<?=  $registrars_companiesRow['id'];?>" data-folder_assign_id = "<?= $registrars_companiesRow['folder_assign_id'] ?>" class="btn btn-default openRegistrars_companies" title="Capture"><button type="button" class="btn btn-default" onclick="on_camera()" style="background-color: #023e8a; color:#fff" data-toggle="tooltip"><i class="fa fa-camera"></i></button></a>
																			</td>
																		</tr>
																		<?php endforeach; ?>
																	</tbody>
																	</table>
																</div>
															</div>
														</div>
														</div>
													</div>
												</div>
											</div>
											</div>
										</div>
										<!-- Accordion card -->
									</div>
									<!-- End ROC -->
							</div>

							<div class="col-md-6">
								<!-- start income tax-->
								<div class="accordion md-accordion" id="accordionEx2" role="tablist" aria-multiselectable="true">
									<!-- Accordion card -->
									<div class="card">
										<!-- Card header -->
										<div class="card-header" role="tab" id="headin2gThree2" style="background-color: #00b0bb;">
											<a class="collapsed" data-toggle="collapse" data-parent="#accordionEx2" href="#collapseThree2"
											aria-expanded="false" aria-controls="collapseThree2" style="color: #FFFFFF;text-decoration: none;">
												<div>
													<h2>INCOME TAX:<i class="fa fa-angle-down rotate-icon" style="float:right;"></i></h2>
												</div>
											</a>
										</div>
										<!-- Card body -->
										<div id="collapseThree2" class="collapse" role="tabpanel" aria-labelledby="headingThree2"
										data-parent="#accordionEx2">
										<div class="card-body">
											<div class="clearfix">
												<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
													<div class="card bg-c-darkred update-card">
													<div class="card-block">
														<div class="align-items-end">
																<?php $this->load->view('document/income_tax_view'); ?>		
														</div>
													</div>
													</div>
												</div>
											</div>
										</div>
										</div>
									</div>
									<!-- Accordion card -->
								</div>
								<!-- end income tax-->
							</div>

						</div>
						

				<div class="row">
					<div class="col-md-6">
						<!--start ACCOUNT-->
						<div class="accordion md-accordion" id="accordionEx3" role="tablist" aria-multiselectable="true">
							<!-- Accordion card -->
							<div class="card">
								<!-- Card header -->
								<div class="card-header" role="tab" id="headin2gThree3" style="background-color: #00b0bb;">
									<a class="collapsed" data-toggle="collapse" data-parent="#accordionEx3" href="#collapseThree3"
									aria-expanded="false" aria-controls="collapseThree3" style="color: #FFFFFF;text-decoration: none;">
										<div>
											<h2>ACCOUNT:<i class="fa fa-angle-down rotate-icon" style="float:right;"></i></h2>
										</div>
									</a>
								</div>
								<!-- Card body -->
								<div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
								data-parent="#accordionEx3">
								<div class="card-body">
									<div class="clearfix">
										<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
											<div class="card bg-c-darkred update-card">
											<div class="card-block">
												<div class="align-items-end">
														<?php $this->load->view('document/accounts_view'); ?>			
												</div>
											</div>
											</div>
										</div>
									</div>
								</div>
								</div>
							</div>
							<!-- Accordion card -->
						</div>
						<!-- end ACCOUNT-->
					</div>

					<div class="col-md-6">
							
						<!-- start KYC DOCUMENTS -->
						<div class="accordion md-accordion" id="accordionEx4" role="tablist" aria-multiselectable="true">
							<!-- Accordion card -->
							<div class="card">
								<!-- Card header -->
								<div class="card-header" role="tab" id="headin2gThree4" style="background-color: #00b0bb;">
									<a class="collapsed" data-toggle="collapse" data-parent="#accordionEx4" href="#collapseThree4"
									aria-expanded="false" aria-controls="collapseThree4" style="color: #FFFFFF;text-decoration: none;">
										<div>
											<h2>KYC DOCUMENTS:<i class="fa fa-angle-down rotate-icon" style="float:right;"></i></h2>
										</div>
									</a>
								</div>
								<!-- Card body -->
								<div id="collapseThree4" class="collapse" role="tabpanel" aria-labelledby="headingThree4"
								data-parent="#accordionEx4">
								<div class="card-body">
									<div class="clearfix">
										<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
											<div class="card bg-c-darkred update-card">
											<div class="card-block">
												<div class="align-items-end">
														<?php $this->load->view('document/kycView'); ?>			
												</div>
											</div>
											</div>
										</div>
									</div>
								</div>
								</div>
							</div>
							<!-- Accordion card -->
						</div>
						<!-- end KYC DOCUMENTS-->
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<!--start TRADE LICENCE -->
						<div class="accordion md-accordion" id="accordionEx5" role="tablist" aria-multiselectable="true">
							<!-- Accordion card -->
							<div class="card">
								<!-- Card header -->
								<div class="card-header" role="tab" id="headin2gThree5" style="background-color: #00b0bb;">
									<a class="collapsed" data-toggle="collapse" data-parent="#accordionEx5" href="#collapseThree5"
									aria-expanded="false" aria-controls="collapseThree5" style="color: #FFFFFF;text-decoration: none;">
										<div>
											<h2>TRADE LICENCE:<i class="fa fa-angle-down rotate-icon" style="float:right;"></i></h2>
										</div>
									</a>
								</div>
								<!-- Card body -->
								<div id="collapseThree5" class="collapse" role="tabpanel" aria-labelledby="headingThree5"
								data-parent="#accordionEx5">
								<div class="card-body">
									<div class="clearfix">
										<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
											<div class="card bg-c-darkred update-card">
											<div class="card-block">
												<div class="align-items-end">
														<?php $this->load->view('document/tradeLicenceView'); ?>			
												</div>
											</div>
											</div>
										</div>
									</div>
								</div>
								</div>
							</div>
							<!-- Accordion card -->
						</div>
						<!--end TRADE LICENCE -->
					</div>

					<div class="col-md-6">
							<!-- Start PROFESSIONAL TAX -->
							<div class="accordion md-accordion" id="accordionEx6" role="tablist" aria-multiselectable="true">
							<!-- Accordion card -->
							<div class="card">
								<!-- Card header -->
								<div class="card-header" role="tab" id="headin2gThree6" style="background-color: #00b0bb;">
									<a class="collapsed" data-toggle="collapse" data-parent="#accordionEx6" href="#collapseThree6"
									aria-expanded="false" aria-controls="collapseThree6" style="color: #FFFFFF;text-decoration: none;">
										<div>
											<h2>PROFESSIONAL TAX:<i class="fa fa-angle-down rotate-icon" style="float:right;"></i></h2>
										</div>
									</a>
								</div>
								<!-- Card body -->
								<div id="collapseThree6" class="collapse" role="tabpanel" aria-labelledby="headingThree6"
								data-parent="#accordionEx6">
								<div class="card-body">
									<div class="clearfix">
										<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
											<div class="card bg-c-darkred update-card">
											<div class="card-block">
												<div class="align-items-end">
														<?php $this->load->view('document/professional_taxView'); ?>			
												</div>
											</div>
											</div>
										</div>
									</div>
								</div>
								</div>
							</div>
							<!-- Accordion card -->
						</div>
						<!-- End PROFESSIONAL TAX -->

					</div>
				</div>
				  

		<div class="row">
			<div class="col-md-6">
				<div class="accordion md-accordion" id="accordionEx7" role="tablist" aria-multiselectable="true">
						<!-- Accordion card -->
						<div class="card">
						<!-- Card header -->
						<div class="card-header" role="tab" id="headin2gThree7" style="background-color: #00b0bb;">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#collapseThree7"
								aria-expanded="false" aria-controls="collapseThree6" style="color: #FFFFFF;text-decoration: none;">
								<div>
									<h2>GST:<i class="fa fa-angle-down rotate-icon" style="float:right;"></i></h2>
								</div>
							</a>
						</div>
						<!-- Card body -->
						<div id="collapseThree7" class="collapse" role="tabpanel" aria-labelledby="headingThree7"
							data-parent="#accordionEx7">
							<div class="card-body">
								<div class="clearfix">
									<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
									<div class="card bg-c-darkred update-card">
										<div class="card-block">
											<div class="align-items-end">
												<?php $this->load->view('document/gst_View'); ?>			
											</div>
										</div>
									</div>
									</div>
								</div>
							</div>
						</div>
						</div>
						<!-- Accordion card -->
					</div>
			</div>
			<div class="col-md-6">
				<div class="accordion md-accordion" id="accordionEx8" role="tablist" aria-multiselectable="true">
					<!-- Accordion card -->
					<div class="card">
					<!-- Card header -->
					<div class="card-header" role="tab" id="headin2gThree8" style="background-color: #00b0bb;">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordionEx8" href="#collapseThree8"
							aria-expanded="false" aria-controls="collapseThree8" style="color: #FFFFFF;text-decoration: none;">
							<div>
								<h2>TDS AND TCS:<i class="fa fa-angle-down rotate-icon" style="float:right;"></i></h2>
							</div>
						</a>
					</div>
					<!-- Card body -->
					<div id="collapseThree8" class="collapse" role="tabpanel" aria-labelledby="headingThree8"
						data-parent="#accordionEx8">
						<div class="card-body">
							<div class="clearfix">
								<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
								<div class="card bg-c-darkred update-card">
									<div class="card-block">
										<div class="align-items-end">
											<?php $this->load->view('document/tds_tcs_View'); ?>			
										</div>
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>
					</div>
					<!-- Accordion card -->
				</div>
			</div>

		</div>
				  


						
                  <!-- <form action="<?= base_url('document/dragDropUpload/' . $project_id); ?>" class="dropzone" method="post"></form> -->
                <section>
					<div class="row p-3">
							
							<div class="form-group col-md-2">
								<select class="form-control searchOption" name = "daterangefilter" style = " border:1px solid #023047;">
									<option value = "">Select Search Option</option>
									<option value = "CompanyOption" >Company Wise</option>
									<!--option value = "YearOption">Year Wise</option>
									<option value = "FeesOption">Fees Wise</option>
									<option value = "PeriodOption">Period Based</option-->
									<option value = "GroupOption">Group Wise</option>
									<option value = "DateRangeOption">Date Range Wise</option>	
								</select>
							</div>

							<div class="companywise col-md-2" style="display:none;">								
								<div class="form-group has-search">
									<span class="fa fa-search form-control-feedback"></span>
									<input type="text" class="form-control companySearch" placeholder="Search By Company" name="companyName" value="">
								</div>

							</div>

							<div class="row daterange" style="display:none;">
								<div class="form-group col-md-6">
									<div class="row">
										<div class="col-md-5">
											<label for="dateText">From date:</label>
										</div>
										<div class="col-md-7">
											<input type="date" class="form-control dateTextField1" name="from_date" value=''>
										</div>
									</div>
								</div>
								<div class="form-group col-md-6">
									<div class="row">
										<div class="col-md-5">
											<label for="dateText">To date:</label>
										</div>
						
										<div class="col-md-7">
											<input type="date" class="form-control dateTextField2" name="to_date" value=''>
										</div>
									</div>
								</div>
							</div>
							
							<div class="yearrange col-md-3" style="display:none;">
								<div class="form-group">
									<!--label for="from_date">Select Year:</label-->
									<select name = "getyear" class="form-control getyear">
										<option value = "">Select Year</option>
										<?php  $lasttenYear = (int)date("Y")- 35;
											$curyear = (int)date("Y");
											for($i=$lasttenYear; $i<= $curyear; $i++){ ?>
											<option value="<?php echo $i;?>" <?php if($i == $i) echo 'selected'; ?>><?php echo $i;?></option>  
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="groupwise col-md-2" style="display:none;">
								<div class="form-group">
									<select class="form-control group_name" name="group_name">
									<option value = "">Select Group Name</option>
									<?php foreach($company_verticals as $company_verticalsRow): ?>
										<option value="<?= $company_verticalsRow['id']?>"><?= $company_verticalsRow['name']?></option>
										<?php endforeach; ?> 
									</select>
								</div>
							</div>
						</div>

					<div class="displaySearch">
                 <?php if(!empty($file)){ foreach($file as $files):if($files['type']=='image/png') { ?>
                    <figure class="figure">
                        <img src="<?= base_url('uploads/'.$files['image_name'])?>" width="200" height="150" style="object-fit:cover;margin:35px"><figcaption class="figcaption text-center"><?=$files['image_name']?>
                         <a href="<?php echo base_url().'document/download/'.$files['id']; ?>" class=""><i class="fa fa-download" style="color: gray"></i></a></figcaption>
                    </figure>
                    <?php } elseif($files['type']=='image/jpg') { ?>
                      <figure class="figure">
                        <img src="<?= base_url('uploads/'.$image['image_name'])?>" width="200" height="150" style="object-fit:cover;margin:35px"><figcaption class="figcaption text-center"><?=$files['image_name']?>
                         <a href="<?php echo base_url().'document/download/'.$files['id']; ?>" class=""><i class="fa fa-download" style="color: gray"></i></a></figcaption>
                    </figure>
                    <?php } elseif($files['type']=='image/jpeg') { ?>
                       <figure class="figure">
                        <img src="<?= base_url('uploads/'.$files['image_name'])?>" width="200" height="150" style="object-fit:cover;margin:35px"><figcaption class="figcaption text-center"><?=$files['image_name']?>
                         <a href="<?php echo base_url().'document/download/'.$files['id']; ?>" class=""><i class="fa fa-download" style="color: gray"></i></a></figcaption>
                    </figure>
                     <?php } elseif($files['type']=='image/gif') { ?>
                       <figure class="figure">
                        <img src="<?= base_url('uploads/'.$files['image_name'])?>" width="200" height="150" style="object-fit:cover;margin:35px"><figcaption class="figcaption text-center"><?=$files['image_name']?>
                         <a href="<?php echo base_url().'document/download/'.$files['id']; ?>" class=""><i class="fa fa-download" style="color: gray"></i></a></figcaption>
                    </figure>
                   <?php } elseif($files['type']=='application/pdf') { ?>

                    <figure class="figure">
                      <a href="<?= base_url('uploads/'.$files['image_name'])?>"><i class="fa fa-file-pdf" style="font-size:140px;color:red; margin: 35px"></i></a>
                        <!--img src="<?= base_url('uploads/'.$image['image_name'])?>" width="200" height="150" style="object-fit:cover;margin:35px"--><figcaption class="figcaption text-center"><?=$files['image_name']?>
                         <a href="<?php echo base_url().'document/download/'.$files['id']; ?>" class=""><i class="fa fa-download" style="color: gray"></i></a></figcaption>
                    </figure>
                    <?php } elseif($files['type']=='application/vnd.openxmlformats-officedocument.wordprocessingml.document') { ?>

                    <figure class="figure">
                      <a href="<?= base_url('uploads/'.$files['image_name'])?>"><i class="fa fa-file-word" style="font-size:140px;color:lightblue; margin: 35px"></i></a>
                        <!--img src="<?= base_url('uploads/'.$image['image_name'])?>" width="200" height="150" style="object-fit:cover;margin:35px"--><figcaption class="figcaption text-center"><?=$files['image_name']?>
                         <a href="<?php echo base_url().'document/download/'.$files['id']; ?>" class=""><i class="fa fa-download" style="color: gray"></i></a></figcaption>
                    </figure>
                    
                    <?php } endforeach;} ?>
					</div>
                </section>
                          </div>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal" id="captureimage">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 600px; overflow: auto;">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Capture</h4>
                <button type="button" class="close" data-dismiss="modal" onclick="close_camera()">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="container-fluid">

                    <form method="POST" action="<?= base_url('Document/capture_image') ?>">
						<div class="row">
							<div class="col-md-6">

							<input name="registrars_companiesId" type="hidden" class="registrars_companiesId" value=""/>

								<?php $folderid = $this->uri->segment(3); ?>
								<input type="hidden" name="folderid" value="<?php echo $folderid; ?>">
								
								<select class="form-control" id="projectsId" name="projectsId">
									<option value="">Select Project</option>
									<?php 
									$projects_query = $this->db->query("SELECT * FROM projects");
									foreach ($projects_query->result_array() as $projects_row) {  ?>
									<option value="<?php echo $projects_row['id'];  ?>"><?php echo $projects_row['project_name'];  ?></option>
									<?php } ?>
								</select>
                            </div>
						</div>
							
                        <div class="row">
                            <div class="col-md-6">
                                <div id="my_camera"></div>
                                <br/>
                                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                                <input type="hidden" name="webcam" id="webcamimage" class="image-tag">
                                <input type="hidden" name="image" class="image-tag">
                            </div>
                            <div class="col-md-6">
                                <div id="results"></div>
                            </div>
                            <div class="col-md-12 text-center">
                                <br />
                                <input type="submit" class="btn btn-success" value="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>


	<?php $this->load-> view('document/all_Modal'); ?>

	

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

	<link rel="stylesheet" href="<?= base_url('assets/toast/toastr.min.css') ?>">
	<script src="<?= base_url('assets/toast/toastr.min.js') ?>"></script>

	<style>
		.has-search .companySearch {
			padding-left: 2.375rem;
		}

		.has-search .form-control-feedback {
				position: absolute;
				z-index: 2;
				display: block;
				width: 2.375rem;
				height: 2.375rem;
				line-height: 2.375rem;
				text-align: center;
				pointer-events: none;
				color: #aaa;
		}
		.roc_challanForm{
			background-color: #023047;
			color: white;
			padding: 5px;
			text-align: left;
			border-radius: 5px;
			padding-left: 5px;
		}
	</style>  
  	<script>
	$(document).ready(function(){
		$(".searchOption").change(function(){
			if (this.value == 'CompanyOption') {
				$(".daterange").hide();
				$(".companywise").show();
				$(".groupwise").hide();
			}
			if(this.value == 'DateRangeOption'){
				$(".daterange").show();
				$(".companywise").hide();
				$(".groupwise").hide();
			}
			if(this.value == 'GroupOption'){
				$(".daterange").hide();
				$(".companywise").hide();
				$(".groupwise").show();
			}
		});

		$(".companySearch").keyup(function() {			
			var companyName = $('.companySearch').val();
			var folder_id = '<?php echo $this->uri->segment(3); ?>';

			//alert(folder_id);
			if (companyName == "") {
					$(".displaySearch").html("");
			}
			else {	
				$.ajax({	
						type: "POST",	
						url: "<?= base_url("/document/searchCompanyData")?>",
						data: { companyName: companyName, folder_id :folder_id, },
						success: function(html) {		
							$(".displaySearch").html(html);
						}
				});
			}
		});

		$(".group_name").change(function() {			
			var group_name = $('.group_name').val();
		
			//alert(group_name);
			var folder_id = '<?php echo $this->uri->segment(3); ?>';

			if (group_name == "") {
					$(".displaySearch").html("");
			}
			else {	
				$.ajax({	
						type: "POST",	
						url: "<?= base_url("/document/searchGroupNameData")?>",
						data: { group_name: group_name, folder_id :folder_id },
						success: function(html) {		
							$(".displaySearch").html(html);
						}
				});
			}
		});

		$(".form_number").change(function() {	

			var form_number = $(this).val();
			
			//alert(folder_name);
			var folder_id = '<?php echo $this->uri->segment(3); ?>';

			if (form_number == "") {
					$(".statutoryduedate").val("");
			}
			else {	
				$.ajax({	
						type: "GET",	
						url: "<?= base_url("/document/showStatutoryDueDate")?>",
						data: { form_number: form_number, folder_id :folder_id },
						success: function(data) {
							//alert(data);		
							$(".statutoryduedate").val(data);
							
						}
				});
			}
		});

		$(".tdsform_number").change(function() {	

		var tdsform_number = $(this).val();

		//alert(tdsform_number);
		var folder_id = '<?php echo $this->uri->segment(3); ?>';

		if (tdsform_number == "") {
				$(".tdsstatutoryduedate").val("");
		}
		else {	
			$.ajax({	
					type: "GET",	
					url: "<?= base_url("/document/showtdsStatutoryDueDate")?>",
					data: { tdsform_number: tdsform_number, folder_id :folder_id },
					success: function(data) {
						//alert(data);		
						$(".tdsstatutoryduedate").val(data);
					}
			});
		}
		});

		$(".dateTextField1, .dateTextField2").change(function() {			
			var from_date = $('.dateTextField1').val();
			var to_date = $('.dateTextField2').val();
			//alert(from_date+to_date);
			var folder_id = '<?php echo $this->uri->segment(3); ?>';

			//alert(folder_id);
			if (from_date == "") {
					$(".displaySearch").html("");
			}
			else {	
				$.ajax({	
						type: "POST",	
						url: "<?= base_url("/document/searchFromDateData")?>",
						data: { from_date: from_date, to_date: to_date, folder_id :folder_id },
						success: function(html) {		
							$(".displaySearch").html(html);
						}
				});
			}
		});

		
		$(".Registrars_companiesStatus").click(function(){
          	$("#Registrars_companiesStatusModal").modal('show');
				var rocStatusId = $(this).attr('data-registrars_companies_Id');
     			$("#Registrars_companiesStatusModal .rocStatusId").val( rocStatusId );
					
        });
			$(".close_btn").click(function(){
			$("#Registrars_companiesStatusModal").modal("hide"); 
						
        });

		$(".professional_taxbutton").click(function(){
          	$("#professional_taxModal").modal('show');
				var accountsID = $(this).attr('data-accountsID');
				var Tax_date = $(this).attr('data-Tax_date');
				var Tax_amount = $(this).attr('data-Tax_amount');
     			$("#professional_taxModal .accounts_id").val( accountsID );
				$("#professional_taxModal .professionalTax_amount").val( Tax_amount );
				$("#professional_taxModal .professionalTax_date").val( Tax_date );
					
        });
			$(".close_btn").click(function(){
			$("#professional_taxModal").modal("hide"); 
						
        });

		$(".trade_licenceButton").click(function(){
          	$("#trade_licenceModal").modal('show');
				var accountsID = $(this).attr('data-accountsID');
				var tl_date = $(this).attr('data-trade_licence_date');
				var tl_amount = $(this).attr('data-trade_licence_amount');
     			$("#trade_licenceModal .accounts_id").val( accountsID );
				$("#trade_licenceModal .trade_licence_amount").val( tl_amount );
				$("#trade_licenceModal .trade_licence_date").val( tl_date );
					
        });
			$(".close_btn").click(function(){
			$("#trade_licenceModal").modal("hide"); 
						
        });

		$(".srnCheck").keyup(function(e){
		e.preventDefault();
			var srnCheck = $(this).val();

			$.ajax({
				url: "<?= base_url("/document/showSrnCheck")?>",
				type: 'GET',
				data: {srnCheck: srnCheck},
				success: function(response) {
					if(response > 0)
					{
						//alert("Enter Duplicate SRN");
						Swal.fire('This SRN number is in our record.You enter anther number');
					}
				}
			});

		});


		$(".openRegistrars_companies").click(function(){
          $("#captureimage").modal('show');
					var registrars_companiesId = $(this).attr('data-registrars_companies_Id');
     			$("#captureimage .registrars_companiesId").val( registrars_companiesId );
					
        });
		$(".close_btn").click(function(){
		$("#captureimage").modal("hide"); 
					
        });

	});


	function on_camera() {
		Webcam.set({
			width: 250,
			height: 150,
			image_format: 'jpeg',
			upload_name: 'webcam',
			jpeg_quality: 90
		});

		Webcam.attach('#my_camera');
	}

	function close_camera() {
		Webcam.reset();
	}

	function take_snapshot() {
		Webcam.snap(function(data_uri) {
			$('#webcamimage').val(data_uri);
			$(".image-tag").val(data_uri);
			document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
		});
		Webcam.upload(data_uri, '"<?php echo base_url(); ?>Enquiry_Management/Demosave"', function(code, text) {
			if (code === '200') {
				alert('ok');
			} else {
				alert('error');
			}
		});
	}
	
</script>

