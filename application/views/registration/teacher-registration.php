
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-10">
            <?php echo form_open('Registration/GetAndCheckRegistrationData', array('class' => 'login100-form register-teacher-form')); ?>
					<span class="login100-form-title p-b-10">
						Welcome To Teacher Registration Panel
					</span>
					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "">
						<input class="input100" type="email" name="t_email" value="<?php echo $email; ?>" readonly>
						<span class="focus-input100" data-placeholder=""></span>
					</div>
					<div class="emailError"></div>
					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="text" name="t_name">
						<span class="focus-input100" data-placeholder="Teacher's Name"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="text" name="t_post">
						<span class="focus-input100" data-placeholder="Teacher's Designation"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="text" name="t_mobile">
						<span class="focus-input100" data-placeholder="Teacher's Mobile Number"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
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
