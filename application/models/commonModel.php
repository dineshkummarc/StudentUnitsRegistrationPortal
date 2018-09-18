<?php if(!defined("BASEPATH")) exit("No direct script allowed");

//common model for holding common model functions
class commonModel extends CI_Model {

//generic save function
	function genericSave($tablename,$data)
	{
	    $this->db->insert($tablename, $data);
	    if($this->db->affected_rows()>0)
	    {
	       echo "1";
		 }
		else
		{
		   echo "0";
		}
	  	 
	}

	//generic function for fetching data
	function GenericFetchData($table)
	{
		
		  $this->db->select("*");
	      $this->db->from($table);
	      $query = $this->db->get();
	      return $query->result();
	}
	function FetchCourseUnits($semester,$academic_year,$season,$programme)
	{
		    $this->db->select("*");
            $this->db->from("course_unit");
            $query=$this->db->where("SEMESTER",$semester);
            $query=$this->db->where("ACADEMICYEAR",$academic_year);
            $query=$this->db->where("SEASON",$season);
            $query=$this->db->where("PROGRAMME",$programme);
            $query=$this->db->get();

					if($query->num_rows()>0){
						return $query->result();
					} else {
						return false;
					}


	}
	 public function getcourseunit($semester,$academic_year,$season,$programme)
 	{
 		$q=$this->db->query("SELECT * FROM course_unit WHERE SEMESTER='$semester' AND ACADEMICYEAR='$academic_year'  AND PROGRAMME='$programme' AND SEASON='$season' ");
 		if($q->num_rows() > 0)
 		{
	 		foreach ($q->result() as  $row) {
	 			# code...
	 			$data[]=$row;
	 		}
	 		return $data;
	 	}
	 }


		//generic fetch using inner joins
	function FetchData()
		{
				$this->db->select('*');  
				$this->db->from('adminusers');
				$this->db->join('userrole', 'adminusers.ROLEID=userrole.ROLEID','inner');
				//$this->db->join('table3', 'table1.id = table3.id', 'inner');
			   // $this->db->where("ROLESTATUS","Open");
				
				$query=$this->db->get();

					if($query->num_rows()>0){
						return $query->result();
					} else {
						return false;
					}


		}

