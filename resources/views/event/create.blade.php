<x-layout title="TOP | Event">
    <x-header>
        <li>
            <x-layout.single></x-layout.single>
        </li>
    </x-header>
    <div>
        <p>投稿フォーム</p>
        <form action="{{ route('event.create') }}" method="post">
            @csrf
            <label for="event-title">イベント</label>
            <span>20文字まで</span>
                <div>
                    <textarea id="event" type="text" name="event_title" placeholder="イベントタイトルを入力"></textarea>
                    @error('event_title')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <textarea id="event" type="text" name="event_description" placeholder="内容を入力"></textarea>
                    @error('event_description')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <p><input type="radio" name="supported_devices" value="0" checked>全て対応<input type="radio" name="supported_devices" value="1">PC対応<input type="radio" name="supported_devices" value="2">Quest対応</p>
                </div>
                <div>
                    <p>開始日時<input type="datetime-local" name="event_start_date" checked></p>
                    @error('event_start_date')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <textarea id="event" type="text" name="event_end_date" placeholder="開催時間を記入(分単位)"></textarea>
                    @error('event_end_date')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <x-element.button>送信</x-element.button>
        </form>
    </div>
</x-layout>