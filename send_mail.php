<?php
// Gmail の送信先アドレス
$to = "kk0908ev@gmail.com";  // 自分のGmail

// フォームからの入力を取得
$name    = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$email   = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
$topic   = htmlspecialchars($_POST['topic'], ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

// メール件名と本文を作成
$subject = "お問い合わせフォームより: $topic";
$body = <<<EOD
お問い合わせがありました。

【お名前】$name
【メールアドレス】$email
【お問い合わせ内容】$topic

【メッセージ】
$message
EOD;

// メールヘッダー
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";

// メール送信
if (mail($to, $subject, $body, $headers)) {
    echo "<p>送信が完了しました。ありがとうございました。</p>";
} else {
    echo "<p>送信に失敗しました。後ほど再度お試しください。</p>";
}
?>