	function FetchDataById($id)
		{
			
				$this->db->select('*');  
				$this->db->from('adminusers');
				$this->db->join('userrole', 'adminusers.ROLEID=userrole.ROLEID','inner');
				//$this->db->join('table3', 'table1.id = table3.id', 'inner');
				$this->db->where("USERID",$id);
				//$this->db->where("PASSWORD",$password);
				$query=$this->db->get();

					if($query->num_rows()>0){
						return $query->result();
					} else {
						return false;
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
	

	//generic function for fetching data
	function FetchDataByStatus($table,$colname,$status)
	{
		$this->db->where($colname,$status);
		$query=$this->db->get($table);
		if($query->result()){
			
			$result=$query->result();
			//echo json_encode($result);
			return $query->result();

		}
	}

	//generic function for deleting data
	function genericDelete($tblcolumn,$table,$data)
	{
		
		$this->db->where($tblcolumn,$data);
		$this->db->delete($table);
		if($this->db->affected_rows()>0){
			echo 'success';
		 }
		  else
		 {
			echo 'error';
		}


	}

	//function generic update
	function genericUpdateData($tblcolumn,$table,$data,$id)
	{
	
	  	$this->db->where($tblcolumn,$id);
	  	$this->db->update($table,$data);
	  	if($this->db->affected_rows()>0)
	    {
	      	 echo '1';
	     }
	    else
	     {
	      		echo '0';
	    }
	}

	//generic function for changing menu status
	function genericChangeMenuStatus($id,$data,$table,$tblcolumnid,$tblcolumnstatus)
	{
	    $this->db->set($tblcolumnstatus, $data);
	  	$this->db->where($tblcolumnid,$id);
	  	$this->db->update($table);
	  	if($this->db->affected_rows()>0)
	    {
	      		return true;
	     }
	     else
	      {
	      		return false;
	    }
	}
	function getRegNo($reg_no,$academicyr,$semester){
		 $query  = $this->db->get_where('student_registered_units' , array('REGNO' => $reg_no),array('ACADEMICYEAR'=>$academicyr),array('SEMESTER'=>$semester));
              $res  = $query->result_array();
              foreach($res as $row)
              return $row['REGNO'];
	}
	function getAmountPaid($reg_no,$academicyr,$semester){
		/*$this->db->select_sum('AMOUNTPAID');
		$this->db->from("student_finance");
		$this->db->where("REGNO",$reg_no);
		$this->db->where("SEMESTER",$semester);
		$this->db->where("ACADEMICYEAR",$academicyr);
		$query=$this->db->get()->row();
		return $query->AMOUNTPAID;*/

		/*$this->db->select_sum("AMOUNTPAID");
		$this->db->where("REGNO",$reg_no);
		$this->db->where("SEMESTER",$semester);
		$this->db->where("ACADEMICYEAR",$academicyr);
		$result=$this->db->get("student_finance")->row();
		return $result->AMOUNTPAID;*/
		$this->db->select('AMOUNTPAID');
		$this->db->from("student_finance");
		$this->db->where("REGNO",$reg_no);
		$this->db->where("SEMESTER",$semester);
		$this->db->where("ACADEMICYEAR",$academicyr);
		$query=$this->db->get();
		return $query->result_array();

	}
	/*function getAmountPaid($reg_no,$academicyr,$semester){
		 $query  = $this->db->query("SELECT SUM(AMOUNTPAID) FROM student_finance WHERE REGNO='$reg_no' AND  SEMESTER='$semester' AND ACADEMICYEAR='$academicyr'");
              $res  = $query->result();
              //foreach($res as $row)
               return $res;
             // return $row['AMOUNTPAID'];
	}*/
	function getInvoicedAmount($reg_no,$academicyr,$semester){
		/*$this->db->select_sum('INVOICEAMOUNT');
		$this->db->from("student_finance");
		$this->db->where("REGNO",$reg_no);
		$this->db->where("SEMESTER",$semester);
		$this->db->where("ACADEMICYEAR",$academicyr);
		$query=$this->db->get();
		return $query->row()->INVOICEAMOUNT;*/
		$this->db->select('INVOICEAMOUNT');
		$this->db->from("student_finance");
		$this->db->where("REGNO",$reg_no);
		$this->db->where("SEMESTER",$semester);
		$this->db->where("ACADEMICYEAR",$academicyr);
		$query=$this->db->get();
		return $query->result_array();

	}

	function getRegisteredUnits($academicyr,$semester,$regno){

              $this->db->select("*");
              $this->db->from("registered_units");
              $this->db->join("course_unit","course_unit.UNITID=registered_units.REGISTERED_UNITS");
              $this->db->where("registered_units.ACADEMIC_YEAR", $academicyr);
              $this->db->where("registered_units.SEMESTER", $semester);
              $this->db->where("REGNO", $regno);
              $query=$this->db->get();
              if($query->num_rows()>0){
                 return $query->result();
              }
	}

	function getStudentRegisteredStudent($programme,$academicyear,$semester){

              $this->db->select("student.REGNO,FIRSTNAME,LASTNAME");
              $this->db->from("student");
              $this->db->join("student_registered_units","student_registered_units.REGNO=student.REGNO");
              $this->db->where("student_registered_units.ACADEMICYEAR", $academicyear);
              $this->db->where("student_registered_units.SEMESTER", $semester);
              $this->db->where("student.PROGRAMME", $programme);
              $query=$this->db->get();
              if($query->num_rows()>0){
                 return $query->result_array();
              }
	}

	function Check_ifuUernameExist($colname,$username,$tablename){
			$this->db->where($colname,$username);
			$result=$this->db->get($tablename);
			if($result->num_rows()>0){
				return true;
			}else{
				return false;
			}

	}

	function is_logged_in($username,$password) {
			$this->db->select('*');  
			$this->db->from('users');
			$this->db->where("USERNAME",$username);
			$this->db->where("PASSWORD",$password);
			$query=$this->db->get();
				if($query->num_rows()>0) {
					return $query->result();
				} else {
					return false;
				  }
	}
	function student_login($username,$password) {
			$this->db->select('*');  
			$this->db->from('student');
			$this->db->join("programmes","student.PROGRAMME=programmes.PROGRAMMEID",'inner');
			$this->db->where("USERNAME",$username);
			$this->db->where("PASSWORD",$password);
			$query=$this->db->get();
				if($query->num_rows()>0) {
					return $query->result();
				} else {
					return false;
				  }
	}

	function validator(){
		 $config = array(
                  array(
                      'field' => 'username',
                      'label' => 'username',
                      'rules'=>'trim|required|alpha'
                      //'rules' => 'required|xss_clean|valid_email'
                  ),
                  array(
                      'field' => 'password',
                      'label' => 'password',
                      'rules' => 'required|xss_clean|callback__validate_login'
                  ),
                  array(
                    'field'=>'firstname',
                    'label'=>'firstname',
                     'rules'=>'required|xss_clean|callback__validate_login'),
                  array(
                    'field'=>'email',
                    'label'=>'email',
                    'rules'=>'required|xss_clean|valid_email'

                    ),
                   array(
                      'field' => 'lastname',
                      'label' => 'lastname',
                      'rules'=>'trim|required|alpha'
                      //'rules' => 'required|xss_clean|valid_email'
                  ),
                   array(
                    'field' => 'status',
                    'label' => 'status',
                    'rules'=>'trim|required|alpha'
                    //'rules' => 'required|xss_clean|valid_email'
                  ),
                   array(
                  'field' => 'role',
                  'label' => 'role',
                  'rules'=>'trim|required|alpha'
                  //'rules' => 'required|xss_clean|valid_email'
                  ),
                   array(
                  'field' => 'unit_title',
                  'label' => 'unit_title',
                  'rules'=>'trim|required|'
                  //'rules' => 'required|xss_clean|valid_email'
                  ),
                  array(
                  'field' => 'semester',
                  'label' => 'semester',
                  'rules'=>'trim|required|'
                  //'rules' => 'required|xss_clean|valid_email'
                  ),
                  array(
                  'field' => 'programme',
                  'label' => 'programme',
                  'rules'=>'trim|required|'
                  //'rules' => 'required|xss_clean|valid_email'
                  ),
                  array(
                  'field' => 'academic_year',
                  'label' => 'semester',
                  'rules'=>'trim|required|'
                  //'rules' => 'required|xss_clean|valid_email'
                  ),
                  array(
                  'field' => 'type',
                  'label' => 'semester',
                  'rules'=>'trim|required|'
                  //'rules' => 'required|xss_clean|valid_email'
                  ),
                  array(
                  	'field'=>'season',
                  	'label'=>'season',
                  	'rules'=>'trim|required|'

                  	),
                  array(
                  	'field'=>'phonenumber',
                  	'label'=>'phonenumber',
                  	'rules'=>'trim|required|'

                  	),
                   array(
                  	'field'=>'gender',
                  	'label'=>'gender',
                  	'rules'=>'trim|required|'

                  	),
                    array(
                  	'field'=>'regno',
                  	'label'=>'regno',
                  	'rules'=>'trim|required|'

                  	),




        );
	return $config;

	}

}
?>