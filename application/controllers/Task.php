<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
	}

	public function view_task()
	{
		if($this->session->has_userdata('user')!=false)
		{
			//$userId=$this->session->userdata('user');
			//$data['userId']=$userId;
			$data['tasks']=$this->Task->getAllTasks();
			$this->layout->view('task/tasks',$data);
		}
		else
		{
			redirect('dashboard');
		}
	}
	public function viewSubTasks()
	{
		if($this->session->has_userdata('user')!=false)
		{
			$taskId=$this->uri->segment(3);
			$data['subtasks']=$this->Task->getAllSubTasks($taskId);
			$this->layout->view('task/subtask',$data);
		}
		else
		{
			redirect('dashboard');
		}
	}

	public function add_task()
	{
		if($this->session->has_userdata('user')!=false)
		{
			$this->layout->view('task/add_task');
		}
		else
		{
			redirect('dashboard');
		}
	}

	public function post_add_task()
	{
		if($_POST!=NULL)
		{
			if($this->session->has_userdata('user')!=false)
			{
				$result=$this->__form_validation();
				if($result==true)
				{
					extract($_POST);
					$data=array('name'=>$task,
								'created_by'=>$this->session->userdata('user'),
								'created_at'=>date('Y-m-d H:i:s'),
								'modified_at'=>date('Y-m-d H:i:s'));
					$clean_data=$this->security->xss_clean($data);
					$result=$this->Main->insert('tasks',$clean_data);
					if($result==true)
					{
						$this->output->set_output(json_encode(['result'=>1]));
						return false;
					}
					else
					{
						$this->output->set_output(json_encode(['result'=>2]));
						return false;
					}
				}
				else
				{
					$this->output->set_output(json_encode(['result'=>0]));
					return false;
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

	private function __form_validation()
	{
		$this->output->set_content_type('application/json');
		$this->form_validation->set_rules('task','task','required|trim');
		$this->form_validation->set_error_delimiters('<div class="text text-danger">', '</div>');
		if($this->form_validation->run()==true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function subTasks()
	{
		if ($this->session->has_userdata('user') != false) {
			$taskId = $this->uri->segment(3);
			$data['tasks'] = $this->Task->getOneTasks($taskId);
			//$data['taskId'] =  $this->uri->segment(3);
			$this->layout->view('task/add_Task_Types', $data);
		} else {
			redirect('dashboard');
		}
		
	}
	
	public function add_sub_task()
	{
	    if($this->session->has_userdata('user'))
	    {
	        if($this->uri->segment(3)!="")
	        {
	            $taskId=$this->uri->segment(3);
	            $data['taskId']=$taskId;
	            $this->layout->view('task/add-sub-task',$data);
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
	
	public function post_add_sub_task()
	{
		$task_name = $this->input->post('task_id');
		$subTask = $this->input->post('subTask');
		
		$total = count($subTask);
		if($subTask){
			for($i=0; $i<$total; $i++ ){
				$data = array( 
					'task_id'    =>  $task_name, 
					'name'    =>  $subTask[$i],
					'created_by'=>$this->session->userdata('user'),
					'created_at'=>date('Y-m-d H:i:s'),
                    'modified_at'=>date('Y-m-d H:i:s')
				);
				$clean_data=$this->security->xss_clean($data);
				$insert = $this->Main->insert('sub_tasks',$clean_data);
			}
		}
		if($insert){
			redirect('task/view_task');
		}
	}
	
	public function superSubTasks()
	{
	    if($this->session->has_userdata('user')!=false)
	    {
	        if($this->uri->segment(3)!="")
	        {
	            $subTaskId=$this->uri->segment(3);
	            $data['subTaskId']=$subTaskId;
                $data['superSubtasks']=$this->Task->getAllSuperSubTasks($subTaskId);
	            $this->layout->view('task/viewSuperTask',$data);
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
	
	public function add_super_sub_task()
	{
	   
		if ($this->session->has_userdata('user') != false) {
			$subTaskId=$this->uri->segment(3);
			$data['subTaskId']=$subTaskId;
			$data['sub_tasks'] = $this->Task->AllSubTasks();
	        $this->layout->view('task/add_super_sub_task',$data);
		} else {
			redirect('dashboard');
		}
	}
	
	public function post_add_super_sub_task()
	{
	    if($_POST!=NULL)
	    {
	        if($this->session->has_userdata('user')!=false)
	        {
				$subtask_name = $this->input->post('sub_task_name');
				$superTask = $this->input->post('superTask');
				$TaskId = $this->input->post('TaskId');
				
				$total = count($superTask);
				if($superTask){
					for($i=0; $i<$total; $i++ ){
						$data = array( 
							'subtask_id'    =>  $subtask_name, 
							'name'    =>  $superTask[$i],
							'created_by'=>$this->session->userdata('user'),
							'created_at'=>date('Y-m-d H:i:s'),
							'modified_at'=>date('Y-m-d H:i:s')
						);
						$clean_data=$this->security->xss_clean($data);
						$insert = $this->Main->insert('super_sub_task',$clean_data);
					}
				}
				if($insert){
					redirect('task/viewSubTasks/'.$TaskId);
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
	
	public function superSubTaskEdit()
	{
	    if($this->session->has_userdata('user')!=false)
	    {
	            $superSubTaskId =$this->uri->segment(3);
	            //$data['subTaskId']=$this->uri->segment(4);
				$data['Super_tasks'] = $this->Task->getEditSuperTasks($superSubTaskId);
	            $this->layout->view('task/super_sub_task_edit',$data);
	    }
	    else
	    {
	        redirect('dashboard');
	    }
	}
	
	public function post_edit_super_sub_task()
	{
	    if($this->session->has_userdata('user')!=false)
	    {
	            $super_taskid = $this->input->post('super_taskid');
				$subtask_id = $this->input->post('subtask_id');
	            extract($_POST);
	            $data=array('name'=>$super_task,
	                        'modified_at'=>date('Y-m-d H:i:s'));
	            $clean_data=$this->security->xss_clean($data);
                $result=$this->Main->update('id',$super_taskid,$data,'super_sub_task');
                if($result==true)
                {
                    redirect('task/superSubTasks/'.$subtask_id);
                }
	       
	    }
	    else
	    {
	        redirect('dashboard');
	    }
	}
	
	public function subTaskEdit()
	{
	    if($this->session->has_userdata('user')!=false)
	    {
	        
			$SubTaskId =$this->uri->segment(3);
			$data['Sub_tasks'] = $this->Task->getEditSubTasks($SubTaskId);
			$this->layout->view('task/sub_task_edit',$data);
	        
	    }
	    else
	    {
	        redirect('dashboard');
	    }
	}
	
	public function post_edit_sub_task()
	{
	    if($this->session->has_userdata('user')!=false)
	    {
	        
			$sub_taskid = $this->input->post('sub_taskid');
			$task_id = $this->input->post('task_id');
	            extract($_POST);
	            $data=array('name'=>$sub_task,
	                        'modified_at'=>date('Y-m-d H:i:s'));
	            $clean_data=$this->security->xss_clean($data);
                $result=$this->Main->update('id',$sub_taskid,$data,'sub_tasks');
                if($result==true)
                {
                    redirect('task/viewSubTasks/'.$task_id);
                }
                else
                {
                    redirect('task/viewSubTasks/'.$task_id);
                }
	    }
	    else
	    {
	        redirect('dashboard');
	    }
	}
	
	public function editTask()
	{
	    if($this->session->has_userdata('user')!=false)
	    {
	        if($this->uri->segment(3)!="")
	        {
	            $data['taskId']=$this->uri->segment(3);
	            $this->layout->view('task/task-edit',$data);
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
	
	public function post_edit_task()
	{
	    if($this->session->has_userdata('user')!=false)
	    {
	        if($this->uri->segment(3)!="")
	        {
	            $taskId=$this->uri->segment(3);
	            extract($_POST);
	            $data=array('name'=>$task,
	                        'modified_at'=>date('Y-m-d H:i:s'));
	            $clean_data=$this->security->xss_clean($data);
                $result=$this->Main->update('id',$taskId,$data,'tasks');
                if($result==true)
                {
                    redirect('task');
                }
                else
                {
                    redirect('task');
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
	
	public function getSubTask()
	{
	    $this->output->set_content_type('json');
	    $tasks = explode(",",$this->input->post('task_id'));
        $data=array();
        for($i=0;$i<sizeof($tasks);$i++)
        {
            $subTasks=$this->Task->getAllSubTasks($tasks[$i]);
            $data=array_merge($subTasks,$data);
        }
		if($data)
		{
			$this->output->set_output(json_encode(['result'=> 1, 'subtasks'=>$data, 'all'=>count($data)]));
		} else

		{
			$this->output->set_output(json_encode(['result'=> 0]));
		}
	   
	}
	
	public function getSuperSubTask()
	{
	    $this->output->set_content_type('json');
	    $subtasks = explode(",",$this->input->post('sub_task_id'));
        $data=array();
        for($i=0;$i<sizeof($subtasks);$i++)
        {
            $superSubTasks=$this->Task->getAllSuperSubTasks($subtasks[$i]);
            $data=array_merge($superSubTasks,$data);
        }
		if($data)
		{
			$this->output->set_output(json_encode(['result'=> 1, 'supersubtasks'=>$data, 'all'=>count($data)]));
		} else

		{
			$this->output->set_output(json_encode(['result'=> 0]));
		}
	   
	}
	public function superTaskDelete()
	{
		if($this->session->has_userdata('user')!=false)
	   	{
		   $superSubtask=$this->uri->segment(3);
		   $Subtask=$this->uri->segment(4);
		   $result=$this->Main->delete('id',$superSubtask,'super_sub_task');
		   if($result==true)
		   {
			   redirect('task/superSubTasks/'.$Subtask);
		   }
	   }
	}
	public function subTaskDelete()
	{
		if($this->session->has_userdata('user')!=false)
	   	{
		   $Subtask=$this->uri->segment(3);
		   $TaskId = $this->uri->segment(3);
		   $result=$this->Main->delete('id',$Subtask,'sub_tasks');

		   $SuperSubTasksData = $this->Task->getAllSuperSubTasks($Subtask);

			foreach($SuperSubTasksData as $SuperSubTasksRow){
			$superTaskid = $SuperSubTasksRow['id'];

			$result2 =$this->Main->delete('id',$superTaskid,'super_sub_task');
			}
		   if($result==true)
		   {
			   redirect('task/viewSubTasks/'.$TaskId);
		   }
	   }
	}

}

