<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DTR System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Fixed Navigation -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-indigo-500 shadow-md">
        <nav class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center">
                <img src="/pic/logo.png" alt="Logo" class="h-12 w-auto mr-3">
                <span class="text-white text-xl font-semibold">Daily Time Record</span>
            </div>
            <div class="flex items-center space-x-4">
                <a href="/home" class="text-white hover:bg-indigo-700 px-4 py-2 rounded text-sm">View History</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-white bg-red-600 hover:bg-red-700 px-4 py-2 rounded text-sm">
                        Logout
                    </button>
                </form>
            </div>
        </nav>
    </header>

    <!-- Page Content -->
    <main class="flex items-center justify-center pt-32 pb-10 px-4">
        <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md text-center">
            <h1 class="text-2xl font-bold text-gray-800 mb-1">Daily Time Record</h1>
            <p class="text-sm text-gray-500 mb-6">Hello, <strong>{{ auth()->user()->name }}</strong></p>

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
                <div class="text-left text-gray-700 mb-4">
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
                        <button class="bg-red-600 hover:bg-red-700 text-white font-medium px-5 py-2 rounded">
                            Time Out
                        </button>
                    </form>
                @endif
            @else
                <form method="POST" action="{{ route('dtr.timein') }}">
                    @csrf
                    <button class="bg-green-600 hover:bg-green-700 text-white font-medium px-5 py-2 rounded">
                        Time In
                    </button>
                </form>
            @endif
        </div>
    </main>

    <script>
        setInterval(() => {
            location.reload();
        }, 1000); // Refresh every second
    </script>

</body>
</html>
