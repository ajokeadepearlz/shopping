<?php 

	class MYSQLConn{


		const host = "localhost";
		const user = "root";
		const pword = "vagrant";
		const db = "bookstore";

		protected $mysqli;
		protected $result;


		public function __construct(){

			$this->mysqli = new mysqli(self::host, self::user, self::pword, self::db);

			return $this->mysqli;
		}

		public function prepare($sql){

			$this->result = new MYSQLResult($this->mysqli, $sql);

				return $this->result;
		}


}

?>