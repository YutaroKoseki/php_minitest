<?php

//問題 2: 属性の利用シナリオ
//属性を使用して、特定のメソッドが非推奨であることを示すDeprecated属性を定義し、それをメソッドに適用する例を示してください。
//この属性には、非推奨理由を説明するためのオプショナルな文字列引数を含めることができます。

// 属性の定義
#[Attribute(Attribute::TARGET_METHOD)]
class  Deprecated{
    public function __construct(
        // 省略記法で。
        public string $reason = ''
    ){}
}

// 属性を使用
class UseDeprecatedMethod{
    #[Deprecated(reason : '今後このメソッドは廃止されます')]
    public function oldMethod(){}

    public function newMethod(){}
}

// リフレクションを使用して属性情報を取得
$ref = new ReflectionClass(UseDeprecatedMethod::class);
$method = $ref->getMethod('oldMethod');
// Deprecated属性を取得
$attrs = $method->getAttributes(Deprecated::class);

foreach ($attrs as $attr) {
    $instance = $attr->newInstance();
    echo '非推奨理由：' . $instance->reason;
}

// 出力結果
// 非推奨理由：今後このメソッドは廃止されます
