<div id="content-swapper" class="container-fluid">
    <div class="row-fluid">
        <div class="col-lg-12">
            <h1 class="res-headers">Tools<sub class="sub-button">
                <?php if($user->isLoggedIn()): ?>
                    <div id="addContainer"><button id="addBtn" type="submit" name="addBtn" class="btn btn-default" href="#"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add One</button></div>
                <?php else: ?>
                    <sub>You must <a href="sign-in.php">sign in</a> to add one. Need an account? <a href="register.php">Register here</a>.</sub>
                <?php endif; ?>
            </sub></h1>
            <!-- TODO: Make breadcrumbs dynamic -->
            <ol class="breadcrumb">
                <li><a href="#">SynthEdit@dspCentral.info</a></li>
                <li><a href="#">Resources</a></li>
                <li class="active">Tools</li>
            </ol>
            <?php if($user->isLoggedIn()): ?>
                <!-- Start upload form -->
                <form target="upload-frame" id="uploadForm" name="uploadForm" class="form-horizontal" role="form" action="../app/parsers/create_file.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Add Tools</legend>
                        <div class="form-group field hide-me">
                            <label for="title" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="<?php echo escape(Input::get('title')); ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group field hide-me">
                            <label for="author" class="col-sm-2 control-label">Author</label>
                            <div class="col-sm-10">
                                <input type="text" name="author" id="author" class="form-control" placeholder="The original creator of the file" value="<?php echo escape(Input::get('author')); ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group field hide-me">
                            <label for="description" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="description" id="description" rows="5" class="form-control" placeholder="Enter a description of 500 characters max"><?php echo escape(Input::get('description')); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group field hide-me">
                            <label for="license" class="col-sm-2 control-label">License</label>
                            <div class="col-sm-10">
                                <select name="license" id="license" class="form-control">
                                    <option value="modules">Modules</option>
                                    <option value="prefabs">Prefabs</option>
                                    <option value="graphics">Graphics</option>
                                    <option value="tools">Tools</option>
                                    <option value="docs">Docs</option>
                                    <option value="misc">Misc</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group field hide-me">
                            <label for="file" class="col-sm-2 control-label">File</label>
                            <div class="col-sm-10">
                                <input type="file" name="upload-file" id="upload-file">
                            </div>
                        </div>
                        <input type="hidden" name="u_id" id="u_id" value="<?php echo $user->data()->id ?>">
                        <input type="hidden" name="username" id="username" value="<?php echo $user->data()->username ?>">
                        <input type="hidden" name="name" id="name" value="<?php echo $user->data()->name ?>">
                        <input type="hidden" name="category" id="category" value="tools">
                        <div class="form-group field hide-me">
                            <label for="pvt" class="col-sm-2 control-label">Access</label>
                            <div class="col-sm-10">
                                <label>
                                    <input type="radio" name="pvt" id="pvtNo" value="no" checked>
                                    No &mdash; This file is not private.
                                </label>
                                <label>
                                    <input type="radio" name="pvt" id="pvtYes" value="yes">
                                    Yes &mdash; This file is private.
                                </label>
                            </div>
                        </div>
                        <div class="form-group hide-me">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button id="uploadBtn" type="submit" name="uploadBtn" class="btn btn-default" onclick="uploadFile()"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> Upload</button>
                                <button id="cancelBtn" type="submit" name="cancelBtn" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Cancel</button>
                            </div>
                        </div>
                        <div id="progress-display" class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="bar">
                                    <span class="bar-fill" id="progressBar"><span id="status"></span></span>
                                </div>
                                <div id="uploads" class="uploads">
                                    
                                    <p id="loaded_n_total"></p>
                                </div>
                                <iframe class="embed-responsive-item" name="upload-frame" id="upload-frame" src="../app/parsers/create_file.php" frameborder="0"></iframe>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <!-- End upload form -->
            <?php endif; ?>
        </div>
    </div>
    <div class="row-fluid">
        <div id="pagination-top" class="col-lg-12">
            <nav>
                <ul class="pagination pagination-sm">
                    <?php $tools->pageInation('tools'); ?>
                </ul>
                <div class="col-sm-3 pull-right">
                    <form action="" class="form-horizontal" style="margin-top: 20px;">
                        <div class="form-group field">
                            <label for="resNum" class="col-sm-9 res-label text-right">Results Per Page:</label>
                            <select class="pull-right" name="resNum" onchange="window.location.href= this.form.resNum.options[this.form.resNum.selectedIndex].value">
                                <option value="tools.php?page=1&amp;per-page=10">10</option>
                                <option value="tools.php?page=1&amp;per-page=20">20</option>
                                <option value="tools.php?page=1&amp;per-page=30">30</option>
                                <option value="tools.php?page=1&amp;per-page=40">40</option>
                                <option value="tools.php?page=1&amp;per-page=50">50</option>
                            </select>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>
    <div class="row-fluid">
        <div id="res-list" class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>File</th>
                            <th>Uploaded By</th>
                            <th>Creation</th>
                        </tr>
                        <tbody>
                            <?php $tools->fileList('tools', 'no', '0', '999999999999'); ?>
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div id="pagination-bottom" class="col-lg-12">
            <nav>
                <ul class="pagination pagination-sm">
                    <?php $tools->pageInation('tools'); ?>
                </ul>
            </nav>
        </div>
    </div>
</div>