<?php

// ===============================================================

// 問題1: 動的なHTMLテーブル生成
//ユーザーから入力された数値（例えば、3）に基づいて、その数値の大きさを持つ正方形のHTMLテーブルを生成するPHPスクリプトを書いてください。
//テーブルの各セルには連続する数値（1から始まる）が入ります。
//

$input = isset($_POST['size'])? $_POST['size'] : 0;
?>

    <!doctype html>
    <html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>問題1</title>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="number" name="size" value="">
            <input type="submit" value="テーブルを作成">
        </form>

        <table>
            <?php
                for($i =1; $i <= $input; $i++){
                    echo '<tr>';

                    for($u = 1; $u <= $input; $u++){
                        echo '<td>'.$u.'</td>';
                    }

                    echo '</tr>';
                }
            ?>
        </table>

        <style>
            table{
                border:1px solid black;
            }
            td{
                border: 1px solid gray;
            }
            tr{
                border: 1px solid black;
            }
        </style>
    </body>
    </html>
