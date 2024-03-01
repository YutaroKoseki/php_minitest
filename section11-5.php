<?php

//問題 5: CSRF（クロスサイトリクエストフォージェリ）対策
//CSRF攻撃を防ぐための一般的な対策を説明し、フォーム送信にトークンを使用したCSRF対策の実装例をPHPで示してください。

// ==========================================

// CSRF攻撃対策の一般的な対策について。
echo '解：ワンタイムトークン方式などを利用する<br><br>';

// ==========================================


// ==========================================
// 以下はフォーム送信にトークンを使用したCSRF対策の実装例
// ==========================================

session_start();
// ランダムな文字列を生成し、トークンとして保存
$token = uniqid(bin2hex(random_bytes(13)), true);
$_SESSION['token'] = $token;

?>

<form action="section11-5-result.php" method="post">
    <input type="hidden" name="token" value="<?php print $token?>">

    <input type="submit" value="送信">
</form>
