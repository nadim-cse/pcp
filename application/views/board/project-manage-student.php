<div class="main-content">
<div class="container-fluid">
   <div class="row">
      <div class="col-md-12">
         <div class="protask">
            <div class="view">
            <?php if(!empty($proposalDetails)) :?>
               <div class="viewHeader">
                  <div class="title">Manage Tasks for : <strong><?php  foreach($proposalDetails as $pd){ echo $pd->project_name;} ?></strong></div>
                  <div style="color:red;"><?php if($this->session->flashdata('success')){echo $this->session->flashdata('success');} ?></div>
                  <div class="functions">
                     <a href="javascript:;" onclick='OpenModalForUpload("<?php echo $this->session->userdata('current_memeber_student_id')?>" , "<?php  echo $pd->proposal_id; ?>")'class="button active">Upload</a>
                     <a href="javascript:;" onclick='OpenModalForInsert("<?php echo $this->session->userdata('current_memeber_student_id')?>" , "<?php  echo $pd->proposal_id; ?>")'class="button">Insert Github Link</a>
                  </div>
               </div>
               <!-- Content Div here -->
               <div id="exTab2" class="container-fuild">
                  <div class="row">
                     <div class="col-md-12">
                        <ul class="nav nav-tabs">
                           <li class="active">
                              <a href="#1" data-toggle="tab">Tasks</a>
                           </li>
                           <li>
                              <a href="#2" data-toggle="tab">Links</a>
                           </li>
                           <li>
                              <a href="#3" data-toggle="tab">Files</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane active" id="1">
                              <div class="content">
                                 <?php if(empty($BoardResOBJ)) :?>
                                 <h2>No Task Created Yet</h2>
                                 <?php else: ?>
                                 <?php foreach($BoardResOBJ as $create_at => $tasks): ?>
                                 <div class="list">
                                    <div class="title"><?php echo $create_at; ?></div>
                                    <?php foreach($tasks as $task):?>
                                    <div class="row" style="border-radius: 10px;border: 2px solid #73AD21;padding: 2px; margin:1%;">
                                       <div class="col-md-2">
                                          <p><?php echo $task->task_headline; ?></p>
                                       </div>
                                       <div class="col-md-5">
                                          <p><?php echo $task->task_details; ?></p>
                                       </div>
                                       <div class="col-md-2"><?php echo date("h:i A", strtotime($task->create_at)); ?></span>
                                          &nbsp;
                                       </div>
                                       <?php if($task->task_status == '2'): ?>
                                       <div class="col-md-3">
                                          <p style="font-weight:bold; color:green">This task has been rejected at <?php echo date("h:i A / d M ,Y", strtotime($task->completed_at)); ?></p>
                                       </div>
                                       <?php elseif($task->task_status == '1'): ?>
                                       <div class="col-md-3">
                                          <p style="font-weight:bold; color:green">This task has been completed at <?php echo date("h:i A / d M ,Y", strtotime($task->completed_at)); ?></p>
                                       </div>
                                       <?php else: ?>
                                       <div class="col-md-3">
                                          <span>
                                          <input style="margin-top:5px;" type="button" class="btn btn-success" value="On Going">
                                          </span>
                                       </div>
                                       <?php endif; ?>
                                    </div>
                                    <?php endforeach; ?>
                                 </div>
                                 <?php endforeach; ?> 
                                 <?php endif; ?>
                              </div>
                           </div>
                           <div class="tab-pane" id="2">
                              <div class="content">
                                 <?php if(empty($LinkResOBJ)) :?>
                                 <h2>No Link Posted Yet</h2>
                                 <?php else: ?>
                                 <?php foreach($LinkResOBJ as $link_create_at => $links): ?>
                                 <div class="list">
                                    <div class="title"><?php echo $link_create_at; ?></div>
                                    <?php foreach($links as $link):?>
                                    <div class="row" style="border-radius: 10px;border: 2px solid #73AD21;padding: 2px; margin:1%;">
                                       <div class="col-md-2">
                                          <p><?php echo $link->link_title; ?></p>
                                       </div>
                                       <div class="col-md-5">
                                          <p><a href="<?php echo $link->link_url; ?>"><?php echo $link->link_url; ?></a></p>
                                       </div>
                                       <div class="col-md-2"><?php echo date("h:i A", strtotime($link->link_create_at)); ?></span>
                                          &nbsp;
                                       </div>
                                       <div class="col-md-3">
                                          <span>
                                          <a href="<?php echo $link->link_url; ?>" target="_blank" type="button" class="btn btn-success">Visit</a>
                                          </span>
                                       </div>
                                    </div>
                                    <?php endforeach; ?>
                                 </div>
                                 <?php endforeach; ?> 
                                 <?php endif; ?>
                              </div>
                           </div>
                           <div class="tab-pane" id="3">
                              <div class="content">
                                 <?php if(empty($FileResOBJ)) :?>
                                 <h2>No File Uploaded Yet</h2>
                                 <?php else: ?>
                                 <?php foreach($FileResOBJ as $file_create_at => $files): ?>
                                 <div class="list">
                                    <div class="title"><?php echo $file_create_at; ?></div>
                                    <?php foreach($files as $file):?>
                                    <div class="row" style="border-radius: 10px;border: 2px solid #73AD21;padding: 2px; margin:1%;">
                                       <div class="col-md-2">
                                          <p><?php echo $file->file_title; ?></p>
                                       </div>
                                       <div class="col-md-1">
                                          <p><?php echo $file->file_type; ?></p>
                                       </div>
                                       <div class="col-md-2">
                                          <?php if($file->file_type == 'pdf'): ?>
                                          <!-- <td><a href="<?php //echo $file->file_path; ?>">View</a></td> -->
                                          <p>
                                             <embed src="<?php echo $file->file_path; ?>" width="50px" height="50px"/>
                                             <br><a href="<?php echo $file->file_path; ?>" target="_blank" >View File</a>
                                          </p>
                                          <?php elseif($file->file_type == 'jpg' || $file->file_type == 'jpeg' || $file->file_type == 'png' ): ?> 
                                          <p><img src="<?php echo $file->file_path; ?>" style="width:50px;height:50px" alt=""><br><a href="<?php echo $file->file_path; ?>" target="_blank" >View Image</a></p>
                                          <?php elseif($file->file_type == 'xlsx' || $file->file_type == 'docx' || $file->file_type == 'docs' || $file->file_type == 'zip' ): ?> 
                                          <p><a href="<?php echo $file->file_path; ?>" target="_blank" >Download File</a></p>
                                          <?php endif; ?>
                                       </div>
                                       <div class="col-md-1"><?php echo date("h:i A", strtotime($file->create_at)); ?></span>
                                          &nbsp;
                                       </div>
                                       <div class="col-md-6">
                                          <span>
                                             <p><?php echo $file->file_details; ?></p>
                                          </span>
                                       </div>
                                    </div>
                                    <?php endforeach; ?>
                                 </div>
                                 <?php endforeach; ?> 
                                 <?php endif; ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <?php else:?>
                  <h2>Your proposal is not accepted yet, check from here <a href="<?php echo site_url('view-my-proposal/'.$student_id);?>">My Proposal Status</a></h2>
               <?php endif;?>
            </div>
         </div>
      </div>
   </div>
</div>
<br>
<br>