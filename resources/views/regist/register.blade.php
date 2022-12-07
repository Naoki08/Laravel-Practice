<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset='utf-8'>
        <title>Register Page</title>
    </head>
    <body>
        <form name="registform" actoin="/register" method="post" id="registform">
            {{ csrf_field() }}
            <dl>
                <dt>name</dt>
                <dd><input type="text" name="name" size="30">
                    <span>{{ $errors->first('name') }}</span></dd>
            </dl>
            <dl>
                <dt>email</dt>
                <dd><input type="text" name="email" size="30">
                    <span>{{ $errors->first('email') }}</span></dd>
            </dl>
            <dl>
                <dt>password</dt>
                <dd><input type="password" name="password" size="30">
                    <span>{{ $errors->first('password') }}</span></dd>
            </dl>
            <dl>
                <dt>password kakunin</dt>
                <dd><input type="password" name="password_confirmation" size="30">
                    <span>{{ $errors->first('password_confirmation') }}</span></dd>
            </dl>
            <button type='submit' name='aciton' value='send'>Send</button>
        </form>
    </body>
</html>