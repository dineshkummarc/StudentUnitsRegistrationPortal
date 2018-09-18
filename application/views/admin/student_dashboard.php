

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Student Profile</title>

        <!-- Bootstrap -->
  <?php include "include-css.php"  ?>
        
<style>
.right-bar{
  background: #efefef;
}
.right-bar li a {
  color:#000;
}
.right-bar li a:hover{
     color:#fff;
     background-color: #000;
}
.right-bar ul li{
   display: inline;
}
.dropdown-menu{
 display: none;
}

</style>
    </head>
      <body>
   
      <?php include "HeaderNavigation.php"  ?>
 
       <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.9s">	
            <div class="container-fluid">
                <div class="container" style="margin-top:66px;">
                    <div class="row">
                        <!--<div class="col-md-3">
                          <!-- <?php include "sidebar-navigation.php" ?>-->

                       <!-- </div>-->
                        <div class="col-md-12">
                             <div class="panel well" style="margin-top: -62px;">
                                    <img class="pic" src="<?php echo base_url();?>assets/img/embu-logo.jpg" alt="..." style="padding-bottom:49px;margin-top:31px;margin-left:-20px">
                                    
                                    <div class="name" style="margin-top:-29px">
                                        <h3 style="margin-left: -84px;margin-top: -49px;">Welcome</h3>

                                  <small style="margin-left:-87px"><?php echo $this->session->userdata("firstname") ?> <?php echo $this->session->userdata("lastname") ?></small></div>
                            </div>
                            <div class"mycontent"  style="background:#fff;margin-top: -21px;">

                            <form class="form-inline pull-right" style="margin:-96px -13px;">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label for="status">My Programme</label>
                                              <input type="text" class="form-control" value="<?php echo $this->session->userdata("programme") ?>"  style="width: 380px;" name="programme" placeholder="programme">
                                          </div>
                                        </div>
                           </form>

                                <br><br>
                                <ul class="nav nav-tabs pull-right right-bar"  id="side-bar" style="margin-top:-86px">
                                    <li class="active"><a href="javascript:void(0)" controller="ManageStudents" method="loadStudentProfile" data="<?php echo $this->session->userdata("regno") ?>"><i class="fa fa-user"> </i>My Profile</a></li>
                                    <li><a href="#"><i class="fa fa-check"></i>My Units</a>
                                          <ul class="dropdown-menu">
                                              <li><a href="javascript:void()" controller="ManageUnits" method="loadUnitRegisterform">Register Units</a></li>
                                             <!-- <li><a href="javascript:void()" controller="ManageUnits" method="getExamCardForm">Exam Card</a></li>-->
                                             <li><a href="javascript:void()" controller="ManageUnits" method="getExamCardForm">Vew Units</a></li>
                                              <li><a href="javascript:void()" controller="ManageUnits" method="getDropUnitForm">Drop Units</a></li>
                                          </ul>
                                    </li>
                                    <li><a href="javascript:void(0)" controller="ManageStudents" method="getfinaceStatement" data="<?php echo $this->session->userdata("regno") ?>"><i class="fa fa-briefcase"></i> My Finance</a></li>

                                                              
                                   <!-- <li><a href="#assignment" data-toggle="tab"><i class="fa fa-file-text-o"></i>Mp</a></li>
                                    <li><a href="#event" data-toggle="tab"><i class="fa fa-clock-o"></i> Senator</a></li>-->
                                </ul>
                            <div classs="main-content" >
                                <div class="loader" style="margin-left: 283px;margin-top: -7px;font-size: 18px;background: #ece4e4;padding: 6px; width:100px;display:none">
                                    loading...</div>
                                    <div class="col-md-6 col-md-offset-3">
                                       <div class="DisplayMsg" style="display:none">
                                            <div class='bs-example-modal-sm alert alert-success'><a href='#' class='close'
                                                 data-dismiss='alert' onclick='closeMsgBox()'>&times;</a>
                                                 <strong><div class="msg"></div></strong>
                                            </div>
                                        </div>
                                        <div class="errorMsg" style="display:none">
                                            <div class='bs-example-modal-sm alert alert-danger'><a href='#' class='close'
                                                 data-dismiss='alert' onclick='closeMsgBox()'>&times;</a>
                                                 <strong><div class="errmsg"></div></strong>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">       
                                      <div class="col-md-10 col-sm-12 col-md-offset-1" id="dashboard" style="margin-top:1px">
                                        

          

         

                                         
                                                   
                                      </div>
                               </div>
                           </div>
                         </div>

                  </div>
               </div>
          </div>
     </div>
   </div>
 <footer style="position:fixed-bottom">
 
        <div class="text-center">
			<div class="copyright">
				&copy; 2018 <a target="_blank" href="#" title=""></a>. All Rights Reserved.
			</div>
            <!-- 
                All links in the footer should remain intact. 
                Licenseing information is available at: http://bootstraptaste.com/license/
                You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Bikin
            -->
        </div>									
    </footer>

   <?php include "include-js.php"  ?>
  

      <script>
                      //clicking the sidebar dropdown submenus 
                      $("#side-bar li a").click(function(){

                              var controller=$(this).attr("controller");
                              var method=$(this).attr("method"); 
                              var id=$(this).attr("data");
                              var data="?id="+id+'';
                              var base_url="http://localhost/UnitApp/";
                             // alert(base_url)
                              $("#dashboard").load(base_url+"index.php/"+controller+"/"+method+"/"+data); 

                        });
      </script>
      <script>
          $(document).ready(function(){
              var datas="<?php echo $this->session->userdata("regno") ?>";
              var id="?id="+datas+'';
              var base_url="http://localhost/UnitApp/";
              var controllers="ManageStudents";
              var methods="loadStudentProfile";
              $("#dashboard").load(base_url+"index.php/"+controllers+"/"+methods+"/"+id); 


             $(".right-bar li").hover(function(){
              //alert()
                  $(".dropdown-menu", this).slideDown(100);
               }, function(){
                  $(".dropdown-menu", this).stop().slideUp(100);
              });

        })
     </script>

        
      
    </body>
</html>


