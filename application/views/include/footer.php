<br><br><hr>
<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<!-- <p class="copyright">&copy; 2018 <a href="#" target="_blank">Developed By ZAKIR</a>. All Rights Reserved.</p> -->
			</div>
		</footer>
	</div>

	<!-- Modals -->
	<!-- Modal -->
	<div class="modal fade" id="modal-insert-link" tabindex="-1" role="dialog" 
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<button type="button" class="close" 
					data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">
						Insert Link
					</h4>
				</div>
				
				<!-- Modal Body -->
				<div class="modal-body">
					
				<?php echo form_open('ProjectBoard/GetLinkDetails', array(
					'class' => 'form-horizontal',
					'id' => 'link-inserting-form'
				)); ?>
					<div class="form-group">
						<label class="col-sm-2 control-label"
								for="inputEmail3">Link Title</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" 
							id="inputEmail3" name="link_title" placeholder="My Github Link" required/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label"
							for="inputPassword3" >Insert URL</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" 
							id="inputEmail3" name="link_url" placeholder="https://www.githun.io/my-repo" required/>
						</div>
						<input type="hidden" name="student_id" value="">
						<input type="hidden" name="proposal_id" value="">
					</div>
					<div class="tasksuccess"></div>	
					<div class="form-group">
						<div class="col-sm-12">
						<input type="submit" value="Create" class="btn btn-primary pull-right">
						</div>
						
					</div>
					<?php echo form_close(); ?>
				</div>
				<!-- Modal Footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default"
							data-dismiss="modal">
								Close
					</button>
					
				</div>
			</div>
		</div>
	</div>
	<!-- Modals -->
	
	<!-- Modal -->
	<div class="modal fade" id="modal-task-create" tabindex="-1" role="dialog" 
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<button type="button" class="close" 
					data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">
						Create Task
					</h4>
				</div>
				
				<!-- Modal Body -->
				<div class="modal-body">
					
				<?php echo form_open('ProjectBoard/GetTaskDetails', array(
					'class' => 'form-horizontal',
					'id' => 'task-crating-form'
				)); ?>
					<form class="form-horizontal" role="form">
					<div class="form-group">
						<label class="col-sm-2 control-label"
								for="inputEmail3">Task Headline</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" 
							id="inputEmail3" name="task_headline" placeholder="Task Headline" required/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label"
							for="inputPassword3" >Task Details</label>
						<div class="col-sm-10">
							<textarea name="task_details" id="" cols="30" rows="10" class="form-control" required></textarea>
						</div>
						<input type="hidden" name="t_id" value="">
						<input type="hidden" name="proposal_id" value="">
					</div>
					
					
					<div class="form-group">
					<div class="col-sm-12">
							<input type="submit" value="Create" class="btn btn-primary pull-right">
							
					</div>
					<div class="tasksuccess"></div>	
					</div>
					<?php echo form_close(); ?>
				</div>
				<!-- Modal Footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default"
							data-dismiss="modal">
								Close
					</button>
					
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->


	<!-- Modal -->
	<div class="modal fade" id="modal-file-upload" tabindex="-1" role="dialog" 
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<button type="button" class="close" 
					data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">
						Upload File
					</h4>
				</div>
				
				<!-- Modal Body -->
				<div class="modal-body">
					
				<?php echo form_open_multipart('ProjectBoard/GetFileDetails', array(
					'class' => 'form-horizontal',
					'id' => 'file-upload-form'
				)); ?>
					<form class="form-horizontal" role="form">
					<div class="form-group">
						<label class="col-sm-2 control-label"
								for="inputEmail3">File Title</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" 
							id="inputEmail3" name="file_name" placeholder="File Title" required/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label"
							for="inputPassword3" >File Details</label>
						<div class="col-sm-10">
							<textarea name="file_details" id="" cols="30" rows="10" class="form-control" required></textarea>
						</div>
						<input type="hidden" name="student_id" value="">
						<input type="hidden" name="proposal_id" value="">
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label"
								for="inputEmail3">File Title</label>
						<div class="col-sm-10">
							<input type="file" class="form-control" 
							id="inputEmail3" name="file" required/>
						</div>
					</div>
					<div class="fileError"></div>
					<div class="tasksuccess"></div>	
					<div class="form-group">
					<div class="col-sm-12">
						<input type="submit" id="fileSubmit" value="Upload" class="btn btn-primary pull-right">
					</div>

					
				</div>
					<?php echo form_close(); ?>
				</div>
				<!-- Modal Footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default"
							data-dismiss="modal">
								Close
					</button>
					
				</div>
			</div>
		</div>
	</div>


	<!-- Edit Teacher Modal -->
	<!-- Modal -->
	<div class="modal fade" id="modal-edit-teacher" tabindex="-1" role="dialog" 
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<button type="button" class="close" 
					data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">
						Edit Teacher's Details
					</h4>
				</div>
				
				<!-- Modal Body -->
				<div class="modal-body">
					
				<?php echo form_open('Admin/UpdateTeacherDetails', array(
					'class' => 'form-horizontal',
					'id' => 'file-edit-teacher'
				)); ?>
					
					<div class="form-group">
						<label class="col-sm-2 control-label"
							for="inputPassword3">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control teacherName" id="inputEmail3" name="teacher_name"/>
						</div>
						<input type="hidden" name="teacher_id" >
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="inputEmail3">Designation</label>
						<div class="col-sm-10">
							<input type="text" class="form-control teacherDesignation" id="inputEmail3" name="t_post"  />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="inputEmail3">Mobile</label>
						<div class="col-sm-10">
							<input type="text" class="form-control teacherMobile" id="inputEmail3" name="t_mobile"  />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="inputEmail3">Project Limit</label>
						<div class="col-sm-10">
							<input type="number" class="form-control teacherMobile" id="inputEmail3" name="project_limit"  />
						</div>
					</div>
					<div class="fileError"></div>
					<div class="tasksuccess"></div>	
					<div class="form-group">
					<div class="col-sm-12">
						<input type="submit" id="Submit" value="Update" class="btn btn-primary pull-right">
					</div>

					
				</div>
					<?php echo form_close(); ?>
				</div>
				<!-- Modal Footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default"
							data-dismiss="modal">
								Close
					</button>
					
				</div>
			</div>
		</div>
	</div>


	
	<!-- END WRAPPER -->

	<!-- Modal -->
	<div class="modal fade" id="modal-subtask-create" tabindex="-1" role="dialog" 
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<button type="button" class="close" 
					data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">
						Create Sub Task For <span id="taskName"></span>
					</h4>
				</div>
				
				<!-- Modal Body -->
				<div class="modal-body">
					
				<?php echo form_open('ProjectBoard/GetSubTaskDetails', array(
					'class' => 'form-horizontal',
					'id' => 'subtask-crating-form'
				)); ?>
					<form class="form-horizontal" role="form">
					<div class="form-group">
						<label class="col-sm-2 control-label"
								for="inputEmail3">Sub Task Headline</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" 
							id="inputEmail3" name="task_headline" placeholder="Task Headline" required/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label"
							for="inputPassword3" >Sub Task Details</label>
						<div class="col-sm-10">
							<textarea name="task_details" id="" cols="30" rows="10" class="form-control" required></textarea>
						</div>
						<input type="hidden" name="task_id" value="">
						
					</div>
					
					
					<div class="form-group">
					<div class="col-sm-12">
							<input type="submit" value="Create" class="btn btn-primary pull-right">
							
					</div>
					<div class="tasksuccess"></div>	
					</div>
					<?php echo form_close(); ?>
				</div>
				<!-- Modal Footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default"
							data-dismiss="modal">
								Close
					</button>
					
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="<?php echo site_url(); ?>assets/admin/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo site_url(); ?>assets/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo site_url(); ?>assets/admin/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo site_url(); ?>assets/admin/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="<?php echo site_url(); ?>assets/admin/vendor/chartist/js/chartist.min.js"></script>
	<script src="<?php echo site_url(); ?>assets/admin/scripts/klorofil-common.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	
	
	<script>
	function HideDIV(){

		// var x = document.getElementById("reffer-div");
		// x.style.display = "none";
		$("#reffer-div").hide();

	}
	

	HideDIV();

	</script>
	<script>
		$(document).ready(function(){


			$('form.create-teacher-form').on('submit', function(form){
			
				form.preventDefault();
			
				var URL = '<?php echo base_url();?>Admin/CreateTeacherRequest';
			
				$.post(URL , $('form.create-teacher-form').serialize(), function(data){

				if(data == '1'){
					
					$('.InvitationSuccess').html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> A Confirmation Link is sent te this email</div>');
					//setTimeout(function () { window.location.reload(); }, 10000);
				}
				
				if(data == '0'){
					
					$('.emailError').html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-warning"></i>This email is already Registered to the server, Try another one</div>');
					//setTimeout(function () { window.location.reload(); }, 10000);
				}
				//console.log(data);
				
				
				
			})
		});
		$('form.create-student-form').on('submit', function(form){
			
				form.preventDefault();
			
				var URL = '<?php echo base_url();?>Admin/InsertStudentData';
			
				$.post(URL , $('form.create-student-form').serialize(), function(data){

				if(data == '1'){
					
					$('.InvitationSuccess').html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Email Successfully Inserted</div>');
					//setTimeout(function () { window.location.reload(); }, 10000);
				}
				
				if(data == '0'){
					
					$('.emailError').html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-warning"></i>This email  or student ID is already Registered to the server, Try another one</div>');
					//setTimeout(function () { window.location.reload(); }, 10000);
				}
				console.log(data);
				
				
				
			})
		});
	
	});	


	$(document).ready(function(){


			$('form.refered-form').on('submit', function(form){
			
				form.preventDefault();
			
				var URL = '<?php echo base_url();?>Proposal/TransferProposal';
			
				$.post(URL , $('form.refered-form').serialize(), function(data){

				
					alert('This Proposal Is Referred to Another Teacher');
					//console.log(data);
					window.location.reload();
				
				//console.log(data);
				
				
				
			})
		});
	});	

	
	function RefferFunction(){

		var x = document.getElementById("reffer-div");
		
		if (x.style.display === "none") {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}

		// 
	}

	$("#referteacher").on('change', function (){
		
		var teachername = $(this).val(); 
		console.log(teachername); 
		
		 
				if(teachername != ' '){
				   
					document.getElementById("refer-button").innerHTML = '<input type="submit" class="btn btn-warning" value="Refer">';
					//document.getElementById("accept-proposal").innerHTML = '';
					

					
				}
				if(teachername == ''){
					document.getElementById("refer-button").innerHTML = '';
					
					
				}
				
			



	 });

	function OpenModalForCreateTask(t_id,proposal_id){
		 
		//alert(t_id+" "+proposal_id);
		$('#modal-task-create').modal('show');

		$('input[name=t_id]').val(t_id);
        $('input[name=proposal_id]').val(proposal_id);
		$('form#task-crating-form').on('submit', function(form){
			
				form.preventDefault();
			
				var URL = '<?php echo base_url();?>ProjectBoard/GetTaskDetails';
			
				$.post(URL , $('form#task-crating-form').serialize(), function(data){
				
					//alert('This Proposal Is Referred to Another Teacher');
					//console.log("HEllo");
					 //window.location.reload();
				
				//console.log(data);
				if(data == '1'){
					console.log("It's working");
					$('.tasksuccess').html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i>New Task Created Successfully</div>');
					setTimeout(function () { window.location.reload(); }, 2000);
				}
				if(data == '2'){
					console.log("It's not working");
				}
				
				
				
			})
		});



	}

	function OpenModalForUpload(student_id,proposal_id){

		//alert(student_id+" "+proposal_id);
		$('#modal-file-upload').modal('show');

		$('input[name=student_id]').val(student_id);
        $('input[name=proposal_id]').val(proposal_id);
		
			$("#file-upload-form").on('submit',(function(e) {
				e.preventDefault();
				$.ajax({
				url: "<?php echo base_url();?>ProjectBoard/GetFileDetails",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				beforeSend : function()
				{
					//$("#preview").fadeOut();
					$("#err").fadeOut();
				},
				success: function(data)
					{
						
						if(data == '3')
						{
						// view uploaded file.
							// $("#preview").html(data).fadeIn();
							// $("#form")[0].reset();
							$('.fileError').html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i>File type or file size is not supported</div>'); 
						}else{

							alert('File Uploaded successfully');
					
					window.location.reload();
						}
						
						
					},
					error: function(e) 
					{
						$("#err").html(e).fadeIn();
						alert("Problem");
					}          
					});
 			}));
			

	}


	function OpenModalForInsert(student_id,proposal_id){

		//alert(student_id+" "+proposal_id);
		$('#modal-insert-link').modal('show');

		$('input[name=student_id]').val(student_id);
        $('input[name=proposal_id]').val(proposal_id);
		$('form#link-inserting-form').on('submit', function(form){
			
				form.preventDefault();
			
				var URL = '<?php echo base_url();?>ProjectBoard/GetLinkDetails';
			
				$.post(URL , $('form#link-inserting-form').serialize(), function(data){
				
					alert('Github link inserted successfully');
					
					 window.location.reload();
				
				//console.log(data);
				
				
				
				
			})
		});

	}

	function OpenModalForCreateSubTask(task_id,task_name){
		 
		// alert(task_id+" "+task_name);
		
		$('#modal-subtask-create').modal('show');

		$('input[name=task_id').val(task_id);

		$('#taskName').html(task_name);

		$('form#subtask-crating-form').on('submit', function(form){
			
				form.preventDefault();
			
				var URL = '<?php echo base_url();?>ProjectBoard/GetSubTaskDetails';
			
				$.post(URL , $('form#subtask-crating-form').serialize(), function(data){
				
		
				
				console.log(data);
				if(data == '1'){
					console.log("It's working");
					$('.tasksuccess').html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i>Sub Task Created Successfully</div>');
					setTimeout(function () { window.location.reload(); }, 2000);
				}
				if(data == '2'){
					console.log("It's not working");
				}
				
				
				
			})
		});



	}
	function DeleteSubTask(subtask_id){
		
		var url="<?php echo base_url();?>";
			var r=confirm("Do you want Delete This Sub Task ?")
			if (r==true)
				window.location = url+"ProjectBoard/DeleteSubTask/"+subtask_id;
			else
			return false;
	} 
	
	function EditTeacher(TeacherID){
		
		$('#modal-edit-teacher').modal('show');
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: '<?php echo base_url() ?>Admin/GetTeacherDetails',
			data: {
				TeacherID: TeacherID,
			},
			async: false,
			dataType: 'json',
			success: function(data) {

				for(var i=0; i<data.length;i++){

					$('input[name=teacher_name]').val(data[i].t_name);
					$('input[name=teacher_id]').val(data[i].t_id);
					$('input[name=t_post').val(data[i].t_post);
					$('input[name=t_mobile]').val(data[i].t_mobile);
					$('input[name=project_limit]').val(data[i].project_limit);
				}

				
				console.log(data);




			},
			error: function() {
				console.log(error);
			}
    	});

		$('form#file-edit-teacher').on('submit', function(form){
			
				form.preventDefault();
			
				var URL = '<?php echo base_url();?>Admin/UpdateTeacherDetails';
			
				$.post(URL , $('form#file-edit-teacher').serialize(), function(data){

					if(data == '1'){
						alert('Updated Successfully');
					
					 window.location.reload();
					}
				
					
				
				//console.log(data);
				
				
				
				
			})
		});	
		

	}

	

		
    	function Deactive(id){
			var url="<?php echo base_url();?>";
			var r=confirm("Do you want to Deactive this Account ?")
			if (r==true)
				window.location = url+"Admin/DeactiveTeacher/"+id;
			else
			return false;
			} 
		function Active(id){
				var url="<?php echo base_url();?>";
				var r=confirm("Do you want to Active this Account Again ?")
				if (r==true)
					window.location = url+"Admin/ActiveTeacher/"+id;
				else
				return false;
		} 	

		function DeleteStudent(id){
				var url="<?php echo base_url();?>";
				var r=confirm("Do you want to Delete This Student ?")
				if (r==true)
					window.location = url+"Admin/DeleteStudent/"+id;
				else
				return false;
			} 	
				
	
			$(document).ready(function() {
				
				var table = $('#example').DataTable();
 
				table.columns( '.select-filter' ).every( function () {
					var that = this;
				
					// Create the select list and search operation
					var select = $('<select />')
						.appendTo(
							this.footer()
						)
						.on( 'change', function () {
							that
								.search( $(this).val() )
								.draw();
						} );
				
					// Get the search data for the first column and add to the select list
					this
						.cache( 'search' )
						.sort()
						.unique()
						.each( function ( d ) {
							select.append( $('<option value="'+d+'">'+d+'</option>') );
						} );
				} );

				

				
			} );

	 $('form.email-submit-form').on('submit', function(form){
			
			form.preventDefault();
		
			var URL = '<?php echo base_url();?>Proposal/CheckEmail';
		
			$.post(URL , $('form.email-submit-form').serialize(), function(data){

				// if(data != ''){
				// 	//console.log(data);
				// 	$('.results').html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i>These emails is not registered to our server:- \n'+data+'</div>');


					
					
				// 	var values = $("input[name='emails[]']").map(function(){return $(this).val();}).get();
				// 	console.log(values);
				// 	var myJSON = JSON.stringify(values);
					
					
				//    $("input[name=fetchedemails]").val(myJSON);
				   
				// 	console.log(values);
				   
					
				// }else{
				// 	console.log('Matched');
				// 	var values = $("input[name='emails[]']").map(function(){return $(this).val();}).get();
				// 	console.log(values);
				// 	var myJSON = JSON.stringify(values);
					
				// 	$("input[name=fetchedemails]").val(myJSON);
				// 	$('.sbtn').html('<input type="submit" class="btn btn-warning" value="Continue to porposal page">');
				   
					
				// }
						console.log(data);
		   
			
			
		})
	});

	function GetValuesAndRedirect(values){

		
		window.location.href = "<?php echo site_url()?>"+'Proposal/Hello/'+escape(values);
	}
	$(document).ready(function () {
                //@naresh action dynamic childs
                var next = 0;
                $("#add-more").click(function(e){
                    e.preventDefault();
                    var addto = "#field" + next;
                    var addRemove = "#field" + (next);
                    next = next + 1;
                    if(next < 2){
                   
                    var newIn = '<br><div id="field'+ next +'"><div class="form-group"> <label class="sr-only" for="f1-twitter">Email</label> <input type="text" name="emails[]" placeholder="Enter Email Address" class="f1-twitter form-control" id="f1-twitter"> </div><div class="IDError"></div>';
                    var newInput = $(newIn);
                    var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >Remove</button></div></div><div id="field">';
                    var removeButton = $(removeBtn);
                    $(addto).after(newInput);
                    $(addRemove).after(removeButton);
                    $("#field" + next).attr('data-source',$(addto).attr('data-source'));
                    $("#count").val(next);  
                    
                        $('.remove-me').click(function(e){
                            e.preventDefault();
                            var fieldNum = this.id.charAt(this.id.length-1);
                            var fieldID = "#field" + fieldNum;
                            $(this).remove();
                            next = next - 1;
                            console.log(next);
                            $(fieldID).remove();
                        }); 
                    }else{
                        return alert('You can add only 1 members');
                    }
                    
                });

				

            });
	</script>

	<script>
	
	$("#checkbtn").hide();
		$('#add-more-member').on('click', function(){
			
			document.getElementById('NonLoggedInStudents').innerHTML = ' <div class="form-group"> <label class="sr-only" for="NonLoggedInEmail">Email</label> <input type="text" name="NonLoggedInEmail" placeholder="Enter Email Address" class="form-control" id="NonLoggedInEmail"> </div>';
			document.getElementById('RemoveField').innerHTML = '<a href="#" id="remove-member" type="button" class="btn btn-danger" >Remove Member</a>';
			
			$("#add-more-member").hide();
			$("#prosystembtn").hide();
			$("#checkbtn").show();

			$('#remove-member').on('click', function(){

				$("#add-more-member").show();
				document.getElementById('NonLoggedInStudents').innerHTML = '';
				document.getElementById('RemoveField').innerHTML = '';
				$("#checkbtn").hide();
				$("#prosystembtn").show();
				
				
				
			});
			//remove-member
			
		});
		
		function CheckEmailStatus(CurrentStudentEmail){

			// NonLoggedInEmail
			//alert(CurrentStudentEmail);
			var NonLoggedInEmail =  $('#NonLoggedInEmail').val();
			if(NonLoggedInEmail == ''){
					alert('Please Enter a valid email address');
			}else{

					$.ajax({
					type: 'ajax',
					method: 'get',
					url: '<?php echo base_url() ?>Proposal/CheckNonLoggedInEmailAddress',
					data: {
						NonLoggedInEmail: NonLoggedInEmail, CurrentStudentEmail: CurrentStudentEmail,
					},
					async: false,
					dataType: 'json',
					success: function(data) {

						if(data == 3){

							$('#results').html("You can't add your own email as a member email");
							setTimeout(function() {
								$('#results').fadeOut('fast');
							}, 5000); 

						}

						if(data == 0){
							$('#results').html("This email address is already member of a project");
							setTimeout(function() {
								$('#results').fadeOut('fast');
							}, 5000); 

						}if(data == 1){
							

							$('.proposalBtn').html("<input type='submit' class='btn btn-primary' value='Go to proposal Submit System'>");
							$('.submitbuttonforsinglestudent').html("");
						}if(data == 2){

							$('#results').html("This Email address is not registered in our server ");
							setTimeout(function() {
								$('#results').fadeOut('fast');
							}, 6000); 

						}
						
						
						console.log(data);




					},
					error: function(req, err) {
						alert('Ajax failour');
						console.log(err);
					}
				});

			}
			//alert($('#NonLoggedInEmail').val());
		}
	</script>
</body>

</html>
