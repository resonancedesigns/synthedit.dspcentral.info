<link rel="stylesheet" href="../../public/css/se-dspcentral.css">

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
	$u_id = $_POST['u_id'];
	$username = $_POST['username'];
	$name = $_POST['name'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$category = $_POST['category'];
	$pvt = $_POST['pvt'];
	$file_name = $_FILES['upload-file']['name'];
	$temp_name = $_FILES['upload-file']['tmp_name'];
	$filetype = $_FILES['upload-file']['type'];
	$filename = $_FILES['upload-file']['name'];
	// Get the file extension/type
	$ext = explode('.', $filename);
	$ext = strtolower(end($ext));

	// Security: Character filtering of form data
	function filterFunction ($var) { 
	    $var = nl2br(htmlspecialchars($var));
	    $var = eregi_replace("'", "&#39;", $var);
	    $var = eregi_replace("`", "&#39;", $var);
	    return $var; 
	}
	$title = filterFunction($title);
	$description = filterFunction($description);

	// Security: Check if the file extension is allowed
	if(in_array($ext, $allowed)) {
		// If it is, insert database record for the file and send message to the user
		$query_create = mysqli_query($connectMe, "INSERT INTO files (u_id, username, name, file, title, description, category, created_at, pvt) VALUES('$u_id','$username','$name','$filename','$title','$description','$category',date('Y-m-d H:i:s'),'$pvt')") or die (mysqli_error($connectMe));
		$uploadMsg = "File uploaded successfully! =) <a id='addAnother' type='submit' name='addAnother' class='btn btn-default' href='../../public/submit-content.php' target='_parent'>Add Another</a>";
		$fileDetails = "
			<div class='col-sm-6'><h4 class='upload-frame'>Title: <sub>$title</sub></h4></div>
			<div class='col-sm-6'><h4 class='upload-frame'>User: <sub>$username</sub></h4></div>
			<div class='col-sm-6'><h4 class='upload-frame'>Category: <sub>$category</sub></h4></div>
			<div class='col-sm-6'><h4 class='upload-frame'>Private: <sub>$pvt</sub></h4></div>
			<div class='col-sm-2'><h4 class='upload-frame'>Description:</h4></div>
			<div class='col-sm-10'><p class='upload-frame'>$description</p></div>
		";
	// If the file extension isn't allowed, give the user an error
	} else {
		$uploadMsg = "Error: That file type is not allowed."; 
	}
} else {
	$uploadMsg = "Please wait... .. .";
}
?>
<h1 class="upload-frame">File Details<sub><?php print $uploadMsg ?></sub></h1>
<?php 
if (!empty($fileDetails)) {
	print $fileDetails;
} else {
	echo "File details will display here once upload is complete...";
}
?>