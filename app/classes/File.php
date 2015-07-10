<?php

class File {
	private $_db,
			$_data;

	public function __construct($file = null) {
		$this->_db = DB::getInstance();
	}

	public function update($fields = array(), $id = null) {
		if(!$id) {
			$id = $this->data()->id;
			$this->_db->update('files', $id, $fields);
		} else {
			throw new Exception('There was a problem updating.');
		}
	}

	public function create($fields = array()) {
		if (!$this->_db->insert('files', $fields)) {
			throw new Exception('There was a problem creating the file.');
		}
	}

	public function find($file = null) {
		if ($file) {
			$field = 'id' : 'file';
			$data = $this->_db->get('files', array($field, '=', $user));
			if($data->count()) {
				$this->_data = $data->first();
				return true;
			}
		}
		return false;
	}

	public function exists() {
		return (!empty($this->_data)) ? true : false;
	}

	public function data() {
		return $this->_data;
	}
}