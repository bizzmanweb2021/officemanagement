<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
	}

	public function index()
	{
		/*if($this->session->has_userdata('user')!=false)
		{
			$data['arr']=$this->Dashboard->getYears();
			$data['dashboard']=$this->Dashboard->getAllDashboard();
			$data['employers']=$this->Employer->getAllEmployers();
			$data['employees']=$this->Employee->getAllEmployees();
			$data['tasks']=$this->Task->getAllTasks();
			$data['subtasks']=$this->Task->AllSubTasks();
			$data['supertasks']=$this->Task->AllSuperTasks();
			//$data['subtasks']=$this->Dashboard->getAssignedSubTasks();
            
			$this->layout->view('dashboard/dashboard',$data);
		}
		else
		{
			redirect('dashboard');
		}*/

		$id = $this->session->userdata('user');
		
		$data['employers']=$this->Employer->getAllEmployers();
		$data['employees']=$this->Employee->getAllEmployees();
		$data['tasks']=$this->Task->getAllTasks();
		$data['subtasks']=$this->Task->AllSubTasks();

		if($id == '1'){
			$data['projects'] = $this->Project->getAllProjects();
		}else{
			$data['projects'] = $this->Project->getAllProjectsByid($id);
		}

		$this->layout->view('dashboard/dashboard', $data);
		
	}
	public function dashboard_detail(){

		extract($_POST);
		$data = array(
		'company' => $employer_name,
		'task'=>$task_name,
		'sub_task'=>$sub_task_name,
		'project_manager'=>$project_manager,
		'created_by'=> $this->session->userdata('user'),
		'status'	=> $this->session->userdata('user'),                                   
		'expected_delivery' => $expected_delivery,               
		'final_date' => $final_date); 

		$clean_data=$this->security->xss_clean($data);
		$result=$this->Dashboard->insert('projects',$clean_data);
		if($result==true)
		{
			redirect('dashboard');
		}
		else
		{
			$errorUploadType = 'Some problem occurred, please try again.';
		}	

	}
public function year_wise($year){
	//$data['employers']=$this->Employer->getAllEmployers();
	$data['array']=$this->Dashboard->getYear();
	$data['arr']=$this->Dashboard->getYears();
	$this->layout->view('dashboard/year-data',$data);
}

}
