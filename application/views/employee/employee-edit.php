
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Employee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Employee</li>
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
              <div class="col-md-3"></div>
            <!-- general form elements -->
            <div class="card card-default" style="border-radius: 15px">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form id="add-group" action="<?= base_url('employee/post_edit_employee/')?>" method="POST">
							<input type="hidden" class="form-control" id="" name="user_id" value="<?= $employeesDetais['id']; ?>">
								<div class="card-body">
                  <div class="row">
                      <div class="col-md-6"> 
												<div class="form-group">
                    			<label for="">Name</label>
                    			<input type="text" class="form-control" id="" name="name" placeholder="Enter Name" value="<?= $employeesDetais['name']; ?>">
                  			</div>
											</div>
                    <div class="col-md-6">
												<div class="form-group">
													<label for="">Email</label>
													<input type="email" class="form-control" id="" name="email" placeholder="Enter Email" value="<?= $employeesDetais['email']; ?>">
												</div>
										</div>
									</div>
									<div class="row">
                  	<div class="col-md-6">
											<div class="form-group">
												<label for="">Username</label>
												<input type="text" class="form-control" id="" name="username" placeholder="Enter Username" value="<?= $employeesDetais['username']; ?>">
											</div>
                  	</div>
                  	<div class="col-md-6">
											<div class="form-group">
												<label for="">Password</label>
												<input type="text" class="form-control" id=""name="password" placeholder="Enter Password">
											</div>
                  	</div>
                	</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
													<label for="exampleInputPassword1">Employee Role</label>
													<select class="form-control" name="role_id">
														<option hidden>Select Role</option>
														<?php foreach($empRole as $empRoleRow): ?>
																<option value="<?= $empRoleRow['id']?>" <?php if($empRoleRow['id'] == $employeesDetais['role_id']){ ?> selected <?php } ?>><?= $empRoleRow['name']?></option>
															<?php endforeach; ?> 
													</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
													<label for="exampleInputPassword1">Reporting Manager</label>
													<select class="form-control" name="reporting_manager">
														<?php foreach($employees as $employee): ?>
																<option value="<?= $employee['id']?>"<?php if($employee['id'] == $employeesDetais['reporting_manager']){ ?> selected <?php } ?>><?= $employee['name']?></option>
															<?php endforeach; ?> 
													</select>
											</div>
										</div>
										
									</div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
                <!-- /.card-body -->

                
              </form>
            </div>
            <!-- /.card -->


        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
