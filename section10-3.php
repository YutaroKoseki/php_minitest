<?php

//問題 3: 継承
//Personクラスを継承したEmployeeクラスを定義してください。
//Employeeクラスには、追加でposition（職位）プロパティを持たせ、この職位もコンストラクタで設定できるようにします。
//また、introduceメソッドをオーバーライドして、職位も紹介するように変更してください。


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

class Employee extends Person {
    public $position;

    public function __construct($name, $age, $position)
    {
        parent::__construct($name, $age);

        $this->position = $position;
    }

    public function introduce()
    {
        return parent::introduce() . 'my position is a '. $this->position . '!';
    }
}

// インスタンス化
$user = new Employee('jiro', 44, 'doctor');
// 出力
echo $user->introduce();

$user2 = new Employee('siro', 38, 'magician');

echo '<br />';

echo $user2->introduce();



// 出力結果：

//Hello, my name is jiro and I am 44 years old.my position is a doctor!
//Hello, my name is siro and I am 38 years old.my position is a magician!