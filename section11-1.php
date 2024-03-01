<?php

//問題 1: 属性の基本的な使用
//PHP 8.0以降で導入された属性（Attribute）について説明し、
//単純な属性を定義して、クラスに適用する例を示してください。
//属性を利用して、そのクラスがAPIのエンドポイントであることを示すApiEndpoint属性を作成し、
//任意のクラスに適用してみてください。


// 属性（Attribute）についての説明
echo <<<EOD
クラスやインターフェイス、そのメンバーに対して付与できる注釈。
コメントアウトしていたメタ情報などを（強制力を持ちつつ）
属性として記述することが可能になった。

例：
#[Test]
public function testHoge(){ ... }

EOD;

echo '<br><br>';

#[Attribute(Attribute::TARGET_CLASS)]
class ApiEndpoint{
    public function __construct(
        public string $path,
        public string $method
    ){}
}

#[ApiEndpoint(path:'http://localhost...', method: 'GET')]
class Test{}

// Testクラスのリフレクションオブジェクトを作成
$ref = new ReflectionClass(Test::class);
// // Testクラスに適用されたApiClass属性を取得
$attr = $ref->getAttributes(ApiEndpoint::class);

if(count($attr) > 0){
    $result = $attr[0]->newInstance();

    echo $result->path . '<br>';
    echo $result->method;
}else{
    echo 'なし';
}

// 出力結果
// http://localhost...
// GET


