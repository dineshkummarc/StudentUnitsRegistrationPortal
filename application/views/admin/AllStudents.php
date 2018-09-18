


        
                                     <h3 style="text-align:center;font-size:30px;font-weight:bold;margin-top:-20px;color:#000">All Students</h3>
                                                     <div  class="table-responsive student-table" style="margin-top:15px">
                                                        <table class="table table-striped table-bordered table-hover" id="student-table">
                                                            <thead>
                                                                <th>Reg No</th>
                                                                <th>First Name</th>
                                                                <th>Last Name</th>
                                                                <th>Programme</th>
                                                                <th>Email Address</th>
                                                                <th>Phone Number</th>
                                                                <th>Action</th>
                                                            </thead>
                                                            <tbody>
                                                                <?php if(!empty($student)) { foreach ($student as $row) { ?>
                                                                   <tr>
                                                                        <td><?php  echo $row->REGNO ?></td>
                                                                        <td><?php echo $row->USERNAME ?> </td>
                                                                        <td><?php echo $row->FIRSTNAME ?> </td>
                                                                        <td><?php echo $row->PROGRAMME ?></td>
                                                                        <td><?php echo $row->EMAILADDRESS ?></td>
                                                                        <td><?php echo $row->PHONENUMBER ?></td>
                                                                        <td><a href="javascript:void(0)" id="delete-student" role="<?php  echo $row->REGNO ?>">delete</a></td>
                                                                       
                                                                       
                                                                    </tr>
                                                               <?php } } ?>
                                                            </tbody>
                                                         </table>
                                                     </div>



  
  <script>
       $(function(){

           $('#student-table').DataTable({
              "paging": true,
              "lengthChange": true,
              "searching":true,
              "ordering": true,
              "info": true,
              "autoWidth": true
          });

           $('body').on('click',"#delete-student",function(){
                     var id=$(this).attr('role');
                    $.ajax({
                      url:"<?php echo base_url();?>index.php/ManageStudents/Student/delete",
                      type:"POST",
                      data:{regno:id},
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
                                text:"Data successfully deleted",
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

           })

       });


  </script>
