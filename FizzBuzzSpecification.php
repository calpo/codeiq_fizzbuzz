<?php
namespace CodeIQ;

class FizzBuzzSpecification
{
    private $target;

    /**
     * @param integer $target $targetで割り切れる数値が条件となる
     */
    public function __construct($target)
    {
        if ((int)$target === 0) {
            throw new \InvalidArgumentException($target);
        }

        $this->target = (int)$target;
    }

    /**
     * 与えられた値が条件を満たすかどうかを返す
     *
     * @param  integer $val 検査する数値
     */
    public function isSatisfiedBy($val)
    {
        return ((int)$val % $this->target === 0);
    }

}
