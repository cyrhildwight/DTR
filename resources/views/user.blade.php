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
              <div class="flex gap-2 mt-2">
                <a href="{{ route('users.history', $user->id) }}"
                  class="inline-block bg-blue-700 hover:bg-blue-900 text-white text-xs font-semibold px-4 py-1 rounded-full">
                  View History
                </a>
                <button data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}" data-open-modal="download-modal-form"
                  class="inline-block bg-green-700 hover:bg-green-900 text-white text-xs font-semibold px-4 py-1 rounded-full">
                  Download PDF
                </button>
              </div>
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
                    <div class="flex gap-2 justify-center">
                      <a href="{{ route('users.history', $user->id) }}"
                        class="bg-blue-700 hover:bg-blue-900 text-white px-4 py-1 rounded-full text-xs font-semibold transition">
                        View History
                      </a>
                      <button data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}" data-open-modal="download-modal-form"
                        class="bg-green-700 hover:bg-green-900 text-white px-4 py-1 rounded-full text-xs font-semibold transition">
                        Download PDF
                      </button>
                    </div>
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

    <!-- Date Range Selection Modal -->
    <div id="download-modal-form" class="fixed inset-0 z-[60] hidden">
        <div class="absolute inset-0 bg-black/60" data-close-modal></div>
        <div role="dialog" aria-modal="true" class="relative mx-auto my-10 max-w-[640px] w-[92%] bg-slate-800 rounded-2xl shadow-2xl overflow-hidden">
            <button type="button" class="absolute top-3 right-3 p-2 rounded-full bg-slate-700 text-blue-300 shadow hover:bg-slate-600" data-close-modal aria-label="Close">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
            <div class="p-6">
                <h1 class="text-center text-3xl md:text-4xl font-extrabold text-blue-300 mb-6">Select Date Range</h1>
                <p class="text-center text-slate-300 mb-6">Choose the period for PDF generation</p>
                
                <form id="downloadForm" method="GET" action="" class="space-y-5">
                    <div>
                        <label class="block font-semibold mb-1 text-blue-300" for="start_date">Start Date</label>
                        <input class="w-full px-4 py-3 border border-slate-600 bg-slate-700 rounded-lg outline-none focus:ring-2 focus:ring-blue-400 transition text-white" 
                               id="start_date" name="start_date" type="date" required>
                    </div>
                    
                    <div>
                        <label class="block font-semibold mb-1 text-blue-300" for="end_date">End Date</label>
                        <input class="w-full px-4 py-3 border border-slate-600 bg-slate-700 rounded-lg outline-none focus:ring-2 focus:ring-blue-400 transition text-white" 
                               id="end_date" name="end_date" type="date" required>
                    </div>
                    
                    <div class="flex gap-3 pt-4">
                        <button type="button" data-close-modal
                            class="flex-1 px-5 py-3 rounded-full bg-slate-600 text-slate-200 font-bold shadow-lg hover:bg-slate-500 transition text-lg">
                            Cancel
                        </button>
                        <button type="submit"
                            class="flex-1 px-5 py-3 rounded-full bg-blue-600 text-white font-bold shadow-lg hover:bg-blue-700 transition text-lg">
                            Download PDF
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SCRIPT -->
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Open modal
        document.querySelectorAll('[data-open-modal]').forEach(function(btn) {
          btn.addEventListener('click', function() {
            var modalId = btn.getAttribute('data-open-modal');
            var modal = document.getElementById(modalId);
            if (modal) {
              modal.classList.remove('hidden');
              document.body.classList.add('overflow-hidden');
              
              // Set the form action URL and default dates
              var userId = btn.getAttribute('data-user-id');
              var userName = btn.getAttribute('data-user-name');
              
              // Set the form action URL
              document.getElementById('downloadForm').action = `/users/${userId}/history/pdf`;
              
              // Set default dates (current month)
              var today = new Date();
              var firstDay = new Date(today.getFullYear(), today.getMonth(), 1);
              var lastDay = new Date(today.getFullYear(), today.getMonth() + 1, 0);
              
              document.getElementById('start_date').value = firstDay.toISOString().split('T')[0];
              document.getElementById('end_date').value = lastDay.toISOString().split('T')[0];
            }
          });
        });
        
        // Close modal
        document.querySelectorAll('[id$="-modal-form"]').forEach(function(modal) {
          modal.querySelectorAll('[data-close-modal]').forEach(function(el) {
            el.addEventListener('click', function() {
              modal.classList.add('hidden');
              document.body.classList.remove('overflow-hidden');
            });
          });
          document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
              modal.classList.add('hidden');
              document.body.classList.remove('overflow-hidden');
            }
          });
        });

        // Close modal when clicking outside
        document.getElementById('download-modal-form').addEventListener('click', function(e) {
          if (e.target === this) {
            this.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
          }
        });

        // Auto-close modal after form submission
        document.getElementById('downloadForm').addEventListener('submit', function(e) {
          e.preventDefault(); // Prevent page refresh
          
          // Get form data
          var startDate = document.getElementById('start_date').value;
          var endDate = document.getElementById('end_date').value;
          var userId = this.action.split('/')[2];
          
          // Build download URL
          var downloadUrl = `/users/${userId}/history/pdf?start_date=${startDate}&end_date=${endDate}`;
          
          // Create temporary link and trigger download
          var link = document.createElement('a');
          link.href = downloadUrl;
          link.style.display = 'none';
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);
          
          // Close modal
          document.getElementById('download-modal-form').classList.add('hidden');
          document.body.classList.remove('overflow-hidden');
        });
      });
    </script>

</body>

</html>