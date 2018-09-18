
                                                       
                  <div class="users-form">
                    <h2 style="font-size:26px;font-weight: bold;
                      margin-top: -20px;text-align:center;">Add User</h2>
                     <form role="form" id="myUserform"> 
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">First Name</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="firstName">
                                     <?php echo form_error('firstname', '<div class="error">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="status">last Name</label>
                                    <input type="text" class="form-control " id="lastname" name="lastname" placeholder="Lastname">
                                     <?php echo form_error('lastname', '<div class="error">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                   <label for="status">Account Status</label>
                                      <select class="form-control select2" name="status" style="width: 100%;">
                                          <option selected="selected">Active</option>
                                          <option>Active</option>
                                          <option>InActive</option>
                                      </select>
                                      <?php echo form_error('status', '<div class="error">', '</div>'); ?>
                                 </div>
                                 <div class="form-group">
                                      <label for="role">Role</label>
                                      <select class="form-control select2" name="role" style="width: 100%;">
                                          <option selected="selected"></option>
                                          <option>Administrator</option>
                                          <option>COD</option>
                                          <option>Finance Officer</option>
                                        
                                       </select>
                                        <?php echo form_error('role', '<div class="error">', '</div>'); ?>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="username">User Name</label>
                                      <input type="text" name="username" class="form-control"  id="username" placeholder="">
                                      <?php echo form_error('username', '<div class="error">', '</div>'); ?>
                                  </div>
                                  <div class="form-group">
                                          <label for="exampleInputPassword1">Password</label>
                                          <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                          <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                                  </div>
                                  <div class="form-group">
                                          <label for="email">Email Address</label>
                                          <input type="email" name="email" class="form-control" id="email" placeholder="">
                                           <?php echo form_error('email', '<div class="error">', '</div>'); ?>

                                  </div>
                               </div>

                          
                           <button type="submit" class=" user-submit-btn pull-right btn btn-primary">Save</button>
                      </form>
                    </div>
                        

    <script>
//$("#Unitform").submit(function(e){
   //e.preventDefault();
            
        
    //validate form data before submitting 
     $("#myUserform").validate({
        rules: {
            firstname: {
                required: true
            },
           
            lastname: {
                required: true
            },
            status: {
                required: true
            },
          
            role: {
                required: true
            },
            
            email: {
                required: true
            },
             username: {
                required: true
            },
             programme: {
                required: true
            },
           
        },
        messages: {
            firstname: {
                required: "please enter your firstname",
            },
           lastname: {
                required: "please enter your lastname",
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
           $(".loader").show();
          // $.POST("<?php echo base_url();?>index.php/ManageUsers/AddUser",)
               $.ajax({
                      url:"<?php echo base_url();?>index.php/ManageUsers/AddUser",
                      type:"POST",
                      data:$(form).serialize(),
                      success:function(data){
                           $(".loader").hide();
                            // $(".DisplayMsg").show();
                            if(data!="success"){
                                  sweetAlert({
                                  title:"Ooops!",
                                  text:data,
                                  type:"error",
                                  onClose:function(){
                                       $("#myUserform")[0].reset();
                                   }
                            })
                           }else{
                                sweetAlert({
                                title:"success",
                                text:"Data successfully added",
                                type:"success",
                                onClose:function(){
                                        $.get("<?php echo base_url();?>index.php/ManageUsers/View_Users",{},function(user){
                                            $("#Result-Center").html(user);

                                        })
                                    $("#myUserform")[0].reset();
                                      
                                      
                                }
                          })

                          }
                           //$(".msg").html("Data successfully added");
                         
                      }
                })
        }
      
    });  
//});

</script>

<!--
<script>

 $("#myUserform").validate({
        rules: {
            firstname: {
                required: true
            },
           
            lastname: {
                required: true
            },
            role: {
                required: true
            },
          
            email: {
                required: true
            },
            
            password: {
                required: true
            },
            username: {
                required: true
            },
            
           
        },
        messages: {
            firstname: {
                required: "please enter your username",
            },
            lastname: {
                required: "please enter lastname",
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
           $(".loader").show();
               $.ajax({
                      url:"<?php echo base_url();?>index.php/ManageUsers/AddUser",
                      type:"POST",
                      data:$(form).serialize(),
                      success:function(data){
                           $(".loader").hide();
                          // $(".DisplayMsg").show();
                          sweetalert({
                            title:"success",
                            text:"data successfully added",
                            icon:"success",
                            onClose:function({
                              $("#userform")[0].reset();
                            })

                          })
                           //$(".msg").html("Data successfully added");
                           
                      }
                })
        }
      
    });  

</script>
    -->



