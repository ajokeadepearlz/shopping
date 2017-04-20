<?php

	class MYSQLResult{

		protected $sql;
		protected $resultSet;
		const FETCH_ASSOC = 1;
		const FETCH_BOTH = 2;
		const FETCH_ARRAY = 3;



			public function __construct($conn, $sql){

				$this->sql = $sql;
				$this->resultSet = mysqli_query($conn, $this->sql);
			}

			public function fetch($mode=1){

				if($mode == 1){
					return mysqli_fetch_assoc($this->resultSet);

			}		

				if($mode == 2){
					return mysqli_fetch_array($this->resultSet);

			}		
					
				if($mode == 3){
					return mysqli_fetch_array($this->resultSet, MYSQLI_NUM);

			}

		}

			public function bindparam ($format, $value){
				$this->queryString = str_replace($format, $value, $this->sql);

			}

			public function executive(){
				$this->resultSet = mysqli_query($this->conn,$this->queryString);

		}
	
}


?>