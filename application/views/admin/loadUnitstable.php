    

<style>
input[type="checkbox"].ace, input[type="radio"].ace {
   // opacity: 0;
    position: absolute;
    z-index: 1;
    width: 18px;
    height: 18px;
    cursor: pointer;
}
input[type="checkbox"].ace + .lbl, input[type="radio"].ace + .lbl {
    position: relative;
    display: inline-block;
    margin: 0;
    line-height: 20px;
    min-height: 18px;
    min-width: 13px;
    font-weight: 400;
    cursor: pointer;
}
.active{
    background-color: #efefef;
}
</style>


<div class="row">
    <div class="col-md-12">
    <div  class="table-responsive" style="margin-top:-5px">
        <input type="hidden" value="<?php echo $this->session->userdata("regno") ?>" id="std_regno">
        <input type="hidden" value="<?php echo $this->session->userdata('academicyr') ?>" id="academicyear">
        <input type="hidden" value="<?php echo $this->session->userdata('semester') ?>" id="semester">
        <table class="table table-striped table-bordered table-hover" id="loadunit-table">
            <thead>
                <th class="hidden">ID</th>
                <th class="center">
                    <label class="pos-rel">
                            <input type="checkbox" id="all_checkbox" class="ace" />
                            <span class="lbl"></span>
                    </label>
                </th>
                <th>Course Unit(Title)</th>
                 <th>Type</th>
                <th>Semester</th>
                <th>Academic Year</th>
                <th>Status</th>
            </thead>
            <tbody>
                <?php if(!empty($units)) { foreach ($units as $row) { ?>
                    <tr>
                        <td class="hidden user"></td>
                        <td class="center">
                            <label class="pos-rel">
                                    <input type="checkbox" value="<?= $row->UNITID ?>" class="ace" />
                                    <span class="lbl"></span>
                            </label>
                        </td>
                        <td><?= $row->UNITNAME ?> </td>
                        <td><?= $row->TYPE ?></td>
                        <td><?= $row->SEMESTER ?></td>
                        <td><?= $row->ACADEMICYEAR ?></td>
                        <td>UNREGISTERED</td>
                       <!-- <td><a href="javascript:;" id="delete_user" onclick="GenericDelete(${users.id},'DeleteUser','SelectUser')" class=" btn btn-reddit btn-xs glyphicon glyphicon-trash"></a></td>
                        -->
                       <!--  <td><a href="#" role="${user.status}" id="${user.id}" class="edit-user">Activate</a>
                             <a href="#" role="${user.status}" id="${user.id}" class="edit-user">Disable</a></td>-->
                    </tr>
                <?php } }  ?>
            </tbody>
         </table>
        </div>
    </div>
 </div>
 <div class="row">
    <div class="cdl" style="margin-top:0px">
        <button class="btn btn-success pull-left btn-sm register-btn">Register Units</button>
    </div>
</div>

    <script>

            $("body").on('click',".register-btn",function(){
                var regno=$("#std_regno").val();
                var academicyear=$("#academicyear").val();
                var semester=$("#semester").val();
                var id=[];
                var base_url="http://localhost/UnitApp/";
                $(':checkbox:checked').each(function(i){
                     id[i]=$(this).val();
                  })

                if(id.length===0){
                     sweetAlert("Oops...", "Select atleast one unit!", "error");
                      //alert("select atleat one checkbox");
                }else{
                    $(".loader").show();
                    $.ajax({
                        url:base_url+"index.php/ManageUnits/studentRegisterUnit",
                        method:"POST",
                        data:{id,regno,academicyear,semester},
                        success:function(data) {
                            if(data=="success"){
                                 // $(".msg").html("success! you have regitered units successfully");
                                 // $(".DisplayMsg").show().fadeOut('10000');
                                  sweetAlert({
                                        title:"success",
                                        text:"you have regitered units successfully",
                                        type:"success",
                                        onClose:function(){
                                          //load registered units
                                           $.get(base_url+"index.php/ManageUnits/loadRegisteredUnits",{
                                              regno:regno,academic_year:academicyear,semester:semester
                                            },function(units){
                                              $("#dashboard").html(units)
                                            })
                                        }
                                  })

                            }else{
                               sweetAlert("Error!!",data,"error");
                                  //$(".msg").html(data);
                                  // $(".DisplayMsg").show().fadeOut('slow');
                                   $("#unit-table tr td").find('input[type=checkbox]').each(function(i){
                                       $(this).prop("checked",false);

                                  })
                            }
                           
                          $(".loader").hide();
                        }
                    })
                    
                }
            })
             /////////////////////////////////
                //table checkboxes
           $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
             var active_class = 'active';
            //select/deselect all rows according to table header checkbox
            $("#all_checkbox").change(function(){
                if($(this).prop("checked")){
                    $("tbody tr td input[type=checkbox]").each(function(){
                        $(this).prop('checked',true);
                        $(this).closest("tr").each(function(){
                            $(this).addClass(active_class);
                        });
                    });
                }else{
                     $("tbody tr td input[type=checkbox]").each(function(){
                        $(this).prop('checked',false);
                        $(this).closest("tr").each(function(){
                            $(this).removeClass(active_class);
                        });
                    });
                }
            })

            $("#unit-table > thead > tr > th input[type=checkbox]").eq(0).on("click",function(){
                var th_checked=$(this).checked;//checkbox inside TH
                $(this).closest('table').find('tbody > tr').each(function(){
                   var $row = this;
                   if(th_checked) $row.addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                    else $row.removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
                });
            });
            //select/deselect a row when the checkbox is checked/unchecked
            $("#unit-table").on("click","td input[type=checkbox]",function(){
               var $row=$(this).closest("tr");
                if($row.is('.detail-row')) return;
                if(this.checked) $row.addClass(active_class);
                else $row.removeClass(active_class);

            })


    </script>

    <script>
            $(function(){

                   $('#loadunit-table').DataTable({
                      "paging": true,
                      "lengthChange": true,
                      "searching":true,
                      "ordering": true,
                      "info": true,
                      "autoWidth": true
                  });

               });
  </script>