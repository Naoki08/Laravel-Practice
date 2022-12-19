<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset='utf-8'>
        <title>ログインフォーム</title>
    </head>
    <body>
    <form name="loginform" action="/twitter/login" method="post">
        {{ csrf_field() }}
        <button type="submit" name="action" value="send">Twitter Login</button>
    </form>
    </body>
</html>