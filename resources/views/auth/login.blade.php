<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
</head>
<body>

    <h1>コレクション管理アプリ</h1>

    <h2>ログイン</h2>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <p>
            メールアドレス：
            <input type="email" name="email">
        </p>

        <p>
            パスワード：
            <input type="password" name="password">
        </p>

        <button type="submit">ログイン</button>
    </form>

    <p>
        <a href="{{ route('register') }}">ユーザー登録はこちら</a>
    </p>

</body>
</html>