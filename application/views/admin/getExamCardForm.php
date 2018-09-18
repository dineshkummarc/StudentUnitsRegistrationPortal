

   <h2 style="margin-left: 17px;margin-top: -20px;">Fill The following form to Load Units</h2>                              
   <div class="getExam-form">
        <form role="form" id="ExamCardform"> 
            <div class="box-body">
              <div class="col-md-6">
                  
                  <div class="form-group">
                      <label for="status">My Programme</label>
                       <select class="form-control select2" name="programme" style="width: 100%;">
                                 <option selected="selected"></option>
                                 <option value="<?php echo $this->session->userdata("programmeid") ?>"><?php echo $this->session->userdata("programme") ?></option>
                                
                            </select>
                      <input type="hidden" class="form-control" value="<?php echo $this->session->userdata("regno") ?>" id="" name="regno" placeholder="programme">
                  </div>
                  <div class="form-group">
                     <label for="status">Semester</label>
                        <select class="form-control select2" name="semester" style="width: 100%;">
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
                          <select class="form-control select2" name="season" style="width: 100%;">
                              <option selected="selected"></option>
                              <option>March-Jun</option>
                              <option>Sept-Dec</option>
                           </select>
                            <?php echo form_error('season', '<div class="error">', '</div>'); ?>
                       </div>
                       <div class="form-group">
                           <label for="username">Academic Year</label>
                            <select class="form-control select2" name="academic_year" style="width: 100%;">
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

                                                   
    
<script>

      $("#ExamCardform").submit(function(e){
                  e.preventDefault();
                  var formdata=$(this).serialize();
                  var base_url="http://localhost/UnitApp/";
                  $("#dashboard").load(base_url+"index.php/ManageUnits/loadRegisteredUnits",formdata);
      })

    </script>

     




















   
     
