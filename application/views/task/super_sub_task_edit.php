
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Super Task</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Super Task</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
         <div class="col-md-3"></div>
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-default" style="border-radius: 15px">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form id="add-task" action="<?= base_url('task/post_edit_super_sub_task')?>" method="POST">
								<input type="hidden" name="super_taskid" value="<?= $Super_tasks['id'] ?>">
								<input type="hidden" name="subtask_id" value="<?= $Super_tasks['subtask_id'] ?>">
                <div class="card-body">
									<div class="row">
										<div class="col-md-12">
												<div class="form-group">
													<label for="exampleInputEmail1">Super Task</label>
													<input type="text" class="form-control" name="super_task" value="<?= $Super_tasks['super_task_Name'] ?>" placeholder="Enter super task Name">
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
            <!-- /.card -->


        </div>
         <div class="col-md-3"></div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
