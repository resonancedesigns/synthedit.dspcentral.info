<nav class="navbar navbar-fixed-top se-nav-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand se-brand">
                <a href="http://www.synthedit.com" target="_blank"><img class="img-responsive se-logo" title="SynthEdit" alt="SynthEdit" src="imgs/se_logo.png"></a><span class="letters black"> @ <a href="http://dspcentral.info" target="_blank" title="dspCentral.info"><span class="letters green">dsp<!-- <span id="C-orange" class="logo letters">C</span> --><img class="img-responsive C-image" alt="C" src="imgs/icon.png" alt="dspCentral.info"><span class="letters orange">entral</span><span class="letters pink">.info</span></a>
            </div>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home<span class="sr-only">(current)</span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Resources <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="modules.php">Modules</a></li>
                        <li><a href="prefabs.php">Prefabs</a></li>
                        <li><a href="graphics.php">Graphics</a></li>
                        <li><a href="tools.php">Tools</a></li>
                        <li><a href="docs.php">Docs</a></li>
                        <li><a href="misc.php">Misc</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Creations <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">VST Effects</a></li>
                        <li><a href="#">VST Instruments</a></li>
                    </ul>
                </li>
                <li><a href="#">Forums</a></li>
                <li><a href="#">Funding</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle user-menu" data-toggle="dropdown" role="button" aria-expanded="false">
                        <img class="user-icon" src="users/<?php echo escape($data->username) ?>/imgs/<?php echo escape($data->profile_pic) ?>">
                    </a>
                    <ul class="dropdown-menu text-right" role="menu">
                        <li id="content" class="text-right"><a href="submit-content.php">Submit Content <span class="glyphicon glyphicon-open" aria-hidden="true"></span></a></li>
                        <li id="profile" class="text-right"><a href="profile.php?user=<?php echo escape($user->data()->username); ?>">View Profile <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
                        <li id="update" class="text-right"><a href="update.php">Update Profile <span class="glyphicon glyphicon-pencil" aria-hidden="true"></a></li>
                        <li id="userpass" class="text-right"><a href="userpass.php">Change Password <span class="glyphicon glyphicon-cog" aria-hidden="true"></span></span></a></li>
                        <li id="signout" class="text-right"><a href="sign-out.php">Sign Out <span class="glyphicon glyphicon-off" aria-hidden="true"></span></a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>