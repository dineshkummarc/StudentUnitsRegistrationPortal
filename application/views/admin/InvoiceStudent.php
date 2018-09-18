
   <script>
           function isNumber(evt) {
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
                        }
    </script>


 <h3 style="text-align:center;font-size:30px;font-weight:bold;margin-top:-20px;color:#000">Batch Invoice</h3>
      <div class="Invoice-form">
            <form role="form" id="batchInvoiceform" method="post" > 
                <div class="box-body">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Invoice Amount</label>
                          <input type="text" class="form-control" id="" onkeypress="return isNumber(event)" name="invoice_amount" placeholder="">
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
                      </div>
                  
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                         <label for="status">Class/Programme</label>
                            <select class="form-control select2" name="programme" style="width: 100%;">
                                <option selected="selected"></option>
                                <?php foreach ($programme as $key ) { ?>
                                      <option value="<?= $key->PROGRAMMEID ?>"><?= $key->PROGRAMMENAME ?></option>
                                      
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="role">Semester</label>
                            <select class="form-control select2" name="semester" style="width: 100%;">
                                <option selected="selected"></option>
                                <option>Semester 1</option>
                                <option>Semester 2</option>
                             </select>
                       </div>
                     </div>

                 </div>
                 <button class="pull-right btn btn-primary">Invoice</button>
            </form>
     </div>

      <!--single invoice-->
      <div class="singleInvoice-form" style="display:none">
            <form role="form" id="SingleInvoiceform" method="post" > 
                <div class="box-body">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Invoice Amount</label>
                          <input type="text" class="form-control" id="firstname" name="invoice_amount" placeholder="firstName">
                      </div>
                      <div class="form-group">
                          <label for="status">Student Name</label>
                          <input type="text" class="form-control" id="lastname" name="regno" placeholder="Lastname">
                      </div>
                  
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                            <label for="role">Semester</label>
                            <select class="form-control select2" name="semester" style="width: 100%;">
                                <option selected="selected"></option>
                                <option>Semester 1</option>
                                <option>Semester 2</option>
                             </select>
                        </div>
                        <div class="form-group">
                          <label for="status">Academic Year</label>
                          <input type="text" class="form-control" id="lastname" name="academic_year" placeholder="Lastname">
                        </div>
                       
                     </div>

                 </div>
                 <button class="pull-right btn btn-primary">Invoice </button>
            </form>
     </div>







    <script>
        //validate form by setting rules
   $("#batchInvoiceform").validate({
        rules: {
            invoice_amount: {
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
            programme: {
                required: true
            },
            semester: {
                required: true
            },
           
        },
        messages: {
            invoice_amount: {
                required: "please enter amount",
            },
            semester: {
                required: "select your semester",
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
                      url:"<?php echo base_url();?>index.php/ManageStudents/StudentInvoice/BatchInvoice",
                      type:"POST",
                      data:$(form).serialize(),
                      success:function(data){
                           $(".loader").hide();
                           $(".DisplayMsg").show();
                           $(".msg").html("Invoiced successfully..");
                           $("#batchInvoiceform")[0].reset();
                      }
                })
        }
      
    });  
        </script>
        
   

     
