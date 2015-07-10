<div id="content-swapper" class="container-fluid">
    <div class="row-fluid">
        <div class="col-sm-12 profileBanner">
        	<img class="profilePic" src="users/<?php echo escape($data->username) ?>/imgs/<?php echo escape($data->profile_pic) ?>">
        </div>
        <div class="col-sm-3 profileSidebar">
        	<h3 class="profileHeaders"><?php echo escape($data->username); ?></h3>
            <!-- TODO: Show "edit profile" link if user is viewing their own profile. -->
            <?php
            /* $editProfile = '
                <p>Edit Profile</p>
            '; 
            if(Session::get($username) = Input::get('user')) {
                echo $editProfile;
            }*/
            ?>
            <p>Full name: <?php echo escape($data->name); ?></p>
            <p>Email: <?php echo escape($data->email); ?></p>
            <p>Joined: <?php echo date('M d, Y', strtotime(escape($data->joined))); ?></p>
        </div>
        <div class="col-sm-9 profileContent">
        	<h4 class="profileHeaders">Bio:</h4>
        	<p><?php echo escape($data->bio) ?>
        </div>
    </div>
</div>