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
    <h1>イベントを編集する</h1>
    <div>
        <a href="{{ route('event.index') }}">戻る</a>
        <p>投稿フォーム</p>
        @if (session('feedback.success'))
            <p style="color: green">{{ session('feedback.success') }}</p>
        @endif
        <form action="{{ route('event.update.put',['eventId' => $event->id]) }}" method="post">
            @method('PUT')
            @csrf
            <label for="event-title">イベント</label>
            <span>20文字まで</span>
                <div>
                    <textarea id="event" type="text" name="event_title" placeholder="イベントタイトルを入力">{{ $event->title }}</textarea>
                    @error('event_title')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <textarea id="event" type="text" name="event_description" placeholder="内容を入力">{{ $event->description }}</textarea>
                    @error('event_description')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <p><input type="radio" name="supported_devices" value="0" @if($event->support_pc == 1 && $event->support_quest == 1) checked @endif>全て対応
                        <input type="radio" name="supported_devices" value="1" @if($event->support_pc == 1 && $event->support_quest == 0) checked @endif>PC対応
                        <input type="radio" name="supported_devices" value="2" @if($event->support_pc == 0 && $event->support_quest == 1) checked @endif>Quest対応
                    </p>
                </div>
                <div>
                    <p>開始日時<input type="datetime-local" name="event_start_date" value="{{ (new DateTime($event_datetime->Start_Date))->format('Y-m-d H:i') }}"></p>
                    @error('event_start_date')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <textarea id="event" type="text" name="event_end_date" placeholder="開催時間を記入(分単位)">{{ $event_datetime->End_Date }}</textarea>
                    @error('event_end_date')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
            <button type="submit">編集</button>
        </form>
    </div>
</body>
</html>