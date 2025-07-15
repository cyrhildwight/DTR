<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Time Tracker</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="bg-stone-50">

   
    


        @if(session('success'))
        <div class="bg-green-50 text-green-900 mb-4">
            {{ session('success') }}
        </div>
        @endif

        @if($timeIn)
            <div class="mb-4 text-left text-gray-700">
                <p><strong>Time In:</strong> {{ \Carbon\Carbon::parse($timeIn)->format('g:i A') }}</p>

                @if($timeOut)
                    <p><strong>Time Out:</strong> {{ \Carbon\Carbon::parse($timeOut)->format('g:i A') }}</p>
                @else
                    <p><strong>Current Time:</strong> {{ \Carbon\Carbon::parse($currentTime)->format('g:i A') }}</p>
                @endif

                <p><strong>Duration:</strong> {{ $duration }}</p>
            </div>
        @endif

        <div class="space-y-4">
            <form method="POST" action="{{ route('timein') }}">
                @csrf
                <button class="bg-green-600 hover:bg-green-700 text-white font-medium px-5 py-2 rounded">
                    Time In
                </button>
            </form>
        @endif
    </div>

    <script>
        setInterval(() => {
            location.reload();
        }, 1000);
    </script>

</body>
</html>

</body>
</html>
