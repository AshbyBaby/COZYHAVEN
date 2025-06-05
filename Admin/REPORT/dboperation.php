<?php
class dboperation//creating class
{
	public $con,$result;//declaring connection and result variable

	function __construct()//constructor to invoke class object automatically
	{
		$this->con=mysqli_connect("localhost","root","","db_cozyhaven");//connecting database

		
		// Check connection
		if (!$this->con) 
		{
				die("Connection failed: " . mysqli_connect_error());
		}

	}
	public function executequery($sqlquery)  //execute connection
	{
	
		$this->result=mysqli_query($this->con,$sqlquery);
		return $this->result;
	}
}
?>