
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-10">
            <?php echo form_open('Registration/GetAndCheckStudentRegistrationData', array('class' => 'login100-form register-student-form')); ?>
					<span class="login100-form-title p-b-10">
						Welcome To Student Registration Panel
					</span>
					<div class="wrap-input100 validate-input m-t-85 m-b-35" >
						<input class="input100" type="email" name="member_email" value="<?php echo $email; ?>" readonly>
						<!-- <input  type="hidden" name="member_email" value="<?php //echo $email; ?>" > -->
						
					</div>
					<div class="emailError"></div>
					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="text" name="student_name">
						<span class="focus-input100" data-placeholder="Student Fullname"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-50" data-validate="Your Student ID">
						<input class="input100" type="text" name="student_id" value="<?php echo $student_id?>" readonly>
						
					</div>
					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter Mobile Number">
						<input class="input100" type="text" name="phone_number">
						<span class="focus-input100" data-placeholder="Enter Phone Number"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-50" data-validate="password">
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder=" Password"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-50" data-validate="Confirm password">
						<input class="input100" type="password" name="c_password">
						<span class="focus-input100" data-placeholder="Confirm Password"></span>
					</div>
					<div class="pwdError"></div>
					
					<div class="container-login100-form-btn">
                        
                        <input type="submit" value="Register" class="login100-form-btn">
					
					</div>
					<div class="RegistrationSuccess"></div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
