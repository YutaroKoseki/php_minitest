<?php

//問題 4: カプセル化
//Personクラスのnameとageプロパティをプライベートに変更し、
//これらのプロパティにアクセスするための公開メソッド（ゲッター）を追加してください。

class Person{
    private $name;
    private $age;

    // コンストラクタ
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    // ゲッター
    public function getName(){
        return $this->name;
    }

    public function getAge(){
        return $this->age;
    }

    // メソッド
    public function introduce()
    {
        return 'Hello, my name is ' . $this->getName() . ' and I am ' . $this->getAge() . ' years old.';
    }
}

class Employee extends Person
{
    public $position;

    public function __construct($name, $age, $position)
    {
        parent::__construct($name, $age);

        $this->position = $position;
    }

    public function introduce()
    {
        return parent::introduce() . 'my position is a ' . $this->position . '!';
    }
}

// インスタンス化
$user = new Person('jiro', 44,);

echo $user->introduce();

// Employeeクラスもついでに。
$user2 = new Employee('siro', 38, 'magician');

echo '<br />';

echo $user2->introduce();