<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <title>DTR System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body class="bg-gradient-to-br from-blue-950 via-gray-900 to-slate-900 min-h-screen text-white font-sans">

    <header class="fixed top-0 left-0 right-0 z-50 backdrop-blur-md bg-indigo-100/70 shadow-md">
        <nav class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center">
                <img src="/pic/logo.png" alt="Logo" class="h-12 w-auto mr-3 rounded-full shadow-lg border border-blue-500/30">
                <span class="text-white text-xl font-bold tracking-wider">Daily Time Record</span>
            </div>
            <div class="flex items-center space-x-4">
                <a href="/home" class="text-white hover:bg-indigo-700 px-4 py-2 rounded text-sm font-medium">View History</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded text-sm font-medium">
                        Logout
                    </button>
                </form>
            </div>
        </nav>
    </header>

    <main class="flex items-center justify-center pt-32 pb-10 px-4">
        <div class="mt-[200px] bg-white/10 backdrop-blur-lg border border-white/10 rounded-2xl shadow-2xl p-1 w-full max-w-md">
            <div class="bg-[#f4f4f4] text-gray-800 rounded-2xl px-10 py-10 shadow-inner text-center">
                <h1 class="text-3xl font-extrabold text-blue-700 mb-1 tracking-wider">Daily Time Record</h1>
                <p class="text-[1.4rem] text-gray-600 mb-6">Hello, <strong>{{ auth()->user()->name }}</strong></p>

                @if(session('success'))
                    <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @if($timeIn)
                    <div class="text-left text-[1.4rem] text-gray-700 mb-4 space-y-1">
                        <p><strong>Time In:</strong> {{ $timeIn->format('g:i A') }}</p>

                        @if(!$timeOut)
                            <p><strong>Duration:</strong> {{ $duration }}</p>
                        @else
                            <p><strong>Time Out:</strong> {{ $timeOut->format('g:i A') }}</p>
                            <p><strong>Total Duration:</strong> {{ $timeOut->diff($timeIn)->format('%H:%I:%S') }}</p>
                        @endif
                    </div>

                    @if(!$timeOut)
                        <form method="POST" action="{{ route('dtr.timeout') }}">
                            @csrf
                            <button class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 rounded-lg transition duration-300">
                                Time Out
                            </button>
                        </form>
                    @endif
                @else
                    <form method="POST" action="{{ route('dtr.timein') }}">
                        @csrf
                        <button class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-lg transition duration-300">
                            Time In
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </main>

    <script>
        setInterval(() => {
            location.reload();
        }, 1000);
    </script>

</body>
</html>
