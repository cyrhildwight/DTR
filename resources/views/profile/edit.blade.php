<!DOCTYPE html>
<html lang="en" class="dark">

<head>
  <meta charset="UTF-8">
  <title>Edit Profile - DTR System</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body class="bg-gradient-to-br from-blue-950 via-gray-900 to-slate-900 min-h-screen text-white font-sans">

  <div class="relative peer">
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
              class="flex items-center gap-2 text-white font-semibold uppercase px-5 py-2 rounded-full transition duration-200 hover:bg-green-600 hover:text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 12l2-2m0 0l7-7 7 7m-9 12h4m4-4v6H7v-6a2 2 0 012-2h6a2 2 0 012 2z" />
              </svg>
              Home
            </a>
          </li>

          <li>
            <a href="{{ route('history') }}"
              class="flex items-center gap-2 text-white font-semibold uppercase px-5 py-2 rounded-full transition duration-200 hover:bg-green-600 hover:text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              My History
            </a>
          </li>

          <li>
            <a href="{{ route('users') }}"
              class="flex items-center gap-2 text-white font-semibold uppercase px-5 py-2 rounded-full transition duration-200 hover:bg-green-600 hover:text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M12 12a4 4 0 100-8 4 4 0 000 8z" />
              </svg>
              Users
            </a>
          </li>

          <li>
            <a href="{{ route('password.change') }}"
              class="flex items-center gap-2 text-white font-semibold uppercase px-5 py-2 rounded-full transition duration-200 hover:bg-blue-600 hover:text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.104.896-2 2-2s2 .896 2 2-2 4-2 4m-4 0c0-1.104.896-2 2-2s2 .896 2 2-2 4-2 4" />
              </svg>
              Change Password
            </a>
          </li>

          <li>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit"
                class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-bold px-5 py-2 rounded-full transition duration-200 shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                  viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
                </svg>
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
    <input type="checkbox" id="menu-toggle" class="peer hidden" />
    <div
      class="md:hidden absolute right-4 top-[72px] w-60 bg-white text-black rounded-lg shadow-lg transition-all duration-300 ease-in-out scale-0 peer-checked:scale-100 origin-top-right z-40">
      <ul class="flex flex-col gap-3 p-4 font-semibold">
        <li>
          <a href="{{ route('home') }}" class="flex items-center gap-2 hover:text-blue-600 uppercase">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 12l2-2m0 0l7-7 7 7m-9 12h4m4-4v6H7v-6a2 2 0 012-2h6a2 2 0 012 2z" />
            </svg>
            Home
          </a>
        </li>
        <li>
          <a href="{{ route('history') }}" class="flex items-center gap-2 hover:text-blue-600 uppercase">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            My History
          </a>
        </li>
        <li>
          <a href="{{ route('users') }}" class="flex items-center gap-2 hover:text-blue-600 uppercase">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M12 12a4 4 0 100-8 4 4 0 000 8z" />
            </svg>
            Users
          </a>
        </li>

        <li>
          <a href="{{ route('password.change') }}" class="flex items-center gap-2 hover:text-blue-600 uppercase">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 11c0-1.104.896-2 2-2s2 .896 2 2-2 4-2 4m-4 0c0-1.104.896-2 2-2s2 .896 2 2-2 4-2 4" />
            </svg>
            Change Password
          </a>
        </li>

        <li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
              class="flex items-center gap-2 w-full text-left text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 px-4 py-2 rounded-full shadow">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
              </svg>
              Logout
            </button>
          </form>
        </li>
      </ul>
    </div>
    <main class="flex items-center justify-center min-h-screen px-4 pt-32">
      <div class="glow-border w-full max-w-md">
        <div class="bg-slate-100/90 text-gray-900 rounded-2xl px-8 py-10 shadow-2xl text-center">
          <div class="flex flex-col items-center mb-6">
            <img src="/pic/logo.png" alt="DTR Logo" class="w-20 h-20 mb-3 rounded-full" />
            <h1 class="text-3xl font-extrabold text-blue-600 drop-shadow-md">Edit Profile</h1>
          </div>

          @if(session('success'))
          <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4 text-sm">
            {{ session('success') }}
          </div>
          @endif
          @if(session('error'))
          <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm">
            {{ session('error') }}
          </div>
          @endif

          <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            <div class="mb-4">
              <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
              <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
              @error('name')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div class="mb-4">
              <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
              <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
              @error('email')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div class="mb-6">
              <label for="employee_id" class="block text-sm font-medium text-gray-700 mb-1">Employee ID</label>
              <input type="text" id="employee_id" name="employee_id" value="{{ old('employee_id', $user->employee_id) }}" {{ $user->employee_id ? 'readonly' : 'required' }}
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 {{ $user->employee_id ? 'bg-gray-100' : '' }}">
              @if($user->employee_id)
              <p class="text-gray-500 text-xs mt-1">Employee ID can only be set once.</p>
              @endif
              @error('employee_id')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
            </div>

            <button type="submit"
              class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg">
              Update Profile
            </button>
          </form>

          <div class="mt-4">
            <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800">Back to Home</a>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>

</html>