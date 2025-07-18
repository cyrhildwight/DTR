<!DOCTYPE html>
<html lang="en" class="dark">

<head>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register - DTR System</title>

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

    .eye-toggle {
      position: absolute;
      top: 50%;
      right: 1rem;
      transform: translateY(-50%);
      cursor: pointer;
      color: #6b7280;
    }

    .dark .eye-toggle {
      color: #d1d5db;
    }

    .eye-toggle svg {
      width: 1.25rem;
      height: 1.25rem;
    }
  </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 text-white font-sans transition duration-300 px-4">

  <div class="glow-border w-full max-w-md">
    <div class="bg-slate-100/90 text-gray-900 rounded-2xl px-5 sm:px-8 py-8 sm:py-10 shadow-2xl">

      <div class="flex flex-col items-center mb-8 text-center">
        <img src="pic/logo.png" alt="DTR Logo"
          class="w-20 h-20 sm:w-24 sm:h-24 mb-3 rounded-full logo-glow" />
        <h1 class="text-2xl sm:text-3xl font-extrabold text-blue-600 tracking-widest drop-shadow-[0_2px_4px_rgba(59,130,246,0.7)]">
          DTR SYSTEM
        </h1>
        <p class="text-sm sm:text-base text-gray-600 font-medium">Create your account</p>
      </div>

      <form action="/register" method="post" class="space-y-5 sm:space-y-6">
        @csrf

        <div>
          <label for="name" class="block text-sm font-semibold uppercase tracking-wide mb-1 text-gray-700">Name</label>
          <input type="text" id="name" name="name" value="{{ old('name') }}" required
            class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-white text-gray-800 placeholder-gray-500 text-sm sm:text-base font-medium focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm" />
          @error('name')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="email" class="block text-sm font-semibold uppercase tracking-wide mb-1 text-gray-700">Email</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" required
            class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-white text-gray-800 placeholder-gray-500 text-sm sm:text-base font-medium focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm" />
          @error('email')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="hour" class="block text-sm font-semibold uppercase tracking-wide mb-1 text-gray-700">Required Hours</label>
          <input type="hour" id="hour" name="hour" value="{{ old('hour') }}" required
            class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-white text-gray-800 placeholder-gray-500 text-sm sm:text-base font-medium focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm" />
          @error('hour')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="relative">
          <label for="password" class="block text-sm font-semibold uppercase tracking-wide mb-1 text-gray-700">Password</label>
          <input type="password" id="password" name="password" required
            class="w-full px-4 py-2 pr-10 border border-gray-400 rounded-lg bg-white text-gray-800 placeholder-gray-500 text-sm sm:text-base font-medium focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm" />
          <span class="eye-toggle" onclick="togglePassword('password', this)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7
                     -1.274 4.057-5.065 7-9.542 7
                     -4.477 0-8.268-2.943-9.542-7z" />
            </svg>
          </span>
          @error('password')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="relative">
          <label for="password_confirmation" class="block text-sm font-semibold uppercase tracking-wide mb-1 text-gray-700">Confirm Password</label>
          <input type="password" id="password_confirmation" name="password_confirmation" required
            class="w-full px-4 py-2 pr-10 border border-gray-400 rounded-lg bg-white text-gray-800 placeholder-gray-500 text-sm sm:text-base font-medium focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm" />
          <span class="eye-toggle" onclick="togglePassword('password_confirmation', this)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7
                     -1.274 4.057-5.065 7-9.542 7
                     -4.477 0-8.268-2.943-9.542-7z" />
            </svg>
          </span>
        </div>

        <div>
          <input type="submit" value="Register"
            class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-3 text-base sm:text-lg rounded-lg transition duration-300 shadow-md" />
        </div>
      </form>

      <p class="mt-6 text-center text-sm text-gray-600 font-medium">
        Already have an account?
        <a href="/login" class="text-blue-600 font-bold hover:underline">Login here</a>
      </p>

    </div>
  </div>

  <script>
    function togglePassword(fieldId, btn) {
      const input = document.getElementById(fieldId);
      const svg = btn.querySelector('svg');
      const eyeOpen = `<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
      <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
      const eyeOff = `<path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.269-2.943-9.543-7a10.049 10.049 0 013.362-4.568M9.878 9.878A3 3 0 0114.121 14.12M3 3l18 18" />`;

      if (input.type === "password") {
        input.type = "text";
        svg.innerHTML = eyeOff;
      } else {
        input.type = "password";
        svg.innerHTML = eyeOpen;
      }
    }
  </script>


</body>

</html>