<?php

//問題 1: クラスの定義とインスタンス化
//簡単なPersonクラスを定義し、そのクラスのインスタンスを作成してください。
//Personクラスには、name（名前）とage（年齢）の2つのプロパティを持たせ、
//コンストラクタでこれらの値を設定できるようにしてください。

class Person{
    public $name;
    public $age;

    public function __construct($name, $age){
        $this->name = $name;
        $this->age  = $age;
    }
}

$user = new Person('taro', 12);

var_dump($user);


