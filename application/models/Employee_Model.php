<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_Model extends CI_Model
{
	// function employee_id()
	// {
	// 	$this->db->select('company_id');
	// 	$this->db->from('companies');
	// 	$this->db->order_by('company_id','DESC');
	// 	$this->db->limit(1);
	// 	$query=$this->db->get();
	// 	if($query->num_rows()==0)
	// 	{
	// 		return "000";
	// 	}
	// 	else
	// 	{
	// 		$row=$query->row_array();
	// 		return $row['company_id'];
	// 	}
	// }

	function getAllEmployeesView()
	{
		$this->db->select('u1.*,u2.name as created_by_name,u3.name as reporting_manager_name');
		$this->db->from('users u1');
		$this->db->join('users u2','u2.id=u1.created_by');
		$this->db->join('users u3','u3.id=u1.reporting_manager','left');
		$this->db->where('u1.user_status','1');
		return $this->db->get()->result_array();
	}
	function getAllRole()
	{
		$this->db->select('employee_role.*');
		$this->db->from('employee_role');
		return $this->db->get()->result_array();
	}
	function getAllEmployees()
	{
		$this->db->select('users.*');
		$this->db->from('users');
		$this->db->where('users.user_status','1');
		return $this->db->get()->result_array();
	}
	function getAlleditEmployees($id){
			$this->db->select('users.*');
			$this->db->from('users');
			$where = array(
					'users.id'   => $id
					);
			$this->db->where($where);
			$course_query = $this->db->get()->result_array();
				$data = array();			

				foreach($course_query as $row){				

					$data = array(
						'id' 				=> $id,
						'role_id' 			=> $row['role_id'],
						'reporting_manager' => $row['reporting_manager'],
						'name' 				=> $row['name'],
						'email' 			=> $row['email'],
						'username' 			=> $row['username'],
					);	

				}
				return $data;
		}
	

}
