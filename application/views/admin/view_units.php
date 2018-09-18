




    


<!--<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Units</title>

        <!-- Bootstrap -->
       
  
        

   <!-- </head>
      <body>-->
   
 
      <!-- <div class="wo fadeInUp" data-wow-offset="0" data-wow-delay="0.9s"> 
            <div class="container-fluid">
                      <div class="container" style="" id="main-container">
                    <div class="row">
                        <div class="col-md-3">
                          
                         

                        </div>
                        <div class="col-md-9">
                             <ul class="breadcrumb" style="padding:11px">
                                  <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                                  <li class="active">Users</li>
                              </ul>
                            
                           <div classs="main-content">
                                       <div class="row">   

                                                  <div class="col-md-12 col-sm-12" id="Result-Center">-->
                                                    <h3 style="text-align:center;font-size:30px;font-weight:bold;margin-top:-20px;color:#000">All Units</h3>
                                                    <div  class="table-responsive users-table" style="margin-top:10px">
                                                        <table class="table table-striped table-bordered table-hover" id="unit-table">
                                                            <thead>
                                                                <th class="hidden">ID</th>
                                                                <th>Unit Title</th>
                                                                <th>Type</th>
                                                                <th>Semester</th>
                                                                <th>Academic Year</th>
                                                               <!-- <th>Programme</th>-->
                                                                <th>Season</th>
                                                                <!--<th>Action</th>-->
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($units as $row) { ?>
                                                                   <tr>
                                                                        <td class="hidden user"><?php $row->UNITID ?></td>
                                                                        <td><?php echo $row->UNITNAME ?> </td>
                                                                        <td><?php echo $row->TYPE ?></td>
                                                                        <td><?php  echo $row->SEMESTER ?></td>
                                                                        <td><?php echo $row->ACADEMICYEAR ?></td>
                                                                      <!--  <td><?php echo $row->PROGRAMME ?></td>-->
                                                                        <td><?php echo $row->SEASON ?></td>
                                                                       <!-- <td><a href="" id="delete-unit" class="hidden" role="<?php echo $row->UNITID ?>">delete</a></td>-->
                                                                       
                                                                    </tr>
                                                               <?php } ?>
                                                            </tbody>
                                                         </table>
                                                     </div>

                                          <!--   </div>
                                    </div>

                            </div>
                         </div>
                    </div>
               </div>
           </div>-->

   
  
 
 <script>
      $(document).ready(function() {
          $('#unit-tabe').DataTable( {
              dom: 'Bfrtip',
              buttons: [
                  'copy', 'csv', 'excel', 'pdf', 'print'
              ]
          } );
      } );


    $(function(){

           $('#unit-table').DataTable({
              "paging": true,
              "lengthChange": true,
              "searching":true,
              "ordering": true,
              "info": true,
              "autoWidth": true,
              buttons: [
                  'copy', 'csv', 'excel', 'pdf', 'print'
              ]
          });

       });

        $('body').on('click',"#delete-unit",function(){

                     var id=$(this).attr('role');
                      alert(id)
                    $.ajax({
                      url:"<?php echo base_url();?>index.php/ManageUnits/deleteUnit",
                      type:"POST",
                      data:{id:id},
                      success:function(data){
                           if(data=="success"){
                                alert("fsdd");

                           }else{
                              

               }
            
              $(".loader").hide();

          }
    })

           })
  </script>



  
     
