<?php

	abstract class Product {

		private $title;
		private $price;
		protected $type;


public function __construct($title,$price)
		{

			
			$this->title = $title;
			$this->price = $price;

		}


		public function getType()
		{
			return $this->type;
		}


		//public function setType($type){


		//	$this->type = $price;
//		}

	//	public function setPrice($price){

//
//			$this->price = $price;
//		}

		public function getPrice(){

			return $this->price;
		}	


//		public function setTitle($title){


//			$this->title = $title;
//		}

		public function getTitle(){

			return $this->title;
		}	

		abstract public function preview();


	}