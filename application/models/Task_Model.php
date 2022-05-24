
<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Task_Model extends CI_Model
{
	function getAllTasks()
	{
		$this->db->select('tasks.*');
		$this->db->from('tasks');
		return $this->db->get()->result_array();
	}
	
	function getAllSubTasks($taskId)
	{
	    $this->db->select('sub_tasks.*');
	    $this->db->from('sub_tasks');
	    $this->db->where('sub_tasks.task_id',$taskId);
	    return $this->db->get()->result_array();
	}
	function AllSubTasks()
	{
	    $this->db->select('sub_tasks.*');
	    $this->db->from('sub_tasks');
	    return $this->db->get()->result_array();
	}
	function AllSuperTasks()
	{
	    $this->db->select('super_sub_task.*');
	    $this->db->from('super_sub_task');
	    return $this->db->get()->result_array();
	}
	
	function getAllSuperSubTasks($subTaskId)
	{
	    $this->db->select('super_sub_task.*');
	    $this->db->from('super_sub_task');
	    $this->db->where('super_sub_task.subtask_id',$subTaskId);
	    return $this->db->get()->result_array();
	}
	function getEditSuperTasks($superTaskId){

		$this->db->select('super_sub_task.*');
	    $this->db->from('super_sub_task');
	    $this->db->where('super_sub_task.id',$superTaskId);
	    $superTask = $this->db->get()->result_array();
		$data = array();
		foreach($superTask as $row){	
			$data = array(
				'id' => $superTaskId,
				'super_task_Name' => $row['name'],
				'subtask_id' => $row['subtask_id']
			);
		}
		return $data;
	}
	function getEditSubTasks($subTaskId){

		$this->db->select('sub_tasks.*');
	    $this->db->from('sub_tasks');
	    $this->db->where('sub_tasks.id',$subTaskId);
	    $superTask = $this->db->get()->result_array();
		$data = array();
		foreach($superTask as $row){	
			$data = array(
				'id' => $subTaskId,
				'sub_task_Name' => $row['name'],
				'task_id' => $row['task_id']
			);
		}
		return $data;
	}
}
