<?php

//問題4:外部ライブラリの活用
//あなたはPHPでウェブアプリケーションを開発しており、外部APIからデータを取得する必要があります。
//Guzzle HTTPクライアントを使用して、以下のタスクを実行するコードを書いてください。
//
//https://api.example.com/data からデータをGETリクエストで取得します。

//==================================================================
//  https://api.example.com/dataは存在しないので、『独習PHP 7章』の
//  サンプルコードを使用する。
//==================================================================

//取得したレスポンスのステータスコードが200であることを確認します。
//レスポンスボディをJSONとしてデコードし、結果を画面に表示します。


// オートローダーを読み込む
require './vendor/autoload.php';

// クライアントを生成
$cli = new GuzzleHttp\Client();

//例外処理
try {

    // GETリクエストを送信
    $res = $cli->get('https://wings.msn.to/tmp/books.json');

    if ($res->getStatusCode() == 200) {
        // ステータスが200（正常）の場合

        $body = $res->getBody();
        // JSON形式でデコード
        $data = json_decode($body);

        //var_dump($data);

        //取得した内容を表示
        echo '<pre>' . htmlspecialchars(print_r($data, true)) . '</pre>';
    }

    else {
        // 200以外の場合
        echo 'ステータスが200以外です';
    }

}catch(GuzzleHttp\Exception\RequestException $e){
    // Guzzle・リクエスト関連のエラー
    echo "リクエスト中にエラーが発生しました:" . $e->getMessage();

}catch(Exception $e){
    // その他のエラー
    echo "エラーが発生しました:". $e->getMessage();
}
