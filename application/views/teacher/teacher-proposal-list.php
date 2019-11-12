<!-- MAIN -->
<div class="main">
<!-- MAIN CONTENT -->
<div class="main-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
               <thead>
                  <tr>
                     <th>Project Name</th>
                     <th>Project Category</th>
                     <th>Course Code</th>
                     <th>Request Time</th>
                     <th>Status</th>
                     <th>View Details</th>
                  </tr>
               </thead>
               <tbody>
               <?php if(!empty($proposalLists)): ?>
               <?php foreach($proposalLists as $pl): ?>
                  <tr>
                     <td><?php echo $pl->project_name; ?></td>
                     <td><?php echo $pl->project_cat; ?></td>
                     <td><?php echo $pl->course_code; ?></td>
                     <td><?php echo date("d,M Y | h:i A", strtotime($pl->request_time)) ; ?></td>
                     <?php if($pl->project_status == '0'):
                            $status = 'Not Accepted Yet';
                            elseif($pl->project_status == '1'):
                            $status = 'Accepted';
                            elseif($pl->project_status == '3'):
                              $status = 'Rejected';
                            
                            endif;   
                     ?>
                     <?php if($pl->is_reffered == '1'){

                            $status = 'Referred Proposal';
                     }
                      ?>
                     <td style='color:red'><strong><?php echo $status; ?></strong></td>
                     <td><a href="<?php echo site_url('view-full-details/'.$pl->proposal_id); ?>">Click Here</a></td>
                  </tr>
                <?php endforeach; ?>  
                <?php endif; ?>
               </tbody>
               <tfoot>
                  <tr>
                    <th>Project Name</th>
                    <th>Project Category</th>
                    <th>Course Code</th>
                    <th>Request Time</th>
                    <th>Status</th>
                    <th>View Details</th>
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
   </div>
</div>
</div>
</div>
<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->