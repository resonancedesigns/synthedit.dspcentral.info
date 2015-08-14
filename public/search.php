<?php
require_once '../app/core/init.php';

if(isset($_GET['keywords'])) {
	$keywords = $connectMe->escape_string($_GET['keywords']);

	$query = $connectMe->query("
		SELECT *
		FROM files,users
		WHERE username LIKE '%{$keywords}%'
		OR name LIKE '%{$keywords}%'
		OR file LIKE '%{$keywords}%'
		OR title LIKE '%{$keywords}%'
		OR author LIKE '%{$keywords}%'
		OR description LIKE '%{$keywords}%'
		OR category LIKE '%{$keywords}%'
		OR keywords LIKE '%{$keywords}%'
		OR bio LIKE '%{$keywords}%'
	");
}