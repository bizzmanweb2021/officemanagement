

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category</h1>
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
                <h3 class="card-title">Enter Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url('task/post_add_sub_task')?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
									<input type="hidden" class="form-control" name="task_id" value="<?= $tasks['taskid']; ?>">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
													<label for="">Task Name</label>
													<input type="text" class="form-control" name="" value="<?= $tasks['taskname']; ?>" readonly>
											</div>
										</div>
									</div>
									<div class="AddMoreSubTask">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for=""> Category Nmae</label>
													<input type="text" class="form-control" name="subTask[]" placeholder="Enter Category Name">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<button type="button" class="btn btn-primary AddMoreSubTaskTab">Add More Category</button>
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
var subTask_text ='	<div class="row"><div class="col-md-6"><div class="form-group"><input type="text" class="form-control" name="subTask[]" placeholder="Enter Category"></div></div></div>';

$('.AddMoreSubTask').append(subTask_text);

});

</script>


