<?php

abstract class employee {
	protected $name;
	protected $dept;
	protected $salary;




	public function setName($name){
		$this->name =$name;
	}

	public function getName(){
		return $this->name;
	}

	public function setdept($dept){
		$this->dept=$dept;

		}
	public function getDept(){
		return $this->dept;
	}


	public function getSalary(){
		return $this->salary;

	}

  abstract public function calculateSalary();


}






