  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Home Page</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         <div class="col-md-9">

      <div class="card" style="border-radius: 15px">
  
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example2" class="table table-bordered table-striped">
      <thead style="background-color:#023047; color: #fff">
      <tr>
        <th>Company Name</th>
        <th>Task</th>
        <th>Assign User</th>
        <th>Deadline</th>
        <th>Time By Govt</th>
				<th width="20%">Status</th>
				<th>Action</th>
      </tr>
      </thead>
      <tbody>
        <?php foreach($dashboard as $dashboards): ?>
          <tr style="background-color: #fff; color: #000">
            <td> <?= $dashboards['company_name']?></td>
            <td> <?= $dashboards['task_name']?></td>
            <td> <?= $dashboards['project_manager_name']?></td>
            <td> <?= $dashboards['completion']?></td>
            <td><?= $dashboards['timeby']?></td>
						<td> <?php 
						$current = time();
						$due_date = strtotime($dashboards['timeby']);	
						$datediff = $due_date - $current;
						$difference = floor($datediff/(60*60*24));
							
							//Past Date
							if($difference > +1)
							{ ?>
									<span style="color:orange;">The last date for documents submission is approaching!</span>
						<?php	}
							//tomorrow
							elseif($difference >= 0)
							{ ?>
								<span style="color:Brown;">Tomorrow is the last date for documents submission!</span>	  
							<?php		}
							//1 day before 
							elseif($difference >= -1)
							{ ?>			
							<span style="color:blue;">Today is the last date for documents submission!</span>
						<?php	}
							//today
							else{ 
						?>
								<span style="color:red;">Your documents submission date has passed!</span>	
						<?php	} ?>
						</td>
						<td></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
              </div>
<!-- /.card -->
</div>
<!-- /.col -->
    
          <div class="col-md-3">
            <!-- general form elements -->
            <div class="card card-default" style="border-radius: 15px">
              <div class="card-header" style="background-color:#023047; color: #fff; border-top-left-radius: 15px; border-top-right-radius: 15px;" >
                <h3 class="card-title">Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="add-employee" action="<?= base_url('dashboard/dashboard_detail')?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Company Name</label>
                  <select class="form-control" name="employer_name">
                  <?php foreach($employers as $employer): ?>
                        <option value="<?= $employer['id']?>"><?= $employer['company_name']?></option>
                      <?php endforeach; ?> 
                  </select>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Task Name</label>
										<!--<input type="text" class="form-control" name="task_name" value = "">-->
										<select class="form-control task" name="task_name">
											<option value="" hidden>Select Task</option>
											<?php foreach($tasks as $task): ?>
												<option value="<?= $task['id']?>"><?= $task['name']?></option>
											<?php endforeach; ?> 
										</select>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1"> Category</label>
										<!--<input type="text" class="form-control" name="sub_task_name" value = "">-->

										<select class="form-control sub_task" name="sub_task_name">
											<option value="" hidden>Select Category First</option>
										</select>
                  </div>
                  <div class="form-group">
                     <label for="exampleInputPassword1">Assign User</label>
                  <select class="form-control" name="project_manager">
                  <?php foreach($employees as $employee): ?>
                        <option value="<?= $employee['id']?>"><?= $employee['name']?></option>
                      <?php endforeach; ?> 
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="">Deadline</label>
                    <input type="date" class="form-control" id="" name="completion" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="">Time By Govt</label>
                    <input type="date" class="form-control" id=""name="timeby" placeholder="">
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
		
       /* $(function ()
        {
         
            $('.popup_error').hide();
            $('form#add-employee').submit(function (e)
            {
                e.preventDefault();
                var url = $(this).attr('action');
                var postData = $(this).serialize();
                $.post(url, postData, function (o)
                {

                  if (o.result == 1)
                    {   
                       
                        window.location.assign('<?= base_url();?>employee');
                       
                    }
                  else if (o.result == 0)
                    { 
                   
                       $('.popup_error').show().html('All fields are Mandatory').delay(3000).fadeOut('slow');
                    } 
                  else
                  {
                    $('.popup_error').show().html('Internal Server Error').delay(3000).fadeOut('slow');
                  }  

                }, 'json');
            });
         

        });*/


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
											$('.super_sub_task').html('<option value="">Select Category first</option>'); 
									}
							}); 
					}else{
							$('.sub_task').html('<option value="">Select Task first</option>');
							$('.super_sub_task').html('<option value="">Select Category first</option>'); 
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
							$('.super_sub_task').html('<option value="">Select Category first</option>'); 
					}
			});
	});
    </script>
