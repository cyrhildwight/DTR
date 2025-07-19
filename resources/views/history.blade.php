<!DOCTYPE html>
<html lang="en" class="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DTR History</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
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
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    @media (max-width: 640px) {
      .modal-content img {
        max-height: 60vh;
      }

      .table-wrapper {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
      }

      .mobile-header-title {
        font-size: 1.25rem;
      }

      .nav-logo {
        height: 2.5rem;
        width: 2.5rem;
      }

      .modal-content {
        padding: 1rem;
      }

      .glow-border>div {
        padding: 1rem;
      }
    }
  </style>
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

    <main class="flex items-center justify-center min-h-screen px-2 sm:px-4 pt-32 pb-10">
      <div class="glow-border w-full max-w-4xl">
        <div class="bg-slate-100/90 text-gray-900 rounded-2xl px-4 sm:px-6 lg:px-10 py-6 sm:py-10 shadow-2xl">
          <h2 class="text-lg sm:text-2xl font-bold text-blue-600 mb-4 text-center">My DTR History</h2>

          <!-- TABLE -->
          <div class="table-wrapper rounded-md">
            <table class="min-w-full text-xs sm:text-sm text-left">
              <thead class="bg-blue-100 text-blue-800 uppercase">
                <tr>
                  <th class="px-4 py-3 font-semibold whitespace-nowrap">Date</th>
                  <th class="px-4 py-3 font-semibold whitespace-nowrap">Time In</th>
                  <th class="px-4 py-3 font-semibold whitespace-nowrap">Time Out</th>
                </tr>
              </thead>
              <tbody class="bg-white text-gray-800">
                @forelse($dtrs as $dtr)
                <tr class="even:bg-blue-50 odd:bg-blue-100 hover:bg-blue-200 transition">
                  <td class="px-4 py-2 font-medium whitespace-nowrap">
                    {{ $dtr->time('time_in')?->format('M d, Y') }}
                  </td>
                  <td class="px-4 py-2 font-semibold text-green-700 whitespace-nowrap">
                    <div class="flex items-center gap-2">
                      @if(!empty($dtr->time_in_image))
                      <img src="{{ $dtr->time_in_image }}" alt="Time In Image" class="w-[50px] sm:w-[80px] cursor-pointer rounded" onclick="showImage('{{ $dtr->time_in_image }}')">
                      @endif
                      {{ $dtr->time_in ? \Carbon\Carbon::parse($dtr->time_in)->format('h:i:s A') : '—' }}
                    </div>
                  </td>
                  <td class="px-4 py-2 font-semibold text-red-700 whitespace-nowrap">
                    <div class="flex items-center gap-2">
                      @if(!empty($dtr->time_out_image))
                      <img src="{{ $dtr->time_out_image }}" alt="Time Out Image" class="w-[50px] sm:w-[80px] cursor-pointer rounded" onclick="showImage('{{ $dtr->time_out_image }}')">
                      @endif
                      {{ $dtr->time_out ? \Carbon\Carbon::parse($dtr->time_out)->format('h:i:s A') : '—' }}
                    </div>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="3" class="text-center px-4 py-6 text-gray-500">No records found.</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          <div class="mt-6 text-center">
            <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-900 font-semibold underline underline-offset-2">Back to Home</a>
          </div>
        </div>
      </div>
    </main>

    <!-- MODAL -->
    <div id="modal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 z-50 overflow-y-auto flex items-center justify-center px-2 py-6 sm:py-10">
      <div class="max-w-[1000px] w-full mx-auto bg-zinc-900 p-4 sm:p-6 rounded-lg shadow-md relative overflow-y-auto max-h-full">
        <button class="modal-close absolute top-2 right-2 bg-yellow-500 text-black rounded-full w-[30px] h-[30px] shadow">X</button>
        <div class="modal-content">
          <img src="" id="image_placeholder" class="w-full h-auto rounded-lg shadow-lg" alt="Captured Image">
        </div>
      </div>
    </div>

    <!-- SCRIPT -->
    <script>
      document.querySelectorAll('.modal-close').forEach(button => {
        button.addEventListener('click', () => {
          document.getElementById('modal').classList.add('hidden');
        });
      });

      function showImage(src) {
        const modal = document.getElementById('modal');
        const imagePlaceholder = document.getElementById('image_placeholder');
        imagePlaceholder.src = src;
        modal.classList.remove('hidden');
      }
    </script>
  </div>
</body>

</html>