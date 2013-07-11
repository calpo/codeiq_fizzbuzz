<?php
namespace CodeIQ;

require_once 'FizzBuzzApplication.php';
require_once 'FizzBuzzSpecification.php';

class FizzBuzzApplicationAcceptanceTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        ob_flush();
        ob_start();
    }

    public function tearDown()
    {
        ob_end_flush();
    }

    /**
     * @test
     */
    public function FizzBuzz問題の回答を出力する()
    {
        $app = new FizzBuzzApplication;

        $app->addSpecAndMessage(new FizzBuzzSpecification(15), 'fizzbuzz');
        $app->addSpecAndMessage(new FizzBuzzSpecification(3), 'fizz');
        $app->addSpecAndMessage(new FizzBuzzSpecification(5), 'buzz');

        $data = range(1,30);

        $app->run($data);

        $str = ob_get_clean();

        $this->assertEquals($this->expectedFizzBuzzString(), $str);
    }


    private function expectedFizzBuzzString()
    {
        return <<<EOT
1
2
fizz
4
buzz
fizz
7
8
fizz
buzz
11
fizz
13
14
fizzbuzz
16
17
fizz
19
buzz
fizz
22
23
fizz
buzz
26
fizz
28
29
fizzbuzz
EOT;
    }

}
