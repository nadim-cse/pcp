<!-- MAIN -->
<div class="main">
<!-- MAIN CONTENT -->
<div class="main-content">
   <div class="container-fluid">
      <h3 class="page-title"><?php if(isset($title)) echo $title; ?></h3>
      <div class="row">
         <div class="col-md-12">
            <!-- INPUTS -->
            <div class="panel">
               <?php  
                  $CurrentLoggedInStudentEmail = '';
                  $ProjectStatus = 0;
                  $CurrentLoggedInStudentEmail = $this->session->userdata('current_member_email');
                  $Qeury = $this->db->query("SELECT project_status_student FROM student WHERE member_email = '$CurrentLoggedInStudentEmail'");
                  ?>    
               <?php  if($Qeury->result() == true) : ?>
               <?php  foreach($Qeury->result() as  $Status): ?>
               <?php $ProjectStatus = $Status->project_status_student; ?>
               <?php endforeach; ?>   
                <?php endif; ?>   
               <?php if($ProjectStatus):  ?> 
               <div class="panel-heading">
                  <h3 class="panel-title">You have already sent a proposal</h3>
               </div>
               <?php else:  ?> 
               <div class="panel-heading">
                  <h3 class="panel-title">Email Checking System</h3>
               </div>
               <div class="panel-body">
                  <div class="row">
                     <div class="col-sm-12 col-md-12 col-lg-12 form-box">
                        <?php echo form_open('Proposal/ProposalDataGeneration', array('class' => 'email-submits-form f1', 'role' => 'form')); ?>
                        <fieldset>
                           <div id="field">
                              <div id="field0">
                                 <?php if(isset($CurrentLoggedInStudentEmail)):?>
                                 <div class="form-group">
                                    <label class="sr-only" for="memberEmail">Email</label>
                                    <input type="text" name="LoggedInEmail" class="form-control" value="<?php echo $CurrentLoggedInStudentEmail; ?>"  readonly>
                                 </div>
                                 <?php endif;?>
                                <div id="NonLoggedInStudents"></div>
                                 <div class="result"></div>
                                 <!-- <div style="color:red;"><?php if($this->session->flashdata('success')){echo $this->session->flashdata('success');} ?></div> -->
                                 <div class="IDError"></div>
                              </div>
                           </div>
                           <div class="form-group submitbuttonforsinglestudent">
                           <input type='submit' id='prosystembtn' class='btn btn-primary' value='Go to proposal Submit System'>
                           </div>
                           <div class="form-group">
                              <a href="#" id="add-more-member" type="button" class="btn btn-warning" >Add 1 Member</a>
                            </div>
                            <div id="RemoveField"></div>
                           <br>
                           <div class="f1-buttons">
                              <!-- <input type="submit" class="btn btn-success" value="Check"> -->
                              
                              <a hre="" onclick="CheckEmailStatus('<?php echo $CurrentLoggedInStudentEmail; ?>');" class="btn btn-success" id="checkbtn">Check</a>
                           </div>
                            
                        </fieldset>
                        <h2>Result</h2>
                        <div id="results"></div>
                        <div class="proposalBtn"></div>
                        <?php echo form_close(); ?>     
                     </div>
                  </div>
               </div>
               <?php endif;  ?> 
            </div>
            <!-- END INPUTS -->
         </div>
      </div>
   </div>
   <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->