

<!--<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Users</title>

  
        

    </head>
      <body>
   
      <?php //include "HeaderNavigation.php"  ?>
 
       <div class="wo fadeInUp" data-wow-offset="0" data-wow-delay="0.9s"> 
            <div class="container-fluid">
                      <div class="container" style="" id="main-container">
                    <div class="row">
                        <div class="col-md-3">
                          
                          <?php //include "sidebar-navigation.php" ?>

                        </div>
                        <div class="col-md-9">
                             <ul class="breadcrumb" style="padding:11px">
                                  <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                                  <li class="active">Units</li>
                              </ul>
                            
                           <div classs="main-content">
                                       <div class="row">     

                                                    <div class="col-md-12 col-sm-12" id="Result-Center">-->
                                                      <h3 style="text-align:center;font-size:30px;font-weight:bold;margin-top:-20px;color:#000">Fill the Following to Load Units</h3>
                                                             <div class="register-form">
                                                                  <form role="form" id="registerform"> 
                                                                      <div class="box-body">
                                                                        <div class="col-md-6">
                                                                            
                                                                            <div class="form-group">
                                                                                <label for="status">My Programme</label>
                                                                                 <select class="form-control select2" name="programme" required="" style="width: 100%;">
                                                                                           <option selected="selected"></option>
                                                                                           <option value="<?php echo $this->session->userdata("programmeid") ?>"><?php echo $this->session->userdata("programme") ?></option>
                                                                                          
                                                                                      </select>
                                                                               <!-- <input type="text" class="form-control" value="<?php echo $this->session->userdata("programme") ?>" id="" name="programme" placeholder="programme">-->
                                                                            </div>
                                                                            <div class="form-group">
                                                                               <label for="status">Semester</label>
                                                                                  <select class="form-control select2" required="" name="semester" style="width: 100%;">
                                                                                      <option selected="selected"></option>
                                                                                      <option>Semester 1</option>
                                                                                      <option>Semester 2</option>
                                                                                  </select>
                                                                                   <?php echo form_error('season', '<div class="error">', '</div>'); ?>
                                                                             </div>
                                                                            
                                                                          </div>
                                                                             <div class="col-md-6">
                                                                                 <div class="form-group">
                                                                                    <label for="username">Season</label>
                                                                                    <select class="form-control select2" required="" name="season" style="width: 100%;">
                                                                                        <option selected="selected"></option>
                                                                                        <option>March-Jun</option>
                                                                                        <option>Sept-Dec</option>
                                                                                     </select>
                                                                                      <?php echo form_error('season', '<div class="error">', '</div>'); ?>
                                                                                 </div>
                                                                                 <div class="form-group">
                                                                                     <label for="username">Academic Year</label>
                                                                                      <select class="form-control select2" required=""name="academic_year" style="width: 100%;">
                                                                                           <option selected="selected"></option>
                                                                                           <option>2019-2020</option>
                                                                                           <option>2018-2019</option>
                                                                                            <option>2017-2018</option>
                                                                                            <option>2016-2017</option>
                                                                                            <option>2015-2016</option>
                                                                                            <option>2014-2015</option>
                                                                                      </select>
                                                                                      <?php echo form_error('academic_year', '<div class="error">', '</div>'); ?>
                                                                                 </div>
                                                                           
                                                                            
                                                                          </div>
                                                                         </div>
                                                                       <button class="pull-right btn btn-primary">Get Unit</button>
                                                                  </form>
                                                           </div>

                                                              <!--batch invoice-->
                                                              
                                                           

                                                     <!--</div>
                                               
                                               </div>
                                        </div>

                            </div>
                         </div>
                    </div>
               </div>
           </div>

-->
    
<script>

$("#registerform").submit(function(e){
            e.preventDefault();
            var formdata=$(this).serialize();
            var base_url="http://localhost/UnitApp/";
            $("#dashboard").load("http://localhost/UnitApp/index.php/ManageUnits/getUnits",formdata);
})
 //validate form data before submitting 
     $("#registerfor").validate({
        rules: {
            unit_title: {
                required: true
            },
           
            academic_year: {
                required: true
            },
            season: {
                required: true
            },
          
            type: {
                required: true
            },
            
            lastname: {
                required: true
            },
             semester: {
                required: true
            },
             programme: {
                required: true
            },
           
        },
        messages: {
            unit_title: {
                required: "please enter your unit_name",
            },
            semester: {
                required: "please select semester",
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
          // $(".loader").show();
           var formdata=$(form).serialize();
           var base_url="http://localhost/UnitApp/";
           $.get(base_url()+"index.php/ManageUnits/getUnits",function(data,status){
            $("#dashboard").html(data);

           });
          // $("#Content").load(base_url()+"index.php/ManageUnits/getUnits",formdata);
        }
      
    });  
//});
    </script>

     




















   
     
