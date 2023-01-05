<x-layout title="TOP | Event">
    <x-header>
    
        @if (isset($user))
        <p>ログイン中のユーザー: {{ $user->name }}</p>
      @else
        <p>ログインしていません。</p>
      @endif
        
    </x-header>
    <img src="{{ $path }}" alt="">
    @if ($event->support_pc && $event->support_quest)
        <span style="">All</span>
    @elseif($event->support_pc)
        <span style="">PC</span>
    @elseif($event->support_quest)
        <span style="">Qu</span>
    @else
        <span style="">err</span>
    @endif
    {{ $event->title }}
    {{ $event->description }}
    {{ (new DateTime($event_datetime->Start_Date))->format('m/d H:i'); }}~{{ (new DateTime($event_datetime->Start_Date))->modify('+' . $event_datetime->End_Date . ' minutes')->format('H:i'); }}
</x-layout>