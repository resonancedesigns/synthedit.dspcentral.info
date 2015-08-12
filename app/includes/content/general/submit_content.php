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
                        <label for="license" class="col-sm-2 control-label">License Type</label>
                            <div class="col-sm-10">
                                <select name="license" id="license" class="form-control">
                                    <option value="Proprietory EULA">Proprietory EULA</option>
                                    <option value="Apache License 2.0">Apache License 2.0</option>
                                    <option value="BSD 3-Clause 'New' or 'Revised'">BSD 3-Clause "New" or "Revised"</option>
                                    <option value="BSD 2-Clause 'Simplified' or 'FreeBSD'">BSD 2-Clause "Simplified" or "FreeBSD" license</option>
                                    <option value="GNU General Public License (GPL)">GNU General Public License (GPL)</option>
                                    <option value="GNU Library or 'Lesser' General Public License (LGPL)">GNU Library or "Lesser" General Public License (LGPL)</option>
                                    <option value="MIT License">MIT License</option>
                                    <option value="Mozilla Public License 2.0">Mozilla Public License 2.0</option>
                                    <option value="Common Development and Distribution License">Common Development and Distribution License</option>
                                    <option value="Eclipse Public License">Eclipse Public License</option>
                                    <option value="Other OSI-Approved License">Other OSI-Approved License</option>
                                    <option value="None/Not Applicable">None/Not Applicable</option>
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