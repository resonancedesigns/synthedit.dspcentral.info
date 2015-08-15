<?php
class File {
	public function __construct() {
		$this->p = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		$this->perP = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 10;
		$this->start = ($this->p > 1) ? ($this->p * $this->perP) - $this->perP : 0;
	}

	public function connectApp() {
		$connection = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
		return $connection;
	}

	public function resourcesQueryConstructor($where, $pvt, $b1, $b2) {
		$db = $this->connectApp();
		$files = $db->prepare("SELECT * FROM files WHERE category = '{$where}' AND pvt = '{$pvt}' AND u_id BETWEEN '{$b1}' AND '{$b2}' LIMIT {$this->start}, {$this->perP}");
		$files->execute();
		$files = $files->fetchAll(PDO::FETCH_ASSOC);
		return $files;
	}

	public function profilesQueryConstructor($pvt, $id) {
		$db = $this->connectApp();
		$files = $db->prepare("SELECT * FROM files WHERE pvt = '{$pvt}' AND u_id = '{$id}' LIMIT {$this->start}, {$this->perP}");
		$files->execute();
		$files = $files->fetchAll(PDO::FETCH_ASSOC);
		return $files;
	}

	public function fileQueryConstructor($fileID) {
		$db = $this->connectApp();
		$file = $db->prepare("SELECT * FROM files WHERE id = '{$fileID}'");
		$file->execute();
		$file = $file->fetchAll(PDO::FETCH_ASSOC);
		return $file;
	}

	public function explodeTags($where, $pvt, $b1, $b2){
		$files = $this->resourcesQueryConstructor($where, $pvt, $b1, $b2);
		foreach ($files as $file) {	
			$tags = explode(', ', $file['keywords']);
			$tagList = NULL;
			foreach ($tags as $tag) {
				$tagList .= '<span class="label label-default">' . $tag . '</span> ';
			}
			return $tagList;
		};
	}

	public function fileList($where, $pvt, $b1, $b2){
		$files = $this->resourcesQueryConstructor($where, $pvt, $b1, $b2);
		$fileList = NULL;
		foreach ($files as $file) {	
			$fileList .= '
				<tr onclick="showDesc' . $file['id'] . '()" class="file-item">
					<td><a href="#">' . $file['title'] . '</a></td>
					<td>' . $file['author'] . '</td>
					<td><a href="files/' . $file['category'] . '/' . $file['file'] . '">' . $file['file'] . '</a></td>
					<td><a href="profile.php?user=' . $file['username'] . '">' . $file['username'] . '</a></td>
					<td>' . date('M d, Y', strtotime($file['created_at'])) . '</td>
				</tr>
				<tr id="desc' . $file['id'] . '" class="fileDescription tab-desc">
					<td colspan="5">
						<div>
							<h4>' . $file['title'] . '<sub class="pull-right"><a href="files/' . $file['category'] . '/' . $file['file'] . '" class="btn btn-default"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Download</a></sub></h4>
							<p>' . $file['description'] . '</p>
							<p>' . $this->explodeTags($where, $pvt, $b1, $b2) . '</p>
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

	public function userFiles($pvt, $id){
		$files = $this->profilesQueryConstructor($pvt, $id);
		$userFiles = NULL;
		foreach ($files as $file) {
			$userFiles .= '
				<tr onclick="showDesc' . $file['id'] . '()" class="file-item">
					<td><a href="#">' . $file['title'] . '</a></td>
					<td>' . $file['author'] . '</td>
					<td><a href="files/' . $file['category'] . '/' . $file['file'] . '">' . $file['file'] . '</a></td>
					<td><a href="' . $file['category'] . '.php">' . ucfirst($file['category']) . '</a></td>
					<td>' . date('M d, Y', strtotime($file['created_at'])) . '</td>
				</tr>
				<tr id="desc' . $file['id'] . '" class="fileDescription tab-desc">
					<td colspan="5">
						<div>
							<h4>' . $file['title'] . '<sub class="pull-right"><a href="files/' . $file['category'] . '/' . $file['file'] . '" class="btn btn-default"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Download</a></sub></h4>
							<p>' . $file['description'] . '</p>
							<p>' . $this->explodeTags($where, $pvt, $b1, $b2) . '</p>
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
		print $userFiles;
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