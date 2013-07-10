<?php
namespace CodeIQ;

class FizzBuzzSpecification
{
    private $target;

    public function __construct($target)
    {
        if ((int)$target === 0) {
            throw new Exception("invalid parameter");
        }

        $this->target = (int)$target;
    }

    public function isSatisfiedBy($val)
    {
        return ((int)$val % $this->target === 0);
    }
}

