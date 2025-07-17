<!DOCTYPE html>
<html lang="en" class="dark">

<head>
  <meta charset="UTF-8">
  <title>DTR System</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <style>
    .glow-border {
      position: relative;
      border-radius: 1rem;
      z-index: 0;
      overflow: hidden;
    }

    .glow-border::before {
      content: "";
      position: absolute;
      inset: 0;
      padding: 2px;
      background: linear-gradient(
        90deg,
        transparent,
        #3b82f6,
        #06b6d4,
        #9333ea,
        transparent
      );
      border-radius: 1rem;
      animation: glow-run 4s linear infinite;
      z-index: -1;
      mask: linear-gradient(#0000 0 0) content-box, linear-gradient(#000 0 0);
      -webkit-mask: linear-gradient(#0000 0 0) content-box, linear-gradient(#000 0 0);
      -webkit-mask-composite: xor;
      mask-composite: exclude;
    }

    @keyframes glow-run {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }
  </style>
</head>

<body class="bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 min-h-screen text-white font-sans">

  <div class="relative peer">
    <input type="checkbox" id="menu-toggle" class="hidden peer" />
    <header class="fixed top-0 left-0 right-0 z-50 bg-black shadow-md border-b border-gray-800 w-full">
      <nav class="w-full px-4 sm:px-6 lg:px-8 py-3 flex items-center justify-between">
        <div class="flex items-center space-x-3">
          <div class="p-1 bg-white rounded-full shadow-lg border-2">
            <img src="/pic/logo.png" alt="Logo" class="h-10 w-10 rounded-full" />
          </div>
          <span class="text-2xl font-extrabold tracking-tight text-white whitespace-nowrap">
            <span class="text-green-500">DTR</span><span class="text-white">System</span>
          </span>
        </div>
        <ul class="hidden md:flex items-center space-x-6 text-sm sm:text-base">
          <li>
            <a href="{{ route('home') }}"
              class="text-white font-semibold uppercase px-5 py-2 rounded-full transition duration-200 hover:bg-green-600 hover:text-white">Home</a>
          </li>
          <li>
            <a href="{{ route('history') }}"
              class="text-white font-semibold uppercase px-5 py-2 rounded-full transition duration-200 hover:bg-green-600 hover:text-white">My
              History</a>
          </li>
          <li>
            <a href="{{ route('users') }}"
              class="text-white font-semibold uppercase px-5 py-2 rounded-full transition duration-200 hover:bg-green-600 hover:text-white">Users</a>
          </li>
          <li>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white font-bold px-5 py-2 rounded-full transition duration-200 shadow-md">
                Logout
              </button>
            </form>
          </li>
        </ul>
        <label for="menu-toggle"
          class="md:hidden cursor-pointer flex flex-col justify-center items-center w-8 h-8 bg-white rounded-full shadow z-50">
          <div class="w-5 h-0.5 bg-[#0000A0] mb-1"></div>
          <div class="w-5 h-0.5 bg-[#0000A0] mb-1"></div>
          <div class="w-5 h-0.5 bg-[#0000A0]"></div>
        </label>
      </nav>
    </header>

    <div
      class="md:hidden absolute right-4 top-[72px] w-48 bg-white text-black rounded-lg shadow-lg transition-all duration-300 ease-in-out scale-0 peer-checked:scale-100 origin-top-right z-40">
      <ul class="flex flex-col gap-3 p-4 font-semibold">
        <li><a href="{{ route('home') }}" class="hover:text-blue-600 uppercase">Home</a></li>
        <li><a href="{{ route('history') }}" class="hover:text-blue-600 uppercase">My History</a></li>
        <li><a href="{{ route('users') }}" class="hover:text-blue-600 uppercase">Users</a></li>
        <li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
              class="w-full text-left text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 px-4 py-2 rounded-full shadow">
              Logout
            </button>
          </form>
        </li>
      </ul>
    </div>
  </div>

  <main class="flex items-center justify-center min-h-screen px-4 pt-32 bg-gradient-to-br from-blue-950 via-gray-900 to-slate-900">
    <div class="glow-border w-full max-w-md">
      <div class="bg-slate-100/90 text-gray-900 rounded-2xl px-10 py-12 shadow-2xl text-center">
        <div class="flex flex-col items-center mb-8">
          <img src="/pic/logo.png" alt="DTR Logo" class="w-24 h-24 mb-4 rounded-full" />
          <h1
            class="text-3xl font-extrabold text-blue-600 tracking-widest drop-shadow-[0_2px_4px_rgba(59,130,246,0.7)]">
            DTR SYSTEM</h1>
          <p class="text-sm text-gray-600 font-medium">Hello, <strong>{{ $user->name }}</strong></p>
        </div>

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

        @if($todaysLog)
        <div class="text-left text-[1.2rem] text-gray-700 mb-4 space-y-1">
          <p><strong>Time In:</strong> {{ $todaysLog->time('time_in')?->format('g:i A') }}</p>

          @if(!$todaysLog->time_out)
          <p><strong>Duration:</strong> <span id="test"></span></p>
          @else
          <p><strong>Time Out:</strong> {{ $todaysLog->time('time_out')?->format('g:i A') }}</p>
          <p><strong>Total Duration:</strong> {{ $todaysLog->diff() }}</p>
          @endif
        </div>

        @if(empty($todaysLog->time_out))
        @if(empty($todaysLog->break_out) || empty($todaysLog->break_in))
        <form method="POST" action="{{ route('dtr.break') }}">
          @csrf
          <button
            class="w-full bg-yellow-500 hover:bg-yellow-700 text-gray-800 font-bold py-3 rounded-lg transition duration-300 mb-2">
            Break {{ $todaysLog->break_in ? 'End' : 'Start' }}
          </button>
        </form>
        @endif

        <form method="POST" action="{{ route('dtr.timeout') }}">
          @csrf
          <button
            class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 rounded-lg transition duration-300">
            Time Out
          </button>
        </form>
        @endif
        @else
        <form method="POST" action="{{ route('dtr.timein') }}">
          @csrf
          <button
            class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-lg transition duration-300">
            Time In
          </button>
        </form>
        @endif
      </div>
    </div>
  </main>

  @if(!empty($todaysLog) && $todaysLog->time_in)
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const durationElement = document.getElementById('test');
      const timeIn = new Date("{{ $todaysLog->time('time_in')?->format('Y-m-d H:i:s') }}");

      if (durationElement) {
        setInterval(() => {
          const now = new Date();
          const diffMs = now - timeIn;
          const hours = String(Math.floor(diffMs / (1000 * 60 * 60))).padStart(2, '0');
          const minutes = String(Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
          const seconds = String(Math.floor((diffMs % (1000 * 60)) / 1000)).padStart(2, '0');
          durationElement.innerHTML = `${hours}:${minutes}:${seconds}`;
        }, 1000);
      }
    });
  </script>
  @endif
</body>

</html>
