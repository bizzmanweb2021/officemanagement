  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Company Register</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Company</li>
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
        <div class="col-md-2"></div>
          <div class="col-md-8" >
            <!-- general form elements -->
            <div class="card card-default" style="border-radius: 15px">
              
              <!-- /.card-header -->
              <!-- form start -->
							<?php foreach($editEmployers as $editEmployersRow){ ?>
              <form action="<?= base_url('employer/post_edit_employer')?>" method="POST" enctype="multipart/form-data">

								<input type="hidden" class="form-control" value="<?= $editEmployersRow['id'] ?>" name="company_id">
                <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Group*</label>
                  <select class="form-control" name="group">
                     <?php foreach($groups as $group): ?>
                        <option value="<?= $group['id']?>"<?php if($editEmployersRow['company_vertical'] == $group['id']){ ?>selected <?php } ?>><?= $group['name']?></option>
                      <?php endforeach; ?> 
                  </select>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Name of the Company*</label>
                    <input type="text" class="form-control" value="<?= $editEmployersRow['company_name'] ?>" name="company_name" placeholder="Enter company name">
                  </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Contact Person*</label>
                    <input type="text" class="form-control" value="<?= $editEmployersRow['contact_person'] ?>" name="contact_person" placeholder="Enter Your Name">
                  </div>
                </div>
                </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Registered Office Address*</label>
                     <textarea class="form-control" rows="3" name="registered_office_address" ><?= $editEmployersRow['registered_office_address'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Corporate Office Address</label>
                     <textarea class="form-control" rows="3" name="corporate_office_address"><?= $editEmployersRow['corporate_office_address'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Admin Office Address</label>
                     <textarea class="form-control" rows="3" name="admin_office_address"><?= $editEmployersRow['admin_office_address'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Factory Address</label>
                     <textarea class="form-control" rows="3" name="factory_address"><?= $editEmployersRow['factory_address'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Branch Address</label>
                     <textarea class="form-control" rows="3" name="branch_address"><?= $editEmployersRow['branch_address'] ?></textarea>
                  </div>
                    <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Email*</label>
                    <input type="email" class="form-control" name="email" value="<?= $editEmployersRow['email'] ?>">
                  </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Website*</label>
                    <input type="text" class="form-control" name="website"  value="<?= $editEmployersRow['website'] ?>">
                  </div>
                </div>
                </div>
                <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Office Number*</label>
                    <input type="text" class="form-control" name="office_number" value="<?= $editEmployersRow['office_number'] ?>">
                  </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Mobile Number</label>
                    <input type="text" class="form-control" name="mobile_number" value="<?= $editEmployersRow['mobile_number'] ?>">
                  </div>
                </div>
                </div>
                 <div class="form-group">
                    <label for="exampleInputFile">Works of Client</label>
                     <textarea class="form-control" rows="3" name="work_of_client" placeholder="Works of client"><?= $editEmployersRow['work_of_client'] ?></textarea>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <div id="" class="popup_error" style="font-size: 13px;color:#CC0000;"></div>
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
              </form>
							<?php } ?>
            </div>
            <!-- /.card -->


        </div>
        <div class="col-md-2"></div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

      