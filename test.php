<?php

// [1]
echo <<<EOD
1: 親クラス
2: extends
3: 子クラス
EOD;

// [2]
class MyClass{
    protected string $data;
    public function __construct(string $data){
        $this->data = $data;
    }

    public function getData(): string{
        return $this->data;
    }
}
class Child extends MyClass{

    // オーバーライド
    public function getData(): string
    {
        return '['. parent::getData(). ']';
    }
}

$child = new Child('やほほ');
echo '<br>[2]:'. $child->getData();