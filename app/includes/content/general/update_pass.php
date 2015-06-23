<div id="content-swapper" class="container-fluid">
    <div class="row-fluid">
    	<div class="col-lg-12">
            <h2 class="members-headers">Change Password<small>Fill in the form below to change your password... .. .</small></h2>
            <!-- Display incorrect login error if one exists -->
            <?php // print "<h4 class='errorMsg'>$loginFailDisplay</h4>"; ?>
            <!-- Display validation errors is any exist -->
            <?php // print "<h4 class='errorMsg'>$errorMsgsDisplay</h4>"; ?>

			<form id="passwordForm" class="form-horizontal" role="form" action="" method="post">
                <div class="form-group field">
                    <label for="existing_password" class="col-sm-2 control-label">Current Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="existing_password" id="existing_password" class="form-control" placeholder="Current Password" autocomplete="off">
                    </div>
                </div>
                <div class="form-group field">
                    <label for="new_password" class="col-sm-2 control-label">New Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password" autocomplete="off">
                    </div>
                </div>
                <div class="form-group field">
                    <label for="new_password_again" class="col-sm-2 control-label">New Password Again</label>
                    <div class="col-sm-10">
                        <input type="password" name="new_password_again" id="new_password_again" class="form-control" placeholder="New Password Again" autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button id="submit" type="submit" name="submit" class="btn btn-default">Change</button>
                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    </div>
                </div>
                <div class="col-sm-offset-2 col-sm-10 forgot">
                    <a href="forgot-password.php">Forgot password</a> - <a href="forgot-username.php">Forgot username</a>
                </div>
            </form>
        </div>
    </div>
</div>