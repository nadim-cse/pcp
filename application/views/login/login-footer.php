	
<!--===============================================================================================-->
<script src="<?php echo site_url() ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo site_url() ?>assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo site_url() ?>assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo site_url() ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo site_url() ?>assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo site_url() ?>assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo site_url() ?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo site_url() ?>assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo site_url() ?>assets/login/js/main.js"></script>

	<script>
		$(document).ready(function(){


			$('form.register-teacher-form').on('submit', function(form){
			
				form.preventDefault();
			
				var URL = '<?php echo base_url();?>Registration/GetAndCheckRegistrationData';
			
				$.post(URL , $('form.register-teacher-form').serialize(), function(data){

				if(data == '1'){
					
					$('.RegistrationSuccess').html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i>Reigstration Successfully Completed</div>');
					setTimeout(function () { window.location.reload(); }, 5000);
					window.location.href = "<?php echo site_url('Login'); ?>";
				}
				if(data == '3'){
					
					$('.emailError').html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-warning"></i>This email is already Registered to the server, Try another one</div>');
					//setTimeout(function () { window.location.reload(); }, 10000);
				}
				if(data == '5'){
					
					$('.pwdError').html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-warning"></i>Password Not Matched</div>');
					//setTimeout(function () { window.location.reload(); }, 10000);
				}
				console.log(data);
				
				
				
			})
		});
		$('form.register-student-form').on('submit', function(form){
			
				form.preventDefault();
			
				var URL = '<?php echo base_url();?>Registration/GetAndCheckStudentRegistrationData';
			
				$.post(URL , $('form.register-student-form').serialize(), function(data){

					if(data == '1'){
						
						$('.RegistrationSuccess').html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i>Reigstration Successfully Completed</div>');
						setTimeout(function () { window.location.reload(); }, 10000);
						window.location.href = "<?php echo site_url('Login'); ?>";
					}
					if(data == '3'){
						
						$('.emailError').html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-warning"></i>This email is already Registered to the server, Try another one</div>');
						//setTimeout(function () { window.location.reload(); }, 10000);
					}
					if(data == '5'){
						
						$('.pwdError').html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-warning"></i>Password Not Matched</div>');
						//setTimeout(function () { window.location.reload(); }, 10000);
					}
					console.log(data);
				
				
			})
		});
		$("#login").on('change', '#checkEmail',function(){

			var email = $(this).val();
			$.ajax({
				url: "<?php echo base_url();?>Login/CheckRoleBYEmail",
				type: "POST",
				data:  { email : email},
				async: false,
				dataType: 'json',
				success: function(data) {

				// for(var i=0; i<data.length;i++){

				// 	$('input[name=teacher_name]').val(data[i].t_name);
			
				// }

				
				console.log(data);




			},
			error: function() {
				alert('Ajax failour');
			}        
		});
			
		});
		
	});	
	</script>

</body>
</html>