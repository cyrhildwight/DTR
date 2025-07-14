<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home - Time Tracker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md text-center">
        <h1 class="text-2xl font-bold mb-6">Welcome, {{ Auth::user()->name ?? 'User' }}</h1>
        
        <div class="space-y-4">
            <form method="POST" action="{{ route('timein') }}">
                @csrf
                <button type="submit"
                    class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-4 rounded">
                    Time In
                </button>
            </form>

            <form method="POST" action="{{ route('timeout') }}">
                @csrf
                <button type="submit"
                    class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-4 rounded">
                    Time Out
                </button>
            </form>
        </div>
    </div>

</body>
</html> 