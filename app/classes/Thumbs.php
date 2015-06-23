<?php 
class Thumbs {
    public static function createThumbs($pathToImages, $pathToThumbs, $thumbWidth) {
        // open the directory
        $dir = opendir($pathToImages);

        // loop through it, looking for any/all JPG files:
        while(false !== ($fname = readdir($dir))) {
            // parse path for the extension
            $info = pathinfo($pathToImages . $fname);
            // continue only if this is a JPEG image
            if(strtolower($info['extension']) == 'jpg') {
                echo "Creating thumbnail for {$fname} <br />";
                // load image and get image size
                $img = imagecreatefromjpeg("{$pathToImages}{$fname}");
                $width = imagesx($img);
                $height = imagesy($img);

                // calculate thumbnail size
                $new_width = $thumbWidth;
                $new_height = floor($height * ($thumbWidth / $width));

                // create a new temporary image
                $tmp_img = imagecreatetruecolor($new_width, $new_height);

                // copy and resize old image into new image
                imagecopyresized($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

                // save thumbnail into a file
                imagejpeg($tmp_img, "{$pathToThumbs}{$fname}");
            } elseif(strtolower($info['extension']) == 'gif') {
                echo "Creating thumbnail for {$fname} <br />";

                // load image and get image size
                $img = imagecreatefromgif("{$pathToImages}{$fname}");
                $width = imagesx($img);
                $height = imagesy($img);

                // calculate thumbnail size
                $new_width = $thumbWidth;
                $new_height = floor($height * ($thumbWidth / $width));

                // create a new temporary image
                $tmp_img = imagecreatetruecolor($new_width, $new_height);

                // copy and resize old image into new image
                imagecopyresized($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

                // save thumbnail into a file
                imagejpeg($tmp_img, "{$pathToThumbs}{$fname}");
            } elseif(strtolower($info['extension']) == 'png') {
                echo "Creating thumbnail for {$fname} <br />";
                // load image and get image size
                $img = imagecreatefrompng("{$pathToImages}{$fname}");
                $width = imagesx($img);
                $height = imagesy($img);

                // calculate thumbnail size
                $new_width = $thumbWidth;
                $new_height = floor($height * ($thumbWidth / $width));

                // create a new temporary image
                $tmp_img = imagecreatetruecolor($new_width, $new_height);

                // copy and resize old image into new image
                imagecopyresized($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

                // save thumbnail into a file
                imagejpeg($tmp_img, "{$pathToThumbs}{$fname}");
            }
        }
        // close the directory
        closedir($dir);
    }
}