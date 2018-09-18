





<!--<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Units</title>

      
  
        

    </head>
      <body>
   
      
 
       <div class="wo fadeInUp" data-wow-offset="0" data-wow-delay="0.9s"> 
            <div class="container-fluid">
                   <div class="container" style="" id="main-container">
                    <div class="row">
                        <div class="col-md-3">
                          
                        

                        </div>
                        <div class="col-md-9">
                             <ul class="breadcrumb" style="padding:11px">
                                  <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                                  <li class="active">Course Units</li>
                              </ul>
                            
                           <div classs="main-content">
                                       <div class="row"> 
                                                 

                                                    <div class="col-md-12 col-sm-12" id="Result-Center">-->

                                              <h3 style="text-align:center;font-size:30px;font-weight:bold;margin-top:-20px;color:#000">Add Units</h3>
                                                    <div class="unit-form">
                                                            <form role="form" id="Unitform"> 
                                                                <div class="box-body">
                                                                  <div class="col-md-6">
                                                                      <div class="form-group">
                                                                          <label for="exampleInputEmail1">Course(Unit) Title</label>
                                                                          <input type="text" class="form-control" id="" name="unit_title" placeholder="">
                                                                           <?php echo form_error('unit_title', '<div class="error">', '</div>'); ?>
                                                                      </div>
                                                                      <div class="form-group">
                                                                          <label for="status">Semester</label>
                                                                          <select class="form-control select2" name="semester" style="width: 100%;">
                                                                                <option selected="selected"></option>
                                                                                <option>Semester 1</option>
                                                                                <option>Semester 2</option>
                                                                           </select>
                                                                           <?php echo form_error('semester','<div class="error">','</div>'); ?>
                                                                      </div>
                                                                      <div class="form-group">
                                                                         <label for="status">Academic Year</label>
                                                                            <select class="form-control select2" name="academic_year" style="width: 100%;">
                                                                                  <option selected="selected"></option>
                                                                                   <option>2019-2020</option>
                                                                                   <option>2018-2019</option>
                                                                                    <option>2017-2018</option>
                                                                                    <option>2016-2017</option>
                                                                                    <option>2015-2016</option>
                                                                                    <option>2014-2015</option>
                                                                            </select>
                                                                            <?php echo form_error('academic_year','<div class="error">','</div>') ?>
                                                                       </div>
                                                                      
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="username">Type</label>
                                                                            <select class="form-control select2" name="type" style="width: 100%;">
                                                                                <option selected="selected"></option>
                                                                                <option>Core Unit</option>
                                                                                <option>Common Unit</option>
                                                                             </select>
                                                                              <?php echo form_error('type', '<div class="error">', '</div>'); ?>
                                                                        </div>
                                                                         <div class="form-group">
                                                                            <label for="username">Season</label>
                                                                            <select class="form-control select2" name="season" style="width: 100%;">
                                                                                <option selected="selected"></option>
                                                                                <option>March-Jun</option>
                                                                                <option>Sept-Dec</option>
                                                                             </select>
                                                                              <?php echo form_error('season', '<div class="error">', '</div>'); ?>
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
                                                                       
                                                                     </div>

                                                                 </div>
                                                                 <button class="pull-right btn btn-primary">Save</button>
                                                            </form>
                                                     </div>

                                             <!--   </div>

                               </div>
                             </div>

                            </div>
                         </div>
                    </div>
               </div>
           </div>
 


     
    </body>
</html>-->


    <script>
//$("#Unitform").submit(function(e){
   //e.preventDefault();
            
        
    //validate form data before submitting 
     $("#Unitform").validate({
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
           $(".loader").show();
               $.ajax({
                      url:"<?php echo base_url();?>index.php/ManageUnits/Units/create",
                      type:"POST",
                      data:$(form).serialize(),
                      success:function(data){
                           $(".loader").hide();
                           $(".DisplayMsg").show();
                           $(".msg").html("Data successfully added");
                           $("#Unitform")[0].reset();
                      }
                })
        }
      
    });  
//});

</script>

     
