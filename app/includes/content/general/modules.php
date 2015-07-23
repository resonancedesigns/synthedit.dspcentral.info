<div id="content-swapper" class="container-fluid">
    <div class="row-fluid">
        <div class="col-lg-12">
            <form action="app/parsers/upload_module.php" method="post" enctype="multipart/form-data" id="upload_form" name="form" class="form-horizontal">
                <fieldset>
                    <legend>Add Module</legend>
                    <div class="form-group">
                        <label for="module-file" class="col-sm-2 control-label">Module File</label>
                        <div class="col-sm-10">
                            <input type="file" id="module-file" name="module-file" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="module-title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="fileTitle" id="fileTitle" placeholder="Title" class="form-control" value="<?php echo $fileTitle ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="module-description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="fileDescription" id="fileDescription" rows="3" placeholder="Description"><?php echo $fileDescription ?></textarea>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Private
                                </label>
                            </div>
                        </div>
                    </div> 
                    <input type="hidden" name="userID" id="userID" value="<?php //echo $userID ?>">
                    <input type="hidden" name="userName" id="userName" value="<?php //echo $userName ?>" >
                    <input type="hidden" name="name" id="name" value="<?php //echo $name ?>" >
                    <input type="hidden" name="pvt" id="pvt" value="0"> -->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="button" id="submit" name="submit" class="btn btn-default" value="Upload" onclick="uploadFile()">
                        </div>
                    </div>
                </fieldset>
            </form>
                    

                    <div id="progress-display">
                        <div class="bar">
                            <span class="bar-fill" id="progressBar"><span class="bar-fill-text" id="pt"></span></span>
                        </div>
                        <div id="uploads" class="uploads">
                            <h3 id="status"></h3>
                            <p id="loaded_n_total"></p>
                        </div>
                    </div>
                <!-- <progress id="progressBar" value="0" max="100" class="progress-bar"></progress> -->


        </div>
    </div>
</div>