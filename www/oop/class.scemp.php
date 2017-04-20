<?php

class SalariedCommissioned extends employee{

	const base = 2000;
	const rate = 0.02;
	protected $sales;
	


public function __construct($name,$dept,$sales){
	
	$this->name = $name;
	$this->dept = $dept;
	$this->sales = $sales;


}

	public function calculateSalary(){
				
		$this->salary = self::base + self::rate * $this->sales;


		echo "Name:" .$this->getName(). "</br>";
		echo "Department:" .$this->getDept()."</br>";
		echo "Salary:" . $this->getSalary()."</br>";

	}

}