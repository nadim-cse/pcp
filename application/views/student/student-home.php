<!-- MAIN -->
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Profile Information</h3>
							<p class="panel-subtitle">Period: 2019 - 2020</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<div class="metric">
										
										<ul class="list-group">
										<?php foreach($projectDetails as $pd): ?>
											<li class="list-group-item"><span class="profile-text">Name:</span> <?php echo $pd->member_name; ?></li>
											<li class="list-group-item"><span class="profile-text">Email: </span><?php echo $pd->member_email; ?></li>
											<li class="list-group-item"><span class="profile-text">ID:</span> <?php echo $pd->member_student_id; ?></li>
											<li class="list-group-item"><span class="profile-text">Mobile:</span> <?php echo $pd->member_mobile_no; ?></li>
											<li class="list-group-item"><span class="profile-text">Joining Date:</span> <?php echo date("M d, Y -  h:i A", strtotime($pd->created_at)); ?></li>
										<?php endforeach; ?>	
										</ul>
										
									</div>
								</div>
								
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->