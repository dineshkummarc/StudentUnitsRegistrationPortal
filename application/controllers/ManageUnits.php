<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageUnits extends CI_Controller {
    public function  __construct()
    {
        
        parent::__construct();
           $this->load->helper('url');
           $this->load->model('commonModel');
          
          // $this->load->model('main_model');

        
     }
     public function index() {
            $data["units"]=$this->commonModel->GenericFetchData("course_unit");
            $this->load->view("admin/view_units",$data);
     }
      public function loadUnit() {
            $data["units"]=$this->commonModel->GenericFetchData("course_unit");
            $this->load->view("admin/view_units",$data);
     }

     public function AddUnits() {
        //load to index page
        $data['prog']=$this->commonModel->GenericFetchData("programmes");
        $this->load->view("admin/AddUnit",$data);
     }
     public function deleteUnit(){
            $this->db->where('UNITID', $this->input->post('id'));
            $this->db->delete('course_unit');
            echo "success";

     }
     public function RegisterUnit() {
              
                //load to index page
                $this->load->view("admin/RegisterUnit");
     }
     function getExamCardForm(){
             $this->load->view("admin/getExamCardForm");
     }
     //function to get registered student for units form
    function getStudentRegisteredUnitForm(){
        $data['prog']=$this->commonModel->GenericFetchData("programmes");
        $this->load->view("admin/getRegisteredStudentForm",$data);
     }

     //function to get registered student for units
    function ViewStudentRegisteredUnit(){
             $this->load->view("admin/ViewRegisteredStudents");
     }



     public function Units($param1){

        if ($param1 == 'create') {

                $data['UNITNAME']     = $this->input->post('unit_title');
                $data['TYPE']           = $this->input->post('type');
                $data['SEMESTER'] = $this->input->post('semester');
                $data['ACADEMICYEAR'] = $this->input->post('academic_year');
                $data['PROGRAMME'] = $this->input->post('programme');
                $data['SEASON'] = $this->input->post('season');
                $this->db->insert('course_unit', $data);
                if($this->db->affected_rows()>0){
                   // $this->index();
                  echo 'success';
                 }
                 else {
                     // $this->index(); 
                  echo 'error';
                    }
                

            /* $config = array(
                  array(
                      'field' => 'unit_title',
                      'label' => 'unit_title',
                      'rules'=>'trim|required|'
                      //'rules' => 'required|xss_clean|valid_email'
                  ),
                  array(
                      'field' => 'type',
                      'label' => 'type',
                      'rules' => 'required|xss_clean|callback__validate_login'
                  ),
                  array(
                    'field'=>'semester',
                    'label'=>'semester',
                     'rules'=>'required|xss_clean|callback__validate_login'),
                  array(
                    'field'=>'academic_year',
                    'label'=>'academic_year',
                    'rules'=>'required|xss_clean|'

                    ),
                   array(
                      'field' => 'programme',
                      'label' => 'programme',
                      'rules'=>'trim|required|'
                      //'rules' => 'required|xss_clean|valid_email'
                  ),
                   array(
                    'field' => 'season',
                    'label' => 'season',
                    'rules'=>'trim|required|'
                    //'rules' => 'required|xss_clean|valid_email'
                  ),

            );
            
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
             $this->AddUnits();

            }
            else{*/


           
        }
        if($param1 == "getUnits"){

               }

        if($param1 == "All"){
           $this->index();
        }


     }
     function loadUnitRegisterform(){
    
       $this->load->view("admin/RegisterUnitForm");

     }

     function getUnits(){

              $semester = $this->input->get('semester');
              $academic_year = $this->input->get('academic_year');
              $season = $this->input->get('season');
              $programme=$this->input->get('programme');

              $this->db->select("*");
              $this->db->from("course_unit");
              $query=$this->db->where("SEMESTER",$semester);
              $query=$this->db->where("ACADEMICYEAR",$academic_year);
              $query=$this->db->where("SEASON",$season);
              $query=$this->db->where("PROGRAMME",$programme);
              $query=$this->db->get();

              if($query->num_rows()>0){
                 $data["units"]=$query->result();
              } else {
                return false;
              }
              $ss=array();
              $ss["semester"]=$semester;
              $ss["academicyr"]=$academic_year;
              $this->session->set_userdata($ss);
              $this->load->view("admin/loadUnitstable",$data);

      }

      function studentRegisterUnit(){
              $data['REGNO']=$this->input->post("regno");
              $reg_no=$this->input->post("regno");

              $semester=$this->input->post("semester");
              $academicyr=$this->input->post("academicyear");
              //check if student has paid total fee
              $amountpaid=$this->commonModel->getAmountPaid($reg_no,$academicyr,$semester);
              $amountinvoiced=$this->commonModel->getInvoicedAmount($reg_no,$academicyr,$semester);
              $Total_amountpaid=0;
             // print_r($amountpaid);
              foreach ($amountpaid as $row ) {
                # code...
                 $Total_amountpaid += $row["AMOUNTPAID"];
              }
              
              $Total_AmountInvoiced=0;
              foreach ($amountinvoiced as $row) {
                # code...
                  $Total_AmountInvoiced += $row["INVOICEAMOUNT"];
              }
            
              $balance=$Total_amountpaid - $Total_AmountInvoiced;
              //echo "toatal id"+$balance;
              $halfbalance=$Total_amountpaid/2;
              $halfdebitbal= $Total_AmountInvoiced/2;
             // echo $halfbalance;
              if($balance>=0 || $halfbalance>=$halfdebitbal ){
              
                //register units
                  //check if student has registered units
                 // $existing_regno=$this->commonModel->getRegNo($reg_no,$academicyr,$semester);
                // if(strcmp($existing_regno,$reg_no)){
                //    echo "error";
                // }else{
                    //register units
                     $unitid=$_POST["id"];
                     if(isset($_POST["id"])) {

                             foreach ($unitid as $id ) {
                                  $this->db->query("INSERT INTO registered_units VALUES(NULL,'$id','REGISTERED','$academicyr','$semester','$reg_no') ");
                             }
                                $regno=$this->input->post('regno');
                                $existing_regno='';
                                //check regno
                                $this->db->select("*");
                                $this->db->from("student_registered_units");
                                $query=$this->db->where("SEMESTER",$semester);
                                $query=$this->db->where("REGNO",$reg_no);
                                $query=$this->db->where("ACADEMICYEAR",$academicyr);
                               
                                $query=$this->db->get();

                                if($query->num_rows()>0){
                                   $res=$query->result();
                                   foreach ($res as $key ) {
                                     # code...
                                       $existing_regno=$key->REGNO;
                                   }
                                } //else {
                                  //return false;

                                //}

                                if(empty($existing_regno)){
                                  // echo "not in system";
                                   //inesert student
                                    $data["ACADEMICYEAR"]=$academicyr;
                                    $data['SEMESTER']=$this->input->post("semester");
                                    $this->db->insert("student_registered_units",$data);
                                    echo "success";
                                   // echo $existing_regno;
                                }else{
                                   //if not empty
                                    if($existing_regno==$regno){
                                    //user ,dont exist  register
                                   // echo "you have registered";
                                    echo  "success";
                                  
                                   }

                                }
                               
                               

                           }
                      
              }
              else if($balance<0){
                 echo "Clear with finance first";

              }

             else{
                //
                echo "error occured";

              }
          // }
     }
      function loadRegisteredUnits(){
              $regno=$this->input->get("regno");
              $academicyr=$this->input->get("academic_year");
              $semester=$this->input->get("semester");

              $ss=array();
              $s["semester"]=$semester;
              $s["academicyr"]=$academicyr;
              $this->session->set_userdata($s);

              $data['units']=$this->commonModel->getRegisteredUnits($academicyr,$semester,$regno);
              $this->load->view("admin/loadRegisteredUnit",$data);

     }
     function getDropUnitForm(){
             $this->load->view("admin/DropUnitForm");
     }
     function dropUnits(){
              //delete registered units units
              $regno=$this->input->post("regno");
              $unitname=$_POST["id"];
              $academicyr=$this->input->post("academicyear");
              $semester=$this->input->post("semester");

              if(isset($_POST["id"])){
              
                //remove registered students
                      //$this->db->where("REGISTERED_UNITS",$kid);
                     // $this->db->where("REGNO",$regno);
                    //  $this->db->where("ACADEMICYEAR",$academicyr);
                    //  $this->db->where("SEMESTER",$semester);
                    //  $this->db->delete("student_registered_units");
                      // if($this->db->affected_rows()>0){
                          //remove units associated to this student
                          foreach ($_POST["id"] as $kid ) {
                                # code...
                                   // $this->db->query("DELETE FROM registered_units WHERE  REGISTERED_UNITS='$kid' AND REGNO='$regno' AND ACADEMIC_YEAR='$academicyr'");
                                    $this->db->where("REGISTERED_UNITS",$kid);
                                    $this->db->where("REGNO",$regno);
                                    $this->db->where("ACADEMIC_YEAR",$academicyr);
                                    $this->db->where("SEMESTER",$semester);
                                    $this->db->delete("registered_units");
                                    if($this->db->affected_rows()>0){
                                        //echo "success";
                                      }
                              }

                        //}
              }
             echo "success";

     }

   
   
    
}