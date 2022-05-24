
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
              <form id="add-group" action="<?= base_url('employee/post_edit_employee/'.$employeeId)?>" method="POST">
                <div class="card-body">
                <div class="row">
                <div class="col-md-12">
                     <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter contact Person Name" required=""><br/>
                    <label for="exampleInputEmail2">Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail2" name="email" placeholder="Enter Email Id" required="">
                    <div id="" class="popup_error" style="font-size: 13px;color:#CC0000;"></div>
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
