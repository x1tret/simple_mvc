<?php

class TestCase
{
    protected $pass = 0;
    protected $fail = 0;

    protected function assertEquals($expected, $actual)
    {
        $result = $expected === $actual;
        return $this->setResult($result);
    }

    private function setResult($result)
    {
        if ($result) {
            echo '. ';
            $this->pass++;
        } else {
            echo 'F ';
            $this->fail++;
        }

        return $result;
    }

    protected function assertTrue($item)
    {
        $result = $item === true;
        return $this->setResult($result);
    }

    public function printResult()
    {
        echo "\n\nTest Result - Pass: {$this->pass}, Fail: {$this->fail}\n\n";
    }
}