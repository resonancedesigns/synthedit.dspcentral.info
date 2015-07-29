<div id="content-swapper" class="container-fluid">
    <div class="row-fluid">
        <div class="col-lg-12">
            <h1 id="modules">Submit Content</h1>
            <!-- TODO: Make breadcrumbs dynamic -->
            <ol class="breadcrumb">
                <li><a href="#">SynthEdit@dspCentral.info</a></li>
                <li><a href="#">Resources</a></li>
                <li class="active">Submit Content</li>
            </ol>
            <!-- Start upload form -->
            <form target="upload-frame" name="uploadForm" class="form-horizontal" role="form" action="../app/parsers/create_file.php" method="post" enctype="multipart/form-data">
                <fieldset style="margin-top: 20px;">
                    <legend>Add A Resource</legend>
                    <div class="form-group field hide-me">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group field hide-me">
                        <label for="description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" id="description" rows="5" class="form-control" placeholder="Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group field hide-me">
                        <label for="category" class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-10">
                            <select name="category" id="category" class="form-control">
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
                    <input type="hidden" name="pvt" id="pvt" value="0">
                    <div class="form-group hide-me">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button id="uploadBtn" type="submit" name="uploadBtn" class="btn btn-default" onclick="uploadFile()"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> Upload</button>
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
        </div>
    </div>
</div>