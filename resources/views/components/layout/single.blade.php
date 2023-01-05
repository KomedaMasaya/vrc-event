    @guest
        <x-element.button-a :href="route('register')">会員登録</x-element.button-a>
    @endguest
    @auth
        <form method="post" action="{{ route('logout') }}">
            @csrf
            <x-element.button>ログアウト</x-element.button>
        </form>
    @endauth
