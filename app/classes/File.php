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
		$db = $this->connectApp();
		$files = $db->prepare("SELECT * FROM files WHERE category = '{$where}' LIMIT {$this->start}, {$this->perP}");
		$files->execute();
		$files = $files->fetchAll(PDO::FETCH_ASSOC);
		return $files;
	}

	public function fileList($where){
		$files = $this->queryConstructor($where);
		$fileList = NULL;
		foreach ($files as $file) {
			$fileList .= '
				<tr onclick="showDesc' . $file['id'] . '()" class="file-item">
					<td>' . $file['title'] . '</td>
					<td><a href="files/modules/' . $file['file'] . '">' . $file['file'] . '</a></td>
					<td>' . $file['username'] . '</td>
					<td>' . $file['created_at'] . '</td>
				</tr>
				<tr id="desc' . $file['id'] . '" class="fileDescription tab-desc">
					<td colspan="4">
						<div>
							<h4>' . $file['title'] . '<sub class="pull-right"><a href="files/modules/' . $file['file'] . '" class="btn btn-default"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Download</a></sub></h4>
							<p>' . $file['description'] . '</p>
							<hr>
						</div>
					</td>
				</tr>
				<script>
					function showDesc' . $file['id'] . '() {
						_("desc' . $file['id'] . '").classList.toggle("show-desc");
					}
				</script>
			';
		};
        print $fileList;
	}

	public function pageInation($where) {
		$db = $this->connectApp();
		$files = $db->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM files WHERE category = '{$where}' LIMIT {$this->start}, {$this->perP}");
		$files->execute();
		$files = $files->fetchAll(PDO::FETCH_ASSOC);
		$total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
		$pages = ceil($total / $this->perP);
		
		$pageInation = NULL;
		for ($x = 1; $x <= $pages; $x++) {
			if($this->p === $x) { 
				$selected = " class='active'";
			} else {
				$selected = "";
			};
			$pageInation .= '
				<li' . $selected . '><a href="?page=' . $x . '&per-page=' . $this->perP . '">' . $x . '</a></li>
			';
		};
		print $pageInation;
	}
}