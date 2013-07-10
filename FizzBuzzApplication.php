<?php
namespace CodeIQ;

require_once 'FizzBuzzSpecification.php';

class FizzBuzzApplication
{
    const OUTPUT_DELIMITER = PHP_EOL;

    private $spec_conf_list;

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
        $this->spec_conf_list[] = array(
            'spec'        => $spec,
            'message'    => $message
        );
    }

	protected function handleResult($result, $index)
	{
		if ($index !== 0) {
			echo self::OUTPUT_DELIMITER;
		}

        echo $result;
	}

    private function getMessageOf($val)
    {
        foreach ($this->spec_conf_list as $spec_conf) {
            if ($spec_conf['spec']->isSatisfiedBy($val)) {
                return $spec_conf['message'];
            }
        }

        return $val;
    }

}
