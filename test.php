<?php

// 独習PHP　第8章　理解度チェック

// [1]

echo <<<EOD
1: クエリ
2: ＄_POST
3: ＄_FILE
4: 環境変数
5: クッキー（cookie）
6: セッション(session)
7: ＄_POST, ＄_GET, ＄_COOKIE
EOD;

echo '<br /><br />';

// [2]

echo <<<EOD
1: HTTPメソッド
2: リクエストヘッダー
3: リクエストボディー
4: HTTPステータス
5: レスポンスヘッダー
EOD;

echo '<br /><br />';

// [3]

echo <<<EOD
1: ○
2: ×
3: ×　（補足：Set-Cookieヘッダーはレスポンスヘッダー）
4: ×
5: ×
EOD;

echo '<br /><br />';

// [4]

echo <<<EOD
1: ＄_COOKIE['cnt']
2: setcookie
3: time()
EOD;


// 問題3:外部ライブラリの活用
//あなたはPHPプロジェクトに取り組んでおり、プロジェクトで外部ライブラリを管理するためにComposerを使用しています。
//次のタスクを実行するために必要なコマンドを書いてください。
//
//新しいPHPプロジェクトのためにComposerを初期化して、composer.jsonファイルを作成する。
//monolog/monologパッケージをプロジェクトに追加する。
//最新安定版を使用してください。
//インストールされたパッケージの一覧を表示する。



