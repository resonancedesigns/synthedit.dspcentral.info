<div id="content-swapper" class="container-fluid">
    <div class="row-fluid">
        <div class="col-lg-12">
            <?php if($fileDetails) : ?>
                <?php foreach ($fileDetails as $fileDetail) : ?>
                    <h1>File <small><?php echo $fileDetail['title']; ?></small></h1>
                    <!--[TODO]>
                        Build the rest of the file details view.
                    <![TODO]-->
                <?php endforeach; ?>
                <!--[TODO]>
                    Add elseif statements for various item types (ie: blogs, vsts, forums, etc) and build their views.
                <![TODO]-->
            <?php endif; ?>
            <!-- Comment out the print_r when finished testing -->
            <?php print_r($fileDetails); ?>
        </div>
    </div>
</div>