<?php
require_once ('../core/init.php');

$user = new User();
$username = $user->data()->username;

$allowed = [
	'sem',
	'zip',
	'rar',
	'7z',
	'tar',
	'gz'
];

if (!empty($_FILES['module-file']['name'])) {
	$file_name = $_FILES['module-file']['name'];
	$temp_name = $_FILES['module-file']['tmp_name'];
	$filetype = $_FILES['module-file']['type'];
	$filename = $_FILES['module-file']['name'];
	$target_path = '../../files/modules/'.$filename;

	if (file_exists("../../files/modules/$filename")) {
		echo "Error: This file <a href='../../files/modules/$filename'>already exists</a>. If you own the file, please update it instead of attempting to create a new file.";
	} else {
		$ext = explode('.', $filename);
		$ext = strtolower(end($ext));
		if(in_array($ext, $allowed) && move_uploaded_file($temp_name, $target_path)) {
			echo "<a href='../../files/modules/$filename'>$filename</a> uploaded successfully to the modules section.";
		} else {
			echo "Error: That file extension is not allowed."; 
		}
	}
}
?>