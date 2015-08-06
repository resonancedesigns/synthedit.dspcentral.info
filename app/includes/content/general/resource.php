<?php
$user = new User($username);
$data = $user->data();

// Create the inline styling for the custom profile banner. 
$userBanner = '
    <style type="text/css">
        .profileBanner {
            background-image: url("users/' . $user->data()->username . '/imgs/' . $user->data()->banner_pic . '");
        }
    </style>
';
// Check if the user has uploaded a custom profile banner image.
if(!empty($user->data()->banner_pic)) {
    // If they have, insert the inline styling.
    echo $userBanner;
}
?>
<div id="content-swapper" class="container-fluid">
    <div class="row-fluid">
        <div class="col-sm-12 profileBanner">
        	<img class="profilePic" src="users/<?php echo escape($user->data()->username); ?>/imgs/<?php echo escape($user->data()->profile_pic); ?>">
        </div>
        <div class="col-sm-3 profileSidebar">
        	<h3 class="profileHeaders"><?php echo escape($user->data()->username); ?></h3>
            <!-- TODO: Show "edit profile" link if user is viewing their own profile. -->
            <?php
            /* $editProfile = '
                <p>Edit Profile</p>
            '; 
            if(Session::get($user_id) === $data()->id {
                echo $editProfile;
            } */
            ?>
            <p>Full name: <?php echo escape($user->data()->name); ?></p>
            <p>Email: <?php echo escape($user->data()->email); ?></p>
            <p>Joined: <?php echo date('M d, Y', strtotime(escape($user->data()->joined))); ?></p>
        </div>
        <div class="col-sm-9 profileContent">
            <ul class="nav nav-tabs" id="editProfileTabs">
                <li class="active"><a href="#userBio" data-toggle="tab" role="tab">User Info</a></li>
                <li><a href="#userFiles" data-toggle="tab" role="tab">User Files</a></li>
            </ul>
            <div class="tab-content">
                <div id="userBio" class="tab-pane fade active in">
        	       <h4 class="profileHeaders">Bio:</h4>
        	       <p><?php echo escape($user->data()->bio) ?></p>
                </div>
                <div id="userFiles" class="tab-pane fade">
                    <h4 class="profileHeaders">Resources:</h4>
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
                </div>
            </div>
        </div>
    </div>
</div>