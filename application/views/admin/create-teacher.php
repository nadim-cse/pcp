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
									<h3 class="panel-title">Create New Teacher</h3>
								</div>
								<div class="panel-body">
									<?php echo form_open('Admin/CreateTeacherRequest', array('class' => 'create-teacher-form')); ?>

                                    <input type="text" name="name" class="form-control input-lg" placeholder="Teacher's name" required>
									<br>
									<input type="email" name="email" class="form-control input-lg" placeholder="Teacher's Email Address" required>
									<br>
                                    <div class="emailError"></div>
									<div class="InvitationSuccess"></div>
                                    <input type="submit" class="btn btn-success" value="Send Invitation">
									
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