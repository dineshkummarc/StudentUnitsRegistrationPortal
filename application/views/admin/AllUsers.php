


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
                        <div class="col-md-9">
                             <ul class="breadcrumb" style="padding:11px">
                                    <li><a href="">Home</a> <span class="divider">/</span></li>
                                    <li class=""><a href="">Users</a><span class="divider">/</span></li>
                                    <li class="active"><a href="<?php echo base_url(); ?>index.php/ManageUsers/AddUser/NewUsers">Add User</a></li>
                              </ul>
                            
                           <div classs="main-content">

                                       <div class="row">       

                                                  <div class="col-md-12 col-sm-12" id="Result-Center">-->
                                                   <h3 style="text-align:center;font-size:30px;font-weight:bold;margin-top:-20px;color:#000">All Users</h3>
                                                     <div  class="table-responsive users-table" style="margin-top:5px">
                                                        <table class="table table-striped table-bordered table-hover" id="user-table">
                                                            <thead>
                                                                <th class="hidden">ID</th>
                                                                <th>Name</th>
                                                                <th>Email Address</th>
                                                                <th>Role</th>
                                                                <th>Account Status</th>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($users as $row) { ?>
                                                                   <tr id="" title="double click to view profile">
                                                                        <td class="hidden user"><?php $row->USERID ?></td>
                                                                        <td><?php echo $row->USERNAME ?> </td>
                                                                        <td><?php echo $row->EMAILADDRESS ?></td>
                                                                        <td><?php  echo $row->ROLE ?></td>
                                                                        <td><?php echo $row->STATUS ?></td>
                                                                     </tr>
                                                               <?php } ?>
                                                            </tbody>
                                                         </table>
                                                     </div>

                                              <!-- </div>

                                       </div>
                                  </div>

                            </div>
                         </div>
                    </div>
               </div>
           </div>-->



  <script>
    $(function(){

           $('#user-table').DataTable({
              "paging": true,
              "lengthChange": true,
              "searching":true,
              "ordering": true,
              "info": true,
              "autoWidth": true
          });

       });
  </script>

    </body>
</html>



  
     
