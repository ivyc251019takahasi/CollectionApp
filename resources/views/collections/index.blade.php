<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>コレクション一覧</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-800">
    <div class="max-w-4xl mx-auto py-10 px-4">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold">コレクション一覧</h1>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button
                type="submit"
                class="bg-slate-600 text-white px-4 py-2 rounded-lg hover:bg-slate-700"
                >
                ログアウト
                </button>
            </form>
            <form action="{{ route('collections.index') }}" method="GET" class="mb-6">
                <div class="flex gap-2">
                    <input
                    type="text"
                    name="keyword"
                    value="{{ request('keyword') }}"
                    placeholder="アイテム名・ジャンル・メモを検索"
                    class="flex-1 border border-slate-300 rounded-lg p-3"
                    >
                    <button
                    type="submit"
                    class="bg-indigo-600 text-white px-5 py-3 rounded-lg"
                    >
                    検索
                    </button>
                    </div>
            </form>
            <a href="{{ route('collections.create') }}"
               class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                コレクションを登録
            </a>
        </div>

        @if ($collections->isEmpty())
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                <p class="text-slate-500">
                    まだコレクションが登録されていません。
                </p>
            </div>
        @else
            <div class="space-y-4">
                @foreach ($collections as $collection)
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                        <h3 class="text-xl font-bold mb-2">{{ $collection->name }}</h3>
                        <p class="text-slate-600 mb-1">ジャンル：{{ $collection->genre }}</p>
                        <p class="text-slate-600 mb-4">メモ：{{ $collection->notes }}</p>

                        <!-- 写真の表示エリア -->
                        @if ($collection->photo)
                        <img
                        src="{{ asset('storage/' . $collection->photo) }}"
                        alt="{{ $collection->name }}"
                        class="w-40 h-40 object-cover rounded-lg mt-4"
                        >
                        @endif
                        <a
                        href="{{ route('collections.edit', $collection) }}"
                        class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-lg mt-4"
                        >
                        編集
                        </a>
                        <form
                        action="{{ route('collections.destroy', $collection) }}"
                        method="POST"
                        class="inline-block"
                        onsubmit="return confirm('本当に削除しますか？');"
                        >
                        @csrf
                        @method('DELETE')

                        <button
                        type="submit"
                        class="bg-red-600 text-white px-4 py-2 rounded-lg mt-4"
    >
                        削除
                        </button>
                    </form>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</body>
</html>