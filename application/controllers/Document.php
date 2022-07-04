<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends CI_Controller
{ 
	public function __construct()
	{
		parent:: __construct();
		$this->load->helper('download');
	}
 
	
    public function view_details()
	{
		
        $data['image'] = $this->Document->getRows();
		$data['employers'] = $this->Employer->getAllEmployers();
		$data['employees'] = $this->Employee->getAllEmployees();
        $id = $this->uri->segment(3);
        $data['folder'] = $this->Project->getData($id);

		if($this->session->has_userdata('user')!=NULL)
		{
			$data['images']=$this->Document->get_All_Images($this->session->userdata('user'));
			//$data['project_id']=$this->uri->segment(3);
			$this->layout->view('document/document',$data);
			
		}
		else
		{
			redirect('dashboard');
		}
	}
	
	public function file_upload()
	{
        //$data['image'] = $this->Project->getRows();
		//$data['docfile'] = $this->Document->getRowss();
		//$data['companies_numrow'] = $this->Document->registrars_companies_numrow();
		$data['employers'] = $this->Employer->getAllEmployers();
		$data['employees'] = $this->Employee->getAllEmployees();
		$data['form_number'] = $this->Document->getAllform_number();
		$data['tds_tcs_form_name'] = $this->Document->getAlltds_tcs_form_name();
		$id = $this->uri->segment(3);
		$data['registrars_companies'] = $this->Document->all_registrars_companies($id);
		$data['income_tax'] = $this->Document->all_income_tax($id);
		$data['all_accounts'] = $this->Document->all_accounts($id);
		$data['all_trade_licence'] = $this->Document->all_trade_licence($id);
		$data['all_professional_tax'] = $this->Document->all_professional_tax($id);
		$data['all_gst'] = $this->Document->all_gst($id);
		$data['all_tds_and_tcs'] = $this->Document->all_tds_and_tcs($id);
		$data['all_kycDoc'] = $this->Document->getAll_kycDoc($id);
		$data['folder'] = $this->Project->getData($id);
		$data['file']=$this->Document->getDocImages($this->session->userdata('user'),$id);
		$data['company_verticals'] = $this->Document->getCompany_verticals();
		$this->layout->view('document/folder',$data);
		
	}

	public function post_add_image()
    {
    	$errorUploadType = "";
    	$statusMsg = "";
    	if($_POST!=NULL)
    	{
    		if($this->session->has_userdata('user')!=false)
    		{
    			if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0)
    			{
    				//$type=$this->input->post('type');
    				$project_id=$this->uri->segment(3);
    				//$sub_task_id=$this->uri->segment(4);
    				//$tagname = $this->Project->getTagName($project_id);
    				//$previous_image_tag=$this->Project->lastImageTag($project_id);
    				//$tag_number=$this->Project->tagNumber($previous_image_tag);
    				$filesCount = count($_FILES['files']['name']);
    				for($i = 0; $i < $filesCount; $i++)
    				{
						$_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
						$_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
						$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
						$_FILES['file']['error']     = $_FILES['files']['error'][$i]; 
						$_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
						$uploadPath = 'uploads/'; 
						$config['upload_path'] = $uploadPath; 
						$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx'; 
						$config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
                        $config['max_height'] = "";
                        $config['max_width'] = "";
						$this->load->library('upload', $config); 
						$this->upload->initialize($config);

						if($this->upload->do_upload('file'))
						{
	                        $fileData = $this->upload->data(); 
	                        $uploadData[$i]['image_name'] = $fileData['file_name']; 
	                        $uploadData[$i]['type']=$fileData['file_type'];
	                        //$uploadData[$i]['project'] = $project_id;
	                        //$uploadData[$i]['sub_task_id'] = $sub_task_id;
	                        //$uploadData[$i]['type'] = $type;
	                        //$uploadData[$i]['tag'] = $tagname.''.($tag_number+1);
	                        $uploadData[$i]['created_by'] = $this->session->userdata('user');
	                        $uploadData[$i]['status'] = $this->session->userdata('user');
	                        $uploaddata[$i]['date']=date("y-m-d");
	                        $uploadData[$i]['created_at'] = date("Y-m-d H:i:s");
							$uploadData[$i]['modified_at'] = date("Y-m-d H:i:s"); 
							$uploadData[$i]['file_assign_id'] = $this->uri->segment(3);
							//$tag_number++;
						}
						else
						{
							$errorUploadType .= $_FILES['file']['name'].' | ';
						}

						$errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
					}

					if(!empty($uploadData))
					{
						$insert = $this->Document->inserts($uploadData); 
						$id=$this->uri->segment(3);
						if($insert==true)
						{
							redirect('document/file_upload/'.$id);
						}
						else
						{
							$errorUploadType = 'Some problem occurred, please try again.';
						}					
					}
					else
					{
						$statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType;
					}
    			}
    			else
    			{
    				echo "Please Select File to Upload";
    			}
    		}
    		else
    		{
    			redirect('dashboard');
    		}
    	}
    	else
    	{
    		redirect('dashboard');
    	}
    }
    /*function dragDropUpload(){ 
        if(!empty($_FILES)){ 
            // File upload configuration 
            $uploadPath = 'uploads/'; 
            $config['upload_path'] = $uploadPath; 
            $config['allowed_types'] = '*'; 
             
            // Load and initialize upload library 
            $this->load->library('upload', $config); 
            $this->upload->initialize($config); 
             
            // Upload file to the server 
            if($this->upload->do_upload('file')){ 
                $fileData = $this->upload->data(); 
                $uploadData[$i]['image_name'] = $fileData['file_name'];
                $uploadData[$i]['type']=$fileData['file_type'];
	            $uploadData[$i]['created_by'] = $this->session->userdata('user');
	            $uploadData[$i]['status'] = $this->session->userdata('user');
	            //$uploaddata[$i]['date']=date("y-m-d");
	            $uploadData[$i]['created_at'] = date("Y-m-d H:i:s");
	            $uploadData[$i]['modified_at'] = date("Y-m-d H:i:s");              
                 
                // Insert files info into the database 
                //$insert = $this->Document->inserts($uploadData); 
            } 
            if(!empty($uploadData))
			{
				$insert = $this->Document->inserts($uploadData); 
				if($insert==true)
				{
					redirect('document/file_upload/');
				}
				else
				{
					$errorUploadType = 'Some problem occurred, please try again.';
				}					
			}
			else
			{
				$statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType;
			}
        } 
    } */

    public function download($id)
	{
		if (!empty($id)) {
			//load download helper
			//$this->load->helper('download');

			//get file info from database
			$fileInfo = $this->Document->getRows(array('id' => $id));

			//file path
			$file = 'uploads/' . $fileInfo['image_name'];
 
			//download file from directory
			force_download($file, NULL);
		}
	}
	
	public function fetchSearchYearData()
	{
		$year = $_POST['year'];
		
		$data['Searchfolder'] = $this->Document->getSearchYeardata($year);
		$data['folder'] = $this->Project->getData();

		$this->load->view('document/searchFolder',$data); 
	}
	public function searchCompanyData()
	{
		$companyName = $_POST['companyName'];
		$folderid = $_POST['folder_id'];
		
		$data['file'] = $this->Document->getSearchCompanydata($companyName,$folderid);
		
		//$data['folder'] = $this->Project->getData();

		$this->load->view('document/searchFile',$data); 
	}
	public function searchGroupNameData()
	{
		$group_name = $_POST['group_name'];
		$folderid = $_POST['folder_id'];
		
		$data['file'] = $this->Document->getSearchGroupNamedata($group_name,$folderid);

		$this->load->view('document/searchFile',$data); 
	}
	public function searchFromDateData()
	{
		$from_date = $_POST['from_date'];
		$to_date = $_POST['to_date'];

		/*$from_date= date('Y-m-d', strtotime($_POST['from_date']));
		$to_date= date('Y-m-d', strtotime($_POST['to_date']));*/
		$folderid = $_POST['folder_id'];

		$data['file'] = $this->Document->getSearchFromDatedata($from_date,$to_date,$folderid);
		//$data['folder'] = $this->Project->getData();

		$this->load->view('document/searchFile',$data); 
	}
	public function capture_image()
	{
		$project_id = $this->input->post('projectsId');
		$folderid = $this->input->post('folderid');
		extract($_POST);
		$data = array(
			'image_name' => $this->input->post('webcam'),
			'type' => "capture/image",
			'project' => $project_id,
			'roc_id' => $registrars_companiesId,
			'folder_assign_id' => $folderid,
			'created_by' => $this->session->userdata('user'),
			'status'	=> $this->session->userdata('user'),
			'created_at'	=> date("Y-m-d H:i:s"),
			'modified_at' => date("Y-m-d H:i:s")
		);

		$insert = $this->Project->storecaptureimage($data);
		if ($insert == true) {
			return redirect('document/file_upload/' . $folderid);
		} else {
			$errorUploadType = 'Some problem occurred, please try again.';
		}
	}
	public function showSrnCheck(){
		
		$srnCheck = $_GET['srnCheck'];
		//$date = date("Y-m-d");
		
		$srnCheck_sql  = "SELECT registrars_of_companies.srn 
		FROM registrars_of_companies 
		WHERE registrars_of_companies.srn = '".$srnCheck."'"; 
		
		$srnCheck_query = $this->db->query($srnCheck_sql);
		$srnCheck_rownum = $srnCheck_query->num_rows();
		echo json_encode( $srnCheck_rownum );

	}
	public function showStatutoryDueDate(){
		
		$rocform_number = $_GET['form_number'];
		//$date = date("Y-m-d");
		
		$rocform_number_sql  = "SELECT roc_form_number.statutory_due_date 
		FROM roc_form_number 
		WHERE roc_form_number.id = '".$rocform_number."'"; 
		
		$rocform_number_query = $this->db->query($rocform_number_sql);
		$rocform_date = $rocform_number_query->result_array();
		foreach($rocform_date as $rocform_dateRow){
			$statutory_due_date = $rocform_dateRow['statutory_due_date'];
		}
		echo $statutory_due_date;

	}
	public function post_add_registrars_companies()
	{
		$folderid = $this->input->post("folderid");
		extract($_POST);
		$data = array(
			'folder_assign_id' => $folderid,
			'form_number_id' => $form_number,
			'company_name' => $company_name,
			'form_name' => $form_name,
			'statutory_due_date' => $roc_due_date,
			'created_by' => $created_by,
			'year_period' => $year_period,
			'date_of_filing'	=> $date_of_filing,
			'srn'	=> $srn,
			'amount' => $amount,
			'type_ofFee' => $type_ofFee
		);

		$insert = $this->Document->addRegistrars_companies($data);
		$insert_id = $this->db->insert_id();

		$this->load->library('upload');
		//echo $_FILES['roc_challan']['name'];exit;
		if($_FILES['roc_challan']['name'] != '')
		{

			$_FILES['file']['name']       = $_FILES['roc_challan']['name'];
			$_FILES['file']['type']       = $_FILES['roc_challan']['type'];
			$_FILES['file']['tmp_name']   = $_FILES['roc_challan']['tmp_name'];
			$_FILES['file']['error']      = $_FILES['roc_challan']['error'];
			$_FILES['file']['size']       = $_FILES['roc_challan']['size'];

			// File upload configuration
			$uploadPath = 'uploads/roc_img/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
			$config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
			$config['max_height'] = "";
			$config['max_width'] = "";

			// Load and initialize upload library
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// Upload file to server
			if($this->upload->do_upload('file')){
				// Uploaded file data
				$imageData = $this->upload->data();
				$uploadImgData['roc_challan'] = $imageData['file_name'];
				$updateroc_formData['challan_type'] = $imageData['file_type'];
			}
			$updatechallan =$this->Main->update('id',$insert_id, $uploadImgData,'registrars_of_companies');         
		} 

		if($_FILES['roc_form']['name'] != '')
		{

			$_FILES['file']['name']       = $_FILES['roc_form']['name'];
			$_FILES['file']['type']       = $_FILES['roc_form']['type'];
			$_FILES['file']['tmp_name']   = $_FILES['roc_form']['tmp_name'];
			$_FILES['file']['error']      = $_FILES['roc_form']['error'];
			$_FILES['file']['size']       = $_FILES['roc_form']['size'];

			// File upload configuration
			$uploadPath = 'uploads/roc_img/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
			$config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
			$config['max_height'] = "";
			$config['max_width'] = "";

			// Load and initialize upload library
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// Upload file to server
			if($this->upload->do_upload('file')){
				// Uploaded file data
				$imageData = $this->upload->data();
				$updateroc_formData['roc_form'] = $imageData['file_name'];
				$updateroc_formData['form_type'] = $imageData['file_type'];
			}
			$updateroc_form =$this->Main->update('id',$insert_id, $updateroc_formData,'registrars_of_companies');         
		} 
		if($_FILES['additional_file_1']['name'] != '')
		{

			$_FILES['file']['name']       = $_FILES['additional_file_1']['name'];
			$_FILES['file']['type']       = $_FILES['additional_file_1']['type'];
			$_FILES['file']['tmp_name']   = $_FILES['additional_file_1']['tmp_name'];
			$_FILES['file']['error']      = $_FILES['additional_file_1']['error'];
			$_FILES['file']['size']       = $_FILES['additional_file_1']['size'];

			// File upload configuration
			$uploadPath = 'uploads/roc_img/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
			$config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
			$config['max_height'] = "";
			$config['max_width'] = "";

			// Load and initialize upload library
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// Upload file to server
			if($this->upload->do_upload('file')){
				// Uploaded file data
				$imageData = $this->upload->data();
				$updateroc_additionalData['additional_file_1'] = $imageData['file_name'];
				$updateroc_additionalData['additional_file1_type'] = $imageData['file_type'];
			}
			$updateroc_additional1 =$this->Main->update('id',$insert_id, $updateroc_additionalData,'registrars_of_companies');         
		}
		if($_FILES['additional_file_2']['name'] != '')
		{

			$_FILES['file']['name']       = $_FILES['additional_file_2']['name'];
			$_FILES['file']['type']       = $_FILES['additional_file_2']['type'];
			$_FILES['file']['tmp_name']   = $_FILES['additional_file_2']['tmp_name'];
			$_FILES['file']['error']      = $_FILES['additional_file_2']['error'];
			$_FILES['file']['size']       = $_FILES['additional_file_2']['size'];

			// File upload configuration
			$uploadPath = 'uploads/roc_img/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
			$config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
			$config['max_height'] = "";
			$config['max_width'] = "";

			// Load and initialize upload library
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// Upload file to server
			if($this->upload->do_upload('file')){
				// Uploaded file data
				$imageData = $this->upload->data();
				$updateroc_additional2Data['additional_file_2'] = $imageData['file_name'];
				$updateroc_additional2Data['additional_file2_type'] = $imageData['file_type'];
			}
			$updateroc_additional2 =$this->Main->update('id',$insert_id, $updateroc_additional2Data,'registrars_of_companies');         
		}

		if ($insert == true || $updatechallan == true || $updateroc_form == true || $updateroc_additional1 == true || $updateroc_additional2 == true) {
			return redirect('document/file_upload/'.$folderid);
		} else {
			$errorUploadType = 'Some problem occurred, please try again.';
		}
	}
	public function post_add_form_number()
	{
		$folderid = $this->input->post("folderid");
		extract($_POST);
		$data = array(
			'form_number' => $form_number,
			'statutory_due_date' => $statutory_due_date,
		);

		$insert = $this->Document->addForm_number($data);
		if ($insert == true) {
			return redirect('document/file_upload/'.$folderid);
		} else {
			$errorUploadType = 'Some problem occurred, please try again.';
		}
	}
	public function post_add_tds_form_number()
	{
		$folderid = $this->input->post("folderid");
		extract($_POST);
		$data = array(
			'form_name' => $tdsform_number,
		);

		$insert = $this->Main->insert('tds_tcs_form_name',$data);
		
		if ($insert == true) {
			return redirect('document/file_upload/'.$folderid);
		} else {
			$errorUploadType = 'Some problem occurred, please try again.';
		}
	}
	public function updateroc_status()
	{
		$folderid = $this->input->post("folderid");
		$rocStatusId = $this->input->post("rocStatusId");
		extract($_POST);
		$roc_Data = array(
			'status' => $status_name
		);

		$updateroc_form =$this->Main->update('id',$rocStatusId, $roc_Data,'registrars_of_companies');  
		if ($updateroc_form == true) {
			return redirect('document/file_upload/'.$folderid);
		} else {
			$errorUploadType = 'Some problem occurred, please try again.';
		}
	}
	public function delete_form_number()
	{
		$form_numberid = $this->uri->segment(3);
		$folderid = $this->uri->segment(4);

		$result=$this->Main->delete('id',$form_numberid,'roc_form_number');
		if($result==true)
		{
			redirect('document/file_upload/'.$folderid);
		}
	}
	public function delete_tdsform_number()
	{
		$form_numberid = $this->uri->segment(3);
		$folderid = $this->uri->segment(4);

		$result=$this->Main->delete('id',$form_numberid,'tds_tcs_form_name');
		if($result==true)
		{
			redirect('document/file_upload/'.$folderid);
		}
	}
	public function post_add_IncomeTax(){
		$folderid = $this->input->post("folderid");
		extract($_POST);
		$data = array(
			'folder_id' => $folderid,
			'company_id' => $company_name,
			'date_of_filing' => $date_of_filing,
			'asstment_year' => $year_period,
			'acknowledement_no' => $acknowledement_no,
			'computation' => $computation
		);

		$insert = $this->Main->insert('income_tax',$data);
		$insert_id = $this->db->insert_id();

		$this->load->library('upload');
		//echo $_FILES['roc_challan']['name'];exit;
		if($_FILES['XML_file']['name'] != '')
		{

			$_FILES['file']['name']       = $_FILES['XML_file']['name'];
			$_FILES['file']['type']       = $_FILES['XML_file']['type'];
			$_FILES['file']['tmp_name']   = $_FILES['XML_file']['tmp_name'];
			$_FILES['file']['error']      = $_FILES['XML_file']['error'];
			$_FILES['file']['size']       = $_FILES['XML_file']['size'];

			// File upload configuration
			$uploadPath = 'uploads/income_tax/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
			$config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
			$config['max_height'] = "";
			$config['max_width'] = "";

			// Load and initialize upload library
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// Upload file to server
			if($this->upload->do_upload('file')){
				// Uploaded file data
				$imageData = $this->upload->data();
				$uploadImgData['XML_file'] = $imageData['file_name'];
			}
			$updatechallan =$this->Main->update('id',$insert_id, $uploadImgData,'income_tax');         
		} 

		if($_FILES['balance_sheet']['name'] != '')
		{

			$_FILES['file']['name']       = $_FILES['balance_sheet']['name'];
			$_FILES['file']['type']       = $_FILES['balance_sheet']['type'];
			$_FILES['file']['tmp_name']   = $_FILES['balance_sheet']['tmp_name'];
			$_FILES['file']['error']      = $_FILES['balance_sheet']['error'];
			$_FILES['file']['size']       = $_FILES['balance_sheet']['size'];

			// File upload configuration
			$uploadPath = 'uploads/income_tax/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
			$config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
			$config['max_height'] = "";
			$config['max_width'] = "";

			// Load and initialize upload library
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// Upload file to server
			if($this->upload->do_upload('file')){
				// Uploaded file data
				$imageData = $this->upload->data();
				$updateroc_formData['balance_sheet'] = $imageData['file_name'];
			}
			$updateroc_form =$this->Main->update('id',$insert_id, $updateroc_formData,'income_tax');         
		} 
		if($_FILES['profit_and_loss']['name'] != '')
		{

			$_FILES['file']['name']       = $_FILES['profit_and_loss']['name'];
			$_FILES['file']['type']       = $_FILES['profit_and_loss']['type'];
			$_FILES['file']['tmp_name']   = $_FILES['profit_and_loss']['tmp_name'];
			$_FILES['file']['error']      = $_FILES['profit_and_loss']['error'];
			$_FILES['file']['size']       = $_FILES['profit_and_loss']['size'];

			// File upload configuration
			$uploadPath = 'uploads/income_tax/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
			$config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
			$config['max_height'] = "";
			$config['max_width'] = "";

			// Load and initialize upload library
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// Upload file to server
			if($this->upload->do_upload('file')){
				// Uploaded file data
				$imageData = $this->upload->data();
				$updateroc_additionalData['profit_and_loss'] = $imageData['file_name'];
			}
			$updateroc_additional1 =$this->Main->update('id',$insert_id, $updateroc_additionalData,'income_tax');         
		}

		if ($insert == true || $updatechallan == true || $updateroc_form == true || $updateroc_additional1 == true) {
			return redirect('document/file_upload/'.$folderid);
		} else {
			$errorUploadType = 'Some problem occurred, please try again.';
		}
	}
	public function delete_incomeTax(){

		$taxid = $this->uri->segment(4);
		$folderid = $this->uri->segment(3);
		$result=$this->Main->delete('id',$taxid,'income_tax');
		if($result==true)
		{
			 redirect('document/file_upload/'.$folderid);
		}
	}
	public function post_add_accounts(){
		$folderid = $this->input->post("folderid");
		extract($_POST);
		$data = array(
			'folder_id' => $folderid,
			'company_id' => $company_name,
			'loan_confirmation' => $loan_confirmation,
			'trail_balance' => $trail_balance,
			'memorandum_article_association' => $memorandum_article_association
		);

		$insert = $this->Main->insert('accounts',$data);
		$insert_id = $this->db->insert_id();

		$this->load->library('upload');
		//echo $_FILES['roc_challan']['name'];exit;
		if($_FILES['bank_statement']['name'] != '')
		{

			$_FILES['file']['name']       = $_FILES['bank_statement']['name'];
			$_FILES['file']['type']       = $_FILES['bank_statement']['type'];
			$_FILES['file']['tmp_name']   = $_FILES['bank_statement']['tmp_name'];
			$_FILES['file']['error']      = $_FILES['bank_statement']['error'];
			$_FILES['file']['size']       = $_FILES['bank_statement']['size'];

			// File upload configuration
			$uploadPath = 'uploads/accounts/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
			$config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
			$config['max_height'] = "";
			$config['max_width'] = "";

			// Load and initialize upload library
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// Upload file to server
			if($this->upload->do_upload('file')){
				// Uploaded file data
				$imageData = $this->upload->data();
				$uploadImgData['bank_statement'] = $imageData['file_name'];
			}
			$updatechallan =$this->Main->update('id',$insert_id, $uploadImgData,'accounts');         
		} 

		if($_FILES['balance_sheet']['name'] != '')
		{

			$_FILES['file']['name']       = $_FILES['balance_sheet']['name'];
			$_FILES['file']['type']       = $_FILES['balance_sheet']['type'];
			$_FILES['file']['tmp_name']   = $_FILES['balance_sheet']['tmp_name'];
			$_FILES['file']['error']      = $_FILES['balance_sheet']['error'];
			$_FILES['file']['size']       = $_FILES['balance_sheet']['size'];

			// File upload configuration
			$uploadPath = 'uploads/accounts/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
			$config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
			$config['max_height'] = "";
			$config['max_width'] = "";

			// Load and initialize upload library
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// Upload file to server
			if($this->upload->do_upload('file')){
				// Uploaded file data
				$imageData = $this->upload->data();
				$updateroc_formData['balance_sheet'] = $imageData['file_name'];
			}
			$updateroc_form =$this->Main->update('id',$insert_id, $updateroc_formData,'accounts');         
		} 
		if($_FILES['profit_and_loss']['name'] != '')
		{

			$_FILES['file']['name']       = $_FILES['profit_and_loss']['name'];
			$_FILES['file']['type']       = $_FILES['profit_and_loss']['type'];
			$_FILES['file']['tmp_name']   = $_FILES['profit_and_loss']['tmp_name'];
			$_FILES['file']['error']      = $_FILES['profit_and_loss']['error'];
			$_FILES['file']['size']       = $_FILES['profit_and_loss']['size'];

			// File upload configuration
			$uploadPath = 'uploads/accounts/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
			$config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
			$config['max_height'] = "";
			$config['max_width'] = "";

			// Load and initialize upload library
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// Upload file to server
			if($this->upload->do_upload('file')){
				// Uploaded file data
				$imageData = $this->upload->data();
				$updateroc_additionalData['profit_and_loss'] = $imageData['file_name'];
			}
			$updateroc_additional1 =$this->Main->update('id',$insert_id, $updateroc_additionalData,'accounts');         
		}
		if($_FILES['vouchers']['name'] != '')
		{

			$_FILES['file']['name']       = $_FILES['vouchers']['name'];
			$_FILES['file']['type']       = $_FILES['vouchers']['type'];
			$_FILES['file']['tmp_name']   = $_FILES['vouchers']['tmp_name'];
			$_FILES['file']['error']      = $_FILES['vouchers']['error'];
			$_FILES['file']['size']       = $_FILES['vouchers']['size'];

			// File upload configuration
			$uploadPath = 'uploads/accounts/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
			$config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
			$config['max_height'] = "";
			$config['max_width'] = "";

			// Load and initialize upload library
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// Upload file to server
			if($this->upload->do_upload('file')){
				// Uploaded file data
				$imageData = $this->upload->data();
				$updateroc_additionalData['vouchers'] = $imageData['file_name'];
			}
			$updateroc_additional2 =$this->Main->update('id',$insert_id, $updateroc_additionalData,'accounts');         
		}

		if ($insert == true || $updatechallan == true || $updateroc_form == true || $updateroc_additional1 == true || $updateroc_additional2 = true) {
			return redirect('document/file_upload/'.$folderid);
		} else {
			$errorUploadType = 'Some problem occurred, please try again.';
		}
	}

	public function post_add_professional_tax(){

		$folderid = $this->input->post("folderid");
		
		extract($_POST);
		$data = array(
			'company_id' => $company_name,
			'folder_id' => $folderid,
			'professionalTax_amount' => $professionalTax_amount,
			'professionalTax_date' => $professionalTax_date
		);
		
		$this->db->insert('professional_tax', $data);
		$insert_id = $this->db->insert_id();

		$this->load->library('upload');
		if($_FILES['professionalTax_challan']['name'] != '')
		{

			$_FILES['file']['name']       = $_FILES['professionalTax_challan']['name'];
			$_FILES['file']['type']       = $_FILES['professionalTax_challan']['type'];
			$_FILES['file']['tmp_name']   = $_FILES['professionalTax_challan']['tmp_name'];
			$_FILES['file']['error']      = $_FILES['professionalTax_challan']['error'];
			$_FILES['file']['size']       = $_FILES['professionalTax_challan']['size'];

			// File upload configuration
			$uploadPath = 'uploads/professionalTax/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
			$config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
			$config['max_height'] = "";
			$config['max_width'] = "";

			// Load and initialize upload library
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// Upload file to server
			if($this->upload->do_upload('file')){
				// Uploaded file data
				$imageData = $this->upload->data();
				$uploadImgData['professionalTax_challan'] = $imageData['file_name'];
			} 
			$updateroc_additional = $this->Main->update('id',$insert_id, $uploadImgData,'professional_tax');      
		} 

		if ($insert == true || $updateroc_additional == true) {
			return redirect('document/file_upload/'.$folderid);
		} else {
			$errorUploadType = 'Some problem occurred, please try again.';
		}
	}
	public function post_add_gst(){

		$folderid = $this->input->post("folderid");
		
		extract($_POST);
		$data = array(
			'company_id' => $company_name,
			'folder_id' => $folderid,
			'return_file_type' => $return_file_type,
			'period' => $period,
			'payment' => $payment,
			'date_of_file' => $date_of_file,
		);
		
		$insert = $this->db->insert('gst', $data);
		
		if ($insert == true) {
			return redirect('document/file_upload/'.$folderid);
		} else {
			$errorUploadType = 'Some problem occurred, please try again.';
		}
	}
	public function post_add_trade_licence(){

		$folderid = $this->input->post("folderid");
		extract($_POST);
		$data = array(
			'folder_id' => $folderid,
			'company_id' => $company_name,
			'trade_licence_amount' => $trade_licence_amount,
			'trade_licence_date' => $trade_licence_date
		);
		
		$this->db->insert('trade_licence', $data);
		$insert_id = $this->db->insert_id();

		$this->load->library('upload');
		if($_FILES['trade_licence_challan']['name'] != '')
		{

			$_FILES['file']['name']       = $_FILES['trade_licence_challan']['name'];
			$_FILES['file']['type']       = $_FILES['trade_licence_challan']['type'];
			$_FILES['file']['tmp_name']   = $_FILES['trade_licence_challan']['tmp_name'];
			$_FILES['file']['error']      = $_FILES['trade_licence_challan']['error'];
			$_FILES['file']['size']       = $_FILES['trade_licence_challan']['size'];

			// File upload configuration
			$uploadPath = 'uploads/trade_licence/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
			$config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
			$config['max_height'] = "";
			$config['max_width'] = "";

			// Load and initialize upload library
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// Upload file to server
			if($this->upload->do_upload('file')){
				// Uploaded file data
				$imageData = $this->upload->data();
				$uploadImgData['trade_licence_challan'] = $imageData['file_name'];
			} 
			$updateroc_additional = $this->Main->update('id',$insert_id, $uploadImgData,'trade_licence');      
		} 

		if ($insert == true || $updateroc_additional == true) {
			return redirect('document/file_upload/'.$folderid);
		} else {
			$errorUploadType = 'Some problem occurred, please try again.';
		}
	}
	public function post_add_tdstcs(){

		$folderid = $this->input->post("folderid");
		
		extract($_POST);
		$data = array(
			'company_id' => $company_name,
			'folder_id' => $folderid,
			'form_id' => $form_name,
			'return_type' => $return_type,
			'financial_year' => $financial_year,
			'quarter' => $quarter,
			'date_of_file' => $date_of_file

		);
		
		$insert = $this->db->insert('tds_and_tcs', $data);
		
		if ($insert == true) {
			return redirect('document/file_upload/'.$folderid);
		} else {
			$errorUploadType = 'Some problem occurred, please try again.';
		}
	}
	public function delete_tradelicence(){

		$trade_licenceid = $this->uri->segment(4);
		$folderid = $this->uri->segment(3);		   

		$result = $this->Main->delete('id',$trade_licenceid,'trade_licence');
		
		redirect('document/file_upload/'.$folderid);
	}
	public function delete_tds_and_tcs(){

		$trade_licenceid = $this->uri->segment(4);
		$folderid = $this->uri->segment(3);		   

		$result = $this->Main->delete('id',$trade_licenceid,'tds_and_tcs');
		
		redirect('document/file_upload/'.$folderid);
	}
	public function delete_professionalTax(){

		$ptid = $this->uri->segment(4);
		$folderid = $this->uri->segment(3);		   

		$result = $this->Main->delete('id',$ptid,'professional_tax');
		
		redirect('document/file_upload/'.$folderid);
	}
	public function delete_gst(){

		$gstid = $this->uri->segment(4);
		$folderid = $this->uri->segment(3);		   

		$result = $this->Main->delete('id',$gstid,'gst');
		
		redirect('document/file_upload/'.$folderid);
	}
	public function delete_accounts(){

		$accountsid = $this->uri->segment(4);
		$folderid = $this->uri->segment(3);
		$balance_sheet = 0;
		$profit_and_loss = 0;
		$bank_statement = 0;
		$vouchers = 0;
		$accounts_sql = "SELECT accounts.*
			FROM accounts 
			WHERE accounts.id = '".$accountsid."'";
			$accounts_query = $this->db->query($accounts_sql);
			foreach($accounts_query->result_array() as $accounts_row){
				$balance_sheet = $accounts_row['balance_sheet'];
				$profit_and_loss = $accounts_row['profit_and_loss'];
				$bank_statement = $accounts_row['bank_statement'];
				$vouchers = $accounts_row['vouchers'];
			}
			$balance_sheet_files = glob('./uploads/accounts/'.$balance_sheet); 
			$profit_and_loss_file = glob('./uploads/accounts/'.$profit_and_loss); 
			$bank_statement_file = glob('./uploads/accounts/'.$bank_statement); 
			$vouchers_file = glob('./uploads/accounts/'.$vouchers); 
			
				if(is_file($balance_sheet_files)){
					unlink($balance_sheet_files);
				}
				if(is_file($profit_and_loss_file)){
					unlink($profit_and_loss_file);
				}
				if(is_file($bank_statement_file)){
					unlink($bank_statement_file);
				}
				if(is_file($vouchers_file)){
					unlink($vouchers_file);
				}
				   

		$result=$this->Main->delete('id',$accountsid,'accounts');
		
			redirect('document/file_upload/'.$folderid);
	}
	public function post_add_kycDoc(){

		$folderid = $this->input->post("folderid");
		extract($_POST);
		$data = array(
			'folder_id' => $folderid,
			'company_id' => $company_name
		);

		$insert = $this->Main->insert('kyc_documents',$data);
		$insert_id = $this->db->insert_id();

		$this->load->library('upload');
		//echo $_FILES['roc_challan']['name'];exit;
		if($_FILES['pan_card']['name'] != '')
		{

			$_FILES['file']['name']       = $_FILES['pan_card']['name'];
			$_FILES['file']['type']       = $_FILES['pan_card']['type'];
			$_FILES['file']['tmp_name']   = $_FILES['pan_card']['tmp_name'];
			$_FILES['file']['error']      = $_FILES['pan_card']['error'];
			$_FILES['file']['size']       = $_FILES['pan_card']['size'];

			// File upload configuration
			$uploadPath = 'uploads/kyc_doc/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
			$config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
			$config['max_height'] = "";
			$config['max_width'] = "";

			// Load and initialize upload library
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// Upload file to server
			if($this->upload->do_upload('file')){
				// Uploaded file data
				$imageData = $this->upload->data();
				$uploadImgData['pan_card'] = $imageData['file_name'];
			}
			$updatepan_card =$this->Main->update('id',$insert_id, $uploadImgData,'kyc_documents');         
		} 

		if($_FILES['aadhar_card']['name'] != '')
		{

			$_FILES['file']['name']       = $_FILES['aadhar_card']['name'];
			$_FILES['file']['type']       = $_FILES['aadhar_card']['type'];
			$_FILES['file']['tmp_name']   = $_FILES['aadhar_card']['tmp_name'];
			$_FILES['file']['error']      = $_FILES['aadhar_card']['error'];
			$_FILES['file']['size']       = $_FILES['aadhar_card']['size'];

			// File upload configuration
			$uploadPath = 'uploads/kyc_doc/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
			$config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
			$config['max_height'] = "";
			$config['max_width'] = "";

			// Load and initialize upload library
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// Upload file to server
			if($this->upload->do_upload('file')){
				// Uploaded file data
				$imageData = $this->upload->data();
				$updateroc_formData['aadhar_card'] = $imageData['file_name'];
			}
			$updateaadhar_card =$this->Main->update('id',$insert_id, $updateroc_formData,'kyc_documents');         
		} 
		if($_FILES['passport']['name'] != '')
		{

			$_FILES['file']['name']       = $_FILES['passport']['name'];
			$_FILES['file']['type']       = $_FILES['passport']['type'];
			$_FILES['file']['tmp_name']   = $_FILES['passport']['tmp_name'];
			$_FILES['file']['error']      = $_FILES['passport']['error'];
			$_FILES['file']['size']       = $_FILES['passport']['size'];

			// File upload configuration
			$uploadPath = 'uploads/kyc_doc/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
			$config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
			$config['max_height'] = "";
			$config['max_width'] = "";

			// Load and initialize upload library
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// Upload file to server
			if($this->upload->do_upload('file')){
				// Uploaded file data
				$imageData = $this->upload->data();
				$updateroc_additionalData['passport'] = $imageData['file_name'];
			}
			$updatepassport =$this->Main->update('id',$insert_id, $updateroc_additionalData,'kyc_documents');         
		}
		if($_FILES['voter_card']['name'] != '')
		{

			$_FILES['file']['name']       = $_FILES['voter_card']['name'];
			$_FILES['file']['type']       = $_FILES['voter_card']['type'];
			$_FILES['file']['tmp_name']   = $_FILES['voter_card']['tmp_name'];
			$_FILES['file']['error']      = $_FILES['voter_card']['error'];
			$_FILES['file']['size']       = $_FILES['voter_card']['size'];

			// File upload configuration
			$uploadPath = 'uploads/kyc_doc/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
			$config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
			$config['max_height'] = "";
			$config['max_width'] = "";

			// Load and initialize upload library
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// Upload file to server
			if($this->upload->do_upload('file')){
				// Uploaded file data
				$imageData = $this->upload->data();
				$updateroc_additionalData['voter_card'] = $imageData['file_name'];
			}
			$updatevoter_card = $this->Main->update('id',$insert_id, $updateroc_additionalData,'kyc_documents');         
		}
		if($_FILES['bank_passbook']['name'] != '')
		{

			$_FILES['file']['name']       = $_FILES['bank_passbook']['name'];
			$_FILES['file']['type']       = $_FILES['bank_passbook']['type'];
			$_FILES['file']['tmp_name']   = $_FILES['bank_passbook']['tmp_name'];
			$_FILES['file']['error']      = $_FILES['bank_passbook']['error'];
			$_FILES['file']['size']       = $_FILES['bank_passbook']['size'];

			// File upload configuration
			$uploadPath = 'uploads/kyc_doc/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
			$config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
			$config['max_height'] = "";
			$config['max_width'] = "";

			// Load and initialize upload library
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// Upload file to server
			if($this->upload->do_upload('file')){
				// Uploaded file data
				$imageData = $this->upload->data();
				$updateroc_additionalData['bank_passbook'] = $imageData['file_name'];
			}
			$updatebank_passbook =$this->Main->update('id',$insert_id, $updateroc_additionalData,'kyc_documents');         
		}

		if ($insert == true || $updatepan_card == true || $updateaadhar_card == true || $updatepassport == true || $updatevoter_card == true || $updatebank_passbook == true) {
			return redirect('document/file_upload/'.$folderid);
		} else {
			$errorUploadType = 'Some problem occurred, please try again.';
		}
	}
	public function delete_kycDoc(){

		$kycid = $this->uri->segment(4);
		$folderid = $this->uri->segment(3);

		$kyc_sql = "SELECT kyc_documents.*
			FROM kyc_documents 
			WHERE kyc_documents.id = '".$kycid."'";
			$kyc_query = $this->db->query($kyc_sql);
			foreach($kyc_query->result_array() as $kyc_row){
				$pan_card = $kyc_row['pan_card'];
				$aadhar_card = $kyc_row['aadhar_card'];
				$passport = $kyc_row['passport'];
				$voter_card = $kyc_row['voter_card'];
				$bank_passbook = $kyc_row['bank_passbook'];
			}
			$balance_sheet_files = glob('./uploads/kyc_doc/'.$pan_card); 
			$aadhar_card_file = glob('./uploads/accounts/'.$aadhar_card); 
			$passport_file = glob('./uploads/accounts/'.$passport); 
			$voter_card_file = glob('./uploads/accounts/'.$voter_card); 
			$bank_passbook_file = glob('./uploads/accounts/'.$bank_passbook); 
			
				if(is_file($balance_sheet_files)){
					unlink($balance_sheet_files);
				}
				if(is_file($aadhar_card_file)){
					unlink($aadhar_card_file);
				}
				if(is_file($passport_file)){
					unlink($passport_file);
				}
				if(is_file($voter_card_file)){
					unlink($voter_card_file);
				}
				if(is_file($bank_passbook_file)){
					unlink($bank_passbook_file);
				}
				   

		$result = $this->Main->delete('id',$kycid,'kyc_documents');
		
			redirect('document/file_upload/'.$folderid);
	}
	public function delete_roc(){

		$rocid = $this->uri->segment(4);
		$folderid = $this->uri->segment(3);		   

		$result = $this->Main->delete('id',$rocid,'registrars_of_companies');
		
		redirect('document/file_upload/'.$folderid);
	}
}
