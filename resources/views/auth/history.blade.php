<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Time Log History</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-8">

    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">Full Time Log History</h1>

        <a href="{{ route('home') }}" class="text-blue-500 underline mb-4 inline-block">← Back to Home</a>

        @if ($timeLogs->count())
            <table class="min-w-full border text-sm">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 border">Date</th>
                        <th class="px-4 py-2 border">Time In</th>
                        <th class="px-4 py-2 border">Time Out</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($timeLogs as $log)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($log->time_in)->format('Y-m-d') }}</td>
                            <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($log->time_in)->format('h:i A') }}</td>
                            <td class="px-4 py-2 border">
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
        @else
            <p class="text-gray-500">No time logs yet.</p>
        @endif
    </div>

</body>
</html>
