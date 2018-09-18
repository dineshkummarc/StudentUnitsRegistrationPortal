 


<style>
.fa-camera{
  margin-top: 100px;
margin-left: 74px;
}
#myprofile{
  margin: -6px 0px 0px 62px;
font-weight: bold;
text-align: center;
font-size: 30px

}
.news_image_wrap{
  background-position: center center;
 background-repeat: no-repeat;
 background-size:cover;
 
}
</style>

<script>
 /*preview image upload*/
    var preview_file = function(event,load_to) {
        $("."+load_to+",#"+load_to).css({"background-image":"url('"+URL.createObjectURL(event.target.files[0])+"')"});
    };

    function   openfile_upload(file){
            document.getElementById(file).click();
          //  document.getElementByName(file).click();
    }
</script>

 <!-- form start -->
          <?php  if(!empty($student)) {
                    foreach ($student as $profile) { ?>
           <div id="user-profile-1" class="user-profile row" style="margin:-10px 0px 50px 0px">
                <div class="col-xs-12 col-sm-3 center" style="background:#eeeeee;margin-top:45px">
                        <div>
                                <span class="profile-picture hidden">
                                        <img id="avatar" class="editable img-responsive" alt="${customerdetails.username}" src="assets/admin/images/avatars/kemripi.jpg" />
                                </span>
                                  <span class="profile-picture">
                                     <div class="news_image_wrap" id="news_image_wrap" onclick=" openfile_upload('profileimage')" style="background-image: url('<?php echo base_url();?>assets/img/team/1.pg');min-height: 220px;min-width: 160px">
                                              <i class="fa fa-camera" style="left: 44% !important;top: 46% !important;"></i>
                                             <input type="file" name="profileimage" class="hidden"  value='' id="profileimage" onchange="preview_file(event,'news_image_wrap')" style='margin-top: 0px;'>
                                      </div>
                                        <img id="avatar" class="editable img-responsive hidden" alt="Alex's Avatar" src="assets/admin/images/avatars/profile-pic.jpg" />
                                </span>

                                <div class="space-4"></div>

                        </div>

                    </div>

                   
                <h2 id="myprofile">My Profile</h2>
                <div class="col-xs-12 col-sm-9">
                     <div class="customer-form profile-user-info ">
                                    <form role="form" id="userform" method="post" > 
                                        <div class="box-body">
                                          <div class="col-md-6">
                                               <div class="form-group">
                                                  <label for="exampleInputEmail1">First Name</label>
                                                  <input type="text" class="form-control" id="firstname" value="<?php echo $profile->FIRSTNAME ?>"  placeholder="">
                                               </div>
                                               <div class="form-group">
                                                  <label for="status">last Name</label>
                                                  <input type="text" class="form-control" id="lastname"  value="<?php echo $profile->LASTNAME ?>" name="" placeholder="">
                                                </div>
                                                <div class="form-group">
                                                        <label for="">Phone Number</label>
                                                        <input type="text" name="email" value="<?php echo $profile->PHONENUMBER ?>" class="form-control" id="phone" placeholder="">
                                                 </div>
                                            </div>
                                            <div class="col-md-6">
                                               <!-- <div class="form-group">
                                                    <label for="username">Programme Name</label>
                                                    <input type="text" name="" class="form-control" readonly=""  value="<?php echo $profile->PROGRAMME ?>" id="homeaddress" placeholder="">
                                                </div>-->
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Gender</label>
                                                    <input type="" name=""   class="form-control" value="<?php echo $profile->GENDER ?>" id="method" placeholder="">
                                                </div>
                                                <div class="form-group">
                                                        <label for="">Email Address</label>
                                                        <input type="text" name="email" value="<?php echo $profile->EMAILADDRESS ?>" class="form-control" id="email" placeholder="">
                                                </div>
                                               
                                             </div>



                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-default btn-small" style="background:#efefef;color:#000;border-color:none" type="submit">Update</button>

                                            </div>
                                        </div>
                                      
                                       
                                    </form>
                                    <?php }  } ?>
                                    
                                       
           

            

           