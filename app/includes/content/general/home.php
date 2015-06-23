<div class="container-fluid">
    <!-- Signed in content -->
    <div class="row-fluid">
        <div id="content-swapper" class="col-lg-12">
            <?php if($user->isLoggedIn()) { ?>
                <h1 class="centered-titles">Hello <a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a></h1>
                <?php 
                if($user->hasPermission('admin')) {
                    echo '<p>You are an administrator!</p>';
                }
            } else { ?>
                <h1 class="centered-titles">Hello guest,</h1>
                <p>In order to submit content, you must <a href="register.php">register</a>. If you already have an account, you can <a href="sign-in.php">sign in</a> and start submitting content.</p>
            <?php } ?>
        </div>
    </div>
</div>