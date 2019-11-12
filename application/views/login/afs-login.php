<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20" id="login">
            <?php echo form_open('Login/GetAndCheckLoginData', array('class' => 'login100-form validate-form')); ?>
					<span class="login100-form-title p-b-20">
						Welcome To Project Board Login Panel
					</span>
					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter Email">
						<input class="input100" type="email" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<!-- <div class="wrap-input100 validate-input m-b-50" data-validate="Select Role">
						<select name="role" id="" class="input100" required>Select A Role
							<option value=" ">Select A Role</option>
							<option value="admin">Admin</option>
							<option value="teacher">Teacher</option>
							<option value="student">Student</option>
						</select>
					
					</div> -->
					<input type="hidden" name="role">
					<?php echo $this->session->flashdata('error'); ?>
					<div class="container-login100-form-btn">
                        
                        <input type="submit" value="Login" class="login100-form-btn">
					
					</div>
					
				
					<hr>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
