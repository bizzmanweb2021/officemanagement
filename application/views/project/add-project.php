<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Project</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-default" style="border-radius: 15px">
              <div class="card-header" style="background-color:#023047; color: #fff">
                <h3 class="card-title">Enter Project Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url('project/post_add_project')?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
					<div class="row">
						<div class="col-md-6">	
							<div class="form-group">
								<label for="exampleInputPassword1">Name of the Client</label>
								<select class="form-control" name="employer_name">
									<?php foreach($employers as $employer): ?>
									<option value="<?= $employer['id']?>"><?= $employer['company_name']?></option>
									<?php endforeach; ?> 
								</select>
							</div>
						</div>
						<div class="col-md-6">		
							<div class="form-group">
								<label for="exampleInputPassword1">Assign To</label>
								<select class="form-control" name="project_manager">
									<?php foreach($employees as $employee): ?>
											<option value="<?= $employee['id']?>"><?= $employee['name']?></option>
										<?php endforeach; ?> 
								</select>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleInputPassword1">Task</label>
									<select class="form-control task" name="task">
											<option value="" hidden>Select Task</option>
											<?php foreach($tasks as $task): ?>
												<option value="<?= $task['id']?>"><?= $task['name']?></option>
											<?php endforeach; ?> 
									</select>
							</div>                          
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleInputPassword1">Category</label>
									<select class="form-control sub_task" name="sub_task">
										<option value="" hidden>Select Category First</option>
									</select>
							</div>                          
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
								<div class="form-group">
									<label for="">Completion Date</label>
									<input type="date" class="form-control" name="completion_date">
								</div>
						</div>
						<div class="col-md-6">		
							<div class="form-group">
								<label for="exampleInputPassword1">Date Of Bill</label>
									<input type="date" class="form-control" name="date_of_bill">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
								<div class="form-group">
									<label for="">Issues arises during the processing the job</label>
									<textarea class="form-control" name = "problems_issues" rows="3"></textarea>
								</div>
						</div>
						<div class="col-md-6">		
							<div class="form-group">
								<label for="exampleInputPassword1">Short out the issues</label>
									<textarea class="form-control" name = "short_out_issues" rows="3"></textarea>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="brand_name">Priority:</label>
								<select class="form-control" id="priority" name="priority">
										<option value="1">High</option>
										<option value="2">Important</option>
										<option value="3">Normal</option>
										<option value="4">Low</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">		
							<div class="form-group">
								<label for="">Expected Delivery</label>
								<input type="date" class="form-control" id=""name="expected_delivery">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Final Date</label>
								<input type="date" class="form-control" name="final_date">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="brand_name">Upload Receipts:</label>
								<input type="file" name="Receiptsfiles" class="form-control">
							</div>
						</div>
					</div>
									
                </div>
                <!-- /.card-body -->

					<div class="card-footer">
						<div id="" class="popup_error" style="font-size: 13px;color:#CC0000;"></div>
						<button type="submit" class="btn btn-primary btn-block">Submit</button>
					</div>
				</form>
			</div>
			<!-- /.card -->

		</div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script type="text/javascript">

	$(document).ready(function(){
    $('.task').on('change', function(){
        var taskID = $(this).val();
				//alert(taskID);
        if(taskID){
            $.ajax({
                type:'GET',
                url:'<?= base_url("/Project/select_subTask_superTask")?>',
                data: {taskID:taskID},
                success:function(data){
                    $('.sub_task').html(data);
                    $('.super_sub_task').html('<option value="">Select Sub-task first</option>'); 
                }
            }); 
        }else{
            $('.sub_task').html('<option value="">Select Task first</option>');
            $('.super_sub_task').html('<option value="">Select Sub-Task first</option>'); 
        }
    });
    
    $('.sub_task').on('change', function(){
        var subTaskID = $(this).val();
				//alert(subTaskID);
        if(subTaskID){
            $.ajax({
                type:'GET',
                url:'<?= base_url("/Project/select_subTask_superTask")?>',
                data: {subTaskID:subTaskID},
                success:function(data){
                    $('.super_sub_task').html(data);
                }
            }); 
        }else{
            $('.super_sub_task').html('<option value="">Select state first</option>'); 
        }
    });
});

</script>



