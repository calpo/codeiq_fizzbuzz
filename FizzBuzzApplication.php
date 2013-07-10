<?php
namespace CodeIQ;

require_once 'FizzBuzzSpecification.php';

class FizzBuzzApplication
{
	public function run(Array $data)
	{
		echo implode(PHP_EOL, $data);
	}

	public function addSpecAndMessage(FizzBuzzSpecification $spec, $msg)
	{
	}

}
