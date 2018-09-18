

    
<script>
$(document).ready(function(){
    /*var reg = new RegExp("^07[0-9]{9}$");
    var mobile = document.getElementById("phonenumber").value;
    if(!reg.test(mobile))
    {
       $(".error").html("Invalid phone number");
     // alert("Invalid mobile number");
      return false;

    }*/
})


function phonenumber(inputtxt)
{
    var phone_number = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    if (inputtxt.value.match(phone_number))
    {
        return true;
    }
    else
    {
      //$(".error").html("Not a valid Phone Number");
        alert("Not a valid Phone Number");
        return false;
    }
}

</script>

<!--<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Users</title>

  
        

    </head>
      <body>
   
    
 
       <div class="wo fadeInUp" data-wow-offset="0" data-wow-delay="0.9s"> 
            <div class="container-fluid">
                <div class="container" style="" id="main-container">
                    <div class="row">
                        <div class="col-md-3">
                              

                        </div>
                        <div class="col-md-9">-->
                            <!-- <ul class="breadcrumb" style="padding:11px">
                                  <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                                  <li class="active">Add Students</li>
                              </ul>-->
                           <!-- <div classs="main-content">
                                <div class="row">       

                                                  <div class="col-md-12 col-sm-12" id="Result-Center" style="margin">-->
                                                    <h2 id="myprofile">Add Student</h2>
                                                      <div class="student-form">
                                                       <!-- <?php //echo form_open('index.php/ManageStudents/Student/create' , array('class' => 'validatable'));?>-->
                                                          <form role="form" id="studentform" method="post">
                                                               <div class="col-md-6">
                                                                     <div class="form-group">
                                                                                <label for="regno">Reg No</label>
                                                                                <input type="text" name="regno" class="form-control" data-field="REGNO" id="" placeholder="">
                                                                                 <?php echo form_error('regno', '<div class="error">', '</div>'); ?>

                                                                      </div>
                                                                      <div class="form-group">
                                                                          <label for="exampleInputEmail1">First Name</label>
                                                                          <input type="text" class="form-control" id="firstname" data-field="FIRSTNAME" name="firstname" placeholder="firstName">
                                                                           <?php echo form_error('firstname', '<div class="error">', '</div>'); ?>
                                                                      </div>
                                                                      <div class="form-group">
                                                                          <label for="status">last Name</label>
                                                                          <input type="text" class="form-control "  id="lastname" data-field="LASTNAME" name="lastname" placeholder="Lastname">
                                                                           <?php echo form_error('lastname', '<div class="error">', '</div>'); ?>
                                                                      </div>
                                                                      <div class="form-group">
                                                                         <label for="status">Phone Number</label>
                                                                            <input type="text" class="form-control "  id="phonenumber" maxLength="10"  data-field="PHONENUMBER" name="phonenumber" placeholder="">
                                                                            <?php echo form_error('phonenumber', '<div class="error">', '</div>'); ?>
                                                                       </div>
                                                                       <div class="form-group">
                                                                         <label for="status">Gender</label>
                                                                            <input type="text" class="form-control" data-field="GENDER" id="" name="gender" placeholder="">
                                                                            <?php echo form_error('gender', '<div class="error">', '</div>'); ?>
                                                                       </div>
                                                                     
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="username">User Name</label>
                                                                            <input type="text" name="username" class="form-control" data-field="USERNAME"  id="username" placeholder="">
                                                                            <?php echo form_error('username', '<div class="error">', '</div>'); ?>
                                                                        </div>
                                                                        <div class="form-group">
                                                                                <label for="exampleInputPassword1">Password</label>
                                                                                <input type="password" name="password" class="form-control" data-field="PASSWORD" id="password" placeholder="Password">
                                                                                <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="role">Programme</label>
                                                                              <select class="form-control select2" name="programme" style="width: 100%;">
                                                                                    <option selected="selected"></option>
                                                                                   <?php  foreach ($prog as $row ) { ?>
                                                                                       <option value="<?php echo $row->PROGRAMMEID ?>"><?php echo $row->PROGRAMMENAME ?></option>
                                                                                   <?php } ?>
                                                                             </select>
                                                                              <?php echo form_error('programme', '<div class="error">', '</div>'); ?>
                                                                        </div>
                          
                                                                        <div class="form-group">
                                                                                <label for="email">Email Address</label>
                                                                                <input type="email" name="email" class="form-control" data-field="EMAILADDRESS" id="email" placeholder="">
                                                                                 <?php echo form_error('email', '<div class="error">', '</div>'); ?>

                                                                        </div>
                                                                   
                                                                     </div>
                                                                  <button class="pull-right btn btn-primary">Save</button>
                                                            </form>
                                                      </div>
                                               <!-- </div>
                                         </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
           </div>
 <footer>
    <div class="social-icon">
                <div class="container">
                        <div class="col-md-6 col-md-offset-3">            
                                <ul class="social-network">
                                        <li><a href="#" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
                                        <li><a href="#" class="dribbble tool-tip" title="Dribbble"><i class="fa fa-dribbble"></i></a></li>
                                        <li><a href="#" class="pinterest tool-tip" title="Pinterest"><i class="fa fa-pinterest-square"></i></a></li>
                                </ul>           
                        </div>
                </div>
        </div>  
        <div class="text-center">
      <div class="copyright">
        &copy; 2018 <a target="_blank" href="#" title=""></a>. All Rights Reserved.
      </div>
            <!-- 
                All links in the footer should remain intact. 
                Licenseing information is available at: http://bootstraptaste.com/license/
                You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Bikin
            -->
       <!-- </div>                  
    </footer>



    </body>
</html>-->
<script>
//$("#studentform").submit(function(e){
  // e.preventDefault();
           
    
        
    //validate form data before submitting 
     $("#studentform").validate({
        rules: {
            username: {
                required: true
            },
            password: {
                minlength: 5,
                required: true
            },
            status: {
                required: true
            },
            firstname: {
                required: true
            },
           regno: {
                required: true
            },
            email: {
                required: true
            },
            phonenumber: {
                required: true,
                number:true,
                minlength:10
            },
            lastname: {
                required: true
            },
             gender: {
                required: true
            },
             programme: {
                required: true
            },
           
        },
        messages: {
            emailaddress: {
                required: "please enter your email address",
            },
            phonenumber: {
                required: "please enter your phone number",
            },
        },
        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },submitHandler:function(form){
            //  var formdata=$(this).serialize();
            //  var form_url=$(this).attr("action");
             // var form_method=$(this).attr("method").toUpperCase();
               GenericSubmitForm();
        }
      
    });  
//});

function GenericSubmitForm(){
 
   $(".loader").show();
   $.ajax({
          url:"<?php echo base_url();?>index.php/ManageStudents/Student/create",
          type:"POST",
          data:$("#studentform").serialize(),
          success:function(data){
               if(data!="success"){
                      sweetAlert({
                        title:"Ooops!",
                        text:data,
                        type:"error",
                        onClose:function(){
                                $("#studentform")[0].reset();
                        }
                  })

               }else{
                    sweetAlert({
                    title:"success",
                    text:"Data successfully added",
                    type:"success",
                    onClose:function(){
                            $.get("<?php echo base_url();?>index.php/ManageStudents/ViewStudents",{},function(student){
                                  $("#Result-Center").html(student);
                                  $("#studentform")[0].reset();

                            })
                          
                          
                    }
              })

               }
            
              $(".loader").hide();

          }
    })
}
</script>
















     
