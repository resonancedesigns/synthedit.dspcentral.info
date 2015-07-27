<div class="container-fluid">
    <!-- Signed in content -->
    <div class="row-fluid">
        <div id="content-swapper" class="col-lg-12">
            <h1 class="centered-titles">Hello <a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a>
            </h1>
			<?php
			    if($user->hasPermission('admin')) {
			        echo '<p>You are an administrator!</p>';
			    }
			?>
        </div>
    </div>
</div>