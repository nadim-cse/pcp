<!-- MAIN -->
<div class="main">
<!-- MAIN CONTENT -->
<div class="main-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <?php if(!empty($BoardResOBJ)): ?>
            <?php foreach($BoardResOBJ as $project_name => $brs): ?>
            <?php foreach($brs as $prs){ 

                    $proposalID = $prs->proposal_id;
                    $teacherID = $prs->t_id;
                    $StudentID = $prs->m_id;

             } ?>     
            <h2>Project Name:- <?php echo $project_name; ?> <a href="<?php echo site_url('manage-project-board/'.$proposalID.'/'.$teacherID.'/'.$StudentID); ?>" class="btn btn-success pull-right">Manage Board</a>      </h2>   
                   

               
             
            <table id="example4" class="table table-striped table-bordered" style="width:100%">
               <thead>
                  <tr>
                     <th>Member's Name</th>
                     <th>Member's Email</th>
                     <th>Student ID</th>
                     <th>Mobile Number</th>
                  </tr>
               </thead>
               <tbody>
               
               <?php foreach($brs as $prs): ?>
                  <tr>
                     <td><?php echo $prs->member_name; ?></td>
                     <td><?php echo $prs->member_email; ?></td>
                     <td><?php echo $prs->member_student_id; ?></td>
                     <td><?php echo $prs->member_mobile_no; ?></td>
                  </tr>
                <?php endforeach; ?>  
                
               </tbody>
            </table>
            <hr>     
            <?php endforeach; ?> 
            
            <?php else: ?>
            <h2>After Accepting a proposal, Project board will create automatically</h2>
            <?php endif; ?>
         </div>

      </div>
   </div>
</div>
</div>
</div>
<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->