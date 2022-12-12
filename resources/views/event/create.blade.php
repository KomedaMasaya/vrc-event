<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VRC Event</title>
</head>
<body>
    <h1>VRC Event</h1>
    <div>
        <p>投稿フォーム</p>
        <form action="{{ route('event.create') }}" method="post">
            @csrf
            <label for="event-title">イベント</label>
            <span>20文字まで</span>
                <div>
                    <textarea id="event" type="text" name="event" placeholder="イベントタイトルを入力"></textarea>
                </div>
                <div>
                    <textarea id="event" type="text" name="event" placeholder="内容を入力"></textarea>
                </div>
                <div>
                    <p><input type="radio" name="supported devices" checked>全て対応<input type="radio" name="supported devices">PC対応<input type="radio" name="supported devices">Quest対応</p>
                </div>
                <div>
                    <p>開始日時<input type="datetime-local" name="supported devices" checked></p>
                </div>
                <div>
                    <textarea id="event" type="text" name="event" placeholder="開催時間を記入(分単位)"></textarea>
                </div>
            <button>送信</button>
        </form>
    </div>
</body>
</html>