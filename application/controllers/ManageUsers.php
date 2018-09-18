<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageUsers extends CI_Controller {
   //private $rotations = 0 ;
    public function  __construct()
    {
        
        parent::__construct();
           $this->load->helper('url');
          

           $this->load->model('commonModel');
          // $this->load->model('main_model');

        
     }

     public function index() {
        //load to index page
       $data["users"]=$this->commonModel->GenericFetchData("users");
       $this->load->view("admin/AllUsers",$data);
       // $this->load->view("admin/AllUsers");
     }
     public function View_Users() {
        //load to index page
       $data["users"]=$this->commonModel->GenericFetchData("users");
       $this->load->view("admin/AllUsers",$data);
       // $this->load->view("admin/AllUsers");
     }
      public function NewUsers() {
       
       $data["users"]=$this->commonModel->GenericFetchData("users");
       $this->load->view("admin/AddUsers",$data);
       //redirect(base_url() . 'index.php?MainUsers', 'refresh');
     }
     function pages(){
       redirect(base_url() . 'index.php?MainUsers/AllUsers', 'refresh');

       // $this->load->view("admin/Users");

     }

     function AddUser(){

     /* $config = array(
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
                  'rules'=>'trim|required'
                  //'rules' => 'required|xss_clean|valid_email'
                  ),

        );*/

      //  $this->form_validation->set_rules($config);
      // if ($this->form_validation->run() == FALSE) {
        //    $this->load->view("admin/Users");
       // } else {
            $username=$this->input->post('username');

            $data['USERNAME']        = $this->input->post('username');
            $data['LASTNAME']    = $this->input->post('lastname');
            $data['FIRSTNAME']    = $this->input->post('firstname');
            $data['EMAILADDRESS']         = $this->input->post('email');
            $data['STATUS']    = $this->input->post('status');
            $data['ROLE']     = $this->input->post('role');
            $data['PASSWORD']       = $this->input->post('password');
            $data['PHONENUMBER']       = $this->input->post('phonenumber');

            $query  = $this->db->get_where('users' , array('USERNAME' => $username));
              $res  = $query->result_array();
              foreach($res as $row)
              $existing_user=$row['USERNAME'];
                if($existing_user==$username){
                     echo "usernmae exist ,choose different username";

                }else{

                   $this->db->insert("users", $data);
                    if($this->db->affected_rows()>0)
                      {
                        echo "success";
                      //  $this->index();
                       // $this->session->set_flashdata('flash_message',"User successfully addeed");
                      }
                    else
                      {
                        echo "error";
                       // $this->NewUsers();
                       // $this->session->set_flashdata("flash_message","Error Occurred,try again");
                       //redirect(base_url().'index.php?MainUsers/AddUser','refresh');
                      }

                }
           


       // }

     }
      //loadStudentProfile
     public function loadUserProfile(){

           $id=$this->input->get("id");
         
           $query=$this->commonModel->genericSelectDataById($id,"users","USERID");
           $data['user']=null;
           if($query){
               $data['user']=$query;
            }
           $this->load->view("admin/admin-profile",$data);
     }
     function profile(){

      $this->load->view("admin/login");
     }
    function to_admin_dashboard(){

      $this->load->view("admin/admin-dashboard");
     }



//function to encrypt and decrept password
 /* function encrypt_password($password, $username){
      //Number of times to rehash
   // private $rotations = 0 ;

    $salt = hash('sha256', uniqid(mt_rand(), true) . "somesalt" . strtolower($username));

    $hash = $salt . $password;


    for ( $i = 0; $i < $this->rotations; $i ++ ) {
      $hash = hash('sha256', $hash);
    }


    return $salt . $hash;
  }


  function is_valid_password($password,$dbpassword){
    $salt = substr($dbpassword, 0, 64);

    $hash = $salt . $password;

    for ( $i = 0; $i < $this->rotations; $i ++ ) {
        $hash = hash('sha256', $hash);
    }

    //Sleep a bit to prevent brute force
    time_nanosleep(0, 400000000);
    $hash = $salt . $hash;

    return $hash == $dbpassword;


}*/

        
   
   
    
}