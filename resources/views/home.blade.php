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

        {{-- Flash Messages --}}
        @if(session('error'))
            <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if(session('message'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        {{-- Time In / Out Buttons --}}
        <div class="space-y-4 mb-8">
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

            <a href="{{ route('history') }}"
   class="block mt-6 text-blue-600 font-semibold underline hover:text-blue-800">
   View Full History
</a>

        </div>

        {{-- Recent Time Logs Table --}}
        @if ($timeLogs->count())
            <div class="text-left">
                <h2 class="text-xl font-semibold mb-4">Recent Time Logs</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-2 px-4 border-b text-left">Date</th>
                                <th class="py-2 px-4 border-b text-left">Time In</th>
                                <th class="py-2 px-4 border-b text-left">Time Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($timeLogs as $log)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-2 px-4 border-b">
                                        {{ \Carbon\Carbon::parse($log->time_in)->format('Y-m-d') }}
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        {{ \Carbon\Carbon::parse($log->time_in)->format('h:i A') }}
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        @if ($log->time_out)
                                            {{ \Carbon\Carbon::parse($log->time_out)->format('h:i A') }}
                                        @else
                                            <span class="text-yellow-500 italic">Still Logged In</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <p class="text-gray-500">No time logs found yet.</p>
        @endif
    </div>

</body>

</html>
