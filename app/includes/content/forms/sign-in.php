<div class="container-fluid">
    <div class="row-fluid">
        <div id="page-content" class="col-lg-12">
            <h2 class="members-headers">Sign In <small>Please log in to continue... .. .</small></h2>
            <!-- Display incorrect login error if one exists -->
            <?php print "<h4 class='errorMsg'>$loginFailDisplay</h4>"; ?>
            <!-- Display validation errors if any exist -->
            <?php print "<h4 class='errorMsg'>$errorMsgsDisplay</h4>"; ?>
            <form id="loginForm" class="form-horizontal" role="form" action="" method="post">
                <div class="form-group field">
                    <label for="username" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" autocomplete="off">
                    </div>
                </div>
                <div class="form-group field">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" autocomplete="off">
                    </div>

                </div>
                <div class="form-group field">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label for="remember">
                                <input type="checkbox" name="remember" id="remember"> Remember me
                            </label>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button id="submit" type="submit" name="submit" class="btn btn-default">Sign In</button>
                    </div>
                </div>
                <div class="col-sm-offset-2 col-sm-10 forgot">
                    <a href="forgot-password.php">Forgot password</a> - <a href="forgot-username.php">Forgot username</a>
                </div>
            </form>
        </div>
    </div>
</div>