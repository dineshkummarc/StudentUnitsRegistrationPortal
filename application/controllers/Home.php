<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function  __construct()
    {
        
        parent::__construct();
                $this->load->helper('url');
                $this->load->model('commonModel');
          
    }
    public function index() {
            //load to index page
            $this->load->view("admin/student_login");
     }

   public function login() {
           $config = array(
                    array(
                        'field' => 'username',
                        'label' => 'username',
                        'rules'=>'trim|required|xss_clean|alpha'
                        //'rules' => 'required|xss_clean|valid_email'
                    ),
                    array(
                        'field' => 'password',
                        'label' => 'password',
                        'rules' => 'required|xss_clean|callback__validate_login'
                    )
            );
             $this->form_validation->set_rules($config);
             if($this->form_validation->run() == FALSE) {
                      //RETURN TO LOGIN
                      $this->index();

             } else {
                    //check user to login
                    //$this->CheckUserLogin();
                    $username=$this->input->post("username");
                    $raw_password=$this->input->post("password");
                    $result=$this->commonModel->student_login($username,$raw_password);
                    if($result){
                      foreach ($result as $row) {
                        # code...
                        $student=array();
                        $student['programme']=$row->PROGRAMMENAME;
                        $student['programmeid']=$row->PROGRAMMEID;
                        $student['username']=$row->USERNAME;
                        $student['regno']=$row->REGNO;
                        $student['firstname']=$row->FIRSTNAME;
                         $student['lastname']=$row->LASTNAME;
                        $this->session->set_userdata($student);

                      }

                    // $this->load->view("admin/student_dashboard");
                       redirect(base_url().'index.php/ManageStudents/student_dashboard','refresh');

                           return true;
                    }else{
                          
                          $this->session->set_flashdata("login_err","Incorrect username or password");
                          $this->load->view("admin/student_login");

                          return false;

                    }

              }
    }


      
     public function CheckUserLogin() {

            $username=$this->input->post("username");
            $raw_password=$this->input->post("password");
            $result=$this->commonModel->is_logged_in($username,$raw_password);
            if($result) {
                        foreach($result as $user) {
                                $s=array();
                                $s["userid"]=$user->USERID;
                                $s["username"]=$user->USERNAME;
                                $s['rolename']=$user->ROLE;
                                $s['firstname']=$user->FIRSTNAME;
                                $s['lastname']=$user->LASTNAME;
                                $s['phone']=$user->PHONENUMBER;
                               // $s['image']=$user->IMAGE;
                                $this->session->set_userdata($s);
                        }
                        // print_r($user);
                      
                       if($this->session->userdata("rolename") == "Administrator") {
                              redirect(base_url() . 'index.php?/ManageUsers/to_admin_dashboard', 'refresh');
                              // $this->session->set_userdata("data","rolename");
                        }
                       else {
                        redirect(base_url() . 'index.php?/ManageUsers/to_admin_dashboard', 'refresh');
                        //$this->load->view("admin/login");
                              //redirect(base_url() . 'index.php?/Home/admin-profile', 'refresh');
                        }
                       return true;
            } else {
                        $this->session->set_flashdata('login_err', 'Incorrect username or password');
                        $this->load->view('admin/login');
                        return FALSE;
                }
          }


      function logout() {
              $this->load->driver('cache'); 
              $this->session->sess_destroy(); 
              $this->cache->clean();  
              ob_clean(); 
              $this->load->view('admin/student_login');
     }
      function Adminlogout() {
              $this->load->driver('cache'); 
              $this->session->sess_destroy(); 
              $this->cache->clean();  
              ob_clean(); 
              $this->load->view('admin/login');
     }

     public function admin(){
        $config = array(
                    array(
                        'field' => 'username',
                        'label' => 'username',
                        'rules'=>'trim|required|xss_clean|alpha'
                        //'rules' => 'required|xss_clean|valid_email'
                    ),
                    array(
                        'field' => 'password',
                        'label' => 'password',
                        'rules' => 'required|xss_clean|callback__validate_login'
                    )
            );

             $this->form_validation->set_rules($config);
             if($this->form_validation->run() == FALSE) {
                      //RETURN TO LOGIN
                    $this->load->view("admin/login");

             } else {
                    //check user to login
                    $this->CheckUserLogin();
              }

     }
    public function pdffile(){
            //load library
            $this->load->library("Myfpdf");
            $data['unit']=$this->commonModel->GenericFetchData("registered_units");
            $this->load->view("admin/ExamCardPdf",$data);
    }
    public function Studentspdffile(){
           $academicyear=$this->input->post("academicyear");
           $programme=$this->input->post("programme");
           $semester=$this->input->post("semester");
           $session=array();
           $session["programe"]=$programme;
           $session["semester"]=$semester;
           $session["academicyear"]=$academicyear;
           //get programme by name
           $this->db->select("PROGRAMMENAME");
           $this->db->from("programmes");
           $this->db->where("PROGRAMMEID",$programme);
           $query=$this->db->get();
           if($query){
            $pr=$query->result_array();
            foreach ($pr as $key ) {
              # code...
              $p=$key["PROGRAMMENAME"];
            }
           }
           //set programe in the session
            $session["programme"]=$p;
           $this->session->set_userdata($session);
            //load library
          $this->load->library("Myfpdf");
          //fetch details from db
          $data['student']=$this->commonModel->getStudentRegisteredStudent($programme,$academicyear,$semester);
          $this->load->view("admin/getRegisteredStudentPdf",$data);
      }
        public function AllStudentspdfReport(){
                 //load library
              $this->load->library("Myfpdf");
              //fetch details from db
              $data['student']=$this->commonModel->GenericFetchData("student");
              $this->load->view("admin/AllStudentPdfReport",$data);
      }
   
    
}