<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録</title>
</head>
<body>

    <h1>コレクション管理アプリ</h1>

    <h2>ユーザー登録</h2>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <p>
            ユーザー名：
            <input type="text" name="name" value="{{ old('name') }}">
        </p>

        <p>
            メールアドレス：
            <input type="email" name="email" value="{{ old('email') }}">
        </p>

        <p>
            パスワード：
            <input type="password" name="password">
        </p>

        <p>
            パスワード確認：
            <input type="password" name="password_confirmation">
        </p>

        <button type="submit">登録</button>
    </form>

</body>
</html>