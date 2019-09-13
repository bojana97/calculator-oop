<?php
require './includes/config.php';

Class Calculator {

	public $combination;
	public $factor1;
	public $factor2;
	public $operation='*';

	//get value of submited button
	public function  __construct($combination)
	{
		$this->combination = $combination;
	}

	//split value on factors
	public function splitElements()
	{
		$arrFactorsAndOperation = explode (" ", $this->combination);
		$this->factor1 = $arrFactorsAndOperation [0];
		$this->factor2 = $arrFactorsAndOperation [2];

	}

	//multiply factors and return result
	public function getResult()
	{
		return $this->result = $this->factor1 * $this->factor2;
	}

	//insert record into db 
	public function insert()
	{
		global $mysqli;
		$dbfactor1=$this->factor1;
		$dbfactor2=$this->factor2;
		$dboperation=$this->operation;
		$dbresult=$this->result;
		$stmt = $mysqli->prepare("INSERT INTO calculator (factor1, factor2, operation, result) VALUES (?, ?,?,?)");
		$stmt->bind_param("iisi", $dbfactor1, $dbfactor2, $dboperation,  $dbresult);
		$stmt->execute();
		$stmt->close();
	}
}

?>