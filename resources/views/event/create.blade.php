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
    <div>
        
        <form action="{{ route('event.create') }}" method="post">
            @csrf
                <div>
                    <label for="event_title" class="inline-block text-gray-800 text-sm sm:text-base mb-2">イベントタイトル</label>
                    <input id="event" type="text" name="event_title" placeholder="20文字以内"class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                    @error('event_title')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="event_description" class="inline-block text-gray-800 text-sm sm:text-base mb-2">概要</label>
                    <textarea id="event" type="text" name="event_description" placeholder="内容を入力" class="w-full h-64 bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2"></textarea>
                    @error('event_description')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
            
               <div>
                <label for="event_start_date" class="inline-block text-gray-800 text-sm sm:text-base mb-2">対応機器</label>
                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                        <div class="flex items-center pl-3">
                            <input id="horizontal-list-radio-license" type="radio" value="0" name="supported_devices" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="horizontal-list-radio-license" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">全て対応 </label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                        <div class="flex items-center pl-3">
                            <input id="horizontal-list-radio-id" type="radio" value="1" name="supported_devices" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="horizontal-list-radio-id" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">PC対応</label>
                        </div>
                    </li>
                    <li class="w-full dark:border-gray-600">
                        <div class="flex items-center pl-3">
                            <input id="horizontal-list-radio-passport" type="radio" value="2" name="supported_devices" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="horizontal-list-radio-passport" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Quest対応</label>
                        </div>
                    </li>
                </ul>
               </div>
                

                <div>
                    <label for="event_start_date" class="inline-block text-gray-800 text-sm sm:text-base mb-2">開始日時</label>
                    <input type="datetime-local" name="event_start_date" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                    @error('event_start_date')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
            
                <div>
                    <label for="event_end_date" class="inline-block text-gray-800 text-sm sm:text-base mb-2">開催時間</label>
                    <input type="number" name="event_end_date" min="15" max="600" list="numlist" placeholder="単位：分" required class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                    <datalist id="numlist">
                        <option value="15"></option>
                        <option value="30"></option>
                        <option value="60"></option>
                        <option value="90"></option>
                        <option value="120"></option>
                        <option value="180"></option>
                        <option value="240"></option>
                        <option value="300"></option>
                    </datalist>
                    @error('event_end_date')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-2">
                    <x-element.button>送信</x-element.button>
                </div>
                
        </form>
    </div>
</x-layout>