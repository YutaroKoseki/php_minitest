<?php

//問題 2: メソッドの追加
//Personクラスにintroduceというメソッドを追加してください。
//このメソッドは、その人物の名前と年齢を含む文字列
//（例: "Hello, my name is John Doe and I am 30 years old."）を返すものとします。


class Person{
    public $name;
    public $age;

    public function __construct($name, $age){
        $this->name = $name;
        $this->age  = $age;
    }

    // メソッド
    public function introduce(){
        echo 'Hello, my name is '. $this->name .' and I am '. $this->age .' years old.';
    }
}

$user = new Person('saburo', 52);

$user->introduce();


