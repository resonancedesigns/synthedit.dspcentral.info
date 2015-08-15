<?php
class Search {
	private $mysqli;

	public function __construct() {
		$this->connect();
	}

	private function connect() {
		$this->mysqli = new mysqli('127.0.0.1', 'rezinunts', 'Mungching1!', 'dspcentral_se');
	}

	public function search($searchTerm) {
		$sanitized = $this->mysqli->real_escape_string($searchTerm);
		$query = $this->mysqli->query("
			SELECT *
			FROM files
			WHERE username LIKE '%{$sanitized}%'
			OR name LIKE '%{$sanitized}%'
			OR file LIKE '%{$sanitized}%'
			OR title LIKE '%{$sanitized}%'
			OR author LIKE '%{$sanitized}%'
			OR description LIKE '%{$sanitized}%'
			OR category LIKE '%{$sanitized}%'
			OR keywords LIKE '%{$sanitized}%'
		");
		if(!$query->num_rows) {
			return false;
		}
		while($row = $query->fetch_object()) {
			$rows[] = $row;
		}
		$searchResults = array(
			'count' => $query->num_rows,
			'results' => $rows
		);
		return $searchResults;
	}
}