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
 
  <h3 style="text-align:center;font-size:30px;font-weight:bold;margin-top:-20px;color:#000">Receive Payment</h3>
      <!--single invoice-->
      <div class="payment-form" style="">
            <form role="form" id="ReceiveInvoiceform" method="post" > 
                <div class="box-body">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Payment Amount</label>
                          <input type="text" class="form-control"  onkeypress="return isNumber(event)" id="firstname" name="payment_amount" placeholder="">
                      </div>
                      <div class="form-group">
                          <label for="status">Student RegNo</label>
                          <input type="text" class="form-control" id="regno" name="regno" placeholder="">
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
                          <input type="text" class="form-control" id="" name="academic_year" placeholder="">
                        </div>
                     </div>

                 </div>
                 <button class="pull-right btn btn-primary">Receive </button>
            </form>
     </div>







    <script>
        //validate form by setting rules
   $("#ReceiveInvoiceform").validate({
        rules: {
            payment_amount: {
                required: true
            },
           academic_year: {
                required: true
            },
            season: {
                required: true
            },
          
           regno: {
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
                      url:"<?php echo base_url();?>index.php/ManageStudents/StudentInvoice/ReceivePayment",
                      type:"POST",
                      data:$(form).serialize(),
                      success:function(data){
                           $(".loader").hide();
                           $(".DisplayMsg").show();
                           $(".msg").html(data);
                           $(".DisplayMsg").fadeOut('slow');
                           $("#ReceiveInvoiceform")[0].reset();
                      }
                })
        }
      
    });  
        </script>
        
   

     
