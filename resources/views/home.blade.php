<!DOCTYPE html>
<html lang="en" class="dark">

<head>
  <meta charset="UTF-8">
  <title>DTR System</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
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
      background: linear-gradient(90deg,
          transparent,
          #3b82f6,
          #06b6d4,
          #9333ea,
          transparent);
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
          {{-- Logo + Welcome --}}
          <div class="flex flex-col items-center mb-6">
            <img src="/pic/logo.png" alt="DTR Logo" class="w-20 h-20 mb-3 rounded-full" />
            <h1 class="text-3xl font-extrabold text-blue-600 drop-shadow-md">DTR SYSTEM</h1>
            <p class="text-sm text-gray-600 font-medium">Hello, <strong>{{ $user->name }}</strong></p>
          </div>

          {{-- Flash Messages --}}
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

          {{-- Attendance Info --}}
          @if($todaysLog)
          <div class="text-left text-base text-gray-700 mb-4 space-y-1">
            <p><strong>Time In:</strong> {{ $todaysLog->time('time_in')?->format('g:i A') }}</p>
            @if(!$todaysLog->time_out)
            <p><strong>Duration:</strong> <span id="liveDuration"></span></p>
            @else
            <p><strong>Time Out:</strong> {{ $todaysLog->time('time_out')?->format('g:i A') }}</p>
            <p><strong>Total Duration:</strong> {{ $todaysLog->diff() }}</p>
            @endif
          </div>

          {{-- If NOT timed out, show Break & Timeout buttons --}}
          @if(empty($todaysLog->time_out))
          @if(empty($todaysLog->break_out) || empty($todaysLog->break_in))
          <form method="POST" action="{{ route('dtr.break') }}" class="mb-2">
            @csrf
            <button type="submit"
              class="w-full bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 rounded-lg">
              Break {{ $todaysLog->break_in ? 'End' : 'Start' }}
            </button>
          </form>
          @endif

          <input type="hidden" id="timeout_face_data" name="face_data">
        <button type="button" onclick="timeOut()"
          class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 rounded-lg">
          Time Out
        </button>
        @endif

        @else
        {{-- No Time In yet --}}
        <input type="hidden" name="face_data" id="face_data">
        <button type="button" onclick="timeIn()"
          class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-lg mb-3">
          Time In
        </button>
        @endif

          {{-- Webcam Display for Face Capture --}}
          <div class="mt-6">
            <div id="camera" class="rounded-lg overflow-hidden mx-auto w-full max-w-xs border border-gray-300 shadow"></div>
          </div>
        </div>
      </div>


    </main>
    <script>
      Webcam.set({
        width: 320,
        height: 240,
        image_format: 'jpeg',
        jpeg_quality: 90
      });
      Webcam.attach('#camera');

      function takeSnapshot() {
        Webcam.snap(function(data_uri) {
          document.getElementById('face_data').value = data_uri;
          alert('Face captured!');
        });
      }

      function timeIn() {
    const input = document.getElementById('face_data');

    if (!input || !Webcam) {
      alert('Camera not ready!');
      return;
    }

    Webcam.snap(function (data_uri) {
      if (!data_uri) {
        alert('Face capture failed!');
        return;
      }

      input.value = data_uri;

      fetch('/timein', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
          },
          body: JSON.stringify({
            face_data: data_uri
          })
        })
        .then(response => response.json())
        .then(data => {
          if (data.status === 'success') {
            alert('Time in successful!');
            window.location.reload();
          } else {
            alert('Error: ' + (data.message || 'Failed to time in.'));
            Webcam.reset();
            Webcam.attach('#camera');
            input.value = '';
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('An error occurred while processing your request.');
        });
    });
  }

  function timeOut() {
    const input = document.getElementById('timeout_face_data');

    if (!input || !Webcam) {
      alert('Camera not ready!');
      return;
    }

    Webcam.snap(function (data_uri) {
      if (!data_uri) {
        alert('Face capture failed!');
        return;
      }

      input.value = data_uri;

      fetch('/timeout', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
          },
          body: JSON.stringify({
            face_data: data_uri
          })
        })
        .then(response => response.json())
        .then(data => {
          if (data.status === 'success') {
            alert('Time out successful!');
            window.location.reload();
          } else {
            alert('Error: ' + (data.message || 'Failed to time out.'));
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('An error occurred while processing your request.');
        });
    });
  }
  </script>
  @if(!empty($todaysLog) && $todaysLog->time_in)
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const durationElement = document.getElementById('liveDuration');
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



