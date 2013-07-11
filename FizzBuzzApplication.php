<?php
namespace CodeIQ;

require_once 'FizzBuzzSpecification.php';

class FizzBuzzApplication
{
    private $specAndMessages;

    public function run(Array $data)
    {
        $index = 0;
        foreach ($data as $val) {
			$this->handleResult($this->getMessageOf($val), $index);
			$index++;
        }
    }

    public function addSpecAndMessage(FizzBuzzSpecification $spec, $message)
    {
        $this->specAndMessages[] = array(
            'spec'        => $spec,
            'message'    => $message
        );
    }

	protected function handleResult($result, $index)
	{
		if ($index !== 0) {
			echo PHP_EOL;
		}

        echo $result;
	}

    private function getMessageOf($val)
    {
        foreach ($this->specAndMessages as $specAndMessage) {
            if ($specAndMessage['spec']->isSatisfiedBy($val)) {
                return $specAndMessage['message'];
            }
        }

        return $val;
    }

}
