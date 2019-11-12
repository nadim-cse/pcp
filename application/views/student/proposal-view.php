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
                  <div class="panel-heading">
                     <h3 class="panel-title">Enter Proposal Details</h3>
                  </div>
                  <div class="panel-body">
                  <?php echo form_open('submit-proposal', array('class' => 'proposal-submit-forms f1', 'role' => 'form')); ?>

                     <h4 class="alert-box">Read the form carefully before you write anything</h4>
                     <br>
                     <fieldset>
                        <h4></h4>
                        <div class="form-group">
                           <label class="sr-only" for="f1-first-name">Project Name</label>
                           Project name:<input type="text" name="project_name" placeholder="Enter Project Name" class="f1-first-name form-control" id="f1-first-name" required>
                        </div>
                        <div class="form-group">
                           <label class="sr-only" for="f1-last-name">Project Category</label>
                           Project Category:
                           <select name="project_cat" id="1-first-name" class="form-control" required>
                              <option value="">Select A Category</option>
                              <option value="Web Application Development">Web Application Development</option>
                              <option value="Mobile Application Development">Mobile Application Development</option>
                              <option value="Game Development">Game Development</option>
                              <option value="Thesis">Thesis</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label class="sr-only" for="f1-last-name">Project Category</label>
                           Course Code:
                           <select name="course_code" id="" class="form-control" required>
                              <option value="">Select Option</option>
                              <option value="CSE-3300">CSE-3300</option>
                              <option value="CSE-4400">CSE-4400</option>
                           </select>
                        </div>
                     </fieldset>
                  </div>
               </div>
               <fieldset>
                <div class="row">
                   <?php $counter = 1;?>
                    <?php foreach($NewEmails as $e): ?> 
                       <div class="col-md-6">
                       <h3>Partner <?php echo  $counter++;?></h3>
                        <ul>
                            <li style="color:red">Email: <?php  echo $e['emails']; ?></li>
                            <li>Studnet ID:<?php  echo $e['ids']; ?></li>
                            <li>Name: <?php  echo $e['names']; ?></li>
                            <input type="hidden" name="member_email[]" value="<?php  echo $e['emails']; ?>">
    
                        </ul>
                       </div>
                    <?php endforeach;?>
         
                </div>
               </fieldset>
               <br><br>
               <fieldset>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           Abstract: <textarea name="abstract" style="width: 60%;" cols="5" rows="5" class="f1-abstract form-control" id="abstract" required></textarea>
                        </div>
                        <div class="form-group">
                           Key features: <textarea name="features" style="width: 60%;" cols="5" rows="5" class="f1-abstract form-control" id="f1-f1-key-features" required></textarea>
                        </div>
                        <div class="form-group">
                           Number of module: <textarea name="modules" style="width: 60%;" cols="5" rows="5" class="f1-abstract form-control" id="f1-f1-key-features" required></textarea>
                        </div>
                        <div class="form-group">
                           Project Tools: <textarea name="tools" style="width: 60%;" cols="5" rows="5" class="f1-abstract form-control" id="f1-f1-key-features" required></textarea>
                        </div>
                        <div class="form-group">
                           Conclusion: <textarea name="conclusion" style="width: 60%;" cols="5" rows="5" class="f1-abstract form-control" id="f1-f1-key-features" required></textarea>
                        </div>
                     </div>
                  </div>
           
            </fieldset>
            <div class="row">
                <div class="col-md-12">
                <fieldset>
               
               <div id="field">
                  <div class="form-group">
                     <!-- <label for="sr-only" for="teamLead">Select Your Team Members</label> -->
                     <div class="row">
                     
                     </div>
                     </div>
                 
               </div>
               <br>
               <hr>
            
       
               <div class="from-group">
                  <label class="sr-only" for="f1-last-name">Project Category</label>
                  Select Teacher As Your Supervisor:
                  <select name="t_id" id="" class="f1-last-name form-control" required>
                     <option value="" readonly> ------ Select ----</option>
                     <?php foreach($resObj as $total_pro => $res): ?>
                     <?php foreach($res as  $t): ?>
                     <?php  if($t->project_limit != $t->remining_limit) :?>
                        <option value="<?php echo $t->t_id; ?>"><?php echo ucwords($t->t_name).'(Total Projects Assign :- '. $total_pro.')'; ?></option>
                     <?php endif;?>
                     <?php endforeach; ?>
                     <?php endforeach; ?>
                  </select>
               </div>
               <br>
               <div class="f1-buttons">
                  <button type="submit" class="btn btn-submit">Submit</button>
               </div>
            </fieldset>
                </div>
            </div>
           
            <?php echo form_close(); ?>
         </div>
      </div>
      <!-- END INPUTS -->
   </div>
</div>
</div>
<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->