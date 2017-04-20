<?php

class HourlyEmployees extends employee{

	const rate = 5;
	protected $expectedHours;
	protected $hoursWorked;



public function __construct($expHrs,$name,$dept,$hrsWorked){
	$this->expectedHours = $expHrs;
	$this->name = $name;
	$this->dept = $dept;
	$this->hoursWorked = $hrsWorked;


}

	public function calculateSalary(){
				$overtime = 0;
		if ($this->$hoursWorked>$this->$expectedHours){
			$overtime = $this->$hoursWorked - $expectedHrs;
			$totalTime= $overtime + $expectedHours;
			$salary =self::$rate = $totalTime;

		}else {
			$this->salary = self::$rate * $this->hoursWorked;

}

		echo "...........";
		echo "name:" .$this->getName();
		echo "department:" .$this->getName();
		echo "salary:" . $this->getSalary();

	}

}