<div id="content-swapper" class="container-fluid">
    <div class="row-fluid">
    	<div class="col-lg-12">
        <h1>Update Your Profile</h1>
    		<ul class="nav nav-tabs" id="editProfileTabs">
    			<li class="active"><a href="#genInfo" data-toggle="tab" role="tab">General Info</a></li>
    			<li><a href="#profilePic" data-toggle="tab" role="tab">Profile Pic</a></li>
    			<li><a href="#bannerPic" data-toggle="tab" role="tab">Banner Pic</a></li>
                <li><a href="#userFiles" data-toggle="tab" role="tab">Your Files</a></li>
    		</ul>
            <div class="tab-content">
            	<div id="genInfo" class="tab-pane fade active in">
                	<h3 class="members-headers">General Info<small>Modify the fields below then save to apply changes... .. .</small></h3>
                	<!-- Display incorrect login error if one exists -->
                	<?php // print "<h4 class='errorMsg'>$loginFailDisplay</h4>"; ?>
                	<!-- Display validation errors is any exist -->
                	<?php // print "<h4 class='errorMsg'>$errorMsgsDisplay</h4>"; ?>
                    <form id="updateForm" class="form-horizontal" role="form" action="" method="post">
                        <div class="form-group field">
                            <label for="name" class="col-sm-2 control-label">Your Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" autocomplete="off" value="<?php echo escape($user->data()->name); ?>">
                            </div>
                        </div>
                        <div class="form-group field">
                            <label for="email" class="col-sm-2 control-label">Your Email</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Password" autocomplete="off" value="<?php echo escape($user->data()->email); ?>">
                            </div>
                        </div>
                        <div class="form-group field">
                            <label for="bio" class="col-sm-2 control-label">Your Bio</label>
                            <div class="col-sm-10">
                                <textarea name="bio" id="bio" rows="10" form="updateForm" class="form-control" ><?php echo escape($user->data()->bio); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button id="submit" type="submit" name="submit" class="btn btn-default">Update</button>
                                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                            </div>
                        </div>
                    </form>
                </div>
                <div id="profilePic" class="tab-pane fade">
                	<h3 class="members-headers">Profile Pic<small>Browse your computer for an image file then upload to update your profile pic... .. .</small></h3>
                	<!-- Display incorrect login error if one exists -->
                	<?php // print "<h4 class='errorMsg'>$loginFailDisplay</h4>"; ?>
                	<!-- Display validation errors is any exist -->
                	<?php // print "<h4 class='errorMsg'>$errorMsgsDisplay</h4>"; ?>
                    <form id="picForm" class="form-horizontal" role="form" action="../app/parsers/profile_pic.php" method="post" enctype="multipart/form-data">
                        <div class="form-group field">
                            <label for="profile_pic" class="col-sm-2 control-label">Profile Pic</label>
                            <div class="col-sm-10">
                                <input type="file" name="profile_pic" id="profile_pic" value="<?php echo escape($user->data()->profile_pic); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button id="submit" type="submit" name="submit" class="btn btn-default">Change Pic</button>
                                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                <input type="hidden" name="username" value="<?php escape($user->data()->username); ?>">
                            </div>
                        </div>
                    </form>
                </div>
                <div id="bannerPic" class="tab-pane fade">
                	<h3 class="members-headers">Banner Pic<small>Browse your computer for an image file then upload to update your banner pic... .. .</small></h3>
                	<!-- Display incorrect login error if one exists -->
                	<?php // print "<h4 class='errorMsg'>$loginFailDisplay</h4>"; ?>
                	<!-- Display validation errors is any exist -->
                	<?php // print "<h4 class='errorMsg'>$errorMsgsDisplay</h4>"; ?>
                    <form id="bannerForm" class="form-horizontal" role="form" action="../app/parsers/banner_pic.php" method="post" enctype="multipart/form-data">
                        <div class="form-group field">
                            <label for="banner_pic" class="col-sm-2 control-label">Banner Pic</label>
                            <div class="col-sm-10">
                                <input type="file" name="banner_pic" id="banner_pic" value="<?php echo escape($user->data()->banner_pic); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button id="submit" type="submit" name="submit" class="btn btn-default">Change Banner</button>
                                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                <input type="hidden" name="username" value="<?php escape($user->data()->username); ?>">
                            </div>
                        </div>
                    </form>
                </div>
                <div id="userFiles" class="tab-pane fade">
                    <h3 class="members-headers">Public Files<small>These files are viewable to all users and guests... .. .</small></h3>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Original Author</th>
                                    <th>File</th>
                                    <th>Category</th>
                                    <th>Creation Date</th>
                                </tr>
                                <tbody>
                                    <?php $files->userFiles('no', $user->data()->id); ?>
                                </tbody>
                            </thead>
                        </table>
                    </div>
                    <hr>
                    <h3 class="members-headers">Private Files<small>These files are only viewable to you... .. .</small></h3>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Original Author</th>
                                    <th>File</th>
                                    <th>Category</th>
                                    <th>Creation Date</th>
                                </tr>
                                <tbody>
                                    <?php $files->userFiles('yes', $user->data()->id); ?>
                                </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>