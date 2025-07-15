<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Time Tracker</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="bg-stone-50">

   
    <nav class="bg-indigo-300 p-4">
       <span class="text-white text-2xl font-bold">

        <div class=" flex justify-between items-center">
             <img src="/pic/logo.png" alt="Logo" class="h-20 mr-3" />
              <a href="/" class="text-white text-2xl font-bold rounded-md px-3 py-2 hover:bg-gray-500">
                Daily Time Record
            </a>
            <div class="flex space-x-4">
                <a href="/home" class="text-white hover:bg-gray-700 px-3 py-2 rounded-md text-lg font-medium">View History</a>


                </form>
            </div>
        </div>
    </nav>


    <div class="flex items-center justify-center align-center mt-10">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md space-y-4">

           
            @if(session('error'))
                <div class="bg-red-100 text-red-700 px-4 py-2 rounded">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-2 rounded">
                    {{ session('success') }}
                </div>
            @endif

         
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
