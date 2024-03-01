<?php

//問題 6: ドキュメンテーションコメントの応用
//あなたは、ウェブアプリケーションの開発プロジェクトに参加しており、
//チームメンバー間でコードの可読性と再利用性を向上させるためにドキュメンテーションコメントの重要性が強調されています。

//あるクラスProductがあり、このクラスは商品に関する情報を管理します。
//Productクラスには、商品のID(＄id)、名前(＄name)、価格(＄price)をプロパティとして持ち、それぞれのゲッターとセッターメソッドが含まれています。
//
//ドキュメンテーションコメントを適切に使用して、Productクラスのプロパティと、
//名前を設定するセッターメソッドsetName、名前を取得するゲッターメソッドgetNameについて記述する例を示してください。
//セッターメソッドsetNameでは、引数として受け取る商品名が非空の文字列であることを確認する必要があります。
//
//作成したら、phpDocでドキュメントを生成し、出力されたファイル一式を提出ください。



/**
 * 商品に関する情報を管理するクラス
*/
class Product{
    /**
     * @var int 商品ID
     */
    protected int $id;

    /**
     * @var string 商品名
    */
    protected string $name;

    /**
     * @var float 商品価格
    */
    protected float $price;

    /**
     * product コンストラクタ
     * @param int $id 商品ID
     * @param string $name 商品名
     * @param float $price 商品価格
    */
    public function __construct($id, $name, $price){
        $this->id    = $id;
        $this->name  = $name;
        $this->price = $price;
    }

    /**
     * 商品のIDの取得
     * @return int 商品のID
    */
    public function getId(){
        return $this->id;
    }

    /**
     * 商品名の取得
     * @return string 商品名
     */
    public function getName(){
        return $this->name;
    }

    /**
     * 商品価格の取得
     * @return float 商品価格
     */
    public function getPrice(){
        return $this->price;
    }

    /**
     * 商品IDの設定
     * @param int  $id 商品ID
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * 商品の設定
     * 文字列が空じゃないかを確認
     * @param string $name 商品名
     */
    public function setName($name)
    {
        if($name !== ''){
            $this->name = $name;
        }
    }

    /**
     * 商品価格の設定
     * @param float $price 商品価格
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
}