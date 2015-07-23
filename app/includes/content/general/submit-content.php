<div id="content-swapper" class="container-fluid">
    <div class="row-fluid">
        <div class="col-lg-12">
            <h1 id="modules">Modules<sub class="sub-button">
                <?php if($user->isLoggedIn()): ?>
                    <div id="addContainer"><button id="addBtn" type="submit" name="addBtn" class="btn btn-default" href="#">Add One</button></div>
                <?php else: ?>
                    <sub>You must <a href="http://dspcentral.synthedit/sign-in.php">sign in</a> to add one. Need an account? <a href="http://dspcentral.synthedit/register.php">Register here</a>.</sub>
                <?php endif; ?>
            </sub></h1>
            <?php if($user->isLoggedIn()): ?>
                <!-- Start upload form -->
                <form target="upload-frame" id="moduleForm" name="moduleForm" class="form-horizontal" role="form" action="app/parsers/create_module.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Add Module</legend>
                        <div class="form-group field hide-me">
                            <label for="title" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group field hide-me">
                            <label for="description" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="description" id="description" rows="5" form="moduleForm" class="form-control" placeholder="Description"></textarea>
                            </div>
                        </div>
                        <div class="form-group field">
                            <label for="category" class="col-sm-2 control-label">Category</label>
                            <div class="col-sm-10">
                                <select name="category" id="category" class="form-control">
                                    <option value="webdesign">Web Design</option>
                                    <option value="printdesign">Graphic Design</option>
                                    <option value="uxdesign">UX Design</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group field hide-me">
                            <label for="file" class="col-sm-2 control-label">File</label>
                            <div class="col-sm-10">
                                <input type="file" name="module-file" id="module-file">
                            </div>
                        </div>
                        <input type="hidden" name="u_id" id="u_id" value="<?php echo $user->data()->id ?>">
                        <input type="hidden" name="username" id="username" value="<?php echo $user->data()->username ?>">
                        <input type="hidden" name="name" id="name" value="<?php echo $user->data()->name ?>">
                        <input type="hidden" name="pvt" id="pvt" value="0">
                        <div class="form-group hide-me">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button id="uploadBtn" type="submit" name="uploadBtn" class="btn btn-default" onclick="uploadFile()">Add</button>
                                <button id="cancelBtn" type="submit" name="cancelBtn" class="btn btn-default">Cancel</button>
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
                                <iframe class="embed-responsive-item" name="upload-frame" id="upload-frame" src="app/parsers/create_module.php" frameborder="0"></iframe>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <!-- End upload form -->
            <?php endif; ?>
        </div>
    </div>
</div>