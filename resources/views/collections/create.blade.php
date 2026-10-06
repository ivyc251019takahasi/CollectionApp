<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>コレクション管理</title>
</head>
<body>

    <h1>コレクション管理アプリ</h1>

    <h2>コレクション登録</h2>

    <form action="{{ route('collections.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>
            アイテム名：
            <input type="text" name="name">
        </p>

        <p>
            ジャンル：
            <input type="text" name="genre">
        </p>

        <p>
            写真：
            <input type="file" name="photo">
        </p>

        <p>
            メモ：
            <textarea name="notes"></textarea>
        </p>

        <button type="submit">登録</button>
    </form>

</body>
</html>