<?php
	class Shortner {
		protected $db;
    
    	public function __construct() {
        	$this->db = new mysqli('127.0.0.1:3306', 'root', 'root', 'shortner');
			if ($this->db->connect_errno) {
				header("Location: ../index.php?error=dba");
				die();
			}
		}

		private function randomCode(){
			$code = rand(100000, 999999);
			return $code;
		}

		public function getLink($code){
			$selectFromDatabase  = $this->db->query("SELECT * FROM link WHERE code = '{$code}'");
			$values = $selectFromDatabase->fetch_object();
			return($values->url);
		}

		public function codeExists($code){
			$selectFromDatabase  = $this->db->query("SELECT * FROM link WHERE code = '{$code}'");
			return $selectFromDatabase->num_rows;
		}

		public function generateLink($uniqueCode = '') {
			return '<a href="'.$uniqueCode.'">'.$uniqueCode.'</a>';
		}

		public function registerURL($url, $code = NULL){
			$data = [0, NULL, NULL];

			if(!$url) return $data;
			if(strlen($code) > 12) return $data;
			if(!$code) $code = $this->randomCode();
			$insertInDatabase = $this->db->query("INSERT INTO link (url, code, created) VALUES ('{$url}', '{$code}', NOW())");
			if(!$insertInDatabase) return $data;
			
			$selectFromDatabase  = $this->db->query("SELECT * FROM link WHERE code = '{$code}'");
			$values = $selectFromDatabase->fetch_object();
			if(!$values) return $data;
			
			$data[0] = 1;
			$data[1] = $values->code;
			$data[2] = $values->url;

			echo(implode(', ', $data));

			return $data;
		}
	}
?>