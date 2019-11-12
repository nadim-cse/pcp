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
               <?php $Query= $this->db->query("SELECT t_name FROM referred_proposals r INNER JOIN teachers t ON r.t_id = t.t_id WHERE proposal_id = '$pd->proposal_id'");?>
               <?php foreach($Query->result() as $tName):?>
               <h2>This Proposal Is Reffered to <span style="color:green"><?php echo $tName->t_name; ?></span></h2>
               <?php endforeach;?>
               
               <?php break;?>
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
               <!--Objective:-->        
               <br>
               <!--Key feature-->        
               <h3>Key features:</h3>
               <br>
               <p><?php echo $pd->project_features; ?> </p>
               <br>
               <!--Number of module:-->        
               <h3>Number of Modules:</h3>
               <br>
               <p>The system after careful analysis has been identified to be presented with the following modules: </p>
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
               <?php if($pd->project_status == '1'): ?>
               <h3>Teacher's Comment:</h3>
               <br>
               <p><?php echo $pd->t_comment; ?></p>
               <br>
               <?php endif; ?>
            </div>
            <br>
            <br>
           
            <?php if($pd->project_status == '0' ): ?>
            <?php $ReferredFrom = $this->session->userdata('current_teacher_id');?>
            <div class="row">
               <div class="col-md-12">
                  <h2 class="text-left">Do you want reffer this proposal to another teacher ? <button class="btn btn-warning" onclick="RefferFunction();" >Yes</button></h2>
                  <div id="reffer-div">
                     <?php echo form_open('Proposal/TransferProposal', array('class' => 'refered-form'));  ?>
                     <div class="form-group">
                        <select name="proposaldetails" class="form-control" id="referteacher">
                           <option value="" readonly> ------ Select One Teacher ----</option>
                           <?php foreach($resultObj as $total_pro => $ress): ?>
                           <?php foreach($ress as  $t): ?>
                           <?php if($this->session->userdata('current_user_name') == $t->t_name ): ?>
                           <?php else: ?>
                           <?php  if($t->project_limit != $t->remining_limit) :?>
                           <option value="<?php echo $t->t_id.','.$pd->proposal_id.','.$this->session->userdata('current_user_name').','.$ReferredFrom; ?>"><?php echo ucwords($t->t_name).'(Total Projects Assign :- '. $total_pro.')'; ?></option>
                           <?php endif; ?> 
                           <?php endif; ?> 
                           <?php endforeach; ?>
                           <?php endforeach; ?>
                        </select>
                     </div>
                     <div id="refer-button"></div>
                     <?php echo form_close(); ?>
                  </div>
               </div>
               <div class="RefferedSuccess"></div>
            </div>
            <?php elseif($pd->project_status == '0'): ?>
            
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
               <div class="col-md-12 col-md-offset-4" id="accept-proposal">
                  <?php if($pd->project_status == '0'): ?>
                  <input class="btn btn-success" type="submit" value="Accept">
                  <?php echo form_close();?>
                  <?php endif;  ?>   
                  <a href='<?php echo site_url('deny-proposal/'.$pd->proposal_id.'/'.$pd->project_name); ?>' class='btn btn-danger'>Reject</a>
               </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
         </div>
           <?php else: ?>
         <?php endif;?>   
    
      </div>
   </div>
   <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->