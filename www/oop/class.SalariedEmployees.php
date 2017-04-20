<?php 

	
	class SalariedEmployee extends employee
	{
		
			protected $weeklyPay = 10000;


		public function __construct($name,$dept){
	
	$this->name = $name;
	$this->dept = $dept;
	


}

	public function calculateSalary(){
		
			$this->salary =  $this->weeklyPay;


		echo "Name:" .$this->getName(). "</br>";
		echo "Department:" .$this->getDept()."</br>";
		echo "Weekly Pay:" . $this->getSalary()."</br>";
		echo "Monthly Salary:" . 4 * $this->getSalary()."</br>";

		}
	}

