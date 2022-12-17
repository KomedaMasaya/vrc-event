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
    @if (session('feedback.success'))
        <p style="color: green">{{ session('feedback.success') }}</p>
    @endif
    @foreach($events as $event)
    @if(\Illuminate\Support\Facades\Auth::id() === $event->user_id)
        <details>
            <summary>{{ $event->title }} by {{ $event->user->name }}
    
        <div style="margin: 30px">
            
            @if ($event->support_pc && $event->support_quest)
                <div style="margin: 5px">全て対応</div>
            @elseif($event->support_pc)
                <div style="margin: 5px">PC対応</div>
            @elseif($event->support_quest)
                <div style="margin: 5px">Quest対応</div>
            @else
                <div style="margin: 5px">error</div>
            @endif

            {{ $event->description }}
            @foreach($event->event_datetimes as $event_datetime)
                <div>
                    {{ $aaa = (new DateTime($event_datetime->Start_Date))->format('m-d H:i'); }} ~
                    {{ (new DateTime($event_datetime->Start_Date))->modify('+' . $event_datetime->End_Date . ' minutes')->format('m-d H:i'); }}
                </div>
            @endforeach
        </div>
    </summary>
            <div>
                <a href="{{ route('event.update.index',['eventId'=>$event->id]) }}">編集</a>
                <form action="{{ route('event.delete',['eventId' => $event->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit">削除</button>
                </form>
            </div>  
        </details>
        @else
            <summary>{{ $event->title }} by {{ $event->user->name }}
        
                <div style="margin: 30px">
                    
                    @if ($event->support_pc && $event->support_quest)
                        <div style="margin: 5px">全て対応</div>
                    @elseif($event->support_pc)
                        <div style="margin: 5px">PC対応</div>
                    @elseif($event->support_quest)
                        <div style="margin: 5px">Quest対応</div>
                    @else
                        <div style="margin: 5px">error</div>
                    @endif
        
                    {{ $event->description }}
                    @foreach($event->event_datetimes as $event_datetime)
                        <div>
                            {{ $aaa = (new DateTime($event_datetime->Start_Date))->format('m-d H:i'); }} ~
                            {{ (new DateTime($event_datetime->Start_Date))->modify('+' . $event_datetime->End_Date . ' minutes')->format('m-d H:i'); }}
                        </div>
                    @endforeach
                </div>
            </summary>
            @endif
    @endforeach
</body>
</html>