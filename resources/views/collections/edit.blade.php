<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>コレクション編集</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-800">

    <div class="max-w-2xl mx-auto py-10 px-4">

        <h1 class="text-3xl font-bold mb-6">
            コレクション編集
        </h1>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

            <form action="{{ route('collections.update', $collection) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-bold mb-2">
                        アイテム名
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ $collection->name }}"
                        class="w-full border border-slate-300 rounded-lg p-2"
                    >
                </div>

                <div class="mb-4">
                    <label class="block font-bold mb-2">
                        ジャンル
                    </label>

                    <input
                        type="text"
                        name="genre"
                        value="{{ $collection->genre }}"
                        class="w-full border border-slate-300 rounded-lg p-2"
                    >
                </div>

                <div class="mb-4">
                    <label class="block font-bold mb-2">
                        写真
                    </label>

                    <input
                        type="file"
                        name="photo"
                        class="w-full"
                    >
                </div>

                <div class="mb-4">
                    <label class="block font-bold mb-2">
                        メモ
                    </label>

                    <textarea
                        name="notes"
                        class="w-full border border-slate-300 rounded-lg p-2"
                        rows="5"
                    >{{ $collection->notes }}</textarea>
                </div>

                <div class="flex gap-3">

                    <button
                        type="submit"
                        class="bg-indigo-600 text-white px-4 py-2 rounded-lg"
                    >
                        更新する
                    </button>

                    <a
                        href="{{ route('collections.index') }}"
                        class="bg-slate-300 px-4 py-2 rounded-lg"
                    >
                        戻る
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>
</html>