<x-layout title="TOP | Event">
    <x-header>
        <li class="mr-1">
            <x-layout.single-2></x-layout.single-2>
        </li>
        <li class="mr-1">
            <x-layout.single></x-layout.single>
        </li>
        <li class="mr-1">
            <x-element.button-a :href="route('event.create')">投稿</x-element.button-a>
        </li>
    </x-header>
    <h1>new event</h1>
        

    <div class="flex overflow-x-auto">
        @foreach($events as $event)
            <summary class="list-none">
                <div class=" py-2 ">
                    <div class="mr-2 sm:mr-2 md:mr-2 lg:mr-2 xl:mr-2">
                                <div class="h-24 w-32 sm:h-32 sm:w-44 flex flex-col ">
                                    <a href="{{ route('event.page',['eventId'=>$event->id]) }}" class="group rounded-lg h-16 w-32 sm:h-24 sm:w-44 block bg-gray-100 overflow-hidden relative">
                                        <img src="{{ $path }}" loading="lazy" alt="Photo by Martin Sanchez" class="w-full h-full  object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" />
                                    </a>
                                    <div class="flex flex-col flex-1 text-xs">
                                        <a href="{{ route('event.page',['eventId'=>$event->id]) }}" class=" whitespace-nowrap overflow-hidden active:text-indigo-600 transition duration-100">
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
                                        </a>
                                        <p class="text-xs">
                                            @foreach($event->event_datetimes as $event_datetime)
                                                {{ (new DateTime($event_datetime->Start_Date))->format('m/d H:i'); }}~{{ (new DateTime($event_datetime->Start_Date))->modify('+' . $event_datetime->End_Date . ' minutes')->format('H:i'); }}
                                            @endforeach
                                        </p>
                                        
                                    </div>
                                </div>
                    </div>
                </div>
            </summary> 
        @endforeach
    </div>

    <h1>今月</h1>
    <div class="flex overflow-x-auto">
        @foreach($events as $event)
        @foreach($event->event_datetimes as $event_datetime)
        @if (\Carbon\Carbon::parse($event_datetime->Start_Date)->month === \Carbon\Carbon::now()->month)
                <summary class="list-none">
                    <div class=" py-2 ">
                        <div class="mr-2 sm:mr-2 md:mr-2 lg:mr-2 xl:mr-2">
                                    <div class="h-24 w-32 sm:h-32 sm:w-44 flex flex-col ">
                                        <a href="{{ route('event.page',['eventId'=>$event->id]) }}" class="group rounded-lg h-16 w-32 sm:h-24 sm:w-44 block bg-gray-100 overflow-hidden relative">
                                            <img src="{{ $path }}" loading="lazy" alt="Photo by Martin Sanchez" class="w-full h-full  object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" />
                                        </a>
                                        <div class="flex flex-col flex-1 text-xs">
                                            <a href="{{ route('event.page',['eventId'=>$event->id]) }}" class=" whitespace-nowrap overflow-hidden active:text-indigo-600 transition duration-100">
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
                                            </a>
                                            <p class="text-xs">
                                                
                                                    {{ (new DateTime($event_datetime->Start_Date))->format('m/d H:i'); }}~{{ (new DateTime($event_datetime->Start_Date))->modify('+' . $event_datetime->End_Date . ' minutes')->format('H:i'); }}
                                                
                                            </p>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </summary> 
                @endif
            @endforeach
        @endforeach
    </div>
    
    <h1>翌月</h1>
    <div class="flex overflow-x-auto">
        @foreach($events as $event)
        @foreach($event->event_datetimes as $event_datetime)
        @if (\Carbon\Carbon::parse($event_datetime->Start_Date)->month === \Carbon\Carbon::now()->addMonth()->month)
                <summary class="list-none">
                    <div class=" py-2 ">
                        <div class="mr-2 sm:mr-2 md:mr-2 lg:mr-2 xl:mr-2">
                                    <div class="h-24 w-32 sm:h-32 sm:w-44 flex flex-col ">
                                        <a href="{{ route('event.page',['eventId'=>$event->id]) }}" class="group rounded-lg h-16 w-32 sm:h-24 sm:w-44 block bg-gray-100 overflow-hidden relative">
                                            <img src="{{ $path }}" loading="lazy" alt="Photo by Martin Sanchez" class="w-full h-full  object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" />
                                        </a>
                                        <div class="flex flex-col flex-1 text-xs">
                                            <a href="{{ route('event.page',['eventId'=>$event->id]) }}" class=" whitespace-nowrap overflow-hidden active:text-indigo-600 transition duration-100">
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
                                            </a>
                                            <p class="text-xs">
                                                
                                                    {{ (new DateTime($event_datetime->Start_Date))->format('m/d H:i'); }}~{{ (new DateTime($event_datetime->Start_Date))->modify('+' . $event_datetime->End_Date . ' minutes')->format('H:i'); }}
                                                
                                            </p>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </summary> 
                @endif
            @endforeach
        @endforeach
    </div>
    

    @if (session('feedback.success'))
    <p style="color: green">{{ session('feedback.success') }}</p>
    @endif
    <h1>My Event</h1>
        <div class="flex overflow-x-auto">
            @foreach($events as $event)
            @if(\Illuminate\Support\Facades\Auth::id() === $event->user_id)
               
                    <div class=" py-2 ">
                        <div class="mr-2 sm:mr-2 md:mr-2 lg:mr-2 xl:mr-2">
                                    <div class="h-24 w-32 sm:h-44 sm:w-44 flex flex-col ">

                                        <details class="">
                                            <summary class=" group rounded-lg h-16 w-32 sm:h-24 sm:w-44 block bg-gray-100 overflow-hidden relative">
                                                <img src="{{ $path }}" loading="lazy" alt="Photo by Martin Sanchez" class="w-full h-full  object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" />
                                            </summary> 
                                            
                                            <div class="flex mt-1">
                                                <div class="mr-2">
                                                    <x-element.button-a-sm :href="route('event.update.index',['eventId'=>$event->id])">編集</x-element.button-a-sm>
                                                </div>
                                                
                                                <form action="{{ route('event.delete',['eventId' => $event->id])}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <x-element.button-sm>削除</x-element.button-sm>
                                                </form>
                                            </div>  
                                        </details> 


                                        
                                        <div class="flex flex-col flex-1 text-xs">
                                            <a href="{{ route('event.page',['eventId'=>$event->id]) }}" class=" whitespace-nowrap overflow-hidden active:text-indigo-600 transition duration-100">
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
                                            </a>
                                            <p class="text-xs">
                                                @foreach($event->event_datetimes as $event_datetime)
                                                    {{ (new DateTime($event_datetime->Start_Date))->format('m/d H:i'); }}~{{ (new DateTime($event_datetime->Start_Date))->modify('+' . $event_datetime->End_Date . ' minutes')->format('H:i'); }}
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                        </div>
                    </div>
                    
                 
                @endif 
            @endforeach
        </div>
    
    </x-layout>