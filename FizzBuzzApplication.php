<?php
namespace CodeIQ;

require_once 'FizzBuzzSpecification.php';

class FizzBuzzApplication
{
    const OUTPUT_DELIMITER = PHP_EOL;

    private $spec_conf_list;

    public function run(Array $data)
    {
        $count = 0;
        foreach ($data as $val) {
            if ($count++ !== 0) echo self::OUTPUT_DELIMITER;

            echo $this->convertValue($val);
        }
    }

    public function addSpecAndMessage(FizzBuzzSpecification $spec, $message)
    {
        $this->spec_conf_list[] = array(
            'spec'        => $spec,
            'message'    => $message
        );
    }

    private function convertValue($val)
    {
        foreach ($this->spec_conf_list as $spec_conf) {
            if ($spec_conf['spec']->isSatisfiedBy($val)) {
                return $spec_conf['message'];
            }
        }

        return $val;
    }

}
