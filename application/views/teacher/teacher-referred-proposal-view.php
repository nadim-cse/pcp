<!-- MAIN -->
<div class="main">
   <!-- MAIN CONTENT -->
   <div class="main-content">
      <div class="container-fluid">
      <?php if(!empty($resObj)) :?>
         <div class="row">
            <div style="color:red;"><?php if($this->session->flashdata('success')){echo $this->session->flashdata('success');} ?></div>
            <?php foreach($resObj as $project_name => $res):?>
            <?php foreach($res as $pd){
               $project_cat = $pd->project_cat;
               
               }?>
            <div class="col-md-12">
               <?php if($pd->is_reffered == '1'): ?>
               <h2></h2>
               <?php elseif($pd->project_status == '0'): ?>
                 <h2 class="text-center text-danger">Pending Proposal</h2>
               <?php  elseif($pd->project_status == '1'): ?>
                 <h2 class="text-center text-success text-uppercase font-weight-bold">This Proposal has been accepted at <span style="color:red;font-weight:bold;"><?php echo date("d M, Y(h:i A)", strtotime($pd->accepted_at));  ?></span></h2>
               <?php  elseif($pd->project_status == '3'): ?>
                <h2 class="text-center text-success text-uppercase font-weight-bold">This Proposal has been Rejected at <span style="color:red;font-weight:bold;"><?php echo date("d M, Y(h:i A)", strtotime($pd->rejected_at));  ?></span></h2>
               <?php endif;  ?>   
               <h3>Project Name: <strong><?php echo $project_name;?></strong></h3>
               <h3>Project Category: <strong><?php echo $project_cat; ?></strong></h3>
               <h3>Team Members:-</h3>
               <ul class="list-group">
                  <?php foreach($res as $pd): ?>
                  <li class="list-group-item">
                     <p>Name: <?php echo $pd->member_name; ?> &nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp; Student ID: <?php echo $pd->member_student_id; ?></p>
                  </li>
                  <?php endforeach; ?>    
               </ul>
               <br>
               <hr>
               <h2 class="text-center"><u>Project Details</u></h2>
               <!--Abstract:-->
               <h3>Abstract:</h3>
               <br>
               <p> 
                  <?php echo $pd->project_abstract; ?> 
               </p>
               <br>
             
               <!--Key feature-->        
               <h3>Key features:</h3>
               <br>
               <!-- <ul class="list-unstyled">
                  <li>-Project Planning</li>
                  <li>-Collaboration</li>
                  <li>-File Sharing</li>
                  <li>-Bug Tracking</li>
                  <li>-Milestone Tracking </li>
                  <li>-Task Management</li>
                  <li>-Resource Management </li>
                  </ul> -->
               <p><?php echo $pd->project_features; ?> </p>
               <br>
               <!--Number of module:-->        
               <h3>Number of Modules:</h3>
               <br>
               <p>The system after careful analysis has been identified to be presented with the following modules: </p>
               <!-- <ul class="list-unstyled">
                  <li>-User Module</li>
                  <li>-Project-board Module</li>
                  </ul> -->
               <p><?php echo $pd->project_modules; ?></p>
               <br>
               <!--Software requirement:-->        
               <h3>Software Requirements:</h3>
               <br>
               <p><?php echo $pd->project_tools; ?></p>
               <br>
               <!--Conclusion:-->        
               <h3>Conclusion:</h3>
               <br>
               <p><?php echo $pd->project_conclusion; ?></p>
               <br>
               <?php if($pd->project_status == '01'): ?>
               <h3>Teacher's Comment:</h3>
               <br>
               <p><?php echo $pd->t_comment; ?></p>
               <br>
               <?php endif; ?>
            </div>
            <br>
            <br>
            <?php if($pd->project_status == '0'): ?>
           
            <?php  elseif($pd->project_status == ''): ?>
            <?php endif;  ?>   
            <?php if($pd->project_status == '1' || $pd->project_status == '3'): ?>
            <?php else: ?>
            <div class="row">
               <div class="col-md-4">
                  <h3><span style="color:red">*</span>Add Comments:</h3>
                  <br>
                  <p class="text-center">
                     <?php echo form_open('accept-proposal');?>
                     <textarea name="teacher_comment" id="" cols="100" rows="5" style="margin-left: 45%;" required></textarea>    
                     <input type="hidden" name="proposal_id" value="<?php echo $pd->proposal_id ?>">
                     <input type="hidden" name="project_name" value="<?php echo $pd->project_name ?>">
                     <input type="hidden" name="t_id" value="<?php echo $this->session->userdata('current_teacher_id') ?>">
                  </p>
               </div>
               <div class="col-md-12 col-md-offset-4" id="">
                  <?php if($pd->project_status == '0'): ?>
                  <!-- <a href='<?php //echo site_url('accept-proposal/'.$pd->proposal_id); ?>' class='btn btn-success'>Accept</a> -->
                  <input class="btn btn-success" type="submit" value="Accept">
                  <?php echo form_close();?>
                  <?php endif;  ?>   
                  <a href='<?php echo site_url('deny-proposal/'.$pd->proposal_id.'/'.$pd->project_name); ?>' class='btn btn-danger'>Reject</a>
               </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
            <!-- <?php //endforeach; ?>  -->
         </div>
      <?php else: ?>
               

      <?php endif;?>   
      </div>
   </div>
   <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->