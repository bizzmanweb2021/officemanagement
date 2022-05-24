

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
                <h3 class="card-title">Enter Task Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url('task/post_add_super_sub_task')?>" method="post" enctype="multipart/form-data">
							<?php $TaskId = $this->uri->segment(3); ?>
							<input type="hidden" class="form-control" name="TaskId" value="<?= $TaskId ?>">
                <div class="card-body">
					<div class="form-group">
						<label for="exampleInputPassword1">Name of the Client</label>
						<select class="form-control" name="sub_task_name">
							<?php foreach($sub_tasks as $subtasksRow): ?>
							<option value="<?= $subtasksRow['id']?>"><?= $subtasksRow['name']?></option>
							 <?php endforeach; ?> 
						</select>
					</div>
					<div class="AddMoreSubTask">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Add Super-Task</label>
									<input type="text" class="form-control" name="superTask[]" placeholder="Enter Sub-Task">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<button type="button" class="btn btn-primary AddMoreSubTaskTab">Add More Super-Task</button>
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script type="text/javascript">

$('.AddMoreSubTaskTab').click(function() {
var subTask_text ='	<div class="row"><div class="col-md-6"><div class="form-group"><input type="text" class="form-control" name="superTask[]" placeholder="Enter Sub-Task"></div></div></div>';

$('.AddMoreSubTask').append(subTask_text);

});

</script>
