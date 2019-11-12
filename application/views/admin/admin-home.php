	<!-- MAIN -->
    <div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Overview</h3>
							<p class="panel-subtitle">Period: 2018 - 2019</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-4">
									<div class="metric">
										<span class="icon"><i class="fa fa-graduation-cap"></i></span>
										<p>
											<span class="number"><?php if(isset($totalStudents)) echo $totalStudents; ?></span>
											<span class="title">Students</span>
										</p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="metric">
										<span class="icon"><i class="fa fa-user"></i></span>
										<p>
											<span class="number"><?php if(isset($totalTeachers)){ echo $totalTeachers; } else{ echo "0"; } ?> </span>
											<span class="title">Teachers</span>
										</p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="metric">
										<span class="icon"><i class="fa fa-list"></i></span>
										<p>
											<span class="number"><?php if(isset($totalProjects)) echo $totalProjects; ?></span>
											<span class="title">Projects</span>
										</p>
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