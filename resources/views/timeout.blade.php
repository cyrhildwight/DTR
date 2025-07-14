<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Time Out - Time Tracker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md text-center">
        <h1 class="text-2xl font-bold mb-6">Hello again, {{ Auth::user()->name ?? 'User' }}</h1>

        <form method="POST" action="{{ route('timeout') }}">
            @csrf
            <button type="submit"
                class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-4 rounded">
                Time Out
            </button>
        </form>
    </div>
</body>
</html>
