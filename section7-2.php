<?php

// 7章　小テスト　

// 問題2:DirectoryIteratorクラス
//あなたは、特定のディレクトリ内のファイルとディレクトリのリストを取得し、
//それらの名前を画面に表示するシンプルなスクリプトを書く任務を与えられました。
//このタスクにはDirectoryIteratorクラスを使用してください。
//取得するディレクトリは/path/to/directoryとします。
//ただし、実際には自分の環境に合わせたパスに置き換えてください。


$directory = '/Users/yutaro/PhpstormProjects/dynamis/';

// 例外処理
try {
    // DirectoryIterator インスタンスを作成
    $iterator = new DirectoryIterator($directory);

    foreach ($iterator as $file) {

        echo $file->getFilename() . "<br>";

    }
} catch (Exception $e) {
    echo "エラーが発生しました: ", $e->getMessage();
}

?>
