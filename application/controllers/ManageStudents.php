<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageStudents extends CI_Controller {
    public function  __construct()
    {
        
        parent::__construct();
           $this->load->helper('url');
           $this->load->model('commonModel');


          
        }

      function index(){
          $data["student"]=$this->commonModel->GenericFetchData("student");
          $this->load->view("admin/AllStudents",$data);
      }
       function ViewStudents(){
          $data["student"]=$this->commonModel->GenericFetchData("student");
          $this->load->view("admin/AllStudents",$data);
      }

       function AddStudent(){
          $data["student"]=$this->commonModel->GenericFetchData("student");
          $data['prog']=$this->commonModel->GenericFetchData("programmes");
          $this->load->view("admin/AddStudent",$data);
      }
      function student_dashboard(){
        
         $this->load->view("admin/student_dashboard");
          
        }


      //loadStudentProfile
     public function loadStudentProfile(){

           $id=$this->input->get("id");
         
           $query=$this->commonModel->genericSelectDataById($id,"student","REGNO");
           $data['student']=null;
           if($query){
               $data['student']=$query;
            }
           $this->load->view("admin/profile",$data);
     }
     function getfinaceStatement(){
              $regno=$this->input->get("id");
              //get invoice and amount paid from finance and calculate total
              $query=$this->db->get_where('student_finance',array('REGNO'=>$regno));
              $res=$query->result_array();
             // $query=$this->commonModel->genericSelectDataById($student_id,"student_finance","REGNO");
              $data['finance']=null;
              if($query){
                $data['finance']=$res;
              }
              $credittotal=0;
              $debittotal=0;

              foreach ($res as $row) {
                      # code...
                      $credittotal+=$row["INVOICEAMOUNT"];
                      $debittotal+=$row["AMOUNTPAID"];
                     
              }
              $balance=$debittotal-$credittotal;
              $finance=array();
               $finance["credit"]=$credittotal;
               $finance['debit']= $debittotal;
               $finance['bal']= $balance;
              $this->session->set_userdata($finance);
             //echo $balance;

              $this->load->view("admin/student_finance",$data);
     }
     function getStudentInvoiceForm(){
              $data['programme']=$this->commonModel->GenericFetchData("programmes");
              $this->load->view("admin/InvoiceStudent",$data);
     }
     function getStudentPaymentForm(){
              $data['programme']=$this->commonModel->GenericFetchData("programmes");
              $this->load->view("admin/ReceivePaymentForm",$data);
     }
     function StudentInvoice($param1){
              if($param1=="BatchInvoice"){
                      $data['INVOICEAMOUNT'] = $this->input->post('invoice_amount');
                      $data['SEMESTER']= $this->input->post('semester');
                      $data['ACADEMICYEAR']= $this->input->post('academic_year');
                      $programmeid= $this->input->post('programme');
                    //  $data['STREAMID']= $this->input->post('streamid');
                      $data['AMOUNTPAID']="0.00";
                      $query=$this->db->get_where('student',array('PROGRAMME'=>$programmeid));
                      $res=$query->result_array();
                      foreach ($res as $row ) {
                        $data['REGNO']=$row['REGNO'];
                        $this->db->insert("student_finance",$data);
                      }
                      echo 'success';
              }
              if($param1=="SingleInvoice"){
                      $data['INVOICEAMOUNT']=$this->input->post('invoice_amount');
                     // $data['PROGRAMME']    = $this->input->post('programme');
                     // $data['TERM']= $this->input->post('semester');
                     // $data['YEAR']= $this->input->post('academic_year');
                      $data['STUDENT_REGNO']=$this->input->post('regno');
                      $this->db->insert('student_finance',$data);

              }
              if($param1=="ReceivePayment"){
                   $data['AMOUNTPAID']=$this->input->post('payment_amount');
                   $data['SEMESTER']= $this->input->post('semester');
                   $data['ACADEMICYEAR']= $this->input->post('academic_year');
                   $data['REGNO']=$this->input->post('regno');
                   $data['INVOICEAMOUNT']="0.00";
                   $this->db->insert('student_finance',$data);
                   echo "successfull..";
              }

      }



     public function Student($param1=''){

              if($param1 == "create") {
                      $username = $this->input->post('username');
                      $data['USERNAME']      = $this->input->post('username');
                      $data['PROGRAMME']    = $this->input->post('programme');
                      $data['FIRSTNAME']    = $this->input->post('firstname');
                      $data['LASTNAME']    = $this->input->post('lastname');
                      $data['PHONENUMBER']    = $this->input->post('phonenumber');
                      $data['EMAILADDRESS']    = $this->input->post('email');
                      $data['GENDER']    = $this->input->post('gender');
                      $data['REGNO']    = $this->input->post('regno');
                      $data['PASSWORD']    = $this->input->post('password');

                      if(substr($this->input->post('phonenumber'), 0,2) !== "07"){
                        echo "Please provide number with 07 in the first two digits";
                      }else{
                        //check student username esxistence in db
                        $query  = $this->db->get_where('student' , array('USERNAME' => $username));
                        $res  = $query->result_array();
                        foreach($res as $row)
                        $existing_user=$row['USERNAME'];
                      //if username not exist in db add user
                        if(empty( $existing_user)){
                              //check student regno esxistence in db
                              $regno=$this->input->post('regno');
                              $query  = $this->db->get_where('student' , array('REGNO' => $regno));
                              $res  = $query->result_array();
                              foreach($res as $row)
                              $existing_regno=$row['REGNO'];
                            //if regno is empty add details to db
                              if(empty($existing_regno)){
                                    // if($existing_user==$username){
                                      //    echo "username exist,choose a different username";
                                     //}
                                    // else if($existing_regno==$regno){
                                       //   echo "regno exist,choose a different regno";
                                    // }
                                    // else {
                                        //add user 
                                        $this->db->insert("student", $data);
                                        if($this->db->affected_rows()>0)
                                        {
                                          echo "success";

                                         }
                                        else {
                                           echo "error occured";
                                         }
                                    // }

                            }else{
                                echo "regno exist,choose a different regno";

                            }
                            
                         }else{
                           echo "username exist,choose a different username";
                         }

                      }

                      

                  }
               if ($param1 == 'delete') {

                    $this->db->where('REGNO', $this->input->post('regno'));
                    $this->db->delete('student');
                    echo "success";
                    //redirect(base_url() . 'index.php?ManageStudents', 'refresh');
                }

            /*  $config = array(
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
            
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                  $this->AddStudent();

            }else {*/


          
             


     }

     function updateStudent(){

              $data['USERNAME']      = $this->input->post('username');
              $data['FIRSTNAME']    = $this->input->post('firstname');
              $data['LASTNAME']    = $this->input->post('lastname');
              $data['PHONENUMBER']    = $this->input->post('phonenumber');
              $data['EMAILADDRESS']    = $this->input->post('emailaddress');
              $data['GENDER']    = $this->input->post('gender');
              $data['REGNO']    = $this->input->post('regno');
              $data['PIC']=$this->input->post("");
              $tablename="student";
            
              $query=$this->studentModel->updateStudentDetails($data,$id);
               if($query){
                  echo 'success';
                
               }else{
                  echo 'error';
               }
     }
     function selectStudentById(){
          $studentid=$this->input->post("studentid");
          // $id=json_decode($studentid);
          $data['student']=$this->studentModel->selectStudentById($studentid);
          
     }

     function deleteStudent(){

            if(isset($_POST["id"])){
          
             foreach ($_POST["id"] as $id) {
               $this->commonModel->genericDelete("REGNO","student",$id);
             }

          }
      }
      //function to upload image file
     function upload_image()
     {
        if(isset($_FILES["topsubmenuicon"]))
        {
            $extension=explode('.',$_FILES['topsubmenuicon']['name']);
            $new_name=rand().'.'.$extension[1];
            $destination ='./uploads/'.$new_name;
            move_uploaded_file($_FILES['topsubmenuicon']['tmp_name'], $destination);
            return $new_name;
        }
     } 
     
    
      
   
   
    
}