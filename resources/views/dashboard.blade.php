<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset='utf-8'>
        <title>Success Login!</title>
    </head>
    <body>
        <p>こんにちは！
            {{  \Auth::user()->name  }}さん！</p>
        <p><a href="/logout">ログアウト</a></p>
    </body>
</html>