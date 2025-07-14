<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - Time Tracker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md text-center">
        <h1 class="text-2xl font-bold mb-6">Dashboard</h1>
        <p class="mb-4">You have timed out. See you next time, {{ Auth::user()->name ?? 'User' }}!</p>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full bg-gray-800 hover:bg-gray-900 text-white font-bold py-3 px-4 rounded">
                Logout
            </button>
        </form>
    </div>
</body>
</html>
