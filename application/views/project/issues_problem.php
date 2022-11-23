

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
                <h3 class="card-title"> Task Issues</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
					<div class="col-sm-12 col-md-10 col-md-offset-1">
					<?php foreach($project_issues as $issuesRow){ ?>
					
							<div class="issuesbody">
							<span class="roundicon timelinetag fa fa-tags"></span>&nbsp;<p style = "display: inline;font-size:18px;"><?= $issuesRow['company_name']; ?></p>
							<?php if($issuesRow['problems_issues'] != ''){ ?>
								<p style = "font-size:18px;"><b>Issue:-</b>&nbsp;<?= $issuesRow['problems_issues']; ?></p>
							<?php }if($issuesRow['short_out_issues'] != ''){ ?>
								<p style = "font-size:18px;"><b>Short Out Issue:-</b>&nbsp;<?= $issuesRow['short_out_issues']; ?></p>
							<?php } ?>
							
							<span class="time-right"><?php echo date('d-m-Y H:i',strtotime($issuesRow['created_at'])); ?></span>
							
							<a href="https://wa.me/<?= $issuesRow['mobile_number']?>" target="_blank"><img src="<?= base_url('uploads/icon/WhatsApp.png')?>" width="40" height="40" alt=""></a>
							</div>
						<?php } ?> 
						
							<form action="<?= base_url('project/post_add_problems_issues')?>" method="post" enctype="multipart/form-data">
							<?php $project_id = $this->uri->segment(3); ?>
							<input type="hidden" class="form-control" name="project_id" value="<?php echo $project_id; ?>">
								<div class="media">
									<div class="media-body">
									<p><b>ADD YOUR ISSUE HERE:</b></p>
									<textarea class="form-control" name="problems_issues" id ="problems_issues" ></textarea>
									<p><b>ADD YOUR SHORT OUT ISSUE HERE:</b></p>
									<textarea class="form-control" name="short_out_issues" id ="short_out_issues" ></textarea>
									<button type="submit" class="btn btn-primary btn-block" name="log_submit" value="add-log">ADD</button>
									</div>

								</div>
							</form>
					</div>
														
				</div>
                <!-- /.card-body -->

                <div class="card-footer">
                  
                </div>

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


<style>
	
.issuesbody {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.issuesbody::after {
  content: "";
  clear: both;
  display: table;
}

.issuesbody img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.issuesbody img.right {
  float: right;
  max-width: 100px;
  width: 100%;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
.roundicon{
	height: 36px;
    width:  36px;
	padding: 9px;
	}
.timelinetag{
	background-color: #1eb1e6;
	border-radius: 50%;
	font-size:22px;
	color:white;
	padding: 8px;
	display: inline-block;
}
</style>
