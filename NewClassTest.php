<?php
//require_once 'PHPUnit/Autoload.php';
require_once ('NewClass.php');

Class NewClassTest extends PHPUnit_Framework_TestCase
{
	private $mobjNewClass;
	
	public function setup(){
		$this->mobjNewClass = new NewClass();
	}
	
	public function testAddNums(){
		$linkResult = $this->mobjNewClass->addNums(1, 2);
		
		$this->assertEquals(3,$linkResult);
	}
	public function testSubtractNums(){
		$linkResult = $this->mobjNewClass->aubtractNums(5, 1);
		$this->assertEquals(4, $linkResult);
	}
}
