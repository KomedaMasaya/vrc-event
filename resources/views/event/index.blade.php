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
    
    @foreach($events as $event)
        <details>
            <summary>{{ $event->title }}
    
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
            </div>  
        </details>
    @endforeach
</body>
</html>