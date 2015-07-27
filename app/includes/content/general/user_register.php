<div class="container-fluid">
    <!-- Signed out content -->
    <div class="row-fluid">
        <div id="content-swapper" class="col-lg-12">
            <h2 class="members-headers">Register <small>Register an account to log in... .. .</small></h2>
            <div id="errorMsgs">
            	<!-- Display incorrect login error if one exists -->
                <h4 class="errorMsg"><?php print $registeredDisplay; ?></h4>
                <!-- Display validation errors is any exist -->
                <h4 class="errorMsg"><?php print $errorMsgsDisplay; ?></h4>
            </div>

            <!-- Start register form -->
            <form id="registerForm" name="register_form" class="form-horizontal" role="form" action="" method="post">
                <div class="form-group field">
                    <label for="username" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" id="username_input" class="form-control" placeholder="Username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off" maxlength="20">
                        <span id="uname_status" class="feedback"></span>
                    </div>
                </div>
                <div class="form-group field">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" id="password_input" class="form-control" placeholder="Password" autocomplete="off" maxlength="32">
                        <span id="pw_status" class="feedback"></span>
                    </div>
                </div>
                <div class="form-group field">
                    <label for="password_again" class="col-sm-2 control-label">Retype Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password_again" id="password_again_input" class="form-control" placeholder="Retype Password" autocomplete="off" maxlength="32">
                        <span id="pwagain_status"></span>
                    </div>
                </div>
                <div class="form-group field">
                    <label for="name" class="col-sm-2 control-label">Your Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" id="name_input" class="form-control" placeholder="Your Name" value="<?php echo escape(Input::get('name')); ?>" autocomplete="off">
                    </div>
                </div>
                <div class="form-group field">
                    <label for="email" class="col-sm-2 control-label">Your Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" id="email_input" class="form-control" placeholder="Your Email" value="<?php echo escape(Input::get('email')); ?>" autocomplete="off" maxlength="128">
                    </div>
                </div>
                <div class="form-group field">
                    <label for="country" class="col-sm-2 control-label">Country</label>
                    <div class="col-sm-10">
                    	<select name="country" id="country" class="form-control" onfocus="emptyElement('status')">
                    		<option value="United States of America">United States of America</option>
                    		<?php include_once("template_country_list.php"); ?>
                    	</select>
                    </div>
                </div>
                <div class="form-group field">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label for="terms">
                                <input type="checkbox" name="terms" id="terms_input">I agree to the <a href="#" id="openTerms">Terms Of Use</a>.
                            </label>
                            <div id="termsContent">
  								<h4>Member System Terms Of Use</h4>
  								<ol>
  									<li>TODO: Create terms</li>
  									<li>This is an example:</li>
  									<li>You may not use this service to collect information on others for the purpose of spamming.</li>
  								</ol>
							</div>
                        </div>
                    </div>
                </div>
				
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button id="signUpBtn" type="submit" name="submit" class="btn btn-default">Register</button>
                    </div>
                    <span id="status"></span>
                </div>
            </form>
            <!-- End register form -->
        </div>
    </div>
</div>