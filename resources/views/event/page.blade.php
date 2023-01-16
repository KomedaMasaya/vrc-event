<x-layout title="TOP | Event">
    <x-header>
        <li class="mr-1">
            <x-layout.single-2></x-layout.single-2>
        </li>
        <li class="mr-1">
            <x-layout.single></x-layout.single>
        </li>
        <li class="mr-1">
            <x-element.button-a :href="route('event.index')">ホーム</x-element.button-a>
        </li>
    </x-header>

    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
          <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" src="{{ $path }}">
          <div class="text-center lg:w-2/3 w-full">
            @if ($event->support_pc && $event->support_quest)
            <p class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none rounded text-lg">全て対応</p>
            @elseif($event->support_pc)
            <p class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none rounded text-lg">PC対応</p>
            @elseif($event->support_quest)
            <p class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none rounded text-lg">Quest対応</p>
            @else
            <p class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none rounded text-lg">エラー</p>
            @endif
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900"> {{ $event->title }}</h1>
            <p>{{ (new DateTime($event_datetime->Start_Date))->format('m/d H:i'); }}~{{ (new DateTime($event_datetime->Start_Date))->modify('+' . $event_datetime->End_Date . ' minutes')->format('H:i'); }}</p>
            <p class="mb-8 leading-relaxed">{{ $event->description }}</p>
          </div>
        </div>
      </section>
      
</x-layout>