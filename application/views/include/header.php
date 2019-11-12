<!doctype html>
<html lang="en">

<head>
	<title><?php if(isset($title)) echo $title; ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo site_url(); ?>assets/admin/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo site_url(); ?>assets/admin/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo site_url(); ?>assets/admin/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?php echo site_url(); ?>assets/admin/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo site_url(); ?>assets/admin/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?php echo site_url(); ?>assets/admin/css/demo.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap.min.css">

	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- <link rel="stylesheet" href="<?php echo site_url();?>assets/proposal/css/form-elements.css"> -->
        <!-- <link rel="stylesheet" href="<?php echo site_url();?>assets/proposal/css/style.css">  -->
	<!-- ICONS -->
	<!-- <link rel="apple-touch-icon" sizes="76x76" href="<?php echo site_url(); ?>assets/admin/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo site_url(); ?>assets/admin/img/favicon.png"> -->
	<style>
		tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
	</style>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="<?php ?>">Project Board Management System</a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo site_url() ?>assets/admin/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo $this->session->userdata('current_user_name') ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<!-- <li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li> -->
								<?php 
									if($this->session->userdata('session_role') == 'admin'){
										$user = $this->session->userdata('session_role');
									}
									if($this->session->userdata('session_role') == 'teacher'){
										$user = $this->session->userdata('session_role');
									}
									if($this->session->userdata('session_role') == 'student'){
										$user = $this->session->userdata('session_role');
									}	
				 				?>
								<li><a href="<?php echo site_url('logout/'.$user); ?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
					<?php $url = '';?>
					<?php if($this->session->userdata('session_role') == 'admin'){ 
								$url = site_url('admin');
							}
						  if($this->session->userdata('session_role') == 'teacher'){
								$url = site_url('teacher');  
							}
						  if($this->session->userdata('session_role') == 'student'){
								$url = site_url('student');  
							}	
					?>
						<li><a href="<?php echo $url; ?>" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<?php if($this->session->userdata('session_role') == 'admin'): ?>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr lnr-user"></i> <span>Teacher Management</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="<?php echo site_url('create-teacher'); ?>" class="">Create New</a></li>
									<li><a href="<?php echo site_url('teacher-list'); ?>" class="">Teachers List</a></li>
								</ul>
							</div>
						</li>		
						<li>
							<a href="#subPages432" data-toggle="collapse" class="collapsed"><i class="lnr lnr lnr-user"></i> <span>Student Management</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages432" class="collapse ">
								<ul class="nav">
									<li><a href="<?php echo site_url('create-student'); ?>" class="">Create New</a></li>
									<li><a href="<?php echo site_url('student-list'); ?>" class="">Student List</a></li>
								</ul>
							</div>
						</li>	 
						<?php endif ;?>


						<?php if($this->session->userdata('session_role') == 'teacher'): ?>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr lnr-list"></i> <span>Proposal Management</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
							<!-- <span class="badge badge-light">4</span> -->
								<ul class="nav">
									<li><a href="<?php echo site_url('view-proposals/'.$this->session->userdata('current_teacher_id')); ?>" class="">View New Proposals</a></li>
								<li><a href="<?php echo site_url('referred-proposals/'.$this->session->userdata('current_teacher_id')); ?>" class="">Referred Proposals  </a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="lnr lnr lnr-list"></i> <span>Project Board</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages2" class="collapse ">
								<ul class="nav">
									<li><a href="<?php echo site_url('view-project-board/'.$this->session->userdata('current_teacher_id')); ?>" class="">View Project Board</a></li>
								</ul>
							</div>
						</li>			 
						<?php endif ;?>


						<?php if($this->session->userdata('session_role') == 'student'): ?>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr lnr-list"></i> <span>Proposal Management</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="<?php echo site_url('view-my-proposal/'.$this->session->userdata('current_memeber_student_id')); ?>" class="">My Proposal</a></li>
									<!-- <li><a href="<?php echo site_url('submit-new-proposals/'.$this->session->userdata('current_memeber_student_id')); ?>" class="">Submit Proposal</a></li> -->
									<li><a href="<?php echo site_url('Proposal/CheckEmails'); ?>" class="">Submit Proposal</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="lnr lnr lnr-list"></i> <span>Project Board</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages2" class="collapse ">
								<ul class="nav">
									<li><a href="<?php echo site_url('view-task-board/'.$this->session->userdata('current_memeber_student_id')); ?>" class="">View Project Board</a></li>
								</ul>
							</div>
						</li>			 
						<?php endif ;?>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->