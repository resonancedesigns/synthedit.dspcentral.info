<?php
class File {
	public function __construct() {
		$this->p = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		$this->perP = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 5;
		$this->start = ($this->p > 1) ? ($this->p * $this->perP) - $this->perP : 0;
	}

	public function connectApp() {
		$connection = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
		return $connection;
	}

	public function queryConstructor($where) {
		// Make database connection
		$db = $this->connectApp();
		// Query
		$files = $db->prepare("SELECT * FROM files WHERE category = '{$where}' LIMIT {$this->start}, {$this->perP}");
		$files->execute();
		$files = $files->fetchAll(PDO::FETCH_ASSOC);
		return $files;
	}

	public function fileList($where){
		// Make database connection
		$files = $this->queryConstructor($where);
		$fileList = NULL;
		foreach ($files as $file) {
			$fileList .= '
				<div>
					<p><a href="files/modules/' . $file['file'] . '">' . $file['username'] . ' - ' . $file['title'] . ' - ' . $file['created_at'] . ' - ' . $file['file'] . '</a></p>
				</div>
			';
		};
        print $fileList;
	}

	public function pageInation($where) {
		// Make database connection
		$db = $this->connectApp();
		// Query
		$files = $db->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM files WHERE category = '{$where}' LIMIT {$this->start}, {$this->perP}");
		$files->execute();
		$files = $files->fetchAll(PDO::FETCH_ASSOC);
		$total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
		$pages = ceil($total / $this->perP);
		
		$pageInation = NULL;
		for ($x = 1; $x <= $pages; $x++) {
			if($this->p === $x) { 
				$selected = " class='selected'";
			} else {
				$selected = "";
			};
			$pageInation .= '
				<a href="?page=' . $x . '&per-page=' . $this->perP . '"' . $selected . '>' . $x . '</a>
			';
		};
		print $pageInation;
	}
}