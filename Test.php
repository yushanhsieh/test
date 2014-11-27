<?php
require_once ('api/v2/include/DbHandler.php');

Class NewClassTest extends PHPUnit_Framework_TestCase
{
	private $mobjNewClass;
	
	public function setup(){
		$this->mobjNewClass = new DbHandler();
	}
	
	public function testgetUserById(){
		$linkResult = $this->mobjNewClass->getUserById(1);
	}
	
}
