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
	'txt',
	'md',
	'doc',
	'docx',
	'xls',
	'xlsx',
	'ppt',
	'pptx',
	'epub',
	'od',
	'odx',
	'rtf',
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
	$title = $_POST['title'];
	$author = $_POST['author'];
	$description = $_POST['description'];
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

		// Run form validation to check for errors
	    $validate = new Validate();
	    $validation = $validate->check($_POST, array(
	        'title' => array(
	            'required' => true,
	            'min' => 3,
	            'max' => 128,
	            'unique' => 'files'
	        ),
	        'author' => array(
	            'required' => true,
	            'min' => 3
	        ),
	        'description' => array(
	            'required' => true,
	            'max' => '500'
	        ),
	        'category' => array(
	        	'required' => true
	        )
	    ));

		if($validation->passed() && in_array($ext, $allowed)) {
			move_uploaded_file($temp_name, $target_path);
			echo "<a href='../../public/files/$category/$filename'>$filename</a> uploaded successfully to the $category section.";
		} else {
			echo "Error: Check the message(s) below."; 
		}
	}
}
?>