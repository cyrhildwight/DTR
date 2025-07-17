<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <title>{{ $user->name }} - DTR History</title>
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

<body class="min-h-screen bg-gradient-to-br from-blue-950 via-gray-900 to-slate-900 text-white font-sans">
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
           class="text-white font-semibold uppercase px-5 py-2 rounded-full transition duration-200 hover:bg-green-600 hover:text-white">
          Home
        </a>
      </li>
      <li>
        <a href="{{ route('history') }}"
           class="text-white font-semibold uppercase px-5 py-2 rounded-full transition duration-200 hover:bg-green-600 hover:text-white">
          My History
        </a>
      </li>
      <li>
        <a href="{{ route('users') }}"
           class="text-white font-semibold uppercase px-5 py-2 rounded-full transition duration-200 hover:bg-green-600 hover:text-white">
          Users
        </a>
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
    <label for="menu-toggle" class="md:hidden cursor-pointer flex flex-col justify-center items-center w-8 h-8 bg-white rounded-full shadow z-50">
      <div class="w-5 h-0.5 bg-[#0000A0] mb-1"></div>
      <div class="w-5 h-0.5 bg-[#0000A0] mb-1"></div>
      <div class="w-5 h-0.5 bg-[#0000A0]"></div>
    </label>

  </nav>
</header>
  <div class="md:hidden absolute right-4 top-[72px] w-48 bg-white text-black rounded-lg shadow-lg transition-all duration-300 ease-in-out scale-0 peer-checked:scale-100 origin-top-right z-40">
    <ul class="flex flex-col gap-3 p-4 font-semibold">
      <li><a href="{{ route('home') }}" class="hover:text-blue-600 uppercase">Home</a></li>
      <li><a href="{{ route('history') }}" class="hover:text-blue-600 uppercase">My History</a></li>
      <li><a href="{{ route('users') }}" class="hover:text-blue-600 uppercase">Users</a></li>
      <li>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="w-full text-left text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 px-4 py-2 rounded-full shadow">
            Logout
          </button>
        </form>
      </li>
    </ul>
  </div>
</div>
    <main class="flex items-center justify-center min-h-screen px-4 pt-32 bg-gradient-to-br from-blue-950 via-gray-900 to-slate-900 text-white font-sans">
  <div class="glow-border w-full max-w-4xl">
    <div class="bg-slate-100/90 text-gray-900 rounded-2xl px-4 sm:px-6 lg:px-10 py-6 sm:py-10 shadow-2xl">

      <h2 class="text-xl sm:text-2xl font-bold text-blue-600 mb-1 text-center tracking-wide leading-tight">
        {{ $user->name }}'s DTR History
      </h2>

      <div class="text-center text-gray-600 mb-4 text-xs sm:text-sm font-medium break-words">
        {{ $user->email }}
      </div>

      <div class="mb-4 text-center text-xs sm:text-sm text-gray-700">
        <span class="font-semibold">Total Hours Worked:</span>
        <span class="font-bold text-green-600">
          {{ number_format($totalHoursWorked, 2) }}
        </span> hrs
        <span class="mx-1 sm:mx-2">|</span>
        <span class="font-semibold">Required Hours:</span>
        <span class="font-bold text-yellow-600">{{ $requiredHours }}</span> hrs
        <span class="mx-1 sm:mx-2">|</span>
        <span class="font-semibold">Remaining:</span>
        <span class="font-bold text-red-600">{{ $user->remaining_hours }}</span> hrs
      </div>

      <div class="overflow-x-auto rounded-lg shadow border border-gray-300">
        <table class="min-w-full text-sm sm:text-base text-left text-gray-800">
          <thead class="bg-blue-100 text-blue-700 text-xs sm:text-sm uppercase">
            <tr>
              <th class="px-2 py-2 sm:px-4 sm:py-3">Date</th>
              <th class="px-2 py-2 sm:px-4 sm:py-3">Time In</th>
              <th class="px-2 py-2 sm:px-4 sm:py-3">Time Out</th>
              <th class="px-2 py-2 sm:px-4 sm:py-3">Hours Worked</th>
              <th class="px-2 py-2 sm:px-4 sm:py-3">Diff</th>
            </tr>
          </thead>
          <tbody class="bg-white">
            @forelse($dtrs as $dtr)
              <tr class="even:bg-blue-50 odd:bg-blue-100 hover:bg-blue-200 transition">
                <td class="px-2 py-2 sm:px-4 sm:py-2 font-medium">
                  {{ $dtr->time('time_in')?->format('M d, Y') }}
                </td>
                <td class="px-2 py-2 sm:px-4 sm:py-2 text-green-700 font-semibold">
                  {{ $dtr->time('time_in')?->format('h:i:s A') ?? '-'  }}
                </td>
                <td class="px-2 py-2 sm:px-4 sm:py-2 text-green-700 font-semibold">
                  {{ $dtr->time('time_out')?->format('h:i:s A') ?? '-' }}
                </td>
                <td class="px-2 py-2 sm:px-4 sm:py-2 text-green-700 font-semibold">
                  {{ number_format($dtr->diffInHours(), 2) }} hrs
                </td>
                <td class="px-2 py-2 sm:px-4 sm:py-2 font-semibold">
                  {{ round($requiredHours - $dtr->diffInHours(), 2) }}
                </td>
              </tr>
              @php
                $requiredHours -= $dtr->diffInHours();
              @endphp
            @empty
              <tr>
                <td colspan="5" class="text-center py-6 text-gray-400">No records found.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <div class="mt-6 text-center">
        <a href="{{ route('users') }}" class="text-blue-500 hover:text-blue-700 font-semibold underline underline-offset-2">
          Back to Users
        </a>
      </div>

    </div>
  </div>
</main>

</body>
</html>

