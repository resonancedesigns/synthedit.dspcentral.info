<?php
class File {
	public function fileList($where) {
		// Make database connection
		$db = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
		// User input
		$p = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		$perP = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 5;
		// Positioning
		$start = ($p > 1) ? ($p * $perP) - $perP : 0;
		// Query
		$modules = $db->prepare("
		    SELECT SQL_CALC_FOUND_ROWS *
		    FROM files
		    WHERE category = '{$where}'
		    LIMIT {$start}, {$perP}
		");
		$modules->execute();
		$modules = $modules->fetchAll(PDO::FETCH_ASSOC);
		$fileList = NULL;
		foreach ($modules as $module) {
			$fileList .= '
				<div>
					<p><a href="files/modules/' . $module['file'] . '">' . $module['username'] . ' - ' . $module['title'] . ' - ' . $module['created_at'] . ' - ' . $module['file'] . '</a></p>
				</div>
			';
		};
        print $fileList;
	}

	public function pageInation($where) {
		// Make database connection
		$db = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
		$p = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		$perP = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 5;
		// Positioning
		$start = ($p > 1) ? ($p * $perP) - $perP : 0;
		// Query
		$modules = $db->prepare("
		    SELECT SQL_CALC_FOUND_ROWS *
		    FROM files
		    WHERE category = '{$where}'
		    LIMIT {$start}, {$perP}
		");
		$modules->execute();
		$modules = $modules->fetchAll(PDO::FETCH_ASSOC);
		$total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
		$pages = ceil($total / $perP);
		
		$pageInation = NULL;
		for ($x = 1; $x <= $pages; $x++) {
			if($p === $x) { 
				$selected = " class='selected'";
			} else {
				$selected = "";
			};
			$pageInation .= '
				<a href="?page=' . $x . '&per-page=' . $perP . '"' . $selected . '>' . $x . '</a>
			';
		};
		print $pageInation;
	}
}