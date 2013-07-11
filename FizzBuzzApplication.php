<?php
namespace CodeIQ;

require_once 'FizzBuzzSpecification.php';

class FizzBuzzApplication
{
    private $specAndMessages;

    /**
     * 実行する
     *
     * @param  Array $data 数値の配列
     * @return void
     */
    public function run(Array $data)
    {
        $index = 0;
        foreach ($data as $val) {
            $this->handleResult($this->getMessageOf($val), $index);
            $index++;
        }
    }

    /**
     * 条件とその条件に合致した際のメッセージを登録する
     *
     * 条件は追加した順に優先されます
     * 値が条件に合致した場合、それより後に登録された条件は無視されます
     *
     * @param  FizzBuzzSpecification $spec    FizzBuzz条件クラスインスタンス
     * @param  string                $message メッセージ
     * @return void
     */
    public function addSpecAndMessage(FizzBuzzSpecification $spec, $message)
    {
        $this->specAndMessages[] = array(
            'spec'        => $spec,
            'message'    => $message
        );
    }

    /**
     * 個々の結果処理
     *
     * @param  string  $result 結果文字列
     * @param  integer $index  $index番目の結果
     * @return void
     */
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
