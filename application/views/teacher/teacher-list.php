<!-- MAIN -->
<div class="main">
<!-- MAIN CONTENT -->
<div class="main-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <table id="example" class="table table-striped table-bordered text-center" style="width:100%">
               <thead>
                  <tr>
                     <th class="text-center">Name</th>
                     <th class="text-center">Email</th>
                     <th class="text-center">Designation</th>
                     <th class="text-center">Mobile</th>
                     <!-- <th>Account Status</th> -->
                     <th class="text-center">Joining Date</th>
                     <th class="text-center">Running Projects</th>
                     <th class="text-center">Projects Limit</th>
                     <th class="text-center">Action</th>
                     <th class="text-center">Status</th>
                  </tr>
               </thead>
               <tbody>
               <?php if(empty($resultOBJ)): ?>
                  <h2>No Teacher Registered Yet.</h2>
              <?php else: ?>

               <?php foreach($resultOBJ as $total_std => $res): ?>
                      <?php foreach($res as  $tl): ?>
                  <tr>
                     <td><?php echo $tl->t_name; ?></td>
                     <td><?php echo $tl->t_email; ?></td>
                     <td style="text-transform:uppercase;"><?php echo $tl->t_post; ?></td>
                     <td><?php echo $tl->t_mobile; ?></td>
                     <?php if($tl->status == '0'):
                            $status = 'Account not activated';
                              elseif($tl->status == '1'):
                            $status = 'Active';
                              endif;   
                     ?>
                     <!-- <td><?php echo $status; ?> <i class="fa fa-circle" aria-hidden="true" style="color:green"></i></td> -->
                     <td><?php echo  date("d,M Y | h:i A", strtotime($tl->created_at)); ?></td>
                     
                     <td><?php echo $total_std; ?></td>
                     <td><?php echo $tl->project_limit; ?></td>
                     <td><a href="javascript:;" onclick="EditTeacher(<?php echo $tl->t_id ?>);" style="color:green">Edit</a> |
                     <?php if($tl->status == '1'):?>
                       <a href="javascript:;" onclick="Deactive(<?php echo $tl->t_id ?>);" style="color:red">Deactive</a> </td>
                     <?php elseif($tl->status == '0'): ?>  
                      <a href="javascript:;" onclick="Active(<?php echo $tl->t_id ?>);" style="color:red">Active Again</a> </td>      
                     <?php endif;?>
                     <?php if($tl->status == '0'):
                            $status = 'Deactivated';
                              elseif($tl->status == '1'):
                            $status = 'Active';
                              endif;   
                     ?>
                     <?php if($tl->status == '1'): ?>
                      <td><?php echo $status; ?> <i class="fa fa-circle" aria-hidden="true" style="color:green"></i></td>     
                     <?php else: ?>
                     <td><?php echo $status; ?> <i class="fa fa-circle" aria-hidden="true" style="color:red"></i></td>        
                     <?php endif; ?>
                    
                     
                    
                  </tr>
                <?php endforeach; ?>  
                <?php endforeach; ?>  
                <?php endif; ?>
               </tbody>
               <tfoot>
                  <tr>
                  <th class="text-center">Name</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Designation</th>
                  <th class="text-center">Mobile</th>
                  <!-- <th>Account Status</th> -->
                  <th class="text-center">Joining Date</th>
                  <th class="text-center">Running Projects</th>
                  <th class="text-center">Action</th>
                  <th class="text-center">Status</th>
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