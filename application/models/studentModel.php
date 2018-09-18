
<?php if(!defined("BASEPATH")) exit("No direct script allowed");

//common model for holding common model functions
class studentModel extends CI_Model {

	function getAllStudents() {

		$q=$this->db->query("SELECT * FROM student");
		if($q->num_rows()>0){
			foreach ($q->result() as $rows ) {
				# code...
				$data[]=$rows;

			}
			return $data;
		}else{

		}
	}
	
	function genericSelectDataById($id,$tablename,$colmnId)
	{
		
			$this->db->select('*');  
			$this->db->from($tablename);
			$this->db->where($colmnId,$id);
			$query=$this->db->get();

			if($query->num_rows()>0){
				return $query->result();
			} else {
				return false;
			}


		}
		function selectStudentById($id){
			$q=$this->db->query("SELECT * FROM student WHERE REGNO='$id'  ");
	 		if($q->num_rows() > 0)
	 		{
		 		foreach ($q->result() as  $row) {
		 			# code...
		 			$data[]=$row;
		 		}
		 		return $data;
		 	}else{

	 	}
		}

		function deleteStudent($id){
			$this->db->where("REGNO",$id);
			$this->db->delete("student");
			if($this->db->affected_rows()>0){
				echo 'success';
			 }
			  else
			 {
				echo 'error';
			}

		}

	function AddStudent($tablename,$data) {

		$this->db->insert($tablename, $data);
	    if($this->db->affected_rows()>0)
	    {
	       echo "success";
		 }
		else
		{
		   echo "error";
		}
	}

	function updateStudentDetails($id,$data){

		    $this->db->set('menustatus', $data);
		    $this->db->set('FIRSTNAME',$data);
		    $this->db->set('LASTNAME',$data);
		    $this->db->set('USERNAME',$data);
		    $this->db->set('CLASSID',$data);
		    $this->db->set('STREAMID',$data);
		    $this->db->set('DORMITORYID',$data);
		    $this->db->set('GENDER',$data);
		    $this->db->set('ADDRESS',$data);
		    $this->db->set('EMAILADDRESS',$data);
		    $this->db->set('STATUS',$data);

		    $this->db->where("REGNO",$id);
		    $this->db->update("student");
		    if($this->db->affected_rows()>0)
		    {
		      echo "success";
		    }else
		    {
		      echo "error";
		    }

	}



}

	?>