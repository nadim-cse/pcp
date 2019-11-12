<!-- MAIN -->
<div class="main">
<!-- MAIN CONTENT -->
<div class="main-content">
   <div class="container-fluid">
    <div class="row">
      <div classs="col-md-12">
      <div style="color:red;"><?php if($this->session->flashdata('success')){echo $this->session->flashdata('success');} ?></div>
      </div>
    </div>
      <div class="row">
         <div class="col-md-12">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
               <thead>
                  <tr>
                     <th>Student ID</th>
                     <th>Student Email</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
               <?php if(empty($students)): ?>
                  <h2>No Student Registered Yet.</h2>
              <?php else: ?>

               <?php foreach($students as $student): ?>
                  <tr>
                     <td><?php echo $student->student_id; ?></td>
                     <td><?php echo $student->student_email; ?></td>
                     <td><a href="javascript:;" onclick="DeleteStudent(<?php echo $student->id ?>);">Delete</a></td>
                  </tr>
                <?php endforeach; ?>  
                <?php endif; ?>
               </tbody>
               <tfoot>
               <tr>
                <th>Student ID</th>
                <th>Student Email</th>
                <th>Action</th>
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