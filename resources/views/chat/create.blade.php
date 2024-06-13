<!DOCTYPE html>
<html lang="ja">

<head>
    <title>Todays Menu With ChatGPT</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="mx-auto px-2 pt-8 pb-4 md:w-full lg:max-w-5xl xl:max-w-7xl">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h1 class="text-2xl font-bold mb-6">Today's Menu</h1>

            {{-- Error message if the inputword is inappropriate. --}}
            @if (session('error'))
                <div style="color: red; margin: 10px; padding: 5px; border: 1px solid red;">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Form --}}
            <form action="{{ route('chat.post') }}" method="POST">
                @csrf
                <input name="food" type="text" class="w-full px-4 py-2 mb-2 border border-gray-200 rounded-lg">

                <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg mt-2">
                    Submit
                </button>
                <button id="clearChatButton"
                    class="w-full px-4 py-2 bg-red-500 text-white font-semibold rounded-lg mt-2">
                    Clear
                </button>
            </form>

            {{-- Display menu --}}
            @isset($messages)
                @foreach ($messages as $message)
                    <div class="text-align">
                        {{ $message['title'] }}: {{ $message['content'] }}
                    </div>
                @endforeach
            @endisset

            {{-- Display image --}}
            @isset($image)
                <img src="{{ $image }}" alt="画像" class="mx-auto">
            @endisset
        </div>
    </div>

    {{-- Script to clear ChatGPT reply --}}
    <script>
        document.getElementById('clearChatButton').addEventListener('click', function() {
            const chatContainer = document.getElementById('chat-contents');
            chatContainer.innerHTML = '';
        });
    </script>
</body>

</html>
