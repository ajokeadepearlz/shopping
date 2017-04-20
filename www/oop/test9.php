<?php

include 'class.employee.php';
include 'class.HourlyEmployees.php';

$hemp = new HourlyEmployees (40, "lolly", "iT", 20);

	
	echo "Details of Hourly Employees </br>"; 
	$hemp->calculateSalary();


	include 'class.SalariedEmployees.php';

	$semp = new SalariedEmployee ("James", "Account");

	echo "Details of Salaried Employees </br>";
	$semp->calculateSalary();


	include 'class.scemp.php';

	$semp = new SalariedCommissioned ("Maja", "Sales Dept", 1000);

	echo "Details of Salaried Commissioned Employees </br>";
	$semp->calculateSalary();