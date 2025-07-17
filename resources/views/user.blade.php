<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <title>All Users - DTR System</title>
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
        background: linear-gradient(90deg, transparent, #3b82f6, #06b6d4, #9333ea, transparent);
        border-radius: 1rem;
        animation: glow-run 4s linear infinite;
        z-index: -1;
        mask: linear-gradient(#0000 0 0) content-box, linear-gradient(#000 0 0);
        -webkit-mask: linear-gradient(#0000 0 0) content-box, linear-gradient(#000 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
      }
      @keyframes glow-run {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
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
        <li><a href="{{ route('home') }}" class="text-white font-semibold uppercase px-5 py-2 rounded-full hover:bg-green-600 transition">Home</a></li>
        <li><a href="{{ route('history') }}" class="text-white font-semibold uppercase px-5 py-2 rounded-full hover:bg-green-600 transition">My History</a></li>
        <li><a href="{{ route('users') }}" class="text-white font-semibold uppercase px-5 py-2 rounded-full hover:bg-green-600 transition">Users</a></li>
        <li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold px-5 py-2 rounded-full shadow-md transition">
              Logout
            </button>
          </form>
        </li>
      </ul>
      <label for="menu-toggle" class="md:hidden cursor-pointer flex flex-col justify-center items-center w-8 h-8 bg-white rounded-full shadow">
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

<main class="flex items-center justify-center min-h-screen px-4 pt-32 pb-10">
  <div class="glow-border w-full max-w-6xl">
    <div class="bg-slate-100/90 text-gray-900 rounded-2xl px-4 sm:px-6 lg:px-10 py-6 sm:py-10 shadow-2xl">
      <h2 class="text-xl sm:text-2xl font-bold text-blue-600 mb-4 text-center">All Users</h2>

<div class="space-y-4">
  @forelse($users as $user)
    <div class="bg-white text-gray-900 rounded-xl p-4 shadow-md sm:hidden">
      <p class="text-base font-bold">{{ $user->name }}</p>
      <p class="text-sm text-gray-700">{{ $user->email }}</p>
      <p class="text-sm text-yellow-600 font-semibold">Required Hours: {{ $user->hour ?? 8 }}</p>
      <a href="{{ route('users.history', $user->id) }}"
         class="mt-2 inline-block bg-blue-700 hover:bg-blue-900 text-white text-xs font-semibold px-4 py-1 rounded-full">
        View History
      </a>
    </div>
  @empty
    <p class="text-center text-gray-400">No users found.</p>
  @endforelse
</div>

<div class="hidden sm:block overflow-x-auto rounded-lg shadow border border-gray-300 mt-6">
  <table class="min-w-full text-sm sm:text-base text-left text-gray-800">
    <thead class="bg-blue-100 text-blue-700 text-xs sm:text-sm uppercase">
      <tr>
        <th class="px-4 py-3">Name</th>
        <th class="px-4 py-3">Email</th>
        <th class="px-4 py-3">Required Hours</th>
        <th class="px-4 py-3 text-center">Action</th>
      </tr>
    </thead>
    <tbody class="bg-white">
      @forelse($users as $user)
        <tr class="even:bg-blue-50 odd:bg-blue-100 hover:bg-blue-200 transition">
          <td class="px-4 py-2 font-medium">{{ $user->name }}</td>
          <td class="px-4 py-2">{{ $user->email }}</td>
          <td class="px-4 py-2 text-yellow-600 font-semibold">{{ $user->hour ?? 8 }}</td>
          <td class="px-4 py-2 text-center">
            <a href="{{ route('users.history', $user->id) }}"
               class="bg-blue-700 hover:bg-blue-900 text-white px-4 py-1 rounded-full text-xs font-semibold transition">
              View History
            </a>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="4" class="text-center py-6 text-gray-400">No users found.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

</main>

</body>
</html>
