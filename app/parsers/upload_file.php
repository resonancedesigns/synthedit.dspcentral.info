<?php
require_once ('../core/init.php');

// Create the user object
$user = new User();
$username = $user->data()->username;

// Set the file extensions allowed
$allowed = [
	'se1',
	'sem',
	'gif',
	'jpg',
	'png',
	'bmp',
	'psd',
	'pdf',
	'vst',
	'dll',
	'fxp',
	'fst',
	'fxb',
	'mp3',
	'mp4',
	'ogg',
	'flac',
	'wav',
	'aif',
	'aiff',
	'zip',
	'rar',
	'7z',
	'tar',
	'gz'
];

// Check if a file has been selected
if (!empty($_FILES['upload-file']['name'])) {
	// If it has, gather the form data and prepare it for the database query
	$category = $_POST['category'];
	$file_name = $_FILES['upload-file']['name'];
	$temp_name = $_FILES['upload-file']['tmp_name'];
	$filetype = $_FILES['upload-file']['type'];
	$filename = $_FILES['upload-file']['name'];
	$target_path = '../../public/files/'.$category.'/'.$filename;

	if (file_exists("../../public/files/$category/$filename")) {
		echo "Error: This file <a href='../../files/$category/$filename'>already exists</a>. If you own the file, please update it instead of attempting to create a new file.";
	} else {
		$ext = explode('.', $filename);
		$ext = strtolower(end($ext));
		if(in_array($ext, $allowed) && move_uploaded_file($temp_name, $target_path)) {
			echo "<a href='../../public/files/$category/$filename'>$filename</a> uploaded successfully to the $category section.";
		} else {
			echo "Error: That file extension is not allowed."; 
		}
	}
}
?>